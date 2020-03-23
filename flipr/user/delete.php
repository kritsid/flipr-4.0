<?php
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $query="DELETE FROM `posts` WHERE `post_id`='$id'";
    $conn=mysqli_connect("localhost","root","","flipr");
if(mysqli_query($conn,$query))
{
    header("LOCATION:posts.php?message=deleted+successfully");

}

}
else{
    header("LOCATION:mytodos.php");
}


        ?>