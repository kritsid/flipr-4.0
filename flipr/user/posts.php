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
		<link rel="stylesheet" href="../style.css">
	</head>
	<body>
	
	 <nav class="navbar navbar-dark sticky-top bg-dark   shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">FLIPR 4.0</a>
      
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="logout.php">Sign out</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <?php include_once "nav.inc.php"; ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Posts</h1>
            <h6>Howdy <?php echo $_SESSION['user_name']; ?> | signed in as <?php echo $_SESSION['user_email']; ?></h6>
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
			
				<h1>TO DO'S:</h1>
				<a href="newpost.php"><button class="btn btn-info">Add New</button></a>
				<hr>
				
				<table class="table">
				  <thead>
					<tr>
					  <th scope="col"> date</th>
					  <th scope="col"> Image</th>
					  <th scope="col"> Title</th>
					  <th scope="col"> Author</th>
					  <?php if($_SESSION['user_role']=="admin"){?>
					  <th scope="col">Action</th>
					  <?php }?>
					</tr>
				  </thead>
				  <tbody>
				  <?php
				  $conn=mysqli_connect("localhost","root","","flipr");

					$sql = "SELECT * FROM `posts`  ORDER BY `post_id` DESC";
					$result = mysqli_query($conn, $sql);
					while($row=mysqli_fetch_assoc($result)){
						$post_title1 = $row['post_title']; 
						$post_image1 = $row['post_image']; 
						$post_author1 = $row['post_author']; 
						$post_content1 = $row['post_content'];
						$post_date1 = $row['post_date'];
						$post_id1 = $row['post_id'];
						
					$sqlauth = "SELECT * FROM `user`, `posts` WHERE `user_name`='$post_author1'";
					$resultauth = mysqli_query($conn, $sqlauth);
					while($authrow=mysqli_fetch_assoc($resultauth)){
						$post_author_name = $authrow['user_name'];
						$post_title = $authrow['post_title']; 
						$post_image = $authrow['post_image']; 
						$post_content = $authrow['post_content'];
						$post_date = $authrow['post_date'];
						$post_id = $authrow['post_id'];
					
			
		?>
			<tr>
					  <th scope="row"><?php echo $post_date;?></th>
					  <td><img src="<?php echo $post_image;?>" width="50px" height="50px"></td>
					  <td><?php echo $post_title;?></td>
					  <td><?php echo $post_author_name; ?></td>
					   <?php if($_SESSION['user_role']=="admin"){?>
					  <td><a href="edit.php?id=<?php echo $post_id;?>"><button class="btn btn-info">Edit</button></a>
					   <a onclick="return confirm('Are You sure');" href="delete.php?id=<?php echo $post_id;?>">
					   <button class="btn btn-danger">Delete</button></a></td>
					   <?php } ?>
			</tr>
			
			<?php }}?>
				  
				  </tbody>
				</table>
				
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
