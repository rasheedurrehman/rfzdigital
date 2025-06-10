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
                <h6 class="text-uppercase" style="color: #3197fb;">Logo Design Service

                </h6>
                <h2 class="mb-3 com-services">We Design Memorable Logos That Capture Your Business
                    <span style="color:#3197fb; white-space:normal;">Unique Essence and Identity.</span>
                </h2>
                <p class="mb-4 ">Create a powerful first impression with our professional Logo Design Service. We
                    specialize in crafting unique, memorable logos that reflect your business identity and values. Our
                    team works closely with you to understand your vision, target audience, and industry, ensuring that
                    your logo stands out and communicates the essence of your business. Using the latest design trends
                    and techniques, we create versatile logos suitable for all platforms, from websites to social media
                    and print materials. Whether launching a new brand or rebranding, our Logo Design Service delivers
                    high-quality, custom logos that help you make a lasting impact and build brand recognition.</p>
                <a href="<?php echo BASE_URL; ?>contact-us" class="btn btn-primary">Get Started</a>
            </div>
            <!-- Right Column -->
            <div class="col-md-5 d-flex justify-content-center">
                <img src="./image/sds/Logo-Design.webp" alt="Ai Application Development"
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
                            Distinctive Logos. Memorable Brands


                        </h2>
                        <p>
                            At RFZ Digital, we specialise in logo design services that perfectly build your brand’s
                            identity and communicate its vision effectively. Our creative logo design team collaborates
                            closely with you to craft unique and memorable logos that resonate with your target
                            audience. By blending artistic perspectives with strategic insights, RFZ Digital ensures
                            your logo stands out, enhances your brand recognition, and establishes a strong identity,
                            setting the stage for your success in the market.

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
                            Build a Strong Brand Identity with Custom Logo Design Services

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
                            <h5>Stand Out with Creative Logo Design Solution

                            </h5> <!-- Heading -->
                            <p>Our expert designers create logos that communicate your brand’s personality, ensuring a
                                unique, eye-catching identity that enhances brand recognition and trust.


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
                            <h5>Create a Lasting Impression with Professional Logo Design Services

                            </h5> <!-- Heading -->
                            <p>Our logo design services craft distinctive, memorable logos that capture your brand’s
                                essence, making a strong impact and setting your business apart from competitors.


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
                            <h5>Custom Logo Design for Unique Brand Identity




                            </h5> <!-- Heading -->
                            <p>We design custom logos that reflect your brand's values and vision, helping you build a
                                recognisable and professional image that resonates with your audience.


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
                            What is logo design?
                        </button>
                        <div id="home-1-faq-item" class="accordion-collapse collapse show" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                Logo design is creating a unique and visually appealing symbol or emblem representing a
                                brand, company, or product. A well-designed logo is an essential part of branding, as it
                                serves as the face of the company and communicates its values, mission, and personality
                                in a simple and memorable way. </div>
                        </div>
                        <div class="accordion-item">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#home-1-faq-item-2" aria-expanded="false"
                                aria-controls="home-1-faq-item-2">
                                Why do I need a professional logo for my business?
                            </button>
                            <div id="home-1-faq-item-2" class="accordion-collapse collapse"
                                data-bs-parent="#home-1-faq">
                                <div class="accordion-item__body">
                                    <p>A professional logo helps establish your brand’s identity and sets the tone for
                                        how customers perceive your business. It makes your business recognisable,
                                        builds trust with potential customers, and differentiates you from competitors.
                                        A strong logo can also increase brand loyalty and ensure consistency across all
                                        marketing materials.
                                    </p>

                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#home-1-faq-item-3" aria-expanded="false"
                                aria-controls="home-1-faq-item-3">
                                What should I consider when designing a logo?
                            </button>
                            <div id="home-1-faq-item-3" class="accordion-collapse collapse"
                                data-bs-parent="#home-1-faq">
                                <div class="accordion-item__body">
                                    When designing a logo, you should consider:
                                    <ul>
                                        <li>Simplicity: A simple logo is easier to recognise and remember.
                                        </li>
                                        <li>Relevance: The logo should reflect your industry, values, and brand
                                            personality.


                                        </li>
                                        <li>Scalability: The logo should look good in any size, whether on a business
                                            card or a billboard.

                                        </li>
                                        <li>Versatility: It should work in colour, black and white, and various media.
                                        </li>
                                        <li>Uniqueness: A logo should be distinctive and stand out from competitors.
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#home-1-faq-item-4" aria-expanded="false"
                                aria-controls="home-1-faq-item-4">
                                What is the process for creating a logo?
                            </button>
                            <div id="home-1-faq-item-4" class="accordion-collapse collapse"
                                data-bs-parent="#home-1-faq">
                                <div class="accordion-item__body">
                                    <p>Our logo design process involves several steps:</p>
                                    <ul>
                                        <li>Consultation: We start by understanding your brand, target audience, and
                                            vision.
                                        </li>
                                        <li>Research: We research your industry and competitors to ensure your logo
                                            stands out.

                                        </li>
                                        <li>Concept Development: Our team creates multiple logo concepts based on your
                                            input.

                                        </li>
                                        <li>Revisions: We refine the chosen concept, incorporating your feedback.

                                        </li>
                                        <li>Finalisation: Once you’re satisfied with the design, we finalise the logo in
                                            various formats (AI, EPS, PNG, JPG, etc.).

                                        </li>
                                        <li>Delivery: We provide all the files you need for print and digital use.


                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#home-1-faq-item-5" aria-expanded="false"
                                aria-controls="home-1-faq-item-5">
                                How long does the logo design process take?
                            </button>
                            <div id="home-1-faq-item-5" class="accordion-collapse collapse"
                                data-bs-parent="#home-1-faq">
                                <div class="accordion-item__body">
                                    <p>The logo design process typically takes 1 to 2 weeks, depending on the complexity
                                        of the design and the number of revisions. We discuss your specific timeline
                                        needs during the consultation phase and work within those parameters. We aim to
                                        deliver a logo that meets your expectations while maintaining high design
                                        quality.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#home-1-faq-item-6" aria-expanded="false"
                                aria-controls="home-1-faq-item-6">
                                How much does logo design cost?
                            </button>
                            <div id="home-1-faq-item-6" class="accordion-collapse collapse"
                                data-bs-parent="#home-1-faq">
                                <div class="accordion-item__body">
                                    <p>The cost of logo design can vary depending on complexity, the number of revisions
                                        required, and the designer’s experience. We offer competitive pricing and
                                        provide customised quotes based on your specific needs. For a more accurate
                                        estimate, we recommend contacting us with details about your project, and we
                                        will provide a transparent quote.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#home-1-faq-item-7" aria-expanded="false"
                                aria-controls="home-1-faq-item-7">
                                Can I provide input or ideas for my logo design?
                            </button>
                            <div id="home-1-faq-item-7" class="accordion-collapse collapse"
                                data-bs-parent="#home-1-faq">
                                <div class="accordion-item__body">
                                    Yes! We encourage collaboration and value your input throughout the design process.
                                    Whether you have specific colours, fonts, or imagery in mind, we’ll work with you to
                                    incorporate your vision into the logo design. We aim to create a logo that aligns
                                    with your brand’s identity and stands out in the market </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#home-1-faq-item-8" aria-expanded="false"
                                aria-controls="home-1-faq-item-8">
                                What formats will I receive my logo in?
                            </button>
                            <div id="home-1-faq-item-8" class="accordion-collapse collapse"
                                data-bs-parent="#home-1-faq">
                                <div class="accordion-item__body">
                                    Once your logo is finalised, we provide it in multiple formats, including:


                                    <ul>
                                        <li>AI (Adobe Illustrator): The master file for scalable vector graphics.



                                        </li>
                                        <li>EPS: A vector file for use in print and other media.




                                        </li>
                                        <li> PNG: A transparent background file ideal for web and digital use.


                                        </li>
                                        <li> JPG: A high-resolution image suitable for print and online use.



                                        </li>
                                        <li> PDF: A portable file for easy sharing. You will receive all necessary files
                                            for print and digital applications, ensuring versatility across all media.


                                        </li>
                                    </ul>

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
                                    Our digital and technology experts team is ready to help you achieve your business
                                    goals. Whether you need a website update, online advertising support, or improved
                                    visibility on search engines like Google, RFZ Digital is dedicated to providing the
                                    expertise you need to succeed.


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
                                        <span class="testimonial-widget-4__user-position">CEO & Co-founder @
                                            Company</span>
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
                            <h2 class="heading-md heading-md--general-sans text-l5-secondary">Are you ready to increase
                                your
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