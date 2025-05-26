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
                #a4dffd 75%,
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
                <h6 class="text-uppercase" style="color: #EC7D63;">Ai Application Development</h6>
                <h2 class="mb-3 com-services">Revolutionizing Your Business with AI Application Development That Unlocks
                    <span style="color:#1463FF; white-space:normal;">Digital Intelligent Solutions and Enhances
                        Decision-Making</span>
                </h2>
                <p class="mb-4 ">Unlock the power of artificial intelligence with our specialised AI Application
                    Development services. We design and develop custom AI solutions that optimise processes, enhance
                    user experience, and drive innovation within your business. Our team utilises cutting-edge
                    technologies such as machine learning, natural language processing, and computer vision to build
                    intelligent applications that can automate tasks, provide data-driven insights, and make real-time
                    decisions.</p>
                <a href="<?php echo BASE_URL; ?>contact-us" class="btn btn-primary">Get Started</a>
            </div>
            <!-- Right Column -->
            <div class="col-md-5 d-flex justify-content-center">
                <img src="./image/sds/Ai-Application-Development.webp" alt="Ai Application Development"
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
                            Intelligent Solutions. Future-Ready Technology
                        </h2>
                        <p>
                            At RFZ Digital, we specialise in AI application development services that utilise the power
                            of artificial intelligence to transform your business. Our expert team designs and builds
                            custom AI solutions tailored to your brand’s specific needs, enhancing efficiency and
                            driving innovation. From machine learning algorithms to intelligent automation, we create
                            applications that streamline processes and provide valuable insights.
                        </p>
                        <p>By combining cutting-edge technology with strategic vision, RFZ Digital ensures your AI
                            applications are
                            scalable, user-friendly, and impactful.</p>
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
                            Transform Your Ideas into Reality with Custom Software Development Services</h2>
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
                            <h5>Accelerate Your Business with Custom SaaS Development</h5> <!-- Heading -->
                            <p>Our SaaS development services create scalable, secure, cloud-based solutions that deliver
                                seamless functionality, enhance user experience, and drive efficient business growth.
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
                            <h5>End-to-End SaaS Development for Innovative Cloud Solutions</h5> <!-- Heading -->
                            <p>We design, develop, and deploy secure SaaS applications that support your business goals,
                                improve efficiency, and provide users with a reliable cloud experience.</p>
                        </div>
                    </div>

                    <!-- Box 3 -->
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-page-custom-box">
                            <div class="feature-widget-2__icon">
                                <img src="./image/home-5/feature-3.png" alt="feature icon">
                            </div>
                            <!-- <div class="icon">💼</div>  -->
                            <h5>Build Powerful SaaS Platforms for Sustainable Growth</h5> <!-- Heading -->
                            <p>Our expert SaaS development services offer flexible, subscription-based applications that
                                streamline processes, reduce costs, and support continuous business expansion.</p>
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
                            What is AI application development?
                        </button>
                        <div id="home-1-faq-item" class="accordion-collapse collapse show" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                AI application development refers to creating software solutions that integrate
                                artificial intelligence (AI) technologies to automate tasks, analyse data, and make
                                intelligent decisions. These applications use machine learning, deep learning, natural
                                language processing (NLP), computer vision, and other AI techniques to mimic human-like
                                capabilities and improve operational efficiency.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#home-1-faq-item-2" aria-expanded="false" aria-controls="home-1-faq-item-2">
                            What types of AI applications do you develop?
                        </button>
                        <div id="home-1-faq-item-2" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                We develop a wide range of AI applications, including:
                                <ul>
                                    <li>Chatbots & Virtual Assistants: Automated customer support tools that interact
                                        with users in real time.</li>
                                    <li>Predictive Analytics Solutions: AI-powered tools for forecasting trends, market
                                        behaviours, and customer preferences.</li>
                                    <li>Natural Language Processing (NLP) Apps: These are applications that process and
                                        analyse human language, including sentiment analysis, text classification, and
                                        language translation.</li>
                                    <li>Computer Vision Applications: AI solutions that analyse and interpret visual
                                        data, such as image recognition and object detection.</li>
                                    <li>Recommendation Systems: Personalised content and product recommendations using
                                        machine learning.</li>
                                </ul>
                                Speech Recognition Apps: AI-driven applications that convert spoken language into text
                                for transcription and command processing.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#home-1-faq-item-3" aria-expanded="false" aria-controls="home-1-faq-item-3">
                            How do you develop AI applications?
                        </button>
                        <div id="home-1-faq-item-3" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                Our AI application development process includes the following:
                                <ul>
                                    <li>Requirement Analysis: Understanding your business needs and identifying AI use
                                        cases.</li>
                                    <li>Data Collection & Preparation: Gathering and cleaning data for training machine
                                        learning models.</li>
                                    <li>Model Development: Selecting and training machine learning models based on your
                                        needs.</li>
                                    <li>Algorithm Design: Developing algorithms that can process data and make
                                        intelligent predictions.</li>
                                    <li>Application Development: Integrating AI models into a user-friendly application
                                        interface.</li>
                                    <li>Testing & Optimisation: Validating the AI model and optimising its performance.
                                    </li>
                                </ul>
                                Deployment & Monitoring: Launch the AI application and continuously monitor its
                                performance for improvements.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#home-1-faq-item-4" aria-expanded="false" aria-controls="home-1-faq-item-4">
                            What are the benefits of using AI in applications?
                        </button>
                        <div id="home-1-faq-item-4" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                AI enhances applications by:
                                <ul>
                                    <li>Automating Repetitive Tasks: Reduces the need for manual intervention, freeing
                                        up resources for more complex tasks.</li>
                                    <li>Improving Decision Making: AI systems analyse vast amounts of data and provide
                                        insights that lead to better business decisions.</li>
                                    <li>Personalizing User Experiences: AI-driven apps can offer personalised content,
                                        recommendations, and services.</li>
                                    <li>Increasing Efficiency: AI can optimise processes, making applications faster and
                                        more cost-effective.</li>
                                </ul>
                                Predictive Insights: AI apps can predict trends, identify patterns, and forecast future
                                events.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#home-1-faq-item-5" aria-expanded="false" aria-controls="home-1-faq-item-5">
                            How long does it take to develop an AI application?
                        </button>
                        <div id="home-1-faq-item-5" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                The time to develop an AI application varies based on project complexity, data
                                availability, and the type of AI technology involved. Generally, the process can take a
                                few weeks to several months. After an initial consultation, we will provide a timeline
                                estimate based on your project’s specific requirements.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#home-1-faq-item-6" aria-expanded="false" aria-controls="home-1-faq-item-6">
                            What types of businesses can benefit from AI applications?
                        </button>
                        <div id="home-1-faq-item-6" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                AI applications are beneficial for a wide range of industries, including:
                                <ul>
                                    <li>E-commerce: Personalisation, recommendation engines, inventory management.</li>
                                    <li>Healthcare: Diagnostic tools, predictive analytics, and patient monitoring
                                        systems.</li>
                                    <li>Finance: Fraud detection, algorithmic trading, and customer service automation.
                                    </li>
                                    <li>Manufacturing: Predictive maintenance, quality control, and supply chain
                                        optimisation.</li>
                                    <li>Retail: AI-driven marketing, demand forecasting, and customer insights.</li>
                                </ul>
                                Education: Personalised learning experiences, student performance prediction.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#home-1-faq-item-7" aria-expanded="false" aria-controls="home-1-faq-item-7">
                            Do you provide support after deploying the AI application?
                        </button>
                        <div id="home-1-faq-item-7" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                Yes, we offer ongoing support and maintenance after deploying your AI application. Our
                                support includes monitoring the performance of AI models, improving algorithms, fixing
                                bugs, and making adjustments as your business needs evolve. We also offer regular
                                updates to ensure the application remains current with advancements in AI technologies.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#home-1-faq-item-8" aria-expanded="false" aria-controls="home-1-faq-item-8">
                            What technologies do you use for AI application development?
                        </button>
                        <div id="home-1-faq-item-8" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                We use a variety of cutting-edge technologies to develop AI applications, including:
                                <ul>
                                    <li>Machine Learning Libraries: TensorFlow, PyTorch, Keras, Scikit-learn.</li>
                                    <li>Natural Language Processing Tools: SpaCy, NLTK, GPT models, BERT.</li>
                                    <li>Computer Vision Frameworks: OpenCV, TensorFlow, Keras, PyTorch.
                                    </li>
                                    <li>Data Processing Tools: Pandas, NumPy, Apache Spark.</li>
                                    <li>Cloud AI Services: AWS AI, Google Cloud AI, Microsoft Azure AI.</li>
                                </ul>
                                Programming Languages: Python, R, Java, C++. We select the most appropriate technologies
                                based on your specific requirements to ensure optimal performance.
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