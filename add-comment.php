<?php
session_start();
require 'config.php';
require 'rfzwebdb.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $blog_posts_id = isset($_POST['blog_posts_id']) ? (int) $_POST['blog_posts_id'] : 0;
    $full_name = isset($_POST['full_name']) ? trim($_POST['full_name']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $comment = isset($_POST['comment']) ? trim($_POST['comment']) : '';

    // Basic validation
    if ($blog_posts_id <= 0 || empty($full_name) || empty($email) || empty($comment)) {
        echo "All fields are required.";
        exit;
    }

    // Insert the comment into the database
    $query = "INSERT INTO comments (blog_posts_id, full_name, email, author, comment) 
              VALUES (:blog_posts_id, :full_name, :email, :author, :comment)";
    $stmt = $pdo->prepare($query);
    $_SESSION['success_msg'] = "Your comment has been added successfully!";

    try {
        $stmt->execute([
            ':blog_posts_id' => $blog_posts_id,
            ':full_name' => $full_name,
            ':email' => $email,
            ':author' => $full_name,
            ':comment' => $comment
        ]);

        // Fetch the slug based on blog_posts_id to redirect to the clean URL
        $query = "SELECT slug FROM blog_posts WHERE id = :blog_posts_id";
        $stmt = $pdo->prepare($query);
        $stmt->execute(['blog_posts_id' => $blog_posts_id]);
        $blog = $stmt->fetch(PDO::FETCH_ASSOC);

        // Get protocol (http or https)
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";

// Get host (e.g., localhost or domain)
$host = $_SERVER['HTTP_HOST'];

// Get base directory dynamically, including subdirectory if on localhost
$base_path = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'])); // Normalize Windows slashes
$base_path = trim($base_path, '/'); // Remove extra slashes

// If on localhost, ensure the subdirectory is included
if ($host == 'localhost') {
    $base_url = $protocol . "://" . $host . "/" . $base_path;
} else {
    $base_url = $protocol . "://" . $host;
}

// Ensure `/blog/` is correctly added before the slug
if ($blog && isset($blog['slug'])) {
    header("Location: " . rtrim($base_url, '/') . "/blog/" . ltrim($blog['slug'], '/'));
    exit;
} else {
    header("Location: " . rtrim($base_url, '/') . "/404.php");
    exit;
}


    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid request method.";
}
?>
