<style type="text/css">

  .success-message {
    margin-top: 15px;
    padding: 10px;
    color: #155724;
    background-color: #d4edda;
    border: 1px solid #c3e6cb;
    border-radius: 5px;
    text-align: center;
    font-size: 14px;
  }

  .error-message {
    margin-top: 15px;
    padding: 10px;
    color: #721c24;
    background-color: #f8d7da;
    border: 1px solid #f5c6cb;
    border-radius: 5px;
    text-align: center;
    font-size: 14px;
  }

</style>
<?php
$meta_title = "About Us - RFZ Digital";
$meta_description = "Learn about RFZ Digital, a trusted provider of website design, development & digital solutions. We build trust daily through clear communication & results";
$canonical_url = "https://rfzdigital.co.uk/about-us";


// Include database connection and PHPMailer files
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
include 'includes/header.php';

// Use PHPMailer namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$message = ""; // Feedback message for the form

// Load the user email template
$templateFilePathUser = 'user-email-template.php';
ob_start();
include $templateFilePathUser;
$userEmailTemplate = ob_get_clean();

// Load the admin email template
$templateFilePathAdmin = 'user-admin-email-template.php';
ob_start();
include $templateFilePathAdmin;
$adminEmailTemplate = ob_get_clean();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and validate input data
    function sanitize_input($data) {
        return htmlspecialchars(trim($data));
    }

    $name = sanitize_input($_POST['name']);
    $email = filter_var(sanitize_input($_POST['email']), FILTER_VALIDATE_EMAIL);
    $phone = sanitize_input($_POST['phone']);
    $messageContent = sanitize_input($_POST['message']); // Avoid conflict with $message variable

    // Check if all fields are filled and email is valid
    if (!empty($name) && !empty($email) && !empty($phone) && !empty($messageContent)) {
        // Database insertion logic
        try {
            $sql = "INSERT INTO contact_form (name, email, phone, message) VALUES (:name, :email, :phone, :message)";
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
            $stmt->bindParam(':message', $messageContent, PDO::PARAM_STR);

            if ($stmt->execute()) {
                // PHPMailer Setup
                $adminEmail = 'info@rfzdigital.co.uk'; // Replace with admin email
                $adminPassword = 'f)yWpd$)c6f~'; // Replace with secure credentials
// Capture the form submission URL
                    $page_url = $_SERVER['HTTP_REFERER'];
                    
                    
                // === SEND EMAIL TO ADMIN ===
                try {
                    $mail = new PHPMailer(true);

                    // Server settings
                    $mail->isSMTP();
                    $mail->Host = 'premium55.web-hosting.com'; // Replace with your SMTP server
                    $mail->SMTPAuth = true;
                    $mail->Username = $adminEmail;
                    $mail->Password = $adminPassword;
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                    $mail->Port = 465;

                    // Debugging (Enable for troubleshooting)
                    // $mail->SMTPDebug = 2;

                    // Common Settings
                    $mail->isHTML(true);
                    $mail->setFrom($adminEmail, 'RFZ Digital');
                    $mail->addAddress($adminEmail); // Admin's email
                    $mail->addReplyTo($email, $name); // User's email for reply

                    // Replace placeholders in the admin template
                        $adminEmailContent = str_replace(
                            ['{{name}}', '{{email}}', '{{phone}}', '{{message}}', '{{page_url}}'],
                            [$name, $email, $phone, $messageContent, $page_url],
                            $adminEmailTemplate
                        );

                    // Admin email content
                        $mail->isHTML(true);
                        $mail->Subject = 'New Contact Form Submission';
                        $mail->Body = $adminEmailContent;
                        $mail->send(); // Send admin email

                } catch (Exception $e) {
                    error_log("Admin Mail Error: " . $mail->ErrorInfo);
                }

                // === SEND CONFIRMATION EMAIL TO USER ===
                try {
                    $userMail = new PHPMailer(true);
                    $userMail->isSMTP();
                    $userMail->Host = 'premium55.web-hosting.com';
                    $userMail->SMTPAuth = true;
                    $userMail->Username = $adminEmail;
                    $userMail->Password = $adminPassword;
                    $userMail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                    $userMail->Port = 465;

                    $userMail->isHTML(true);
                    $userMail->setFrom($adminEmail, 'RFZ Digital');
                    $userMail->addAddress($email); // Send to User
                    $userMail->addReplyTo($adminEmail, 'RFZ Digital');

                    $userEmailContent = str_replace(
                            ['{{name}}', '{{message}}'],
                            [$name, $messageContent],
                            $userEmailTemplate
                        );

                    // Email Content
                    $userMail->Subject = 'Thank You for Contacting Us';
                    
                    $userMail->Body = $userEmailContent;

                    $userMail->send(); // Send to User
                    $message = "<div class='success-message'>Form submitted successfully! A confirmation email has been sent to your inbox.</div>";

                } catch (Exception $e) {
                    error_log("User Mail Error: " . $userMail->ErrorInfo);
                    $message = "<div class='error-message'>Form submitted, but email could not be sent. Please try again later.</div>";
                }

            } else {
                $message = "<div class='error-message'>Failed to submit the form. Please try again.</div>";
            }
        } catch (PDOException $e) {
            error_log("Database Error: " . $e->getMessage());
            $message = "<div class='error-message'>An error occurred while saving your details. Please try again later.</div>";
        }
    } else {
        $message = "<div class='error-message'>Please fill in all fields with valid information.</div>";
    }
}

