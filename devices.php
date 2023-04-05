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
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</head>

<body id="page-top">
    <div id="my-loader-element"></div>
    <div id="my-loader-wrapper"></div>
    <!-- Page Wrapper -->
    <div id="wrapper">
    <script>
        // To show the loader
        document.getElementById("my-loader-element").classList.add("loader");
        var mainData;
        init_id = "<?php echo $agency_id;?>";
        async function getData(agency_id) {
            await $.ajax({
                type: "GET",
                url: "https://api.redenes.org/dev/v1/agency-devices/",
                data: {
                    agency_id: agency_id,
                    authorization: "<?php echo $authorization;?>"
                },
                success: function (res) {
                    var tmp = '', tmp1 = '', tmp2 = '', tmp3 = '';
                    var data = res.agencies_devices;
                    data.forEach(element => {
                        tmp = tmp + element.id + '$$';
                        tmp1 = tmp1 + element.name + '$$';
                        tmp2 = tmp2 + element.device_type + '$$';
                        tmp3 = tmp3 + element.operating_system + '$$';
                    });
                    document.cookie = "agencies_devices_1 = " + tmp;
                    document.cookie = "agencies_devices_2 = " + tmp1;
                    document.cookie = "agencies_devices_3 = " + tmp2;
                    document.cookie = "agencies_devices_4 = " + tmp3;
                    document.getElementById("my-loader-element").classList.remove("loader");                
                    document.getElementById("my-loader-wrapper").classList.add("d-none");
                }
            })
        }
        getData(init_id);
    </script>
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
                            <h1 class="h3 mb-4 text-gray-800">Devices</h1>
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
                                            <th>Device Type</th>
                                            <th>Operating System</th>
                                            <th style="width: 12rem;">Test Notification</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Device Type</th>
                                            <th>Operating System</th>
                                            <th style="width: 12rem;">Test Notification</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                        $devices_ids = explode('$$', $_COOKIE['agencies_devices_1']);
                                        $devices_names = explode('$$', $_COOKIE['agencies_devices_2']);
                                        $devices_type = explode('$$', $_COOKIE['agencies_devices_3']);
                                        $devices_system = explode('$$', $_COOKIE['agencies_devices_4']);
                                        for ($i=0; $i < count($devices_ids)-1; $i++) { ?>
                                        <tr>
                                            <td class='col-id'><?php echo $devices_ids[$i];?></td>
                                            <td>
                                                <input type="text" class="form-control bg-light border-0 small"
                                                placeholder="Search for..." aria-label="Search"
                                                aria-describedby="basic-addon2" value=<?php echo $devices_names[$i];?> readOnly>
                                            </td>
                                            <td><input type="text" class="form-control bg-light border-0 small"
                                                placeholder="Search for..." aria-label="Search"
                                                aria-describedby="basic-addon2" value=<?php echo $devices_type[$i];?> readOnly>
                                            </td>
                                            <td><input type="text" class="form-control bg-light border-0 small"
                                                placeholder="Search for..." aria-label="Search"
                                                aria-describedby="basic-addon2" value=<?php echo $devices_system[$i];?> readOnly>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-primary btn-icon-split btn-notification">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-flag"></i>
                                                    </span>
                                                    <span class="text">Send Notification</span>
                                                </button>
                                            </td>
                                        </tr>
                                        <?php }?>
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
        const saveButtons = document.querySelectorAll('.btn-notification');
        saveButtons.forEach(element => {
            element.addEventListener('click', function(e) {
                tdElement = e.currentTarget.parentNode;
                trElement = tdElement.parentNode;
            
                input = trElement.querySelectorAll('.form-control')
                
                document.getElementById("my-loader-element").classList.add("loader");                
                var authorization = "<?php echo $authorization;?>";
                var formData = {
                    authorization: authorization.toString(),
                    agency_id: init_id.toString(),
                    id: trElement.querySelector('.col-id').innerHTML    ,
                    name: input.value
                }
                $.ajax({
                    type: "POST",
                    url: "https://api.redenes.org/dev/v1/agency-devices/",
                    data: JSON.stringify(formData),
                    dataType: "json",
                    contentType:'application/json',
                    success: function (res) {
                        // To hide the loader
                        document.getElementById("my-loader-element").classList.remove("loader");                
                        document.getElementById("my-loader-wrapper").classList.add("d-none");
                    }
                })
            });
        });
    </script>
</body>

</html>