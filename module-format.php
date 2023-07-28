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

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


</head>

<body id="page-top">
    <div id="my-loader-element"></div>
    <div id="my-loader-wrapper"></div>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include('sidebar.php'); ?>
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
                            <h1 class="h3 mb-4 text-gray-800">Module Builder</h1>
                            <!-- Nav Item - User Information -->
                            <div class="nav-item dropdown no-arrow">
                                <button type="button" id="openModal" class='nav-link dropdown-toggle edit-btn btn btn-primary btn-icon-split my-1'><span class='icon text-white-50'><i class='fas fa-plus'></i></span><span class='text'>Create New Format</span></button>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-4" style="max-width: 30rem">
                            <h4 class="mb-0 text-right  mr-2" style="white-space: nowrap; width:15rem;">Modules</h4>
                            <select onchange="changeModule(event)" id="agencyModule" name='agencyModule' aria-controls='dataTable' class='custom-select form-control-sm'>
                                <option value="All" selected>All</option>
                                <option value="Status">Status</option>
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

                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Module</th>
                                                <th>Format Name</th>
                                                <th>Format Type</th>
                                                <th>Created By</th>
                                                <th>Last Edit</th>
                                                <th>Status</th>
                                                <th>Offline</th>
                                                <th>Groups</th>
                                                <th>Edit Layout</th>
                                                <th>Edit Logic</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Module</th>
                                                <th>Format Name</th>
                                                <th>Format Type</th>
                                                <th>Created By</th>
                                                <th>Last Edit</th>
                                                <th>Status</th>
                                                <th>Offline</th>
                                                <th>Groups</th>
                                                <th>Edit Layout</th>
                                                <th>Edit Logic</th>
                                                <th>Delete</th>
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
                            <select name='formatType' id='formatType' aria-controls='dataTable' class='custom-select form-control-sm'>
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
                            <select id="formatModule" name='formatModule' aria-controls='dataTable' class='custom-select form-control-sm'>
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
                    <button type="submit" id="createModuleBtn" class='nav-link edit-btn btn btn-primary btn-icon-split my-1'><span class='icon text-white-50'><i class='fas fa-plus'></i></span><span class='text'>Create</span></button>
                </div>
            </form>
        </div>
    </div>
    <!-- The Modal -->
    <div id="deleteModal" class="modal" style="padding-top:20rem">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close" onclick="closeDeleteModal()">&times;</span>
            <form id="createUserForm">
                <div id="modalFromContent">
                    <div class="row align-items-center justify-content-center mb-2">
                        <h6 class="ml-2 mb-0 text-right">Are you sure to delete this action?</h6>
                    </div>
                </div>
                <div class="row justify-content-center mt-4" id="modal-btn-wrapper">
                    <button type="button" onclick="confirmDelete()" class='nav-link btn btn-success btn-icon-split my-1 mr-4'><span class='icon text-white-50'><i class='fas fa-plus'></i></span><span class='text'>Delete</span></button>
                    <button type="button" onclick="confirmCancel()" class='nav-link btn btn-danger btn-icon-split my-1'><span class='icon text-white-50'><i class='fas fa-minus'></i></span><span class='text'>Cancel</span></button>
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
        init_id = "<?php echo $agency_id; ?>";
        var data;
        function getData(agency_id) {
            $.ajax({
                type: "GET",
                url: "https://api.redenes.org/dev/v1/format-modules/",
                data: {
                    agency_id: agency_id,
                    authorization: "<?php echo $authorization; ?>"
                },
                async: false,
                success: function(res) {
                    data = res.agencies_users;
                    writeData(data);
                    console.log(res);
                    document.getElementById("my-loader-element").classList.remove("loader");
                    document.getElementById("my-loader-wrapper").classList.add("d-none");
                }
            })
        }
        getData(init_id);

        function writeAgencyType(mainData) {
            tmp = '';
            mainData.forEach(element => {
                tmp += "<option value=" + element.type_name + ">" + element.type_name + "</option>";
            })
            document.getElementById('agency-types').innerHTML = tmp;
        }

        function writeData(mainData) {
            $('#dataTable').DataTable().destroy();
            var tmp = '';
            var index = 0;
            mainData.forEach(element => {
                tmp += "<tr data-id='" + element.format_id + "'>";
                tmp += "<td>" + element.module + "</td>";
                tmp += "<td>" + element.format_name + "</td>";
                tmp += "<td>" + element.format_type + "</td>";
                tmp += "<td>" + element.created_by + "</td>";
                tmp += "<td>" + element.last_edit + "</td>";
                tmp += "<td>" + element.status + "</td>";
                tmp += "<td>" + element.offline.toUpperCase() + "</td>";
                tmp += "<td>" + element.groups + "</td>";
                tmp += "</select></td>";
                tmp += "<td><a href='form-builder?form_id=" + element.format_id + "' class='edit-btn btn btn-success btn-icon-split my-1'><span class='icon text-white-50'><i class='fas fa-check'></i></span><span class='text'>Edit</span></a></td>";
                tmp += "<td><a href='format-logic-builder?format_id=" + element.format_id + "' class='edit-btn btn btn-success btn-icon-split my-1'><span class='icon text-white-50'><i class='fas fa-check'></i></span><span class='text'>Edit</span></a></td>";
                if (element.status == 'In Use') {
                    tmp += "<td><a class='disabled btn btn-danger btn-icon-split' href='#' onclick=openDeleteModal(event," + element.format_id + ")><span class='icon text-white-50'><i class='fas fa-trash'></i></span><span class='text'>Delete</span></a></td>"
                } else {
                    tmp += "<td><a class='btn btn-danger btn-icon-split' href='#' onclick=openDeleteModal(event,'" + element.format_id + "')><span class='icon text-white-50'><i class='fas fa-trash'></i></span><span class='text'>Delete</span></a></td>"
                }
                tmp += "</tr>";
                index++;
            });
            document.getElementById('table-content').innerHTML = tmp;
            $('#dataTable').dataTable();
        }
        $('#createModuleForm').submit(function(e) {
            document.getElementById("my-loader-element").classList.add("loader");
            e.preventDefault();
            var authorization = "<?php echo $authorization; ?>";
            var formData = {
                authorization: authorization.toString(),
                format_type: $('#formatType').val(),
                module: $('#formatModule').val(),
                format_name: $('#formatName').val(),
                agency_id: init_id
            }
            $.ajax({
                type: "POST",
                url: "https://api.redenes.org/dev/v1/format-modules/",
                data: JSON.stringify(formData),
                dataType: "json",
                contentType: 'application/json',
                success: function(res) {
                    document.getElementById("my-loader-element").classList.remove("loader");
                    document.getElementById("my-loader-wrapper").classList.add("d-none");
                    window.location.replace('form-builder?form_id=' + res.format_id);
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
        var deleteModal = document.getElementById("deleteModal");

        function openDeleteModal(e, row) {
            e.preventDefault();
            localStorage.setItem('deleteRow', row);
            deleteModal.style.display = "block";
        }

        function closeDeleteModal() {
            deleteModal.style.display = "none";
        }

        function confirmDelete() {
            row = localStorage.getItem('deleteRow');
            localStorage.removeItem('deleteRow');
            deleteForm(row);
            closeDeleteModal();
        }

        function deleteForm(row) {
            document.getElementById("my-loader-element").classList.add("loader");
            document.getElementById("my-loader-wrapper").classList.remove("d-none");
            var authorization = "<?php echo $authorization; ?>";
            var formData = {
                authorization: authorization.toString(),
                agency_id: init_id,
                delete: row
            }
            $.ajax({
                type: "POST",
                url: "https://api.redenes.org/dev/v1/format-modules/",
                data: JSON.stringify(formData),
                dataType: "json",
                contentType: 'application/json',
                success: function(res) {
                    data = res.agencies_users;
                    writeData(data);
                    document.getElementById("my-loader-element").classList.remove("loader");
                    document.getElementById("my-loader-wrapper").classList.add("d-none");
                    // if (res.delete == 'completed') {
                    //     trs = document.getElementById("table-content").children;
                    //     for (let index = 0; index < trs.length; index++) {
                    //         const element = trs[index];
                    //         console.log(trs[index]);
                    //         if (trs[index].getAttribute('data-id') == row) {
                    //             trs[index].remove();
                    //         }
                    //     }
                    //     document.getElementById("my-loader-element").classList.remove("loader");
                    //     document.getElementById("my-loader-wrapper").classList.add("d-none");
                    // }
                }
            })
        }

        function confirmCancel() {
            localStorage.removeItem('deleteRow');
            closeDeleteModal();
        }

        function changeModule(e) {
            var tmp = [];
            selectedModule = e.currentTarget.value;
            if(selectedModule == 'All') {
                writeData(data);
            }
            else {
                data.forEach(element => {
                    if(element.module == selectedModule) {
                        tmp.push(element);
                    }
                });
                writeData(tmp);
            }
        }
    </script>
    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
</body>

</html>
