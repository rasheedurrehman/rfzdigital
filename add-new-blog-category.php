<?php include 'includes/ad-header.php'; ?>

<?php
// Message variables
$message = '';
$message_class = '';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category_name = trim($_POST['category_name']);

    // Check if the category name is not empty
    if (!empty($category_name)) {
        try {
            // Generate a slug from the category name
            $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $category_name), '-'));

            // Insert the category with the slug into the database
            $stmt = $pdo->prepare("INSERT INTO categories (name, slug) VALUES (:name, :slug)");
            $stmt->bindParam(':name', $category_name, PDO::PARAM_STR);
            $stmt->bindParam(':slug', $slug, PDO::PARAM_STR);

            if ($stmt->execute()) {
                $message = 'Category added successfully!';
                $message_class = 'alert-success';
            } else {
                $message = 'Failed to add category. Please try again.';
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

// Display message if redirected
if (isset($_GET['message']) && isset($_GET['class'])) {
    $message = urldecode($_GET['message']);
    $message_class = urldecode($_GET['class']);
}
?>

<!-- Top Bar End -->

<div class="page-content-wrapper ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group float-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Categories</a></li>
                            <li class="breadcrumb-item active">Add New Category</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Validation</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <?php if (!empty($message)) : ?>
                            <div class="alert <?php echo $message_class; ?>" role="alert">
                                <?php echo $message; ?>
                            </div>
                        <?php endif; ?>

                        <form action="<?php echo BASE_URL; ?>add-new-blog-category" method="POST">
                            <div class="form-group">
                                <label>Category name</label>
                                <input type="text" name="category_name" class="form-control" required placeholder="Type Category Name" />
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Add Category</button>
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Categories</h4>
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Category Name</th>
                                        <th>Slug</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    try {
                                        // Database connection (assume $pdo is already defined)
                                        $stmt = $pdo->prepare("SELECT * FROM categories");
                                        $stmt->execute();
                                        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                        $counter = 1; // Initialize counter for numbering
                                        foreach ($categories as $cate) {
                                            echo "<tr>
                                                <td>{$counter}</td>
                                                <td>{$cate['name']}</td>
                                                <td>{$cate['slug']}</td>
                                                <td>{$cate['created_at']}</td>
                                                <td>
                                                    <a href='edit-category.php?id={$cate['id']}' class='btn btn-sm btn-success'>
                                                        <i class='fas fa-edit'></i>
                                                    </a>
                                                    
                                                    <a href='delete-category.php?id={$cate['id']}' class='btn btn-sm btn-danger' onclick=\"return confirm('Are you sure you want to delete this category?');\">
    <i class='fas fa-trash-alt'></i>
</a>

                                                </td>
                                            </tr>";
                                            $counter++;
                                        }
                                    } catch (PDOException $e) {
                                        echo "<tr><td colspan='6'>Error: " . $e->getMessage() . "</td></tr>";
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

<?php include 'includes/ad-footer.php'; ?>
