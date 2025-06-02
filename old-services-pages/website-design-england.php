
<?php
$noindex = true;
// Include database connection and PHPMailer files
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
include 'includes/header.php';

// Use PHPMailer namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$message = ""; // Feedback message for the form

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and validate input data
    function sanitize_input($data) {
        return htmlspecialchars(trim($data));
    }

    $name = sanitize_input($_POST['name']);
    $email = sanitize_input($_POST['email']);
    $phone = sanitize_input($_POST['phone']);
    $messageContent = sanitize_input($_POST['message']); // Avoid conflict with $message variable

    // Check if all fields are filled
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
                $adminPassword = 'h1qzjO(&t$ci'; // Replace with admin password

                $mail = new PHPMailer(true);

                try {
                    // Server settings
                    $mail->isSMTP();
                    $mail->Host = 'premium55.web-hosting.com'; // Replace with your SMTP server
                    $mail->SMTPAuth = true;
                    $mail->Username = $adminEmail;
                    $mail->Password = $adminPassword;
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                    $mail->Port = 465;

                    // Admin email settings
                    $mail->setFrom($adminEmail, 'Website Contact Form');
                    $mail->addAddress($adminEmail); // Send to admin
                    $mail->addReplyTo($email, $name); // Reply-to user

                    // Admin email content
                    $mail->isHTML(true);
                    $mail->Subject = 'New Contact Form Submission';
                    $mail->Body = "
                        <h3>New Contact Form Submission</h3>
                        <p><strong>Name:</strong> $name</p>
                        <p><strong>Email:</strong> $email</p>
                        <p><strong>Phone:</strong> $phone</p>
                        <p><strong>Message:</strong><br>$messageContent</p>
                    ";
                    $mail->send(); // Send admin email

                    // User confirmation email
                    $mail->clearAddresses(); // Clear admin email address
                    $mail->addAddress($email); // Send to user
                    $mail->Subject = 'Thank You for Contacting Us';
                    $mail->Body = "
                        <h3>Thank you for contacting us!</h3>
                        <p>Dear $name,</p>
                        <p>Thank you for your message. We have received your form submission and will get back to you shortly.</p>
                        <p><strong>Your Message:</strong><br>$messageContent</p>
                        <p>Best regards,</p>
                        <p>Support Team</p>
                    ";
                    $mail->send(); // Send user email

                    $message = "<div class='success-message'>Form submitted successfully!</div>";
                } catch (Exception $e) {
                    error_log("Mail Error: " . $e->getMessage());
                    $message = "<div class='error-message'>Form submitted, but email could not be sent. Error: {$mail->ErrorInfo}</div>";
                }
            } else {
                $message = "<div class='error-message'>Failed to submit the form. Please try again.</div>";
            }
        } catch (PDOException $e) {
            error_log("Database Error: " . $e->getMessage());
            $message = "<div class='error-message'>An error occurred while submitting the form to the database.</div>";
        }
    } else {
        $message = "<div class='error-message'>Please fill in all the fields.</div>";
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
<section class="custom-bg">
        <div class="container">
            <div class="row align-items-center">
                <!-- Left Column -->
                <div class="col-md-6">
                    <h1 class="text-uppercase text-muted services-heading-h1" >Website Design England</h1>
                    <h2 class="mb-3 services-heading-h2">Drive results with a business website <span style="color:#318CB8; white-space:normal;">  Designed for Success    </span></h2>
                    <p class="mb-4"></p>
                    <a href="<?php echo BASE_URL; ?>contact-us" class="btn btn-primary services-page-hero-button">Get Started</a>
                </div>
                <!-- Right Column -->
                <div class="col-md-6 d-flex justify-content-center">
                    <img src="./image/Digital-Strategy-Consulting-2-1-2048x1781.webp" alt="Placeholder Image" class="img-fluid rounded  ">
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
  
 <div class="home-1_content-section-2 padding-bottom-120 index-section-3" >
      <div class="container">
        <div class="row row--custom change-order ">
          <div class="col-xl-5 col-lg-5 col-auto" data-aos-duration="1000" data-aos="fade-right">
            <div class="home-1_content-image-2 content-image--mobile-width">
              <img src="./image/home-1/Home-Section-7.webp" alt="alternative text">
             
            </div>
          </div>
          <div class="offset-xl-0 col-xl-6 col-lg-7 col-md-11" data-aos-duration="1000" data-aos="fade-left">
            <div class="content">
              <div class="content-text-block">
                <h2 class="content-title heading-md text-black">
                  Empowering UK and Ireland Businesses with Cutting Edge Website Design Solutions
                </h2>
                <p>
                 At RFZ Digital, we offer innovative website design solutions for businesses across the UK and Ireland. Our expert team design user-friendly, visually appealing websites that boost your online presence and drive growth.

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
        <h5>Highly secured</h5> <!-- Heading -->
        <p>We prioritise your business website security with robust measures to protect it from threats, ensuring that your business and customer data remain safe and secure.</p>
      </div>
    </div>

    <!-- Box 2 -->
    <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
      <div class="service-page-custom-box" >
        <div class="feature-widget-2__icon">
                  <img src="./image/home-5/feature-2.png" alt="feature icon">
                </div>
        <!-- <div class="icon">🌐</div>  -->
        <h5>Creative Solutions</h5> <!-- Heading -->
        <p>We provide creative solutions that combine innovative design with smart strategies, helping your business stand out in the digital world.</p>
      </div>
    </div>

    <!-- Box 3 -->
    <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
      <div class="service-page-custom-box" >
        <div class="feature-widget-2__icon">
                  <img src="./image/home-5/feature-3.png" alt="feature icon">
                </div>
        <!-- <div class="icon">💼</div>  -->
        <h5>No Hidden Charges</h5> <!-- Heading -->
        <p>With our services, you can expect complete transparency. We believe in honesty, so there are no hidden charges, the price we quote is the price you pay.</p>
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
        <h5>Highly secured</h5> <!-- Heading -->
        <p>We prioritise your business website security with robust measures to protect it from threats, ensuring that your business and customer data remain safe and secure.</p>
      </div>
    </div>

    <!-- Box 2 -->
    <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
      <div class="service-page-custom-box" >
        <div class="feature-widget-2__icon">
                  <img src="./image/home-5/feature-2.png" alt="feature icon">
                </div>
        <!-- <div class="icon">🌐</div>  -->
        <h5>Creative Solutions</h5> <!-- Heading -->
        <p>We provide creative solutions that combine innovative design with smart strategies, helping your business stand out in the digital world.</p>
      </div>
    </div>

    <!-- Box 3 -->
    <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
      <div class="service-page-custom-box" >
        <div class="feature-widget-2__icon">
                  <img src="./image/home-5/feature-3.png" alt="feature icon">
                </div>
        <!-- <div class="icon">💼</div>  -->
        <h5>No Hidden Charges</h5> <!-- Heading -->
        <p>With our services, you can expect complete transparency. We believe in honesty, so there are no hidden charges, the price we quote is the price you pay.</p>
      </div>
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
    Home 5  : Process Section
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <div class="home-5_process-section bg-offwhite-3 process-section">
      <div class="container">
        <div class="home-5_process-devider">
          <div class="row justify-content-center text-center">
            <div class="col-xxl-7 col-xl-8 col-lg-8 col-md-10">
              <div class="section-heading">
                <h2 class="section-heading__title fw-600 heading-md heading-md--general-sans text-l5-secondary">We follow a simple, yet effective SEO ranking process</h2>
              </div>
            </div>
          </div>
          <div class="row process-widget-row">
            <div class="col-md-6 col-lg-4">
              <div class="process-widget">
                <div class="process-widget__count">
                  <span>1</span>
                </div>
                <div class="process-widget__body">
                  <h3 class="process-widget__title">Keyword Research</h3>
                  <p>Keyword research is the process of discovering valuable search queries</p>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="process-widget">
                <div class="process-widget__count">
                  <span>2</span>
                </div>
                <div class="process-widget__body">
                  <h3 class="process-widget__title">Link Building</h3>
                  <p>Link building is a SEO technique that increases your search engine ranking</p>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="process-widget">
                <div class="process-widget__count">
                  <span>3</span>
                </div>
                <div class="process-widget__body">
                  <h3 class="process-widget__title">Ranking</h3>
                  <p>It helps a website&#39;s 1st position in the search engine results page</p>
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
<?php include 'includes/testimonial2.php'; ?>
<!-- testimonial us Section -->










 


    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Home 2  : Content Section 2
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <div class="home-2_content-section-2 padding-bottom-150 services-page-section-11">
      <div class="container">
        <div class="row row--custom">
          <div class="col-xl-auto col-lg-5 col-auto" data-aos-duration="1000" data-aos="fade-left">
            <div class="home-2_content-image-2 content-image--mobile-width">
              <img src="./image/services-page/services-page-section-11.png" alt="alternative text">
            </div>
          </div>
          <div class="col-xl-6 col-lg-7 col-md-10 col-auto" data-aos-duration="1000" data-aos="fade-right">
            <div class="content">
              <div class="content-text-block">
                <h2 class="content-title heading-md text-black">
                  RFZ Digital – Your Trusted Digital & Technology Partner for UK, Ireland, and Worldwide

                </h2>
                <p>At RFZ Digital, we help businesses grow with SEO-optimised, mobile-friendly, and high-performance websites. Our expert website design services enhance your Business online presence, improve user experience, and drive conversions.</p>
                <p>From the UK and Ireland to global markets, we design fast, responsive, and search engine-friendly websites that boost visibility and attract more customers. Whether you need a new website or a redesign, we Design solutions tailored to your business success.</p>
                <p>Get started today and elevate your digital presence with RFZ Digital</p>
              </div>
              <div class="content-button-block">
                <a href="#" class="btn-masco btn-masco btn-secondary-l02 btn-fill--up"><span>Learn more</span></a>
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
                What makes your web development services in England unique?


                </button>
                <div id="home-1-faq-item" class="accordion-collapse collapse show" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  We provide professional websites designed to enhance your business online presence. Our services include mobile responsiveness, SEO optimisation, advanced analytics, and comprehensive website security. We also focus on local businesses in England and Ireland to ensure your website meets your market needs.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-2" aria-expanded="false" aria-controls="home-1-faq-item-2">
                 How long does it take to develop a website in England?
                </button>
                <div id="home-1-faq-item-2" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  The timeline depends on the complexity of your website. A standard business website can take 2-4 weeks, while more complex websites may require 6-8 weeks. We prioritise quality and ensure timely delivery to clients across England and Ireland.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-3" aria-expanded="false" aria-controls="home-1-faq-item-3">
                Can you optimise my website for search engines in England?

                </button>
                <div id="home-1-faq-item-3" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  Yes, all our websites include SEO optimisation to help your business rank higher in search results. We also focus on local SEO strategies to target customers in England and Ireland, ensuring your business gains visibility in your city and beyond.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-4" aria-expanded="false" aria-controls="home-1-faq-item-4">
                Do you offer website maintenance services in England and Ireland?

                </button>
                <div id="home-1-faq-item-4" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  Absolutely! We provide ongoing maintenance to ensure your website remains secure, up-to-date, and fully functional. This service is available to all our clients in England, regardless of their city.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-5" aria-expanded="false" aria-controls="home-1-faq-item-5">
                Can you design e-commerce websites for businesses in England and Ireland?
                </button>
                <div id="home-1-faq-item-5" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  Yes, we specialise in developing e-commerce websites that meet your needs. Whether you are selling products or services in a specific city or across the UK and Ireland, our designs are created to drive sales and provide an exceptional user experience.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-6" aria-expanded="false" aria-controls="home-1-faq-item-6">
                Will my website be mobile-friendly?
                </button>
                <div id="home-1-faq-item-6" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                    Definitely! All our websites are fully responsive, meaning they adapt seamlessly to all devices, including smartphones and tablets. This ensures your website looks great and functions perfectly for users in England, Ireland, and Worldwide.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-7" aria-expanded="false" aria-controls="home-1-faq-item-7">
               How do you ensure my website is secure?
                </button>
                <div id="home-1-faq-item-7" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  We prioritise security by implementing advanced measures such as SSL certification, malware protection, and firewalls. Our clients in England, Ireland, and worldwide also benefit from regular security audits to protect against potential threats.
                  </div>
                </div>
              </div>
             <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-7" aria-expanded="false" aria-controls="home-1-faq-item-7">
               Can you help with professional email setup for businesses in England?
                </button>
                <div id="home-1-faq-item-7" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  Yes, we provide professional email setup as part of our web design package. This ensures your business has a professional digital presence in England, Ireland, and worldwide, enhancing your credibility with clients and partners.
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




 <?php include 'includes/footer.php'; ?>