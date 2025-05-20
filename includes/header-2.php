<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="color-scheme" content="dark light">
  <title>
    Masco HTML Template
  </title>
  <link rel="shortcut icon" href="./image/favicon.png" type="image/x-icon">
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
  <style>
    @import url('https://fonts.cdnfonts.com/css/clash-display');
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Syne:wght@500;600;700&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Public+Sans:wght@500;600;700;800;900&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Cabin:wght@500;600;700&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap');
    @import url('https://fonts.cdnfonts.com/css/clash-display');
  </style>
  <style>
    .topbar {
      background-color: #f8f9fa;
      padding: 10px 0;
      font-size: 14px;
    }
    .navbar {
      margin-top: 56px; /* Adjust based on topbar height */
    }
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
  <div class="page-wrapper overflow-hidden">
    <div class="topbar position-sticky top-0 z-index-1030">
  <div class="container d-flex justify-content-between align-items-center">
    <div>
      <span><i class="bi bi-telephone"></i> Call us: +123 456 7890</span>
      <span class="ms-3"><i class="bi bi-envelope"></i> Email: info@example.com</span>
    </div>
    <div>
      <input type="search" class="form-control form-control-sm d-inline-block w-auto" placeholder="Search...">
    </div>
  </div>
</div>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~
     Header Area
 ~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <header class="site-header site-header--transparent site-header--sticky ">
      <div class="container">
        <nav class="navbar site-navbar">
          <!--~~~~~~~~~~~~~~~~~~~~~~~~
            Brand Logo
        ~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
          <div class="brand-logo">
            <a href="#">
              <!-- light version logo (logo must be black)-->
              <img class="logo-light" src="./image/rfzdigital-uk-logo.png" alt="brand logo">
              <!-- Dark version logo (logo must be White)-->
              <img class="logo-dark" src="./image/rfzdigital-uk-logo.png" alt="brand logo">
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
                  <a href="index.php" class="nav-link-item drop-trigger">Home</a>
                  <!-- <div class="sub-menu" id="submenu-1">
                    <ul class="sub-menu_list">
                      <li class="sub-menu_item">
                        <a href="index.html">
                          <span class="menu-item-text">Digital agency</span>
                        </a>
                      </li>
                      <li class="sub-menu_item">
                        <a href="index-2.html">
                          <span class="menu-item-text">Chat software</span>
                        </a>
                      </li>
                      <li class="sub-menu_item">
                        <a href="index-3.html">
                          <span class="menu-item-text">Fitness App</span>
                        </a>
                      </li>
                      <li class="sub-menu_item">
                        <a href="index-4.html">
                          <span class="menu-item-text">Online Courses</span>
                        </a>
                      </li>
                      <li class="sub-menu_item">
                        <a href="index-5.html">
                          <span class="menu-item-text">SEO Agency</span>
                        </a>
                      </li>
                      <li class="sub-menu_item">
                        <a href="index-6.html">
                          <span class="menu-item-text">Cold Email</span>
                        </a>
                      </li>
                      <li class="sub-menu_item">
                        <a href="index-7.html">
                          <span class="menu-item-text">Web Hosting</span>
                        </a>
                      </li>
                      <li class="sub-menu_item">
                        <a href="index-8.html">
                          <span class="menu-item-text">Startup</span>
                        </a>
                      </li>
                      <li class="sub-menu_item">
                        <a href="index-9.html">
                          <span class="menu-item-text">Tracking Software</span>
                        </a>
                      </li>
                      <li class="sub-menu_item">
                        <a href="index-10.html">
                          <span class="menu-item-text">AI Writing Tool</span>
                        </a>
                      </li>
                    </ul>
                  </div> -->
                </li>
                <li class="nav-item">
                  <a href="web-dev.php" class="nav-link-item drop-trigger">Web Dev</a>
                </li>
                 <li class="nav-item">
                  <a href="seo.php" class="nav-link-item drop-trigger">SEO</a>
                </li>
                 <li class="nav-item">
                  <a href="smm.php" class="nav-link-item drop-trigger">Social Media Marketing</a>
                </li>
                 <li class="nav-item">
                  <a href="graphic-design.php" class="nav-link-item drop-trigger">Graphic Design</a>
                </li>
                <!-- <li class="nav-item nav-item-has-children">
                  <a href="#" class="nav-link-item drop-trigger">Pages<i class="fas fa-angle-down"></i>
                  </a>
                  <div class="sub-menu" id="submenu-3">
                    <ul class="sub-menu_list">
                      <li class="sub-menu_item nav-item-has-children child-item">
                        <a href="#" class="sub-menu__item-link">
                          <span class="menu-item-text">Services</span>
                          <i class="fas fa-angle-right"></i>
                        </a>
                        <div class="sub-menu child-sub" id="submenu-22">
                          <ul class="sub-menu_list">
                            <li class="sub-menu_item">
                              <a href="service.html">
                                <span class="menu-item-text">Service</span>
                              </a>
                            </li>
                            <li class="sub-menu_item">
                              <a href="service-details.html">
                                <span class="menu-item-text">Service Details</span>
                              </a>
                            </li>
                          </ul>
                        </div>
                      </li>
                      <li class="sub-menu_item">
                        <a href="team.html">
                          <span class="menu-item-text">Team</span>
                        </a>
                      </li>
                      <li class="sub-menu_item nav-item-has-children child-item">
                        <a class="sub-menu__item-link">
                          <span class="menu-item-text">Pricing</span>
                          <i class="fas fa-angle-right"></i>
                        </a>
                        <div class="sub-menu child-sub" id="submenu-11">
                          <ul class="sub-menu_list">
                            <li class="sub-menu_item">
                              <a href="pricing.html">
                                <span class="menu-item-text">Pricing 1</span>
                              </a>
                            </li>
                            <li class="sub-menu_item">
                              <a href="pricing-2.html">
                                <span class="menu-item-text">Pricing 2</span>
                              </a>
                            </li>
                          </ul>
                        </div>
                      </li>
                      <li class="sub-menu_item nav-item-has-children child-item">
                        <a class="sub-menu__item-link">
                          <span class="menu-item-text">Career</span>
                          <i class="fas fa-angle-right"></i>
                        </a>
                        <div class="sub-menu child-sub" id="submenu-4">
                          <ul class="sub-menu_list">
                            <li class="sub-menu_item">
                              <a href="career.html">
                                <span class="menu-item-text">Career</span>
                              </a>
                            </li>
                            <li class="sub-menu_item">
                              <a href="career-details.html">
                                <span class="menu-item-text">Career Details</span>
                              </a>
                            </li>
                          </ul>
                        </div>
                      </li>
                      <li class="sub-menu_item nav-item-has-children child-item">
                        <a class="sub-menu__item-link">
                          <span class="menu-item-text">Portfolio</span>
                          <i class="fas fa-angle-right"></i>
                        </a>
                        <div class="sub-menu child-sub" id="submenu-7">
                          <ul class="sub-menu_list">
                            <li class="sub-menu_item">
                              <a href="portfolio.html">
                                <span class="menu-item-text">Portfolio 1 Classic</span>
                              </a>
                            </li>
                            <li class="sub-menu_item">
                              <a href="portfolio-2.html">
                                <span class="menu-item-text">Portfolio 2 Masonry</span>
                              </a>
                            </li>
                            <li class="sub-menu_item">
                              <a href="portfolio-3.html">
                                <span class="menu-item-text">Portfolio 3 Modern</span>
                              </a>
                            </li>
                            <li class="sub-menu_item">
                              <a href="portfolio-4.html">
                                <span class="menu-item-text">Portfolio 4 Minimal</span>
                              </a>
                            </li>
                            <li class="sub-menu_item">
                              <a href="portfolio-details.html">
                                <span class="menu-item-text">Portfolio Details</span>
                              </a>
                            </li>
                          </ul>
                        </div>
                      </li>
                      <li class="sub-menu_item nav-item-has-children child-item">
                        <a class="sub-menu__item-link">
                          <span class="menu-item-text">Blog</span>
                          <i class="fas fa-angle-right"></i>
                        </a>
                        <div class="sub-menu child-sub" id="submenu-12">
                          <ul class="sub-menu_list">
                            <li class="sub-menu_item">
                              <a href="blog.html">
                                <span class="menu-item-text">Blog</span>
                              </a>
                            </li>
                            <li class="sub-menu_item">
                              <a href="blog-details.html">
                                <span class="menu-item-text">Blog Details</span>
                              </a>
                            </li>
                          </ul>
                        </div>
                      </li>
                      <li class="sub-menu_item nav-item-has-children child-item">
                        <a class="sub-menu__item-link">
                          <span class="menu-item-text">Faq</span>
                          <i class="fas fa-angle-right"></i>
                        </a>
                        <div class="sub-menu child-sub" id="submenu-8">
                          <ul class="sub-menu_list">
                            <li class="sub-menu_item">
                              <a href="faq.html">
                                <span class="menu-item-text">FAQ 1</span>
                              </a>
                            </li>
                            <li class="sub-menu_item">
                              <a href="faq-2.html">
                                <span class="menu-item-text">FAQ 2</span>
                              </a>
                            </li>
                            <li class="sub-menu_item">
                              <a href="faq-3.html">
                                <span class="menu-item-text">FAQ 3</span>
                              </a>
                            </li>
                            <li class="sub-menu_item">
                              <a href="faq-4.html">
                                <span class="menu-item-text">FAQ 4</span>
                              </a>
                            </li>
                          </ul>
                        </div>
                      </li>
                      <li class="sub-menu_item nav-item-has-children child-item">
                        <a class="sub-menu__item-link">
                          <span class="menu-item-text">Utility</span>
                          <i class="fas fa-angle-right"></i>
                        </a>
                        <div class="sub-menu child-sub" id="submenu-9">
                          <ul class="sub-menu_list">
                            <li class="sub-menu_item">
                              <a href="404.html">
                                <span class="menu-item-text">404</span>
                              </a>
                            </li>
                            <li class="sub-menu_item">
                              <a href="coming-soon.html">
                                <span class="menu-item-text">Coming Soon</span>
                              </a>
                            </li>
                          </ul>
                        </div>
                      </li>
                      <li class="sub-menu_item nav-item-has-children child-item">
                        <a class="sub-menu__item-link">
                          <span class="menu-item-text">Account</span>
                          <i class="fas fa-angle-right"></i>
                        </a>
                        <div class="sub-menu child-sub" id="submenu-10">
                          <ul class="sub-menu_list">
                            <li class="sub-menu_item">
                              <a href="sign-in.html">
                                <span class="menu-item-text">Sign In</span>
                              </a>
                            </li>
                            <li class="sub-menu_item">
                              <a href="sign-up.html">
                                <span class="menu-item-text">Sign Up</span>
                              </a>
                            </li>
                            <li class="sub-menu_item">
                              <a href="reset-password.html">
                                <span class="menu-item-text">Reset Password</span>
                              </a>
                            </li>
                          </ul>
                        </div>
                      </li>
                    </ul>
                  </div>
                </li> -->
               <!--  <li class="nav-item nav-item-has-children">
                  <a href="#" class="nav-link-item drop-trigger">Contact<i class="fas fa-angle-down"></i>
                  </a>
                  <div class="sub-menu" id="submenu-13">
                    <ul class="sub-menu_list">
                      <li class="sub-menu_item">
                        <a href="contact.html">
                          <span class="menu-item-text">Contact 1</span>
                        </a>
                      </li>
                      <li class="sub-menu_item">
                        <a href="contact-2.html">
                          <span class="menu-item-text">Contact 2</span>
                        </a>
                      </li>
                      <li class="sub-menu_item">
                        <a href="contact-3.html">
                          <span class="menu-item-text">Contact 3</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </li> -->
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
            <a href="#" class="btn-masco btn-masco--header btn-masco--header-secondary">
              <span>Login</span>
            </a>
            <a href="#" class="btn-masco btn-masco--header rounded-pill btn-fill--up">
              <span>Sign up free</span></a>
          </div>
        </nav>
      </div>
    </header>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~
     navbar-
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
