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
                    <h1 class="text-uppercase text-muted services-heading-h1" >Website Design kent</h1>
                    <h2 class="mb-3">Redefine your Digital Presence with a  <span style="color:#318CB8; white-space:normal;">Business Website</span></h2>
                    <p class="mb-4">Elevate your business with RFZ Digital! With our Digital Strategy Consulting, your business will have a clear roadmap to success. We combine deep market insights with innovative strategies that drive growth and engagement. Our expert consultants work with your team to identify opportunities and challenges, so you make informed decisions that yield maximum results. Let’s empower your business to thrive in a constantly evolving digital world!</p>
                    <a href="#" class="btn btn-primary">Click Here</a>
                </div>
                <!-- Right Column -->
                <div class="col-md-6 d-flex justify-content-center">
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
  
 <div class="home-1_content-section-2 padding-bottom-120" >
      <div class="container">
        <div class="row row--custom change-order ">
          <div class="col-xl-5 col-lg-5 col-auto" data-aos-duration="1000" data-aos="fade-right">
            <div class="home-1_content-image-2 content-image--mobile-width">
              <img src="./image/home-1/Home-Section-7.webp" alt="alternative text">
             
            </div>
          </div>
          <div class="offset-xl-1 col-xl-6 col-lg-7 col-md-11" data-aos-duration="1000" data-aos="fade-left">
            <div class="content">
              <div class="content-text-block">
                <h2 class="content-title heading-md text-black">
                  Discover the latest digital strategies &
                  emerging ideas for business growth
                </h2>
                <p>
                  Our brand tenders and marketing mixologists always serve up unique,
                  design-forward websites coded with today’s modern technologies
                </p>
              </div>
              <!--<div class="content-list-block">-->
              <!--  <ul class="content-list">-->
              <!--    <li class="content-list-item">-->
              <!--      <img src="./image/icons/icon-check-blue.svg" alt="alternative text">-->
              <!--      Reach new business opportunities or test your product ideas.-->
              <!--    </li>-->
              <!--    <li class="content-list-item">-->
              <!--      <img src="./image/icons/icon-check-blue.svg" alt="alternative text">-->
              <!--      Automate your processes and get data-driven business insights.-->
              <!--    </li>-->
              <!--    <li class="content-list-item">-->
              <!--      <img src="./image/icons/icon-check-blue.svg" alt="alternative text">-->
              <!--      Create lightweight, scalable, and easly accessible cloud solution.-->
              <!--    </li>-->
              <!--  </ul>-->
              <!--</div>-->
            </div>
             <div>
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
    Home 1 : Portfolio Slider Start
