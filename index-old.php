


<?php 

include 'includes/header.php';

require 'rfzwebdb.php';

?>



 <!--~~~~~~~~~~~~~~~~~~~~~~~~
     navbar-
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Home 1  : Hero Section 
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <!--<div class="home-1_hero-section" id="hero">-->
    <!--  <div class="home-1_hero-shape-1">-->
    <!--    <img src="./image/home-1/hero-shape-1.svg" alt="image alt">-->
    <!--  </div>-->
    <!--  <div class="home-1_hero-shape-2">-->
    <!--    <img src="./image/home-1/hero-shape-2.svg" alt="image alt">-->
    <!--  </div>-->
    <!--  <div class="container">-->
    <!--    <div class="row row--hero-content change-order">-->
    <!--      <div class="col-xxl-auto col-lg-6 col-md-7 col-sm-8 col-10 " data-aos-duration="1000" data-aos="fade-left" data-aos-delay="300">-->
    <!--        <div class="home-1_hero-image-block">-->
    <!--          <div class="home-1_hero-image">-->
    <!--            <img src="./image/home-1/Home-Hero-Image.webp" alt="hero image">-->
                
    <!--          </div>-->
    <!--        </div>-->
    <!--      </div>-->
    <!--      <div class="col-xxl-auto col-lg-6 col-md-10" data-aos-duration="1000" data-aos="fade-right" data-aos-delay="300">-->
    <!--        <div class="home-1_hero-content">-->
    <!--          <div class="home-1_hero-content-text">-->
    <!--            <h1 class="hero-content__title heading-xxl">-->
    <!--            Driving Digital Growth for Business across the UK & Ireland.-->
    <!--            </h1>-->
    <!--            <p>-->
    <!--            We help businesses in the UK and Ireland grow online. Our digital marketing services are designed to increase your visibility, attract the right customers, and deliver real results for your business.-->
    <!--            </p>-->
    <!--          </div>-->
    <!--          <div class="home-1_hero-newsletter">-->
    <!--            <form action="#" class="newsletter-form-1">-->
    <!--              <input type="email" placeholder="Enter your email" class="form-control">-->
    <!--              <button class="btn-masco rounded-pill">Subscribe</button>-->
    <!--            </form>-->
    <!--          </div>-->
    <!--        </div>-->
    <!--      </div>-->
    <!--    </div>-->
    <!--  </div>-->
    <!--</div>-->



<div class="home-1_hero-section" id="hero">
   <div class="home-1_hero-shape-1">
        <img src="./image/side-svgs/Home-side-image1.svg" alt="SVG Image" width="607" height="792">
      </div>
      <div class="home-1_hero-shape-2">
        <img src="./image/side-svgs/Home-side-image2.svg" alt="SVG Image" width="607" height="792">
      </div>
  <div class="container">
    <div class="row row--hero-content change-order">
      <div class="col-xxl-auto col-lg-6 col-md-7 col-sm-8 col-10" data-aos-duration="1000" data-aos="fade-left" data-aos-delay="300">
        <div class="home-1_hero-image-block">
          <div class="home-1_hero-image">
            <!--<img src="./image/home-1/Home-Hero-Image.webp" alt="hero image">-->
            <img src="./image/home-1/HomePage-hero-image.webp" alt="hero image">
          </div>
        </div>
      </div>
      <div class="col-xxl-auto col-lg-6 col-md-10" data-aos-duration="1000" data-aos="fade-right" data-aos-delay="300">
        <div class="home-1_hero-content">
          <div class="home-1_hero-content-text">
            <h1 class="hero-content__title heading-xxl ">
              Digital Growth for Business across the <span class="country-background">UK & Ireland</span>
            </h1>
            <p>
              We help businesses in UK & Ireland grow online. Our digital marketing services are designed to increase your visibility, attract the right customers, and deliver real results.
            </p>
          </div>
          <div class="home-1_hero-newsletter">
            <form action="#" class="newsletter-form-1">
              <input type="email" placeholder="Enter your email" class="form-control">
              <button class="btn-masco rounded-pill">Contact Us</button>
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


<!-- ~~~~~~~~~~~~~~~~~~~~~~~~
    Home 1 : Brand Section
