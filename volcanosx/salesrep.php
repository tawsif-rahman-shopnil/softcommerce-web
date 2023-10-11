<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8" />
        <title> Armarra - Sales Report </title>
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

        <!-- Include jsPDF library -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

        <!-- Include autoTable plugin for jsPDF -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.17/jspdf.plugin.autotable.min.js"></script>


        <!-- App css -->

        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

        <!-- icons -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>


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
                <div class="table-container">
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

            $additionalData = [
                [
                    'Txid' => 'e0f50565b49325806706d48d5042c21febddd601b3a32d66a690f92ac8bb407a',
                    'Date' => '2023-06-19 21:21:03',
                    'Usd' => '13 USDT',
                    'paymentStatus' => 'Paid'
                ],
                [
                    'Txid' => 'e98065063b3e0c9ca36955d893624800b3727eae464861a1eacc1f2579d8c03f',
                    'Date' => '2023-06-20 23:07:40',
                    'Usd' => '27.16 USDT',
                    'paymentStatus' => 'Paid'
                ],
                [
                    'Txid' => '18369f4f8758726d3ca4a86c34dc65f785eccc322c8bfda5bdf712c0d1e55334',
                    'Date' => '2023-07-19 17:30:56',
                    'Usd' => '1,397 USDT',
                    'paymentStatus' => 'Paid'
                ],
                [
                    'Txid' => '351fbe061bc292868dc7c67a70335edc1fae1f08472c9cd208a893cedd953228',
                    'Date' => '2023-07-20 18:26:46',
                    'Usd' => '7.9 USDT',
                    'paymentStatus' => 'Paid'
                ],
                [
                    'Txid' => '10fb8f7439e931e0a86a29d1e7a471213fa7129612b1d14f830e1fcf1a1c9f26',
                    'Date' => '2023-07-20 19:37:14',
                    'Usd' => '3,383 USDT',
                    'paymentStatus' => 'Paid'
                ],
                [
                    'Txid' => '7b2df7836161ddfd30a9247278e319e7d1f72804cc637aec0995cb0c67586450',
                    'Date' => '2023-07-26 01:52:16',
                    'Usd' => '2,509 USDT',
                    'paymentStatus' => 'Paid'
                ],
                [
                    'Txid' => '9f717ad8b8b2d97272266b84814c9714b206a280dd36c0557698cCe99ad68bf3',
                    'Date' => '2023-07-31 19:30:56',
                    'Usd' => '30.81 USDT',
                    'paymentStatus' => 'Paid'
                ],
                [
                    'Txid' => '4d53fbe3e745f7375eeebccc738c242db644a5fd94b9ec95fc4bfa745617c84a',
                    'Date' => '2023-08-01 22:10:10',
                    'Usd' => '1,505 USDT',
                    'paymentStatus' => 'Paid'
                ],
                [
                    'Txid' => '56f21563845b765bb09903bdcff660948b5f1d4c821a7c17d2fa9ef507ad2115',
                    'Date' => '2023-09-07 21:19:05',
                    'Usd' => '22 USDT',
                    'paymentStatus' => 'Paid'
                ],
                [
                    'Txid' => '397b385fe12ab0679c62ba260faa2dda34861c087ff506ec6d38b2d148ad21d1',
                    'Date' => '2023-09-13 03:25:58',
                    'Usd' => '16.32 USDT',
                    'paymentStatus' => 'Paid'
                ],
                [
                    'Txid' => '399888ba9d5379872b2b1b75caaebae04a41f94ae2193f062884d958f9529040',
                    'Date' => '2023-09-14 23:15:08',
                    'Usd' => '406 USDT',
                    'paymentStatus' => 'Paid'
                ],
                [
                    'Txid' => 'd56e5f1a187aecbe84f32667c4635ba0032fbf70e3c2ce9854830d6ff94f17c1',
                    'Date' => '2023-09-17 00:57:34',
                    'Usd' => '60 USDT',
                    'paymentStatus' => 'Paid'
                ],
                [
                    'Txid' => 'b0ddfeda728df8301c1bdda660092eccf992af522377feaca2c3e9f4440a87d2',
                    'Date' => '2023-09-20 21:16:40',
                    'Usd' => '106 USDT',
                    'paymentStatus' => 'Paid'
                ],
                [
                    'Txid' => 'b41ebffff27c16212280d6e6be758175fc6a36281bae07b5cd19d2f31991d841',
                    'Date' => '2023-09-24 03:41:16',
                    'Usd' => '268 USDT',
                    'paymentStatus' => 'Paid'
                ],
                [
                    'Txid' => 'a293b6cdd96f0599909e7612cbebbda47edc05d639765fc3df21de479b45ffd7',
                    'Date' => '2023-09-26 04:24:22',
                    'Usd' => '50 USDT',
                    'paymentStatus' => 'Paid'
                ],
                [
                    'Txid' => '210e77efd9d39350065fd86c7fcc796c9fc8cb622eaf1cb4b9a8a84e11861641',
                    'Date' => '2023-09-27 01:20:22',
                    'Usd' => '68 USDT',
                    'paymentStatus' => 'Paid'
                ],
                [
                    'Txid' => '8d403d832c0ec4d3b068b2a35e4191bb575702969e2009d027da315e71bb3915',
                    'Date' => '2023-09-28 03:03:10',
                    'Usd' => '390 USDT',
                    'paymentStatus' => 'Paid'
                ],
                [
                    'Txid' => 'f8288a47b50b4a8e4963fa4eaadfce39d0b38618ff767c823535cb61245c5dcc',
                    'Date' => '2023-10-03 14:25:32',
                    'Usd' => '10 USDT',
                    'paymentStatus' => 'Paid'
                ],
                [
                    'Txid' => 'ccee8b40c094a0fa7aa3e972705e30a8257a2951876019268fcadace20e0e442',
                    'Date' => '2023-10-08 01:01:26',
                    'Usd' => '50 USDT',
                    'paymentStatus' => 'Paid'
                ],
                [
                    'Txid' => 'ed3f4b87a6c4b7df86957f1a2eb08f5c3f6bfa90d59c7b99d1e1ff0b2ae3d4c8',
                    'Date' => '2023-07-15 09:45:32',
                    'Usd' => '75 USDT',
                    'paymentStatus' => 'Cancelled'
                ],
                [
                    'Txid' => '52f7e06b7c86d37d5109ec99f541d86b38f67d09bf7996ef55e40b07c702f1be',
                    'Date' => '2023-08-20 14:30:18',
                    'Usd' => '30 USDT',
                    'paymentStatus' => 'Cancelled'
                ],
                [
                    'Txid' => 'c5ed0bf4a06b854176f4983fb32c21ff22a80df81e69b495a1db6fc303ab71e2',
                    'Date' => '2023-09-10 16:22:05',
                    'Usd' => '150 USDT',
                    'paymentStatus' => 'Cancelled'
                ],
                [
                    'Txid' => '8f9c6d2c98f9c83a598d12d1ecf85014c6f23f0e40d88135ccad17728d4212af',
                    'Date' => '2023-07-28 11:55:40',
                    'Usd' => '20 USDT',
                    'paymentStatus' => 'Processing'
                ],
                [
                    'Txid' => '61371d731a4859e47a3f9be7559ca12d2d9c00f183cfab3b22a1f0e20133b1c1',
                    'Date' => '2023-08-05 17:10:14',
                    'Usd' => '60 USDT',
                    'paymentStatus' => 'Processing'
                ],
                [
                    'Txid' => 'ab48f4d2896d8a177a69d13f847ef6c30cde10f4a689f32a1341a8b2f7d1d6b3',
                    'Date' => '2023-09-03 08:12:29',
                    'Usd' => '1000 USDT',
                    'paymentStatus' => 'Cancelled'
                ],
                [
                    'Txid' => '9a2c2e1b831c1a7213f824b4f2c3fb17f3e82d9d6c401f05c1a3944be697c9a1',
                    'Date' => '2023-07-12 13:20:51',
                    'Usd' => '15 USDT',
                    'paymentStatus' => 'Processing'
                ],
                [
                    'Txid' => '4b5d4c7c51ab3a6ea57d5d810c20b41c1e2ef30996bfb7325e68e34d5a90d2e8',
                    'Date' => '2023-08-27 19:48:37',
                    'Usd' => '350 USDT',
                    'paymentStatus' => 'Cancelled'
                ],
                [
                    'Txid' => '2861a90e032c857eae171fd6a7ca6743da58b319c7a2e11046c6c67145f3190a',
                    'Date' => '2023-09-25 22:01:03',
                    'Usd' => '2000 USDT',
                    'paymentStatus' => 'Cancelled'
                ],
                [
                    'Txid' => '79dcf5322d792636c3437e6a02f8a7d20f2a165e405a84b3e93f00525c62c27b',
                    'Date' => '2023-07-07 07:33:56',
                    'Usd' => '12 USDT',
                    'paymentStatus' => 'Processing'
                ],
                [
                    'Txid' => 'f6c1e74e9bf51ff6286234b6d265b47e3f9a8e1ac9432dd2b38a580f079d1353',
                    'Date' => '2023-08-14 10:16:45',
                    'Usd' => '45 USDT',
                    'paymentStatus' => 'Processing'
                ],
                [
                    'Txid' => 'd2cc423583fc0dd6f5867c5d82a4a8ef12a1e237b86e1e39a8e481d1b6de166d',
                    'Date' => '2023-09-18 15:40:29',
                    'Usd' => '500 USDT',
                    'paymentStatus' => 'Cancelled'
                ],
                [
                    'Txid' => '1857d7311e9a218ce03d6a03ef16d8c2361989f3a3f399b7ad70ca4b880b036a',
                    'Date' => '2023-07-23 12:05:17',
                    'Usd' => '25 USDT',
                    'paymentStatus' => 'Processing'
                ],
                [
                    'Txid' => 'f0d102e1c7c1bb0ebf529d04f1b124d3a8359f040ce2d67e155c4c9c3046a0f7',
                    'Date' => '2023-08-08 08:55:22',
                    'Usd' => '85 USDT',
                    'paymentStatus' => 'Processing'
                ],
                [
                    'Txid' => '1ab4ea2f9bafae2e67143e3f9979f785c23296d86753a921208c7109b7c0b293',
                    'Date' => '2023-09-08 19:30:11',
                    'Usd' => '750 USDT',
                    'paymentStatus' => 'Cancelled'
                ],
                [
                    'Txid' => '0a0a8c1ca5f44a6ecfbaad3aef1d9140190fbdd8e98dd8ec13e3db27a88e96d2',
                    'Date' => '2023-07-30 16:25:44',
                    'Usd' => '40 USDT',
                    'paymentStatus' => 'Processing'
                ],
                [
                    'Txid' => 'e8a74fbaa696a0b7047dd1c8dd62cbf10095a418bd50e7f6e9470a45882ef91e',
                    'Date' => '2023-08-12 11:12:37',
                    'Usd' => '70 USDT',
                    'paymentStatus' => 'Processing'
                ],
                [
                    'Txid' => '35c5360f1c6c88b52ea7be46ef5e7e7d5bfc0e047b1984e4b0c9c96e55ee73ef',
                    'Date' => '2023-09-22 07:50:58',
                    'Usd' => '1250 USDT',
                    'paymentStatus' => 'Cancelled'
                ],
                [
                    'Txid' => 'b5cc4b47e8118b9c98e4b0987e01c70f40640df6b60f8c423e9bf4b06c07265d',
                    'Date' => '2023-07-04 14:15:53',
                    'Usd' => '180 USDT',
                    'paymentStatus' => 'Processing'
                ],
                [
                    'Txid' => '8723a6797e12c3f15f4c45c6a3f5f7247fb96c9605f0a2d343f5a5fc1ff58cd5',
                    'Date' => '2023-08-02 09:02:09',
                    'Usd' => '55 USDT',
                    'paymentStatus' => 'Processing'
                ],
                [
                    'Txid' => 'dfb2353e03f76b3df19b53b30ad13b38f7f6c933ebe7e93f9ca90815482d9ed1',
                    'Date' => '2023-09-14 18:37:26',
                    'Usd' => '600 USDT',
                    'paymentStatus' => 'Cancelled'
                ],
                [
                    'Txid' => '6fb4c6f8014a755490c196b9bfc488ebe680f21a5c3d86aa2ffacec8ca789c0a',
                    'Date' => '2023-07-19 10:08:47',
                    'Usd' => '35 USDT',
                    'paymentStatus' => 'Processing'
                ],
                [
                    'Txid' => '0e3d3d174fbcf5ce87e68cde6ebf6e919052a23a1cbf5e112dbdd7cfd846fa69',
                    'Date' => '2023-08-17 21:55:33',
                    'Usd' => '90 USDT',
                    'paymentStatus' => 'Processing'
                ],
                [
                    'Txid' => 'f4c8b39c2db8a185c39d81b3e71b69670f92757f8ce0e7df4589eab3e47f8b63',
                    'Date' => '2023-09-29 13:48:19',
                    'Usd' => '1750 USDT',
                    'paymentStatus' => 'Cancelled'
                ],
                [
                    'Txid' => '7ecab1eefed52784f7c6e50c7a9cc37ca16294c959c02c32b83db3d875525635',
                    'Date' => '2023-07-02 06:28:14',
                    'Usd' => '14 USDT',
                    'paymentStatus' => 'Processing'
                ],
                [
                    'Txid' => 'e0b7f0ea7b3a8717f1b49cbf9f7bca8e7d749df6a52a1d92f83ecf30c4e01f5d',
                    'Date' => '2023-08-10 17:42:27',
                    'Usd' => '65 USDT',
                    'paymentStatus' => 'Processing'
                ],
                [
                    'Txid' => '3c22e3b4fbb3a9a4e9d78e3e67d54f3c0a5e9ccad7c30dcbf60c24f0ea6b4d3f',
                    'Date' => '2023-09-20 22:17:08',
                    'Usd' => '1100 USDT',
                    'paymentStatus' => 'Cancelled'
                ],
                [
                    'Txid' => '8c38e0a731cb272ecf48d1d99f69d6a1bb8da48e8afdd89478a1995d1b59c28d',
                    'Date' => '2023-07-26 08:50:36',
                    'Usd' => '28 USDT',
                    'paymentStatus' => 'Processing'
                ],
                [
                    'Txid' => '50ea0e18a8f9f6343e1db19ce4bf051c1e41c4835b0d8eb50799c71225ccf5b4',
                    'Date' => '2023-08-23 15:19:41',
                    'Usd' => '450 USDT',
                    'paymentStatus' => 'Processing'
                ],
                [
                    'Txid' => '93e5b41694dfead3a5dc8d926d29383fba862dfb9dbecd27b7b9b3078c54e90d',
                    'Date' => '2023-09-06 11:30:57',
                    'Usd' => '850 USDT',
                    'paymentStatus' => 'Processing'
                ],
                [
                    'Txid' => '24f2f3c17e1ca8c9978f546fcaac28a111c9ab37048666f2042f9b2f5d983bd9',
                    'Date' => '2023-07-21 13:55:05',
                    'Usd' => '32 USDT',
                    'paymentStatus' => 'Processing'
                ],
                [
                    'Txid' => 'b6cd3ea898dcdd58ac30d6a83e2b08bdcdbaae1fcbfa3f6be7fbf2f94114e349',
                    'Date' => '2023-08-29 19:05:12',
                    'Usd' => '600 USDT',
                    'paymentStatus' => 'Processing'
                ],
                [
                    'Txid' => '31fa8f8f8b4e4694080c99545c7ef4e9b5fb89640f7f4a43194446c19c92bfee',
                    'Date' => '2023-09-12 07:22:34',
                    'Usd' => '700 USDT',
                    'paymentStatus' => 'Cancelled'
                ],
                [
                    'Txid' => '4d95f3f9f1a9d3bfcc1e4ebc90e68f1b992b69f2b7a1707f8df35f2920f98874',
                    'Date' => '2023-07-14 10:40:50',
                    'Usd' => '22 USDT',
                    'paymentStatus' => 'Processing'
                ],
                [
                    'Txid' => '13c9c82a6ea11bf89a3d1a56bc5a88f5e941d9e5fda8b44488a14a6478d4d6e3',
                    'Date' => '2023-08-18 14:15:26',
                    'Usd' => '75 USDT',
                    'paymentStatus' => 'Processing'
                ],
                [
                    'Txid' => '7c63a49e5efbe0a19f2b7c2c887d2e3ca6093cc0485f4970e152f5f20c0a537c',
                    'Date' => '2023-09-24 16:58:02',
                    'Usd' => '1800 USDT',
                    'paymentStatus' => 'Cancelled'
                ],
                [
                    'Txid' => 'e46c2dc6f8bca7d8c4332b5a3fb67b8c68d879f8a470b23b01e77a95e33cf8f7',
                    'Date' => '2023-07-05 09:03:19',
                    'Usd' => '17 USDT',
                    'paymentStatus' => 'Processing'
                ],
                [
                    'Txid' => '28b7ec1c77ca4191d1ff90fb727b27c7ce5b17f8672e5c0e8674c818cdaebf2e',
                    'Date' => '2023-08-07 12:30:14',
                    'Usd' => '50 USDT',
                    'paymentStatus' => 'Processing'
                ],
                [
                    'Txid' => '8ca39efdbb18e1c97e1a638afeddb18e3b89f12af4e5f18a833f2c1f94e2e5cd',
                    'Date' => '2023-09-16 18:20:45',
                    'Usd' => '850 USDT',
                    'paymentStatus' => 'Processing'
                ],
                [
                    'Txid' => '1b1ecae4d894fea849e3a4c689e3d1d1b8f90d9ed5a594f3c4be3181fbbfe3d2',
                    'Date' => '2023-07-09 22:50:08',
                    'Usd' => '10 USDT',
                    'paymentStatus' => 'Processing'
                ],
            ];
            usort($additionalData, function($a, $b) {
                return strtotime($b['Date']) - strtotime($a['Date']);
            });
               

            foreach ($customerNames as $i => $customerName) {
                echo '<tr>';
                $trxid = $additionalData[$i]['Txid'];
                $customerEmail = $customerEmails[$i];
                $customerLastOrderDate = $additionalData[$i]['Date'];
                $customerState = ($i % 2 == 0) ? 'Enabled' : 'Disabled';
                $customerOrdersCount = rand(1, 10);
                $customerTotalSpent = $additionalData[$i]['Usd'];
                $paymentStatus = $additionalData[$i]['paymentStatus'];;

                echo '<td>' . $trxid . '</td>';
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
</div>

<style>
    .table-container {
        width: 100%;
        overflow-x: auto;
    }

    table {
        width: 100%;
        white-space: nowrap; /* Prevent text from wrapping */
    }
</style>

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