<?php

include_once "./DatabaseConfig.php";

$con = mysqli_connect($HostName, $HostUser, $HostPass, $DatabaseName);

$m_name = $_POST['m_name'];
$m_year = $_POST['m_year'];
$m_rating = $_POST['m_rating'];

$Sql_Query = "insert into movies (movie_name, year_in, rating) values ('$m_name',$m_year,$m_rating)";

if (mysqli_query($con, $Sql_Query)) {

    echo 'Data Inserted Successfully';

} else {

    echo 'Try Again';

}
mysqli_close($con);