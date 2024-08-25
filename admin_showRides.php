<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Rides ..</title>

    <!-- Add your CSS styles here -->
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

        /* CSS styles go here */
        /* Table styles */
        table {
            width: flex;
            border-collapse: collapse;
            margin: 0px auto;
            border-radius: 10px;
        }

        th,
        td {
            text-align: center;
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            text-align: center;
            background-color: #007bff;
            color: #fff;
        }

        tr:nth-child(even) {
            text-align: center;
            background-color: #f2f2f2;
        }

        /* Link styles */
        a {
            text-decoration: none;
            color: #007bff;
            transition: color 0.3s;
        }

        a:hover {
            color: #0056b3;
        }

        /* Edit and Delete button styles */
        .action-btn {
            padding: 6px 12px;
            border: none;
            background-color: #007bff;
            color: #fff;
            border-radius: 40px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .action-btn:hover {
            background-color: #0056b3;
        }

        /* Center-align the table */
        .table-container {
            display: flex;
            justify-content: center;
        }

        .center_text {
            text-align: center;
            margin-top: 50px;
            vertical-align: top;
            /* Adjust other styles as needed */
        }

        .tabletext {
            size: 20x;

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
            <li><a href="adminHome.php">Customers</a></li>
            <li><a href="services.php">Services</a></li>
            <li><a href="contactUs.php">Contact</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="adminLogout.php">Logout</a></li>
        </ul>
    </nav>

    <?php
    require("dbconnect.php");

    session_start();
    echo '<div class="center_text"><h2>' . "Welcome Admin : " . $_SESSION["adminname"] . '</h2></div>';
    echo '<div class="tabletext"><h2>' . ": Booked Rides : " . '</h2></div>';

    ?>

    <div class="table-container">
        <table border='3'>
            <tr>
            <th>Unique Key</th>
                <th>Customer Name</th>
                <th>From</th>
                <th>To</th>
                <th>Ride date</th>
                <th>Cab Model</th>

                <th colspan=2>OPERATIONS</th>
            </tr>
            <?php
            // Place the PHP code for generating the table here
            $query = "SELECT * from temp";
            $result = mysqli_query($conn, $query);

            while ($r = mysqli_fetch_array($result)) {
                $unique_id = $r["id"];
                echo "<tr>
                    <td>" . $r["id"] . "</td> 
                    <td>" . $r["custname"] . "</td> 
                    <td>" . $r["from_location"] . "</td>
                    <td>" . $r["to_location"] . "</td> 
                    <td>" . $r["ride_date"] . "</td> 
                    <td>" . $r["car_model"] . "</td>  
                    <td><a href='admin_editRidedata.php?CUST={$unique_id}'>EDIT RIDE</a></td> 
                    <td><a href='admin_deleteCustdata.php?CUST={$unique_id}'>DELETE RIDE</a></td> 
                    </tr>";
            }
            ?>
        </table>
    </div>

</body>

</html>