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
                #bfcbf9 75%,
                #4d6eec 100%);

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
                <h6 class="text-uppercase" style="color: #EC7D63;">Google Ads Management</h6>
                <h2 class="mb-3 com-services">Expand Your Reach and Engagement with our<span
                        style="color:#1463FF; white-space:normal;">
                        Targeted Meta Ads Solutions
                    </span>
                </h2>
                <p class="mb-4 ">Unlock the power of social advertising with our expert Meta Ads services, designed to
                    drive targeted traffic and engagement on Facebook, Instagram, and the wider Meta network. Our team
                    crafts customised ad campaigns, optimising audience targeting, ad creatives, and bidding strategies
                    to ensure your brand reaches the right people at the right time. We use advanced analytics and A/B
                    testing to refine campaigns, maximise conversions, and achieve measurable results. Whether you’re
                    looking to increase brand awareness, drive website traffic, or boost sales, our Meta Ads services
                    help you tap into the vast potential of social media advertising, delivering strong ROI and business
                    growth.
                </p>
                <a href="<?php echo BASE_URL; ?>contact-us" class="btn btn-primary">Get Started</a>
            </div>
            <!-- Right Column -->
            <div class="col-md-5 d-flex justify-content-center">
                <img src="./image/digitalservices/ga/Meta-Ads.webp" alt="Google Ads Management"
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
                            Engage Audiences, Boost Impact

                        </h2>
                        <p>
                            At RFZ Digital, we provide expert Meta Ads services that enhance your brand’s visibility
                            across platforms like Facebook and Instagram. Our dedicated team develops compelling ad
                            campaigns that resonate with your target audience, driving engagement and conversions. By
                            utilising data insights and continuous optimisation, RFZ Digital ensures your Meta Ads not
                            only reach the right audiences but also deliver impactful results for your business.

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
                            Boost Your Brand Visibility and Drive Conversions with Effective Meta Ads Campaigns
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
                            <h5>Reach Your Audience with Expert Meta Ads Campaigns</h5>
                            <p>Our Meta Ads services help you target specific demographics on Facebook and Instagram,
                                increasing brand awareness, driving engagement, and boosting conversions through highly
                                effective ad strategies.
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
                            <h5>Drive Targeted Traffic with Meta Ads Marketing</h5>
                            <p>We create and optimise Meta Ads campaigns to increase your reach and engagement, driving
                                more traffic to your website and generating high-quality leads through strategic
                                Facebook and Instagram ad.</p>
                        </div>
                    </div>

                    <!-- Box 3 -->
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-page-custom-box">
                            <div class="feature-widget-2__icon">
                                <img src="./image/home-5/feature-3.png" alt="feature icon">
                            </div>
                            <!-- <div class="icon">💼</div>  -->
                            <h5>Maximise Your ROI with Effective Meta Ads Management</h5>
                            <p>Our Meta Ads services focus on delivering measurable results, helping your business grow
                                through optimised campaigns, precise targeting, and powerful ad creatives on Facebook
                                and Instagram.
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
                            What are Meta Ads?
                        </button>
                        <div id="home-1-faq-item" class="accordion-collapse collapse show" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                Meta Ads refer to the advertising platform Meta (formerly Facebook) provided, which
                                includes Facebook, Instagram, Messenger, and other Meta-owned platforms. These ads can
                                be in various formats, such as images, videos, carousels, slideshow, and more, targeting
                                specific audiences based on demographics, interests, behaviour, and location.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#home-1-faq-item-2" aria-expanded="false" aria-controls="home-1-faq-item-2">
                            How do Meta Ads work?
                        </button>
                        <div id="home-1-faq-item-2" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                Meta Ads work through a bidding system where advertisers set a budget and bid on ad
                                placements. Ads are shown to users based on targeting criteria such as age, location,
                                interests, and behaviour. Depending on their marketing goals, advertisers can choose
                                between different objectives, like brand awareness, lead generation, website traffic, or
                                conversions. Meta then uses machine learning to optimise your ad delivery to the most
                                relevant audience.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#home-1-faq-item-3" aria-expanded="false" aria-controls="home-1-faq-item-3">
                            How much do Meta Ads cost?
                        </button>
                        <div id="home-1-faq-item-3" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                The cost of Meta Ads depends on several factors, including the competition for your
                                target audience, the type of ad campaign, and the ad’s relevance. Meta Ads typically
                                operate on a cost-per-click (CPC) or cost-per-impression (CPM) basis. You can set a
                                daily or lifetime budget to control costs, and the price will fluctuate depending on
                                bidding strategies, target audience, and campaign performance.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#home-1-faq-item-4" aria-expanded="false" aria-controls="home-1-faq-item-4">
                            What is the difference between Facebook Ads and Instagram Ads?
                        </button>
                        <div id="home-1-faq-item-4" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                Facebook Ads and Instagram Ads are part of the same Meta Ads platform, and both work
                                similarly. The main difference lies in the type of audience and format:
                                <ul>
                                    <li>Facebook Ads: Tend to reach an older demographic with a broader mix of
                                        interests. Facebook offers more variety in ad formats, such as carousel,
                                        slideshow, and lead generation ads.</li>
                                    <li>Instagram Ads: Primarily targeted to a younger, visual-focused audience.
                                        Instagram ads often focus on images or video content, appearing in the feed,
                                        stories, or explore sections.</li>
                                    <li>Both platforms allow advertisers to manage campaigns using the same Meta Ads
                                        Manager.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#home-1-faq-item-5" aria-expanded="false" aria-controls="home-1-faq-item-5">
                            What types of ads can I create on Meta platforms?
                        </button>
                        <div id="home-1-faq-item-5" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                Meta Ads offers various ad formats, such as:
                                <ul>
                                    <li>Image Ads: Simple, single-image ads with a clear message.</li>
                                    <li>Video Ads: Engaging content that can appear in the feed, stories, or reels.</li>
                                    <li>Carousel Ads: Multiple images or videos in one ad, allowing users to swipe
                                        through different products or messages.</li>
                                    <li>Slideshow Ads: A lightweight video ad made from a series of images, ideal for
                                        slow internet connections.</li>
                                    <li>Collection Ads: Showcase a group of products, making it easy for users to browse
                                        and purchase directly.</li>
                                    <li>Lead Generation Ads: Ads designed to collect contact details (e.g., name, email)
                                        directly from the ad without users leaving the platform.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#home-1-faq-item-6" aria-expanded="false" aria-controls="home-1-faq-item-6">
                            How can I measure the success of my Meta Ads campaign?
                        </button>
                        <div id="home-1-faq-item-6" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                To measure the success of your Meta Ads campaign, track key performance metrics in Meta
                                Ads Manager:
                                <ul>
                                    <li>Click-through Rate (CTR): The percentage of people who clicked on your ad after
                                        seeing it.</li>
                                    <li>Conversion Rate: The percentage of users who took a desired action (e.g., making
                                        a purchase or signing up for a newsletter) after clicking the ad.</li>
                                    <li>Cost per Conversion: The amount spent on ads divided by the number of
                                        conversions.</li>
                                    <li>Return on Ad Spend (ROAS): The revenue generated from your ad campaign compared
                                        to the amount spent.</li>
                                    <li>Impressions and Reach: Track how many people saw your ad and how often.
                                        Regularly monitoring these metrics can optimise your campaign to achieve better
                                        results.</li>


                                </ul>

                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#home-1-faq-item-7" aria-expanded="false" aria-controls="home-1-faq-item-7">
                            How can I measure the success of my Google Ads campaigns?
                        </button>
                        <div id="home-1-faq-item-7" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                To measure the success of your Google Ads campaigns, track key performance metrics such
                                as:
                                <ul>
                                    <li>Click-Through Rate (CTR): The percentage of people who clicked on your ad
                                        compared to the number of times it was shown.</li>
                                    <li>Conversion Rate: The percentage of users who complete a desired action (e.g.,
                                        purchasing and signing up for a newsletter) after clicking your ad.</li>
                                    <li>Cost per Click (CPC): The amount you pay each time someone clicks your ad.</li>
                                    <li>Return on Ad Spend (ROAS): The revenue generated from your ads compared to the
                                        cost of the ads. Google Ads also integrates with Google Analytics for deeper
                                        insights into user behaviour and conversions.</li>


                                </ul>

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