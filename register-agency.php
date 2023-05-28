<?php
session_start();
error_reporting(0);
$authorization = $_COOKIE['authorization'];
$user = $_COOKIE['name'];
if (strlen($user) == 0) {
    header('location:logout');
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
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <div id="my-loader-element"></div>
    <div id="my-loader-wrapper"></div>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <form id="myform">
                        <div class="d-flex align-items-baseline justify-content-between">
                            <!-- Page Heading -->
                            <h1 class="h3 mt-5 mb-4 text-gray-800">Register Agency</h1>
                        </div>

                        <!-- Content Row -->
                        <div class="row">

                            <div class="col-lg-6">

                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Agency Information</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Agency Name</label>
                                            <input type="text" class="form-control form-control-user" id="agency-name" placeholder="Enter Agency Name..." required>
                                        </div>
                                        <div class="form-group">
                                            <label>Agency Abbreviation</label>
                                            <input type="text" class="form-control form-control-user" id="agency-abbreviation" placeholder="Enter Agency Abbreviation..." required>
                                        </div>
                                        <div class="form-group">
                                            <label>Agency Type</label>
                                            <select id="agency-type" name='dataTable_length' aria-controls='dataTable' class='custom-select form-control-sm'></select>
                                        </div>
                                    </div>
                                </div>

                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Physical Address</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Street</label>
                                            <input type="text" class="form-control form-control-user" id="agency-street" placeholder="Enter Agency Street..." required>
                                        </div>
                                        <div class="form-group">
                                            <label>Unit</label>
                                            <input type="text" class="form-control form-control-user" id="agency-unit" placeholder="Enter Agency Unit...">
                                        </div>
                                        <div class="form-group">
                                            <label>City</label>
                                            <input type="text" class="form-control form-control-user" id="agency-city" placeholder="Enter Agency City..." required>
                                        </div>
                                        <div class="form-group">
                                            <label>State</label>
                                            <input type="text" class="form-control form-control-user" id="agency-state" placeholder="Enter Agency State..." required>
                                        </div>
                                        <div class="form-group">
                                            <label>Agency Zip Code</label>
                                            <input type="text" class="form-control form-control-user" id="agency-zipcode" placeholder="Enter Agency Zip Code..." required>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-6">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Contact Information</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Agency Phone Number</label>
                                            <input type="text" class="form-control form-control-user" id="agency-phone" placeholder="Enter Phone Number..." required>
                                        </div>
                                        <div class="form-group">
                                            <label>Agency Email Address</label>
                                            <input type="email" class="form-control form-control-user" id="agency-email" placeholder="Enter Agency Email..." required>
                                        </div>
                                        <div class="form-group">
                                            <label>Website</label>
                                            <input type="text" class="form-control form-control-user" id="agency-website" placeholder="Enter Agency Website..." required>
                                        </div>
                                    </div>
                                </div>

                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Mailing Address</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Street</label>
                                            <input type="text" class="form-control form-control-user" id="agency-P-street" placeholder="Enter Street..." required>
                                        </div>
                                        <div class="form-group">
                                            <label>Unit</label>
                                            <input type="text" class="form-control form-control-user" id="agency-P-unit" placeholder="Enter Unit...">
                                        </div>
                                        <div class="form-group">
                                            <label>City</label>
                                            <input type="text" class="form-control form-control-user" id="agency-P-city" placeholder="Enter City..." required>
                                        </div>
                                        <div class="form-group">
                                            <label>State</label>
                                            <input type="text" class="form-control form-control-user" id="agency-P-state" placeholder="Enter State..." required>
                                        </div>
                                        <div class="form-group">
                                            <label>Zip Code</label>
                                            <input type="text" class="form-control form-control-user" id="agency-P-zipcode" placeholder="Enter Zip Code..." required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-5">
                            <button id="save-btn" type="submit" class="btn btn-success btn-icon-split my-1 mr-2">
                                <span class="icon text-white-50">
                                    <i class="fas fa-check"></i>
                                </span>
                                <span class="text">Register Agency</span>
                            </button>
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
        init_id = "<?php echo $agency_id; ?>";

        function getData(agency_id) {
            $.ajax({
                type: "GET",
                url: "https://api.redenes.org/dev/v1/register-agency/",
                data: {
                    agency_id: agency_id,
                    authorization: "<?php echo $authorization; ?>"
                },
                async: false,
                success: function(res) {
                    console.log(res);
                    writeAgencyType(res.account_type);
                    // To hide the loader
                    document.getElementById("my-loader-element").classList.remove("loader");
                    document.getElementById("my-loader-wrapper").classList.add("d-none");
                }
            })
        }

        function writeAgencyType(data) {
            tmp = '';
            for (let index = 0; index < data.length; index++) {
                console.log(data[index]);
                for (const key in data[index]) {
                    const element = data[index][key];
                    tmp += "<option value='" + key + "'>" + data[index][key] + "</option>";
                }
            }
            document.getElementById('agency-type').innerHTML = tmp;
        }
        getData(init_id);
        document.getElementById("my-loader-element").classList.remove("loader");
        document.getElementById("my-loader-wrapper").classList.add("d-none");
        document.getElementById('myform').addEventListener('submit', function(e) {
            e.preventDefault(); //to prevent form submission
            console.log(document.getElementById('agency-type').value);
            if (document.getElementById('agency-type').value == 'Please Select and Agency') {
                window.alert('You should select the agency type');
                return;
            }
            document.getElementById("my-loader-element").classList.add("loader");
            var authorization = "<?php echo $authorization; ?>";
            var formData = {
                authorization: authorization.toString(),
                agency_settings: [{
                    agency_information: [{
                        agency_name: document.getElementById('agency-name').value,
                        agency_abbreviation: document.getElementById('agency-abbreviation')
                            .value,
                        agency_type: document.getElementById('agency-type')
                            .value,
                    }],
                    contact_information: [{
                        phone_number: document.getElementById('agency-phone').value,
                        email_address: document.getElementById('agency-email').value,
                        website: document.getElementById('agency-website').value
                    }],
                    physical_address: [{
                        street: document.getElementById('agency-street').value,
                        unit: document.getElementById('agency-unit').value,
                        city: document.getElementById('agency-city').value,
                        state: document.getElementById('agency-state').value,
                        zip_code: document.getElementById('agency-zipcode').value,
                    }],
                    mailing_address: [{
                        street: document.getElementById('agency-P-street').value,
                        unit: document.getElementById('agency-P-unit').value,
                        city: document.getElementById('agency-P-city').value,
                        state: document.getElementById('agency-P-state').value,
                        zip_code: document.getElementById('agency-P-zipcode').value
                    }]
                }]
            };
            console.log(formData);
            $.ajax({
                type: "POST",
                url: "https://api.redenes.org/dev/v1/register-agency/",
                data: JSON.stringify(formData),
                dataType: "json",
                contentType: 'application/json',
                success: function(data) {
                    var tmp = '';
                    var tmp1 = '';
                    var index = 0;
                    data.agencies.forEach(element => {
                        auth = tmp + data.authorization
                        tmp = tmp + element.agency_name + '$$';
                        tmp1 = tmp1 + element.agency_id + '$$';
                        if (index == 0) {
                            document.cookie = "agency_id = " + element.agency_id;
                        }
                        index++;
                    });
                    document.cookie = "authorization = " + data.authorization;
                    document.cookie = "agency = " + tmp;
                    document.cookie = "agencies_id = " + tmp1;
                    document.cookie = "agency_name = " + data.agencies[0].agency_name;
                    document.getElementById("my-loader-element").classList.remove("loader");
                    document.getElementById("my-loader-wrapper").classList.add("d-none");
                    window.location.replace("new-incident");
                }
            })
        });
    </script>

</body>

</html>