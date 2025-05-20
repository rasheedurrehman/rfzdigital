<?php
require 'config.php';
require 'rfzwebdb.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="color-scheme" content="dark light">
  <title>
    RFZ Digital UK
  </title>
  <link rel="preload" href="../fonts/Lexend-VariableFont_wght.ttf" as="font" type="font/ttf" crossorigin="anonymous">
  <style>
    @font-face {
        font-family: 'Lexend';
        src: url('fonts/Lexend-VariableFont_wght.ttf') format('truetype');
        font-weight: 100 900;
        font-style: normal;
        font-display: block;
    }

    
</style>

  <link rel="shortcut icon" href="./image/RFZ-UK-fav-icon.png" type="image/x-icon">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
 
 
 
  <!-- Plugin'stylesheets  -->
  <link rel="stylesheet" type="text/css" href="./fonts/typography/fonts.css">
  <link rel="stylesheet" href="./fonts/fontawesome/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="./plugins/aos/aos.min.css">
  <link rel="stylesheet" type="text/css" href="./plugins/fancybox/jquery.fancybox.min.css">
  <!-- Vendor stylesheets  -->
  <link rel="stylesheet" type="text/css" href="./plugins/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="./css/style.css">
  <link rel="stylesheet" type="text/css" href="./css/demo.css">
  <link rel="stylesheet" type="text/css" href="./css/custom.css">
  <style>
    /*@import url('https://fonts.cdnfonts.com/css/clash-display');*/
    /*@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap');*/
    /*@import url('https://fonts.googleapis.com/css2?family=Syne:wght@500;600;700&display=swap');*/
    /*@import url('https://fonts.googleapis.com/css2?family=Public+Sans:wght@500;600;700;800;900&display=swap');*/
    /*@import url('https://fonts.googleapis.com/css2?family=Cabin:wght@500;600;700&display=swap');*/
    /*@import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap');*/
    /*@import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap');*/
    /*@import url('https://fonts.cdnfonts.com/css/clash-display');*/
  </style>
</head>

<body>
  <!-- <div class="preloader-wrapper">
    <div class="lds-ellipsis">
      <div></div>
      <div></div>
      <div></div>
      <div></div>
    </div>
  </div> -->




<style>
  /* Make the topbar sticky only for mobile devices */
  @media (max-width: 768px) {
    .top-for-sticky {
      position: sticky;
      top: 0;
      z-index: 1030; /* Ensure it stays above other content */
      background-color: #17203a;
      color: #fff;
    }
      .mobile-heading {
    font-size: 18px;
    font-weight: 600;
    display: flex;
    justify-content: flex-end; /* Align to the right */
    align-items: center;
    text-align: right; /* Ensure text aligns right */
  }
    .mobile-price{
      background-color: #ffad57;
      color: #000;
      font-size: 25px !IMPORTANT;
      font-weight: 700;
      padding: 5px 5px;
      line-height: 0.9;
      transform: rotate(-3deg) !important;
      display: inline-block;
    }
    
  }

  /* Topbar General Styling */
  .topbar {
    background-color: #17203a;
    color: #fff;
    padding-top: 10px;
    padding-bottom: 10px;
  }

  /* Email Icon and Text Styling */
  .right-style {
    color: #fff;
  }

  .right-style i {
    color: #fff; /* Icon Color */
  }

  .right-style a {
    color: #fff; /* Email Text Color */
    text-decoration: none; /* Optional: remove underline */
  }

  .right-style a:hover {
    text-decoration: underline; /* Optional: add underline on hover */
  }
</style>

<!-- Topbar -->
<!-- Topbar -->




  <div class="page-wrapper overflow-hidden">

<!--~~~~~~~~~~~~~~~~~~~~~~~~
     Top bar
 ~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

 
    <!--~~~~~~~~~~~~~~~~~~~~~~~~
     Header Area
 ~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <header class="site-header site-header--transparent site-header--sticky bg--primary ">

      <div class="container">
        <nav class="navbar site-navbar">
          <!--~~~~~~~~~~~~~~~~~~~~~~~~
            Brand Logo
        ~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
          <div class="brand-logo">
            <a href="<?php echo BASE_URL; ?>index">
              <!-- light version logo (logo must be black)-->
              <img class="logo-light" src="./image/rfzdigital-uk-logo-White.png" alt="brand logo">
              <!-- Dark version logo (logo must be White)-->
              <img class="logo-dark" src="./image/rfzdigital-uk-logo-White.png" alt="brand logo">
            </a>
          </div>
          <div class="menu-block-wrapper ">
            <div class="menu-overlay"></div>
            <nav class="menu-block" id="append-menu-header">
              <div class="mobile-menu-head">
                <a href="index.html">
                  <img src="./image/icons/logo-whites.svg" alt="brand logo">
                </a>
                <div class="current-menu-title"></div>
                <div class="mobile-menu-close">&times;</div>
              </div>
              <ul class="site-menu-main">
                <li class="nav-item nav-item-has-children">
                  <a href="<?php echo BASE_URL; ?>index" class="nav-link-item drop-trigger">Home</a>
                  
                </li>
                <li class="nav-item">
                  <a href="<?php echo BASE_URL; ?>web-dev" class="nav-link-item drop-trigger">Web Dev</a>
                </li>
                 <li class="nav-item">
                  <a href="<?php echo BASE_URL; ?>seo" class="nav-link-item drop-trigger">SEO</a>
                </li>
                 <li class="nav-item">
                  <a href="<?php echo BASE_URL; ?>smm" class="nav-link-item drop-trigger">Social Media Marketing</a>
                </li>
                 <li class="nav-item">
                  <a href="<?php echo BASE_URL; ?>graphic-design" class="nav-link-item drop-trigger">Graphic Design</a>
                </li>
                
              </ul>
            </nav>
          </div>
          <!--~~~~~~~~~~~~~~~~~~~~~~~~
          mobile menu trigger
         ~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
          <div class="mobile-menu-trigger">
            <span></span>
          </div>
          <!--~~~~~~~~~~~~~~~~~~~~~~~~
            Mobile Menu Hamburger Ends
          ~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
          <div class="header-cta-btn-wrapper">
            <!-- <a href="#" class="btn-masco btn-masco--header btn-masco--header-secondary">
              <span>Login</span>
            </a> -->
            <a href="<?php echo BASE_URL; ?>contact-us" class="btn-masco btn-masco--header rounded-pill btn-fill--up">
              <span>Contact Us</span></a>
          </div>
        </nav>
      </div>
    </header>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~
     navbar-
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
