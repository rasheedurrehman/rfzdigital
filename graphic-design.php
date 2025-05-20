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
$meta_title = "Graphic Design Services in the UK & Ireland -  RFZ Digital";
$meta_description = "Bring your ideas to life with RFZ Digital expert graphic design services in the UK & Ireland. From logos to social media posts, we create eye-catching designs.";
$canonical_url = "https://rfzdigital.co.uk/graphic-design";

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

// Add reCAPTCHA script
echo '<script src="https://www.google.com/recaptcha/api.js" async defer></script>';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // CAPTCHA verification
    $secretKey = '6Lc-9N0qAAAAAGmzU7g9e2eJAtcDctOrDtUG6cnB';
    $captchaResponse = $_POST['g-recaptcha-response'] ?? '';
    
    // Verify the reCAPTCHA response
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = [
        'secret' => $secretKey,
        'response' => $captchaResponse,
    ];
    
    $options = [
        'http' => [
            'method' => 'POST',
            'header' => 'Content-Type: application/x-www-form-urlencoded',
            'content' => http_build_query($data),
        ],
    ];
    $context = stream_context_create($options);
    $verifyResponse = file_get_contents($url, false, $context);
    $responseData = json_decode($verifyResponse);

    if ($responseData->success) {
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
    } else {
        $message = "<div class='error-message'>reCAPTCHA verification failed. Please try again.</div>";
    }
}
?>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Service",
  "name": "Graphic Design",
  "description": "Creative graphic design services by RFZ Digital UK, helping businesses across the UK build visually compelling branding and digital assets.",
  "provider": {
    "@type": "Organization",
    "name": "RFZ Digital UK",
    "url": "https://rfzdigital.co.uk/",
    "contactPoint": {
      "@type": "ContactPoint",
      "email": "info@rfzdigital.co.uk",
      "contactType": "Customer Support",
      "areaServed": "GB",
      "availableLanguage": ["English - GB"]
    }
  },
  "areaServed": {
    "@type": "Country",
    "name": "United Kingdom"
  },
  "serviceType": "Graphic Design",
  "url": "https://rfzdigital.co.uk/graphic-design"
}
</script>


<style>
    /* Hero Section Styling */
        .hero-content {
        text-align: center; /* Center text horizontally */
    }

    .hero-title {
        line-height: 82px;
        font-size: 83px;
        letter-spacing: -5px;
        font-weight: 500;
        color: #1f1f1f;
        word-break: break-word; /* Allow breaking for long words */
    }
    @media (max-width: 600px) {
        
        
        .hero-section {
            background-image: url('./image/gd/new-header-Grahpic Designer.webp'); /* Update with your image path */
            background-size: cover;
            background-position: center;
            height: 110vh; /* Full viewport height */
            color: #333; /* Text color */
            position: relative;
            overflow: hidden;
            width: auto;
        }
        .hero-title {
            font-size: 39px;
            letter-spacing: -3px;
            line-height: 40px;
            font-weight: 700;
            color: #1f1f1f;
            word-break: break-word;
        }
        .content-set {
            padding-top: 80px !important;
        }
        .hero-subtitle {
            font-size: 17px;
            color: #555;
            margin: 0 auto; /* Center the text block */
            text-align: center !IMPORTANT; /* Align text inside the <p> tag */
            line-height: 1.6;
            padding-top: 10px;
            padding-top: 10px;
        }

}
@media (max-width: 400px) {
    .hero-section {
            background-image: url('./image/gd/new-header-Grahpic Designer.webp'); /* Update with your image path */
            background-size: cover;
            background-position: center;
            height: 144vh; /* Full viewport height */
            color: #333; /* Text color */
            position: relative;
            overflow: hidden;
            width: auto;
        }

}

@media (min-width: 768px) {
      
        .hero-section {
        background-image: url('./image/gd/Grahpic-Designer-Header-Images-iPad.webp'); /* Update with your image path */
        background-size: cover;
        background-position: center;
        /*height: 40vh; */
        color: #fff !IMPORTANT;; /* Text color */
        position: relative;
        overflow: hidden;
        width: 100%;
    }
           .hero-title {
            font-size: 44px;
            letter-spacing: -3px;
            line-height: 50px;
            font-weight: 700;
            color: #1f1f1f;
            word-break: break-word;
        }
        .content-set {
            padding-top: 70px;
            
        }
        .hero-content{
    padding-bottom: 270px;
}
        .hero-subtitle {
            font-size: 18px;
            color: #555;
            margin: 0 auto; /* Center the text block */
            text-align: center !IMPORTANT; /* Align text inside the <p> tag */
            line-height: 1.6;
            padding-top: 10px;
            flex: 0 0 auto;
            width: 95%; 
        }
}
@media (min-width: 1400px) {
        .hero-section {
            background-image: url('./image/gd/new-header-Grahpic Designer.webp'); /* Update with your image path */
            background-size: cover;
            background-position: center;
            height: 126vh; /* Full viewport height */
            color: #333; /* Text color */
            position: relative;
            overflow: hidden;
            width: auto;
        }
    
        .hero-content {
                text-align: center; /* Center text horizontally */
            }
    
        .hero-title {
            line-height: 82px;
            font-size: 83px;
            letter-spacing: -5px;
            font-weight: 500;
            color: #1f1f1f;
            word-break: break-word; /* Allow breaking for long words */
        }
        .hero-subtitle {
            font-size: 18px;
            color: #000;
            margin: 0 auto; /* Center the text block */
            text-align: center !IMPORTANT; /* Align text inside the <p> tag */
            line-height: 1.6;
            flex: 0 0 auto;
            width: 75%; 
        }
}

