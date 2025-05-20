


<?php 
$noindex = true;
include 'includes/header.php';

require 'rfzwebdb.php';

?>
<style>
  .new-section {
    position: relative;
    overflow: hidden;
    padding: 120px 0; /* Adds vertical spacing */
    
  }
@media (min-width: 1200px) {
    .new-section{
        height: 120vh;
    }
}
  .new-section .background-container {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 0;
  }

  .new-section .background-container img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .new-section .content {
    position: relative;
    z-index: 1;
    color: white;
    text-align: center;
  }

  .new-section .content h2 {
    font-size: 2rem;
    margin-bottom: 1rem;
  }

  .new-section .content p {
    font-size: 1rem;
    margin-bottom: 1.5rem;
  }

  .new-section .btn {
    background-color: #007bff;
    border: none;
    padding: 0.75rem 1.5rem;
    border-radius: 50px;
    color: white;
    font-size: 1rem;
    text-transform: uppercase;
    transition: background-color 0.3s;
  }

  .new-section .btn:hover {
    background-color: #0056b3;
  }
</style>

<div class="new-section" id="new-section">
  <div class="background-container">
    <img src="./image/home-1/Header-Images-1920-1150-new.webp" alt="Background Image" class="img-fluid">
  </div>
  <div class="container d-flex justify-content-center align-items-center">
    <div class="col-10 content">
      <h2>Discover the Power of Seamless Integration</h2>
      <p>
        Unlock new possibilities with innovative solutions tailored to meet your needs.
        Our team is here to provide exceptional support and expertise.
      </p>
      <a href="<?php echo BASE_URL; ?>services" class="btn">Explore Services</a>
    </div>
  </div>
</div>













<style >
   .home-1_content-section-1 {
  position: relative;
  overflow: hidden; /* Ensures the background container doesn't overflow */
}

.background-container {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 0; /* Sends the background container behind the content */
}

.background-container img {
  width: 100%;
  height: 100%;
  object-fit: cover; /* Ensures the image covers the section neatly */
}

.container {
  position: relative;
  z-index: 1; /* Keeps the content above the background */
}
 
    
</style>
<div class="home-1_content-section-1 section-padding-120" id="about">
  <div class="background-container">
    <img src="./image/home-1/Home-Hero-Image.webp" alt="Hero Image" class="img-fluid">
  </div>
  <div class="container">
    <div class="row row--custom">
      <div class="offset-xl-1 col-lg-5 col-auto" data-aos-duration="1000" data-aos="fade-left">
        <div class="home-1_content-image-1 content-image--mobile-width">
          <img src="./image/home-1/Section-Three.webp" alt="alternative text">
          <div class="home-1_content-image-1-shape">
            <img src="./image/home-1/content-image-1-shape.svg" alt="alternative text">
          </div>
        </div>
      </div>
      <div class="col-xl-6 col-lg-7 col-md-10 col-auto" data-aos-duration="1000" data-aos="fade-right">
        <div class="content">
          <div class="content-text-block">
            <h2 class="content-title heading-md text-black">
              Boost the effectiveness of your promotions as
              well as polish your branding
            </h2>
            <p>
              SINCE 1998, we transform bold business ideas into exceptional digital
              products. We ideate, design, and develop data-driven digital products
              made to answer business challenges.
            </p>
            <p>
              We offer 360° services to smoothly guide you on your way to creating a
              seamless digital masterpiece projects on budget and on time.
            </p>
            <p>
              <a href="<?php echo BASE_URL; ?>contact-us" class="btn-masco btn-masco--header rounded-pill btn-fill--up">
                <span>Contact Us</span></a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


 <!--~~~~~~~~~~~~~~~~~~~~~~~~
     navbar-
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

    <style type="text/css">
      /* Default: Hide the contact form */
.contact_form-row {
  display: none;
}

/* Mobile and Tablet: Show form after the heading */
@media (max-width: 991px) {
  .contact_form-row {
    display: flex;
    justify-content: center;
    margin-top: 5px;

  }

  .home-1_hero-content {
    order: -1; /* Ensure the heading appears first */
  }
  .home-1_hero-image, .home-1_hero-newsletter{
    display: none;
  }
}