?>



          <style>
            .custom-bg {
              padding-top: 100px;
              padding-bottom: 0px;
              background: linear-gradient(
                to right, 
                white 30%, 
                #77ffad 75%, 
                #35ff47 100%
              );

            }

            .text-muted{
              padding-bottom: 5px;
            }
            .img-fluid {
              max-width: 100%;
              max-height: 448px;
            }

            span {
              display: inline;
              white-space: normal;
            }
            @media (min-width: 600px) {
              .mb-3 {
                font-size: 40px;
              }
            }
            @media (min-width: 992px) {
              .mb-3 {
                font-size: 40px;
              }
            }
            @media (min-width: 1200px) {
              .mb-3 {
                font-size: 52px;
                font-weight:700;
              }
            }
            @media (min-width: 1400px) {
              .mb-3 {
                font-size: 50px;
                font-weight: 700;
              }
            }
          </style>
          <section class="custom-bg">
            <div class="container">
              <div class="row align-items-center">
                <!-- Left Column -->
                <div class="col-md-7">
                  <h1 class="text-uppercase text-muted service-hero-h1" >Your Trusted Digital & Technology Partner</h1>
                  <h2 class="mb-3 about-us-hero-heading">Delivering Digital & Technology Solutions for Business across  <span style="color:#1463FF; white-space:normal;">UK, Ireland and worldwide. </span></h2>
                  <p class="mb-4 about-us-hero-text">At RFZ Digital, we specialise in delivering innovative digital and technology solutions that drive business success across the UK, Ireland, and worldwide. From website development and digital marketing to advanced IT solutions, our expert team helps businesses of all sizes enhance their online presence, streamline operations, and stay ahead in a rapidly evolving digital landscape.</p>
                  <a href="<?php echo BASE_URL; ?>contact-us" class="btn btn-masco service-hero-section-btn">Get Started</a>
                </div>
                <!-- Right Column -->
                <div class="col-md-5 d-flex justify-content-center">
                  <img src="./image/Digital-Strategy-Consulting-2-1-2048x1781.webp" alt="Placeholder Image" class="img-fluid rounded  ">
                </div>
              </div>
            </div>
          </section>

    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~
    Home 1 : Brand Section
~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<?php include 'includes/logo-slider.php';?>


     <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Home 1  : Content Section 1
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

