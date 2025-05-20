

<?php
ob_start(); // Start output buffering to prevent premature output
// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Get visitor details
$ip_address = $_SERVER['REMOTE_ADDR'];
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$visit_time = date("Y-m-d H:i:s");

// Check if the cookie is set
if (!isset($_COOKIE['cookieConsent'])) {
    // Log visit only if cookies have not been accepted
    $log_data = "Visitor IP: $ip_address | User-Agent: $user_agent | Time: $visit_time | Status: Not Accepted Yet\n";
    file_put_contents("cookies/visitors.log", $log_data, FILE_APPEND);
} else {
    $consentType = $_COOKIE['cookieConsent']; // Get stored consent choice
    if ($consentType !== "all") { // Only log non-accepted cases
        $log_data = "Visitor IP: $ip_address | User-Agent: $user_agent | Time: $visit_time | Consent: $consentType\n";
        file_put_contents("cookies/visitors.log", $log_data, FILE_APPEND);
    }
}




require 'config.php';
require 'rfzwebdb.php';

// Default indexing behavior (index by default)
$noindex = isset($noindex) ? $noindex : false; // Agar $noindex pehle se set hai to wahi rahega


// Set default meta title and description
if (!isset($meta_title)) {
    $meta_title = 'RFZ Digital';
}
if (!isset($meta_description)) {
    $meta_description = 'Default description.';
}
if (!isset($canonical_url)) {
    $canonical_url = 'https://rfzdigital.co.uk';  // Default canonical URL
}

