<?php 
error_reporting(0);
$q = $_POST['quantity'];
echo $q;
include("connect.php");
session_start();
$em = $_SESSION['eml'];

$t = $_GET['title'];
$q = "SELECT * FROM duplicart WHERE email=''";
$dat = mysqli_query($conn, $q);

if (!$dat) {
    echo "Error: " . mysqli_error($conn);
} else {
    echo "";
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    while ($result2 = mysqli_fetch_assoc($dat)) {
        $id = $result2['ID'];
        $newQuantity = $_POST['quantity'][$id] ?? 0; // Get the new quantity or set to 0
        
        // Calculate the new total price for the item
        $newTotalPrice = $result2['price'] * $newQuantity;
        
        // Update the database with the new quantity and total price
        $updateQuery = "UPDATE duplicart SET quantity = $newQuantity, price = $newTotalPrice WHERE ID = $id";
        $updateResult = mysqli_query($conn, $updateQuery);
        
        if (!$updateResult) {
            echo "Error updating quantity and price for ID: $id - " . mysqli_error($conn) . "<br>";
        }
    }

    // Perform redirection after all updates are done
    if (isset($_POST['continue'])) {
        header("Location: shop.php");
        exit();
    } elseif (isset($_POST['checkout'])) {
        header("Location: pay1.php");
        exit();
    }
}





?>


<!DOCTYPE html>
<html lang="en">


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" >
    <meta name="keywords" >
    <meta name="author" >
    <link rel="icon" href="images/1.jpg" type="image/x-icon">
    <link rel="shortcut icon" href="images/1.jpg" type="image/x-icon">
    <title>Digital E-commerce </title> 
    

    <!--Google font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" type="text/css" href="css/fontawesome.css">
    
    <!-- Icons -->
   <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">

    <!--Slick slider css-->
    <link rel="stylesheet" type="text/css" href="css/slick.css">
    <link rel="stylesheet" type="text/css" href="css/slick-theme.css">

    <!-- Animate icon -->
    <link rel="stylesheet" type="text/css" href="css/animate.css">

    <!-- Themify icon -->
    <link rel="stylesheet" type="text/css" href="css/themify-icons.css">

    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">

    <!-- Theme css -->
    <link rel="stylesheet" type="text/css" href="css/color19.css" media="screen" id="color">

</head>

