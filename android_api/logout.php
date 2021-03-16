<?php
session_start();
unset($_SESSION["u_email"]);
unset($_SESSION["u_name"]);
header('Content-Type: application/json');

echo json_encode([
    "status" => 200,
    "message" => "logout successfully",
]);