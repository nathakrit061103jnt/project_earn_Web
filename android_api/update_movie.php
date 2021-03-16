<?php
include 'DatabaseConfig.php';
$con = mysqli_connect($HostName, $HostUser, $HostPass, $DatabaseName);
$m_id = $_POST['m_id'];
$m_name = $_POST['m_name'];
$m_year = $_POST['m_year'];
$m_rating = $_POST['m_rating'];
$Sql_Query = "UPDATE movies SET movie_name='$m_name', year_in='$m_year', rating='$m_rating' WHERE
movie_id='$m_id' ";
if (mysqli_query($con, $Sql_Query)) {
    echo 'Data Updated Successfully';
} else {

    echo 'Try Again';

}
mysqli_close($con);