.hero-subtitle {
    font-size: 18px;
            color: #000;
    margin: 0 auto; /* Center the text block */
    text-align: center !IMPORTANT; /* Align text inside the <p> tag */
    line-height: 1.6;
}
    .hero-button {
        background-color: #1463FF;
        color: #fff;
        padding: 0.75rem 1.5rem;
        font-size: 1rem;
        border: none;
        border-radius: 48px;
        text-transform: uppercase;
        font-weight: 500;
        transition: background-color 0.5s, border 0.5s;
        margin-top:20px;
    }

    .hero-button:hover {
        background-color: #fff;
        border: 1px solid #1463FF;
        color: #000;
    }

    .content-set {
        padding-top: 120px;
    }
    @media (min-width: 1200px) {
  .hero-section {
            background-image: url('./image/gd/new-header-Grahpic Designer.webp'); /* Update with your image path */
            background-size: cover;
            background-position: center;
            height: 110vh; /* Full viewport height */
            color: #333; /* Text color */
            position: relative;
            overflow: hidden;
            width: auto;
  }
}
@media (min-width: 1280px) {
  .hero-section {
            background-image: url('./image/gd/new-header-Grahpic Designer.webp'); /* Update with your image path */
            background-size: cover;
            background-position: center;
            height: 127vh; /* Full viewport height */
            color: #333; /* Text color */
            position: relative;
            overflow: hidden;
            width: auto;
  }
}
</style>



<!-- Hero Section -->
<div class="hero-section d-flex align-items-start justify-content-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 content-set">
                <div class="hero-content">
                    <h1 class="hero-title">
                        Graphics to Grow your Business in UK & Ireland
                    </h1>
                    <div class="row justify-content-center">
                        <p class="hero-subtitle col-12 col-md-10">
                            Our graphic design services bring your brand to life with visually stunning designs that captivate and engage. 
                From logos and marketing materials to social media graphics, we create professional visuals that enhance your business image across the UK and Ireland.
                        </p>
                    </div>
                    <a href="<?php echo BASE_URL; ?>contact-us" class="btn hero-button">Get Started</a>
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
    Home 8  : Content Section 1
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

 <div class="home-5_content-section-2 section-padding-120 bg-offwhite-3">
      <div class="container">
        <div class="row row--custom ">
          <div class="col-xl-6 col-lg-5 col-md-6 col-7" data-aos-duration="1000" data-aos="fade-left">
            <div class="home-5_content-image-2 ">
              <img src="./image/gd/Grahpic-Design-Page-AboutUs.webp" alt="Creative Designs for Modern Businesses">
            </div>
          </div>
          <div class="col-xl-6 col-lg-7 col-md-10 col-auto" data-aos-duration="1000" data-aos="fade-right">
            <div class="content">
              <div class="content-text-block">
                <h2 class="content-title heading-md text-black text-l5-secondary">
               Creative Designs for Modern Businesses
                </h2>
                <p>We specialise in creating innovative and visually appealing designs that reflect the modern spirit of your business. </p>
                <div ></div>
                <p>Our graphic design solutions resonate with your audience, enhance your business presence, 
                  and elevate your marketing efforts across the UK and Ireland.</p>
              </div>
              <div class="content-button-block">
                <a href="<?php echo BASE_URL; ?>contact-us" class="btn-masco btn-primary-l05 btn-fill--up"><span>Contact Our Experts</span></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>




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
                <h2 class="section-heading__title heading-md heading-md--general-sans text-l5-secondary">Why Choose Our Graphic Design Services?</h2>
              </div>
            </div>
          </div>

  <div class="row g-4">
    <!-- Box 1 -->
    <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
      <div class="custom-box">
        <div class="feature-widget-2__icon">
                  <img src="./image/gd/icons/High-Quality-Graphics.png" alt="High-Quality-Graphics">
                </div>
        <!-- <div class="icon">📈</div>  -->
        <h3>High-Quality Graphics</h3> <!-- Heading -->
        <p>We deliver polished, professional graphics with attention to detail that make a lasting impression on your audience.</p>
      </div>
    </div>

    <!-- Box 2 -->
    <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
      <div class="custom-box" >
        <div class="feature-widget-2__icon">
                  <img src="./image/gd/icons/Timely-Delivery.png" alt="Timely-Delivery">
                </div>
        <!-- <div class="icon">🌐</div>  -->
        <h3>Timely Delivery</h3> <!-- Heading -->
        <p>We understand the importance of deadlines and ensure that your design projects are completed on time, every time.</p>
      </div>
    </div>

    <!-- Box 3 -->
    <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
      <div class="custom-box" >
        <div class="feature-widget-2__icon">
                  <img src="./image/gd/icons/Competitive-Pricing.png" alt="Competitive-Pricing">
                </div>
        <!-- <div class="icon">💼</div>  -->
        <h3>Competitive Pricing</h3> <!-- Heading -->
        <p>Our services are designed to provide exceptional value, offering high-quality designs at affordable rates.</p>
      </div>
    </div>
  </div>
</div>
</div>
</div>

    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~
    Home 1 : social-apps-logo-slider
~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
 <style type="text/css">
  /* Default styling: Hidden by default */
.social-logo-btn-mobile {
  display: none; /* Hidden by default */
}

