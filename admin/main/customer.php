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
        html,
        body {
            font-family: 'Kanit', sans-serif;
        }
    </style>
</head>

<body class="hold-transition skin-purple sidebar-mini">
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
                <li><a href="./"><i class="fa fa-home"></i>
                        <span>Dashboard</span></a></li>
                <li class="active treeview">
                    <a href="#">
                        <i class="fa fa-user"></i> <span>ลูกค้า</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <?php if($_GET['s'] == "regis"){?>
                        <li class="active"><a href="customer.php?s=regis"><i
                                    class="fa fa-circle-o"></i>ลงทะเบียนสินค้า</a></li>
                        <li><a href="customer.php?s=name"><i class="fa fa-circle-o"></i>ประวัติการลงทะเบียนสินค้า</a>
                        </li>
                        <?php }else{?>
                        <li><a href="customer.php?s=regis"><i class="fa fa-circle-o"></i>ลงทะเบียนสินค้า</a></li>
                        <li class="active"><a href="customer.php?s=name"><i
                                    class="fa fa-circle-o"></i>ประวัติการลงทะเบียนสินค้า</a>
                        </li>
                        <?php } ?>
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

    <div class="content-wrapper">
        <div class="container">
            <?php if($_GET['s'] == "regis"){?>
            <div style="margin-top: 20px" class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title" style="font-family: 'Kanit', sans-serif;">ลงทะเบียนสินค้า</h3>
                </div>
                <div class="box-body">
                    <form action="./process/regis.php" onsubmit="return checkregis()" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>ชื่อ : </label>
                                    <input type="text" class="form-control" name="fname" id="fname"
                                        aria-describedby="helpId" placeholder="firstname">
                                </div>
                                <div class="form-group">
                                    <label>รหัสประจำตัวประชาชน : </label>
                                    <input type="text" class="form-control" name="iden" id="iden"
                                        aria-describedby="helpId" placeholder="1102000000000">
                                </div>
                                <div class="form-group">
                                    <label>อีเมล : </label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        aria-describedby="helpId" placeholder="email@email.com">
                                </div>
                                <div class="form-group">
                                    <label>ชื่อสินค้า : </label>
                                    <select class="form-control" name="product_name" id="product_name">
                                        <option selected disabled value="">กรุณาเลือกรายชื่อสินค้าสินค้า</option>
                                        <?php 
                                            $sql = "SELECT * FROM product";
                                            $result = $conn->query($sql);
                                            while($row = mysqli_fetch_assoc($result)){
                                                echo "<option value=".$row['product_name'].",".$row['catagories'].">".$row['product_name']."</option>";
                                            }
                                        ?>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>วันที่ลงทะเบียน : </label>
                                    <input type="date" value="<?php echo Date('Y-m-d')?>" class="form-control"
                                        name="date_regis" id="date_regis" aria-describedby="helpId"
                                        placeholder="email@email.com">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>นามสกุล : </label>
                                    <input type="text" class="form-control" name="lname" id="lname"
                                        aria-describedby="helpId" placeholder="lastname">
                                </div>
                                <div class="form-group">
                                    <label>เบอร์โทรศัพท์ : </label>
                                    <input type="text" class="form-control" name="telphone" id="telphone"
                                        aria-describedby="helpId" placeholder="0900000000">
                                </div>
                                <label>รหัสประจำเครื่อง ( Serial number )</label>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                        <input type="text" name="serial" id="serial" class="form-control"
                                            placeholder="xxxxxxxxxx">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>วันที่หมดประกัน : </label>
                                    <input type="date" value="<?php $y = Date('Y')+1  ; echo Date($y.'-m-d') ?>"
                                        class="form-control" name="date_end" id="date_end" aria-describedby="helpId">
                                    <small id="helpId" class="form-text text-muted">ระยะประกันเริ่มต้น 1 ปี</small>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>ที่อยู่ผู้ลงทะเบียน : </label>
                            <textarea class="form-control" name="address" id="address" rows="3"
                                placeholder="Address"></textarea>
                        </div>
                        <button style="width:100%" class="btn btn-primary">ลงทะเบียนสินค้า</button>
                    </form>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
    <?php }else if($_GET['s'] == "name"){?>
    <div class="col-xs-12" style="margin-top:20px;">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title" style="font-family: 'Kanit', sans-serif;">ประวัติการลงทะเบียนสินค้า</h3>

                <div class="box-tools">
                    <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                        <input type="text" name="table_search" id="gfg" class="form-control pull-right"
                            placeholder="Search">
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                <tr>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Identify</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>SerialNumber</th>
                            <th>Catagories</th>
                            <th>Product Name</th>
                            <th>Date Regis</th>
                            <th>Date End</th>
                            <th>Address</th>
                        </tr>
                    <tbody id="geeks">
                        <?php
                            $sql_table = "SELECT * FROM registration";
                            $result_table = $conn->query($sql_table);
                            while($row_table = mysqli_fetch_assoc($result_table)){
                        ?>
                        <tr>
                            <td><?php echo $row_table['fname']?></td>
                            <td><?php echo $row_table['lname']?></td>
                            <td><?php echo $row_table['iden']?></td>
                            <td><?php echo $row_table['phone']?></td>
                            <td><?php echo $row_table['email']?></td>
                            <td><?php echo $row_table['serialnumber']?></td>
                            <td><?php echo $row_table['categories']?></td>
                            <td><?php echo $row_table['product_name']?></td>
                            <td><?php echo $row_table['date_regis']?></td>
                            <td><?php echo $row_table['date_end']?></td>
                            <td><?php echo $row_table['myaddress']?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <?php }?>
    </div>
    <script>
        function checkregis() {
            var fname = document.getElementById('fname').value;
            var lname = document.getElementById('lname').value;
            var iden = document.getElementById('iden').value;
            var telphone = document.getElementById('telphone').value;
            var email = document.getElementById('email').value;
            var serial = document.getElementById('serial').value;
            var product_name = document.getElementById('product_name').value;
            var categories = document.getElementById('categories').value;
            var date_regis = document.getElementById('date_regis').value;
            var date_end = document.getElementById('date_end').value;
            var address = document.getElementById('address').value;
            if (fname.trim() == "") {
                alert('กรุณากรอกชื่อ')
                return false;
            } else if (lname.trim() == "") {
                alert('กรุณากรอกนามสกุล')
                return false;
            } else if (iden.trim() == "") {
                alert('กรุณากรอกรหัสประจำตัว')
                return false;
            } else if (iden.length != 13) {
                alert('กรุณากรอกรหัสประจำตัวให้ครบถ้วน')
                return false;
            } else if (telphone.trim() == "") {
                alert('กรุณากรอกเบอร์โทรศัพท์')
                return false;
            } else if (email.trim() == "") {
                alert('กรุณากรอกอีเมล')
                return false;
            } else if (serial.trim() == "") {
                alert('กรุณากรอกรหัสประจำเครื่อง')
                return false;
            } else if (catagories.trim() == "") {
                alert('กรุณาเลือกหมวดหมู่')
                return false;
            } else if (product_name.trim() == "") {
                alert('กรุณาเลือกชื่อผลิตภัณฑ์')
                return false;
            } else if (address.trim() == "") {
                alert('กรุณากรอกี่อยู่')
                return false;
            }
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
    <script>
        $(document).ready(function () {
            $("#gfg").on("keyup", function () {
                var value = $(this).val().toLowerCase();
                $("#geeks tr").filter(function () {
                    $(this).toggle($(this).text()
                        .toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
</body>

</html>