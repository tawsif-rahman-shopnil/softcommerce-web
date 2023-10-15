<?php
$page = 'software'; // Set the active page
echo "Current page: $page"; // Debugging line
include 'header.php';
?>

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
$sql = "SELECT p.name, p.feat_img, pr.rating, p.total_downloads, p.price, oi.quantity
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
                <li><i class="fas fa-dollar-sign"></i> ' . $row['price'] . '</li>
            </ul>
        </div>';
    }
} else {
    echo "No featured games found.";
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
$sql = "SELECT p.id, p.name, p.category, p.thumb, pr.rating, oi.quantity, p.price
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
            <span><i class="fas fa-dollar-sign"></i> ' . $row['price'] . '</span>
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
  </div>
  </br>
  
  <?php require 'footer.php'; ?>