<body>


    <!-- header start -->
    <header class="header-tools marketplace">
        <div class="mobile-fix-option"></div>
        <div class="top-header">
            <div class="container-fluid custom-container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="header-contact">
                            <ul>
                                <li>Welcome to Digital Downloads</li>
                                <li><i class="fa fa-phone" aria-hidden="true"></i>Call Us: 123 - 456 - 7890</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 text-right">
                        <ul class="header-dropdown">
                            <li class="onhover-dropdown mobile-account"> <span data-brackets-id="5088" class="fa fa-user"></span>
                                My Account
                                <ul class="onhover-show-div"><?php if(!$_SESSION['eml']){ ?>
                                    <li><a href="login.php" data-lng="en">Login</a></li> <?php } else{ ?>
                                    <li><a href="logout.php" data-lng="es">Logout</a><?php } ?></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid custom-container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="main-menu">
                        <div class="menu-left">
                            <div class="navbar">
                                <a href="javascript:void(0)" onclick="openNav()">
                                    <div class="bar-style"><i class="fa fa-bars sidebar-bar" aria-hidden="true"></i>
                                    </div>
                                </a>
                                <div id="mySidenav" class="sidenav">
                                    <a href="javascript:void(0)" class="sidebar-overlay" onclick="closeNav()"></a>
                                    <nav>
                                        <div onclick="closeNav()">
                                            <div class="sidebar-back text-left"><i class="fa fa-angle-left pr-2"
                                                    aria-hidden="true"></i> Back</div>
                                        </div>
                                        <ul id="sub-menu" class="sm pixelstrap sm-vertical">
                                            
                                            <li> <a href="headsets.php">Headsets</a>
                                                
                                            </li>
                                            <li> <a href="lap.php">Laptops</a>
                                                
                                            </li>
                                            <li><a href="watch.php">watches</a></li>
                                            <li> <a href="tv.php">Tv</a>
                                                
                                            </li>
                                            <li><a href="air.php">Airpods</a></li>
                                            
                                            <li><a href="speaker.php">Speakers</a></li>
                                            
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="brand-logo">
                                <a href="index.php"><img src="images/logo.jpg"
                                        class="img-fluid blur-up lazyload" alt="Logo"></a>
                            </div>
                        </div>
                        <div class="menu-right pull-right">
                            <div>
                                <nav id="main-nav">
                                    <div class="toggle-nav"><i class="fa fa-bars sidebar-bar"></i></div>
                                    <ul id="main-menu" class="sm pixelstrap sm-horizontal">
                                        <li>
                                            <div class="mobile-back text-right">Back<i class="fa fa-angle-right pl-2"
                                                    aria-hidden="true"></i></div>
                                        </li>
                                        <li>
                                            <a href="index.php">Home</a>
                                        </li>
                                        <style>
                                        .dropdown-menu {
                                                display: none;
                                                position: absolute;
                                                background-color: #555;
                                                border-radius: 5px;
                                                padding: 10px;
                                                 top: 100%; /* Add this line */
                                                    left: 50%; /* Center the dropdown */
                                                    transform: translateX(-50%); /* Center the dropdown */
                                                    z-index: 1; /* Add this line */                                            }
                                         .onhover-dropdownn:hover .dropdown-menu {
                                            display: block;
                                        }

                                        /* Style the dropdown items */
                                        .dropdown-menu > li {
                                            margin-bottom: 5px;
                                        }

                                        /* Style links */
                                        a {
                                            text-decoration: none;
                                            color: #fff;
                                        }

                                        /* Change link color on hover */
                                        a:hover {
                                            color: #ffd700;
                                        }
                                        </style>
                                        <li class="onhover-dropdownn">
                                           <a href="shop.php">Store</a>
                                            <ul class="dropdown-menu">
                                                <li><a href="headsets.php">Headsets</a></li>
                                                <li><a href="lap.php">Laptops</a></li>
                                                <li><a href="watch.php">Watches</a></li>
                                                <li><a href="tv.php">TV</a></li>
                                                <li><a href="air.php">Airpods</a></li>
                                                <li><a href="speaker.php">Speakers</a></li>
                                            </ul>
                                        </li>
                                        
                                        <li>
                                            <a href="about.php">About Us</a>
                                        </li>
                                        <li>
                                            <a href="contact.php">Contact Us</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <div>
                                <div class="icon-nav">
                                    <ul>
                                        <li class="onhover-div mobile-search">
                                            <div><img src="images/search.png" onclick="openSearch()"
                                                    class="img-fluid " alt=""> <i class="fa fa-search"
                                                    onclick="openSearch()"></i></div>
                                            <div id="search-overlay" class="search-overlay">
                                                <div> <span class="closebtn" onclick="closeSearch()"
                                                        title="Close Overlay">×</span>
                                                    <div class="overlay-content">
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col-xl-12">
                                                                    <form>
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control"
                                                                                id="exampleInputPassword1"
                                                                                placeholder="Search a Product">
                                                                        </div>
                                                                        <button type="submit" class="btn btn-primary"><i
                                                                                class="fa fa-search"></i></button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->


    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>cart</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">cart</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


    <!--section start-->
    <section class="cart-section section-b-space">
    <div class="container">
        <form method="POST">
        <div class="row">
            <div class="col-sm-12">
                <table class="table cart-table table-responsive-xs">
                    <thead>
                        <tr class="table-head">
                            <th scope="col">image</th>
                            <th scope="col">product name</th>
                            <th scope = "col">Quantity</th>
                            <th scope="col">price</th>
                            <th scope="col">action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                    $totalprice = 0;
                    while ($result = mysqli_fetch_assoc($dat)) {
                        echo '<tr>
                            <td>
                                <a href="#"><img src="' . $result["image"] . '" alt=""></a>
                            </td>
                            <td>
                                <a href="#">' . $result["title"] . '</a>
                            </td>
                            <td>
                                <div class="qty-box">
                                    <div class="input-group">
                                        <input type="number" name="quantity[' . $result["ID"] . ']" class="form-control input-number" value="' . $result["quantity"] . '" onchange="updateQuantity(this, ' . $result["price"] . ', document.getElementById(\'rowTotal_' . $result["ID"] . '\'), document.getElementById(\'totalPrice\'));">
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h2><span id="rowTotal_' . $result["ID"] . '" class="row-total">' . ($result["price"] * $result["quantity"]) . '</span></h2>
                            </td>
                            <td>
                                <a href="deletecart.php?title=' . $result['title'] . '&id=' . $result['ID'] . '" class="icon"><i class="fa fa-close"></i></a>
                            </td>
                        </tr>';

                        $totalprice += ($result["price"] * $result["quantity"]);
                    }
                    ?>
                    </tbody>
                </table> <!-- Close the first table here -->
                <table class="table cart-table table-responsive-md">
                <tfoot>
                    <tr>
                        <td colspan="5"><strong>Total:</strong></td>
                        <td><strong><span id="totalPrice"><?php echo number_format($totalprice, 2); ?></span></strong></td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
             <div class="row cart-buttons">
                <div class="col-6"><input type="submit" name="continue" value="Continue Shopping" class="btn btn-solid"></div>
                <div class="col-6"><input type="submit" name="checkout" value="Check Out" class="btn btn-solid"></div>
            </div>
        </form>
