<?php
session_start();

if(isset($_REQUEST['staff']))
{
    include("Sjc_db.php");
    $staff_psw=$_POST['spsw'];
    $staff_id=$_POST['sid'];
    $sql="SELECT * FROM staff_login where staff_id='$staff_id' and password='$staff_psw'";
    $query=mysqli_query($connect_Staff,$sql);
    $res=mysqli_fetch_assoc($query);
    if($res)
    {   
        if($res['status'] == 'yes')
        {
            if($staff_psw=="123456")
            {
               header("location:Sjc_change.php?id=$staff_id"); 
            }
            else
            {
                $_SESSION['id']=$res['staff_id'];
                $_SESSION['name']=$res['staff_name'];
                $_SESSION['img']=$res['images'];
                $_SESSION['login']=1;
                header("location:Sjc_home.php");
            }
        }
        else
        {
            header("location:index.php?status=inactive");
        }
    }
    else
    {
        header("location:index.php?err1=1");
    }
}
?>