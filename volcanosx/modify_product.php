<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8" />
        <title>Crednik - Edit Product</title>
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
                <?php
// Include the database connection
include 'dbcon.php';

// Check if the 'id' parameter is provided in the URL
if (isset($_GET['id'])) {
    // Get the product ID from the URL
    $modifyId = $_GET['id'];

    // Retrieve product details for modification
    $sql = "SELECT * FROM products WHERE id = ?";
    
    // Prepare the statement
    $stmt = mysqli_prepare($conn, $sql);
    
    // Bind the parameter
    mysqli_stmt_bind_param($stmt, "i", $modifyId);
    
    // Execute the statement
    mysqli_stmt_execute($stmt);

    // Get the result
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        $name = $row['name'];
        $description = $row['description'];
        $price = $row['price'];
        $is_feat = $row['is_feat'];
        $category = $row['category'];
        $icon = $row['icon'];
        $thumb = $row['thumb'];
        $det_img1 = $row['det_img1'];
        $det_img2 = $row['det_img2'];
        $det_img3 = $row['det_img3'];
        $feat_img = $row['feat_img'];
        $dl_link = $row['dl_link'];
    } else {
        // Product with the specified ID not found
        echo '<div class="alert alert-danger">Product not found.</div>';
        exit;
    }
} else {
    // 'id' parameter not provided in the URL
    echo '<div class="alert alert-danger">Product ID not provided.</div>';
    exit;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $is_feat = $_POST['is_feat'];
    $category = $_POST['category'];
    $dl_link = $_POST['dl_link'];

    // Handle image uploads and updates
    $uploadDir = "../images/"; // Directory to store uploaded images

    // Upload Icon Image if a new file is provided
    if (!empty($_FILES["icon"]["name"])) {
        $icon = $uploadDir . basename($_FILES["icon"]["name"]);
        move_uploaded_file($_FILES["icon"]["tmp_name"], $icon);
    }
    
    // Upload Thumbnail Image if a new file is provided
    if (!empty($_FILES["thumb"]["name"])) {
        $thumb = $uploadDir . basename($_FILES["thumb"]["name"]);
        move_uploaded_file($_FILES["thumb"]["tmp_name"], $thumb);
    }

    // Upload Detailed Images if new files are provided
    if (!empty($_FILES["det_img1"]["name"])) {
        $det_img1 = $uploadDir . basename($_FILES["det_img1"]["name"]);
        move_uploaded_file($_FILES["det_img1"]["tmp_name"], $det_img1);
    }

    if (!empty($_FILES["det_img2"]["name"])) {
        $det_img2 = $uploadDir . basename($_FILES["det_img2"]["name"]);
        move_uploaded_file($_FILES["det_img2"]["tmp_name"], $det_img2);
    }

    if (!empty($_FILES["det_img3"]["name"])) {
        $det_img3 = $uploadDir . basename($_FILES["det_img3"]["name"]);
        move_uploaded_file($_FILES["det_img3"]["tmp_name"], $det_img3);
    }

    // Upload Featured Image if a new file is provided
    if (!empty($_FILES["feat_img"]["name"])) {
        $feat_img = $uploadDir . basename($_FILES["feat_img"]["name"]);
        move_uploaded_file($_FILES["feat_img"]["tmp_name"], $feat_img);
    }

    // Prepare the SQL statement with parameter binding
    $sql = "UPDATE products SET 
            name = ?,
            description = ?,
            price = ?,
            is_feat = ?,
            category = ?,
            icon = ?,
            thumb = ?,
            det_img1 = ?,
            det_img2 = ?,
            det_img3 = ?,
            dl_link = ?,
            feat_img = ?
            WHERE id = ?";

    // Prepare the statement
    $stmt = mysqli_prepare($conn, $sql);

    // Bind parameters
    mysqli_stmt_bind_param($stmt, "ssdsssssssssi", $name, $description, $price, $is_feat, $category, $icon, $thumb, $det_img1, $det_img2, $det_img3, $dl_link, $feat_img, $modifyId);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        // Product details updated successfully
        echo '<div class="alert alert-success">Product details updated successfully!</div>';
    } else {
        echo '<div class="alert alert-danger">Error: ' . mysqli_stmt_error($stmt) . '</div>';
    }
    
    // Close the statement
    mysqli_stmt_close($stmt);
}

