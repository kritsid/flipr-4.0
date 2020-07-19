<body>
<?php
include_once "../includes/connection.php";
if(isset($_GET['id']))
{
    if($_SESSION[`status`]!='finlised')
    {
            $id=$_GET['id'];
            $query="DELETE FROM `white slip` WHERE  `laundry_no`='$id'";
        if(mysqli_query($conn,$query))
        {
            header("LOCATION:user_dash.php?deleted");

        }

    
    }
    else
    {
        
        echo "<script> alert('this is a finalised order. continue?')</script>";
        
        
    }
   

}
else{
    header("LOCATION:user_dash.php?unsuccessfull");
}


        ?>
</body>