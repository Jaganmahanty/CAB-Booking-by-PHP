<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
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
            margin-bottom: 15px;
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
    </style>
</head>

<body>
    <div class="container">
        <h2>Admin Registration</h2>
        <form action="" method="post">

            <label for="name">Admin Name :</label>
            <input type="text" id="name" name="txtadminname" required />

            <label for="email">Email Address :</label>
            <input type="text" id="email" name="txtadminemail" required />

            <?php
            // Include the "dbconnect.php" file, which presumably contains the database connection code.
            require("dbconnect.php");

            // *****            ADMIN Register           ***** 
            // Check if the form fields "txtname," "txtemail," and "txtpassword" are set in the POST request.
            if (isset($_POST["btnadminreg"])) {

                session_start();
                $_SESSION['adminname'] = $_POST["txtadminname"];
                // Assign the values from the form to variables.
                $adminname = $_POST["txtadminname"];
                $adminemail = $_POST["txtadminemail"];
                $adminpass = $_POST["txtadminpassword"];

                //preg match in reg email filed ..
                if (
                    !preg_match(
                        "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",
                        $adminemail
                    )
                ) {
                    echo "! Enter Proper Email Address .. !";
                } else {

                    // Create an SQL query to insert the provided data into a table called "adminreg."
                    $query = "INSERT into adminreg values ('{$adminname}','{$adminemail}','{$adminpass}')";

                    // Attempt to execute the query and store the result in $res.
                    // The @ symbol suppresses any potential error messages.
                    $res = mysqli_query($conn, $query);

                    // If the query was successful, display a JavaScript alert.
                    if ($res) {
                        echo '<script>alert("Admin Registered Successfully")</script>';
                        echo '<script>window.location.href = "adminLogin.php";</script>';
                    }
                }
            }
            ?>

            <label for="password">Password :</label>
            <input type="password" id="password" name="txtadminpassword" required />

            <input type="submit" value="Register" name="btnadminreg" />

            <div class="login-link">
                <a href="CustReg.php">Have An Account ? Click Here</a>
            </div>
            
        </form>
    </div>
</body>

</html>