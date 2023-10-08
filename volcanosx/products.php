<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8" />
        <title>Crednik - Add Products</title>
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
        <style>
        /* Add your custom CSS styles here */
        .table-container {
            max-height: 500px; /* Set your desired max height for the table */
            overflow-y: auto; /* Enable vertical scroll */
        }
    </style>

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
    <div class="container">
        <h2>Add a New Product</h2>
        <?php
        // Handle form submission
        error_reporting(E_ALL);
ini_set('display_errors', 1);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Include the database connection
            include 'dbcon.php';
            
            // Retrieve form data
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $is_feat = $_POST['is_feat'];
            $category = $_POST['category'];
            $dl_link = $_POST['dl_link'];

 // Handle image uploads
$uploadDir = "../images/"; // Directory to store uploaded images

// Upload Icon Image
$icon = $uploadDir . basename($_FILES["icon"]["name"]);
move_uploaded_file($_FILES["icon"]["tmp_name"], $icon);

// Upload Thumbnail Image
$thumb = $uploadDir . basename($_FILES["thumb"]["name"]);
move_uploaded_file($_FILES["thumb"]["tmp_name"], $thumb);

// Upload Detailed Images
$det_img1 = $uploadDir . basename($_FILES["det_img1"]["name"]);
move_uploaded_file($_FILES["det_img1"]["tmp_name"], $det_img1);

$det_img2 = $uploadDir . basename($_FILES["det_img2"]["name"]);
move_uploaded_file($_FILES["det_img2"]["tmp_name"], $det_img2);

$det_img3 = $uploadDir . basename($_FILES["det_img3"]["name"]);
move_uploaded_file($_FILES["det_img3"]["tmp_name"], $det_img3);

// Upload Featured Image
$feat_img = $uploadDir . basename($_FILES["feat_img"]["name"]);
move_uploaded_file($_FILES["feat_img"]["tmp_name"], $feat_img);


            // Perform SQL query to insert the data into the 'products' table
            $sql = "INSERT INTO products (name, description, price, dl_link, icon, thumb, det_img1, det_img2, det_img3, feat_img, is_feat, category)
                    VALUES ('$name', '$description', $price, '$dl_link', '$icon', '$thumb', '$det_img1', '$det_img2', '$det_img3', '$feat_img', '$is_feat', '$category')";

            if (mysqli_query($conn, $sql)) {
                // Product added successfully
                echo '<div class="alert alert-success">Product added successfully!</div>';
            } else {
                echo '<div class="alert alert-danger">Error: ' . mysqli_error($conn) . '</div>';
            }

            // Close the database connection
            mysqli_close($conn);
        }
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
            
        <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" step="0.01" required>
            </div>
            <div class="mb-3">
                <label for="dl_link" class="form-label">Download Link</label>
                <input type="dl_link" class="form-control" id="dl_link" name="dl_link" step="0.01" required>
            </div>

            <!-- Icon Image Upload -->
            <div class="mb-3">
                <label for="icon" class="form-label">Icon Image</label>
                <input type="file" class="form-control" id="icon" name="icon" accept="image/*" required>
            </div>
            
            <!-- Thumbnail Image Upload -->
            <div class="mb-3">
                <label for="thumb" class="form-label">Thumbnail Image</label>
                <input type="file" class="form-control" id="thumb" name="thumb" accept="image/*" required>
            </div>
            
            <!-- Detailed Images Upload -->
            <div class="mb-3">
                <label for="det_img1" class="form-label">Detailed Image 1</label>
                <input type="file" class="form-control" id="det_img1" name="det_img1" accept="image/*" required>
            </div>
            <div class="mb-3">
                <label for="det_img2" class="form-label">Detailed Image 2</label>
                <input type="file" class="form-control" id="det_img2" name="det_img2" accept="image/*">
            </div>
            <div class="mb-3">
                <label for="det_img3" class="form-label">Detailed Image 3</label>
                <input type="file" class="form-control" id="det_img3" name="det_img3" accept="image/*">
            </div>
            
            <!-- Featured Image Upload -->
            <div class="mb-3">
                <label for="feat_img" class="form-label">Featured Image</label>
                <input type="file" class="form-control" id="feat_img" name="feat_img" accept="image/*" required>
            </div>

            <div class="mb-3">
                <label for="is_feat" class="form-label">Is Featured</label>
                <select class="form-select" id="is_feat" name="is_feat">
                    <option value="Y">Yes</option>
                    <option value="N">No</option>
                    <option value="N/A">Not Applicable</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" id="category" name="category">
                    <option value="Games">Games</option>
                    <option value="Softwares">Softwares</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
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