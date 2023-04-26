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

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>

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
                            <h1 class="h3 mb-4 text-gray-800">Format Modules</h1>
                            <!-- Nav Item - User Information -->
                            <div class="nav-item dropdown no-arrow">
                                <button type="button" id="openModal" class='nav-link dropdown-toggle edit-btn btn btn-primary btn-icon-split my-1'><span class='icon text-white-50'><i class='fas fa-plus'></i></span><span class='text'>Create New Format</span></button>
                            </div>
                        </div>
    
                        <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Format ID</th>
                                            <th>Format Type</th>
                                            <th>Module</th>
                                            <th>Format Name</th>
                                            <th>Created By</th>
                                            <th>Last Edit</th>
                                            <th>Status</th>
                                            <th>Edit Layout</th>
                                            <th>Edit Logic</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Format ID</th>
                                            <th>Format Type</th>
                                            <th>Module</th>
                                            <th>Format Name</th>
                                            <th>Created By</th>
                                            <th>Last Edit</th>
                                            <th>Status</th>
                                            <th>Edit Layout</th>
                                            <th>Edit Logic</th>
                                        </tr>
                                    </tfoot>
                                    <tbody id="table-content">
                                        
                                    </tbody>
                                </table>
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

    <!-- The Modal -->
    <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <form id="createModuleForm">
                <div class="row align-items-center">
                    <div class="col-4">
                        <h6 class="ml-2 mb-0 text-right">Format Type</h6>
                    </div>
                    <div class="col-8">
                        <div class="d-flex align-items-center">
                            <select name='formatType' id='formatType' aria-controls='dataTable' class='custom-select form-control form-control-sm'>
                                <option value="Display" selected>Display</option>
                                <option value="Form">Form</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center my-4">
                    <div class="col-4">
                        <h6 class="ml-2 mb-0 text-right">Module</h6>
                    </div>
                    <div class="col-8">
                        <div class="d-flex align-items-center">
                            <select id="formatModule" name='formatModule' aria-controls='dataTable' class='custom-select form-control form-control-sm'>
                                <option value="Status" selected>Status</option>
                                <option value="Schedule">Schedule</option>
                                <option value="Supplies">Supplies</option>
                                <option value="Training">Training</option>
                                <option value="Daily">Daily</option>
                                <option value="Vehicles">Vehicles</option>
                                <option value="Equipment">Equipment</option>
                                <option value="Resources">Resources</option>
                                <option value="New Incident">New Incident</option>
                                <option value="Audio">Audio</option>
                                <option value="Mutual Aid">Mutual Aid</option>
                                <option value="Locations">Locations</option>
                                <option value="Maps">Maps</option>
                                <option value="Communications">Communications</option>
                                <option value="Internal">Internal</option>
                                <option value="Incident Types">Incident Types</option>
                                <option value="ICS">ICS</option>
                                <option value="Personal Profile">Personal Profile</option>
                                <option value="Agency Profile">Agency Profile</option>
                                <option value="App Settings">App Settings</option>
                                <option value="Certifications">Certifications</option>
                                <option value="Connect Settings">Connect Settings</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-4">
                        <h6 class="ml-2 mb-0 text-right">Format Name</h6>
                    </div>
                    <div class="col-8">
                        <div class="d-flex align-items-center">
                            <input type='text' class='form-control small' name="formatName" id="formatName" required />
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mt-4">
                    <button type="submit" id="createModuleBtn" class='nav-link dropdown-toggle edit-btn btn btn-primary btn-icon-split my-1'><span class='icon text-white-50'><i class='fas fa-plus'></i></span><span class='text'>Create</span></button>
                </div>
            </form>
        </div>
    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script>        

        document.getElementById("my-loader-element").classList.add("loader");
    </script>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/main.js"></script>

    <script>        

        init_id = "<?php echo $agency_id;?>";
        function getData(agency_id) {
            $.ajax({
                type: "GET",
                url: "https://api.redenes.org/dev/v1/format-modules/",
                data: {
                    agency_id: agency_id,
                    authorization: "<?php echo $authorization;?>"
                },
                async:false,
                success: function (res) {
                    console.log(res);
                    var data = res.agencies_users;
                    writeData(data);
                    document.getElementById("my-loader-element").classList.remove("loader");                
                    document.getElementById("my-loader-wrapper").classList.add("d-none");
                }
            })
        }
        getData(init_id);
        function writeData(mainData) {
            var tmp = '';
            var index = 0;
            mainData.forEach(element => {
                tmp += "<tr>";
                tmp += "<td class='col-id'>"+element.format_id+"</td>";
                tmp += "<td>"+element.format_type+"</td>";
                tmp +=  "<td>"+element.module+"</td>";
                tmp +=  "<td>"+element.format_name+"</td>";
                tmp +=  "<td>"+element.created_by+"</td>";
                tmp +=  "<td>"+element.last_edit+"</td>";
                tmp +=  "<td>"+element.status+"</td>";
                tmp += "<td><a href='form-builder?form_id="+element.format_id+"' class='edit-btn btn btn-success btn-icon-split my-1'><span class='icon text-white-50'><i class='fas fa-check'></i></span><span class='text'>Edit</span></a></td>";
                tmp += "<td><a href='' class='edit-btn btn btn-success btn-icon-split my-1'><span class='icon text-white-50'><i class='fas fa-check'></i></span><span class='text'>Edit</span></a></td>";
                tmp += "</tr>";
                index++;
            });
            document.getElementById('table-content').innerHTML = tmp;
        } 
        $('#createModuleForm').submit(function(e){
            document.getElementById("my-loader-element").classList.add("loader");                
            e.preventDefault();
            var authorization = "<?php echo $authorization;?>";
            var formData = {
                authorization: authorization.toString(),
                format_type: $('#formatType').val(),
                module: $('#formatModule').val(),
                format_name: $('#formatName').val()
            }
            $.ajax({
                type: "POST",
                url: "https://api.redenes.org/dev/v1/format-modules/",
                data: JSON.stringify(formData),
                dataType: "json",
                contentType:'application/json',
                success: function (res) {
                    document.getElementById("my-loader-element").classList.remove("loader");                
                    document.getElementById("my-loader-wrapper").classList.add("d-none");
                    window.location.replace('form-builder?form_id='+res.format_id);
                }
            })
        })

        var modal = document.getElementById("myModal");
        // Get the button that opens the modal
        var modalBtn = document.getElementById("openModal");
        // Get the <span> element that closes the modal
        var closeBtn = document.getElementsByClassName("close")[0];
        modalBtn.onclick = function() {
            modal.style.display = "block";
        }
        closeBtn.onclick = function() {
           modal.style.display = "none";
        }
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }


    </script>
    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
</body>

</html>