<div class="home-1_content-section-2 padding-bottom-120 index-section-3" >
  <div class="container">
    <div class="row row--custom change-order ">
      <div class="col-xl-5 col-lg-5 col-auto" data-aos-duration="1000" data-aos="fade-right">
        <div class="home-1_content-image-2 content-image--mobile-width">
          <img src="./image/about-us/pbhtxpi1tdgmmmihzzin.webp" alt="alternative text">

        </div>
      </div>
      <div class="offset-xl-0 col-xl-6 col-lg-7 col-md-11" data-aos-duration="1000" data-aos="fade-left">
        <div class="content">
          <div class="content-text-block">
            <h2 class="text-uppercase text-muted services-heading-h1" >Our Story </h2>

            <p>
              At RFZ Digital, our journey began with a vision to bridge the gap between businesses and the ever-evolving digital world. Founded with a passion for innovation, we set out to empower companies across the UK, Ireland, and beyond with cutting edge digital and technology solutions.

            </p>
            <p>
              What started as a small team of tech enthusiasts has grown into a dynamic force, helping businesses enhance their online presence, streamline operations, and embrace digital transformation. Our commitment to excellence, customer-centric approach, and drive for innovation have enabled us to deliver solutions that make a real impact.

            </p> <p>
              Today, we continue to push boundaries, helping businesses of all sizes thrive in the digital era. Whether it’s web development, digital marketing, or advanced IT solutions, we are here to turn ideas into reality and challenges into opportunities.

            </p>
          </div>

        </div>
        <div class="services-page-aboutus-section-button" style="">
          <a href="<?php echo BASE_URL; ?>contact-us" class="btn-masco btn-masco--header rounded-pill btn-fill--up">
            <span>Contact Us</span></a>
          </div>
        </div>
      </div>
    </div>
  </div>

<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Home 5  : Feature Section
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->







<!-- Services Section -->
<div class="home-1_service-section padding-bottom-120" id="feature">
  <div class="home-1_service-section-shape">
    <img src="./image/home-1/service-section-shape.svg" alt="image alt">
  </div>
  <div class="container">
    <div class="home-1_service-section-wrapper">
      <div class="row justify-content-center">
        <div class="col-xxl-8 col-xl-7 col-lg-8 col-md-9">
          <div class="section-heading text-center">
            <h2 class="section-heading__title heading-md text-black">Unlock Your Business Potential with Our Expert Digital & Technology Services</h2>
          </div>
        </div>
      </div>
      <div class="row gutter-y-default justify-content-center">
        <div class="col-xl-6 col-lg-6 col-md-10">
          <a href="<?php echo BASE_URL; ?>website-design" class="service-card   hvr-fill" data-aos-duration="1000" data-aos="fade-right">
            <div class="service-card__icon">
              <img src="./image/home-1/icons/service-icons/website-Design-&-DEVELOPMENT.png" alt="Website Development & Design" class="inline-svg">
            </div>
            <div class="service-card__body">
              <h3 class="service-card__title">Website Design and Development</h3>
              <p>We design and develop websites that are user-friendly and developed to drive results for your business.
              </p>
              <span class="service-card__link btn-link btn-arrow">Find out more</span>
            </div>
          </a>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-10">
          <a href="<?php echo BASE_URL; ?>seo" class="service-card   hvr-fill" data-aos-duration="1000" data-aos="fade-left">
            <div class="service-card__icon">
              <img src="./image/home-1/icons/service-icons/Seo.png" alt="Search Engine Optimisation" class="inline-svg">
            </div>
            <div class="service-card__body">
              <h3 class="service-card__title">Search Engine Optimisation</h3>
              <p>We optimise your website to rank higher on search engines, driving more website traffic to bring more sales.</p>
              <span class="service-card__link btn-link btn-arrow">Find out more</span>
            </div>
          </a>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-10">
          <a href="<?php echo BASE_URL; ?>social-media-marketing" class="service-card   hvr-fill" data-aos-duration="1000" data-aos="fade-right">
            <div class="service-card__icon">
              <img src="./image/home-1/icons/service-icons/Social-Media.png" alt="Social Media Managment" class="inline-svg">
            </div>
            <div class="service-card__body">
              <h3 class="service-card__title">Social Media Management</h3>
              <p>We manage your social media presence, creating engaging content that grows your business and drives sales.</p>
              <span class="service-card__link btn-link btn-arrow">Find out more</span>
            </div>
          </a>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-10">
          <a href="<?php echo BASE_URL; ?>graphic-design" class="service-card   hvr-fill" data-aos-duration="1000" data-aos="fade-left">
            <div class="service-card__icon">
              <img src="./image/home-1/icons/service-icons/Grahpic.png" alt="Grahpic Design" class="inline-svg">
            </div>
            <div class="service-card__body">
              <h3 class="service-card__title">Graphic Design</h3>
              <p>Our team creates high-quality designs that enhance your business identity and drive more conversions.</p>
              <span class="service-card__link btn-link btn-arrow">Find out more</span>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Testimonial Slider Start -->
