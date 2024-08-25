<?php
// Include the "dbconnect.php" file, which presumably contains the database connection code.
require("dbconnect.php");

// *****            USER Register           ***** 
// Check if the form fields "txtname," "txtemail," and "txtpassword" are set in the POST request.
//insert  user data
if (isset($_POST["btncustreg"])) {
    session_start();
    $_SESSION["custname"] = $_POST["txtcustname"];

    // Assign the values from the form to variables.
    $cname = $_POST["txtcustname"];
    $address = $_POST["txtcustaddress"];
    $pincode = $_POST["txtcustpincode"];
    $city = $_POST["txtcustcity"];
    $gender = $_POST["txtcustgender"];
    $mobile = $_POST["txtcustmobile"];
    $cemail = $_POST["txtcustemail"];
    $cpass = $_POST["txtcustpassword"];
    
    //insert
    $query = "INSERT into custreg values ('{$cname}','{$address}','{$pincode}','{$city}',
                '{$gender}','{$mobile}','{$cemail}','{$cpass}')";

    // Attempt to execute the query and store the result in $res.
    // The @ symbol suppresses any potential error messages.
    $res = mysqli_query($conn, $query);

    // If the query was successful, display a JavaScript alert.
    if ($res) {
        echo '<script>alert("Customer Registered Successfully ..")</script>';
    }
}

// *****            USER login  ..         ***** 
//check for login details ..
if (isset($_POST["btncustlogin"])) {
    $loginid = $_POST["txtcustloginid"];
    $loginpass = $_POST["txtcustloginpas"];
    //session
    session_start();
    $q_name = "SELECT custname FROM custreg where custemail = '{$loginid}' and custpassword = '{$loginpass}'";
    $r = mysqli_query($conn, $q_name);
    $res = mysqli_fetch_array($r);
    print_r($res);
    $_SESSION["custname"] = $res["custname"];

    $query = "SELECT * FROM custreg where custemail = '{$loginid}' and custpassword = '{$loginpass}'";
    $r = mysqli_query($conn, $query);
    $res = mysqli_fetch_array($r);

    if ($res) {
        echo '<script>alert("Customer Logged In Successfully ..");</script>';
        echo '<script>window.location.href = "CustHome.php";</script>';
        exit; // Add exit to stop the script execution
    } else {
        echo '<script>alert("Invalid User Credentials ..")</script>';
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 300px;
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

        input[type="email"],
        input[type="password"] {
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
            border: none;
            border-radius: 30px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .signup-link {
            margin-top: 15px;
        }

        .signup-link a {
            text-decoration: none;
            color: #007bff;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Customer Login</h2>
        <form action="" method="post">

            <label for="id">Customer Email Id :</label>
            <input type="email" id="id" name="txtcustloginid" required>

            <label for="password">Password :</label>
            <input type="password" id="password" name="txtcustloginpas" required>

            <input type="submit" value="Login" name="btncustlogin">
        </form>
        <div class="signup-link">
            <a href="CustReg.php">Don't Have An Account?</a>
        </div>
    </div>
</body>

</html>