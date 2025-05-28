<?php
require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';
require_once 'rfzwebdb.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$message = "";

// Load user email template
$templateFilePathUser = 'user-email-template.php';
ob_start();
include $templateFilePathUser;
$userEmailTemplate = ob_get_clean();

// Load admin email template
$templateFilePathAdmin = 'user-admin-email-template.php';
ob_start();
include $templateFilePathAdmin;
$adminEmailTemplate = ob_get_clean();

// Sanitize helper
function sanitize_input($data)
{
    return htmlspecialchars(strip_tags(trim($data)));
}

// Validate phone (basic)
function is_valid_phone($phone)
{
    return preg_match('/^\+?[0-9\s\-\(\)]+$/', $phone);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['form_type']) && $_POST['form_type'] === "bottom_form") {
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
        $name = sanitize_input($_POST['name'] ?? '');
        $email = sanitize_input($_POST['email'] ?? '');
        $phone = sanitize_input($_POST['phone'] ?? '');
        $messageContent = sanitize_input($_POST['message'] ?? '');

        $emailValid = filter_var($email, FILTER_VALIDATE_EMAIL);
        $phoneValid = is_valid_phone($phone);

        if (!empty($name) && $emailValid && $phoneValid && !empty($messageContent)) {
            try {
                $sql = "INSERT INTO contact_form (name, email, phone, message) VALUES (:name, :email, :phone, :message)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':name', $name, PDO::PARAM_STR);
                $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
                $stmt->bindParam(':message', $messageContent, PDO::PARAM_STR);

                if ($stmt->execute()) {
                    $adminEmail = 'yasirhassan@rfzdigital.co.uk';
                    $adminPassword = 'ZuHjZ6H7PQES';
                    $page_url = $_SERVER['HTTP_REFERER'] ?? 'Unknown';

                    // === SEND ADMIN EMAIL ===
                    try {
                        $mail = new PHPMailer(true);
                        $mail->isSMTP();
                        $mail->Host = 'premium55.web-hosting.com';
                        $mail->SMTPAuth = true;
                        $mail->Username = $adminEmail;
                        $mail->Password = $adminPassword;
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                        $mail->Port = 465;

                        $mail->isHTML(true);
                        $mail->setFrom($adminEmail, 'RFZ Digital');
                        $mail->addAddress($adminEmail);
                        $mail->addReplyTo($email, $name);

                        $adminEmailContent = str_replace(
                            ['{{name}}', '{{email}}', '{{phone}}', '{{message}}', '{{page_url}}'],
                            [$name, $email, $phone, $messageContent, $page_url],
                            $adminEmailTemplate
                        );

                        $mail->Subject = 'New Contact Form Submission';
                        $mail->Body = $adminEmailContent;
                        $mail->send();
                    } catch (Exception $e) {
                        error_log("Admin Email Error: " . $mail->ErrorInfo);
                    }

                    // === SEND USER EMAIL ===
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
                        $userMail->addAddress($email);
                        $userMail->addReplyTo($adminEmail, 'RFZ Digital');

                        $userEmailContent = str_replace(
                            ['{{name}}', '{{message}}'],
                            [$name, $messageContent],
                            $userEmailTemplate
                        );

                        $userMail->Subject = 'Thank You for Contacting Us';
                        $userMail->Body = $userEmailContent;
                        $userMail->send();

                        $message = "<div class='success-message'>Form submitted successfully! A confirmation email has been sent.</div>";
                    } catch (Exception $e) {
                        error_log("User Email Error: " . $userMail->ErrorInfo);
                        $message = "<div class='error-message'>Form submitted, but confirmation email failed. Please try later.</div>";
                    }
                } else {
                    $message = "<div class='error-message'>Form submission failed. Please try again.</div>";
                }
            } catch (PDOException $e) {
                error_log("DB Error: " . $e->getMessage());
                $message = "<div class='error-message'>Error saving data. Please try again later.</div>";
            }
        } else {
            $message = "<div class='error-message'>Please enter all fields correctly. Ensure a valid email and phone number.</div>";
        }
    } else {
        $message = "<div class='error-message'>reCAPTCHA verification failed. Please try again.</div>";
    }
}
?>

<!-- Add this script for CAPTCHA -->
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
<div class="contact_main-section padding-bottom-120 padding-top-120">
    <div class="container">
        <div class="row row--cuatom">
            <div class="col-xl-5 col-lg-6 col-md-8 col-sm-11">
                <div class="contact_main-content contact-content-space">
                    <div class="content">
                        <div class="content-text-block">
                            <h2 class="heading-md mobile-hide">Fill out this form, We 'll quickly get back to you</h2>
                            <h2 class="heading-md contactus-mobile-heading">Feel Free to Contact Us</h2>
                            <p>
                                We are here to help you. Our expert team will get in touch within 24 hours. Let's solve
                                your challenges together!
                            </p>
                            <div class="content-divider"></div>
                        </div>
                    </div>
                    <div class="content_main-testimonial mobile-hide">
                        <div class="testimonial-widget-4" data-aos="fade-left" data-aos-delay="NaN">
                            <div class="testimonial-widget-4__rating">
                                <img src="./image/icons/star-five-yellow.svg" class="testimonial-widget-4__star"
                                    alt="image alt">
                            </div>
                            <p>
                                "RFZ Digital did an exceptional job for us. Keep up the excellent digital work! The
                                quality and results continue to impress as I explore more of their services. I've
                                received at least 50 times the value from RFZ Digital—it's worth far more than I paid!"
                            </p>
                            <div class="testimonial-widget-4__body">
                                <div class="testimonial-widget-4__user-image">
                                    <img src="./image/contact/contact-user-image.png" alt="image alt">
                                </div>
                                <div class="testimonial-widget-4__user-metadeta">
                                    <h3 class="testimonial-widget-4__user">Brooklyn Simmons</h3>
                                    <span class="testimonial-widget-4__user-position">CEO & Co-founder</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="offset-xl-1 col-lg-6 col-md-10">
                <div class="form-box-style__form-wrapper bg-light-2">
                    <form id="contact-form" method="POST" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                        <input type="hidden" name="form_type" value="bottom_form">
                        <div class="form-box-style__form-inner">
                            <div class="form-box-style__form-input">
                                <h3 class="form-box-style-title">Your name</h3>
                                <input class="form-control bg-white" name="name" type="text" pattern="^[a-zA-Z\s]+$"
                                    title="Only letters and spaces allowed" placeholder="Enter your full name" required>
                            </div>
                            <div class="form-box-style__form-input">
                                <h3 class="form-box-style-title">Email address</h3>
                                <input class="form-control bg-white" name="email" type="email"
                                    placeholder="Enter your email" required>
                            </div>
                            <div class="form-box-style__form-input">
                                <h3 class="form-box-style-title">Phone Number</h3>
                                <input class="form-control bg-white" name="phone" type="tel"
                                    placeholder="Enter your phone number" required>
                            </div>
                            <div class="form-box-style__form-input">
                                <h3 class="form-box-style-title">Write your message</h3>
                                <textarea class="form-control bg-white textarea" name="message"
                                    placeholder="Write us your question here..." required></textarea>
                            </div>
                            <!-- Added CAPTCHA field here -->
                            <div class="form-box-style__form-input">
                                <div class="g-recaptcha mb-3" data-sitekey="6Lc-9N0qAAAAAPqT-iqpOodgdx8VgaJq03ckWoLe">
                                </div>
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