~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
 <?php include 'includes/logo-slider.php';?>
    




    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Home 1  : Content Section 2
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <div class="home-1_content-section-2 padding-bottom-120" >
      <div class="container">
        <div class="row row--custom change-order ">
          <div class="col-xl-5 col-lg-5 col-auto" data-aos-duration="1000" data-aos="fade-right">
            <div class="home-1_content-image-2 content-image--mobile-width">
              <img src="./image/home-1/Home-Section-7.webp" alt="alternative text">
              <!--<div class="home-1_content-image-2-shape">-->
              <!--  <img src="./image/home-1/content-image-2-shape.svg" alt="alternative text">-->
              <!--</div>-->
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
    Home 5  : Feature Section
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <!--<div class="home-5_feature-section padding-bottom-120 bg-cream">-->
    <!--  <div class="container">-->
    <!--    <div class="home-5_feature-section-wrapper">-->
    <!--      <div class="row justify-content-center text-center">-->
    <!--        <div class="col-xxl-6 col-lg-7 col-md-9 col-sm-12 col-xs-11">-->
    <!--          <div class="section-heading">-->
    <!--            <h2 class="section-heading__title heading-md heading-md--general-sans text-l5-secondary">Turn traffic with insanely SEO &amp; growth into revenue</h2>-->
    <!--          </div>-->
    <!--        </div>-->
    <!--      </div>-->
    <!--      <div class="row feature-widget-devider justify-content-center">-->
    <!--        <div class="col-lg-4 col-md-6 col-sm-10" data-aos="fade-up" data-aos-delay="100">-->
    <!--          <div class="feature-widget-2">-->
    <!--            <div class="feature-widget-2__icon">-->
    <!--              <img src="./image/home-1/feature-1.png" alt="feature icon">-->
    <!--            </div>-->
    <!--            <h4 class="feature-widget-2__title">Innovative Solution</h4>-->
    <!--            <p>We provide creative digital marketing solutions that are designed to meet your unique business needs and drive impactful results.</p>-->
    <!--          </div>-->
    <!--        </div>-->
    <!--        <div class="col-lg-4 col-md-6 col-sm-10" data-aos="fade-up" data-aos-delay="200">-->
    <!--          <div class="feature-widget-2">-->
    <!--            <div class="feature-widget-2__icon">-->
    <!--              <img src="./image/home-5/feature-2.png" alt="feature icon">-->
    <!--            </div>-->
    <!--            <h4 class="feature-widget-2__title">Client-Centric Approach</h4>-->
    <!--            <p>Our client-centric approach focuses on understanding your business goals and delivering customised strategies that drive success</p>-->
    <!--          </div>-->
    <!--        </div>-->
    <!--        <div class="col-lg-4 col-md-6 col-sm-10" data-aos="fade-up" data-aos-delay="300">-->
    <!--          <div class="feature-widget-2">-->
    <!--            <div class="feature-widget-2__icon">-->
    <!--              <img src="./image/home-5/feature-3.png" alt="feature icon">-->
    <!--            </div>-->
    <!--            <h4 class="feature-widget-2__title">Transparent Pricing</h4>-->
    <!--            <p>We offer clear, Transparent pricing with no hidden fees, so you always know what you're paying for and can make informed decisions</p>-->
    <!--          </div>-->
    <!--        </div>-->
    <!--      </div>-->
    <!--    </div>-->
    <!--  </div>-->
    <!--</div>-->
    
    

    
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
                <h2 class="section-heading__title heading-md heading-md--general-sans text-l5-secondary section-3-heading">Turn traffic with insanely SEO &amp; growth into revenue</h2>
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

<!-- ~~~~~~~~~~~~~~~~~~~~~~~~
    Home 1 : social-apps Section
~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
 <?php include 'includes/social-apps-logo-slider.php';?>


     <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Home 1 : Service Section
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--<div class="home-1_service-section padding-bottom-120 .services-page-service-section" id="feature" style="background: linear-gradient(45deg, #a5c7eb, #f4feff);">-->
    <!--  <div class="home-1_service-section-shape">-->
    <!--    <img src="./image/home-1/service-section-shape.svg" alt="image alt">-->
    <!--  </div>-->
    <!--  <div class="container">-->
    <!--    <div class="home-1_service-section-wrapper">-->
    <!--      <div class="row justify-content-center">-->
    <!--        <div class="col-xxl-6 col-xl-7 col-lg-8 col-md-9">-->
    <!--          <div class="section-heading text-center">-->
    <!--            <h2 class="section-heading__title heading-md text-black">All the digital services that are convenient for you</h2>-->
    <!--          </div>-->
    <!--        </div>-->
    <!--      </div>-->
    <!--      <div class="row gutter-y-default justify-content-center">-->
    <!--        <div class="col-xl-6 col-lg-6 col-md-10">-->
    <!--          <a href="service-details.html" class="service-card   hvr-fill" data-aos-duration="1000" data-aos="fade-right">-->
    <!--            <div class="service-card__icon">-->
    <!--              <img src="./image/icons/icon-service-1.svg" alt="image alt" class="inline-svg">-->
    <!--            </div>-->
    <!--            <div class="service-card__body">-->
    <!--              <h3 class="service-card__title">Website Design &amp; Development</h3>-->
    <!--              <p>We design and develop websites that are user-friendly and developed to drive results for your business</p>-->
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
    <!--              <h3 class="service-card__title">Search Engine Optimisation</h3>-->
    <!--              <p>We optimise your website to rank higher on search engines, driving more website traffic to bring more sales.</p>-->
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
    <!--              <h3 class="service-card__title">Social Media Management</h3>-->
    <!--              <p>We manage your social media presence, creating engaging content that grows your business and drives sales.</p>-->
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
    <!--              <h3 class="service-card__title">Graphic Design</h3>-->
    <!--              <p>Our team creates high-quality designs that enhance your business identity and drive more conversions.</p>-->
    <!--              <span class="service-card__link btn-link btn-arrow">Find out more</span>-->
    <!--            </div>-->
    <!--          </a>-->
    <!--        </div>-->
           
    <!--      </div>-->
    <!--    </div>-->
    <!--  </div>-->
    <!--</div>-->

 <!-- Services Section -->
