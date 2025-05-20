


<?php 
$noindex = true;
include 'includes/header3.php';

require 'rfzwebdb.php';

?>



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

    </style>
<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Home 1  : Hero Section 
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
<style type="text/css">
.hidden {
    display: none; /* Hide the original hero section */
  }

/*.home-1_hero-section-mobile {*/
/*  display: none; */
/*  background-size: auto;*/
/*  background-repeat: no-repeat;*/
/*  background-position: center;*/
/*  background-image: url('./image/home-1/Heade-Images-1920-1080.webp'); */
/*  height: 100vh; */
/*  position: relative;*/
/*  overflow: hidden;*/
/*  color: #fff; */
/*  width: 100%;*/
/*}*/


/*.home-1_hero-section-mobile {*/
/*    display: block; */
/*  }*/

/* Adjusted text placement for alignment like the shared image */
.home-1_hero-content-mobile {
  position: absolute;
  bottom: 14%; /* Move text closer to the bottom */
  left: 5%; /* Align text to the left with padding */
  text-align: left; /* Ensure text is aligned to the left */
}

.home-1_hero-content-mobile .hero-content__title {
  font-size: 70px; /* Adjust font size for better readability */
  line-height: 1.2; /* Line height for better spacing */
  font-family: onest;
}

.home-1_hero-content-mobile p {
  margin-top: 10px; /* Add space between title and paragraph */
  font-size: 1rem;
  color: #fff;
}

.mobile-hero-btn {
  margin-top: 15px; /* Add space between paragraph and button */
  background-color: #3147FF;
  color: #fff;
  padding: 8px 20px 8px 20px;
  border: none;
}
}


</style>
<!--<div class="home-1_hero-section-mobile" id="hero-mobile">-->
<!--  <div class="container">-->
<!--    <div class="row row--hero-content">-->
<!--      <div class="col-12">-->
<!--        <div class="home-1_hero-content-mobile">-->
<!--          <h1 class="hero-content__title heading-xl">-->
    
<!--            Digital Growth for Business across the <br> <span class="country-backgrund" id="animated-text"></span><span id="cursor">|</span>-->

<!--          </h1>-->
<!--          <p>-->
<!--            We help businesses in UK & Ireland grow online. Our digital marketing services are designed to increase your visibility, attract the right customers, and deliver real results. -->
<!--          </p>-->
<!--          <button class="mobile-hero-btn">Get Started</button>-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
<!--</div>-->

<!--<div class="home-1_hero-section-mobile" id="hero-mobile">-->
<!--  <div class="container h-100">-->
<!--    <div class="row h-100 align-items-center">-->
     
<!--      <div class="col-12 col-md-6 d-flex flex-column justify-content-end home-1_hero-content-mobile">-->
        
<!--        <div>-->
<!--          <h1 class="hero-content__title heading-xl">-->
<!--            Digital Growth for Business across the <span class="country-backgrund" id="animated-text"></span><span id="cursor">|</span>-->
<!--          </h1>-->
<!--          <p>-->
<!--            We help businesses in UK & Ireland grow online. Our digital marketing services are designed to increase your visibility, attract the right customers, and deliver real results.-->
<!--          </p>-->
<!--          <button class="btn mobile-hero-btn">Get Started</button>-->
<!--        </div> -->
<!--      </div>-->
      
<!--      <div class="col-12 col-md-6"></div>-->
<!--    </div>-->
<!--  </div>-->
<!--</div>-->


<style>
    /* Hero Section Styling */
    /*.hero-section {*/
    /*    background-image: url('./image/home-1/Header-Images-1920-1150-new.webp'); */
    /*    background-size: cover;*/
    /*    background-position: center;*/
    /*    height: 120vh; */
    /*    color: #333; */
    /*    position: relative;*/
    /*    overflow: hidden;*/
    /*    width: auto;*/
    /*}*/

    .hero-content {
        text-align: center; /* Center text horizontally */
    }

    .hero-title {
        line-height: 82px;
        font-size: 83px;
        letter-spacing: -5px;
        font-weight: 500;
        color: #1f1f1f;
        word-break: break-word; /* Allow breaking for long words */
    }



