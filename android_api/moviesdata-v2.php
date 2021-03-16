<?php
header('Content-Type: application/json');
$servername = "localhost";
$username = "root";
$password = "12345678";
$database = "appdb";

//This Creates a new connection object using MySQLi
$conn = new mysqli($servername, $username, $password, $database);

//if there is some error connecting to the database with die
//we will stop the further execution by displaying a message causing the error
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//if everything is fine then create an array for storing the data
$movies = array();

//this is our sql query
$sql = "SELECT * FROM movies;";

//creating an statment with the query
$stmt = $conn->prepare($sql);

//executing that statment
$stmt->execute();

//binding results for that statment
$stmt->bind_result($movie_id, $movie_name, $year_in, $rating, $nation);

//looping through all the records
while ($stmt->fetch()) {

    //pushing fetched data in an array
    $temp = [
        'movie_id' => $movie_id,
        'movie_name' => $movie_name,
        'year_in' => $year_in,
        'rating' => $rating,
        'nation' => $nation,
    ];

    //pushing the array inside the hero array
    array_push($movies, $temp);
}

//displaying the data in json format
echo json_encode($movies);