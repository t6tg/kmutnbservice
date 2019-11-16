<?php
session_start();
require_once('../../Database/Database.php');
if ($_SESSION['username'] == "" || $_SESSION['status'] != "admin") {
    header('Location: ../logout.php');
}
$name = $_SESSION['name'];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>KMUTNB SERVICE | ADMIN</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../asset/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../asset/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../asset/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="../asset/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../asset/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="../asset/bower_components/morris.js/morris.css">
    <link rel="stylesheet" href="../asset/bower_components/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="../asset/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="../asset/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="../asset/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link href="https://fonts.googleapis.com/css?family=Kanit:300,400,500,700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Kanit', sans-serif;
        }
    </style>
</head>

<body onload="startTime()" class="hold-transition skin-purple sidebar-mini">
    <!-- main -->
    <nav class="main-header">
        <a href="./index.php" class="logo">
            <span class="logo-mini"><b>K</b>SER</span>
            <span class="logo-lg"><b>KMUNTB</b>SERVICE</span>
        </a>
        <nav class="navbar navbar-static-top">
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="../asset/img/project.svg" class="user-image" alt="User Image">
                            <span class="hidden-xs"><?php echo $name; ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-header">
                                <img src="../asset/img/project.svg" class="img-circle" alt="User Image">
                                <p>
                                    <?php echo $name; ?>
                                    <small>Maneger</small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-right">
                                    <a href="../logout.php" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </nav>
    <!-- aside -->
    <aside class="main-sidebar">
        <section class="sidebar">
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="../asset/img/project.svg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?php echo $name ?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <ul class="sidebar-menu" data-widget="tree">
                <li class="active"><a href="./"><i class="fa fa-home"></i>
                        <span>Dashboard</span></a></li>
                <li class=" treeview">
                    <a href="#">
                        <i class="fa fa-user"></i> <span>ลูกค้า</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="customer.php?s=regis"><i class="fa fa-circle-o"></i>ลงทะเบียนสินค้า</a></li>
                        <li><a href="customer.php?s=name"><i class="fa fa-circle-o"></i>ประวัติการลงทะเบียนสินค้า</a>
                        </li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-archive"></i> <span>สินค้า</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="product.php?s=col"><i class="fa fa-circle-o"></i>หมวดหมู่สินค้า</a></li>
                        <li><a href="product.php?s=all"><i class="fa fa-circle-o"></i>สินค้าทั้งหมดภายในคลัง</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-hourglass-half"></i> <span>สถานะแจ้งซ่อม</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="service.php?s=stat"><i class="fa fa-circle-o"></i>สถิติ</a></li>
                        <li><a href="service.php?s=edit"><i class="fa fa-circle-o"></i>แก้ไขสถานะซ่อมสินค้า</a></li>
                        <li><a href="service.php?s=check"><i class="fa fa-circle-o"></i>ตรวจสอบสถานะสินค้า</a></li>
                    </ul>
                </li>
                <li><a href="admin.php"><i class="fa fa-lock"></i>
                        <span>ผู้ดูแลระบบ</span></a></li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
    <!-- constat -->
    <div class="content-wrapper">
        <div class="container">
            <center>
                <div class="row" style="margin-top:20px;padding: 20px;border: solid black 2px;width: 50%">
                    <i style="font-size: 60px;" class="ion ion-clock"></i><br>
                    <span style="font-size: 30px"><?php echo Date('d-m-Y'); ?></span>
                    <div style="font-size: 40px" id="txt"></div>
                </div>
            </center>
            <div class="row" style="margin-top:20px;">
                <div class="col-lg-6 col-xs-6">
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3><?php echo mysqli_num_rows(mysqli_query($conn,"SELECT * FROM report")) ?></h3>

                            <p>จำนวนแจ้งซ่อมทั้งหมด</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-hammer"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xs-6">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3><?php echo mysqli_num_rows(mysqli_query($conn,"SELECT * FROM report where status='3'")) ?></h3>

                            <p>รายการที่ซ่อมเสร็จแล้ว</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-checkmark"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xs-6">
                    <div class="small-box bg-yellow">
                        <div class="inner">
                        <h3><?php echo mysqli_num_rows(mysqli_query($conn,"SELECT * FROM report where status!='3'")) ?></h3>

                            <p>รายการที่ซ่อมยังไม่เสร็จ</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-alert"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xs-6">
                    <div class="small-box bg-red">
                        <div class="inner">
                        <h3><?php echo mysqli_num_rows(mysqli_query($conn,"SELECT * FROM categories")) ?></h3>

                            <p>หมวดหมู่สินค้าในคลัง</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-cube"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- script -->
    <script>
        function startTime() {
            var today = new Date();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('txt').innerHTML =
                h + ":" + m + ":" + s;
            var t = setTimeout(startTime, 500);
        }

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i
            };
            return i;
        }
    </script>
    <script src="../asset/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="../asset/bower_components/jquery-ui/jquery-ui.min.js"></script>
    <script src="../asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../asset/bower_components/raphael/raphael.min.js"></script>
    <script src="../asset/bower_components/morris.js/morris.min.js"></script>
    <script src="../asset/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <script src="../asset/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="../asset/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../asset/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
    <script src="../asset/bower_components/moment/min/moment.min.js"></script>
    <script src="../asset/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="../asset/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="../asset/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <script src="../asset/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="../asset/bower_components/fastclick/lib/fastclick.js"></script>
    <script src="../asset/dist/js/adminlte.min.js"></script>
    <script src="../asset/dist/js/pages/dashboard.js"></script>
    <script src="../asset/dist/js/demo.js"></script>
</body>

</html>