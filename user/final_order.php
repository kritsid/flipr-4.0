<?php
session_start();
include_once "../includes/connection.php";
if(isset($_GET['id']))
{
    $conn=mysqli_connect("localhost","root","","laundry");
    $id=$_GET['id'];
    $query="SELECT * FROM `white slip` WHERE `laundry_no`='$id'";
    $result=mysqli_query($conn,$query);
    while($row=mysqli_fetch_assoc($result))
    {
        $query2 = " update `white slip` set `status` = 'finlised' where `laundry_no`='$id'";
        if(mysqli_query($conn,$query2))
        {
            header("Location:user_dash.php?updated+successfully");
            exit();
        }
        else{
            header("Location:user_dash.php?unsuccessfull");
            exit();

       }
    }
}
else{
    header("Location:user_dash.php?failed+unsuccessfull");
    exit();
}

?>

