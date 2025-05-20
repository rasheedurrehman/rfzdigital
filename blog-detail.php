<?php
 
ob_start(); // Start output buffering
// Include the header to load CSS and establish the DB connection
include 'includes/header.php';

// Get blog slug from URL
$slug = isset($_GET['slug']) ? $_GET['slug'] : '';

// Fetch blog details using slug
$query = "SELECT * FROM blog_posts WHERE slug = :slug";
$stmt = $pdo->prepare($query);
$stmt->execute(['slug' => $slug]);
$blog = $stmt->fetch(PDO::FETCH_ASSOC);

// If no blog found, redirect to 404
if (!$blog) {
    // Ensure that no output is sent before redirect
    
    header("Location: 404.php");

    exit;
    
}

// Blog ID for comments and FAQs
$blogId = $blog['id'];
ob_end_flush(); 
?> 



<div class="container my-5 single-blog-padding-top">


<!-- progress bar -->

<!-- Progress Bar -->
<div class="progress-bar-container">
  <div class="progress-bar"></div>
</div>

<style>
/* Progress Bar */
.progress-bar-container {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 5px;
  background-color: #f0f0f0;
  z-index: 9999;
  opacity: 0;
  visibility: hidden;
  transition: opacity 0.3s ease, visibility 0.3s ease;
}

.progress-bar {
  height: 100%;
  background-color: black;
  width: 0%;
  transition: width 0.3s ease;
}
</style>

<script>
document.addEventListener("DOMContentLoaded", function () {
  const progressBarContainer = document.querySelector(".progress-bar-container");
  const progressBar = document.querySelector(".progress-bar");

  function updateProgressBar() {
    const totalHeight = document.body.scrollHeight - window.innerHeight;
    const progress = (window.scrollY / totalHeight) * 100;
    progressBar.style.width = progress + "%";

    // Show progress bar only when user scrolls
    if (progress > 0) {
      progressBarContainer.style.opacity = "1";
      progressBarContainer.style.visibility = "visible";
    } else {
      progressBarContainer.style.opacity = "0";
      progressBarContainer.style.visibility = "hidden";
    }
  }

  window.addEventListener("scroll", updateProgressBar);
  window.addEventListener("resize", updateProgressBar);
});
</script>





  <div class="row justify-content-center">
    <div class="col-lg-9">
      <!-- Blog Title -->
      <h1 class="text-center mb-4 single-blog-title"><?php echo htmlspecialchars($blog['title']); ?></h1>

      <!-- Featured Image -->
      <div class="text-center mb-4">
    <img src="uploads/<?php echo htmlspecialchars($blog['featured_image']); ?>" alt="<?php echo htmlspecialchars($blog['alt']); ?>" class="mb-30 w-100" >
</div>


      <!-- Blog Content -->
      <div class="blog-content">
        <div><?php // echo $blog['content']; ?></div>
        <div><?php echo htmlspecialchars_decode($blog['content'], ENT_QUOTES); ?></div>




  <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Home 1  : FAQ Section 
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

 <!-- FAQs Section -->
      <?php 
        $faq_stmt = $pdo->prepare("SELECT * FROM blog_faqs WHERE blog_id = ?");
        $faq_stmt->execute([$blogId]);
        $faqs = $faq_stmt->fetchAll();

        if ($faqs):
      ?>
      <div class="home-1_faq-sections "style="padding-bottom: 20px; padding-top: 20px;">
        
        
          
            
                <h5 class="section-heading__title " style="font-size: 32px; font-weight: 600; padding-bottom: 10px">Frequently asked questions</h5>
              
            
          
          <div class="row row--custom">
            <div class="container-fluid">
              <div class="accordion-style-1" id="home-1-faq">
                <?php foreach ($faqs as $faq): ?>
                <div class="accordion-item">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-<?php echo $faq['id']; ?>" aria-expanded="true" aria-controls="home-1-faq-item-<?php echo $faq['id']; ?>">
                    <?php echo htmlspecialchars($faq['question']); ?>
                  </button>
                  <div id="home-1-faq-item-<?php echo $faq['id']; ?>" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                    <div class="accordion-item__body">
                      <?php echo htmlspecialchars($faq['answer']); ?>
                    </div>
                  </div>
                </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        
      </div>
      <?php else: ?>
      <p>No FAQs found for this blog.</p>
      <?php endif; ?>
    






      </div>
      <h3 class="blog-bottom-text">Thanks for reading </h3>
                        <div class="blog-content__social-options">
                            <div class="social-options-left">
    <?php 
    // Count the total approved comments for the blog (approved = 1)
    $commentsCountQuery = "SELECT COUNT(*) as total_comments FROM comments WHERE blog_posts_id = :blog_posts_id AND approved = 1";
    $commentsCountStmt = $pdo->prepare($commentsCountQuery);
    $commentsCountStmt->execute(['blog_posts_id' => $blogId]);
    $commentsCount = $commentsCountStmt->fetch(PDO::FETCH_ASSOC)['total_comments'];

    // Default to 0 if no comments are approved
    if ($commentsCount == 0) {
        $commentsCount = 0;
    }
    ?>
    <span><img src="./image/blog/text.svg" alt="comments"><?php echo htmlspecialchars($commentsCount); ?></span>