~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
 <?php include 'includes/portfolio-slider.php';?>






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
    Home 5  : Pricing Section
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <div class="home-5_pricing-section bg-offwhite section-padding-120 bg-offwhite-3">
      <div class="container">
        <div class="row text-center justify-content-center">
          <div class="col-xxl-6 col-xl-7 col-lg-8 col-md-9">
            <div class="section-heading section-heading-margin">
              <h2 class="section-heading__title heading-md heading-md--general-sans text-l5-secondary">Explore our SEO service plans and choose your plan</h2>
              <div class="home-5_pricing-control-block">
                <div class="pricing-control-2">
                  <span data-pricing-trigger="pricing-1" data-target="monthly"  >Business Website</span>
                  <span data-pricing-trigger="pricing-1" data-target="yearly" class="pricing-control-2__indicator toggle"></span>
                  <span data-pricing-trigger="pricing-1" data-target="yearly">E-Commerce</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row row--custom" data-plan-id="pricing-1" data-plan-active="monthly">
          <div class="col-xl-4 col-md-6" data-aos-duration="1000" data-aos="fade-up">
            <div class="pricing-card-2 h-100">
              <div class="pricing-card-2__head">
                <img src="./image/home-5/pricing-card-icon-1.svg" alt="icon" class="pricing-card-2__icon">
                <h3 class="pricing-card-2__plan">Small Business Package</h3>
                <h3 class="pricing-card-2__price-block"><span class="pricing-card-2__price dynamic-value" data-yearly="£499" data-monthly="£499">£499</span></h3>
              </div>
              <div class="pricing-card-2__body">
                <ul class="pricing-card-2__list">
                  <li><img src="./image/icons/icon-check-black.svg" alt="icon check black"><span class=" dynamic-value" data-yearly="Website Design (10 Products)" data-monthly="Website Design (5 Pages)">Website Design (5 Pages)</span> </li>
                  <li><img src="./image/icons/icon-check-black.svg" alt="icon check black"> <span class=" dynamic-value" data-yearly="Website Development (10 Products)" data-monthly="Website Development (5 Pages)">Website Development (5 Pages)</span></li>
                  <li><img src="./image/icons/icon-check-black.svg" alt="icon check black"> <span class=" dynamic-value" data-yearly="Website Content (10 Products)" data-monthly="Website Content (5 Pages)">Website Content (5 Pages)</span></li>
                  <li><img src="./image/icons/icon-check-black.svg" alt="icon check black"><span class=" dynamic-value" data-yearly="Copywriting (10 Products)" data-monthly="Copywriting (5 Pages)">Copywriting (5 Pages)</span> </li>
                  <li><img src="./image/icons/icon-check-black.svg" alt="icon check black"><span class=" dynamic-value" data-yearly="Maintenance & Support* (2 Months Free)" data-monthly="Maintenance & Support* (2 Months Free)">Maintenance & Support* (2 Months Free)</span> </li>
                </ul>
                <div class="pricing-card-2__button">
                  <a href="./pricing.html" class="btn-masco btn-secondary-l05 w-100">Choose Plan</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-md-6" data-aos-duration="1000" data-aos="fade-up">
            <div class="pricing-card-2 h-100">
              <div class="pricing-card-2__head">
                <img src="./image/home-5/pricing-card-icon-2.svg" alt="icon" class="pricing-card-2__icon">
                <h3 class="pricing-card-2__plan">Mid Size Business Package</h3>
                <h3 class="pricing-card-2__price-block"><span class="pricing-card-2__price dynamic-value" data-yearly="£699" data-monthly="£699">£699</span></h3>
              </div>
              <div class="pricing-card-2__body">
                <ul class="pricing-card-2__list">
                  <li><img src="./image/icons/icon-check-black.svg" alt="icon check black"><span class=" dynamic-value" data-yearly="Website Design (20 Products)" data-monthly="Website Design (10 Pages)">Website Design (10 Pages)</span> </li>
                  <li><img src="./image/icons/icon-check-black.svg" alt="icon check black"> <span class=" dynamic-value" data-yearly="Website Development (20 Products)" data-monthly="Website Development (10 Pages)">Website Development (10 Pages)</span></li>
                  <li><img src="./image/icons/icon-check-black.svg" alt="icon check black"> <span class=" dynamic-value" data-yearly="Website Content (20 Products)" data-monthly="Website Content (10 Pages)">Website Content (10 Pages)</span></li>
                  <li><img src="./image/icons/icon-check-black.svg" alt="icon check black"><span class=" dynamic-value" data-yearly="Copywriting (20 Products)" data-monthly="Copywriting (10 Pages)">Copywriting (10 Pages)</span> </li>
                  <li><img src="./image/icons/icon-check-black.svg" alt="icon check black"><span class=" dynamic-value" data-yearly="Maintenance & Support* (2 Months Free)" data-monthly="Maintenance & Support* (2 Months Free)">Maintenance & Support* (2 Months Free)</span> </li>
                </ul>
                <div class="pricing-card-2__button">
                  <a href="./pricing.html" class="btn-masco btn-primary-l05 btn-hvr-black w-100">Choose Plan</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-md-6" data-aos-duration="1000" data-aos="fade-up">
            <div class="pricing-card-2 h-100">
              <div class="pricing-card-2__head">
                <img src="./image/web-dev/pricing-card-icon-3.png" alt="icon" class="pricing-card-2__icon">
                <h3 class="pricing-card-2__plan">Large company Package</h3>
                <h3 class="pricing-card-2__price-block"><span class="pricing-card-2__price dynamic-value" data-yearly="£999" data-monthly="£999">£999</span></h3>
              </div>
              <div class="pricing-card-2__body">
                 <ul class="pricing-card-2__list">
                  <li><img src="./image/icons/icon-check-black.svg" alt="icon check black"><span class=" dynamic-value" data-yearly="Website Design (30 Products)" data-monthly="Website Design (10 Pages)">Website Design (10 Pages)</span> </li>
                  <li><img src="./image/icons/icon-check-black.svg" alt="icon check black"> <span class=" dynamic-value" data-yearly="Website Development (30 Products)" data-monthly="Website Development (10 Pages)">Website Development (10 Pages)</span></li>
                  <li><img src="./image/icons/icon-check-black.svg" alt="icon check black"> <span class=" dynamic-value" data-yearly="Website Content (30 Products)" data-monthly="Website Content (10 Pages)">Website Content (10 Pages)</span></li>
                  <li><img src="./image/icons/icon-check-black.svg" alt="icon check black"><span class=" dynamic-value" data-yearly="Copywriting (30 Products)" data-monthly="Copywriting (10 Pages)">Copywriting (10 Pages)</span> </li>
                  <li><img src="./image/icons/icon-check-black.svg" alt="icon check black"><span class=" dynamic-value" data-yearly="Maintenance & Support* (2 Months Free)" data-monthly="Maintenance & Support* (2 Months Free)">Maintenance & Support* (2 Months Free)</span> </li>
                </ul>
                <div class="pricing-card-2__button">
                  <a href="./pricing.html" class="btn-masco btn-secondary-l05 w-100">Choose Plan</a>
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
    Home 1  : New section tabs
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
<div class="container py-5 new-section-tabs">
  <h2 class="text-center mb-4">WebPring to Transform your Website.</h2>
  <ul class="nav nav-tabs justify-content-center" id="tabs" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="highly-secured-tab" data-bs-toggle="tab" data-bs-target="#highly-secured" type="button" role="tab" aria-controls="highly-secured" aria-selected="true">
        Highly Secured
      </button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="innovative-solution-tab" data-bs-toggle="tab" data-bs-target="#innovative-solution" type="button" role="tab" aria-controls="innovative-solution" aria-selected="false">
        Innovative Solution
      </button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="no-hidden-charge-tab" data-bs-toggle="tab" data-bs-target="#no-hidden-charge" type="button" role="tab" aria-controls="no-hidden-charge" aria-selected="false">
        No Hidden Charge
      </button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="client-centric-tab" data-bs-toggle="tab" data-bs-target="#client-centric" type="button" role="tab" aria-controls="client-centric" aria-selected="false">
        Client-Centric Approach
      </button>
    </li>
  </ul>

  <div class="tabs-border"></div> <!-- Border below tabs -->

  <div class="tab-content mt-4" id="tabsContent">
    <!-- Highly Secured Tab Content -->
    <div class="tab-pane fade show active" id="highly-secured" role="tabpanel" aria-labelledby="highly-secured-tab">
      <div class="row align-items-center">
          <div class="col-md-1"></div>
        <div class="col-md-6 content-section">
          <h3>Your data is secured with us!</h3>
          <p>At WebPring, we implement robust security measures that ensure the confidentiality and integrity of your data, providing you with peace of mind as we build and maintain your digital presence.</p>
          
          <h5>Strong Encryption:</h3>
          <p>With strong encryption for web development services, we guarantee the security of your Customer data.</p>
          <h5>Secure Protocol:</h3>
          <p>Secure protocols are vital components of web development. We ensure safe communication between users and websites, safeguarding against cyber threats.</p>
        </div>
        <div class="col-md-5 image-section">
          <img src="./image/home-1/Section-Three.webp" alt="Highly Secured" class="img-fluid">
        </div>
      </div>
    </div>

    <!-- Innovative Solution Tab Content -->
    <div class="tab-pane fade" id="innovative-solution" role="tabpanel" aria-labelledby="innovative-solution-tab">
      <div class="row align-items-center">
          <div class="col-md-1"></div>
        <div class="col-md-6 content-section">
          <h3>Innovative Solutions</h3>
          <p>We bring unique and forward-thinking solutions to meet all your business needs.</p>
          <ul>
            <li>Cutting-edge technology</li>
            <li>Customized strategies</li>
            <li>Expert team</li>
          </ul>
        </div>
        <div class="col-md-5 image-section">
          <img src="./image/home-1/Web-Dev-Section3.webp" alt="Innovative Solution" class="img-fluid">
        </div>
      </div>
    </div>

    <!-- No Hidden Charge Tab Content -->
    <div class="tab-pane fade" id="no-hidden-charge" role="tabpanel" aria-labelledby="no-hidden-charge-tab">
      <div class="row align-items-center">
          <div class="col-md-1"></div>
        <div class="col-md-6 content-section">
          <h3>No Hidden Charges</h3>
          <p>Transparent pricing ensures you know exactly what you're paying for.</p>
          <ul>
            <li>Clear breakdowns</li>
            <li>No unexpected fees</li>
            <li>Honest service</li>
          </ul>
        </div>
        <div class="col-md-5 image-section">
          <img src="./image/home-1/Home-Section-7.webp" alt="No Hidden Charge" class="img-fluid">
        </div>
      </div>
    </div>

    <!-- Client-Centric Approach Tab Content -->
    <div class="tab-pane fade" id="client-centric" role="tabpanel" aria-labelledby="client-centric-tab">
      <div class="row align-items-center">
          <div class="col-md-1"></div>
        <div class="col-md-6 content-section">
          <h3>Client-Centric Approach</h3>
          <p>We prioritize your goals and work closely with you to ensure success.</p>
          <ul>
            <li>Personalized service</li>
            <li>Ongoing support</li>
            <li>Goal-oriented strategies</li>
          </ul>
        </div>
        <div class="col-md-5 image-section">
          <img src="./image/home-1/Web-Dev-Section3.webp" alt="Client-Centric Approach" class="img-fluid">
        </div>
      </div>
    </div>
  </div>
