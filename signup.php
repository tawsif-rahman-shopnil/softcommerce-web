<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title> Armarra </title>

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

  <div class="container" style="margin-top: 50px;" >
    <div class="row">
      <div class="col-lg-12">
        <div class="page-content">

          <!-- ***** Buttons Area Start ***** -->
          <div class="auth-container"> 
            <div class="heading-section">
                  <h4>Create an Account</h4>      
                    <div class="button">
                        <form method="POST" action="">
                            <label for="username">Username:</label>
                            <input type="text" name="username" id="username" required><br>

                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" required><br>

                            <label for="email">Email:</label>
                            <input type="email" name="email" id="email" required><br>

                            <label for="password">Password:</label>
                            <input type="password" name="password" id="password" required><br>

                            <input type="submit" name="submit" value="Sign-up">
                        </form>
                    </div>
                  </div>
              </div>

    <?php
    // Include the database connection file
    include 'volcanosx/dbcon.php';

    if (isset($_POST["submit"])) {
        // Retrieve form data
        $username = $_POST['username'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password for security

        // SQL query to insert data into the database
        $sql = "INSERT INTO users (username, name, email, password) VALUES (?, ?, ?, ?)";

        // Prepare the SQL statement
        $stmt = $pdo->prepare($sql);

        if ($stmt) {
            // Bind parameters
            $stmt->bindParam(1, $username);
            $stmt->bindParam(2, $name);
            $stmt->bindParam(3, $email);
            $stmt->bindParam(4, $password);

            // Execute the prepared statement
            if ($stmt->execute()) {
                echo "Registration successful. You can now log in.";
            } else {
                echo "Error: Registration failed.";
            }
        } else {
            echo "Error: Unable to prepare the SQL statement.";
        }
    }
    ?>
        <!-- ***** Buttons Area End ***** -->

  <?php require 'footer.php'; ?>