// Check if it's a blog detail page based on slug
if (isset($_GET['slug'])) { // Slug is passed in URL
    $slug = trim($_GET['slug']); // Sanitize slug

    // Fetch meta title and description from the database using slug
    $stmt = $pdo->prepare("SELECT meta_title, meta_description, noindex, canonical_url FROM blog_posts WHERE slug = ?");
    $stmt->execute([$slug]);
    $blog = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($blog) {
        if (!empty($blog['meta_title'])) {
            $meta_title = $blog['meta_title']; // Override with blog meta title
        }
        if (!empty($blog['meta_description'])) {
            $meta_description = $blog['meta_description']; // Override with blog meta description
        }
        if (!empty($blog['canonical_url'])) {
            $canonical_url = $blog['canonical_url']; // Override with blog canonical URL
        }

        // Set noindex for blog pages based on database
        if ($blog['noindex'] == 1) {
            $noindex = true;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en-GB">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Expires" content="0">



  <title><?php echo htmlspecialchars($meta_title, ENT_QUOTES, 'UTF-8'); ?></title>
  <!-- Meta Description -->
<meta name="description" content="<?php echo htmlspecialchars($meta_description, ENT_QUOTES, 'UTF-8'); ?>">
  
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="color-scheme" content="dark light">
  <meta name="Content-language" content='en' />
  <meta name="country" content="UK" />
   <!-- Canonical URL -->
  <link rel="canonical" href="<?php echo htmlspecialchars($canonical_url, ENT_QUOTES, 'UTF-8'); ?>">

  <!-- Robots Meta Tag (index or noindex) -->
  <meta name="robots" content="<?php echo $noindex ? 'noindex, nofollow' : 'index, follow'; ?>">
  
  <link rel="shortcut icon" href="./image/RFZ-UK-fav-icon.png" type="image/x-icon">
  <link rel="apple-touch-icon" href="/image/apple-icon.png">
  
  <link rel="preload" href="./image/home-1/index-page-hero-image.webp" as="image">
  <link rel="preload" href="./image/home-1/Header-Images-iPad.webp" as="image">
  <link rel="preload" href="./image/web-dev/Newst-header-Website-Development.webp" as="image">
  <link rel="preload" href="./image/seo/new-header-SEO.webp" as="image">
  <link rel="preload" href="./image/smm/social-media-Slider1.webp" as="image">
  <link rel="preload" href="./image/gd/new-header-Grahpic Designer.webp" as="image">

  <link rel="stylesheet" href="./cookies/cookies.css">
<script src="./cookies/cookies.js" defer></script>



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

<?php
    // Automatically detect protocol (http/https)
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $host = $_SERVER['HTTP_HOST'];

    // Check if on localhost or live server
    if ($host == 'localhost') {
        // For local server
        $projectFolder = '/rfzdigitaluk/'; // Local folder
    } else {
        // For live server (assuming it's in the root or specific folder)
        $projectFolder = '/';  // Use '/' if it's in the root directory
        // If it's inside a folder, adjust accordingly:
        // $projectFolder = '/rfzdigital.co.uk/';
    }

    $baseURL = $protocol . $host . $projectFolder;
?>

<base href="<?php echo $baseURL; ?>">



  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <!-- Plugin'stylesheets  -->
  <link rel="stylesheet" type="text/css" href="./fonts/typography/fonts.css">
  <link rel="stylesheet" href="./fonts/fontawesome/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="./plugins/aos/aos.min.css">
  <link rel="stylesheet" type="text/css" href="./plugins/fancybox/jquery.fancybox.min.css">
  <!-- Vendor stylesheets  -->
  <link rel="stylesheet" type="text/css" href="./plugins/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="./css/style.css">
  
  <link rel="stylesheet" type="text/css" href="./css/services.css">
  <link rel="stylesheet" type="text/css" href="./css/demo.css">
  <link rel="stylesheet" type="text/css" href="./css/custom.css">
  <link rel="stylesheet" type="text/css" href="./css/custom2.css">
  <link rel="stylesheet" type="text/css" href="./css/blog.css">
  <link rel="stylesheet" type="text/css" href="../css/blog.css">
  <link rel="stylesheet" type="text/css" href="./css/testimonial.css">
  <link rel="stylesheet" type="text/css" href="./css/new-custom.css">

  
  
  
  <!-- Add the Google Fonts link here -->
  <link href="https://fonts.googleapis.com/css2?family=Onest:wght@400;500;600;700&family=Manrope:wght@400;500;600;700&display=swap" rel="stylesheet">
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
  
  <!-- Inside the head -->
  <script src="script.js" defer></script>

<!-- New Code  -->
<meta property="og:title" content="RFZ Digital: Website Design Development & Digital Marketing" />
<meta property="og:description" content="RFZ Digital is providing professional website design, development and digital marketing services in UK & Ireland. We help businesses grow online & generate leads." />
<meta property="og:image" content="https://rfzdigital.co.uk/image/RFZ-Digital-Co-UK-logo.png" />
<meta property="og:url" content="https://rfzdigital.co.uk/" />
<meta property="og:type" content="website" />
<meta property="og:site_name" content="RFZ Digital" />

<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="RFZ Digital: Website Design Development & Digital Marketing" />
<meta name="twitter:description" content="RFZ Digital offers expert website design, development, and digital marketing services in the UK & Ireland. We help businesses grow online and get leads." />
<meta name="twitter:image" content="https://rfzdigital.co.uk/image/RFZ-Digital-Co-UK-logo.png" />
<meta name="twitter:site" content="@rfzdigital" />
<!-- New Code  -->
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-ZGDHCTPLKZ"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-ZGDHCTPLKZ');
</script>
<script type="text/javascript">
  (function(c,l,a,r,i,t,y){
    c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
    t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
    y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
  })(window, document, "clarity", "script", "prr7afithc");
</script>

<script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "RFZ Digital UK",
    "url": "https://rfzdigital.co.uk/",
    "logo":"https://rfzdigital.co.uk/image/RFZ-Digital-UK-logo%20.png"
  }

</script>
<script type="application/ld+json">
  {
    "@context": "https://schema.org/",
    "@type": "WebSite",
    "name": "RFZ Digital UK",
    "url": "https://rfzdigital.co.uk/",
    "potentialAction": {
      "@type": "SearchAction",
      "target": "{search_term_string}",
      "query-input": "required name=search_term_string"
    }
  }
</script>
<!-- Google Recaptcha -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-ZGDHCTPLKZ"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-ZGDHCTPLKZ');
</script>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NQ3T6PFG');</script>
<!-- End Google Tag Manager -->


<!-- New for Cookies -->
<!-- Google Tag Manager -->
<script>
  (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});
  var f=d.getElementsByTagName(s)[0], j=d.createElement(s), dl=l!='dataLayer'?'&l='+l:''; 
  j.async=true; j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl; 
  f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-NQ3T6PFG');
</script>
<!-- End Google Tag Manager -->


<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}

