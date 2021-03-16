<?php

include_once "./DatabaseConfig.php";

$con = mysqli_connect($HostName, $HostUser, $HostPass, $DatabaseName);

$u_id = $_POST['u_id'];
$u_email = $_POST['u_email'];
// $u_password = $_POST['u_password'];
// $u_password = md5($u_password);
$u_tel = $_POST['u_tel'];
$u_name = $_POST["u_name"];
$u_address = $_POST["u_address"];

$Sql_Query = "UPDATE `tbl_users` SET `u_address` = '$u_address',`u_email`='$u_email',
              `u_tel`='$u_tel',`u_name`='$u_name'
              WHERE `tbl_users`.`u_id` = $u_id;";

if (mysqli_query($con, $Sql_Query)) {

    echo 'เเก้ไขข้อมูลผู้ใช้งานสำเร็จ';

} else {

    echo 'ลองอีกครั้ง';

}
mysqli_close($con);