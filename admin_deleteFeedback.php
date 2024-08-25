<?php

require("dbconnect.php");

if (isset($_GET["FID"])) {
    $eid = $_GET["FID"];
    $query = "DELETE from cust_feedback where id = '{$eid}'";
    mysqli_query($conn, $query);
    header("Location:show_feedback.php");
}
?>