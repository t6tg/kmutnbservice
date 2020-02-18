<?php
session_start();
require_once('../Database/Database.php');
if ($_SESSION['username'] != "" && $_SESSION['status'] == "admin") {
    header('Location: ./main');
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>KMUTNB SERVICE</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="./asset/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./asset/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="./asset/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="./asset/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="./asset/plugins/iCheck/square/blue.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>KMUTNB</b>SERVICE</a>
        </div>
        <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <form action="checklogin.php"  method="post" onsubmit="return login()" >
                <div class="form-group has-feedback">
                    <input type="text" id="username" name="username" class="form-control" placeholder="Username">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <button  class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                </div>
            </form>
        </div><br>
        <center><a href="../">< Back</a></center>
    </div>
    <script src="./asset/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="./asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./asset/plugins/iCheck/icheck.min.js"></script>
    </script>
    <script>
        function login(){
        var user = document.getElementById('username').value
        var pass = document.getElementById('password').value
            if(user.trim() === ""){
                alert('Please input username')
                return false;
            }else if(pass.trim() == ""){
                alert('Please input password')
                return false;
            }
        }
    </script>
</body>

</html>
