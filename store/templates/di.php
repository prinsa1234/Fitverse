<?php
include("connect.php");
session_start();
error_reporting(0);

$eml = $_SESSION['eml'];
$n = $_GET['title'];
$i = $_GET['id'];

// Capture the referring page URL
$referer = $_SERVER['HTTP_REFERER'];

if ($eml) {
    $query = "DELETE FROM cart WHERE Title = '$n' && ID='$i'";
} else {
    $query = "DELETE FROM duplicart WHERE Title = '$n' && ID='$i'";
}

$data = mysqli_query($conn, $query);

if ($data) {
    echo "Record Deleted";
    // Redirect back to the referring page
    header("location: $referer");
} else {
    echo "Failed";
}
?>
