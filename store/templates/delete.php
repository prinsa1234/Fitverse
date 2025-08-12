<?php
include("connect.php");
error_reporting(0);
$n=$_GET['title']; 

$query = "DELETE FROM add_product WHERE Title = '$n' ";

$data = mysqli_query($conn,$query);
if($data){
	echo " Record Deleted";
	header("location:product.php");
}
else{
	echo "Failed";
}
?>