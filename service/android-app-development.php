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
    function sanitize_input($data)
    {
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
        background: linear-gradient(to right,
                white 30%,
                #7AFFF7 75%,
                #46b5fd 100%);

    }

    .mb-3 {
        font-family: "Onest", Sans-serif;
        /*font-size: 52px;
    font-weight: 900;*/
        color: #000000;

    }

    .text-muted {
        padding-bottom: 5px;
    }

    .img-fluid {
        max-width: 100%;
        max-height: 448px;
    }

    .mb-4 {
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

            font-weight: 900;
        }
    }

    @media (min-width: 1400px) {
        .mb-3 {

            font-weight: 900;
        }
    }
</style>
<section class="custom-bg">
    <div class="container">
        <div class="row align-items-center">
            <!-- Left Column -->
            <div class="col-md-7">
                <h6 class="text-uppercase" style="color: #EC7D63;">Android App Development</h6>
                <h2 class="mb-3 com-services">Developing Android Apps That Engage Users, Drive Growth,
                    <span style="color:#EC7D63; white-space:normal;">and Elevate Your Business on Android Operating
                        System.</span>
                </h2>
                <p class="mb-4 ">Unlock the potential of the Android ecosystem with our professional Android App
                    Development service. We specialise in creating custom, high-performance mobile applications for
                    Android devices tailored to meet your specific business needs. Our experienced team uses the latest
                    technologies, including Kotlin and Java, to build secure, scalable, and user-friendly Android apps
                    that deliver seamless performance across various devices. Whether you need a consumer app, an
                    enterprise solution, or an innovative product, we focus on providing an exceptional user experience,
                    optimising speed and functionality. With our Android App Development service, we help you reach a
                    global audience.</p>
                <a href="<?php echo BASE_URL; ?>contact-us" class="btn btn-primary">Get Started</a>
            </div>
            <!-- Right Column -->
            <div class="col-md-5 d-flex justify-content-center">
                <img src="./image/sds/Android-App-Development.webp" alt="Ai Application Development"
                    class="img-fluid rounded  ">
            </div>
        </div>
    </div>
</section>

<!-- ~~~~~~~~~~~~~~~~~~~~~~~~
    Home 1 : Brand Section
~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<?php include 'includes/logo-slider.php'; ?>


<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Home 1  : Content Section 1
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

<div class="home-1_content-section-2 padding-bottom-120">
    <div class="container">
        <div class="row row--custom change-order ">
            <div class="col-xl-5 col-lg-5 col-auto" data-aos-duration="1000" data-aos="fade-right">
                <div class="inquiry-form-section">
                    <div class="form-container">
                        <h2 style="color: black;">Get in Touch</h2>

                        <form class="inquiry-form" method="POST" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                            <input type="hidden" name="form_type" value="top_form">
                            <div class="form-group">
                                <input type="text" name="name" placeholder="Your Name" required>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" placeholder="Your Email" required>
                            </div>
                            <div class="form-group">
                                <input type="tel" name="phone" placeholder="Your Phone Number" required>
                            </div>
                            <div class="form-group">
                                <textarea placeholder="Your Message" name="message" rows="4" required></textarea>
                            </div>
                            <button type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="offset-xl-0 col-xl-6 col-lg-7 col-md-11" data-aos-duration="1000" data-aos="fade-left">
                <div class="content">
                    <div class="content-text-block">
                        <h2 class="about-subheading-comservices">About Us</h2>
                        <h2 class="content-title heading-md text-black">
                            Custom Apps. Enhanced User Experience

                        </h2>
                        <p>
                            At RFZ Digital, we excel in Android app development services, turning your concepts into dynamic applications that engage users. Our skilled team of Android experts utilises cutting-edge technologies to deliver high-quality, customised apps tailored to your business needs. 
                        </p>
                        <p>  With a focus on innovation and performance, RFZ Digital ensures that every app stands out in the competitive Android marketplace, driving growth and user satisfaction.</p>
                    </div>
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
                <div class="col-xxl-8 col-lg-9 col-md-9 col-sm-12 col-xs-11">
                    <div class="section-heading">
                        <h2 class="section-heading__title heading-md heading-md--general-sans text-l5-secondary">
                            Reach a Wider Audience with Custom Android App Development Services</h2>
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
                            <h5>Custom Android App Development for Innovative Mobile Solutions
                            </h5> <!-- Heading -->
                            <p>Our Android app development services create high-performance, user-friendly applications tailored to your business needs, ensuring seamless functionality across a wide range of Android devices


                            </p>
                        </div>
                    </div>

                    <!-- Box 2 -->
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-page-custom-box">
                            <div class="feature-widget-2__icon">
                                <img src="./image/home-5/feature-2.png" alt="feature icon">
                            </div>
                            <!-- <div class="icon">🌐</div>  -->
                            <h5>Expert Android App Development to Boost User Engagement
