<?php
// Include the database connection
session_start();
include 'rfzwebdb.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $adminId = $_POST['id'];

    // Delete the admin record
    $stmt = $pdo->prepare("UPDATE admins SET approved = 0 WHERE id = :id");
    $stmt->bindParam(':id', $adminId, PDO::PARAM_INT);
    
    if ($stmt->execute()) {
        $_SESSION['message'] = "Admin Removed successfully!";
        $_SESSION['message_type'] = 'success';
    } else {
        $_SESSION['message'] = "Failed to Removed admin.";
        $_SESSION['message_type'] = 'danger';
    }
    header('Location: registered-admins.php'); // Redirect back to the main page
    exit();
}
?>
