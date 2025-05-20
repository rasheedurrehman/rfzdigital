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
$meta_title = "Web Design Canterbury | Modern and Responsive Websites";
$meta_description = "Get a modern and responsive web design in Canterbury! We create custom, responsive, and SEO-friendly websites to boost your online presence. Contact us today!";
$canonical_url = "https://rfzdigital.co.uk/web-design-canterbury";

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
            padding-bottom: 0px;
            background: linear-gradient(
                to right, 
                white 30%, 
                #77ffad 75%, 
                #35ff47 100%
            );
            
        }
        .mb-3{
              font-family: "Onest", Sans-serif;
    /*font-size: 52px;
    font-weight: 900;*/
    color: #000000;
            
            }
            .text-muted{
              padding-bottom: 5px;
            }
            .img-fluid {
    max-width: 100%;
    max-height: 448px;
}
.mb-4{
  font-family: "Manrope", Sans-serif;
    font-size: 16px;

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
<section class="custom-bg" style="display: none;">
        <div class="container">
            <div class="row align-items-center">
                <!-- Left Column -->
                <div class="col-md-6">
                    <h1 class="text-uppercase text-muted services-heading-h1" >Web Design Canterbury</h1>
                    <h2 class="mb-3">Achieve more online with  <span style="color:#318CB8; white-space:normal;">a Professional Business Website</span></h2>
                    <p class="mb-4">Strengthen your business online presence in Canterbury with a professional business website. Our team excels in designing responsive, SEO-optimised websites that enhance user experience and boost online visibility. Whether you're a new business or an established brand in Canterbury, we deliver custom web design solutions that help you stand out and effectively engage with your local audience.</p>
                    <a href="<?php echo BASE_URL; ?>contact-us" class="btn btn-primary services-page-hero-button">Get Started</a>
                </div>
                <!-- Right Column -->
                <div class="col-md-6 d-flex justify-content-center">
                    <img src="./image/Digital-Strategy-Consulting-2-1-2048x1781.webp" alt="Placeholder Image" class="img-fluid rounded  ">
                </div>
            </div>
        </div>
    </section>
    <!-- New Hero Section -->
    <style>
    .custom-section {
        position: relative;
        width: 100%;
        min-height: 100vh;
        display: flex;
        align-items: center;
        background: url('./image/services/canterbury.webp') no-repeat center center;
        background-size: cover;
        padding: 50px 0;
    }

    .content-container {
        background: rgba(255, 255, 255, 0.8);
        padding: 40px;
        border-radius: 10px;
    }

    .mb-3 {
        font-family: "Lexend", Sans-serif;
        font-size: 42px;
        font-weight: 700;
        color: #000000;
        letter-spacing: -2.5px;
    }

    .mb-4 {
        font-size: 16px;
    }

    .btn-primary {
        background-color: #318CB8;
        border: none;
        padding: 10px 20px;
        font-size: 18px;
    }

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

    button {
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

    @media (max-width: 768px) {
        .mb-3 {
            font-size: 32px;
        }

        .form-container {
            padding: 30px;
        }

        .form-container h2 {
            font-size: 28px;
        }

        .form-container p {
            font-size: 14px;
        }
    }
     @media (max-width: 600px) {
        .inquiry-form-section {
            display: none;
        }

        
    }
</style>

<section class="custom-section">
    <div class="container">
        <div class="row align-items-center">
            <!-- Left Column: Text Content -->
            <div class="col-md-7">
                <div class="content-container">
                    <h1 class="text-uppercase text-muted services-heading-h1">Web Design Canterbury</h1>
                    <h2 class="mb-3">Achieve more online with a
                        <span style="color:#318CB8;"> Professional Business Website</span>
                    </h2>
                    <p class="mb-4">Strengthen your business online presence in Canterbury with a professional business website. Our team excels in designing responsive, SEO-optimised websites that enhance user experience and boost online visibility. Whether you're a new business or an established brand in Canterbury, we deliver custom web design solutions that help you stand out and effectively engage with your local audience.</p>
                    <a href="<?php echo BASE_URL; ?>contact-us" class="btn btn-primary">Get Started</a>
                </div>
            </div>

            <!-- Right Column: Inquiry Form -->
            <div class="col-md-5 inquiry-form-section">
                <div class="form-container">
                    <h2 style="color: black;">Get in Touch</h2>
                    
                    <form class="inquiry-form" method="POST" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
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
    </div>
</section>
    <!-- New Hero Section -->

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
              <img src="./image/services/qpshc4wxly0hd4oddbum.webp" alt="Website Design">
             
            </div>
          </div>
          <div class="offset-xl-0 col-xl-6 col-lg-7 col-md-11" data-aos-duration="1000" data-aos="fade-left">
            <div class="content">
              <div class="content-text-block">
                <h2 class="content-title heading-md text-black">
                  Driving Success for UK and Ireland Businesses with Strategic Website Design Solutions
                </h2>
                <p>
                  At RFZ Digital, we drive success for UK and Ireland businesses with strategic website design solutions focusing on user experience and business goals. Our team designs functional, visually appealing websites that captivate visitors and deliver measurable results.
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
                <h2 class="section-heading__title heading-md heading-md--general-sans text-l5-secondary">Contains modem features
for better experience</h2>
              </div>
            </div>
          </div>
<div class="row row1">
  <div class="row g-4">
    <!-- Box 1 -->
    <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
      <div class="service-page-custom-box">
        <div class="feature-widget-2__icon">
                  <img src="./image/home-1/feature-1.png" alt="feature icon">
                </div>
        <!-- <div class="icon">📈</div>  -->
        <h5>Modern Website Design</h5> <!-- Heading -->
        <p>We Design modern, high-performing websites that are fast and user-friendly, helping your business stand out and succeed online.</p>
      </div>
    </div>

    <!-- Box 2 -->
    <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
      <div class="service-page-custom-box" >
        <div class="feature-widget-2__icon">
                  <img src="./image/home-5/feature-2.png" alt="feature icon">
                </div>
        <!-- <div class="icon">🌐</div>  -->
        <h5>Highly Secured Websites</h5> <!-- Heading -->
        <p>We prioritise security in every website we design, implementing advanced protections to safeguard your business data and users.</p>
      </div>
    </div>

    <!-- Box 3 -->
    <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
      <div class="service-page-custom-box" >
        <div class="feature-widget-2__icon">
                  <img src="./image/home-5/feature-3.png" alt="feature icon">
                </div>
        <!-- <div class="icon">💼</div>  -->
        <h5>SEO & Mobile Friendly</h5> <!-- Heading -->
        <p>We design websites that are optimised for search engines and mobile devices, ensuring maximum visibility and seamless user experience.</p>
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
                  <img src="./image/home-1/feature-1.png" alt="feature icon">
                </div>
        <!-- <div class="icon">📈</div>  -->
        <h5>Easy to Manage</h5> <!-- Heading -->
        <p>We design user-friendly websites that are easy to update, manage, and maintain. No technical skills required.</p>
      </div>
    </div>

    <!-- Box 2 -->
    <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
      <div class="service-page-custom-box" >
        <div class="feature-widget-2__icon">
                  <img src="./image/home-5/feature-2.png" alt="feature icon">
                </div>
        <!-- <div class="icon">🌐</div>  -->
        <h5> Affordable Pricing</h5> <!-- Heading -->
        <p>We offer top-tier website solutions at prices that fit your budget, making quality Web Design affordable for all businesses.</p>
      </div>
    </div>

    <!-- Box 3 -->
    <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
      <div class="service-page-custom-box" >
        <div class="feature-widget-2__icon">
                  <img src="./image/home-5/feature-3.png" alt="feature icon">
                </div>
        <!-- <div class="icon">💼</div>  -->
        <h5>Client-Centric Approach</h5> <!-- Heading -->
        <p>We prioritise your business needs, ensuring every project is customised to your business goals.</p>
      </div>
    </div>
  </div>
  </div>
</div>
</div>
</div>



<!-- ~~~~~~~~~~~~~~~~~~~~~~~~
    Home 1 : Portfolio Slider Start
~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
 <?php include 'includes/portfolio-slider.php';?>









<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Home 3  : Testimonial Section 
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <!-- testimonialSection -->
<?php include 'includes/testimonial2.php'; ?>
<!-- testimonial us Section -->







 


    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Home 2  : Content Section 2
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <div class="home-2_content-section-2 padding-bottom-150 services-page-section-11">
      <div class="container">
        <div class="row row--custom">
          <div class="col-xl-4 col-lg-5 col-auto" data-aos-duration="1000" data-aos="fade-left">
            <div class="home-2_content-image-2 content-image--mobile-width">
              <img src="./image/services/dk0z69fetuvsf2xkpayf.webp" alt="Website Design">
            </div>
          </div>
          <div class="col-xl-8 col-lg-7 col-md-10 col-auto" data-aos-duration="1000" data-aos="fade-right">
            <div class="content">
              <div class="content-text-block">
                <h2 class="content-title heading-md text-black">
                  RFZ Digital - Global Digital Solutions with Local Expertise in UK and Ireland

                </h2>
                <p>At RFZ Digital, we blend world-class innovation with deep local market knowledge to deliver SEO-optimised, high-performance websites that drive business success. Our fast, mobile-friendly, and user-centric designs help businesses in the UK and Ireland grow their online presence and attract more customers.</p>
                <p>Whether you are a startup or an established enterprise, our responsive, search engine-friendly websites ensure higher visibility, better engagement, and increased conversions. Focusing on local and global markets, we create tailored web solutions that meet your unique business needs.</p>
                <p>Enhance your digital presence; partner with RFZ Digital today!
</p>
              </div>
              <div class="content-button-block">
                <a href=" about.html" class="btn-masco btn-masco btn-secondary-l02 btn-fill--up"><span>Learn more</span></a>
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
 <?php include 'includes/social-apps-logo-slider.php';?>


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
                How long does it take to build a website for a business in Canterbury?
                </button>
                <div id="home-1-faq-item" class="accordion-collapse collapse show" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  A standard website typically takes 2-4 weeks to complete, while more complex designs may take 4-6 weeks. We work efficiently to deliver high-quality websites for Canterbury businesses on time.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-2" aria-expanded="false" aria-controls="home-1-faq-item-2">
                Do you provide local SEO services for businesses in Canterbury?
                </button>
                <div id="home-1-faq-item-2" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  Yes, we focus on local SEO to help Canterbury businesses attract customers in the area. Our SEO-optimised websites improve your search engine ranking, driving more traffic and leads from the local community.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-3" aria-expanded="false" aria-controls="home-1-faq-item-3">
                Do you offer website maintenance services in Canterbury?
                </button>
                <div id="home-1-faq-item-3" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  Absolutely! We provide ongoing maintenance services for Canterbury-based websites, including updates, performance enhancements, and security checks to ensure your website remains functional and secure.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-4" aria-expanded="false" aria-controls="home-1-faq-item-4">
                Can you create an e-commerce website for businesses in Canterbury?
                </button>
                <div id="home-1-faq-item-4" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  Yes, we specialise in developing e-commerce websites for Canterbury businesses. Our solutions are tailored to your needs, offering a secure, user-friendly platform to boost your online sales.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-5" aria-expanded="false" aria-controls="home-1-faq-item-5">
                Will my website be mobile-friendly for users in Canterbury?
                </button>
                <div id="home-1-faq-item-5" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  Definitely! All our websites are mobile-responsive, ensuring they look and function perfectly on all devices. This is essential for engaging customers in Canterbury who browse the web on smartphones and tablets.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-6" aria-expanded="false" aria-controls="home-1-faq-item-6">
                How do you ensure website security for businesses in Canterbury?
                </button>
                <div id="home-1-faq-item-6" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                    We safeguard your website using industry-standard security measures, such as SSL certificates, malware protection, and regular security audits. Our services help Canterbury businesses stay protected from online threats.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-7" aria-expanded="false" aria-controls="home-1-faq-item-7">
                Can you set up professional email accounts for Canterbury-based businesses?
                </button>
                <div id="home-1-faq-item-7" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  Yes, we offer professional email setup as part of our web development package. This service helps businesses in Canterbury maintain a professional image and streamline communication with clients and partners.
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




 <?php include 'includes/footer.php'; ?>