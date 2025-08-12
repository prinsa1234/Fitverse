<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "project2";

	$conn = mysqli_connect($server,$user,$pass,$db);

	if($conn){
		
	}
	else{
		echo "unsuccesfull!";
	}
?>