<?php
if ($_SERVER['REQUEST_URI'] === "/index" || $_SERVER['REQUEST_URI'] === "/index.php") {
    header("Location: /", true, 301);
    exit();
}
?>

<?php 
$meta_title = "Website Design & Digital Marketing Services UK - RFZ Digital";
$meta_description = "RFZ Digital offer a wide range of services in the UK & Ireland, including website design & development, SEO, Social Media Marketing, Graphic Design,and more";
include 'includes/header.php';

require 'rfzwebdb.php';

?>
<!-- ~~~~~~~~~~~~~~~~~~~~~~~~
     Hero Section
~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<style>
.hero-content {
    text-align: center;
    /* Center text horizontally */
}

.hero-title {
    line-height: 82px;
    font-size: 83px;
    letter-spacing: -5px;
    font-weight: 500;
    color: #1f1f1f;
    word-break: break-word;
    /* Allow breaking for long words */
}

@media (max-width: 600px) {


    .hero-section {
        background-image: url('./image/home-1/index-page-hero-image.webp');
        /* Update with your image path */
        background-size: cover;
        background-position: center;
        height: 120vh;
        /* Full viewport height */
        color: #333;
        /* Text color */
        position: relative;
        overflow: hidden;
        width: auto;
    }

    .hero-title {
        font-size: 39px;
        letter-spacing: -3px;
        line-height: 40px;
        font-weight: 700;
        color: #1f1f1f;
        word-break: break-word;
    }

    .content-set {
        padding-top: 90px;
    }

    .hero-subtitle {
        font-size: 17px;
        color: #555;
        margin: 0 auto;
        /* Center the text block */
        text-align: center !IMPORTANT;
        /* Align text inside the <p> tag */
        line-height: 1.6;
        padding-top: 10px;
        padding-top: 10px;
    }

}

@media (min-width: 768px) {

    .hero-section {
        background-image: url('./image/home-1/Header-Images-iPad.webp');
        /* Update with your image path */
        background-size: cover;
        background-position: center;
        /*height: 40vh; */
        color: #fff !IMPORTANT;
        ;
        /* Text color */
        position: relative;
        overflow: hidden;
        width: 100%;
    }

    .hero-title {
        font-size: 44px;
        letter-spacing: -3px;
        line-height: 50px;
        font-weight: 500;
        color: #1f1f1f;
        word-break: break-word;
    }

    .content-set {
        padding-top: 70px;

    }

    .hero-content {
        padding-bottom: 270px;
    }

    .hero-subtitle {
        font-size: 18px;
        color: #555;
        margin: 0 auto;
        /* Center the text block */
        text-align: center !IMPORTANT;
        /* Align text inside the <p> tag */
        line-height: 1.6;
        padding-top: 10px;
        flex: 0 0 auto;
        width: 95%;
    }
}

@media (min-width: 1400px) {
    .hero-section {
        background-image: url('./image/home-1/index-page-hero-image.webp');
        /* Update with your image path */
        background-size: cover;
        background-position: center;
        height: 120vh;
        /* Full viewport height */
        color: #333;
        /* Text color */
        position: relative;
        overflow: hidden;
        width: auto;
    }

    .hero-content {
        text-align: center;
        /* Center text horizontally */
    }

    .hero-title {
        line-height: 82px;
        font-size: 83px;
        letter-spacing: -5px;
        font-weight: 500;
        color: #1f1f1f;
        word-break: break-word;
        /* Allow breaking for long words */
    }

    .hero-subtitle {
        font-size: 18px;
        color: #000;
        margin: 0 auto;
        /* Center the text block */
        text-align: center !IMPORTANT;
        /* Align text inside the <p> tag */
        line-height: 1.6;
        flex: 0 0 auto;
        width: 84%;
    }
}

.hero-subtitle {
    font-size: 18px;
    color: #000;
    margin: 0 auto;
    /* Center the text block */
    text-align: center !IMPORTANT;
    /* Align text inside the <p> tag */
    line-height: 1.6;
}

.hero-button {
    background-color: #1463FF !important;
    color: #fff !important;
    padding: 0.75rem 1.5rem !important;
    font-size: 1rem !important;
    border: none !important;
    border-radius: 48px !important;
    text-transform: uppercase !important;
    font-weight: 500 !important;
    transition: background-color 0.5s, border 0.5s !important;
    margin-top: 20px !important;
}

.hero-button:hover {
    background-color: #fff !important;
    border: 1px solid #1463FF !important;
    color: #000 !important;
}

.content-set {
    padding-top: 120px;
}
</style>



<!-- Hero Section -->
<div class="hero-section d-flex align-items-start justify-content-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 content-set">
                <div class="hero-content">
                    <h1 class="hero-title">
                        Accelerate Your Digital Growth in the UK & Ireland
                    </h1>
                    <div class="row justify-content-center">
                        <p class="hero-subtitle col-12 col-md-9">
                            Unlock your business's full potential with our tailored digital marketing
                            solutions. We specialise in boosting your online visibility, attracting your ideal audience,
                            and driving measurable results that fuel long-term growth.
                        </p>
                    </div>
                    <a href="<?php echo BASE_URL; ?>contact-us" class="btn hero-button">Get Started</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ~~~~~~~~~~~~~~~~~~~~~~~~
    Hero Section End
~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

<!-- ~~~~~~~~~~~~~~~~~~~~~~~~
    Home 1 : Brand Section
~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<?php include 'includes/logo-slider.php';?>

