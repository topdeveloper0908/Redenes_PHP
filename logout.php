<?php
session_start();
session_destroy(); // destroy session
setcookie("name", "", time() - 3600);
setcookie("agency_name", "", time() - 3600);
setcookie("agencies_id", "", time() - 3600);
setcookie("authorization", "", time() - 3600);
setcookie("agency", "", time() - 3600);
setcookie("agency_id", "", time() - 3600);
header("location:login");
