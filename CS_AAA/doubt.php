<?php
session_start();
if(!isset($_SESSION['login']))
    header('location:index.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College home page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php
include("Sjc_style.php");
?>
<body>
<?php include_once("Sjc_header.php"); ?>
<p style="margin-top:5px;color:red; font-size: 20px;">Note: All the fields are mandatory. Put the empty field as (-) or NULL .</p>
<?php if(isset($_REQUEST['id2']))
{
    $staff_id=$_SESSION['id'];
    $id2=$_REQUEST['id2'];
    $_SESSION['id2']=$_REQUEST['id2'];
include("Sjc_db.php");
$sql="SELECT * FROM research_project WHERE staff_id='$staff_id' and id='$id2'";
$query=mysqli_query($connect_Staff,$sql); 
$row=mysqli_fetch_assoc($query);
$month=$row['month'];
$year=$row['year'];
?>
<!-- Update -->
<p class="staff">Staff Name:<?php  $staff_name=$_SESSION['name']; echo $staff_name;?></p>
    <div class="form1">
        <p>Research Projects</p>
    <form action="Sjc_C3_update.php" method="post">
    <table>
            <tr>
            <td><label>Title of the Research Project</label></td>
                <td><input type="text" name="rp_name" placeholder="Project Title" autocomplete="off" value="<?php echo $row['project_title'];?>" required></td>
                <td><label>Type</label></td>
                <td><input type="radio" name="type" value="Minor" <?php if($row['type']=="Minor") {echo "checked";}?> required>Minor
                <input type="radio" name="type" value="Major" <?php if($row['type']=="Major") {echo "checked";}?>>Major
                </td>           
            </tr>
            <tr>
                <td><label>Agency Name</label></td>
                <td><input type="text" name="agname" placeholder="Name of Agency" autocomplete="off" value="<?php echo $row['agency_name'];?>" required></td>  
                <td><label>Agency Location</label></td>
                <td><input type="text" name="location" placeholder="Loaction" autocomplete="off" value="<?php echo $row['agency_location'];?>" required></td>          
            </tr>
            <tr><td><label>Period of Work</label></td>
                <td><input type="text" name="pwork" placeholder="Period of Work" autocomplete="off" value="<?php echo $row['period_work'];?>" required></td>  
                <td><label>Amount Sanctioned</label></td>
                <td><input type="number" name="amount_sanctioned" placeholder="Amount Sanctioned" value="<?php echo $row['amount_sanctioned'];?>" autocomplete="off" required></td>        
            </tr>
            <tr> 
            <td><label>Amount Received</label></td>
            <td><input type="number" name="amount_received" placeholder="Amount Received" value="<?php echo $row['amount_received'];?>"  autocomplete="off" required></td>
            <td><label>Publication Month & Year</label></td>
                <td>
                <select name="mon">
                <option  hidden="" disabled="disabled" selected="selected" 
        value="none">Month</option>
                <?php include("Sjc_db.php");
            $sql1="SELECT `month` FROM sjc_month";
            $query1=mysqli_query($connect_Staff,$sql1);
            while($row1=mysqli_fetch_assoc($query1))
            {
                if($row1['month']==$month)
                {
            ?>
                <option value="<?php echo $row1['month'];?>" selected><?php echo $row1['month']; ?></option>
            <?php }
            else
            {
            ?>     
             <option value="<?php echo $row1['month'];?>"><?php echo $row1['month']; ?></option>   
            <?php }
            } ?> 
            </select>
                
                <select name="year">
                    <option  hidden="" disabled="disabled" selected="selected" 
        value="none">year</option>
                    <?php include("Sjc_db.php");
            $sql1="SELECT `year` FROM sjc_date";
            $query1=mysqli_query($connect_Staff,$sql1);
            while($row1=mysqli_fetch_assoc($query1))
            {
                if($row1['year']==$year)
                {
            ?>
                    <option value="<?php echo $row1['year'];?>" selected><?php echo $row1['year'];?></option>
            <?php }
            else
            {
            ?>        
            <option value="<?php echo $row1['year'];?>" ><?php echo $row1['year'];?></option>
            <?php }
        }
        ?>
                </select>
            </td>      
        </tr>
            <tr><td colspan="4" align="center"><input type="submit" value="Submit" name="update">
            <!-- <input type="reset" value="Clear"> -->
            <button id="back" onclick="return confirm('Are you sure you want to Back the process?')"><a href="Sjc_C4.php">Back</a></button>
        </td>
        </tr>
    </table>    
    </form>
    </div>
<?php
}
else
{ 
?>
<!-- Form -->
<p class="staff">Staff Name:<?php  $staff_name=$_SESSION['name']; echo $staff_name;?></p>
<div class="form1">
        <p>Research Projects</p>
    <form action="Sjc_C3_insert.php" method="post">
    <table>
            <tr>
            <td><label>Title of the Research Project</label></td>
                <td><input type="text" name="rp_name" placeholder="Project Title" autocomplete="off" required></td>
                <td><label>Type</label></td>
                <td><input type="radio" name="type" value="Minor" required>Minor
                <input type="radio" name="type" value="Major">Major
                </td>            
            </tr>
            <tr>
                <td><label>Agency Name</label></td>
                <td><input type="text" name="agname" placeholder="Name of Agency" autocomplete="off" required></td>  
                <td><label>Agency Location</label></td>
                <td><input type="text" name="location" placeholder="Loaction" autocomplete="off" required></td>          
            </tr>
            <tr><td><label>Period of Work</label></td>
                <td><input type="text" name="pwork" placeholder="Period of Work" autocomplete="off" required></td>  
                <td><label>Amount Sanctioned</label></td>
                <td><input type="number" name="amount_sanctioned" placeholder="Amount Sanctioned" autocomplete="off" required></td>        
            </tr>
            <tr> 
            <td><label>Amount Received</label></td>
            <td><input type="number" name="amount_received" placeholder="Amount Received" autocomplete="off" required></td>
            <td><label>Publication Month & Year</label></td>
            <td>
            <select name="mon" required>
            <option  value="" >Month</option>
            <?php include("Sjc_db.php");
        $sql="SELECT `month` FROM sjc_month";
        $query=mysqli_query($connect_Staff,$sql);
        while($row=mysqli_fetch_assoc($query))
        {
        ?>
                <option value="<?php echo $row['month'];?>"><?php echo $row['month']; ?></option>
        <?php }?>        
            </select>
            <select name="year" required>
                <option value="" >year</option>
                <?php include("Sjc_db.php");
        $sql="SELECT `year` FROM sjc_date";
        $query=mysqli_query($connect_Staff,$sql);
    
} ?>    
