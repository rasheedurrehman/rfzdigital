

<?php include 'includes/header.php';?>





<!-- Jquery for Form validation -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<!-- Below links for phone in contact -->
<!-- Include intl-tel-input CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.min.css">

<!-- Include intl-tel-input JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>


<!-- AJAX Script -->
<script>
$(document).ready(function() {
    $("#contact-form").on("submit", function(e) {
        e.preventDefault(); // Prevent normal form submission

        $.ajax({
            url: "form.php",
            type: "POST",
            data: $(this).serialize(),
            success: function(response) {
                alert(response); // Show the server response
                $("#contact-form")[0].reset(); // Clear form if successful
            },
            error: function() {
                alert("An error occurred while submitting the form.");
            }
        });
    });
});

</script>
<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Conatct : Main Section 
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <div class="contact_main-section padding-bottom-120" style="margin-top: 200px;">
      <div class="container">
        <div class="row row--cuatom">
          <div class="col-xl-5 col-lg-6 col-md-8 col-sm-11">
            <div class="contact_main-content contact-content-space">
              <div class="content">
                <div class="content-text-block">
                  <h2 class="heading-md">Fill out this form, We ‘ll quickly get back to you </h2>
                  <p>
                    We are here to help you! Tell us how we can help and we’ll get in touch within next 24hrs with expert
                  </p>
                  <div class="content-divider"></div>
                </div>
              </div>
              <div class="content_main-testimonial">
                <div class="testimonial-widget-4" data-aos="fade-left" data-aos-delay="NaN">
                  <div class="testimonial-widget-4__rating">
                    <img src="./image/icons/star-five-yellow.svg" class="testimonial-widget-4__star" alt="image alt">
                  </div>
                  <p>
                    "Snaga did an exceptional job for us.
                    keep up the excellent digital work. Man,
                    this thing is getting better and better as
                    I learn more about it. I have gotten at
                    least 50 times the value from Snaga.
                    It is worth much more than I paid."
                  </p>
                  <div class="testimonial-widget-4__body">
                    <div class="testimonial-widget-4__user-image">
                      <img src="./image/contact-details/user-image.png" alt="image alt">
                    </div>
                    <div class="testimonial-widget-4__user-metadeta">
                      <h4 class="testimonial-widget-4__user">Brooklyn Simmons</h4>
                      <span class="testimonial-widget-4__user-position">CEO & Co-founder @ Company</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="offset-xl-1 col-lg-6 col-md-10">
    <div class="form-box-style__form-wrapper bg-light-2">
        <form class="form-box-style" id="contact-form">
            <div class="form-box-style__form-inner">
                <div class="form-box-style__form-input">
                    <h3 class="form-box-style-title">Your name</h3>
                    <input id="name" class="form-control bg-white" type="text" placeholder="Enter your full name">
                    <div id="name-error" class="error-message"></div> <!-- Error message -->
                </div>
                <div class="form-box-style__form-input">
                    <h3 class="form-box-style-title">Email address</h3>
                    <input id="email" class="form-control bg-white" type="email" placeholder="Enter your email">
                    <div id="email-error" class="error-message"></div> <!-- Error message -->
                </div>
                <div class="form-box-style__form-input">
    <h3 class="form-box-style-title">Phone Number</h3>
    <div class="phone-container">
        <input id="phone" class="form-control bg-white" type="tel" placeholder="Enter your phone number" required>
    </div>
    <small id="phone-error" class="error-message"></small>
</div>
                 <div class="form-box-style__form-input">
                    <h3 class="form-box-style-title">Write your message</h3>
                    <textarea id="message" class="form-control bg-white textarea" placeholder="Write us your question here..."></textarea>
                    <div id="message-error" class="error-message"></div> <!-- Error message -->
                </div>
            </div>
            <div class="form-box-style__form-input-button">
                <button type="submit" class="btn-masco rounded-pill w-100">Submit</button>
            </div>
        </form>
    </div>