/* Hide contact form on desktop */
@media (min-width: 992px) {
  .contact_form-row {
    display: none;
  }
}
.mobile-form-heading{
    font-weight: 600;
    text-align:center;
}
/* Make form fields full-width */
  .form-box-style__form-input input,
  .form-box-style__form-input textarea {
    width: 100%; /* Full width */
    box-sizing: border-box; /* Include padding and border in width calculation */
  }
  
  .form-box-style__form-wrapper {
    padding: 20px 20px 20px 20px;
}
@media (max-width: 600px) {
  .contact_form-row {
    display: flex;
    justify-content: center;
    margin-top: 5px;

  }
}
    </style>
<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Home 1  : Hero Section 
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
<div class="home-1_hero-section" id="hero">
  <div class="home-1_hero-shape-1">
    <img src="./image/home-1/hero-shape-1.svg" alt="image alt">
  </div>
  <div class="home-1_hero-shape-2">
    <img src="./image/home-1/hero-shape-2.svg" alt="image alt">
  </div>
  <div class="container">
    <div class="row row--hero-content change-order">
      <div class="col-xxl-auto col-lg-6 col-md-7 col-sm-8 col-10" data-aos-duration="1000" data-aos="fade-left" data-aos-delay="300">
        <div class="home-1_hero-image-block">
          <div class="home-1_hero-image">
            <img src="./image/home-1/Home-Hero-Image.webp" alt="hero image">
          </div>
        </div>
      </div>
      <div class="col-xxl-auto col-lg-6 col-md-10" data-aos-duration="1000" data-aos="fade-right" data-aos-delay="300">
        <div class="home-1_hero-content">
          <div class="home-1_hero-content-text">
            <!--<h1 class="hero-content__title heading-xxl ">-->
            <!--  Digital Growth for Business across the <span class="country-background">UK & Ireland</span>-->
            <!--</h1>-->
             <h1 class="hero-content__title heading-xxl">
              Digital Growth for Business across the 
              <!--<span class="country-background" id="animated-text"></span><span id="cursor">|</span>-->
            </h1>
            <p>
              Create world-class digital products with expert design, development, and strategy solutions.
            </p>
          </div>
          <div class="home-1_hero-newsletter">
            <form action="#" class="newsletter-form-1">
              <input type="email" placeholder="Enter your email" class="form-control">
              <button class="btn-masco rounded-pill">Subscribe</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Contact Us Form -->
    <div class="row contact_form-row">
      <div class="col-md-10 col-sm-12">
        <div class="form-box-style__form-wrapper bg-light-2 bg-cutom-mobile">
          <div class="row mobile-form-heading"><h2>Get a Free Consultation</h2></div>
          <form class="form-box-style" id="contact-form" method="POST" action="contact-us.php">
            <div class="form-box-style__form-inner">
              <div class="form-box-style__form-input">
                <!-- <h3 class="form-box-style-title">Your name</h3> -->
                <input class="form-control bg-white" name="name" type="text" placeholder="Full name">
              </div>
              <div class="form-box-style__form-input">
                <!-- <h3 class="form-box-style-title">Email address</h3> -->
                <input class="form-control bg-white" name="E-mail" type="text" placeholder="email">
              </div>
              <div class="form-box-style__form-input">
                <!-- <h3 class="form-box-style-title">Phone Number</h3> -->
                <input id="phone" class="form-control bg-white" name="phone" type="tel" placeholder="Phone number" required>
              </div>
              <div class="form-box-style__form-input">
                <!-- <h3 class="form-box-style-title">Write your message</h3> -->
                <textarea class="form-control bg-white textarea" name="message" placeholder="Any query..."></textarea>
              </div>
              <div class="form-box-style__form-input-button">
                <button type="submit" class="btn-masco rounded-pill w-100 custom-mobile-btn">Submit</button>
              </div>
              <?php echo $message; ?>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<style>
  /* Cursor Styling */
  #cursor {
    display: inline-block;
    width: 2px; /* Set width for cursor */
    height: 1em; /* Match the text line height */
    background-color: black; /* Cursor color */
    margin-left: 2px; /* Space between text and cursor */
    animation: blink 0.8s steps(2, start) infinite;
    vertical-align: middle; /* Align cursor with text */
  }

  @keyframes blink {
    50% {
      opacity: 0;
    }
  }

  /* Optional: Text Animation Placeholder (if needed) */
  .country-background {
    display: inline-block;
  }
