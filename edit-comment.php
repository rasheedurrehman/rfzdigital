<?php
require 'rfzwebdb.php';
?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $commentId = $_POST['comment_id'] ?? null;
    $author = $_POST['author'] ?? null; // Updated to author
    $comment = $_POST['comment'] ?? null;

    if ($commentId && $author && $comment) {
        try {
            $stmt = $pdo->prepare("UPDATE comments SET author = :author, comment = :comment WHERE id = :id");
            $stmt->execute([
                'author' => $author,
                'comment' => $comment,
                'id' => $commentId,
            ]);

            echo json_encode(['success' => true]);
        } catch (PDOException $e) {
            echo json_encode(['success' => false, 'error' => $e->getMessage()]);
        }
    } else {
        echo json_encode(['success' => false, 'error' => 'Invalid data']);
    }
}
?>

