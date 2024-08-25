<?php

session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
        }

        /* Table styles */
        table {
            width: 80%;
            /* Adjust the width as needed */
            border-collapse: collapse;
            margin: 20px auto;
            /* Adjust margin as needed */
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
            background-color: #007bff;
            color: #fff;
        }

        tr:nth-child(even) {
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

        center-text {
            text-align: center;
            margin-top: 50px;
            border: 1px solid #ccc;
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
            <li><a href="admin_showRides.php">Booked Rides</a></li>
            <li><a href="services.php">Services</a></li>
            <li><a href="contatctUs.php">Contact</a></li>
            <li><a href="adminLogout.php">Logout</a></li
        </ul>
    </nav>

</html>

<?php
require("dbconnect.php");

echo '<div class="center-text"><h2>' . "Welcome Admin : " . $_SESSION["adminname"] . '</h2></div>';
echo '<div class="tabletext"><h2>' . ": List Of Customers : " . '</h2></div>';

// Check if a search query was submitted
if (isset($_POST["search"])) {
    // Get the search query
    $searchQuery = mysqli_real_escape_string($conn, $_POST["search"]);

    // Construct the SQL query to search for customers
    $query = "SELECT * FROM custreg WHERE 
              custname LIKE '%$searchQuery%' OR
              custaddress LIKE '%$searchQuery%' OR
              custpincode LIKE '%$searchQuery%' OR
              custcity LIKE '%$searchQuery%' OR
              custgender LIKE '%$searchQuery%' OR
              custmobile LIKE '%$searchQuery%' OR
              custemail LIKE '%$searchQuery%'";

    // Execute the query
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        echo '<div class="table-container">';
        echo '<table border="3">';
        echo '<tr>
                <th>Name</th>
                <th>Address</th>
                <th>Pin Code</th>
                <th>City</th>
                <th>Gender</th>
                <th>Mobile</th>
                <th>Email Address</th>
                <th>Password</th>
                <th colspan="2">OPERATIONS</th>
              </tr>';

        while ($r = mysqli_fetch_array($result)) {
            $cemail = $r["custemail"];
            echo "<tr>
                <td>" . $r["custname"] . "</td> 
                <td>" . $r["custaddress"] . "</td>
                <td>" . $r["custpincode"] . "</td> 
                <td>" . $r["custcity"] . "</td> 
                <td>" . $r["custgender"] . "</td> 
                <td>" . $r["custmobile"] . "</td> 
                <td>" . $r["custemail"] . "</td> 
                <td>" . $r["custpassword"] . "</td> 
                <td><a href='admin_editCustdata.php?CUST_EMAIL={$cemail}'>EDIT</a></td> 
                <td><a href='admin_deleteCustdata.php?CUST_EMAIL={$cemail}'>DELETE</a></td> 
                </tr>";
        }

        echo '</table>';
        echo '</div>';
    } else {
        echo '<p>No customers found matching the search criteria.</p>';
    }
} else {
    echo '<p>Please enter a search query.</p>';
}
?>