</style>

<script>
  const textToAnimate = "UK & Ireland";
  const animatedTextElement = document.getElementById("animated-text");
  const cursorElement = document.getElementById("cursor");

  let charIndex = 0;

  function typeEffect() {
    if (charIndex < textToAnimate.length) {
      // Typing phase
      animatedTextElement.textContent += textToAnimate.charAt(charIndex);
      charIndex++;
      setTimeout(typeEffect, 150); // Adjust typing speed
    }
  }

  // Start typing on page load
  window.onload = typeEffect;
</script>




    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~
    Home 1 : Brand Section
~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
 <?php include 'includes/logo-slider.php';?>
    

     <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Home 1  : Content Section 1
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <div class="home-1_content-section-1 section-padding-120" id="about">
        <img src="./image/home-1/Home-Hero-Image.webp" alt="Hero Image" class="img-fluid">
      <div class="container">
        <div class="row row--custom">
          <div class="offset-xl-1 col-lg-5 col-auto" data-aos-duration="1000" data-aos="fade-left">
            <div class="home-1_content-image-1 content-image--mobile-width">
              <img src="./image/home-1/Section-Three.webp" alt="alternative text">
              <div class="home-1_content-image-1-shape">
                <img src="./image/home-1/content-image-1-shape.svg" alt="alternative text">
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-lg-7 col-md-10 col-auto" data-aos-duration="1000" data-aos="fade-right">
            <div class="content">
              <div class="content-text-block">
                <h2 class="content-title heading-md text-black">
                  Boost the effectiveness of your promotions as
                  well as polish your branding
                </h2>
                <p>
                  SINCE 1998, we transform bold business ideas into exceptional digital
                  products. We ideate, design, and develop data-driven digital products
                  made to answer business challenges.
                </p>
                <p>
                  We offer 360° services to smoothly guide you on your way to creating a
                  seamless digital masterpiece projects on budget and on time.
                </p>
                <p>
                  <a href="<?php echo BASE_URL; ?>contact-us" class="btn-masco btn-masco--header rounded-pill btn-fill--up">
              <span>Contact Us</span></a>
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
    <div class="home-5_feature-section padding-bottom-120 bg-cream">
      <div class="container">
        <div class="home-5_feature-section-wrapper">
          <div class="row justify-content-center text-center">
            <div class="col-xxl-6 col-lg-7 col-md-9 col-sm-12 col-xs-11">
              <div class="section-heading">
                <h2 class="section-heading__title heading-md heading-md--general-sans text-l5-secondary">Turn traffic with insanely SEO &amp; growth into revenue</h2>
              </div>
            </div>
          </div>
          <div class="row feature-widget-devider justify-content-center">
            <div class="col-lg-4 col-md-6 col-sm-10" data-aos="fade-up" data-aos-delay="100">
              <div class="feature-widget-2">
                <div class="feature-widget-2__icon">
                  <img src="./image/home-1/feature-1.png" alt="feature icon">
                </div>
                <h4 class="feature-widget-2__title">Increases Brand Awareness </h4>
                <p>You want to stand out in your industry as a leader, but you also want to be seen as a relevant solution for your audience.</p>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-10" data-aos="fade-up" data-aos-delay="200">
              <div class="feature-widget-2">
                <div class="feature-widget-2__icon">
                  <img src="./image/home-5/feature-2.png" alt="feature icon">
                </div>
                <h4 class="feature-widget-2__title">Amplifies PPC Success</h4>
                <p>Make sure you optimize your PPC ads for both desktop and mobile search ads for focusing on desktop successfully.</p>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-10" data-aos="fade-up" data-aos-delay="300">
              <div class="feature-widget-2">
                <div class="feature-widget-2__icon">
                  <img src="./image/home-5/feature-3.png" alt="feature icon">
                </div>
                <h4 class="feature-widget-2__title">Builds Customer Trust</h4>
                <p>Even with a strong SEO strategy, building customer trust in your brand takes time. Invest in quality content for readers.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
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
                <h2 class="section-heading__title heading-md heading-md--general-sans text-l5-secondary">Turn traffic with insanely SEO &amp; growth into revenue</h2>
              </div>
            </div>
          </div>

  <div class="row g-4">
    <!-- Box 1 -->
    <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
      <div class="custom-box">
        <div class="feature-widget-2__icon">
                  <img src="./image/home-1/feature-1.png" alt="feature icon">
                </div>
        <!-- <div class="icon">📈</div>  -->
        <h5>Innovative Solution</h5> <!-- Heading -->
        <p>We provide creative digital marketing solutions that are designed to meet your unique business needs and drive impactful results.</p>
      </div>
    </div>

    <!-- Box 2 -->
    <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
      <div class="custom-box" >
        <div class="feature-widget-2__icon">
                  <img src="./image/home-5/feature-2.png" alt="feature icon">
                </div>
        <!-- <div class="icon">🌐</div>  -->
        <h5>Client-Centric Approach</h5> <!-- Heading -->
        <p>Our client-centric approach focuses on understanding your business goals and delivering customised strategies that drive success.</p>
      </div>
    </div>

    <!-- Box 3 -->
    <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
      <div class="custom-box" >
        <div class="feature-widget-2__icon">
                  <img src="./image/home-5/feature-3.png" alt="feature icon">
                </div>
        <!-- <div class="icon">💼</div>  -->
        <h5>Transparent Pricing</h5> <!-- Heading -->
        <p>We offer clear, Transparent pricing with no hidden fees, so you always know what you're paying for and can make informed decisions.</p>
      </div>
    </div>
  </div>
