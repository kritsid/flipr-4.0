<?php
include_once "../includes/connection.php";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>flipr 4.0</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<link rel="stylesheet" href="style.css">
	</head>
	<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
 <a class="navbar-brand" href="#">FLIPR 4.0</a>
 
 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
   <span class="navbar-toggler-icon"></span>
 </button>

 <div class="collapse navbar-collapse" id="navbarSupportedContent">
   <ul class="navbar-nav mx-auto">
     <li class="nav-item active">
       <a class="nav-link" href="index.php"><button class="btn btn-danger">dashboard</button> <span class="sr-only">(current)</span></a>
     </li>
     <li class="nav-item active">
       <a class="nav-link" href="posts.php"><button class="btn btn-danger">all lists</button> <span class="sr-only">(current)</span></a>
     </li>

     <li class="nav-item active">
       <a class="nav-link" href="newpost.php"><button class="btn btn-danger">new list</button> <span class="sr-only">(current)</span></a>
     </li>
    
   </ul>
   <li class="nav-item" style="display:inline-block;">
       <a class="nav-link" href="../index.php"><button class="btn btn-danger">Log out</button></a>
     </li>
 </div>
    </nav>
    <div class="container">

  
<div class="card-columns">
            <?php
            $sql="SELECT * FROM `posts`";
            $result=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_assoc($result))
            {
                $post_title=$row['post_title'];
                $post_image=$row['post_image'];
                $post_id=$row['post_id'];
                $post_content=$row['post_content'];
                $post_date=$row['post_date'];
                $post_author=$row['post_author'];
                $sqlauth="SELECT * FROM `user` WHERE `user_id`='$post_author'";
               $auth_result= mysqli_query($conn,$sqlauth);
                while($authrow=mysqli_fetch_assoc($auth_result))
                {
                    $post_author_name=$authrow['user_name'];


                
            ?>

            <div class="card card bg-light mb-3" style="width:18rem;margin-top:50px">
                   <center><img src="<?php echo $post_image?>" style="height:180px;width:286px; padding:5px 5px 5px 5px" class="card-img-top" alt="..."></center>
                    <div class="card-body">
                        <h5 class="card-title"><b><?php echo"$post_title"?></b></h5>
                        <h6 class="card-subtitle text-muted"><?php echo"$post_author_name"?></h6>
                        <p class="card-text"><?php echo substr($post_content,1,50)."..."?></p>
                        <a href="post.php?id=<?php echo $row['post_id']?>" class="btn btn-primary">Read more</a>
                    </div>
            </div>



<!-- 
                <div class="card" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div> -->










            <?php } }?>
        </div>
    </div>


    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    </body>

</html>