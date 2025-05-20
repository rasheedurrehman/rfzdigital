
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
    .custom-section {
        position: relative;
        width: 100%;
        min-height: 100vh;
        display: flex;
        align-items: center;
        background: url('./image/services/westminster.webp') no-repeat center center;
        background-size: cover;
        padding: 50px 0;
    }

    .content-container {
        background: rgba(255, 255, 255, 0.99);
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
/*        font-family: "Lexend", Sans-serif;*/
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
        backdrop-filter: blur(10px);
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
        background: rgba(255, 255, 255, 0.88);
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

    button:hover {
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
</style>

<section class="custom-section">
    <div class="container">
        <div class="row align-items-center">
            <!-- Left Column: Text Content -->
            <div class="col-md-7">
                <div class="content-container">
                    <h1 class="text-uppercase text-muted services-heading-h1">Website Design Bath</h1>
                    <h2 class="mb-3">Transform your Online Presence with a Professional
                        <span style="color:#318CB8;"> Website for Your Business</span>
                    </h2>
                    <p class="mb-4">Elevate your business with RFZ Digital! With our Digital Strategy Consulting, your business will have a clear roadmap to success.</p>
                    <a href="#" class="btn btn-primary">Get Started</a>
                </div>
            </div>

            <!-- Right Column: Inquiry Form -->
            <div class="col-md-5 inquiry-form-section">
                <div class="form-container">
                    <h2 style="color: black;">Get in Touch</h2>
                    
                    <form class="inquiry-form">
                        <div class="form-group">
                            <input type="text" placeholder="Your Name" required>
                        </div>
                        <div class="form-group">
                            <input type="email" placeholder="Your Email" required>
                        </div>
                        <div class="form-group">
                            <input type="tel" placeholder="Your Phone Number" required>
                        </div>
                        <div class="form-group">
                            <textarea placeholder="Your Message" rows="4" required></textarea>
                        </div>
                        <button type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- ~~~~~~~~~~~~~~~~~~~~~~~~
    Home 1 : Portfolio Slider Start
~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
 <?php include 'includes/portfolio-slider.php';?>

 <!-- ~~~~~~~~~~~~~~~~~~~~~~~~
    Home 1 : Portfolio Slider End
~~~~~~~~~~~~~~~~~~~~~~~~~~~-->




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
                  Driving Growth for UK and Ireland Businesses with Innovative Website Design Services
                </h2>
                <p>
                  At RFZ Digital, we drive business growth for UK and Ireland businesses through innovative website design services. Our team designs visually engaging and functional websites that enhance your online presence, attract more customers, and help your business thrive digitally.
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
    Home 1 : Brand Section Start
~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

 <?php include 'includes/logo-slider.php';?>

<!-- ~~~~~~~~~~~~~~~~~~~~~~~~
    Home 1 : Brand Section End
~~~~~~~~~~~~~~~~~~~~~~~~~~~-->






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
                  RFZ Digital - Your Go-To Digital & Technology Partner Across UK, Ireland, and Worldwide

                </h2>
                <p>At RFZ Digital, we specialise in high-performance, SEO-optimised website design that helps businesses grow. Whether you are in the UK, Ireland, or expanding globally, our mobile-friendly, fast, and visually engaging websites enhance your Business online presence and drive results.</p>
                <p>From startups to enterprises, we design responsive, conversion-focused websites that improve visibility, attract customers, and boost search rankings. Partner with us for expert web design and development solutions tailored to your business success.</p>
                <p>Let's build your Business digital future, get started today with RFZ Digital
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

<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Home   : Services Section
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->


 <!-- Services Section -->
  <div class="home-1_service-section padding-bottom-120" id="feature">
      <div class="home-1_service-section-shape">
        <img src="./image/home-1/service-section-shape.svg" alt="image alt">
      </div>
      <div class="container">
        <div class="home-1_service-section-wrapper">
          <div class="row justify-content-center">
            <div class="col-xxl-6 col-xl-7 col-lg-8 col-md-9">
              <div class="section-heading text-center">
                <h2 class="section-heading__title heading-md text-black">All the digital services that are convenient for you</h2>
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
                What sets your web design services in Bath apart?
                </button>
                <div id="home-1-faq-item" class="accordion-collapse collapse show" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  We specialise in designing professional, affordable websites that meet the requirements of businesses in Bath. Our services include SEO optimisation, mobile responsiveness, and comprehensive security features to help local businesses stand out online.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-2" aria-expanded="false" aria-controls="home-1-faq-item-2">
                How quickly can you develop a website for a business in Bath?
                </button>
                <div id="home-1-faq-item-2" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  The website Design process typically takes 2-4 weeks for a standard business website. For more complex websites, it may take 4-6 weeks. We ensure timely delivery without compromising the quality of the business in Bath.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-3" aria-expanded="false" aria-controls="home-1-faq-item-3">
                Do you offer local SEO services for businesses in Bath?
                </button>
                <div id="home-1-faq-item-3" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  Yes, we incorporate local SEO strategies to help your business in Bath rank higher on search engines. This ensures that your website effectively reaches your target audience in the city and surrounding areas.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-4" aria-expanded="false" aria-controls="home-1-faq-item-4">
                Do you provide website maintenance for businesses in Bath?
                </button>
                <div id="home-1-faq-item-4" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  YAbsolutely! We offer ongoing website maintenance services for businesses in Bath, ensuring your website remains secure, updated, and fully operational at all times.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-5" aria-expanded="false" aria-controls="home-1-faq-item-5">
                Can you design e-commerce websites for businesses in Bath?
                </button>
                <div id="home-1-faq-item-5" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  Yes, we develop e-commerce websites according to your specific needs. Whether you are selling products or services in Bath or beyond, we create websites that enhance user experience and boost sales.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-6" aria-expanded="false" aria-controls="home-1-faq-item-6">
                Will my website be optimised for mobile users in Bath?
                </button>
                <div id="home-1-faq-item-6" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                    Definitely! All our websites are fully mobile-responsive, ensuring they look and perform flawlessly on smartphones and tablets. This is essential for engaging users in Bath and improving customer retention.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-7" aria-expanded="false" aria-controls="home-1-faq-item-7">
                How do you ensure website security for businesses in Bath?
                </button>
                <div id="home-1-faq-item-7" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  We implement industry-leading security measures, including SSL certificates, malware protection, and firewalls. We also offer regular security audits to keep your website in Bath safe from threats.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-8" aria-expanded="false" aria-controls="home-1-faq-item-8">
                Can you help with professional email setup for businesses in Bath?
                </button>
                <div id="home-1-faq-item-8" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  Yes, we offer professional email setup services as part of our web design package. This ensures your Bath based business presents clients and partners with a polished and credible image.
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