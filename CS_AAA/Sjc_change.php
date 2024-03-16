<?php if(isset($_POST['staff']))
                {
                $connect_staff=mysqli_connect("localhost","root","","sjc_project") or die("it is not connected");
                $staff_id=$_POST['sid'];
                $staff_password=$_POST['spsw'];
                $staff_new=$_POST['scpsw'];
                $sql="UPDATE staff_login set password='$staff_new' where staff_id='$staff_id' and password='$staff_password'";
                $query=mysqli_query($connect_staff,$sql);
                header('location:index.php?accept=1');
                }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sjc Login Form</title>
    <script>
        function validate()
        {       if(document.stlogin.snpsw.value=='')
        {
            alert("Required New Password");
            return false;
        }
        if(document.stlogin.scpsw.value=='')
        {
            alert("Required Confirm Password");
            return false;
        }
        if((document.stlogin.snpsw.value.length)<8)
        {
            alert("It should be 8 characters");
            return false;
        }
        if((document.stlogin.scpsw.value.length)<8)
        {
            alert("It should be 8 characters");
            return false;
        }
        if(document.stlogin.snpsw.value!=document.stlogin.scpsw.value)
        {
            alert("Incorrect Password");
            return false;
        }
        } 
    </script>
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
            padding: 10px;
            text-align: center;  
        }
        .heading header
        {
           color:white;  
            font-size: 50px;  
        }
        .login
        {
            margin-top: 10px;
            margin-left: auto;
            margin-right: auto;
            width: 480px;
            height: 480px;
            display: block;
            background-color: peru;
            border-radius: 30px;
            border-style:outset;
            box-shadow:20px 20px 10px grey;
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
            width: 40%;
            margin-left: 50px;
            display: flex;
            text-align: center;
            font-size: 20px;
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
            width: 40%;
            margin-left: 50px;
            display: flex;
            text-align: center;
            font-size: 20px;
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
        </style>
</head>
<body>
        <!-- <div class="heading"><header>St.Joseph's College (Autonomous)</header></div> -->
        <div class="login">
            <div class="image"><img src="images/sjcbanner_10.png"></div>
            <div class="l_name">Change Password</div>
            <form action="Sjc_change.php" method="post" name="stlogin"  onsubmit="return(validate());">
                <div class="division">
                <div class="u_name">   
                        <div class="uname">
                            Staff Id
                        </div>
                        <div class="uname1">
                            <input type="text" name="sid" id="un" placeholder="i.e., 12ug3120" autocomplete="off" value="<?php if(isset($_REQUEST['id']))
                            {
                                $staff_id=$_REQUEST['id'];
                                echo $staff_id;
                            }
                            ?>
                            " readonly>
                        </div>
                </div> 
                <div class="p_sw">
                        <div class="psw">Password</div>
                        <div class="psw1"> 
                        <input type="text" name="spsw" id="ps" placeholder="password" value="<?php echo "123456"; ?>" autocomplete="off"  readonly>
                        </div>
                </div>
                <div class="p_sw">
                        <div class="psw">New Password</div>
                        <div class="psw1"> 
                        <input type="password" name="snpsw" id="ps" placeholder="New Password" maxlength="8" autocomplete="off" required>
                        </div>
                </div>
                <div class="p_sw">
                        <div class="psw">Confirm Password</div>
                        <div class="psw1"> 
                        <input type="password" name="scpsw" id="ps" placeholder="Confirm Password" maxlength="8" autocomplete="off" required>
                        </div>
                </div>
                <div class="btn">
                    <div class="sbtn"><input type="submit" value="Change" name="staff">
                    </div>
                </div>
            </div>
            </form>
        </div>
</body>
</html>  