<?php
session_start();
if(!isset($_SESSION['login']))
    header('location:index.php');
?>
<?php 
        if(isset($_REQUEST['id4']))
        {
        include("Sjc_db.php");
        $id=$_REQUEST['id4'];
        $sql="SELECT * FROM phd_thesis where id='$id'";
        $query=mysqli_query($connect_Staff,$sql);
        $row=mysqli_fetch_assoc($query);
        header('content-type: application/pdf');
        $pdf="Thesis/viva_invitation/".$row['viva_invitation'];
        readfile($pdf);
        }
?>
<?php 
        if(isset($_REQUEST['id5']))
        {
        include("Sjc_db.php");
        $id=$_REQUEST['id5'];
        $sql="SELECT * FROM phd_thesis where id='$id'";
        $query=mysqli_query($connect_Staff,$sql);
        $row=mysqli_fetch_assoc($query);
        header('content-type: application/pdf');
        $pdf="Thesis/attendance/".$row['attendance'];
        readfile($pdf);
        }
?>
<?php 
        if(isset($_REQUEST['id6']))
        {
        include("Sjc_db.php");
        $id=$_REQUEST['id6'];
        $sql="SELECT * FROM phd_thesis where id='$id'";
        $query=mysqli_query($connect_Staff,$sql);
        $row=mysqli_fetch_assoc($query);
        header('content-type: application/pdf');
        $pdf="Thesis/viva_report/".$row['viva_report'];
        readfile($pdf);
        }
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
include("Sjc_style2.php");
?>
<body>
<?php include_once("Sjc_header.php"); ?>
<?php 
if(isset($_REQUEST['id2']))
{
    $staff_id=$_SESSION['id'];
    $id=$_REQUEST['id2'];
    $_SESSION['id2']=$_REQUEST['id2'];
    include("Sjc_db.php");
    $sql="SELECT * FROM phd_thesis WHERE staff_id='$staff_id' and id='$id'";
    $query=mysqli_query($connect_Staff,$sql); 
    $row=mysqli_fetch_assoc($query);
?>   
<!-- Update -->
<div class="form1" style="height:230px;">
<form action="Sjc_C6_th_update.php" method="post" enctype="multipart/form-data">
    <table>
        <tr><td colspan="6" align="center" style="font-size:30px;">Ph.D Thesis Viva Voce </td></tr>
        <tr><td><label>Scholar Name</label></td><td><input type="text" name="scname" placeholder="Scholar Name" value="<?php echo $row['scholar_name']; ?>" autocomplete="off" required></td>
            </tr>    
        <tr><td><label>  Date</label></td>
            <td><input type="date" name="tdate" value="<?php echo $row['tdate']; ?>" required></td>
                <td><label>  Time</label></td>
                <td><input type="time" name="time" placeholder="Time" value="<?php echo $row['time']; ?>" autocomplete="off"  required></td>          
                <td><label>  Venue</label></td>
                <td><input type="text" name="place" placeholder="Venue"  value="<?php echo $row['venue']; ?>" autocomplete="off"  required></td>
            </tr> 
    <tr><td>Viva Invitation</td>
        <td><input type="file" name="vivainvit" accept="application/pdf">
        <input type="hidden" name="vivainvit1"  value="<?php echo $row['viva_invitation']; ?>" required>
        </td>
        <td>Attendance</td>
        <td><input type="file" name="attend" accept="application/pdf">
        <input type="hidden" name="attend1"  value="<?php echo $row['attendance']; ?>" required>
        </td>
        <td>Viva Report</td>
        <td><input type="file" name="vivareport" accept="application/pdf">
        <input type="hidden" name="vivareport1"  value="<?php echo $row['viva_report']; ?>" required>
        </td>
        </tr>     
        <tr><td colspan="6" align="center"><input type="submit" value="Submit" name="update">
            <!-- <input type="reset" value="Clear"> -->
            <button id="back" onclick="return confirm('Are you sure you want to Back the process?')"><a href="Sjc_C6_thesis.php">Back</a></button>
            </td>
        </tr>      
    </table> 
    </form>
    </div>
<?php }
else
{
?>
<div class="form1" style="height:230px;">
<form action="Sjc_C6_th_insert.php" method="post" enctype="multipart/form-data">
    <table>
        <tr><td colspan="6" align="center" style="font-size:30px;">Ph.D Thesis Viva Voce </td></tr>
        <tr><td><label>Scholar Name</label></td><td><input type="text" name="scname" placeholder="Scholar Name" autocomplete="off" required></td>
            </tr>    
        <tr><td><label>  Date</label></td>
            <td><input type="date" name="tdate" required></td>
                <td><label>  Time</label></td>
                <td><input type="time" name="time" placeholder="  Time" autocomplete="off"  required></td>          
                <td><label>  Venue</label></td>
                <td><input type="text" name="place" placeholder="Venue" autocomplete="off"  required></td>
            </tr> 
    <tr><td>Viva Invitation</td>
        <td><input type="file" name="vivainvit" accept="application/pdf"></td>
        <td>Attendance</td>
        <td><input type="file" name="attend" accept="application/pdf"></td>
        <td>Viva Report</td>
        <td><input type="file" name="vivareport" accept="application/pdf"></td></tr>     
        <tr><td colspan="6" align="center"><input type="submit" value="Submit" name="submit">
            <input type="reset" value="Clear">
            </tr>       
    </table> 
    </form>
    </div>
<?php 
}
?>
<!-- Read Operations -->
<div class="read">
        <table border="2">
            <tr>
            <th>Scholar Name</th>
            <th>Date</th>
            <th>Time</th>
            <th>Venue</th>
            <th>Viva Invitation</th>
            <th>Attendance</th>
            <th>Viva Report</th>
            <th>Operations</th>
             </tr> 
        <?php 
        include("Sjc_db.php");
        $staff_id=$_SESSION['id'];
        $sql="SELECT * FROM phd_thesis where staff_id='$staff_id'";
        $query=mysqli_query($connect_Staff,$sql);
        if(mysqli_num_rows($query)>0)
        {
        while($row=mysqli_fetch_assoc($query))
        {
        ?> 
            <tr>
            <td><?php echo $row['scholar_name']; ?></td>
            <td><?php echo date( "d-m-Y",strtotime($row['tdate'])); ?></td>
            <td><?php echo $row['time']; ?></td>
            <td><?php echo $row['venue']; ?></td>
            <td><button id="delete" style="background:green;" name="view" onclick="return confirm('Do you want to view the pdf?')"><a href="Sjc_C6_thesis.php?id4=<?php echo $row['id']; ?>">View</a></button></form></td>
            <td><button id="delete" style="background:green;" name="view1" onclick="return confirm('Do you want to view the pdf?')"><a href="Sjc_C6_thesis.php?id5=<?php echo $row['id']; ?>">View</a></button></form></td>
            <td><button id="delete" style="background:green;" name="view2" onclick="return confirm('Do you want to view the pdf?')"><a href="Sjc_C6_thesis.php?id6=<?php echo $row['id']; ?>">View</a></button></form></td>
            <td><button id="delete" onclick="return confirm('Are you sure you want to delete this record?')"><a href="Sjc_C6_th_delete.php?id1=<?php echo $row['id'];?>">Delete</a></button>
            <button id="update" onclick="return confirm('Are you sure you want to update this record?')"><a href="Sjc_C6_th_update.php?id2=<?php echo $row['id'];?>">Update</a></button>
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