
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            margin-top: 100px;
            margin-bottom: 60px;
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
        input[type="password"],
        input[type="phone"],
        input[type="email"] {
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

        .select-wrapper {
            position: relative;
        }

        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 3px solid #ccc;
            border-radius: 30px;
        }

        input[type="tel"] {
            width: 92%;
            padding: 10px;
            margin-bottom: 15px;
            border: 3px solid #ccc;
            border-radius: 30px;
            /* Add additional styles as needed */
        }

        /* Center-align and add padding between gender radio buttons */
        .gender-options {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 15px;
        }

        .gender-options label {
            display: flex;
            align-items: center;
            margin-top: 20px;
            margin-right: 20px;
            /* Adjust the padding between radio buttons */
            color: #333;
        }

        .gender-options input[type="radio"] {
            margin-top: 10px;
            margin-right: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Customer Registration</h2>
        <form action="custLogin.php" method="post">

            <label for="name">Name:</label>
            <input type="text" id="name" name="txtcustname" required>

            <label for="address">Address:</label>
            <input type="text" id="address" name="txtcustaddress" required>

            <label for="pincode">Pincode:</label>
            <input type="phone" id="pincode" max="10" name="txtcustpincode" required>

            <label for="city">City:</label>
            <div class="select-wrapper">
                <select id="city" name="txtcustcity">
                <option value="none" selected disabled hidden>---Select City ---</option>
                    <option value="surat">Surat</option>
                    <option value="baroda">baroda</option>
                    <option value="ahmedabad">Ahmedabad</option>
                    <!-- Add more city options as needed -->
                </select>
            </div>

            <label for="txtcustgender">Gender:</label>
            <div class="gender-options">
                <input type="radio" id="male" name="txtcustgender" value="male" required>
                <label for="male">Male</label>

                <input type="radio" id="female" name="txtcustgender" value="female" required>
                <label for="female">Female</label>

            </div>

            <label for="mobile">Mobile Number:</label>
            <input type="tel" id="mobile" name="txtcustmobile"  max="10" required>

            <label for="email">Email Address:</label>
            <input type="email" id="email" name="txtcustemail" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="txtcustpassword" required>

            <input type="submit" value="Register" name="btncustreg">

            <div class="login-link">
                <a href="custLogin.php">Already Have An Account? Click Here</a>
            </div>
        </form>
    </div>
</body>

</html>