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
                                            <li> <a href="#">clothing</a>
                                                <ul class="mega-menu clothing-menu">
                                                    <li>
                                                        <div class="row m-0">
                                                            <div class="col-xl-4">
                                                                <div class="link-section">
                                                                    <h5>women's fashion</h5>
                                                                    <ul>
                                                                        <li><a href="#">dresses</a></li>
                                                                        <li><a href="#">skirts</a></li>
                                                                        <li><a href="#">westarn wear</a></li>
                                                                        <li><a href="#">ethic wear</a></li>
                                                                        <li><a href="#">sport wear</a></li>
                                                                    </ul>
                                                                    <h5>men's fashion</h5>
                                                                    <ul>
                                                                        <li><a href="#">sports wear</a></li>
                                                                        <li><a href="#">western wear</a></li>
                                                                        <li><a href="#">ethic wear</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-4">
                                                                <div class="link-section">
                                                                    <h5>accessories</h5>
                                                                    <ul>
                                                                        <li><a href="#">fashion jewellery</a></li>
                                                                        <li><a href="#">caps and hats</a></li>
                                                                        <li><a href="#">precious jewellery</a></li>
                                                                        <li><a href="#">necklaces</a></li>
                                                                        <li><a href="#">earrings</a></li>
                                                                        <li><a href="#">wrist wear</a></li>
                                                                        <li><a href="#">ties</a></li>
                                                                        <li><a href="#">cufflinks</a></li>
                                                                        <li><a href="#">pockets squares</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-4">
                                                                <a href="#" class="mega-menu-banner"><img
                                                                        src=""
                                                                        alt="" class="img-fluid blur-up lazyload"></a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li> <a href="#">bags</a>
                                                <ul>
                                                    <li><a href="#">shopper bags</a></li>
                                                    <li><a href="#">laptop bags</a></li>
                                                    <li><a href="#">clutches</a></li>
                                                    <li> <a href="#">purses</a>
                                                        <ul>
                                                            <li><a href="#">purses</a></li>
                                                            <li><a href="#">wallets</a></li>
                                                            <li><a href="#">leathers</a></li>
                                                            <li><a href="#">satchels</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li> <a href="#">footwear</a>
                                                <ul>
                                                    <li><a href="#">sport shoes</a></li>
                                                    <li><a href="#">formal shoes</a></li>
                                                    <li><a href="#">casual shoes</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">watches</a></li>
                                            <li> <a href="#">Accessories</a>
                                                <ul>
                                                    <li><a href="#">fashion jewellery</a></li>
                                                    <li><a href="#">caps and hats</a></li>
                                                    <li><a href="#">precious jewellery</a></li>
                                                    <li> <a href="#">more..</a>
                                                        <ul>
                                                            <li><a href="#">necklaces</a></li>
                                                            <li><a href="#">earrings</a></li>
                                                            <li><a href="#">wrist wear</a></li>
                                                            <li> <a href="#">accessories</a>
                                                                <ul>
                                                                    <li><a href="#">ties</a></li>
                                                                    <li><a href="#">cufflinks</a></li>
                                                                    <li><a href="#">pockets squares</a></li>
                                                                    <li><a href="#">helmets</a></li>
                                                                    <li><a href="#">scarves</a></li>
                                                                    <li> <a href="#">more...</a>
                                                                        <ul>
                                                                            <li><a href="#">accessory gift sets</a></li>
                                                                            <li><a href="#">travel accessories</a></li>
                                                                            <li><a href="#">phone cases</a></li>
                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                            <li><a href="#">belts & more</a></li>
                                                            <li><a href="#">wearable</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li><a href="#">house of design</a></li>
                                            <li> <a href="#">beauty & personal care</a>
                                                <ul>
                                                    <li><a href="#">makeup</a></li>
                                                    <li><a href="#">skincare</a></li>
                                                    <li><a href="#">premium beaty</a></li>
                                                    <li> <a href="#">more</a>
                                                        <ul>
                                                            <li><a href="#">fragrances</a></li>
                                                            <li><a href="#">luxury beauty</a></li>
                                                            <li><a href="#">hair care</a></li>
                                                            <li><a href="#">tools & brushes</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li><a href="#">home & decor</a></li>
                                            <li><a href="#">kitchen</a></li>
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
                                        <div>
                                            <img src="images/search.png" onclick="openSearch()" class="img-fluid " alt="">
                                            <i class="fa fa-search" onclick="openSearch()"></i>
                                        </div>
                                        <div id="search-overlay" class="search-overlay">
                                            <div>
                                                <span class="closebtn" onclick="closeSearch()" title="Close Overlay">×</span>
                                                <div class="overlay-content">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-xl-12">
                                                                <style>
                                                                    /* Add this CSS to style the search form and button */
                                                                    .search-form {
                                                                        display: flex;
                                                                        align-items: center;
                                                                    }

                                                                    .search-form input[type="text"] {
                                                                        flex: 1;
                                                                        margin-right: 10px;
                                                                    }

                                                                    /* Adjust other CSS as needed for your styling */
                                                                </style>

                                                                <form method="POST" action="res.php">
                                                                    <div class="form-group search-form">
                                                                        <input type="text" name="title" class="form-control" id="exampleInputPassword1"
                                                                            placeholder="Search a Product">
                                                                        <input type="submit" class="btn btn-solid" name="search" value="Search">
                                                                    </div>
                                                                </form>
                                                                <div id="searchResults">
                                                                
                                                            </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="onhover-div mobile-cart">
                                    <div>
                                        <img src="images/cart.png" class="img-fluid" alt="">
                                        <i class="fa fa-shopping-cart"></i>
                                        <span id="cart-message" class="cart-message"></span>
                                    </div>
                                    <ul class="show-div shopping-cart">
                                        <?php
                                        $sub = 0;
                                        while ($result1 = mysqli_fetch_assoc($da)) {
                                            echo '<li>
                                                <div class="media">
                                                    <a href="#"><img alt="" class="mr-3" src="' . $result1['Image'] . '"></a>
                                                    <div class="media-body">
                                                        <a href="#">
                                                            <h4>' . $result1['Title'] . '</h4>
                                                        </a>
                                                        <h4><span>' . $result1['Price'] . '</span></h4>
                                                    </div>
                                                </div>
                                                <div class="close-circle">
                                                    <a href="d.php?title=' . urlencode($result1['Title']) . '">
                                                        <i class="fa fa-times" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                            </li>';
                                            $sub += $result1['Price'];
                                        }
                                        ?>

                                        <!-- Display Subtotal -->
                                        <li>
                                            <div class="total">
                                                <h5>subtotal : <span>$<?php echo $sub; ?></span></h5>
                                            </div>
                                        </li><li><?php
                                                session_start(); // Start the session

                                                $c = false;

                                                if ($sub != 0 ) {
                                                    $c = true;
                                                    $_SESSION['checkout'] = true;
                                                    }
                                                
                                                ?>

                                            <div class="buttons">
                                                <?php if ($_SESSION['eml']) { ?>
                                                    <a href="cart.php" class="view-cart">view cart</a>
                                                <?php } else { ?>
                                                    <a href="cartt.php" class="view-cart">view cart</a>
                                                <?php } ?>
                                                <a href="pay.php" class="checkout" name="checkout">checkout</a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->
