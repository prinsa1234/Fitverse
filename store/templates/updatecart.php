<?php
session_start();
error_reporting(0);
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['remove']) && isset($_POST['title'])) {
    $em = $_SESSION['eml'];
    $n = urldecode($_POST['title']);

    // Remove the item from the cart in session
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $item) {
            if ($item['Title'] == $n) {
                unset($_SESSION['cart'][$key]);
                break;
            }
        }
    }

    // Redirect back to the cart display page
    header("Location: cart.php"); // Change 'cart.php' to the appropriate page
    exit();
}
?>
