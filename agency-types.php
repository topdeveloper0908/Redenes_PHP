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
                            <h1 class="h3 mb-4 text-gray-800">Agency Types</h1>
                            <div class="nav-item dropdown no-arrow">
                                <button type="button" id="openModal" class='nav-link dropdown-toggle btn btn-primary btn-icon-split my-1'><span class='icon text-white-50'><i class='fas fa-plus'></i></span><span class='text'>Add Type</span></button>
                            </div>
                        </div>

                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Type ID</th>
                                                <th>Type Name</th>
                                                <th>Status</th>
                                                <th>Updated By</th>
                                                <th>Updated Date</th>
                                                <th>Subscriptions</th>
                                                <th style="width: 15rem">Edit</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Type ID</th>
                                                <th>Type Name</th>
                                                <th>Status</th>
                                                <th>Updated By</th>
                                                <th>Updated Date</th>
                                                <th>Subscriptions</th>
                                                <th>Edit</th>
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
            <form id="createTypeForm">
                <div class="row align-items-center mb-4">
                    <div class="col-4">
                        <h6 class="ml-2 mb-0 text-right">Type Name</h6>
                    </div>
                    <div class="col-8">
                        <div class="d-flex align-items-center">
                            <input type="text" class="form-control form-control-user" id="modal-type-name" placeholder="Enter Type Name...">
                        </div>
                    </div>
                </div>
                <div class="row align-items-center mb-4">
                    <div class="col-4">
                        <h6 class="ml-2 mb-0 text-right">Status</h6>
                    </div>
                    <div class="col-8">
                        <div class="d-flex align-items-center">
                            <select id='modal-status' aria-controls='dataTable' class='custom-select form-control-sm'>
                                <option value="Development">Development</option>
                                <option value="Beta">Beta</option>
                                <option value="Active">Active</option>
                                <option value="Non Active">Non Active</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mt-4">
                    <button type="submit" id="createModuleBtn" class='nav-link btn btn-primary btn-icon-split my-1'><span class='icon text-white-50'><i class='fas fa-plus'></i></span><span class='text'>Add Type</span></button>
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
            document.getElementById("modal-type-name").value = '';
            document.getElementById("modal-status").value = 'Development';
        }
        init_id = "<?php echo $agency_id; ?>";
        async function getData(agency_id) {
            await $.ajax({
                type: "GET",
                url: "https://api.redenes.org/dev/v1/system-config-agency-types",
                async: false,
                data: {
                    agency_id: agency_id,
                    authorization: "<?php echo $authorization; ?>"
                },
                success: function(res) {
                    console.log(res);
                    var data = res.agencies;
                    writeData(data);
                    document.getElementById("my-loader-element").classList.remove("loader");
                    document.getElementById("my-loader-wrapper").classList.add("d-none");
                }
            })
        }
        getData(init_id);

        function writeData(data) {
            $('#dataTable').DataTable().destroy();
            const status = ['Development', 'Beta', 'Active', 'Non Active'];
            var tmp = '';
            data.forEach(element => {
                tmp += "<tr>";
                tmp += "<td>" + element.type_id + "</td>";
                tmp += "<td><input type='text' class='form-control small' placeholder='Search for...' aria-label='Search' aria-describedby='basic-addon2' readOnly value='" + element.type_name + "'></td>";
                tmp += "<td><select name='dataTable_length' onchange=statusChange(event) aria-controls='dataTable' data-subscription='" + element.subscriptions + "' class='custom-select form-control-sm' disabled>"
                if (element.status == 'Development') {
                    tmp += "<option value='Development' selected>Development</option><option value='Beta'>Beta</option>"
                } else if (element.status == 'Beta') {
                    tmp += "<option value='Beta' selected>Beta</option><option value='Active'>Active</option><option value='Non Active'>Non Active</option>"
                } else if (element.status == 'Active' && element.subscriptions == 0) {
                    tmp += "<option value='Active' selected>Active</option><option value='Non Active'>Non Active</option>"
                } else if (element.status == 'Active' && element.subscriptions != 0) {
                    tmp += "<option value='Active' selected>Active</option>"
                } else if (element.status == 'Non Active') {
                    tmp += "<option value='Development'>Development</option><option value='Beta'>Beta</option><option value='Active'>Active</option><option value='Non Active' selected>Non Active</option>"
                }
                tmp += "</td>";
                tmp += "<td>" + element.updated_by + "</td>";
                tmp += "<td>" + element.updated_date + "</td>";
                tmp += "<td>" + element.subscriptions + "</td>";
                tmp += "<td><button type='button' onclick='saveClick(event)' class='save-btn btn btn-success btn-icon-split my-1 mr-2 d-none'><span class='icon text-white-50'><i class='fas fa-check'></i></span><span class='text'>Save</span></button><button type='button' onclick='editClick(event)' class='edit-btn btn btn-success btn-icon-split my-1 mr-2'><span class='icon text-white-50'><i class='fas fa-check'></i></span><span class='text'>Edit</span></button><button type='button' onclick='cancelClick(event)' class='cancel-btn btn btn-danger btn-icon-split my-1 mr-2 d-none'><span class='icon text-white-50'><i class='fas fa-edit'></i></span><span class='text'>Cancel</span></button></td>";
                tmp += "</tr>";
            });
            document.getElementById('table-content').innerHTML = tmp;
            $('#dataTable').dataTable();
        }
        const editButtons = document.querySelectorAll('.edit-btn');
        const saveButtons = document.querySelectorAll('.save-btn');
        const cancelButtons = document.querySelectorAll('.cancel-btn');
        var values = ['', ''];

        function editClick(e) {
            tdElement = e.currentTarget.parentNode;
            trElement = tdElement.parentNode;
            tdElement.querySelector('.save-btn').classList.remove('d-none');
            tdElement.querySelector('.cancel-btn').classList.remove('d-none');
            e.currentTarget.classList.add('d-none');

            input = trElement.querySelector('.form-control');
            select = trElement.querySelector('.custom-select');
            input.removeAttribute('readOnly');
            values[0] = input.value;
            select.removeAttribute('disabled');
            values[1] = select.value;
            editButtons.forEach(element => {
                element.setAttribute('disabled', true);
            });
        }

        function cancelClick(e) {
            tdElement = e.currentTarget.parentNode;
            trElement = tdElement.parentNode;
            tdElement.querySelector('.save-btn').classList.add('d-none');
            tdElement.querySelector('.edit-btn').classList.remove('d-none');
            e.currentTarget.classList.add('d-none');
            input = trElement.querySelector('.form-control')
            select = trElement.querySelector('.custom-select')

            select.setAttribute('disabled', true);
            input.setAttribute('readOnly', true);
            editButtons.forEach(element => {
                element.removeAttribute('disabled');
            });
            input.value = values[0];
            select.value = values[1];
            if (values[1] == 'Development') {
                tmp = "<option value='Development' selected>Development</option><option value='Beta'>Beta</option>"
                select.innerHTML = tmp;
            } else if (values[1] == 'Beta') {
                tmp = "<option value='Beta' selected>Beta</option><option value='Active'>Active</option><option value='Non Active'>Non Active</option>"
                select.innerHTML = tmp;
            } else if (values[1] == 'Active' && select.getAttribute('data-subscription') == 0) {
                tmp = "<option value='Active' selected>Active</option><option value='Non Active'>Non Active</option>"
                select.innerHTML = tmp;
            } else if (values[1] == 'Non Active') {
                tmp = "<option value='Development'>Development</option><option value='Beta'>Beta</option><option value='Active'>Active</option><option value='Non Active' selected>Non Active</option>"
                select.innerHTML = tmp;
            }
        }

        function saveClick(e) {

            tdElement = e.currentTarget.parentNode;
            trElement = tdElement.parentNode;

            tdElement.querySelector('.cancel-btn').classList.add('d-none');
            tdElement.querySelector('.edit-btn').classList.remove('d-none');
            e.currentTarget.classList.add('d-none');

            id = trElement.children[0].innerHTML;
            input = trElement.querySelector('.form-control')
            select = trElement.querySelector('.custom-select')

            editButtons.forEach(element => {
                element.removeAttribute('disabled');
            });
            document.getElementById("my-loader-element").classList.add("loader");
            var authorization = "<?php echo $authorization; ?>";
            var formData = {
                authorization: authorization.toString(),
                agency_id: init_id,
                type_id: id,
                type_name: input.value,
                status_selected: select.value
            }
            $.ajax({
                type: "POST",
                url: "https://api.redenes.org/dev/v1/system-config-agency-types",
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
            input.setAttribute('readOnly', true);
        }
        $('#createTypeForm').submit(function(e) {
            document.getElementById("my-loader-element").classList.add("loader");
            e.preventDefault();
            var authorization = "<?php echo $authorization; ?>";
            var formData = {
                authorization: authorization.toString(),
                agency_id: init_id,
                type_name: document.getElementById("modal-type-name").value,
                status_selected: document.getElementById("modal-status").value,
            }
            $.ajax({
                type: "POST",
                url: "https://api.redenes.org/dev/v1/system-config-agency-types/",
                data: JSON.stringify(formData),
                dataType: "json",
                async: false,
                contentType: 'application/json',
                success: function(res) {
                    closeAddModal();
                    var data = res.agencies;
                    writeData(data);
                    document.getElementById("my-loader-element").classList.remove("loader");
                    document.getElementById("my-loader-wrapper").classList.add("d-none");
                }
            })
            $('#dataTable').dataTable();
        })

        function statusChange(e) {
            console.log(e.currentTarget.value);
            if (e.currentTarget.value == 'Development') {
                tmp = "<option value='Development' selected>Development</option><option value='Beta'>Beta</option>"
                e.currentTarget.innerHTML = tmp;
            } else if (e.currentTarget.value == 'Beta') {
                tmp = "<option value='Beta' selected>Beta</option><option value='Active'>Active</option><option value='Non Active'>Non Active</option>"
                e.currentTarget.innerHTML = tmp;
            } else if (e.currentTarget.value == 'Active' && e.currentTarget.getAttribute('data-subscription') == 0) {
                tmp = "<option value='Active' selected>Active</option><option value='Non Active'>Non Active</option>"
                e.currentTarget.innerHTML = tmp;
            } else if (e.currentTarget.value == 'Non Active') {
                tmp = "<option value='Development'>Development</option><option value='Beta'>Beta</option><option value='Active'>Active</option><option value='Non Active' selected>Non Active</option>"
                e.currentTarget.innerHTML = tmp;
            }
        }
    </script>
</body>

</html>