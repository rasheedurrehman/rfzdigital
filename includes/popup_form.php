

<?php 
ob_start(); // Start output buffering
require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';
require_once 'rfzwebdb.php';

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

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['form_type']) && $_POST['form_type'] == "popup_form") {
    // Sanitize and validate input data
    if (!function_exists('sanitize_input')) {
        function sanitize_input($data) {
            return htmlspecialchars(strip_tags(trim($data)));
        }
    }

    // Updated field names
    $name = sanitize_input($_POST['popup_name']);
    $email = filter_var(sanitize_input($_POST['popup_email']), FILTER_VALIDATE_EMAIL);
    $phone = sanitize_input($_POST['popup_phone']);
    $messageContent = sanitize_input($_POST['popup_message']); // Avoid conflict with $message variable

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
                 $_SESSION['form_submitted'] = true; // Set session flag
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
                // Redirect with a success parameter
                header("Location: " . $_SERVER['REQUEST_URI'] . "?success=true");
                exit();

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
ob_end_flush(); // Flush output buffer
?>



<!-- Bootstrap Modal -->
<div class="modal fade" id="popupModal" tabindex="-1" aria-labelledby="popupModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Left Side Image -->
            <div class="modal-left "></div>

            <!-- Right Side Content -->
            <div class="modal-right">
                <button type="button" class="close-btn" data-bs-dismiss="modal">&times;</button>
                 <div class="modal-header">
                <img src="./image/rfz-digital-logo-White.png" alt="RFZ Digital">
            </div>
                <h3 class="mt-3">Grow your Business online with a Professional Website</h3>
                <p>We Deliver Business websites that are fast, user-friendly, and designed to make your business stand out and thrive online</p>

                <form method="POST" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                    <input type="hidden" name="form_type" value="popup_form"> 
                    <input type="text" name="popup_name" class="form-control" placeholder="Your Name" required>
                    <input type="email" name="popup_email" class="form-control" placeholder="Your Email" required>
                    <input type="tel" name="popup_phone" class="form-control" placeholder="Your Phone Number" required>
                    <textarea name="popup_message" class="form-control" placeholder="Your Message" rows="2" required></textarea>
                    <button type="submit" class="popup-form-btn-submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- CSS -->
<style>
    .modal-header img {
        height: 40px;
    }
    .modal-header {
        border: none;
        padding-bottom: 0;
        padding-top: 0;
                display: flex;
        justify-content: left;
        align-items: left;
    }
    /* Center Modal */
    .modal.show .modal-dialog {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
    }

    /* Modal Dialog */
    .modal-dialog {
        max-width: 650px; /* Adjust for proper 50/50 split */
    }

    /* Modal Content (Split into Two) */
    .modal-content {
        display: flex;
        flex-direction: row;
        border-radius: 10px;
        overflow: hidden;
        border: none;
        background: #1e1e1e; /* Dark theme */
        color: white;
    }

    /* Left Image Section */
    .modal-left {
        width: 45%;
        background: url('./image/services/Form-Image.png') no-repeat center center;
        background-size: cover;
        min-height: 350px;
    }

    /* Right Text Section */
    .modal-right {
        width: 55%;
        padding: 15px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: left;
    }

    /* Close Button */
    .close-btn {
        position: absolute;
        top: 10px;
        right: 15px;
        font-size: 20px;
        color: white;
        background: none;
        border: none;
        cursor: pointer;
    }

    /* Headline */
    .modal-right h3 {
        font-size: 22px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    /* Description */
    .modal-right p {
        font-size: 14px;
        line-height: 1.5;
        margin-bottom: 20px;
        opacity: 0.9;
        color: #fff;
    }

    /* Form Fields */
    .form-control {
        border: 2px solid #ffb300;
        background: transparent;
        color: white;
        padding: 10px;
        margin-bottom: 10px;
        border-radius: 5px;
        font-size: 14px;
    }

    .form-control::placeholder {
        color: #ccc;
    }

    /* Submit Button */
    .popup-form-btn-submit {
        background-color: #ffb300;
        color: #1e1e1e;
        border: none;
        padding: 12px;
        font-size: 16px;
        font-weight: bold;
        border-radius: 5px;
        width: 100%;
        cursor: pointer;
        transition: 0.3s;
    }

    .popup-form-btn-submit:hover {
        background-color: #ff9900;
    }

    /* Responsive for Small Screens */
    @media (max-width: 600px) {
        .modal-content {
            flex-direction: column;
        }
        .modal-left {
            /*width: 100%;
            height: 200px;*/
            display: none; /* Hide image on mobile */
        }
        .modal-right {
            width: 100%;
        }
    }
</style>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        let urlParams = new URLSearchParams(window.location.search);
        let formSubmitted = urlParams.has("success");

        if (!formSubmitted) {
            setTimeout(function () {
                var popupModal = new bootstrap.Modal(document.getElementById('popupModal'));
                popupModal.show();
            }, 10000);
        }
    });
</script>

<!-- Popup End -->