<?php


require 'rfzwebdb.php';

session_start();
if (!isset($_SESSION['admin_id'])) {
    header('Location: ' . BASE_URL . 'signin');
    exit;
}
// Check the role of the logged-in user
$admin_role = $_SESSION['admin_role']; // Assuming this is set during login (e.g., 'super_admin' or 'admin')
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

        <!-- Plugins css -->
        <link href="admin-assets/plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />

        <link href="admin-assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="admin-assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="admin-assets/css/style.css" rel="stylesheet" type="text/css">



        <!-- Editor -->
        <!-- Summernote css -->
        <link href="admin-assets/plugins/summernote/summernote-bs4.css" rel="stylesheet" />
        <!--Morris Chart CSS -->
<link rel="stylesheet" href="admin-assets/plugins/morris/morris.css">



        


    </head>


    <body class="fixed-left">

        <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
                    <i class="ion-close"></i>
                </button>

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center bg-logo">
                        <!-- <a href="index.html" class="logo"><i class="mdi mdi-bowling text-success"></i> Zoogler</a> -->
                        <a href="<?php echo BASE_URL; ?>dashboard" class="logo"><img src="admin-assets/images/rfzdigital-uk-logo-White.png" height="24" alt="logo"></a>
                    </div>
                </div>
                <div class="sidebar-user">
                    <img src="admin-assets/images/users/avatar-6.jpg" alt="user" class="rounded-circle img-thumbnail mb-1">
                    <h6 class=""><?php echo $_SESSION['admin_username']; ?></h6> 
                    <p class=" online-icon text-dark"><i class="mdi mdi-record text-success"></i>online</p>                    
                    <ul class="list-unstyled list-inline mb-0 mt-2">
                        <!-- <li class="list-inline-item">
                            <a href="#" class="" data-toggle="tooltip" data-placement="top" title="Profile"><i class="dripicons-user text-purple"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="" data-toggle="tooltip" data-placement="top" title="Settings"><i class="dripicons-gear text-dark"></i></a>
                        </li> -->
                        <li class="list-inline-item">
                            <a href="<?php echo BASE_URL; ?>logout" class="" data-toggle="tooltip" data-placement="top" title="Log out"><i class="dripicons-power text-danger"></i></a>
                        </li>
                    </ul>           
                </div>

                <div class="sidebar-inner slimscrollleft">

                    <div id="sidebar-menu">
                        <ul>
                            <?php if ($admin_role == 'super_admin'): ?>
                            <li>
                                <a href="<?php echo BASE_URL; ?>registered-admins" class="waves-effect"><i class="dripicons-to-do"></i><span> Admin list </span></a>
                            </li>
                           
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-graph-line"></i><span> Analytics</span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="<?php echo BASE_URL; ?>analytics">Charts</a></li>
                                    <li><a href="<?php echo BASE_URL; ?>details-analytics">Details Analytics</a></li>
                                </ul>
                            </li>
                            <?php endif; ?>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-copy"></i><span> Blogs</span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="<?php echo BASE_URL; ?>all-blogs">View Blogs</a></li>
                                    <li><a href="<?php echo BASE_URL; ?>add-new-blog">Add New Blog</a></li>
                                    <li><a href="<?php echo BASE_URL; ?>add-new-blog-category">Add New Blog Category</a></li>
                                    <li><a href="<?php echo BASE_URL; ?>comments">comments</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div> <!-- end sidebarinner -->
            </div>
            <!-- Left Sidebar End -->

            <!-- Start right Content here -->

            <div class="content-page">
                <!-- Start content -->
                <div class="content">

                    <!-- Top Bar Start -->
                    <div class="topbar">

                        <nav class="navbar-custom">

                            <ul class="list-inline float-right mb-0">
                                <!-- language-->
                              
                               
                               

                                <li class="list-inline-item dropdown notification-list">
                                    <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                                       aria-haspopup="false" aria-expanded="false">
                                        <img src="admin-assets/images/users/avatar-6.jpg" alt="user" class="rounded-circle">
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                        <!-- item-->
                                        <div class="dropdown-item noti-title">
                                            <h5>Welcome</h5>
                                        </div>
                                        <!-- <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle m-r-5 text-muted"></i> Profile</a>
                                        <a class="dropdown-item" href="#"><i class="mdi mdi-wallet m-r-5 text-muted"></i> My Wallet</a>
                                        <a class="dropdown-item" href="#"><span class="badge badge-success float-right">5</span><i class="mdi mdi-settings m-r-5 text-muted"></i> Settings</a>
                                        <a class="dropdown-item" href="#"><i class="mdi mdi-lock-open-outline m-r-5 text-muted"></i> Lock screen</a> -->
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?php echo BASE_URL; ?>logout"><i class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a>
                                    </div>
                                </li>
                            </ul>

                            

                            <div class="clearfix"></div>
                        </nav>
                    </div>
                    <!-- Top Bar End -->