/* Mobile-specific styling */
@media screen and (max-width: 600px) { /* Adjust the width as per your design */
  .social-logo-btn-mobile {
    display: flex; /* Show on mobile */
    justify-content: center; /* Center horizontally */
  }
  .social-logo-btn {
      display: none;
  }
}

</style>

<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Home 1  : Section 7 Social Apps logos Slider
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

<div class="home-6_topic-section section-padding-120">
      <div class="container">
        <div class="section-heading section-heading--row">
          <div class="row justify-content-center text-center text-lg-initial justify-content-lg-between social-icon-heading-button">
            <div class="col-xxl-8 col-xl-7 col-lg-8 col-md-9 ">
              <h2 class="section-heading__title heading-md heading-md--general-sans text-l5-secondary">Elevate your Business online presence with our expert Graphic Design services</h2>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-4">
              <div class="section-heading__button social-logo-btn">
                <a href="<?php echo BASE_URL; ?>contact-us" class="btn-masco btn btn-primary btn-fill--up">
                  <span>Contact Our Experts!</span></a>
              </div>
            </div>
          </div>
        </div>
        <div class="ticker-03_section">
          <div class="ticker-03_wrapper">
            <div class="ticker-03_content">
              <div class="ticker-item">
                <img src="./image/brand-logo/new/Google.png" alt="Google">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/Bing-Icon.png" alt="Bing">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/facebook.png" alt="facebook">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/instagram.png" alt="instagram">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/LinkdIN.png" alt="LinkdIn">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/photoshope.png" alt="photoshope">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/illustrator.png" alt="illustrator">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/React-Native.png" alt="React-Native">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/Tiktok.png" alt="Tiktok">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/Twitter.png" alt="Twitter">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/WordPress.png" alt="WordPress">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/slack.png" alt="slack">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/figma.png" alt="figma">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/snapchat.png" alt="Snapchat">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/shopify.png" alt="shopify">
              </div>
            </div>
            <div class="ticker-03_content">
                <div class="ticker-item">
                <img src="./image/brand-logo/new/Google.png" alt="Google">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/Bing-Icon.png" alt="Bing">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/facebook.png" alt="facebook">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/instagram.png" alt="instagram">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/LinkdIN.png" alt="LinkdIn">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/photoshope.png" alt="photoshope">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/illustrator.png" alt="illustrator">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/React-Native.png" alt="React-Native">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/Tiktok.png" alt="Tiktok">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/Twitter.png" alt="Twitter">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/WordPress.png" alt="WordPress">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/slack.png" alt="slack">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/figma.png" alt="figma">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/snapchat.png" alt="Snapchat">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/shopify.png" alt="shopify">
              </div>
            </div>
            <div class="ticker-03_content">
                <div class="ticker-item">
                <img src="./image/brand-logo/new/Google.png" alt="Google">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/Bing-Icon.png" alt="Bing">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/facebook.png" alt="facebook">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/instagram.png" alt="instagram">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/LinkdIN.png" alt="LinkdIn">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/photoshope.png" alt="photoshope">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/illustrator.png" alt="illustrator">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/React-Native.png" alt="React-Native">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/Tiktok.png" alt="Tiktok">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/Twitter.png" alt="Twitter">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/WordPress.png" alt="WordPress">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/slack.png" alt="slack">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/figma.png" alt="figma">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/snapchat.png" alt="Snapchat">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/shopify.png" alt="shopify">
              </div>
            </div>
            <div class="ticker-03_content">
                <div class="ticker-item">
                <img src="./image/brand-logo/new/Google.png" alt="Google">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/Bing-Icon.png" alt="Bing">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/facebook.png" alt="facebook">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/instagram.png" alt="instagram">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/LinkdIN.png" alt="LinkdIn">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/photoshope.png" alt="photoshope">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/illustrator.png" alt="illustrator">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/React-Native.png" alt="React-Native">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/Tiktok.png" alt="Tiktok">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/Twitter.png" alt="Twitter">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/WordPress.png" alt="WordPress">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/slack.png" alt="slack">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/figma.png" alt="figma">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/snapchat.png" alt="Snapchat">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/shopify.png" alt="shopify">
              </div>
            </div>
            <div class="ticker-03_content">
               <div class="ticker-item">
                <img src="./image/brand-logo/new/Google.png" alt="Google">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/Bing-Icon.png" alt="Bing">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/facebook.png" alt="facebook">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/instagram.png" alt="instagram">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/LinkdIN.png" alt="LinkdIn">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/photoshope.png" alt="photoshope">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/illustrator.png" alt="illustrator">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/React-Native.png" alt="React-Native">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/Tiktok.png" alt="Tiktok">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/Twitter.png" alt="Twitter">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/WordPress.png" alt="WordPress">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/slack.png" alt="slack">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/figma.png" alt="figma">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/snapchat.png" alt="Snapchat">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/shopify.png" alt="shopify">
              </div>
            </div>
            <div class="ticker-03_content">
                <div class="ticker-item">
                <img src="./image/brand-logo/new/Google.png" alt="Google">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/Bing-Icon.png" alt="Bing">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/facebook.png" alt="facebook">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/instagram.png" alt="instagram">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/LinkdIN.png" alt="LinkdIn">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/photoshope.png" alt="photoshope">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/illustrator.png" alt="illustrator">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/React-Native.png" alt="React-Native">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/Tiktok.png" alt="Tiktok">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/Twitter.png" alt="Twitter">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/WordPress.png" alt="WordPress">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/slack.png" alt="slack">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/figma.png" alt="figma">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/snapchat.png" alt="Snapchat">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/shopify.png" alt="shopify">
              </div>
            </div>
            <div class="ticker-03_content">
                <div class="ticker-item">
                <img src="./image/brand-logo/new/Google.png" alt="Google">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/Bing-Icon.png" alt="Bing">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/facebook.png" alt="facebook">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/instagram.png" alt="instagram">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/LinkdIN.png" alt="LinkdIn">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/photoshope.png" alt="photoshope">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/illustrator.png" alt="illustrator">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/React-Native.png" alt="React-Native">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/Tiktok.png" alt="Tiktok">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/Twitter.png" alt="Twitter">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/WordPress.png" alt="WordPress">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/slack.png" alt="slack">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/figma.png" alt="figma">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/snapchat.png" alt="Snapchat">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/shopify.png" alt="shopify">
              </div>
            </div>
            <div class="ticker-03_content">
                <div class="ticker-item">
                <img src="./image/brand-logo/new/Google.png" alt="Google">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/Bing-Icon.png" alt="Bing">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/facebook.png" alt="facebook">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/instagram.png" alt="instagram">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/LinkdIN.png" alt="LinkdIn">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/photoshope.png" alt="photoshope">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/illustrator.png" alt="illustrator">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/React-Native.png" alt="React-Native">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/Tiktok.png" alt="Tiktok">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/Twitter.png" alt="Twitter">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/WordPress.png" alt="WordPress">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/slack.png" alt="slack">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/figma.png" alt="figma">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/snapchat.png" alt="Snapchat">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/shopify.png" alt="shopify">
              </div>
            </div>
            <div class="ticker-03_content">
                <div class="ticker-item">
                <img src="./image/brand-logo/new/Google.png" alt="Google">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/Bing-Icon.png" alt="Bing">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/facebook.png" alt="facebook">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/instagram.png" alt="instagram">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/LinkdIN.png" alt="LinkdIn">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/photoshope.png" alt="photoshope">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/illustrator.png" alt="illustrator">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/React-Native.png" alt="React-Native">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/Tiktok.png" alt="Tiktok">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/Twitter.png" alt="Twitter">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/WordPress.png" alt="WordPress">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/slack.png" alt="slack">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/figma.png" alt="figma">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/snapchat.png" alt="Snapchat">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/shopify.png" alt="shopify">
              </div>
            </div>
          </div>
          <div class="ticker-03_wrapper">
            <div class="ticker-03_content ticker-03_content--reverse">
            <div class="ticker-item">
                <img src="./image/brand-logo/new/Google.png" alt="Google">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/Bing-Icon.png" alt="Bing">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/facebook.png" alt="facebook">
              </div>
              <div class="ticker-item"> 
                <img src="./image/brand-logo/new/instagram.png" alt="instagram">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/LinkdIN.png" alt="LinkdIn">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/photoshope.png" alt="photoshope">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/illustrator.png" alt="illustrator">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/React-Native.png" alt="React-Native">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/Tiktok.png" alt="Tiktok">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/Twitter.png" alt="Twitter">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/WordPress.png" alt="WordPress">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/slack.png" alt="slack">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/figma.png" alt="figma">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/snapchat.png" alt="Snapchat">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/shopify.png" alt="shopify">
              </div>
            </div>
            <div class="ticker-03_content ticker-03_content--reverse">
                <div class="ticker-item">
                <img src="./image/brand-logo/new/Google.png" alt="Google">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/Bing-Icon.png" alt="Bing">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/facebook.png" alt="facebook">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/instagram.png" alt="instagram">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/LinkdIN.png" alt="LinkdIn">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/photoshope.png" alt="photoshope">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/illustrator.png" alt="illustrator">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/React-Native.png" alt="React-Native">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/Tiktok.png" alt="Tiktok">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/Twitter.png" alt="Twitter">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/WordPress.png" alt="WordPress">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/slack.png" alt="slack">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/figma.png" alt="figma">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/snapchat.png" alt="Snapchat">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/shopify.png" alt="shopify">
              </div>
            </div>
            <div class="ticker-03_content ticker-03_content--reverse">
               <div class="ticker-item">
                <img src="./image/brand-logo/new/Google.png" alt="Google">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/Bing-Icon.png" alt="Bing">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/facebook.png" alt="facebook">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/instagram.png" alt="instagram">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/LinkdIN.png" alt="LinkdIn">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/photoshope.png" alt="photoshope ">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/illustrator.png" alt="illustrator">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/React-Native.png" alt="React-Native">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/Tiktok.png" alt="Tiktok">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/Twitter.png" alt="Twitter">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/WordPress.png" alt="WordPress">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/slack.png" alt="slack">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/figma.png" alt="figma">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/snapchat.png" alt="Snapchat">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/shopify.png" alt="shopify">
              </div>
            </div>
            <div class="ticker-03_content ticker-03_content--reverse">
                <div class="ticker-item">
                <img src="./image/brand-logo/new/Google.png" alt="Google">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/Bing-Icon.png" alt="Bing">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/facebook.png" alt="facebook">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/instagram.png" alt="instagram">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/LinkdIN.png" alt="LinkdIn">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/photoshope.png" alt="photoshope">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/illustrator.png" alt="illustrator">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/React-Native.png" alt="React-Native">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/Tiktok.png" alt="Tiktok">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/Twitter.png" alt="Twitter">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/WordPress.png" alt="WordPress">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/slack.png" alt="slack">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/figma.png" alt="figma">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/snapchat.png" alt="Snapchat">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/shopify.png" alt="shopify">
              </div>
            </div>
            <div class="ticker-03_content ticker-03_content--reverse">
                <div class="ticker-item">
                <img src="./image/brand-logo/new/Google.png" alt="Google">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/Bing-Icon.png" alt="Bing">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/facebook.png" alt="facebook">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/instagram.png" alt="instagram">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/LinkdIN.png" alt="LinkdIn">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/photoshope.png" alt="photoshope">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/illustrator.png" alt="illustrator">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/React-Native.png" alt="React-Native">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/Tiktok.png" alt="Tiktok">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/Twitter.png" alt="Twitter">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/WordPress.png" alt="WordPress">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/slack.png" alt="slack">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/figma.png" alt="figma">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/snapchat.png" alt="Snapchat">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/shopify.png" alt="shopify">
              </div>
            </div>
            <div class="ticker-03_content ticker-03_content--reverse">
                <div class="ticker-item">
                <img src="./image/brand-logo/new/Google.png" alt="Google">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/Bing-Icon.png" alt="Bing">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/facebook.png" alt="facebook">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/instagram.png" alt="instagram">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/LinkdIN.png" alt="LinkdIn">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/photoshope.png" alt="photoshope">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/illustrator.png" alt="illustrator">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/React-Native.png" alt="React-Native">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/Tiktok.png" alt="Tiktok">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/Twitter.png" alt="Twitter">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/WordPress.png" alt="WordPress">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/slack.png" alt="slack">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/figma.png" alt="figma">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/snapchat.png" alt="Snapchat">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/shopify.png" alt="shopify">
              </div>
            </div>
            <div class="ticker-03_content ticker-03_content--reverse">
                <div class="ticker-item">
                <img src="./image/brand-logo/new/Google.png" alt="Google">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/Bing-Icon.png" alt="Bing">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/facebook.png" alt="facebook">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/instagram.png" alt="instagram">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/LinkdIN.png" alt="LinkdIn">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/photoshope.png" alt="photoshope">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/illustrator.png" alt="illustrator">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/React-Native.png" alt="React-Native">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/Tiktok.png" alt="Tiktok">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/Twitter.png" alt="Twitter">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/WordPress.png" alt="WordPress">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/slack.png" alt="slack">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/figma.png" alt="figma">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/snapchat.png" alt="Snapchat">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/shopify.png" alt="shopify">
              </div>
            </div>
            <div class="ticker-03_content ticker-03_content--reverse">
                <div class="ticker-item">
                <img src="./image/brand-logo/new/Google.png" alt="Google">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/Bing-Icon.png" alt="Bing">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/facebook.png" alt="facebook">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/instagram.png" alt="instagram">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/LinkdIN.png" alt="LinkdIn">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/photoshope.png" alt="photoshope">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/illustrator.png" alt="illustrator">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/React-Native.png" alt="React-Native">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/Tiktok.png" alt="Tiktok">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/Twitter.png" alt="Twitter">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/WordPress.png" alt="WordPress">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/slack.png" alt="slack">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/figma.png" alt="figma">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/snapchat.png" alt="Snapchat">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/shopify.png" alt="shopify">
              </div>
            </div>
            <div class="ticker-03_content ticker-03_content--reverse">
                <div class="ticker-item">
                <img src="./image/brand-logo/new/Google.png" alt="Google">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/Bing-Icon.png" alt="Bing">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/facebook.png" alt="facebook">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/instagram.png" alt="instagram">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/LinkdIN.png" alt="LinkdIn">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/photoshope.png" alt="photoshope">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/illustrator.png" alt="illustrator">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/React-Native.png" alt="React-Native">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/Tiktok.png" alt="Tiktok">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/Twitter.png" alt="Twitter">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/new/WordPress.png" alt="WordPress">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/slack.png" alt="slack">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/figma.png" alt="figma">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/snapchat.png" alt="Snapchat">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/shopify.png" alt="shopify">
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="social-logo-btn-mobile center">
            <a href="<?php echo BASE_URL; ?>contact-us" class="btn-masco btn-masco--header rounded-pill btn-fill--up">
              <span>Contact Our Experts!</span></a>
          </div>
        </div>
      </div>
    </div>



     <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Home 1 : Service Section
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <div class="home-1_service-section padding-bottom-120" id="feature">
      <div class="home-1_service-section-shape">
        <img src="./image/home-1/service-section-shape.svg" alt="image alt">
      </div>
      <div class="container">
        <div class="home-1_service-section-wrapper">
          <div class="row justify-content-center">
            <div class="col-xxl-6 col-xl-7 col-lg-8 col-md-9">
              <div class="section-heading text-center">
                <h2 class="section-heading__title heading-md text-black">All the Graphic Design services that are convenient for you</h2>
              </div>
            </div>
          </div>
          <div class="row gutter-y-default justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-10">
              <a href="<?php echo BASE_URL; ?>contact-us" class="service-card   hvr-fill" data-aos-duration="1000" data-aos="fade-right">
                <div class="service-card__icon">
                  <img src="./image/gd/gd-services-icons/Logo-Design.png" alt="Logo-Design" class="inline-svg">
                </div>
                <div class="service-card__body">
                  <h3 class="service-card__title">Logo Design</h3>
                  <p>Custom logos that capture your business identity and make a memorable impact.</p>
                  <span class="service-card__link btn-link btn-arrow">Find out more</span>
                </div>
              </a>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-10">
              <a href="<?php echo BASE_URL; ?>contact-us" class="service-card   hvr-fill" data-aos-duration="1000" data-aos="fade-left">
                <div class="service-card__icon">
                  <img src="./image/gd/gd-services-icons/Business-Card-Design.png" alt="Business-Card-Design" class="inline-svg">
                </div>
                <div class="service-card__body">
                  <h3 class="service-card__title">Business Card Design</h3>
                  <p>Professionally designed business cards that make a lasting first impression.</p>
                  <span class="service-card__link btn-link btn-arrow">Find out more</span>
                </div>
              </a>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-10">
              <a href="<?php echo BASE_URL; ?>contact-us" class="service-card   hvr-fill" data-aos-duration="1000" data-aos="fade-right">
                <div class="service-card__icon">
                  <img src="./image/gd/gd-services-icons/Social-Media-Grahpics.png" alt="Social-Media-Grahpics" class="inline-svg">
                </div>
                <div class="service-card__body">
                  <h3 class="service-card__title">Social Media Graphics</h3>
                  <p>Engaging visuals for posts, banners, stories, and ads across platforms like Instagram, Facebook, and LinkedIn.</p>
                  <span class="service-card__link btn-link btn-arrow">Find out more</span>
                </div>
              </a>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-10">
              <a href="<?php echo BASE_URL; ?>contact-us" class="service-card   hvr-fill" data-aos-duration="1000" data-aos="fade-left">
                <div class="service-card__icon">
                  <img src="./image/gd/gd-services-icons/Websitee-Design.png" alt="Websitee-Design" class="inline-svg">
                </div>
                <div class="service-card__body">
                  <h3 class="service-card__title">Website Design</h3>
                  <p>Designing user-friendly, visually appealing interfaces for websites.</p>
                  <span class="service-card__link btn-link btn-arrow">Find out more</span>
                </div>
              </a>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-10">
              <a href="<?php echo BASE_URL; ?>contact-us" class="service-card   hvr-fill" data-aos-duration="1000" data-aos="fade-left">
                <div class="service-card__icon">
                  <img src="./image/gd/gd-services-icons/Brand-Identity-Design.png" alt="Brand-Identity-Design" class="inline-svg">
                </div>
                <div class="service-card__body">
                  <h3 class="service-card__title">Brand Identity Design</h3>
                  <p>Creating cohesive business visuals, including logos, colour schemes, typography, and brand guidelines.</p>
                  <span class="service-card__link btn-link btn-arrow">Find out more</span>
                </div>
              </a>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-10">
              <a href="<?php echo BASE_URL; ?>contact-us" class="service-card   hvr-fill" data-aos-duration="1000" data-aos="fade-left">
                <div class="service-card__icon">
                  <img src="./image/gd/gd-services-icons/Brocher-&-fLYER-dESIGN.png" alt="Brocher-&-fLYER-dESIGN" class="inline-svg">
                </div>
                <div class="service-card__body">
                  <h3 class="service-card__title">Brochure and Flyer Design</h3>
                  <p>Eye-catching brochures and flyers effectively communicate your message and promote your products or services.</p>
                  <span class="service-card__link btn-link btn-arrow">Find out more</span>
                </div>
              </a>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-10">
              <a href="<?php echo BASE_URL; ?>contact-us" class="service-card   hvr-fill" data-aos-duration="1000" data-aos="fade-left">
                <div class="service-card__icon">
                  <img src="./image/gd/gd-services-icons/Packaging-Design.png" alt="Packaging-Design" class="inline-svg">
                </div>
                <div class="service-card__body">
                  <h3 class="service-card__title">Packaging Design</h3>
                  <p>Designing product packaging that reflects your business and attracts customers.</p>
                  <span class="service-card__link btn-link btn-arrow">Find out more</span>
                </div>
              </a>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-10">
              <a href="<?php echo BASE_URL; ?>contact-us" class="service-card   hvr-fill" data-aos-duration="1000" data-aos="fade-left">
                <div class="service-card__icon">
                  <img src="./image/gd/gd-services-icons/Presentation-Design.png" alt="Presentation-Design" class="inline-svg">
                </div>
                <div class="service-card__body">
                  <h3 class="service-card__title">Presentation Design</h3>
                  <p>Designing professional presentations that engage and captivate your audience.</p>
                  <span class="service-card__link btn-link btn-arrow">Find out more</span>
                </div>
              </a>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-10">
              <a href="<?php echo BASE_URL; ?>contact-us" class="service-card   hvr-fill" data-aos-duration="1000" data-aos="fade-left">
                <div class="service-card__icon">
                  <img src="./image/gd/gd-services-icons/Document-&-report-Design.png" alt="Document-&-report-Design" class="inline-svg">
                </div>
                <div class="service-card__body">
                  <h3 class="service-card__title">Document and Report Design</h3>
                  <p>Designing visually appealing reports, case studies, and documents for business purposes..</p>
                  <span class="service-card__link btn-link btn-arrow">Find out more</span>
                </div>
              </a>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-10">
              <a href="<?php echo BASE_URL; ?>contact-us" class="service-card   hvr-fill" data-aos-duration="1000" data-aos="fade-left">
                <div class="service-card__icon">
                  <img src="./image/gd/gd-services-icons/Print-Advertising-Design.png" alt="Print-Advertising-Design" class="inline-svg">
                </div>
                <div class="service-card__body">
                  <h3 class="service-card__title">Print Advertising Design</h3>
                  <p>Creating advertisements for print media, including magazines, newspapers, and posters.</p>
                  <span class="service-card__link btn-link btn-arrow">Find out more</span>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>




