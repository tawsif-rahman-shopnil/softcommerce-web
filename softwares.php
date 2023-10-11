<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title> Armarra | Software </title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="assets/images/favicon.ico">
        <link rel="apple-touch-icon" sizes="180x180" href="assets/images/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon-16x16.png">
        <link rel="manifest" href="assets/images/site.webmanifest">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-cyborg-gaming.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
 
  </head>

<body>

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.php" class="logo">
                        <img src="assets/images/logo.png " alt="">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Search End ***** -->
                    <div class="search-input">
                      <form id="search" action="#">
                        <input type="text" placeholder="Type Something" id='searchText' name="searchKeyword" onkeypress="handle" />
                        <i class="fa fa-search"></i>
                      </form>
                    </div>
                    <!-- ***** Search End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="games.php">Games</a></li>
                        <li><a href="softwares.php" class="active">Softwares</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <div class="main-button">
                          <a href="custauth.php">Login/Sign-up</a>
                        </div>
                    </ul>   
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-content">

          <!-- ***** Featured Games Start ***** -->
          <div class="row">
            <div class="col-lg-8">
              <div class="featured-games header-text">
                <div class="heading-section">
                  <h4><em>Featured</em> Softwares</h4>
                </div>
                <div class="owl-features owl-carousel">
                <?php
// Include your database connection
include 'volcanosx/dbcon.php';

// Query to retrieve the featured games from the database
$sql = "SELECT p.name, p.feat_img, pr.rating, p.total_downloads, oi.quantity
        FROM products p
        LEFT JOIN product_reviews pr ON p.id = pr.product_id
        LEFT JOIN order_items oi ON p.id = oi.product_id
        WHERE p.is_feat = 'Y' AND p.category = 'Softwares'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $thumb = str_replace('../', '', $row['feat_img']);
        $productName = $row['name'];
        $downloads = number_format($row['total_downloads']);

        echo '
        <div class="item">
            <div class="thumb">
                <a href="details.php?name=' . urlencode($productName) . '">
                    <img src="' . $thumb . '" alt="">
                </a>
            </div>
            <h4>' . $productName . '<br><span>' . $downloads . ' Downloads</span></h4>
            <ul>
                <li><i class="fa fa-star"></i> ' . $row['rating'] . '</li>
                <li><i class="fa fa-download"></i> ' . $row['quantity'] . '</li>
            </ul>
        </div>';
    }
} else {
    echo "No featured softwares found.";
}

// Close the database connection
mysqli_close($conn);
?>

                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="top-downloaded">
                <div class="heading-section">
                  <h4><em>Top</em> Downloaded</h4>
                </div>
                <ul class="scrollable-list">
                <?php
// Include your database connection
include 'volcanosx/dbcon.php';

// Query to retrieve the required data from the database
$sql = "SELECT p.id, p.name, p.category, p.thumb, pr.rating, oi.quantity
        FROM products p
        LEFT JOIN product_reviews pr ON p.id = pr.product_id
        LEFT JOIN order_items oi ON p.id = oi.product_id
        WHERE p.category = 'Softwares'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $categoryIcon = '';
        if ($row['category'] === 'Softwares') {
            $categoryIcon = '<i class="fa fa-gamepad"></i>';
        } elseif ($row['category'] === 'Software') {
            $categoryIcon = '<i class="fa fa-cogs"></i>';
        }
        $thumb = str_replace('../', '', $row['thumb']);
        $productName = urlencode($row['name']); // Encode the product name for the URL

        echo '
        <li>
          <a href="details.php?name=' . $productName . '">
            <img src="' . $thumb . '" alt="" class="templatemo-item">
            <h4>' . $row['name'] . '</h4>
            <h6>' . $categoryIcon . ' ' . $row['category'] . '</h6>
            <span><i class="fa fa-star" style="color: yellow;"></i> ' . $row['rating'] . '</span>
            <span><i class="fa fa-download" style="color: #ec6090;"></i> ' . $row['quantity'] . '</span>
            <div class="download">
              <a href="custauth.php"><i class="fa fa-download"></i></a>
            </div>
          </a>
        </li>';
    }
} else {
    echo "No data found.";
}

// Close the database connection
mysqli_close($conn);
?>

</ul>

              </div>
            </div>
          </div>
          <!-- ***** Featured Games End ***** -->

                 <!-- ***** Start Stream Start ***** -->
                 <div class="start-stream">
                  <div class="col-lg-12">
                    <div class="heading-section">
                      <h4>Our Library</h4>
                    </div>
                    <div class="row">
                    <?php
// Include your database connection
include 'volcanosx/dbcon.php';

// Query to retrieve the featured games from the database, filtered by category
$sql = "SELECT p.id, p.thumb, p.name, pr.rating, oi.quantity
        FROM products p
        LEFT JOIN product_reviews pr ON p.id = pr.product_id
        LEFT JOIN order_items oi ON p.id = oi.product_id
        WHERE p.is_feat = 'Y' AND p.category = 'Softwares'"; // Added the category filter

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Remove the '../' part from the 'thumb' field
        $thumb = str_replace('../', '', $row['thumb']);

        // Create a clickable link that passes the product's name as a parameter to details.php
        echo '
        <div class="col-lg-3 col-sm-6">
          <a href="details.php?name=' . urlencode($row['name']) . '">
            <div class="item">
              <img src="' . $thumb . '" alt="">
              <h4>' . $row['name'] . '</h4>
            </div>
          </a>
        </div>';
    }
} else {
    echo "No data found.";
}

// Close the database connection
mysqli_close($conn);
?>


</div>

                <!-- ***** Live Stream End ***** -->
        </div>
      </div>
    </div>
  </div>
  
  <?php require 'footer.php'; ?>