</div>
<div class="social-options-right position-relative">
        <span id="shareButton" class="cursor-pointer">
            <img src="./image/blog/share.svg" alt="Share">
        </span>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

        <div id="socialPopup" class="social-popup">
            <a href="#" onclick="shareOnSocial(event, 'facebook')">
                 <i class="fa-brands fa-facebook"></i>
            </a>
            <a href="#" onclick="shareOnSocial(event, 'twitter')">
                 <i class="fa-brands fa-twitter"></i>
            </a>
            <a href="#" onclick="shareOnSocial(event, 'linkedin')">
                 <i class="fa-brands fa-linkedin"></i>
            </a>
        </div>
    </div>
    <style>
        .social-popup {
            display: none; 
            position: absolute;
            left: -150px; 
            top: -9px;
            background: white;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 5px 20px 5px 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }
        .social-popup a {
            width: 24px;
            margin: 0px 5px 0px 5px;
            cursor: pointer;
            font-size: 20px;
        }
        #shareButton {
            cursor: pointer;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const shareButton = document.getElementById('shareButton');
            const socialPopup = document.getElementById('socialPopup');

            // Toggle popup visibility on button click
            shareButton.addEventListener('click', (event) => {
                event.stopPropagation(); // Prevent click from propagating
                const isVisible = socialPopup.style.display === 'flex';
                socialPopup.style.display = isVisible ? 'none' : 'flex';
            });

            // Close popup when clicking outside
            document.addEventListener('click', () => {
                socialPopup.style.display = 'none';
            });

            // Keep popup visible on hover
            socialPopup.addEventListener('mouseenter', () => {
                socialPopup.style.display = 'flex';
            });

            socialPopup.addEventListener('mouseleave', () => {
                socialPopup.style.display = 'none';
            });
        });

        // Share function
        function shareOnSocial(event, platform) {
            // Prevent the default behavior of the <a> tag
            event.preventDefault();

            const url = encodeURIComponent(window.location.href);
            const title = encodeURIComponent(document.title);

            let shareUrl = '';
            switch (platform) {
                case 'facebook':
                    shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${url}`;
                    break;
                case 'twitter':
                    shareUrl = `https://twitter.com/intent/tweet?url=${url}&text=${title}`;
                    break;
                case 'linkedin':
                    shareUrl = `https://www.linkedin.com/shareArticle?mini=true&url=${url}&title=${title}`;
                    break;
            }

            // Open the social share URL in a new window
            window.open(shareUrl, '_blank', 'width=600,height=400');
        }
    </script>
                        </div>
                        <!-- Comments Section -->
                    <div class="comment-widget__wrapper">
                        <h3 class="heading-xs-2 mb-40">Comments:</h3>

                        <!-- Display comments dynamically -->
                        <?php
                        $commentsQuery = "SELECT * FROM comments WHERE blog_posts_id = :blog_posts_id AND approved = 1 ORDER BY created_at DESC";

                        $commentsStmt = $pdo->prepare($commentsQuery);
                        $commentsStmt->execute(['blog_posts_id' => $blogId]);
                        $comments = $commentsStmt->fetchAll(PDO::FETCH_ASSOC);

                        if ($comments):
                            foreach ($comments as $comment): ?>
                                <div class="comment-widget">
                                    <div class="comment-widget__inner">
                                        <div class="comment-widget__body">
                                            <div class="comment-widget__meta">
                                                <div class="comment-widget__user">
                                                    <h3 class="comment-widget__user-name"><?php echo htmlspecialchars($comment['full_name']); ?></h3>
                                                    <span class="comment-widget__date"><?php echo date('M d, Y', strtotime($comment['created_at'])); ?></span>
                                                </div>
                                            </div>
                                            <p><?php echo htmlspecialchars($comment['comment']); ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; 
                        else: ?>
                            <p>No comments yet. Be the first to comment!</p>
                        <?php endif; ?>

                        <!-- Comment Form -->
                        <form class="blog-content-comment-box" method="post" action="add-comment.php">
                            <input type="hidden" name="blog_posts_id" value="<?php echo $blogId; ?>">
                            <div style="display: flex; gap: 10px; margin-bottom: 10px;">
                                <input type="text" name="full_name" class="form-control bg-light-2" placeholder="Full Name" required style="flex: 1; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
                                <input type="email" name="email" class="form-control bg-light-2" placeholder="Email" required style="flex: 1; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
                            </div>
                            <textarea name="comment" class="form-control bg-light-2 textarea" placeholder="Write a comment..." required style="width: 100%; height: 100px; padding: 10px; border: 1px solid #ccc; border-radius: 4px; margin-bottom: 10px;"></textarea>
                            <button type="submit" class="blog-content__reply-button" style="padding: 10px 20px; border: none; background-color: #007BFF; color: #fff; border-radius: 4px; cursor: pointer;">Publish</button>
                        </form>
                    </div>
                                <!-- Related Blogs -->
                    <?php