.hero-subtitle {
    font-size: 18px;
    color: #000;
    margin: 0 auto; /* Center the text block */
    text-align: center !IMPORTANT; /* Align text inside the <p> tag */
    line-height: 1.6;
    font-family: 'General Sans';
}
    .hero-button {
        background-color: #1463FF;
        color: #fff;
        padding: 0.75rem 1.5rem;
        font-size: 1rem;
        border: none;
        border-radius: 48px;
        text-transform: uppercase;
        font-weight: 600;
        transition: background-color 0.5s, border 0.5s;
        margin-top:20px;
    }

    .hero-button:hover {
        background-color: #fff;
        border: 1px solid #1463FF;
        color: #000;
    }

    .content-set {
        padding-top: 120px;
    }
    @media (max-width: 600px) {
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
    color: #000;
    margin: 0 auto; /* Center the text block */
    text-align: center !IMPORTANT; /* Align text inside the <p> tag */
    line-height: 1.6;
    padding-top: 10px;
    padding-top: 10px;
}
.hero-section {
        background-image: url('./image/home-1/Header-Images-1920-1150-new.webp'); /* Update with your image path */
        background-size: cover;
        background-position: center;
        height: 105vh; /* Full viewport height */
        color: #333; /* Text color */
        position: relative;
        overflow: hidden;
        width: auto;
    }

}

@media (min-width: 768px) {
  .hero-section {
        background-image: url('./image/home-1/Header-Images-iPad.webp'); /* Update with your image path */
        background-size: cover;
        background-position: center;
        /*height: 40vh; */
        color: #fff !IMPORTANT;; /* Text color */
        position: relative;
        overflow: hidden;
        width: 100%;
    }
       .hero-title {
    font-size: 44px;
    letter-spacing: -3px;
    line-height: 50px;
    font-weight: 700;
    color: #1f1f1f;
    word-break: break-word;
}
.content-set {
    padding-top: 70px;
    flex: 0 0 auto;
    width: 91.666667%; /* Equivalent to col-11 */
}
.hero-content{
    padding-bottom: 270px;
}
    .hero-subtitle {
    font-size: 18px;
    color: #000;
    margin: 0 auto; /* Center the text block */
    text-align: center !IMPORTANT; /* Align text inside the <p> tag */
    line-height: 1.6;
    padding-top: 10px;
    flex: 0 0 auto;
    width: 91.666667%; /* Equivalent to col-11 */
}
.hero-button {
    margin-top:10px;
}
}
@media (min-width: 992px) {
  .hero-section {
        background-image: url('./image/home-1/Header-Images-1920-1150-new.webp'); /* Update with your image path */
        background-size: cover;
        background-position: center;
        height: 80vh; /* Full viewport height */
        color: #fff !IMPORTANT;; /* Text color */
        position: relative;
        overflow: hidden;
        width: auto;
    }
}
@media (min-width: 1200px) {
  
}
@media (min-width: 1400px) {
  .hero-section {
        background-image: url('./image/home-1/Header-Images-1920-1150-new.webp'); /* Update with your image path */
        background-size: cover;
        background-position: center;
        height: 120vh; /* Full viewport height */
        color: #fff !IMPORTANT;; /* Text color */
        position: relative;
        overflow: hidden;
        width: auto;
    }
    .hero-title {
        line-height: 82px;
        font-size: 83px;
        letter-spacing: -5px;
        font-weight: 500;
        color: #1f1f1f;
        word-break: break-word; /* Allow breaking for long words */
    }
    .content-set {
    padding-top: 100px;
}
}




</style>



