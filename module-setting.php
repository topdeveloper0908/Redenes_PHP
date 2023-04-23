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
                            <h1 class="h3 mb-4 text-gray-800">Module Settings</h1>
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
                        <div class="row row-cols-xl-5 row-cols-lg-3 row-cols-sm-2 row-cols-1">
    
                            <div class="px-2">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Home</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="directoryCheck" disabled>
                                                <label class="custom-control-label" for="directoryCheck">Directory</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="statusCheck" disabled>
                                                <label class="custom-control-label" for="statusCheck">Status</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="scheduleCheck" disabled>
                                                <label class="custom-control-label" for="scheduleCheck">Schedule</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="weatherCheck" disabled>
                                                <label class="custom-control-label" for="weatherCheck">Weather</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="gpsCheck" disabled>
                                                <label class="custom-control-label" for="gpsCheck">GPS</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="px-2">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Logs</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="suppliesCheck" disabled>
                                                <label class="custom-control-label" for="suppliesCheck">Supplies</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="vehicleCheck" disabled>
                                                <label class="custom-control-label" for="vehicleCheck">Vehicles</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="dailyCheck" disabled>
                                                <label class="custom-control-label" for="dailyCheck">Daily</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="maintenanceCheck" disabled>
                                                <label class="custom-control-label" for="maintenanceCheck">Maintenance</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="trainingCheck" disabled>
                                                <label class="custom-control-label" for="trainingCheck">Training</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="icsCheck" disabled>
                                                <label class="custom-control-label" for="icsCheck">ICS</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="equipmentCheck" disabled>
                                                <label class="custom-control-label" for="equipmentCheck">Equipment</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="resourceCheck" disabled>
                                                <label class="custom-control-label" for="resourceCheck">Resources</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="px-2">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Alerts</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="emergencyCheck" disabled>
                                                <label class="custom-control-label" for="emergencyCheck">Emergency</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="newIncidentCheck" disabled>
                                                <label class="custom-control-label" for="newIncidentCheck">New Incident</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="closedIncidentCheck" disabled>
                                                <label class="custom-control-label" for="closedIncidentCheck">Closed Incidents</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="activeIncidentCheck" disabled>
                                                <label class="custom-control-label" for="activeIncidentCheck">Active Incidents</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="audioCheck" disabled>
                                                <label class="custom-control-label" for="audioCheck">Audio</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="neighboringCheck" disabled>
                                                <label class="custom-control-label" for="neighboringCheck">Neighboring</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="phoneCheck" disabled>
                                                <label class="custom-control-label" for="phoneCheck">Phone</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="msgCheck" disabled>
                                                <label class="custom-control-label" for="msgCheck">Messages</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="px-2">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">References</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="locationCheck" disabled>
                                                <label class="custom-control-label" for="locationCheck">Location</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="mapsCheck" disabled>
                                                <label class="custom-control-label" for="mapsCheck">Maps</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="communicationsCheck" disabled>
                                                <label class="custom-control-label" for="communicationsCheck">Communications</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="internalCheck" disabled>
                                                <label class="custom-control-label" for="internalCheck">Internal</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="incidentListCheck" disabled>
                                                <label class="custom-control-label" for="incidentListCheck">Incident Checklist</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="px-2">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Account</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="personProfileCheck" disabled>
                                                <label class="custom-control-label" for="personProfileCheck">Personal Profile</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="agencyProfileCheck" disabled>
                                                <label class="custom-control-label" for="agencyProfileCheck">Agency Profile</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="notificationsCheck" disabled>
                                                <label class="custom-control-label" for="notificationsCheck">Notifications</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="appSettingsCheck" disabled>
                                                <label class="custom-control-label" for="appSettingsCheck">App Settings</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="certificationsCheck" disabled>
                                                <label class="custom-control-label" for="certificationsCheck">Certifications</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="paymentCheck" disabled>
                                                <label class="custom-control-label" for="paymentCheck">Payments</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="connectSettingsCheck" disabled>
                                                <label class="custom-control-label" for="connectSettingsCheck">Connect Settings</label>
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
        var module_setting_info;
        init_id = "<?php echo $agency_id;?>";
        function getData(agency_id) {
            $.ajax({
                type: "GET",
                url: "https://api.redenes.org/dev/v1/agency-module-settings/",
                data: {
                    agency_id: agency_id,
                    authorization: "<?php echo $authorization;?>"
                },
                success: function (res) {
                    console.log(res);
                    agency_module_info = res.agencies_module_settings[0];
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
                agency_module_settings: [
                    {
                        home: [
                            {
                                directory: document.getElementById('directoryCheck').checked,
                                calendar: document.getElementById('statusCheck').checked,
                                status: document.getElementById('scheduleCheck').checked,
                                schedule: document.getElementById('weatherCheck').checked,
                                gps: document.getElementById('gpsCheck').checked,
                            }
                        ],
                        logs: [
                            {
                                supplies: document.getElementById('suppliesCheck').checked,
                                vehicles: document.getElementById('vehicleCheck').checked,
                                daily: document.getElementById('dailyCheck').checked,
                                maintenance: document.getElementById('maintenanceCheck').checked,
                                training: document.getElementById('trainingCheck').checked,
                                ics: document.getElementById('icsCheck').checked,
                                equipment: document.getElementById('equipmentCheck').checked,
                                resources: document.getElementById('resourceCheck').checked,
                            }
                        ],
                        alerts: [
                            {
                                emergency: document.getElementById('emergencyCheck').checked,
                                new_incident: document.getElementById('newIncidentCheck').checked,
                                closed_incidents: document.getElementById('closedIncidentCheck').checked,
                                active_incidents: document.getElementById('activeIncidentCheck').checked,
                                audio: document.getElementById('audioCheck').checked,
                                neighboring: document.getElementById('neighboringCheck').checked,
                                phone: document.getElementById('phoneCheck').checked,
                                messages: document.getElementById('msgCheck').checked,
                            }
                        ],
                        references: [
                            {
                                locatins: document.getElementById('locationCheck').checked,
                                maps: document.getElementById('mapsCheck').checked,
                                communications: document.getElementById('communicationsCheck').checked,
                                internal: document.getElementById('internalCheck').checked,
                                incident_checklist: document.getElementById('incidentListCheck').checked,
                            }
                        ],
                        account: [
                            {
                                personal_profile: document.getElementById('personProfileCheck').checked,
                                agency_profile: document.getElementById('agencyProfileCheck').checked,
                                notifications: document.getElementById('notificationsCheck').checked,
                                app_settings: document.getElementById('appSettingsCheck').checked,
                                certifications: document.getElementById('certificationsCheck').checked,
                                payments: document.getElementById('paymentCheck').checked,
                            }
                        ]
                    }
                ]
            };
            console.log(JSON.stringify(formData));
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
                }
            })
        }
        function saveEnable() {
            var inputs = document.querySelectorAll('.custom-control-input');
            inputs.forEach(element => {
                element.removeAttribute("disabled");
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
            document.getElementById("edit-btn").classList.remove("d-none");
            document.getElementById("save-btn").classList.add("d-none");
            document.getElementById("cancel-btn").classList.add("d-none");
        }
        function writeData(){
            document.getElementById('directoryCheck').checked = agency_module_info.home[0].directory == 'false' ? false:true;
            document.getElementById('statusCheck').checked = agency_module_info.home[0].status == 'false' ? false:true;
            document.getElementById('scheduleCheck').checked = agency_module_info.home[0].schedule == 'false' ? false:true;
            document.getElementById('weatherCheck').checked = agency_module_info.home[0].weather == 'false' ? false:true;
            document.getElementById('gpsCheck').checked = agency_module_info.home[0].calendar == 'false' ? false:true;

            document.getElementById('suppliesCheck').checked = agency_module_info.logs[0].supplies == 'false' ? false:true;
            document.getElementById('vehicleCheck').checked = agency_module_info.logs[0].vehicles == 'false' ? false:true;
            document.getElementById('dailyCheck').checked = agency_module_info.logs[0].daily == 'false' ? false:true;
            document.getElementById('maintenanceCheck').checked = agency_module_info.logs[0].maintenance == 'false' ? false:true;
            document.getElementById('trainingCheck').checked = agency_module_info.logs[0].training == 'false' ? false:true;
            document.getElementById('icsCheck').checked = agency_module_info.logs[0].ics == 'false' ? false:true;
            document.getElementById('equipmentCheck').checked = agency_module_info.logs[0].equipment == 'false' ? false:true;
            document.getElementById('resourceCheck').checked = agency_module_info.logs[0].resources == 'false' ? false:true;

            document.getElementById('emergencyCheck').checked = agency_module_info.alerts[0].emergency == 'false' ? false:true;
            document.getElementById('newIncidentCheck').checked = agency_module_info.alerts[0].new_incident == 'false' ? false:true;
            document.getElementById('closedIncidentCheck').checked = agency_module_info.alerts[0].closed_incident == 'false' ? false:true;
            document.getElementById('activeIncidentCheck').checked = agency_module_info.alerts[0].active_incident == 'false' ? false:true;
            document.getElementById('audioCheck').checked = agency_module_info.alerts[0].audio == 'false' ? false:true;
            document.getElementById('neighboringCheck').checked = agency_module_info.alerts[0].neighboring == 'false' ? false:true;
            document.getElementById('phoneCheck').checked = agency_module_info.alerts[0].phone == 'false' ? false:true;
            document.getElementById('msgCheck').checked = agency_module_info.alerts[0].messages == 'false' ? false:true;

            document.getElementById('locationCheck').checked = agency_module_info.references[0].location == 'false' ? false:true;
            document.getElementById('mapsCheck').checked = agency_module_info.references[0].maps == 'false' ? false:true;
            document.getElementById('communicationsCheck').checked = agency_module_info.references[0].communications == 'false' ? false:true;
            document.getElementById('internalCheck').checked = agency_module_info.references[0].internal == 'false' ? false:true;
            document.getElementById('incidentListCheck').checked = agency_module_info.references[0].incident_checklist == 'false' ? false:true;

            document.getElementById('personProfileCheck').checked = agency_module_info.account[0].personal_profile == 'false' ? false:true;
            document.getElementById('agencyProfileCheck').checked = agency_module_info.account[0].agency_profile == 'false' ? false:true;
            document.getElementById('notificationsCheck').checked = agency_module_info.account[0].notifications == 'false' ? false:true;
            document.getElementById('appSettingsCheck').checked = agency_module_info.account[0].app_settings == 'false' ? false:true;
            document.getElementById('certificationsCheck').checked = agency_module_info.account[0].certifications == 'false' ? false:true;
            document.getElementById('paymentCheck').checked = agency_module_info.account[0].payments == 'false' ? false:true;
        }
    </script>
</body>

</html>