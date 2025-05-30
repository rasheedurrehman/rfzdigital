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
                #b75cff 75%,
                #67a0ff 100%);

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
                <h6 class="text-uppercase" style="color: #EC7D63;">API Development service</h6>
                <h2 class="mb-3 com-services">Developing Robust and Scalable APIs That Enable Seamless
                    <span style="color:#1463FF; white-space:normal;">
                        Integration and Enhance Application Functionality
                    </span>
                </h2>
                <p class="mb-4 ">Unlock seamless integration and enhance your digital ecosystem with our API Development
                    Service. We specialise in creating robust, secure, and scalable APIs that enable smooth
                    communication between different software applications, allowing your systems to work together
                    efficiently. Whether you need RESTful APIs, GraphQL, or SOAP APIs, our expert developers design
                    custom solutions tailored to your business needs, optimised for performance, reliability, and
                    security. With a focus on user experience and clean code, our API Development Service ensures fast,
                    scalable, and easily maintainable solutions that integrate smoothly with third-party services,
                    mobile apps, or web platforms.</p>
                <a href="<?php echo BASE_URL; ?>contact-us" class="btn btn-primary">Get Started</a>
            </div>
            <!-- Right Column -->
            <div class="col-md-5 d-flex justify-content-center">
                <img src="./image/bed/api-development.webp" alt="API Development service" class="img-fluid rounded  ">
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
                            Seamless Integration, Scalable Connections
                        </h2>
                        <p>
                            At RFZ Digital, we develop robust and scalable APIs that facilitate seamless communication
                            between applications and services. Our experienced Software Engineers design and implement
                            RESTful and GraphQL APIs tailored to your specific business requirements, ensuring your
                            systems can interact efficiently and securely. We focus on best practices in API design,
                            including clear documentation, versioning, and authentication, to enhance usability and
                            maintainability. Trust us to deliver high-performance APIs that drive innovation and
                            streamline operations.
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
                            Build Powerful, Scalable APIs with Expert API Development Services for Seamless Integration
                        </h2>
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
                            <h5>Custom API Development for Seamless Integration</h5> <!-- Heading -->
                            <p>Our API development services create secure, scalable, and high-performance APIs, enabling
                                seamless integration between your systems, applications, and third-party services.
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
                            <h5>Robust API Development for Efficient Data Communication</h5> <!-- Heading -->
                            <p>We specialise in API development, delivering secure, scalable, and high-speed data
                                communication solutions that enable your applications to interact seamlessly with
                                external systems and services.
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
                            <h5>High-Quality API Development for Scalable Web Solutions</h5>
                            <!-- Heading -->
                            <p>Our API development services focus on building robust, custom APIs that ensure secure,
                                efficient, and scalable data exchanges for web and mobile applications, enhancing
                                overall functionality and user experience.
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
                            What is API Development?
                        </button>
                        <div id="home-1-faq-item" class="accordion-collapse collapse show" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                API (Application Programming Interface) development involves creating interfaces that
                                allow different software systems to communicate with each other. APIs enable different
                                applications to exchange data and perform specific functions in a secure and structured
                                manner. Our API development service ensures your systems integrate seamlessly, allowing
                                data sharing and communication between different platforms or services.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#home-1-faq-item-2" aria-expanded="false" aria-controls="home-1-faq-item-2">
                            Why do I need an API for my application?
                        </button>
                        <div id="home-1-faq-item-2" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                APIs allow your application to communicate with other services, such as payment
                                gateways, third-party apps, databases, and IoT devices. By using APIs, you can:
                                <ul>
                                    <li>Expand functionality: Integrate third-party services and tools to enhance your
                                        app’s capabilities.</li>
                                    <li>Improve efficiency: Automate data exchanges between platforms, reducing manual
                                        work.</li>
                                    <li>Scalability: As your business grows, APIs allow easy integration of additional
                                        features and services.</li>

                                </ul>

                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#home-1-faq-item-3" aria-expanded="false" aria-controls="home-1-faq-item-3">
                            What types of APIs do you develop?
                        </button>
                        <div id="home-1-faq-item-3" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                We offer development for various types of APIs, including:
                                <ul>
                                    <li>REST APIs: Widely used for web applications due to their simplicity and
                                        scalability. REST APIs use HTTP methods to interact with resources.</li>
                                    <li>SOAP APIs: A protocol-based API that ensures higher security, often used in
                                        enterprise environments.</li>
                                    <li>GraphQL APIs: A more flexible and efficient alternative to REST, allowing
                                        clients to request the needed data.</li>
                                    <li>Webhooks: APIs that allow real-time data updates and event notifications.</li>

                                </ul>
                                Internal APIs are designed for use within your organisation, often to connect
                                microservices or internal applications.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#home-1-faq-item-4" aria-expanded="false" aria-controls="home-1-faq-item-4">
                            How long does it take to build an API?
                        </button>
                        <div id="home-1-faq-item-4" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                The development time depends on the complexity and functionality required. A simple REST
                                API can be built in a few weeks. In contrast, more complex APIs (e.g., for large-scale
                                applications or with advanced security features) may take several months. After
                                assessing your requirements, we can provide a more accurate timeline for delivery. <br>
                                <b>How do you ensure the security of the APIs? </b><br>
                                Security is a top priority in API development. We implement several best practices to
                                ensure your API is secure:
                                <ul>
                                    <li>OAuth and JWT (JSON Web Tokens) for secure user authentication and
                                        authorisation.</li>
                                    <li>Rate limiting to prevent abuse and control traffic.</li>
                                    <li>Input validation and sanitisation to prevent SQL injections and other attacks.
                                    </li>
                                    <li>Encryption for data protection during transit, using HTTPS and SSL certificates.
                                    </li>

                                </ul>
                                API Gateway and Firewall configurations are used to control access and secure endpoints
                                further.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#home-1-faq-item-5" aria-expanded="false" aria-controls="home-1-faq-item-5">
                            Can you integrate third-party APIs into my existing system?
                        </button>
                        <div id="home-1-faq-item-5" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                Yes, we specialise in integrating third-party APIs with your current systems. Whether
                                it’s incorporating payment processors like PayPal, social media platforms like Facebook
                                or Twitter, or any other external service, we can ensure smooth communication between
                                your system and the third-party API. We also handle authentication, data parsing, and
                                error handling for flawless integration.
                                <br>
                                <b>How do you test APIs before deployment?</b><br>
                                We employ rigorous testing methods to ensure the API functions correctly and securely:
                                <ul>
                                    <li>Unit Testing: Testing individual API endpoints to ensure each part works as
                                        expected.</li>
                                    <li>Integration Testing: Testing the entire system with integrated third-party
                                        services to ensure everything works together seamlessly.</li>
                                    <li>Security Testing: Conducting vulnerability scans to identify and resolve
                                        potential security issues.</li>
                                    <li>Functional Testing: Ensuring the API meets all business requirements and
                                        specifications.</li>
                                </ul>

                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#home-1-faq-item-6" aria-expanded="false" aria-controls="home-1-faq-item-6">
                            Do you offer API documentation and support after development?
                        </button>
                        <div id="home-1-faq-item-6" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                Yes, we provide comprehensive API documentation that includes detailed explanations of
                                the API’s endpoints, request/response formats, authentication methods, error codes, and
                                usage examples. This helps developers understand how to interact with your API. We also
                                offer ongoing support and maintenance, including bug fixes, updates, and optimisations,
                                to ensure your API continues to perform efficiently as your business grows.

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