<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Home 1  : Content Section 2
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
<div class="home-1_content-section-2 padding-bottom-120 index-section-3">
    <div class="container">
        <div class="row row--custom ">
            <div class="col-xl-5 col-lg-6 col-auto" data-aos-duration="1000" data-aos="fade-right">
                <div class="home-1_content-image-2 content-image--mobile-width">
                    <img src="./image/home-1/Home-Page-AboutUs.webp" alt="digital strategies & emerging ideas">
                    <!--<div class="home-1_content-image-2-shape">-->
                    <!--  <img src="./image/home-1/content-image-2-shape.svg" alt="alternative text">-->
                    <!--</div>-->
                </div>
            </div>
            <div class="offset-xl-0 col-xl-6 col-lg-6 col-md-11" data-aos-duration="1000" data-aos="fade-left">
                <div class="content">
                    <div class="content-text-block">
                        <h2 class="content-title heading-md text-black">
                            Discover the latest digital strategies &
                            emerging ideas for business growth
                        </h2>
                        <p>
                            Our brand tenders and marketing mixologists always serve up unique,
                            design-forward websites coded with todays modern technologies.
                        </p>
                    </div>
                    <div class="content-list-block">
                        <ul class="content-list">
                            <li class="content-list-item">
                                <img src="./image/icons/icon-check-blue.svg" alt="alternative text">
                                Reach new business opportunities or test your product ideas
                            </li>
                            <li class="content-list-item">
                                <img src="./image/icons/icon-check-blue.svg" alt="alternative text">
                                Automate your processes and get data-driven business insights
                            </li>
                            <li class="content-list-item">
                                <img src="./image/icons/icon-check-blue.svg" alt="alternative text">
                                Create lightweight, scalable, and easly accessible cloud solution
                            </li>
                        </ul>
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
                <div class="col-xxl-6 col-lg-7 col-md-9 col-sm-12 col-xs-11">
                    <div class="section-heading">
                        <h2
                            class="section-heading__title heading-md heading-md--general-sans text-l5-secondary section-3-heading">
                            Why Choose Our Digital Marketing &amp; Technology Services?</h2>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <!-- Box 1 -->
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="custom-box">
                        <div class="feature-widget-2__icon">
                            <img src="./image/home-1/icons/Innovative-Solution.svg" alt="Innovative Solution">
                        </div>

                        <h3>Innovative Solution</h3> <!-- Heading -->
                        <p>We provide creative digital marketing solutions that are designed to meet your unique
                            business needs and drive impactful results.</p>
                    </div>
                </div>

                <!-- Box 2 -->
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="custom-box">
                        <div class="feature-widget-2__icon">
                            <img src="./image/home-1/icons/Client-Centric-Approach.svg" alt="Client-Centric Approach">
                        </div>

                        <h3>Client-Centric Approach</h3> <!-- Heading -->
                        <p>Our client-centric approach focuses on understanding your business goals and delivering
                            customised strategies that drive success.</p>
                    </div>
                </div>

                <!-- Box 3 -->
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="custom-box">
                        <div class="feature-widget-2__icon">
                            <img src="./image/home-1/icons/Transparent-Pricing.svg" alt="Transparent Pricing">
                        </div>

                        <h3>Transparent Pricing</h3> <!-- Heading -->
                        <p>We offer clear, Transparent pricing with no hidden fees, so you always know what you're
                            paying for and can make informed decisions.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ~~~~~~~~~~~~~~~~~~~~~~~~
    Home 1 : social-apps Section
~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<style type="text/css">
/* Default styling: Hidden by default */
.social-logo-btn-mobile {
    display: none;
    /* Hidden by default */
}

/* Mobile-specific styling */
@media screen and (max-width: 600px) {

    /* Adjust the width as per your design */
    .social-logo-btn-mobile {
        display: flex;
        /* Show on mobile */
        justify-content: center;
        /* Center horizontally */
    }

    .social-logo-btn {
        display: none;
    }
}
</style>

<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Home 1  : Section 7 Social Apps logos Slider
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

