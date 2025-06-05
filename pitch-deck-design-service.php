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
                <h6 class="text-uppercase" style="color: #3197fb;">Pitch Deck Design Service
 </h6>
                <h2 class="mb-3 com-services">Creating Powerful, Visually Compelling Pitch Decks 
                    <span style="color:#3197fb; white-space:normal;">That Capture Attention and Drive Investment.</span>
                </h2>
                <p class="mb-4 ">Impress investors and stakeholders with a professionally designed Pitch Deck that effectively communicates your business vision. Our Pitch Deck Design Service combines impactful visuals, clear messaging, and strategic layouts to present your ideas compellingly and persuasively. We craft custom pitch decks tailored to your unique business needs, focusing on critical elements such as market opportunity, business model, growth strategy, and financial projections. With a professional, polished design, we ensure your pitch deck stands out, captures attention, and increases your chances of securing investment or partnerships. Let us help you tell your story and make a lasting impression with a visually engaging pitch deck that drives results.

</p>
                <a href="<?php echo BASE_URL; ?>contact-us" class="btn btn-primary">Get Started</a>
            </div>
            <!-- Right Column -->
            <div class="col-md-5 d-flex justify-content-center">
                <img src="./image/sds/Pitch-Deck-Design-Services.webp" alt="Ai Application Development"
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
                          Compelling Designs. Powerful Pitches

</h2>
                        <p>
                         At RFZ Digital, we provide expert pitch deck design services that help you make a powerful business impression. Our creative team collaborates with you to craft visually engaging and compelling pitch decks that effectively communicate your ideas and objectives. By combining compelling visuals with strategic storytelling, RFZ Digital ensures your pitch stands out to investors and stakeholders, enhancing your chances of success and growth.


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
                         Craft a Compelling Pitch with Professional Pitch Deck Design Services


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
                            <h5>Impress Investors with Professional Pitch Deck Design Services



                            </h5> <!-- Heading -->
                            <p>Our pitch deck design services create visually compelling presentations that clearly communicate your vision, engage investors, and increase your chances of success.




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
                            <h5>High-Impact Pitch Deck Design to Secure Funding</h5> <!-- Heading -->
                            <p>We design custom pitch decks that showcase your business potential, helping you present your story with clarity and confidence to attract investors.



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
                            <h5>Get Noticed with Expertly Crafted Pitch Deck Presentations


</h5> <!-- Heading -->
                            <p>Our pitch deck design services deliver professional, on-brand slides that highlight your strengths and give you a competitive edge in securing funding.




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
                            What is a pitch deck?
                        </button>
                        <div id="home-1-faq-item" class="accordion-collapse collapse show" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
