<?php
require_once("../Database/Database.php");
if(!empty($_POST["serial"])) {
  $serial = $_POST['serial'];
  $result_count = mysqli_query($conn,"SELECT * FROM registration where serialnumber='$serial'");
  $num_rows = mysqli_num_rows($result_count);
  $row = mysqli_fetch_assoc($result_count);

  if($num_rows > 0) {
    if(strtotime($row['date_end']) > strtotime(Date('Y-m-d'))){
      echo "<span style='color:green'>รหัสประจำเครื่องอยู่ในระยะประกัน</span>";
    }else{
      echo "<span style='color:red'>รหัสประจำเครื่องไม่อยู่ในระยะประกัน</span>";
    }
  }else{
      echo "<span style='color:red'>ไม่พบรหัสประจำเครื่องนี้</span>";
  }
}else{
  header('Location:./service.php');
}
?>
