<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Home</title>
    <style>
        body {
            background-image: url('images/cab1.jpg');
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            /* Set flex direction to column */
            align-items: center;
            height: 100vh;
            background-size: 100%;
            /* This will cover the entire background */
            background-repeat: no-repeat;
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
            width: 95%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 20px;
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
            <li><a href="services.php">Services</a></li>
            <li><a href="feedback.php">Feedback</a></li>
            <li><a href="contactUs.php">Contact</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="custLogout.php">Logout</a></li>
        </ul>
    </nav>
    <?php

    require("dbconnect.php");

    session_start();
    echo '<div class="center-text1"><h2>' . "Welcome User : " . $_SESSION["custname"] . '</h2></div>';

    ?>

    <div class="container">
        <h2>Book Your Ride ..</h2>

        <form action="cabBookProcess.php" method="post">

            <label for="from">Select From :</label>
            <select id="from" name="combooffrom" required>
                <option value="none" selected disabled hidden>--- Select City ---</option>
                <option value="Surat">Surat</option>
                <option value="Baroda">Baroda</option>
                <option value="Ahmedabad">Ahmedabad</option>
                <option value="Delhi">Delhi</option>
                <option value="Mumbai">Mumbai</option>
                <!-- Add more options as needed -->
            </select>

            <label for="to">Select To :</label>
            <select id="to" name="comboofto" required>
                <option value="none" selected disabled hidden>--- Select City ---</option>
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
                <option value="none" selected disabled hidden>--- Select Car ---</option>
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

            <input type="submit" value="Book Now" name="btncustride">
        </form>
    </div>
</body>

</html>