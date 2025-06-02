
<?php

$meta_title = "Web Design Bradford – Elevate Your Business Now!";
$meta_description = "Web Design company stoke on trent that delivers results. Discover why businesses trust us to create websites that convert! Get started with a free consultation!";
$canonical_url = "https://rfzdigital.co.uk/web-design-bradford";

include 'includes/header.php';
include_once 'includes/mail-config.php';

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

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['form_type']) && $_POST['form_type'] == "top_form") {
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
                $adminEmail = 'yasirhassan@rfzdigital.co.uk'; // Replace with admin email
                $adminPassword = 'ZuHjZ6H7PQES'; // Replace with secure credentials
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
            padding-bottom: 20px;
            background: #e3f7fe;
            
        }
        .service-hero-heading{
              font-family: "Lexend", Sans-serif;
    font-size: 42px;
        font-weight: 700;
        color: #000000;
        letter-spacing: -2.5px;
            
            }
            .text-muted{
              padding-bottom: 5px;
            }
            .img-fluid {
    max-width: 100%;
    max-height: 448px;
}
.services-hero-text{
  
    font-size: 16px;

}
span {
    display: inline;
    white-space: normal;
}
@media (max-width: 600px) { /* Mobile View */
    .img-fluid {
        display: none; /* Hide image on mobile */
    }
}
    </style>
    <section class="custom-bg">
         <div class="container">
        <div class="row align-items-center">
            <!-- Left Column: Text Content -->
            <div class="col-md-7">
                <h1 class="text-uppercase text-muted service-hero-h1">Web Design Bradford</h1>
                    <h2 class="mb-3 service-hero-heading">Enhance your business visibility in Bradford <span style="color:#1463FF; white-space:normal;">with a Professional Website </span></h2>
                    <p class="mb-3 services-hero-text">Our Website Design and Development team specialises in Developing responsive, SEO-optimised websites that not only look great but also drive results. Whether you’re a small business or an established brand in Bradford, we design custom websites that help you connect with customers and stand out in the competitive local market!</p>
                    <a href="<?php echo BASE_URL; ?>contact-us" class="btn btn-masco service-hero-section-btn">Get Started</a>
                
            </div>

            <!-- Right Column: Inquiry Form -->
            <div class="col-md-5 d-flex justify-content-end">
                    <img src="./image/services/hero-section/Bradford.webp" alt="Web Design Bradford" class="img-fluid rounded  ">
                </div>
        </div>
    </div>
    </section>

  <!-- ~~~~~~~~~~~~~~~~~~~~~~~~
    Home 1 : Portfolio Slider Start
~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
 <?php include 'includes/portfolio-slider.php';?>


     <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Home 1  : Content Section 1
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
  <style type="text/css">
      /* Inquiry Form Styling */
    .inquiry-form-section {
        display: flex;
        justify-content: right;
        align-items: center;
    }

    .form-container {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(3px);
        padding: 40px;
        border-radius: 15px;
        max-width: 500px;
        width: 100%;
        text-align: center;
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    }

    .form-container h2 {
        font-size: 32px;
        color: #fff;
        margin-bottom: 10px;
    }

    .form-container p {
        font-size: 16px;
        color: #eee;
        margin-bottom: 30px;
    }

    .inquiry-form {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 8px;
        font-size: 16px;
        background: rgba(255, 255, 255, 0.99);
        color: #000;
        outline: none;
        transition: border-color 0.3s ease;
    }

    .form-group input::placeholder,
    .form-group textarea::placeholder {
        color: #000;
    }

    .form-group input:focus,
    .form-group textarea:focus {
        border-color: #007BFF;
    }

    .form-group textarea {
        resize: vertical;
    }

    .inquiry-form-section button {
        padding: 12px;
        background: #007BFF;
        color: #fff;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    .inquiry-form-section button:hover {
        background: #0056b3;
    }
  </style>
  
 <div class="home-1_content-section-2 padding-bottom-120 index-section-3"  >
      <div class="container">
        <div class="row row--custom change-order ">
          <div class="col-xl-5 col-lg-5 col-md-6" data-aos-duration="1000" data-aos="fade-right">
            <div class="inquiry-form-section">
              <div class="form-container">
                    <h2 style="color: black;">Get in Touch</h2>
                    
                    <form class="inquiry-form" method="POST" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                        <input type="hidden" name="form_type" value="top_form">
                        <div class="form-group">
                            <input type="text" name="name" placeholder="Your Name" required>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Your Email" required>
                        </div>
                        <div class="form-group">
                            <input type="tel" name="phone" placeholder="Your Phone Number" required>
                        </div>
                        <div class="form-group">
                            <textarea placeholder="Your Message" name="message" rows="4" required></textarea>
                        </div>
                        <button type="submit">Submit</button>
                    </form>
                </div>
            </div>
          </div>
          <div class="offset-xl-0 col-xl-6 col-lg-7 col-md-6" data-aos-duration="1000" data-aos="fade-left">
            <div class="content">
              <div class="content-text-block">
                <h2 class="content-title heading-md text-black">
                  
                  Delivering Innovative Website Design Solutions to Empower UK and Ireland Businesses
                </h2>
                <p>
                  At RFZ Digital, We deliver innovative website design solutions that empower UK and Ireland businesses to excel online. Our expert team designs dynamic, user-friendly websites that enhance your business digital presence.
                </p>
              </div>
             
            </div>
             
          </div>
        </div>
      </div>
    </div>

    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~
    Home 1 : Brand Section