<!-- Hero Section -->
<div class="hero-section d-flex align-items-start justify-content-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 content-set">
                <div class="hero-content">
                    <h1 class="hero-title">
                        Digital Growth for Business across the UK & Ireland
                    </h1>
                    <div class="row justify-content-center">
                        <p class="hero-subtitle col-12 col-md-9">
                            We help businesses in the UK & 
                            Ireland grow online. Our digital marketing services are designed to increase your
                            visibility, attract the right customers, and deliver real results.
                        </p>
                    </div>
                    <a href="#" class="btn hero-button">Get Started</a>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="home-1_hero-section hidden" id="hero">
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
              <span class="country-background" id="animated-text"></span><span id="cursor">|</span>
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
    <div class="row contact_form-row ">
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
    /*display: inline-block;*/
    /*width: 0.1em;*/
    /*height: 1em;*/
    /*background-color: black;*/
    /*margin-left: 2px;*/
    animation: blink 0.8s steps(2, start) infinite;
    /*vertical-align: middle;*/
  }

  @keyframes blink {
    50% {
      opacity: 0;
    }
  }

  /* Highlight Background Color Animation */
  @keyframes background-highlight {
    0%, 100% {
      background-color: transparent;
    }
    50% {
      background-color: #1463FF;
    }
  }

  .country-background {
    display: inline-block;
    animation: none; /* Background animation will be applied dynamically */
  }
</style>

