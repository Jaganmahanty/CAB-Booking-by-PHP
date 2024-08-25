<?php

$servername="localhost";
$username="root";
$password="";
$database="database1";

$conn=mysqli_connect($servername,$username,$password,$database);

if(!$conn){
    die("Sorry we failed to connect database ".mysqli_connect_error());
}
else{
    echo "Connection established to database succefully<br>";
}


$user=$_POST['user'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$sgsn=$_POST['sgsn'];

$sql="INSERT INTO tblpjt1(user, email, mobile, comment) VALUES ('$user','$email','$mobile','$sgsn')";

mysqli_query($conn,$sql);

header('location:index.php');

?>