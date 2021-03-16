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

    if ($action == "updateAttraction") {

        $at_id = $input->at_id;
        $at_detial = $input->at_detial;
        $at_location = $input->at_location;
        $at_name = $input->at_name;
        $at_p = $input->at_p;

        $at_profile = $input->at_profile;
        $at_img1 = $input->at_img1;
        $at_img2 = $input->at_img2;
        $at_img3 = $input->at_img3;

        $at_profile_type = $input->at_profile_type;
        $at_img1_type = $input->at_img1_type;
        $at_img2_type = $input->at_img2_type;
        $at_img3_type = $input->at_img3_type;

        $folderPath = "../images/a/";

        $at_profile_file_base64;
        $at_img1_file_base64;
        $at_img2_file_base64;
        $at_img3_file_base64;

        if ($at_profile_type != null) {

            $image_parts = explode(";base64,", $at_profile);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $at_profile_file_base64 = base64_decode($image_parts[1]);
            $at_profile = uniqid() . '.png';

        } else {
            $at_profile = $input->at_profile;
        }

        if ($at_img1_type != null) {

            $image_parts = explode(";base64,", $at_img1);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $at_img1_file_base64 = base64_decode($image_parts[1]);
            $at_img1 = uniqid() . '.png';

        } else {
            $at_img1 = $input->at_img1;

        }

        if ($at_img2_type != null) {

            $image_parts = explode(";base64,", $at_img2);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $at_img2_file_base64 = base64_decode($image_parts[1]);
            $at_img2 = uniqid() . '.png';

        } else {
            $at_img2 = $input->at_img2;

        }

        if ($at_img3_type != null) {

            $image_parts = explode(";base64,", $at_img3);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $at_img3_file_base64 = base64_decode($image_parts[1]);
            $at_img3 = uniqid() . '.png';

        } else {
            $at_img3 = $input->at_img3;
        }

        $folderPath = "../images/a/";

        include_once "../configs/connectDB.php";

        $sql = "UPDATE `tbl_attractions` SET `at_name`='$at_name',`at_profile` = '$at_profile',
                `at_detial`='$at_detial',`at_img1` = '$at_img1',`at_img2` = '$at_img2',
                `at_img3` = '$at_img3',`at_location`='$at_location',`at_p`='$at_p'
                WHERE `tbl_attractions`.`at_id` = $at_id;";

        if (mysqli_query($conn, $sql)) {

            echo json_encode([
                "error" => false,
                "messages" => "Update Data successfully",
                "status" => 200,
            ]);

            if ($at_profile_type !== null) {
                file_put_contents("$folderPath" . $at_profile, $at_profile_file_base64);
            }

            if ($at_img1_type !== null) {
                file_put_contents("$folderPath" . $at_img1, $at_img1_file_base64);
            }

            if ($at_img2_type !== null) {
                file_put_contents("$folderPath" . $at_img2, $at_img2_file_base64);
            }

            if ($at_img3_type !== null) {
                file_put_contents("$folderPath" . $at_img3, $at_img3_file_base64);
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