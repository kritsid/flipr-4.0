<?php session_start();
include_once "../includes/connection.php"
?>
<!DOCTYPE html>
<html>
    <head>
        <title>welcome</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css">

    </head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div  id="navbarText">

    <img src="../images/logo.png" style="width:40%;height:150px;" >
<button><a href="logout.php">logout</a></button>
    <span class="navbar-text" style="float: right;margin:50px;">
     <b>welcome <?php echo $_SESSION['full_name']," | ",$_SESSION['role']?></b>
    </span>
    </div>

  </nav>
<?php 
include_once "../includes/sidebar.php";
?>
<h1>PENDING TRANSACTIONS:</h1>
				<a href="new_req.php"><button class="btn btn-info">Add New</button></a>
				<hr>
				
				<table class="table">
				  <thead>
					<tr>
					  <th scope="col">Id</th>
					  <th scope="col"> UPPER</th>
            <th scope="col">TOWEL</th>
            <th scope="col">PANTS</th>
					  <th scope="col">PILLOWCOVER</th>
					  <th scope="col">BEDSHEET</th>
					  <th scope="col">TOTAL</th>

					  <?php if($_SESSION['role']=="admin"){?>
					  <th scope="col">Action</th>
					  <?php }?>
					</tr>
				  </thead>
				  <tbody>
				
<?php
if($_SESSION['role']=="student")
{
  $name=$_SESSION['full_name'];
  $laundry_no=$_SESSION['user_id'];
  $sql="SELECT * FROM `white slip` where `laundry_no`='$laundry_no' AND `status`='pending'";
  $res=mysqli_query($conn,$sql);
 
    while($row=mysqli_fetch_assoc($res)){
      $upper_hood = $row['upper_hood']; 
      $bedsheets = $row['bedsheets']; 
      $pants = $row['pants']; 
      $pillow_cover = $row['pillow_cover'];
      $towel = $row['towel'];
      $total_clothes = $row['total_clothes'];?>
      <tr>
					  <th scope="row"><?php echo $laundry_no;?></th>
					  <td><?php echo  $upper_hood;?></td>
					  <td><?php echo  $towel?></td>
					  <td><?php echo   $pants?></td>
					  <td><?php echo  $pillow_cover;?></td>
            <td><?php echo $bedsheets; ?></td>
            <td><?php echo $total_clothes;?></td>
<?php
}
}?>
<?php
 if($_SESSION['role']=="admin"){?>
   <form action ="search.php">
     <input type ="text" placeholder="search here" name = "s">
   <input type="submit" name ="submit">
   </form>
   
   
   
   <?php
  $sql="SELECT * FROM `white slip`";
  $res1=mysqli_query($conn,$sql);
 
    while($row=mysqli_fetch_assoc($res1)){
      $upper_hood = $row['upper_hood']; 
      $bedsheets = $row['bedsheets']; 
      $pants = $row['pants']; 
      $pillow_cover = $row['pillow_cover'];
      $towel = $row['towel'];
      $total_clothes = $row['total_clothes'];
      $laundry_no=$row['laundry_no'];
      ?>
      <tr>
					  <th scope="row"><?php echo $laundry_no;?></th>
					  <td><?php echo  $upper_hood;?></td>
					  <td><?php echo  $towel;?></td>
					  <td><?php echo   $pants?></td>
					  <td><?php echo  $pillow_cover;?></td>
            <td><?php echo $bedsheets; ?></td>
            <td><?php echo $total_clothes;?></td>
            
            <td><a href="edit_order.php?id=<?php echo $laundry_no;?>">
            <button class="btn btn-info">Edit</button></a> 

            <a onclick="return confirm('Are You sure');" href="delete_order.php?id=<?php echo $laundry_no;?>">
            <button class="btn btn-danger">Delete</button></a>

           <a onclick="return confirm('Are You sure');" href="final_order.php?id=<?php echo $laundry_no;?>">
            <button class="btn btn-danger" onclick="  ;">finalize</button></a>
       
            </td>
      </tr>
            
<?php
}?>
  <?php } ?>
  <script>
              function myfun() 
              {           
                if(confirm("r u sure?"))
                {
                  $(this).prop('disabled',true) ;   
                }
              }
    </script>
<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>