<?php  
    $broswer = ($_SERVER['HTTP_SEC_CH_UA']) ;
    // Google Chrome
    if(strpos($broswer,"Google Chrome") > -1) {
        $broswer_name = "Google Chrome";
        $broswer_array = explode(',', $broswer);
        for ($i=0; $i < count($broswer_array); $i++) { 
            if(strpos($broswer_array[$i], "Google Chrome") > -1) {
                $tmp = explode(';', $broswer_array[$i]);
                $broswer_ver = substr($tmp[1], 3, strlen($tmp[1])-4);
            }
        }
    }
    else if(strpos($broswer,"Microsoft Edge") > -1) {
        $broswer_name = "Microsoft Edge";
        $broswer_array = explode(',', $broswer);
        for ($i=0; $i < count($broswer_array); $i++) { 
            if(strpos($broswer_array[$i], "Microsoft Edge") > -1) {
                $tmp = explode(';', $broswer_array[$i]);
                $broswer_ver = substr($tmp[1], 3, strlen($tmp[1])-4);
            }
        }
    }
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

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="gps-page overflow-x-hidden" id="page-top">
    <div id="my-loader-element"></div>
    <div id="my-loader-wrapper"></div>
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Main Content -->
        <div id="content" class="w-100">
            <h2 class="heading-title text-black text-center">GPS LOCATION</h2>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <h3 class="location-title text-right">Latitude:</h3>
                </div>
                <div class="col-md-6 mb-4">
                    <h3 id="latitude" class="location-title text-white">34.65255</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <h3 class="location-title text-right">Longitude:</h3>
                </div>
                <div class="col-md-6 mb-4">
                    <h3 id="latitude" class="location-title text-white">-118.61069</h3>
                </div>
            </div>
            <h2 class="heading-title text-black data-heading-title text-center">Data</h2>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <h3 class="data-title text-right">Status:</h3>
                </div>
                <div class="col-md-6 mb-4">
                    <h3 id="status" class="data-title text-white">Sending Data to server</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <h3 class="data-title text-right">Response Code:</h3>
                </div>
                <div class="col-md-6 mb-4">
                    <h3 id="response" class="data-title text-white">200</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <h3 class="data-title text-right">Rescue Text:</h3>
                </div>
                <div class="col-md-6 mb-4">
                    <h3 id="udid" class="data-title text-white">UDID</h3>
                </div>
            </div>
            <div class="pt-5 pb-5"></div>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <h3 class="data-title text-right">Web Browser:</h3>
                </div>
                <div class="col-md-6 mb-4">
                    <h3 id="browser" class="data-title text-white"><?php echo $broswer_name;?></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <h3 class="data-title text-right">Web Browser Version:</h3>
                </div>
                <div class="col-md-6 mb-4">
                    <h3 id="browser-version" class="data-title text-white"><?php echo $broswer_ver;?></h3>
                </div>
            </div>
            <div class="pt-5 pb-5"></div>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <h3 class="data-title text-right">Phone Operating System:</h3>
                </div>
                <div class="col-md-6 mb-4">
                    <h3 id="phone-system" class="data-title text-white">IPhone</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <h3 class="data-title text-right">Phone Version:</h3>
                </div>
                <div class="col-md-6 mb-4">
                    <h3 id="phone-version" class="data-title text-white">16.0.1</h3>
                </div>
            </div>
            <div class="pt-5 pb-5"></div>
        </div>

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

<script>
                document.getElementById("my-loader-element").classList.remove("loader");                
                    document.getElementById("my-loader-wrapper").classList.add("d-none");
        // To show the loader
        //document.getElementById("my-loader-element").classList.add("loader");
        // init_id = "";
        // var incident;
        // var increment; 
        // var formData;
        function getData() {
            $.ajax({
                type: "GET",
                url: "https://whatsmyua.info/",
                complete: function (res) {
                    document.getElementById('status').innerHTML = 'Response';
                    if(res.status == 404 ) {
                        document.getElementById('response').innerHTML = '404';
                    }
                    else {
                        document.getElementById('response').innerHTML = '200';
                    }
                    // To hide the loader
                }
            })
        }
        getData();
    </script>
</body>

</html>
<?php //}  ?>