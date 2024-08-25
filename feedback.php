<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 25px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        h2 {
            color: #007bff;
            text-align: center;
        }

        label {
            display: block;
            border-radius: 5px;
            margin-top: 15px;
            margin-bottom: 15px;
        }

        input[type="text"],
        textarea {
            width: 95%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 30px;
        }

        textarea {
            resize: vertical;
            height: 150px;
            /* Adjust as needed */
        }

        /* Add this CSS code to center the submit button */
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin: 0 auto;
            /* Center horizontally */
            display: block;
            /* Make it a block element to center it */
        }


        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Submit Your Opinion Here ..</h2>
        <form action="process_feedback.php" method="POST">

            <?php

            require("dbconnect.php");

            session_start();
            echo '<div class="center-text1"><h2>' . "User : " . $_SESSION["custname"] . '</h2></div>';

            ?>
            <label for="title">Title :</label>
            <input type="text" id="title" name="txttitle" required>

            <label for="description">Description :</label>
            <textarea id="description" name="txtdesc" required></textarea>

            <label for="additionalDetails">Suggestion :</label>
            <textarea id="additionalDetails" name="txtaddDetails" required></textarea>

            <input type="submit" value="Submit Your Feedback" name="btnsubmitfeedback">
        </form>
    </div>
</body>

</html>