</div>





 <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Home 1  : Additional Services
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
   <div class="home-5_feature-section padding-bottom-120 Additional-Services-Section">
<div class="container my-0 ">
  <div class="home-5_feature-section-wrapper">
  <!-- Section Heading -->
  <div class="row justify-content-center text-center">
            <div class="col-xxl-6 col-lg-7 col-md-9 col-sm-12 col-xs-11">
              <div class="section-heading">
                <h2 class="section-heading__title heading-md heading-md--general-sans text-l5-secondary section-3-heading">Additional Services To support your new business</h2>
              </div>
            </div>
          </div>

  <div class="row g-4">
    <!-- Box 1 -->
    <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
      <div class="ass-custom-box">
        
        <h4>Registered Office </h4> <!-- Heading -->
        <p>We provide creative digital marketing solutions that are designed to meet your unique business needs and drive impactful results.</p>
      </div>
    </div>

    <!-- Box 2 -->
    <div class="col-md-3" data-aos="fade-up" data-aos-delay="200">
      <div class="ass-custom-box" >
        
        <h4>Company secretary</h4> <!-- Heading -->
        <p>We provide creative digital marketing solutions that are designed to meet your unique business needs and drive impactful results.</p>
      </div>
    </div>

    <!-- Box 3 -->
    <div class="col-md-3" data-aos="fade-up" data-aos-delay="300">
      <div class="ass-custom-box" >
       
        <h4>Admin Support</h4> <!-- Heading -->
        <p>We provide creative digital marketing solutions that are designed to meet your unique business needs and drive impactful results.</p>
      </div>
    </div>

    <!-- Box 4 -->
    <div class="col-md-3" data-aos="fade-up" data-aos-delay="400">
      <div class="ass-custom-box">
        
        <h4>Bookkeeping Services</h4> <!-- Heading -->
        <p>We provide creative digital marketing solutions that are designed to meet your unique business needs and drive impactful results.</p>
      </div>
    </div>
  </div>
