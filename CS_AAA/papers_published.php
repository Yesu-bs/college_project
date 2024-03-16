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
$sql="SELECT * FROM `journal` WHERE staff_id='$staff_id' and id='$id2'";
$query=mysqli_query($connect_Staff,$sql); 
$row=mysqli_fetch_assoc($query);
$month1=$row['month'];
$year2=$row['year']; 
$index1=$row['index1'];
?>    
<!-- Update -->
<p class="staff">Staff Name:<?php  $staff_name=$_SESSION['name']; echo $staff_name;?></p>
<div class="form1">
        <p>Journal Publications</p>
    <form action="Sjc_C1_jp_update.php" method="post">
    <table>
            <tr>
                <td><label>Course Title</label></td>
                <td><input type="text" name="cotitle" placeholder="Title of the Course" autocomplete="off" value="<?php echo $row['course_title'];?>"></td> 
                <td><label>CO-Author Name(s)</label></td>
                <td><input type="text" name="co-aname" placeholder="CO-Author Name(s)" autocomplete="off" value="<?php echo $row['coauthor'];?>"></td>           
            </tr>
            <tr>
            <td><label>Journal Name</label></td>
                <td><input type="text" name="jname" placeholder="Journal Name" autocomplete="off" value="<?php echo $row['journal_name'];?>"></td>
                <td><label>Impact Factor</label></td>
                <td><input type="text" name="ifactor" placeholder="Impact Factor" autocomplete="off" value="<?php echo $row['impact_factor'];?>"></td> 
                            
            </tr>
            <tr>
            <td><label>Nature</label></td>
                <td><input type="radio" name="nature" value="Regional" <?php if($row['nature']=="Regional") {echo "checked";}?>>Regional
                <input type="radio" name="nature" value="National" <?php if($row['nature']=="National") {echo "checked";}?>>National
                <input type="radio" name="nature" value="International" <?php if($row['nature']=="International") {echo "checked";}?>>International</td>
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
            <td><label>Published in</label></td>
            <td> <select name="index"  required>
                <option  hidden="" disabled="disabled" selected="selected" 
    value="none">index</option>
            <?php include("Sjc_db.php");
            $sql1="SELECT `index1` FROM indexes";
            $query1=mysqli_query($connect_Staff,$sql1);
            while($row1=mysqli_fetch_assoc($query1))
            {
                if($row1['index1']==$index1)
                {
            ?>
                    <option value="<?php echo $row1['index1'];?>" selected><?php echo $row1['index1'];?></option>
            <?php }
            else
            {
            ?>        
            <option value="<?php echo $row1['index1'];?>" ><?php echo $row1['index1'];?></option>
            <?php }
        }
        ?>        
            </select></td>
                <td><label>ISSN/DOI Reference</label></td>
                <td><input type="text" name="issn" placeholder="Volume Number" autocomplete="off" value="<?php echo $row['issn'];?>"></td>
            </tr>
            <tr>
            <td><label></label>Volume Number</td>
                <td><input type="text" name="vol_no" placeholder="Volume Number" autocomplete="off" value="<?php echo $row['volume_no']; ?>"></td>
                <td><label>Page Number</label></td>
                <td><input type="text" name="page_no" placeholder="Page Number" autocomplete="off" value="<?php echo $row['page_no']; ?>"></td>  
            </tr>
            <tr>
            <td><label>Citation Index</label></td>
                <td><input type="text" name="cindex" placeholder="Citation Index" autocomplete="off" value="<?php echo $row['citation_index']; ?>"></td> 
            <td><label>No. of Citation</label></td>
                <td><input type="text" name="citation" placeholder="Number of Citation" autocomplete="off" value="<?php echo $row['no_citation']; ?>"></td>
            </tr>
            <tr >
            <td>
                <label>h-index</label> </td>
                <td>
                    <input type="text" name="h-index" placeholder="h-index" autocomplete="off" value="<?php echo $row['h_index']; ?>">
                </td>
                <td>
                <label>Journal Link</label>
                </td>
                <td>
                    <input type="url" name="link_journal" placeholder="Put URL here" autocomplete="off" value="<?php echo $row['journal_link']; ?>">
                </td>
            </tr>
            <tr>
                <td>
                <label>Link to Recognition of UGC Enlishment</label> 
                </td>
                <td>
                    <input type="url" name="link_ugc" placeholder="Put URL here" autocomplete="off" value="<?php echo $row['ugc_link']; ?>">
                </td>
            </tr>
            <tr><td colspan="4" align="center"><input type="submit" value="Submit" name="update">
            <!-- <input type="reset" value="Clear"> -->
            <button id="back" onclick="return confirm('Are you sure you want to Back the process?')"><a href="Sjc_C1_jp.php">Back</a></button>
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
    <p>Journal Publications</p>
