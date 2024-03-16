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
    <!-- Include your CSS files or stylesheets here -->
    <?php include("Sjc_header_style.php"); ?>
    <?php include("nav_style.php"); ?>
    <?php include("profile_styles.php"); ?>
    <?php include("home_page_content_details_style.php"); ?>
    <?php include("delete_button_design.php"); ?>
    
</head>
<body>
    <?php include_once("Sjc_header.php"); ?>
    <div class="navbar">
        <!-- Add your navbar content here -->
    </div>
    <div class="profile">
        <table>
            <tr>
                <th colspan="2"><img src="images/<?php $staff_img=$_SESSION['img']; echo $staff_img; ?>" width="100" height="100"></th>
            </tr>
            <tr>
                <th>Staff id</th>
                <th><?php $staff_id=$_SESSION['id']; echo $staff_id; ?></th>
            </tr>
            <tr>
                <th>Staff Name</th>
                <th><?php $staff_name=$_SESSION['name']; echo $staff_name; ?></th>
            </tr>
            <!-- You can add more profile information here -->
        </table>
    </div>
    <div class="details">
        <table border="1">
            <tr>
                <th>Content</th>
                <th>Number of Entries</th>
            </tr>
            <tr>
                <td>Conference Proceedings</td>
                <td>
                    <?php 
                    include("Sjc_db.php");
                    $staff_id=$_SESSION['id'];
                    $sql="SELECT count(*) as count1 FROM `conference1` WHERE staff_id='$staff_id'";
                    $query=mysqli_query($connect_Staff,$sql); 
                    $row=mysqli_fetch_assoc($query);
                    echo $row['count1'];
                    ?>
                </td>
            </tr>
            <tr>
                <td>Journal Publications</td>
                <td>
                    <?php 
                    include("Sjc_db.php");
                    $staff_id=$_SESSION['id'];
                    $sql="SELECT count(*) as count1 FROM `journal` WHERE staff_id='$staff_id'";
                    $query=mysqli_query($connect_Staff,$sql); 
                    $row=mysqli_fetch_assoc($query);
                    echo $row['count1'];
                    ?>
                </td>    
            </tr>
            <tr>
                <td>Book Chapters/Edited</td>
                <td>
                    <?php 
                    include("Sjc_db.php");
                    $staff_id=$_SESSION['id'];
                    $sql="SELECT count(*) as count1 FROM `book_chapter1` WHERE staff_id='$staff_id'";
                    $query=mysqli_query($connect_Staff,$sql); 
                    $row=mysqli_fetch_assoc($query);
                    echo $row['count1'];
                    ?>
                </td>
            </tr>
            <tr>
                <td>Conference/Seminar/Workshop Attended</td>
                <td>
                    <?php 
                    include("Sjc_db.php");
                    $staff_id=$_SESSION['id'];
                    $sql="SELECT count(*) as count1 FROM `seminar` WHERE staff_id='$staff_id'";
                    $query=mysqli_query($connect_Staff,$sql); 
                    $row=mysqli_fetch_assoc($query);
                    echo $row['count1'];
                    ?>
                </td>
            </tr>
            <tr>
                <td>Research Project</td>
                <td>
                    <?php 
                    include("Sjc_db.php");
                    $staff_id=$_SESSION['id'];
                    $sql="SELECT count(*) as count1 FROM `research_project` WHERE staff_id='$staff_id'";
                    $query=mysqli_query($connect_Staff,$sql); 
                    $row=mysqli_fetch_assoc($query);
                    echo $row['count1'];
                    ?>
                </td>    
            </tr>
            <tr>
                <td>Patent</td>
                <td>
                    <?php 
                    include("Sjc_db.php");
                    $staff_id=$_SESSION['id'];
                    $sql="SELECT count(*) as count1 FROM `patent` WHERE staff_id='$staff_id'";
                    $query=mysqli_query($connect_Staff,$sql); 
                    $row=mysqli_fetch_assoc($query);
                    echo $row['count1'];
                    ?>
                </td>
            </tr>
            <tr>
                <td>Awards Received</td>
                <td>
                    <?php 
                    include("Sjc_db.php");
                    $staff_id=$_SESSION['id'];
                    $sql="SELECT count(*) as count1 FROM `award_received` WHERE staff_id='$staff_id'";
                    $query=mysqli_query($connect_Staff,$sql); 
                    $row=mysqli_fetch_assoc($query);
                    echo $row['count1'];
                    ?>
                </td>
            </tr>
        </table>
    </div>
    
</body>
</html>
