<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Login Form</title>
    <style>
        /* Global styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        body {
            background-color: #ffffff; /* White background color */
            color: #333; /* Text color */
        }
        /* Container styles */
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #e8f4f8; /* Light blue background color */
        }
        /* Card styles */
        .card {
            background: #365B6D; /* Dark teal card background */
            border-radius: 8px;
            padding: 30px;
            /* Add 3D effect */
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1), 0 6px 6px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
            width: 90%;
            max-width: 400px;
        }
        .card:hover {
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2), 0 8px 8px rgba(0, 0, 0, 0.2);
        }
        /* Banner styles */
        .banner {
            text-align: center;
            margin-bottom: 20px;
        }
        .banner img {
            width: 80%; /* Adjust the width to fit the card */
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }
        /* Heading styles */
        .heading {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
            color: #ffffff; /* White color for heading */
        }
        /* Error message styles */
        .error {
            margin-bottom: 20px; /* Increased margin for better spacing */
            text-align: center;
            color: #ff6e6e; /* Error color */
            font-weight: bold;
        }
        /* Division styles */
        .division {
            background: #5a8396; /* Dark teal background for form */
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px; /* Increased margin for better spacing */
        }
        .division table tr td,
        .division table tr th {
            padding: 10px;
            font-size: 16px;
            color: #ffffff; /* Text color for form */
        }
        /* Input styles */
        input[type="text"],
        input[type="password"],
        input[type="submit"] {
            width: calc(100% - 20px); /* Adjusted width for inputs */
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 10px;
            border: 1px solid #ccc; /* Border color */
            background-color: #34495e; /* Dark teal background for input */
            color: #ffffff; /* Text color for input */
        }
        /* Submit button styles */
        input[type="submit"] {
            width: 100%; /* Button width set to 100% */
            background: #28a745; /* Green button background color */
            cursor: pointer;
            border: none;
            transition: background 0.3s ease;
        }
        input[type="submit"]:hover {
            background: #218838; /* Darker green button background color on hover */
        }
    </style>
</head>
<body>
    <!-- Container -->
    <div class="container">
        <!-- Card -->
        <div class="card">
            <!-- Banner -->
            <div class="banner">
                <img src="./images/sjcbanner_10.png" alt="College Banner">
            </div>
            <!-- Heading -->
            <div class="heading">Staff Login</div>
            <!-- Error messages -->
            <div class="error" id="error1">
                <?php 
                if(isset($_REQUEST['err'])) {
                    echo "<p>Invalid AdminId or Password</p>";
                }
                ?>
            </div>
            <div class="error" id="error2">
                <?php 
                if(isset($_REQUEST['err1'])) {
                    echo "<p>Invalid StaffId or Password</p>";
                }
                ?>
            </div>
            <!-- Division -->
            <div class="division">
                <!-- Form -->
                <form action="login_valid.php" method="post">
                    <table>
                        <!-- Staff ID input -->
                        <tr>
                            <th>Staff Id</th>
                            <td><input type="text" name="sid" placeholder="Enter your staff ID" autocomplete="off" autofocus required></td>
                        </tr>
                        <!-- Password input -->
                        <tr>
                            <th>Password</th>
                            <td><input type="password" name="spsw" placeholder="Enter your password" autocomplete="off" required></td>
                        </tr>
                        <!-- Submit button -->
                        <tr>
                            <td colspan="2"><input type="submit" value="Login" name="staff"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>

    <!-- Popup message for inactive staff -->
    <?php 
    if(isset($_GET['status']) && $_GET['status'] == 'inactive') {
        echo "<script>alert('Staff member is inactive. Please contact admin.');</script>";
    }
    ?>
</body>
</html>
