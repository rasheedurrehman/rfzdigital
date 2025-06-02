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
$meta_title = "Professional Website Design Services UK Ireland- RFZ Digital";
$meta_description = "RFZ Digital offers professional website design services in the UK & Ireland. We create custom, responsive and SEO-friendly websites to help your business grow.";
$canonical_url = "https://rfzdigital.co.uk/website-design";
include 'includes/header.php';

?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Service",
  "name": "Website Design",
  "description": "Professional website design services by RFZ Digital UK to build modern, responsive, and SEO-friendly websites for businesses across the UK.",
  "provider": {
    "@type": "Organization",
    "name": "RFZ Digital UK",
    "url": "https://rfzdigital.co.uk/",
    "contactPoint": {
      "@type": "ContactPoint",
      "email": "info@rfzdigital.co.uk",
      "contactType": "Customer Support",
      "areaServed": "GB",
      "availableLanguage": ["English - GB"]
    }
  },
  "areaServed": {
    "@type": "Country",
    "name": "United Kingdom"
  },
  "serviceType": "Website Design",
  "url": "https://rfzdigital.co.uk/website-design"
}
</script>

<style>
    /* Hero Section Styling */

    .hero-content {
        text-align: center; /* Center text horizontally */
    }
    

   @media (max-width: 600px) {
        .hero-section {
            background-image: url('./image/web-dev/Newst-header-Website-Development.webp'); 
            background-size: cover;
            background-position: center;
            
            height: 115vh; 
            color: #333; 
            position: relative;
            overflow: hidden;
            width: auto;
        }
        .hero-title {
            font-size: 39px;
            letter-spacing: -3px;
            line-height: 40px;
            font-weight: 700;
            color: #fff;
            word-break: break-word;
        }
        .content-set {
            padding-top: 80px !important;
        }
        .hero-subtitle {
            font-size: 17px;
            color: #555;
            margin: 0 auto; /* Center the text block */
            text-align: center !IMPORTANT; /* Align text inside the <p> tag */
            line-height: 1.6;
            padding-top: 10px;
            padding-top: 10px;
        }

}
@media (max-width: 400px) {
    .hero-section {
            background-image: url('./image/web-dev/Newst-header-Website-Development.webp'); 
            background-size: cover;
            background-position: center;
            height: 138vh; 
/*            height: 115vh; */
            color: #333; 
            position: relative;
            overflow: hidden;
            width: auto;
        }
        .hero-title {
            font-size: 36px;
            letter-spacing: -1px;
            line-height: 40px;
            font-weight: 700;
            color: #fff;
            word-break: break-word;
        }
}

@media (min-width: 768px) {
    
        .hero-section {
        background-image: url('./image/web-dev/Website-Development-Header-Images-iPad.webp'); /* Update with your image path */
        background-size: cover;
        background-position: center;
        color: #fff !IMPORTANT;
        position: relative;
        overflow: hidden;
        width: 100%;
    }
           .hero-title {
            font-size: 44px;
            letter-spacing: -3px;
            line-height: 50px;
            font-weight: 700;
            color: #fff;
            word-break: break-word;
        }
        .content-set {
            padding-top: 70px;
            
        }
        .hero-content{
    padding-bottom: 270px;
}
        .hero-subtitle {
            font-size: 18px;
            color: #555;
            margin: 0 auto; /* Center the text block */
            text-align: center !IMPORTANT; /* Align text inside the <p> tag */
            line-height: 1.6;
            padding-top: 10px;
            flex: 0 0 auto;
            width: 95%; 
        }
}

@media (min-width: 1400px) {
        .hero-section {
            background-image: url('./image/web-dev/Newst-header-Website-Development.webp'); /* Update with your image path */
            background-size: cover;
            background-position: center;
            height: 120vh; /* Full viewport height */
            color: #333; /* Text color */
            position: relative;
            overflow: hidden;
            width: auto;
        }
    
        .hero-content {
                text-align: center; /* Center text horizontally */
            }
    
        .hero-title {
            line-height: 82px;
            font-size: 77px;
            letter-spacing: -5px;
            font-weight: 500;
            color: #fff;
            word-break: break-word; /* Allow breaking for long words */
        }
        .hero-subtitle {
            font-size: 18px;
            color: #000;
            margin: 0 auto; /* Center the text block */
            text-align: center !IMPORTANT; /* Align text inside the <p> tag */
            line-height: 1.6;
            flex: 0 0 auto;
            width: 75%; 
        }
        .content-set {
        padding-top: 120px;
    }
}





