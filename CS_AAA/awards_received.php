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
    $sql="SELECT * FROM award_received WHERE staff_id='$staff_id' and id='$id2'";
    $query=mysqli_query($connect_Staff,$sql); 
    $row=mysqli_fetch_assoc($query);
?>

<p class="staff">Staff Name:<?php  $staff_name=$_SESSION['name']; echo $staff_name;?></p>
<!-- Update -->
    <div class="form1">
        <p>Awards Received</p>
    <form action="Sjc_C5_update.php" method="post">
    <table>
            <tr >
                <td><label>Name of the Award/Fellowship</label></td>
                <td><input type="text" name="awardname" placeholder="Award/Fellowship Name" value="<?php echo $row['award_name'];?>" autocomplete="off" required></td>   
                <td><label>Nature</label></td>
                <td><input type="radio" name="nature" value="Regional" <?php if($row['nature']=="Regional") {echo "checked";}?>>Regional
                <input type="radio" name="nature" value="National" <?php if($row['nature']=="National") {echo "checked";}?>>National
                <input type="radio" name="nature" value="International" <?php if($row['nature']=="International") {echo "checked";}?>>International
                </td>         
            </tr>
            <tr >
                <td><label>Award Date</label></td>
                <td><input type="date" name="adate" value="<?php echo $row['award_date'];?>" required></td> 
                <td><label></label>Awarding Agcency</td>
                <td><input type="text" name="awardagency" placeholder="Award Agency" value="<?php echo $row['award_agency'];?>" autocomplete="off" required></td>
            </tr>
            <tr >
                <td><label>Location</label></td>
                <td><input type="text" name="location" placeholder="Location" value="<?php echo $row['location'];?>" autocomplete="off" required></td>
                <td><label>Contact Details</label></td>
                <td><input type="text" name="cdetails" placeholder="Contact Details" value="<?php echo $row['contact_details'];?>" autocomplete="off" required></td>           
            </tr>
            <tr><td colspan="4" align="center"><input type="submit" value="Submit" name="update">
            <!-- <input type="reset" value="Clear"> -->
            <button id="back" onclick="return confirm('Are you sure you want to Back the process?')"><a href="Sjc_C5.php">Back</a></button>
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
    <p class="staff">Staff Name:<?php  $staff_name=$_SESSION['name']; echo $staff_name;?></p>
    <!-- Form -->
    <div class="form1">
        <p>Awards Received</p>
    <form action="Sjc_C5_insert.php" method="post">
    <table>
            <tr >
                <td><label>Name of the Award/Fellowship</label></td>
                <td><input type="text" name="awardname" placeholder="Award/Fellowship Name" autocomplete="off" required></td>   
                <td><label>Nature</label></td>
                <td><input type="radio" name="nature" value="Regional" required>Regional
                <input type="radio" name="nature" value="National">National
                <input type="radio" name="nature" value="International">International
                </td>         
            </tr>
            <tr >
                <td><label>Award Date</label></td>
                <td><input type="date" name="adate" required></td> 
                <td><label></label>Awarding Agcency</td>
                <td><input type="text" name="awardagency" placeholder="Award Agency" autocomplete="off" required></td>
            </tr>
            <tr >
                <td><label>Location</label></td>
                <td><input type="text" name="location" placeholder="Location" autocomplete="off" required></td>
                <td><label>Contact Details</label></td>
                <td><input type="text" name="cdetails" placeholder="Contact Details" autocomplete="off" required></td>           
            </tr>
            <tr><td colspan="4" align="center"><input type="submit" value="Submit" name="submit">
            <input type="reset" value="Clear"></td>
        </tr>
    </table>    
    </form>
    </div>
    <?php   }?>

        <!-- Reading Operations -->
        <div class="read">
        <table border="2">
            <tr>
            <!-- <th>Staff Id</th>
            <th>Author name</th>  -->
            <th>Name of the Award \ Fellowship</th>
            <th>Nature</th>
            <th>Award Date</th>
            <th>Awarding Agency</th>
            <th>Location</th>
            <th>Contact Details</th>
            <th>Operations</th>
             </tr> 
        <?php 
        include("Sjc_db.php");
        $staff_id=$_SESSION['id'];
        $sql="SELECT * FROM award_received where staff_id='$staff_id'";
        $query=mysqli_query($connect_Staff,$sql);
        if(mysqli_num_rows($query)>0)
        {
        while($row=mysqli_fetch_assoc($query))
        {
        ?> 
            <tr>
            <!-- <td><?php echo $row['staff_id']; ?></td>
            <td><?php echo $row['author_name']; ?></td> -->
            <td><?php echo $row['award_name']; ?></td>
            <td><?php echo $row['nature']; ?></td>
            <td><?php echo date( "d-m-Y",strtotime($row['award_date'])); ?></td><!--to conver the date into string-->
            <td><?php echo $row['award_agency']; ?></td>
            <td><?php echo $row['location']; ?></td>
            <td><?php echo $row['contact_details']; ?></td>
            <td><button id="delete" onclick="return confirm('Are you sure you want to delete this record?')"><a href="Sjc_C5_delete.php? id1=<?php echo $row['id'];?>">Delete</a></button>
            <button id="update" onclick="return confirm('Are you sure you want to update this record?')"><a href="Sjc_C5_update.php? id2=<?php echo $row['id'];?>">Update</a></button>
            </td>
            </tr>
        <?php 
        }
    }
        ?>
        </table>
    </div>
</body>
</html>