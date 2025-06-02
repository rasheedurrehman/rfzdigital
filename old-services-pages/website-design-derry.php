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
$noindex = true;
$meta_title = "Affordable Website Design in Derry - RFZ Digital UK";
$meta_description = "Need a powerful website in Derry? Our expert web design services deliver mobile-friendly, high-performance sites tailored to your needs.";
$canonical_url = "https://rfzdigital.co.uk/website-design-derry";

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
    </style>
    <section class="custom-bg">
         <div class="container">
        <div class="row align-items-center">
            <!-- Left Column: Text Content -->
            <div class="col-md-7">
                <h1 class="text-uppercase text-muted service-hero-h1">Website Design Derry</h1>
                    <h2 class="mb-3 service-hero-heading">Affordable and professional websites to <span style="color:#1463FF; white-space:normal;">Grow Your Business </span></h2>
                    <p class="mb-3 services-hero-text">Strengthen your business presence in Derry with a professional website. Our expert team creates responsive, SEO-optimised websites that provide an excellent user experience and enhance your online visibility. Whether you're a new business or an established brand in Derry, we offer customised web design solutions that help you connect with your local audience and stand out in a competitive digital landscape.</p>
                    <a href="<?php echo BASE_URL; ?>contact-us" class="btn btn-masco service-hero-section-btn">Get Started</a>
                
            </div>

            <!-- Right Column: Inquiry Form -->
            <div class="col-md-5 d-flex justify-content-end">
                    <img src="./image/services/hero-section/Derry.webp" alt="Website Design Derry" class="img-fluid rounded  ">
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
  
 <div class="home-1_content-section-2 padding-bottom-120 index-section-3" >
      <div class="container">
        <div class="row row--custom change-order ">
          <div class="col-xl-5 col-lg-5 col-auto" data-aos-duration="1000" data-aos="fade-right">
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
          <div class="offset-xl-0 col-xl-6 col-lg-7 col-md-11" data-aos-duration="1000" data-aos="fade-left">
            <div class="content">
              <div class="content-text-block">
                <h2 class="content-title heading-md text-black">
                  Transforming Businesses Across the UK and Ireland with Creative Website Design
                </h2>
                <p>
                  At RFZ Digital, we transform businesses across the UK and Ireland with creative website design. Our expert team delivers unique, responsive websites that reflect your business essence, engage users, and drive business growth.
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
<div class="row row1">
  <div class="row g-4">
    <!-- Box 1 -->
    <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
      <div class="service-page-custom-box">
        <div class="feature-widget-2__icon">
                  <img src="./image/services/icons/Modern-Website-Design.svg" alt="feature icon">
                </div>
        <!-- <div class="icon">📈</div>  -->
        <h5>User-Friendly Web Design</h5> <!-- Heading -->
        <p>We create mobile-optimised, high-speed websites that ensure a smooth browsing experience for users on the go.</p>
      </div>
    </div>

    <!-- Box 2 -->
    <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
      <div class="service-page-custom-box" >
        <div class="feature-widget-2__icon">
                  <img src="./image/services/icons/Highly-Secured-Websites.svg" alt="feature icon">
                </div>
        <!-- <div class="icon">🌐</div>  -->
        <h5>Web Security Solution</h5> <!-- Heading -->
        <p>We design security-focused business websites that prioritise data privacy and customer safety.</p>
      </div>
    </div>

    <!-- Box 3 -->
    <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
      <div class="service-page-custom-box" >
        <div class="feature-widget-2__icon">
                  <img src="./image/services/icons/SEO-Mobile-Friendly.svg" alt="feature icon">
                </div>
        <!-- <div class="icon">💼</div>  -->
        <h5>SEO & Mobile Friendly</h5> <!-- Heading -->
        <p>We create high-ranking, mobile-ready business websites that drive traffic and boost conversions.</p>
      </div>
    </div>
  </div>
  </div>
  <div class="row row2">
  <div class="row g-4">
    <!-- Box 1 -->
    <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
      <div class="service-page-custom-box">
        <div class="feature-widget-2__icon">
                  <img src="./image/services/icons/Easy-to-Manage.svg" alt="feature icon">
                </div>
        <!-- <div class="icon">📈</div>  -->
        <h5>Easy to Manage</h5> <!-- Heading -->
        <p>With our easy-to-use management tools, you can edit and publish content anytime without any technical experience.</p>
      </div>
    </div>

    <!-- Box 2 -->
    <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
      <div class="service-page-custom-box" >
        <div class="feature-widget-2__icon">
                  <img src="./image/services/icons/Affordable-Pricing.svg" alt="feature icon">
                </div>
        <!-- <div class="icon">🌐</div>  -->
        <h5>Affordable Pricing</h5> <!-- Heading -->
        <p>We make professional web design accessible with competitive pricing that delivers exceptional value.</p>
      </div>
    </div>

    <!-- Box 3 -->
    <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
      <div class="service-page-custom-box" >
        <div class="feature-widget-2__icon">
                  <img src="./image/services/icons/Client-Centric-Approach.svg" alt="feature icon">
                </div>
        <!-- <div class="icon">💼</div>  -->
        <h5>Client-Centric Approach</h5> <!-- Heading -->
        <p>Your needs come first, we design business websites that combine aesthetics with performance for optimal results.</p>
      </div>
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
              <img src="./image/services/last-section/48.webp" alt="Website Design">
            </div>
          </div>
          <div class="col-xl-8 col-lg-7 col-md-10 col-auto" data-aos-duration="1000" data-aos="fade-right">
            <div class="content">
              <div class="content-text-block">
                <h2 class="content-title heading-md text-black">
                  RFZ Digital - Your Digital Partner from UK to Ireland and Beyond

                </h2>
                <p>At RFZ Digital, we provide SEO-optimised, high-performance website designs that are tailored to help your business thrive in the UK, Ireland, and globally. Our mobile-friendly, fast, and user-centric websites are designed to elevate your digital presence, enhance visibility, and boost conversions.</p>
                <p>We focus on building responsive, search engine-friendly websites that cater to the unique needs of your business, ensuring that your website is both visually appealing and highly functional. Whether launching a new website or optimising an existing one, our expert solutions will help you reach your full potential.</p>
                <p>Partner with RFZ Digital today, and let us guide you to digital success from the UK to Ireland and worldwide!
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
                How long does it take to develop a website for my business in Derry?

                </button>
                <div id="home-1-faq-item" class="accordion-collapse collapse show" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  Typically, website development takes 2-4 weeks, with more complex sites taking 4-6 weeks. We maintain clear communication throughout the process to ensure we meet your goals and deadlines for your Derry-based business.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-2" aria-expanded="false" aria-controls="home-1-faq-item-2">
                Do you offer local SEO services for businesses in Derry?
                </button>
                <div id="home-1-faq-item-2" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  Yes, we offer local SEO services that help businesses in Derry improve their online visibility. Our SEO strategies are designed to boost your website's rankings in local search results, attracting more potential customers from Derry and nearby areas.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-3" aria-expanded="false" aria-controls="home-1-faq-item-3">
                Do you provide website maintenance services for businesses in Derry?
                </button>
                <div id="home-1-faq-item-3" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  Yes, we offer comprehensive website maintenance services for businesses in Derry. This includes regular updates, security monitoring, and performance optimisations to ensure your website remains secure, fast, and up to date.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-4" aria-expanded="false" aria-controls="home-1-faq-item-4">
                Can you build an e-commerce website for my business in Derry?
                </button>
                <div id="home-1-faq-item-4" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  Absolutely! We specialise in developing secure and user-friendly e-commerce websites for businesses in Derry. Our e-commerce solutions are designed to improve the shopping experience, boost sales, and grow your online presence.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-5" aria-expanded="false" aria-controls="home-1-faq-item-5">
                Will my website be mobile-friendly for customers in Derry?
                </button>
                <div id="home-1-faq-item-5" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  Yes, all of our websites are mobile-responsive, ensuring that your customers in Derry can access your website seamlessly from any device, whether it's a smartphone, tablet, or desktop.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-6" aria-expanded="false" aria-controls="home-1-faq-item-6">
                How do you ensure website security for businesses in Derry?
                </button>
                <div id="home-1-faq-item-6" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                    We prioritise website security by implementing SSL certificates, conducting regular security audits, and using advanced malware protection to safeguard your Derry business website from online threats and ensure customer data remains secure.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-7" aria-expanded="false" aria-controls="home-1-faq-item-7">
                Can you set up professional email accounts for my business in Derry?
                </button>
                <div id="home-1-faq-item-7" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  Yes, we offer professional email setup services as part of our website development package. This allows your Derry business to maintain a professional image and communicate effectively with customers, partners, and clients.
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
            <div class="col-xxl-8 col-xl-7 col-lg-8 col-md-10 col-12">
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