<form action="Sjc_C1_jp_insert.php" method="post">
<table>
        <tr>
            <td><label>Course Title</label></td>
            <td><input type="text" name="cotitle" placeholder="Title of the Course" autocomplete="off" required></td> 
            <td><label>CO-Author Name(s)</label></td>
            <td><input type="text" name="co-aname" placeholder="CO-Author Name(s)" autocomplete="off"  required></td>           
        </tr>
        <tr>
        <td><label>Journal Name</label></td>
            <td><input type="text" name="jname" placeholder="Journal Name" autocomplete="off"  required></td>
            <td><label>Impact Factor</label></td>
            <td><input type="text" name="ifactor" placeholder="Impact Factor" autocomplete="off"  required></td> 
                        
        </tr>
        <tr>
        <td><label>Nature</label></td>
            <td><input type="radio" name="nature" value="Regional"  required>Regional
            <input type="radio" name="nature" value="National">National
            <input type="radio" name="nature" value="International">International
            </td>
            <td><label>Published Month & Year</label>
            </td>
            <td>
            <select name="mon"  required>
                <option  hidden="" disabled="disabled" selected="selected" 
    value="none">Month</option>
                <?php include("Sjc_db.php");
        $sql="SELECT `month` FROM sjc_month";
        $query=mysqli_query($connect_Staff,$sql);
        while($row=mysqli_fetch_assoc($query))
        {
        ?>
                <option value="<?php echo $row['month'];?>"><?php echo $row['month']; ?></option>
        <?php }?>        
            </select>
            <select name="year"  required>
                <option  hidden="" disabled="disabled" selected="selected" 
    value="none">year</option>
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
        </tr>   
        <tr>
        <td><label>Published in</label></td>
            <td> <select name="index"  required>
                <option  hidden="" disabled="disabled" selected="selected" 
    value="none">index</option>
                <?php include("Sjc_db.php");
        $sql="SELECT `index1` FROM indexes";
        $query=mysqli_query($connect_Staff,$sql);
        while($row=mysqli_fetch_assoc($query))
        {
        ?>
                <option value="<?php echo $row['index1'];?>"><?php echo $row['index1']; ?></option>
        <?php }?>        
            </select></td>     
            <td><label>ISSN/DOI Reference</label></td>
            <td><input type="text" name="issn" placeholder="Volume Number" autocomplete="off"  required></td>
        </td>
        </tr>
        <tr>
        <td><label></label>Volume Number</td>
            <td><input type="text" name="vol_no" placeholder="Volume Number" autocomplete="off"  required></td>
            <td><label>Page Number</label></td>
            <td><input type="text" name="page_no" placeholder="Page Number" autocomplete="off"  required></td>  
        </tr>
        <tr>
        <td><label>Citation Index</label></td>
            <td><input type="text" name="cindex" placeholder="Citation Index" autocomplete="off"  required></td> 
        <td><label>No. of Citation</label></td>
            <td><input type="text" name="citation" placeholder="Number of Citation" autocomplete="off"  required></td>
        </tr>
        <tr >
        <td>
            <label>h-index</label> </td>
            <td>
                <input type="text" name="h-index" placeholder="h-index" autocomplete="off"  required>
            </td>
            <td>
            <label>Journal Link</label>
            </td>
            <td>
                <input type="url" name="link_journal" placeholder="Put URL here" autocomplete="off"  required>
            </td>
        </tr>
        <tr >
            <td>
            <label>Link to Recognition of UGC Enlishment</label> 
            </td>
            <td>
                <input type="url" name="link_ugc" placeholder="Put URL here" autocomplete="off"  required>
            </td>
        </tr>
        <tr><td colspan="4" align="center"><input type="submit" value="Submit" name="submit">
        <input type="reset" value="Clear">
        </td>
    </tr>
</table>    
</form>
</div>
<?php } ?>   
 <!-- Reading Operations -->
 <div class="read">
        <table border="2">
            <tr>
            <!-- <th>Staff No.</th>
            <th>Author name</th> -->
            <th>Course Title</th>
            <th>Co-Author Name(s)</th> 
            <th>Journal Name</th>
            <th>Impact Factor</th>
            <th>Nature</th>
            <th>Month</th>
            <th>Year</th>
            <th>Published in</th>
            <th>ISSN</th>
            <th>Volume No.</th>
            <th>Page No.</th>
            <th>Citation Index</th>
            <th>No. of Citation</th>
            <th>h-index.</th>
            <th>Journal Link</th>
            <th>Link to Recognition of UGC Enlishment</th>
            <th>Operations</th>
             </tr> 
        <?php 
        include("Sjc_db.php");
        $staff_id=$_SESSION['id'];
        $sql="SELECT * FROM journal where staff_id='$staff_id'";
        $query=mysqli_query($connect_Staff,$sql);
        if(mysqli_num_rows($query)>0)
        {
        while($row=mysqli_fetch_assoc($query))
        {
        ?> 
            <tr>
            <!-- <td><?php echo $row['staff_id']; ?></td>
            <td><?php echo $row['author_name']; ?></td> -->
            <td><?php echo $row['course_title']; ?></td> 
            <td><?php echo $row['coauthor']; ?></td>
            <td><?php echo $row['journal_name']; ?></td>
            <td><?php echo $row['impact_factor']; ?></td>
            <td><?php echo $row['nature']; ?></td>
            <td><?php echo $row['month']; ?></td>
            <td><?php echo $row['year']; ?></td>
            <td><?php echo $row['index1']; ?></td>
            <td><?php echo $row['issn']; ?></td>
            <td><?php echo $row['volume_no']; ?></td>
            <td><?php echo $row['page_no']; ?></td>
            <td><?php echo $row['citation_index']; ?></td>
            <td><?php echo $row['no_citation']; ?></td>
            <td><?php echo $row['h_index']; ?></td>
            <td><?php echo $row['journal_link']; ?></td>
            <td><?php echo $row['ugc_link']; ?></td>
            <td><button id="delete" onclick="return confirm('Are you sure you want to delete this record?')"><a href="Sjc_C1_jp_delete.php? id1=<?php echo $row['id'];?>">Delete</a></button>
            <button id="update" onclick="return confirm('Are you sure you want to update this record?')"><a href="Sjc_C1_jp_update.php? id2=<?php echo $row['id'];?>">Update</a></button>
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