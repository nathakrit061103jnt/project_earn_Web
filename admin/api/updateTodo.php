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

        include_once "../configs/connectDB.php";

        $sql = "UPDATE `tbl_bulletin_board` SET `bb_name` = '$bb_name' ,
               `bb_detail` = '$bb_detail' , `bb_date` = current_timestamp()
                WHERE `tbl_bulletin_board`.`bb_id` = $bb_id;";

        if (mysqli_query($conn, $sql)) {

            echo json_encode([
                "error" => false,
                "messages" => "Update Data successfully",
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