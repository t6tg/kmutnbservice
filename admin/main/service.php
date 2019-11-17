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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
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

                <li class="active treeview">
                    <a href="#">
                        <i class="fa fa-hourglass-half"></i> <span>สถานะแจ้งซ่อม</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <?php if ($_GET['s'] == "stat") { ?>
                            <li class="active"><a href="service.php?s=stat"><i class="fa fa-circle-o"></i>สถิติ</a></li>
                            <li><a href="service.php?s=edit"><i class="fa fa-circle-o"></i>แก้ไขสถานะซ่อมสินค้า</a></li>
                            <li><a href="service.php?s=check"><i class="fa fa-circle-o"></i>ตรวจสอบสถานะสินค้า</a></li>
                        <?php } else if ($_GET['s'] == "edit") { ?>
                            <li><a href="service.php?s=stat"><i class="fa fa-circle-o"></i>สถิติ</a></li>
                            <li class="active"><a href="service.php?s=edit"><i class="fa fa-circle-o"></i>แก้ไขสถานะซ่อมสินค้า</a></li>
                            <li><a href="service.php?s=check"><i class="fa fa-circle-o"></i>ตรวจสอบสถานะสินค้า</a></li>
                        <?php } else if ($_GET['s'] == "check") { ?>
                            <li><a href="service.php?s=stat"><i class="fa fa-circle-o"></i>สถิติ</a></li>
                            <li><a href="service.php?s=edit"><i class="fa fa-circle-o"></i>แก้ไขสถานะซ่อมสินค้า</a></li>
                            <li class="active"><a href="service.php?s=check"><i class="fa fa-circle-o"></i>ตรวจสอบสถานะสินค้า</a></li>
                        <?php } ?>
                    </ul>
                </li>
                <li><a href="admin.php"><i class="fa fa-lock"></i>
                        <span>ผู้ดูแลระบบ</span></a></li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
    <?php if ($_GET['s'] == "stat") { ?>
        <div class="content-wrapper">
            <div class="container">
                <div class="col-xs-12" style="margin-top:20px;">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title" style="font-family: 'Kanit', sans-serif;">หมวดหมู่สินค้า</h3>

                            <div class="box-tools">
                                <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                                    <input type="text" name="table_search" id="gfg" class="form-control pull-right" placeholder="Search">
                                </div>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tr>
                                    <th>Num.</th>
                                    <th>Categories Name</th>
                                    <th>Number of claims</th>
                                </tr>
                                <tbody id="geeks">
                                    <?php
                                        $sql_table = "SELECT * FROM categories";
                                        $result_table = $conn->query($sql_table);
                                        $num = 1;
                                        while ($row_table = mysqli_fetch_assoc($result_table)) {
                                            ?>
                                        <tr>
                                            <td><?php echo $num;
                                                        $num += 1; ?></td>
                                            <td><?php echo $row_table['catagories_name'] ?></td>
                                            <?php
                                                    $d = $row_table['id'];
                                                    ?>
                                            <td><?php $categorieses = $row_table['catagories_name'];
                                                        echo mysqli_num_rows(mysqli_query($conn, "SELECT * FROM report where categories='$categorieses'")); ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </div>
    <?php } else if ($_GET['s'] == "edit") { ?>
        <div class="content-wrapper">
            <div class="container">
                <h3 style="font-family: 'Kanit', sans-serif;">แก้ไขสถานะการเคลม</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Search : </label>
                            <input type="text" class="form-control" id="val" aria-describedby="helpId" value="<?php echo $_GET['val']; ?>" placeholder="Search ..." required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <button onclick="mysend()" style="margin-top: 25px" class="btn btn-primary">ค้นหา</button>
                    </div>
                </div>
                <?php if ($_GET['val'] != "") { ?>
                    <?php $serailnum = $_GET['val'];
                            if ((mysqli_num_rows(mysqli_query($conn, "SELECT * FROM report WHERE serialnumber='$serailnum'"))) > 0) { ?>
                        <?php $myrow = (mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM report WHERE serialnumber='$serailnum'"))) ?>
                        <div style="margin-top: 20px" class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title" style="font-family: 'Kanit', sans-serif;">แก้ไขสถานะการเคลม</h3>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>ชื่อ : </label>
                                            <input type="text" class="form-control" name="fname" id="fname" aria-describedby="helpId" placeholder="firstname" value="<?php echo $myrow['fname'] ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label>รหัสประจำตัวประชาชน : </label>
                                            <input type="text" class="form-control" name="iden" id="iden" aria-describedby="helpId" placeholder="1102000000000" value="<?php echo $myrow['iden'] ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label>อีเมล : </label>
                                            <input type="email" class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="email@email.com" value="<?php echo $myrow['email'] ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label>ชื่อสินค้า : </label>
                                            <select class="form-control" name="product_name" id="product_name" value="<?php echo $myrow['product_name'] ?>" disabled>
                                                <option selected disabled value=""><?php echo $myrow['product_name'] ?></option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>วันที่ลงทะเบียน : </label>
                                            <input type="date" class="form-control" name="date_regis" id="date_regis" aria-describedby="helpId" placeholder="email@email.com" value="<?php echo $myrow['date_regis'] ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>นามสกุล : </label>
                                            <input type="text" class="form-control" name="lname" id="lname" aria-describedby="helpId" placeholder="lastname" value="<?php echo $myrow['lname'] ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label>เบอร์โทรศัพท์ : </label>
                                            <input type="text" class="form-control" name="telphone" id="telphone" aria-describedby="helpId" placeholder="0900000000" value="<?php echo $myrow['phone'] ?>" disabled>
                                        </div>
                                        <label>รหัสประจำเครื่อง ( Serial number )</label>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                                <input type="text" name="serial" id="serial" class="form-control" placeholder="xxxxxxxxxx" value="<?php echo $myrow['serialnumber'] ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>วันที่หมดประกัน : </label>
                                            <input type="date" value="<?php echo $myrow['date_end'] ?>" disabled class="form-control" name="date_end" id="date_end" aria-describedby="helpId">
                                        </div>
                                        <form action="" method="post">
                                            <div class="form-group">
                                                <label for="">สถานะการเคลม : </label>
                                                <select class="form-control" name="status" id="">
                                                    <option <?php if ($myrow['status'] == '0') {
                                                                            echo "selected ";
                                                                        } ?> value="0">ยังไม่ทำการตรวจสอบข้อมูล</option>
                                                    <option <?php if ($myrow['status'] == '1') {
                                                                            echo "selected ";
                                                                        } ?> value="1">ตรวจสอบข้อมูลแล้วรอการดำเนินการ</option>
                                                    <option <?php if ($myrow['status'] == '2') {
                                                                            echo "selected ";
                                                                        } ?> value="2">กำลังดำเนินการ</option>
                                                    <option <?php if ($myrow['status'] == '3') {
                                                                            echo "selected ";
                                                                        } ?>value="3">ดำเนินการเสร็จสิ้น</option>
                                                    <option <?php if ($myrow['status'] == '4') {
                                                                            echo "selected ";
                                                                        } ?>value="4">การดำเนินการถูกยกเลิก</option>
                                                </select>
                                            </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">บันทึกจาก Administrator</label>
                                    <textarea class="form-control" name="admin_note" placeholder="xxxxx" rows="3"><?php echo $myrow['admin_note'] ?></textarea>
                                </div>
                                <input style="width:100%" type="submit" name="submit-update" class="btn btn-primary">
                                </form>
                            </div>
                        </div>
                    <?php } else { ?>
                        <span style="color:red">ค้นหาในระบบไม่พบรหัสประจำเครื่องนี้</span>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    <?php } else if ($_GET['s'] == "check") { ?>
        <div class="content-wrapper">
            <div class="container">
                <div class="col-xs-12" style="margin-top:20px;">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title" style="font-family: 'Kanit', sans-serif;">หมวดหมู่สินค้า</h3>

                            <div class="box-tools">
                                <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                                    <input type="text" name="table_search" value="<?php echo $_GET['seach']; ?>" id="gfg" class="form-control pull-right" placeholder="Search">
                                </div>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tr>
                                    <th>Num.</th>
                                    <th>Claim ID</th>
                                    <th>Serial Number</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>status</th>
                                    <th>Image</th>
                                    <th>Edit</th>
                                </tr>
                                <tbody id="geeks">
                                    <?php
                                        $sql_table = "SELECT * FROM report";
                                        $result_table = $conn->query($sql_table);
                                        $num = 1;
                                        while ($row_table = mysqli_fetch_assoc($result_table)) {
                                            ?>
                                        <tr>
                                            <td><?php echo $num;
                                                        $num += 1; ?></td>
                                            <td><?php echo $row_table['uniqe_id'] ?></td>
                                            <td><?php echo $row_table['serialnumber'] ?></td>
                                            <td><?php echo $row_table['fname'] ?></td>
                                            <td><?php echo $row_table['lname'] ?></td>
                                            <td><?php if ($row_table['status'] == '0') {
                                                            echo "ยังไม่ได้ทำการตรวจสอบ";
                                                        } else if ($row_table['status'] == '1') {
                                                            echo "ตรวจสอบแล้วรอการดำเนินการ";
                                                        } else if ($row_table['status'] == '2') {
                                                            echo "กำลังดำเนินการ";
                                                        } else if ($row_table['status'] == '3') {
                                                            echo "ดำเนินการเสร็จสิ้น";
                                                        } else if ($row_table['status'] == '4') {
                                                            echo "การดำเนินการถูกยกเลิก";
                                                        } ?></td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#<?php echo $row_table['serialnumber']; ?>">
                                                    <i class="fa fa-image    "></i>
                                                </button>
                                                
                                                <!-- Modal -->
                                                <div class="modal fade" id="<?php echo $row_table['serialnumber']; ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">IMAGE SLIP</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <img style="width: 100%"src="../../main/fileuploaded/<?php echo $row_table['serialnumber']; ?>.jpg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><a href="service.php?s=edit&val=<?php echo $row_table['serialnumber']; ?>" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </div>
    <?php } ?>
    </script>
    <script>
        function mysend() {
            var val = document.getElementById("val").value;
            window.location.href = "service.php?s=edit&val=" + val;
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
        $(document).ready(function() {
            $("#gfg").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#geeks tr").filter(function() {
                    $(this).toggle($(this).text()
                        .toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
</body>

</html>
<?php
if ($_POST['submit-update']) {
    $serial = $_GET['val'];
    $status = $_POST['status'];
    $admin_note = $_POST['admin_note'];
    $admin_date = Date('d-m-Y H:i:s');
    $sql = "UPDATE report SET status='$status',admin_note='$admin_note',admin_date='$admin_date' WHERE serialnumber='$serial'";
    if (mysqli_query($conn, $sql)) {
        echo "<script>window.location.href = 'service.php?s=check&seach=$serial'</script>";
    } else {
        echo "<script>alert('Error')</script>";
    }
}
?>