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
    <script>
        // To show the loader
        document.getElementById("my-loader-element").classList.add("loader");
        var mainData;
        init_id = "<?php echo $agency_id;?>";
        async function getData(agency_id) {
            await $.ajax({
                type: "GET",
                url: "https://api.redenes.org/dev/v1/agency-call-types/",
                data: {
                    agency_id: agency_id,
                    authorization: "<?php echo $authorization;?>"
                },
                success: function (res) {
                    var tmp = '', tmp1 = '', tmp2 = '', tmp3 = '';
                    var data = res.agencies_call_types;
                    data.forEach(element => {
                        tmp = tmp + element.id + '$$';
                        tmp1 = tmp1 + element.call_type + '$$';
                        tmp2 = tmp2 + element.call_abbreviation + '$$';
                        tmp3 = tmp3 + element.active + '$$';
                    });
                    document.cookie = "agencies_call_types_1 = " + tmp;
                    document.cookie = "agencies_call_types_2 = " + tmp1;
                    document.cookie = "agencies_call_types_3 = " + tmp2;
                    document.cookie = "agencies_call_types_4 = " + tmp3;
                    document.getElementById("my-loader-element").classList.remove("loader");                
                    document.getElementById("my-loader-wrapper").classList.add("d-none");
                }
            })
        }
        getData(init_id);
    </script>
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
                            <h1 class="h3 mb-4 text-gray-800">Call Types</h1>
                        </div>
    
                        <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" name="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Call Type</th>
                                            <th>Call Abbreviation</th>
                                            <th style="width: 1rem;">Active</th>
                                            <th style="width: 15rem;">Edit</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Call Type</th>
                                            <th>Call Abbreviation</th>
                                            <th style="width: 1rem;">Active</th>
                                            <th style="width: 15rem;">Edit</th>
                                        </tr>
                                    </tfoot>
                                    <tbody id="table-content">
                                        <?php
                                            $call_ids = explode('$$', $_COOKIE['agencies_call_types_1']);
                                            $call_types = explode('$$', $_COOKIE['agencies_call_types_2']);
                                            $call_abbs = explode('$$', $_COOKIE['agencies_call_types_3']);
                                            $call_active = explode('$$', $_COOKIE['agencies_call_types_4']);
                                            for ($i=0; $i < count($call_ids)-1; $i++) { ?>
                                        <tr>
                                            <td class="col-id"><?php echo $call_ids[$i];?></td>
                                            <td>
                                                <input type="text" class="form-control bg-light border-0 small"
                                                placeholder="Search for..." readOnly value="<?php echo $call_types[$i]?>">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control bg-light border-0 small"
                                                placeholder="Search for..." aria-label="Search"
                                                aria-describedby="basic-addon2" value="<?php echo $call_abbs[$i]?>" readOnly>
                                            </td>
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <?php if($call_active[$i] == 'true'){?>
                                                        <input type="checkbox" class="custom-control-input" id="onCallCheck<?php echo $i?>" checked disabled>
                                                    <?php } else {?>
                                                        <input type="checkbox" class="custom-control-input" id="onCallCheck<?php echo $i?>" disabled>
                                                        <?php }?>
                                                    <label class="custom-control-label" for="onCallCheck<?php echo $i?>"></label>
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
                                        <?php } ?>
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
    
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script>
        // To show the loader
        function writeData() {
            var tmp = '';
            mainData.forEach(element => {
                tmp += "<tr><td>" + element.id + "</td><td><input type='text' class='form-control bg-light border-0 small' placeholder='Search for...' value='" + element.call_type + "' readOnly></td><td><input type='text' class='form-control bg-light border-0 small' placeholder='Search for...' value='" + element.call_abbreviation + "' readOnly></td><td><div class='custom-control custom-checkbox'><input type='checkbox' class='custom-control-input' id='check'" + (element.active == "false" ? "" : "checked") + " disabled><label class='custom-control-label' for='check'></label></div></td><td><button type='button' class='btn btn-success btn-icon-split my-1 mr-2 btn-save'><span class='icon text-white-50'><i class='fas fa-check'></i></span><span class='text'>Save</span></button><button type='button' class='btn btn-danger btn-icon-split my-1 mr-2 d-none btn-cancel'><span class='icon text-white-50'><i class='fas fa-edit'></i></span><span class='text'>Cancel</span></button></td></tr>";
            });
            document.getElementById('table-content').innerHTML = tmp;
        }

        const editButtons = document.querySelectorAll('.edit-btn');
        const saveButtons = document.querySelectorAll('.save-btn');
        const cancelButtons = document.querySelectorAll('.cancel-btn');

        var values=['','',false];
        editButtons.forEach(element => {
            element.addEventListener('click', function(e) {
                tdElement = e.currentTarget.parentNode;
                trElement = tdElement.parentNode;
                tdElement.querySelector('.save-btn').classList.remove('d-none');
                tdElement.querySelector('.cancel-btn').classList.remove('d-none');
                e.currentTarget.classList.add('d-none');
                checkbox = trElement.querySelector('.custom-control-input')
                inputs = trElement.querySelectorAll('.form-control');
                checkbox.removeAttribute('disabled');
                i = 0;
                inputs.forEach(element => {
                    element.removeAttribute('readOnly');
                    values[i] = element.value;
                    i++;
                });
                editButtons.forEach(element => {
                    element.setAttribute('disabled', true);
                });
                values[2] = checkbox.checked;
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
                inputs = trElement.querySelectorAll('.form-control')
                checkbox.setAttribute('disabled', true);
                inputs.forEach(element => {
                    element.setAttribute('readOnly', true);
                });
                editButtons.forEach(element => {
                    element.removeAttribute('disabled');
                });
                inputs[0].value = values[0];
                inputs[1].value = values[1];
                checkbox.checked = values[2];
            });
        });
        saveButtons.forEach(element => {
            element.addEventListener('click', function(e) {
                tdElement = e.currentTarget.parentNode;
                trElement = tdElement.parentNode;
                
                tdElement.querySelector('.cancel-btn').classList.add('d-none');
                tdElement.querySelector('.edit-btn').classList.remove('d-none');
                e.currentTarget.classList.add('d-none');

                inputs = trElement.querySelectorAll('.form-control');
                checkbox = trElement.querySelector('.custom-control-input');

                editButtons.forEach(element => {
                    element.removeAttribute('disabled');
                });
                var authorization = "<?php echo $authorization;?>";
                var formData = {
                    authorization: authorization.toString(),
                    agency_id: init_id.toString(),
                    id: trElement.querySelector('.col-id').innerHTML,
                    call_type: inputs[0].value,
                    call_abbreviation: inputs[1].value,
                    active: checkbox.value,
                }
                document.getElementById("my-loader-element").classList.add("loader");                
                $.ajax({
                    type: "POST",
                    url: "https://api.redenes.org/dev/v1/agency-call-types/",
                    data: JSON.stringify(formData),
                    dataType: "json",
                    contentType:'application/json',
                    success: function (res) {
                        // To hide the loader
                        document.getElementById("my-loader-element").classList.remove("loader");                
                        document.getElementById("my-loader-wrapper").classList.add("d-none");
                    }
                })

                checkboxs = trElement.querySelectorAll('.custom-control-input')
                inputs = trElement.querySelectorAll('.form-control')
                checkboxs.forEach(element => {
                    element.setAttribute('disabled', true);
                });
                inputs.forEach(element => {
                    element.setAttribute('readOnly', true);
                });
            });
        });
    </script>
    
    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>


    <!-- Custom scripts for all pages-->
    <script src="js/main.js"></script>f
</body>

</html>