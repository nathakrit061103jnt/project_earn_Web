<?php

header("Access-Control-Allow-Origin: *");

header("Content-Type: application/json; charset=UTF-8");

header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");

header("Access-Control-Max-Age: 3600");

header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$requestMethod = $_SERVER["REQUEST_METHOD"];

if ($requestMethod == 'POST') {

    $input = json_decode(file_get_contents("php://input"));
    $action = $input->action;

    if ($action == "insertTodo") {

        $bb_detail = $input->bb_detail;
        $bb_name = $input->bb_name;

        $bb_image = $input->bb_image;
        $bb_date = $input->bb_date;

        $folderPath = "../images/news/";

        $bb_image_file_base64;

        if ($bb_image !== null) {
            $image_parts = explode(";base64,", $bb_image);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $bb_image_file_base64 = base64_decode($image_parts[1]);
            $bb_image = uniqid() . '.png';

        } else {
            $bb_image = null;
        }

        include_once "../configs/connectDB.php";

        $sql = "INSERT INTO `tbl_bulletin_board` (`bb_id`, `bb_name`, `bb_detail`, `bb_date`,`bb_image`)
                VALUES (NULL, '$bb_name', '$bb_detail','$bb_date','$bb_image');";

        if (mysqli_query($conn, $sql)) {

            if ($bb_image !== null) {
                file_put_contents("$folderPath" . $bb_image, $bb_image_file_base64);
            }

            echo json_encode([
                "error" => false,
                "messages" => "New record created successfully",
                "status" => 200,
            ]);

        } else {
            $mes = "Error: " . $sql . "<br>" . mysqli_error($conn);
            echo json_encode([
                "error" => true,
                "messages" => $mes,
                "status" => 404,
            ]);
        }

        mysqli_close($conn);

    }

}