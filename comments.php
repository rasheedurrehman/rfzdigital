<?php include 'includes/ad-header.php'; ?>

<div class="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group float-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="#">RFZ Digital</a></li>
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Registered Admin</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Basic Tables</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Unapproved Comments</h4>
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>blog_posts_id</th>
                                        <th>full_name</th>
                                        <th>email</th>
                                        <th>author</th>
                                        <th>comment</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    try {
                                        // Query to fetch unapproved comments (approved = 0)
                                        $stmt = $pdo->prepare("SELECT id, blog_posts_id, full_name, email, author, comment, created_at FROM comments WHERE approved = 0");
                                        $stmt->execute();
                                        $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                        $counter = 1; // Initialize counter for numbering
                                        foreach ($comments as $comment) {
                                            echo "<tr>
                                                   <td>{$counter}</td>
                                                   <td>{$comment['blog_posts_id']}</td>
                                                   <td>{$comment['full_name']}</td>
                                                   <td>{$comment['email']}</td>
                                                   <td>{$comment['author']}</td>
                                                   <td>{$comment['comment']}</td>
                                                   <td>{$comment['created_at']}</td>
                                                   <td>
                                                       <button type='button' class='btn btn-sm btn-success' onclick='approveComment({$comment["id"]})'><i class='fas fa-check'></i> Approve</button>
                                                       <button type='button' class='btn btn-sm btn-danger' onclick='deleteComment({$comment["id"]})'><i class='fas fa-trash-alt'></i> Delete</button>
                                                   </td>
                                               </tr>";
                                            $counter++;
                                        }
                                    } catch (PDOException $e) {
                                        echo "<tr><td colspan='8'>Error: " . $e->getMessage() . "</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

        <!-- Approved Comments Table -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Approved Comments</h4>
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>blog_posts_id</th>
                                        <th>full_name</th>
                                        <th>email</th>
                                        <th>author</th>
                                        <th>comment</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    try {
                                        // Query to fetch approved comments (approved = 1)
                                        $stmt = $pdo->prepare("SELECT id, blog_posts_id, full_name, email, author, comment, created_at FROM comments WHERE approved = 1");
                                        $stmt->execute();
                                        $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                        $counter = 1; // Initialize counter for numbering
                                        foreach ($comments as $comment) {
                                            echo "<tr>
                                                   <td>{$counter}</td>
                                                   <td>{$comment['blog_posts_id']}</td>
                                                   <td>{$comment['full_name']}</td>
                                                   <td>{$comment['email']}</td>
                                                   <td>{$comment['author']}</td>
                                                   <td>{$comment['comment']}</td>
                                                   <td>{$comment['created_at']}</td>
                                                   <td>
                       <button type='button' class='btn btn-sm btn-primary' onclick='editComment({$comment["id"]})'><i class='fas fa-edit'></i> Edit</button>
                       <button type='button' class='btn btn-sm btn-danger' onclick='disapproveComment({$comment["id"]})'><i class='fas fa-trash-alt'></i> DisApprove</button>
                   </td>
                                               </tr>";
                                            $counter++;
                                        }
                                    } catch (PDOException $e) {
                                        echo "<tr><td colspan='7'>Error: " . $e->getMessage() . "</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div><!-- container -->
</div> <!-- Page content Wrapper -->

<!-- Edit Comments -->
<!-- Edit Comment Modal -->
<div class="modal fade" id="editCommentModal" tabindex="-1" role="dialog" aria-labelledby="editCommentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="editCommentForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCommentModalLabel">Edit Comment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="editCommentId" name="comment_id">
                    <div class="form-group">
                        <label for="editAuthor">Author</label>
                        <input type="text" class="form-control" id="editAuthor" name="author" required>
                    </div>
                    <div class="form-group">
                        <label for="editCommentText">Comment</label>
                        <textarea class="form-control" id="editCommentText" name="comment" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>







<script>
// Fetch existing comment details including full_name
// JavaScript code for Edit functionality
function editComment(commentId) {
    fetch(`get-comment.php?id=${commentId}`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('editCommentId').value = data.id;
            document.getElementById('editAuthor').value = data.author; // Set author
            document.getElementById('editCommentText').value = data.comment; // Set comment
            $('#editCommentModal').modal('show');
        });
}

document.getElementById('editCommentForm').addEventListener('submit', function (event) {
    event.preventDefault();
    const formData = new FormData(this);

    fetch('edit-comment.php', {
        method: 'POST',
        body: formData,
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Comment updated successfully');
                location.reload();
            } else {
                alert('Error updating comment');
            }
        })
        .catch(error => {
            console.error("Fetch error:", error);
            alert("An unexpected error occurred.");
        });
});



    // JavaScript code for Delete functionality
    function deleteComment(commentId) {
        if (confirm('Are you sure you want to delete this comment?')) {
            const formData = new FormData();
            formData.append('delete_comment', true);
            formData.append('comment_id', commentId);

            fetch('delete-comment.php', {
                method: 'POST',
                body: formData,
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Comment deleted successfully');
                        location.reload();
                    } else {
                        alert('Error deleting comment');
                    }
                });
        }
    }
</script>


<?php include 'includes/ad-footer.php'; ?>

<script>
    function approveComment(commentId) {
        var formData = new FormData();
        formData.append('approve_comment', true);
        formData.append('comment_id', commentId);

        // Send AJAX request to approve the comment
        fetch('approve-comment.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Comment approved successfully');
                location.reload(); // Reload the page to reflect changes
            } else {
                alert('Error approving comment');
            }
        });
    }

    function disapproveComment(commentId) {
        var formData = new FormData();
        formData.append('dis_approve_comment', true);
        formData.append('comment_id', commentId);

        // Send AJAX request to approve the comment
        fetch('dis-approve-comment.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Comment DisApproved successfully');
                location.reload(); // Reload the page to reflect changes
            } else {
                alert('Error approving comment');
            }
        });
    }
</script>
