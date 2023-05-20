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
                            <h1 class="h3 mb-4 text-gray-800">Module Settings</h1>
                        </div>
                        <div class="card shadow mb-4" style="max-width: 1400px">
                            <div class="card-header py-3 d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <h6 class="mr-3 mb-0" style="white-space:nowrap">Agency Type</h6>
                                    <select onchange="changeUserGroup(event)" id="userGroupDropdown" name='dataTable_length' aria-controls='dataTable' class='custom-select form-control form-control-sm' style="width: 13rem">
                                    </select>
                                </div>
                                <div>
                                    <button id="edit-btn" type="button" onClick="saveEnable()" class="btn btn-success btn-icon-split my-0 mr-2">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="text">Edit</span>
                                    </button>
                                    <button id="save-btn" type="button" onClick="saveData()" class="btn btn-success btn-icon-split my-0 mr-2 d-none">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="text">Save</span>
                                    </button>
                                    <button id="cancel-btn" type="button" onClick="cancelSave()" class="btn btn-danger btn-icon-split my-0 mr-2 d-none">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-edit"></i>
                                        </span>
                                        <span class="text">Cancel</span>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" name="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Screen</th>
                                                <th>Module</th>
                                                <th style="width: 8rem;">View</th>
                                                <th style="width: 8rem;">Edit</th>
                                                <th style="width: 8rem;">Add</th>
                                                <th>Default Format</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Screen</th>
                                                <th>Module</th>
                                                <th style="width: 8rem;">View</th>
                                                <th style="width: 8rem;">Edit</th>
                                                <th style="width: 8rem;">Add</th>
                                                <th>Default Format</th>
                                            </tr>
                                        </tfoot>
                                        <tbody id="table-content">
                                            <tr>
                                                <td>Home</td>
                                                <td>Directory</td>
                                                <td>
                                                    <div class="custom-control custom-checkbox small">
                                                        <input type="checkbox" class="custom-control-input" id="DirectoryCheck1" disabled>
                                                        <label class="custom-control-label" for="DirectoryCheck1"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox small">
                                                        <input type="checkbox" class="custom-control-input" id="DirectoryCheck2" disabled>
                                                        <label class="custom-control-label" for="DirectoryCheck2"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox small">
                                                        <input type="checkbox" class="custom-control-input" id="DirectoryCheck3" disabled>
                                                        <label class="custom-control-label" for="DirectoryCheck3"></label>
                                                    </div>
                                                </td>
                                            </tr>
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

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script>
        // To show the loader
        document.getElementById("my-loader-element").classList.add("loader");
        var module_setting;
        init_id = "<?php echo $agency_id; ?>";

        function getData(agency_id) {
            $.ajax({
                type: "GET",
                url: "https://api.redenes.org/dev/v1/agency-module-settings/",
                data: {
                    agency_id: agency_id,
                    authorization: "<?php echo $authorization; ?>"
                },
                success: function(res) {
                    module_setting = res.agencies_module_settings[0];
                    writeDropdown(res.user_group_selected, res.user_groups);
                    writeTable(res.agencies_module_settings[0]);
                    // To hide the loader
                    document.getElementById("my-loader-element").classList.remove("loader");
                    document.getElementById("my-loader-wrapper").classList.add("d-none");
                }
            })
        }
        getData(init_id);

        function saveData() {
            var authorization = "<?php echo $authorization; ?>";
            for (let key in module_setting) {
                for (let subkey in module_setting[key][0]) {
                    for (let i = 0; i < 3; i++) {
                        if (i == 0) {
                            module_setting[key][0][subkey][0].view = document.getElementById(subkey + 'Check' + i).checked ? 'true' : 'false';
                        } else if (i == 1) {
                            module_setting[key][0][subkey][0].view = document.getElementById(subkey + 'Check' + i).checked ? 'true' : 'false';
                        } else {
                            module_setting[key][0][subkey][0].view = document.getElementById(subkey + 'Check' + i).checked ? 'true' : 'false';
                        }
                    }
                }
            }
            var formData = {
                authorization: authorization.toString(),
                agency_id: init_id,
                agency_module_settings: [module_setting]
            };
            $.ajax({
                type: "POST",
                url: "https://api.redenes.org/dev/v1/agency-module-settings/",
                data: JSON.stringify(formData),
                dataType: "json",
                contentType: 'application/json',
                success: function(res) {
                    document.getElementById("edit-btn").classList.remove("d-none");
                    document.getElementById("save-btn").classList.add("d-none");
                    document.getElementById("cancel-btn").classList.add("d-none");
                    document.getElementById('userGroupDropdown').removeAttribute("disabled");
                    var inputs = document.querySelectorAll('.custom-control-input');
                    inputs.forEach(element => {
                        element.setAttribute("disabled", true);
                    });
                }
            })
        }

        function saveEnable() {
            var inputs = document.querySelectorAll('.custom-control-input');
            inputs.forEach(element => {
                if (element.classList.contains('always-check') == false) {
                    element.removeAttribute("disabled");
                }
            });
            document.getElementById('userGroupDropdown').setAttribute("disabled", true);
            document.getElementById("edit-btn").classList.add("d-none");
            document.getElementById("save-btn").classList.remove("d-none");
            document.getElementById("cancel-btn").classList.remove("d-none");
        }

        function cancelSave() {
            writeTable(module_setting);
            document.getElementById("edit-btn").classList.remove("d-none");
            document.getElementById("save-btn").classList.add("d-none");
            document.getElementById("cancel-btn").classList.add("d-none");
            document.getElementById('userGroupDropdown').removeAttribute("disabled");
            var inputs = document.querySelectorAll('.custom-control-input');
            inputs.forEach(element => {
                element.setAttribute("disabled", true);
            });
        }

        function writeTable(data) {
            tmp = '';
            for (let key in data) {
                new_item = 0;
                for (let subkey in data[key][0]) {
                    if (new_item == 0 && key != 'home') {
                        tmp += "<tr><td></td><td></td><td></td><td></td><td></td></tr>";
                        new_item++;
                    }
                    tmp += "<tr>";
                    tmp += "<td style='text-transform:capitalize;'>" + key + "</td>";
                    tmp += "<td style='text-transform:capitalize;'>" + subkey.replace('_', ' ') + "</td>";
                    for (let i = 0; i < 3; i++) {
                        tmp += "<td><div class='custom-control custom-checkbox'><input type='checkbox' class='custom-control-input";
                        if (data[key][0][subkey][0].add == 'always') {
                            tmp += " always-check";
                        }
                        tmp += "' id='" + subkey + "Check" + i + "' disabled ";
                        if (data[key][0][subkey][0].add != 'false' && i == 0) {
                            tmp += " checked";
                        }
                        if (data[key][0][subkey][0].edit != 'false' && i == 1) {
                            tmp += " checked";
                        }
                        if (data[key][0][subkey][0].view != 'false' && i == 2) {
                            tmp += " checked";
                        }
                        tmp += "><label class='custom-control-label' for='" + subkey + "Check" + i + "'></label></div></td>";
                    }
                    tmp += "</tr>";
                }
            }
            document.getElementById('table-content').innerHTML = tmp;
        }

        function writeDropdown(selected, options) {
            tmp = '';
            for (let index = 0; index < options.length; index++) {
                const element = options[index];
                tmp += "<option value='" + options[index] + "'";
                if (options[index] == selected)
                    tmp += " selected";
                tmp += ">" + options[index] + "</option>";
            }
            document.getElementById('userGroupDropdown').innerHTML = tmp;
        }

        function changeUserGroup(e) {
            $.ajax({
                type: "GET",
                url: "https://api.redenes.org/dev/v1/agency-module-settings/",
                data: {
                    agency_id: init_id,
                    authorization: "<?php echo $authorization; ?>",
                    user_groups: e.target.value
                },
                success: function(res) {
                    module_setting = res.agencies_module_settings[0];
                    writeDropdown(res.user_group_selected, res.user_groups);
                    writeTable(res.agencies_module_settings[0]);
                }
            })
        }
    </script>
</body>

</html>