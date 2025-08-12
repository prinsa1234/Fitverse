<?php 
include("connect.php");
session_start();
error_reporting(0);

$query = "SELECT * FROM add_product";
$data = mysqli_query($conn,$query);
$total = mysqli_num_rows($data);
$em = $_SESSION['eml'];
if($data){
    echo "";}
else{
    echo "try again!";
} 
if($_SESSION['eml']){
    $qu = "SELECT Image,Title,Price,ID from cart Where email = '$em' ORDER BY email DESC LIMIT 3";
    $da = mysqli_query($conn,$qu);}
else{
     $qu = "SELECT Image,Title,Price,ID from duplicart Where email = '' ORDER BY email DESC LIMIT 3";
    $da = mysqli_query($conn,$qu);}





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
                                        <li>
                                            <a href="about.php">About Us</a>
                                        </li>
                                        <li>
                                            <a href="contact.php">Contact Us</a>
                                        </li>


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

                                                                <form method="POST" >
                                                                    <div class="form-group search-form">
                                                                        <input type="text" name="title" class="form-control" id="exampleInputPassword1"
                                                                            placeholder="Search a Product">
                                                                        <input type="submit" class="btn btn-solid" name="search" value="Search">
                                                                    </div>
                                                                

                                                                <?php
                                                                if (isset($_POST['search'])) {
                                                                    $t = $_POST['title'];
                                                                    $quer = "SELECT * FROM add_product WHERE Title ='$t' ";
                                                                    $dd = mysqli_query($conn, $quer);

                                                                    if ($dd) {
                                                                    echo '<table id="search-results"class="table-responsive-md table mb-0">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th scope="col">image</th>
                                                                                    <th scope="col">product name</th>
                                                                                    <th scope="col">price</th>
                                                                                    <th scope="col">Discounted Price</th>
                                                                                    
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>';

                                                                    while ($fetch = mysqli_fetch_assoc($dd)) {
                                                                        echo '<tr>
                                                                                <td scope="row"><img src="'. $fetch["image"] .'" width="100" height="100"></td>
                                                                                <td>'.$fetch["Title"].'</td>
                                                                                <td>'.$fetch["Price"].'</td>
                                                                                <td>'.$fetch["dp"].'</td>
                                                                                
                                                                            </tr>';
                                                                    }

                                                                    echo '</tbody>
                                                                            </table>';
                                                                } else {
                                                                    echo "Failed";
                                                                }

                                                                }
                                                                ?></form>
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
                                                        <h4><span>$' . $result1['Price'] . '</span></h4>
                                                    </div>
                                                </div>
                                                <div class="close-circle">
                                                    <a href="di.php?title=' . urlencode($result1['Title']) . '&id='.urlencode($result1['ID']).'">
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


    <!-- Home slider -->
    <section class="p-0 layout-7">
        <div class="slide-1 home-slider">
            <div>
                <div class="home text-left">
                    <img src="images/back7.jpg" alt="" class="bg-img blur-up lazyload">
                    <div class="container-fluid custom-container">
                        <div class="row">
                            <div class="col">
                                <div class="slider-contain">
                                    <div>
                                        <h4>Headsets for all styles</h4>
                                        <h1>Starting $99</h1>
                                        <a href="shop.php" class="btn btn-solid">shop now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </section>
    <!-- Home slider end -->


    <!-- collection banner -->
    <section class="banner-padding banner-furniture ratio2_1">
        <div class="container-fluid">
            <div class="row partition4">
                <div class="col-lg-3 col-md-6">
                    <a href="shop.php">
                        <div class="collection-banner p-right text-right">
                            <div class="img-part">
                                <img src="images/boatheadset.jpg"
                                    class="img-fluid blur-up lazyload bg-img">
                            </div>
                            <div class="contain-banner banner-4">
                                <div>
                                    <h4>save 30%</h4>
                                    <h2>headset</h2>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="shop.php">
                        <div class="collection-banner p-right text-right">
                            <div class="img-part">
                                <img src="images/samheadsets.jpg" class="img-fluid blur-up lazyload bg-img">
                            </div>
                            <div class="contain-banner banner-4">
                                <div>
                                    <h4>save 60%</h4>
                                    <h2>headsets</h2>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="shop.php">
                        <div class="collection-banner p-right">
                            <div class="img-part">
                                <img src="images/noiseheadsets.jpg"
                                    class="img-fluid blur-up lazyload bg-img">
                            </div>
                            <div class="contain-banner banner-4">
                                <div>
                                    <h4>save 60%</h4>
                                    <h2>headsets</h2>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="shop.php">
                        <div class="collection-banner p-left">
                            <div class="img-part">
                                <img src="images/boatheadsets.jpg"
                                    class="img-fluid blur-up lazyload bg-img">
                            </div>
                            <div class="contain-banner banner-4">
                                <div>
                                    <h4>save 60%</h4>
                                    <h2>headsets</h2>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- collection banner end -->


    <!-- Paragraph-->
    <div class="title1 section-t-space">
        <h2 class="title-inner1">Grand Global Brands</h2>
    </div>
    
    <!-- Paragraph end -->

