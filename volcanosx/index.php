<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Log In | Swinroll Tech Admin Dashboard </title>
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
    <body class="loading authentication-bg authentication-bg-pattern">

<div class="account-pages my-5">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-4">
                <div class="text-center">
                    <a href="index.php">
                        <!-- Replace the src attribute with your logo image path -->
                        <img src="assets/images/logo.png" alt="Logo" height="22" class="mx-auto">
                    </a>
                    <p class="text-muted mt-2 mb-4">Admin Login</p>
                </div>
                <div class="card">
                    <div class="card-body p-4">

                        <?php
                        include('dbcon.php'); // Include the file that handles database connection
                        session_start();
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            $username = $_POST['username'];
                            $password = $_POST['password'];
                        
                            // Perform SQL query to check if the user exists
                            $stmt = $conn->prepare("SELECT * FROM admins WHERE username = ?");
                            $stmt->bind_param('s', $username);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            $user = $result->fetch_assoc();
                        
                            if ($user) {
                                // Valid login, set session variables and redirect to dashboard
                                $_SESSION['user_id'] = $user['id'];
                                $_SESSION['username'] = $user['username'];
                                header("Location: dashboard.php"); // Redirect to the dashboard page
                                exit();
                            } else {
                                // Debugging line: Output that the user doesn't exist
                                echo "User not found";
                        
                                // Invalid login, show an error message
                                $error_message = "Invalid username or password.";
                            }
                        }
                        
                        ?>

                        <form action="#" method="POST">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input class="form-control" type="text" id="username" name="username" required="" placeholder="Enter your username">
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input class="form-control" type="password" required="" id="password" name="password" placeholder="Enter your password">
                            </div>

                            <div class="mb-3 d-grid text-center">
                                <button class="btn btn-primary" type="submit">Log In</button>
                            </div>
                        </form>

                        <?php
                        if (isset($error_message)) {
                            echo '<p class="text-danger">' . $error_message . '</p>';
                        }
                        ?>

                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->

            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->


        <!-- Vendor -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        <script src="assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
        <script src="assets/libs/feather-icons/feather.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>
        
    </body>
</html>