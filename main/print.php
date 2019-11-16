<?php
require_once("../Database/Database.php");
include "./php-barcode-generator/src/BarcodeGenerator.php";
include "./php-barcode-generator/src/BarcodeGeneratorHTML.php";
if (!empty($_GET["p"])) {
  $serial = $_GET['p'];
  $result_count = mysqli_query($conn, "SELECT * FROM report where uniqe_id='$serial'");
  $row = mysqli_fetch_assoc($result_count);
}
?>
<!doctype html>
<html lang="en">

<head>
  <title>พิมพ์ใบเคลมสินค้า</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
  <?php if ($_GET['p']) { ?>
    <div class="container"><br>
      <center>
        <h5>ใบเคลมสินค้า</h5>
      </center>
      <div class="row">
        <div class="col-md-6">
          <span><b>KMUTNBSERVICE</b><br>1518 ถนนประชาราษฎร์ 1 แขวงวงศ์สว่าง<br> เขตบางซื่อ
            กรุงเทพมหานคร 10800 </span>
        </div>
        <div class="col-md-6" style="text-align:right">
          <span><b>วันที่ </b><?php echo Date('d/m/Y') ?></span><br>
          <span><b>ออกโดย </b>Administrator</span>
        </div>
        <table style="margin-top:20px" class="table table-bordered">
          <thead>
            <tr>
              <th scope="col" style="background-color:#e9e9e9">เลขที่ใบรับเคลม : <?php echo $row['uniqe_id'] ?></th>
              <th scope="col" style="background-color:#e9e9e9">วันที่ส่งเคลมสินค้า : <?php echo $row['timestamp']; ?></th>
              <th scope="col" style="background-color:#e9e9e9">ผู้ทำรายการ : <?php echo 'Administrator' ?></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td colspan="2">ชื่อลูกค้า : <?php echo $row['fname'] . ' ' . $row['lname'] ?></td>
              <td>เบอร์ติดต่อ : <?php echo $row['phone'] ?></td>
            </tr>
            <tr>
              <td colspan="3">ที่อยู่ : <?php echo $row['myaddress'] ?></td>
            </tr>
            <tr>
              <td>หมวดหมู่ : <?php echo $row['categories'] ?></td>
              <td colspan="2">ยี้ห้อ : <?php echo $row['product_name'] ?></td>
            </tr>
            <tr>
              <td colspan="3">อาการที่นำมาเคลม : <?php echo $row['note'] ?></td>
            </tr>
            <tr>
              <td colspan="3">สถานะปัจจุบัน : <?php if ($row['status'] == 0) { ?>
                  <span>รอการตรวจสอบ</span>
                <?php } else if ($row['status'] == 1) { ?>
                  <span>ตรวจสอบเรียบร้อยรอการดำเนินการ</span>
                <?php } else if ($row['status'] == 2) { ?>
                  <span>กำลังกำเนินการเคลม</span>
                <?php } else if ($row['status'] == 3) { ?>
                  <span>ดำเนินการเคลมเสร็จสิ้น</span>
                <?php } else if ($row['status'] == 4) { ?>
                  <span>การดำเนินการถูกยกเลิก</span>
                <?php } ?></td>
            </tr>
            <tr>
              <td colspan="3">บันทึกจาก Administrator : <?php if ($row['admin_note'] == "") {
                                                            echo "-";
                                                          } else {
                                                            echo $row['admin_note'];
                                                          } ?></td>
            </tr>
            <tr>
              <td colspan="3">วันที่รับเข้าเคลมสินค้า : <?php if ($row['admin_note'] == "") {
                                                            echo "-";
                                                          } else {
                                                            echo $row['admin_date'];
                                                          } ?></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="row">
        <div class="col-md-8">
          <span>
            <?php $code = $row['uniqe_id'];
              $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
              $border = 2;
              $height = 50;

              echo $generator->getBarcode($code, $generator::TYPE_CODE_128, $border, $height);
              echo "Claim ID : " . $code;
              ?>
          </span>
        </div>
        <div class="col-md-4" style="text-align:right">
          <b>ลงชื่อผู้รับเคลม : Administrator</b>
        </div>
        <hr>
      </div>
    <?php } ?>
    <script>
      window.print();
      window.onafterprint = function(event) {
        window.location.href = "./check.php?serial=<?php echo $row['uniqe_id'] ?>"
      };
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>