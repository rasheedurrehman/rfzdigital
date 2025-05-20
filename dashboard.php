

<?php include 'includes/ad-header.php'; ?>




<!-- Top Bar End -->

<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group float-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="#">RFZ Digital</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="icon-contain">
                                    <div class="row">
                                        <div class="col-2 align-self-center">
                                            <i class="fas fa-tasks text-gradient-success"></i>
                                        </div>
                                        <!-- <div class="col-10 text-right">
                                            <h5 class="mt-0 mb-1">190</h5>
                                            <p class="mb-0 font-12 text-muted">Active Tasks</p>   
                                        </div> -->
                                        <?php
// Assuming $pdo is your PDO connection
$query = "SELECT COUNT(*) AS total_blogs FROM blog_posts";
$stmt = $pdo->query($query);
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$total_blogs = $result['total_blogs'];
?>
<div class="col-10 text-right">
    <h5 class="mt-0 mb-1"><?php echo $total_blogs; ?></h5>
    <p class="mb-0 font-12 text-muted">Total Blogs Published</p>   
</div>
                                    </div>                                                        
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body justify-content-center">
                                <div class="icon-contain">
                                    <div class="row">
                                        <div class="col-2 align-self-center">
                                            <i class="far fa-gem text-gradient-danger"></i>
                                        </div>
                                        <?php
// Assuming $pdo is your PDO connection
$query = "SELECT COUNT(*) AS total_categories FROM categories";
$stmt = $pdo->query($query);
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$total_categories = $result['total_categories'];
?>
                                        <div class="col-10 text-right">
                                            <h5 class="mt-0 mb-1"><?php echo $total_categories; ?></h5>
                                            <p class="mb-0 font-12 text-muted">Blog Categories</p>
                                        </div>
                                        
                                    </div>                                                        
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                <div class="card text-center"> <!-- Center aligning text inside card -->
                    <div class="card-body">
                        <div class="icon-contain">
                            <div class="row align-items-center justify-content-center">
                                <!-- Icon -->
                                <div class="col-auto">
                                    <i class="fas fa-comments text-gradient-warning" style="font-size: 24px;"></i>
                                </div>
                                <?php
                                // Assuming $pdo is your PDO connection
                                try {
                                    $query = "SELECT 
                                                COUNT(*) AS total_comments,
                                                COALESCE(SUM(CASE WHEN approved = 1 THEN 1 ELSE 0 END), 0) AS approved_comments,
                                                COALESCE(SUM(CASE WHEN approved = 0 THEN 1 ELSE 0 END), 0) AS not_approved_comments
                                              FROM comments";

                                    $stmt = $pdo->query($query);
                                    $result = $stmt->fetch(PDO::FETCH_ASSOC);

                                    $total_comments = $result['total_comments'] ?? 0;
                                    $approved_comments = $result['approved_comments'] ?? 0;
                                    $not_approved_comments = $result['not_approved_comments'] ?? 0;

                                } catch (PDOException $e) {
                                    die("Database Error: " . $e->getMessage());
                                }
                                ?>
                                <!-- Displaying Data in Columns -->
                                <div class="col-10 d-flex justify-content-center">
                                    <div class="col-4 text-center">
                                        <h5 class="mt-0 mb-1"><?php echo $total_comments; ?></h5>
                                        <p class="mb-0 font-12 text-muted">Total</p>    
                                    </div>
                                    <div class="col-4 text-center">
                                        <h5 class="mt-0 mb-1"><?php echo $approved_comments; ?></h5>
                                        <p class="mb-0 font-12 text-success">Approved</p>
                                    </div>
                                    <div class="col-4 text-center">
                                        <h5 class="mt-0 mb-1"><?php echo $not_approved_comments; ?></h5>
                                        <p class="mb-0 font-12 text-danger">Not Approved</p>
                                    </div>
                                </div>
                            </div>                                                    
                        </div>                                                    
                    </div>
                </div>
            </div>
                                                                
                </div> 
                                        
            </div>
                                          
        </div>

<div class="row ">
    <div class="col-lg-12">
                                               
    </div>
</div>



       


    </div><!-- container -->

</div> <!-- Page content Wrapper -->

<?php include 'includes/ad-footer.php'; ?>