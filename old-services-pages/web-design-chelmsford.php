
<?php

$meta_title = "Web Design Chelmsford | Website Design Services";
$meta_description = "Professional web design services in Chelmsford that deliver results. RFZ Digital creates mobile-friendly, high-converting websites tailored to your needs.";
$canonical_url = "https://rfzdigital.co.uk/web-design-chelmsford";



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
                <h1 class="text-uppercase text-muted service-hero-h1">Web Design Chelmsford</h1>
                    <h2 class="mb-3 service-hero-heading">Professional Website Solutions to Enhance your <span style="color:#1463FF; white-space:normal;">Business Online Presence </span></h2>
                    <p class="mb-3 services-hero-text">Boost your business visibility in Chelmsford with a professional business website. Our expert team designs responsive, SEO-optimised websites that deliver a seamless user experience and improve your search engine ranking. Whether you're a startup or an established business in Chelmsford, we provide customised web design websites to help you stand out and connect with your target audience effectively.</p>
                    <a href="<?php echo BASE_URL; ?>contact-us" class="btn btn-masco service-hero-section-btn">Get Started</a>
                
            </div>

            <!-- Right Column: Inquiry Form -->
            <div class="col-md-5 d-flex justify-content-end">
                    <img src="./image/services/hero-section/Chelmsford.webp" alt="Web Design Chelmsford" class="img-fluid rounded  ">
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
                  Helping UK and Ireland Businesses Succeed Online with professional Website Design Solutions
                </h2>
                <p>
                 At RFZ Digital, we help UK and Ireland businesses succeed online with professional website design solutions that enhance user experience and business identity. Our expert team designs responsive, visually compelling websites that attract customers and drive growth.
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
        <h5>Engaging Web Design</h5> <!-- Heading -->
        <p>We develop professional, high-speed websites that are built to impress, designed to perform, and optimised for growth.</p>
      </div>
    </div>

    <!-- Box 2 -->
    <div class="col" data-aos="fade-up" data-aos-delay="200">
      <div class="service-page-custom-box" >
        <div class="feature-widget-2__icon">
                  <img src="./image/services/icons/Highly-Secured-Websites.svg" alt="feature icon">
                </div>
        <!-- <div class="icon">🌐</div>  -->
        <h5>Ultimate Website Protection</h5> <!-- Heading -->
        <p>We create ultra-secure websites that prevent data breaches and safeguard customer information.</p>
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
        <p>We develop SEO-driven, mobile-ready websites to help your business stand out in search results and on all devices.</p>
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
        <p>Our websites feature a seamless content management system, allowing you to edit pages effortlessly.</p>
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
        <p>Our affordable pricing structure allows you to get a fully functional website without worrying about high upfront costs.</p>
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
        <p>We create user-friendly, high-performance websites that are designed around your audience and business objectives.</p>
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
              <img src="./image/services/last-section/28.webp" alt="Website Design">
            </div>
          </div>
          <div class="col-xl-8 col-lg-7 col-md-10 col-auto" data-aos-duration="1000" data-aos="fade-right">
            <div class="content">
              <div class="content-text-block">
                <h2 class="content-title heading-md text-black">
                  RFZ Digital - Bridging Businesses in UK, Ireland, and Across the Globe

                </h2>
                <p>At RFZ Digital, we connect businesses with success through SEO-optimised, high-performance website design. Our fast, mobile-friendly, and conversion-focused websites enhance online visibility, attract customers, and drive growth.</p>
                <p>Serving businesses in the UK, Ireland, and worldwide, we create responsive, search engine-friendly websites that improve engagement and boost rankings. Whether you need a new website or a redesign, we deliver tailored solutions to help your business thrive.</p>
                <p>Lets build your digital success, partner with RFZ Digital today!
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
                How long does it take to develop a website for a business in Chelmsford?

                </button>
                <div id="home-1-faq-item" class="accordion-collapse collapse show" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  The typical development time for a standard website is 2-4 weeks, while more complex projects may take 4-6 weeks. We ensure timely delivery of websites for businesses in Chelmsford, without compromising on quality.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-2" aria-expanded="false" aria-controls="home-1-faq-item-2">
                Do you provide local SEO services for businesses in Chelmsford?
                </button>
                <div id="home-1-faq-item-2" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  Yes, we focus on local SEO to help businesses in Chelmsford reach customers in their area. Our SEO-optimised websites enhance search engine rankings and drive traffic from local customers, boosting visibility and engagement.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-3" aria-expanded="false" aria-controls="home-1-faq-item-3">
                Do you offer website maintenance services in Chelmsford?
                </button>
                <div id="home-1-faq-item-3" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  Yes, we offer ongoing website maintenance services for Chelmsford businesses. These services include regular updates, security checks, and performance optimisation to ensure your website stays secure and runs smoothly.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-4" aria-expanded="false" aria-controls="home-1-faq-item-4">
                Can you build an e-commerce website for businesses in Chelmsford?
                </button>
                <div id="home-1-faq-item-4" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  Absolutely! We design and develop e-commerce websites for Chelmsford businesses, providing secure, user-friendly solutions that optimise online sales and enhance the customer shopping experience.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-5" aria-expanded="false" aria-controls="home-1-faq-item-5">
                Will my website be mobile-friendly for customers in Chelmsford?
                </button>
                <div id="home-1-faq-item-5" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  Yes, we ensure that all our websites are fully mobile-responsive. This means your website will look great and function perfectly across all devices, providing an excellent experience for customers in Chelmsford.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-6" aria-expanded="false" aria-controls="home-1-faq-item-6">
                How do you ensure website security for Chelmsford-based businesses?
                </button>
                <div id="home-1-faq-item-6" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                    We use the latest security measures, including SSL certificates, malware protection, and regular security audits, to protect your website from cyber threats and ensure the safety of your data.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-7" aria-expanded="false" aria-controls="home-1-faq-item-7">
                Can you set up professional email accounts for businesses in Chelmsford?
                </button>
                <div id="home-1-faq-item-7" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  Yes, as part of our web development services, we provide professional email setup for businesses in Chelmsford, helping you maintain a credible, professional image and streamline communication.
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
                  <h2 class="heading-md">Fill out this form, We ‘ll quickly get back to you </h2>
                  <p>
                    We are here to help you! Tell us how we can help and we’ll get in touch within next 24hrs with expert
                  </p>
                  <div class="content-divider"></div>
                </div>
              </div>
              <div class="content_main-testimonial">
                <div class="testimonial-widget-4" data-aos="fade-left" data-aos-delay="NaN">
                  <div class="testimonial-widget-4__rating">
                    <img src="./image/icons/star-five-yellow.svg" class="testimonial-widget-4__star" alt="image alt">
                  </div>
                  <p>
                    "Snaga did an exceptional job for us.
                    keep up the excellent digital work. Man,
                    this thing is getting better and better as
                    I learn more about it. I have gotten at
                    least 50 times the value from Snaga.
                    It is worth much more than I paid."
                  </p>
                  <div class="testimonial-widget-4__body">
                    <div class="testimonial-widget-4__user-image">
                      <img src="./image/contact/contact-user-image.png" alt="image alt">
                    </div>
                    <div class="testimonial-widget-4__user-metadeta">
                      <h4 class="testimonial-widget-4__user">Brooklyn Simmons</h4>
                      <span class="testimonial-widget-4__user-position">CEO & Co-founder @ Company</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="offset-xl-1 col-lg-6 col-md-10">
            <div class="form-box-style__form-wrapper bg-light-2">
              <form class="form-box-style" id="contact-form" method="POST" action="Website-Development.php">
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
            <div class="col-xxl-6 col-xl-7 col-lg-8 col-md-10 col-12">
              <div class="cta-text-block">
                <h2 class="heading-md heading-md--general-sans text-l5-secondary">Are you ready to increase your SEO ranking?</h2>
              </div>
            </div>
            <div class="col-xl-auto col-lg-4 col-md-5 col-xs-8 col-12">
              <div class="cta-home-5-button">
                <a href="#" class="btn-masco btn-secondary-l05 btn-fill--up">
                  <span>Let's start the project</span>
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