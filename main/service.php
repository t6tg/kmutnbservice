<!doctype html>
<html lang="en">

<head>
    <title>KMUTNB SERVICE</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Kanit:300,400,500,700&display=swap" rel="stylesheet">
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
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
            aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"></button>
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
        <h3>ระบบส่งเคลมและแจ้งซ่อมสินค้า</h3><br>
        <form action="" method="post" onsubmit="return sub()" id="myForm" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">ชื่อ : </label>
                        <input type="text" class="form-control" name="fname" id="" aria-describedby="helpId"
                            placeholder="Firstname" required>
                    </div>
                    <div class="form-group">
                        <label for="">เบอร์โทรศัพท์ : </label>
                        <input type="tel" class="form-control" name="phone" id="" min-length="10"
                            aria-describedby="helpId" placeholder="0000000000" required>
                    </div>
                    <div class="form-group">
                        <label for="">รหัสประจำเครื่อง ( Serial Number ) : </label>
                        <input type="text" class="form-control" name="serial" id="serial" placeholder="Serialnumber"
                            onchange="checkAvailability()" required>
                        <p style="display:none" id="loaderIcon">Loading ....</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">นามสกุล : </label>
                        <input type="text" class="form-control" name="lname" id="" aria-describedby="helpId"
                            placeholder="Lastname" required>
                    </div>
                    <div class="form-group">
                        <label for="">รหัสประจำตัวประชาชน : </label>
                        <input type="text" class="form-control" name="iden" id="" aria-describedby="helpId"
                            placeholder="Indetity number" required>
                    </div>
                    <div class="form-group">
                        <label for="">รูปภาพใบเสร็จ : </label>
                        <input type="file" accept="image/*" class="form-control-file" name="file" id="" required>
                    </div>
                </div><br>
            </div>
            <div class="form-group">
                <label for="">สาเหตุการเคลม : </label>
                <textarea type="text" class="form-control" name="note" aria-describedby="helpId"
                    placeholder="Note .... " required></textarea>
            </div>
            <center><button style="width:80%;background-color: purple;color:white" name="submit"
                    class="btn btn">แจ้งซ่อม</button></center>
        </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script>
    sub = () => {
        if (confirm("ท่านต้องการแจ้งซ่อมใช่หรือไม่")) {
            document.getElementById("myForm").submit();
        } else {
            return false;
        }
    }

    function checkAvailability() {
        $("#loaderIcon").show();
        $.ajax({
            type: "POST",
            url: "data.php",
            data: 'serial=' + $("#serial").val(),
            success: function(data) {
                $("#loaderIcon").html(data);
            },
            error: function() {}
        });
    }
    </script>
</body>

</html>
<?php
if ($_POST['iden']) {
    require_once("../Database/Database.php");
    $serial = trim($_POST['serial']);
    $re = mysqli_query($conn, "SELECT * FROM registration where serialnumber='$serial'");
    $srows = mysqli_fetch_assoc($re);
    if (trim($_POST['iden']) != trim($srows['iden'])) {
        echo "<script>alert('รหัสประจำตัวที่กรอกไม่ตรงกับรหัสประจำตัวที่บันทึกในระบบ')</script>";
        header("Refresh:0,url=../service.php");
    } else {
        $result_count = mysqli_query($conn, "SELECT * FROM report where serialnumber='$serial' and status != '3' ");
        $num_rows = mysqli_num_rows($result_count);
        $fname = $srows['fname'];
        $uniq = uniqid($serial);
        $lname = $srows['lname'];
        $iden = $srows['iden'];
        $telphone = $srows['phone'];
        $email = $srows['email'];
        $serial = $srows['serialnumber'];
        $pd = $srows['product_name'];
        $note = $_POST['note'];
        $categories = $srows['categories'];
        $date_regis = $srows['date_regis'];
        $date_end = $srows['date_end'];
        $address = $srows['myaddress'];
        $status = 0;
        if (strtotime($srows['date_end']) < strtotime(Date('Y-m-d'))) {
            echo "<script>alert('รหัสประจำเครื่องหมดประกัน')</script>";
            header("Refresh:0");
        } else if ($num_rows <= 0) {
            $sql = "INSERT INTO report (uniqe_id,fname,lname,iden,phone,email,serialnumber,categories,product_name,date_regis,date_end,myaddress,status,note)
        VALUES ('$uniq','$fname','$lname','$iden','$telphone','$email','$serial','$categories','$pd','$date_regis','$date_end','$address','$status','$note')";
            if ($conn->query($sql) === TRUE) {
                move_uploaded_file($_FILES['file']['tmp_name'], "./fileuploaded/$serial.jpg");
                echo "<script>alert('เพิ่มข้อมูลสำเร็จ')</script>";
                echo "<script>window.location.href = 'check.php?serial=$uniq'</script>";
            } else {
                echo "<script>alert('error')</script>";
                header("Refresh:0");
            }
        } else {
            echo "<script>alert('มีรหัสประจำเครื่องนี้ในระบบแล้ว')</script>";
            header("Refresh:0");
        }
        $conn->close();
    }
}
?>