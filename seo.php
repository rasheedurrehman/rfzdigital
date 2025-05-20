
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
$meta_title = "SEO Services in UK & Ireland - RFZ Digital";
$meta_description = "Improve your website ranking and organic traffic with RFZ Digital. We offer expert SEO services in the UK and Ireland, including on-page, Off-page, local SEO";
$canonical_url = "https://rfzdigital.co.uk/seo";

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
  "name": "SEO",
  "description": "Expert SEO services by RFZ Digital UK to improve search engine visibility, boost website traffic, and drive organic leads for UK businesses.",
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
  "serviceType": "SEO",
  "url": "https://rfzdigital.co.uk/seo"
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
            background-image: url('./image/seo/new-header-SEO.webp'); /* Update with your image path */
            background-size: cover;
            background-position: center;
            height: 115vh; /* Full viewport height */
            color: #333; /* Text color */
            position: relative;
            overflow: hidden;
            width: auto;
        }
        .hero-title {
            font-size: 39px;
            letter-spacing: -2px;
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
            background-image: url('./image/seo/new-header-SEO.webp'); /* Update with your image path */
            background-size: cover;
            background-position: center;
            height: 147vh; /* Full viewport height */
            color: #333; /* Text color */
            position: relative;
            overflow: hidden;
            width: auto;
        }
}