<section class="banner-padding banner-furniture ratio2_1">
        <div class="container-fluid">
            <div class="row partition4">
                <div class="col-lg-3 col-md-6">
                    <a href="headsets.php">
                        <div class="collectionn-banner p-right text-right">
                            <div class="img-part">
                                <img src="images/view.jpg" width="250" height="250">
                            </div>
                        
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="headsets.php">
                        <div class="collectionn-banner p-right text-right">
                            <div class="img-part">
                                <img src="images/b1.jpg" width="250" height="250" >
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="headsets.php">
                        <div class="collectionn-banner p-right">
                            <div class="img-part">
                                <img src="images/boatheadset.jpg" width="250" height="250" >
                            </div>
                            
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="headsets.php">
                        <div class="collectionn-banner p-left">
                            <div class="img-part">
                                <img src="images/b2.jpg" 
                                          width="250" height="250">
                            </div>
                            
                        </div>
                    </a>
                </div>
            </div>
        </div></section>
<section class="banner-padding banner-furniture ratio2_1">
        <div class="container-fluid">
            <div class="row partition4">
                <div class="col-lg-3 col-md-6">
                    <a href="watch.php">
                        <div class="collectionn-banner p-right text-right">
                            <div class="img-part">
                                <img src="images/view.jpg" width="250" height="250">

                            </div>
                        
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="headsets.php">
                        <div class="collectionn-banner p-right text-right">
                            <div class="img-part">
                                <img src="images/w5.jpg" width="200" height="250" >
                            
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="headsets.php">
                        <div class="collectionn-banner p-right">
                            <div class="img-part">
                                <img src="images/w6.jpg" width="200" height="250" >
                            </div>
                            
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="headsets.php">
                        <div class="collectionn-banner p-left">
                            <div class="img-part">
                                <img src="images/w3.jpg" 
                                          width="200" height="250">
                            </div>
                            
                        </div>
                    </a>
                </div>
            </div>
        </div></section>


    <!-- Product section end -->


    <!-- service layout -->
    <div class="container">
        <section class="service border-section small-section">
            <div class="row">
                <div class="col-md-6 service-block">
                    <div class="media">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                            id="Capa_1" x="0px" y="0px" viewBox="0 0 480 480" style="enable-background:new 0 0 480 480;"
                            xml:space="preserve" width="512px" height="512px">
                            <g>
                                <g>
                                    <g>
                                        <path
                                            d="M472,432h-24V280c-0.003-4.418-3.588-7.997-8.006-7.994c-2.607,0.002-5.05,1.274-6.546,3.41l-112,160 c-2.532,3.621-1.649,8.609,1.972,11.14c1.343,0.939,2.941,1.443,4.58,1.444h104v24c0,4.418,3.582,8,8,8s8-3.582,8-8v-24h24 c4.418,0,8-3.582,8-8S476.418,432,472,432z M432,432h-88.64L432,305.376V432z"
                                            fill="#ff4c3b"></path>
                                        <path
                                            d="M328,464h-94.712l88.056-103.688c0.2-0.238,0.387-0.486,0.56-0.744c16.566-24.518,11.048-57.713-12.56-75.552 c-28.705-20.625-68.695-14.074-89.319,14.631C212.204,309.532,207.998,322.597,208,336c0,4.418,3.582,8,8,8s8-3.582,8-8 c-0.003-26.51,21.486-48.002,47.995-48.005c10.048-0.001,19.843,3.151,28.005,9.013c16.537,12.671,20.388,36.007,8.8,53.32 l-98.896,116.496c-2.859,3.369-2.445,8.417,0.924,11.276c1.445,1.226,3.277,1.899,5.172,1.9h112c4.418,0,8-3.582,8-8 S332.418,464,328,464z"
                                            fill="#ff4c3b"></path>
                                        <path
                                            d="M216.176,424.152c0.167-4.415-3.278-8.129-7.693-8.296c-0.001,0-0.002,0-0.003,0 C104.11,411.982,20.341,328.363,16.28,224H48c4.418,0,8-3.582,8-8s-3.582-8-8-8H16.28C20.283,103.821,103.82,20.287,208,16.288 V40c0,4.418,3.582,8,8,8s8-3.582,8-8V16.288c102.754,3.974,185.686,85.34,191.616,188l-31.2-31.2 c-3.178-3.07-8.242-2.982-11.312,0.196c-2.994,3.1-2.994,8.015,0,11.116l44.656,44.656c0.841,1.018,1.925,1.807,3.152,2.296 c0.313,0.094,0.631,0.172,0.952,0.232c0.549,0.198,1.117,0.335,1.696,0.408c0.08,0,0.152,0,0.232,0c0.08,0,0.152,0,0.224,0 c0.609-0.046,1.211-0.164,1.792-0.352c0.329-0.04,0.655-0.101,0.976-0.184c1.083-0.385,2.069-1.002,2.888-1.808l45.264-45.248 c3.069-3.178,2.982-8.242-0.196-11.312c-3.1-2.994-8.015-2.994-11.116,0l-31.976,31.952 C425.933,90.37,331.38,0.281,216.568,0.112C216.368,0.104,216.2,0,216,0s-0.368,0.104-0.568,0.112 C96.582,0.275,0.275,96.582,0.112,215.432C0.112,215.632,0,215.8,0,216s0.104,0.368,0.112,0.568 c0.199,115.917,91.939,210.97,207.776,215.28h0.296C212.483,431.847,216.013,428.448,216.176,424.152z"
                                            fill="#ff4c3b"></path>
                                        <path
                                            d="M323.48,108.52c-3.124-3.123-8.188-3.123-11.312,0L226.2,194.48c-6.495-2.896-13.914-2.896-20.408,0l-40.704-40.704 c-3.178-3.069-8.243-2.981-11.312,0.197c-2.994,3.1-2.994,8.015,0,11.115l40.624,40.624c-5.704,11.94-0.648,26.244,11.293,31.947 c9.165,4.378,20.095,2.501,27.275-4.683c7.219-7.158,9.078-18.118,4.624-27.256l85.888-85.888 C326.603,116.708,326.603,111.644,323.48,108.52z M221.658,221.654c-0.001,0.001-0.001,0.001-0.002,0.002 c-3.164,3.025-8.148,3.025-11.312,0c-3.125-3.124-3.125-8.189-0.002-11.314c3.124-3.125,8.189-3.125,11.314-0.002 C224.781,213.464,224.781,218.53,221.658,221.654z"
                                            fill="#ff4c3b"></path>
                                    </g>
                                </g>
                            </g>
                        </svg>
                        <div class="media-body">
                            <h4>24 X 7 service</h4>
                            <p>online service </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 service-block">
                    <div class="media">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -14 512.00001 512">
                            <path
                                d="m136.964844 308.234375c4.78125-2.757813 6.417968-8.878906 3.660156-13.660156-2.761719-4.777344-8.878906-6.417969-13.660156-3.660157-4.78125 2.761719-6.421875 8.882813-3.660156 13.660157 2.757812 4.78125 8.878906 6.421875 13.660156 3.660156zm0 0"
                                fill="#ff4c3b"></path>
                            <path
                                d="m95.984375 377.253906 50.359375 87.230469c10.867188 18.84375 35.3125 25.820313 54.644531 14.644531 19.128907-11.054687 25.703125-35.496094 14.636719-54.640625l-30-51.96875 25.980469-15c4.78125-2.765625 6.421875-8.878906 3.660156-13.660156l-13.003906-22.523437c1.550781-.300782 11.746093-2.300782 191.539062-37.570313 22.226563-1.207031 35.542969-25.515625 24.316407-44.949219l-33.234376-57.5625 21.238282-32.167968c2.085937-3.164063 2.210937-7.230469.316406-10.511719l-20-34.640625c-1.894531-3.28125-5.492188-5.203125-9.261719-4.980469l-38.472656 2.308594-36.894531-63.90625c-5.34375-9.257813-14.917969-14.863281-25.605469-14.996094-.128906-.003906-.253906-.003906-.382813-.003906-10.328124 0-19.703124 5.140625-25.257812 13.832031l-130.632812 166.414062-84.925782 49.03125c-33.402344 19.277344-44.972656 62.128907-25.621094 95.621094 17.679688 30.625 54.953126 42.671875 86.601563 30zm102.324219 57.238282c5.523437 9.554687 2.253906 21.78125-7.328125 27.316406-9.613281 5.558594-21.855469 2.144531-27.316407-7.320313l-50-86.613281 34.640626-20c57.867187 100.242188 49.074218 85.011719 50.003906 86.617188zm-22.683594-79.296876-10-17.320312 17.320312-10 10 17.320312zm196.582031-235.910156 13.820313 23.9375-12.324219 18.664063-23.820313-41.261719zm-104.917969-72.132812c2.683594-4.390625 6.941407-4.84375 8.667969-4.796875 1.707031.019531 5.960938.550781 8.527344 4.996093l116.3125 201.464844c3.789063 6.558594-.816406 14.804688-8.414063 14.992188-1.363281.03125-1.992187.277344-5.484374.929687l-123.035157-213.105469c2.582031-3.320312 2.914063-3.640624 3.425781-4.480468zm-16.734374 21.433594 115.597656 200.222656-174.460938 34.21875-53.046875-91.878906zm-223.851563 268.667968c-4.390625-7.597656-6.710937-16.222656-6.710937-24.949218 0-17.835938 9.585937-34.445313 25.011718-43.351563l77.941406-45 50 86.601563-77.941406 45.003906c-23.878906 13.78125-54.515625 5.570312-68.300781-18.304688zm0 0"
                                fill="#ff4c3b"></path>
                            <path
                                d="m105.984375 314.574219c-2.761719-4.78125-8.878906-6.421875-13.660156-3.660157l-17.320313 10c-4.773437 2.757813-10.902344 1.113282-13.660156-3.660156-2.761719-4.78125-8.878906-6.421875-13.660156-3.660156s-6.421875 8.878906-3.660156 13.660156c8.230468 14.257813 26.589843 19.285156 40.980468 10.980469l17.320313-10c4.78125-2.761719 6.421875-8.875 3.660156-13.660156zm0 0"
                                fill="#ff4c3b"></path>
                            <path
                                d="m497.136719 43.746094-55.722657 31.007812c-4.824218 2.6875-6.5625 8.777344-3.875 13.601563 2.679688 4.820312 8.765626 6.566406 13.601563 3.875l55.71875-31.007813c4.828125-2.6875 6.5625-8.777344 3.875-13.601562-2.683594-4.828125-8.773437-6.5625-13.597656-3.875zm0 0"
                                fill="#ff4c3b"></path>
                            <path
                                d="m491.292969 147.316406-38.636719-10.351562c-5.335938-1.429688-10.820312 1.734375-12.25 7.070312-1.429688 5.335938 1.738281 10.816406 7.074219 12.246094l38.640625 10.351562c5.367187 1.441407 10.824218-1.773437 12.246094-7.070312 1.429687-5.335938-1.738282-10.820312-7.074219-12.246094zm0 0"
                                fill="#ff4c3b"></path>
                            <path
                                d="m394.199219 7.414062-10.363281 38.640626c-1.429688 5.335937 1.734374 10.816406 7.070312 12.25 5.332031 1.425781 10.816406-1.730469 12.25-7.070313l10.359375-38.640625c1.429687-5.335938-1.734375-10.820312-7.070313-12.25-5.332031-1.429688-10.816406 1.734375-12.246093 7.070312zm0 0"
                                fill="#ff4c3b"></path>
                        </svg>
                        <div class="media-body">
                            <h4>special offer</h4>
                            <p>new online special  offer</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- service layout  end -->


    <!-- instagram section -->
    <section class="instagram ratio_square">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 p-0">
                    <h2 class="title-borderless"># instagram</h2>
                    <div class="slide-7 no-arrow slick-instagram">
                        <div>
                            <a href="shop.php">
                                <div class="instagram-box"> <img src="images/boatheadset.jpg" class="bg-img"
                                        alt="Avatar" style="width:100%">
                                    <div class="overlay"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                                </div>
                            </a>
                        </div>
                        <div>
                            <a href="shop.php">
                                <div class="instagram-box"> <img src="images/samheadsets.jpg" class="bg-img"
                                        alt="Avatar" style="width:100%">
                                    <div class="overlay"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                                </div>
                            </a>
                        </div>
                        <div>
                            <a href="shop.php">
                                <div class="instagram-box"> <img src="images/noiseheadsets.jpg" class="bg-img"
                                        alt="Avatar" style="width:100%">
                                    <div class="overlay"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                                </div>
                            </a>
                        </div>
                        <div>
                            <a href="shop.php">
                                <div class="instagram-box"> <img src="images/noiseairpods.jpg" class="bg-img"
                                        alt="Avatar" style="width:100%">
                                    <div class="overlay"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                                </div>
                            </a>
                        </div>
                        <div>
                            <a href="shop.php">
                                <div class="instagram-box"> <img src="images/samwatch.jpg" class="bg-img"
                                        alt="Avatar" style="width:100%">
                                    <div class="overlay"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                                </div>
                            </a>
                        </div>
                        <div>
                            <a href="shop.php">
                                <div class="instagram-box"> <img src="images/boatheadsets.jpg" class="bg-img"
                                        alt="Avatar" style="width:100%">
                                    <div class="overlay"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                                </div>
                            </a>
                        </div>
                        <div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- instagram section end -->


    <!-- footer -->
    <footer class="footer-light">
        <div class="light-layout">
            <div class="container">
                <section class="small-section border-section border-top-0">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="subscribe">
                                <div>
                                    <h4>KNOW IT ALL FIRST!</h4>
                                    <p>Never Miss Anything From Our Store By Signing Up To Our Newsletter.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <form
                                action="https://pixelstrap.us19.list-manage.com/subscribe/post?u=5a128856334b598b395f1fc9b&amp;id=082f74cbda"
                                class="form-inline subscribe-form auth-form needs-validation" method="post"
                                id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank">
                                <div class="form-group mx-sm-3">
                                    <input type="text" class="form-control" name="EMAIL" id="mce-EMAIL"
                                        placeholder="Enter your email" required="required">
                                </div>
                                <button type="submit" class="btn btn-solid" id="mc-submit">subscribe</button>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <section class="section-b-space light-layout">
            <div class="container">
                <div class="row footer-theme partition-f">
                    <div class="col-lg-4 col-md-6">
                        <div class="footer-title footer-mobile-title">
                            <h4>about</h4>
                        </div>
                        <div class="footer-contant">
                            <div class="footer-logo"><img src="sale.png" alt="Logo"></div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
                           
                        </div>
                    </div>
                    <div class="col offset-xl-1">
                        <div class="sub-title">
                            <div class="footer-title">
                                <h4>my account</h4>
                            </div>
                            <div class="footer-contant">
                                <ul>
                                    <li><a href="index.php">home</a></li>
                                    <li><a href="shop.php">store</a></li>
                                    <li><a href="about.php">about us</a></li>
                                    <li><a href="contact.php">contact us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="sub-title">
                            <div class="footer-title">
                                <h4>store information</h4>
                            </div>
                            <div class="footer-contant">
                                <ul class="contact-list">
                                    
                                    <li><i class="fa fa-phone"></i>Call Us: 123-456-7898</li>
                                    <li><i class="fa fa-envelope-o"></i>Email Us: <a href="#">Support@Fiot.com</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </footer>
    <!-- footer end -->




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