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
                            <li class="breadcrumb-item"><a href="#">RFZ Digital</a></li>
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">All Blog</li>
                        </ol>
                    </div>
                    <!-- <h4 class="page-title">Button</h4> -->
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->
        <!-- end page title end breadcrumb -->
        <?php


if (isset($_SESSION['success'])) {
    echo "<div class='alert alert-success'>" . $_SESSION['success'] . "</div>";
    unset($_SESSION['success']); // Remove message after displaying
} elseif (isset($_SESSION['error'])) {
    echo "<div class='alert alert-danger'>" . $_SESSION['error'] . "</div>";
    unset($_SESSION['error']); // Remove error message after displaying
}
?>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        

                        <a href="<?php echo BASE_URL; ?>add-new-blog" class="btn btn-primary mt-3">Add New Blog</a>
                            
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Un-Published Blogs</h4>
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Title</th>
                                        
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
    <?php
    try {
        // Database connection (assume $pdo is already defined)
        $stmt = $pdo->prepare("SELECT * FROM blog_posts WHERE status = 0");
        $stmt->execute();
        $blogposts = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $counter = 1; // Initialize counter for numbering
        foreach ($blogposts as $b_post) {
            echo "<tr>
                <td>{$counter}</td>
                <td>{$b_post['title']}</td>
                
                <td>{$b_post['created_at']}</td>
                <td>
                    <a href='edit-blog.php?id={$b_post['id']}' class='btn btn-warning btn-sm'>
                        <i class='fas fa-edit'></i> Edit
                    </a>
                    <a href='publish-blog.php?id={$b_post['id']}' class='btn btn-success btn-sm'>
                        <i class='fas fa-check'></i> Publish
                    </a>
                    
                    <a href='delete-blog.php?id={$b_post['id']}' class='btn btn-danger btn-sm'>
                        <i class='fas fa-check'></i> Delete
                    </a>
                </td>
            </tr>";
            $counter++;
        }
    } catch (PDOException $e) {
        echo "<tr><td colspan='9'>Error: " . $e->getMessage() . "</td></tr>";
    }
    ?>
</tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
        <!-- end page title end breadcrumb -->
        
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Published Blogs</h4>
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Title</th>
                                        <th>Slug</th>
                                        <th>Meta Title</th>
                                        <th>Meta Description</th>
                                        <th>Canonical url</th>
                                        <th>Category Name</th>
                                        <!-- <th>content</th> -->
                                        <th>Featured Image</th>
                                        <th>Tags</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
    <?php
    try {
        // Database connection (assume $pdo is already defined)
        $stmt = $pdo->prepare("SELECT * FROM blog_posts WHERE status = 1");
        $stmt->execute();
        $blogposts = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $counter = 1; // Initialize counter for numbering
        foreach ($blogposts as $b_post) {
            echo "<tr>
                <td>{$counter}</td>
                <td>{$b_post['title']}</td>
                <td>{$b_post['slug']}</td>
                <td>{$b_post['meta_title']}</td>
                <td>{$b_post['meta_description']}</td>
                <td>{$b_post['canonical_url']}</td>
                <td>{$b_post['category_name']}</td>
                <td>{$b_post['featured_image']} </td>
                <td>{$b_post['tags']}</td>
                <td>{$b_post['created_at']}</td>
                <td>
                    <a href='edit-blog.php?id={$b_post['id']}' class='btn btn-warning btn-sm'>
                        <i class='fas fa-edit'></i> Edit
                    </a>
                    
                    <a href='un-published-blog.php?id={$b_post['id']}' class='btn btn-danger btn-sm'>
                        <i class='fas fa-uncheck'></i> Draft
                    </a>
                </td>
            </tr>";
            $counter++;
        }
    } catch (PDOException $e) {
        echo "<tr><td colspan='9'>Error: " . $e->getMessage() . "</td></tr>";
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
