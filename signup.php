<?php
require 'rfzwebdb.php'; // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $username = trim($_POST['username']);
    $password = password_hash(trim($_POST['password']), PASSWORD_BCRYPT); // Hash password

    try {
        // Prepare and execute the query
        $stmt = $pdo->prepare("INSERT INTO admins (email, username, password) VALUES (:email, :username, :password)");
        $stmt->execute([
            ':email' => $email,
            ':username' => $username,
            ':password' => $password,
        ]);

        // Redirect with success parameter
        // header("Location: signup.php?success=1");
        header('Location: ' . BASE_URL . 'signin?success=1');
        exit();
    } catch (PDOException $e) {
        // Redirect with error parameter
        // header("Location: signup.php?error=1");
        header('Location: ' . BASE_URL . 'signup?error=1');
        exit();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Admin Dashboard</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Mannatthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        
        <link rel="shortcut icon" href="admin-assets/images/RFZ-UK-fav-icon.png">

        <link href="admin-assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="admin-assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="admin-assets/css/style.css" rel="stylesheet" type="text/css">

    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div class="accountbg"></div>
        <div class="wrapper-page">

            <div class="card">
                <div class="card-body">

                    <div class="text-center m-b-15">
                        
                        <a href="<?php echo BASE_URL; ?>signup" class="logo logo-admin"><img src="admin-assets/images/rfzdigital-uk-logo.png" height="24" alt="logo"></a>
                    </div>
                     <!-- Success/Error Messages -->
            <?php
            if (isset($_GET['success']) && $_GET['success'] == 1) {
                echo '<div class="alert alert-success text-center">Registration successful! Please log in.</div>';
            }
            if (isset($_GET['error']) && $_GET['error'] == 1) {
                echo '<div class="alert alert-danger text-center">Registration failed. Please try again.</div>';
            }
            ?>

                    <div class="p-3">
                        <form class="form-horizontal" action="<?php echo BASE_URL; ?>signup" method="POST" autocomplete="off">

                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control" name="email" type="email" required="" placeholder="Email">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control" name="username" type="text" required="" placeholder="Username">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control" name="password" type="password" required="" placeholder="Password">
                                </div>
                            </div>

                          

                            <div class="form-group text-center row m-t-20">
                                <div class="col-12">
                                    <button class="btn btn-danger btn-block waves-effect waves-light" type="submit">Register</button>
                                </div>
                            </div>

                            <div class="form-group m-t-10 mb-0 row">
                                <div class="col-12 m-t-20 text-center">
                                    <a href="<?php echo BASE_URL; ?>signin" class="text-muted">Already have account?</a>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>



        <!-- jQuery  -->
        <script src="admin-assets/js/jquery.min.js"></script>
        <script src="admin-assets/js/popper.min.js"></script>
        <script src="admin-assets/js/bootstrap.min.js"></script>
        <script src="admin-assets/js/modernizr.min.js"></script>
        <script src="admin-assets/js/detect.js"></script>
        <script src="admin-assets/js/fastclick.js"></script>
        <script src="admin-assets/js/jquery.slimscroll.js"></script>
        <script src="admin-assets/js/jquery.blockUI.js"></script>
        <script src="admin-assets/js/waves.js"></script>
        <script src="admin-assets/js/jquery.nicescroll.js"></script>
        <script src="admin-assets/js/jquery.scrollTo.min.js"></script>

        <!-- App js -->
        <script src="admin-assets/js/app.js"></script>

        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('input').forEach(function (input) {
        input.value = '';
    });
});

        </script>

    </body>
</html>