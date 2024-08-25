<?php
// Include the "dbconnect.php" file, which presumably contains the database connection code.
require("dbconnect.php");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

    <!-- Internal CSS styles -->
    <style>
        /* CSS styles for the body */
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

        /* CSS styles for the container */
        .container {
            width: 300px;
            padding: 20px;
            background-color: #fff;
            border-radius: 30px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        /* CSS styles for the heading */
        h2 {
            color: #007bff;
        }

        /* CSS styles for labels */
        label {
            display: block;
            text-align: left;
            margin-bottom: 10px;
            color: #333;
        }

        /* CSS styles for input fields */
        input[type="text"],
        input[type="password"] {
            width: 92%;
            padding: 10px;
            margin-bottom: 15px;
            border: 3px solid #ccc;
            border-radius: 30px;
        }

        /* CSS styles for submit button */
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        /* CSS styles for submit button on hover */
        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* CSS styles for the signup link */
        .signup-link {
            margin-top: 15px;
        }

        /* CSS styles for the signup link text */
        .signup-link a {
            text-decoration: dashed;
            color: #007bff;
        }
    </style>
</head>

<body>
    <!-- Container for the login form -->
    <div class="container">
        <!-- Heading -->
        <h2>Admin Login</h2>

        <!-- Form for admin login with input fields -->
        <form action="" method="post">
            <label for="id">Admin Email :</label>
            <input type="text" id="id" name="txtadminloginid" required>

            <?php
            // *****            ADMIN login           ***** 
            
            //Checking login functionality .. 
            if (isset($_POST["btnadminlogin"])) {
                $adminid = $_POST["txtadminloginid"];
                $adminpass = $_POST["txtadminloginpass"];

                if (!filter_var($adminid, FILTER_VALIDATE_EMAIL)) {
                    echo "! Enter Proper Email Address .. !";
                } else {

                    //session
                    session_start();
                    $q_name = "SELECT adminname FROM adminreg where adminemail = '{$adminid}' and adminpassword = '{$adminpass}'";
                    $r = mysqli_query($conn, $q_name);
                    $res = mysqli_fetch_array($r);
                    print_r($res);
                    $_SESSION["adminname"] = $res["adminname"];

                    $query = "SELECT * from adminreg where adminemail ='{$adminid}' and adminpassword ='{$adminpass}'";
                    $r = mysqli_query($conn, $query);

                    $res = mysqli_fetch_array($r);
                    if ($res) {
                        echo '<script>alert("Admin Logged In Successfully ..");</script>';
                        echo '<script>window.location.href = "adminHome.php";</script>';
                        exit; // Add exit to stop the script execution
                    } else {
                        echo '<script>alert("User Does not Exists ..")</script>';
                    }
                }
            }
            ?>

            <label for="password">Password :</label>
            <input type="password" id="password" name="txtadminloginpass" required>

            <input type="submit" value="Register" name="btnadminlogin">
        </form>

        <!-- Signup link -->
        <div class="signup-link">
            <a href="AdminReg.php">Don't Have An Account?</a>
        </div>
    </div>
</body>

</html>