</div>
</div>
</div>


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
                  Perfect interface for quick support and with no coding
                </h2>
                <p>Visual Builder empowers you to create the perfect AI chatbot quickly
                  and without any coding. Drag and drop conversational elements and test
                  them in real-time to design engaging clients.</p>
                <p>It is a modern messaging platform that combines everything you need
                  for effective support, sales, and engagement, all in a simple
                  interface.</p>
              </div>
              <div class="content-button-block">
                <a href=" about.html" class="btn-masco btn-masco btn-secondary-l02 btn-fill--up"><span>Learn more</span></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Home 1  : Ireland 
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

<section class="Ireland-section">
<div class="container py-5 ">
  <div class="row align-items-center">
    <!-- Image Section -->
    <div class="col-md-5">
      <img src="./image/home-1/Web-Dev-Section3.webp" alt="Register a Company" class="img-fluid">
    </div>
    
    <!-- Text Section -->
    <div class="col-md-7">
      <h2 class="mb-4">What You Need To Register A Limited Company In Ireland</h2>
      <p>
        When registering a business, you'll only need a few details to hand. Our online application wizard will make it a breeze and guide you through the registration process, from starting a business to registering your company name and forming a limited company.
      </p>
      
      <ul class="list-unstyled">
        <li class="d-flex align-items-start mb-4">
