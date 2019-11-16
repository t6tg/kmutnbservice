<?php
session_start();
require_once('../../../Database/Database.php');
if ($_SESSION['username'] == "" || $_SESSION['status'] != "admin") {
    header('Location: ../../logout.php');
}
if($_POST['fname'] != "" && $_POST['lname'] != "" && $_POST['iden'] != "" && $_POST['telphone'] != "" && $_POST['email'] != "" && $_POST['serial'] != "" && $_POST['product_name'] != "" && $_POST['date_regis'] != "" && $_POST['date_end'] != "" && $_POST['address'] != "") {
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $iden = trim($_POST['iden']);
    $telphone = trim($_POST['telphone']);
    $email = trim($_POST['email']);
    $serial =trim($_POST['serial']);
    $product_name = trim($_POST['product_name']);
    $date_regis = trim($_POST['date_regis']);
    $date_end = trim($_POST['date_end']);
    $address = trim($_POST['address']);
    $data = explode(',' , $product_name);
    $pd = $data[0];
    $categories = $data[1];
    $result_count = mysqli_query($conn,"SELECT * FROM registration where serialnumber='$serial'");
    $num_rows = mysqli_num_rows($result_count);
    if($num_rows <= 0){
    $sql = "INSERT INTO registration (fname,lname,iden,phone,email,serialnumber,categories,product_name,date_regis,date_end,myaddress)
    VALUES ('$fname','$lname','$iden','$telphone','$email','$serial','$categories','$pd','$date_regis','$date_end','$address')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('เพิ่มข้อมูลสำเร็จ')</script>";
       header("Refresh:0,url=../customer.php?s=regis");
    } else {
        header("Location:../");
    }
}else{
    echo "<script>alert('มีหัสประจำเครื่องนี้ในระบบแล้ว')</script>";
    header("Refresh:0,url=../customer.php?s=regis");
}
    $conn->close();
     
}else{
     header("Location:../");
 }