</div>
</div>
</div>



     <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Home 1 : Service Section
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <div class="home-1_service-section padding-bottom-120" id="feature">
      <div class="home-1_service-section-shape">
        <img src="./image/home-1/service-section-shape.svg" alt="image alt">
      </div>
      <div class="container">
        <div class="home-1_service-section-wrapper">
          <div class="row justify-content-center">
            <div class="col-xxl-6 col-xl-7 col-lg-8 col-md-9">
              <div class="section-heading text-center">
                <h2 class="section-heading__title heading-md text-black">All the digital services that are convenient for you</h2>
              </div>
            </div>
          </div>
          <div class="row gutter-y-default justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-10">
              <a href="service-details.html" class="service-card   hvr-fill" data-aos-duration="1000" data-aos="fade-right">
                <div class="service-card__icon">
                  <img src="./image/icons/icon-service-1.svg" alt="image alt" class="inline-svg">
                </div>
                <div class="service-card__body">
                  <h3 class="service-card__title">Branding &amp; Digital Strategies</h3>
                  <p>Brand strategy is all about developing a unique identity that distinguishes your business from</p>
                  <span class="service-card__link btn-link btn-arrow">Find out more</span>
                </div>
              </a>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-10">
              <a href="service-details.html" class="service-card   hvr-fill" data-aos-duration="1000" data-aos="fade-left">
                <div class="service-card__icon">
                  <img src="./image/icons/icon-service-2.svg" alt="image alt" class="inline-svg">
                </div>
                <div class="service-card__body">
                  <h3 class="service-card__title">Web Design &amp; App Development</h3>
                  <p>Web design &amp; development is an umbrella term that describes the process of creating a website</p>
                  <span class="service-card__link btn-link btn-arrow">Find out more</span>
                </div>
              </a>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-10">
              <a href="service-details.html" class="service-card   hvr-fill" data-aos-duration="1000" data-aos="fade-right">
                <div class="service-card__icon">
                  <img src="./image/icons/icon-service-3.svg" alt="image alt" class="inline-svg">
                </div>
                <div class="service-card__body">
                  <h3 class="service-card__title">Results-Driven Digital Marketing</h3>
                  <p>Digital marketing potential customers using the internet &amp; other forms of digital communication</p>
                  <span class="service-card__link btn-link btn-arrow">Find out more</span>
                </div>
              </a>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-10">
              <a href="service-details.html" class="service-card   hvr-fill" data-aos-duration="1000" data-aos="fade-left">
                <div class="service-card__icon">
                  <img src="./image/icons/icon-service-4.svg" alt="image alt" class="inline-svg">
                </div>
                <div class="service-card__body">
                  <h3 class="service-card__title">Custom Software Development</h3>
                  <p>Custom Software Development is the process of conceptualizing, designing, building &amp; deploying</p>
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
<?php include 'includes/testimonial.php'; ?>
<!-- testimonial us Section -->



