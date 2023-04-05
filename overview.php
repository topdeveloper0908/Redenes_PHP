<?php  
session_start();
error_reporting(0);

$user = $_COOKIE['name'];
                        
if (strlen($user) == 0) {
    header('location:logout');
} else{
    $_SESSION['user']= $_COOKIE['name'];
    $authorization = $_COOKIE['authorization'];
    $agencies = explode("$$", $_COOKIE['agency']);
?>
<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" type="image/x-icon" href="img/icon.png">
    <title>REDENES</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <div id="my-loader-element"></div>
    <div id="my-loader-wrapper"></div>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include ('sidebar.php');?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include ('header.php'); ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="d-flex align-items-baseline justify-content-between">
                        <!-- Page Heading -->
                        <h1 class="h3 mb-4 text-gray-800">Overview</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="font-weight-bold text-primary text-uppercase mb-1">Agency Name</div>
                                            <div id="agency-name" class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-building fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="font-weight-bold text-success text-uppercase mb-1">Agency ID</div>
                                            <div id="agency-id" class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-id-card fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="font-weight-bold text-primary text-uppercase mb-1">Number of Registered Users</div>
                                            <div id="agency-registered-user" class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="font-weight-bold text-success text-uppercase mb-1">Number of Registered Devices</div>
                                            <div id="agency-registered-device" class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-desktop fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="font-weight-bold text-warning text-uppercase mb-1">Number of Subscriptions</div>
                                            <div id="agency-number-subscription" class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-bookmark fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="font-weight-bold text-danger text-uppercase mb-1">Subscription Expires</div>
                                            <div id="agency-subscription-expire" class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-exchange-alt fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="row justify-content-center">
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="font-weight-bold text-primary text-uppercase mb-1">Physical Address</div>
                                            <div id="agency-address-street" class="h5 mb-1 font-weight-bold text-gray-800"></div>
                                            <div id="agency-address-unit" class="h5 mb-1 font-weight-bold text-gray-800"></div>
                                            <div id="agency-address-city" class="h5 mb-1 font-weight-bold text-gray-800"></div>
                                            <div id="agency-address-state" class="h5 mb-1 font-weight-bold text-gray-800"></div>
                                            <div id="agency-address-zipcode" class="h5 mb-1 font-weight-bold text-gray-800"></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-home fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="d-flex flex-column">
                                <div class="card mb-3 border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="font-weight-bold text-success text-uppercase mb-1">Phone Number</div>
                                                <div id="agency-phone-number" class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-phone fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="font-weight-bold text-success text-uppercase mb-1">Email Address</div>
                                                <div id="agency-email-address" class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-envelope fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="d-flex flex-column">
                                <div class="card mb-3 border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="font-weight-bold text-warning text-uppercase mb-1">Number of Call Types</div>
                                                <div id="agency-call-types" class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-phone-volume fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="font-weight-bold text-warning text-uppercase mb-1">Number of Page Groups</div>
                                                <div id="agency-page-groups" class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-network-wired fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>


    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script>
        // To show the loader
        document.getElementById("my-loader-element").classList.add("loader");
        <?php $agencies_id = explode("$$", $_COOKIE['agencies_id']);?>
        init_id = "<?php echo $agencies_id[0]?>";
        function getAgencyData(agency_id) {
            document.cookie = "agency_id = " + agency_id;
            var agency_info;
            $.ajax({
                type: "GET",
                url: "https://api.redenes.org/dev/v1/agency-overview/",
                data: {
                    agency_id: agency_id,
                    authorization: "<?php echo $authorization;?>"
                },
                success: function (res) {
                    agency_info = res.agencies_overview[0];
                    document.cookie = "agency_name = " + agency_info.agency_name;
                    document.getElementById('agency-name').innerHTML = agency_info.agency_name;
                    document.getElementById('agency-id').innerHTML = agency_info.agency_id;
                    document.getElementById('agency-registered-user').innerHTML = agency_info.number_of_registered_users;
                    document.getElementById('agency-registered-device').innerHTML = agency_info.number_of_registered_devices;
                    document.getElementById('agency-number-subscription').innerHTML = agency_info.number_of_subscriptions;
                    document.getElementById('agency-subscription-expire').innerHTML = agency_info.subscription_expires;
                    document.getElementById('agency-phone-number').innerHTML = agency_info.phone_number;
                    document.getElementById('agency-call-types').innerHTML = agency_info.number_of_call_types;
                    document.getElementById('agency-email-address').innerHTML = agency_info.email_address;
                    document.getElementById('agency-page-groups').innerHTML = agency_info.number_of_page_groups;
                    document.getElementById('agency-address-street').innerHTML = 'Street: ' + agency_info.physical_address[0].street;
                    document.getElementById('agency-address-unit').innerHTML = 'Unit: ' + agency_info.physical_address[0].unit;
                    document.getElementById('agency-address-city').innerHTML = 'City: ' + agency_info.physical_address[0].city;
                    document.getElementById('agency-address-state').innerHTML = 'State: ' + agency_info.physical_address[0].state;
                    document.getElementById('agency-address-zipcode').innerHTML = 'Zipcode: ' + agency_info.physical_address[0].zipcode;
                    // To hide the loader
                    document.getElementById("my-loader-element").classList.remove("loader");                
                    document.getElementById("my-loader-wrapper").classList.add("d-none");
                }
            })
        }
        getAgencyData(init_id);
    </script>

</body>

</html>
<?php }  ?>