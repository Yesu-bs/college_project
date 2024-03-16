<?php
session_start();
if(!isset($_SESSION['login']))
    header('location:index.php');
?>
<?php 
        if(isset($_POST['view']))
        {
        include("Sjc_db.php");
        $staff_id=$_SESSION['id'];
        $sql="SELECT * FROM phd_supervisor where staff_id='$staff_id'";
        $query=mysqli_query($connect_Staff,$sql);
        $row=mysqli_fetch_assoc($query);
        header('content-type: application/pdf');
        $pdf="Guides_Letter/".$row['approved_letter'];
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
include("Sjc_style1.php");
?>
<body>
<?php include_once("Sjc_header1.php"); ?>
<div class="read1">
        <table border="1">
            <tr>
             <th>Reference No.</th>   
            <th>Ph.D. Supervisor List</th>
            </tr> 
        <?php 
        include("Sjc_db.php");
        $sql="SELECT * FROM phd_guides"; 
        $query=mysqli_query($connect_Staff,$sql);
        if(mysqli_num_rows($query)>0)
        {
        while($row=mysqli_fetch_assoc($query))
        {
        ?> 
            <tr>
            <td><?php echo $row['reference_no']; ?></td>   
            <td><?php echo $row['guide_name']; ?></td>
            </td>
            </tr>
        <?php 
        }
    }
        ?>
        </table>
    </div>
    <?php 
    if(isset($_REQUEST['id2']))
    {
    $staff_id=$_SESSION['id'];
    $pdf=$_REQUEST['id2'];
    include("Sjc_db.php");
    $sql="SELECT * FROM phd_supervisor WHERE staff_id='$staff_id' and approved_letter='$pdf'";
    $query=mysqli_query($connect_Staff,$sql); 
    $row=mysqli_fetch_assoc($query);
        ?>
<!-- Update -->
   <div class="form1">
        <p>Add New Guide</p>
    <form action="Sjc_C6_super_update.php" method="post" enctype="multipart/form-data" autocomplete="off">
    <table>
            <tr >
                <td><label>Supervisor Name</label></td>
                <td><input type="text" name="sname" placeholder="Supervisor Name" value="<?php echo $row['supervisor_name']; ?>" required></td>   
                <td><label>Reference No.</label></td>
                <td><input type="text" name="ref_no" placeholder="Reference Number" value="<?php echo $row['reference_no']; ?>" required></td>         
            </tr>
            <tr >
                <td><label>Approval Date</label></td>
                <td><input type="date" name="adate" value="<?php echo $row['approval_date'];?>" required></td> 
                <td><label></label>Approved Letter</td>
                <td><input type="file" name="aletter" accept=".pdf"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="aletter1" value="<?php echo $row['approved_letter'];?>" required></td>
                <tr><td colspan="4" align="center"><input type="submit" value="Submit" name="update">
            <!-- <input type="reset" value="Clear"> -->
            <button id="back" onclick="return confirm('Are you sure you want to Back the process?')"><a href="Sjc_C6_super.php">Back</a></button>
            </td>
        </tr>
    </table>    
    </form>
    </div>
   <?php }
   else
   {
    ?>
    <div class="form1">
        <p>Add New Guide</p>
    <form action="Sjc_C6_super_insert.php" method="post" enctype="multipart/form-data" autocomplete="off">
    <table>
            <tr >
                <td><label>Supervisor Name</label></td>
                <td><input type="text" name="sname" placeholder="Supervisor Name"  required></td>   
                <td><label>Reference No.</label></td>
                <td><input type="text" name="ref_no" placeholder="Reference Number" required></td>         
            </tr>
            <tr >
                <td><label>Approval Date</label></td>
                <td><input type="date" name="adate" required></td> 
                <td><label></label>Approved Letter</td>
                <td><input type="file" name="aletter" accept=".pdf" required></td>
            </tr>
            <tr><td colspan="4" align="center"><input type="submit" value="Submit" name="submit">
            <input type="reset" value="Clear"></td>
        </tr>
    </table>    
    </form>
    </div>
    <?php
    if(isset($_REQUEST['err']))
    {
        echo "<p style='margin-top:5px;color:red; font-size: 20px;'>Note: You couldn't enter more than one record in this form.</p>";

    } 
    ?>
    <?php
   }
    ?>
    <div class="read">
        <table border="2">
            <tr>
            <th>Staff id</th>
            <th>Supervisor name</th>
            <th>Reference No.</th>
            <th>Approval date</th>
            <th>Approved Letter</th>
            <th>Operations</th>
             </tr> 
        <?php 
        include("Sjc_db.php");
        $staff_id=$_SESSION['id'];
        $sql="SELECT * FROM phd_supervisor where staff_id='$staff_id'";
        $query=mysqli_query($connect_Staff,$sql);
        if(mysqli_num_rows($query)>0)
        {
        while($row=mysqli_fetch_assoc($query))
        {
        ?> 
            <tr>
            <td><?php echo $row['staff_id']; ?></td>
            <td><?php echo $row['supervisor_name']; ?></td>
            <td><?php echo $row['reference_no']; ?></td>
            <td><?php echo date( "d-m-Y",strtotime($row['approval_date'])); ?></td><!--to conver the date into string-->
            <td><form action="" method="post"><button id="delete" style="background:green;" name="view" onclick="return confirm('Do you want to view the pdf?')">View</button></form></td>
            <td><button id="delete" onclick="return confirm('Are you sure you want to delete this record?')"><a href="Sjc_C6_super_delete.php?id1=<?php echo $row['approved_letter'];?>">Delete</a></button>
            <button id="update" onclick="return confirm('Are you sure you want to update this record?')"><a href="Sjc_C6_super_update.php?id2=<?php echo $row['approved_letter'];?>">Update</a></button>
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