<?php
session_start();
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
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="username" name="username" aria-describedby="emailHelp"
                                                placeholder="Enter Name..." required="">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="password" name="password" placeholder="Password" required="">
                                        </div>
                                        <p id="danger-txt" class="d-none text-danger text-center">The username or password is incorrect</p>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register">Create an Account!</a>
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
                var formData = {
                    email_address: $("#username").val(),
                    password: $("#password").val(),
                    platform: "Website"
                };
                $.ajax({
                    type: "POST",
                    url: "https://api.redenes.org/dev/v1/login/",
                    data: JSON.stringify(formData),
                    dataType: "json",
                    cors: true ,
                    secure: true,
                    contentType:'application/json',
                    headers: {
                        'Access-Control-Allow-Origin': '*',
                        'Access-Control-Allow-Credentials': 'false',
                        'Access-Control-Allow-Methods': 'GET,HEAD,OPTIONS,POST,PUT',
                        'Access-Control-Allow-Headers': 'Access-Control-Allow-Headers, Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers'
                    },
                    encode: true,
                    success: function (data) {
                        document.cookie = "name = " + $("#username").val();
                        var tmp='';
                        var tmp1='';
                        var index = 0;
                        if(data.agencies.length == 0) {
                            document.cookie = "authorization = " + data.authorization;
                            window.location.replace("register-agency");
                        }
                        data.agencies.forEach(element => {
                            auth = tmp + data.authorization 
                            tmp = tmp + element.agency_name + '$$';
                            tmp1 = tmp1 + element.agency_id + '$$';
                            if(index == 0) {
                                document.cookie = "agency_id = " + element.agency_id;        
                            }
                            index++;
                        });
                        document.cookie = "authorization = " + data.authorization;
                        document.cookie = "agency = " + tmp;
                        document.cookie = "agencies_id = " + tmp1;
                        document.cookie = "agency_name = " + data.agencies[0].agency_name;
                    },
                    complete: function(data) {
                        if(data.status == 404) {
                            document.getElementById('danger-txt').classList.remove('d-none');
                        }
                        else  {
                            window.location.replace("new-incident");
                        }
                    }
                })
                event.preventDefault();
            });
        });
    </script>

</body>

</html>