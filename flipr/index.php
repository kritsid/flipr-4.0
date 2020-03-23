<?php
include_once "includes/functions.php";
include_once "includes/connection.php";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>flipr 4.0</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
    <?php include_once "includes/nav.php";?>
    
    <?php add_jumbotron()?>
    <div class="container">
    <?php
        if(isset($_GET['message'])){
            $msg = $_GET['message'];
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            '.$msg.'
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>';
        }
?>
		<?php
			if(isset($_GET['message'])){
				$msg = $_GET['message'];
				echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
				'.$msg.'
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				  </button>
				</div>';
			}
		?>
		
		<div style="width:500px;margin:auto auto;  margin-top:250px;">
		<form method="post" class="form-signin">
      <h1 class="h3 mb-3 font-weight-normal">Please sign up</h1>
      
	  <input type="text" name="user_name" id="input" class="form-control" placeholder="Enter name" required autofocus>
	  
      <input type="email" name="user_email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
      
      <input type="password" name="user_password" id="inputPassword" class="form-control" placeholder="Password" required>
  
      <button class="btn btn-lg btn-primary btn-block" name="signup" type="submit">Sign Up</button>
     
    </form>
		</div>
        <?php 
        
		$conn=mysqli_connect("localhost","root","","flipr");
			if(isset($_POST['signup'])){
				
		$conn=mysqli_connect("localhost","root","","flipr");
				$user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
				$user_email = mysqli_real_escape_string($conn, $_POST['user_email']);
				$user_password = mysqli_real_escape_string($conn, $_POST['user_password']);
				
				//checking for empty fields
				if(empty($user_name) OR empty($user_email) OR empty($user_password)){
					header("Location:index.php?message=Empty+Fields");
					exit();
				}
				
				//checking for validity of email
				if(!filter_var($user_email,FILTER_VALIDATE_EMAIL)){
					header("Location:index.php?message=Please+Enter+A+Valid+email");
					exit();
				}else{
					//If email exists
					$sql2 = "SELECT * FROM `user` WHERE `user_email`='$user_email'";
					$result = mysqli_query($conn, $sql2);
					if(mysqli_num_rows($result)>0){
						header("Location:index.php?message=Email+Already+Exists");
						exit();
					} else {
						//hashing password
						$hash = password_hash($user_password, PASSWORD_DEFAULT);
						
						//Signing Up the USER
						$sql = "INSERT INTO `user` (`user_name`, `user_email`, `user_password`, `user_role`) VALUES ('$user_name', '$user_email', '$user_password','admin')";
						
						if(mysqli_query($conn, $sql)){
							header("Location:user/login.php?message=SuccessFully+Registered");
							exit();
						}else{
							header("Location:index.php?message=Registration+Failed");
							exit();
						}
					}
				}
			}
		?>
	
	
	
	
<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	</body>
</html>