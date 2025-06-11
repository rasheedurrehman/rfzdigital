<?php
$noindex = true;
include '../includes/header.php';
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
                <img src="./image/sds/Logo-Design.webp" alt="Ai Application Development" class="img-fluid rounded  ">
            </div>
        </div>
    </div>
</section>

<!-- ~~~~~~~~~~~~~~~~~~~~~~~~
    Home 1 : Brand Section
~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<?php include '../includes/logo-slider.php'; ?>


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
                        <div class="inquiry-form">
                            <iframe src="https://contact-form-three-silk.vercel.app/embed?siteId=RFZDigital_com"
                                width="100%" height="570" frameBorder="0"></iframe>
                        </div>

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
<?php include '../includes/portfolio-slider.php'; ?>





<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Home 3  : Testimonial Section 
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
<!-- testimonialSection -->
<?php include '../includes/testimonial2.php'; ?>
<!-- testimonial us Section -->


<!-- ~~~~~~~~~~~~~~~~~~~~~~~~
    Home 1 : social-apps Section
~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<?php include '../includes/social-apps-logo-slider.php'; ?>


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
</div>


<!-- Contact Us Section -->
<?php require_once '../includes/contact-us-section.php'; ?>
<!-- Contact us Section -->



<?php include '../includes/marquee.php'; ?>

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
<?php include '../includes/footer.php'; ?>