<div class="home-6_topic-section section-padding-120">
    <div class="container">
        <div class="section-heading section-heading--row">
            <div
                class="row justify-content-center text-center text-lg-initial justify-content-lg-between social-icon-heading-button">
                <div class="col-xxl-8 col-xl-7 col-lg-8 col-md-9 ">
                    <h2 class="section-heading__title heading-md heading-md--general-sans text-l5-secondary">Elevate
                        your Business online presence with Digital & Technology Solutions</h2>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-4">
                    <div class="section-heading__button social-logo-btn">
                        <a href="<?php echo BASE_URL; ?>contact-us" class="btn-masco btn btn-primary btn-fill--up">
                            <span>Get Started Today!</span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="ticker-03_section">
            <div class="ticker-03_wrapper">
                <div class="ticker-03_content">
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Google.png" alt="Google">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Bing-Icon.png" alt="Bing">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/facebook.png" alt="facebook">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/instagram.png" alt="instagram">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/LinkdIN.png" alt="LinkdIn">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/photoshope.png" alt="photoshope">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/illustrator.png" alt="illustrator">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/React-Native.png" alt="React-Native">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Tiktok.png" alt="Tiktok">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Twitter.png" alt="Twitter">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/WordPress.png" alt="WordPress">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/slack.png" alt="slack">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/figma.png" alt="figma">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/snapchat.png" alt="Snapchat">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/shopify.png" alt="shopify">
                    </div>
                </div>
                <div class="ticker-03_content">
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Google.png" alt="Google">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Bing-Icon.png" alt="Bing">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/facebook.png" alt="facebook">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/instagram.png" alt="instagram">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/LinkdIN.png" alt="LinkdIn">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/photoshope.png" alt="photoshope">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/illustrator.png" alt="illustrator">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/React-Native.png" alt="React-Native">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Tiktok.png" alt="Tiktok">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Twitter.png" alt="Twitter">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/WordPress.png" alt="WordPress">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/slack.png" alt="slack">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/figma.png" alt="figma">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/snapchat.png" alt="Snapchat">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/shopify.png" alt="shopify">
                    </div>
                </div>
                <div class="ticker-03_content">
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Google.png" alt="Google">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Bing-Icon.png" alt="Bing">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/facebook.png" alt="facebook">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/instagram.png" alt="instagram">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/LinkdIN.png" alt="LinkdIn">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/photoshope.png" alt="photoshope">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/illustrator.png" alt="illustrator">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/React-Native.png" alt="React-Native">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Tiktok.png" alt="Tiktok">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Twitter.png" alt="Twitter">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/WordPress.png" alt="WordPress">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/slack.png" alt="slack">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/figma.png" alt="figma">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/snapchat.png" alt="Snapchat">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/shopify.png" alt="shopify">
                    </div>
                </div>
                <div class="ticker-03_content">
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Google.png" alt="Google">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Bing-Icon.png" alt="Bing">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/facebook.png" alt="facebook">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/instagram.png" alt="instagram">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/LinkdIN.png" alt="LinkdIn">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/photoshope.png" alt="photoshope">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/illustrator.png" alt="illustrator">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/React-Native.png" alt="React-Native">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Tiktok.png" alt="Tiktok">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Twitter.png" alt="Twitter">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/WordPress.png" alt="WordPress">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/slack.png" alt="slack">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/figma.png" alt="figma">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/snapchat.png" alt="Snapchat">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/shopify.png" alt="shopify">
                    </div>
                </div>
                <div class="ticker-03_content">
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Google.png" alt="Google">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Bing-Icon.png" alt="Bing">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/facebook.png" alt="facebook">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/instagram.png" alt="instagram">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/LinkdIN.png" alt="LinkdIn">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/photoshope.png" alt="photoshope">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/illustrator.png" alt="illustrator">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/React-Native.png" alt="React-Native">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Tiktok.png" alt="Tiktok">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Twitter.png" alt="Twitter">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/WordPress.png" alt="WordPress">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/slack.png" alt="slack">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/figma.png" alt="figma">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/snapchat.png" alt="Snapchat">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/shopify.png" alt="shopify">
                    </div>
                </div>
                <div class="ticker-03_content">
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Google.png" alt="Google">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Bing-Icon.png" alt="Bing">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/facebook.png" alt="facebook">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/instagram.png" alt="instagram">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/LinkdIN.png" alt="LinkdIn">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/photoshope.png" alt="photoshope">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/illustrator.png" alt="illustrator">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/React-Native.png" alt="React-Native">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Tiktok.png" alt="Tiktok">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Twitter.png" alt="Twitter">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/WordPress.png" alt="WordPress">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/slack.png" alt="slack">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/figma.png" alt="figma">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/snapchat.png" alt="Snapchat">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/shopify.png" alt="shopify">
                    </div>
                </div>
                <div class="ticker-03_content">
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Google.png" alt="Google">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Bing-Icon.png" alt="Bing">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/facebook.png" alt="facebook">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/instagram.png" alt="instagram">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/LinkdIN.png" alt="LinkdIn">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/photoshope.png" alt="photoshope">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/illustrator.png" alt="illustrator">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/React-Native.png" alt="React-Native">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Tiktok.png" alt="Tiktok">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Twitter.png" alt="Twitter">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/WordPress.png" alt="WordPress">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/slack.png" alt="slack">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/figma.png" alt="figma">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/snapchat.png" alt="Snapchat">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/shopify.png" alt="shopify">
                    </div>
                </div>
                <div class="ticker-03_content">
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Google.png" alt="Google">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Bing-Icon.png" alt="Bing">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/facebook.png" alt="facebook">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/instagram.png" alt="instagram">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/LinkdIN.png" alt="LinkdIn">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/photoshope.png" alt="photoshope">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/illustrator.png" alt="illustrator">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/React-Native.png" alt="React-Native">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Tiktok.png" alt="Tiktok">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Twitter.png" alt="Twitter">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/WordPress.png" alt="WordPress">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/slack.png" alt="slack">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/figma.png" alt="figma">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/snapchat.png" alt="Snapchat">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/shopify.png" alt="shopify">
                    </div>
                </div>
                <div class="ticker-03_content">
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Google.png" alt="Google">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Bing-Icon.png" alt="Bing">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/facebook.png" alt="facebook">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/instagram.png" alt="instagram">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/LinkdIN.png" alt="LinkdIn">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/photoshope.png" alt="photoshope">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/illustrator.png" alt="illustrator">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/React-Native.png" alt="React-Native">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Tiktok.png" alt="Tiktok">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Twitter.png" alt="Twitter">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/WordPress.png" alt="WordPress">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/slack.png" alt="slack">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/figma.png" alt="figma">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/snapchat.png" alt="Snapchat">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/shopify.png" alt="shopify">
                    </div>
                </div>
            </div>
            <div class="ticker-03_wrapper">
                <div class="ticker-03_content ticker-03_content--reverse">
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Google.png" alt="Google">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Bing-Icon.png" alt="Bing">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/facebook.png" alt="facebook">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/instagram.png" alt="instagram">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/LinkdIN.png" alt="LinkdIn">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/photoshope.png" alt="photoshope">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/illustrator.png" alt="illustrator">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/React-Native.png" alt="React-Native">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Tiktok.png" alt="Tiktok">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Twitter.png" alt="Twitter">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/WordPress.png" alt="WordPress">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/slack.png" alt="slack">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/figma.png" alt="figma">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/snapchat.png" alt="Snapchat">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/shopify.png" alt="shopify">
                    </div>
                </div>
                <div class="ticker-03_content ticker-03_content--reverse">
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Google.png" alt="Google">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Bing-Icon.png" alt="Bing">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/facebook.png" alt="facebook">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/instagram.png" alt="instagram">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/LinkdIN.png" alt="LinkdIn">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/photoshope.png" alt="photoshope">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/illustrator.png" alt="illustrator">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/React-Native.png" alt="React-Native">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Tiktok.png" alt="Tiktok">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Twitter.png" alt="Twitter">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/WordPress.png" alt="WordPress">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/slack.png" alt="slack">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/figma.png" alt="figma">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/snapchat.png" alt="Snapchat">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/shopify.png" alt="shopify">
                    </div>
                </div>
                <div class="ticker-03_content ticker-03_content--reverse">
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Google.png" alt="Google">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Bing-Icon.png" alt="Bing">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/facebook.png" alt="facebook">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/instagram.png" alt="instagram">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/LinkdIN.png" alt="LinkdIn">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/photoshope.png" alt="photoshope ">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/illustrator.png" alt="illustrator">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/React-Native.png" alt="React-Native">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Tiktok.png" alt="Tiktok">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Twitter.png" alt="Twitter">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/WordPress.png" alt="WordPress">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/slack.png" alt="slack">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/figma.png" alt="figma">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/snapchat.png" alt="Snapchat">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/shopify.png" alt="shopify">
                    </div>
                </div>
                <div class="ticker-03_content ticker-03_content--reverse">
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Google.png" alt="Google">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Bing-Icon.png" alt="Bing">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/facebook.png" alt="facebook">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/instagram.png" alt="instagram">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/LinkdIN.png" alt="LinkdIn">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/photoshope.png" alt="photoshope">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/illustrator.png" alt="illustrator">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/React-Native.png" alt="React-Native">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Tiktok.png" alt="Tiktok">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Twitter.png" alt="Twitter">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/WordPress.png" alt="WordPress">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/slack.png" alt="slack">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/figma.png" alt="figma">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/snapchat.png" alt="Snapchat">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/shopify.png" alt="shopify">
                    </div>
                </div>
                <div class="ticker-03_content ticker-03_content--reverse">
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Google.png" alt="Google">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Bing-Icon.png" alt="Bing">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/facebook.png" alt="facebook">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/instagram.png" alt="instagram">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/LinkdIN.png" alt="LinkdIn">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/photoshope.png" alt="photoshope">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/illustrator.png" alt="illustrator">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/React-Native.png" alt="React-Native">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Tiktok.png" alt="Tiktok">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Twitter.png" alt="Twitter">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/WordPress.png" alt="WordPress">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/slack.png" alt="slack">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/figma.png" alt="figma">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/snapchat.png" alt="Snapchat">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/shopify.png" alt="shopify">
                    </div>
                </div>
                <div class="ticker-03_content ticker-03_content--reverse">
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Google.png" alt="Google">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Bing-Icon.png" alt="Bing">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/facebook.png" alt="facebook">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/instagram.png" alt="instagram">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/LinkdIN.png" alt="LinkdIn">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/photoshope.png" alt="photoshope">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/illustrator.png" alt="illustrator">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/React-Native.png" alt="React-Native">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Tiktok.png" alt="Tiktok">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Twitter.png" alt="Twitter">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/WordPress.png" alt="WordPress">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/slack.png" alt="slack">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/figma.png" alt="figma">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/snapchat.png" alt="Snapchat">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/shopify.png" alt="shopify">
                    </div>
                </div>
                <div class="ticker-03_content ticker-03_content--reverse">
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Google.png" alt="Google">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Bing-Icon.png" alt="Bing">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/facebook.png" alt="facebook">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/instagram.png" alt="instagram">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/LinkdIN.png" alt="LinkdIn">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/photoshope.png" alt="photoshope">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/illustrator.png" alt="illustrator">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/React-Native.png" alt="React-Native">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Tiktok.png" alt="Tiktok">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Twitter.png" alt="Twitter">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/WordPress.png" alt="WordPress">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/slack.png" alt="slack">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/figma.png" alt="figma">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/snapchat.png" alt="Snapchat">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/shopify.png" alt="shopify">
                    </div>
                </div>
                <div class="ticker-03_content ticker-03_content--reverse">
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Google.png" alt="Google">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Bing-Icon.png" alt="Bing">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/facebook.png" alt="facebook">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/instagram.png" alt="instagram">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/LinkdIN.png" alt="LinkdIn">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/photoshope.png" alt="photoshope">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/illustrator.png" alt="illustrator">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/React-Native.png" alt="React-Native">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Tiktok.png" alt="Tiktok">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Twitter.png" alt="Twitter">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/WordPress.png" alt="WordPress">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/slack.png" alt="slack">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/figma.png" alt="figma">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/snapchat.png" alt="Snapchat">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/shopify.png" alt="shopify">
                    </div>
                </div>
                <div class="ticker-03_content ticker-03_content--reverse">
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Google.png" alt="Google">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Bing-Icon.png" alt="Bing">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/facebook.png" alt="facebook">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/instagram.png" alt="instagram">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/LinkdIN.png" alt="LinkdIn">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/photoshope.png" alt="photoshope">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/illustrator.png" alt="illustrator">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/React-Native.png" alt="React-Native">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Tiktok.png" alt="Tiktok">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/Twitter.png" alt="Twitter">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/new/WordPress.png" alt="WordPress">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/slack.png" alt="slack">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/figma.png" alt="figma">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/snapchat.png" alt="Snapchat">
                    </div>
                    <div class="ticker-item">
                        <img src="./image/brand-logo/shopify.png" alt="shopify">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="social-logo-btn-mobile center">
                <a href="<?php echo BASE_URL; ?>contact-us"
                    class="btn-masco btn-masco--header rounded-pill btn-fill--up">
                    <span>Get Started Today!</span></a>
            </div>
        </div>
    </div>
