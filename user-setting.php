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
                            <h1 class="h3 mb-4 text-gray-800">User Settings</h1>
                            <div>
                                <button id="edit-btn" type="button" onClick="saveEnable()" class="btn btn-success btn-icon-split my-1 mr-2">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-check"></i>
                                    </span>
                                    <span class="text">Edit</span>
                                </button>
                                <button id="save-btn" type="button" onClick="saveData()" class="btn btn-success btn-icon-split my-1 mr-2 d-none">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-check"></i>
                                    </span>
                                    <span class="text">Save</span>
                                </button>
                                <button id="cancel-btn" type="button" onClick="cancelSave()" class="btn btn-danger btn-icon-split my-1 mr-2 d-none">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-edit"></i>
                                    </span>
                                    <span class="text">Cancel</span>
                                </button>
                            </div>
                        </div>
    
                        <!-- Content Row -->
                        <div class="row row-cols-xl-4 row-cols-lg-3 row-cols-sm-2 row-cols-1">
    
                            <div class="px-2">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Agency Register ID</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small pl-0">
                                                <label>Agency Register ID</label>
                                                <input type="text" class="form-control form-control-user"
                                                    id="registerID" aria-describedby="emailHelp"
                                                    placeholder="Enter Register ID..." readOnly>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Auto Add Email Domain</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group d-flex align-items-end">
                                            <h6 class="m-0 mb-2">User@</h6>
                                            <div class="custom-control custom-checkbox small flex-grow-1">
                                                <label>Email Domain</label>
                                                <input type="text" class="form-control form-control-user"
                                                    id="emailDomain" aria-describedby="emailHelp"
                                                    placeholder="Enter Email Domain..." readOnly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h6 class="m-0 mt-4 mb-2">Auto Add User to Rank</h6>
                                            <div class="custom-control custom-checkbox small flex-grow-1 pl-0">
                                                <select id="userRankDropdown" name='dataTable_length' aria-controls='dataTable' class='custom-select form-control form-control-sm' disabled></select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h6 class="m-0 mt-4 mb-2">Auto Add User to Group</h6>
                                            <div class="custom-control custom-checkbox small flex-grow-1 pl-0">
                                                <select id="userGroupDropdown" name='dataTable_length' aria-controls='dataTable' class='custom-select form-control form-control-sm' disabled></select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h6 class="m-0 mt-4 mb-2">Auto Add User to Status</h6>
                                            <div class="custom-control custom-checkbox small flex-grow-1 pl-0">
                                                <select id="userStatusDropdown" name='dataTable_length' aria-controls='dataTable' class='custom-select form-control form-control-sm' disabled></select>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="px-2">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">User Ranks</h6>
                                    </div>
                                    <div class="card-body">
                                        <div id="userRanksGroup">
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox small">
                                                    <input type="checkbox" class="custom-control-input" id="Operation LeaderCheck" onchange="addRankToList(event)" disabled>
                                                    <label class="custom-control-label" for="Operation LeaderCheck">Opeartions Leader</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox small">
                                                    <input type="checkbox" class="custom-control-input" id="CaptainCheck" onchange="addRankToList(event)" disabled>
                                                    <label class="custom-control-label" for="CaptainCheck">Captain</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox small">
                                                    <input type="checkbox" class="custom-control-input" id="OfficerCheck" onchange="addRankToList(event)" disabled>
                                                    <label class="custom-control-label" for="OfficerCheck">Officer</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small pl-0">
                                                <label>Custom</label>
                                                <div class="d-flex">
                                                    <input type="text" class="form-control form-control-user"
                                                        id="userRanks" aria-describedby="emailHelp"
                                                        placeholder="Enter User Rank..." readOnly>
                                                    <button type="button" onClick="addRank()" class="btn btn-success btn-icon-split mx-2" style="min-width: 5.5rem">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-plus"></i>
                                                        </span>
                                                        <span class="text">Add</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="px-2">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">User Groups</h6>
                                    </div>
                                    <div class="card-body">
                                        <div id="userGroupWrapper">
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox small">
                                                    <input type="checkbox" class="custom-control-input" id="Full MemberCheck" onchange="addGroupToList(event)" disabled>
                                                    <label class="custom-control-label" for="Full MemberCheck">Full Member</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox small">
                                                    <input type="checkbox" class="custom-control-input" id="Support MemberCheck" onchange="addGroupToList(event)" disabled>
                                                    <label class="custom-control-label" for="Support MemberCheck">Support Member</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox small">
                                                    <input type="checkbox" class="custom-control-input" id="SpouceCheck" onchange="addGroupToList(event)" disabled>
                                                    <label class="custom-control-label" for="SpouceCheck">Spouce</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox small">
                                                    <input type="checkbox" class="custom-control-input" id="ApplicantCheck"  onchange="addGroupToList(event)" disabled>
                                                    <label class="custom-control-label" for="ApplicantCheck">Applicant</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small pl-0">
                                                <label>Custom</label>
                                                <div class="d-flex">
                                                    <input type="text" class="form-control form-control-user"
                                                        id="userGroup" aria-describedby="emailHelp"
                                                        placeholder="Enter User Group..." readOnly>
                                                    <button type="button" onClick="addGroup()" class="btn btn-success btn-icon-split mx-2" style="min-width: 5.5rem">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-plus"></i>
                                                        </span>
                                                        <span class="text">Add</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="px-2">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">User Status</h6>
                                    </div>
                                    <div class="card-body">
                                        <div id="userStatusWrapper">
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox small">
                                                    <input type="checkbox" class="custom-control-input" id="AvaiableCheck" onchange="addStatusToList(event)" disabled>
                                                    <label class="custom-control-label" for="AvaiableCheck">Avaiable</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox small">
                                                    <input type="checkbox" class="custom-control-input" id="On CallCheck" onchange="addStatusToList(event)" disabled>
                                                    <label class="custom-control-label" for="On CallCheck">On Call</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox small">
                                                    <input type="checkbox" class="custom-control-input" id="Off CallCheck" onchange="addStatusToList(event)" disabled>
                                                    <label class="custom-control-label" for="Off CallCheck">Off Call</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox small">
                                                    <input type="checkbox" class="custom-control-input" id="On DutyCheck" onchange="addStatusToList(event)" disabled>
                                                    <label class="custom-control-label" for="On DutyCheck">On Duty</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox small">
                                                    <input type="checkbox" class="custom-control-input" id="Off DutyCheck" onchange="addStatusToList(event)" disabled>
                                                    <label class="custom-control-label" for="Off DutyCheck">Off Duty</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small pl-0">
                                                <label>Custom</label>
                                                <div class="d-flex">
                                                    <input type="text" class="form-control form-control-user"
                                                        id="userStatus" aria-describedby="emailHelp"
                                                        placeholder="Enter User Status..." readOnly>
                                                    <button type="button" onClick="addStatus()" class="btn btn-success btn-icon-split mx-2" style="min-width: 5.5rem">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-plus"></i>
                                                        </span>
                                                        <span class="text">Add</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script>
        // To show the loader
        document.getElementById("my-loader-element").classList.add("loader");
        var user_setting_info;
        init_id = "<?php echo $agency_id;?>";
        function getData(agency_id) {
            $.ajax({
                type: "GET",
                url: "https://api.redenes.org/dev/v1/agency-user-settings/",
                data: {
                    agency_id: agency_id,
                    authorization: "<?php echo $authorization;?>"
                },
                success: function (res) {
                    user_setting_info = res.agencies_user_settings[0];
                    writeData();
                    // To hide the loader
                    document.getElementById("my-loader-element").classList.remove("loader");                
                    document.getElementById("my-loader-wrapper").classList.add("d-none");
                }
            })
        }
        getData(init_id);
        function saveData() {
            var authorization = "<?php echo $authorization;?>";
            var formData = {
                authorization: authorization.toString(),
                agency_id: init_id,
                agency_user_settings: [
                    {
                        auto_add_email_domain: document.getElementById('emailDomain').value,
                        user_status: [],
                        user_rank: [],
                        user_groups: []
                    }
                ]
            };
            elements = $('#userStatusWrapper').children();
            var tmp = {};
            for (let index = 0; index < elements.length; index++) {
                const element = $(elements[index]).find('.custom-control-input');
                tmp[element[0].id.slice(0, -5)] = element[0].checked;
            }
            formData.agency_user_settings.user_status = [tmp];
            elements = $('#userGroupWrapper').children();
            tmp = {}
            for (let index = 0; index < elements.length; index++) {
                const element = $(elements[index]).find('.custom-control-input');
                tmp[element[0].id.slice(0, -5)] = element[0].checked;
            }
            formData.agency_user_settings.user_groups = [tmp];
            elements = $('#userRanksGroup').children();
            tmp = {}
            for (let index = 0; index < elements.length; index++) {
                const element = $(elements[index]).find('.custom-control-input');
                tmp[element[0].id.slice(0, -5)] = element[0].checked;
            }
            formData.agency_user_settings.user_rank = [tmp];
            $.ajax({
                type: "POST",
                url: "https://api.redenes.org/dev/v1/agency-module-settings/",
                data: JSON.stringify(formData),
                dataType: "json",
                contentType:'application/json',
                success: function (res) {           
                    document.getElementById("edit-btn").classList.remove("d-none");
                    document.getElementById("save-btn").classList.add("d-none");
                    document.getElementById("cancel-btn").classList.add("d-none");
                    var inputs = document.querySelectorAll('.custom-control-input');
                    inputs.forEach(element => {
                        element.setAttribute("disabled", true);
                    });
                    var inputs = document.querySelectorAll('.form-control');
                    inputs.forEach(element => {
                        element.setAttribute("readOnly", true);
                    });
                }
            })
        }
        function saveEnable() {
            var checks = document.querySelectorAll('.custom-control-input');
            checks.forEach(element => {
                element.removeAttribute("disabled");
            });
            var inputs = document.querySelectorAll('.form-control');
            inputs.forEach(element => {
                element.removeAttribute("readOnly");
            });
            var selects = document.querySelectorAll('.custom-select');
            selects.forEach(element => {
                element.removeAttribute("disabled");
            });
            document.getElementById("registerID").setAttribute("readOnly", true);
            document.getElementById("edit-btn").classList.add("d-none");
            document.getElementById("save-btn").classList.remove("d-none");
            document.getElementById("cancel-btn").classList.remove("d-none");
        }
        function cancelSave() {
            writeData();
            var inputs = document.querySelectorAll('.custom-control-input');
            inputs.forEach(element => {
                element.setAttribute("disabled", true);
            });
            var inputs = document.querySelectorAll('.form-control');
            inputs.forEach(element => {
                element.setAttribute("readOnly", true);
            });
            document.getElementById("edit-btn").classList.remove("d-none");
            document.getElementById("save-btn").classList.add("d-none");
            document.getElementById("cancel-btn").classList.add("d-none");
        }
        function writeData() {
            document.getElementById('registerID').value = init_id;
            if(user_setting_info.auto_add_email_domain) {
                document.getElementById('emailDomain').value = user_setting_info.auto_add_email_domain;
            }
            document.getElementById('AvaiableCheck').checked = user_setting_info.user_status[0]['Available'] == 'true'?true:false;
            document.getElementById('On CallCheck').checked = user_setting_info.user_status[0]['On Call'] == 'true'?true:false;
            document.getElementById('Off CallCheck').checked = user_setting_info.user_status[0]['Off call'] == 'true'?true:false;
            document.getElementById('On DutyCheck').checked = user_setting_info.user_status[0]['On Duty'] == 'true'?true:false;
            document.getElementById('Off DutyCheck').checked = user_setting_info.user_status[0]['Off Duty'] == 'true'?true:false;
            writeUserStatus(user_setting_info.user_status[0], 'read');

            document.getElementById('Operation LeaderCheck').checked = user_setting_info.user_rank[0]['Operations Leader'] == 'true'?true:false;
            document.getElementById('CaptainCheck').checked = user_setting_info.user_rank[0]['Captain'] == 'true'?true:false;
            document.getElementById('OfficerCheck').checked = user_setting_info.user_rank[0]['Officer'] == 'true'?true:false;
            writeUserRank(user_setting_info.user_rank[0], 'read');

            document.getElementById('Full MemberCheck').checked = user_setting_info.user_groups[0]['Full Member'] == 'true'?true:false;
            document.getElementById('Support MemberCheck').checked = user_setting_info.user_groups[0]['Support Member Leader'] == 'true'?true:false;
            document.getElementById('SpouceCheck').checked = user_setting_info.user_groups[0]['Spouce'] == 'true'?true:false;
            document.getElementById('ApplicantCheck').checked = user_setting_info.user_groups[0]['Applicant'] == 'true'?true:false;
            writeUserGroup(user_setting_info.user_groups[0], 'read');
        }
        function writeUserRank(data, method) {
            var tmp = '';
            if(method == 'read') {
                Object.keys(data).forEach(key => {
                    if(data[key] == 'true') {
                        tmp += "<option value='"+ key +"'>"+key+"</option>";
                    }
                });
            }
            document.getElementById('userRankDropdown').innerHTML = tmp;
        }
        function addRank() {
            var tmp;
            var value = document.getElementById('userRanks').value;
            if( value == '' ) {
                window.alert('Empty value should not be added')
            }
            else {
                group = document.getElementById('userRanksGroup');
                inputs = $(group).find('.custom-control-input');
                status = false;
                for (let index = 0; index < inputs.length; index++) {
                    const element = inputs[index];  
                    if(element.id == value+'Check') {
                        status = true;
                    }
                }
                if(status == true) {
                    window.alert('The same name is exist')
                }
                else {
                    group = document.getElementById('userRanksGroup');
                    inputs = $(group).find('.custom-control-input');
                    tmp = document.getElementById('userRanksGroup').innerHTML;
                    tmp += "<div class='form-group'><div class='custom-control custom-checkbox small'><input type='checkbox' class='custom-control-input' onchange='addRankToList(event)' id='"+value+"Check'";
                    if(!document.getElementById("edit-btn").classList.contains("d-none"))
                        tmp += " disabled";
                    tmp += "><label class='custom-control-label' for='"+value+"Check'>"+value+"</label></div></div>";
                    document.getElementById('userRanksGroup').innerHTML = tmp;
                    inputs1 = $(group).find('.custom-control-input');
                    for (let index = 0; index < inputs1.length-1; index++) {
                        inputs1[index].checked = inputs[index].checked;  
                    }
                }
            }
        }
        function addRankToList(e) {
            var tmp = '';
            group = document.getElementById('userRanksGroup');
            inputs = $(group).find('.custom-control-input');
            for (let index = 0; index < inputs.length; index++) {
                if(inputs[index].checked == true) {
                    let str = inputs[index].id;
                    str = str.substring(0, str.length - 5);
                    tmp += "<option value='"+ str +"'>"+str+"</option>";
                }   
            }
            document.getElementById('userRankDropdown').innerHTML = tmp;
        }
        function writeUserGroup(data, method) {
            var tmp = '';
            if(method == 'read') {
                Object.keys(data).forEach(key => {
                    if(data[key] == 'true') {
                        tmp += "<option value='"+ key +"'>"+key+"</option>";
                    }
                });
            }
            document.getElementById('userGroupDropdown').innerHTML = tmp;
        }
        function addGroup() {
            var tmp;
            var value = document.getElementById('userGroup').value;
            if( value == '' ) {
                window.alert('Empty value should not be added')
            }
            else {
                group = document.getElementById('userGroupWrapper');
                inputs = $(group).find('.custom-control-input');
                status = false;
                for (let index = 0; index < inputs.length; index++) {
                    const element = inputs[index];  
                    if(element.id == value+'Check') {
                        status = true;
                    }
                }
                if(status == true) {
                    window.alert('The same name is exist')
                }
                else {
                    group = document.getElementById('userGroupWrapper');
                    inputs = $(group).find('.custom-control-input');
                    tmp = document.getElementById('userGroupWrapper').innerHTML;
                    tmp += "<div class='form-group'><div class='custom-control custom-checkbox small'><input type='checkbox' class='custom-control-input' onchange='addGroupToList(event)' id='"+value+"Check'";
                    if(!document.getElementById("edit-btn").classList.contains("d-none"))
                        tmp += " disabled";
                    tmp += "><label class='custom-control-label' for='"+value+"Check'>"+value+"</label></div></div>";
                    document.getElementById('userGroupWrapper').innerHTML = tmp;
                    inputs1 = $(group).find('.custom-control-input');
                    for (let index = 0; index < inputs1.length-1; index++) {
                        inputs1[index].checked = inputs[index].checked;  
                    }
                }
            }
        }
        function addGroupToList(e) {
            var tmp = '';
            group = document.getElementById('userGroupWrapper');
            inputs = $(group).find('.custom-control-input');
            for (let index = 0; index < inputs.length; index++) {
                if(inputs[index].checked == true) {
                    let str = inputs[index].id;
                    str = str.substring(0, str.length - 5);
                    tmp += "<option value='"+ str +"'>"+str+"</option>";
                }   
            }
            document.getElementById('userGroupDropdown').innerHTML = tmp;
        }
        function writeUserStatus(data, method) {
            var tmp = '';
            if(method == 'read') {
                Object.keys(data).forEach(key => {
                    if(data[key] == 'true') {
                        tmp += "<option value='"+ key +"'>"+key+"</option>";
                    }
                });
            }
            document.getElementById('userStatusDropdown').innerHTML = tmp;
        }
        function addStatus() {
            var tmp;
            var value = document.getElementById('userStatus').value;
            if( value == '' ) {
                window.alert('Empty value should not be added')
            }
            else {
                group = document.getElementById('userStatusWrapper');
                inputs = $(group).find('.custom-control-input');
                status = false;
                for (let index = 0; index < inputs.length; index++) {
                    const element = inputs[index];  
                    if(element.id == value+'Check') {
                        status = true;
                    }
                }
                if(status == true) {
                    window.alert('The same name is exist')
                }
                else {
                    group = document.getElementById('userStatusWrapper');
                    inputs = $(group).find('.custom-control-input');
                    tmp = document.getElementById('userStatusWrapper').innerHTML;
                    tmp += "<div class='form-group'><div class='custom-control custom-checkbox small'><input type='checkbox' class='custom-control-input' onchange='addStatusToList(event)' id='"+value+"Check'";
                    if(!document.getElementById("edit-btn").classList.contains("d-none"))
                        tmp += " disabled";
                    tmp += "><label class='custom-control-label' for='"+value+"Check'>"+value+"</label></div></div>";
                    document.getElementById('userStatusWrapper').innerHTML = tmp;
                    inputs1 = $(group).find('.custom-control-input');
                    for (let index = 0; index < inputs1.length-1; index++) {
                        inputs1[index].checked = inputs[index].checked;  
                    }
                }
            }
        }
        function addStatusToList(e) {
            var tmp = '';
            group = document.getElementById('userStatusWrapper');
            inputs = $(group).find('.custom-control-input');
            for (let index = 0; index < inputs.length; index++) {
                if(inputs[index].checked == true) {
                    let str = inputs[index].id;
                    str = str.substring(0, str.length - 5);
                    tmp += "<option value='"+ str +"'>"+str+"</option>";
                }   
            }
            document.getElementById('userStatusDropdown').innerHTML = tmp;
        }
    </script>
</body>

</html>
