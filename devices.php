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
                            <h1 class="h3 mb-4 text-gray-800">Devices</h1>
                            <div class="nav-item dropdown no-arrow">
                                <button type="button" id="openModal" class='nav-link dropdown-toggle edit-btn btn btn-primary btn-icon-split my-1'><span class='icon text-white-50'><i class='fas fa-plus'></i></span><span class='text'>Add Device</span></button>
                            </div>
                        </div>

                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Device Type</th>
                                                <th>Device Model</th>
                                                <th>Operating System</th>
                                                <th>Carrier</th>
                                                <th>First Login</th>
                                                <th>Last Login</th>
                                                <th>App Version</th>
                                                <th style="width: 13rem;">Test Notification</th>
                                                <th>Logout</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Device Type</th>
                                                <th>Device Model</th>
                                                <th>Operating System</th>
                                                <th>Carrier</th>
                                                <th>First Login</th>
                                                <th>Last Login</th>
                                                <th>App Version</th>
                                                <th style="width: 13rem;">Test Notification</th>
                                                <th>Logout</th>
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
            <form id="createDeviceForm">
                <div class="row align-items-center mb-4">
                    <div class="col-4">
                        <h6 class="ml-2 mb-0 text-right">Select User</h6>
                    </div>
                    <div class="col-8">
                        <div class="d-flex align-items-center">
                            <select name='selectedUser' id='selectedUser' aria-controls='dataTable' class='custom-select form-control form-control-sm'>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mt-4">
                    <button type="submit" id="createModuleBtn" class='nav-link dropdown-toggle edit-btn btn btn-primary btn-icon-split my-1'><span class='icon text-white-50'><i class='fas fa-plus'></i></span><span class='text'>Create</span></button>
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
                        <h6 class="ml-2 mb-0 text-right">Are you sure to delete this device?</h6>
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
        // To show the loader
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

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/main.js"></script>

    <script>
        // To show the loader
        init_id = "<?php echo $agency_id; ?>";
        async function getData(agency_id) {
            await $.ajax({
                type: "GET",
                url: "https://api.redenes.org/dev/v1/agency-devices/",
                async: false,
                data: {
                    agency_id: agency_id,
                    authorization: "<?php echo $authorization; ?>"
                },
                success: function(res) {
                    var data = res.agencies_devices;
                    writeData(data);
                    document.getElementById("my-loader-element").classList.remove("loader");
                    document.getElementById("my-loader-wrapper").classList.add("d-none");
                }
            })
        }
        getData(init_id);

        function writeData(mainData) {
            var tmp = '';
            mainData.forEach(element => {
                id = element.id.replaceAll('-', '_').toString();
                tmp += "<tr data-id='" + id + "'></td>";
                tmp += "<td>" + element.name + "</td>";
                tmp += "<td>" + element.device_type + "</td>";
                tmp += "<td>" + element.operating_system + "</td>";
                tmp += "<td class='col-id'>" + element.carrier + "</td>";
                tmp += "<td class='col-id'>" + element.first_login + "</td>";
                tmp += "<td class='col-id'>" + element.last_login + "</td>";
                tmp += "<td class='col-id'>" + element.name + "</td>";
                tmp += "<td class='col-id'>" + element.app_version + "</td>";
                tmp += "<td> <button type='button' class='btn btn-primary btn-icon-split btn-notification'> <span class='icon text-white-50'> <i class='fas fa-flag'></i></span><span class='text'>Send Notification</span></button></td>";
                tmp += "<td> <button type='button' class='btn btn-success btn-icon-split btn-notification' onclick=logout(event,'" + id + "')> <span class='icon text-white-50'> <i class='fas fa-plus'></i></span><span class='text'>Logout</span></button></td>";
                tmp += "<td><a class='btn btn-danger btn-icon-split' href='#' onclick=openDeleteModal(event,'" + id + "')><span class='icon text-white-50'><i class='fas fa-trash'></i></span><span class='text'>Delete</span></a></td>"
                tmp += "</tr>";
            });
            document.getElementById('table-content').innerHTML = tmp;
        }
        const saveButtons = document.querySelectorAll('.btn-notification');
        saveButtons.forEach(element => {
            element.addEventListener('click', function(e) {
                tdElement = e.currentTarget.parentNode;
                trElement = tdElement.parentNode;

                // input = trElement.querySelectorAll('.form-control')

                document.getElementById("my-loader-element").classList.add("loader");
                var authorization = "<?php echo $authorization; ?>";
                var formData = {
                    authorization: authorization.toString(),
                    agency_id: init_id.toString(),
                    id: trElement.getAttribute('data-id'),
                    button: 'send_notification'
                }
                $.ajax({
                    type: "POST",
                    url: "https://api.redenes.org/dev/v1/agency-devices/",
                    data: JSON.stringify(formData),
                    dataType: "json",
                    contentType: 'application/json',
                    success: function(res) {
                        // To hide the loader
                        document.getElementById("my-loader-element").classList.remove("loader");
                        document.getElementById("my-loader-wrapper").classList.add("d-none");
                    }
                })
            });
        });
        var modal = document.getElementById("myModal");
        // Get the button that opens the modal
        var modalBtn = document.getElementById("openModal");
        // Get the <span> element that closes the modal
        var closeBtn = document.getElementsByClassName("close")[0];
        modalBtn.onclick = function() {
            $.ajax({
                type: "GET",
                url: "https://api.redenes.org/dev/v1/agency-devices/",
                async: false,
                data: {
                    agency_id: init_id,
                    authorization: "<?php echo $authorization; ?>",
                    get_users: true
                },
                success: function(res) {
                    // var data = res.agencies_devices;
                    writeModal(res.users);
                    // document.getElementById("my-loader-element").classList.remove("loader");                
                    // document.getElementById("my-loader-wrapper").classList.add("d-none");
                }
            })
        }

        function writeModal(data) {
            var tmp = '';
            for (var i = 0; i < data.length; i++) {
                tmp += "<option value='" + data[i] + "'>" + data[i] + "</option>";
            }
            document.getElementById('selectedUser').innerHTML = tmp;
            modal.style.display = "block";
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
            deleteDevice(row);
            closeDeleteModal();
        }

        function deleteDevice(row) {
            document.getElementById("my-loader-element").classList.add("loader");
            document.getElementById("my-loader-wrapper").classList.remove("d-none");
            var authorization = "<?php echo $authorization; ?>";

            // input = trElement.querySelectorAll('.form-control')

            document.getElementById("my-loader-element").classList.add("loader");
            var authorization = "<?php echo $authorization; ?>";
            var formData = {
                authorization: authorization.toString(),
                agency_id: init_id.toString(),
                id: row,
                button: 'delete',
            }
            $.ajax({
                type: "POST",
                url: "https://api.redenes.org/dev/v1/agency-devices/",
                data: JSON.stringify(formData),
                dataType: "json",
                contentType: 'application/json',
                success: function(res) {
                    // To hide the loader
                    document.getElementById("my-loader-element").classList.remove("loader");
                    document.getElementById("my-loader-wrapper").classList.add("d-none");
                }
            })
            trs = document.getElementById("table-content").children;
            for (let index = 0; index < trs.length; index++) {
                const element = trs[index];
                if (trs[index].getAttribute('data-id') == row) {
                    trs[index].remove();
                }
            }
            document.getElementById("my-loader-element").classList.remove("loader");
            document.getElementById("my-loader-wrapper").classList.add("d-none");
        }

        function logout(e, id) {
            console.log(id);
            document.getElementById("my-loader-element").classList.add("loader");
            document.getElementById("my-loader-wrapper").classList.remove("d-none");
            var authorization = "<?php echo $authorization; ?>";

            // input = trElement.querySelectorAll('.form-control')

            document.getElementById("my-loader-element").classList.add("loader");
            var authorization = "<?php echo $authorization; ?>";
            var formData = {
                authorization: authorization.toString(),
                agency_id: init_id.toString(),
                id: id,
                button: 'log_out',
            }
            $.ajax({
                type: "POST",
                url: "https://api.redenes.org/dev/v1/agency-devices/",
                data: JSON.stringify(formData),
                dataType: "json",
                contentType: 'application/json',
                success: function(res) {
                    // To hide the loader
                    document.getElementById("my-loader-element").classList.remove("loader");
                    document.getElementById("my-loader-wrapper").classList.add("d-none");
                }
            })
            document.getElementById("my-loader-element").classList.remove("loader");
            document.getElementById("my-loader-wrapper").classList.add("d-none");
        }

        function confirmCancel() {
            localStorage.removeItem('deleteRow');
            closeDeleteModal();
        }
        $('#createDeviceForm').submit(function(e) {
            document.getElementById("my-loader-element").classList.add("loader");
            e.preventDefault();
            user = document.getElementById("selectedUser").value;
            var authorization = "<?php echo $authorization; ?>";
            var formData = {
                authorization: authorization.toString(),
                agency_id: init_id,
                user: user
            }
            $.ajax({
                type: "POST",
                url: "https://api.redenes.org/dev/v1/agency-devices/",
                data: JSON.stringify(formData),
                dataType: "json",
                contentType: 'application/json',
                success: function(res) {
                    modal.style.display = "none";
                    var data = res.agencies_devices;
                    writeData(data);
                    document.getElementById("my-loader-element").classList.remove("loader");
                    document.getElementById("my-loader-wrapper").classList.add("d-none");
                }
            })
        })
        closeBtn.onclick = function() {
            modal.style.display = "none";
        }
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>

</html>