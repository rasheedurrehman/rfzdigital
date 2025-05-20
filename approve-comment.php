<?php
// Include the database connection
include 'rfzwebdb.php';

if (isset($_POST['approve_comment'])) {
    $commentId = $_POST['comment_id'];
    try {
        // Update the approval status of the comment
        $stmt = $pdo->prepare("UPDATE comments SET approved = 1 WHERE id = :id");
        $stmt->execute(['id' => $commentId]);

        // Return success response
        echo json_encode(['success' => true]);
    } catch (PDOException $e) {
        // Return error response
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }
}
?>
