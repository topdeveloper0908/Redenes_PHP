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
                    <h1 class="h3 mb-4 text-gray-800">Form Builder</h1>
                    <div class="well well-sm">
                        <div class="mb-4">  
                            <h4 class="mb-2">Module: <span id="module"></span></h4>
                            <h4>Form Name: <span id="form"></span></h4>
                            <div class="d-md-flex align-items-center">
                                <div class="align-items-center mt-2" role="group">
                                    <button type="button" id="preview" class="btn btn-info">Preview</button>
                                    <!-- <button type="button" id="getHTML" class="btn btn-success">Get HTML</button>
                                    <button type="button" id="getXML" class="btn btn-success">Get XML</button>
                                    <button type="button" id="getJSON" class="btn btn-success">Get JSON</button> -->
                                    <button type="button" id="getJSON" class="btn btn-success mx-2">Save</button>
                                    <button type="button" id="clear" class="btn btn-danger">Cancel</button>
                                </div>
                                <div id="alert" class="card mb-0 ml-md-5 mt-2 d-none">
                                    <div class="card-header py-2">
                                        <h6 id="alert-title" class="m-0 font-weight-bold text-danger">asfdafdsfaf</h6>
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
    var actions = [];
    var formData;
    async function getFormData() {
        await $.ajax({
            type: "GET",
            url: "https://api.redenes.org/dev/v1/form-builder/",
            data: {
                agency_id: "<?php echo $agency_id;?>",
                authorization: "<?php echo $authorization;?>",
                form_id: "<?php echo $form_id;?>"
            },
            success: function (res) {
                console.log(res);
                // id = $('.frmb').attr('id');
                $('.frmb').removeClass('empty');
                formData = res;
                actions.push(res.action_one);
                actions.push(res.action_two);
                actions.push(res.action_three);
                actions.push(res.action_four);
                // To hide the loader
                var mainHeader = "<li class='header-field form-field' type='header' id='main-header'><div class='field-actions'><a type='edit' id='main-header' class='toggle-form btn formbuilder-icon-pencil' title='Edit'></a></div><label class='field-label'>Header</label><span class='required-asterisk' style=''> *</span><span class='tooltip-element' tooltip='undefined' style='display:none'>?</span><div class='prev-holder'><div class='formbuilder-header form-group field-header-1681859716095-preview'><header name='header-1681859716095-preview' id='header-1681859716095-preview'>Header</header></div></div><div id='frmb-1681859665978-fld-1-holder' class='frm-holder' data-field-id='frmb-1681859665978-fld-1'><div class='form-elements'><div class='form-group label-wrap' style='display: block'><label for='label-frmb-1681859665978-fld-1'>Label</label><div class='input-wrap'><div name='label' placeholder='Label' class='fld-label form-control' id='label-frmb-1681859665978-fld-1' contenteditable='true'>Header</div></div></div><a class='close-field'>Close</a></div></div></li>";
                if(res.form_data_html)
                    $('.frmb').html(mainHeader+res.form_data_html);
                else 
                    $('.frmb').html(mainHeader);
                document.getElementById("module").innerHTML = res.module;
                document.getElementById("form").innerHTML = res.form_name;
                document.getElementById("my-loader-element").classList.remove("loader");                
                document.getElementById("my-loader-wrapper").classList.add("d-none");
            }
        })
    }
    getFormData();
    $("#getJSON").click(function (e) {
        e.preventDefault();
        elements = $('.frmb').children();
        array = [];
        for (let index = 0; index < elements.length; index++) {
            const element = elements[index];
            if(element.type == 'button') {
                var object = {
                    type: 'button',
                    label: $(element).find('.label-wrap .fld-label')[0].innerHTML,
                    textColor: $(element).find('.textColor-wrap .fld-textColor')[0].value,
                    buttonColor: $(element).find('.buttonColor-wrap .fld-buttonColor')[0].value,
                    action1: $(element).find('.action1-wrap .custom-select')[0].value,
                    action2: $(element).find('.action2-wrap .custom-select')[0].value,
                    action3: $(element).find('.action3-wrap .custom-select')[0].value,
                    action4: $(element).find('.action4-wrap .custom-select')[0].value,
                };
                array.push(object);
            }
            else if(element.type == 'checkbox-group') {
                var object = {
                    type: 'checkbox',
                    label: $(element).find('.option-label')[0].value,
                    selected: $(element).find('.option-selected')[0].value,
                };
                array.push(object);
            }
            else if(element.type == 'header') {
                var object = {
                    type: 'header',
                    label: $(element).find('.label-wrap .fld-label')[0].innerHTML,
                };
                array.push(object);
            }
            else if(element.type == 'text') {
                var object = {
                    type: 'text',
                    label: $(element).find('.label-wrap .fld-label')[0].innerHTML,
                    prefiled: $(element).find('.input-wrap .fld-preFilled')[0].value,
                };
                array.push(object);
            }
            else if(element.type == 'select') {
                var object = {
                    type: 'dropdown',
                    label: $(element).find('.label-wrap .fld-label')[0].innerHTML,
                    multiple: $(element).find('.input-wrap .fld-multiple')[0].checked,
                    values: []
                };
                subelements = $(element).find('.form-group .sortable-options').children();
                for (let j = 0; j < subelements.length; j++) {
                    object.values.push({
                        label: $(subelements[j]).find('.option-label')[0].value,
                        selected: $(subelements[j]).find('.option-selected')[0].value
                    });
                }
                array.push(object);
            }
        }
        formData.form_data_html = $('.frmb').html();
        formData.form_data_json = array;
        formData.button = 'save';
        document.getElementById("my-loader-element").classList.add("loader");
        $.ajax({
            type: "POST",
            url: "https://api.redenes.org/dev/v1/form-builder/",
            data: JSON.stringify(formData),
            dataType: "json",
            contentType:'application/json',
            success: function (res) {
                console.log(res);
                document.getElementById("alert").classList.remove("d-none");    
                document.getElementById("alert-title").innerHTML = res.status;    
                document.getElementById("my-loader-element").classList.remove("loader");                
                document.getElementById("my-loader-wrapper").classList.add("d-none");
            }
        })
    });
    $("#preview").click(function (e) {
        e.preventDefault();
        if ($("#build-wrap").is(":visible")) {
            $("#build-wrap").hide();
            $("#build-preview").show();
            $(this).text("Edit");
            elements = $('.frmb').children();
            array = [];
            for (let index = 0; index < elements.length; index++) {
                const element = elements[index];
                if(element.type == 'button') {
                    var object = {
                        type: 'button',
                        label: $(element).find('.label-wrap .fld-label')[0].innerHTML,
                        textColor: $(element).find('.textColor-wrap .fld-textColor')[0].value,
                        buttonColor: $(element).find('.buttonColor-wrap .fld-buttonColor')[0].value,
                        action1: $(element).find('.action1-wrap .custom-select')[0].value,
                        action2: $(element).find('.action2-wrap .custom-select')[0].value,
                        action3: $(element).find('.action3-wrap .custom-select')[0].value,
                        action4: $(element).find('.action4-wrap .custom-select')[0].value,
                    };
                    array.push(object);
                }
                else if(element.type == 'checkbox-group') {
                    var object = {
                        type: 'checkbox',
                        label: $(element).find('.option-label')[0].value,
                        selected: $(element).find('.option-selected')[0].value,
                    };
                    array.push(object);
                }
                else if(element.type == 'header') {
                    var object = {
                        type: 'header',
                        label: $(element).find('.label-wrap .fld-label')[0].innerHTML,
                    };
                    array.push(object);
                }
                else if(element.type == 'text') {
                    var object = {
                        type: 'text',
                        label: $(element).find('.label-wrap .fld-label')[0].innerHTML,
                        prefiled: $(element).find('.input-wrap .fld-preFilled')[0].value,
                    };
                    array.push(object);
                }
                else if(element.type == 'select') {
                    var object = {
                        type: 'dropdown',
                        label: $(element).find('.label-wrap .fld-label')[0].innerHTML,
                        multiple: $(element).find('.input-wrap .fld-multiple')[0].checked,
                        values: []
                    };
                    subelements = $(element).find('.form-group .sortable-options').children();
                    for (let j = 0; j < subelements.length; j++) {
                        object.values.push({
                            label: $(subelements[j]).find('.option-label')[0].value,
                            selected: $(subelements[j]).find('.option-selected')[0].value
                        });
                    }
                    array.push(object);
                }
            }
            formData.form_data_html = $('.frmb').html();
            formData.form_data_json = array;
            formData.button = 'preview';
            var mainData = [];
            $.ajax({
                type: "POST",
                url: "https://api.redenes.org/dev/v1/form-builder/",
                data: JSON.stringify(formData),
                dataType: "json",
                contentType:'application/json',
                success: function (res) {
                    mainData = res.objects
                    writeData();
                }
            })
            function writeData() {
                var tmp='';
                    for (var i = 0; i < mainData.length; i++) {
                        object = mainData[i];
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
                                tmp = tmp + "<div class='form-group'><div class='custom-control custom-checkbox small'><input type='checkbox' class='custom-control-input' id='incident_ob"+i.toString()+"_check"+j.toString()+"'";
                                if(object[j].pre_filled == 'true') {
                                    tmp = tmp + "checked";
                                }
                                if(content.status == 'false') {
                                    tmp = tmp + " disabled";
                                }
                                tmp = tmp + "><label class='custom-control-label' for='incident_ob"+i.toString()+"_check"+j.toString()+"'>"+object[j].check_box+"</label></div></div>";
                            }
                            else if(Object.keys(object[j])[0] == 'drop_down') {
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
                            else if(Object.keys(object[j])[0] == 'buttons') {
                                tmp = tmp + "<div class='d-flex justify-content-center'>";
                                for (let index = 0; index < object[j].buttons.length; index++) {
                                    tmp = tmp + "<button type='button' onclick='saveData("+i+','+j+','+index+")' class='btn my-1 mr-2' style='background-color:"+object[j].buttons[index].background+";color:"+object[j].buttons[index].text+"'></span><span class='text'>"+object[j].buttons[index].button+"</span></button>";
                                }
                                tmp = tmp + "</div>"
                            }
                        }
                        tmp = tmp + "</div></div>";
                    }   
                    document.getElementById("build-preview").innerHTML = tmp;
            }
        }
        else {
            $("#build-preview").hide();
            $("#build-wrap").show();
            $(this).text("Preview");
        }
        
    });
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