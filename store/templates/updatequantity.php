<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $newQuantity = $_POST["new_quantity"];

    // Update the database with the new quantity
    $updateQuery = "UPDATE your_table_name SET quantity = $newQuantity WHERE ID = $id";

    // Execute the query using your database connection
    // ...

    // Redirect back to the cart page or any other appropriate location
    header("Location: cart.php");
    exit();
}
?>
