
<?php
http_response_code(404);
$noindex = true;
include 'includes/header.php';

?>
<section class="error-section bg-light-2">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xxl-5 col-lg-6 col-sm-7 col-xs-8 col-9">
            <div class="error-content">
              <div class="error-content__image">
                <img src="./image/404.png" alt="image alt">
              </div>
              <h2 class="heading-md text-black">Page not found</h2>
              <p>The requested URL you are looking for doesn’t exist on this server.</p>
              <div class="error-content__button">
                <a href="<?php echo BASE_URL; ?>" class="btn-masco btn-primary rounded-pill">
                  Back to Homepage
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


 <?php include 'includes/footer.php'; ?>