<?php include 'includes/ad-header.php'; ?>

<?php
$message = '';
$message_class = '';

// Check if category ID is provided in the URL
if (isset($_GET['id'])) {
    $category_id = $_GET['id'];

    // Fetch the current category details
    try {
        $stmt = $pdo->prepare("SELECT * FROM categories WHERE id = :id");
        $stmt->bindParam(':id', $category_id, PDO::PARAM_INT);
        $stmt->execute();
        $category = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$category) {
            echo "Category not found!";
            exit;
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        exit;
    }

    // Check if the form is submitted to update the category
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        

        $updated_name = trim($_POST['category_name']);

        if (!empty($updated_name)) {
            try {
                // Update the category name and slug in the database
                $updated_slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $updated_name), '-'));

                $stmt = $pdo->prepare("UPDATE categories SET name = :name, slug = :slug WHERE id = :id");
                $stmt->bindParam(':name', $updated_name, PDO::PARAM_STR);
                $stmt->bindParam(':slug', $updated_slug, PDO::PARAM_STR);
                $stmt->bindParam(':id', $category_id, PDO::PARAM_INT);

                if ($stmt->execute()) {
                    // After updating, fetch the updated category details again
                    $stmt = $pdo->prepare("SELECT * FROM categories WHERE id = :id");
                    $stmt->bindParam(':id', $category_id, PDO::PARAM_INT);
                    $stmt->execute();
                    $category = $stmt->fetch(PDO::FETCH_ASSOC); // Re-fetch the updated category

                    $message = 'Category updated successfully!';
                    $message_class = 'alert-success';
                } else {
                    $message = 'Failed to update category. Please try again.';
                    $message_class = 'alert-danger';
                }
            } catch (PDOException $e) {
                $message = 'Database error: ' . $e->getMessage();
                $message_class = 'alert-danger';
            }
        } else {
            $message = 'Please enter a category name.';
            $message_class = 'alert-warning';
        }
    }
} else {
    echo "Invalid category ID.";
    exit;
}
?>

<!-- Top Bar End -->

<div class="page-content-wrapper ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">Edit Category</h4>
                </div>
            </div>
        </div>

        <!-- Display message if present -->
        <?php if (!empty($message)) : ?>
            <div class="alert <?php echo $message_class; ?>" role="alert">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <!-- Edit Category Form -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="<?php echo BASE_URL; ?>edit-category?id=<?php echo $category['id']; ?>" method="POST">

                            <div class="form-group">
                                <label>Category name</label>
                                <input type="text" name="category_name" class="form-control" value="<?php echo htmlspecialchars($category['name']); ?>" required />
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Update Category</button>
                        </form>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

        <!-- Back Button -->
        <div class="row">
            <div class="col-lg-12">
                <a href="<?php echo BASE_URL; ?>add-new-blog-category" class="btn btn-secondary">Back</a>
                
            </div>
        </div>
    </div><!-- container -->
</div> <!-- Page content Wrapper -->

<?php include 'includes/ad-footer.php'; ?>
