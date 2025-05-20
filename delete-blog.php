<?php
require 'rfzwebdb.php';
session_start(); // Start session

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id'])) {
        $blog_id = intval($_GET['id']);

        // Update blog status to 1 (Published)
        $stmt = $pdo->prepare("DELETE FROM blog_posts WHERE id = :id");
        if ($stmt->execute([':id' => $blog_id])) {
            $_SESSION['success'] = "Blog has been Deleted successfully!";
        } else {
            $_SESSION['error'] = "Failed to Delete the blog. Please try again.";
        }
    } else {
        $_SESSION['error'] = "Invalid blog ID.";
    }
} else {
    $_SESSION['error'] = "Invalid request method.";
}

// Redirect back to all-blog.php without query parameters
header('Location: ' . BASE_URL . '/all-blogs');
exit();
?>
