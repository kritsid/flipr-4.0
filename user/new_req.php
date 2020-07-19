<?php
include_once "../includes/connection.php";
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>new request</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css">

    </head>

    <body>

    <?php include_once "../includes/navbar.php";
    include_once "../includes/sidebar.php";
    ?>

<div class="container"><centre>

  
<form method="post">

<table class="table table-hover">


  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">type</th>
      <th scope="col">quantity</th>
      <th scope="col">defects/mentions</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td> 
           <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" name="upperhood">
            <label class="form-check-label" for="defaultCheck1">
               upper hood
            </label>
            </div>
       </td>
      <td>
      <div class="input-group sm-2">
        <div class="input-group-prepend"></div>
        <select class="custom-select" id="inputGroupSelect01" name="upper_hood">
        <option selected>qty</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        </select>
    </div>
      </td>
      <td><input type="textarea" name="discription" placeholder="mention defects"></td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td> 
           <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">
               pants
            </label>
            </div>
       </td>
      <td>
      <div class="input-group sm-2">
        <div class="input-group-prepend">
        </div>
        <select class="custom-select" id="inputGroupSelect01" name="pants">
        <option selected>qty</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        </select>
    </div>
      </td>
      <td><input type="textarea" name="discription" placeholder="mention defects"></td>
    </tr>
    <tr>


      <th scope="row">3</th>
            <td> 
           <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">
               bedsheets
            </label>
            </div>
       </td>
      <td>
      <div class="input-group sm-2">
        <div class="input-group-prepend">
        </div>
        <select name="bedsheets" class="custom-select" id="inputGroupSelect01">
        <option selected>qty</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        </select>
    </div>
      </td>
      <td><input type="textarea" name="discription" placeholder="mention defects"></td>
    </tr>

    <tr>
    <th scope="row">4</th>
            <td> 
           <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">
               pillow cover
            </label>
            </div>
       </td>
      <td>
      <div class="input-group sm-2">
        <div class="input-group-prepend">
        </div>
        <select name="pillow_cover" class="custom-select" id="inputGroupSelect01">
        <option selected>qty</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        </select>
    </div>
      </td>
      <td><input type="textarea" name="discription" placeholder="mention defects"></td>
    </tr>   

    <tr>
    <th scope="row">5</th>
            <td> 
           <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">
               towel
            </label>
            </div>
       </td>
      <td>
      <div class="input-group sm-2">
        <div class="input-group-prepend">
        </div>
        <select name="towel" class="custom-select" id="inputGroupSelect01">
        <option selected>qty</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        </select>
    </div>
      </td>
      <td><input type="textarea" name="discription" placeholder="mention defects"></td>
    </tr>

    <button type="submit" name="submit" id="submit">submit</button>


  </tbody>
</table>
</form>
</centre>
        <?php 	
        // if(mysqli_connect("localhost","root","","laundry"))
        // {       
         

          if(isset($_POST['submit']))
          {
              $bedsheets=mysqli_real_escape_string($conn,$_POST['bedsheets']);
              $upper_hood=mysqli_real_escape_string($conn,$_POST['upper_hood']);
              $pillow_cover=mysqli_real_escape_string($conn,$_POST['pillow_cover']);
              $towel=mysqli_real_escape_string($conn,$_POST['towel']);
              $pants=mysqli_real_escape_string($conn,$_POST['pants']);
              // $total_clothes=number_format($bedsheets)+number_format($upper_hood)+number_format($pillow_cover)+number_format($towel)+number_format($pants);
              $total_clothes=(int)$bedsheets+(int)$upper_hood+(int)$pillow_cover+(int)$towel+(int)$pants;
              $user_id=$_SESSION['user_id'];
              $name=$_SESSION['full_name'];
              $hostel=$_SESSION['hostel'];

              $sql="INSERT INTO `white slip` (`upper_hood`, `bedsheets`, `pants`, `pillow_cover`, `laundry_no`, 
              `name`, `hostel`, `total_clothes`, `towel`) 
              VALUES ('$upper_hood', '$bedsheets' , '$pants' , '$pillow_cover' , '$user_id' , '$name'  ,
              '$hostel' , '$total_clothes' ,'$towel' )";
              if(mysqli_query($conn,$sql))
              {
                echo '<script>window.location = "user_dash.php?message=successful";</script>';
              }
              else{
                echo '<script>window.location = "user_dash.php?message=unaccepted";</script>';

              }
        }
      //   else
      //   echo '<script>window.location = "new_req.php?message=no";</script>';
      
      // else
      // echo '<script>window.location = "user_dash.php?message=outer";</script>';

        ?>

<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</div>

    </body>
</html>






















