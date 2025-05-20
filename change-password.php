<?php
session_start();
include 'rfzwebdb.php'; // Ensure this file initializes $pdo properly

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get input values
    $admin_id = $_POST['id'];
    $new_password = $_POST['password'];

    if (empty($admin_id) || empty($new_password)) {
        $_SESSION['message'] = 'Admin ID or password cannot be empty.';
        $_SESSION['message_type'] = 'danger';
        header('Location: registered-admins.php');
        exit();
    }

    try {
        // Fetch admin email from database
        $stmt = $pdo->prepare("SELECT email FROM admins WHERE id = :id");
        $stmt->bindParam(':id', $admin_id, PDO::PARAM_INT);
        $stmt->execute();
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$admin) {
            $_SESSION['message'] = 'Admin not found.';
            $_SESSION['message_type'] = 'danger';
            header('Location: registered-admins.php');
            exit();
        }

        $admin_email = $admin['email'];

        // Hash the new password
        $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

        // Prepare the update query
        $stmt = $pdo->prepare("UPDATE admins SET password = :password WHERE id = :id");
        $stmt->bindParam(':password', $hashed_password);
        $stmt->bindParam(':id', $admin_id, PDO::PARAM_INT);

        // Execute the query
        if ($stmt->execute()) {
            // HTML email template
            $subject = "Your Password Has Been Updated";
            $message = "
                <html>
                <head>
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            line-height: 1.6;
                            color: #333;
                        }
                        .email-container {
                            max-width: 600px;
                            margin: auto;
                            padding: 20px;
                            border: 1px solid #ddd;
                            border-radius: 8px;
                            background-color: #f9f9f9;
                        }
                        .email-header {
                            background-color: #007bff;
                            color: #fff;
                            text-align: center;
                            padding: 10px 0;
                            font-size: 20px;
                            border-radius: 8px 8px 0 0;
                        }
                        .email-content {
                            padding: 20px;
                        }
                        .email-footer {
                            text-align: center;
                            font-size: 12px;
                            color: #888;
                            margin-top: 20px;
                        }
                    </style>
                </head>
                <body>
                    <div class='email-container'>
                        <div class='email-header'>Password Updated</div>
                        <div class='email-content'>
                            <p>Dear Admin,</p>
                            <p>Your password has been successfully updated. Please find your new password below:</p>
                            <p><strong>New Password:</strong> <span style='background-color: #f8f9fa; padding: 5px 10px; border-radius: 5px;'>$new_password</span></p>
                            <p>We recommend changing this password immediately after logging in for added security.</p>
                            <p>Best regards,</p>
                            <p><strong>Your Website Team</strong></p>
                        </div>
                        <div class='email-footer'>
                            © " . date('Y') . " RFZ Digital. All rights reserved.
                        </div>
                    </div>
                </body>
                </html>
            ";

            // Headers for sending HTML email
            $headers = "From: info@rfzdigital.co.uk\r\n"; // Replace with your sender email
            $headers .= "Reply-To: info@rfzdigital.co.uk\r\n"; // Replace with your support email
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

            // Send the email
            if (mail($admin_email, $subject, $message, $headers)) {
                $_SESSION['message'] = 'Password updated successfully. The new password has been sent to the admin email.';
                $_SESSION['message_type'] = 'success';
            } else {
                $_SESSION['message'] = 'Password updated, but failed to send the email.';
                $_SESSION['message_type'] = 'warning';
            }
        } else {
            // Log error for debugging
            error_log("Password update failed: " . implode(", ", $stmt->errorInfo()));
            $_SESSION['message'] = 'Failed to update password. Please try again.';
            $_SESSION['message_type'] = 'danger';
        }
    } catch (PDOException $e) {
        // Handle exceptions
        error_log("Database error: " . $e->getMessage());
        $_SESSION['message'] = 'An error occurred. Please try again.';
        $_SESSION['message_type'] = 'danger';
    }

    // Redirect back to the admin list page
    header('Location: registered-admins.php');
    exit();
}