</div>
        </div>
      </div>
    </div>



    <!-- Add styles for dropdown list -->
<style>

    /* Remove or change the background color of the country flag */
.iti--separate-dial-code .iti__selected-flag {
    background-color: transparent !important; /* Removes the background */
}

/* Optionally, set the background color to white */
.iti--separate-dial-code .iti__selected-flag {
    margin-left: 10px; 
    margin-right: 5px; 
}
.iti--separate-dial-code .iti__input {
    margin-left: 20px !important; /* Adds 5px space */
}
    /* Ensure full-width input fields */
    .form-control {
        width: 100%;
    }

    /* Phone input adjustments */
    .phone-container .iti {
        width: 100%;
    }

    .iti__flag-container {
        background-color: transparent !important;
    }

    /* Error messages in red */
.error-message {
    color: red;
    font-size: 12px;
    margin-top: 5px;
}

/* Styling input fields on error */
input:invalid, textarea:invalid {
    border: 1px solid red;
}
</style>

<script>
    
    $(document).ready(function() {
    // Validate Name (only letters and spaces allowed)
    $('#name').on('input', function() {
        var name = $(this).val();
        var nameRegex = /^[a-zA-Z\s]+$/;  // Only letters and spaces
        if (!nameRegex.test(name)) {
            $('#name-error').text('Name should only contain letters and spaces.');
            $(this).css('border', '1px solid red');
        } else {
            $('#name-error').text('');
            $(this).css('border', '1px solid #ccc');
        }
    });

    // Validate Email (basic email format check)
    $('#email').on('input', function() {
        var email = $(this).val();
        var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;  // Basic email regex
        if (!emailRegex.test(email)) {
            $('#email-error').text('Please enter a valid email address.');
            $(this).css('border', '1px solid red');
        } else {
            $('#email-error').text('');
            $(this).css('border', '1px solid #ccc');
        }
    });

    // Validate Message (only letters, spaces, and basic punctuation allowed)
    $('#message').on('input', function() {
        var message = $(this).val();
        var messageRegex = /^[a-zA-Z\s.,!?]+$/;  // Allow letters and common punctuation
        if (!messageRegex.test(message)) {
            $('#message-error').text('Message should not contain special characters or numbers.');
            $(this).css('border', '1px solid red');
        } else {
            $('#message-error').text('');
            $(this).css('border', '1px solid #ccc');
        }
    });
});

</script>


<?php
// Start PHP block
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    
    // Include your database connection (if necessary)
    require 'rfzwebdb.php';

    function sanitize_input($data) {
        return htmlspecialchars(stripslashes(trim($data)));
    }

    $name = sanitize_input($_POST['name']);
    $email = sanitize_input($_POST['email']);
    $phone = sanitize_input($_POST['phone']);
    $message = sanitize_input($_POST['message']);

    if (!empty($name) && !empty($email) && !empty($phone) && !empty($message)) {
        $stmt = $conn->prepare("INSERT INTO contact_form (name, email, phone, message) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $phone, $message);

        if ($stmt->execute()) {
            echo "Form submitted successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    } else {
        echo "Please fill in all fields.";
    }

    exit; // Stop further processing and return response
}
?>


<script>
    const phoneInput = document.querySelector("#phone");
    const phoneError = document.querySelector("#phone-error");

    // Initialize intl-tel-input
    const iti = intlTelInput(phoneInput, {
        initialCountry: "auto",
        geoIpLookup: function (callback) {
            fetch("https://ipinfo.io/json")
                .then((res) => res.json())
                .then((data) => callback(data.country))
                .catch(() => callback("US"));
        },
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.min.js",
        separateDialCode: true,
    });

    document.getElementById("contact-form").addEventListener("submit", function (e) {
        if (!iti.isValidNumber()) {
            e.preventDefault();
            phoneError.textContent = "Please enter a valid phone number.";
            phoneError.style.display = "block";
        } else {
            phoneError.style.display = "none";
        }
    });
</script>





     <?php include 'includes/footer.php'; ?>