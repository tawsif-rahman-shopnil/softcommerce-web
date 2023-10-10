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
        <link rel="apple-touch-icon" sizes="180x180" href="assets/images/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon-16x16.png">
        <link rel="manifest" href="assets/images/site.webmanifest">

        <!-- App css -->

        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

        <!-- icons -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />


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