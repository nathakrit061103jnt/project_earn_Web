<?php
include 'DatabaseConfig.php';
$con = mysqli_connect($HostName, $HostUser, $HostPass, $DatabaseName);
$m_id = $_POST['m_id'];
$Sql_Query = "DELETE FROM movies WHERE movie_id ='$m_id' ";

if (mysqli_query($con, $Sql_Query)) {
    echo 'ลบข้อมูลเรียบร้อยแล้ว';
} else {
    echo "ลองอีกคร2ัง ";
}
mysqli_close($con);