<style type="text/css">
/* General Slider Styling */
.testimonial-slider {
  width: 100%;
  overflow: hidden;
  position: relative;
  background-color: #fafafa;
  padding: 20px 0;
}

.slider-wrapper {
  display: flex;
  gap: 20px;
  width: 100%;
  animation: slide-left 30s linear infinite; /* Default animation */
}

.testimonial-card {
  flex: 0 0 calc(33.33% - 20px); /* Responsive cards, 3 per row */
  background: #fff;
  border: 1px solid #e6e6e6;
  border-radius: 10px;
  padding: 20px;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
  text-align: center;
  font-family: Arial, sans-serif;
  box-sizing: border-box;
  min-width: 300px; /* Prevent cards from shrinking */
  transition: transform 0.5s ease;
}

.testimonial-card__star {
  width: 60px;
  margin-bottom: 10px;
}

.testimonial-card__title {
  font-size: 1.5rem;
  margin: 10px 0;
  color: #333;
}

.testimonial-card__author {
  display: flex; /* Flexbox for alignment */
  justify-content: space-between; /* Push left and right elements apart */
  align-items: center; /* Vertically center items */
  margin-top: 15px; /* Add some spacing from content */
}

.testimonial-card__author-image img {
  width: 40px; /* User image size */
  height: 40px;
  border-radius: 50%; /* Circular image */
  object-fit: cover;
}

.testimonial-card__author-name {
  margin-left: 5px; /* Small gap between image and name */
  font-size: 1rem; /* Adjust font size */
  color: #333; /* Text color */
}

.testimonial-card__star {
  width: 70px; /* Adjust star size */
  height: auto;
}
.testimonial-card__author-info h4 {
  margin-top: 10px;
  font-size: 1.2rem;
  color: #333;
}

/* Animation for Sliders */
.slider-left {
  animation: slide-left 50s linear infinite; /* Speed adjusted */
}

@keyframes slide-left {
  0% {
    transform: translateX(0);
  }
  100% {
    transform: translateX(-100%); /* Move only half since it's duplicated */
  }
}

.slider-right {
  animation: slide-right 50s linear infinite; /* Speed adjusted */
}

@keyframes slide-right {
  0% {
    transform: translateX(-100%); /* Move only half since it's duplicated */
  }
  100% {
    transform: translateX(0%);
  }
}

/* Responsive Adjustments */
@media (max-width: 768px) {
  .testimonial-card {
    flex: 0 0 calc(50% - 20px); /* Show 2 cards per row on smaller screens */
  }
}
</style>

