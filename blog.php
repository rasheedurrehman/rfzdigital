<?php 
$meta_title = "Blog - RFZ Digital";
$meta_description = "RFZ Digital Blog provides updates on web design and development, digital marketing, and technology trends. It includes expert tips and industry insights.";
$canonical_url = "https://rfzdigital.co.uk/blog";
include 'includes/header.php'; 
?>

<?php 
require_once 'config.php';

// Define number of items per page
$items_per_page = 6;

// Get current page number from URL (defaults to 1 if not set)
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Calculate the offset for SQL query
$offset = ($current_page - 1) * $items_per_page;

// Prepare the SQL query to fetch only published blog posts (status = 1)
$stmt = $pdo->prepare("SELECT * FROM blog_posts WHERE status = 1 ORDER BY created_at DESC LIMIT :limit OFFSET :offset");
$stmt->bindParam(':limit', $items_per_page, PDO::PARAM_INT);
$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$blogs = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Get total number of published blogs to calculate total pages
$total_blogs_stmt = $pdo->query("SELECT COUNT(*) FROM blog_posts WHERE status = 1");
$total_blogs = $total_blogs_stmt->fetchColumn();
$total_pages = ceil($total_blogs / $items_per_page);
?>

<main class="container">
    <section class="text-center my-2 blog-section-top-padding">
        <h1>RFZ Digital Blogs</h1>
        <p class="text-muted">Our official blog with news, technology advice, and business culture.</p>
    </section>

    <section class="row blog-container" id="blog-list">
        <?php foreach ($blogs as $blog): ?>
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
    </section>

    <!-- Load More Button -->
    <?php if ($current_page < $total_pages): ?>
        <div class="text-center mt-4 mb-4">
            <button id="load-more" class="btn btn-primary" data-page="<?php echo $current_page + 1; ?>">Load More</button>
        </div>
    <?php endif; ?>
</main>

<script>
    document.getElementById("load-more").addEventListener("click", function() {
        let button = this;
        let page = button.getAttribute("data-page");
        let xhr = new XMLHttpRequest();
        xhr.open("GET", "load_more.php?page=" + page, true);
        xhr.onload = function () {
            if (xhr.status === 200) {
                let response = xhr.responseText;
                document.getElementById("blog-list").innerHTML += response;
                let nextPage = parseInt(page) + 1;
                button.setAttribute("data-page", nextPage);
                if (nextPage > <?php echo $total_pages; ?>) {
                    button.style.display = "none";
                }
            }
        };
        xhr.send();
    });
</script>

<!--~~~~~~~~~~~~~~~~~~~~~~~~
     CTA Base 
~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <div class="cta-base">
      <div class="container">
        <div class="cta-base__wrapper border-bottom-dark">
          <div class="row align-items-center justify-content-center justify-content-md-between gutter-y-20">
            <div class="col-xxl-5 col-xl-6 col-lg-6 col-md-7 col-10">
              <div class="cta-base__text-block">
                <h2 class="heading-md text-white">Ready to grow your business digitally?</h2>
              </div>
            </div>
            <div class="col-xl-auto col-lg-4 col-md-5 col-xs-8 col-10">
              <div class="cta-base__button">
                <a href="<?php echo BASE_URL; ?>contact-us" class="btn-masco rounded-pill btn-fill--up">
                  <span>Let's start the project</span></a>
                <div class="cta-base__button-shape">
                  <img src="./image/home-1/cta-shape.svg" alt="image alt">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

<?php include 'includes/footer.php'; ?>
