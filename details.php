
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <title> Armarra  </title>

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
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
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
              <li><a href="softwares.php">Softwares</a></li>
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

        <?php
// Include your database connection
include 'volcanosx/dbcon.php';

// Check if the product name is provided in the URL
if (isset($_GET['name'])) {
    $product_name = $_GET['name'];
    
    // Query to retrieve product details based on the product name
    $sql = "SELECT * FROM products WHERE name = '$product_name'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $thumb = str_replace('../', '', $row['thumb']);
        $name = $row['name'];

        // Close the PHP tag to insert HTML content
        ?>
        <!-- ***** Featured Start ***** -->
        <div class="row">
            <div class="col-lg-12">
                <div class="game-details">
                    <div class="row">
                        <div class="col-lg-4">
                            <img src="<?php echo $thumb; ?>" alt="" style="border-radius: 23px;">
                        </div>
                        <div class="col-lg-8">
                            <div class="thumb">
                                <h2><?php echo $name; ?></h2>
                                <div class="col-lg-12">
                                    <div class="main-border-button">
                                        <a href="#">Download Now!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ***** Featured End ***** -->

        <?php
        // Resume PHP for additional content if needed
    } else {
        echo "Product not found.";
    }
} else {
    echo "Product name not provided.";
}

// Close the database connection
mysqli_close($conn);
?>

</div>

          <!-- ***** Details Start ***** -->
          <div class="game-details">
            <div class="row">
              <div class="col-lg-12">
                
              </div>
              <?php
include 'volcanosx/dbcon.php';

if (isset($_GET['name'])) {
    $product_name = $_GET['name'];
    $sql = "SELECT * FROM products WHERE name = '$product_name'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $average_rating = $row['average_rating'];
        $total_downloads = $row['total_downloads'];
        $category = $row['category'];
        $description = $row['description'];
        
        // Retrieve image URLs from the database
        $image1 = str_replace('../', '', $row['det_img1']);
        $image2 = str_replace('../', '', $row['det_img2']);
        $image3 = str_replace('../', '', $row['det_img3']);
        // Now, populate the HTML with the retrieved data
        echo '<div class="col-lg-12">';
        echo '  <div class="content">';
        echo '    <div class="row">';
        echo '      <div class="col-lg-12">';
        echo '        <div class="dets">';
        echo '          <ul>';
        echo '            <li><i class="fa fa-star"></i> ' . $average_rating . '</li>';
        echo '            <li><i class="fa fa-download"></i> ' . $total_downloads . '</li>';
        echo '            <li><i class="fas fa-layer-group"></i> ' . $category . '</li>';
        echo '          </ul>';
        echo '        </div>';
        echo '      </div>';
        echo '      <div class="col-lg-4">';
        // Display the first image from the database
        echo '        <img src="' . $image1 . '" alt="" style="border-radius: 23px; margin-bottom: 30px;">';
        echo '      </div>';
        echo '      <div class="col-lg-4">';
        // Display the second image from the database
        echo '        <img src="' . $image2 . '" alt="" style="border-radius: 23px; margin-bottom: 30px;">';
        echo '      </div>';
        echo '      <div class="col-lg-4">';
        // Display the third image from the database
        echo '        <img src="' . $image3 . '" alt="" style="border-radius: 23px; margin-bottom: 30px;">';
        echo '      </div>';
        echo '      <div class="col-lg-12">';
        echo '        <p>';
        echo '          ' . $description;
        echo '        </p>';
        echo '      </div>';
        echo '    </div>';
        echo '  </div>';
        echo '</div>';
    } else {
        echo "Product not found.";
    }
} else {
    echo "Product name not provided.";
}

mysqli_close($conn);
?>

            </div>
          </div>
          <!-- ***** Details End ***** -->

        </div>
      </div>
    </div>
  </div>
  
  <?php require 'footer.php'; ?>