</div>



<!-- Services Section -->
<div class="home-1_service-section padding-bottom-120" id="feature">
    <div class="home-1_service-section-shape">
        <img src="./image/home-1/service-section-shape.svg" alt="image alt">
    </div>
    <div class="container">
        <div class="home-1_service-section-wrapper">
            <div class="row justify-content-center">
                <div class="col-xxl-6 col-xl-7 col-lg-8 col-md-9">
                    <div class="section-heading text-center">
                        <h2 class="section-heading__title heading-md text-black">All the digital services that are
                            convenient for you</h2>
                    </div>
                </div>
            </div>
            <div class="row gutter-y-default justify-content-center">
                <div class="col-xl-6 col-lg-6 col-md-10">
                    <a href="<?php echo BASE_URL; ?>website-design" class="service-card   hvr-fill"
                        data-aos-duration="1000" data-aos="fade-right">
                        <div class="service-card__icon">
                            <img src="./image/home-1/icons/service-icons/website-Design-&-DEVELOPMENT.png"
                                alt="Website Development & Design" class="inline-svg">
                        </div>
                        <div class="service-card__body">
                            <h3 class="service-card__title">Website Design and Development</h3>
                            <p>We design and develop websites that are user-friendly and developed to drive results for
                                your business.
                            </p>
                            <span class="service-card__link btn-link btn-arrow">Find out more</span>
                        </div>
                    </a>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-10">
                    <a href="<?php echo BASE_URL; ?>seo" class="service-card   hvr-fill" data-aos-duration="1000"
                        data-aos="fade-left">
                        <div class="service-card__icon">
                            <img src="./image/home-1/icons/service-icons/Seo.png" alt="Search Engine Optimisation"
                                class="inline-svg">
                        </div>
                        <div class="service-card__body">
                            <h3 class="service-card__title">Search Engine Optimisation</h3>
                            <p>We optimise your website to rank higher on search engines, driving more website traffic
                                to bring more sales.</p>
                            <span class="service-card__link btn-link btn-arrow">Find out more</span>
                        </div>
                    </a>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-10">
                    <a href="<?php echo BASE_URL; ?>social-media-marketing" class="service-card   hvr-fill"
                        data-aos-duration="1000" data-aos="fade-right">
                        <div class="service-card__icon">
                            <img src="./image/home-1/icons/service-icons/Social-Media.png" alt="Social Media Managment"
                                class="inline-svg">
                        </div>
                        <div class="service-card__body">
                            <h3 class="service-card__title">Social Media Management</h3>
                            <p>We manage your social media presence, creating engaging content that grows your business
                                and drives sales.</p>
                            <span class="service-card__link btn-link btn-arrow">Find out more</span>
                        </div>
                    </a>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-10">
                    <a href="<?php echo BASE_URL; ?>graphic-design" class="service-card   hvr-fill"
                        data-aos-duration="1000" data-aos="fade-left">
                        <div class="service-card__icon">
                            <img src="./image/home-1/icons/service-icons/Grahpic.png" alt="Grahpic Design"
                                class="inline-svg">
                        </div>
                        <div class="service-card__body">
                            <h3 class="service-card__title">Graphic Design</h3>
                            <p>Our team creates high-quality designs that enhance your business identity and drive more
                                conversions.</p>
                            <span class="service-card__link btn-link btn-arrow">Find out more</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>