<script>
  const textToAnimate = "UK & Ireland";
  const animatedTextElement = document.getElementById("animated-text");
  const cursorElement = document.getElementById("cursor");

  let charIndex = 0;
  let typingComplete = false;

  function typeEffect() {
    if (charIndex < textToAnimate.length) {
      // Typing phase
      animatedTextElement.textContent += textToAnimate.charAt(charIndex);
      charIndex++;
      setTimeout(typeEffect, 150); // Adjust typing speed
    } else {
      // Typing completed
      typingComplete = true;
      startBlinkingAndHighlight();
    }
  }

  function startBlinkingAndHighlight() {
    // Wait 10 seconds of blinking
    setTimeout(() => {
      animatedTextElement.style.animation = "backgound-highlight 2s infinite";
      setTimeout(() => {
        resetTypingEffect();
      }, 1500); // Duration of highlight animation
    }, 5000); // Cursor blinking duration
  }

  function resetTypingEffect() {
    // Reset for typing again
    animatedTextElement.textContent = "";
    animatedTextElement.style.animation = "none"; // Remove background highlight
    charIndex = 0;
    typingComplete = false;
    typeEffect(); // Restart the typing effect
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
      <div class="container">
        <div class="row row--custom">
          <div class="offset-xl-1 col-lg-5 col-auto" data-aos-duration="1000" data-aos="fade-left">
            <div class="home-1_content-image-1 content-image--mobile-width">
              <img src="./image/home-1/Home-Page-AboutUs.webp" alt="alternative text">
              <div class="home-1_content-image-1-shape">
                <img src="./image/home-1/content-image-1-shape.svg" alt="alternative text">
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-lg-7 col-md-10 col-auto" data-aos-duration="1000" data-aos="fade-right">
            <div class="content">
              <div class="content-text-block">
                <h2 class="content-title heading-md text-black" style="font-family: 'General Sans'; font-size: 40px; letter-spacing: -0.264px; line-height: 26px; font-weight:600;">
                  Think it. Make it.
                </h2>
                <h2 class="content-title heading-md text-black" style="font-family: 'General Sans'; font-size: 40px; letter-spacing: -0.264px;  font-weight:600;">
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
    <!--<div class="home-1_service-section padding-bottom-120" id="feature">-->
    <!--  <div class="home-1_service-section-shape">-->
    <!--    <img src="./image/home-1/service-section-shape.svg" alt="image alt">-->
    <!--  </div>-->
    <!--  <div class="container">-->
    <!--    <div class="home-1_service-section-wrapper">-->
    <!--      <div class="row justify-content-center">-->
    <!--        <div class="col-xxl-6 col-xl-7 col-lg-8 col-md-9">-->
    <!--          <div class="section-heading text-center">-->
    <!--            <h2 class="section-heading__title heading-md text-black">All the digital services that are convenient for your Business</h2>-->
    <!--          </div>-->
    <!--        </div>-->
    <!--      </div>-->
    <!--      <div class="row gutter-y-default justify-content-center services-Mobile-hide">-->
    <!--        <div class="col-xl-6 col-lg-6 col-md-10">-->
    <!--          <a href="service-details.html" class="service-card   hvr-fill" data-aos-duration="1000" data-aos="fade-right">-->
    <!--            <div class="service-card__icon">-->
    <!--              <img src="./image/icons/icon-service-1.svg" alt="image alt" class="inline-svg">-->
    <!--            </div>-->
    <!--            <div class="service-card__body">-->
    <!--              <h3 class="service-card__title">Branding &amp; Digital Strategies</h3>-->
    <!--              <p>Brand strategy is all about developing a unique identity that distinguishes your business from</p>-->
    <!--              <span class="service-card__link btn-link btn-arrow">Find out more</span>-->
    <!--            </div>-->
    <!--          </a>-->
    <!--        </div>-->
    <!--        <div class="col-xl-6 col-lg-6 col-md-10">-->
    <!--          <a href="service-details.html" class="service-card   hvr-fill" data-aos-duration="1000" data-aos="fade-left">-->
    <!--            <div class="service-card__icon">-->
    <!--              <img src="./image/icons/icon-service-2.svg" alt="image alt" class="inline-svg">-->
    <!--            </div>-->
    <!--            <div class="service-card__body">-->
    <!--              <h3 class="service-card__title">Web Design &amp; App Development</h3>-->
    <!--              <p>Web design &amp; development is an umbrella term that describes the process of creating a website</p>-->
    <!--              <span class="service-card__link btn-link btn-arrow">Find out more</span>-->
    <!--            </div>-->
    <!--          </a>-->
    <!--        </div>-->
    <!--        <div class="col-xl-6 col-lg-6 col-md-10">-->
    <!--          <a href="service-details.html" class="service-card   hvr-fill" data-aos-duration="1000" data-aos="fade-right">-->
    <!--            <div class="service-card__icon">-->
    <!--              <img src="./image/icons/icon-service-3.svg" alt="image alt" class="inline-svg">-->
    <!--            </div>-->
    <!--            <div class="service-card__body">-->
    <!--              <h3 class="service-card__title">Results-Driven Digital Marketing</h3>-->
    <!--              <p>Digital marketing potential customers using the internet &amp; other forms of digital communication</p>-->
    <!--              <span class="service-card__link btn-link btn-arrow">Find out more</span>-->
    <!--            </div>-->
    <!--          </a>-->
    <!--        </div>-->
    <!--        <div class="col-xl-6 col-lg-6 col-md-10">-->
    <!--          <a href="service-details.html" class="service-card   hvr-fill" data-aos-duration="1000" data-aos="fade-left">-->
    <!--            <div class="service-card__icon">-->
    <!--              <img src="./image/icons/icon-service-4.svg" alt="image alt" class="inline-svg">-->
    <!--            </div>-->
    <!--            <div class="service-card__body">-->
    <!--              <h3 class="service-card__title">Custom Software Development</h3>-->
    <!--              <p>Custom Software Development is the process of conceptualizing, designing, building &amp; deploying</p>-->
    <!--              <span class="service-card__link btn-link btn-arrow">Find out more</span>-->
    <!--            </div>-->
    <!--          </a>-->
    <!--        </div>-->
    <!--      </div>-->
    <!--    </div>-->
    <!--  </div>-->
    <!--</div>-->

<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Home 1 : Service Section for Mobile
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Home 1 : Service Section for Mobile
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->




<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Home 1 : Service Section for Mobile
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Home 1 : Service Section for Mobile
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

   <style>
    /* Full-width section gradient background */
    .gradient-bg {
        background: linear-gradient(to top, #f8f9fa, #eaf2fd); /* Light professional gradient */
        padding: 70px 0;
        text-align: center;
    }

    /* Section Heading */
    .section-headingg {
        font-family: "Poppins", sans-serif;
        font-size: 38px;
        font-weight: 700;
        margin-bottom: 50px !important;
        color: #002855; /* Deep navy blue */
        text-transform: capitalize;
        margin: 0 auto;
        line-height: 1.3;
        max-width: 600px; /* Set width for two-line text on laptops */
    }

    /* Cards Container */
    .card {
        background: #ffffff;
        border: none;
        border-radius: 10px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease-in-out;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        box-shadow: 0 0 8px 2px rgba(0, 123, 255, 0.4); /* Glow effect */
/*            transition: box-shadow 0.3s ease-in-out;*/
    }


    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 0 12px 3px rgba(0, 123, 255, 0.6);
    }

    /* Card Title */
    .card-title {
        font-size: 24px;
        font-weight: 700;
        color: #004080; /* Subtle blue for headings */
        margin: 20px 0 10px;
    }

    /* Card Text */
    .card-text {
        font-size: 15px;
        color: #555555;
        line-height: 1.6;
        padding: 0 15px 0px; /* Added padding bottom for better spacing */
    }

    /* Card Images */
    .card-img-bottom {
    width: calc(100% - 20px); /* Adjust width to account for spacing */
    height: 180px;
    object-fit: cover;
    border-radius: 12px; /* Apply 20px corner radius */
    margin: 0 10px 20px 10px; /* Add spacing: 10px left, right, 20px bottom */
}
/* Button Styling */
.read-more-btn {
    display: inline-block;
    text-align: center;
    margin: 10px auto 15px; /* Space above and below the button */
    padding: 8px 16px;
    background-color: #004080; /* Button color */
    color: #ffffff; /* Text color */
    text-decoration: none;
    font-size: 14px;
    font-weight: 600;
    border-radius: 5px;
    transition: background-color 0.3s ease-in-out;
}

.read-more-btn:hover {
    background-color: #002855; /* Darker blue on hover */
}


    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .section-heading {
            font-size: 26px;
            max-width: 100%;
        }
        .card-title {
            font-size: 20px;
        }
        .card-text {
            font-size: 14px;
        }
    }
