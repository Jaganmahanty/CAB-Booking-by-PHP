<?php

require("dbconnect.php");

//fetch email id for upadte the record ..
if (isset($_GET["CUST_EMAIL"])) {
    $eid = $_GET["CUST_EMAIL"];
}

//upadteation logic ..
if (isset($_POST["btncustupdate"])) {

    // Assign the values from the form to variables.
    $upname = $_POST["txtcustupdatename"];
    $upaddress = $_POST["txtcustupdateaddress"];
    $uppincode = $_POST["txtcustupdatepincode"];
    $upcity = $_POST["txtcustupdatecity"];
    $upgender = $_POST["txtcustupdategender"];
    $upmobile = $_POST["txtcustupdatemobile"];

    //insert
    $query = "UPDATE custreg set custname = '{$upname}',
                                 custaddress = '{$upaddress}',
                                 custpincode = '{$uppincode}',
                                 custcity = '{$upcity}',
                                 custgender = '{$upgender}',
                                 custmobile = '{$upmobile}'
                                where custemail = '{$eid}'";

    //mysqli_query($conn, $query);


    // Attempt to execute the query and store the result in $res.
    // The @ symbol suppresses any potential error messages.
    $res = mysqli_query($conn, $query);

    // If the query was successful, display a JavaScript alert.
    if ($res) {
        echo '<script>alert("Details Updated Successfully ..")</script>';

    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Update Details ..</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            margin-top: 8px;
            margin-bottom: 60px;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 350px;
            padding: 20px;
            background-color: #fff;
            border-radius: 30px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            color: #007bff;
        }

        label {
            display: block;
            text-align: left;
            margin-bottom: 10px;
            color: #333;
        }

        input[type="text"],
        input[type="password"],
        input[type="phone"],
        input[type="email"] {
            width: 92%;
            padding: 10px;
            margin-bottom: 15px;
            border: 3px solid #ccc;
            border-radius: 30px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            margin-top: 15px;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .login-link a {
            text-decoration: none;
            margin-top: 10px;
            color: #007bff;
        }

        .select-wrapper {
            position: relative;
        }

        select {
            width: 92%;
            padding: 10px;
            margin-bottom: 15px;
            border: 3px solid #ccc;
            border-radius: 30px;
        }

        input[type="tel"] {
            width: 92%;
            padding: 10px;
            margin-bottom: 15px;
            border: 3px solid #ccc;
            border-radius: 30px;
            /* Add additional styles as needed */
        }

        /* Center-align and add padding between gender radio buttons */
        .gender-options {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 15px;
        }

        .gender-options label {
            display: flex;
            align-items: center;
            margin-top: 20px;
            margin-right: 20px;
            /* Adjust the padding between radio buttons */
            color: #333;
        }

        .gender-options input[type="radio"] {
            margin-top: 10px;
            margin-right: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Update Customer Details ..</h2>
        <form action="" method="post">
        
        <?php
        echo ("Current User Emial Id : - ".$eid);
        ?>

            <label for="name">Name :</label>
            <input type="text" id="name" name="txtcustupdatename" required>

            <label for="address">Address :</label>
            <input type="text" id="address" name="txtcustupdateaddress" required>

            <label for="pincode">Pincode :</label>
            <input type="phone" id="pincode" max="10" name="txtcustupdatepincode" required>

            <label for="city">City :</label>
            <div class="select-wrapper">
                <select id="city" name="txtcustupdatecity">
                    <option value="none" selected disabled hidden>--- Select City ---</option>
                    <option value="surat">Surat</option>
                    <option value="baroda">baroda</option>
                    <option value="ahmedabad">Ahmedabad</option>
                    <!-- Add more city options as needed -->
                </select>
            </div>

            <label for="txtcustgender">Gender :</label>
            <div class="gender-options">
                <input type="radio" id="male" name="txtcustupdategender" value="male" required>
                <label for="male">Male</label>

                <input type="radio" id="female" name="txtcustupdategender" value="female" required>
                <label for="female">Female</label>

            </div>

            <label for="mobile">Mobile Number :</label>
            <input type="tel" id="mobile" name="txtcustupdatemobile" max="10" required>

            <input type="submit" value="Update" name="btncustupdate">

        </form>
    </div>
</body>

</html>