<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Home 3  : Testimonial Section 
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
<!-- testimonialSection -->

<!-- testimonial us Section -->

<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Home 3  : Testimonial Section 
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
<div class="home-3_testimonial section-padding-120 testimonial-section section-padding-120" id="testimonial">
    <div class="container">
        <!-- Section Title -->
        <div class="section-heading section-heading--row">
            <div class="row text-center text-lg-initial justify-content-center justify-content-lg-between">
                <div class="col-xxl-9 col-lg-7 col-md-9 col-11">
                    <h2 class="section-heading__title testimonial-heading-md text-black reviews-heading">Join Our Happy
                        Clients – Let’s Elevate Your Business!</h2>
                </div>
                <div class="col-xl-3 col-md-4">
                    <div class="section-heading__button testimonial-btn">
                        <a href="<?php echo BASE_URL; ?>contact-us"
                            class="btn-masco btn-primary-l03 btn-shadow rounded-pill">
                            <span>Contact Our Experts!</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="continer">
        <!-- Testimonial Slider -->
        <div class="testimonial-slider">
            <!-- Slider Row 1 (Moves Left) -->
            <div class="slider-wrapper slider-left">
                <div class="testimonial-card">
                    <h3 class="testimonial-card__title">Exceeds Expectations! 💪🏼</h3>
                    <p>
                        The comprehensive services have been a blessing for my brand. They handled everything – web
                        development, SEO, graphics, and social media – with perfection. Truly my best business partner!
                    </p>
                    <div class="testimonial-card__author d-flex justify-content-between align-items-center">
                        <!-- Left: User Image and Name -->
                        <div class="d-flex align-items-center gap-1">
                            <div class="testimonial-card__author-image">
                                <img src="./image/home-1/Dianne Russell-Testimonial2.webp" alt="Dianne Russell" />
                            </div>
                            <h4 class="testimonial-card__author-name mb-0">Dianne Russell</h4>
                        </div>
                        <!-- Right: Star Icon -->
                        <img src="./image/icons/star-five.svg" class="testimonial-card__star" alt="star" />
                    </div>
                </div>
                <div class="testimonial-card">
                    <h3 class="testimonial-card__title">Stunning Graphic Design Work! 🎨</h3>
                    <p>
                        I’m thrilled with the graphics designed for my brand! Their creativity and professionalism are
                        unmatched. They perfectly captured my vision, enhancing my brand identity. Highly recommend
                        them!
                    </p>
                    <div class="testimonial-card__author d-flex justify-content-between align-items-center">
                        <!-- Left: User Image and Name -->
                        <div class="d-flex align-items-center gap-1">
                            <div class="testimonial-card__author-image">
                                <img src="./image/home-1/Guy Hawkins-Testimonial6.webp" alt="Guy Hawkins" />
                            </div>
                            <h4 class="testimonial-card__author-name mb-0">Guy Hawkins</h4>
                        </div>
                        <!-- Right: Star Icon -->
                        <img src="./image/icons/star-five.svg" class="testimonial-card__star" alt="star" />
                    </div>
                </div>
                <div class="testimonial-card">
                    <h3 class="testimonial-card__title">Social Media That Delivers! 📱</h3>
                    <p>
                        The social media services were transformative. From strategy to execution, their campaigns
                        boosted my engagement and followers quickly. I’m so impressed with the results delivered by
                        their team!
                    </p>
                    <div class="testimonial-card__author d-flex justify-content-between align-items-center">
                        <!-- Left: User Image and Name -->
                        <div class="d-flex align-items-center gap-1">
                            <div class="testimonial-card__author-image">
                                <img src="./image/home-1/Marvin McKinney-Testimonial3.webp" alt="Marvin McKinney" />
                            </div>
                            <h4 class="testimonial-card__author-name mb-0">Marvin McKinney</h4>
                        </div>
                        <!-- Right: Star Icon -->
                        <img src="./image/icons/star-five.svg" class="testimonial-card__star" alt="star" />
                    </div>
                </div>
                <div class="testimonial-card">
                    <h3 class="testimonial-card__title">SEO That Truly Works! 🚀</h3>
                    <p>
                        Thanks to their SEO, my website’s traffic has soared! Their tailored strategies for my niche
                        worked wonders, and I’m now outranking my competition on major search engines. Amazing results!
                    </p>
                    <div class="testimonial-card__author d-flex justify-content-between align-items-center">
                        <!-- Left: User Image and Name -->
                        <div class="d-flex align-items-center gap-1">
                            <div class="testimonial-card__author-image">
                                <img src="./image/home-1/Ronald Richards-Testimonial1.webp" alt="Ronald Richards" />
                            </div>
                            <h4 class="testimonial-card__author-name mb-0">Ronald Richards</h4>
                        </div>
                        <!-- Right: Star Icon -->
                        <img src="./image/icons/star-five.svg" class="testimonial-card__star" alt="star" />
                    </div>
                </div>
                <div class="testimonial-card">
                    <h3 class="testimonial-card__title">Outstanding Web Development Support!</h3>
                    <p>
                        The web development team revamped my outdated site into a sleek, modern, and user-friendly
                        platform. The attention to detail and responsiveness were incredible. I highly recommend their
                        expertise!
                    </p>
                    <div class="testimonial-card__author d-flex justify-content-between align-items-center">
                        <!-- Left: User Image and Name -->
                        <div class="d-flex align-items-center gap-1">
                            <div class="testimonial-card__author-image">
                                <img src="./image/home-1/Kristin Watson-Testimonial5.webp" alt="Kristin Watson" />
                            </div>
                            <h4 class="testimonial-card__author-name mb-0">Kristin Watson</h4>
                        </div>
                        <!-- Right: Star Icon -->
                        <img src="./image/icons/star-five.svg" class="testimonial-card__star" alt="star" />
                    </div>
                </div>
                <div class="testimonial-card">
                    <h3 class="testimonial-card__title">Everything You Need in One Place! 💼</h3>
                    <p>
                        This all-in-one service is amazing! From development to marketing, their team excels. My
                        business has grown steadily, thanks to their expertise in every area they’ve handled. Great
                        work!
                    </p>
                    <div class="testimonial-card__author d-flex justify-content-between align-items-center">
                        <!-- Left: User Image and Name -->
                        <div class="d-flex align-items-center gap-1">
                            <div class="testimonial-card__author-image">
                                <img src="./image/home-1/Karen Lynn-Testimonial1.webp" alt="Karen Lynn" />
                            </div>
                            <h4 class="testimonial-card__author-name mb-0">Karen Lynn</h4>
                        </div>
                        <!-- Right: Star Icon -->
                        <img src="./image/icons/star-five.svg" class="testimonial-card__star" alt="star" />
                    </div>
                </div>



                <!-- Additional Cards Here -->
            </div>

            <!-- Slider Row 2 (Moves Right) -->
            <div class="slider-wrapper slider-right" style="margin-top: 30px;">
                <div class="testimonial-card">
                    <h3 class="testimonial-card__title">Exceptional SEO Services! 🌟</h3>
                    <p>
                        The SEO work made my site visible to the right audience. The boost in inquiries is incredible!
                        Their attention to detail and expertise made all the difference. I’m so grateful!
                    </p>
                    <div class="testimonial-card__author d-flex justify-content-between align-items-center">
                        <!-- Left: User Image and Name -->
                        <div class="d-flex align-items-center gap-1">
                            <div class="testimonial-card__author-image">
                                <img src="./image/home-1/Sophia-Carter-Testimonial7.webp" alt="Sophia Carter" />
                            </div>
                            <h4 class="testimonial-card__author-name mb-0">Sophia Carter</h4>
                        </div>
                        <!-- Right: Star Icon -->
                        <img src="./image/icons/star-five.svg" class="testimonial-card__star" alt="star" />
                    </div>
                </div>
                <div class="testimonial-card">
                    <h3 class="testimonial-card__title">Graphics That Inspire! 🖌️</h3>
                    <p>
                        The graphic designs exceeded my expectations. They created visuals that perfectly match my
                        vision. I’ve received so much praise from clients for the branding updates. Amazing work
                        overall!
                    </p>
                    <div class="testimonial-card__author d-flex justify-content-between align-items-center">
                        <!-- Left: User Image and Name -->
                        <div class="d-flex align-items-center gap-1">
                            <div class="testimonial-card__author-image">
                                <img src="./image/home-1/Testimonial8.webp" alt="Ethan Walker" />
                            </div>
                            <h4 class="testimonial-card__author-name mb-0">Ethan Walker</h4>
                        </div>
                        <!-- Right: Star Icon -->
                        <img src="./image/icons/star-five.svg" class="testimonial-card__star" alt="star" />
                    </div>
                </div>
                <div class="testimonial-card">
                    <h3 class="testimonial-card__title">Social Media Pros! 💻</h3>
                    <p>
                        Their social media team is outstanding. They created beautiful campaigns that match my brand and
                        drove engagement like never before. My following has grown, and so has my business!
                    </p>
                    <div class="testimonial-card__author d-flex justify-content-between align-items-center">
                        <!-- Left: User Image and Name -->
                        <div class="d-flex align-items-center gap-1">
                            <div class="testimonial-card__author-image">
                                <img src="./image/home-1/Testimonial9.webp" alt="Isabella Martinez" />
                            </div>
                            <h4 class="testimonial-card__author-name mb-0">Isabella Martinez</h4>
                        </div>
                        <!-- Right: Star Icon -->
                        <img src="./image/icons/star-five.svg" class="testimonial-card__star" alt="star" />
                    </div>
                </div>
                <div class="testimonial-card">
                    <h3 class="testimonial-card__title">Stunning Website Results! 🌐</h3>
                    <p>
                        Their web development team amazed me with their skills. My website is now fast, stunning, and
                        functional. They brought my ideas to life with professionalism and care. Great job!
                    </p>
                    <div class="testimonial-card__author d-flex justify-content-between align-items-center">
                        <!-- Left: User Image and Name -->
                        <div class="d-flex align-items-center gap-1">
                            <div class="testimonial-card__author-image">
                                <img src="./image/home-1/Testimonial10.webp" alt="Matthew Robinson" />
                            </div>
                            <h4 class="testimonial-card__author-name mb-0">Matthew Robinson</h4>
                        </div>
                        <!-- Right: Star Icon -->
                        <img src="./image/icons/star-five.svg" class="testimonial-card__star" alt="star" />
                    </div>
                </div>
                <div class="testimonial-card">
                    <h3 class="testimonial-card__title">SEO Boost Like Magic! 🎯</h3>
                    <p>
                        Their SEO service made a huge difference! My website now ranks higher than ever, and I’ve seen
                        real results in terms of traffic and sales. Their strategies are spot-on!
                    </p>
                    <div class="testimonial-card__author d-flex justify-content-between align-items-center">
                        <!-- Left: User Image and Name -->
                        <div class="d-flex align-items-center gap-1">
                            <div class="testimonial-card__author-image">
                                <img src="./image/home-1/Testimonial11.webp" alt="Olivia Hernandez" />
                            </div>
                            <h4 class="testimonial-card__author-name mb-0">Olivia Hernandez</h4>
                        </div>
                        <!-- Right: Star Icon -->
                        <img src="./image/icons/star-five.svg" class="testimonial-card__star" alt="star" />
                    </div>
                </div>
                <div class="testimonial-card">
                    <h3 class="testimonial-card__title">All-In-One Expertise! 🔥</h3>
                    <p>
                        Their team excels in everything from websites to graphics. They made my online presence much
                        stronger, and I can’t thank them enough for their expertise and dedication. Highly recommended!
                    </p>
                    <div class="testimonial-card__author d-flex justify-content-between align-items-center">
                        <!-- Left: User Image and Name -->
                        <div class="d-flex align-items-center gap-1">
                            <div class="testimonial-card__author-image">
                                <img src="./image/home-1/Testimonial12.webp" alt="Liam Harris" />
                            </div>
                            <h4 class="testimonial-card__author-name mb-0">Liam Harris</h4>
                        </div>
                        <!-- Right: Star Icon -->
                        <img src="./image/icons/star-five.svg" class="testimonial-card__star" alt="star" />
                    </div>
                </div>




                <!-- Additional Cards Here -->
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const sliders = document.querySelectorAll(".slider-wrapper");

    sliders.forEach((slider) => {
        const slides = slider.innerHTML; // Duplicate slider content
        slider.innerHTML += slides;
    });
});
</script>



