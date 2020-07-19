<?php
include_once "../includes/connection.php";
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../css/bootstrap.min.css">

</head>

<body>

<?php include_once "../includes/navbar.php";
include_once "../includes/sidebar.php";
?>

<?php
if(isset($_GET['id']))
{

    $id=$_GET['id'];
    $query="SELECT * FROM `white slip` WHERE `laundry_no`='$id'";
    // $stat=$_SESSION['status'];
    $result=mysqli_query($conn,$query);
    // if($stat=='finlised')
    // {
    //     echo '<script>alert(""this order has been finalised.."do u still want to continue?")</script>';}

        
    while($row=mysqli_fetch_assoc($result))
    {
?>
        

                
        <table class="table table-hover">

<form method="post">
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
            <option selected><?php echo($row['upper_hood'])?></option>
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
            <option selected><?php echo($row['pants'])?></option>
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
            <option selected><?php echo($row['bedsheets'])?></option>
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
            <option selected><?php echo($row['pillow_cover'])?></option>
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
            <option selected><?php echo($row['towel'])?></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            </select>
        </div>
            </td>
            <td><input type="textarea" name="discription" placeholder="mention defects"></td>
        </tr>

        <button name="submit" type="submit" class="btn btn-primary">Update</button>


        </tbody>
        </table>
        </form>
        </centre>

<?php
if(isset($_POST['submit']))
{
    $bedsheets=mysqli_real_escape_string($conn,$_POST['bedsheets']);
    $upper_hood=mysqli_real_escape_string($conn,$_POST['upper_hood']);
    $pillow_cover=mysqli_real_escape_string($conn,$_POST['pillow_cover']);
    $towel=mysqli_real_escape_string($conn,$_POST['towel']);
    $pants=mysqli_real_escape_string($conn,$_POST['pants']);
    // $total_clothes=number_format($bedsheets)+number_format($upper_hood)+number_format($pillow_cover)+number_format($towel)+number_format($pants);
    $total_clothes=(int)$bedsheets+(int)$upper_hood+(int)$pillow_cover+(int)$towel+(int)$pants;
    // $user_id=$_SESSION['laundry_no'];
    $name=$_SESSION['full_name'];
    $hostel=$_SESSION['hostel'];
    $sql2="UPDATE `white slip` SET `upper_hood`='$upper_hood',`bedsheets`='$bedsheets',
    `pants`='$pants',`pillow_cover`='$pillow_cover',`total_clothes`='$total_clothes',`towel`='$towel' WHERE `laundry_no`='$id' ";
    if(mysqli_query($conn,$sql2))
    {

        // header("location:user_dash.php?UPDATE+SUCCESSFUL");
        //headers will not workk here as we r using echo statements in this code..so we need to echo the things
        echo '<script>window.location = "user_dash.php?message=UPDATE+SUCCESSFUL";</script>';

    }
    else
    // header("location:user_dash.php?invalid+click");
    echo '<script>window.location = "user_dash.php?message=invalid+click";</script>';

}
else
{
    // header("location:user_dash.php?invalid+click");
    echo '<script>window.location = "user_dash.php?message=invalid+click";</script>';

}
 }

    

}
else{
    // header("location:user_dash.php?id+unrecognised");
    echo '<script>window.location = "user_dash.php?message=id+unrecognised";</script>';

}
?>



<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=ey5ln3e6qq2sq6u5ka28g3yxtbiyj11zs8l6qyfegao3c0su"></script>

</body>
</html>