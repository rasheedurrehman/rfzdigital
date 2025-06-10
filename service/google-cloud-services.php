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

include 'includes/header.php';
include_once 'includes/mail-config.php';

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

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['form_type']) && $_POST['form_type'] == "top_form") {
    // Sanitize and validate input data
    function sanitize_input($data)
    {
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
?>



<style>
.custom-bg {
    padding-top: 100px;
    padding-bottom: 0px;
    background: linear-gradient(to right,
            white 30%,
            #e4fff4 75%,
            #78fff9 100%);

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
                <h6 class="text-uppercase" style="color: #EC7D63;">Google Cloud Services</h6>
                <h2 class="mb-3 com-services">Elevate Your Business with Google Cloud Solutions That Deliver<span
                        style="color:#1463FF; white-space:normal;">
                        Unmatched Scalability, Security, and Innovation
                    </span>
                </h2>
                <p class="mb-4 ">Leverage the power of Google Cloud to enhance your business operations with secure,
                    scalable, and highly efficient cloud solutions. Our Google Cloud Services provide a range of tools
                    and platforms, including computing, storage, big data, AI, and machine learning, to help businesses
                    optimise performance, increase collaboration, and innovate faster. With Google Cloud’s reliable
                    infrastructure and cutting-edge technologies, we assist in seamless cloud migration, application
                    development, and data analytics, ensuring your business stays ahead in a competitive digital
                    landscape. Our team of experts specialises in designing and managing custom Google Cloud
                    environments, maximising the platform’s capabilities, such as Google Kubernetes Engine, BigQuery,
                    and Cloud Storage, to deliver tailored solutions that boost productivity, reduce costs, and improve
                    scalability.</p>
                <a href="<?php echo BASE_URL; ?>contact-us" class="btn btn-primary">Get Started</a>
            </div>
            <!-- Right Column -->
            <div class="col-md-5 d-flex justify-content-center">
                <img src="./image/csr/Google-Cloud-Services.webp" alt="Google Cloud Services"
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

                        <form class="inquiry-form" method="POST"
                            action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
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
                            Effortless Integration, Powerful Cloud Solutions
                        </h2>
                        <p>
                            At RFZ Digital, we specialise in Google Cloud services, offering a range of tailored
                            solutions designed to optimise your business operations. Our expert team leverages Google
                            Cloud’s strong infrastructure for scalable computing, advanced data analytics, and seamless
                            collaboration tools. With a focus on security and performance, RFZ Digital empowers your
                            company to maximise efficiency and drive innovation in today’s digital landscape.
                        </p>

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
                            Unlock Scalable and Secure Solutions with Google Cloud Services for Your Business</h2>
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
                            <h5>Scalable Google Cloud Services for Reliable and Secure Infrastructure</h5>
                            <!-- Heading -->
                            <p>Our Google Cloud services provide businesses with secure, scalable solutions, offering
                                high-performance data storage, compute power, and seamless cloud infrastructure for
                                efficient digital operations.
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
                            <h5>Expert Google Cloud Solutions for Enhanced Business Agility</h5>
                            <!-- Heading -->
                            <p>We deliver expert Google Cloud services to optimise your business infrastructure,
                                ensuring fast, scalable, and secure solutions that enhance performance, reduce costs,
                                and accelerate growth
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
                            <h5>Custom Google Cloud Services for Seamless Cloud Integration</h5>
                            <!-- Heading -->
                            <p>Our Google Cloud services offer customised solutions to streamline operations, improve
                                security, and ensure high availability, enabling your business to scale effectively and
                                stay competitive in the digital era.
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
                            What is Google Cloud?
                        </button>
                        <div id="home-1-faq-item" class="accordion-collapse collapse show" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                Google Cloud is a suite of cloud computing services provided by Google. It includes
                                various services such as computing, storage, databases, machine learning, analytics,
                                networking, and cloud management tools. Google Cloud is designed to help businesses and
                                developers build, test, and deploy applications in a scalable, flexible, and secure
                                environment. Key services include Google Compute Engine, Google Kubernetes Engine,
                                BigQuery, and Google Cloud Storage.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#home-1-faq-item-2" aria-expanded="false" aria-controls="home-1-faq-item-2">
                            What are the key services provided by Google Cloud?
                        </button>
                        <div id="home-1-faq-item-2" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                Google Cloud offers a wide variety of services:
                                <ul>
                                    <li>Compute: Virtual Machines (Compute Engine), Kubernetes Engine for container
                                        orchestration, and App Engine for app hosting.</li>
                                    <li>Storage: Google Cloud Storage (object storage), Persistent Disks, Cloud SQL, and
                                        Firestore for scalable data storage.</li>
                                    <li>Databases: Cloud SQL, Cloud Spanner, BigQuery for large-scale analytics, and
                                        Cloud Datastore for NoSQL databases.</li>
                                    <li>Networking: Virtual Private Cloud (VPC), Cloud Load Balancing, and Cloud CDN for
                                        global content delivery.</li>
                                    <li>AI and Machine Learning: AI Platform, AutoML, TensorFlow, and pre-trained models
                                        for building intelligent applications.</li>
                                    <li>Big Data & Analytics: BigQuery, Dataflow, and Dataproc for data processing and
                                        analytics.</li>
                                </ul>
                                Security: Identity & Access Management (IAM), Cloud Identity, and Google Cloud Security
                                Command Center.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#home-1-faq-item-3" aria-expanded="false" aria-controls="home-1-faq-item-3">
                            What are the benefits of using Google Cloud?
                        </button>
                        <div id="home-1-faq-item-3" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                The benefits of Google Cloud include:
                                <ul>
                                    <li>Scalability: Google Cloud offers flexible and scalable services, making it ideal
                                        for businesses of all sizes.</li>
                                    <li>Reliability: Google’s cloud infrastructure is known for its high uptime and
                                        robust performance, and Google’s global network backs it.</li>
                                    <li>Data Analytics & AI: Google Cloud is a leader in machine learning and big data
                                        analytics, offering powerful tools for data-driven insights and decision-making.
                                    </li>
                                    <li>Security: Google Cloud provides strong security features such as encryption,
                                        identity management, and threat detection.</li>

                                </ul>
                                Cost Efficiency: Google Cloud uses a pay-as-you-go model, which helps businesses save
                                money by paying only for what they use, with cost optimisation options like sustained
                                use discounts and committed use contracts.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#home-1-faq-item-4" aria-expanded="false" aria-controls="home-1-faq-item-4">
                            How does Google Cloud ensure Security?
                        </button>
                        <div id="home-1-faq-item-4" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                Google Cloud implements a wide range of security measures to protect data and
                                applications:
                                <ul>
                                    <li>Encryption: Data is encrypted in transit and at rest using industry-standard
                                        encryption protocols.</li>
                                    <li>Identity & Access Management (IAM): IAM lets users control who can access
                                        specific resources and services.</li>
                                    <li>Google Security Operations: Google’s Security Operations Center (SOC) monitors
                                        cloud infrastructure 24/7 for potential threats.</li>
                                    <li>Multi-factor Authentication (MFA): Google Cloud supports MFA for enhanced access
                                        control and Security.</li>



                                </ul>
                                Compliance: Google Cloud meets numerous regulatory compliance standards, including GDPR,
                                HIPAA, SOC 2, and ISO 27001.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#home-1-faq-item-5" aria-expanded="false" aria-controls="home-1-faq-item-5">
                            What is Google Kubernetes Engine (GKE)?
                        </button>
                        <div id="home-1-faq-item-5" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                Google Kubernetes Engine (GKE) is a managed Kubernetes service that makes deploying,
                                managing, and scaling containerised applications easier. It leverages Kubernetes, the
                                popular open-source container orchestration system, to automate container deployment,
                                scaling, and management. GKE allows businesses to run applications in a secure, highly
                                available environment without managing the underlying infrastructure.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#home-1-faq-item-6" aria-expanded="false" aria-controls="home-1-faq-item-6">
                            What is Google Cloud BigQuery?
                        </button>
                        <div id="home-1-faq-item-6" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                Google Cloud BigQuery is a fully managed, serverless data warehouse that enables fast,
                                SQL-based analysis of large datasets. It is optimised for high-speed, large-scale
                                queries and analytics on structured and semi-structured data. BigQuery is designed to
                                handle petabytes of data with minimal latency and cost, making it ideal for big data
                                applications like business intelligence, data analysis, and machine learning.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#home-1-faq-item-7" aria-expanded="false" aria-controls="home-1-faq-item-7">
                            What is Google Cloud Storage?
                        </button>
                        <div id="home-1-faq-item-7" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                Google Cloud Storage is an object storage service that provides secure and scalable data
                                storage. It is designed for use cases such as storing backups, images, videos, or large
                                datasets. Google Cloud Storage offers multiple storage classes (Standard, Nearline,
                                Coldline, and Archive) to optimise cost and performance based on how frequently data is
                                accessed. It also integrates with other Google Cloud services for easy data processing
                                and analytics.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#home-1-faq-item-8" aria-expanded="false" aria-controls="home-1-faq-item-8">
                            How does Google Cloud pricing work?
                        </button>
                        <div id="home-1-faq-item-8" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                Google Cloud uses a pay-as-you-go pricing model, where you pay for the services you
                                consume. Pricing depends on factors such as the resources used, the usage duration, and
                                the services’ location. There are options for sustained use discounts, which offer
                                discounts for long-term use, and committed use contracts, which provide even more
                                significant discounts in exchange for committing to use specific services for one or
                                more years. Google also offers a Free Tier with limited resources, making it easier for
                                users to try out Google Cloud before committing to paid services.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>



<!-- Contact Us Section -->
<?php require_once 'includes/contact-us-section.php'; ?>

<!-- Contact us Section -->



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