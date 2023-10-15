<?php
$page = 'custauth'; // Set the active page
echo "Current page: $page"; // Debugging line
include 'header.php';
?>


  <div class="container" style="margin-top: 90px;" >
    <div class="row">
      <div class="col-lg-12">
        <div class="page-content">

          <!-- ***** Buttons Area Start ***** -->
          <div class="buttons-container">
            <div class="heading-section">
                  <h4>Sign-up or Login to Continue</h4>      
                <div class="button">
                    <a href="signup.php">Sign-up</a></br>
                    <a href="login.php">Login</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <!-- ***** Buttons Area End ***** -->
        </div>
 </br>
  <?php require 'footer.php'; ?>