</h5> <!-- Heading -->
                            <p>We design and develop custom Android apps that drive user interaction, improve brand presence, and deliver innovative mobile solutions for your business.



                            </p>
                        </div>
                    </div>

                    <!-- Box 3 -->
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-page-custom-box">
                            <div class="feature-widget-2__icon">
                                <img src="./image/home-5/feature-3.png" alt="feature icon">
                            </div>
                            <!-- <div class="icon">💼</div>  -->
                            <h5>Scalable Android App Development for Business Growth

                            </h5> <!-- Heading -->
                            <p>Our Android development team creates reliable, secure, and scalable applications that enhance user experiences and deliver measurable results for your business.

</p>
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
<?php include 'includes/portfolio-slider.php'; ?>

<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Home 5  : Process Section
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
<div class="home-5_process-section bg-offwhite-3 process-section">
    <div class="container">
        <div class="home-5_process-devider">
            <div class="row justify-content-center text-center">
                <div class="col-xxl-9 col-xl-8 col-lg-8 col-md-10">
                    <div class="section-heading">
                        <h2 class="section-heading__title fw-600 heading-md heading-md--general-sans text-l5-secondary">
                            We follow a Professional and efficient website design and development process</h2>
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
                            <p>Analyzing your business needs and audience to create a tailored web design strategy that
                                drives results.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="process-widget">
                        <div class="process-widget__count">
                            <span>2</span>
                        </div>
                        <div class="process-widget__body">
                            <h3 class="process-widget__title">Design & Development</h3>
                            <p>Building a stunning, responsive website with top-notch functionality and seamless
                                navigation for a better user experience.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="process-widget">
                        <div class="process-widget__count">
                            <span>3</span>
                        </div>
                        <div class="process-widget__body">
                            <h3 class="process-widget__title">Testing & Deployment</h3>
                            <p>Optimising your website for speed and performance, ensuring it's fully functional before
                                going live.</p>
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


<!-- ~~~~~~~~~~~~~~~~~~~~~~~~
    Home 1 : social-apps Section
~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<?php include 'includes/social-apps-logo-slider.php'; ?>


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
                    <h2 class="section-heading__title heading-md text-black">Frequently Asked Questions </h2>
                </div>
            </div>
        </div>
        <div class="row row--custom faq-comservices">
            <div class="col-lg-10">
                <div class="accordion-style-1" id="home-1-faq">
                    <div class="accordion-item">
                        <button class="accordion-button " type="button" data-bs-toggle="collapse"
                            data-bs-target="#home-1-faq-item" aria-expanded="true" aria-controls="home-1-faq-item">
                           What is Android app development?
                        </button>
                        <div id="home-1-faq-item" class="accordion-collapse collapse show" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                Android app development creates software applications for devices running the Android operating system. Android apps are typically built using Java or Kotlin and are available for download on the Google Play Store. Android apps can be designed for smartphones, tablets, wearables, and other devices within the Android ecosystem.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#home-1-faq-item-2" aria-expanded="false" aria-controls="home-1-faq-item-2">
                           Why should I choose Android for app development?
                        </button>
                        <div id="home-1-faq-item-2" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                Choosing Android for app development offers several benefits:


                                <ul>
                                    <li>Large Market Share: Android has the largest user base globally, with billions of active devices, providing a massive audience for your app.

                                    </li>
                                    <li>Open Source: Android is an open-source platform, which gives developers more freedom to customise apps and integrate third-party services.

                                    </li>
                                    <li>Google Play Store: With millions of users regularly browsing the Play Store, it offers excellent exposure for your app.

                                    </li>
                                    <li>Flexibility: Android allows developers to create apps with rich functionality and support for various device types, from smartphones to smart TVs.


                                    </li>

                                </ul>

                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#home-1-faq-item-3" aria-expanded="false" aria-controls="home-1-faq-item-3">
                            What programming languages are used for Android app development?
                        </button>
                        <div id="home-1-faq-item-3" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                              Android apps are primarily built using:


                                <ul>
                                    <li>Java: The traditional language for Android development, widely used for creating apps and supported by Android’s SDK (Software Development Kit).</li>
                                    <li>Kotlin: A more modern and preferred programming language for Android development. Kotlin is fully supported by Google, offers better performance, and has more concise syntax than Java.</li>
                                   

                                </ul>

                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#home-1-faq-item-4" aria-expanded="false" aria-controls="home-1-faq-item-4">
                           What are the key features of Android apps?
                        </button>
                        <div id="home-1-faq-item-4" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                               Android apps can offer many features, including:


                                <ul>
                                    <li>Push Notifications: Android apps support push notifications to keep users engaged and informed.

                                    </li>
                                    <li>Multitasking and Background Services: Android allows apps to perform tasks in the background, ensuring users can continue using their devices without interruption.