<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Home 1  : Section 7 Social Apps logos Slider
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->


<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Home 1  : Content Section 1
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
<div class="home-1_content-section-1 section-padding-120" id="about">
    <div class="container">
        <div class="row row--custom change-order">
            <div class="offset-xl-1 col-lg-5 col-auto" data-aos-duration="1000" data-aos="fade-left">
                <div class="home-1_content-image-1 content-image--mobile-width">
                    <img src="./image/home-1/Home-page-last-image.webp" alt="digital marketing experts">
                    <!--<div class="home-1_content-image-1-shape">-->
                    <!--  <img src="./image/home-1/content-image-1-shape.svg" alt="alternative text">-->
                    <!--</div>-->
                </div>
            </div>
            <div class="col-xl-6 col-lg-7 col-md-10 col-auto" data-aos-duration="1000" data-aos="fade-right">
                <div class="content">
                    <div class="content-text-block">
                        <h2 class="content-title heading-md text-black faq-above-section">
                            Experts in Digital Marketing for Sustainable Business Growth
                        </h2>
                        <p>
                            Our team of digital marketing experts is dedicated to helping your business grow steadily.
                            We focus on creating customised strategies that enhance your online presence, drive quality
                            traffic, and ensure long-term results for your business.
                        </p>
                        <p>
                            <a href="<?php echo BASE_URL; ?>contact-us"
                                class="btn-masco btn-masco--header rounded-pill btn-fill--up">
                                <span>Contact Us</span></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




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
                    <h2 class="section-heading__title heading-md text-black">Frequently asked questions about our
                        digital agency</h2>
                </div>
            </div>
        </div>
        <div class="row row--custom">
            <div class="col-lg-10">
                <div class="accordion-style-1" id="home-1-faq">
                    <div class="accordion-item">
                        <button class="accordion-button " type="button" data-bs-toggle="collapse"
                            data-bs-target="#home-1-faq-item" aria-expanded="true" aria-controls="home-1-faq-item">
                            What digital marketing services do you offer?
                        </button>
                        <div id="home-1-faq-item" class="accordion-collapse collapse show" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                We offer a wide range of services, including website design and development, search
                                engine optimisation (SEO), social media management, graphic design, pay-per-click (PPC)
                                advertising, email marketing, content creation, and more.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#home-1-faq-item-2" aria-expanded="false" aria-controls="home-1-faq-item-2">
                            How can digital marketing help my business?
                        </button>
                        <div id="home-1-faq-item-2" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                Digital marketing helps your business reach a larger audience, engage with potential
                                customers, and drive more traffic to your website, ultimately increasing your sales and
                                revenue.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#home-1-faq-item-3" aria-expanded="false" aria-controls="home-1-faq-item-3">
                            How do you customise your services to my business needs?
                        </button>
                        <div id="home-1-faq-item-3" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                We start by understanding your unique goals, target audience, and challenges. From
                                there, we create customised strategies to ensure your digital marketing efforts are
                                aligned with your objectives and deliver the best possible results.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#home-1-faq-item-4" aria-expanded="false" aria-controls="home-1-faq-item-4">
                            How long does it take to see results from digital marketing?
                        </button>
                        <div id="home-1-faq-item-4" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                Results vary depending on the service and your specific goals. For SEO, it can take 1 ~
                                3 Months to see significant changes, while paid ads or social media campaigns can show
                                quicker results. We always provide clear expectations and measurable goals.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#home-1-faq-item-5" aria-expanded="false" aria-controls="home-1-faq-item-5">
                            How much does digital marketing cost?
                        </button>
                        <div id="home-1-faq-item-5" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                Pricing varies based on the services you need and the scale of your project. We offer
                                transparent pricing with no hidden fees, and we'll work with you to create a plan that
                                fits your budget and goals.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#home-1-faq-item-6" aria-expanded="false" aria-controls="home-1-faq-item-6">
                            How will I know if my marketing efforts are working?
                        </button>
                        <div id="home-1-faq-item-6" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                            <div class="accordion-item__body">
                                We provide detailed analytics and regular reports to track the performance of your
                                campaigns. You'll have clear insights into key metrics, such as traffic, conversions,
                                and engagement, to evaluate success and make informed decisions.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--<div class="section-button faqs-button">-->
        <!--  <a href="#" class="btn-masco rounded-pill btn-fill--up"><span>Still, have any questions? Contact us</span></a>-->
        <!--</div>-->
    </div>
</div>


<!-- Contact Us Section -->
<?php include 'includes/contact-us-section.php'; ?>
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
                <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-10 col-12">
                    <div class="cta-text-block">
                        <h2 class="heading-md heading-md--general-sans text-l5-secondary">Get in Touch for Expert
                            Digital & Technology Solutions Today</h2>
                    </div>
                </div>
                <div class="col-xl-auto col-lg-3 col-md-5 col-xs-8 col-12">
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