// Get the category ID of the current blog
$categoryId = $blog['category_id'];

// Fetch the latest related blogs (limit to 3)

$relatedBlogsQuery = "SELECT * FROM blog_posts WHERE category_id = :category_id AND id != :blog_id AND status = 1 ORDER BY created_at DESC LIMIT 3";
$relatedStmt = $pdo->prepare($relatedBlogsQuery);
$relatedStmt->execute([
    'category_id' => $categoryId,
    'blog_id' => $blogId
]);
$relatedBlogs = $relatedStmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Related Blogs Section -->
<?php if ($relatedBlogs): ?>
    <div class="related-blogs mt-5">
        <h3 style="padding-bottom: 10px;">Related Blogs</h3>
        <div class="row">
            <?php foreach ($relatedBlogs as $related): ?>
                <div class="col-md-4">
                    <div class="related-blog-card">
                        <a href="blog/<?php echo htmlspecialchars($related['slug']); ?>">
                            <img src="uploads/<?php echo htmlspecialchars($related['featured_image']); ?>" alt="<?php echo htmlspecialchars($related['alt']); ?>" class="img-fluid">
                            <h4><?php echo htmlspecialchars($related['title']); ?></h4>
                        </a>
                        <a href="blog/<?php echo htmlspecialchars($related['slug']); ?>" class="text-primary mt-3">Read More</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>

<!-- Add some styling -->
<style>
    .related-blogs {
        padding-top: 30px;
    }
    .related-blog-card {
        border: 1px solid #ddd;
        border-radius: 5px;
        overflow: hidden;
        text-align: center;
        padding: 10px;
        background: #fff;
    }
    .related-blog-card img {
        max-width: 100%;
        height: auto;
        border-radius: 5px;
    }
    .related-blog-card h4 {
        font-size: 18px;
        margin-top: 10px;
        color: #212529 !important;
    }
    .related-blog-card .text-primary {
        display: block;
    }
</style>
    </div>
  </div>