<div class="home-3_testimonial section-padding-120 testimonial-section section-padding-120" id="testimonial">
  <div class="container">
    <!-- Section Title -->
    <div class="section-heading section-heading--row">
      <div class="row text-center text-lg-initial justify-content-center justify-content-lg-between">
        <div class="col-xxl-9 col-lg-7 col-md-9 col-11">
          <h2 class="section-heading__title heading-md text-black">Discover How Our Clients Have Transformed Their Businesses with Our Services
          </h2>
        </div>
        <div class="col-xl-3 col-md-4">
          <div class="section-heading__button testimonial-btn">
            <a href="<?php echo BASE_URL; ?>contact-us" class="btn-masco btn-primary-l03 btn-shadow rounded-pill">
              <span>Get in Touch</span></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="continer">
      <!-- Testimonial Slider -->
      <div class="testimonial-slider">
        <!-- Slider Row 1 (Moves Left) -->
        <div class="slider-wrapper slider-left">
          <div class="testimonial-card">
            <h3 class="testimonial-card__title">Exceeds Expectations! 💪🏼</h3>
            <p>
              The comprehensive services have been a blessing for my brand. They handled everything – web development, SEO, graphics, and social media – with perfection. Truly my best business partner!
            </p>
            <div class="testimonial-card__author d-flex justify-content-between align-items-center">
              <!-- Left: User Image and Name -->
              <div class="d-flex align-items-center gap-1">
                <div class="testimonial-card__author-image">
                  <img src="./image/home-1/Dianne Russell-Testimonial2.webp" alt="author" />
                </div>
                <h4 class="testimonial-card__author-name mb-0">Dianne Russell</h4>
              </div>
              <!-- Right: Star Icon -->
              <img src="./image/icons/star-five.svg" class="testimonial-card__star" alt="star" />
            </div>
          </div>
          <div class="testimonial-card">
            <h3 class="testimonial-card__title">Stunning Graphic Design Work! 🎨</h3>
            <p>
              I’m thrilled with the graphics designed for my brand! Their creativity and professionalism are unmatched. They perfectly captured my vision, enhancing my brand identity. Highly recommend them!
            </p>
            <div class="testimonial-card__author d-flex justify-content-between align-items-center">
              <!-- Left: User Image and Name -->
              <div class="d-flex align-items-center gap-1">
                <div class="testimonial-card__author-image">
                  <img src="./image/home-1/Guy Hawkins-Testimonial6.webp" alt="author" />
                </div>
                <h4 class="testimonial-card__author-name mb-0">Guy Hawkins</h4>
              </div>
              <!-- Right: Star Icon -->
              <img src="./image/icons/star-five.svg" class="testimonial-card__star" alt="star" />
            </div>
          </div>
          <div class="testimonial-card">
            <h3 class="testimonial-card__title">Social Media That Delivers! 📱</h3>
            <p>
              The social media services were transformative. From strategy to execution, their campaigns boosted my engagement and followers quickly. I’m so impressed with the results delivered by their team!
            </p>
            <div class="testimonial-card__author d-flex justify-content-between align-items-center">
              <!-- Left: User Image and Name -->
              <div class="d-flex align-items-center gap-1">
                <div class="testimonial-card__author-image">
                  <img src="./image/home-1/Marvin McKinney-Testimonial3.webp" alt="author" />
                </div>
                <h4 class="testimonial-card__author-name mb-0">Marvin McKinney</h4>
              </div>
              <!-- Right: Star Icon -->
              <img src="./image/icons/star-five.svg" class="testimonial-card__star" alt="star" />
            </div>
          </div>
          <div class="testimonial-card">
            <h3 class="testimonial-card__title">SEO That Truly Works! 🚀</h3>
            <p>
              Thanks to their SEO, my website’s traffic has soared! Their tailored strategies for my niche worked wonders, and I’m now outranking my competition on major search engines. Amazing results!
            </p>
            <div class="testimonial-card__author d-flex justify-content-between align-items-center">
              <!-- Left: User Image and Name -->
              <div class="d-flex align-items-center gap-1">
                <div class="testimonial-card__author-image">
                  <img src="./image/home-1/Ronald Richards-Testimonial1.webp" alt="author" />
                </div>
                <h4 class="testimonial-card__author-name mb-0">Ronald Richards</h4>
              </div>
              <!-- Right: Star Icon -->
              <img src="./image/icons/star-five.svg" class="testimonial-card__star" alt="star" />
            </div>
          </div>
          <div class="testimonial-card">
            <h3 class="testimonial-card__title">Outstanding Web Development Support!</h3>
            <p>
              The web development team revamped my outdated site into a sleek, modern, and user-friendly platform. The attention to detail and responsiveness were incredible. I highly recommend their expertise!
            </p>
            <div class="testimonial-card__author d-flex justify-content-between align-items-center">
              <!-- Left: User Image and Name -->
              <div class="d-flex align-items-center gap-1">
                <div class="testimonial-card__author-image">
                  <img src="./image/home-1/Kristin Watson-Testimonial5.webp" alt="author" />
                </div>
                <h4 class="testimonial-card__author-name mb-0">Kristin Watson</h4>
              </div>
              <!-- Right: Star Icon -->
              <img src="./image/icons/star-five.svg" class="testimonial-card__star" alt="star" />
            </div>
          </div>
          <div class="testimonial-card">
            <h3 class="testimonial-card__title">Everything You Need in One Place! 💼</h3>
            <p>
              This all-in-one service is amazing! From development to marketing, their team excels. My business has grown steadily, thanks to their expertise in every area they’ve handled. Great work!
            </p>
            <div class="testimonial-card__author d-flex justify-content-between align-items-center">
              <!-- Left: User Image and Name -->
              <div class="d-flex align-items-center gap-1">
                <div class="testimonial-card__author-image">
                  <img src="./image/home-1/Karen Lynn-Testimonial1.webp" alt="author" />
                </div>
                <h4 class="testimonial-card__author-name mb-0">Karen Lynn</h4>
              </div>
              <!-- Right: Star Icon -->
              <img src="./image/icons/star-five.svg" class="testimonial-card__star" alt="star" />
            </div>
          </div>



          <!-- Additional Cards Here -->
        </div>

        <!-- Slider Row 2 (Moves Right) -->
        <div class="slider-wrapper slider-right" style="margin-top: 30px;">
          <div class="testimonial-card">
            <h3 class="testimonial-card__title">Exceptional SEO Services! 🌟</h3>
            <p>
              The SEO work made my site visible to the right audience. The boost in inquiries is incredible! Their attention to detail and expertise made all the difference. I’m so grateful!
            </p>
            <div class="testimonial-card__author d-flex justify-content-between align-items-center">
              <!-- Left: User Image and Name -->
              <div class="d-flex align-items-center gap-1">
                <div class="testimonial-card__author-image">
                  <img src="./image/home-1/Sophia-Carter-Testimonial7.webp" alt="author" />
                </div>
                <h4 class="testimonial-card__author-name mb-0">Sophia Carter</h4>
              </div>
              <!-- Right: Star Icon -->
              <img src="./image/icons/star-five.svg" class="testimonial-card__star" alt="star" />
            </div>
          </div>
          <div class="testimonial-card">
            <h3 class="testimonial-card__title">Graphics That Inspire! 🖌️</h3>
            <p>
              The graphic designs exceeded my expectations. They created visuals that perfectly match my vision. I’ve received so much praise from clients for the branding updates. Amazing work overall!
            </p>
            <div class="testimonial-card__author d-flex justify-content-between align-items-center">
              <!-- Left: User Image and Name -->
              <div class="d-flex align-items-center gap-1">
                <div class="testimonial-card__author-image">
                  <img src="./image/home-1/Testimonial8.webp" alt="author" />
                </div>
                <h4 class="testimonial-card__author-name mb-0">Ethan Walker</h4>
              </div>
              <!-- Right: Star Icon -->
              <img src="./image/icons/star-five.svg" class="testimonial-card__star" alt="star" />
            </div>
          </div>
          <div class="testimonial-card">
            <h3 class="testimonial-card__title">Social Media Pros! 💻</h3>
            <p>
              Their social media team is outstanding. They created beautiful campaigns that match my brand and drove engagement like never before. My following has grown, and so has my business!
            </p>
            <div class="testimonial-card__author d-flex justify-content-between align-items-center">
              <!-- Left: User Image and Name -->
              <div class="d-flex align-items-center gap-1">
                <div class="testimonial-card__author-image">
                  <img src="./image/home-1/Testimonial9.webp" alt="author" />
                </div>
                <h4 class="testimonial-card__author-name mb-0">Isabella Martinez</h4>
              </div>
              <!-- Right: Star Icon -->
              <img src="./image/icons/star-five.svg" class="testimonial-card__star" alt="star" />
            </div>
          </div>
          <div class="testimonial-card">
            <h3 class="testimonial-card__title">Stunning Website Results! 🌐</h3>
            <p>
              Their web development team amazed me with their skills. My website is now fast, stunning, and functional. They brought my ideas to life with professionalism and care. Great job!
            </p>
            <div class="testimonial-card__author d-flex justify-content-between align-items-center">
              <!-- Left: User Image and Name -->
              <div class="d-flex align-items-center gap-1">
                <div class="testimonial-card__author-image">
                  <img src="./image/home-1/Testimonial10.webp" alt="author" />
                </div>
                <h4 class="testimonial-card__author-name mb-0">Matthew Robinson</h4>
              </div>
              <!-- Right: Star Icon -->
              <img src="./image/icons/star-five.svg" class="testimonial-card__star" alt="star" />
            </div>
          </div>
          <div class="testimonial-card">
            <h3 class="testimonial-card__title">SEO Boost Like Magic! 🎯</h3>
            <p>
              Their SEO service made a huge difference! My website now ranks higher than ever, and I’ve seen real results in terms of traffic and sales. Their strategies are spot-on!
            </p>
            <div class="testimonial-card__author d-flex justify-content-between align-items-center">
              <!-- Left: User Image and Name -->
              <div class="d-flex align-items-center gap-1">
                <div class="testimonial-card__author-image">
                  <img src="./image/home-1/Testimonial11.webp" alt="author" />
                </div>
                <h4 class="testimonial-card__author-name mb-0">Olivia Hernandez</h4>
              </div>
              <!-- Right: Star Icon -->
              <img src="./image/icons/star-five.svg" class="testimonial-card__star" alt="star" />
            </div>
          </div>
          <div class="testimonial-card">
            <h3 class="testimonial-card__title">All-In-One Expertise! 🔥</h3>
            <p>
              Their team excels in everything from websites to graphics. They made my online presence much stronger, and I can’t thank them enough for their expertise and dedication. Highly recommended!
            </p>
            <div class="testimonial-card__author d-flex justify-content-between align-items-center">
              <!-- Left: User Image and Name -->
              <div class="d-flex align-items-center gap-1">
                <div class="testimonial-card__author-image">
                  <img src="./image/home-1/Testimonial12.webp" alt="author" />
                </div>
                <h4 class="testimonial-card__author-name mb-0">Liam Harris</h4>
              </div>
              <!-- Right: Star Icon -->
              <img src="./image/icons/star-five.svg" class="testimonial-card__star" alt="star" />
            </div>
          </div>




          <!-- Additional Cards Here -->
        </div>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const sliders = document.querySelectorAll(".slider-wrapper");

      sliders.forEach((slider) => {
    const slides = slider.innerHTML; // Duplicate slider content
    slider.innerHTML += slides;
  });
    });
  </script>





          <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Home 1  : FAQ Section 
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
<div class="home-1_faq-section section-padding-120">
  <div class="home-1_faq-shape-1">
    <img src="./image/home-1/faq-shape-1.svg" alt="image alt">
  </div>
  <div class="home-1_faq-shape-2">
    <img src="./image/home-1/faq-shape-2.svg" alt="image alt">
  </div>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xxl-6 col-lg-8 col-md-9">
        <div class="section-heading section-heading text-center">
          <h2 class="section-heading__title heading-md text-black">Frequently asked questions about our digital agency</h2>
        </div>
      </div>
    </div>
    <div class="row row--custom">
      <div class="col-lg-10">
        <div class="accordion-style-1" id="home-1-faq">
          <div class="accordion-item">
            <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item" aria-expanded="true" aria-controls="home-1-faq-item">
              What services do you offer?

            </button>
            <div id="home-1-faq-item" class="accordion-collapse collapse show" data-bs-parent="#home-1-faq">
              <div class="accordion-item__body">
                We offer a wide range of digital and technology solutions, including website design and development, SEO services, digital marketing strategies, custom software development, IT consulting, and cloud solutions. Our services are designed to help businesses in the UK, Ireland and worldwide to improve their online presence, streamline operations, and achieve sustainable growth.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-2" aria-expanded="false" aria-controls="home-1-faq-item-2">
              How do you ensure the success of your projects?

            </button>
            <div id="home-1-faq-item-2" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
              <div class="accordion-item__body">
                We focus on understanding your business goals and challenges before implementing solutions. By combining industry best practices, innovative technologies, and ongoing collaboration, we ensure every project is executed to the highest standard, delivering results that align with your objectives.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-3" aria-expanded="false" aria-controls="home-1-faq-item-3">
              What sets you apart from other digital and technology companies?
            </button>
            <div id="home-1-faq-item-3" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
              <div class="accordion-item__body">
                Our team of experts brings a wealth of knowledge in both technology and business strategy. We offer solutions that are practical and scalable, helping your business stay competitive. Our commitment to customer satisfaction, transparent communication, and measurable results makes us a trusted partner for businesses in the UK, Ireland and worldwide.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-4" aria-expanded="false" aria-controls="home-1-faq-item-4">
              Do you provide ongoing support after project completion?
            </button>
            <div id="home-1-faq-item-4" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
              <div class="accordion-item__body">
                Yes, we offer ongoing support to ensure your website, software, or digital strategy continues to meet your evolving business needs. Whether it's through website maintenance, software updates, or digital marketing services, we're here to help your business stay ahead of the curve.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-5" aria-expanded="false" aria-controls="home-1-faq-item-5">
              What can I expect from working with your team?

            </button>
            <div id="home-1-faq-item-5" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
              <div class="accordion-item__body">
                When you work with us, you can expect a collaborative and transparent experience. Our team will work closely with you to understand your business needs, provide expert advice, and implement effective strategies. We believe in building long-term relationships, and we are committed to delivering the best possible results for your business.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-6" aria-expanded="false" aria-controls="home-1-faq-item-6">
              How do you ensure data security and privacy for your clients?
            </button>
            <div id="home-1-faq-item-6" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
              <div class="accordion-item__body">
                We take data security and privacy very seriously. We implement the latest security protocols, including encryption and secure hosting solutions, to protect our customers' sensitive information. Additionally, we ensure that all projects comply with data protection regulations, such as GDPR, to safeguard your business and customer data.
              </div>
            </div>
          </div>


        </div>
      </div>
    </div>

  </div>
