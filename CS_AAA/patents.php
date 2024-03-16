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
$sql="SELECT * FROM patent WHERE staff_id='$staff_id' and id='$id2'";
$query=mysqli_query($connect_Staff,$sql); 
$row=mysqli_fetch_assoc($query);
?>

<!-- Update -->
<p class="staff">Staff Name:<?php  $staff_name=$_SESSION['name']; echo $staff_name;?></p>
    <div class="form1">
        <p>Patent</p>
    <form action="Sjc_C4_update.php" method="POST">
    <table>
            <tr><td><label>Applied Organization</label></td>
                <td><input type="text" name="aorganization" placeholder="Applied Organization" value="<?php echo $row['applied_organization'];?>" autocomplete="off" required></td>           
                <td><label>Nature</label></td>
                <td><input type="radio" name="nature" value="Published" <?php if($row['nature']=="Published") {echo "checked";}?> required>Published
                <input type="radio" name="nature" value="Granted" <?php if($row['nature']=="Granted") {echo "checked";}?>>Granted
                </td>
            </tr>
            <tr >
                <td>Patent Number</td>
                <td><input type="text" name="pnumber" placeholder="Patent Number" value="<?php echo $row['patent_number'];?>" autocomplete="off" required></td> 
                <td>Patent Details</td>
                <td><input type="text" name="pdetails" placeholder="Patent Details" value="<?php echo $row['patent_details'];?>" autocomplete="off" required></td>           
            </tr>
            <tr><td>Applied Date</td>
                <td><input type="date" name="appdate"  autocomplete="off" value="<?php echo $row['applied_date'];?>" required></td> 
                <td>Approval Date</td>
                <td><input type="date" name="apprdate"  autocomplete="off" value="<?php echo $row['approval_date'];?>" required></td>           
            </tr>
            <tr >
                <td>Co-Applier(s)</td>
                <td><input type="text" name="co-applier"  placeholder="Co-Applier(s)" value="<?php echo $row['coappliers'];?>" autocomplete="off" required></td> 
                <td>Revenue Generated</td>
                <td><input type="text" name="rgenerated"  placeholder="Revenue Generated" value="<?php echo $row['revenue_generated'];?>" autocomplete="off" required></td> 
            </td>            
            </tr>
            <tr><td colspan="4" align="center"><input type="submit" value="Submit" name="update">
            <!-- <input type="reset" value="Clear"></td> -->
            <button id="back" onclick="return confirm('Are you sure you want to Back the process?')"><a href="Sjc_C4.php">Back</a></button>
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
        <!-- form -->
<div class="form1">
        <p>Patent</p>
    <form action="Sjc_C4_insert.php" method="post">
    <table>
            <tr><td><label>Applied Organization</label></td>
                <td><input type="text" name="aorganization" placeholder="Applied Organization" autocomplete="off" required></td>           
                <td><label>Nature</label></td>
                <td><input type="radio" name="nature" value="Published" required>Published
                <input type="radio" name="nature" value="Granted">Granted
                </td>
            </tr>
            <tr >
                <td>Patent Number</td>
                <td><input type="text" name="pnumber" placeholder="Patent Number" autocomplete="off" required></td> 
                <td>Patent Details</td>
                <td><input type="text" name="pdetails" placeholder="Patent Details" autocomplete="off" required></td>           
            </tr>
            <tr><td>Applied Date</td>
                <td><input type="date" name="appdate"  autocomplete="off" required></td> 
                <td>Approval Date</td>
                <td><input type="date" name="apprdate"  autocomplete="off" required></td>           
            </tr>
            <tr >
                <td>Co-Applier(s)</td>
                <td><input type="text" name="co-applier"  placeholder="Co-Applier(s)" autocomplete="off" required></td> 
                <td>Revenue Generated</td>
                <td><input type="text" name="rgenerated"  placeholder="Revenue Generated" autocomplete="off" required></td> 
            </td>            
            </tr>
            <tr><td colspan="4" align="center"><input type="submit" value="Submit" name="submit">
            <input type="reset" value="Clear"></td>
        </tr>
    </table>    
    </form>
    </div>
    <?php }?>

    
        <!-- Reading Operations -->
        <div class="read">
        <table border="2">
            <tr>
            <!-- <th>Staff Id</th>
            <th>Author name</th>  -->
            <th>Applied Organization</th>
            <th>Nature</th>
            <th>Patent Number</th>
            <th>Paten Details</th>
            <th>Applied Date</th>
            <th>Approval Date</th>
            <th>Co-Applier(s)</th>
            <th>Revenue Generated</th>
            <th>Operations</th>
             </tr> 
        <?php 
        include("Sjc_db.php");
        $staff_id=$_SESSION['id'];
        $sql="SELECT * FROM patent where staff_id='$staff_id'";
        $query=mysqli_query($connect_Staff,$sql);
        if(mysqli_num_rows($query)>0)
        {
        while($row=mysqli_fetch_assoc($query))
        {
        ?> 
            <tr>
            <!-- <td><?php echo $row['staff_id']; ?></td>
            <td><?php echo $row['author_name']; ?></td> -->
            <td><?php echo $row['applied_organization']; ?></td>
            <td><?php echo $row['nature']; ?></td>
            <td><?php echo $row['patent_number']; ?></td>
            <td><?php echo $row['patent_details']; ?></td>
            <td><?php echo date( "d-m-Y",strtotime($row['applied_date'])); ?></td><!--to conver the date into string-->
            <td><?php echo date( "d-m-Y",strtotime($row['approval_date'])); ?></td><!--to conver the date into string-->
            <td><?php echo $row['coappliers']; ?></td>
            <td><?php echo $row['revenue_generated']; ?></td>
            <td><button id="delete" onclick="return confirm('Are you sure you want to delete this record?')"><a href="Sjc_C4_delete.php? id1=<?php echo $row['id'];?>">Delete</a></button>
            <button id="update" onclick="return confirm('Are you sure you want to update this record?')"><a href="Sjc_C4_update.php? id2=<?php echo $row['id'];?>">Update</a></button>
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