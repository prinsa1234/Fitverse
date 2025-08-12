<?php
include("connect.php");
session_start();error_reporting(0);
$eml = $_SESSION['eml'];
$n = $_GET['title'];
$i = $_GET['id'];
if($eml){
	$query = "DELETE FROM cart WHERE Title = '$n' && ID='$i'";

	$data = mysqli_query($conn,$query);
	if($data){
		echo " Record Deleted";
		header("location:shop.php");
		
	}
	else{
		echo "Failed";
	}
}
else{
	$query = "DELETE FROM duplicart WHERE Title = '$n' && ID='$i'";

	$data = mysqli_query($conn,$query);
	if($data){
		echo " Record Deleted";
		header("location:shop.php");
		
	}
	else{
		echo "Failed";
	}
}

?>