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
    $format_id = $_REQUEST['format_id'];
?>
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="vendor/jquery/jquery.min.js"></script>
<!-- Page level plugins -->


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
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include ('header.php'); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800">Form Logic Builder</h1>
                    
                        <div class="mb-4">  
                            <h4 class="mb-2">Format ID: <span id="formatID"></span></h4>
                            <h4 class="mb-2">Format Type: <span id="formatType"></span></h4>
                            <h4>Module Name: <span id="moduleName"></span></h4>
                            <h4>Format Name: <span id="formatName"></span></h4>
                            <div class="d-md-flex align-items-center">
                                <div class="align-items-center mt-2" role="group">
                                    <a href="#" class="btn btn-primary btn-icon-split" onclick="onPublish(e)">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-print"></i>
                                        </span>
                                        <span class="text">Publish</span>
                                    </a>
                                    <a href="#" class="btn btn-info btn-icon-split mx-2" onclick="testFormat(e)">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-forward"></i>
                                        </span>
                                        <span class="text">Test Format</span>
                                    </a>
                                    <a href="#" class="btn btn-success btn-icon-split mr-2" onclick="onSave(e)">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="text">Save</span>
                                    </a>
                                    <a href="#" class="btn btn-danger btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                        <span class="text">Cancel</span>
                                    </a>
                                </div>
                                <div id="alert" class="card mb-0 ml-md-5 mt-2 d-none">
                                    <div class="card-header py-2">
                                        <h6 id="alert-title" class="m-0 font-weight-bold text-danger"></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="15%">Element Type</th>
                                            <th width="15%">Label</th>
                                            <th width="15%">Value</th>
                                            <th width="9%">Action 1</th>
                                            <th width="9%">Action 2</th>
                                            <th width="9%">Action 3</th>
                                            <th width="9%">Action 4</th>
                                            <th width="9%">Action 5</th>
                                            <th width="9%">Action 6</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th width="15%">Element Type</th>
                                            <th width="15%">Label</th>
                                            <th width="15%">Value</th>
                                            <th width="9%">Action 1</th>
                                            <th width="9%">Action 2</th>
                                            <th width="9%">Action 3</th>
                                            <th width="9%">Action 4</th>
                                            <th width="9%">Action 5</th>
                                            <th width="9%">Action 6</th>
                                        </tr>
                                    </tfoot>
                                    <tbody id="table-content">
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
    <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <form id="createUserForm">
                <div id="modalFromContent">
                    <div class="row align-items-center mb-2">
                        <div class="col-4">
                            <h6 class="ml-2 mb-0 text-right">Action Name</h6>
                        </div>
                        <div class="col-8">
                            <div class="d-flex align-items-center">
                                <input type='text' class='form-control small' name="nameAction" id="nameAction" required />
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center mb-2">
                        <div class="col-4">
                            <h6 class="ml-2 mb-0 text-right" id="modalDropdownName1">N/A</h6>
                        </div>
                        <div class="col-8">
                            <div class="d-flex align-items-center">
                                <select name='groupType' onchange='getNextDropdown(event, 2)' id='modalDropdownContent1' aria-controls='dataTable' class='custom-select form-control form-control-sm' disabled>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center mb-2">
                        <div class="col-4">
                            <h6 class="ml-2 mb-0 text-right" id="modalDropdownName2">N/A</h6>
                        </div>
                        <div class="col-8">
                            <div class="d-flex align-items-center">
                                <select name='groupType' onchange='getNextDropdown(event, 3)' id='modalDropdownContent2' aria-controls='dataTable' class='custom-select form-control form-control-sm' disabled>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center mb-2">
                        <div class="col-4">
                            <h6 class="ml-2 mb-0 text-right" id="modalDropdownName3">N/A</h6>
                        </div>
                        <div class="col-8">
                            <div class="d-flex align-items-center">
                                <select name='groupType' onchange='getNextDropdown(event, 4)' id='modalDropdownContent3' aria-controls='dataTable' class='custom-select form-control form-control-sm' disabled>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center mb-2">
                        <div class="col-4">
                            <h6 class="ml-2 mb-0 text-right" id="modalDropdownName4">N/A</h6>
                        </div>
                        <div class="col-8">
                            <div class="d-flex align-items-center">
                                <select name='groupType' onchange='getNextDropdown(event, 5)' id='modalDropdownContent4' aria-controls='dataTable' class='custom-select form-control form-control-sm' disabled>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center mb-2">
                        <div class="col-4">
                            <h6 class="ml-2 mb-0 text-right" id="modalDropdownName5">N/A</h6>
                        </div>
                        <div class="col-8">
                            <div class="d-flex align-items-center">
                                <select name='groupType' onchange='getNextDropdown(event, 6)' id='modalDropdownContent5' aria-controls='dataTable' class='custom-select form-control form-control-sm' disabled>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center mb-2">
                        <div class="col-4">
                            <h6 class="ml-2 mb-0 text-right" id="modalDropdownName6">N/A</h6>
                        </div>
                        <div class="col-8">
                            <div class="d-flex align-items-center">
                                <select name='groupType' id='modalDropdownContent6' aria-controls='dataTable' class='custom-select form-control form-control-sm' disabled>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mt-4" id="modal-btn-wrapper">
                    <button type="submit" class='nav-link btn btn-success btn-icon-split my-1 mr-4'><span class='icon text-white-50'><i class='fas fa-plus'></i></span><span class='text'>Save</span></button>
                    <button type="submit" onclick="closeModal()" class='nav-link btn btn-danger btn-icon-split my-1'><span class='icon text-white-50'><i class='fas fa-minus'></i></span><span class='text'>Cancel</span></button>
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

    <script>
        init_id = "<?php echo $agency_id;?>";
        actinoNumber = 0;
        function getData(agency_id) {
            $.ajax({
                type: "GET",
                url: "https://api.redenes.org/dev/v1/format-logic-builder/?authorization=737b1459-25b4-4397-915f-f1f949c9d612&agency_id=737b1459-25b4-4397-915f-f1f949c9d611",
                async:false,
                success: function (res) {
                    writeData(res);
                    writeTable();
                    document.getElementById("my-loader-element").classList.remove("loader");                
                    document.getElementById("my-loader-wrapper").classList.add("d-none");
                }
            })
        }
        getData(init_id);
        document.getElementById("my-loader-element").classList.remove("loader");                
        document.getElementById("my-loader-wrapper").classList.add("d-none");                   
        function writeData(data) {
            var tmp = '';
            row = 0;
            // var button = "<button class='btn btn-primary' onclick='addAction(event)'>Add Action</button>";
            writeMetaData(data.form_id, data.form_name, data.module, data.type);
            objects = data.objects;
            for (var i = 0; i < objects.length; i++) {
                for (var j = 0; j < objects[i].length; j++) {
                    if(Object.keys(objects[i][j])[0] == 'title') {
                        tmp +="<tr>";
                        tmp +="<td>Header</td>";
                        tmp +="<td>"+objects[i][j].title+"</td>";
                        tmp +="<td></td><td></td><td></td><td></td><td></td><td></td><td></td>";
                        tmp +="</tr>";
                        row++;
                    }
                    else if(Object.keys(objects[i][j])[0] == 'drop_down') {
                        tmp += "<tr>";
                        tmp += "<td>Drop Down</td>";
                        tmp += "<td>"+objects[i][j].drop_down+"</td>";
                        tmp += "<td>"+objects[i][j].pre_filled[0]+"</td>";
                        tmp += "<td>"+"<button class='btn btn-primary' onclick='addAction(event,"+row+",0,0"+")'>Add Action</button>"+"</td>";
                        tmp += "<td></td><td></td><td></td><td></td><td></td>";
                        tmp += "</tr>";
                        row++;
                        for (var k = 1; k < objects[i][j].pre_filled.length; k++) {
                            tmp += "<tr>";
                            tmp += "<td></td><td></td>";
                            tmp += "<td>"+objects[i][j].pre_filled[k]+"</td>";
                            tmp += "<td>"+"<button class='btn btn-primary' onclick='addAction(event,"+(row)+",0,"+k+")'>Add Action</button>"+"</td>";
                            tmp += "<td></td><td></td><td></td><td></td><td></td>";
                            tmp += "</tr>";
                            row++;
                        }
                    }
                    else if(Object.keys(objects[i][j])[0] == 'buttons') {
                        for (var k = 0; k < objects[i][j].buttons.length; k++) {
                            tmp += "<tr>";
                            tmp += "<td>Button</td>";
                            tmp += "<td>"+objects[i][j].buttons[k].button+"</td>";
                            tmp += "<td>True</td>";
                            tmp += "<td>"+"<button class='btn btn-primary' onclick='addAction(event,"+row+",0,0"+")'>Add Action</button>"+"</td>";
                            tmp += "<td></td><td></td><td></td><td></td><td></td>";
                            tmp += "</tr>";
                            row++;
                        }
                    }
                    else if(Object.keys(objects[i][j])[0] == 'button') {
                        tmp += "<tr>";
                        tmp += "<td>Button</td>";
                        tmp += "<td>"+objects[i][j].button.button+"</td>";
                        tmp += "<td>True</td>";
                        tmp += "<td>"+"<button class='btn btn-primary' onclick='addAction(event,"+row+",0,0"+")'>Add Action</button>"+"</td>";
                        tmp += "<td></td><td></td><td></td><td></td><td></td>";
                        tmp +="</tr>";
                        row++;
                    }  
                    else if(Object.keys(objects[i][j])[0] == 'text_box') {
                        tmp += "<tr>";
                        tmp += "<td>Text Box</td>";
                        tmp += "<td>"+objects[i][j].text_box+"</td>";
                        tmp += "<td>"+objects[i][j].pre_filled+"</td>";
                        tmp += "<td>"+"<button class='btn btn-primary' onclick='addAction(event,"+row+",0,0"+")'>Add Action</button>"+"</td>";
                        tmp += "<td></td><td></td><td></td><td></td><td></td>";
                        tmp +="</tr>";
                        row++;
                    }
                    else if(Object.keys(objects[i][j])[0] == 'check_box') {
                        tmp += "<tr>";
                        tmp += "<td>Check Box</td>";
                        tmp += "<td>"+objects[i][j].check_box+"</td>";
                        tmp += "<td>True</td>";
                        tmp += "<td>"+"<button class='btn btn-primary' onclick='addAction(event,"+row+",0,0"+")'>Add Action</button>"+"</td>";
                        tmp += "<td></td><td></td><td></td><td></td><td></td>";
                        tmp +="</tr>";
                        tmp += "<tr><td></td><td></td><td>False</td><td>"+"<button class='btn btn-primary' onclick='addAction(event,"+(row+1)+",0,1"+")'>Add Action</button>"+"</td><td></td><td></td><td></td><td></td><td></td></tr>";
                        row+=2;
                    }
                    else if(Object.keys(objects[i][j])[0] == 'divider') {
                        tmp += "<tr>";
                        tmp += "<td>Divider</td>";
                        tmp += "<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>";
                        tmp +="</tr>";
                        row++;
                    }

                }
            }
            document.getElementById('table-content').innerHTML = tmp;
        }
        function writeTable() {
            rowCount = document.getElementById('table-content').children.length;
            table = document.getElementById('table-content');
            for (let row = 0; row < rowCount; row++) {
                count = 0;
                for (let col = 3; col < 9; col++) {
                    if(localStorage.getItem('get_'+row+'_'+(col-3)+'_0')) {
                        count++;
                        data = JSON.parse(localStorage.getItem('get_'+row+'_'+(col-3)+'_0'));
                        table.children[row].children[col].innerHTML = "<a href='#' onclick='getAction(event, "+row+","+(col-3)+",0)'>"+data.actionName+"</a>";
                        if(col<8) {
                            table.children[row].children[col+1].innerHTML = "<button class='btn btn-primary' onclick='addAction(event,"+row+","+(col-2)+",0)'>Add Action</button>";
                        }
                        for (let k = col+2; k < 9; k++) {
                            table.children[row].children[k].innerHTML = "";
                        }
                    }
                }
                if(count == 0) {
                    if(table.children[row].children[0].innerHTML =='Header' || table.children[row].children[0].innerHTML =='Divider') {
                        table.children[row].children[3].innerHTML = "";
                    }
                    else {
                        table.children[row].children[3].innerHTML = "<button class='btn btn-primary' onclick='addAction(event,"+row+",0,0)'>Add Action</button>";
                        for (let k = 4; k < 9; k++) {
                            table.children[row].children[k].innerHTML = "";
                        }
                    }
                }
            }
        }
        function writeMetaData(id, name, module, type) {
            document.getElementById('formatID').innerHTML = id;
            document.getElementById('formatName').innerHTML = name;
            document.getElementById('moduleName').innerHTML = module;
            document.getElementById('formatType').innerHTML = type;
        }
        var modal = document.getElementById("myModal");
        // Get the button that opens the modal
        // var modalBtn = document.getElementById("openModal");
        // Get the <span> element that closes the modal
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
        var authorization = "<?php echo $authorization;?>";
        var agency_id = "<?php echo $agency_id;?>";     
        function addAction(e, row, col, item_number) {
            e.preventDefault();
            tdElement = e.currentTarget.parentNode;
            trElement = tdElement.parentNode;   
            action = trElement.firstChild.innerHTML.toLowerCase().replace(' ', '_');
            if(action == '') {
                tableElement = trElement.parentNode;
                for (let index = row; index > 0; index--) {
                    if(tableElement.children[index].children[0].innerHTML != '') {
                        action = tableElement.children[index].children[0].innerHTML.toLowerCase().replace(' ', '_');
                        console.log(tableElement.children[index].children[0].innerHTML);
                        console.log(action);
                        break;
                    }
                }
            }
            var formData = {
                authorization: authorization,
                agency_id: agency_id,
                action: action
            }
            
            $.ajax({
                type: "POST",
                url: "https://api.redenes.org/dev/v1/format-logic-builder",
                data: JSON.stringify(formData),
                dataType: "json",
                contentType:'application/json',
                async:false,
                success: function (res) {
                    writeModal(res.name, res.pre_filled, row, col, 0);
                    // writeData(res);
                    // document.getElementById("my-loader-element").classList.remove("loader");                
                    // document.getElementById("my-loader-wrapper").classList.add("d-none");
                }
            })
        }
        function writeModal(name, content, row, col, item_number) {
            var tmp = '';
            document.getElementById("modalDropdownName1").innerHTML = name;
            for (let index = 0; index < content.length; index++) {
                const element = content[index];
                tmp += "<option value='"+content[index]+"'>"+content[index]+"</option>";
            }
            document.getElementById("modalDropdownContent1").innerHTML = tmp;
            document.getElementById("modalDropdownContent1").removeAttribute('disabled');            
            document.getElementById("modal-btn-wrapper").innerHTML = "<button type='button' onclick='saveAction(event, "+row+","+col+","+item_number+")' class='nav-link btn btn-success btn-icon-split my-1 mr-4'><span class='icon text-white-50'><i class='fas fa-plus'></i></span><span class='text'>Save</span></button><button type='submit' onclick='closeModal()' class='nav-link btn btn-danger btn-icon-split my-1'><span class='icon text-white-50'><i class='fas fa-minus'></i></span><span class='text'>Cancel</span></button>";
            openModal();
        }
        function getNextDropdown(e, i) {
            if(i < 6) {
                for (let index = i; index < 6; index++) {
                    document.getElementById('modalDropdownName'+index.toString()).innerHTML = 'N/A';
                    document.getElementById('modalDropdownContent'+index.toString()).innerHTML = '';
                    document.getElementById('modalDropdownContent'+index.toString()).setAttribute('disabled', true);
                }
            }
            var formData = {
                authorization: authorization,
                agency_id: agency_id,
                action: e.currentTarget.value
            }
            $.ajax({
                type: "POST",
                url: "https://api.redenes.org/dev/v1/format-logic-builder",
                data: JSON.stringify(formData),
                dataType: "json",
                contentType:'application/json',
                async:false,
                success: function (res) {
                    if(res.name == 'N/A')
                        return;
                    tmp = '';
                    document.getElementById("modalDropdownName"+i).innerHTML = res.name;
                    for (let index = 0; index < res.pre_filled.length; index++) {   
                        tmp += "<option value='"+res.pre_filled[index]+"'>"+res.pre_filled[index]+"</option>";
                    }
                    document.getElementById("modalDropdownContent"+i).innerHTML = tmp;
                    document.getElementById("modalDropdownContent"+i).removeAttribute('disabled');
                }
            })
        }
        function openModal() {
           modal.style.display = "block";
        }
        function closeModal() {
            cleanModal();
            modal.style.display = "none";
        }
        function saveAction(e, row, col, item_number) {
            console.log(col);
            actionName = document.getElementById('nameAction').value;
            if(actionName == '') {
                window.alert('Name Auction should not be empty');
                return;
            }
            names = [];
            content = [];
            dropdowns = [];
            for (let index=1; index < 7; index++) {
                dropdown = document.getElementById('modalDropdownContent'+index);
                if(dropdown.children.length > 0) {
                    tmp = [];
                    for (let j = 0; j < dropdown.children.length; j++) {
                        tmp.push(dropdown.children[j].innerHTML);
                    }
                }
                else {
                    tmp = '';
                }
                dropdowns.push(tmp);
            }
            for (let index=1; index < 7; index++) {
                if((document.getElementById('modalDropdownName'+index)).innerHTML == 'N/A') {
                    names.push('');    
                }
                else {
                    names.push((document.getElementById('modalDropdownName'+index)).innerHTML);
                }
                if((document.getElementById('modalDropdownContent'+index)).value == 'Please Make a Selection') {
                    content.push('');
                }
                else {
                    content.push((document.getElementById('modalDropdownContent'+index)).value);
                }
            }
            var data = {
                row: row,
                col: col,
                item_number: item_number,
                names: names,
                content: content,
                actionName: actionName,
                dropdowns: dropdowns 
            }
            localStorage.setItem("get_"+row.toString()+"_"+col.toString()+"_"+item_number.toString(), JSON.stringify(data));
            nextAction(row, col, item_number, actionName);
        }
        function nextAction(row, col, item_number, actionName) {
            tmp = "<a href='#' onclick='getAction(event, "+row+","+col+","+item_number+")'>"+actionName+"</a>";
            document.getElementById('table-content').children[row].children[col+3].innerHTML = tmp;
            if(col<5) {
                document.getElementById('table-content').children[row].children[col+4].innerHTML = "<button class='btn btn-primary' onclick='addAction(event,"+row+","+(col+1)+","+item_number+")'>Add Action</button>";
            }
            cleanModal();
            closeModal();
        }
        function getAction(e, row, col, item_number) {
            e.preventDefault();
            data = localStorage.getItem("get_"+row.toString()+"_"+col.toString()+"_"+item_number.toString());
            data = JSON.parse(data);

            document.getElementById("nameAction").value = data.actionName;
            names = data.names;
            contents = data.content;
            dropdowns = data.dropdowns;
            for (let i = 0; i < 6; i++) {
                if(contents[i] != '') {
                    tmp = '';
                    for (let j = 0; j < dropdowns[i].length; j++) {
                        tmp += "<option value='"+dropdowns[i][j]+"'";
                        if(dropdowns[i][j] == contents[i]) {
                            tmp += " selected";
                        }
                        tmp +=">"+dropdowns[i][j]+"</option>";
                    }
                    document.getElementById("modalDropdownContent"+(i+1)).removeAttribute('disabled');        
                    document.getElementById("modalDropdownName"+(i+1)).innerHTML = names[i];
                    document.getElementById("modalDropdownContent"+(i+1)).innerHTML = tmp;        
                }
                else {
                    document.getElementById("modalDropdownName"+(i+1)).innerHTML = 'N/A';
                    document.getElementById("modalDropdownContent"+(i+1)).innerHTML = '';
                    document.getElementById("modalDropdownContent"+(i+1)).setAttribute('disabled', true);
                }
            }
            tmp = "<button type='button' onclick='saveAction(event, "+row+","+col+","+item_number+")' class='nav-link btn btn-success btn-icon-split my-1 mr-2'><span class='icon text-white-50'><i class='fas fa-plus'></i></span><span class='text'>Save</span></button><button type='submit' onclick='closeModal()' class='nav-link btn btn-danger btn-icon-split my-1'><span class='icon text-white-50'><i class='fas fa-minus'></i></span><span class='text'>Cancel</span></button>";
            tmp += "<button type='button' onclick='deleteAction(event, "+row+","+col+","+item_number+")' class='nav-link btn btn-danger btn-icon-split my-1 ml-2'><span class='icon text-white-50'><i class='fas fa-trash'></i></span><span class='text'>Delete</span></button>";
            document.getElementById("modal-btn-wrapper").innerHTML = tmp;
            openModal();
        }
        function deleteAction(e, row, col, item_number) {
            for (let index = col; index < 6; index++) {
                next = localStorage.getItem('get_'+row+'_'+(index+1)+'_'+item_number);
                if(next) {
                    localStorage.setItem('get_'+row+'_'+index+'_'+item_number, next);
                }
                else {
                    localStorage.removeItem('get_'+row+'_'+index+'_'+item_number);
                }
            }
            writeTable();
            closeModal();
        }
        function cleanModal() {
            document.getElementById("nameAction").value = '';
            document.getElementById("modalDropdownName2").innerHTML = 'N/A';
            document.getElementById("modalDropdownContent2").innerHTML = '';
            document.getElementById("modalDropdownContent2").setAttribute('disabled', true);
            document.getElementById("modalDropdownName3").innerHTML = 'N/A';
            document.getElementById("modalDropdownContent3").innerHTML = '';
            document.getElementById("modalDropdownContent3").setAttribute('disabled', true);
            document.getElementById("modalDropdownName4").innerHTML = 'N/A';
            document.getElementById("modalDropdownContent4").innerHTML = '';
            document.getElementById("modalDropdownContent4").setAttribute('disabled', true);
            document.getElementById("modalDropdownName5").innerHTML = 'N/A';
            document.getElementById("modalDropdownContent5").innerHTML = '';
            document.getElementById("modalDropdownContent5").setAttribute('disabled', true);
            document.getElementById("modalDropdownName6").innerHTML = 'N/A';
            document.getElementById("modalDropdownContent6").innerHTML = '';
            document.getElementById("modalDropdownContent6").setAttribute('disabled', true);
        }
        //$('#dataTable').dataTable();
    </script>
</body>

</html>
<?php }  ?>