</li>
                                    <li>Google Services Integration: Android apps can integrate with Google services like Google Maps, Google Pay, and Google Analytics.
</li>

                                </ul>
                               Customisable UI: Developers can create highly customisable user interfaces to ensure a smooth user experience across various devices.


                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#home-1-faq-item-5" aria-expanded="false" aria-controls="home-1-faq-item-5">
                           How long does it take to develop an Android app?
                        </button>
                        <div id="home-1-faq-item-5" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                               The time to develop an Android app depends on the app’s complexity:
                               <ul>
                                    <li>Simple Apps: Basic apps with minimal functionality can take 2 to 3 months to develop.


                                    </li>
                                    <li>Medium Complexity Apps: Apps with more features or integrations typically take 3 to 6 months.

</li>
                                    <li>Complex Apps: Apps requiring complex features such as real-time data, GPS, or advanced integrations can take 6 months or more.


</li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#home-1-faq-item-6" aria-expanded="false" aria-controls="home-1-faq-item-6">
                          How much does Android app development cost?
                        </button>
                        <div id="home-1-faq-item-6" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                               How much does Android app development cost?
                                <ul>
                                    <li>App Complexity: A simple app will cost less to develop, while a complex app with advanced features or custom integrations will cost more.
</li>
                                    <li>Design Requirements: Custom design or high-end graphics may increase the cost.

                                    </li>
                                    <li>Developer Rates: Rates vary depending on the developer’s location and expertise. Developers in North America and Western Europe tend to charge more than those in other regions.
</li>
                                    <li>Maintenance and Updates: Post-launch support and app updates may add to the overall cost.
</li>
                                </ul>
                               A simple Android app can cost anywhere from $5,000 to $15,000, while complex apps can range from $20,000 to $100,000 or more.


                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#home-1-faq-item-7" aria-expanded="false" aria-controls="home-1-faq-item-7">
                           How do you ensure my Android app will work on all devices?
                        </button>
                        <div id="home-1-faq-item-7" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                We ensure your Android app works across all devices by:

 <ul>
                                    <li>Responsive Design: Android apps are designed to work across different screen sizes and resolutions, ensuring a consistent user experience on smartphones, tablets, and wearables.

</li>
                                    <li>Device Testing: We test the app on a variety of Android devices, including different brands and operating system versions, to ensure compatibility.


                                    </li>
                                   Backwards Compatibility: Our developers ensure that the app works on the latest Android versions while supporting older versions with a significant user base.


                                </ul>

                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#home-1-faq-item-8" aria-expanded="false" aria-controls="home-1-faq-item-8">
                          Do you offer post-launch support for Android apps?
                        </button>
                        <div id="home-1-faq-item-8" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                               Yes, we provide extensive post-launch support, including:<ul>
                                    <li>Bug Fixes: We monitor the app for any issues and promptly resolve bugs or performance issues.
                                    </li>
                                    <li>App Updates: We ensure the app stays up to date with new Android OS releases and add new features based on user feedback.

                                    </li>
                                    <li>Performance Monitoring: We track app performance, optimise speed, and resolve usability issues.


                                    </li>

                                </ul>
                               User Feedback: We actively collect and integrate feedback to improve app features and overall experience.




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
                            <h2 class="heading-md">Let's elevate your business with Cutting-Edge Digital Solutions
 </h2>
                            <p>
                               Our digital and technology experts team is ready to help you achieve your business goals. Whether you need a website update, online advertising support, or improved visibility on search engines like Google, RFZ Digital is dedicated to providing the expertise you need to succeed.


                            </p>
                            <div class="content-divider"></div>
                        </div>
                    </div>
                    <div class="content_main-testimonial">
                        <div class="testimonial-widget-4" data-aos="fade-left" data-aos-delay="NaN">
                            <div class="testimonial-widget-4__rating">
                                <img src="./image/icons/star-five-yellow.svg" class="testimonial-widget-4__star"
                                    alt="image alt">
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
                                <input class="form-control bg-white" name="name" type="text"
                                    placeholder="Enter your full name">
                            </div>
                            <div class="form-box-style__form-input">
                                <h3 class="form-box-style-title">Email address</h3>
                                <input class="form-control bg-white" name="email" type="text"
                                    placeholder="Enter your email">
                            </div>
                            <div class="form-box-style__form-input">
                                <h3 class="form-box-style-title">Phone Number</h3>
                                <input id="phone" class="form-control bg-white" name="phone" type="tel"
                                    placeholder="Enter your phone number" required>
                            </div>
                            <div class="form-box-style__form-input">
                                <h3 class="form-box-style-title">Write your message</h3>
                                <textarea class="form-control bg-white textarea" name="message"
                                    placeholder="Write us your question here..."></textarea>
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
                        <h2 class="heading-md heading-md--general-sans text-l5-secondary">Are you ready to increase your
                            SEO ranking?</h2>
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