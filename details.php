<?php
$page = 'details'; // Set the active page
echo "Current page: $page"; // Debugging line
include 'header.php';
?>
  
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
                                    <?php
                                      // Check if the session ID is active
                                      session_start();
                                      if(isset($_SESSION['user_id']) && $_SESSION['user_id'] != "") {
                                        // If the session is active, route to cart.php
                                        echo '<a href="cart.php">Go to Cart <i class="fas fa-shopping-cart"></i></a>';
                                      } else {
                                        // If the session is not active, route to custauth.php
                                        echo '<a href="custauth.php">Download for $' . $row['price'] . ' <i class="fas fa-dollar-sign"></i></a>';
                                      }
                                    ?>
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