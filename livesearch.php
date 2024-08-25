<?php

require("dbconnect.php");


if (isset($_POST['input'])) 
{
    echo '<div class="tabletext" style="text-align: center;"><h2>' . ": Live Search Table : " . '</h2></div>';


    $input = $_POST['input'];
    $query = "SELECT * FROM custreg WHERE 
                        custname LIKE '%$input%' OR 
                        custaddress LIKE '%$input%' OR
                        custpincode LIKE '%$input%' OR
                        custcity LIKE '%$input%' OR
                        custgender LIKE '%$input%' OR  
                        custmobile LIKE '%$input%' OR    
                        custemail LIKE '%$input%'  OR    
                        custpassword LIKE '%$input%'
                         ";

    //echo $query;

    $result = mysqli_query($conn, $query);

    echo "<table border='1'> 
                <th>Name</th>
                <th>Address</th>
                <th>Pin Code</th>
                <th>City</th>
                <th>Gender</th>
                <th>Mobile</th>
                <th>Email Address</th>
                <th>Password</th>";

    while ($r = mysqli_fetch_array($result)) {
        echo "<tr><td>" . $r["custname"] .
            "</td><td>" . $r["custaddress"] .
            "</td><td>" . $r["custpincode"] .
            "</td><td>" . $r["custcity"] .
            "</td><td>" . $r["custgender"] .
            "</td><td>" . $r["custmobile"] .
            "</td><td>" . $r["custemail"] .
            "</td> <td>" . $r["custpassword"] .
            "</td> </tr>";
    }

    echo "</table>";
}
?>