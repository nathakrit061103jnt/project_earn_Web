<?php

include_once "./DatabaseConfig.php";
header('Content-Type: application/json');

header("Access-Control-Allow-Origin: *");

header("Content-Type: application/json; charset=UTF-8");

header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");

header("Access-Control-Max-Age: 3600");

header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$conn = mysqli_connect($HostName, $HostUser, $HostPass, $DatabaseName);

$u_email = $_POST['u_email'];
$u_password = $_POST['u_password'];
$u_password = md5($u_password);

$Sql_Query = "SELECT * FROM tbl_users WHERE u_email='$u_email'
              AND u_password='$u_password' LIMIT 1";
$result = mysqli_query($conn, $Sql_Query);

if (mysqli_num_rows($result) > 0) {
    while ($data = mysqli_fetch_assoc($result)) {
        session_start();
        $_SESSION["u_email"] = $data["u_email"];
        $_SESSION["u_name"] = $data["u_name"];

        echo json_encode([
            "status" => 200,
            "message" => "เข้าสู่ระบบสำเร็จ",
            "error" => false,
            "u_id" => $data["u_id"],
            "u_email" => $data["u_email"],
            "u_tel" => $data["u_tel"],
            "u_name" => $data["u_name"],
            "u_address" => $data["u_address"],
        ]);

    }

    // echo "เข้าสู่ระบบสำเร็จ";

} else {
    http_response_code(404);
    echo json_encode([
        "status" => 404,
        "message" => "ไม่พบบัญชีผู้ใช้งาน",
        "error" => true,
    ]);
    // echo "ไม่พบบัญชีผู้ใช้งาน";

}

mysqli_close($conn);