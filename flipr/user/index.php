<?php

session_start();
$conn=mysqli_connect("localhost","root","","flipr");

if(isset($_SESSION['user_role'])){

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Admin Panel</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="../css/bootstrap.min.css">
	</head>
	<body>
	
	 <nav class="navbar navbar-dark sticky-top bg-dark   shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">FLIPR 4.0</a>
      
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="../index.php">Sign out</a>
        </li>
      </ul>
    </nav>
    <div class="container-fluid">
      <div class="row">
        <?php include_once "nav.inc.php"; ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
            <h6>Howdy <?php echo $_SESSION['user_name']; ?> | logged in as <?php echo $_SESSION['user_role']; ?></h6>
          </div>
		
			<div id="admin-index-form">
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
			<h1>Your Profile</h1>
				<form method="post">
					Name:<input name="user_name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name"value="<?php echo $_SESSION['user_name']; ?>"><br>
					Email:
					<input name="user_email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"value="<?php echo $_SESSION['user_email']; ?>"><br>
					Password:
					<input name="user_password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"><br>
				  <button type="submit" name="update" class="btn btn-primary">Update</button>
				</form>
                <?php 
                	$conn=mysqli_connect("localhost","root","","flipr");
                    
                    if(isset($_POST['update']))
                    {
                        $conn=mysqli_connect("localhost","root","","flipr");

                        $user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
						$user_email = mysqli_real_escape_string($conn, $_POST['user_email']);
						$user_password = mysqli_real_escape_string($conn, $_POST['user_password']);
					//	$user_bio = mysqli_real_escape_string($conn, $_POST['user_bio']);
						
						//checking if fields are empty
						if(empty($user_name) OR empty($user_email)){
							echo "Empty Fields";
						}else{
							//checking if email is valid
							if(!filter_var($user_email, FILTER_VALIDATE_EMAIL)){
								echo "Pleaseenter a Valid email!";
							}else{
								//check if password entered is new
								if(empty($user_password)){
									//user dont want to change his password
									$user_id = $_SESSION['user_id'];
									$sql = "UPDATE `user` SET user_name='$user_name', user_email='$user_email' WHERE user_id='$user_id';";
                                    if(mysqli_query($conn, $sql))
                                    {										
										$_SESSION['user_name'] = $user_name;
										$_SESSION['user_email'] = $user_email;
										//$_SESSION['user_bio'] = $user_bio;
										header("Location: index.php?message=Record+Updated");
										
									}else{
										echo "error";
									}
								}else{
									//user wants to change his password
									//$hash = password_hash($user_password, PASSWORD_DEFAULT);
									$user_id = $_SESSION['user_id'];
									$sql = "UPDATE `user` SET user_name='$user_name', user_email='$user_email', user_password='$user_password' WHERE user_id='$user_id';";
									if(mysqli_query($conn, $sql)){										
										session_unset();
										session_destroy();
										header("Location: login.php?message=Record+Updated+You+may+login+again+now");
										
										
									}else{
										echo "error";
									}
								}
							}
						}
					}
				?>
			</div>
        
          </div>
        </main>
      </div>
    </div>
	
	<script src="../js/jquery-3.4.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	</body>
</html>
	<?php
}else{
	header("Location: login.php?message=Please+Login");
}
?>
			