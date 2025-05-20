<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Inquiry Notification</title>
</head>
<body style="margin: 0; padding: 0; font-family: Arial, sans-serif; background-color: #f8f8f8;">
  <div style="max-width: 600px; margin: 20px auto; background: #ffffff; border: 1px solid #ddd; border-radius: 6px; overflow: hidden;">
    <!-- Header -->
    <div style="padding: 20px 20px 10px;">
      <img src="https://rfzdigital.co.uk/image/RFZ-Digital-Co-UK-logo.png" alt="RFZ Digital" style="max-width: 150px; display: block;">
    </div>
    <!-- Content -->
    <div style="padding: 20px; color: #333;">
      <h1 style="font-size: 20px; margin-bottom: 10px;">Someone's Interested!</h1>
      
      <div style="font-size: 28px; color: #000; font-weight: bold; margin-bottom: 20px;">You Have Received A New Inquiry
      From RFZ Digital Website.</div>
      <p style="font-size: 16px; margin-bottom: 15px;">We have received a new inquiry through the RFZ Digital website contact form. Below are the details:</p>
      <div style="background: #f9f9f9; padding: 10px 25px 15px 25px; border: 1px solid #eaeaea; border-radius: 4px; margin-bottom: 20px;">
        <h1 style="font-size: 20px; margin-bottom: 10px; text-align: center; position: relative;">
          Information
          <div style="width: 50%; height: 1px; background-color: #ddd; margin: 10px auto;"></div>
        </h1>
        <p style="margin: 5px 0; font-size: 14px; color: #555;"><strong style="color: #333;">Name:</strong> {{name}}</p>
        <p style="margin: 5px 0; font-size: 14px; color: #555;"><strong style="color: #333;">Email Address:</strong> {{email}}</p>
        <p style="margin: 5px 0; font-size: 14px; color: #555;"><strong style="color: #333;">Phone Number:</strong> {{phone}}</p>
        <p style="margin: 5px 0; font-size: 14px; color: #555;"><strong style="color: #333;">Message:</strong> {{message}}</p>
        <p style="margin: 5px 0; font-size: 14px; color: #555;">
  <strong style="color: #333;">Page URL:</strong> {{page_url}}
</p>

      </div>
      <p style="font-size: 16px; margin-bottom: 10px;">Please follow up with this potential client as soon as possible, within 24 hours. Lets ensure we provide them with the information they need!</p>
      <p style="font-size: 16px;">Best regards, <br>RFZ Digital Team</p>
    </div>
    <!-- Footer -->
    <div style="padding: 20px; text-align: left; font-size: 12px; color: #777; border-top: 1px solid #ddd;">
      <div style="font-size: 14px; color: #777; margin-bottom: 10px;">Follow RFZ Digital</div>
      <div style="margin-bottom: 20px;">
        <a href="https://www.linkedin.com/company/rfz-digital/">
          <img src="https://rfzdigital.co.uk/image/email-icons/linkedin-icon.jpg" alt="LinkedIn" style="margin-right: 10px;">
        </a>
      </div>
      <div style="font-size: 12px; margin-bottom: 20px;">
        <a href="<?php echo BASE_URL; ?>privacy-policy" style="color: #007bff; text-decoration: none; margin-right: 10px;">Privacy Policy</a> |
        <a href="<?php echo BASE_URL; ?>terms-conditions" style="color: #007bff; text-decoration: none; margin-right: 10px;">Terms of Service</a>
      </div>
      <div style="font-size: 12px; color: #777;">
        RFZ Digital, One Canada Square, London E14 5AA United Kingdom.
      </div>
    </div>
  </div>
</body>
</html>
