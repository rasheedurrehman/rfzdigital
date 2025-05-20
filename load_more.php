<?php
require_once 'rfzwebdb.php';

// Define number of items per page
$items_per_page = 6;

// Get current page number from URL
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $items_per_page;

// Fetch published blog posts
$stmt = $pdo->prepare("SELECT * FROM blog_posts WHERE status = 1 ORDER BY created_at DESC LIMIT :limit OFFSET :offset");
$stmt->bindParam(':limit', $items_per_page, PDO::PARAM_INT);
$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$blogs = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($blogs as $blog): ?>
    <div class="col-md-4 mb-4 blog-item">
        <div class="blog-card">
            <a href="blog/<?php echo $blog['slug']; ?>">
                <img src="uploads/<?php echo htmlspecialchars($blog['featured_image']); ?>" alt="Blog Image" class="blog-image">
            </a>
            <div class="p-2">
                <a href="blog/<?php echo $blog['slug']; ?>">
                    <h3 class="blog-title"><?php echo $blog['title']; ?></h3>
                </a>
                <a href="blog/<?php echo $blog['slug']; ?>" class="text-primary mt-3">Read More</a>
            </div>
        </div>
    </div>
<?php endforeach; ?>
