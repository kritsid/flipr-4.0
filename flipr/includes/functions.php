<?php
include_once "connection.php";
function add_jumbotron(){
	echo '<div class="jumbotron jumbotron-fluid">
			<div class="container">
				<h1 class="display-4">FLIPR 4.0</h1>
				<p class="lead">HOLA AMIGOS!!
				A GOAL WITHOUT A PLAN IS JUST A WISH..SO, TO CONVERT YOUR GOALS INTO REALITY
				THIS IS A PERFECT PLATFORM.
				THIS IS THE PLATFORM WHERE YOU CAN CREATE LISTS OF WHAT
				YOU CAN DO..
				 CREATE AN ACCOUNT AND START MANAGING YOURSELF.</p>
			</div>
		</div>';
}

function getAuthorName($id){
	global $conn;
	$sql = "SELECT * FROM author WHERE author_id='$id'";
	$result = mysqli_query($conn, $sql);
	while($row=mysqli_fetch_assoc($result)){
		$name = $row['author_name'];
		echo $name;
	}
}


function getCategoryName($id){
	global $conn;
	$sql = "SELECT * FROM category WHERE category_id='$id'";
	$result = mysqli_query($conn, $sql);
	while($row=mysqli_fetch_assoc($result)){
		$name = $row['category_name'];
		echo $name;
	}
}
// function getSettingValue($setting){
// 	global $conn;
// 	$sql = "SELECT * FROM settings WHERE setting_name='$setting'";
// 	$result = mysqli_query($conn, $sql);
// 	while($row=mysqli_fetch_assoc($result)){
// 		$value = $row['setting_value'];
// 		echo $value;
// 	}
// }

// function setSettingValue($setting,$value){
// 	global $conn;
// 	$sql = "UPDATE settings SET setting_value='$value' WHERE setting_name='$setting'";
// 	if(mysqli_query($conn, $sql)){
// 		return true;
// 	}else{
// 		return false;
// 	}
// }

?>