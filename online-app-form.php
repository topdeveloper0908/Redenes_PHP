<?php
session_start();
error_reporting(0);

$user = $_COOKIE['name'];

if (strlen($user) == 0) {
    header('location:logout');
} else {
    $_SESSION['user'] = $_COOKIE['name'];
    $authorization = $_COOKIE['authorization'];
    $agency_id = $_COOKIE['agency_id'];
    if ($_REQUEST['form_id']) {
        $form_id = $_REQUEST['form_id'];
    } else {
        $form_id = '737b1459-25b4-4397-915f-f1f949c93492';
    }
    $agencies = explode("$$", $_COOKIE['agency']);
?>
<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
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
        <?php include('dashboard-sidebar.php'); ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include('header.php'); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800" id="page-title"></h1>
                    <form>
                        <div id="incident-content"></div>
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

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>


    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script src="js/main.js"></script>

    <script>
    // To show the loader
    document.getElementById("my-loader-element").classList.add("loader");
    init_id = "<?php echo $agency_id; ?>";
    var incident;
    var increment;
    var formData;

    function getData(agency_id) {
        $.ajax({
            type: "GET",
            url: "https://api.redenes.org/dev/v1/online-app-form",
            data: {
                agency_id: agency_id,
                authorization: "<?php echo $authorization; ?>",
                form_id: "<?php echo $form_id; ?>"
            },
            async: false,
            cors: true,
            secure: true,
            contentType: 'application/json',
            headers: {
                'Access-Control-Allow-Origin': '*',
                'Access-Control-Allow-Credentials': 'false',
                'Access-Control-Allow-Methods': 'GET,HEAD,OPTIONS,POST,PUT',
                'Access-Control-Allow-Headers': 'Access-Control-Allow-Headers, Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers'
            },
            success: function(res) {
                writeData(res.objects);
                formData = res;
                document.getElementById("page-title").innerHTML = res.navigation_title;
                // To hide the loader
                document.getElementById("my-loader-element").classList.remove("loader");
                document.getElementById("my-loader-wrapper").classList.add("d-none");
            }
        })
    }

    function writeData(content) {
        var tmp = '';
        for (var i = 0; i < content.length; i++) {
            object = content[i];
            tmp = tmp + "<div class='card shadow py-2 my-2' style='border-left:0.25rem solid #" + object[0].color +
                ";'><a class='incident-link' href='online-form?form_id=" + object[0].form_id +
                "'><div class='card-body'><div class='row no-gutters align-items-center'><div class='col mr-2'>";
            for (var j = 1; j < object.length; j++) {
                if (object[j].divider) {
                    tmp += "<div class='custom-control custom-border mt-4 mr-5' style='border-color: #" + object[j]
                        .divider + "'/></div>";
                } else {
                    tmp = tmp + "<div id='agency-address-unit' class='h5 mb-1 font-weight-bold text-gray-800'>" +
                        object[j].field + ": " + object[j].value + "</div>";
                }
            }
            tmp = tmp + "<div class='font-weight-bold text-uppercase mt-2 mb-0' style='color:" + object[0].color +
                "'>" + object[0].form_id + "</div>";
            tmp = tmp + "</div>"
            tmp = tmp + "<div class='col-auto'><img src='" + object[0].icon + "'></div>";
            tmp = tmp + "</div></div></a></div>";
        }
        document.getElementById("incident-content").innerHTML = tmp;
    }
    getData(init_id);

    function changeAgencyData(agency_id) {
        document.cookie = "agency_id = " + agency_id;
        window.location.replace("overview");
    }

    function saveData(a, b, c) {
        for (var i = 0; i < formData.objects.length; i++) {
            for (var j = 0; j < formData.objects[i].length; j++) {
                if (Object.keys(formData.objects[i][j])[0] == 'text_box') {
                    id = "incident_ob" + i.toString() + "_text" + j.toString();
                    formData.objects[i][j].pre_filled = document.getElementById(id).value;
                }
                if (Object.keys(formData.objects[i][j])[0] == 'drop_down') {
                    id = "incident_ob" + i.toString() + "_dropdown" + j.toString();
                    formData.objects[i][j].pre_filled_selected = document.getElementById(id).value;
                }
                if (Object.keys(formData.objects[i][j])[0] == 'check_box') {
                    id = "incident_ob" + i.toString() + "_check" + j.toString();
                    formData.objects[i][j].pre_filled = document.getElementById(id).checked;
                }
            }
        }
        if (formData.objects[a][b].buttons[c]) {
            formData.objects[a][b].buttons[c].clicked = 'true';
        }
        $.ajax({
            type: "POST",
            url: "https://api.redenes.org/dev/v1/select-incident/",
            data: JSON.stringify(formData),
            dataType: "json",
            contentType: 'application/json',
            success: function(res) {
                formData = res;
                writeData(res);
            }
        })
    }
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        var multi = new Multiselect("#countries");
    });
    </script>
</body>

</html>
<?php }  ?>