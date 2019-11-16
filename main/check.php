<!doctype html>
<html lang="en">

<head>
    <title>KMUTNB SERVICE</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Kanit:300,400,500,700&display=swap" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.1.1/js/all.js" integrity="sha384-BtvRZcyfv4r0x/phJt9Y9HhnN5ur1Z+kZbKVgzVBAlQZX4jvAuImlIz+bG7TS00a" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <style>
        html,
        body {
            font-family: 'Kanit', sans-serif;
            /* background-color: #e9e9e9 */
        }

        .jumbotron {
            background-image: url('./asset/img/regis-bg.jpg');
            background-size: cover;
        }

        .footer {
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: purple;
            color: white;
            text-align: center;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark" style="background-color: purple;">
        <a class="navbar-brand" href="#"><b>KMUTNB</b><span style="color:orange">SERVICE</span></a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"></button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="../">หน้าหลัก</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="../admin">เข้าสู่ระบบผู้ดูแล</span></a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container"><br>
        <h3>ตรวจสอบสถานะการเคลมหรือแจ้งซ่อมสินค้า</h3><br>
        <form action="" method="get">
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        <label for="">Claim ID ( รหัสการเคลมสินค้า ) : </label>
                        <input type="text" value="<?php echo $_GET['serial'] ?>" class="form-control" name="serial" aria-describedby="helpId" placeholder="xxxxxxx" required>
                    </div>
                </div>
                <div class="col-md-3" style="margin-top:30px">
                    <button type="submit" class="btn btn-danger">ตรวจสอบ</button>
                </div>
            </div>
        </form>
        <?php
        if ($_GET['serial'] != "") {
            require_once("../Database/Database.php");
            $serial = $_GET['serial'];
            $result_count = mysqli_query($conn, "SELECT * FROM report where uniqe_id='$serial'");
            $num_rows = mysqli_num_rows($result_count);
            $row = mysqli_fetch_assoc($result_count);
            if ($num_rows != 1) {
                echo "<span style='color:red'>ไม่พบรหัสการเคลมนี้</span>";
            } else {
                ?>
                <?php if ($row['status'] == 0) { ?>
                    <div class="alert alert-secondary" role="alert">
                        <i class="fas fa-bookmark    "></i>
                        <strong>สถานะรอการตรวจสอบ</strong>
                    </div>
                <?php } else if ($row['status'] == 1) { ?>
                    <div class="alert alert-primary" role="alert">
                        <i class="fas fa-arrow-alt-circle-right    "></i>
                        <strong>ตรวจสอบเรียบร้อยรอการดำเนินการ</strong>
                    </div>
                <?php } else if ($row['status'] == 2) { ?>
                    <div class="alert alert-warning" role="alert">
                        <i class="fas fa-truck-loading    "></i>
                        <strong>กำลังกำเนินการเคลม</strong>
                    </div>
                <?php } else if ($row['status'] == 3) { ?>
                    <div class="alert alert-success" role="alert">
                        <i class="fas fa-check    "></i>
                        <strong>ดำเนินการเคลมเสร็จสิ้น</strong>
                    </div>
                <?php } else if ($row['status'] == 4) { ?>
                    <div class="alert alert-danger" role="alert">
                        <i class="fas fa-clipboard-list-check    "></i>
                        <strong>การดำเนินการถูกยกเลิก</strong>
                    </div>
                <?php } ?>
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group">
                            <label for="">Copy Claim ID : </label>
                            <input type="text" value="<?php echo $_GET['serial'] ?>" class="form-control" name="myInput" readonly="readonly" id="myInput" aria-describedby="helpId">
                        </div>
                    </div>
                    <div class="col-md-3" style="margin-top:32px">
                        <button onclick="myFunction()" class="btn btn-info"><i class="fas fa-copy    "></i></button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">ชื่อ : </label>
                            <input type="text" class="form-control" value="<?php echo $row['fname'] ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="">เบอร์โทรศัพท์ : </label>
                            <input type="text" class="form-control" value="<?php echo $row['phone'] ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="">Serial Number : </label>
                            <input type="text" class="form-control" value="<?php echo $row['serialnumber'] ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="">ที่อยู่ : </label>
                            <textarea type="text" class="form-control" disabled><?php echo $row['myaddress'] ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">นามสกุล : </label>
                            <input type="text" class="form-control" value="<?php echo $row['lname'] ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="">อีเมล : </label>
                            <input type="text" class="form-control" value="<?php echo $row['email'] ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="">ชื่อสินค้า : </label>
                            <input type="text" class="form-control" value="<?php echo $row['product_name'] ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="">วันหมดอายุประกัน : </label>
                            <input type="text" class="form-control" value="<?php echo $row['date_end'] ?>" disabled>
                        </div>
                    </div>
                </div>
               <a href="print.php?p=<?php echo $_GET['serial'] ?>" id="" class="btn btn-primary"><i class="fas fa-print    "></i> พิมพ์ใบเคลมสินค้า</a>
        <?php }
        } ?>
    </div>
    <script>
        function myFunction() {
            var copyText = document.getElementById("myInput");
            copyText.select();
            copyText.setSelectionRange(0, 99999)
            document.execCommand("copy");
            alert("Copied the text: " + copyText.value);
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>