<i class="fas fa-check-circle text-success me-3" style="font-size: 1.5rem;"></i>
          <div>
            <h5>Registered Office Address</h5>
            <p>
              It is mandatory in Ireland to have an Irish registered office address. If you don’t have one, you can opt for our registered office address service.
            </p>
          </div>
        </li>
        <li class="d-flex align-items-start mb-4">
          <i class="fas fa-check-circle text-success me-3" style="font-size: 1.5rem;"></i>
          <div>
            <h5>Director and Secretary Information</h5>
            <p>
              The names, nationalities, dates of birth, occupations, and residential addresses of your directors and secretary are required.
            </p>
          </div>
        </li>
        <li class="d-flex align-items-start mb-4">
          <i class="fas fa-check-circle text-success me-3" style="font-size: 1.5rem;"></i>
          <div>
            <h5>Shareholders/Share Information</h5>
            <p>
              The names of each of your shareholders, along with the number of shares held and the value of those shares.
            </p>
          </div>
        </li>
      </ul>
    </div>
  </div>
</div>
</section>

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
                What is included in your website design package?
                </button>
                <div id="home-1-faq-item" class="accordion-collapse collapse show" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  Our website design package includes custom design, mobile responsiveness, user-friendly navigation, SEO optimisation, and integration of your business identity. 
                  We also provide initial setup and basic training for easy content management.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-2" aria-expanded="false" aria-controls="home-1-faq-item-2">
                How much does a website cost?
                </button>
                <div id="home-1-faq-item-2" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  The cost of a website depends on its complexity and the features you need. We offer flexible packages starting from £499, 
                  and we can provide a solution that fits your specific requirements and budget.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-3" aria-expanded="false" aria-controls="home-1-faq-item-3">
                How long does it take to build a website?
                </button>
                <div id="home-1-faq-item-3" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  The timeline for website development varies depending on the complexity and size of the project. 
                  On average, it takes 2-4 weeks from the initial design phase to the final launch.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-4" aria-expanded="false" aria-controls="home-1-faq-item-4">
                Do you offer website redesign services?
                </button>
                <div id="home-1-faq-item-4" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  Yes, we offer comprehensive website redesign services. We focus on improving user experience, 
                  modernising design, and enhancing functionality to better serve your business goals.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-5" aria-expanded="false" aria-controls="home-1-faq-item-5">
                Will my website be mobile-friendly?
                </button>
                <div id="home-1-faq-item-5" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  Absolutely! All our websites are fully mobile-responsive, ensuring they look 
                  great and function smoothly on all devices, including smartphones and tablets.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-6" aria-expanded="false" aria-controls="home-1-faq-item-6">
                Can I update my website after it’s developed?
                </button>
                <div id="home-1-faq-item-6" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                    vYes, we provide user-friendly content management systems (CMS) like WordPress, allowing you to easily update text, 
                    images, and other content on your website without technical knowledge.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-7" aria-expanded="false" aria-controls="home-1-faq-item-7">
                Do you offer e-commerce website development?
                </button>
                <div id="home-1-faq-item-7" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  Yes, we specialise in creating e-commerce websites with secure payment gateways, easy product management, and a smooth customer shopping experience. 
                  We can build your online store using platforms like WooCommerce or Shopify.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-8" aria-expanded="false" aria-controls="home-1-faq-item-8">
                Will my website be secure from cyber threats?
                </button>
                <div id="home-1-faq-item-8" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  Yes, security is a top priority. To ensure your website safety, we implement best practices for website security, including SSL certificates, 
                  regular security updates, and protection against hacking attempts.
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