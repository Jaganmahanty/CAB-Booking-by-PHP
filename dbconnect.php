<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "cab_db";

$conn = mysqli_connect($servername, $username, $password, $database) or
         die ("Error In Database Connectivity ..");

// if (!$conn) {
//     die("Sorry we failed to connect database " . mysqli_connect_error());
// } else {
//     //echo "Connection established to database succefully<br>";
// }

?>