<!doctype html>
<html lang="en">

<head>
    <title>KMUTNB SERVICE</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=K2D:300,400,500,700&display=swap" rel="stylesheet">
    <style>
    html,
    body {
        font-family: 'K2D', sans-serif;
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
                    <a class="nav-link" href="./">หน้าหลัก</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="./admin">เข้าสู่ระบบผู้ดูแล</span></a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="jumbotron">
        <h3 class="display-4" style="color:white">ระบบเคลมและแจ้งซ่อมสินค้า</h3>
        <p class="lead" style="color:white">ระบบเคลมและแจ้งซ่อมสินค้า โดย KMUTNBSERVICE</p>
    </div>
    <div class="container">
        <center>
            <div class="row">
                <div class="col-md-6">
                    <div class="card" style="width: 18rem;"><br>
                        <img src="./asset/img/service.jpg" style="width:65%;" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">แจ้งซ่อมสินค้า</h5>
                            <p class="card-text">ลงทะเบียนเคลมหรือแจ้งซ่อมสินค้าและระบบของร้าน KMUTNBSERVICE</p>
                            <a href="./main/service.php" class="btn btn"
                                style="background-color:purple;color:white">แจ้งซ่อมสินค้า</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card" style="width: 18rem;">
                        <p><br>
                            <img src="./asset/img/service2.jpg" style="width:60%;" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">ตรวจสอบสถานะ</h5>
                                <p class="card-text">ตราขสอบสถานะการดำเนินการเคลมสินค้าในระบบ KMUTNBSERVICE</p>
                                <a href="./main/check.php" class="btn btn"
                                    style="background-color:purple;color:white">ตรวจสอบสถานะแจ้งซ่อมสินค้า</a>
                            </div>
                    </div>
                </div>
            </div>
        </center>
    </div><br><br>
    <div style="margin-top: 30px;" class="footer"><br>
        <span>&copy; Copyright <?php echo Date('Y') ?> | KMUTNBSERVICE</span><br><br>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>