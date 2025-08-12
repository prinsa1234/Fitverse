<?php
session_start(); // Start the session

session_unset(); // Unset all session variables
session_destroy(); // Destroy the session

echo "Session Destroyed!";
header("location: login.php");
exit(); // Make sure to exit after redirect
?>
