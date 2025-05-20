<?php
require 'rfzwebdb.php';

// Fetch comment details by ID
if (isset($_GET['id'])) {
    $commentId = $_GET['id'];

    $stmt = $pdo->prepare("SELECT id, author, comment FROM comments WHERE id = :id");
    $stmt->execute(['id' => $commentId]);

    $comment = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($comment) {
        echo json_encode($comment);
    } else {
        echo json_encode(['error' => 'Comment not found']);
    }
}
?>