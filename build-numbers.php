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

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>

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
                            <h1 class="h3 mb-4 text-gray-800">Build Numbers</h1>
                            <div class="nav-item dropdown no-arrow">
                                <button type="button" id="openModal" class='nav-link dropdown-toggle btn btn-primary btn-icon-split my-1'><span class='icon text-white-50'><i class='fas fa-plus'></i></span><span class='text'>Add Build</span></button>
                            </div>
                        </div>

                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Build ID</th>
                                                <th>Platform</th>
                                                <th>Version</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th>Updated By</th>
                                                <th>Updated Date</th>
                                                <th style="width: 15rem;">Edit</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Build ID</th>
                                                <th>Platform</th>
                                                <th>Version</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th>Updated By</th>
                                                <th>Updated Date</th>
                                                <th style="width: 15rem;">Edit</th>
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
    <!-- The Modal -->
    <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close" onclick="closeAddModal()">&times;</span>
            <form id="createUserForm">
                <div class="row align-items-center mb-4">
                    <div class="col-4">
                        <h6 class="ml-2 mb-0 text-right">Platfrom</h6>
                    </div>
                    <div class="col-8">
                        <div class="d-flex align-items-center">
                            <input type="text" class="form-control form-control-user" id="modal-platform" placeholder="Enter Platform...">
                        </div>
                    </div>
                </div>
                <div class="row align-items-center mb-4">
                    <div class="col-4">
                        <h6 class="ml-2 mb-0 text-right">Version</h6>
                    </div>
                    <div class="col-8">
                        <div class="d-flex align-items-center">
                            <input type="text" class="form-control form-control-user" id="modal-version" placeholder="Enter Version...">
                        </div>
                    </div>
                </div>
                <div class="row align-items-center mb-4">
                    <div class="col-4">
                        <h6 class="ml-2 mb-0 text-right">Description</h6>
                    </div>
                    <div class="col-8">
                        <div class="d-flex align-items-center">
                            <input type="text" class="form-control form-control-user" id="modal-description" placeholder="Enter Description...">
                        </div>
                    </div>
                </div>
                <div class="row align-items-center mb-4">
                    <div class="col-4">
                        <h6 class="ml-2 mb-0 text-right">Status</h6>
                    </div>
                    <div class="col-8">
                        <div class="d-flex align-items-center">
                            <select name='modal-status' id='modal-status' aria-controls='dataTable' class='custom-select form-control form-control-sm'>
                            </select>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End of Page Wrapper -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script>
        // document.getElementById("my-loader-element").classList.add("loader");
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

    <script src="js/demo/datatables-demo.js"></script>
    <script>
        var modal = document.getElementById("myModal");
        // Get the button that opens the modal
        var modalBtn = document.getElementById("openModal");
        // Get the <span> element that closes the modal
        var closeBtn = document.getElementsByClassName("close")[0];
        modalBtn.onclick = function() {
            modal.style.display = "block";
        }

        function closeAddModal() {
            modal.style.display = "none";
        }
        init_id = "<?php echo $agency_id; ?>";
        async function getData(agency_id) {
            await $.ajax({
                type: "GET",
                url: "https://api.redenes.org/dev/v1/system-config-build-numbers",
                async: false,
                data: {
                    agency_id: agency_id,
                    authorization: "<?php echo $authorization; ?>"
                },
                success: function(res) {
                    var data = res.build_numbers;
                    writeData(data);
                    document.getElementById("my-loader-element").classList.remove("loader");
                    document.getElementById("my-loader-wrapper").classList.add("d-none");
                }
            })
        }
        getData(init_id);

        function writeData(data) {
            var tmp = '';
            data.forEach(element => {
                tmp += "<tr>";
                tmp += "<td><input type='text' class='form-control border-0 small' placeholder='Search for...' aria-label='Search' aria-describedby='basic-addon2' readOnly value=" + element.build_id + "></td>";
                tmp += "<td><input type='text' class='form-control border-0 small' placeholder='Search for...' aria-label='Search' aria-describedby='basic-addon2' readOnly value=" + element.platform + "></td>";
                tmp += "<td><input type='text' class='form-control border-0 small' placeholder='Search for...' aria-label='Search' aria-describedby='basic-addon2' readOnly value=" + element.version + "></td>";
                tmp += "<td><input type='text' class='form-control border-0 small' placeholder='Search for...' aria-label='Search' aria-describedby='basic-addon2' readOnly value=" + element.description + "></td>";
                tmp += "<td><select name='dataTable_length' aria-controls='dataTable' class='custom-select form-control form-control-sm' disabled>"
                for (let index = 0; index < element.status.length; index++) {
                    tmp += "<option value='" + element.status[index] + "'";
                    if (element.status_selected == element.status[index]) {
                        tmp += " selected";
                    }
                    tmp += ">" + element.status[index] + "</option>"
                }
                tmp += "</td>";
                tmp += "<td>" + element.updated_by + "</td>";
                tmp += "<td>" + element.updated_date + "</td>";
                tmp += "<td><button type='button' class='save-btn btn btn-success btn-icon-split my-1 mr-2 d-none'><span class='icon text-white-50'><i class='fas fa-check'></i></span><span class='text'>Save</span></button><button type='button' class='edit-btn btn btn-success btn-icon-split my-1 mr-2'><span class='icon text-white-50'><i class='fas fa-check'></i></span><span class='text'>Edit</span></button><button type='button' class='cancel-btn btn btn-danger btn-icon-split my-1 mr-2 d-none'><span class='icon text-white-50'><i class='fas fa-edit'></i></span><span class='text'>Cancel</span></button></td>";
                tmp += "</tr>";
            });
            document.getElementById('table-content').innerHTML = tmp;
            $('#dataTable').dataTable();
        }
        const editButtons = document.querySelectorAll('.edit-btn');
        const saveButtons = document.querySelectorAll('.save-btn');
        const cancelButtons = document.querySelectorAll('.cancel-btn');
        var values = ['', '', '', '', ''];
        editButtons.forEach(element => {
            element.addEventListener('click', function(e) {
                tdElement = e.currentTarget.parentNode;
                trElement = tdElement.parentNode;
                tdElement.querySelector('.save-btn').classList.remove('d-none');
                tdElement.querySelector('.cancel-btn').classList.remove('d-none');
                e.currentTarget.classList.add('d-none');

                inputs = trElement.querySelectorAll('.form-control');
                select = trElement.querySelector('.custom-select');
                i = 0;
                inputs.forEach(element => {
                    element.removeAttribute('readOnly');
                    values[i] = element.value;
                    i++;
                });
                select.removeAttribute('disabled');
                values[4] = select.value;
                editButtons.forEach(element => {
                    element.setAttribute('disabled', true);
                });
            });
        });
        cancelButtons.forEach(element => {
            element.addEventListener('click', function(e) {
                tdElement = e.currentTarget.parentNode;
                trElement = tdElement.parentNode;
                tdElement.querySelector('.save-btn').classList.add('d-none');
                tdElement.querySelector('.edit-btn').classList.remove('d-none');
                e.currentTarget.classList.add('d-none');
                inputs = trElement.querySelectorAll('.form-control')
                select = trElement.querySelector('.custom-select')

                select.setAttribute('disabled', true);
                inputs.forEach(element => {
                    element.setAttribute('readOnly', true);
                });
                editButtons.forEach(element => {
                    element.removeAttribute('disabled');
                });
                inputs[0].value = values[0];
                inputs[1].value = values[1];
                inputs[2].value = values[2];
                inputs[3].value = values[3];
                select.value = values[4];
            });
        });
        saveButtons.forEach(element => {
            element.addEventListener('click', function(e) {
                tdElement = e.currentTarget.parentNode;
                trElement = tdElement.parentNode;

                tdElement.querySelector('.cancel-btn').classList.add('d-none');
                tdElement.querySelector('.edit-btn').classList.remove('d-none');
                e.currentTarget.classList.add('d-none');

                inputs = trElement.querySelectorAll('.form-control')
                select = trElement.querySelector('.custom-select')

                editButtons.forEach(element => {
                    element.removeAttribute('disabled');
                });
                document.getElementById("my-loader-element").classList.add("loader");
                var authorization = "<?php echo $authorization; ?>";
                var formData = {
                    authorization: authorization.toString(),
                    build_numbers: [{
                        build_id: inputs[0].value,
                        platform: inputs[1].value,
                        version: inputs[2].value,
                        description: inputs[3].value,
                        status_selected: select.value
                    }]
                }
                $.ajax({
                    type: "POST",
                    url: "https://api.redenes.org/dev/v1/system-config-build-numbers",
                    data: JSON.stringify(formData),
                    dataType: "json",
                    contentType: 'application/json',
                    success: function(res) {
                        // To hide the loader
                        document.getElementById("my-loader-element").classList.remove("loader");
                        document.getElementById("my-loader-wrapper").classList.add("d-none");
                    }
                })
                select.setAttribute('disabled', true);
                inputs.forEach(element => {
                    element.setAttribute('readOnly', true);
                });
            });
        });
    </script>
</body>

</html>