</style>
  <!-- Services Section -->
<div class="gradient-bg">
    <!-- Top Center Heading -->
    <h2 class="section-headingg">
        All the digital services that are convenient for your Business
    </h2>
    <div class="container">
        <div class="row g-4">
            <!-- Card 1 -->
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card h-100">
                    <h5 class="card-title">Website Design</h5>
                    <p class="card-text">
                        We Design visually stunning, user-friendly websites tailored to your business needs. We combine creativity and functionality to enhance your business online presence.
                    </p>
                    <a href="#" class="btn btn-primary read-more-btn">Read More</a>
                    <img src="./image/home-1/services/Final-website-design.webp" alt="Website Design" class="card-img-bottom">
                </div>
            </div>
            <!-- Card 2 -->
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card h-100">
                    <h5 class="card-title">Website Development</h5>
                    <p class="card-text">
                        We develop robust websites that ensure optimal performance and security. We utilise latest technologies and best practices that enable your website to grow your business.
                    </p>
                    <a href="#" class="btn btn-primary read-more-btn">Read More</a>
                    <img src="./image/home-1/services/web-development.webp" alt="Website Development" class="card-img-bottom">
                </div>
            </div>
            <!-- Card 3 -->
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card h-100">
                    <h5 class="card-title">Website Content</h5>
                    <p class="card-text">
                        We deliver engaging copy and captivating visuals that communicate your business message. We ensure your website informs and resonates with visitors, driving conversions.
                    </p>
                    <a href="#" class="btn btn-primary read-more-btn">Read More</a>
                    <img src="./image/home-1/services/contentWriting.webp" alt="Website Content" class="card-img-bottom">
                </div>
            </div>
            <!-- Card 4 -->
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card h-100">
                    <h5 class="card-title">Maintenance & Support</h5>
                    <p class="card-text">
                        Get 2 Months of FREE Maintenance & support. You can focus on growing your business while we handle the technical details, ensuring your online presence remains solid and reliable.
                    </p>
                    <a href="#" class="btn btn-primary read-more-btn">Read More</a>
                    <img src="./image/home-1/services/Maintenance-&-Support.webp" alt="Maintenance & Support" class="card-img-bottom">
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