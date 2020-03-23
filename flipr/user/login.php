<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Signin</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="../css/bootstrap.min.css">
	</head>
	<body>
		
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
      <h1 class="h3 mb-3 font-weight-normal">Please Login</h1>
      
	  
      <input type="email" name="user_email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
      
      <input type="password" name="user_password" id="inputPassword" class="form-control" placeholder="Password" required>
  
      <button class="btn btn-lg btn-primary btn-block" name="signin" type="submit">Sign In</button>
     
    </form>
		</div>
		
		<?php 
						$conn=mysqli_connect("localhost","root","","flipr");

			if(isset($_POST['signin'])){
				
				$conn=mysqli_connect("localhost","root","","flipr");

				$user_email = mysqli_real_escape_string($conn, $_POST['user_email']);
				$user_password = mysqli_real_escape_string($conn, $_POST['user_password']);
				
				//checking for empty fields
				if(empty($user_email) OR empty($user_password)){
					header("Location: login.php?message=Empty+Fields");
					exit();
				}
				
				//checking for validity of email
				if(!filter_var($user_email,FILTER_VALIDATE_EMAIL)){
					header("Location: login.php?message=Please+Enter+A+Valid+email");
					exit();
				}else{
					//If email exists
					$sql = "SELECT * FROM `user` WHERE `user_email`='$user_email'";
					$result = mysqli_query($conn, $sql);
					if(mysqli_num_rows($result)<=0){
						header("Location: login.php?message=Login+error+1");
						exit();
					} else {
						while($row = mysqli_fetch_assoc($result)){
							//checking if password matches
							if(!($user_password==$row['user_password'])){
								header("Location: login.php?message=Login+error+2");
								exit();
							} else if($user_password==$row['user_password']) {
								$_SESSION['user_id'] = $row['user_id'];
								$_SESSION['user_name'] = $row['user_name'];
								$_SESSION['user_email'] = $row['user_email'];
								$_SESSION['user_role'] = $row['user_role'];
								header("Location:index.php?message=logged+in");
								exit();
							}
						}
					}
				}
			}
		?>
		                
<script src="../js/jquery-3.4.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>