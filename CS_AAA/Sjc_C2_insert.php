<?php
session_start();
?>
<!-- Insert -->
<?php 
            if(isset($_POST['submit']))
            {
                $type=$_POST['type1'];
                $category=$_POST['category'];
                $title=str_replace("'","\'",$_POST['title']);
                $nature=$_POST['nature'];
                $mode=$_POST['mode'];
                $instituion=str_replace("'","\'",$_POST['iname']);// str_replace(find,replace,string,count) count->number of replacement. Here, i use escapse sequence values to replace the string value.
                $place=str_replace("'","\'",$_POST['place']);
                $from=$_POST['sdate'];
                $to=$_POST['edate'];
                $sponsered=str_replace("'","\'",$_POST['sponsered']);
                $amount=$_POST['amount'];
                if(isset($_SESSION['id']))
                {
                $staff_id=$_SESSION['id'];
                $staff_name=$_SESSION['name'];
                }
                include("Sjc_db.php");
                    $sql="INSERT INTO seminar VALUES ('','$staff_id','$staff_name','$category','$type','$title','$nature','$mode','$instituion','$place','$from','$to','$sponsered','$amount')";
                     $query=mysqli_query($connect_Staff,$sql);
                    if($query)
                    {
                       header("location:Sjc_C2.php");
                    }
                  
            }               
        ?>