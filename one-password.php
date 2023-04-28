<?php  
$phone = $_COOKIE['cell_number'];
if (strlen($phone) == 0) {
    header('location:forgot-password');
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

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-one-image">
                                <img src="img/icon.png" alt="...">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">One Time Password</h1>
                                    </div>
                                    <form class="user">
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="password" name="password" aria-describedby="emailHelp"
                                                placeholder="Enter Code..." required>
                                        </div>
                                        <p id="danger-txt" class="d-none text-danger text-center">Incorrect Code</p>
                                        <button class="btn btn-primary btn-user btn-block">
                                            Send Code
    </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="register">Create an Account!</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="login">Already have an account? Login!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script>
        $(document).ready(function () {
            $("form").submit(function (event) {
                cell_number = <?php echo $phone;?>;
                var formData = {
                    one_time_password: $("#password").val(),
                    cell_number: cell_number.toString()
                };
                $.ajax({
                    type: "POST",
                    url: "https://api.redenes.org/dev/v1/one-time-password/",
                    data: JSON.stringify(formData),
                    dataType: "json",
                    contentType:'application/json',
                    complete: function(data) {
                        if(data.status == 404) {
                            document.getElementById('danger-txt').classList.remove('d-none');
                        }
                        else if(data.status == 200) {
                            window.location.replace("update-password");
                        }
                    }
                })
                event.preventDefault();
            });
        });
    </script>
</body>

</html>