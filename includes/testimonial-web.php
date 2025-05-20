 <!-- Testimonial Slider Start -->
<style type="text/css">
/* General Slider Styling */
.testimonial-slider {
  width: 100%;
  overflow: hidden;
  position: relative;
  background-color: #fafafa;
  padding: 20px 0;
}

.slider-wrapper {
  display: flex;
  gap: 20px;
  width: 100%;
  animation: slide-left 30s linear infinite; /* Default animation */
}

.testimonial-card {
  flex: 0 0 calc(33.33% - 20px); /* Responsive cards, 3 per row */
  background: #fff;
  border: 1px solid #e6e6e6;
  border-radius: 10px;
  padding: 20px;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
  text-align: center;
  font-family: Arial, sans-serif;
  box-sizing: border-box;
  min-width: 300px; /* Prevent cards from shrinking */
  transition: transform 0.5s ease;
}

.testimonial-card__star {
  width: 60px;
  margin-bottom: 10px;
}

.testimonial-card__title {
  font-size: 1.5rem;
  margin: 10px 0;
  color: #333;
}

.testimonial-card__author {
  display: flex; /* Flexbox for alignment */
  justify-content: space-between; /* Push left and right elements apart */
  align-items: center; /* Vertically center items */
  margin-top: 15px; /* Add some spacing from content */
}

.testimonial-card__author-image img {
  width: 40px; /* User image size */
  height: 40px;
  border-radius: 50%; /* Circular image */
  object-fit: cover;
}

.testimonial-card__author-name {
  margin-left: 5px; /* Small gap between image and name */
  font-size: 1rem; /* Adjust font size */
  color: #333; /* Text color */
}

.testimonial-card__star {
  width: 70px; /* Adjust star size */
  height: auto;
}
.testimonial-card__author-info h4 {
  margin-top: 10px;
  font-size: 1.2rem;
  color: #333;
}

/* Animation for Sliders */
.slider-left {
  animation: slide-left 50s linear infinite; /* Speed adjusted */
}

@keyframes slide-left {
  0% {
    transform: translateX(0);
  }
  100% {
    transform: translateX(-100%); /* Move only half since it's duplicated */
  }
}

.slider-right {
  animation: slide-right 50s linear infinite; /* Speed adjusted */
}

@keyframes slide-right {
  0% {
    transform: translateX(-100%); /* Move only half since it's duplicated */
  }
  100% {
    transform: translateX(0%);
  }
}

/* Responsive Adjustments */
@media (max-width: 768px) {
  .testimonial-card {
    flex: 0 0 calc(50% - 20px); /* Show 2 cards per row on smaller screens */
  }
}
@media (max-width: 600px) {
  .testimonial-heading-md{
    font-size: 26px !IMPORTANT;
}
.slider-left {
  animation: slide-left 20s linear infinite; /* Speed adjusted */
}
.slider-right {
  animation: slide-right 20s linear infinite; /* Speed adjusted */
}
}

.testimonial-btn .btn-masco {
    --btn-spacing-x: 34px; /* Modify the horizontal spacing only for this button */
}
.section-heading--row > .row {
    justify-content: space-between;
    align-items: center !important;
    --bs-gutter-y: 30px;
</style>

<div class="home-3_testimonial section-padding-120 testimonial-section section-padding-120" id="testimonial">
  <div class="container">
    <!-- Section Title -->
     <div class="section-heading section-heading--row">
          <div class="row text-center text-lg-initial justify-content-center justify-content-lg-between">
            <div class="col-xxl-9 col-lg-7 col-md-8 col-11">
              <h2 class="section-heading__title heading-md text-black">Businesses across the UK and Ireland trust RFZ Digital for professional website design</h2>
            </div>
            <div class="col-xl-3 col-md-4 d-flex align-items-center">
              <div class="section-heading__button testimonial-btn ">
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
        <img src="./image/home-1/Dianne Russell-Testimonial2.webp" alt="author" />
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
        <img src="./image/home-1/Guy Hawkins-Testimonial6.webp" alt="author" />
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
        <img src="./image/home-1/Marvin McKinney-Testimonial3.webp" alt="author" />
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
        <img src="./image/home-1/Ronald Richards-Testimonial1.webp" alt="author" />
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
        <img src="./image/home-1/Kristin Watson-Testimonial5.webp" alt="author" />
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
        <img src="./image/home-1/Karen Lynn-Testimonial1.webp" alt="author" />
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
        <img src="./image/home-1/Sophia-Carter-Testimonial7.webp" alt="author" />
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
        <img src="./image/home-1/Testimonial8.webp" alt="author" />
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
        <img src="./image/home-1/Testimonial9.webp" alt="author" />
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
        <img src="./image/home-1/Testimonial10.webp" alt="author" />
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
        <img src="./image/home-1/Testimonial11.webp" alt="author" />
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
        <img src="./image/home-1/Testimonial12.webp" alt="author" />
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
