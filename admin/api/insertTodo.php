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

        include_once "../configs/connectDB.php";

        $sql = "INSERT INTO `tbl_bulletin_board` (`bb_id`, `bb_name`, `bb_detail`, `bb_date`)
                VALUES (NULL, '$bb_name', '$bb_detail', current_timestamp());";

        if (mysqli_query($conn, $sql)) {

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