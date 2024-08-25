<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
    

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
            margin: 10px auto;
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

        center-text {
            text-align: center;
            margin-top: 50px;
            vertical-align: top;
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

        /* Style for the search bar */
        .search-bar {
            display: inline-block;
            margin-left: 20px;
            /* Adjust the margin as needed to separate it from other navigation items */
        }

        /* Style for the search input */
        .search-input {
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        /* Style for the search button */
        .search-button {
            padding: 5px 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .search-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

    <?php

    session_start(); ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {

            $("#live_search").keyup(function () {

                var input = $(this).val();
                // alert(input);

                if (input != "") {
                    $.ajax({
                        url: "livesearch.php",
                        method: "POST",
                        data: { input: input },

                        success: function (data) {
                            $("#searchresult").html(data);
                            /*The html() method sets or returns the content (innerHTML) of the selected elements.*/
                        }
                    });
                }
                else {
                    $("#searchresult").html("");
                    //alert("empty");
                }
            });
        });
    </script>

    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="admin_showRides.php">Booked Rides</a></li>
            <li><a href="show_feedback.php">See Feedback</a></li>
            <li><a href="services.php">Services</a></li>
            <li><a href="contactUs.php">Contact</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="adminLogout.php">Logout</a></li>

            <li>
                <form method="POST" action="" class="search-bar">
                    <input type="text" id="live_search" class="search-input" placeholder="Search Customers Details">
                    <button type="submit" class="search-button">:)</button>
                </form>
            </li>

        </ul>
    </nav>

    <?php
    require("dbconnect.php");


    echo '<div class="center-text"><h2>' . "Welcome Admin : " . $_SESSION["adminname"] . '</h2></div>';


    // Handle search if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["search"])) {
        $search = $_POST["search"];
        // Modify your SQL query to search for customers based on the search input
        $query = "SELECT * FROM custreg WHERE 
                            custname LIKE '%$search%' OR
                            custaddress LIKE '%$search%' OR
                            custpincode LIKE '%$search%' OR
                            custcity LIKE '%$search%' OR
                            custgender LIKE '%$search%' OR
                            custmobile LIKE '%$search%' OR 
                            custemail LIKE '%$search%' ";
    } else {
        // Default query to fetch all customers
        $query = "SELECT * FROM custreg";
    }

    $result = mysqli_query($conn, $query);
    ?>

    <div id="searchresult"></div>
    <?php
    echo '<div class="tabletext" ><h2>' . ": Details Of Customers : " . '</h2></div>';
    ?>

    <div class="table_container">
        <table border='3'>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Pin Code</th>
                <th>City</th>
                <th>Gender</th>
                <th>Mobile</th>
                <th>Email Address</th>
                <th>Password</th>
                <th colspan=2>OPERATIONS</th>
            </tr>
            <?php
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
            ?>
        </table>
    </div>

    <!-- More HTML content goes here -->

</body>

</html>