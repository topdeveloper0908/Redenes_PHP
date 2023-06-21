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
                            <h1 class="h3 mb-4 text-gray-800">Integrations</h1>
                            <div class="nav-item dropdown no-arrow">
                                <button type="button" id="openModal" class='nav-link dropdown-toggle btn btn-primary btn-icon-split my-1'><span class='icon text-white-50'><i class='fas fa-plus'></i></span><span class='text'>Add Integration</span></button>
                            </div>
                        </div>
    
                        <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" name="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Type</th>
                                            <th>Name</th>
                                            <th>Active Calls</th>
                                            <th>Closed Calls</th>
                                            <th>API URL</th>
                                            <th>Enabled</th>   
                                            <th style="width: 15rem;">Edit</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Type</th>
                                            <th>Name</th>
                                            <th>Active Calls</th>
                                            <th>Closed Calls</th>
                                            <th>API URL</th>
                                            <th>Enabled</th>   
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
    <!-- End of Page Wrapper -->
    
<!-- The Modal -->
<div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <form id="createModuleForm">
                <div class="row align-items-center">
                    <div class="col-4">
                        <h6 class="ml-2 mb-0 text-right">Type</h6>
                    </div>
                    <div class="col-8">
                        <div class="d-flex align-items-center">
                            <select onchange=changeIntegrationType(event) name='integrationType' id='integrationType' aria-controls='dataTable' class='custom-select form-control-sm'>
                                <option disabled selected hidden>Choose Type</option>
                                <option value="Pulse Point">Pulse Point</option>
                                <option value="CHP">CHP</option>
                                <option value="Active Alert">Active Alert</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center my-4 d-none" id="integrationStateWrapper">
                    <div class="col-4">
                        <h6 class="ml-2 mb-0 text-right">State</h6>
                    </div>
                    <div class="col-8">
                        <div class="d-flex align-items-center">
                            <select onchange=changeIntegrationState(event) id="integrationState" name='integrationState' aria-controls='dataTable' class='custom-select form-control-sm' require>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center my-4 d-none"  id="integrationAgencyWrapper">
                    <div class="col-4">
                        <h6 class="ml-2 mb-0 text-right">Agency</h6>
                    </div>
                    <div class="col-8">
                        <div class="d-flex align-items-center">
                            <select onchange=changeIntegrationAgency(event) id="integrationAgency" name='integrationAgency' aria-controls='dataTable' class='custom-select form-control-sm' require>
                            </select>
                            <input type="text" class="form-control form-control-user d-none" id="integrationAgencyInput" placeholder="Enter Agency...">
                        </div>
                    </div>
                </div>
                <div class="row align-items-center my-4 d-none" id="integrationActiveCallWrapper">
                    <div class="col-4">
                        <h6 class="ml-2 mb-0 text-right">Active Calls</h6>
                    </div>
                    <div class="col-8">
                        <div class="d-flex align-items-center">
                            <select id="integrationActiveCall" name='integrationActiveCall' aria-controls='dataTable' class='custom-select form-control-sm' require>
                                <option value="true">True</option>
                                <option value="false">False</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center my-4 d-none"  id="integrationClosedCallWrapper">
                    <div class="col-4">
                        <h6 class="ml-2 mb-0 text-right">Closed Calls</h6>
                    </div>
                    <div class="col-8">
                        <div class="d-flex align-items-center">
                            <select id="integrationClosedCall" name='integrationClosedCall' aria-controls='dataTable' class='custom-select form-control-sm'>
                                <option value="true">True</option>
                                <option value="false">False</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mt-4 d-none" id="integrationSubmitBtnWrapper">
                    <button type="submit" id="createModuleBtn" class='nav-link btn btn-primary btn-icon-split my-1'><span class='icon text-white-50'><i class='fas fa-plus'></i></span><span class='text'>Add</span></button>
                </div>
            </form>
        </div>
    </div>
    <!-- The Modal -->

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
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    
    <script>
        var mainData;
        init_id = "<?php echo $agency_id;?>";
        function getData(agency_id) {
            $.ajax({
                type: "GET",
                url: "https://api.redenes.org/dev/v1/integrations/",
                async: false,
                data: {
                    agency_id: agency_id,
                    authorization: "<?php echo $authorization;?>"
                },
                success: function (res) {
                    var data = res.integrations;
                    writeData(data);
                    document.getElementById("my-loader-element").classList.remove("loader");                
                    document.getElementById("my-loader-wrapper").classList.add("d-none");
                }
            })
        }
        getData(init_id);
        var index = 0;
        function writeData(mainData) {
            var tmp = '';
            console.log(mainData);
            mainData.forEach(element => {
                tmp += "<tr data-id='" + element.id + "'>";
                tmp += "<td>" + element.type + "</td>";
                tmp += "<td>" + element.name + "</td>";
                tmp += "<td><div class='custom-control custom-checkbox'><input type='checkbox' class='custom-control-input' id='activeCheck" + index + "'" + (element.active_calls == "false" ? "" : "checked") + " disabled><label class='custom-control-label' for='activeCheck" + index + "'></label></div></td>";
                tmp += "<td><div class='custom-control custom-checkbox'><input type='checkbox' class='custom-control-input' id='closedCheck" + index + "'" + (element.closed_calls == "false" ? "" : "checked") + " disabled><label class='custom-control-label' for='closedCheck" + index + "'></label></div></td>";
                tmp += "<td>" + element.api_url + "</td>";
                tmp += "<td><div class='custom-control custom-checkbox'><input type='checkbox' class='custom-control-input' id='enabledCheck" + index + "'" + (element.enabled == "false" ? "" : "checked") + " disabled><label class='custom-control-label' for='enabledCheck" + index + "'></label></div></td>";
                tmp += "<td><button type='button' class='save-btn btn btn-success btn-icon-split my-1 mr-2 d-none'><span class='icon text-white-50'><i class='fas fa-check'></i></span><span class='text'>Save</span></button><button type='button' class='edit-btn btn btn-success btn-icon-split my-1 mr-2'><span class='icon text-white-50'><i class='fas fa-check'></i></span><span class='text'>Edit</span></button><button type='button' class='cancel-btn btn btn-danger btn-icon-split my-1 mr-2 d-none'><span class='icon text-white-50'><i class='fas fa-edit'></i></span><span class='text'>Cancel</span></button></td>"
                tmp += "</tr>"
                index++;
            });
            document.getElementById('table-content').innerHTML = tmp;
        }

        const editButtons = document.querySelectorAll('.edit-btn');
        const saveButtons = document.querySelectorAll('.save-btn');
        const cancelButtons = document.querySelectorAll('.cancel-btn');

        var modalType = document.getElementById('integrationType');
        var modalState = document.getElementById('integrationState');
        var modalStateWrapper = document.getElementById('integrationStateWrapper');
        var modalAgency = document.getElementById('integrationAgency');
        var modalAgencyWrapper = document.getElementById('integrationAgencyWrapper');
        var modalAgencyInput = document.getElementById('integrationAgencyInput');
        var modalActiveCall = document.getElementById('integrationActiveCall');
        var modalActiveCallWrapper = document.getElementById('integrationActiveCallWrapper');
        var modalClosedCall = document.getElementById('integrationClosedCall');
        var modalClosedCallWrapper = document.getElementById('integrationClosedCallWrapper');
        var modalBtnWrapper = document.getElementById("integrationSubmitBtnWrapper");

        var values=[false,false,false];
        editButtons.forEach(element => {
            element.addEventListener('click', function(e) {
                console.log(e);
                tdElement = e.currentTarget.parentNode;
                trElement = tdElement.parentNode;
                tdElement.querySelector('.save-btn').classList.remove('d-none');
                tdElement.querySelector('.cancel-btn').classList.remove('d-none');
                e.currentTarget.classList.add('d-none');
                checkboxs = trElement.querySelectorAll('.custom-control-input');
                i = 0;
                checkboxs.forEach(element => {
                    element.removeAttribute('disabled');
                    values[i] = element.value;
                    i++;
                });
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
                checkboxs = trElement.querySelectorAll('.custom-control-input')
                checkboxs.forEach(element => {
                    element.setAttribute('disabled', true);
                });
                editButtons.forEach(element => {
                    element.removeAttribute('disabled');
                });
                checkboxs[0].checked = values[0];
                checkboxs[1].checked = values[1];
                checkboxs[2].checked = values[2];
            });
        });
        saveButtons.forEach(element => {
            element.addEventListener('click', function(e) {
                tdElement = e.currentTarget.parentNode;
                trElement = tdElement.parentNode;
                
                tdElement.querySelector('.cancel-btn').classList.add('d-none');
                tdElement.querySelector('.edit-btn').classList.remove('d-none');
                e.currentTarget.classList.add('d-none');

                checkboxs = trElement.querySelectorAll('.custom-control-input');

                editButtons.forEach(element => {
                    element.removeAttribute('disabled');
                });
                var authorization = "<?php echo $authorization;?>";
                var formData = {
                    authorization: authorization.toString(),
                    agency_id: init_id.toString(),
                    id: trElement.getAttribute('data-id'),
                    active_call: checkboxs[0].checked,
                    closed_call: checkboxs[1].checked,
                    enabled: checkboxs[2].checked
                }
                console.log(formData);
                document.getElementById("my-loader-element").classList.add("loader");                
                $.ajax({
                    type: "POST",
                    url: "https://api.redenes.org/dev/v1/integrations/",
                    data: JSON.stringify(formData),
                    dataType: "json",
                    contentType:'application/json',
                    success: function (res) {
                        writeData(res.integrations);
                        // To hide the loader
                        document.getElementById("my-loader-element").classList.remove("loader");                
                        document.getElementById("my-loader-wrapper").classList.add("d-none");
                    }
                })

                checkboxs = trElement.querySelectorAll('.custom-control-input')
                checkboxs.forEach(element => {
                    element.setAttribute('disabled', true);
                });
            });
        });
        var modal = document.getElementById("myModal");
        // Get the button that opens the modal
        var modalBtn = document.getElementById("openModal");
        // Get the <span> element that closes the modal
        var closeBtn = document.getElementsByClassName("close")[0];
        modalBtn.onclick = function() {
            modal.style.display = "block";
            document.getElementById("my-loader-element").classList.add("loader");                
            var authorization = "<?php echo $authorization;?>";
            $.ajax({
                type: "GET",
                url: "https://api.redenes.org/dev/v1/integrations?authorization="+authorization.toString()+"&type=Pulse Point",
                dataType: "json",
                contentType:'application/json',
                success: function (res) {
                    tmp = '';
                    if(res.states) {
                        res.states.forEach(element => {
                            tmp += "<option value='" + element + "'>" + element + "</option>";
                        });
                        document.getElementById("integrationState").innerHTML = tmp;                
                    }
                    $.ajax({
                        type: "GET",
                        url: "https://api.redenes.org/dev/v1/integrations?authorization="+authorization.toString()+"&type=Pulse Point&state="+res.states[0],
                        dataType: "json",
                        contentType:'application/json',
                        success: function (response) {
                            tmp = '';
                            if(response.agencies) {
                                response.agencies.forEach(element => {
                                    tmp += "<option value='" + element + "'>" + element + "</option>";
                                });
                                document.getElementById("integrationAgency").innerHTML = tmp;                
                            }
                            // To hide the loader
                            document.getElementById("my-loader-element").classList.remove("loader");                
                            document.getElementById("my-loader-wrapper").classList.add("d-none");
                        }
                    })
                    // To hide the loader
                    document.getElementById("my-loader-element").classList.remove("loader");                
                    document.getElementById("my-loader-wrapper").classList.add("d-none");
                }
            })
        }
        closeBtn.onclick = function() {
            modal.style.display = "none";
            clearModal();
        }
        function clearModal() {
            document.getElementById('createModuleForm').innerHTML = "<div class='row align-items-center'><div class='col-4'><h6 class='ml-2 mb-0 text-right'>Type</h6></div><div class='col-8'><div class='d-flex align-items-center'><select onchange=changeIntegrationType(event) name='integrationType' id='integrationType' aria-controls='dataTable' class='custom-select form-control-sm'><option disabled selected hidden>Choose Type</option><option value='Pulse Point'>Pulse Point</option><option value='CHP'>CHP</option><option value='Active Alert'>Active Alert</option></select></div></div></div><div class='row align-items-center my-4 d-none' id='integrationStateWrapper'><div class='col-4'><h6 class='ml-2 mb-0 text-right'>State</h6></div><div class='col-8'><div class='d-flex align-items-center'><select onchange=changeIntegrationState(event) id='integrationState' name='integrationState' aria-controls='dataTable' class='custom-select form-control-sm' require></select></div></div></div><div class='row align-items-center my-4 d-none' id='integrationAgencyWrapper'><div class='col-4'><h6 class='ml-2 mb-0 text-right'>Agency</h6></div><div class='col-8'><div class='d-flex align-items-center'><select onchange=changeIntegrationAgency(event) id='integrationAgency' name='integrationAgency' aria-controls='dataTable' class='custom-select form-control-sm' require></select><input type='text' class='form-control form-control-user d-none' id='integrationAgencyInput' placeholder='Enter Agency...'></div></div></div><div class='row align-items-center my-4 d-none' id='integrationActiveCallWrapper'><div class='col-4'><h6 class='ml-2 mb-0 text-right'>Active Calls</h6></div><div class='col-8'><div class='d-flex align-items-center'><select id='integrationActiveCall' name='integrationActiveCall' aria-controls='dataTable' class='custom-select form-control-sm' require><option value='true'>True</option><option value='false'>False</option></select></div></div></div><div class='row align-items-center my-4 d-none' id='integrationClosedCallWrapper'><div class='col-4'><h6 class='ml-2 mb-0 text-right'>Closed Calls</h6></div><div class='col-8'><div class='d-flex align-items-center'><select id='integrationClosedCall' name='integrationClosedCall' aria-controls='dataTable' class='custom-select form-control-sm'><option value='true'>True</option><option value='false'>False</option></select></div></div></div><div class='row justify-content-center mt-4 d-none' id='integrationSubmitBtnWrapper'><button type='submit' id='createModuleBtn' class='nav-link btn btn-primary btn-icon-split my-1'><span class='icon text-white-50'><i class='fas fa-plus'></i></span><span class='text'>Add</span></button></div>";
            modalType = document.getElementById('integrationType');
            modalState = document.getElementById('integrationState');
            modalStateWrapper = document.getElementById('integrationStateWrapper');
            modalAgency = document.getElementById('integrationAgency');
            modalAgencyWrapper = document.getElementById('integrationAgencyWrapper');
            modalAgencyInput = document.getElementById('integrationAgencyInput');
            modalActiveCall = document.getElementById('integrationActiveCall');
            modalActiveCallWrapper = document.getElementById('integrationActiveCallWrapper');
            modalClosedCall = document.getElementById('integrationClosedCall');
            modalClosedCallWrapper = document.getElementById('integrationClosedCallWrapper');
            modalBtnWrapper = document.getElementById("integrationSubmitBtnWrapper");
        }
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = 'none';
                clearModal();
            }
        }
        function changeIntegrationType(e) {
            value = e.currentTarget.value;
            document.getElementById("my-loader-element").classList.add("loader");                
            var authorization = "<?php echo $authorization;?>";
            document.getElementById("integrationAgency").innerHTML = '';                
            document.getElementById("integrationState").innerHTML = ''; 
            if(value != 'Active Alert') {
                $.ajax({
                    type: "GET",
                    url: "https://api.redenes.org/dev/v1/integrations?authorization="+authorization.toString()+"&type="+value,
                    dataType: "json",
                    contentType:'application/json',
                    success: function (res) {
                        console.log(res);
                        if(modalAgency.classList.value.indexOf('d-none') == -1) {
                            modalAgency.classList.add('d-none');
                        }
                        if(modalAgencyInput.classList.value.indexOf('d-none') == -1) {
                            modalAgencyInput.classList.add('d-none');
                        }
                        if(modalActiveCallWrapper.classList.value.indexOf('d-none') == -1) {
                            modalActiveCallWrapper.classList.add('d-none');
                        }
                        if(modalClosedCallWrapper.classList.value.indexOf('d-none') == -1) {
                            modalClosedCallWrapper.classList.add('d-none');
                        }
                        if(modalBtnWrapper.classList.value.indexOf('d-none') == -1) {
                            modalBtnWrapper.classList.add('d-none');
                        }
                        if(res.agencies) {
                            tmp = '<option disabled selected hidden>Choose Agency</option>';
                            if(modalStateWrapper.classList.value.indexOf('d-none') == -1) {
                                modalStateWrapper.classList.add('d-none');
                            }
                            modalAgencyWrapper.classList.remove('d-none');
                            modalAgency.classList.remove('d-none');
                            res.agencies.forEach(element => {
                                tmp += "<option value='" + element + "'>" + element + "</option>";
                            });
                            document.getElementById("integrationAgency").innerHTML = tmp;                
                        }
                        else if(res.states) {
                            tmp = '<option disabled selected hidden>Choose State</option>';
                            if(modalStateWrapper.classList.value.indexOf('d-none') > -1) {
                                modalStateWrapper.classList.remove('d-none')
                            }
                            if(modalAgencyWrapper.classList.value.indexOf('d-none') == -1) {
                                modalAgencyWrapper.classList.add('d-none')
                            }
                            res.states.forEach(element => {
                                tmp += "<option value='" + element + "'>" + element + "</option>";
                            });
                            modalState.innerHTML = tmp;                
                        }
                        // To hide the loader
                        document.getElementById("my-loader-element").classList.remove("loader");                
                        document.getElementById("my-loader-wrapper").classList.add("d-none");
                    }
                })
            }
            else {
                modalAgencyWrapper.classList.remove('d-none');
                if(modalAgency.classList.value.indexOf('d-none') == -1) {
                    modalAgency.classList.add('d-none')
                }
                if(modalStateWrapper.classList.value.indexOf('d-none') == -1) {
                    modalStateWrapper.classList.add('d-none')
                }
                modalAgencyInput.classList.remove('d-none');
                modalActiveCallWrapper.classList.remove("d-none");                
                modalClosedCallWrapper.classList.remove("d-none");                
                modalBtnWrapper.classList.remove("d-none");                
                // To hide the loader
                document.getElementById("my-loader-element").classList.remove("loader");                
                document.getElementById("my-loader-wrapper").classList.add("d-none");
            }
        }
        function changeIntegrationState(e) {
            document.getElementById("my-loader-element").classList.add("loader");                
            var authorization = "<?php echo $authorization;?>";
            $.ajax({
                type: "GET",
                url: "https://api.redenes.org/dev/v1/integrations?authorization="+authorization.toString()+"&type=Pulse Point&state="+e.currentTarget.value,
                dataType: "json",
                contentType:'application/json',
                success: function (res) {
                    console.log(res);
                    if(modalActiveCallWrapper.classList.value.indexOf('d-none') == -1) {
                        modalActiveCallWrapper.classList.add('d-none');
                    }
                    if(modalClosedCallWrapper.classList.value.indexOf('d-none') == -1) {
                        modalClosedCallWrapper.classList.add('d-none');
                    }
                    if(modalBtnWrapper.classList.value.indexOf('d-none') == -1) {
                        modalBtnWrapper.classList.add('d-none');
                    }
                    tmp = '<option disabled selected hidden>Choose Agency</option>';    
                    modalAgencyWrapper.classList.remove('d-none');
                    modalAgency.classList.remove('d-none');
                    if(res.agencies) {
                        res.agencies.forEach(element => {
                            tmp += "<option value='" + element + "'>" + element + "</option>";
                        });
                        modalAgency.innerHTML = tmp;                
                    }
                    // To hide the loader
                    document.getElementById("my-loader-element").classList.remove("loader");                
                    document.getElementById("my-loader-wrapper").classList.add("d-none");
                }
            })
        }
        function changeIntegrationAgency(e) {
            modalActiveCallWrapper.classList.remove("d-none");                
            modalClosedCallWrapper.classList.remove("d-none");                
            modalBtnWrapper.classList.remove("d-none");                
        }
        $('#createModuleForm').submit(function(e) {
            document.getElementById("my-loader-element").classList.add("loader");
            e.preventDefault();
            var authorization = "<?php echo $authorization; ?>";
            var formData = {
                authorization: authorization.toString(),
                type: modalType.value,
                agency: modalAgency.value,
                active_calls: modalActiveCall.value,
                closed_calls: modalClosedCall.value
            }
            if(modalAgencyInput.classList.value.indexOf('d-none') == -1) {
                if(modalAgencyInput.value == '') {
                    window.alert('Input the Agency');
                    document.getElementById("my-loader-element").classList.remove("loader");
                    document.getElementById("my-loader-wrapper").classList.add("d-none");
                    return;
                }
                formData.agency = modalAgencyInput.value;
            }
            if(modalStateWrapper.classList.value.indexOf('d-none') == -1) {
                formData.state = modalState.value;
            }
            $.ajax({
                type: "POST",
                url: "https://api.redenes.org/dev/v1/integrations/",
                data: JSON.stringify(formData),
                dataType: "json",
                contentType: 'application/json',
                success: function(res) {
                    writeData(res.integrations);
                    modal.style.display = "none";
                    document.getElementById('integrationState').innerHTML = '';
                    document.getElementById('integrationAgency').innerHTML = '';
                    document.getElementById('integrationActiveCall').value = 'true';
                    document.getElementById('integrationClosedCall').value = 'true';
                    document.getElementById("my-loader-element").classList.remove("loader");
                    document.getElementById("my-loader-wrapper").classList.add("d-none");
                    clearModal();
                }
            })
        })

    </script>
    
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>