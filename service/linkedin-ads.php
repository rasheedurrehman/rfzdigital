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
                #a6cee5 75%,
                #f6ef73 100%);

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
                <h2 class="mb-3 com-services">Connect with Professionals and Boost Your Business with<span
                        style="color:#1463FF; white-space:normal;">
                        our LinkedIn Ads Management Service
                    </span>
                </h2>
                <p class="mb-4 ">Expand your professional reach and generate quality leads with our LinkedIn Ads
                    services. We create targeted ad campaigns to connect your brand with decision-makers, industry
                    professionals, and potential clients on one of the world’s most influential business networks. Our
                    team optimises LinkedIn Ads for maximum impact, focusing on precise audience targeting based on job
                    titles, industries, and interests. We craft compelling ad creatives, set competitive bidding
                    strategies, and continuously monitor performance to ensure your campaigns deliver strong ROI.
                    Whether you aim to increase brand awareness, drive traffic to your website, or promote job listings,
                    our LinkedIn Ads services help you achieve measurable business results.
                </p>
                <a href="<?php echo BASE_URL; ?>contact-us" class="btn btn-primary">Get Started</a>
            </div>
            <!-- Right Column -->
            <div class="col-md-5 d-flex justify-content-center">
                <img src="./image/digitalservices/ga/Linkdin-Ads.webp" alt="Google Ads Management"
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
                            Reach Professionals, Drive Business Growth

                        </h2>
                        <p>
                            At RFZ Digital, we excel in LinkedIn Ads services that empower B2B brands to connect with
                            key decision-makers. Our expert team develops targeted campaigns that highlight your unique
                            value proposition, driving quality leads and enhancing brand awareness. By leveraging
                            LinkedIn’s powerful analytics and audience segmentation, RFZ Digital ensures your ads
                            achieve maximum impact, helping you grow your professional network and drive business
                            success.

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
                            Target the Right Audience and Increase Leads with Powerful LinkedIn Ads Campaigns
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
                            <h5>Boost Your B2B Marketing with Expert LinkedIn Ads Campaigns</h5>
                            <p>Our LinkedIn Ads services help you target decision-makers, drive lead generation, and
                                increase brand visibility with highly tailored campaigns on LinkedIn’s professional
                                network.</p>
                        </div>
                    </div>

                    <!-- Box 2 -->
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-page-custom-box">
                            <div class="feature-widget-2__icon">
                                <img src="./image/home-5/feature-2.png" alt="feature icon">
                            </div>
                            <!-- <div class="icon">🌐</div>  -->
                            <h5>Reach the Right Audience with LinkedIn Ads</h5>
                            <p>We create and optimise LinkedIn Ads campaigns to effectively reach professionals, driving
                                traffic to your business, generating quality leads, and enhancing brand authority in
                                your industry.</p>
                        </div>
                    </div>

                    <!-- Box 3 -->
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-page-custom-box">
                            <div class="feature-widget-2__icon">
                                <img src="./image/home-5/feature-3.png" alt="feature icon">
                            </div>
                            <!-- <div class="icon">💼</div>  -->
                            <h5>Maximise Lead Generation with LinkedIn Ads Marketing</h5>
                            <p>Our LinkedIn Ads strategies focus on increasing your reach to key industry leaders,
                                driving conversions and improving your B2B marketing efforts with targeted advertising
                                on LinkedIn.
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
                            What are LinkedIn Ads?
                        </button>
                        <div id="home-1-faq-item" class="accordion-collapse collapse show" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                LinkedIn Ads are paid advertisements displayed on LinkedIn, a professional networking
                                platform. These ads allow businesses to target users based on professional criteria,
                                such as industry, job title, company size, and other business-related factors. LinkedIn
                                Ads can help generate leads, increase brand awareness, drive website traffic, and
                                promote products or services to a highly targeted audience.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#home-1-faq-item-2" aria-expanded="false" aria-controls="home-1-faq-item-2">
                            How do LinkedIn Ads work?
                        </button>
                        <div id="home-1-faq-item-2" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                LinkedIn Ads operate on a bidding system where advertisers set a budget and bid on the
                                cost-per-click (CPC) or cost-per-impression (CPM). Ads are shown to LinkedIn users based
                                on your targeting preferences, which can include criteria such as industry, job title,
                                skills, education, and company size. Once your ad is live, LinkedIn uses machine
                                learning to optimise ad delivery to the right audience to achieve your campaign
                                objectives.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#home-1-faq-item-3" aria-expanded="false" aria-controls="home-1-faq-item-3">
                            How much do LinkedIn Ads cost?
                        </button>
                        <div id="home-1-faq-item-3" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                The cost of LinkedIn Ads can vary based on several factors, including the targeting
                                options you select, the competitiveness of your industry, and the bidding strategy. On
                                average, LinkedIn Ads tend to be more expensive than ads on other platforms like
                                Facebook or Instagram because the targeting is so specific. You can set a daily or total
                                campaign budget, and LinkedIn provides cost options for CPC, CPM, or cost per send (for
                                message ads). The actual cost depends on your ad placement competition and targeting
                                choices.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#home-1-faq-item-4" aria-expanded="false" aria-controls="home-1-faq-item-4">
                            What types of LinkedIn Ads are available?
                        </button>
                        <div id="home-1-faq-item-4" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                LinkedIn offers a variety of ad formats to suit different marketing goals, including:
                                <ul>
                                    <li>Sponsored Content: Native ads that appear in the LinkedIn feed as articles,
                                        images, or videos.</li>
                                    <li>Text Ads: Simple, small ads consisting of a headline, description, and optional
                                        image on the sidebar.</li>
                                    <li>Sponsored InMail: Personalised message ads sent directly to LinkedIn users’
                                        inboxes, with a CTA prompting action.</li>
                                    <li>Dynamic Ads: Ads that are personalised for each viewer, such as showing their
                                        profile picture to grab attention.</li>
                                    Carousel Ads: Ads with multiple images that users can swipe through, great for
                                    showcasing several products or features.
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#home-1-faq-item-5" aria-expanded="false" aria-controls="home-1-faq-item-5">
                            How can I target the right audience with LinkedIn Ads?
                        </button>
                        <div id="home-1-faq-item-5" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                LinkedIn offers robust targeting options to help you reach the most relevant
                                professional audience:
                                <ul>
                                    <li>Demographic Targeting: Job title, function, seniority, industry, and company
                                        size.</li>
                                    <li>Geographic Targeting: Target users based on their location, including country,
                                        region, or city.</li>
                                    <li>Interest Targeting: Focus on users with specific skills, professional interests,
                                        or groups they belong to.</li>
                                    <li>Company Targeting: You can target employees of specific companies or use company
                                        size and industry as targeting parameters.</li>

                                </ul>
                                Matched Audiences: Upload a list of contacts (e.g., emails) or retarget website visitors
                                using LinkedIn’s tracking pixel.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#home-1-faq-item-6" aria-expanded="false" aria-controls="home-1-faq-item-6">
                            How do I create an effective LinkedIn Ads campaign?
                        </button>
                        <div id="home-1-faq-item-6" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                To create a successful LinkedIn Ads campaign:
                                <ul>
                                    <li>Define clear objectives: Whether it’s lead generation, brand awareness, or
                                        website traffic, choose a specific goal.</li>
                                    <li>Target the right audience: Use LinkedIn’s advanced targeting options to reach
                                        professionals who will benefit from your service.</li>
                                    <li>Craft compelling ad copy: Write clear, concise copy that speaks to your
                                        audience’s needs and includes a strong call-to-action (CTA).</li>
                                    <li>Optimise visuals: Use high-quality images, videos, or carousel ads that resonate
                                        with a professional audience.</li>



                                </ul>
                                Set a realistic budget: Adjust your bidding strategy to ensure you stay within your
                                budget while reaching the desired audience.

                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#home-1-faq-item-7" aria-expanded="false" aria-controls="home-1-faq-item-7">
                            What are the benefits of using LinkedIn Ads?
                        </button>
                        <div id="home-1-faq-item-7" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                The benefits of using LinkedIn Ads include:
                                <ul>
                                    <li>Professional audience: LinkedIn’s user base consists primarily of professionals,
                                        which makes it ideal for B2B advertising.</li>
                                    <li>Advanced targeting: LinkedIn allows you to reach specific audiences based on job
                                        title, skills, company, industries, and more.</li>
                                    <li>Lead generation: LinkedIn is a powerful platform for collecting leads, mainly
                                        through Sponsored InMail and lead gen forms.</li>
                                    <li>Brand credibility: Ads on LinkedIn give your brand a more professional image,
                                        which can help build trust with other businesses.</li>


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