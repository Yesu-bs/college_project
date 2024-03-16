<?php
session_start();
if(!isset($_SESSION['login']))
    header('location:index.php');
?>
<?php 
        if(isset($_REQUEST['id5']))
        {
        include("Sjc_db.php");
        $id=$_REQUEST['id5'];
        $sql="SELECT * FROM conferred where id='$id'";
        $query=mysqli_query($connect_Staff,$sql);
        $row=mysqli_fetch_assoc($query);
        header('content-type: application/pdf');
        $pdf="Conferred/declaration_result/".$row['dec_result'];
        readfile($pdf);
        }
?>
<?php 
        if(isset($_REQUEST['id6']))
        {
        include("Sjc_db.php");
        $id=$_REQUEST['id6'];
        $sql="SELECT * FROM conferred where id='$id'";
        $query=mysqli_query($connect_Staff,$sql);
        $row=mysqli_fetch_assoc($query);
        header('content-type: application/pdf');
        $pdf="Conferred/degree/".$row['degree_result'];
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
<?php include_once("Sjc_header1.php"); ?>
<?php 
if(isset($_REQUEST['id2']))
{
    $staff_id=$_SESSION['id'];
    $id=$_REQUEST['id2'];
    $_SESSION['id2']=$_REQUEST['id2'];
    include("Sjc_db.php");
    $sql="SELECT * FROM conferred WHERE staff_id='$staff_id' and id='$id'";
    $query=mysqli_query($connect_Staff,$sql); 
    $row=mysqli_fetch_assoc($query);
?>
<div class="form1" style="height:230px;">
<form action="Sjc_C6_co_update.php" method="post" enctype="multipart/form-data">
    <table>
        <tr><td colspan="6" align="center" style="font-size:30px;">Ph.D. Conferred</td></tr>
        <tr><td><label>Scholar Name</label></td><td><input type="text" name="scname" value="<?php echo $row['scholar_name']; ?>" placeholder="Scholar Name" autocomplete="off" required>
        <input type="hidden" name="scname1" value="<?php echo $row['scholar_name']; ?>" placeholder="Scholar Name" autocomplete="off" required>
         </td>
        </tr>     
        <tr><td>Ph.D. Declaration of Result</td>
        <td><input type="file" name="dcresult" accept="application/pdf">
            <input type="hidden" name="dcresult1" value="<?php echo $row['dec_result']; ?>" required>
        </td>
        <td>Ph.D. Degree Certificate</td>
        <td><input type="file" name="degree" accept="application/pdf" >
            <input type="hidden" name="degree1" value="<?php echo $row['degree_result']; ?>" required>
        </td>
        </tr>    
        <tr><td colspan="6" align="center"><input type="submit" value="Submit" name="update">
            <!-- <input type="reset" value="Clear"> -->
            <button id="back" onclick="return confirm('Are you sure you want to Back the process?')"><a href="Sjc_C6_conferred.php">Back</a></button>
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
<div class="form1" style="height:230px;">
<form action="Sjc_C6_co_insert.php" method="post" enctype="multipart/form-data" >
    <table>
        <tr><td colspan="6" align="center" style="font-size:30px;">Ph.D. Conferred</td></tr>
        <tr><td><label>Scholar Name</label></td><td><input type="text" name="scname" placeholder="Scholar Name" autocomplete="off" required></td>
        </tr>     
        <tr><td>Ph.D. Declaration of Result</td>
        <td><input type="file" name="dcresult" accept="application/pdf" required></td>
        <td>Ph.D. Degree Certificate</td>
        <td><input type="file" name="degree" accept="application/pdf" required></td>
        </tr>     
        <tr><td colspan="6" align="center"><input type="submit" value="Submit" name="submit">
            <input type="reset" value="Clear">
            </tr>       
    </table> 
    </form>
    </div>
<?php 
}
?>
<div class="read">
        <table border="2">
            <tr>
            <th>Scholar Name</th>
            <th>Ph.D. Declaration of Result</th>
            <th>Degree Certificate</th>
            <th>Operations</th>
             </tr> 
        <?php 
        include("Sjc_db.php");
        $staff_id=$_SESSION['id'];
        $sql="SELECT * FROM conferred where staff_id='$staff_id'";
        $query=mysqli_query($connect_Staff,$sql);
        if(mysqli_num_rows($query)>0)
        {
        while($row=mysqli_fetch_assoc($query))
        {
        ?> 
            <tr>
            <td><?php echo $row['scholar_name']; ?></td>
            <td><button id="delete" style="background:green;" name="view2" onclick="return confirm('Do you want to view the pdf?')"><a href="Sjc_C6_conferred.php?id5=<?php echo $row['id']; ?>">View</a></button></form></td>
            <td><button id="delete" style="background:green;" name="view2" onclick="return confirm('Do you want to view the pdf?')"><a href="Sjc_C6_conferred.php?id6=<?php echo $row['id']; ?>">View</a></button></form></td>
            <td><button id="delete" onclick="return confirm('Are you sure you want to delete this record?')"><a href="Sjc_C6_co_delete.php?id1=<?php echo $row['id'];?>">Delete</a></button>
            <button id="update" onclick="return confirm('Are you sure you want to update this record?')"><a href="Sjc_C6_co_update.php?id2=<?php echo $row['id'];?>">Update</a></button>
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