~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
 <?php include 'includes/logo-slider.php';?>
   

    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Home 5  : Feature Section Custom
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
 
   <div class="home-5_feature-section padding-bottom-120 section-4-new">
<div class="container my-0 ">
  <div class="home-5_feature-section-wrapper">
  <!-- Section Heading -->
  <div class="row justify-content-center text-center">
            <div class="col-xxl-6 col-lg-7 col-md-9 col-sm-12 col-xs-11">
              <div class="section-heading">
                <h2 class="section-heading__title heading-md heading-md--general-sans text-l5-secondary">Why choose our website design service?</h2>
              </div>
            </div>
          </div>
<div class="row g-4 row-cols-1 row-cols-md-2 row-cols-lg-3">
  
    <!-- Box 1 -->
    <div class="col" data-aos="fade-up" data-aos-delay="100">
      <div class="service-page-custom-box">
        <div class="feature-widget-2__icon">
                  <img src="./image/services/icons/Modern-Website-Design.svg" alt="feature icon">
                </div>
        <!-- <div class="icon">📈</div>  -->
        <h5>Modern Website Solutions</h5> <!-- Heading -->
        <p>We design innovative websites that load in seconds, keeping your audience engaged and your business ahead of the competition.</p>
      </div>
    </div>

    <!-- Box 2 -->
    <div class="col" data-aos="fade-up" data-aos-delay="200">
      <div class="service-page-custom-box" >
        <div class="feature-widget-2__icon">
                  <img src="./image/services/icons/Highly-Secured-Websites.svg" alt="feature icon">
                </div>
        <!-- <div class="icon">🌐</div>  -->
        <h5>Maximum Web Protection</h5> <!-- Heading -->
        <p>We protect your business from cyber risks with secure, high-performance web solutions.</p>
      </div>
    </div>

    <!-- Box 3 -->
    <div class="col" data-aos="fade-up" data-aos-delay="300">
      <div class="service-page-custom-box" >
        <div class="feature-widget-2__icon">
                  <img src="./image/services/icons/SEO-Mobile-Friendly.svg" alt="feature icon">
                </div>
        <!-- <div class="icon">💼</div>  -->
        <h5>SEO & Mobile Friendly</h5> <!-- Heading -->
        <p>We develop websites with responsive design and SEO integration to improve performance across all platforms.</p>
      </div>
    </div>

    <!-- Box 4 -->
    <div class="col" data-aos="fade-up" data-aos-delay="100">
      <div class="service-page-custom-box">
        <div class="feature-widget-2__icon">
                  <img src="./image/services/icons/Easy-to-Manage.svg" alt="feature icon">
                </div>
        <!-- <div class="icon">📈</div>  -->
        <h5>Easy to Manage</h5> <!-- Heading -->
        <p>We design websites that let you handle updates quickly, so you don’t have to rely on developers.</p>
      </div>
    </div>

    <!-- Box 5 -->
    <div class="col" data-aos="fade-up" data-aos-delay="200">
      <div class="service-page-custom-box" >
        <div class="feature-widget-2__icon">
                  <img src="./image/services/icons/Affordable-Pricing.svg" alt="feature icon">
                </div>
        <!-- <div class="icon">🌐</div>  -->
        <h5>Affordable Pricing</h5> <!-- Heading -->
        <p>We make website design simple and affordable, helping businesses create a powerful online presence without financial stress.</p>
      </div>
    </div>

    <!-- Box 6 -->
    <div class="col" data-aos="fade-up" data-aos-delay="300">
      <div class="service-page-custom-box" >
        <div class="feature-widget-2__icon">
                  <img src="./image/services/icons/Client-Centric-Approach.svg" alt="feature icon">
                </div>
        <!-- <div class="icon">💼</div>  -->
        <h5>Client-Centric Approach</h5> <!-- Heading -->
        <p>Our process is driven by your needs, ensuring every element of your website aligns with your business objectives.</p>
      </div>
    </div>
  </div>
  </div>
</div>
</div>