</div>


<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Conatct : Main Section 
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
<div class="contact_main-section padding-bottom-120 padding-top-120">
  <div class="container">
    <div class="row row--cuatom">
      <div class="col-xl-5 col-lg-6 col-md-8 col-sm-11">
        <div class="contact_main-content contact-content-space">
          <div class="content">
            <div class="content-text-block">
              <h2 class="heading-md">Fill out this form, and we’ll quickly get back to you.</h2>
              <p>
                We are here to help you! Tell us how we can help and we’ll get in touch within next 24hrs with expert
              </p>
              <div class="content-divider"></div>
            </div>
          </div>
          <div class="content_main-testimonial">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1241.725705312715!2d-0.020781460960342484!3d51.50493386248767!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48760343c2943cfd%3A0xc70d2577dbe551a9!2sRFZ%50Digital!5e0!3m2!1sen!2s!4v1740657695350!5m2!1sen!2s!z=22" width="550" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
      </div>
      <div class="offset-xl-1 col-lg-6 col-md-10">
        <div class="form-box-style__form-wrapper bg-light-2">
          <form class="form-box-style" id="contact-form" method="POST" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
            <div class="form-box-style__form-inner">
              <div class="form-box-style__form-input">
                <h3 class="form-box-style-title">Your name</h3>
                <input class="form-control bg-white" name="name" type="text" placeholder="Enter your full name">
              </div>
              <div class="form-box-style__form-input">
                <h3 class="form-box-style-title">Email address</h3>
                <input class="form-control bg-white" name="email" type="text" placeholder="Enter your email">
              </div>
              <div class="form-box-style__form-input">
                <h3 class="form-box-style-title">Phone Number</h3>
                <input id="phone" class="form-control bg-white" name="phone" type="tel" placeholder="Enter your phone number" required>
              </div>
              <div class="form-box-style__form-input">
                <h3 class="form-box-style-title">Write your message</h3>
                <textarea class="form-control bg-white textarea" name="message" placeholder="Write us your question here..."></textarea>
              </div>
              <div class="form-box-style__form-input-button">
                <button type="submit" class="btn-masco rounded-pill w-100">Submit</button>
              </div>
              <?php echo $message; ?>
            </div>
          </form>

        </div>

      </div>
    </div>
  </div>
</div>




<!-- Contact Us Section -->
<?php include 'includes/marquee.php'; ?>
<!-- Contact us Section -->

<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Home 8  : Before Footer CTA Section 
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
<div class="cta-home-5 padding-top-100 footer-cta-new">
  <div class="container">
    <div class="cta-home-5-wrapper">
      <div class="row row--custom">
        <div class="col-xxl-8 col-xl-7 col-lg-8 col-md-10 col-12">
          <div class="cta-text-block">
            <h2 class="heading-md heading-md--general-sans text-l5-secondary">Get in Touch for Expert Digital & Technology Solutions Today</h2>
          </div>
        </div>
        <div class="col-xl-auto col-lg-4 col-md-5 col-xs-8 col-12">
          <div class="cta-home-5-button">
            <a href="<?php echo BASE_URL; ?>contact-us" class="btn-masco btn-secondary-l05 btn-fill--up">
              <span>Let's Start Now!</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>




<?php include 'includes/footer.php'; ?>