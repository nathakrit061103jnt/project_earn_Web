<?php
//กำหนดค่า Access-Control-Allow-Origin ให้ เครื่อง อื่น ๆ สามารถเรียกใช้งานหน้านี้ได้
header("Access-Control-Allow-Origin: *");

header("Content-Type: application/json; charset=UTF-8");

header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");

header("Access-Control-Max-Age: 3600");

header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$requestMethod = $_SERVER["REQUEST_METHOD"];

if ($requestMethod == 'GET') {

    if (isset($_GET['getTodo'])) {
        include_once "../configs/connectDB.php";
        $bb_id = $_GET['bb_id'];

        $sql = "SELECT * FROM tbl_bulletin_board WHERE bb_id = $bb_id";

        $result = mysqli_query($conn, $sql);

        $arr = array();

        while ($row = mysqli_fetch_assoc($result)) {

            $arr[] = $row;
        }

        echo json_encode($arr);

    }

}