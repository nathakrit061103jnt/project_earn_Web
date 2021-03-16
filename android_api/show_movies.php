<?php
header('Content-Type: application/json');
include 'DatabaseConfig.php';
$con = mysqli_connect($HostName, $HostUser, $HostPass, $DatabaseName);
$sql = "SELECT * FROM movies";
$result = mysqli_query($con, $sql);
if (!$result) {
    printf("Error: %s\n", $conn->error);
    exit();
}
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data["data"][] = $row;
}
mysqli_close($con);
echo json_encode($data);