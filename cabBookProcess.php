<?php
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
        echo '<script>window.location.href = "custHome.php";</script>';
    } else {
        // All required dropdowns have been selected, you can proceed with form submission
        // Your form submission logic here

        // Include the "dbconnect.php" file, which presumably contains the database connection code.
        require("dbconnect.php");

        // *****            Ride Book           ***** 
        // Check if the form fields "," "," and "" are set in the POST request.
        //Insert the record into table
        if (isset($_POST["btncustride"])) {
            session_start();
            //--$_SESSION['adminname'] = $_POST["txtadminname"];
            // Assign the values from the form to variables.

            $r_name = $_SESSION["custname"];
            $r_from = $_POST["combooffrom"];
            $r_to = $_POST["comboofto"];
            $r_date = $_POST["comboofdate"];
            $r_time = $_POST["combooftime"];
            $datetime = $r_date . ' ' . $r_time;
            echo $datetime;
            $r_model = $_POST["comboofmodel"];

            // Create an SQL query to insert the provided data into a table called "adminreg."
            $query = "INSERT into temp (custname , from_location , to_location , ride_date , car_model) 
                     values ('{$r_name}','{$r_from}','{$r_to}','{$datetime}','{$r_model}')";

            // Attempt to execute the query and store the result in $res.
            // The @ symbol suppresses any potential error messages.
            $res = mysqli_query($conn, $query);

            // If the query was successful, display a JavaScript alert.
            if ($res) {
                //echo '<script>alert("Your Ride Is booked Successfully ..")</script>';
                echo '<script>alert("Ride has been booked for your Destination ..");</script>';
                echo '<script>window.location.href = "custHome.php";</script>';
                
            }
        }

        if (isset($_GET["CUST"])) {
            $uid = $_GET["CUST"];
        }


        //Insert the record into table
        if (isset($_POST["btnupdateride"])) {


            session_start();
            //--$_SESSION['adminname'] = $_POST["txtadminname"];
            // Assign the values from the form to variables.

            $r_name = $_SESSION["custname"];
            $r_from = $_POST["combooffrom"];
            $r_to = $_POST["comboofto"];
            $r_date = $_POST["comboofdate"];
            $r_model = $_POST["comboofmodel"];

            // Create an SQL query to insert the provided data into a table called "adminreg."
            $query = "UPDATE temp SET from_location = '{$r_from}',
                                      to_location = '{$r_to}',
                                      ride_date = '{$r_date}',
                                      car_model = '{$r_model}'
                                      where id = '{$uid}'";

            // Attempt to execute the query and store the result in $res.
            // The @ symbol suppresses any potential error messages.
            $res = mysqli_query($conn, $query);

            // If the query was successful, display a JavaScript alert.
            if ($res) {
                //echo '<script>alert("Your Ride Is booked Successfully ..")</script>';
                echo '<script>alert("Ride has been booked for your Destination ..");</script>';
            }
        }
    }
}
?>