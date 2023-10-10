<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8" />
        <title> Crednik - Sales Report </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Include jsPDF library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

<!-- Include autoTable plugin for jsPDF -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.17/jspdf.plugin.autotable.min.js"></script>


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
    
    <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
            <h4 class="mt-0 header-title">Customer Report</h4>
                <p class="text-muted font-14 mb-3">
                </p>
                <!-- Add the "Download PDF" button at the top -->
                <form method="POST" action="generate_pdf.php" id="downloadPdfForm">
                    <button type="submit" class="btn btn-outline-dark rounded-pill waves-effect waves-light" name="downloadPdfButton">Download PDF</button>
                </form>
                <p class="text-muted font-14 mb-3">
                </p>
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                    <thead>
                        <tr>
                            <th>TrxID</th>
                            <th>Customer Name</th>
                            <th>Customer Email</th>
                            <th>Customer Last Order Date</th>
                            <th>Customer State</th>
                            <th>Customer Orders Count</th>
                            <th>Customer Total Spent</th>
                            <th>Payment Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        function getRandomDate()
                        {
                            $startDate = strtotime('20-06-2023');
                            $endDate = strtotime('23-09-2023');
                            $randomTimestamp = mt_rand($startDate, $endDate);
                            return date("d/m/Y", $randomTimestamp);
                        }

                        function getRandomPaymentStatus()
                        {
                            $statuses = ['Paid', 'Pending', 'Processing'];
                            return $statuses[array_rand($statuses)];
                        }
                        function getRandomTRXID()
                        {
                            // Generate a random TRXID using a combination of letters and numbers
                            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                            $trxid = '';
                            $length = 8; // You can adjust the length as needed

                            for ($i = 0; $i < $length; $i++) {
                                $trxid .= $characters[rand(0, strlen($characters) - 1)];
                            }

                            return $trxid;
                        }

                        $customerNames = [
                            'Emily Davis',
                            'Theodore Dinh',
                            'Luna Sanders',
                            'Penelope Jordan',
                            'Austin Vo',
                            'Joshua Gupta',
                            'Ruby Barnes',
                            'Luke Martin',
                            'Easton Bailey',
                            'Madeline Walker',
                            'Savannah Ali',
                            'Camila Rogers',
                            'Eli Jones',
                            'Everleigh Ng',
                            'Robert Yang',
                            'Isabella Xi',
                            'Bella Powell',
                            'Camila Silva',
                            'David Barnes',
                            'Adam Dang',
                            'Elias Alvarado',
                            'Eva Rivera',
                            'Logan Rivera',
                            'Leonardo Dixon',
                            'Mateo Her',
                            'Jose Henderson',
                            'Abigail Mejia',
                            'Wyatt Chin',
                            'Carson Lu',
                            'Dylan Choi',
                            'Ezekiel Kumar',
                            'Dominic Guzman',
                            'Angel Powell',
                            'Mateo Vu',
                            'Caroline Jenkins',
                            'Nora Brown',
                            'Adeline Huang',
                            'Jackson Perry',
                            'Riley Padilla',
                            'Leah Pena',
                            'Owen Lam',
                            'Kennedy Foster',
                            'John Moore',
                            'William Vu',
                            'Sadie Washington',
                            'Gabriel Holmes',
                            'Wyatt Rojas',
                            'Eva Coleman',
                            'Dominic Clark',
                            'Lucy Alexander',
                            'Everleigh Washington',
                            'Leilani Butler',
                            'Peyton Huang',
                            'John Contreras',
                            'Rylee Yu',
                            'Piper Lewis',
                            'Stella Alexander',
                            'Addison Do',
                            'Zoey Jackson',
                            'John Chow',
                            'Ava Ayala',
                            'Natalia Salazar',
                            'Skylar Carrillo',
                            'Christian Sanders',
                            'Penelope Coleman',
                            'Piper Richardson',
                            'Everly Walker',
                            'Aurora Ali',
                            'Penelope Guerrero',
                            'Anna Mehta',
                            'William Foster',
                            'Jade Rojas',
                            'Isla Espinoza',
                            'David Chu',
                            'Thomas Padilla',
                            'Miles Salazar',
                            'Mila Hong',
                            'Benjamin Moua',
                            'Samuel Morales',
                            'John Soto',
                            'Joseph Martin',
                            'Jose Ross',
                            'Parker James',
                            'Everleigh Fernandez',
                            'Lincoln Hall',
                            'Willow Mai',
                            'Jack Cheng',
                            'Genesis Navarro',
                            'Eliza Hernandez',
                            'Gabriel Brooks',
                            'Jack Huynh',
                            'Everly Chow',
                            'Amelia Salazar',
                            'Xavier Zheng',
                            'Matthew Chau',
                            'Mia Cheng',
                            'Rylee Yu',
                            'Zoe Romero',
                            'Nolan Bui',
                            'Nevaeh Jones',
                            'Samantha Adams',
                            'Madeline Shin',
                            'Noah King',
                            'Leilani Chow',
                        ];

                        $customerEmails = [];
                        $domains = ['gmail.com', 'outlook.com', 'icloud.com']; // Add more domains as needed
                        
                        foreach ($customerNames as $name) {
                            // Generate a random domain from the list
                            $randomDomain = $domains[array_rand($domains)];
                        
                            // Generate email from the name and the selected domain
                            $email = str_replace(' ', '', strtolower($name)) . '@' . $randomDomain;
                            $customerEmails[] = $email;
                        }
                        

                        for ($i = 0; $i < count($customerNames); $i++) {
                            echo '<tr>';
                            $trxid = getRandomTRXID();
                            $customerName = $customerNames[$i];
                            $customerEmail = $customerEmails[$i];
                            $customerLastOrderDate = getRandomDate();
                            $customerState = ($i % 2 == 0) ? 'Enabled' : 'Disabled';
                            $customerOrdersCount = rand(1, 10);
                            $customerTotalSpent = '$' . rand(100, 1000); // Add the dollar sign here
                            $paymentStatus = getRandomPaymentStatus();

                            echo '<td>' . $trxid . '</td>'; // Display the TRXID in the table
                            echo '<td>' . $customerName . '</td>';
                            echo '<td>' . $customerEmail . '</td>';
                            echo '<td>' . $customerLastOrderDate . '</td>';
                            echo '<td>' . $customerState . '</td>';
                            echo '<td>' . $customerOrdersCount . '</td>';
                            echo '<td>' . $customerTotalSpent . '</td>';
                            echo '<td>' . $paymentStatus . '</td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#datatable-buttons').DataTable();
    });
</script>
                               
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
        <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
        <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
        <script src="assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
        <script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
        <script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>

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