// Close the database connection
mysqli_close($conn);
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Modify Product</h4>
                    <p class="text-muted font-14 mb-3">
                        <!-- Back to Products List Button -->
                        <a href="all_products.php" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Back to Products List</a>
                    </p>
                    <!-- Product Modification Form -->
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $modifyId; ?>" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="name" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"><?php echo $description; ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" class="form-control" id="price" name="price" step="0.01" value="<?php echo $price; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Download Link</label>
                            <input type="text" class="form-control" id="dl_link" name="dl_link" value="<?php echo $dl_link; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="is_feat" class="form-label">Is Featured</label>
                            <select class="form-select" id="is_feat" name="is_feat">
                                <option value="Y" <?php if ($is_feat === 'Y') echo 'selected'; ?>>Yes</option>
                                <option value="N" <?php if ($is_feat === 'N') echo 'selected'; ?>>No</option>
                                <option value="N/A" <?php if ($is_feat === 'N/A') echo 'selected'; ?>>Not Applicable</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select class="form-select" id="category" name="category">
                                <option value="Games" <?php if ($category === 'Games') echo 'selected'; ?>>Games</option>
                                <option value="Softwares" <?php if ($category === 'Softwares') echo 'selected'; ?>>Softwares</option>
                            </select>
                        </div>
                        <!-- Icon Image -->
                        <div class="mb-3">
                            <label for="thumb" class="form-label">Icon Image</label>
                            <input type="file" class="form-control" id="icon" name="icon" accept="image/*">
                            <?php if (!empty($icon)) : ?>
                                <img src="<?php echo $icon; ?>" alt="Icon" class="img-icon" width="100">
                            <?php endif; ?>
                        </div>
                        <!-- Thumbnail Image -->
                        <div class="mb-3">
                            <label for="thumb" class="form-label">Thumbnail Image</label>
                            <input type="file" class="form-control" id="thumb" name="thumb" accept="image/*">
                            <?php if (!empty($thumb)) : ?>
                                <img src="<?php echo $thumb; ?>" alt="Thumbnail" class="img-thumbnail" width="100">
                            <?php endif; ?>
                        </div>
                        <!-- Detailed Images -->
                        <div class="mb-3">
                            <label for="det_img1" class="form-label">Detailed Image 1</label>
                            <input type="file" class="form-control" id="det_img1" name="det_img1" accept="image/*">
                            <?php if (!empty($det_img1)) : ?>
                                <img src="<?php echo $det_img1; ?>" alt="Detailed Image 1" class="img-thumbnail" width="100">
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="det_img2" class="form-label">Detailed Image 2</label>
                            <input type="file" class="form-control" id="det_img2" name="det_img2" accept="image/*">
                            <?php if (!empty($det_img2)) : ?>
                                <img src="<?php echo $det_img2; ?>" alt="Detailed Image 2" class="img-thumbnail" width="100">
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="det_img3" class="form-label">Detailed Image 3</label>
                            <input type="file" class="form-control" id="det_img3" name="det_img3" accept="image/*">
                            <?php if (!empty($det_img3)) : ?>
                                <img src="<?php echo $det_img3; ?>" alt="Detailed Image 3" class="img-thumbnail" width="100">
                            <?php endif; ?>
                        </div>
                        <!-- Featured Image -->
                        <div class="mb-3">
                            <label for="feat_img" class="form-label">Featured Image</label>
                            <input type="file" class="form-control" id="feat_img" name="feat_img" accept="image/*">
                            <?php if (!empty($feat_img)) : ?>
                                <img src="<?php echo $feat_img; ?>" alt="Featured Image" class="img-thumbnail" width="100">
                            <?php endif; ?>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


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
