<?php
include_once "../includes/connection.php";
session_start()?>
<!DOCTYPE html>
<html>
    <head>
        <title>welcome</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css">

    </head>
<?php
if(isset($_GET['s']))
{
    $s =$_GET['s'];
    $query = "select * from `white slip` where LOWER(`laundry_no`) like '%$s%'";
    $res= mysqli_query($conn,$query);
    ?>
    <h3>SEARCH RESULTS</h3>
    <!-- <a href="new_req.php"><button class="btn btn-info">Add New</button></a> -->
				
					
    <?php
        if($res)
        {
    ?>
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

            <?php if($_SESSION['role']=="admin")
            {
            ?>
            <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php }?>
            <?php
                while($row=mysqli_fetch_assoc($res))
                {
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
                }
            
            }
            else
            echo"no results found";
            
            ?>
            
            <?php
 }
 else{
    echo"try again";
} ?>
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
</html>