<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Home 6  : Section 7 Home Page 
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

<div class="home-6_topic-section section-padding-120">
      <div class="container">
        <div class="section-heading section-heading--row">
          <div class="row justify-content-center text-center text-lg-initial justify-content-lg-between">
            <div class="col-xxl-6 col-xl-7 col-lg-8 col-md-9 ">
              <h2 class="section-heading__title heading-md heading-md--general-sans text-l5-secondary">We automate cold outreach across multiple channels</h2>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-4">
              <div class="section-heading__button">
                <a href="#" class="btn-masco btn btn-primary btn-fill--up">
                  <span>See All Integrations</span></a>
              </div>
            </div>
          </div>
        </div>
        <div class="ticker-03_section">
          <div class="ticker-03_wrapper">
            <div class="ticker-03_content">
              <div class="ticker-item">
                <img src="./image/brand-logo/discord.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/spotify.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/slack.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/dropbox.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/mailchimp.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/whatsapp.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/skype.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/gmail.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/zoom.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/figma.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/snapchat.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/shopify.png" alt="image alt">
              </div>
            </div>
            <div class="ticker-03_content">
              <div class="ticker-item">
                <img src="./image/brand-logo/discord.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/spotify.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/slack.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/dropbox.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/mailchimp.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/whatsapp.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/skype.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/gmail.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/zoom.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/figma.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/snapchat.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/shopify.png" alt="image alt">
              </div>
            </div>
            <div class="ticker-03_content">
              <div class="ticker-item">
                <img src="./image/brand-logo/discord.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/spotify.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/slack.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/dropbox.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/mailchimp.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/whatsapp.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/skype.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/gmail.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/zoom.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/figma.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/snapchat.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/shopify.png" alt="image alt">
              </div>
            </div>
            <div class="ticker-03_content">
              <div class="ticker-item">
                <img src="./image/brand-logo/discord.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/spotify.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/slack.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/dropbox.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/mailchimp.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/whatsapp.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/skype.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/gmail.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/zoom.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/figma.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/snapchat.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/shopify.png" alt="image alt">
              </div>
            </div>
            <div class="ticker-03_content">
              <div class="ticker-item">
                <img src="./image/brand-logo/discord.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/spotify.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/slack.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/dropbox.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/mailchimp.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/whatsapp.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/skype.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/gmail.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/zoom.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/figma.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/snapchat.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/shopify.png" alt="image alt">
              </div>
            </div>
            <div class="ticker-03_content">
              <div class="ticker-item">
                <img src="./image/brand-logo/discord.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/spotify.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/slack.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/dropbox.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/mailchimp.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/whatsapp.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/skype.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/gmail.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/zoom.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/figma.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/snapchat.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/shopify.png" alt="image alt">
              </div>
            </div>
          </div>
          <div class="ticker-03_wrapper">
            <div class="ticker-03_content ticker-03_content--reverse">
              <div class="ticker-item">
                <img src="./image/brand-logo/discord.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/spotify.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/slack.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/dropbox.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/mailchimp.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/whatsapp.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/skype.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/gmail.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/zoom.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/figma.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/snapchat.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/shopify.png" alt="image alt">
              </div>
            </div>
            <div class="ticker-03_content ticker-03_content--reverse">
              <div class="ticker-item">
                <img src="./image/brand-logo/discord.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/spotify.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/slack.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/dropbox.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/mailchimp.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/whatsapp.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/skype.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/gmail.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/zoom.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/figma.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/snapchat.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/shopify.png" alt="image alt">
              </div>
            </div>
            <div class="ticker-03_content ticker-03_content--reverse">
              <div class="ticker-item">
                <img src="./image/brand-logo/discord.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/spotify.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/slack.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/dropbox.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/mailchimp.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/whatsapp.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/skype.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/gmail.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/zoom.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/figma.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/snapchat.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/shopify.png" alt="image alt">
              </div>
            </div>
            <div class="ticker-03_content ticker-03_content--reverse">
              <div class="ticker-item">
                <img src="./image/brand-logo/discord.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/spotify.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/slack.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/dropbox.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/mailchimp.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/whatsapp.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/skype.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/gmail.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/zoom.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/figma.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/snapchat.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/shopify.png" alt="image alt">
              </div>
            </div>
            <div class="ticker-03_content ticker-03_content--reverse">
              <div class="ticker-item">
                <img src="./image/brand-logo/discord.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/spotify.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/slack.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/dropbox.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/mailchimp.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/whatsapp.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/skype.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/gmail.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/zoom.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/figma.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/snapchat.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/shopify.png" alt="image alt">
              </div>
            </div>
            <div class="ticker-03_content ticker-03_content--reverse">
              <div class="ticker-item">
                <img src="./image/brand-logo/discord.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/spotify.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/slack.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/dropbox.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/mailchimp.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/whatsapp.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/skype.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/gmail.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/zoom.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/figma.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/snapchat.png" alt="image alt">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/shopify.png" alt="image alt">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Home 1  : Content Section 2
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <div class="home-1_content-section-2 padding-bottom-120" >
      <div class="container">
        <div class="row row--custom">
          <div class="col-xl-5 col-lg-5 col-auto" data-aos-duration="1000" data-aos="fade-right">
            <div class="home-1_content-image-2 content-image--mobile-width">
              <img src="./image/home-1/Home-Section-7.webp" alt="alternative text">
              <div class="home-1_content-image-2-shape">
                <img src="./image/home-1/content-image-2-shape.svg" alt="alternative text">
              </div>
            </div>
          </div>
          <div class="offset-xl-1 col-xl-6 col-lg-7 col-md-11" data-aos-duration="1000" data-aos="fade-left">
            <div class="content">
              <div class="content-text-block">
                <h2 class="content-title heading-md text-black">
                  Discover the latest digital strategies &
                  emerging ideas for business growth
                </h2>
                <p>
                  Our brand tenders and marketing mixologists always serve up unique,
                  design-forward websites coded with today’s modern technologies
                </p>
              </div>
              <div class="content-list-block">
                <ul class="content-list">
                  <li class="content-list-item">
                    <img src="./image/icons/icon-check-blue.svg" alt="alternative text">
                    Reach new business opportunities or test your product ideas.
                  </li>
                  <li class="content-list-item">
                    <img src="./image/icons/icon-check-blue.svg" alt="alternative text">
                    Automate your processes and get data-driven business insights.
                  </li>
                  <li class="content-list-item">
                    <img src="./image/icons/icon-check-blue.svg" alt="alternative text">
                    Create lightweight, scalable, and easly accessible cloud solution.
                  </li>
                </ul>
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
              <h2 class="section-heading__title heading-md text-black">Frequently asked questions about our digital agency</h2>
            </div>
          </div>
        </div>
        <div class="row row--custom">
          <div class="col-lg-10">
            <div class="accordion-style-1" id="home-1-faq">
              <div class="accordion-item">
                <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item" aria-expanded="true" aria-controls="home-1-faq-item">
                  Q. What is a digital agency?
                </button>
                <div id="home-1-faq-item" class="accordion-collapse collapse show" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                    A digital agency is a company that leverages digital channels to grow their clients’ brands online.
                    ls and technologies such as web design, digital marketing, creative design and app development.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-2" aria-expanded="false" aria-controls="home-1-faq-item-2">
                  Q. What services does a digital agency provide?
                </button>
                <div id="home-1-faq-item-2" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                    A digital agency is a company that leverages digital channels to grow their clients’ brands online.
                    ls and technologies such as web design, digital marketing, creative design and app development.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-3" aria-expanded="false" aria-controls="home-1-faq-item-3">
                  Q. Hiring a digital agency vs hiring in-house: What is the difference?
                </button>
                <div id="home-1-faq-item-3" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                    A digital agency is a company that leverages digital channels to grow their clients’ brands online.
                    ls and technologies such as web design, digital marketing, creative design and app development.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-4" aria-expanded="false" aria-controls="home-1-faq-item-4">
                  Q. What questions should you ask when interviewing a digital agency?
                </button>
                <div id="home-1-faq-item-4" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                    A digital agency is a company that leverages digital channels to grow their clients’ brands online.
                    ls and technologies such as web design, digital marketing, creative design and app development.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-5" aria-expanded="false" aria-controls="home-1-faq-item-5">
                  Q. How do digital agencies charge for their services?
                </button>
                <div id="home-1-faq-item-5" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                    A digital agency is a company that leverages digital channels to grow their clients’ brands online.
                    ls and technologies such as web design, digital marketing, creative design and app development.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-6" aria-expanded="false" aria-controls="home-1-faq-item-6">
                  Q. How do digital agencies charge for their services?
                </button>
                <div id="home-1-faq-item-6" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                    A digital agency is a company that leverages digital channels to grow their clients’ brands online.
                    ls and technologies such as web design, digital marketing, creative design and app development.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-7" aria-expanded="false" aria-controls="home-1-faq-item-7">
                  Q. How do digital agencies charge for their services?
                </button>
                <div id="home-1-faq-item-7" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                    A digital agency is a company that leverages digital channels to grow their clients’ brands online.
                    ls and technologies such as web design, digital marketing, creative design and app development.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-8" aria-expanded="false" aria-controls="home-1-faq-item-8">
                  Q. How do digital agencies charge for their services?
                </button>
                <div id="home-1-faq-item-8" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                    A digital agency is a company that leverages digital channels to grow their clients’ brands online.
                    ls and technologies such as web design, digital marketing, creative design and app development.
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="section-button faqs-button">
          <a href="#" class="btn-masco rounded-pill btn-fill--up"><span>Still, have any questions? Contact us</span></a>
        </div>
      </div>
    </div>