<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Home 3  : Testimonial Section 
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <!-- testimonialSection -->
<?php include 'includes/testimonial-web.php'; ?>
<!-- testimonial us Section -->





    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Home 2  : Content Section 2
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <div class="home-2_content-section-2 padding-bottom-150 services-page-section-11">
      <div class="container">
        <div class="row row--custom">
          <div class="col-xl-4 col-lg-5 col-auto" data-aos-duration="1000" data-aos="fade-left">
            <div class="home-2_content-image-2 content-image--mobile-width">
              <img src="./image/services/last-section/34.webp" alt="Website Design">
            </div>
          </div>
          <div class="col-xl-8 col-lg-7 col-md-10 col-auto" data-aos-duration="1000" data-aos="fade-right">
            <div class="content">
              <div class="content-text-block">
                <h2 class="content-title heading-md text-black">
                  RFZ Digital - Leading Digital Solutions for UK, Ireland, and Global Businesses

                </h2>
                <p>At RFZ Digital, we deliver high-performance, SEO-optimised website design to help businesses grow. Our mobile friendly, fast, and visually engaging websites enhance online presence, improve user experience, and drive conversions.</p>
                <p>Serving businesses in the UK, Ireland, and worldwide, we design responsive, search engine friendly websites that attract more visitors and turn them into customers. Whether you need a new website or a redesign, our expert team ensures a solution tailored to your business success.</p>
                <p>Build your business future online, and partner with RFZ Digital today!
</p>
              </div>
              <div class="content-button-block">
                <a href="<?php echo BASE_URL; ?>contact-us" class="btn-masco btn btn-primary btn-fill--up"><span>Get in Touch</span></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~
    Home 1 : Services Section
~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
 <?php include 'includes/services-section.php';?>



<!-- ~~~~~~~~~~~~~~~~~~~~~~~~
    Home 1 : social-apps Section
~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
 <?php include 'includes/social-apps-logo-slider-web.php';?>


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
                Why should I choose your website Design services in Bradford?

                </button>
                <div id="home-1-faq-item" class="accordion-collapse collapse show" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  Our website design service in Bradford is designed to help local businesses succeed online. We offer professional, mobile-friendly websites with SEO optimisation, advanced analytics, and strong security features to meet your business needs.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-2" aria-expanded="false" aria-controls="home-1-faq-item-2">
                How long will it take to design my website in Bradford?
                </button>
                <div id="home-1-faq-item-2" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  The development time depends on the complexity of your project. A standard website typically takes 2-4 weeks, while more intricate projects may take 4-6 weeks. We are committed to delivering high-quality websites on time for Bradford-based businesses.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-3" aria-expanded="false" aria-controls="home-1-faq-item-3">
                Do you provide local SEO services for businesses in Bradford?
                </button>
                <div id="home-1-faq-item-3" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  Yes, all our websites include SEO optimisation, with a focus on local SEO for businesses in Bradford. This helps your business attract customers in the city and surrounding areas, improving your online visibility and engagement.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-4" aria-expanded="false" aria-controls="home-1-faq-item-4">
                Can you maintain my website after website is live in Bradford?

                </button>
                <div id="home-1-faq-item-4" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  Yes, we provide ongoing website maintenance services for businesses in Bradford. This includes regular updates, security checks, and performance optimisation to keep your website running smoothly.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-5" aria-expanded="false" aria-controls="home-1-faq-item-5">
                Do you develop e-commerce websites for businesses in Bradford?
                </button>
                <div id="home-1-faq-item-5" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  Yes, we specialise in designing e-commerce websites for businesses in Bradford. Our e-commerce solutions are tailored to your needs, helping you sell products or services effectively while ensuring a seamless user experience.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-6" aria-expanded="false" aria-controls="home-1-faq-item-6">
                Will my website be mobile-responsive for users in Bradford?
                </button>
                <div id="home-1-faq-item-6" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                    Absolutely! All our websites are fully responsive, ensuring they look and function perfectly on any device, including smartphones and tablets. This is vital for reaching customers in Bradford who browse on mobile devices.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-7" aria-expanded="false" aria-controls="home-1-faq-item-7">
                How do you ensure my website is secure in Bradford?
                </button>
                <div id="home-1-faq-item-7" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  We use advanced security measures such as SSL certificates, malware protection, and regular security audits. These features safeguard your Business website from potential threats, ensuring reliability and trustworthiness.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-8" aria-expanded="false" aria-controls="home-1-faq-item-8">
                Can you set up professional business emails for my company in Bradford?
                </button>
                <div id="home-1-faq-item-8" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  Yes, as part of our website design package, we offer a professional email setup. This helps businesses in Bradford present a credible and polished image to clients and partners while streamlining communication.
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>

<!-- Contact Us Section -->
<?php require_once 'includes/contact-us-section.php'; ?>

<!-- Contact us Section -->




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
            <div class="col-xxl-6 col-xl-7 col-lg-8 col-md-10 col-12">
              <div class="cta-text-block">
                <h2 class="heading-md heading-md--general-sans text-l5-secondary">Ready to turn visitors into customers with a professional website design?</h2>
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



<?php include 'includes/sidebar-popup.php'; ?>
<?php include 'includes/popup_form.php'; ?>
 <?php include 'includes/footer.php'; ?>