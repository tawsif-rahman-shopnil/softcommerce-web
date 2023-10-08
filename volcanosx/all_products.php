<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8" />
        <title>Crednik - All Products</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->

        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

        <!-- icons -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />


    </head>

    <!-- body start -->
    <body class="loading" data-layout-color="light"  data-layout-mode="default" data-layout-size="fluid" data-topbar-color="light" data-leftbar-position="fixed" data-leftbar-color="light" data-leftbar-size='default' data-sidebar-user='true'>

        <!-- Begin page -->
        <div id="wrapper">


            <!-- Topbar Start -->
            <div class="navbar-custom">
                    <ul class="list-unstyled topnav-menu float-end mb-0">

                        
                        <li class="dropdown d-inline-block d-lg-none">
                            <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="fe-search noti-icon"></i>
                            </a>
                            <div class="dropdown-menu dropdown-lg dropdown-menu-end p-0">
                                <form class="p-3">
                                    <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                </form>
                            </div>
                        </li>
            

                        <li class="dropdown notification-list topbar-dropdown">
                            <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="assets/images/users/user-1.jpg" alt="user-image" class="rounded-circle">
                                <span class="pro-user-name ms-1">
                                    Hasnat <i class="mdi mdi-chevron-down"></i> 
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>
    
                                <!-- item-->
                                <a href="contacts-profile.html" class="dropdown-item notify-item">
                                    <i class="fe-user"></i>
                                    <span>My Account</span>
                                </a>
    
    
                                <div class="dropdown-divider"></div>
    
                                <!-- item-->
                                <a href="auth-logout.html" class="dropdown-item notify-item">
                                    <i class="fe-log-out"></i>
                                    <span>Logout</span>
                                </a>
    
                            </div>
                        </li>
                    </ul>
    
                    <!-- LOGO -->
                    <div class="logo-box">
                        <a href="dashboard.php" class="logo logo-dark text-center">
                            <span class="logo-sm">
                                <img src="assets/images/logo.png " alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="assets/images/logo.png " alt="" height="16">
                            </span>
                        </a>
                    </div>

                    <ul class="list-unstyled topnav-menu topnav-menu-left mb-0">
                        <li>
                            <button class="button-menu-mobile disable-btn waves-effect">
                                <i class="fe-menu"></i>
                            </button>
                        </li>

            
                    </ul>

                    <div class="clearfix"></div> 
               
            </div>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                <div class="h-100" data-simplebar>

                     <!-- User box -->
                    <div class="user-box text-center">

                        <img src="assets/images/users/user-1.jpg" alt="user-img" title="Mat Helme" class="rounded-circle img-thumbnail avatar-md">
                            <div class="dropdown">
                                <a href="#" class="user-name dropdown-toggle h5 mt-2 mb-1 d-block" data-bs-toggle="dropdown"  aria-expanded="false">Hasnat Jani</a>
                                <div class="dropdown-menu user-pro-dropdown">

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="fe-user me-1"></i>
                                        <span>My Account</span>
                                    </a>
        
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="fe-settings me-1"></i>
                                        <span>Settings</span>
                                    </a>
        
        
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="fe-log-out me-1"></i>
                                        <span>Logout</span>
                                    </a>
        
                                </div>
                            </div>

                    </div>

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul id="side-menu">
                
                            <li>
                                <a href="dashboard.php">
                                    <i class="ti-panel"></i>
                                    <span> Dashboard </span>
                                </a>
                            </li>

                            <li>
                                <a href="products.php">
                                    <i class="fas fa-plus"></i>
                                    <span> Add Products </span>
                                </a>
                            </li>
                            <li>
                                <a href="all_products.php">
                                    <i class="fe-database"></i>
                                    <span> Products </span>
                                </a>
                            </li>


                            

                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">       
                            <!-- Add Product Form -->
                            <div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Product List</h4>
                    <p class="text-muted font-14 mb-3">List of all products</p>

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th>Action</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Icon</th>
                                    <th>Thumbnail</th>
                                    <th>Detailed Images</th>
                                    <th>Featured Image</th>
                                    <th>Is Featured</th>
                                    <th>Category</th>
                                    <th>Download Link</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            // Include the database connection
                            include 'dbcon.php';

                            // Handle Remove Product
                            if (isset($_GET['remove_id'])) {
                                $removeId = $_GET['remove_id'];
                                $sql = "DELETE FROM products WHERE id = $removeId";
                                if (mysqli_query($conn, $sql)) {
                                    echo "<div class='alert alert-success'>Product removed successfully!</div>";
                                } else {
                                    echo "<div class='alert alert-danger'>Error: " . mysqli_error($conn) . "</div>";
                                }
                            }

                            // Perform SQL query to retrieve products
                            $sql = "SELECT * FROM products";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>";
                                    echo "<a href='modify_product.php?id={$row['id']}' class='btn btn-warning'><i class='fas fa-edit'></i></a> ";
                                    echo "<a href='?remove_id={$row['id']}' class='btn btn-danger' onclick='return confirm(\"Are you sure you want to remove this product?\");'><i class='fas fa-trash'></i></a>";
                                    echo "</td>";

                                    echo "<td>{$row['name']}</td>";
                                    echo "<td>{$row['description']}</td>";
                                    echo "<td>{$row['price']}</td>";
                                    echo "<td><img src='{$row['icon']}' alt='Icon' class='img-icon' width='25'></td>";
                                    echo "<td><img src='{$row['thumb']}' alt='Thumbnail' class='img-thumbnail' width='100'></td>";
                                    echo "<td>";
                                    if (!empty($row['det_img1'])) {
                                        echo "<img src='{$row['det_img1']}' alt='Detailed Image 1' class='img-thumbnail' width='100'><br>";
                                    }
                                    if (!empty($row['det_img2'])) {
                                        echo "<img src='{$row['det_img2']}' alt='Detailed Image 2' class='img-thumbnail' width='100'><br>";
                                    }
                                    if (!empty($row['det_img3'])) {
                                        echo "<img src='{$row['det_img3']}' alt='Detailed Image 3' class='img-thumbnail' width='100'><br>";
                                    }
                                    echo "</td>";
                                    echo "<td><img src='{$row['feat_img']}' alt='Featured Image' class='img-thumbnail' width='100'></td>";
                                    echo "<td>{$row['is_feat']}</td>";
                                    echo "<td>{$row['category']}</td>";
                                    echo "<td>{$row['dl_link']}</td>";

                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='10'>No products found.</td></tr>";
                            }

                            // Handle Modify Product
                            if (isset($_GET['modify_id'])) {
                                $modifyId = $_GET['modify_id'];
                                // Redirect to a modification form/page for this product
                                header("Location: modify_product.php?id=$modifyId");
                                exit();
                            }

                            // Close the database connection
                            mysqli_close($conn);
                            ?>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


                               
                            </div><!-- end col -->

                        </div>
                        <!-- end row -->       
                        
                    </div> <!-- container-fluid -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6"></div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- Vendor -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        <script src="assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
        <script src="assets/libs/feather-icons/feather.min.js"></script>

        <!-- knob plugin -->
        <script src="assets/libs/jquery-knob/jquery.knob.min.js"></script>

        <!--Morris Chart-->
        <script src="assets/libs/morris.js06/morris.min.js"></script>
        <script src="assets/libs/raphael/raphael.min.js"></script>
  
        <!-- Dashboar init js-->
        <script src="assets/js/pages/dashboard.init.js"></script>

        <!-- App js-->
        <script src="assets/js/app.min.js"></script>
        
    </body>
</html>