gtag('consent', 'default', {
  'ad_storage': 'denied',
  'analytics_storage': 'denied',
  'functionality_storage': 'granted',
  'security_storage': 'granted',
  'personalization_storage': 'denied',
  'wait_for_update': 500
});
</script>

</head>

<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NQ3T6PFG"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<!--~~~~~~~~~~~~~~~~~~~~~~~~
     Top Bar
~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

<header class="top-for-sticky">
  <div class="topbar py-2">
    <div class="container">
      <div class="row align-items-center">

        <!-- Single Column on Mobile, Two Columns on Desktop -->
        <div class="col-12 col-md-8 d-flex align-items-center">
          <img src="./image/home-1/united-kingdom-flag-icon.svg" alt="UK Flag" width="20" class="me-2">
          <span class="main-top-heading">One Canada Square, Canary Wharf, London, UK, E14 5AA</span>
        </div>

        <!-- Hide this section in mobile -->
        <div class="col-md-4 text-end d-none d-md-block">
          <div class="right-style">
            <i class="fa-solid fa-envelope me-2"></i>
            <a href="mailto:info@rfzdigital.co.uk">info@rfzdigital.co.uk</a>
          </div>
        </div>

      </div>
    </div>
  </div>
</header>

<!--~~~~~~~~~~~~~~~~~~~~~~~~
     Top bar End
~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

<div class="page-wrapper overflow-hidden">

<!--~~~~~~~~~~~~~~~~~~~~~~~~
     Header Area
 ~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
 <header class="site-header site-header--transparent site-header--sticky bg--primary margin-topbar" >
  <div class="container">
    <nav class="navbar site-navbar" >
          <!--~~~~~~~~~~~~~~~~~~~~~~~~
            Brand Logo
        ~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <div class="brand-logo">
          <a href="<?php echo BASE_URL; ?>">
            <!-- light version logo (logo must be black)-->
            <img class="logo-light" src="./image/RFZ-Digital-Co-UK-logo.png" alt="RFZ Digital">
            <!-- Dark version logo (logo must be White)-->
            <img class="logo-dark" src="./image/rfz-digital-logo-White.png" alt="RFZ Digital">
          </a>
        </div>
        <div class="menu-block-wrapper ">
          <div class="menu-overlay"></div>
          <nav class="menu-block" id="append-menu-header">
            <div class="mobile-menu-head">
              <a href="index.html">
                <img src="./image/rfzdigital-White-logo.png" alt="RFZ Digital">
              </a>
              <div class="current-menu-title"></div>
              <div class="mobile-menu-close">&times;</div>
            </div>
            <ul class="site-menu-main">
              <li class="nav-item nav-item-has-children">
                <a href="<?php echo BASE_URL; ?>" class="nav-link-item drop-trigger">Home</a>

              </li>
              <li class="nav-item">
                <a href="<?php echo BASE_URL; ?>website-design" class="nav-link-item drop-trigger">Website Design</a>
              </li>
              <li class="nav-item">
                <a href="<?php echo BASE_URL; ?>seo" class="nav-link-item drop-trigger">SEO</a>
              </li>
              <li class="nav-item">
                <a href="<?php echo BASE_URL; ?>social-media-marketing" class="nav-link-item drop-trigger">Social Media Marketing</a>
              </li>
              <li class="nav-item">
                <a href="<?php echo BASE_URL; ?>graphic-design" class="nav-link-item drop-trigger">Graphic Design</a>
              </li>
              <li class="nav-item">
                <a href="https://softwaredevs.team/" class="nav-link-item drop-trigger" target="_blank">Talent</a>
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
