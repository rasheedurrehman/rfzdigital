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
                #c5d8d0 75%,
                #66bdc7 100%);

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
                <h6 class="text-uppercase" style="color: #EC7D63;">Pinterest Adst</h6>
                <h2 class="mb-3 com-services">Inspire Action and Drive Sales with our Targeted<span
                        style="color:#1463FF; white-space:normal;">
                        Pinterest Ads management service
                    </span>
                </h2>
                <p class="mb-4 ">Drive targeted traffic and increase brand awareness with our Pinterest Ads services. We
                    create visually appealing, highly engaging ad campaigns that seamlessly blend with Pinterest
                    user-generated content, helping you connect with an audience actively seeking inspiration. Our team
                    uses advanced targeting techniques, such as keyword optimisation, interest-based targeting, and
                    demographics, to ensure your ads reach the most relevant users. Whether you want to promote
                    products, drive website visits, or build brand recognition, our Pinterest Ads services help you
                    maximise your ROI by reaching potential customers in a visually-driven, discovery-focused
                    environment.
                </p>
                <a href="<?php echo BASE_URL; ?>contact-us" class="btn btn-primary">Get Started</a>
            </div>
            <!-- Right Column -->
            <div class="col-md-5 d-flex justify-content-center">
                <img src="./image/digitalservices/ga/Pintertst-Ads.webp" alt="Pinterest Adst"
                    class="img-fluid rounded  ">
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
                            Inspire Action, Amplify Your Brand

                        </h2>
                        <p>
                            At RFZ Digital, we specialise in Pinterest Ads services that transform your visual marketing
                            strategies. Our expert team creates compelling, targeted campaigns that align with your
                            brand and capture the attention of your ideal audience. By utilising Pinterest’s analytics
                            and insights, RFZ Digital optimises your ads for maximum engagement and traffic, helping you
                            drive conversions and elevate your brand in the graphic marketplace.

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
                            Drive Traffic and Boost Sales with Targeted Pinterest Ads Campaigns
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
                            <h5>Boost Your Brand with Targeted Pinterest Ads Campaigns</h5>
                            <p>Our Pinterest Ads services help you drive traffic and increase brand visibility by
                                targeting users with highly engaging, visually appealing ads tailored to your audience's
                                interest</p>
                        </div>
                    </div>

                    <!-- Box 2 -->
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-page-custom-box">
                            <div class="feature-widget-2__icon">
                                <img src="./image/home-5/feature-2.png" alt="feature icon">
                            </div>
                            <!-- <div class="icon">🌐</div>  -->
                            <h5>Maximise Your Reach with Pinterest Ads Marketing</h5>
                            <p>We create customised Pinterest Ads campaigns to drive user engagement, increase clicks,
                                and generate high-quality leads by leveraging Pinterest's powerful visual search
                                platform.</p>
                        </div>
                    </div>

                    <!-- Box 3 -->
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-page-custom-box">
                            <div class="feature-widget-2__icon">
                                <img src="./image/home-5/feature-3.png" alt="feature icon">
                            </div>
                            <!-- <div class="icon">💼</div>  -->
                            <h5>Generate More Sales with Pinterest Ads Campaigns</h5>
                            <p>Our Pinterest Ads strategies focus on increasing product visibility, driving traffic to
                                your e-commerce store, and converting Pinterest users into loyal customers.
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
                            What are Pinterest Ads?
                        </button>
                        <div id="home-1-faq-item" class="accordion-collapse collapse show" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                Pinterest Ads are paid advertisements that appear on Pinterest, a visual discovery
                                platform. These ads allow businesses to promote their content in a way that blends
                                seamlessly with organic pins. Pinterest Ads include promoted pins, video ads, and
                                carousel ads, enabling brands to drive traffic, increase sales, or raise brand awareness
                                through visually compelling content.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#home-1-faq-item-2" aria-expanded="false" aria-controls="home-1-faq-item-2">
                            How do Pinterest Ads work?
                        </button>
                        <div id="home-1-faq-item-2" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                Pinterest Ads work by promoting pins to a broader audience. Businesses create engaging
                                pins that appear in users’ home feeds, search results, or within relevant Pinterest
                                boards. These promoted pins look and feel like organic content but are shown to users
                                based on their interests, search behaviour, and demographics. Ads are run through an
                                auction system where advertisers bid for ad placements based on their budget and
                                campaign goals.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#home-1-faq-item-3" aria-expanded="false" aria-controls="home-1-faq-item-3">
                            How much do Pinterest Ads cost?
                        </button>
                        <div id="home-1-faq-item-3" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                The cost of Pinterest Ads depends on several factors, including your campaign type,
                                targeting, and bid strategy. Pinterest operates on a cost-per-click (CPC) and
                                cost-per-impression (CPM) basis. The minimum CPC for Pinterest Ads is typically around
                                $0.10, but it can vary. Campaign costs can increase based on competition and targeting
                                options. Still, businesses can set daily and lifetime budget limits to manage their
                                spending.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#home-1-faq-item-4" aria-expanded="false" aria-controls="home-1-faq-item-4">
                            What types of Pinterest Ads are available?
                        </button>
                        <div id="home-1-faq-item-4" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                Pinterest offers various ad formats, including:
                                <ul>
                                    <li>Promoted Pins: These are the most common ad formats in users’ feeds, search
                                        results, and boards.</li>
                                    <li>Video Pins: Video-based ads that capture attention and can drive more
                                        engagement.
                                    </li>
                                    <li>Carousel Ads: Multiple images that users can swipe through, ideal for showcasing
                                        multiple products or features.</li>
                                    <li>Shopping Ads: These ads allow users to view product details and make direct
                                        purchases on Pinterest.</li>

                                </ul>
                                Promoted App Pins: Ads designed to drive app installs by linking directly to your app
                                store page.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#home-1-faq-item-5" aria-expanded="false" aria-controls="home-1-faq-item-5">
                            How do I target the right audience with Pinterest Ads?
                        </button>
                        <div id="home-1-faq-item-5" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                Pinterest provides several targeting options to help businesses reach the most relevant
                                audience:
                                <ul>
                                    <li>Interest Targeting: Reach users based on their interests, such as fashion, home
                                        decor, food, or fitness.</li>
                                    <li>Keyword Targeting: Show ads to users who search for specific keywords on
                                        Pinterest, increasing the relevance of your campaign.</li>
                                    <li>Demographic Targeting: Target users based on age, gender, location, language,
                                        and device type.</li>
                                    <li>Custom Audiences: Use your customer data to retarget or create lookalike
                                        audiences.</li>

                                </ul>
                                Behavioural Targeting: Reach users who have engaged with similar content or shown
                                interest in similar products.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#home-1-faq-item-6" aria-expanded="false" aria-controls="home-1-faq-item-6">
                            How do I create an effective Pinterest Ads campaign?
                        </button>
                        <div id="home-1-faq-item-6" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                To create an effective Pinterest Ads campaign:
                                <ul>
                                    <li>Set clear goals: Choose objectives such as driving traffic, increasing brand
                                        awareness, or boosting conversions.</li>
                                    <li>Use high-quality visuals: Pinterest is a visually-driven platform, so ensure
                                        your pins are visually appealing and high-resolution.</li>
                                    <li>Craft engaging copy: Write concise and compelling descriptions that provide
                                        value and include relevant keywords.</li>
                                    <li>Use relevant keywords and hashtags: Incorporate keywords and hashtags in your
                                        pins to increase discoverability.</li>



                                </ul>
                                Optimise for mobile: Since Pinterest is primarily a mobile app, ensure your ads look
                                great on mobile devices.

                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#home-1-faq-item-7" aria-expanded="false" aria-controls="home-1-faq-item-7">
                            What are the benefits of using Pinterest Ads?
                        </button>
                        <div id="home-1-faq-item-7" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                The benefits of using Pinterest Ads include:
                                <ul>
                                    <li>Highly visual platform: Pinterest’s visual-centric nature makes it ideal for
                                        promoting products, services, and creative content.</li>
                                    <li>Increased brand awareness: Promoted pins are integrated seamlessly into users’
                                        feeds, allowing brands to increase visibility without being disruptive.</li>
                                    <li>Effective for driving purchases: Pinterest users often use the platform for
                                        product discovery and shopping inspiration, making it an effective platform for
                                        driving sales and conversions.</li>
                                    <li>Advanced targeting: Pinterest’s targeting options allow you to reach highly
                                        relevant audiences based on their interests, searches, and behaviours.</li>
                                    <li>Long-lasting exposure: Pins have a long shelf life on Pinterest, meaning your
                                        ads can continue to generate impressions and engagement long after publication.
                                    </li>


                                </ul>
                                Highly targeted: TikTok’s targeting options ensure you can reach a relevant audience,
                                helping you achieve your campaign goals effectively.

                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#home-1-faq-item-8" aria-expanded="false" aria-controls="home-1-faq-item-8">
                            How can I measure the success of my Pinterest Ads campaign?
                        </button>
                        <div id="home-1-faq-item-8" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                You can measure the success of your Pinterest Ads campaign by tracking the following key
                                performance metrics:
                                <ul>
                                    <li>Impressions: How many times is your ad shown to users?</li>
                                    <li>Engagement Rate: The percentage of people interacting with your ad, such as
                                        saving or clicking on the pin.</li>
                                    <li>Click-through Rate (CTR): The number of clicks your ad received compared to the
                                        number of impressions.</li>
                                    <li>Conversion Rate: The percentage of users who took a desired action, such as
                                        making a purchase or signing up for a newsletter.</li>
                                    <li>Cost per Click (CPC): The average cost you pay for each click on your ad.</li>


                                </ul>
                                Return on Ad Spend (ROAS): The revenue generated from your ad campaign is divided by the
                                total amount spent on ads.

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