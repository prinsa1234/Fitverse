<?php 
include("connect.php");
session_start();
error_reporting(0);
$t = $_GET['title'];
$q=1;
$query = "SELECT * FROM add_product where Title='$t'";
$data = mysqli_query($conn,$query);
$total = mysqli_num_rows($data);
$res = mysqli_fetch_assoc($data);

$ti=$res['Title'];
$pr = $res['Price'];
$i = $res['image'];
$em = $_SESSION['eml'];
if($em){
            
        $q1 = "SELECT * FROM cart WHERE Title ='$ti' and email='$em' ";
        $dataa = mysqli_query($conn,$q1);

        if(mysqli_num_rows($dataa)==0){

            $qqq = "INSERT INTO cart (Image, Title, Price, email, quantity) VALUES (?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $qqq);
            mysqli_stmt_bind_param($stmt, "ssdss", $i, $ti, $price, $em, $q);
            $dd = mysqli_stmt_execute($stmt);

            if ($dd) {
                // Success
                $titleParam = $t;
                header("Location: shop.php?title=$titleParam");
                exit();
            } else {
                // Error
                echo "Error inserting data: " . mysqli_error($conn);
            }
        }
        else{
            $feth = mysqli_fetch_assoc($dataa);
            $quan = $feth['quantity'] + 1;
            $p = $quan * $feth['Price'];
            $query = "UPDATE cart SET quantity=?, price=? WHERE Title=? AND email=?";
            $updateStmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($updateStmt, "ddss", $quan, $p, $ti, $em);
            $datt = mysqli_stmt_execute($updateStmt);

            if ($datt) {
                $titleParam = $t;
                header("Location: shop.php?title=$titleParam");
                exit();
                echo "s"; // Print success message or handle accordingly
            } else {
                echo "f"; // Print failure message or handle accordingly
            }

        }}

else{
            $q = $_POST['quantity'];
            $_SESSION['cart'] = array(); // Initialize the cart array if it doesn't exist
            
            // Assuming $ti, $pr, and $i represent the title, price, and image of the current product
            $product = array(
                'Title' => $ti,
                'Price' => $pr,
                'Image' => $i
            );
            
            // Add the product to the cart array
            $_SESSION['cart'][] = $product;
        
            $e = '';
                
            $q1 = "SELECT * FROM duplicart WHERE Title ='$ti' and email='$e' ";
            $dataa = mysqli_query($conn,$q1);

            if(mysqli_num_rows($dataa)==0){

                $qqq = "INSERT INTO duplicart (Image, Title, Price, email, quantity) VALUES (?, ?, ?, ?, ?)";
                $stmt = mysqli_prepare($conn, $qqq);
                mysqli_stmt_bind_param($stmt, "ssdss", $i, $ti, $price, $e, $q);
                $dd = mysqli_stmt_execute($stmt);

                if ($dd) {
                    // Success
                    $titleParam = $t;
                    header("Location: shop.php?title=$titleParam");
                    exit();
                } else {
                    // Error
                    echo "Error inserting data: " . mysqli_error($conn);
                }
            }
            else{
                $feth = mysqli_fetch_assoc($dataa);
                $quan = $feth['quantity'] + 1;
                $p = $quan * $feth['price'];
                $query = "UPDATE duplicart SET quantity=?, price=? WHERE Title=? AND email=?";
                $updateStmt = mysqli_prepare($conn, $query);
                mysqli_stmt_bind_param($updateStmt, "ddss", $quan, $p, $ti, $e);
                $datt = mysqli_stmt_execute($updateStmt);

                if ($datt) {
                    echo "s";
                    $titleParam = $t;
                    header("Location: cartt.php?title=$titleParam");
                    exit(); // Print success message or handle accordingly
                } else {
                    echo "f"; // Print failure message or handle accordingly
                }

            }}}
else{

        
    }
?>