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

    if ($action == "updateTodo") {

        $bb_id = $input->bb_id;
        $bb_detail = $input->bb_detail;
        $bb_name = $input->bb_name;

        $bb_image = $input->bb_image;

        $bb_image_type = $input->bb_image_type;

        $folderPath = "../images/news/";

        $bb_image_file_base64;

        if ($bb_image_type != null) {

            $image_parts = explode(";base64,", $bb_image);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $bb_image_file_base64 = base64_decode($image_parts[1]);
            $bb_image = uniqid() . '.png';

        } else {
            $bb_image = $input->bb_image;
        }

        include_once "../configs/connectDB.php";

        $sql = "UPDATE `tbl_bulletin_board` SET `bb_name` = '$bb_name' ,
               `bb_detail` = '$bb_detail' , `bb_date` = current_timestamp(),
               `bb_image` = '$bb_image'
                WHERE `tbl_bulletin_board`.`bb_id` = $bb_id;";

        if (mysqli_query($conn, $sql)) {

            echo json_encode([
                "error" => false,
                "messages" => "Update Data successfully",
                "status" => 200,
            ]);

            if ($bb_image_type !== null) {
                file_put_contents("$folderPath" . $bb_image, $bb_image_file_base64);
            }

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