<?php
include("connect.php");
if (isset($_POST['search'])) {
    $t = $_POST['title'];
    $quer = "SELECT * FROM add_product WHERE Title = '$t'";
    $dd = mysqli_query($conn, $quer);

    if ($dd) {
        echo '<table id="search-results" class="table-responsive-md table mb-0">
                <thead>
                    <tr>
                        <th scope="col">image</th>
                        <th scope="col">product name</th>
                        <th scope="col">price</th>
                        <th scope="col">sales</th>
                        <th scope="col">Date</th>
                    </tr>
                </thead>
                <tbody>';

        while ($fetch = mysqli_fetch_assoc($dd)) {
            echo '<tr>
                    <td scope="row"><img src="' . $fetch["image"] . '" width="100" height="100"></td>
                    <td>' . $fetch["Title"] . '</td>
                    <td>' . $fetch["Price"] . '</td>
                    <td>' . $fetch["dp"] . '</td>
                    <td>' . $fetch["cd"] . '</td>
                    <td>
                        <a href="edit.php?title=' . $fetch['Title'] . '"><i class="fa fa-pencil-square-o mr-1" aria-hidden="true"></i></a>
                        <a href="delete.php?title=' . $fetch['Title'] . '"><i class="fa fa-trash-o ml-1" aria-hidden="true"></i></a>
                    </td>
                </tr>';
        }

        echo '</tbody>
                </table>';
    } else {
        echo "Failed";
    }
}
?>
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
       
        function openSearch() {
            document.getElementById("search-overlay").style.display = "block";
        }

        function closeSearch() {
            document.getElementById("search-overlay").style.display = "none";
        }
    </script>
      

    <script>
    function showCartMessage(message) {
        var cartMessage = document.getElementById("cart-message");
        cartMessage.textContent = message;
        cartMessage.style.opacity = "1";
        cartMessage.style.color = "green"; // Change the color to green
        cartMessage.style.fontWeight = "bold"; // Make the message bold

        setTimeout(function () {
            cartMessage.style.opacity = "0";
            cartMessage.textContent = "";
        }, 300000); // Display the message for 5 minutes (300,000 milliseconds)
    }
</script>
</body>

</html>
