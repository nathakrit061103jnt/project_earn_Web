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

    if ($action == "insertHotel") {

        $h_detail = $input->h_detail;
        $h_address = $input->h_address;
        $h_name = $input->h_name;
        $h_tel = $input->h_tel;
        $h_price = $input->h_price;

        $h_profile = $input->h_profile;
        $h_img1 = $input->h_img1;
        $h_img2 = $input->h_img2;
        $h_img3 = $input->h_img3;

        $folderPath = "../images/b/";

        $h_profile_file_base64;
        $h_img1_file_base64;
        $h_img2_file_base64;
        $h_img3_file_base64;

        if ($h_profile !== null) {

            $image_parts = explode(";base64,", $h_profile);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $h_profile_file_base64 = base64_decode($image_parts[1]);
            $h_profile = uniqid() . '.png';

        } else {
            $h_profile = null;
        }

        if ($h_img1 !== null) {

            $image_parts = explode(";base64,", $h_img1);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $h_img1_file_base64 = base64_decode($image_parts[1]);
            $h_img1 = uniqid() . '.png';

        } else {
            $h_img1 = null;
        }

        if ($h_img2 !== null) {

            $image_parts = explode(";base64,", $h_img2);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $h_img2_file_base64 = base64_decode($image_parts[1]);
            $h_img2 = uniqid() . '.png';

        } else {
            $h_img2 = null;
        }

        if ($h_img3 !== null) {

            $image_parts = explode(";base64,", $h_img3);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $h_img3_file_base64 = base64_decode($image_parts[1]);
            $h_img3 = uniqid() . '.png';

        } else {
            $h_img3 = null;
        }

        $folderPath = "../images/b/";

        include_once "../configs/connectDB.php";

        $sql = "INSERT INTO `tbl_hotel` (`h_id`, `h_name`, `h_detail`, `h_profile`, `h_img1`, `h_img2`,
                `h_img3`, `h_price`, `h_address`, `h_tel`)
                 VALUES (NULL, '$h_name', '$h_detail', '$h_profile', '$h_img1', '$h_img2', '$h_img3',
                 '$h_price', '$h_address', '$h_tel');";

        if (mysqli_query($conn, $sql)) {

            echo json_encode([
                "error" => false,
                "messages" => "New record created successfully",
                "status" => 200,
            ]);

            if ($h_profile !== null) {
                file_put_contents("$folderPath" . $h_profile, $h_profile_file_base64);
            }

            if ($h_img1 !== null) {
                file_put_contents("$folderPath" . $h_img1, $h_img1_file_base64);
            }

            if ($h_img2 !== null) {
                file_put_contents("$folderPath" . $h_img2, $h_img2_file_base64);
            }

            if ($h_img3 !== null) {
                file_put_contents("$folderPath" . $h_img3, $h_img3_file_base64);
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