.hero-subtitle {
    padding-top: 10px;
    font-size: 18px;
    color: #000;
    margin: 0 auto; /* Center the text block */
    text-align: center !IMPORTANT; /* Align text inside the <p> tag */
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
        margin-top: 10px !important;
    }

    .hero-button:hover {
        background-color: #fff !important;
        border: 1px solid #1463FF !important;
        color: #000 !important;
    }

    .content-set {
        padding-top: 120px;
    }
       @media (min-width: 1200px) {
  .hero-section {
            background-image: url('./image/web-dev/Newst-header-Website-Development.webp'); /* Update with your image path */
            background-size: cover;
            background-position: center;
            height: 110vh; /* Full viewport height */
            color: #333; /* Text color */
            position: relative;
            overflow: hidden;
            width: auto;
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
                        Grow your Business Online with a Professional Website Design
                    </h1>
                    <div class="row justify-content-center">
                        <p class="hero-subtitle col-12 col-md-10">
                            A professional website design is essential for growing your business online across the UK and Ireland. We offer expertly designed, mobile-friendly, and fully optimised websites that help you stand out and attract more customers.
                        </p>
                    </div>
                    <a href="<?php echo BASE_URL; ?>contact-us" class="btn hero-button">Get Started</a>
                </div>
            </div>
        </div>
    </div>
</div>

  

   
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~
    Home 1 : New Hero Section
~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

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
          <div class="offset-xl-0 col-lg-5 col-auto" data-aos-duration="1000" data-aos="fade-left">
            <div class="home-1_content-image-1 content-image--mobile-width">
              <img src="./image/web-dev/Website-Development-Page-AboutUs.webp" alt="Business website solutions">
              <!--<div class="home-1_content-image-1-shape">-->
              <!--  <img src="./image/home-1/content-image-1-shape.svg" alt="alternative text">-->
              <!--</div>-->
            </div>
          </div>
          <div class="col-xl-6 col-lg-7 col-md-10 col-auto" data-aos-duration="1000" data-aos="fade-right">
            <div class="content">
              <div class="content-text-block">
                <h2 class="content-title heading-md text-black">
                    Innovative Business website solutions in UK & Ireland
                <!--Delivering Innovative website design and development solutions to elevate Your Business across the UK and Ireland.-->
                </h2>
                <p>
                We specialise in delivering innovative website design and development solutions to help businesses across the UK and Ireland stand out online. Our team focuses on developing user-friendly, mobile-responsive, and optimised performance websites, ensuring your business reaches its full digital potential.
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
    Home 5  : Feature Section Custom
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
 
   <div class="home-5_feature-section padding-bottom-120 section-4-new">
<div class="container my-0 ">
  <div class="home-5_feature-section-wrapper">
  <!-- Section Heading -->
  <div class="row justify-content-center text-center">
            <div class="col-xxl-6 col-lg-7 col-md-9 col-sm-12 col-xs-11">
              <div class="section-heading">
                <h2 class="section-heading__title heading-md heading-md--general-sans text-l5-secondary website-design-services-section-heading">Why Choose Our Web Design &amp; Development Services?</h2>
              </div>
            </div>
          </div>

  <div class="row g-4">
    <!-- Box 1 -->
    <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
      <div class="custom-box">
        <div class="feature-widget-2__icon">
                  <img src="./image/web-dev/web-icons/Highly-secured.png" alt="Highly secured">
                </div>
        <!-- <div class="icon">📈</div>  -->
        <h3>Highly secured</h3> <!-- Heading -->
        <p>We prioritise your business website security with robust measures to protect it from threats, ensuring that your business and customer data remain safe and secure.</p>
      </div>
    </div>

    <!-- Box 2 -->
    <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
      <div class="custom-box" >
        <div class="feature-widget-2__icon">
                  <img src="./image/web-dev/web-icons/Creative-Solutions.png" alt="Creative Solutions">
                </div>
        <!-- <div class="icon">🌐</div>  -->
        <h3>Creative Solutions</h3> <!-- Heading -->
        <p>We provide creative solutions that combine innovative design with smart strategies, helping your business stand out in the digital world.</p>
      </div>
    </div>

    <!-- Box 3 -->
    <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
      <div class="custom-box" >
        <div class="feature-widget-2__icon">
                  <img src="./image/web-dev/web-icons/No-Hidden-Charges.png" alt="No Hidden Charges">
                </div>
        <!-- <div class="icon">💼</div>  -->
        <h3>No Hidden Charges</h3> <!-- Heading -->
        <p>With our services, you can expect complete transparency. We believe in honesty, so there are no hidden charges, the price we quote is the price you pay.</p>
      </div>
    </div>
  </div>
</div>
</div>
</div>


<!-- ~~~~~~~~~~~~~~~~~~~~~~~~
    Home 1 : Portfolio Slider Start
~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
 <?php include 'includes/portfolio-slider.php';?>

<style type="text/css">
  .website-design-services-section-heading {
        font-size: 26px !important;
  }
</style>
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
            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-9">
              <div class="section-heading text-center">
                <h2 class="section-heading__title heading-md text-black website-design-services-section-heading">All the Website Design & Development services that are convenient for you</h2>
              </div>
            </div>
          </div>
          <div class="row gutter-y-default justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-10">
              <a href="<?php echo BASE_URL; ?>contact-us" class="service-card   hvr-fill" data-aos-duration="1000" data-aos="fade-right">
                <div class="service-card__icon">
                  <img src="./image/web-dev/web-service-Icons/Web-Design.png" alt="Website Design" class="inline-svg">
                </div>
                <div class="service-card__body">
                  <h3 class="service-card__title">Website Design</h3>
                  <p>Our website design services focus on designing user-friendly websites that are fully responsive and optimised for 
                    performance, ensuring a seamless experience for your Customers.</p>
                  <span class="service-card__link btn-link btn-arrow">Find out more</span>
                </div>
              </a>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-10">
              <a href="<?php echo BASE_URL; ?>contact-us" class="service-card   hvr-fill" data-aos-duration="1000" data-aos="fade-left">
                <div class="service-card__icon">
                  <img src="./image/web-dev/web-service-Icons/web-development.png" alt="web-development" class="inline-svg">
                </div>
                <div class="service-card__body">
                  <h3 class="service-card__title">Website Development</h3>
                  <p>Our website development services ensure your website is developed with the latest technologies
                     to enhance user experience and drive more sales.</p>
                  <span class="service-card__link btn-link btn-arrow">Find out more</span>
                </div>
              </a>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-10">
              <a href="<?php echo BASE_URL; ?>contact-us" class="service-card   hvr-fill" data-aos-duration="1000" data-aos="fade-right">
                <div class="service-card__icon">
                  <img src="./image/web-dev/web-service-Icons/Website-Content.png" alt="Website-Content" class="inline-svg">
                </div>
                <div class="service-card__body">
                  <h3 class="service-card__title">Website Content</h3>
                  <p>Our website content services focus on creating engaging and SEO-friendly content that captures your customer's 
                    attention and improves your website's search engine ranking.</p>
                  <span class="service-card__link btn-link btn-arrow">Find out more</span>
                </div>
              </a>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-10">
              <a href="<?php echo BASE_URL; ?>contact-us" class="service-card   hvr-fill" data-aos-duration="1000" data-aos="fade-left">
                <div class="service-card__icon">
                  <img src="./image/web-dev/web-service-Icons/Maintenance-&-Support.png" alt="Maintenance-&-Support" class="inline-svg">
                </div>
                <div class="service-card__body">
                  <h3 class="service-card__title">Maintenance and Support</h3>
                  <p>Our maintenance and support services ensure your website runs smoothly with regular 
                    updates and security checks, giving you peace of mind.</p>
                  <span class="service-card__link btn-link btn-arrow">Find out more</span>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>






    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~
    Home 1 : social-apps-logo-slider
~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
 <style type="text/css">
  /* Default styling: Hidden by default */
.social-logo-btn-mobile {
  display: none; /* Hidden by default */
}

/* Mobile-specific styling */
@media screen and (max-width: 600px) { /* Adjust the width as per your design */
  .social-logo-btn-mobile {
    display: flex; /* Show on mobile */
    justify-content: center; /* Center horizontally */
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
          <div class="row justify-content-center text-center text-lg-initial justify-content-lg-between social-icon-heading-button">
            <div class="col-xxl-8 col-xl-7 col-lg-8 col-md-9 ">
              <h2 class="section-heading__title heading-md heading-md--general-sans text-l5-secondary website-design-services-section-heading">Elevate your Business online presence with our expert Web Design Services.</h2>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-4">
              <div class="section-heading__button social-logo-btn">
                <a href="<?php echo BASE_URL; ?>contact-us" class="btn-masco btn btn-primary btn-fill--up">
                  <span>Contact Our Experts</span></a>
              </div>
            </div>
          </div>
        </div>
        <div class="ticker-03_section">
          <div class="ticker-03_wrapper">
            <div class="ticker-03_content">
              <div class="ticker-item">
                <img src="./image/brand-logo/web/BS.png" alt="Google">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/CSS3.png" alt="Google">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/HTML5.png" alt="Google">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/JavaScrript.png" alt="Java Scrript">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/React-Native.png" alt="React-Native">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/veu.png" alt="veu">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/Squrespace.png" alt="Squrespace">
              </div>
            </div>
            <div class="ticker-03_content">
              <div class="ticker-item">
                <img src="./image/brand-logo/web/BS.png" alt="Google">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/CSS3.png" alt="Google">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/HTML5.png" alt="Google">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/JavaScrript.png" alt="Java Scrript">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/React-Native.png" alt="React-Native">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/veu.png" alt="veu">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/Squrespace.png" alt="Squrespace">
              </div>
            </div>
            <div class="ticker-03_content">
              <div class="ticker-item">
                <img src="./image/brand-logo/web/BS.png" alt="Google">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/CSS3.png" alt="Google">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/HTML5.png" alt="Google">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/JavaScrript.png" alt="Java Scrript">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/React-Native.png" alt="React-Native">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/veu.png" alt="veu">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/Squrespace.png" alt="Squrespace">
              </div>
            </div>
            <div class="ticker-03_content">
              <div class="ticker-item">
                <img src="./image/brand-logo/web/BS.png" alt="Google">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/CSS3.png" alt="Google">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/HTML5.png" alt="Google">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/JavaScrript.png" alt="Java Scrript">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/React-Native.png" alt="React-Native">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/veu.png" alt="veu">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/Squrespace.png" alt="Squrespace">
              </div>
            </div>
            <div class="ticker-03_content">
              <div class="ticker-item">
                <img src="./image/brand-logo/web/BS.png" alt="Google">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/CSS3.png" alt="Google">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/HTML5.png" alt="Google">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/JavaScrript.png" alt="Java Scrript">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/React-Native.png" alt="React-Native">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/veu.png" alt="veu">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/Squrespace.png" alt="Squrespace">
              </div>
            </div>
            <div class="ticker-03_content">
              <div class="ticker-item">
                <img src="./image/brand-logo/web/BS.png" alt="Google">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/CSS3.png" alt="Google">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/HTML5.png" alt="Google">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/JavaScrript.png" alt="Java Scrript">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/React-Native.png" alt="React-Native">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/veu.png" alt="veu">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/Squrespace.png" alt="Squrespace">
              </div>
            </div>
            <div class="ticker-03_content">
              <div class="ticker-item">
                <img src="./image/brand-logo/web/BS.png" alt="Google">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/CSS3.png" alt="Google">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/HTML5.png" alt="Google">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/JavaScrript.png" alt="Java Scrript">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/React-Native.png" alt="React-Native">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/veu.png" alt="veu">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/Squrespace.png" alt="Squrespace">
              </div>
            </div>
            <div class="ticker-03_content">
              <div class="ticker-item">
                <img src="./image/brand-logo/web/BS.png" alt="Google">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/CSS3.png" alt="Google">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/HTML5.png" alt="Google">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/JavaScrript.png" alt="Java Scrript">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/React-Native.png" alt="React-Native">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/veu.png" alt="veu">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/Squrespace.png" alt="Squrespace">
              </div>
            </div>
            <div class="ticker-03_content">
              <div class="ticker-item">
                <img src="./image/brand-logo/web/BS.png" alt="Google">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/CSS3.png" alt="Google">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/HTML5.png" alt="Google">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/JavaScrript.png" alt="Java Scrript">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/React-Native.png" alt="React-Native">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/veu.png" alt="veu">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/Squrespace.png" alt="Squrespace">
              </div>
            </div>
          </div>
          <div class="ticker-03_wrapper">
            <div class="ticker-03_content ticker-03_content--reverse">
            <div class="ticker-item">
                <img src="./image/brand-logo/web/GoDaddy.png" alt="GoDaddy">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/NameCheap.png" alt="NameCheap">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/WebFlow.png" alt="WebFlow">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/shopify.png" alt="shopify">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/Wix.png" alt="Wix">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/WordPress.png" alt="WordPress">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/mailchimp.png" alt="mailchimp">
              </div>
            </div>
            <div class="ticker-03_content ticker-03_content--reverse">
              <div class="ticker-item">
                <img src="./image/brand-logo/web/GoDaddy.png" alt="GoDaddy">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/NameCheap.png" alt="NameCheap">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/WebFlow.png" alt="WebFlow">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/shopify.png" alt="shopify">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/Wix.png" alt="Wix">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/WordPress.png" alt="WordPress">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/mailchimp.png" alt="mailchimp">
              </div>
            </div>
            <div class="ticker-03_content ticker-03_content--reverse">
              <div class="ticker-item">
                <img src="./image/brand-logo/web/GoDaddy.png" alt="GoDaddy">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/NameCheap.png" alt="NameCheap">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/WebFlow.png" alt="WebFlow">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/shopify.png" alt="shopify">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/Wix.png" alt="Wix">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/WordPress.png" alt="WordPress">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/mailchimp.png" alt="mailchimp">
              </div>
            </div>
            <div class="ticker-03_content ticker-03_content--reverse">
              <div class="ticker-item">
                <img src="./image/brand-logo/web/GoDaddy.png" alt="GoDaddy">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/NameCheap.png" alt="NameCheap">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/WebFlow.png" alt="WebFlow">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/shopify.png" alt="shopify">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/Wix.png" alt="Wix">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/WordPress.png" alt="WordPress">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/mailchimp.png" alt="mailchimp">
              </div>
            </div>
            <div class="ticker-03_content ticker-03_content--reverse">
              <div class="ticker-item">
                <img src="./image/brand-logo/web/GoDaddy.png" alt="GoDaddy">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/NameCheap.png" alt="NameCheap">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/WebFlow.png" alt="WebFlow">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/shopify.png" alt="shopify">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/Wix.png" alt="Wix">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/WordPress.png" alt="WordPress">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/mailchimp.png" alt="mailchimp">
              </div>
            </div>
            <div class="ticker-03_content ticker-03_content--reverse">
              <div class="ticker-item">
                <img src="./image/brand-logo/web/GoDaddy.png" alt="GoDaddy">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/NameCheap.png" alt="NameCheap">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/WebFlow.png" alt="WebFlow">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/shopify.png" alt="shopify">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/Wix.png" alt="Wix">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/WordPress.png" alt="WordPress">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/mailchimp.png" alt="mailchimp">
              </div>
            </div>
            <div class="ticker-03_content ticker-03_content--reverse">
              <div class="ticker-item">
                <img src="./image/brand-logo/web/GoDaddy.png" alt="GoDaddy">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/NameCheap.png" alt="NameCheap">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/WebFlow.png" alt="WebFlow">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/shopify.png" alt="shopify">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/Wix.png" alt="Wix">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/WordPress.png" alt="WordPress">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/mailchimp.png" alt="mailchimp">
              </div>
            </div>
            <div class="ticker-03_content ticker-03_content--reverse">
              <div class="ticker-item">
                <img src="./image/brand-logo/web/GoDaddy.png" alt="GoDaddy">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/NameCheap.png" alt="NameCheap">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/WebFlow.png" alt="WebFlow">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/shopify.png" alt="shopify">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/Wix.png" alt="Wix">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/WordPress.png" alt="WordPress">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/mailchimp.png" alt="mailchimp">
              </div>
            </div>
            <div class="ticker-03_content ticker-03_content--reverse">
              <div class="ticker-item">
                <img src="./image/brand-logo/web/GoDaddy.png" alt="GoDaddy">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/NameCheap.png" alt="NameCheap">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/WebFlow.png" alt="WebFlow">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/shopify.png" alt="shopify">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/Wix.png" alt="Wix">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/WordPress.png" alt="WordPress">
              </div>
              <div class="ticker-item">
                <img src="./image/brand-logo/web/mailchimp.png" alt="mailchimp">
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="social-logo-btn-mobile center">
            <a href="<?php echo BASE_URL; ?>contact-us" class="btn-masco btn-masco--header rounded-pill btn-fill--up">
              <span>Contact Our Experts!</span></a>
          </div>
        </div>
      </div>
    </div>
 <!-- ~~~~~~~~~~~~~~~~~~~~~~~~
    Home 1 : Portfolio Slider End
~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

<style type="text/css">
  @media (max-width: 600px) {
  .process-widget {
    border: 1px solid #e0e0e0;
    border-radius: 10px;
    padding: 20px;
/*    margin-bottom: 20px;*/
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
    background-color: #fff;
  }
}


</style>
 <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Home 5  : Process Section
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <div class="home-5_process-section bg-offwhite-3 process-section">
      <div class="container">
        <div class="home-5_process-devider">
          <div class="row justify-content-center text-center">
            <div class="col-xxl-8 col-xl-9 col-lg-9 col-md-10">
              <div class="section-heading">
                <h2 class="section-heading__title fw-600 heading-md heading-md--general-sans text-l5-secondary process-heading">We follow a Professional, straightforward and efficient website design and development process</h2>
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
                  <p>Analyzing your business needs and audience to create a tailored web design strategy that drives results.</p>
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
                  <p>Building a stunning, responsive website with top-notch functionality and seamless navigation for a better user experience.</p>
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
                  <p>Optimising your website for speed and performance, ensuring it's fully functional before going live.</p>
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
<div class="home-3_testimonial section-padding-120 testimonial-section section-padding-120" id="testimonial">
  <div class="container">
    <!-- Section Title -->
     <div class="section-heading section-heading--row">
          <div class="row text-center text-lg-initial justify-content-center justify-content-lg-between">
            <div class="col-xxl-9 col-lg-9 col-md-9 col-11">
              <h2 class="section-heading__title testimonial-heading-md text-black">Join Our Happy Clients – Let’s Elevate Your Business!</h2>
            </div>
            <div class="col-xl-3 col-md-4">
              <div class="section-heading__button testimonial-btn">
                <a href="<?php echo BASE_URL; ?>contact-us" class="btn-masco btn-primary-l03 btn-shadow rounded-pill">
                  <span>Get Started Today!</span></a>
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
    The comprehensive services have been a blessing for my brand. They handled everything – web development, SEO, graphics, and social media – with perfection. Truly my best business partner!
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
    I’m thrilled with the graphics designed for my brand! Their creativity and professionalism are unmatched. They perfectly captured my vision, enhancing my brand identity. Highly recommend them!
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
    The social media services were transformative. From strategy to execution, their campaigns boosted my engagement and followers quickly. I’m so impressed with the results delivered by their team!
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
    Thanks to their SEO, my website’s traffic has soared! Their tailored strategies for my niche worked wonders, and I’m now outranking my competition on major search engines. Amazing results!
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
    The web development team revamped my outdated site into a sleek, modern, and user-friendly platform. The attention to detail and responsiveness were incredible. I highly recommend their expertise!
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
    This all-in-one service is amazing! From development to marketing, their team excels. My business has grown steadily, thanks to their expertise in every area they’ve handled. Great work!
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
    The SEO work made my site visible to the right audience. The boost in inquiries is incredible! Their attention to detail and expertise made all the difference. I’m so grateful!
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
    The graphic designs exceeded my expectations. They created visuals that perfectly match my vision. I’ve received so much praise from clients for the branding updates. Amazing work overall!
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
    Their social media team is outstanding. They created beautiful campaigns that match my brand and drove engagement like never before. My following has grown, and so has my business!
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
    Their web development team amazed me with their skills. My website is now fast, stunning, and functional. They brought my ideas to life with professionalism and care. Great job!
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
    Their SEO service made a huge difference! My website now ranks higher than ever, and I’ve seen real results in terms of traffic and sales. Their strategies are spot-on!
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
    Their team excels in everything from websites to graphics. They made my online presence much stronger, and I can’t thank them enough for their expertise and dedication. Highly recommended!
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
                What is included in your website design package?
                </button>
                <div id="home-1-faq-item" class="accordion-collapse collapse show" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  Our website design package includes custom design, mobile responsiveness, user-friendly navigation, SEO optimisation, and integration of your business identity. 
                  We also provide initial setup and basic training for easy content management.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-2" aria-expanded="false" aria-controls="home-1-faq-item-2">
                How much does a website cost?
                </button>
                <div id="home-1-faq-item-2" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  The cost of a website depends on its complexity and the features you need. We offer flexible packages starting from £499, 
                  and we can provide a solution that fits your specific requirements and budget.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-3" aria-expanded="false" aria-controls="home-1-faq-item-3">
                How long does it take to build a website?
                </button>
                <div id="home-1-faq-item-3" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  The timeline for website development varies depending on the complexity and size of the project. 
                  On average, it takes 2-4 weeks from the initial design phase to the final launch.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-4" aria-expanded="false" aria-controls="home-1-faq-item-4">
                Do you offer website redesign services?
                </button>
                <div id="home-1-faq-item-4" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  Yes, we offer comprehensive website redesign services. We focus on improving user experience, 
                  modernising design, and enhancing functionality to better serve your business goals.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-5" aria-expanded="false" aria-controls="home-1-faq-item-5">
                Will my website be mobile-friendly?
                </button>
                <div id="home-1-faq-item-5" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  Absolutely! All our websites are fully mobile-responsive, ensuring they look 
                  great and function smoothly on all devices, including smartphones and tablets.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-6" aria-expanded="false" aria-controls="home-1-faq-item-6">
                Can I update my website after it’s developed?
                </button>
                <div id="home-1-faq-item-6" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                    Yes, we provide user-friendly content management systems (CMS) like WordPress, allowing you to easily update text, 
                    images, and other content on your website without technical knowledge.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-7" aria-expanded="false" aria-controls="home-1-faq-item-7">
                Do you offer e-commerce website development?
                </button>
                <div id="home-1-faq-item-7" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  Yes, we specialise in creating e-commerce websites with secure payment gateways, easy product management, and a smooth customer shopping experience. 
                  We can build your online store using platforms like WooCommerce or Shopify.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-8" aria-expanded="false" aria-controls="home-1-faq-item-8">
                Will my website be secure from cyber threats?
                </button>
                <div id="home-1-faq-item-8" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  Yes, security is a top priority. To ensure your website safety, we implement best practices for website security, including SSL certificates, 
                  regular security updates, and protection against hacking attempts.
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
       
      </div>
    </div>

<!-- Contact Us Section -->
<?php include 'includes/contact-us-section.php'; ?>
<!-- Contact us Section -->


    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Home 8  : Blogs Section 
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <!--<div class="home-8_blog-section padding-bottom-120 padding-top-120 bg-cream " id="blog">-->
    <!--  <div class="container">-->
    <!--    <div class="row justify-content-center text-center">-->
    <!--      <div class="col-xxl-7 col-xl-8 col-lg-9 col-md-10 col-auto">-->
    <!--        <div class="section-heading">-->
    <!--          <h2 class="section-heading__title heading-lg text-black-2">Browse our articles and resources to learn more</h2>-->
    <!--          <p>A lot of information is given in our blogs. You can learn-->
    <!--            more about startup by reading our blogs.-->
    <!--            It’s time to brainstorm ideas for your business</p>-->
    <!--        </div>-->
    <!--      </div>-->
    <!--    </div>-->
    <!--    <div class="row gutter-y-default justify-content-center">-->
    <!--      <div class="col-lg-4 col-md-6 col-sm-8">-->
    <!--        <div class="blog-card h-100">-->
    <!--          <div class="blog-card__image">-->
    <!--            <img src="./image/home-1/blog-image-1.png" alt="image alt">-->
    <!--            <a href="#" class="blog-card__badge">Startup</a>-->
    <!--          </div>-->
    <!--          <div class="blog-card__body">-->
    <!--            <div class="blog-card__meta">-->
    <!--              <span><img src="./image/home-8/blog-card-icon-1.svg" alt="icon">Adam Smith</span>-->
    <!--              <span><img src="./image/home-8/blog-card-icon-2.svg" alt="calender">Feb 28, 2023</span>-->
    <!--            </div>-->
    <!--            <h3 class="blog-card__title">Benefits to first-generation low-income entrepreneurs</h3>-->
    <!--            <a href="#" class="blog-card__link btn-link btn-arrow">Read more </a>-->
    <!--          </div>-->
    <!--        </div>-->
    <!--      </div>-->
    <!--      <div class="col-lg-4 col-md-6 col-sm-8">-->
    <!--        <div class="blog-card h-100">-->
    <!--          <div class="blog-card__image">-->
    <!--            <img src="./image/home-1/blog-image-2.png" alt="image alt">-->
    <!--            <a href="#" class="blog-card__badge">Entrepreneurship</a>-->
    <!--          </div>-->
    <!--          <div class="blog-card__body">-->
    <!--            <div class="blog-card__meta">-->
    <!--              <span><img src="./image/home-8/blog-card-icon-1.svg" alt="icon">Max Wevar</span>-->
    <!--              <span><img src="./image/home-8/blog-card-icon-2.svg" alt="calender">Feb 10, 2023</span>-->
    <!--            </div>-->
    <!--            <h3 class="blog-card__title">Dangers of a traditional for your career goal</h3>-->
    <!--            <a href="#" class="blog-card__link btn-link btn-arrow">Read more </a>-->
    <!--          </div>-->
    <!--        </div>-->
    <!--      </div>-->
    <!--      <div class="col-lg-4 col-md-6 col-sm-8">-->
    <!--        <div class="blog-card h-100">-->
    <!--          <div class="blog-card__image">-->
    <!--            <img src="./image/home-1/blog-image-3.png" alt="image alt">-->
    <!--            <a href="#" class="blog-card__badge">Technology</a>-->
    <!--          </div>-->
    <!--          <div class="blog-card__body">-->
    <!--            <div class="blog-card__meta">-->
    <!--              <span><img src="./image/home-8/blog-card-icon-1.svg" alt="icon">Willium Jons</span>-->
    <!--              <span><img src="./image/home-8/blog-card-icon-2.svg" alt="calender">Feb 03, 2023</span>-->
    <!--            </div>-->
    <!--            <h3 class="blog-card__title">How to increase ad revenue in mobile applications</h3>-->
    <!--            <a href="#" class="blog-card__link btn-link btn-arrow">Read more </a>-->
    <!--          </div>-->
    <!--        </div>-->
    <!--      </div>-->
    <!--    </div>-->
    <!--  </div>-->
    <!--</div>-->


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
                <h2 class="heading-md heading-md--general-sans text-l5-secondary">Let's Design your Business Website together</h2>
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




 <?php include 'includes/footer.php'; ?>