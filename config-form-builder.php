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
    $form_id = $_REQUEST['form_id'];
?>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
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
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <?php include('header.php'); ?>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <h1 class="h3 mb-4 text-gray-800">Form Builder</h1>
                        <div class="well well-sm">
                            <div class="mb-4">
                                <h4 class="mb-2">Format Type: <span id="formType"></span></h4>
                                <h4 class="mb-2">Module: <span id="module"></span></h4>
                                <h4>Form Name: <span id="form"></span></h4>
                                <div class="d-md-flex align-items-center">
                                    <div class="align-items-center mt-2" role="group">
                                        <button class="btn btn-primary preview-btn btn-icon-split text" type="button" id="preview">Preview</button>
                                        <!-- <button type="button" id="getHTML" class="btn btn-success">Get HTML</button>
                                    <button type="button" id="getXML" class="btn btn-success">Get XML</button>
                                    <button type="button" id="getJSON" class="btn btn-success">Get JSON</button> -->
                                        <button type="button" id="getJSON" class="btn btn-success btn-icon-split mx-2">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-check"></i>
                                            </span>
                                            <span class="text">Save</span>
                                        </button>
                                        <button onclick="openCancelModal()" class="btn btn-danger btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                            <span class="text">Cancel</span>
                                        </button>
                                    </div>
                                    <div id="alert" class="card mb-0 ml-md-5 mt-2 d-none">
                                        <div class="card-header py-2">
                                            <h6 id="alert-title" class="m-0 font-weight-bold text-danger"></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="build-wrap" class="mb-4">
                            </div>
                            <div id="build-preview" style="display: none;">
                                <form action="#"></form>
                            </div>
                        </div>
                        <div class="well well-sm" id="outDiv" style="display:none;">
                            <textarea style="height:500px;" class="form-control" id="out" name="out"></textarea>
                        </div>
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
        <div id="cancelModal" class="modal" style="padding-top:20rem">
            <!-- Modal content -->
            <div class="modal-content">
                <span class="close" onclick="closeCancelModal()">&times;</span>
                <form id="createUserForm">
                    <div id="modalFromContent">
                        <div class="row align-items-center justify-content-center mb-2">
                            <h6 class="ml-2 mb-0 text-right">Do you want to go back, and unsaved data will be lost</h6>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-4" id="modal-btn-wrapper">
                        <button type="button" onclick="goPreviousPage()" class='nav-link btn btn-success btn-icon-split my-1 mr-4'><span class='icon text-white-50'><i class='fas fa-plus'></i></span><span class='text'>Back</span></button>
                        <button type="button" onclick="closeCancelModal()" class='nav-link btn btn-danger btn-icon-split my-1'><span class='icon text-white-50'><i class='fas fa-minus'></i></span><span class='text'>Stay</span></button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>
        <script src="js/main.js"></script>
        <script>
            // To show the loader    
            document.getElementById("my-loader-element").classList.add("loader");
            var actions = [];
            var formData;
            async function getFormData() {
                await $.ajax({
                    type: "GET",
                    url: "https://api.redenes.org/dev/v1/system-config-form-builder/",
                    data: {
                        agency_id: "<?php echo $agency_id; ?>",
                        authorization: "<?php echo $authorization; ?>",
                        form_id: "<?php echo $form_id; ?>"
                    },
                    success: function(res) {
                        console.log(res);
                        // id = $('.frmb').attr('id');
                        $('.frmb').removeClass('empty');
                        formData = res;
                        actions.push(res.action_one);
                        actions.push(res.action_two);
                        actions.push(res.action_three);
                        actions.push(res.action_four);
                        var form_builder = document.querySelector(".stage-wrap");
                        // To hide the loader
                        var mainHeader = "<li class='header-field form-field' type='header' id='main-header'><div class='field-actions'><a type='edit' onclick=mainHeaderClose() id='main-header-edit' class='toggle-form btn formbuilder-icon-pencil' title='Edit'></a></div><label class='field-label'>Header</label><span class='required-asterisk' style=''> *</span><span class='tooltip-element' tooltip='undefined' style='display:none'>?</span><div class='prev-holder'><div class='formbuilder-header form-group field-header-1681859716095-preview'><header name='header-1681859716095-preview' id='header-1681859716095-preview'>Section</header></div></div><div id='frmb-1681859665978-fld-1-holder' class='frm-holder' data-field-id='frmb-1681859665978-fld-1'><div class='form-elements'><div class='form-group label-wrap' style='display: block'><label for='label-frmb-1681859665978-fld-1'>Label</label><div class='input-wrap'><div name='label' placeholder='Label' class='fld-label form-control' id='label-frmb-1681859665978-fld-1' contenteditable='true'>Header</div></div></div><a onclick=mainHeaderClose() class='close-field'>Close</a></div></div></li>";
                        if (res.form_data_html && res.form_data_html != "") {
                            if (res.form_data_html.indexOf('main-header') > -1) {
                                $('.frmb').html(res.form_data_html);
                            } else {
                                $('.frmb').html(mainHeader + res.form_data_html);
                            }
                        } else
                            $('.frmb').html(mainHeader);
                        if (res.format_type == 'Display') {
                            $(".formbuilder-icon-checkbox-group").addClass("d-none");
                            $(".formbuilder-icon-button").addClass("d-none");
                            $(".formbuilder-icon-select").addClass("d-none");
                            form_builder = document.querySelector(".stage-wrap");
                            form_builder.classList.add('display-form');
                        }
                        document.getElementById("module").innerHTML = res.module;
                        document.getElementById("form").innerHTML = res.format_name;
                        document.getElementById("formType").innerHTML = res.format_type;
                        document.getElementById("my-loader-element").classList.remove("loader");
                        document.getElementById("my-loader-wrapper").classList.add("d-none");

                        form_builder.style.paddingTop = '43px';
                        var mainHeaderDom = $(document.getElementById("main-header"));
                    }
                })
            }

            function mainHeaderClose() {
                var form_builder = document.querySelector(".stage-wrap");
                if (form_builder.children[0].classList.contains('editing')) {
                    form_builder.style.paddingTop = '43px';
                } else {
                    form_builder.style.paddingTop = '119px';
                }
            }
            getFormData();
            $("#getJSON").click(function(e) {
                e.preventDefault();
                elements = $('.frmb').children();
                var mainData = [];
                array = [];
                buttonArray = [];
                for (let index = 0; index < elements.length; index++) {
                    const element = elements[index];
                    if (element.type == 'button') {
                        var object = {
                            button: $(element).find('.label-wrap .fld-label')[0].innerHTML,
                            text: $(element).find('.textColor-wrap .fld-textColor')[0].value.substring(1),
                            background: $(element).find('.buttonColor-wrap .fld-buttonColor')[0].value.substring(1),
                            clicked: 'false'
                            // action1: $(element).find('.action1-wrap .custom-select')[0].value,
                            // action2: $(element).find('.action2-wrap .custom-select')[0].value,
                            // action3: $(element).find('.action3-wrap .custom-select')[0].value,
                            // action4: $(element).find('.action4-wrap .custom-select')[0].value,
                        };
                        buttonArray.push(object);
                    } else if (element.type == 'checkbox-group') {
                        if (buttonArray.length != 0) {
                            array.push({
                                buttons: buttonArray
                            });
                            buttonArray = [];
                        }
                        var object = {
                            check_box: $(element).find('.option-label')[0].value,
                            pre_filled: $(element).find('.option-selected')[0].value,
                        };
                        array.push(object);
                    } else if (element.type == 'header') {
                        if (buttonArray.length != 0) {
                            array.push({
                                buttons: buttonArray
                            });
                            buttonArray = [];
                        }
                        if (index != 0) {
                            mainData.push(array);
                            array = [];
                        }
                        var object = {
                            title: $(element).find('.label-wrap .fld-label')[0].innerHTML,
                        };
                        array.push(object);
                    } else if (element.type == 'text') {
                        inputID = $(element).find('.input-wrap .fld-preFilled')[0];       
                        document.getElementById(inputID.id).setAttribute('value', inputID.value);
                        if (buttonArray.length != 0) {
                            array.push({
                                buttons: buttonArray
                            });
                            buttonArray = [];
                        }
                        var form_builder = document.querySelector(".stage-wrap");
                        if (form_builder.classList.contains('display-form')) {
                            var object = {
                                field: $(element).find('.label-wrap .fld-label')[0].innerHTML,
                                value: $(element).find('.input-wrap .fld-preFilled')[0].value,
                            };
                            array.push(object);
                        } else {
                            var object = {
                                text_box: $(element).find('.label-wrap .fld-label')[0].innerHTML,
                                pre_filed: $(element).find('.input-wrap .fld-preFilled')[0].value,
                            };
                            array.push(object);
                        }
                    } else if (element.type == 'hidden') {
                        if (buttonArray.length != 0) {
                            array.push({
                                buttons: buttonArray
                            });
                            buttonArray = [];
                        }
                        var object = {
                            divider: $(element).find('.dividerColor-wrap .fld-dividerColor')[0].value.substring(1),
                        };
                        array.push(object);
                    } else if (element.type == 'select') {
                        if (buttonArray.length != 0) {
                            array.push({
                                buttons: buttonArray
                            });
                            buttonArray = [];
                        }
                        var object = {
                            drop_down: $(element).find('.label-wrap .fld-label')[0].innerHTML,
                            multiple: $(element).find('.input-wrap .fld-multiple')[0].checked == true ? 'true' : 'false',
                            pre_filled: [],
                            pre_filled_selected: []
                        };
                        if (object.multiple == 'false') {
                            subelements = $(element).find('.form-group .sortable-options').children();
                            for (let j = 0; j < subelements.length; j++) {
                                object.pre_filled.push($(subelements[j]).find('.option-label')[0].value);
                                if ($(subelements[j]).find('.option-selected')[0].value == 'true') {
                                    object.pre_filled_selected.push($(subelements[j]).find('.option-label')[0].value);
                                }
                            }
                            array.push(object);
                        } else {
                            subelements = $(element).find('.form-group .form-control').children();
                            for (let j = 0; j < subelements.length; j++) {
                                object.pre_filled.push($(subelements[j])[0].innerHTML);
                                if ($(subelements[j])[0].selected == true) {
                                    object.pre_filled_selected.push($(subelements[j])[0].innerHTML);
                                }
                            }
                            array.push(object);
                        }
                    }
                    if (index == elements.length - 1) {
                        if (buttonArray.length != 0) {
                            array.push({
                                buttons: buttonArray
                            });
                            buttonArray = [];
                        }
                        mainData.push(array);
                    }
                }
                formData.form_data_html = $('.frmb').html();
                formData.form_data_json = mainData;
                formData.button = 'save';
                document.getElementById("my-loader-element").classList.add("loader");
                console.log(formData);
                $.ajax({
                    type: "POST",
                    url: "https://api.redenes.org/dev/v1/system-config-form-builder/",
                    data: JSON.stringify(formData),
                    dataType: "json",
                    contentType: 'application/json',
                    success: function(res) {
                        console.log(res);
                        document.getElementById("alert").classList.remove("d-none");
                        document.getElementById("alert-title").innerHTML = res.status;
                        document.getElementById("my-loader-element").classList.remove("loader");
                        document.getElementById("my-loader-wrapper").classList.add("d-none");
                    }
                })
            });
            $("#preview").click(function(e) {
                e.preventDefault();
                if ($("#build-wrap").is(":visible")) {
                    $("#build-wrap").hide();
                    $("#build-preview").show();
                    $(this).text("Edit");
                    elements = $('.frmb').children();
                    var mainData = [];
                    array = [];
                    buttonArray = [];
                    for (let index = 0; index < elements.length; index++) {
                        const element = elements[index];
                        if (element.type == 'button') {
                            var object = {
                                button: $(element).find('.label-wrap .fld-label')[0].innerHTML,
                                text: $(element).find('.textColor-wrap .fld-textColor')[0].value.substring(1),
                                background: $(element).find('.buttonColor-wrap .fld-buttonColor')[0].value.substring(1),
                                clicked: 'false'
                                // action1: $(element).find('.action1-wrap .custom-select')[0].value,
                                // action2: $(element).find('.action2-wrap .custom-select')[0].value,
                                // action3: $(element).find('.action3-wrap .custom-select')[0].value,
                                // action4: $(element).find('.action4-wrap .custom-select')[0].value,
                            };
                            buttonArray.push(object);
                        } else if (element.type == 'checkbox-group') {
                            if (buttonArray.length != 0) {
                                array.push({
                                    buttons: buttonArray
                                });
                                buttonArray = [];
                            }
                            var object = {
                                check_box: $(element).find('.option-label')[0].value,
                                pre_filled: $(element).find('.option-selected')[0].value,
                            };
                            array.push(object);
                        } else if (element.type == 'header') {
                            if (buttonArray.length != 0) {
                                array.push({
                                    buttons: buttonArray
                                });
                                buttonArray = [];
                            }
                            if (index != 0) {
                                mainData.push(array);
                                array = [];
                            }
                            var object = {
                                title: $(element).find('.label-wrap .fld-label')[0].innerHTML,
                            };
                            array.push(object);
                        } else if (element.type == 'text') {
                            if (buttonArray.length != 0) {
                                array.push({
                                    buttons: buttonArray
                                });
                                buttonArray = [];
                            }
                            var object = {
                                text_box: $(element).find('.label-wrap .fld-label')[0].innerHTML,
                                pre_filed: $(element).find('.input-wrap .fld-preFilled')[0].value,
                            };
                            array.push(object);
                        } else if (element.type == 'hidden') {
                            if (buttonArray.length != 0) {
                                array.push({
                                    buttons: buttonArray
                                });
                                buttonArray = [];
                            }
                            var object = {
                                divider: $(element).find('.dividerColor-wrap .fld-dividerColor')[0].value.substring(1),
                            };
                            array.push(object);
                        } else if (element.type == 'select') {
                            if (buttonArray.length != 0) {
                                array.push({
                                    buttons: buttonArray
                                });
                                buttonArray = [];
                            }
                            var object = {
                                drop_down: $(element).find('.label-wrap .fld-label')[0].innerHTML,
                                multiple: $(element).find('.input-wrap .fld-multiple')[0].checked == true ? 'true' : 'false',
                                pre_filled: [],
                                pre_filled_selected: []
                            };
                            if (object.multiple == 'false') {
                                subelements = $(element).find('.form-group .sortable-options').children();
                                for (let j = 0; j < subelements.length; j++) {
                                    object.pre_filled.push($(subelements[j]).find('.option-label')[0].value);
                                    if ($(subelements[j]).find('.option-selected')[0].value == 'true') {
                                        object.pre_filled_selected.push($(subelements[j]).find('.option-label')[0].value);
                                    }
                                }
                                array.push(object);
                            } else {
                                subelements = $(element).find('.form-group .form-control').children();
                                for (let j = 0; j < subelements.length; j++) {
                                    object.pre_filled.push($(subelements[j])[0].innerHTML);
                                    if ($(subelements[j])[0].selected == true) {
                                        object.pre_filled_selected.push($(subelements[j])[0].innerHTML);
                                    }
                                }
                                array.push(object);
                            }
                        }
                        if (index == elements.length - 1) {
                            if (buttonArray.length != 0) {
                                array.push({
                                    buttons: buttonArray
                                });
                                buttonArray = [];
                            }
                            mainData.push(array);
                        }
                    }
                    var form_builder = document.querySelector(".stage-wrap");
                    if (form_builder.classList.contains('display-form')) {
                        writeDisplayData();
                    } else {
                        writeData();
                    }

                    function writeData() {
                        console.log(mainData);
                        var tmp = '';
                        for (var i = 0; i < mainData.length; i++) {
                            object = mainData[i];
                            tmp = tmp + "<div class='card shadow mb-4'><div class='card-header py-3'><label class='m-0 font-weight-bold text-primary'>" + object[0].title + "</label></div><div class='card-body'>";
                            for (var j = 1; j < object.length; j++) {
                                if (Object.keys(object[j])[0] == 'text_box') {
                                    tmp = tmp + "<div class='form-group'><label>" + object[j].text_box + "</label><input id='incident_ob" + i.toString() + "_text" + j.toString() + "' type='text' class='form-control form-control-user' placeholder='' aria-label='Search' aria-describedby='basic-addon2' value='" + object[j].pre_filled + "'";
                                    if (content.status == 'false') {
                                        tmp = tmp + " readOnly";
                                    }
                                    tmp = tmp + "></div>";
                                } else if (Object.keys(object[j])[0] == 'check_box') {
                                    tmp = tmp + "<div class='form-group'><div class='custom-control custom-checkbox small'><input type='checkbox' class='custom-control-input' id='incident_ob" + i.toString() + "_check" + j.toString() + "'";
                                    if (object[j].pre_filled == 'true') {
                                        tmp = tmp + "checked";
                                    }
                                    if (content.status == 'false') {
                                        tmp = tmp + " disabled";
                                    }
                                    tmp = tmp + "><label class='custom-control-label' for='incident_ob" + i.toString() + "_check" + j.toString() + "'>" + object[j].check_box + "</label></div></div>";
                                } else if (Object.keys(object[j])[0] == 'drop_down') {
                                    if (object[j].multiple == 'true') {
                                        if (object[j].pre_filled_selected != '') {
                                            tmp = tmp + "<div class='form-group'><label>" + object[j].drop_down + "</label>";
                                            tmp += "<div class='multiselect mb-3 selection' id='multi-dropdown" + j + "' multiple='multiple' data-target='multi-" + j + "'>";
                                            tmp += "<div class='title noselect' title='" + object[j].pre_filled_selected.join(',') + "'><span class='text'>" + object[j].pre_filled_selected.join(',') + "</span><span class='close-icon'>&times;</span><span class='expand-icon'>&plus;</span></div>"
                                        } else {
                                            tmp = tmp + "<div class='form-group'><label>" + object[j].drop_down + "</label>";
                                            tmp += "<div class='multiselect mb-3' id='multi-dropdown" + j + "' multiple='multiple' data-target='multi-" + j + "'>";
                                            tmp += "<div class='title noselect'><span class='text'>Select</span><span class='close-icon'>&times;</span><span class='expand-icon'>&plus;</span></div>"
                                        }
                                        tmp += " <div class='dropdown-container'>"
                                        for (var k = 0; k < object[j].pre_filled.length; k++) {
                                            tmp += "<option value='" + object[j].pre_filled[k] + "' class='option-item";
                                            if (object[j].pre_filled_selected.indexOf(object[j].pre_filled[k]) != -1) {
                                                tmp += " selected"
                                            }
                                            tmp += "'>" + object[j].pre_filled[k] + "</option>";
                                        }
                                        tmp += "</div></div></div>";
                                        new Multiselect('#multi-dropdown' + j, object[j].pre_filled_selected);
                                    } else {
                                        tmp = tmp + "<div class='form-group'><label>" + object[j].drop_down + "</label>";
                                        tmp = tmp + "<select id='incident_ob" + i.toString() + "_dropdown" + j.toString() + "' name='dataTable_length' aria-controls='dataTable' class='custom-select form-control-sm'";
                                        if (content.status == 'false') {
                                            tmp = tmp + " disabled";
                                        }
                                        tmp = tmp + ">";
                                        for (var k = 0; k < object[j].pre_filled.length; k++) {
                                            tmp = tmp + "<option value='" + object[j].pre_filled[k] + "'";
                                            if (object[j].multiple == 'true') {
                                                if (object[j].pre_filled_selected.indexOf(object[j].pre_filled[k]) !== -1) {
                                                    tmp = tmp + " selected";
                                                }
                                            } else {
                                                if (object[j].pre_filledfilled_selected && object[j].pre_filled_selected == object[j].pre_filled[k]) {
                                                    tmp = tmp + " selected";
                                                }
                                            }
                                            tmp = tmp + ">" + object[j].pre_filled[k] + "</option>";
                                        }
                                        tmp = tmp + "</select></div>";
                                    }
                                } else if (Object.keys(object[j])[0] == 'buttons') {
                                    tmp = tmp + "<div class='d-flex justify-content-center'>";
                                    for (let index = 0; index < object[j].buttons.length; index++) {
                                        tmp = tmp + "<button type='button' onclick='saveData(" + i + ',' + j + ',' + index + ")' class='btn my-1 mr-2' style='background-color:" + object[j].buttons[index].background + ";color:" + object[j].buttons[index].text + "'></span><span class='text'>" + object[j].buttons[index].button + "</span></button>";
                                    }
                                    tmp = tmp + "</div>"
                                } else if (Object.keys(object[j])[0] == 'divider') {
                                    tmp = tmp + "<div class='form-group'><div class='custom-control custom-border small' style='border-color:#" + object[j].divider + "'></div></div>";
                                }
                            }
                            tmp = tmp + "</div></div>";
                        }
                        document.getElementById("build-preview").innerHTML = tmp;
                    }

                    function writeDisplayData() {
                        console.log(mainData);
                        var tmp = '';
                        for (var i = 0; i < mainData.length; i++) {
                            object = mainData[i];
                            tmp = tmp + "<div class='card shadow py-2 my-2' style='border-left:0.25rem solid #" + object[0].color +
                                ";'><div class='card-body'><div class='row no-gutters align-items-center'><div class='col mr-2'>";
                            for (var j = 1; j < object.length; j++) {
                                console.log(object[j]);
                                if (object[j].divider) {
                                    tmp += "<div class='custom-control custom-border mt-4 mr-5' style='border-color: #" + object[j]
                                        .divider + "'/></div>";
                                } else if (object[j].text_box) {
                                    tmp = tmp + "<div id='agency-address-unit' class='h5 mb-1 font-weight-bold text-gray-800'>" +
                                        object[j].text_box + ": " + object[j].pre_filed + "</div>";
                                } else {
                                    tmp = tmp + "<div id='agency-address-unit' class='h5 mb-1 font-weight-bold text-gray-800'>" +
                                        object[j].field + ": " + object[j].value + "</div>";
                                }
                            }
                            tmp = tmp + "</div></div></div>";
                        }
                        document.getElementById("build-preview").innerHTML = tmp;
                    }
                } else {
                    $("#build-preview").hide();
                    $("#build-wrap").show();
                    $(this).text("Preview");
                }

            });

            var cancelModal = document.getElementById("cancelModal");

            function openCancelModal() {
                cancelModal.style.display = "block";
            }

            function closeCancelModal() {
                cancelModal.style.display = "none";
            }

            function goPreviousPage() {
                window.location.replace('config-module-format');
            }
        </script>
        <!-- Form Builder JavaScript-->
        <script src="js/form/vkbeautify.min.js"></script>
        <script src="js/form/beauty.js"></script>
        <script src="js/form/html-beauty.js"></script>
        <script src="js/form/form-builder.min.js"></script>
        <script src="js/form/form-render.min.js"></script>
        <script src="js/form/html-form-builder.js"></script>
    </body>

    </html>
<?php }  ?>