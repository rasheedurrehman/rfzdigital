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
$meta_title = "Contact Us - RFZ Digital";
$meta_description = "Get in touch with RFZ Digital for top-notch website design, development, and digital marketing services across the UK and Ireland.";
$canonical_url = "https://rfzdigital.co.uk/contact-us";

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
    $secretKey = '6Lc-9N0qAAAAAGmzU7g9e2eJAtcDctOrDtUG6cnB';
    $captchaResponse = $_POST['g-recaptcha-response'];

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
        $email = sanitize_input($_POST['email']);
        $phone = sanitize_input($_POST['phone']);
        $messageContent = sanitize_input($_POST['message']); // Avoid conflict with $message variable

        // Check if all fields are filled
        if (!empty($name) && !empty($email) && !empty($phone) && !empty($messageContent)) {
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
                    $adminPassword = 'f)yWpd$)c6f~'; // Replace with admin password

                    $mail = new PHPMailer(true);

                    try {
                        // Server settings for Admin
                        $mail->isSMTP();
                        $mail->Host = 'premium55.web-hosting.com'; // Replace with your SMTP server
                        $mail->SMTPAuth = true;
                        $mail->Username = $adminEmail;
                        $mail->Password = $adminPassword;
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                        $mail->Port = 465;

                        // Admin email settings
                        $mail->setFrom($adminEmail, 'RFZ Digital');
                        $mail->addAddress($adminEmail); // Send to admin
                        $mail->addReplyTo($email, $name); // Reply-to user

// Capture the form submission URL
                    $page_url = $_SERVER['HTTP_REFERER'];
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
                $message = "<div class='error-message'>An error occurred while submitting the form to the database.</div>";
            }
        } else {
            $message = "<div class='error-message'>Please fill in all the fields.</div>";
        }
    } else {
        $message = "<div class='error-message'>reCAPTCHA verification failed. Please try again.</div>";
    }
}
?>

<!-- Google reCAPTCHA widget -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
 <style>
/* Hides the "mobile-hide" class only on mobile devices (max-width: 600px) */
@media (max-width: 600px) {
  .mobile-hide {
    display: none;
  }
}

/* Shows the "mobile-heading" class only on mobile devices (max-width: 600px) */
@media (max-width: 600px) {
  .contactus-mobile-heading {
    display: block;
    letter-spacing: -1px;
  }
}

/* Hides the "mobile-heading" class on all devices larger than 600px */
@media (min-width: 601px) {
  .contactus-mobile-heading {
    display: none;
  }
}

 </style>



    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Conatct : Main Section 
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <div class="contact_main-section padding-bottom-120 contact-us-page-margin-top-150">
      <div class="container">
        <div class="row row--cuatom">
          <div class="col-xl-5 col-lg-6 col-md-8 col-sm-11">
            <div class="contact_main-content contact-content-space">
              <div class="content">
                <div class="content-text-block">
                  <h2 class="heading-md mobile-hide">Fill out this form, We ‘ll quickly get back to you </h2>
                  <h2 class="heading-md contactus-mobile-heading">Feel Free to Contact Us </h2>
                  <p>
                    We are here to help you. Our expert team will get in touch within 24 hours. Let's solve your challenges together!
                  </p>
                  <div class="content-divider"></div>
                </div>
              </div>
              <div class="content_main-testimonial mobile-hide">
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
                      <h4 class="testimonial-widget-4__user">Brooklyn Simmons</h4>
                      <span class="testimonial-widget-4__user-position">CEO & Co-founder</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="offset-xl-1 col-lg-6 col-md-10">
            <div class="form-box-style__form-wrapper bg-light-2">
              <form class="form-box-style" id="contact-form" method="POST" action="/contact-us">
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




     <?php include 'includes/footer.php'; ?>