<div class="section-service-gradient-bg" style="background: linear-gradient(to bottom, #f8f9fa, #eaf2fd); padding: 70px 0; text-align: center;">
    <!-- Top Center Heading -->
    <h2 class="section-headingg">
        All the digital services that are convenient for your Business
    </h2>
    <div class="container">
        <div class="row g-4">
            <!-- Card 1 -->
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card h-100">
                    <h5 class="card-title">Website Design and Development</h5>
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
                    <h5 class="card-title">Search Engine Optimisation</h5>
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
                    <h5 class="card-title">Social Media Management</h5>
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
                    <h5 class="card-title">Graphic Design</h5>
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

<!-- testimonial us Section -->

<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Home 3  : Testimonial Section 
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <!-- testimonialSection -->
<?php include 'includes/testimonial2.php'; ?>
<!-- testimonial us Section -->

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
              <img src="./image/home-1/Section-Three.webp" alt="alternative text">
              <!--<div class="home-1_content-image-1-shape">-->
              <!--  <img src="./image/home-1/content-image-1-shape.svg" alt="alternative text">-->
              <!--</div>-->
            </div>
          </div>
          <div class="col-xl-6 col-lg-7 col-md-10 col-auto" data-aos-duration="1000" data-aos="fade-right">
            <div class="content">
              <div class="content-text-block">
                <h2 class="content-title heading-md text-black">
                Experts in Digital Marketing for Sustainable Business Growth
                </h2>
                <p>
                Our team of digital marketing experts is dedicated to helping your business grow steadily. 
                We focus on creating customised strategies that enhance your online presence, drive quality traffic, and ensure long-term results for your business.
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
                What digital marketing services do you offer?
                </button>
                <div id="home-1-faq-item" class="accordion-collapse collapse show" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  We offer a wide range of services, including website design and development, search engine optimisation (SEO), social media management, graphic design, pay-per-click (PPC) advertising, email marketing, content creation, and more.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-2" aria-expanded="false" aria-controls="home-1-faq-item-2">
                How can digital marketing help my business?
                </button>
                <div id="home-1-faq-item-2" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  Digital marketing helps your business reach a larger audience, engage with potential customers, and drive more traffic to your website, ultimately increasing your sales and revenue.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-3" aria-expanded="false" aria-controls="home-1-faq-item-3">
                How do you customise your services to my business needs?
                </button>
                <div id="home-1-faq-item-3" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  We start by understanding your unique goals, target audience, and challenges. From there, we create customised strategies to ensure your digital marketing efforts are aligned with your objectives and deliver the best possible results.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-4" aria-expanded="false" aria-controls="home-1-faq-item-4">
                How long does it take to see results from digital marketing?
                </button>
                <div id="home-1-faq-item-4" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  Results vary depending on the service and your specific goals. For SEO, it can take 1 ~ 3 Months to see significant changes, while paid ads or social media campaigns can show quicker results. We always provide clear expectations and measurable goals.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-5" aria-expanded="false" aria-controls="home-1-faq-item-5">
                How much does digital marketing cost?
                </button>
                <div id="home-1-faq-item-5" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  Pricing varies based on the services you need and the scale of your project. We offer transparent pricing with no hidden fees, and we'll work with you to create a plan that fits your budget and goals.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-1-faq-item-6" aria-expanded="false" aria-controls="home-1-faq-item-6">
                How will I know if my marketing efforts are working?
                </button>
                <div id="home-1-faq-item-6" class="accordion-collapse collapse" data-bs-parent="#home-1-faq">
                  <div class="accordion-item__body">
                  We provide detailed analytics and regular reports to track the performance of your campaigns. You'll have clear insights into key metrics, such as traffic, conversions, and engagement, to evaluate success and make informed decisions.
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

    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Home 8  : Blogs Section 
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <!--<div class="home-8_blog-section padding-bottom-120 padding-top-120 bg-cream" id="blog">-->
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
            <div class="col-xxl-6 col-xl-7 col-lg-8 col-md-10 col-12">
              <div class="cta-text-block">
                <h2 class="heading-md heading-md--general-sans text-l5-secondary">Are you ready to increase your SEO ranking?</h2>
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