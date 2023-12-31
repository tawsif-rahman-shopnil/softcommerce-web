<?php
$page = 'home'; // Set the active page
echo "Current page: $page"; // Debugging line
include 'header.php';
?>

  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-content">

          <!-- ***** Banner Start ***** -->
          <div class="main-banner">
            <div class="row">
              <div class="col-lg-7">
                <div class="header-text">
                  <h6>Welcome To our Shop</h6>
                  <h4><em>Buy</em> Our Popular Games/Apps Here</h4>
                  <div class="main-button">
                  <a href="games.php">Games</a>
                  <a href="softwares.php">Softwares</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- ***** Banner End ***** -->

          <!-- ***** Most Popular Start ***** -->
          <div class="most-popular">
            <div class="row">
              <div class="col-lg-12">
                <div class="heading-section">
                  <h4>Most Popular Right Now</h4>
                  <div class="row">
                  <?php
// Include your database connection
include 'volcanosx/dbcon.php';

// Query to retrieve the required data from the database
$sql = "SELECT p.id, p.thumb, p.name, pr.rating, oi.quantity, p.price
        FROM products p
        LEFT JOIN product_reviews pr ON p.id = pr.product_id
        LEFT JOIN order_items oi ON p.id = oi.product_id";

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
              <ul>
                <li><i class="fas fa-dollar-sign"></i> ' . $row['price'] . '</li>
              </ul>
            </div>
          </a>
        </div>
        ';
    }
} else {
    echo "No data found.";
}

// Close the database connection
mysqli_close($conn);
?>
                  </div>

          <!-- ***** Most Popular End ***** -->

       <!-- ***** Start Stream Start ***** -->
          <div class="start-stream">
              <div class="col-lg-12">
                  <div class="heading-section">
                      <h4>Explore Our Offerings</h4>
                  </div>
                  <div class="row">
                      <div class="col-lg-4">
                          <div class="item">
                              <div class="icon">
                                  <img src="assets/images/service-01.jpg" alt="" style="max-width: 60px; border-radius: 50%;">
                              </div>
                              <h4>Software Selection</h4>
                              <p>Armarra.com offers a diverse range of software to meet your needs. Explore our extensive collection and find the perfect software solutions for your tasks.</p>
                          </div>
                      </div>
                      <div class="col-lg-4">
                          <div class="item">
                              <div class="icon">
                                  <img src="assets/images/service-02.jpg" alt="" style="max-width: 60px; border-radius: 50%;">
                              </div>
                              <h4>Game Library</h4>
                              <p>Discover a world of gaming at Armarra.com. Our game library is packed with exciting titles that will keep you entertained for hours. Get ready to play!</p>
                          </div>
                      </div>
                      <div class="col-lg-4">
                          <div class="item">
                              <div class="icon">
                                  <img src="assets/images/service-03.jpg" alt="" style="max-width: 60px; border-radius: 50%;">
                              </div>
                              <h4>Quality Assurance</h4>
                              <p>At Armarra.com, we prioritize quality and reliability. Rest assured that our software and games are thoroughly tested to ensure a seamless user experience.</p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!-- ***** Start Stream End ***** -->


          <!-- ***** Live Stream Start ***** -->
            <div class="most-popular">
              <div class="row">
                <div class="col-lg-12">
                  <div class="heading-section">
                    <h4> Most Downloaded Products </h4>
                  </div>
                  <div class="row">
                  <?php
// Include your database connection
include 'volcanosx/dbcon.php';

// Query to retrieve the required data from the database
$sql = "SELECT p.id, p.thumb, p.name, pr.rating, oi.quantity, p.price
        FROM products p
        LEFT JOIN product_reviews pr ON p.id = pr.product_id
        LEFT JOIN order_items oi ON p.id = oi.product_id";

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
              <ul>
                <li><i class="fas fa-dollar-sign"></i> ' . $row['price'] . '</li>
              </ul>
            </div>
          </a>
        </div>
        ';
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
        </div>
      </div>
    </div> </br>
  <?php require 'footer.php'; ?>
