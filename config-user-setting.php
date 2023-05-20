<?php
session_start();
error_reporting(0);

$user = $_COOKIE['name'];
$authorization = $_COOKIE['authorization'];
$agency_id = $_COOKIE['agency_id'];

?>
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
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <div id="my-loader-element"></div>
    <div id="my-loader-wrapper"></div>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include('config-sidebar.php'); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include('header.php'); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <form action="">
                        <div class="d-flex align-items-baseline justify-content-between">
                            <!-- Page Heading -->
                            <h1 class="h3 mb-4 text-gray-800">User Settings</h1>
                            <div>
                                <button id="edit-btn" type="button" onClick="saveEnable()" class="btn btn-success btn-icon-split my-1 mr-2">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-check"></i>
                                    </span>
                                    <span class="text">Edit</span>
                                </button>
                                <button id="save-btn" type="button" onClick="saveData()" class="btn btn-success btn-icon-split my-1 mr-2 d-none">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-check"></i>
                                    </span>
                                    <span class="text">Save</span>
                                </button>
                                <button id="cancel-btn" type="button" onClick="cancelSave()" class="btn btn-danger btn-icon-split my-1 mr-2 d-none">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-edit"></i>
                                    </span>
                                    <span class="text">Cancel</span>
                                </button>
                            </div>
                        </div>

                        <!-- Content Row -->
                        <div class="row row-cols-xl-4 row-cols-lg-3 row-cols-sm-2 row-cols-1">

                            <div class="px-2">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Agency Type</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small pl-0">
                                                <label>Agency Type</label>
                                                <select name='agency-type' id='agency-type' aria-controls='dataTable' class='custom-select form-control form-control-sm'>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Auto Add Email Domain</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <h6 class="m-0 mt-4 mb-2">Auto Add User to Rank</h6>
                                            <div class="custom-control custom-checkbox small flex-grow-1 pl-0">
                                                <select id="userRankDropdown" name='dataTable_length' aria-controls='dataTable' class='custom-select form-control form-control-sm' disabled></select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h6 class="m-0 mt-4 mb-2">Auto Add User to Group</h6>
                                            <div class="custom-control custom-checkbox small flex-grow-1 pl-0">
                                                <select id="userGroupDropdown" name='dataTable_length' aria-controls='dataTable' class='custom-select form-control form-control-sm' disabled></select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h6 class="m-0 mt-4 mb-2">Auto Add User to Status</h6>
                                            <div class="custom-control custom-checkbox small flex-grow-1 pl-0">
                                                <select id="userStatusDropdown" name='dataTable_length' aria-controls='dataTable' class='custom-select form-control form-control-sm' disabled></select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="px-2">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">User Ranks</h6>
                                    </div>
                                    <div class="card-body">
                                        <div id="userRanksGroup">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small pl-0">
                                                <label>Custom</label>
                                                <div class="d-flex">
                                                    <input type="text" class="form-control form-control-user" id="userRanks" aria-describedby="emailHelp" placeholder="Enter User Rank..." readOnly>
                                                    <button type="button" onClick="addRank()" class="btn btn-success btn-icon-split mx-2 add-button" style="min-width: 5.5rem" disabled>
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-plus"></i>
                                                        </span>
                                                        <span class="text">Add</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="px-2">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">User Groups</h6>
                                    </div>
                                    <div class="card-body">
                                        <div id="userGroupWrapper">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small pl-0">
                                                <label>Custom</label>
                                                <div class="d-flex">
                                                    <input type="text" class="form-control form-control-user" id="userGroup" aria-describedby="emailHelp" placeholder="Enter User Group..." readOnly>
                                                    <button type="button" onClick="addGroup()" class="btn btn-success btn-icon-split mx-2 add-button" style="min-width: 5.5rem" disabled>
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-plus"></i>
                                                        </span>
                                                        <span class="text">Add</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="px-2">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">User Status</h6>
                                    </div>
                                    <div class="card-body">
                                        <div id="userStatusWrapper">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small pl-0">
                                                <label>Custom</label>
                                                <div class="d-flex">
                                                    <input type="text" class="form-control form-control-user" id="userStatus" aria-describedby="emailHelp" placeholder="Enter User Status..." readOnly>
                                                    <button type="button" onClick="addStatus()" class="btn btn-success btn-icon-split mx-2 add-button" style="min-width: 5.5rem" disabled>
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-plus"></i>
                                                        </span>
                                                        <span class="text">Add</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script>
        // To show the loader
        document.getElementById("my-loader-element").classList.add("loader");
        var user_setting_info;
        init_id = "<?php echo $agency_id; ?>";

        function getData(agency_id) {
            $.ajax({
                type: "GET",
                url: "https://api.redenes.org/dev/v1/system-config-users-settings/",
                data: {
                    agency_id: agency_id,
                    authorization: "<?php echo $authorization; ?>"
                },
                success: function(res) {
                    console.log(res);
                    // user_setting_info = res.agencies_user_settings[0];
                    // writeData();
                    // To hide the loader
                    document.getElementById("my-loader-element").classList.remove("loader");
                    document.getElementById("my-loader-wrapper").classList.add("d-none");
                }
            })
        }
        getData(init_id);
    </script>
</body>

</html>