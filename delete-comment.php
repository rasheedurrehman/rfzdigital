<?php
require 'rfzwebdb.php';

if (isset($_POST['delete_comment']) && isset($_POST['comment_id'])) {
    $id = $_POST['comment_id'];

    try {
        $stmt = $pdo->prepare("DELETE FROM comments WHERE id = :id");
        $stmt->execute(['id' => $id]);

        echo json_encode(['success' => true]);
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
}
