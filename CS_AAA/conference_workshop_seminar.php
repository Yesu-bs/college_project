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
<?php 
if(isset($_REQUEST['id2']))
{
    $staff_id=$_SESSION['id'];
    $id2=$_REQUEST['id2'];
    $_SESSION['id2']=$_REQUEST['id2'];
include("Sjc_db.php");
$sql="SELECT * FROM seminar WHERE staff_id='$staff_id' and id='$id2'";
$query=mysqli_query($connect_Staff,$sql); 
$row=mysqli_fetch_assoc($query);
?>
<p class="staff">Staff Name:<?php  $staff_name=$_SESSION['name']; echo $staff_name;?></p>
<div class="form1">
        <p>The Attended/Organised Conference/Seminar/Workshop </p>
    <form action="Sjc_C2_update.php" method="post">
    <table>
            <tr>
                <td><label>Type</label></td>
                <td><input type="radio" name="type1" value="Organised" <?php if($row['type']=="Organised") {echo "checked";}?>>Organised
                <input type="radio" name="type1" value="Attended" <?php if($row['type']=="Attended") {echo "checked";}?>>Attended
                </td>    
                <td><label>Category</label></td>
                <td><input type="radio" name="category" value="Conference" <?php if($row['category']=="Conference") {echo "checked";}?>>Conference
                <input type="radio" name="category" value="Seminar" <?php if($row['category']=="Conference") {echo "checked";}?>>Seminar
                <input type="radio" name="category" value="Workshop" <?php if($row['category']=="Conference") {echo "checked";}?>>Workshop
                </td>          
            </tr>
            <tr>
            <td><label>Title</label></td>
                <td><input type="text" name="title" placeholder="Title" autocomplete="off" value="<?php echo $row['Title'];?>" required></td> 
            <td><label>Nature</label></td>
                <td><input type="radio" name="nature" value="Regional" <?php if($row['Nature']=="Regional") {echo "checked";}?>>Regional
                <input type="radio" name="nature" value="National" <?php if($row['Nature']=="National") {echo "checked";}?>>National
                <input type="radio" name="nature" value="International" <?php if($row['Nature']=="International") {echo "checked";}?>>International
                </td>        
            </tr>
            <tr>
            <td><label>Mode</label></td>
                <td><input type="radio" name="mode" value="Online" <?php if($row['Mode']=="Online") {echo "checked";}?>>Online
                <input type="radio" name="mode" value="Offline" <?php if($row['Mode']=="Offline") {echo "checked";}?>>Offline
                </td>      
            <td><label>Institution Name</label></td>
                <td><input type="text" name="iname" placeholder="Institution Name"  value="<?php echo $row['institution_name'];?>" autocomplete="off" required></td>  
            </tr>
            <tr><td><label>Institution Place</label></td>
                <td><input type="text" name="place" placeholder="Place" autocomplete="off"  value="<?php echo $row['instituion_place'];?>" required></td>
                <td><label>From Date</label></td>
                <td><input type="date" name="sdate" value="<?php echo $row['begin'];?>" required></td>          
            </tr>       
            <tr>
            <td><label>To Date</label></td>
                <td><input type="date" name="edate" value="<?php echo $row['end'];?>" required></td>  
                <td><label>Sponsered by</label></td>
                <td><input type="text" name="sname" placeholder="Sponser Name" value="<?php echo $row['Sponsered'];?>" autocomplete="off" required></td> 
            </tr>
            <tr>
            <td><label>Amount</label></td>
                <td><input type="number" name="amount" placeholder="Amount" value="<?php echo $row['Amount'];?>" autocomplete="off" required></td>
            </tr>    
            <tr><td colspan="4" align="center"><input type="submit" value="Submit" name="update">
            <!-- <input type="reset" value="Clear"></td> -->
            <button id="back" onclick="return confirm('Are you sure you want to Back the process?')"><a href="Sjc_C2.php">Back</a></button>
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
    <div class="form1">
        <p>The Attended/Organised Conference/Seminar/Workshop </p>
    <form action="Sjc_C2_insert.php" method="post">
    <table>
            <tr>
            <td><label>Type</label></td>
                <td><input type="radio" name="type1" value="Organised" required>Organised
                <input type="radio" name="type1" value="Attended">Attended
                </td>
                <td><label>Category</label></td>
                <td><input type="radio" name="category" value="Conference" required>Conference
                <input type="radio" name="category" value="Seminar">Seminar
                <input type="radio" name="category" value="Workshop">Workshop
                </td>          
            </tr>
            <tr>
            <td><label>Title</label></td>
                <td><input type="text" name="title" placeholder="Title" autocomplete="off" required></td> 
                <td><label>Nature</label></td>
                <td><input type="radio" name="nature" value="Regional" required>Regional
                <input type="radio" name="nature" value="National">National
                <input type="radio" name="nature" value="International">International
                </td>        
            </tr>
            <tr>
            <td><label>Mode</label></td>
                <td><input type="radio" name="mode" value="Online" required>Online
                <input type="radio" name="mode" value="Offline">Offline
                </td>      
            <td><label>Institution Name</label></td>
                <td><input type="text" name="iname" placeholder="Institution Name" autocomplete="off" required></td>  
            </tr>
            <tr><td><label>Institution Place</label></td>
                <td><input type="text" name="place" placeholder="Place" autocomplete="off" required></td>
                <td><label>From Date</label></td>
                <td><input type="date" name="sdate" required></td>           
            </tr>  
            <tr>
            <td><label>To Date</label></td>
                <td><input type="date" name="edate" required></td> 
                <td><label>Sponsered by</label></td>
                <td><input type="text" name="sponsered" placeholder="Sponser Name" autocomplete="off" required></td>  
            </tr>         
            <tr>
            <td><label>Amount</label></td>
                <td><input type="number" name="amount" placeholder="Amount" autocomplete="off" required></td>
            </tr>
            <tr><td colspan="4" align="center"><input type="submit" value="Submit" name="submit">
            <!-- <input type="submit" value="Edit"> -->
            <input type="reset" value="Clear"></td>
        </tr>
    </table>    
    </form>
    </div>
<?php 
}
?>
<!-- Reading Operations -->
<div class="read">
        <table border="2">
            <tr>
            <!-- <th>Staff Id</th>
            <th>Author name</th>  -->
            <th>Type</th>
            <th>Category</th>
            <th>Title</th>
            <th>Nature</th>
            <th>Mode</th>
            <th>Institution Name</th>
            <th>Institution Place</th>
            <th>From Date</th>
            <th>To Date</th>
            <th>Sponsered by</th>
            <th>Amount</th>
            <th>Operations</th>
             </tr> 
        <?php 
        include("Sjc_db.php");
        $staff_id=$_SESSION['id'];
        $sql="SELECT * FROM seminar where staff_id='$staff_id'";
        $query=mysqli_query($connect_Staff,$sql);
        if(mysqli_num_rows($query)>0)
        {
        while($row=mysqli_fetch_assoc($query))
        {
        ?> 
            <tr>
            <!-- <td><?php echo $row['staff_id']; ?></td>
            <td><?php echo $row['author_name']; ?></td> -->
            <td><?php echo $row['type']; ?></td>
            <td><?php echo $row['category']; ?></td>
            <td><?php echo $row['Title']; ?></td>
            <td><?php echo $row['Nature']; ?></td>
            <td><?php echo $row['Mode']; ?></td>
            <td><?php echo $row['institution_name']; ?></td>
            <td><?php echo $row['instituion_place']; ?></td>
            <td><?php echo date( "d-m-Y",strtotime($row['begin'])); ?></td>
            <td><?php echo date( "d-m-Y",strtotime($row['end'])); ?></td>
            <td><?php echo $row['Sponsered']; ?></td>
            <td><?php echo $row['Amount']; ?></td>
            <td><button id="delete" onclick="return confirm('Are you sure you want to delete this record?')"><a href="Sjc_C2_delete.php? id1=<?php echo $row['id'];?>">Delete</a></button>
            <button id="update" onclick="return confirm('Are you sure you want to update this record?')"><a href="Sjc_C2_update.php? id2=<?php echo $row['id'];?>">Update</a></button>
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