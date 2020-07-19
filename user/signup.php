<?php include_once "../includes/connection.php";?>
<!DOCTYPE html>
<html>
<title>signup</title>
<head>
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
    
    <div class="container" style="margin:auto auto; margin-top:150px;">

<form method="post">
    <h2>Create New Account</h2><br><br>

    <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-4">
        <input type="text"class="form-control" value="enter full name" name="full_name">
        </div>
  </div>   
  
  <div class="form-group row">
        <label for="user_id" class="col-sm-2 col-form-label">User-id</label>
        <div class="col-sm-4">
        <input type="text"class="form-control" value="enter laundry no." name="user_id">
        </div>
  </div>

  <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-4">
        <input type="text"class="form-control" name="email_id" id="staticEmail" value="">
        </div>
  </div>

  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-4">
      <input type="password" class="form-control" id="inputPassword"name="password">
    </div>
  </div>

  <div class="col-sm2 col-form-label">
 <div class="form-group">
 <div class="col-sm-4">
   <select class="custom-select" name="hostel" required>
     <option value="">Hostel</option>
     <option value="1">Pg</option>
     <option value="2">Two</option>
     <option value="3">Three</option>
   </select>
 </div>
   <div class="invalid-feedback">invalid</div>
 </div>
  </div>
<button type="submit" name="signup">signup</button>
</form>



<?php
$conn=mysqli_connect("localhost","root","","laundry");
if(isset($_POST['signup']))
{
    
    $full_name=mysqli_real_escape_string($conn,$_POST['full_name']);
    $password=mysqli_real_escape_string($conn,$_POST['password']);
    $user_id=mysqli_real_escape_string($conn,$_POST['user_id']);
    $hostel=mysqli_real_escape_string($conn,$_POST['hostel']);
    $email_id=mysqli_real_escape_string($conn,$_POST['email_id']);

    
    if(empty($full_name) OR empty($password) OR empty($user_id))
    {
        header("location:../index.php?message=all_columns-are-compulsory");
        exit();

    }
    // check if username already exists

    $sql="SELECT * FROM `signup` WHERE `user_id`='$user_id'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0)//username exists
    {
        header("location:login.php?message=username+already+exists");
        exit();
    }
    else
    {
        //insert or register the user
        //we need a hashing password now, i.e the password is availabe in a hashed form 
        //in the database, for that we can do this:
           // $hash=password_hash($pass,PASSWORD_DEFAULT);
        $query="INSERT INTO `signup`(`user_id`, `full_name`, `password`, `hostel`, `email_id`, `date`) 
        VALUES ('$user_id','$full_name','$password','$hostel','$email_id','CURDATE()'";
        $res=mysqli_query($conn,$query);
        if($res)
        {
            header("location:../index.php?message=REGISTRATON+SUCCESSFULL");
        }
        else
        {
            header("location:login.php?message=try+again");
            echo"fail";
        }

    }

    
}
// else
// {
//     header("location:../index.php?message=try-again");
//             echo"fail";
//  }




?>



<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</div>

</body>

</html>