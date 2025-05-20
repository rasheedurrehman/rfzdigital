<?php
require 'rfzwebdb.php';
session_start();

$error = ""; // Initialize error variable

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        $stmt = $pdo->prepare("SELECT * FROM admins WHERE username = :username");
        $stmt->execute([':username' => $username]);
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($admin) {
            // Check if the user is approved
            if ($admin['approved'] == 0) {
                $error = "This user is not approved by Admin.";
            } elseif (password_verify($password, $admin['password'])) {
                // Set session variables for successful login
                $_SESSION['admin_id'] = $admin['id'];
                $_SESSION['admin_username'] = $admin['username'];
                $_SESSION['admin_role'] = $admin['role']; // Store the role if needed

                header('Location: ' . BASE_URL . 'dashboard'); // Redirect to the admin dashboard
                exit();
            } else {
                $error = "Invalid username or password."; // Invalid password
            }
        } else {
            $error = "Invalid username or password."; // User not found
        }
    } catch (PDOException $e) {
        $error = "Error: " . $e->getMessage(); // Handle database errors
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

    <div class="accountbg"></div>
    <div class="wrapper-page">

        <div class="card">
            <div class="card-body">

                <div class="text-center m-b-5">
                    <a href="<?php echo BASE_URL; ?>signin" class="logo logo-admin">
                        <img src="admin-assets/images/rfzdigital-uk-logo.png" height="24" alt="logo">
                    </a>
                </div>

                
<?php if (!empty($error)): ?>
    <div class="alert alert-danger">
        <?php echo $error; ?>
    </div>
<?php endif; ?>

<?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
    <div class="alert alert-success">
        Registration successful! Please log in.
    </div>
<?php endif; ?>


                <div class="p-3">
                    <form class="form-horizontal m-t-20" action="<?php echo BASE_URL; ?>signin" method="POST" autocomplete="off">

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
                                <button class="btn btn-danger btn-block waves-effect waves-light" type="submit">Log In</button>
                            </div>
                        </div>
                       <div class="form-group m-t-10 mb-0 row">
                                <!-- <div class="col-sm-7 m-t-20">
                                    <a href="pages-recoverpw.html" class="text-muted"><i class="mdi mdi-lock"></i> <small>Forgot your password ?</small></a>
                                </div> -->
                                <!--<div class="col-sm-5 m-t-20">-->
                                <!--    <a href="" class="text-muted"><i class="mdi mdi-account-circle"></i> <small>Create an account ?</small></a>-->
                                <!--</div>-->
                            </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- jQuery -->
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

</body>
</html>
