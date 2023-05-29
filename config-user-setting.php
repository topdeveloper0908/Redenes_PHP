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
                                        <h6 class="m-0 font-weight-bold text-primary">Agency Type</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small pl-0">
                                                <label>Agency Type</label>
                                                <select onchange="changeUser(event)" name='agency-type' id='agency-type' aria-controls='dataTable' class='custom-select form-control-sm'>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Auto Add Email Domain</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <h6 class="m-0 mt-4 mb-2">Auto Add User to Rank</h6>
                                            <div class="custom-control custom-checkbox small flex-grow-1 pl-0">
                                                <select id="userRankDropdown" name='dataTable_length' aria-controls='dataTable' class='custom-select form-control-sm' disabled></select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h6 class="m-0 mt-4 mb-2">Auto Add User to Group</h6>
                                            <div class="custom-control custom-checkbox small flex-grow-1 pl-0">
                                                <select id="userGroupDropdown" name='dataTable_length' aria-controls='dataTable' class='custom-select form-control-sm' disabled></select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h6 class="m-0 mt-4 mb-2">Auto Add User to Status</h6>
                                            <div class="custom-control custom-checkbox small flex-grow-1 pl-0">
                                                <select id="userStatusDropdown" name='dataTable_length' aria-controls='dataTable' class='custom-select form-control-sm' disabled></select>
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
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small pl-0">
                                                <label>Custom</label>
                                                <div class="d-flex">
                                                    <input type="text" class="form-control form-control-user" id="userRanks" aria-describedby="emailHelp" placeholder="Enter User Rank..." readOnly>
                                                    <button type="button" onClick="addUserRank()" class="btn btn-success btn-icon-split mx-2 add-button" style="min-width: 5.5rem" disabled>
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
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small pl-0">
                                                <label>Custom</label>
                                                <div class="d-flex">
                                                    <input type="text" class="form-control form-control-user" id="userGroup" aria-describedby="emailHelp" placeholder="Enter User Group..." readOnly>
                                                    <button type="button" onClick="addUserGroup()" class="btn btn-success btn-icon-split mx-2 add-button" style="min-width: 5.5rem" disabled>
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
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small pl-0">
                                                <label>Custom</label>
                                                <div class="d-flex">
                                                    <input type="text" class="form-control form-control-user" id="userStatus" aria-describedby="emailHelp" placeholder="Enter User Status..." readOnly>
                                                    <button type="button" onClick="addUserStatus()" class="btn btn-success btn-icon-split mx-2 add-button" style="min-width: 5.5rem" disabled>
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
        var user_setting_info_2;
        var selected_user;
        init_id = "<?php echo $agency_id; ?>";

        function getData(agency_id) {
            $.ajax({
                type: "GET",
                url: "https://api.redenes.org/dev/v1/system-config-users-settings/",
                data: {
                    agency_id: agency_id,
                    authorization: "<?php echo $authorization; ?>"
                },
                success: function(res) {
                    user_setting_info = res.agency_types[0];
                    for (const key in user_setting_info) {
                        selected_user = key;
                        writeData(selected_user);
                        break;
                    }
                    // To hide the loader
                    document.getElementById("my-loader-element").classList.remove("loader");
                    document.getElementById("my-loader-wrapper").classList.add("d-none");
                }
            })
        }
        getData(init_id);

        function writeData(user) {
            tmp = '';
            for (let key in user_setting_info) {
                tmp += "<option value='" + key + "'";
                if (user == key) {
                    tmp += " selected";
                }
                tmp += ">" + key + "</option>";
            }
            document.getElementById('agency-type').innerHTML = tmp;
            // Write Agency Type
            data = user_setting_info[user][0];
            ranks = data.user_ranks[0];
            tmp = '';
            for (const key in ranks) {
                tmp += "<div class='form-group'><div class='custom-control custom-checkbox small'><input type='checkbox' class='custom-control-input";
                if (ranks[key] != 'disabled') {
                    tmp += " editable-check 'onchange='addRankToList(event)'";
                }
                tmp += " id='" + key + "Check'";
                if (!document.getElementById("edit-btn").classList.contains("d-none") || ranks[key] == 'disabled')
                    tmp += " disabled";
                if (ranks[key] == 'true' || ranks[key] == 'disabled') {
                    tmp += " checked";
                }
                tmp += "><label class='custom-control-label' for='" + key + "Check'>" + key + `</label></div>`;
                if (ranks[key] != 'disabled') {
                    tmp += `<a onclick=removeUserRank(event) data-value='${key}' class='delete-link disabled' href='#'><i class='fas fa-trash text-danger'></i></a>`
                }
                tmp += `</div>`;
            }
            document.getElementById('userRanksGroup').innerHTML = tmp;
            writeUserRank(ranks, 'read');

            groups = data.user_groups[0];
            tmp = '';
            for (const key in groups) {
                tmp += "<div class='form-group'><div class='custom-control custom-checkbox small'><input type='checkbox' class='custom-control-input";
                if (groups[key] != 'disabled') {
                    tmp += " editable-check ' onchange='addGroupToList(event)'";
                }
                tmp += " id='" + key + "Check'";
                if (!document.getElementById("edit-btn").classList.contains("d-none") || groups[key] == 'disabled')
                    tmp += " disabled";
                if (groups[key] == 'true' || groups[key] == 'disabled') {
                    tmp += " checked";
                }
                tmp += "><label class='custom-control-label' for='" + key + "Check'>" + key + "</label></div>";
                if (groups[key] != 'disabled') {
                    tmp += "<a onclick=removeUserGroup(event) data-value='" + key + "' class='delete-link disabled' href='#'><i class='fas fa-trash text-danger'></i></a>"
                }
                tmp += "</div>";
            }
            document.getElementById('userGroupWrapper').innerHTML = tmp;
            writeUserGroup(groups, 'read');

            statuses = data.user_status[0];
            tmp = '';
            for (const key in statuses) {
                tmp += "<div class='form-group'><div class='custom-control custom-checkbox small'><input type='checkbox' class='custom-control-input";
                if (statuses[key] != 'disabled') {
                    tmp += " editable-check ' onchange='addStatusToList(event)'";
                }
                tmp += " id='" + key + "Check'";
                if (!document.getElementById("edit-btn").classList.contains("d-none") || statuses[key] == 'disabled')
                    tmp += " disabled";
                if (statuses[key] == 'true' || statuses[key] == 'disabled') {
                    tmp += " checked";
                }
                tmp += "><label class='custom-control-label' for='" + key + "Check'>" + key + "</label></div>"
                if (statuses[key] != 'disabled') {
                    tmp += "<a onclick=removeUserStatus(event) data-value='" + key + "' class='delete-link disabled' href='#'><i class='fas fa-trash text-danger'></i></a>";
                }
                tmp += "</div>";
            }
            document.getElementById('userStatusWrapper').innerHTML = tmp;
            writeUserStatus(statuses, 'read');
        }

        function writeUserRank(data, method) {
            var tmp = '';
            if (method == 'read') {
                Object.keys(data).forEach(key => {
                    if (data[key] == 'true' || data[key] == 'disabled') {
                        tmp += "<option value='" + key + "'";
                    }
                    if (key == user_setting_info[selected_user][0].auto_add_user_to_rank) {
                        tmp += " selected";
                    }
                    tmp += ">" + key + "</option>";
                });
            }
            document.getElementById('userRankDropdown').innerHTML = tmp;
        }

        function removeUserRank(e, key) {
            e.preventDefault();
            element = e.currentTarget;
            if (element.classList.value.indexOf('disabled') == -1) {
                value = element.getAttribute('data-value');
                delete user_setting_info[selected_user][0].user_ranks[0][value];
                writeData(selected_user);
                deletes = document.querySelectorAll('.delete-link');
                deletes.forEach(element => {
                    element.classList.remove('disabled');
                });
            }
        }

        function addUserRank() {
            var tmp;
            var value = document.getElementById('userRanks').value;
            if (value == '') {
                window.alert('Empty value should not be added')
            } else {
                if (user_setting_info[selected_user][0].user_ranks[0][value]) {
                    window.alert('The same name is exist')
                } else {
                    user_setting_info[selected_user][0].user_ranks[0][value] = false;
                    writeData(selected_user);
                    deletes = document.querySelectorAll('.delete-link');
                    deletes.forEach(element => {
                        element.classList.remove('disabled');
                    });
                }
            }
        }

        function addRankToList(e) {
            key = e.currentTarget.getAttribute('id');
            key = key.slice(0, -5);
            if (e.currentTarget.checked == true) {
                user_setting_info[selected_user][0].user_ranks[0][key] = 'true';
            } else {
                user_setting_info[selected_user][0].user_ranks[0][key] = 'false';
            }
            writeData(selected_user);
            deletes = document.querySelectorAll('.delete-link');
            deletes.forEach(element => {
                element.classList.remove('disabled');
            });
        }

        function writeUserGroup(data, method) {
            var tmp = '';
            if (method == 'read') {
                Object.keys(data).forEach(key => {
                    if (data[key] == 'true' || data[key] == 'disabled') {
                        tmp += "<option value='" + key + "'";
                    }
                    if (key == user_setting_info[selected_user][0].auto_add_user_to_group) {
                        tmp += " selected";
                    }
                    tmp += ">" + key + "</option>";
                });
            }
            document.getElementById('userGroupDropdown').innerHTML = tmp;
        }

        function removeUserGroup(e) {
            e.preventDefault();
            element = e.currentTarget;
            if (element.classList.value.indexOf('disabled') == -1) {
                value = element.getAttribute('data-value');
                delete user_setting_info[selected_user][0].user_groups[0][value];
                writeData(selected_user);
                deletes = document.querySelectorAll('.delete-link');
                deletes.forEach(element => {
                    element.classList.remove('disabled');
                });
            }
        }

        function addUserGroup() {
            var tmp;
            var value = document.getElementById('userGroup').value;
            if (value == '') {
                window.alert('Empty value should not be added')
            } else {
                if (user_setting_info[selected_user][0].user_groups[0][value]) {
                    window.alert('The same name is exist')
                } else {
                    user_setting_info[selected_user][0].user_groups[0][value] = false;
                    writeData(selected_user);
                    deletes = document.querySelectorAll('.delete-link');
                    deletes.forEach(element => {
                        element.classList.remove('disabled');
                    });
                }
            }
        }

        function addGroupToList(e) {
            key = e.currentTarget.getAttribute('id');
            key = key.slice(0, -5);
            if (e.currentTarget.checked == true) {
                user_setting_info[selected_user][0].user_groups[0][key] = 'true';
            } else {
                user_setting_info[selected_user][0].user_groups[0][key] = 'false';
            }
            writeData(selected_user);
            deletes = document.querySelectorAll('.delete-link');
            deletes.forEach(element => {
                element.classList.remove('disabled');
            });
        }

        function writeUserStatus(data, method) {
            var tmp = '';
            if (method == 'read') {
                Object.keys(data).forEach(key => {
                    if (data[key] == 'true' || data[key] == 'disabled') {
                        tmp += "<option value='" + key + "'";
                    }
                    if (key == user_setting_info[selected_user][0].auto_add_user_to_status) {
                        tmp += " selected";
                    }
                    tmp += ">" + key + "</option>";
                });
            }
            document.getElementById('userStatusDropdown').innerHTML = tmp;
        }

        function removeUserStatus(e) {
            e.preventDefault();
            element = e.currentTarget;
            if (element.classList.value.indexOf('disabled') == -1) {
                value = element.getAttribute('data-value');
                delete user_setting_info[selected_user][0].user_status[0][value];
                writeData(selected_user);
                deletes = document.querySelectorAll('.delete-link');
                deletes.forEach(element => {
                    element.classList.remove('disabled');
                });
            }
        }

        function addUserStatus() {
            var tmp;
            var value = document.getElementById('userStatus').value;
            if (value == '') {
                window.alert('Empty value should not be added')
            } else {
                if (user_setting_info[selected_user][0].user_status[0][value]) {
                    window.alert('The same name is exist')
                } else {
                    user_setting_info[selected_user][0].user_status[0][value] = false;
                    writeData(selected_user);
                    deletes = document.querySelectorAll('.delete-link');
                    deletes.forEach(element => {
                        element.classList.remove('disabled');
                    });
                }
            }
        }

        function addStatusToList(e) {
            key = e.currentTarget.getAttribute('id');
            key = key.slice(0, -5);
            if (e.currentTarget.checked == true) {
                user_setting_info[selected_user][0].user_status[0][key] = 'true';
            } else {
                user_setting_info[selected_user][0].user_status[0][key] = 'false';
            }
            writeData(selected_user);
            deletes = document.querySelectorAll('.delete-link');
            deletes.forEach(element => {
                element.classList.remove('disabled');
            });
        }

        function saveEnable() {
            var checks = document.querySelectorAll('.editable-check');
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
            var buttons = document.querySelectorAll('.add-button');
            buttons.forEach(element => {
                element.removeAttribute("disabled");
            });
            var deleteLinks = document.querySelectorAll('.delete-link');
            deleteLinks.forEach(element => {
                element.classList.remove("disabled");
            });
            document.getElementById("edit-btn").classList.add("d-none");
            document.getElementById("save-btn").classList.remove("d-none");
            document.getElementById("cancel-btn").classList.remove("d-none");

            user_setting_info_2 = structuredClone(user_setting_info);
        }

        function cancelSave() {
            user_setting_info = user_setting_info_2;
            writeData(selected_user);
            var inputs = document.querySelectorAll('.custom-control-input');
            inputs.forEach(element => {
                element.setAttribute("disabled", true);
            });
            var selects = document.querySelectorAll('.custom-select');
            selects.forEach(element => {
                element.setAttribute("disabled", true);
            });
            var inputs = document.querySelectorAll('.form-control');
            inputs.forEach(element => {
                element.setAttribute("readOnly", true);
            });
            var deleteLinks = document.querySelectorAll('.delete-link');
            deleteLinks.forEach(element => {
                element.classList.add("disabled");
            });
            var buttons = document.querySelectorAll('.add-button');
            buttons.forEach(element => {
                element.setAttribute("disabled", true);
            });
            document.getElementById("agency-type").removeAttribute("disabled");
            document.getElementById("edit-btn").classList.remove("d-none");
            document.getElementById("save-btn").classList.add("d-none");
            document.getElementById("cancel-btn").classList.add("d-none");
        }

        function changeUser(e) {
            selected_user = e.currentTarget.value;
            writeData(selected_user);
            if (document.getElementById("edit-btn").classList.contains("d-none")) {
                deletes = document.querySelectorAll('.delete-link');
                deletes.forEach(element => {
                    element.classList.remove('disabled');
                });
            }
        }

        function saveData() {
            var authorization = "<?php echo $authorization; ?>";
            var formData = {
                authorization: authorization.toString(),
                agency_id: init_id,
                agency_types: user_setting_info
            };
            $.ajax({
                type: "POST",
                url: "https://api.redenes.org/dev/v1/system-config-users-settings/",
                data: JSON.stringify(formData),
                dataType: "json",
                contentType: 'application/json',
                success: function(res) {
                    document.getElementById("edit-btn").classList.remove("d-none");
                    document.getElementById("save-btn").classList.add("d-none");
                    document.getElementById("cancel-btn").classList.add("d-none");
                    var inputs = document.querySelectorAll('.editable-check');
                    inputs.forEach(element => {
                        element.setAttribute("disabled", true);
                    });
                    var buttons = document.querySelectorAll('.add-button');
                    buttons.forEach(element => {
                        element.setAttribute("disabled", true);
                    });
                    var deleteLinks = document.querySelectorAll('.delete-link');
                    deleteLinks.forEach(element => {
                        element.classList.add("disabled");
                    });
                    var inputs = document.querySelectorAll('.form-control');
                    inputs.forEach(element => {
                        element.setAttribute("readOnly", true);
                    });
                    var selects = document.querySelectorAll('.custom-select');
                    selects.forEach(element => {
                        element.setAttribute("disabled", true);
                    });
                    document.getElementById("agency-type").removeAttribute("disabled");
                }
            })
        }
    </script>
</body>

</html>