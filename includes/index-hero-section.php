

<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Home 1  : Hero Section 
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
<style type="text/css">
  /* Default styling for mobile hero section */
.home-1_hero-section-mobile {
  display: none; /* Hide by default */
  background-size: cover;
  background-position: center;
  background-image: url('./image/home-1/mobile-home-slider2-2.png'); /* Single background image */
  height: 100vh; /* Full viewport height */
  position: relative;
  overflow: hidden;
  color: #fff; /* Adjust text color if needed */
}
.hidden {
    display: none; /* Hide the original hero section */
  }
/* Mobile view */
@media (max-width: 992px) {
  .hidden {
    display: none; /* Hide the original hero section */
  }

  .home-1_hero-section-mobile {
    display: block; /* Show the new mobile hero section */
  }
  .site-header {
    background-color: transparent !important; 
}
.home-1_hero-section-mobile {
    height: 85vh;
  }
  .home-1_hero-content-mobile .hero-content__title {
  font-size: 42px !IMPORTANT; /* Adjust font size for better readability */
  line-height: 1.2; /* Line height for better spacing */
  font-family: onest;
}
}
.home-1_hero-section-mobile {
    display: block; /* Show the new mobile hero section */
  }

/* Background images for the slider */
.home-1_hero-section-mobile::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: -1;
  animation: mobileHeroSlider 9s infinite; /* Change slide every 3s */
  background-size: cover;
  background-position: center;
}

/* Keyframes for sliding background */
/*@keyframes mobileHeroSlider {*/
/*  0% {*/
/*    background-image: url('./image/home-1/mobile-home-slider2-2.png');*/
/*  }*/
/*  33% {*/
/*    background-image: url('./image/home-1/mobile-home-slider2-2.png');*/
/*  }*/
/*  66% {*/
/*    background-image: url('./image/home-1/mobile-home-slider2-2.png');*/
/*  }*/
/*  100% {*/
/*    background-image: url('./image/home-1/mobile-home-slider2-2.png');*/
/*  }*/
/*}*/

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
@media (max-width: 1200px) {
  .responsive-break {
    display: block;
  }
}

</style>


<div class="home-1_hero-section-mobile" id="hero-mobile">
  <div class="container h-100">
    <div class="row h-100 align-items-center">
      <!-- Left content -->
      <div class="col-12 col-md-6 d-flex flex-column justify-content-end home-1_hero-content-mobile">
        
        <div>
          <h1 class="hero-content__title heading-xl">
            Digital Growth for Business across the <span class="responsive-break"> </span><span class="country-backgrund responsive-break" id="animated-text"></span><span id="cursor">|</span>
          </h1>
          <p>
            We help businesses in UK & Ireland grow online. Our digital marketing services are designed to increase your visibility, attract the right customers, and deliver real results.
          </p>
          <button class="btn mobile-hero-btn">Get Started</button>
        </div> 
      </div>
      <!-- Right content (empty) -->
      <div class="col-12 col-md-6"></div>
    </div>
  </div>
</div>

<style>
  /* Cursor Styling */
  #cursor {
    /*display: inline-block;*/
    width: 0.1em;
    height: 1em;
    /*background-color: black;*/
    margin-left: 2px;
    animation: blink 0.8s steps(2, start) infinite;
    vertical-align: middle;
  }

  @keyframes blink {
    50% {
      opacity: 0;
    }
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


