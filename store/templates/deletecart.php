<?php
include("connect.php");
session_start();
error_reporting(0);
$em = $_SESSION['eml'];
$n = $_GET['title']; 
$p = $_GET['price'];
$i = $_GET['im'];
$id = $_GET['id'];
echo $i;
// Delete the item from the cart
if($_SESSION['eml']){
	$deleteQuery = "DELETE FROM cart WHERE Title = '$n' AND ID = '$id' ";
	$deleteResult = mysqli_query($conn, $deleteQuery);

	if ($deleteResult) {
	    header("location: cart.php");
	    exit();
	} else {
	    echo "Failed";
	}}


else{
	$deleteQuery1 = "DELETE FROM duplicart WHERE title = '$n' AND ID = '$id' ";
	$deleteResult1 = mysqli_query($conn, $deleteQuery1);

	if ($deleteResult1) {
	    header("location: cartt.php");
	    exit();
	} else {
	    echo "Failed";
	}
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $price = $_POST['price'];
    
    // Insert the item back into the cart table
    $insertQuery = "INSERT INTO cart (ID, Title, Price) VALUES ('$id', '$title', '$price')";
    $insertResult = mysqli_query($conn, $insertQuery);

    if ($insertResult) {
        echo "Success"; // Return success response
    } else {
        echo "Failed"; // Return error response
    }
}
?>
