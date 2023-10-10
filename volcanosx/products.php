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
        <link rel="apple-touch-icon" sizes="180x180" href="assets/images/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon-16x16.png">
        <link rel="manifest" href="assets/images/site.webmanifest">

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


            <?php require 'leftsidebar.php'; ?>

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