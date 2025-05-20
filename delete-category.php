<?php
session_start(); // Start session to store the success message

include 'includes/ad-header.php'; // Include your header (if needed)

// Check if the 'id' parameter is present in the URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Sanitize the 'id' parameter to prevent SQL injection

    try {
        // Prepare the SQL query to delete the category by ID
        $stmt = $pdo->prepare("DELETE FROM categories WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT); // Bind the ID parameter

        // Execute the query
        if ($stmt->execute()) {
            // Set a session variable to store the success message
            $_SESSION['success_message'] = "Category deleted successfully";

            // Redirect to the category list page using JavaScript
            echo "<script>
                window.location.href = '" . BASE_URL . "add-new-blog-category.php';
            </script>";
            exit;
        } else {
            // If the deletion fails, show a failure message
            echo "Failed to delete category.";
        }
    } catch (PDOException $e) {
        // Catch any database errors and display them
        echo "Error: " . $e->getMessage();
    }
} else {
    // If 'id' is not set in the URL, show an invalid request message
    echo "Invalid request.";
}
?>