</div>
 <?php if (isset($_SESSION['success_msg'])): ?>
        <div class="popup-overlay" id="popupOverlay">
            <div class="popup">
                <p><?php echo $_SESSION['success_msg']; ?></p>
                <button onclick="closePopup()">OK</button>
            </div>
        </div>

        <script>
            // Show popup when page loads
            document.getElementById("popupOverlay").style.display = "flex";

            function closePopup() {
                document.getElementById("popupOverlay").style.display = "none";
            }

            // Remove session message after showing
            setTimeout(() => {
                <?php unset($_SESSION['success_msg']); ?>
            }, 500);
        </script>
    <?php endif; ?>

<style>
        /* Full-screen overlay with blur effect */
        .popup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); /* Dark overlay */
            backdrop-filter: blur(5px); /* Blurred background */
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 999;
        }

        /* Popup box */
        .popup {
            background: white;
            color: black;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
            text-align: center;
            z-index: 1000;
        }

        .popup button {
            margin-top: 10px;
            background: #007BFF;
            color: white;
            border: none;
            padding: 8px 15px;
            cursor: pointer;
            border-radius: 4px;
        }
    </style>


    <!-- side bar popup -->

<div id="scrollTriggerPopup" class="scroll-trigger-popup">
    <button class="close-btn" onclick="closeScrollPopup()">✖</button>
    <h4>Get a Professional Website for Your Business</h4>
    <!-- <p>Speak with our experts and take your ideas to the next level.</p> -->
    <a href="https://rfzdigital.co.uk/contact-us" target="_blank">
        Contact Us
    </a>
</div>

<style>
/* Custom Scroll Popup Styling */
.scroll-trigger-popup {
    position: fixed;
    right: 5px;
    bottom: 130px;
    width: 265px;
    background: linear-gradient(135deg, yellow, yellow);
    color: white;
    border-radius: 12px;
    box-shadow: 0px 4px 15px rgba(0, 72, 255, 0.4);
    padding: 20px;
    display: none;
    z-index: 1000;
    opacity: 0;
    transition: opacity 0.5s ease-in-out, transform 0.3s ease-in-out;
    transform: translateY(20px);
}

.scroll-trigger-popup.show {
    display: block;
    opacity: 1;
    transform: translateY(0);
}

.scroll-trigger-popup h4 {
    color: #000;
    font-size: 18px;
    padding-top: 6px;
    margin-bottom: 10px;
    font-weight: bold;
}

.scroll-trigger-popup p {
    font-size: 14px;
    margin-bottom: 15px;
}

.scroll-trigger-popup a {
    display: block; /* Make it behave like a block element */
    text-align: center; /* Center the text inside */
    background: #000;
    color: #FFF;
    font-weight: bold;
    border: none;
    padding: 10px;
    cursor: pointer;
    border-radius: 5px;
    text-decoration: none;
    margin: 10px auto 0 auto; /* Centering the button with some top margin */
    width: 50%;
}

.scroll-trigger-popup button {
    background: #00d8ff;
    color: #002855;
    font-weight: bold;
    border: none;
    padding: 10px;
    cursor: pointer;
    border-radius: 5px;
    width: 100%;
    font-weight: 600;
}

.scroll-trigger-popup .close-btn {
    color: #000 !important;
    position: absolute;
    top: -6px;
    right: -113px;
    background: none;
    border: none;
    font-size: 18px;
    color: white;
    cursor: pointer;
}
</style>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const popup = document.getElementById("scrollTriggerPopup");
    let hasPopupShown = false;

    function checkScroll() {
        const totalHeight = document.body.scrollHeight - window.innerHeight;
        const scrolled = (window.scrollY / totalHeight) * 100;

        if (scrolled >= 5 && !hasPopupShown) {
            popup.classList.add("show");
            hasPopupShown = true; // Ensure it appears only once per session
        }
    }

    // Fix: Define close function globally
    window.closeScrollPopup = function () {
        popup.classList.remove("show");
    };

    window.addEventListener("scroll", checkScroll);
});
</script>





<?php include 'includes/contact-us-section.php'; ?>


<?php include 'includes/footer.php'; ?>