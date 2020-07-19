<?php 
include_once "../includes/connection.php";
session_start()?>
<?php include_once "../includes/connection.php"; ?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../css/bootstrap.min.css">

<title>login page</title>
<style>

body{
    background-image: url('../images/bcdd.jpg');
    background-size: cover;
background-repeat:no-repeat;
}

/* .buttons1{
    background: linear-gradient(to top, #ffff66 -4%, #ffffff 101%);
padding: 30px;
border-radius: 60px;
margin:0px 350px;
} */

.abn{
    border-radius: 10px;
    margin: 5px;
padding: 2px;

}

.abm{
    border-radius: 15px;
    margin: 30px;
    padding: 10px;
}
</style>
</head>
<body>


<div class="sign-up" style="text-align: center;margin-top:200px;">
    <?php 
    if(isset($_SESSION['user_id'])){

    }else{?>
<form  method="post">
    <h2>Login To Your Account</h2><br><br>
    <div class="buttons1">
<input type="text" name="user_id" placeholder="user-id" class="abn"><br>
<input type="password" name="password" placeholder="password" class="abn"><br>
<button type="submit" name="signin" class="abm"><strong>Sign In</strong></button>
</div>
</div>
</form>
    <?php }?>


<?php
//my login page

if(isset($_POST['signin']))
{
    
    $user_id=mysqli_real_escape_string($conn,$_POST['user_id']);
    $password=mysqli_real_escape_string($conn,$_POST['password']);
    if(empty($user_id) OR empty($password))
    {
        header("location:login.php?message=all+columns+are+compulsory");
        exit();

    }
    $sql="SELECT * FROM `signup` WHERE `user_id`='$user_id'";

    $result=mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)<=0)
    {
        header("location:signup.php?user-doesnt-exists");
        exit();
    }
    else 
    {
        while($row=mysqli_fetch_assoc($result))
        {
        //password matching

        //here we need to match up wih th ehashing password now.
        //to do that we use password_verify method.
        if($password==$row['password'])
        {
            $_SESSION['user_id']=$row['user_id'];
            $_SESSION['full_name']=$row['full_name'];
            $_SESSION['password']=$row['password'];
            $_SESSION['hostel']=$row['hostel'];
            $_SESSION['role']=$row['role'];
           header("location:user_dash.php?message=success");
            // header("location:login1.php?success");


        }
        else if(!($password==$row['password'])){
            header("location:login.php?message=invalid+password");
            exit();
        }

       }
    }
    


// else{
//     header("location:login.php?");

}
?>




<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>