@media (min-width: 768px) {
      
        .hero-section {
        background-image: url('./image/seo/seo-Header-Images-iPad.webp'); /* Update with your image path */
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
            background-image: url('./image/seo/new-header-SEO.webp'); /* Update with your image path */
            background-size: cover;
            background-position: center;
            height: 120vh; /* Full viewport height */
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
            background-image: url('./image/seo/new-header-SEO.webp'); /* Update with your image path */
            background-size: cover;
            background-position: center;
            height: 110vh; /* Full viewport height */
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
                        Get more traffic to your website from UK & Ireland
                    </h1>
                    <div class="row justify-content-center">
                        <p class="hero-subtitle col-12 col-md-10">
                            Our SEO services focus on increasing your website visibility to attract more visitors from UK and Ireland. By optimising your website for search engines, we ensure your 
                business reaches the right audience and drives consistent, high-quality traffic to boost your online success.
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
    Home 5  : Content Section 2
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <div class="home-5_content-section-2 section-padding-120 bg-offwhite-3">
      <div class="container">
        <div class="row row--custom ">
          <div class="col-xl-6 col-lg-5 col-md-6 col-7" data-aos-duration="1000" data-aos="fade-left">
            <div class="home-5_content-image-2 ">
              <img src="./image/seo/Seo-Page-AboutUs.webp" alt="SEO Services across UK and Ireland">
            </div>
          </div>
          <div class="col-xl-6 col-lg-7 col-md-10 col-auto" data-aos-duration="1000" data-aos="fade-right">
            <div class="content">
              <div class="content-text-block">
                <h2 class="content-title heading-md text-black text-l5-secondary">
                Helping Businesses Dominate Search Engines across UK and Ireland.
                </h2>
                <p>We specialise in helping businesses dominate search engines across the UK and Ireland by implementing effective SEO strategies. Our team of experts works closely with you to understand your goals and target audience and optimise your website. </p>
                <p>From boosting your rankings to driving high-quality traffic, we ensure your business stands out in the UK & Ireland Markets.</p>
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
                <h2 class="section-heading__title heading-md heading-md--general-sans text-l5-secondary">Turn traffic with insanely SEO &amp; growth into revenue</h2>
              </div>
            </div>
          </div>

  <div class="row g-4">
    <!-- Box 1 -->
    <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
      <div class="custom-box">
        <div class="feature-widget-2__icon">
                  <img src="./image/seo/seo-icons/Proven-Results.png" alt="Proven Results">
                </div>
        <!-- <div class="icon">📈</div>  -->
        <h3>Proven Results</h3> <!-- Heading -->
        <p>We have a track record of delivering higher rankings, increased traffic, and measurable growth for businesses across the UK and Ireland.</p>
      </div>
    </div>

    <!-- Box 2 -->
    <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
      <div class="custom-box" >
        <div class="feature-widget-2__icon">
                  <img src="./image/seo/seo-icons/Affordable-Solutions.png" alt="Affordable Solutions">
                </div>
        <!-- <div class="icon">🌐</div>  -->
        <h3>Affordable Solutions</h3> <!-- Heading -->
        <p>We offer competitive pricing without compromising quality, making effective SEO accessible for businesses across the UK and Ireland.</p>
      </div>
    </div>

    <!-- Box 3 -->
    <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
      <div class="custom-box" >
        <div class="feature-widget-2__icon">
                  <img src="./image/seo/seo-icons/Transparent-Process.png" alt="Transparent Process">
                </div>
        <!-- <div class="icon">💼</div>  -->
        <h3>Transparent Process</h3> <!-- Heading -->
        <p>We provide regular updates and precise reports so you always know how SEO campaigns are performing.</p>
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
              <h2 class="section-heading__title heading-md heading-md--general-sans text-l5-secondary">Elevate your Business online presence with our proven SEO Strategies</h2>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-4">
              <div class="section-heading__button social-logo-btn">
                <a href="<?php echo BASE_URL; ?>contact-us" class="btn-masco btn btn-primary btn-fill--up">
                  <span>Get Started Today!</span></a>
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
              <span>Get Started Today!</span></a>
          </div>
        </div>
      </div>
    </div>     <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~
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
                <h2 class="section-heading__title heading-md text-black">All the SEO services that are convenient for you</h2>
              </div>
            </div>
          </div>
          <div class="row gutter-y-default justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-10">
              <a href="<?php echo BASE_URL; ?>contact-us" class="service-card   hvr-fill" data-aos-duration="1000" data-aos="fade-right">
                <div class="service-card__icon">
                  <img src="./image/seo/seo-services-icons/Seo-Aduit.png" alt="Seo-Aduit" class="inline-svg">
                </div>
                <div class="service-card__body">
                  <h3 class="service-card__title">SEO Audit</h3>
                  <p>Identify your website strengths and weaknesses with our comprehensive SEO audit service, designed to improve rankings and boost online visibility.</p>
                  <span class="service-card__link btn-link btn-arrow">Find out more</span>
                </div>
              </a>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-10">
              <a href="<?php echo BASE_URL; ?>contact-us" class="service-card   hvr-fill" data-aos-duration="1000" data-aos="fade-left">
                <div class="service-card__icon">
                  <img src="./image/seo/seo-services-icons/On-page-Seo.png" alt="On-page-Seo" class="inline-svg">
                </div>
                <div class="service-card__body">
                  <h3 class="service-card__title">On-Page SEO</h3>
                  <p>Optimise your website structure, content, and meta tags to improve search engine rankings and enhance user experience</p>
                  <span class="service-card__link btn-link btn-arrow">Find out more</span>
                </div>
              </a>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-10">
              <a href="<?php echo BASE_URL; ?>contact-us" class="service-card   hvr-fill" data-aos-duration="1000" data-aos="fade-right">
                <div class="service-card__icon">
                  <img src="./image/seo/seo-services-icons/Off-page-seo.png" alt="Off-page-seo" class="inline-svg">
                </div>
                <div class="service-card__body">
                  <h3 class="service-card__title">Off-page SEO</h3>
                  <p>Boost your website authority and rankings through quality backlinks, social media engagement, and other off-site strategies</p>
                  <span class="service-card__link btn-link btn-arrow">Find out more</span>
                </div>
              </a>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-10">
              <a href="<?php echo BASE_URL; ?>contact-us" class="service-card   hvr-fill" data-aos-duration="1000" data-aos="fade-left">
                <div class="service-card__icon">
                  <img src="./image/seo/seo-services-icons/Local-Seo.png" alt="Local-Seo" class="inline-svg">
                </div>
                <div class="service-card__body">
                  <h3 class="service-card__title">Local SEO</h3>
                  <p>Optimise your website for location-specific queries and local listings to improve your local search visibility and attract nearby customers.</p>
                  <span class="service-card__link btn-link btn-arrow">Find out more</span>
                </div>
              </a>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-10">
              <a href="<?php echo BASE_URL; ?>contact-us" class="service-card   hvr-fill" data-aos-duration="1000" data-aos="fade-left">
                <div class="service-card__icon">
                  <img src="./image/seo/seo-services-icons/Technical-Seo.png" alt="image alt" class="inline-svg">
                </div>
                <div class="service-card__body">
                  <h3 class="service-card__title">Technical SEO</h3>
                  <p>Ensure your website is fast, secure, and easily crawlable by search engines through technical enhancements like website speed optimisation and mobile responsiveness.</p>
                  <span class="service-card__link btn-link btn-arrow">Find out more</span>
                </div>
              </a>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-10">
              <a href="<?php echo BASE_URL; ?>contact-us" class="service-card   hvr-fill" data-aos-duration="1000" data-aos="fade-left">
                <div class="service-card__icon">
                  <img src="./image/seo/seo-services-icons/Seo-Content.png" alt="Seo-Content-Writting" class="inline-svg">
                </div>
                <div class="service-card__body">
                  <h3 class="service-card__title">SEO Content Writing</h3>
                  <p>Create high-quality, keyword-optimised content that engages your audience while improving your website search engine rankings</p>
                  <span class="service-card__link btn-link btn-arrow">Find out more</span>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>



 <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Home 5  : Process Section
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <div class="home-5_process-section bg-offwhite-3 process-section">
      <div class="container">
        <div class="home-5_process-devider">
          <div class="row justify-content-center text-center">
            <div class="col-xxl-8 col-xl-9 col-lg-9 col-md-10">
              <div class="section-heading">
                <h2 class="section-heading__title fw-600 heading-md heading-md--general-sans text-l5-secondary">We follow a simple yet effective SEO ranking process</h2>
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
                  <h3 class="process-widget__title">Discovery Call</h3>
                  <p>We analyse your business, target audience, and competitors to create a customised SEO strategy that aligns with your goals.</p>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="process-widget">
                <div class="process-widget__count">
                  <span>2</span>
                </div>
                <div class="process-widget__body">
                  <h3 class="process-widget__title">SEO Optimisation</h3>
                  <p>Optimising your website's content, structure, and technical elements to enhance visibility and improve user experience.</p>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="process-widget">
                <div class="process-widget__count">
                  <span>3</span>
                </div>
                <div class="process-widget__body">
                  <h3 class="process-widget__title">Monitoring & Reporting</h3>
                  <p>Tracking performance, analysing results, and refining strategies to ensure continuous improvement and long-term SEO success.</p>
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
                  <span>Contact Our Experts!</span></a>
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
                What is SEO, and why does my business need it?
                </button>
                <div id="home-1-faq-item" class="accordion-collapse collapse show" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  SEO (Search Engine Optimisation) is the process of improving your website visibility on search engines like Google, Bing and Yahoo. It helps your business attract more organic traffic, 
                  reach your target audience, and stay competitive in the digital marketplace across UK and Ireland.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-2" aria-expanded="false" aria-controls="home-1-faq-item-2">
                Do you offer local SEO services?
                </button>
                <div id="home-1-faq-item-2" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  Yes, we provide local SEO services to help businesses rank higher in local searches, attract nearby customers,
                   and improve visibility in specific geographic areas across UK and Ireland.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-3" aria-expanded="false" aria-controls="home-1-faq-item-3">
                What is included in your SEO services?
                </button>
                <div id="home-1-faq-item-3" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  Our SEO services include keyword research, on-page and off-page optimisation, 
                  technical SEO audits, content creation, link building, and performance tracking.ent.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-4" aria-expanded="false" aria-controls="home-1-faq-item-4">
                How do you track the success of an SEO campaign?
                </button>
                <div id="home-1-faq-item-4" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  We use advanced analytics tools to monitor keyword rankings, website traffic, and conversion rates. 
                  We share regular performance reports with you to ensure transparency and measurable results
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-5" aria-expanded="false" aria-controls="home-1-faq-item-5">
                Can SEO help my e-commerce business?
                </button>
                <div id="home-1-faq-item-5" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  Absolutely! SEO is essential for e-commerce businesses.
                   We optimise your product pages, category pages, and overall site structure to improve visibility and drive sales.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-6" aria-expanded="false" aria-controls="home-1-faq-item-6">
                Do you follow Google guidelines for SEO?
                </button>
                <div id="home-1-faq-item-6" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  We strictly adhere to Google’s best practices and ethical SEO techniques to ensure your 
                  website remains compliant and achieves sustainable growth.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-7" aria-expanded="false" aria-controls="home-1-faq-item-7">
                Do you perform an SEO audit before starting?
                </button>
                <div id="home-1-faq-item-7" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  Yes, we begin with a comprehensive SEO audit to evaluate your website’s strengths and areas for improvement,
                   ensuring a customised and effective strategy.
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
                <h2 class="heading-md heading-md--general-sans text-l5-secondary">Grow your business search Ranking with our Expert SEO Services</h2>
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