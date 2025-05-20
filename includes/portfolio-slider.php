<style>
    .slider-container {
      position: relative;
      overflow: hidden;
      width: 100%;
      background-color: #f4feff;
    }

    .slider-track {
      display: flex;
      width: calc(100% * 2);
      animation: scroll-left 80s linear infinite;
      gap: 5px;
    }

    .slider-container.slider-rtl .slider-track {
      animation: scroll-right 80s linear infinite;
    }

    .slider-container img {
      width: calc(100% / 7);
      flex-shrink: 0;
    }

    @keyframes scroll-left {
      0% { transform: translateX(0); }
      100% { transform: translateX(-100%); }
    }

    @keyframes scroll-right {
  0% { transform: translateX(-100%); }
  100% { transform: translateX(0); }
}

@media (max-width: 600px) {
        .slider-container img {
      width: calc(100% / 4);
      flex-shrink: 0;
    }
    }
  </style>


  <div class="slider-container">
    <div class="slider-track right-move">
      
      <img src="./image/portfolio-images/portfolio-image1.webp" alt="Image 1">
      <img src="./image/portfolio-images/portfolio-image2.webp" alt="Image 2">
      <img src="./image/portfolio-images/portfolio-image3.webp" alt="Image 3">
      <img src="./image/portfolio-images/portfolio-image4.webp" alt="Image 4">
      <img src="./image/portfolio-images/portfolio-image5.webp" alt="Image 5">
      <img src="./image/portfolio-images/portfolio-image6.webp" alt="Image 6">
      <img src="./image/portfolio-images/portfolio-image7.webp" alt="Image 7">
      <img src="./image/portfolio-images/portfolio-image8.webp" alt="Image 8">
      <img src="./image/portfolio-images/portfolio-image9.webp" alt="Image 9">
      <img src="./image/portfolio-images/portfolio-image10.webp" alt="Image 10">
      <img src="./image/portfolio-images/portfolio-image11.webp" alt="Image 11">
      <img src="./image/portfolio-images/portfolio-image12.webp" alt="Image 12">
      <img src="./image/portfolio-images/portfolio-image13.webp" alt="Image 13">
      <!-- Duplicate for seamless looping -->
      
      <img src="./image/portfolio-images/portfolio-image13.webp" alt="Image 1">
      <img src="./image/portfolio-images/portfolio-image12.webp" alt="Image 2">
      <img src="./image/portfolio-images/portfolio-image11.webp" alt="Image 3">
      <img src="./image/portfolio-images/portfolio-image10.webp" alt="Image 4">
      <img src="./image/portfolio-images/portfolio-image9.webp" alt="Image 5">
      <img src="./image/portfolio-images/portfolio-image8.webp" alt="Image 6">
      <img src="./image/portfolio-images/portfolio-image7.webp" alt="Image 7">
      <img src="./image/portfolio-images/portfolio-image6.webp" alt="Image 8">
      <img src="./image/portfolio-images/portfolio-image5.webp" alt="Image 9">
      <img src="./image/portfolio-images/portfolio-image4.webp" alt="Image 10">
      <img src="./image/portfolio-images/portfolio-image3.webp" alt="Image 11">
      <img src="./image/portfolio-images/portfolio-image2.webp" alt="Image 12">
      <img src="./image/portfolio-images/portfolio-image1.webp" alt="Image 13">
      <!-- Duplicate for seamless looping -->
      
      <img src="./image/portfolio-images/portfolio-image13.webp" alt="Image 1">
      <img src="./image/portfolio-images/portfolio-image12.webp" alt="Image 2">
      <img src="./image/portfolio-images/portfolio-image11.webp" alt="Image 3">
      <img src="./image/portfolio-images/portfolio-image10.webp" alt="Image 4">
      <img src="./image/portfolio-images/portfolio-image9.webp" alt="Image 5">
      <img src="./image/portfolio-images/portfolio-image8.webp" alt="Image 6">
      <img src="./image/portfolio-images/portfolio-image7.webp" alt="Image 7">
      <img src="./image/portfolio-images/portfolio-image6.webp" alt="Image 8">
      <img src="./image/portfolio-images/portfolio-image5.webp" alt="Image 9">
      <img src="./image/portfolio-images/portfolio-image4.webp" alt="Image 10">
      <img src="./image/portfolio-images/portfolio-image3.webp" alt="Image 11">
      <img src="./image/portfolio-images/portfolio-image2.webp" alt="Image 12">
      <img src="./image/portfolio-images/portfolio-image1.webp" alt="Image 13">
    </div>
  </div>

  <div class="slider-container slider-rtl mt-2">
    <div class="slider-track">
     
      <img src="./image/portfolio-images/portfolio-image1.webp" alt="Image 1">
      <img src="./image/portfolio-images/portfolio-image2.webp" alt="Image 2">
      <img src="./image/portfolio-images/portfolio-image3.webp" alt="Image 3">
      <img src="./image/portfolio-images/portfolio-image4.webp" alt="Image 4">
      <img src="./image/portfolio-images/portfolio-image5.webp" alt="Image 5">
      <img src="./image/portfolio-images/portfolio-image6.webp" alt="Image 6">
      <img src="./image/portfolio-images/portfolio-image7.webp" alt="Image 7">
      <img src="./image/portfolio-images/portfolio-image8.webp" alt="Image 8">
      <img src="./image/portfolio-images/portfolio-image9.webp" alt="Image 9">
      <img src="./image/portfolio-images/portfolio-image10.webp" alt="Image 10">
      <img src="./image/portfolio-images/portfolio-image11.webp" alt="Image 11">
      <img src="./image/portfolio-images/portfolio-image12.webp" alt="Image 12">
      <img src="./image/portfolio-images/portfolio-image13.webp" alt="Image 13">
      <!-- Duplicate for seamless looping -->
      
       <img src="./image/portfolio-images/portfolio-image13.webp" alt="Image 1">
      <img src="./image/portfolio-images/portfolio-image12.webp" alt="Image 2">
      <img src="./image/portfolio-images/portfolio-image11.webp" alt="Image 3">
      <img src="./image/portfolio-images/portfolio-image10.webp" alt="Image 4">
      <img src="./image/portfolio-images/portfolio-image9.webp" alt="Image 5">
      <img src="./image/portfolio-images/portfolio-image8.webp" alt="Image 6">
      <img src="./image/portfolio-images/portfolio-image7.webp" alt="Image 7">
      <img src="./image/portfolio-images/portfolio-image6.webp" alt="Image 8">
      <img src="./image/portfolio-images/portfolio-image5.webp" alt="Image 9">
      <img src="./image/portfolio-images/portfolio-image4.webp" alt="Image 10">
      <img src="./image/portfolio-images/portfolio-image3.webp" alt="Image 11">
      <img src="./image/portfolio-images/portfolio-image2.webp" alt="Image 12">
      <img src="./image/portfolio-images/portfolio-image1.webp" alt="Image 13">
      <!-- Duplicate for seamless looping -->
      
       <img src="./image/portfolio-images/portfolio-image13.webp" alt="Image 1">
      <img src="./image/portfolio-images/portfolio-image12.webp" alt="Image 2">
      <img src="./image/portfolio-images/portfolio-image11.webp" alt="Image 3">
      <img src="./image/portfolio-images/portfolio-image10.webp" alt="Image 4">
      <img src="./image/portfolio-images/portfolio-image9.webp" alt="Image 5">
      <img src="./image/portfolio-images/portfolio-image8.webp" alt="Image 6">
      <img src="./image/portfolio-images/portfolio-image7.webp" alt="Image 7">
      <img src="./image/portfolio-images/portfolio-image6.webp" alt="Image 8">
      <img src="./image/portfolio-images/portfolio-image5.webp" alt="Image 9">
      <img src="./image/portfolio-images/portfolio-image4.webp" alt="Image 10">
      <img src="./image/portfolio-images/portfolio-image3.webp" alt="Image 11">
      <img src="./image/portfolio-images/portfolio-image2.webp" alt="Image 12">
      <img src="./image/portfolio-images/portfolio-image1.webp" alt="Image 13">
    </div>
  </div>