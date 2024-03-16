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
        $sql="SELECT * FROM phdnew_enrol where id='$id'";
        $query=mysqli_query($connect_Staff,$sql);
        $row=mysqli_fetch_assoc($query);
        header('content-type: application/pdf');
        $pdf="Newenrol/approved_letter/".$row['approved_letter'];
        readfile($pdf);
        }
?>
<?php 
        if(isset($_REQUEST['id5']))
        {
        include("Sjc_db.php");
        $id=$_REQUEST['id5'];
        $sql="SELECT * FROM phdnew_enrol where id='$id'";
        $query=mysqli_query($connect_Staff,$sql);
        $row=mysqli_fetch_assoc($query);
        header('content-type: application/pdf');
        $pdf="Newenrol/provitional_letter/".$row['provisional_letter'];
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
<?php
if(isset($_REQUEST["id2"]))
{
    $staff_id=$_SESSION['id'];
    $id=$_REQUEST['id2'];
    $_SESSION['id2']=$_REQUEST['id2'];
    include("Sjc_db.php");
    $sql="SELECT * FROM phdnew_enrol WHERE staff_id='$staff_id' and id='$id'";
    $query=mysqli_query($connect_Staff,$sql); 
    $row=mysqli_fetch_assoc($query);
    $year2=$row['year'];
    $month1=$row['month'];
    $dept=$row['dept'];
    $snlist=$row['supervisor_name'];
?>
<div class="form1" style="width:98%; height:300px;">
    <p>Ph.D. Enrolment</p>
    <form action="Sjc_C6_en_update.php" method="post" enctype="multipart/form-data">
    <table>
            <tr><td><label>Supervisor Name</label></td>
                <td><select name="sname" required>
            <option  value="" >Supervisor List</option>
            <?php include("Sjc_db.php");
            $sql1="SELECT * FROM phd_guides";
            $query1=mysqli_query($connect_Staff,$sql1);
            while($row1=mysqli_fetch_assoc($query1))
            {
                if($row1['guide_name']==$snlist)
                {
            ?>
                <option value="<?php echo $row1['guide_name'];?>" selected><?php echo $row1['guide_name']; ?></option>
            <?php }
            else
            {
            ?>     
             <option value="<?php echo $row1['guide_name'];?>"><?php echo $row1['guide_name']; ?></option>   
            <?php }
            } ?>        
            </select>
        </td>
        <?php
        include("Sjc_db.php");
        $sql="SELECT * FROM phdnew_enrol WHERE staff_id='$staff_id' and id='$id'";
        $query=mysqli_query($connect_Staff,$sql); 
        $row=mysqli_fetch_assoc($query);
        ?>
                <td><label>Scholar Name</label></td>
                <td><input type="text" name="schname" placeholder="Scholar Name" value="<?php echo $row['scholar_name']; ?>" autocomplete="off"  required></td>           
            </tr>
           <tr><td><label>BDU Reference</label></td>
                <td><input type="text" name="bdu" placeholder="BDU Reference" value="<?php echo $row['bdu_reference']; ?>" autocomplete="off"  required></td>
                <td><label>Department</label></td>
                <td><select name="dept" required>
            <option  value="" >Department</option>
            <?php include("Sjc_db.php");
            $sql1="SELECT * FROM department";
            $query1=mysqli_query($connect_Staff,$sql1);
            while($row1=mysqli_fetch_assoc($query1))
            {
                if($row1['Dept']==$dept)
                {
            ?>
                <option value="<?php echo $row1['Dept'];?>" selected><?php echo $row1['Dept']; ?></option>
            <?php }
            else
            {
            ?>     
             <option value="<?php echo $row1['Dept'];?>"><?php echo $row1['Dept']; ?></option>   
            <?php }
            } ?> 
        </td>            
            </tr>
            <tr>
        <?php
        include("Sjc_db.php");
        $sql="SELECT * FROM phdnew_enrol WHERE staff_id='$staff_id' and id='$id'";
        $query=mysqli_query($connect_Staff,$sql); 
        $row=mysqli_fetch_assoc($query);
        ?>
            <td><label>Time</label></td>
                <td>
                <input type="radio" name="nature" value="Full Time" <?php if($row['time']=="Full Time") {echo "checked";}?>>Full Time
                <input type="radio" name="nature" value="Part Time" <?php if($row['time']=="Part Time") {echo "checked";}?>>Part Time
                </td>     
                <td><label>Month & Year</label></td>
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
            <?php
        include("Sjc_db.php");
        $sql="SELECT * FROM phdnew_enrol WHERE staff_id='$staff_id' and id='$id'";
        $query=mysqli_query($connect_Staff,$sql); 
        $row=mysqli_fetch_assoc($query);
        ?>
            <td><label>Broad Area</label></td>
                <td><input type="text" name="barea" placeholder="Broad Area" autocomplete="off" value="<?php echo $row['broad_area']; ?>" required></td> 
                <td><label>Research Title</label></td>
                <td><input type="text" name="rtitle" placeholder="Research Title" autocomplete="off" value="<?php echo $row['research_title']; ?>" required></td>            
            </tr>
            <tr>
            <td><label>Research Period  From</label></td>
                <td><input type="date" name="pfdate"  autocomplete="off" value="<?php echo $row['begin']; ?>"  required></td>
                <td><label>Research Period  To</label></td>
                <td><input type="date" name="pedate"  autocomplete="off"  value="<?php echo $row['end']; ?>"  required></td>
            </tr>
            <tr>
                <td><label>DC Member1</label></td>
                <td><input type="text" name="dmem1" placeholder="DC Members"  value="<?php echo $row['dc_member1']; ?>" autocomplete="off"  required>
                <td><label>DC Member2</label></td>
                <td>
                <input type="text" name="dmem2" placeholder="DC Members" value="<?php echo $row['dc_member2']; ?>" autocomplete="off"  required>
                </td>                             
            </tr>
            <tr>
            <td><label>DC Members Approval Letter</label></td>
                <td><input type="file" name="dcletter" accept="application/pdf" autocomplete="off">
                <input type="hidden" name="dcletter1" value="<?php echo $row['approved_letter']; ?>" autocomplete="off"  required>
            </td>
            <td><label>Provitional Register Approval Date</label></td>
                <td><input type="date" name="pdate"  autocomplete="off" value="<?php echo $row['approved_date']; ?>" required>
            </td>
            </tr>
            <tr>
            <td><label>Provitional Register Approval Letter</label></td>
                <td><input type="file" name="aletter" accept="application/pdf" autocomplete="off">
                <input type="hidden" name="aletter1" value="<?php echo $row['provisional_letter']; ?>" autocomplete="off"  required>
            </td>
            </tr>
            <tr><td colspan="4" align="center"><input type="submit" value="Submit" name="update">
            <!-- <input type="reset" value="Clear"> -->
            <button id="back" onclick="return confirm('Are you sure you want to Back the process?')"><a href="Sjc_C6_enrol.php">Back</a></button>
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
    <div class="form1" style="width:98%; height:300px;">
    <p>Ph.D. Enrolment</p>
    <form action="Sjc_C6_en_insert.php" method="post" enctype="multipart/form-data">
    <table>
            <tr><td><label>Supervisor Name</label></td>
                <td><select name="sname" required>
            <option  value="" >Supervisor List</option>
            <?php include("Sjc_db.php");
            $sql="SELECT * FROM phd_guides";
            $query=mysqli_query($connect_Staff,$sql);
            while($row=mysqli_fetch_assoc($query))
            {
            ?>
                <option value="<?php echo $row['guide_name'];?>"><?php echo $row['guide_name']; ?></option>
        <?php }?>        
            </select>
        </td>
                <td><label>Scholar Name</label></td>
                <td><input type="text" name="schname" placeholder="Scholar Name" autocomplete="off"  required></td>           
            </tr>
           <tr><td><label>BDU Reference</label></td>
                <td><input type="text" name="bdu" placeholder="BDU Reference" autocomplete="off"  required></td>
                <td><label>Department</label></td>
                <td><select name="dept" required>
            <option  value="" >Department</option>
            <?php include("Sjc_db.php");
            $sql="SELECT * FROM department";
            $query=mysqli_query($connect_Staff,$sql);
            while($row=mysqli_fetch_assoc($query))
            {
            ?>
                <option value="<?php echo $row['Dept'];?>"><?php echo $row['Dept']; ?></option>
        <?php }?>        
            </select>
        </td>            
            </tr>
            <tr>
            <td><label>Time</label></td>
                <td>
                <input type="radio" name="nature" value="Full Time" required>Full Time
                <input type="radio" name="nature" value="Part Time">Part Time
                </td>     
                <td><label>Month & Year</label></td>
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
            </tr>
            <tr> 
            <td><label>Broad Area</label></td>
                <td><input type="text" name="barea" placeholder="Broad Area" autocomplete="off"  required></td> 
                <td><label>Research Title</label></td>
                <td><input type="text" name="rtitle" placeholder="Research Title" autocomplete="off"  required></td>            
            </tr>
            <tr>
            <td><label>Research Period  From</label></td>
                <td><input type="date" name="pfdate"  autocomplete="off"  required></td>
                <td><label>Research Period  To</label></td>
                <td><input type="date" name="pedate"  autocomplete="off"  required></td>
            </tr>
            <tr>
                <td><label>DC Member1</label></td>
                <td><input type="text" name="dmem1" placeholder="DC Members" autocomplete="off"  required>
                <td><label>DC Member2</label></td>
                <td>
                <input type="text" name="dmem2" placeholder="DC Members" autocomplete="off"  required>
                </td>                             
            </tr>
            <tr>
            <td><label>DC Members Approval Letter</label></td>
                <td><input type="file" name="dcletter" accept="application/pdf" autocomplete="off"  required></td>
            <td><label>Provitional Register Approval Date</label></td>
                <td><input type="date" name="pdate"  autocomplete="off"  required></td>
            </tr>
            <tr>
            <td><label>Provitional Register Approval Letter</label></td>
                <td><input type="file" name="aletter" accept="application/pdf" autocomplete="off"  required></td>
            </tr>
            <tr><td colspan="4" align="center"><input type="submit" value="Submit" name="submit">
            <input type="reset" value="Clear">
            </td>
        </tr>
    </table>    
    </form>
    </div>
    <?php 
    }
    ?>
    <!-- Read Operations -->
        <div class="read" style="height:150px;">
        <table border="2">
            <tr>
            <th>Supervisor Name</th>
            <th>Scholar Name</th>
            <th>BDU Reference</th>
            <th>Department</th>
            <th>Time</th>
            <th>Month</th>
            <th>Year</th>
            <th>Broad Area</th>
            <th>Research Title</th>
            <th>Research Period  From</th>
            <th>Research Period  To</th>
            <th>DC Member1</th>
            <th>DC Member2</th>
            <th>DC Members Approval Letter</th>
            <th>Provitional Register Approval Date</th>
            <th>Provitional Register Approval Letter</th>
            <th>Operations</th>
             </tr> 
        <?php 
        include("Sjc_db.php");
        $staff_id=$_SESSION['id'];
        $sql="SELECT * FROM phdnew_enrol where staff_id='$staff_id'";
        $query=mysqli_query($connect_Staff,$sql);
        if(mysqli_num_rows($query)>0)
        {
        while($row=mysqli_fetch_assoc($query))
        {
        ?> 
            <tr>
            <td><?php echo $row['supervisor_name']; ?></td>   
            <td><?php echo $row['scholar_name']; ?></td>
            <td><?php echo $row['bdu_reference']; ?></td>
            <td><?php echo $row['dept']; ?></td>
            <td><?php echo $row['time']; ?></td>
            <td><?php echo $row['month']; ?></td>
            <td><?php echo $row['year']; ?></td>
            <td><?php echo $row['broad_area']; ?></td>
            <td><?php echo $row['research_title']; ?></td>
            <td><?php echo date( "d-m-Y",strtotime($row['begin'])); ?></td>
            <td><?php echo date( "d-m-Y",strtotime($row['end'])); ?></td>
            <td><?php echo $row['dc_member1']; ?></td>
            <td><?php echo $row['dc_member2']; ?></td>
            <!--to conver the date into string-->
            <td><button id="delete" style="background:green;" name="view" onclick="return confirm('Do you want to view the pdf?')"><a href="Sjc_C6_enrol.php?id4=<?php echo $row['id']; ?>">View</a></button></form></td>
            <td><?php echo date( "d-m-Y",strtotime($row['approved_date'])); ?></td>            
            <td><button id="delete" style="background:green;" name="view2" onclick="return confirm('Do you want to view the pdf?')"><a href="Sjc_C6_enrol.php?id5=<?php echo $row['id']; ?>">View</a></button></form></td>
            <td><button id="delete" onclick="return confirm('Are you sure you want to delete this record?')"><a href="Sjc_C6_en_delete.php?id1=<?php echo $row['id'];?>">Delete</a></button>
            <button id="update" onclick="return confirm('Are you sure you want to update this record?')"><a href="Sjc_C6_en_update.php?id2=<?php echo $row['id'];?>">Update</a></button>
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