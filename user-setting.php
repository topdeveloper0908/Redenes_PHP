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

        <!-- Sidebar -->
        <?php include ('sidebar.php');?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include ('header.php'); ?>
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
                                        <h6 class="m-0 font-weight-bold text-primary">Agency Register ID</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <label>Agency Register ID</label>
                                                <input type="text" class="form-control form-control-user"
                                                    id="registerID" aria-describedby="emailHelp"
                                                    placeholder="Enter Register ID..." readOnly>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Auto Add Email Domain</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group d-flex align-items-end">
                                            <h6 class="m-0 font-weight-bold mb-2">User@</h6>
                                            <div class="custom-control custom-checkbox small">
                                                <label>Email Domain</label>
                                                <input type="text" class="form-control form-control-user"
                                                    id="emailDomain" aria-describedby="emailHelp"
                                                    placeholder="Enter Email Domain..." readOnly>
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
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="radio" class="custom-control-input" name="user-status" id="avaiableCheck" disabled>
                                                <label class="custom-control-label" for="avaiableCheck">Avaiable</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="radio" class="custom-control-input" name="user-status" id="onCallCheck" disabled>
                                                <label class="custom-control-label" for="onCallCheck">On Call</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="radio" class="custom-control-input" name="user-status" id="onDutyCheck" disabled>
                                                <label class="custom-control-label" for="onDutyCheck">On Duty</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="radio" class="custom-control-input" name="user-status" id="offDutyCheck" disabled>
                                                <label class="custom-control-label" for="offDutyCheck">Off Duty</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <label>Custom</label>
                                                <input type="text" class="form-control form-control-user"
                                                    id="userStatus" aria-describedby="emailHelp"
                                                    placeholder="Enter User Status..." readOnly>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="px-2">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">User Types</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="radio" class="custom-control-input" name="user-type" id="chiefCheck" disabled>
                                                <label class="custom-control-label" for="chiefCheck">Chief</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="radio" class="custom-control-input" name="user-type" id="operationLeaderCheck" disabled>
                                                <label class="custom-control-label" for="operationLeaderCheck">Opeartions Leader</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="radio" class="custom-control-input" name="user-type" id="memberCheck" disabled>
                                                <label class="custom-control-label" for="memberCheck">Member</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="radio" class="custom-control-input" name="user-type" id="supportMemberCheck" disabled>
                                                <label class="custom-control-label" for="supportMemberCheck">Support Member</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <label>Custom</label>
                                                <input type="text" class="form-control form-control-user"
                                                    id="userTypes" aria-describedby="emailHelp"
                                                    placeholder="Enter User Types..." readOnly>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="px-2">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">User Medical Level</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="radio" class="custom-control-input" name="user-medical" id="emtCheck" disabled>
                                                <label class="custom-control-label" for="emtCheck">EMT</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="radio" class="custom-control-input" name="user-medical" id="paramedicCheck" disabled>
                                                <label class="custom-control-label" for="paramedicCheck">Paramedic</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="radio" class="custom-control-input" name="user-medical" id="nurseCheck" disabled>
                                                <label class="custom-control-label" for="nurseCheck">Nurse</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="radio" class="custom-control-input" name="user-medical" id="doctorCheck" disabled>
                                                <label class="custom-control-label" for="doctorCheck">Doctor</label>
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
        init_id = "<?php echo $agency_id;?>";
        function getData(agency_id) {
            $.ajax({
                type: "GET",
                url: "https://api.redenes.org/dev/v1/agency-users/",
                data: {
                    agency_id: agency_id,
                    authorization: "<?php echo $authorization;?>"
                },
                success: function (res) {
                    user_setting_info = res.agencies_users[1];
                    writeData();
                    // To hide the loader
                    document.getElementById("my-loader-element").classList.remove("loader");                
                    document.getElementById("my-loader-wrapper").classList.add("d-none");
                }
            })
        }
        getData(init_id);
        function saveData() {
            var authorization = "<?php echo $authorization;?>";
            var formData = {
                authorization: authorization.toString(),
                agency_id: init_id,
                agency_user_settings: [
                    {
                        auto_add_email_domain: document.getElementById('emailDomain').value,
                        user_status: [
                            {
                                Available: document.getElementById('avaiableCheck').checked,
                                "On Call": document.getElementById('onCallCheck').checked,
                                "On Duty": document.getElementById('onDutyCheck').checked,
                                "Off Duty": document.getElementById('offDutyCheck').checked 
                            }
                        ],
                        user_types: [
                            {
                                Chief: document.getElementById('chiefCheck').checked,
                                OperationsLeader: document.getElementById('operationLeaderCheck').checked,
                                Member: document.getElementById('memberCheck').checked,
                                SupportMember: document.getElementById('supportMemberCheck').checked
                            }
                        ],
                        user_medical_level: [
                            {
                                EMT: document.getElementById('emtCheck').checked,
                                Paramedic: document.getElementById('paramedicCheck').checked,
                                Nurse: document.getElementById('nurseCheck').checked,
                                Doctor: document.getElementById('doctorCheck').checked
                            }
                        ]
                    }
                ]
            };
            $.ajax({
                type: "POST",
                url: "https://api.redenes.org/dev/v1/agency-module-settings/",
                data: JSON.stringify(formData),
                dataType: "json",
                contentType:'application/json',
                success: function (res) {
                    document.getElementById("edit-btn").classList.remove("d-none");
                    document.getElementById("save-btn").classList.add("d-none");
                    document.getElementById("cancel-btn").classList.add("d-none");
                    var inputs = document.querySelectorAll('.custom-control-input');
                    inputs.forEach(element => {
                        element.setAttribute("disabled", true);
                    });
                    var inputs = document.querySelectorAll('.form-control');
                    inputs.forEach(element => {
                        element.setAttribute("readOnly", true);
                    });
                }
            })
        }
        function saveEnable() {
            var inputs = document.querySelectorAll('.custom-control-input');
            inputs.forEach(element => {
                element.removeAttribute("disabled");
            });
            var inputs = document.querySelectorAll('.form-control');
            inputs.forEach(element => {
                element.removeAttribute("readOnly");
            });
            document.getElementById("edit-btn").classList.add("d-none");
            document.getElementById("save-btn").classList.remove("d-none");
            document.getElementById("cancel-btn").classList.remove("d-none");
        }
        function cancelSave() {
            writeData();
            var inputs = document.querySelectorAll('.custom-control-input');
            inputs.forEach(element => {
                element.setAttribute("disabled", true);
            });
            var inputs = document.querySelectorAll('.form-control');
            inputs.forEach(element => {
                element.setAttribute("readOnly", true);
            });
            document.getElementById("edit-btn").classList.remove("d-none");
            document.getElementById("save-btn").classList.add("d-none");
            document.getElementById("cancel-btn").classList.add("d-none");
        }
        function writeData() {
            document.getElementById('registerID').value = user_setting_info.id;
            if(user_setting_info.status == 'Available') {
                document.getElementById('availableCheck').checked = true;
            }
            else if(user_setting_info.status == 'On Call') {
                document.getElementById('onCallCheck').checked = true;
            }
            else if(user_setting_info.status == 'On Duty') {
                document.getElementById('onDutyCheck').checked = true;
            }
            else if(user_setting_info.status == 'Off Duty') {
                document.getElementById('offDutyCheck').checked = true;
            }

            if(user_setting_info.type == 'Chief') {
                document.getElementById('chiefCheck').checked = true;
            }
            else if(user_setting_info.type == 'Operations Leader') {
                document.getElementById('operationLeaderCheck').checked = true;
            }
            else if(user_setting_info.type == 'Member') {
                document.getElementById('memberCheck').checked = true;
            }
            else if(user_setting_info.type == 'Support Member') {
                document.getElementById('supportMemberCheck').checked = true;
            }
            if(user_setting_info.medical == 'EMT') {
                document.getElementById('emtCheck').checked = true;
            }
            else if(user_setting_info.medical == 'Paramedic') {
                document.getElementById('paramedicCheck').checked = true;
            }
            else if(user_setting_info.medical == 'Nurse') {
                document.getElementById('nurseCheck').checked = true;
            }
            else if(user_setting_info.medical == 'Doctor') {
                document.getElementById('doctorCheck').checked = true;
            }
        }
    </script>
</body>

</html>