</section>
<!--section end-->

    <!--section end-->
<?php include("footer.php"); ?>


    <!-- tap to top -->
    <div class="tap-top top-cls">
        <div>
            <i class="fa fa-angle-double-up"></i>
        </div>
    </div>
    <!-- tap to top end -->


    <!-- latest jquery-->
    <script src="js/jquery-3.3.1.min.js"></script>

    <!-- fly cart ui jquery-->
    <script src="js/jquery-ui.min.js"></script>

    <!-- exitintent jquery-->
    <script src="js/jquery.exitintent.js"></script>
    <script src="js/exit.js"></script>

    <!-- popper js-->
    <script src="js/popper.min.js"></script>

    <!-- slick js-->
    <script src="js/slick.js"></script>

    <!-- menu js-->
    <script src="js/menu.js"></script>

    <!-- lazyload js-->
    <script src="js/lazysizes.min.js"></script>

    <!-- Bootstrap js-->
    <script src="js/bootstrap.js"></script>

    <!-- Bootstrap Notification js-->
    <script src="js/bootstrap-notify.min.js"></script>

    <!-- Fly cart js-->
    <script src="js/fly-cart.js"></script>

    <!-- Theme js-->
    <script src="js/script.js"></script>

    <script>
        $(window).on('load', function () {
            setTimeout(function () {
                $('#exampleModal').modal('show');
            }, 2500);
        });
        function openSearch() {
            document.getElementById("search-overlay").style.display = "block";
        }

        function closeSearch() {
            document.getElementById("search-overlay").style.display = "none";
        }
    </script>
   <script>
    function updateQuantity(input, price, rowTotalElement, totalElement) {
        var quantity = parseInt(input.value);
        
        // Set default value to 1 if input is not a valid number
        if (isNaN(quantity) || quantity < 1) {
            input.value = 1;
            quantity = 1;
        }
        
        var unitPrice = parseFloat(price);
        var rowTotal = quantity * unitPrice;
        rowTotalElement.textContent = rowTotal.toFixed(2);
        
        var total = 0;
        var rowTotalElements = document.querySelectorAll('.row-total');
        rowTotalElements.forEach(function(element) {
            total += parseFloat(element.textContent);
        });
        
        totalElement.textContent = total.toFixed(2);
    }
</script>



</body>

</html>