A pitch deck is a visual presentation that provides an overview of your business, product, or idea to potential investors, clients, or partners. It typically includes key information about your company’s vision, market opportunity, business model, financials, and the team behind the project. The purpose of a pitch deck is to communicate your value proposition clearly and persuade the audience to take action, whether investing, partnering, or purchasing.                        <div class="accordion-item">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#home-1-faq-item-2" aria-expanded="false"
                                aria-controls="home-1-faq-item-2">
                            Why should I invest in professional pitch deck design?
                            </button>
                            <div id="home-1-faq-item-2" class="accordion-collapse collapse"
                                data-bs-parent="#home-1-faq">
                                <div class="accordion-item__body">
                                    <p>A professionally designed pitch deck helps you stand out and make a memorable impression. It’s essential to make complex information easy to understand while also engaging and persuading your audience. A well-designed pitch deck can communicate your story visually, improve credibility, and demonstrate that you’ve invested time and effort into your business presentation. This can increase your chances of securing funding or winning clients.</p>

                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#home-1-faq-item-3" aria-expanded="false"
                                aria-controls="home-1-faq-item-3">
                              What does your pitch deck design service include?
                            </button>
                            <div id="home-1-faq-item-3" class="accordion-collapse collapse"
                                data-bs-parent="#home-1-faq">
                                <div class="accordion-item__body">
                                Our pitch deck design service includes the following:

 <ul>

                                        <li>Custom Design: Tailored slides designed to match your brand identity.



                                        </li>
                                        <li>Content Structuring: Organising your information in a clear, concise, and persuasive format.

  </li>
                                        <li>Visuals and Graphics: Including charts, graphs, icons, and images that enhance your message.
 </li>
                                        <li>Branding Consistency: Ensuring your pitch deck aligns with your brand’s look and feel.
 </li>
                                        <li>Slide Templates: Professional templates for various sections like market analysis, team bios, financials, etc.

 </li>
                                         <li>Revisions: Multiple revisions to ensure the pitch deck meets your expectations.




                                        </li>
                                        

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#home-1-faq-item-4" aria-expanded="false"
                                aria-controls="home-1-faq-item-4">
                              How long does it take to design a pitch deck?
                            </button>
                            <div id="home-1-faq-item-4" class="accordion-collapse collapse"
                                data-bs-parent="#home-1-faq">
                                <div class="accordion-item__body">
                                    <p>A well-designed pitch deck typically takes 7-10 business days to complete. This allows time for us to gather all necessary information, design each slide, and make revisions based on your feedback. If you need the pitch deck faster, we offer expedited services to meet tighter deadlines.</p>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#home-1-faq-item-5" aria-expanded="false"
                                aria-controls="home-1-faq-item-5">
                            Do I need to provide content for the pitch deck?
                            </button>
                            <div id="home-1-faq-item-5" class="accordion-collapse collapse"
                                data-bs-parent="#home-1-faq">
                                <div class="accordion-item__body">
                                    <p>Yes, we require the content you want to include, such as information about your company, products or services, market analysis, financial projections, and team members. If you’re unsure how to structure or present the content, we can guide you and help with content suggestions. Our design service focuses on presenting your information in a visually appealing way that resonates with investors and stakeholders.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#home-1-faq-item-6" aria-expanded="false"
                                aria-controls="home-1-faq-item-6">
                             Can I make changes to the pitch deck after it's delivered?
                            </button>
                            <div id="home-1-faq-item-6" class="accordion-collapse collapse"
                                data-bs-parent="#home-1-faq">
                                <div class="accordion-item__body">
                                    <p>Yes, we offer revisions to make sure the pitch deck aligns with your vision. Once the initial design is completed, we provide a few revisions based on your feedback. If you require further changes after the final delivery, we can discuss additional revisions or a retainer option for ongoing support.

</p>
                                </div>
                            </div>
                        </div>
                       
                        <div class="accordion-item">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#home-1-faq-item-8" aria-expanded="false"
                                aria-controls="home-1-faq-item-8">
Can you help me with the content of the pitch deck as well?
                            </button>
                            <div id="home-1-faq-item-8" class="accordion-collapse collapse"
                                data-bs-parent="#home-1-faq">
                                <div class="accordion-item__body">
                                  
 <p>Yes, we can assist with content development in addition to the design. Our team can help you craft a compelling narrative, define your key value propositions, and structure your pitch deck to highlight the most important aspects of your business. If needed, we offer copywriting services to help refine your messaging.


</p>
                                    </ul>

                                </div>
                            </div>
                        </div>

                           <div class="accordion-item">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#home-1-faq-item-6" aria-expanded="false"
                                aria-controls="home-1-faq-item-6">
                            How much does pitch deck design cost?

                            </button>
                            <div id="home-1-faq-item-6" class="accordion-collapse collapse"
                                data-bs-parent="#home-1-faq">
                                <div class="accordion-item__body">
                                    <p>The cost of pitch deck design depends on the complexity, number of slides, and whether you require additional services such as content writing or brand alignment. We offer flexible pricing to suit different budgets, whether you need a simple design or a more comprehensive, investor-ready pitch deck. Please get in touch with us with your requirements for a custom quote, and we’ll provide an accurate estimate.

</p>
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