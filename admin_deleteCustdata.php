<?php

require("dbconnect.php");

if (isset($_GET["CUST_EMAIL"])) {
    $eid = $_GET["CUST_EMAIL"];
    $query = "DELETE from custreg where custemail='{$eid}'";
    mysqli_query($conn, $query);
    header("Location:adminHome.php");

}

if (isset($_GET["CUST"])) {
    $eid = $_GET["CUST"];
    $query = "DELETE from temp where id='{$eid}'";
    mysqli_query($conn, $query);
    header("Location:admin_showRides.php");

}
?>