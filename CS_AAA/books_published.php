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
<!--Update-->
<?php if(isset($_REQUEST['id2']))
    {
        $staff_id=$_SESSION['id'];
        $id2=$_REQUEST['id2'];
        $_SESSION['id2']=$_REQUEST['id2'];
    include("Sjc_db.php");
    $sql="SELECT * FROM `book_chapter1` WHERE staff_id='$staff_id' and id='$id2'";
    $query=mysqli_query($connect_Staff,$sql); 
    $row=mysqli_fetch_assoc($query);
    $month1=$row['month'];
    $year2=$row['year'];
    ?>
<p class="staff">Staff Name:<?php  $staff_name=$_SESSION['name']; echo $staff_name;?></p>
    <div class="form1">
        <p>Book Chapter/ Edited</p>
    <form action="Sjc_C1_BC_update.php" method="post">
    <table>
            <tr>  
            <td><label>CO-Author Name</label></td>
                <td><input type="text" name="co-aname" placeholder="CO-Author Name" autocomplete="off" value="<?php echo $row['coauthor_name'];?>"></td>
                <td><label>Contribution</label></td>    
                <td><input type="radio" name="cnature" onchange="enableBrand(this)" value="Whole Book" <?php if($row['contribution_name']=="Whole Book") {echo "checked";}?>> Whole Book
                <input type="radio" name="cnature" onchange="enableBrand(this)" value="Edited Book" <?php if($row['contribution_name']=="Edited Book") {echo "checked";}?>>Edited   </td>               
            </tr>
            <tr>
            <td><label>Book Title</label></td>
                <td><input type="text" name="btitle" placeholder="Title of the book" autocomplete="off" value="<?php echo $row['book_title'];?>"></td>  
                <td><label>Chapter Title</label></td>
                <td><input type="text" name="chapter" placeholder="Chapter Title" autocomplete="off" value="<?php echo $row['chapter_title'];?>"></td>
            </tr>
            <tr>
            <td><label>Nature</label></td>
                <td><input type="radio" name="nature" value="Regional" <?php if($row['nature']=="Regional") {echo "checked";}?>>Regional
                <input type="radio" name="nature" value="National" <?php if($row['nature']=="National") {echo "checked";}?>>National
                <input type="radio" name="nature" value="International" <?php if($row['nature']=="International") {echo "checked";}?>>International</td>
                <td><label>Publisher Name</label></td>
                <td><input type="text" name="pname" placeholder="Name of the publisher" autocomplete="off" value="<?php echo $row['publisher_name'];?>"></td>
            </tr>
            <tr>
                <td><label>Publisher Place</label></td>
                <td><input type="text" name="pplace" placeholder="Place" autocomplete="off" value="<?php echo $row['publisher_place'];?>"></td>            
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
                if($row1['month']==$month1)
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
                if($row1['year']==$year2)
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
            <tr>
            <?php include("Sjc_db.php");
    $sql="SELECT * FROM `book_chapter1` WHERE staff_id='$staff_id' and id='$id2'";
    $query=mysqli_query($connect_Staff,$sql); 
    $row=mysqli_fetch_assoc($query);?>     
                <td><label>ISBN No.</label></td>
                <td><input type="text" name="isbn" placeholder="ISBN No." autocomplete="off" value="<?php echo $row['isbn_no'];?>"></td>
            </tr>            
            <tr><td colspan="4" align="center"><input type="submit" value="Submit" name="update">
            <!-- <input type="reset" value="Clear"> -->
            <button id="back" onclick="return confirm('Are you sure you want to Back the process?')"><a href="Sjc_C1_BC.php">Back</a></button>
            </td>
        </tr>
    </table>    
    </form>
    </div>
    <?php }
    else
    {?>
    <!-- Form -->
    <p class="staff">Staff Name:<?php  $staff_name=$_SESSION['name']; echo $staff_name;?></p>
    <div class="form1">
    <p>Book Chapter/ Edited</p>
<form action="Sjc_C1_BC_insert.php" method="post">
<table>
<tr>  
            <td><label>CO-Author Name</label></td>
                <td><input type="text" name="co-aname" placeholder="CO-Author Name" autocomplete="off" required></td>
                <td><label>Contribution</label></td>    
                <td><input type="radio" name="cnature" onchange="enableBrand(this)" value="Whole Book" required> Whole Book
                <input type="radio" name="cnature" onchange="enableBrand(this)" value="Edited Book" >Edited  Book </td>               
            </tr>
            <tr>
            <td><label>Book Title</label></td>
                <td><input type="text" name="btitle" placeholder="Title of the book" autocomplete="off" required></td>  
                <td><label>Chapter Title</label></td>
                <td><input type="text" name="chapter" placeholder="Chapter Title" autocomplete="off" required></td>
            </tr>
            <tr>
            <td><label>Nature</label></td>
                <td><input type="radio" name="nature" value="Regional" required>Regional
                <input type="radio" name="nature" value="National" >National
                <input type="radio" name="nature" value="International" >International</td>
                <td><label>Publisher Name</label></td>
                <td><input type="text" name="pname" placeholder="Name of the publisher" autocomplete="off" required></td>
            </tr>
        <tr>
        <td><label>Publisher Location</label></td>
                <td><input type="text" name="pplace" placeholder="Place" autocomplete="off" required></td>            
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
        while($row=mysqli_fetch_assoc($query))
        {
        ?>
                <option value="<?php echo $row['year'];?>"><?php echo $row['year']; ?></option>
        <?php }?>        
            </select>
        </td>  
         <tr>   
            <td><label>ISBN No.</label></td>
            <td><input type="text" name="isbn" placeholder="ISBN No." autocomplete="off" required></td>
        </tr>
        <tr><td colspan="4" align="center"><input type="submit" value="Submit" name="submit">
        <input type="reset" value="Clear">
        </td>
    </tr>
</table>    
</form>
</div>
     <?php }?> 
       
    <!-- Reading Operations -->
    <div class="read">
        <table border="2">
            <tr>
            <!-- <th>Staff No.</th>
            <th>Author name</th> -->
            <th>Co-Author Name(s)</th> 
            <th>Contribution</th>
            <th>Book Title</th>
            <th>Nature</th>
            <th>Chapter Title</th>
            <th>Publisher Name</th>
            <th>Publisher place</th>
            <th>Month</th>
            <th>Year</th>
            <th>ISBN NO.</th>
            <th>Operations</th>
             </tr> 
        <?php 
        include("Sjc_db.php");
        if(isset($_REQUEST['ok']))
        {
            echo "<script>alert('Your book chapter/ edited details have been stored successfully!')</script>";
        }
        $staff_id=$_SESSION['id'];
        $sql="SELECT * FROM book_chapter1 where staff_id='$staff_id'";
        $query=mysqli_query($connect_Staff,$sql);
        if(mysqli_num_rows($query)>0)
        {
        while($row=mysqli_fetch_assoc($query))
        {
        ?> 
            <tr>
            <!-- <td><?php echo $row['staff_id']; ?></td>
            <td><?php echo $row['author_name']; ?></td> -->
            <td><?php echo $row['coauthor_name']; ?></td> 
            <td><?php echo $row['contribution_name']; ?></td>
            <td><?php echo $row['book_title']; ?></td>
            <td><?php echo $row['nature']; ?></td>
            <td><?php echo $row['chapter_title']; ?></td>
            <td><?php echo $row['publisher_name']; ?></td>
            <td><?php echo $row['publisher_place']; ?></td>
            <td><?php echo $row['month']; ?></td>
            <td><?php echo $row['year']; ?></td>
            <td><?php echo $row['isbn_no']; ?></td>
            <td><button id="delete" onclick="return confirm('Are you sure you want to delete this record?')"><a href="Sjc_C1_BC_Delete.php? id1=<?php echo $row['id'];?>">Delete</a></button>
            <button id="update" onclick="return confirm('Are you sure you want to update this record?')"><a href="Sjc_C1_BC.php? id2=<?php echo $row['id'];?>">Update</a></button>
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