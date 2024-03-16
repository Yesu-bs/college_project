<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sjc Login Form</title>
    <style>
        *
        {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Times New Roman', Times, serif;
        }
        body
        {
            background: lightblue;
        }
        .heading
        {
            background: teal;
            height:80px;
            padding:5px;
            text-align: center;  
        }
        .heading header
        {
            text-align:center;
            color:white; 
            font-size: 50px;  
        }
        .login
        {
            margin-top: 30px;
            margin-left: auto;
            margin-right: auto;
            width: 480px;
            height: 480px;
            display: block;
            background-color: peru;
            border-radius: 30px;
        }
        .image
        {
            margin-left: auto;
            margin-right: auto; 
        }
        .image img
        {
            width: 300px;
            height: 130px;
            margin-left: 20%;
        }
        .l_name
        {
           font-size: 30px;
           color: Red;
           background: black;
           font-weight: bold;
           text-align: center; 
        }
        .division
        {
            width: 100%;
            margin-left: auto;
            margin-right: auto;
        }
        .u_name
        {
            width: 100%;
            margin-left: auto;
            margin-right: auto;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .uname
        {
            width: 20%;
            margin-left: 50px;
            display: flex;
            text-align: center;
            font-size: 30px;
            margin-top: 20px;
        }
        .uname1
        {
            width: 50%;
            display: flex;
            margin-left: 25px;
            margin-top: 20px;
        }
        .uname1 input
        {
            padding: 10px;
            border-radius: 10px;
        }
        .p_sw
        {
            width: 100%;
            margin-left: auto;
            margin-right: auto;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .psw
        {
            width: 20%;
            margin-left: 50px;
            display: flex;
            text-align: center;
            font-size: 30px;
            margin-top: 20px;    
        }
        .psw1
        {
            width: 50%;
            display: flex;
            margin-left: 25px;
            margin-top: 20px;
        }
        .psw1 input
        {
            padding: 10px;
            border-radius: 10px;
        }
        .btn
        {
            margin-left: auto;
            margin-right: auto;
            margin-top: 20px;
        }
        .sbtn
       {
        width: 100%;
       }
       .sbtn input
       {
        margin-left: 50%;
        width: 80px;
        padding: 10px;
        border-radius: 30px;
        background: white;
        cursor: pointer;
        color:black;
       }
       .sbtn input:hover
       {
        background: black;
        cursor: pointer;
        color:white;
       }
       .sbtn1 
       {
        width:100%;
        margin-left:35%;
        margin-top:10px;
       }
       .sbtn1 a
       {
        text-decoration:none;
        color: blue;
        font-size:20px;
       }
       .sbtn1 a:hover
       {
        color: Green;
       }
       .error
       {
        margin-top:20px;
        text-align:center;
        color: red;
        font-weight:bold;
       }
        </style>
</head>
<body>
        <!-- <div class="heading"><header>St.Joseph's College (Autonomous)</header></div> -->
        <div class="login">
            <div class="image"><img src="sjcbanner_10.png"></div>
            <div class="l_name">SJC Staff Login</div>
            <form action="login_valid.php" method="post">
                <div class="division">
                <div class="u_name">   
                        <div class="uname">
                            Staff Id
                        </div>
                        <div class="uname1">
                            <input type="text" name="sid" id="un" placeholder="i.e., 12ug3120" autocomplete="off" autofocus required>
                        </div>
                </div> 
                <div class="p_sw">
                        <div class="psw">Password</div>
                        <div class="psw1"> 
                        <input type="password" name="spsw" id="ps" placeholder="password" autocomplete="off" required>
                        </div>
                </div>
                <div class="btn">
                    <div class="sbtn"><input type="submit" value="Login" name="staff">
                    </form>
                    </div>
                <div class="sbtn1"><a href="Sjc_forget.php">Forgot Password?</a></div>
                    <div class="error">
                    <?php 
                    if(isset($_REQUEST['err']))
                    {
                    echo "<p style='color:red; text-align:center;'>Invalid StaffId or Password </p>";
                    }
                    ?>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>  