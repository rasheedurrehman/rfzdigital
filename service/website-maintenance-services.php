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
                #fed48e 75%,
                #fe375b 100%);

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
                <h6 class="text-uppercase" style="color: #EC7D63;">Website Maintenance Services</h6>
                <h2 class="mb-3 com-services">Get Website maintenance services for your Business website <span
                        style="color:#1463FF; white-space:normal;">
                        – Starting at $699
                    </span>
                </h2>
                <p class="mb-4 ">Say goodbye to glitches and hello to seamless performance! RFZ Digital provides Website
                    Maintenance Service that includes regular updates, security monitoring, and performance optimization
                    to keep your website running smoothly. We proactively address potential issues to minimize downtime
                    and guarantee your online presence is secure and up-to-date. With a reliable, high-performing
                    website always ready for customers, you retain existing clients, attract new ones, and protect your
                    growth.
                </p>
                <a href="<?php echo BASE_URL; ?>contact-us" class="btn btn-primary">Get Started</a>
            </div>
            <!-- Right Column -->
            <div class="col-md-5 d-flex justify-content-center">
                <img src="./image/digitalservices/wdd/website-maintenance-services.webp"
                    alt="Website Maintenance Services" class="img-fluid rounded  ">
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
                            Reliable Care, Continuous Performance
                        </h2>
                        <p>
                            At RFZ Digital, we provide comprehensive website maintenance services designed to keep your
                            website running smoothly and securely. Our dedicated team ensures regular updates,
                            performance monitoring, and troubleshooting to prevent issues before they arise. With a
                            focus on reliability and peace of mind, RFZ Digital helps your business maintain a seamless
                            online presence, allowing you to concentrate on growing your business.
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
                            Keeping Your Website Secure, Updated, and Running Smoothly
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
                            <h5>Keep Your Website Running Smoothly</h5>
                            <p>Our maintenance services ensure your website is always up-to-date, secure, and performing
                                at its best with regular updates and checks.
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
                            <h5>Ongoing Support for a Seamless Online Experience</h5>
                            <p>We provide reliable website maintenance, handling updates, backups, and security so you
                                can focus on growing your business.</p>
                        </div>
                    </div>

                    <!-- Box 3 -->
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-page-custom-box">
                            <div class="feature-widget-2__icon">
                                <img src="./image/home-5/feature-3.png" alt="feature icon">
                            </div>
                            <!-- <div class="icon">💼</div>  -->
                            <h5>Ensure Your Website Stays Secure and Optimized</h5>
                            <p>Our website maintenance services offer peace of mind, keeping your site secure, fast, and
                                fully optimized for the best user experience.</p>
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
                            What is included in your website maintenance services?
                        </button>
                        <div id="home-1-faq-item" class="accordion-collapse collapse show" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                Our website maintenance services include regular updates to content, security patches,
                                software updates, performance optimisation, backup management, and troubleshooting to
                                ensure your website runs smoothly and securely.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#home-1-faq-item-2" aria-expanded="false" aria-controls="home-1-faq-item-2">
                            Why is website maintenance important
                        </button>
                        <div id="home-1-faq-item-2" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                Website maintenance is essential to ensure your website remains secure, up-to-date, and
                                fully functional. Regular maintenance helps prevent security breaches, improve user
                                experience, and ensure your website performs optimally across all devices.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#home-1-faq-item-3" aria-expanded="false" aria-controls="home-1-faq-item-3">
                            How often should my website be maintained?
                        </button>
                        <div id="home-1-faq-item-3" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                We recommend monthly website maintenance to ensure your website is secure, updated, and
                                running smoothly. However, the frequency can vary depending on your website’s complexity
                                and the frequency of updates needed
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#home-1-faq-item-4" aria-expanded="false" aria-controls="home-1-faq-item-4">
                            Do you provide ongoing support after the website is launched?
                        </button>
                        <div id="home-1-faq-item-4" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                Yes, we offer ongoing support as part of our maintenance services. This includes
                                addressing issues, implementing updates, and ensuring your website remains current and
                                secure after launch.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#home-1-faq-item-5" aria-expanded="false" aria-controls="home-1-faq-item-5">
                            Will you handle software updates for my website?
                        </button>
                        <div id="home-1-faq-item-5" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                Yes, we handle all necessary software updates, including content management system (CMS)
                                updates, plugin updates, and security patches, ensuring your site stays current and
                                secure.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#home-1-faq-item-6" aria-expanded="false" aria-controls="home-1-faq-item-6">
                            Can you assist with adding new content or features to my website?
                        </button>
                        <div id="home-1-faq-item-6" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                Absolutely! We offer content update services, including adding new blog posts, images,
                                pages, or features based on your evolving business needs.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#home-1-faq-item-7" aria-expanded="false" aria-controls="home-1-faq-item-7">
                            How do you ensure my website is secure?
                        </button>
                        <div id="home-1-faq-item-7" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                We implement regular security checks, install SSL certificates, update software to the
                                latest versions, monitor for malware, and use firewalls to ensure your website remains
                                secure from potential threats.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#home-1-faq-item-8" aria-expanded="false" aria-controls="home-1-faq-item-8">
                            How much does website maintenance cost?
                        </button>
                        <div id="home-1-faq-item-8" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                The cost of website maintenance depends on the complexity and size of your website. We
                                offer flexible maintenance packages starting at $99 per month, with custom pricing for
                                more complex websites or additional services.
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




<?php include '../includes/footer.php'; ?>