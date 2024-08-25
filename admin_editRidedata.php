<?php

if (isset($_GET["CUST"])) {
    $uid = $_GET["CUST"];
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if "from" key exists in the $_POST array
    if (isset($_POST["combooffrom"])) {
        $from = $_POST["combooffrom"];
    } else {
        $from = "";
    }

    // Check if "to" key exists in the $_POST array
    if (isset($_POST["comboofto"])) {
        $to = $_POST["comboofto"];
    } else {
        $to = "";
    }

    // Check if "carModel" key exists in the $_POST array
    if (isset($_POST["comboofmodel"])) {
        $carModel = $_POST["comboofmodel"];
    } else {
        $carModel = "";
    }

    // Check if any of the required dropdowns have not been selected
    if ($from === "" || $to === "" || $carModel === "") {
        echo '<script>alert("Please select values for all dropdowns.");</script>';
        echo '<script>window.location.href = "./custHome.php";</script>';
    } else {
        // All required dropdowns have been selected, you can proceed with form submission
        // Your form submission logic here

        // Include the "dbconnect.php" file, which presumably contains the database connection code.
        require("dbconnect.php");

        // *****            Ride Book           ***** 
        // Check if the form fields "," "," and "" are set in the POST request.
        //Insert the record into table
        // if (isset($_POST["btncustride"])) {
        //     session_start();
        //     //--$_SESSION['adminname'] = $_POST["txtadminname"];
        //     // Assign the values from the form to variables.

        //     $r_name = $_SESSION["custname"];
        //     $r_from = $_POST["combooffrom"];
        //     $r_to = $_POST["comboofto"];
        //     $r_date = $_POST["comboofdate"];
        //     $r_model = $_POST["comboofmodel"];

        //     // Create an SQL query to insert the provided data into a table called "adminreg."
        //     $query = "INSERT into temp (custname ,from_location ,to_location,ride_date ,car_model) 
        //              values ('{$r_name}','{$r_from}','{$r_to}','{$r_date}','{$r_model}')";

        //     // Attempt to execute the query and store the result in $res.
        //     // The @ symbol suppresses any potential error messages.
        //     $res = mysqli_query($conn, $query);

        //     // If the query was successful, display a JavaScript alert.
        //     if ($res) {
        //         //echo '<script>alert("Your Ride Is booked Successfully ..")</script>';
        //         echo '<script>alert("Ride has been booked for your Destination ..");</script>';
        //     }
        // }




        //Insert the record into table
        if (isset($_POST["btnupdateride"])) {



            session_start();
            //--$_SESSION['adminname'] = $_POST["txtadminname"];
            // Assign the values from the form to variables.

            $r_name = $_SESSION["custname"];
            $r_from = $_POST["combooffrom"];
            $r_to = $_POST["comboofto"];
            $r_date = $_POST["comboofdate"];
            $r_time = $_POST["combooftime"];
            $datetime = $r_date . ' ' .$r_time;
            $r_model = $_POST["comboofmodel"];

            // Create an SQL query to insert the provided data into a table called "adminreg."
            $query = " UPDATE temp SET from_location = '{$r_from}',
                                      to_location = '{$r_to}',
                                      ride_date = '{$datetime}',
                                      car_model = '{$r_model}'
                                      where id = {$uid} ";

            // Attempt to execute the query and store the result in $res.
            // The @ symbol suppresses any potential error messages.
            $res = mysqli_query($conn, $query);

            // If the query was successful, display a JavaScript alert.
            if ($res) {
                //echo '<script>alert("Your Ride Is booked Successfully ..")</script>';
                echo '<script>alert("Ride has been Updated for your Destination ..");</script>';
            }
            session_abort();
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Ride Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            /* Set flex direction to column */
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 350px;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-top: 25px;
            /* Align at the bottom */
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

        select,
        input[type="text"] {
            width: 92%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="date"],
        input[type="time"] {
            width: 89%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 20px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            margin-top: 10px;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .center-text1 {
            text-align: center;
            margin-top: 30px;
            vertical-align: top;
            /* Adjust other styles as needed */
        }

        /* Style for the navigation bar */
        nav {
            background-color: #007bff;
            width: 100%;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }

        /* Style for the navigation links */
        nav ul {
            list-style-type: none;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin-right: 80px;
            /* Adjust the spacing between links as needed */
        }

        nav ul li a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            transition: color 0.3s;
        }

        nav ul li a:hover {
            color: #0056b3;
        }
    </style>
</head>

<body>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="services.php">Services</a></li>
            <li><a href="contactUs.php">Contact</a></li>
            <li><a href="custLogout.php">Logout</a></li>
        </ul>
    </nav>
    <?php

    require("dbconnect.php");

    session_start();
    echo '<div class="center-text1"><h2>' . "Welcome User : " . $_SESSION["custname"] . '</h2></div>';

    ?>

    <div class="container">
        <h2>Update Your Ride ..</h2>

        <form action="" method="post">

            <label for="from">Select From :</label>
            <select id="from" name="combooffrom" required>
                <option value="none" selected disabled hidden>---Select City ---</option>
                <option value="Surat">Surat</option>
                <option value="Baroda">Baroda</option>
                <option value="Ahmedabad">Ahmedabad</option>
                <option value="Delhi">Delhi</option>
                <option value="Mumbai">Mumbai</option>
                <!-- Add more options as needed -->
            </select>

            <label for="to">Select To :</label>
            <select id="to" name="comboofto" required>
                <option value="none" selected disabled hidden>---Select StatCity ---</option>
                <option value="Ahmedabad">Ahmedabad</option>
                <option value="Delhi">Delhi</option>
                <option value="Mumbai">Mumbai</option>
                <option value="Surat">Surat</option>
                <option value="Baroda">Baroda</option>
                <!-- Add more options as needed -->
            </select>

            <label for="date">Select Journey Date and Time:</label>
            <div style="display: flex; gap: 10px;">
                <input type="date" id="date" name="comboofdate" style="flex: 1;" required>

                <input type="time" id="time" name="combooftime" style="flex: 1;" required>
            </div>

            <label for="carModel">Select PickUp Car Model :</label>
            <select id="carModel" name="comboofmodel" required>
                <option value="none" selected disabled hidden>---Select StatCity ---</option>
                <option value="Maruti Suzuki">Maruti Suzuki</option>
                <option value="Skoda">Skoda</option>
                <option value="Fortuner">Fortuner</option>
                <option value="Eeco">Eeco</option>
                <option value="Omni">Omni</option>
                <option value="Swift Dzire">Swift Dzire</option>
                <option value="Mercedez">Mercedez</option>
                <option value="BMW">BMW</option>
                <option value="Audi">Audi</option>
                <option value="Supra">Supra</option>
                <option value="Bugati">Bugati</option>
                <option value="Rolls Royce">Rolls Royce</option>
                <option value="lamborghini Urus">lamborghini Urus</option>
                <!-- Add more car models as needed -->
            </select>

            <input type="submit" value="Update Now" name="btnupdateride">
        </form>
    </div>
</body>

</html>