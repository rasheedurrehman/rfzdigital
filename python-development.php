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
            #ffebde 75%,
            #ffab68 100%);

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
                <h6 class="text-uppercase" style="color: #EC7D63;">Python Development Service</h6>
                <h2 class="mb-3 com-services">Delivering Robust Python Development Services That Create Efficient,
                    Scalable
                    <span style="color:#1463FF; white-space:normal;">Solutions for Your Business Needs</span>
                </h2>
                <p class="mb-4 ">Leverage the power and versatility of Python with our expert Python Development
                    Service. Our team specialises in creating scalable, efficient, and custom applications using Python,
                    one of the most popular programming languages for web development, data analysis, and automation.
                    From building robust web applications and APIs to implementing machine learning models and data
                    processing solutions, we deliver Python-based solutions that meet your business needs. With a focus
                    on clean code, performance optimisation, and security, we ensure your Python application is
                    reliable, fast.</p>
                <a href="<?php echo BASE_URL; ?>contact-us" class="btn btn-primary">Get Started</a>
            </div>
            <!-- Right Column -->
            <div class="col-md-5 d-flex justify-content-center">
                <img src="./image/sds/Python-Developmen.webp" alt="Python Development Service"
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
                            Efficient Code, Powerful Solutions
                        </h2>
                        <p>
                            At RFZ Digital, we offer specialised Python development services that deliver solid and
                            scalable solutions tailored to your business needs. Our expert team of Python developers
                            utilises Python’s versatility to create high quality web applications, automation tools, and
                            data analytics solutions. Committed to quality and innovation, RFZ Digital ensures that your
                            projects are completed on time and aligned with your goals, driving growth and efficiency.
                            Learn More
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
                            Build Scalable SaaS Solutions to Drive Business Growth with Expert Development Services</h2>
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
                            <h5>Efficient and Scalable Python Development Services</h5> <!-- Heading -->
                            <p>Our Python development services deliver robust, scalable solutions for web applications,
                                data analysis, and automation, tailored to meet your business needs.
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
                            <h5>Custom Python Solutions for High-Performance Applications</h5> <!-- Heading -->
                            <p>We specialise in Python development, creating efficient, secure applications that enhance
                                productivity, streamline workflows, and support your digital transformation goals.</p>
                        </div>
                    </div>

                    <!-- Box 3 -->
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-page-custom-box">
                            <div class="feature-widget-2__icon">
                                <img src="./image/home-5/feature-3.png" alt="feature icon">
                            </div>
                            <!-- <div class="icon">💼</div>  -->
                            <h5>Expert Python Development for Advanced Business Solutions</h5> <!-- Heading -->
                            <p>Our Python developers build customised applications, leveraging Python's versatility to
                                deliver reliable, high-performance solutions for data-driven and web-based projects.</p>
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
                            What is Python development?
                        </button>
                        <div id="home-1-faq-item" class="accordion-collapse collapse show" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                Python development refers to building software applications, websites, data analysis
                                tools, and more using Python. Python is known for its simplicity, readability, and
                                versatility. It is popular for web development, machine learning, data science,
                                automation, and artificial intelligence projects.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#home-1-faq-item-2" aria-expanded="false" aria-controls="home-1-faq-item-2">
                            What are the advantages of using Python for development?
                        </button>
                        <div id="home-1-faq-item-2" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                Python offers several benefits for developers, including:
                                <ul>
                                    <li>Ease of Use: Python’s syntax is simple and easy to learn, making it ideal for
                                        both beginners and experienced developers.</li>
                                    <li>Extensive Libraries: Python has a rich ecosystem of libraries and frameworks,
                                        such as Django, Flask, Pandas, and NumPy, that make development faster and more
                                        efficient.</li>
                                    <li>Cross-Platform Compatibility: Python can run on different platforms (Windows,
                                        macOS, Linux), making it highly versatile.</li>
                                    <li>Integration: Python easily integrates with other languages and technologies,
                                        which is helpful for complex systems.</li>

                                </ul>
                                Community Support: Python has a large and active community with plenty of resources,
                                documentation, and third-party tools.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#home-1-faq-item-3" aria-expanded="false" aria-controls="home-1-faq-item-3">
                            What types of applications can be developed with Python?
                        </button>
                        <div id="home-1-faq-item-3" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                Python can be used to develop a wide range of applications, including:
                                <ul>
                                    <li>Web Development: Websites and web applications using frameworks like Django and
                                        Flask.</li>
                                    <li>Data Science and Analytics: Data analysis, visualisation, and machine learning
                                        with libraries like Pandas, NumPy, and Matplotlib.</li>
                                    <li>Automation: Scripting and automating repetitive tasks or workflows.</li>
                                    <li>Artificial Intelligence and Machine Learning: Developing AI models and
                                        algorithms using TensorFlow, Keras, and Scikit-learn.</li>
                                    <li>Desktop Applications: Graphical user interface (GUI) applications using Tkinter
                                        or PyQt.</li>

                                </ul>
                                Game Development: Creating simple games using frameworks like Pygame.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#home-1-faq-item-4" aria-expanded="false" aria-controls="home-1-faq-item-4">
                            How long does it take to develop a Python-based application?
                        </button>
                        <div id="home-1-faq-item-4" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                The development timeline for a Python-based application depends on factors such as
                                complexity, scope, and functionality. Simple applications or scripts can be developed in
                                a few weeks, while more complex systems, such as AI-powered applications or large-scale
                                web platforms, may take several months. After assessing your project requirements, we
                                can provide a more accurate timeline.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#home-1-faq-item-5" aria-expanded="false" aria-controls="home-1-faq-item-5">
                            Is Python suitable for enterprise-level applications?
                        </button>
                        <div id="home-1-faq-item-5" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                Yes, Python is highly scalable and can be used for enterprise-level applications. Its
                                rich set of libraries and frameworks, such as Django and Flask for web development, make
                                it suitable for building secure, robust, and scalable enterprise applications. Python’s
                                ability to integrate with other technologies and its strong community support further
                                enhance its suitability for large-scale projects.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#home-1-faq-item-6" aria-expanded="false" aria-controls="home-1-faq-item-6">
                            What frameworks and tools do you use for Python development?
                        </button>
                        <div id="home-1-faq-item-6" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                For Python development, we utilise a variety of frameworks and tools to enhance
                                productivity and application quality, including:
                                <ul>
                                    <li>Web Frameworks: Django, Flask, Pyramid.</li>
                                    <li>Machine Learning Libraries: TensorFlow, Keras, Scikit-learn, PyTorch.</li>
                                    <li>Data Analysis Libraries: Pandas, NumPy, Matplotlib.</li>
                                    <li>Task Automation: Celery, PyAutoGUI.</li>
                                    <li>Testing Tools: PyTest, UnitTest, and Selenium for automated testing.</li>
                                </ul>
                                Database: PostgreSQL, MySQL, SQLite, MongoDB for back-end data storage.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#home-1-faq-item-7" aria-expanded="false" aria-controls="home-1-faq-item-7">
                            How do you ensure the quality of Python applications?
                        </button>
                        <div id="home-1-faq-item-7" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                We ensure the quality of Python applications through a combination of:
                                <ul>
                                    <li>Code Reviews: Regular code reviews to maintain readability, consistency, and
                                        best practices.</li>
                                    <li>Unit Testing: Writing unit tests to check individual components’ functionality
                                        and accuracy.</li>
                                    <li>Integration Testing: Ensuring different modules of the application work well
                                        together.</li>
                                    <li>Continuous Integration/Continuous Deployment (CI/CD): Using CI/CD pipelines for
                                        automated testing and deployment to ensure faster and more reliable delivery.
                                    </li>

                                </ul>
                                Performance Optimisation: Identifying and optimising bottlenecks in the application to
                                ensure efficient performance.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#home-1-faq-item-8" aria-expanded="false" aria-controls="home-1-faq-item-8">
                            Do you provide ongoing support and maintenance for Python applications?
                        </button>
                        <div id="home-1-faq-item-8" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                Yes, we provide comprehensive support and maintenance for Python applications. This
                                includes:
                                <ul>
                                    <li>Bug Fixes and Updates: Regular updates to fix bugs and improve functionality.
                                    </li>
                                    <li>Performance Monitoring: Ongoing monitoring of application performance to ensure
                                        it runs smoothly.</li>
                                    <li>Scalability: Making improvements to accommodate growing users or increased data
                                        volumes.</li>
                                    <li>Security Patches: Implementing security patches and updates to keep your
                                        application secure.</li>
                                </ul>
                                Feature Enhancements: Adding new features and improving existing ones per evolving
                                business needs.
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
                            <h2 class="heading-md">Fill out this form, We ‘ll quickly get back to you </h2>
                            <p>
                                We are here to help you! Tell us how we can help and we’ll get in touch within next
                                24hrs with expert
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