<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Home 3  : Testimonial Section 
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
<div class="home-3_testimonial section-padding-120 testimonial-section section-padding-120" id="testimonial">
  <div class="container">
    <!-- Section Title -->
     <div class="section-heading section-heading--row">
          <div class="row text-center text-lg-initial justify-content-center justify-content-lg-between">
            <div class="col-xxl-9 col-lg-9 col-md-9 col-11">
              <h2 class="section-heading__title testimonial-heading-md text-black">Join Our Happy Clients – Let’s Elevate Your Business!</h2>
            </div>
            <div class="col-xl-3 col-md-4">
              <div class="section-heading__button testimonial-btn">
                <a href="<?php echo BASE_URL; ?>contact-us" class="btn-masco btn-primary-l03 btn-shadow rounded-pill">
                  <span>Get Started Today!</span></a>
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
        <img src="./image/home-1/Dianne Russell-Testimonial2.webp" alt="Dianne Russell" />
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
        <img src="./image/home-1/Guy Hawkins-Testimonial6.webp" alt="Guy Hawkins" />
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
        <img src="./image/home-1/Marvin McKinney-Testimonial3.webp" alt="Marvin McKinney" />
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
        <img src="./image/home-1/Ronald Richards-Testimonial1.webp" alt="Ronald Richards" />
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
        <img src="./image/home-1/Kristin Watson-Testimonial5.webp" alt="Kristin Watson" />
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
        <img src="./image/home-1/Karen Lynn-Testimonial1.webp" alt="Karen Lynn" />
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
        <img src="./image/home-1/Sophia-Carter-Testimonial7.webp" alt="Sophia Carter" />
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
        <img src="./image/home-1/Testimonial8.webp" alt="Ethan Walker" />
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
        <img src="./image/home-1/Testimonial9.webp" alt="Isabella Martinez" />
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
        <img src="./image/home-1/Testimonial10.webp" alt="Matthew Robinson" />
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
        <img src="./image/home-1/Testimonial11.webp" alt="Olivia Hernandez" />
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
        <img src="./image/home-1/Testimonial12.webp" alt="Liam Harris" />
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
                What is the typical timeline for a graphic design project?
                </button>
                <div id="home-1-faq-item" class="accordion-collapse collapse show" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  The timeline depends on the complexity of the project. Logos and branding may take 1-2 weeks, 
                  while larger projects like websites or full branding can take several weeks. We’ll provide an estimated timeline before starting.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-2" aria-expanded="false" aria-controls="home-1-faq-item-2">
                How do I know if your design aligns with my brand vision?
                </button>
                <div id="home-1-faq-item-2" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  We work closely with you to understand your brand values, style, and goals. 
                  We also provide you with drafts and encourage feedback throughout the design process to ensure we’re on the right track.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-3" aria-expanded="false" aria-controls="home-1-faq-item-3">
                Can I make revisions to the design?
                </button>
                <div id="home-1-faq-item-3" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  Yes, we offer revisions based on your feedback. 
                  Our goal is to ensure your complete satisfaction with the final design.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-4" aria-expanded="false" aria-controls="home-1-faq-item-4">
                What happens if I don’t like the initial design concepts?
                </button>
                <div id="home-1-faq-item-4" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  We aim to deliver designs that meet your expectations. 
                  If you don’t like the initial concepts, we’ll revise them or provide new ideas based on your feedback.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-5" aria-expanded="false" aria-controls="home-1-faq-item-5">
                Do you offer design services for both print and digital platforms?
                </button>
                <div id="home-1-faq-item-5" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  Yes, we offer graphic design services for print (such as brochures, 
                  business cards, and posters) and digital platforms (like websites, social media, and email marketing).
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-6" aria-expanded="false" aria-controls="home-1-faq-item-6">
                How do you ensure my design is unique and stands out?
                </button>
                <div id="home-1-faq-item-6" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  Our team researches your industry and competitors to ensure your design is original, 
                  aligns with the latest design trends, and reflects your brand’s unique identity.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-7" aria-expanded="false" aria-controls="home-1-faq-item-7">
                What file formats will I receive for my designs?
                </button>
                <div id="home-1-faq-item-7" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  Depending on your needs, we provide the final designs in various formats, including PNG, JPG, EPS, PDF, and AI. 
                  This ensures you can use the designs across both digital and print platforms.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-8" aria-expanded="false" aria-controls="home-1-faq-item-8">
                How much does graphic design cost?
                </button>
                <div id="home-1-faq-item-8" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  The cost varies depending on the scope and complexity of the project. 
                  We offer affordable rates and provide a custom quote based on your specific design needs. Please contact us for a free consultation.
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
                  <h2 class="heading-md contactus-mobile-heading">Feel Free to Contact Us </h2>
                  <p>
                    We are here to help you. Our expert team will get in touch within 24 hours. Let's solve your challenges together!
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
                   "RFZ Digital did an exceptional job for us. Keep up the excellent digital work! The quality and results continue to impress as I explore more of their services. I’ve received at least 50 times the value from RFZ Digital—it’s worth far more than I paid!"
                  </p>
                  <div class="testimonial-widget-4__body">
                    <div class="testimonial-widget-4__user-image">
                      <img src="./image/contact/contact-user-image.png" alt="image alt">
                    </div>
                    <div class="testimonial-widget-4__user-metadeta">
                      <h3 class="testimonial-widget-4__user">Brooklyn Simmons</h3>
                      <span class="testimonial-widget-4__user-position">CEO & Co-founder </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="offset-xl-1 col-lg-6 col-md-10">
           <div class="form-box-style__form-wrapper bg-light-2">
    <form class="form-box-style" id="contact-form" method="POST" action="/seo">
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
            <!-- Added CAPTCHA field -->
            <div class="form-box-style__form-input">
                <div class="g-recaptcha mb-3" data-sitekey="6Lc-9N0qAAAAAPqT-iqpOodgdx8VgaJq03ckWoLe"></div>
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

    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Home 8  : Blogs Section 
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <!--<div class="home-8_blog-section padding-bottom-120 padding-top-120 bg-cream" id="blog">-->
    <!--  <div class="container">-->
    <!--    <div class="row justify-content-center text-center">-->
    <!--      <div class="col-xxl-7 col-xl-8 col-lg-9 col-md-10 col-auto">-->
    <!--        <div class="section-heading distance-btw-blogandheading">-->
    <!--          <h2 class="section-heading__title heading-lg text-black-2">Browse our articles and resources to learn more</h2>-->
    <!--          <p>A lot of information is given in our blogs. You can learn-->
    <!--            more about startup by reading our blogs.-->
    <!--            It’s time to brainstorm ideas for your business</p>-->
    <!--        </div>-->
    <!--      </div>-->
    <!--    </div>-->
    <!--    <div class="row gutter-y-default justify-content-center">-->
    <!--      <div class="col-lg-4 col-md-6 col-sm-8">-->
    <!--        <div class="blog-card h-100">-->
    <!--          <div class="blog-card__image">-->
    <!--            <img src="./image/home-1/blog-image-1.png" alt="image alt">-->
    <!--            <a href="#" class="blog-card__badge">Startup</a>-->
    <!--          </div>-->
    <!--          <div class="blog-card__body">-->
    <!--            <div class="blog-card__meta">-->
    <!--              <span><img src="./image/home-8/blog-card-icon-1.svg" alt="icon">Adam Smith</span>-->
    <!--              <span><img src="./image/home-8/blog-card-icon-2.svg" alt="calender">Feb 28, 2023</span>-->
    <!--            </div>-->
    <!--            <h3 class="blog-card__title">Benefits to first-generation low-income entrepreneurs</h3>-->
    <!--            <a href="#" class="blog-card__link btn-link btn-arrow">Read more </a>-->
    <!--          </div>-->
    <!--        </div>-->
    <!--      </div>-->
    <!--      <div class="col-lg-4 col-md-6 col-sm-8">-->
    <!--        <div class="blog-card h-100">-->
    <!--          <div class="blog-card__image">-->
    <!--            <img src="./image/home-1/blog-image-2.png" alt="image alt">-->
    <!--            <a href="#" class="blog-card__badge">Entrepreneurship</a>-->
    <!--          </div>-->
    <!--          <div class="blog-card__body">-->
    <!--            <div class="blog-card__meta">-->
    <!--              <span><img src="./image/home-8/blog-card-icon-1.svg" alt="icon">Max Wevar</span>-->
    <!--              <span><img src="./image/home-8/blog-card-icon-2.svg" alt="calender">Feb 10, 2023</span>-->
    <!--            </div>-->
    <!--            <h3 class="blog-card__title">Dangers of a traditional for your career goal</h3>-->
    <!--            <a href="#" class="blog-card__link btn-link btn-arrow">Read more </a>-->
    <!--          </div>-->
    <!--        </div>-->
    <!--      </div>-->
    <!--      <div class="col-lg-4 col-md-6 col-sm-8">-->
    <!--        <div class="blog-card h-100">-->
    <!--          <div class="blog-card__image">-->
    <!--            <img src="./image/home-1/blog-image-3.png" alt="image alt">-->
    <!--            <a href="#" class="blog-card__badge">Technology</a>-->
    <!--          </div>-->
    <!--          <div class="blog-card__body">-->
    <!--            <div class="blog-card__meta">-->
    <!--              <span><img src="./image/home-8/blog-card-icon-1.svg" alt="icon">Willium Jons</span>-->
    <!--              <span><img src="./image/home-8/blog-card-icon-2.svg" alt="calender">Feb 03, 2023</span>-->
    <!--            </div>-->
    <!--            <h3 class="blog-card__title">How to increase ad revenue in mobile applications</h3>-->
    <!--            <a href="#" class="blog-card__link btn-link btn-arrow">Read more </a>-->
    <!--          </div>-->
    <!--        </div>-->
    <!--      </div>-->
    <!--    </div>-->
    <!--  </div>-->
    <!--</div>-->
    
    
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
            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-10 col-12">
              <div class="cta-text-block">
                <h2 class="heading-md heading-md--general-sans text-l5-secondary">Start Designing Stunning Graphics with Our Expert Design Services Today</h2>
              </div>
            </div>
            <div class="col-xl-auto col-lg-4 col-md-5 col-xs-8 col-12">
              <div class="cta-home-5-button">
                <a href="<?php echo BASE_URL; ?>contact-us" class="btn-masco btn-secondary-l05 btn-fill--up">
                  <span>Let's start the project</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

<?php include 'includes/footer.php'; ?>