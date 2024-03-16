<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - Max.com</title>
    <style>
        /* Global styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body {
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        /* Card styles */
        .card {
            width: 400px;
            background: #ffffff;
            border-radius: 8px;
            padding: 40px;
            box-shadow: 0px 4px 16px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        /* Image styles */
        .image img {
            width: 100px;
            margin-bottom: 20px;
        }
        /* Heading styles */
        .heading {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333333;
        }
        /* Error message styles */
        .error {
            margin-bottom: 10px;
            color: #ff3e3e;
        }
        /* Form styles */
        form {
            text-align: left;
        }
        input[type="text"],
        input[type="password"],
        input[type="submit"] {
            width: 100%;
            padding: 14px;
            margin-bottom: 20px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            box-sizing: border-box;
            transition: box-shadow 0.3s ease;
        }
        input[type="text"]:focus,
        input[type="password"]:focus {
            outline: none;
            box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.1);
        }
        input[type="submit"] {
            background-color: #0062ff;
            color: #ffffff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #004dc7;
        }
    </style>
</head>
<body>
    <!-- Card -->
    <div class="card">
        <!-- Image -->
        <div class="image">
            <img src="images/logo.png" alt="Logo">
        </div>
        <!-- Heading -->
        <div class="heading">Sign In</div>
        <!-- Error messages -->
        <div class="error">
            <!-- PHP error messages here -->
        </div>
        <!-- Form -->
        <form action="login.php" method="post">
            <!-- Username input -->
            <input type="text" name="username" placeholder="Username" autocomplete="off" autofocus required><br>
            <!-- Password input -->
            <input type="password" name="password" placeholder="Password" autocomplete="off" required><br>
            <!-- Submit button -->
            <input type="submit" value="Sign In">
        </form>
    </div>
</body>
</html>
