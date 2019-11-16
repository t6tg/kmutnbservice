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
                <li class="active treeview">
                    <a href="#">
                        <i class="fa fa-archive"></i> <span>สินค้า</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <?php if ($_GET['s'] == "col") { ?>
                            <li class="active"><a href="product.php?s=col"><i class="fa fa-circle-o"></i>หมวดหมู่สินค้า</a></li>
                            <li><a href="product.php?s=all"><i class="fa fa-circle-o"></i>สินค้าทั้งหมดภายในคลัง</a></li>
                        <?php } else if ($_GET['s'] == "all") { ?>
                            <li><a href="product.php?s=col"><i class="fa fa-circle-o"></i>หมวดหมู่สินค้า</a></li>
                            <li class="active"><a href="product.php?s=all"><i class="fa fa-circle-o"></i>สินค้าทั้งหมดภายในคลัง</a></li>
                        <?php } ?>
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
    <!-- main -->
    <?php if ($_GET['s'] == "col") { ?>
        <div class="content-wrapper">
            <div class="container"><br>
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">เพิ่มหมวดหมู่สินค้า</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">ชื่อหมวดหมุ่</label>
                                <input type="text" class="form-control" name="cate" id="exampleInputEmail1" placeholder="xxxxxx" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="box-footer">
                            <input type="submit" name="submit" class="btn btn-primary">
                        </div>
                    </form>
                </div>
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
                                    <th>Delete</th>
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
                                            <td><a type="button" href="product.php?s=col&d=<?php echo $d ?>" class="btn btn-danger">Delete</a></td>
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
    <?php } else if ($_GET['s'] == "all") { ?>
        <div class="content-wrapper">
            <div class="container"><br>
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">เพิ่มสินค้า</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">ชื่อสินค้า</label>
                                <input type="text" class="form-control" name="pd" id="exampleInputEmail1" placeholder="xxxxxx" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label for="">หมวดหมู่สินค้า</label>
                                <select class="form-control" name="catego" id="">
                                    <option selected disabled>-- กรุณาเลือกหมวดหมู่สินค้า --</option>
                                    <?php $sql_cat = "SELECT * FROM categories";
                                        $result_cat = $conn->query($sql_cat);
                                        while ($row_cat = mysqli_fetch_assoc($result_cat)) {
                                            ?>
                                        <option value="<?php echo $row_cat['catagories_name'] ?>"><?php echo $row_cat['catagories_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="box-footer">
                            <input type="submit" name="submit2" class="btn btn-primary">
                        </div>
                    </form>
                </div>
                <div class="col-xs-12" style="margin-top:20px;">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title" style="font-family: 'Kanit', sans-serif;">สินค้า</h3>

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
                                    <th>Product Name</th>
                                    <th>Categories Name</th>
                                    <th>Delete</th>
                                </tr>
                                <tbody id="geeks">
                                    <?php
                                        $sql_table = "SELECT * FROM product";
                                        $result_table = $conn->query($sql_table);
                                        $num = 1;
                                        while ($row_table = mysqli_fetch_assoc($result_table)) {
                                            ?>
                                        <tr>
                                            <td><?php echo $num;
                                                        $num += 1; ?></td>
                                            <td><?php echo $row_table['product_name'] ?></td>
                                            <td><?php echo $row_table['catagories'] ?></td>
                                            <?php
                                                    $d = $row_table['id'];
                                                    ?>
                                            <td><a type="button" href="product.php?s=all&d2=<?php echo $d ?>" class="btn btn-danger">Delete</a></td>
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
    <!-- script -->
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
    <script type='text/javascript'>
        (function() {
            if (window.localStorage) {
                if (!localStorage.getItem('firstLoad')) {
                    localStorage['firstLoad'] = true;
                    window.location.reload();
                } else
                    localStorage.removeItem('firstLoad');
            }
        })();
    </script>
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
if ($_POST['submit']) {
    $serial = $_POST['cate'];
    $result_count = mysqli_query($conn, "SELECT * FROM categories where catagories_name='$serial'");
    $num_rows = mysqli_num_rows($result_count);
    if ($num_rows <= 0) {
        $sql = "INSERT INTO categories (catagories_name) VALUES ('$serial')";
        if ($conn->query($sql)) {
            echo "<script>alert('เพิ่มข้อมูลสำเร็จ')</script>";
            echo "<script>window.location.href = product.php?s=col</script>";
        } else {
            echo "<script>alert('Error')</script>";
            header("Refresh:0");
        }
    }
}
if ($_POST['submit2']) {
    $serial2 = $_POST['pd'];
    $select = $_POST['catego'];
    $result_count2 = mysqli_query($conn, "SELECT * FROM product where product_name='$serial2'");
    $num_rows2 = mysqli_num_rows($result_count2);
    if ($num_rows2 <= 0) {
        $sql = "INSERT INTO product (product_name,catagories) VALUES ('$serial2','$select')";
        if ($conn->query($sql)) {
            echo "<script>alert('เพิ่มข้อมูลสำเร็จ')</script>";
            echo "<script>window.location.href = product.php?s=col</script>";
        }
    }
}
if ($_GET['d']) {
    $my_d = $_GET['d'];
    $sql_del = "DELETE FROM categories WHERE id=$my_d";
    $conn->query($sql_del);
    echo "<script>window.location.href = product.php?s=col</script>";
}
if ($_GET['d2']) {
    $my_d = $_GET['d2'];
    $sql_del = "DELETE FROM product WHERE id=$my_d";
    $conn->query($sql_del);
    echo "<script>window.location.href = product.php?s=col</script>";
}
?>