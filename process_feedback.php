<?php
// Include the "dbconnect.php" file, which presumably contains the database connection code.
require("dbconnect.php");

// *****            FEEDBACK         ***** 
// Check if the form fields "txtname," "txtemail," and "txtpassword" are set in the POST request.
//insert  user data
if (isset($_POST["btnsubmitfeedback"])) {
    session_start();

    // Assign the values from the form to variables.
    $username = $_SESSION["custname"];
    $title = $_POST["txttitle"];
    $desc = $_POST["txtdesc"];
    $add = $_POST["txtaddDetails"];
    
    //insert
    $query = "INSERT into cust_feedback (user_name ,title_details , description_details , additional_details )
     values ('{$username}','{$title}','{$desc}','{$add}')";

    //mysqli_query($conn, $query);

    // Attempt to execute the query and store the result in $res.
    // The @ symbol suppresses any potential error messages.
    $res = mysqli_query($conn, $query);

    // If the query was successful, display a JavaScript alert.
    if ($res) {
        echo '<script>alert("feedback Submitted Successfully ..")</script>';
        echo '<script>window.location.href = "feedback.php";</script>';
    }
}
?>