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
                            <h1 class="h3 mb-4 text-gray-800">Users</h1>
                        </div>
    
                        <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Type</th>
                                            <th>Medical</th>
                                            <th>Join Date</th>
                                            <th>Last Login</th>
                                            <th style="width:1px">Admin</th>
                                            <th style="width: 14rem;">Edit</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Type</th>
                                            <th>Medical</th>
                                            <th>Join Date</th>
                                            <th>Last Login</th>
                                            <th style="width:1px">Admin</th>
                                            <th style="width: 14rem;">Edit</th>
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

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

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

        document.getElementById("my-loader-element").classList.add("loader");
        init_id = "<?php echo $agency_id;?>";
        function getData(agency_id) {
            $.ajax({
                type: "GET",
                url: "https://api.redenes.org/dev/v1/agency-users/",
                data: {
                    agency_id: agency_id,
                    authorization: "<?php echo $authorization;?>"
                },
                async:false,
                success: function (res) {
                    var data = res.agencies_users;
                    writeData(data);
                    document.getElementById("my-loader-element").classList.remove("loader");                
                    document.getElementById("my-loader-wrapper").classList.add("d-none");
                }
            })
        }
        getData(init_id);
        function writeData(mainData) {
            console.log(mainData);
            var tmp = '';
            mainData.forEach(element => {
                tmp += "<tr><td class='col-id'>"+element.id+"</td><td><input type='text' class='form-control bg-light border-0 small' placeholder='Search for...' aria-label='Search' aria-describedby='basic-addon2' readOnly value='"+element.name+"'></td><td><select name='dataTable_length' aria-controls='dataTable' class='custom-select form-control form-control-sm' disabled><option value='Available" +element.status=='Available'?'selected':''+ ">Available</option><option value='On Call" +element.status=='On Call'?'selected':''+ ">On Call</option><option value='On Duty" +element.status=='On Duty'?'selected':''+ ">On Duty</option><option value='Off Duty" +element.status=='Off Duty'?'selected':''+ ">Off Duty</option></select></td><td><select name='dataTable_length' aria-controls='dataTable' class='custom-select form-control form-control-sm' disabled><option value='Chief'"+element.status=='Chief'?'selected':''+">Chief</option>
                            <option value="Operations Leader" <?php if($users_type[$i] == 'Operations Leader') {echo 'selected';}?>>Operations Leader</option>
                            <option value="Member" <?php if($users_type[$i] == 'Member') {echo 'selected';}?>>Member</option>
                            <option value="Support Member" <?php if($users_type[$i] == 'Support Member') {echo 'selected';}?>>Support Member</option>
                        </select>
                    </td>
                    <td>
                    <select name="dataTable_length" aria-controls="dataTable" class="custom-select form-control form-control-sm" disabled>
                        <option value="EMT" <?php if($users_meidcal[$i] == 'EMT') {echo 'selected';}?>>EMT</option>
                        <option value="Paramedic" <?php if($users_meidcal[$i] == 'Paramedic') {echo 'selected';}?>>Paramedic</option>
                        <option value="Nurse" <?php if($users_meidcal[$i] == 'Nurse') {echo 'selected';}?>>Nurse</option>
                        <option value="Doctor" <?php if($users_meidcal[$i] == 'Doctor') {echo 'selected';}?>>Doctor</option>
                    </select>
                    </td>
                    <td><?php echo $users_join[$i];?></td>
                    <td><?php echo $users_last_login[$i];?></td>
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="onCallCheck<?php echo $i;?>" disabled <?php if($users_admin[$i] == 'true'){echo 'checked';}?>>
                            <label class="custom-control-label" for="onCallCheck<?php echo $i;?>"></label>
                        </div>
                    </td>
                    <td>
                        <button type="button" class="save-btn btn btn-success btn-icon-split my-1 mr-2 d-none">
                            <span class="icon text-white-50">
                                <i class="fas fa-check"></i>
                            </span>
                            <span class="text">Save</span>
                        </button>
                        <button type="button" class="edit-btn btn btn-success btn-icon-split my-1 mr-2">
                            <span class="icon text-white-50">
                                <i class="fas fa-check"></i>
                            </span>
                            <span class="text">Edit</span>
                        </button>
                        <button type="button" class="cancel-btn btn btn-danger btn-icon-split my-1 mr-2 d-none">
                            <span class="icon text-white-50">
                                <i class="fas fa-edit"></i>
                            </span>
                            <span class="text">Cancel</span>
                        </button>
                    </td>
                </tr>
                // tmp += "<tr><td>" + element.id + "</td><td><input type='text' class='form-control bg-light border-0 small' placeholder='Search for...' value='" + element.call_type + "' readOnly></td><td><input type='text' class='form-control bg-light border-0 small' placeholder='Search for...' value='" + element.call_abbreviation + "' readOnly></td><td><div class='custom-control custom-checkbox'><input type='checkbox' class='custom-control-input' id='check'" + (element.active == "false" ? "" : "checked") + " disabled><label class='custom-control-label' for='check'></label></div></td><td><button type='button' class='btn btn-success btn-icon-split my-1 mr-2 btn-save'><span class='icon text-white-50'><i class='fas fa-check'></i></span><span class='text'>Save</span></button><button type='button' class='btn btn-danger btn-icon-split my-1 mr-2 d-none btn-cancel'><span class='icon text-white-50'><i class='fas fa-edit'></i></span><span class='text'>Cancel</span></button></td></tr>";
            });
            document.getElementById('table-content').innerHTML = tmp;
        }

        const editButtons = document.querySelectorAll('.edit-btn');
        const saveButtons = document.querySelectorAll('.save-btn');
        const cancelButtons = document.querySelectorAll('.cancel-btn');

        var values=['','','','',false];
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

                checkbox.removeAttribute('disabled');
                input.removeAttribute('readOnly');
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

                editButtons.forEach(element => {
                    element.removeAttribute('disabled');
                });
                document.getElementById("my-loader-element").classList.add("loader");                
                var authorization = "<?php echo $authorization;?>";
                var formData = {
                    authorization: authorization.toString(),
                    agency_id: init_id.toString(),
                    id: trElement.querySelector('.col-id').innerHTML,
                    name: input.value,
                    status: selects[0].value,
                    type: selects[1].value,
                    medical: selects[2].value,
                    admin: checkbox.checked
                }
                $.ajax({
                    type: "POST",
                    url: "https://api.redenes.org/dev/v1/agency-users/",
                    data: JSON.stringify(formData),
                    dataType: "json",
                    contentType:'application/json',
                    success: function (res) {
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
            });
        });
    </script>
</body>

</html>