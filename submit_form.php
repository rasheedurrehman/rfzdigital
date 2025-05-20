<?php
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $mail->isSMTP();
        $mail->Host = 'premium55.web-hosting.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'info@rfzdigital.co.uk';
        $mail->Password = 'h1qzjO(&t$ci';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        // Get user email from form
        $userEmail = $_POST['email'];

        // Admin email content
        $mail->setFrom('info@rfzdigital.co.uk', 'Plan Chose');
        $mail->addAddress('info@rfzdigital.co.uk'); 
        $mail->isHTML(false);
        $mail->Subject = "New Plan Selected by User";
        $mail->Body = "User Details:\nName: {$_POST['name']}\nEmail: $userEmail\n\nSelected Plan:\nService: {$_POST['page_name']}\nPlan Name: {$_POST['plan_name']}\nPlan Price: {$_POST['plan_price']}";

        $mail->send();
        echo "Admin email sent successfully";

        // User email content
        $mail->clearAddresses();
        $mail->addAddress($userEmail); // Use the user’s email from form
        $mail->Subject = "Thank you for selecting a plan!";
        $mail->Body = "Dear {$_POST['name']},\n\nThank you for choosing our service.\n\nPlan Name: {$_POST['plan_name']}\nPlan Price: {$_POST['plan_price']}\n\nWe will contact you shortly.";

        $mail->send();
        // Redirect with success message
        header('Location: index.php?success=true');
        exit;
        
    } catch (Exception $e) {
        header('Location: index.php?success=false');
        exit;
    }
}
