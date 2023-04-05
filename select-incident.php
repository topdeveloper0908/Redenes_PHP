<?php  
session_start();
error_reporting(0);

$user = $_COOKIE['name'];
                        
if (strlen($user) == 0) {
    header('location:logout');
} else{
    $_SESSION['user']= $_COOKIE['name'];
    $authorization = $_COOKIE['authorization'];
    $agency_id = $_COOKIE['agency_id'];
    $incident_id = $_REQUEST['incident_id'];
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
        <?php include ('dashboard-sidebar.php');?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include ('header.php'); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800">Selected Incident - <?php echo $incident_id?></h1>
                    <form>
                        <div id="incident-content">
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

<script>
        // To show the loader
        document.getElementById("my-loader-element").classList.add("loader");
        init_id = "<?php echo $agency_id;?>";
        var incident;
        var increment; 
        var formData;
        function getData(agency_id) {
            $.ajax({
                type: "GET",
                url: "https://api.redenes.org/dev/v1/select-incident",
                data: {
                    agency_id: agency_id,
                    authorization: "<?php echo $authorization;?>",
                    incident_id: "<?php echo $incident_id;?>"
                },
                success: function (res) {
                    writeData(res);
                    formData = res;
                    // To hide the loader
                    document.getElementById("my-loader-element").classList.remove("loader");                
                    document.getElementById("my-loader-wrapper").classList.add("d-none");
                }
            })
        }
        function writeData(content) {
            console.log(content);
            increment = content.new_incident_increment;
            var tmp='';
            
            if(content.buttons) {
               tmp = tmp + "<div class='d-flex'>";
               for (var i = 0; i < content.buttons.length; i++) {
                   tmp = tmp + "<button type='button' onclick='saveData("+i+")' class='btn mb-4 mr-2' style='background-color:"+content.buttons[i].background+";color:"+content.buttons[i].text+"'></span><span class='text'>"+content.buttons[i].button+"</span></button>";
               }
               tmp = tmp + "</div>"
            }
            for (var i = 0; i < content.objects.length; i++) {
                object = content.objects[i];
                tmp = tmp + "<div class='card shadow mb-4'><div class='card-header py-3'><label class='m-0 font-weight-bold text-primary'>" + object[0].title + "</label></div><div class='card-body'>";    
                for (var j = 1; j < object.length; j++) {
                    if(Object.keys(object[j])[0] == 'text_box') {
                        tmp = tmp + "<div class='form-group'><label>"+object[j].text_box+"</label><input id='incident_ob"+i.toString()+"_text"+j.toString()+"' type='text' class='form-control form-control-user' placeholder='' aria-label='Search' aria-describedby='basic-addon2' value='"+ object[j].pre_filled +"'";
                        if(content.status == 'false') {
                            tmp = tmp + " readOnly";
                        }
                        tmp = tmp + "></div>";
                    }
                    else if(Object.keys(object[j])[0] == 'check_box') {
                        tmp = tmp + "<div class='custom-control custom-checkbox small'><input type='checkbox' class='custom-control-input' id='incident_ob"+i.toString()+"_check"+j.toString()+"'";
                        if(object[j].pre_filled == 'true') {
                            tmp = tmp + "checked";
                        }
                        if(content.status == 'false') {
                            tmp = tmp + " disabled";
                        }
                        tmp = tmp + "><label class='custom-control-label' for='incident_ob"+i.toString()+"_check"+j.toString()+"'>"+object[j].check_box+"</label></div>";
                    }
                    if(Object.keys(object[j])[0] == 'drop_down') {
                        tmp = tmp + "<div class='form-group'><label>" + object[j].drop_down +"</label>";
                        tmp = tmp + "<select id='incident_ob"+i.toString()+"_dropdown"+j.toString()+"' name='dataTable_length' aria-controls='dataTable' class='custom-select form-control form-control-sm mb-4'";
                        if(content.status == 'false') {
                            tmp = tmp + " disabled";
                        }
                        tmp = tmp + ">";
                        for (var k = 0; k < object[j].pre_filled.length; k++) {
                            tmp = tmp + "<option value='"+object[j].pre_filled[k]+"'";
                            if(object[j].pre_filled_selected && object[j].pre_filled_selected == object[j].pre_filled[k]) {
                                tmp = tmp + "selected";
                            }
                            tmp = tmp + ">"+object[j].pre_filled[k]+"</option>";
                        }
                        tmp = tmp + "</select></div>";
                    }
                }
                tmp = tmp + "</div></div>";
            }   
            document.getElementById("incident-content").innerHTML = tmp;
        }
        getData(init_id);
        function changeAgencyData(agency_id) {
            document.cookie = "agency_id = " + agency_id;
            window.location.replace("overview");
        }
        function saveData(index) {
            for (var i = 0; i < formData.objects.length; i++) {
                for (var j = 0; j < formData.objects[i].length; j++) {
                    if(Object.keys(formData.objects[i][j])[0] == 'text_box') {
                        id = "incident_ob"+i.toString()+"_text"+j.toString();
                        formData.objects[i][j].pre_filled = document.getElementById(id).value;
                    }
                    if(Object.keys(formData.objects[i][j])[0] == 'drop_down') {
                        id = "incident_ob"+i.toString()+"_dropdown"+j.toString();
                        formData.objects[i][j].pre_filled_selected = document.getElementById(id).value;
                    }
                    if(Object.keys(formData.objects[i][j])[0] == 'check_box') {
                        id = "incident_ob"+i.toString()+"_check"+j.toString();
                        formData.objects[i][j].pre_filled = document.getElementById(id).checked;
                    }
                }     
            }
            if(formData.buttons) {
                formData.buttons[index].clicked = 'true';
            }
            $.ajax({
                type: "POST",
                url: "https://api.redenes.org/dev/v1/select-incident/",
                data: JSON.stringify(formData),
                dataType: "json",
                contentType:'application/json',
                success: function (res) {
                    formData = res;
                    writeData(res);
                }
            })
        }
    </script>
</body>

</html>
<?php }  ?>