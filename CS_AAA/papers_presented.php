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
    $sql="SELECT * FROM `conference1` WHERE staff_id='$staff_id' and id='$id2'";
    $query=mysqli_query($connect_Staff,$sql); 
    $row=mysqli_fetch_assoc($query);
    ?>
    <p class="staff">Staff Name:<?php  $staff_name=$_SESSION['name']; echo $staff_name;?></p>
    <!-- Update -->
    <div class="form1">
        <p>Conference Proceedings</p>
    <form action="Sjc_C1_cp_update.php" method="post">
    <table>
            <tr><td><label>Paper Title</label></td>
                <td><input type="text" name="ptitle" placeholder="Title of the paper" autocomplete="off" value="<?php echo $row['paper_title'];?>" required></td> 
                <td><label>CO-Author Name(s)</label></td>
                <td><input type="text" name="co-aname" placeholder="CO-Author Name(s)" autocomplete="off" value="<?php echo $row['coauthor_name'];?>" required></td>           
            </tr>
           <tr ><td><label>Conference Name</label></td>
                <td><input type="text" name="confname" placeholder="Conference Name" autocomplete="off" value="<?php echo $row['conference_name'];?>" required></td>
                <td><label>Proceedings Title</label></td>
                <td><input type="text" name="prtitle" placeholder="Proceedings Title" autocomplete="off"  value="<?php echo $row['proceeding_title'];?>" required></td>            
            </tr>
            <tr>
            <td><label>Institution Name</label></td>
                <td><input type="text" name="iname" placeholder="Institution Name" autocomplete="off"  value="<?php echo $row['institution_name'];?>" required></td>    
                  <td><label></label>Institution Location</td>
                <td><input type="text" name="place" placeholder="Place" autocomplete="off"  value="<?php echo $row['location'];?>" required></td>               
            </tr>
            <tr><td><label>Nature</label></td>
                <td><input type="radio" name="nature" value="Regional" <?php if($row['nature']=="Regional") {echo "checked";}?>>Regional
                <input type="radio" name="nature" value="National" <?php if($row['nature']=="National") {echo "checked";}?>>National
                <input type="radio" name="nature" value="International" <?php if($row['nature']=="International") {echo "checked";}?>>International
                </td> 
                <td><label>From Date</label></td>
                <td><input type="date" name="sdate" value="<?php echo $row['begin'];?>"   required></td>            
            </tr>
            <tr><td><label>To Date</label></td>
                <td><input type="date" name="edate" value="<?php echo $row['end'];?>" required></td>
                <td><label>Volume Number</label></td>
                <td><input type="text" name="vol_no" placeholder="Volume Number" autocomplete="off" value="<?php echo $row['vol_no'];?>" required></td>                         
            </tr>
            <tr>
            <td><label>Page Number</label></td>
                <td><input type="text" name="page_no" placeholder="Page Number" autocomplete="off" value="<?php echo $row['page_no'];?>" required></td>
                <td><label>ISBN Number</label></td>
                <td ><input type="text" name="isbn" placeholder="ISBN No." autocomplete="off" value="<?php echo $row['isbn_no'];?>" required></td>
            </tr>
            <tr><td colspan="4" align="center"><input type="submit" value="Submit" name="update">
            <!-- <input type="reset" value="Clear"> -->
            <button id="back" onclick="return confirm('Are you sure you want to Back the process?')"><a href="Sjc_C1_cp.php">Back</a></button>
            </td>
        </tr>
    </table>    
    </form>
    </div>
    <?php }
    else
    {
    ?>
    <!-- Form -->
    <p class="staff">Staff Name:<?php  $staff_name=$_SESSION['name']; echo $staff_name;?></p>
    <div class="form1">
    <p>Conference Proceedings</p>
    <form action="Sjc_C1_cp_insert.php" method="post">
    <table>
            <tr><td><label>Paper Title</label></td>
                <td><input type="text" name="ptitle" placeholder="Title of the paper" autocomplete="off"  required></td> 
                <td><label>CO-Author Name(s)</label></td>
                <td><input type="text" name="co-aname" placeholder="CO-Author Name(s)" autocomplete="off"  required></td>           
            </tr>
           <tr ><td><label>Conference Name</label></td>
                <td><input type="text" name="confname" placeholder="Conference Name" autocomplete="off"  required></td>
                <td><label>Proceedings Title</label></td>
                <td><input type="text" name="prtitle" placeholder="Proceedings Title" autocomplete="off"   required></td>            
            </tr>
            <tr>
            <td><label>Institution Name</label></td>
                <td><input type="text" name="iname" placeholder="Institution Name" autocomplete="off"   required></td>    
                  <td><label></label>Institution Location</td>
                <td><input type="text" name="place" placeholder="Place" autocomplete="off"   required></td>               
            </tr>
            <tr><td><label>Nature</label></td>
                <td><input type="radio" name="nature" value="Regional">Regional
                <input type="radio" name="nature" value="National">National
                <input type="radio" name="nature" value="International">International
                </td> 
                <td><label>From Date</label></td>
                <td><input type="date" name="sdate"  required></td>            
            </tr>
            <tr><td><label>To Date</label></td>
                <td><input type="date" name="edate" required></td>
                <td><label>Volume Number</label></td>
                <td><input type="text" name="vol_no" placeholder="Volume Number" autocomplete="off"  required></td>                         
            </tr>
            <tr>
            <td><label>Page Number</label></td>
                <td><input type="text" name="page_no" placeholder="Page Number" autocomplete="off"  required></td>
                <td><label>ISBN Number</label></td>
                <td><input type="text" name="isbn" placeholder="ISBN No." autocomplete="off"  required></td>
            </tr>
            <tr><td colspan="4" align="center"><input type="submit" value="Submit" name="submit">
            <input type="reset" value="Clear">
            </td>
        </tr>
    </table>    
    </form>
    </div>
    <?php }?>
    <!-- Reading Operation -->
    <div class="read">
        <table border="2">
            <tr>
            <!-- <th>Staff Id</th>
            <th>Author name</th>  -->
            <th>Paper Title</th>
            <th>Co-Author Name</th>
            <th>Conference Name</th>
            <th>Proceedings Title</th>
            <th>Institution Name</th>
            <th>Institution Location</th>
            <th>Nature</th>
            <th>From Date</th>
            <th>To Date</th>
            <th>Volume No.</th>
            <th>Page No.</th>
            <th>ISBN NO.</th>
            <th>Operations</th>
             </tr> 
        <?php 
        include("Sjc_db.php");
        $staff_id=$_SESSION['id'];
        $sql="SELECT * FROM conference1 where staff_id='$staff_id'";
        $query=mysqli_query($connect_Staff,$sql);
        if(mysqli_num_rows($query)>0)
        {
        while($row=mysqli_fetch_assoc($query))
        {
        ?> 
            <tr>
            <!-- <td><?php echo $row['staff_id']; ?></td>
            <td><?php echo $row['author_name']; ?></td> -->
            <td><?php echo $row['paper_title']; ?></td>
            <td><?php echo $row['coauthor_name']; ?></td>
            <td><?php echo $row['conference_name']; ?></td>
            <td><?php echo $row['proceeding_title']; ?></td>
            <td><?php echo $row['institution_name']; ?></td>
            <td><?php echo $row['location']; ?></td>
            <td><?php echo $row['nature']; ?></td>
            <td><?php echo date( "d-m-Y",strtotime($row['begin'])); ?></td>
            <td><?php echo date( "d-m-Y",strtotime($row['end'])); ?></td>
            <td><?php echo $row['vol_no']; ?></td>
            <td><?php echo $row['page_no']; ?></td>
            <td><?php echo $row['isbn_no']; ?></td>
            <td><button id="delete" onclick="return confirm('Are you sure you want to delete this record?')"><a href="Sjc_C1_cp_delete.php? id1=<?php echo $row['id'];?>">Delete</a></button>
            <button id="update" onclick="return confirm('Are you sure you want to update this record?')"><a href="Sjc_C1_cp_update.php? id2=<?php echo $row['id'];?>">Update</a></button>
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