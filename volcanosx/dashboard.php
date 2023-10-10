<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8" />
        <title>Dashboard</title>
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

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <div class="row">

                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
    
                                        <h4 class="header-title mt-0 mb-4">Total Sell</h4>
    
                                        <div class="widget-chart-1">
                                            <div class="widget-chart-box-1 float-start" dir="ltr">
                                                <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#f05050 "
                                                       data-bgColor="#F9B9B9" value="25"
                                                       data-skin="tron" data-angleOffset="180" data-readOnly=true
                                                       data-thickness=".15"/>
                                            </div>
    
                                            <div class="widget-detail-1 text-end">
                                                <h2 class="fw-normal pt-2 mb-1"> 25 </h2>
                                                <p class="text-muted mb-1">Total sell this week</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col -->

                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
    
                                        <h4 class="header-title mt-0 mb-3">Sales Analytics</h4>
    
                                        <div class="widget-box-2">
                                            <div class="widget-detail-2 text-end">
                                                <span class="badge bg-success rounded-pill float-start mt-3">3% <i class="mdi mdi-trending-up"></i> </span>
                                                <h2 class="fw-normal mb-1"> 84$ </h2>
                                                <p class="text-muted mb-3">Revenue today</p>
                                            </div>
                                            <div class="progress progress-bar-alt-success progress-sm">
                                                <div class="progress-bar bg-success" role="progressbar"
                                                        aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 7%;">
                                                    <span class="visually-hidden">77% Complete</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col -->

                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
    
                                        <h4 class="header-title mt-0 mb-4">Statistics</h4>
    
                                        <div class="widget-chart-1">
                                            <div class="widget-chart-box-1 float-start" dir="ltr">
                                                <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#ffbd4a"
                                                        data-bgColor="#FFE6BA" value="69"
                                                        data-skin="tron" data-angleOffset="180" data-readOnly=true
                                                        data-thickness=".15"/>
                                            </div>
                                            <div class="widget-detail-1 text-end">
                                                <h2 class="fw-normal pt-2 mb-1"> 69 </h2>
                                                <p class="text-muted mb-1">Revenue today</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col -->

                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mt-0 mb-3">Daily Sales</h4>
    
                                        <div class="widget-box-2">
                                            <div class="widget-detail-2 text-end">
                                                <span class="badge bg-pink rounded-pill float-start mt-3">3% <i class="mdi mdi-trending-up"></i> </span>
                                                <h2 class="fw-normal mb-1"> 5 </h2>
                                                <p class="text-muted mb-3">Daily Average</p>
                                            </div>
                                            <div class="progress progress-bar-alt-pink progress-sm">
                                                <div class="progress-bar bg-pink" role="progressbar"
                                                        aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 7%;">
                                                    <span class="visually-hidden">77% Complete</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div><!-- end col -->

                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="header-title mt-0">Daily Sales</h4>

<div class="widget-chart text-center">
    <div id="donutChartContainer" style="height: 245px;" class="morris-chart">
        <canvas id="donutChart" width="400" height="400"></canvas>
    </div>
    <ul class="list-inline chart-detail-list mb-0">
    </ul>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
<script>
    var ctx = document.getElementById('donutChart').getContext('2d');
    var donutChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Softwares', 'Games'],
            datasets: [{
                data: [12, 13], // Replace with your actual data
                backgroundColor: ['#ff8acc', '#5b69bc'],
            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                display: true,
            },
        },
    });
</script>

                                    </div>
                                </div>
                            </div><!-- end col -->

                        


                     

                            <div class="col-xl-8">
     

                               
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