<!-- Contact Us Section -->
<?php include 'includes/contact-us-section.php'; ?>
<!-- Contact us Section -->

    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Home 8  : Service Section 
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <div class="home-8_blog-section padding-bottom-120 padding-top-120 bg-cream" id="blog">
      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="col-xxl-7 col-xl-8 col-lg-9 col-md-10 col-auto">
            <div class="section-heading">
              <h2 class="section-heading__title heading-lg text-black-2">Browse our articles and resources to learn more</h2>
              <p>A lot of information is given in our blogs. You can learn
                more about startup by reading our blogs.
                It’s time to brainstorm ideas for your business</p>
            </div>
          </div>
        </div>
        <div class="row gutter-y-default justify-content-center">
          <div class="col-lg-4 col-md-6 col-sm-8">
            <div class="blog-card h-100">
              <div class="blog-card__image">
                <img src="./image/home-1/blog-image-1.png" alt="image alt">
                <a href="#" class="blog-card__badge">Startup</a>
              </div>
              <div class="blog-card__body">
                <div class="blog-card__meta">
                  <span><img src="./image/home-8/blog-card-icon-1.svg" alt="icon">Adam Smith</span>
                  <span><img src="./image/home-8/blog-card-icon-2.svg" alt="calender">Feb 28, 2023</span>
                </div>
                <h3 class="blog-card__title">Benefits to first-generation low-income entrepreneurs</h3>
                <a href="#" class="blog-card__link btn-link btn-arrow">Read more </a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-8">
            <div class="blog-card h-100">
              <div class="blog-card__image">
                <img src="./image/home-1/blog-image-2.png" alt="image alt">
                <a href="#" class="blog-card__badge">Entrepreneurship</a>
              </div>
              <div class="blog-card__body">
                <div class="blog-card__meta">
                  <span><img src="./image/home-8/blog-card-icon-1.svg" alt="icon">Max Wevar</span>
                  <span><img src="./image/home-8/blog-card-icon-2.svg" alt="calender">Feb 10, 2023</span>
                </div>
                <h3 class="blog-card__title">Dangers of a traditional for your career goal</h3>
                <a href="#" class="blog-card__link btn-link btn-arrow">Read more </a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-8">
            <div class="blog-card h-100">
              <div class="blog-card__image">
                <img src="./image/home-1/blog-image-3.png" alt="image alt">
                <a href="#" class="blog-card__badge">Technology</a>
              </div>
              <div class="blog-card__body">
                <div class="blog-card__meta">
                  <span><img src="./image/home-8/blog-card-icon-1.svg" alt="icon">Willium Jons</span>
                  <span><img src="./image/home-8/blog-card-icon-2.svg" alt="calender">Feb 03, 2023</span>
                </div>
                <h3 class="blog-card__title">How to increase ad revenue in mobile applications</h3>
                <a href="#" class="blog-card__link btn-link btn-arrow">Read more </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>





    <?php include 'includes/footer.php'; ?>