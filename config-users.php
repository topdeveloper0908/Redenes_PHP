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
                            <h1 class="h3 mb-4 text-gray-800">Users</h1>
                        </div>

                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>User ID</th>
                                                <th>Name</th>
                                                <th style="width: 14rem;">Join Date</th>
                                                <th>Last Login</th>
                                                <th>Status</th>
                                                <th>Agencies</th>
                                                <th>Edit</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>User ID</th>
                                                <th>Name</th>
                                                <th style="width: 14rem;">Join Date</th>
                                                <th>Last Login</th>
                                                <th>Status</th>
                                                <th>Agencies</th>
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
    <!-- End of Page Wrapper -->
    <!-- The Modal -->
    <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <form id="createUserForm">
                <div class="row align-items-center mb-4">
                    <div class="col-4">
                        <h6 class="ml-2 mb-0 text-right">Rank</h6>
                    </div>
                    <div class="col-8">
                        <div class="d-flex align-items-center">
                            <select name='rankType' id='rankType' aria-controls='dataTable' class='custom-select form-control form-control-sm'>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center mb-4">
                    <div class="col-4">
                        <h6 class="ml-2 mb-0 text-right">Group</h6>
                    </div>
                    <div class="col-8">
                        <div class="d-flex align-items-center">
                            <select name='groupType' id='groupType' aria-controls='dataTable' class='custom-select form-control form-control-sm'>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center mb-4">
                    <div class="col-4">
                        <h6 class="ml-2 mb-0 text-right">Status</h6>
                    </div>
                    <div class="col-8">
                        <div class="d-flex align-items-center">
                            <select name='statusType' id='statusType' aria-controls='dataTable' class='custom-select form-control form-control-sm'>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-4">
                        <h6 class="ml-2 mb-0 text-right">User Phone </h6>
                    </div>
                    <div class="col-8">
                        <div class="d-flex align-items-center">
                            <input type='text' class='form-control small' name="userPhone" id="userPhone" required />
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mt-4">
                    <button type="submit" id="createModuleBtn" class='nav-link btn btn-primary btn-icon-split my-1'><span class='icon text-white-50'><i class='fas fa-plus'></i></span><span class='text'>Invite User</span></button>
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
                        <h6 class="ml-2 mb-0 text-right">Are you sure to delete this user?</h6>
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
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

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
        init_id = "<?php echo $agency_id; ?>";

        function getData(agency_id) {
            $.ajax({
                type: "GET",
                url: "https://api.redenes.org/dev/v1/agency-users/",
                data: {
                    agency_id: agency_id,
                    authorization: "<?php echo $authorization; ?>"
                },
                async: false,
                success: function(res) {
                    var data = res.agencies_users;
                    writeData(data, res.user_groups, res.user_ranks, res.user_status);
                    writeModal(res.user_groups, res.user_ranks, res.user_status);
                    document.getElementById("my-loader-element").classList.remove("loader");
                    document.getElementById("my-loader-wrapper").classList.add("d-none");
                }
            })
        }
        getData(init_id);

        function writeData(mainData, groups, ranks, statuses) {
            var tmp = '';
            var index = 0;
            var defaultGroups = ""
            mainData.forEach(element => {
                tmp += "<tr data-id='" + element.id + "'>";
                tmp += "<td><input type='text' class='form-control bg-light border-0 small' placeholder='Search for...' aria-label='Search' aria-describedby='basic-addon2' readOnly value=" + element.name + "></td>";
                tmp += "<td><select name='dataTable_length' aria-controls='dataTable' class='custom-select form-control form-control-sm' disabled>"
                for (let index = 0; index < ranks.length; index++) {
                    tmp += "<option value='" + ranks[index] + "'";
                    if (element.user_ranks == ranks[index]) {
                        tmp += " selected";
                    }
                    tmp += ">" + ranks[index] + "</option>"
                }
                tmp += "</select></td>";
                tmp += "<td>";
                if (element.user_groups != '') {
                    tmp = tmp + "<div class='form-group mb-0'>";
                    tmp += "<div class='multiselect disabled selection' id='groupsDropdown" + index + "' multiple='multiple' data-target='groupsDropdown" + index + "'>";
                    tmp += "<div class='title noselect' title='" + element.user_groups.join(',') + "'><span class='text'>" + element.user_groups.join(',') + "</span><span class='close-icon'>&times;</span><span class='expand-icon'>&plus;</span></div>"
                } else {
                    tmp = tmp + "<div class='form-group mb-0'>";
                    tmp += "<div class='multiselect disabled' id='groupsDropdown" + index + "' multiple='multiple' data-target='groupsDropdown" + index + "'>";
                    tmp += "<div class='title noselect'><span class='text'>Select</span><span class='close-icon'>&times;</span><span class='expand-icon'>&plus;</span></div>"
                }
                tmp += " <div class='dropdown-container text-left'>";
                for (var k = 0; k < groups.length; k++) {
                    tmp += "<option value='" + groups[k] + "' class='option-item";
                    if (element.user_groups.indexOf(groups[k]) != -1) {
                        tmp += " selected"
                    }
                    tmp += "'>" + groups[k] + "</option>";
                }
                tmp += "</div></div></div></td>";
                tmp += "<td><select name='dataTable_length' aria-controls='dataTable' class='custom-select form-control form-control-sm' disabled>"
                for (let index = 0; index < statuses.length; index++) {
                    tmp += "<option value='" + statuses[index] + "'";
                    if (element.user_status == statuses[index]) {
                        tmp += " selected";
                    }
                    tmp += ">" + statuses[index] + "</option>"
                }
                tmp += "</select></td>";
                tmp += "<td>" + element.join_date + "</td>";
                tmp += "<td>" + element.last_login + "</td>";
                tmp += "<td>" + element.added_by + "</td>";
                tmp += "<td><div class='custom-control custom-checkbox'><input type='checkbox' class='custom-control-input' id='onCallCheck" + index + "' disabled ";
                if (element.admin == 'true')
                    tmp += 'checked';
                tmp += "><label class='custom-control-label' for='onCallCheck" + index + "'></label></div></td>";
                tmp += "<td><button type='button' class='save-btn btn btn-success btn-icon-split my-1 mr-2 d-none'><span class='icon text-white-50'><i class='fas fa-check'></i></span><span class='text'>Save</span></button><button type='button' class='edit-btn btn btn-success btn-icon-split my-1 mr-2'><span class='icon text-white-50'><i class='fas fa-check'></i></span><span class='text'>Edit</span></button><button type='button' class='cancel-btn btn btn-danger btn-icon-split my-1 mr-2 d-none'><span class='icon text-white-50'><i class='fas fa-edit'></i></span><span class='text'>Cancel</span></button></td>";
                tmp += "<td><a class='btn btn-danger btn-icon-split' href='#' onclick=openDeleteModal(event," + element.id + ")><span class='icon text-white-50'><i class='fas fa-trash'></i></span><span class='text'>Delete</span></a></td>"
                tmp += "</tr>";
                index++;
            });
            document.getElementById('table-content').innerHTML = tmp;
            for (let i = 0; i < index; i++) {
                new Multiselect('#groupsDropdown' + i, mainData[i].user_groups);
            }
        }

        function writeModal(groups, ranks, statuses) {
            var tmp = '';
            for (var i = 0; i < groups.length; i++) {
                tmp += "<option value='" + groups[i] + "'>" + groups[i] + "</option>";
            }
            document.getElementById('groupType').innerHTML = tmp;
            tmp = '';
            for (var i = 0; i < groups.length; i++) {
                tmp += "<option value='" + ranks[i] + "'>" + ranks[i] + "</option>";
            }
            document.getElementById('rankType').innerHTML = tmp;
            tmp = '';
            for (var i = 0; i < statuses.length; i++) {
                tmp += "<option value='" + statuses[i] + "'>" + statuses[i] + "</option>";
            }
            document.getElementById('statusType').innerHTML = tmp;
        }

        const editButtons = document.querySelectorAll('.edit-btn');
        const saveButtons = document.querySelectorAll('.save-btn');
        const cancelButtons = document.querySelectorAll('.cancel-btn');

        var values = ['', '', '', '', false];
        editButtons.forEach(element => {
            element.addEventListener('click', function(e) {
                tdElement = e.currentTarget.parentNode;
                trElement = tdElement.parentNode;
                tdElement.querySelector('.save-btn').classList.remove('d-none');
                tdElement.querySelector('.cancel-btn').classList.remove('d-none');
                e.currentTarget.classList.add('d-none');

                checkbox = trElement.querySelector('.custom-control-input')
                input = trElement.querySelector('.form-control');
                selects = trElement.querySelectorAll('.custom-select');
                multiSelect = trElement.querySelector('.multiselect');

                checkbox.removeAttribute('disabled');
                input.removeAttribute('readOnly');
                multiSelect.classList.remove('disabled');
                values[0] = input.value;
                i = 1;
                selects.forEach(element => {
                    element.removeAttribute('disabled');
                    values[i] = element.value;
                    i++;
                });

                editButtons.forEach(element => {
                    element.setAttribute('disabled', true);
                });
                values[4] = checkbox.checked;
            });
        });
        cancelButtons.forEach(element => {
            element.addEventListener('click', function(e) {
                tdElement = e.currentTarget.parentNode;
                trElement = tdElement.parentNode;
                tdElement.querySelector('.save-btn').classList.add('d-none');
                tdElement.querySelector('.edit-btn').classList.remove('d-none');
                e.currentTarget.classList.add('d-none');
                checkbox = trElement.querySelector('.custom-control-input')
                input = trElement.querySelector('.form-control')
                selects = trElement.querySelectorAll('.custom-select')
                checkbox.setAttribute('disabled', true);
                input.setAttribute('readOnly', true);
                selects.forEach(element => {
                    element.setAttribute('disabled', true);
                });
                editButtons.forEach(element => {
                    element.removeAttribute('disabled');
                });
                multiSelect = trElement.querySelector('.multiselect');
                multiSelect.classList.add('disabled');
                input.value = values[0];
                selects[0].value = values[1];
                selects[1].value = values[2];
                selects[2].value = values[3];
                checkbox.checked = values[4];
            });
        });
        saveButtons.forEach(element => {
            element.addEventListener('click', function(e) {
                tdElement = e.currentTarget.parentNode;
                trElement = tdElement.parentNode;

                tdElement.querySelector('.cancel-btn').classList.add('d-none');
                tdElement.querySelector('.edit-btn').classList.remove('d-none');
                e.currentTarget.classList.add('d-none');

                checkbox = trElement.querySelector('.custom-control-input')
                input = trElement.querySelector('.form-control')
                selects = trElement.querySelectorAll('.custom-select')

                groups = trElement.querySelector('.multiselect').children[0].getAttribute('title');

                editButtons.forEach(element => {
                    element.removeAttribute('disabled');
                });
                document.getElementById("my-loader-element").classList.add("loader");
                var authorization = "<?php echo $authorization; ?>";
                var formData = {
                    authorization: authorization.toString(),
                    agency_id: init_id.toString(),
                    id: trElement.getAttribute('data-id'),
                    name: input.value,
                    rank: selects[0].value,
                    group: groups,
                    status: selects[1].value,
                    admin: checkbox.checked
                }
                $.ajax({
                    type: "POST",
                    url: "https://api.redenes.org/dev/v1/agency-users/",
                    data: JSON.stringify(formData),
                    dataType: "json",
                    contentType: 'application/json',
                    success: function(res) {
                        // To hide the loader
                        document.getElementById("my-loader-element").classList.remove("loader");
                        document.getElementById("my-loader-wrapper").classList.add("d-none");
                    }
                })

                input.setAttribute('readOnly', true);
                checkbox.setAttribute('disabled', true);
                selects.forEach(element => {
                    element.setAttribute('disabled', true);
                });
                multiSelect = trElement.querySelector('.multiselect');
                multiSelect.classList.add('disabled');
            });
        });
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
            deleteUser(row);
            closeDeleteModal();
        }

        function deleteUser(row) {
            document.getElementById("my-loader-element").classList.add("loader");
            document.getElementById("my-loader-wrapper").classList.remove("d-none");
            var authorization = "<?php echo $authorization; ?>";
            var formData = {
                authorization: authorization.toString(),
                delete: row
            }
            // $.ajax({
            //     type: "POST",
            //     url: "https://api.redenes.org/dev/v1/users/",
            //     data: JSON.stringify(formData),
            //     dataType: "json",
            //     contentType: 'application/json',
            //     success: function(res) {
            //         if (res.delete == 'completed') {

            //         }
            //     }
            // })
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

        function confirmCancel() {
            localStorage.removeItem('deleteRow');
            closeDeleteModal();
        }
        $('#createUserForm').submit(function(e) {
            document.getElementById("my-loader-element").classList.add("loader");
            e.preventDefault();
            var authorization = "<?php echo $authorization; ?>";
            var formData = {
                authorization: authorization.toString(),
                agency_id: init_id,
                rank: document.getElementById("rankType").value,
                group: document.getElementById("groupType").value,
                status: document.getElementById("statusType").value,
                phone: document.getElementById("userPhone").value
            }
            $.ajax({
                type: "POST",
                url: "https://api.redenes.org/dev/v1/agency-users/",
                data: JSON.stringify(formData),
                dataType: "json",
                async: false,
                contentType: 'application/json',
                success: function(res) {
                    modal.style.display = "none";
                    var data = res.agencies_users;
                    writeData(data, res.user_groups, res.user_ranks, res.user_status);
                    writeModal(res.user_groups, res.user_ranks, res.user_status);
                    document.getElementById("my-loader-element").classList.remove("loader");
                    document.getElementById("my-loader-wrapper").classList.add("d-none");
                }
            })
            $('#dataTable').dataTable();
        })
    </script>
</body>

</html>