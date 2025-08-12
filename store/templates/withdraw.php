<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="multikart">
    <meta name="keywords" content="multikart">
    <meta name="author" content="multikart">
    <link rel="icon" href="../assets/images/favicon/1.png" type="image/x-icon" />
    <link rel="shortcut icon" href="../assets/images/favicon/1.png" type="image/x-icon" />
    <title>Multikart - Multi-purpopse E-commerce Html Template</title>

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

    <!-- date picker -->
    <link rel="stylesheet" type="text/css" href="css/datepicker.min.css">

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
                                <ul class="onhover-show-div">
                                    <li><a href="login.php" data-lng="en">Login</a></li>
                                    <li><a href="logout.php" data-lng="es">Logout</a></li>
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
                                        <li>
                                            <a href="shop.php">Store</a>
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
                                        <li class="onhover-div mobile-cart">
                                            <a href="cart.php">
                                                <div><img src="images/cart.png" class="img-fluid" alt=""> <i class="fa fa-shopping-cart"></i></div>
                                            </a>
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
                        <h2>Withdraw</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Vendor dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Withdraw</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


   


    
    <section class="section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="profile-top">
                            <div class="profile-image">
                                <img src="../assets/images/logos/17.png" alt="Logo" class="img-fluid">
                            </div>
                            <div class="profile-detail">
                                <h5>Digital Downloads</h5>
                                <h6>abc@mail.com</h6>
                            </div>
                        </div>
                    <div class="account-sidebar"><i class="fa fa-bars sidebar-bar"></i></div>
                    <div class="dashboard-left">
                        <div class="collection-mobile-back"><span class="filter-back"><i class="fa fa-angle-left" aria-hidden="true"></i> back</span></div>
                        <div class="block-content">
                            <ul>
                                <li class="active"><a href="vendor-dashboard.php">Dashboard</a></li>
                                <li><a href="product.php">Products</a></li>
                                <li><a href="orders.php">Orders</a></li>
                                <li><a href="withdraw.php">Withdraw</a></li>
                                <li><a href="profile.php">Profile</a></li>
                                <li class="last"><a href="#">Log Out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="dashboard-right">
                        
                        <div class="dashboard">
                            
                            <div class="row">
                                
                                
                                <div class="col-12">
                                    <div class="card dashboard-table mt-0">
                                        <div class="card-body">
                                            <div class="top-sec">
                                                <h3>Withdraw</h3>
                                                
                                            </div>
                                            <div id="balance">
                                                <h3 class="text-primary">Current Balance: 
                                                    <span class=text-dark><span >₹</span>4,752.09</span> 
                                                </h3>
                                            </div>
                                            <div  id="btn-withdraw">
                                                <h3>Payment Method</h3>
                                                <form class="form-inline  " method="get">
                                                    <div class="form-group" id="withdraw-form">
                                                        <select required="" id="withdraw-method" nam="withdraw-method" class="form-control">
                                                            <option value="paypal">PayPal</option>
                                                            <option value="bank">Bank Transfer</option>
                                                        </select>
                                                    </div>
                                                    
                                                    
                                               </form>
                                                
                                            </div>
                                            <div id="btn-withdraw">
                                                <button type="submit" class="btn btn-lg  btn-solid" id="mc-submit">submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
   
    
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
                            <div class="footer-logo"><img src="../assets/images/icon/logo/18.png" alt="Logo"></div>
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
    <div class="tap-top">
        <div>
            <i class="fa fa-angle-double-up"></i>
        </div>
    </div>
    <!-- tap to top End -->



    <!-- latest jquery-->
    <script src="js/jquery-3.3.1.min.js"></script>

    <!-- menu js-->
    <script src="js/menu.js"></script>

    <!-- lazyload js-->
    <script src="js/lazysizes.min.js"></script>

    <!-- popper js-->
    <script src="js/popper.min.js"></script>

    <!-- slick js-->
    <script src="js/slick.js"></script>

    <!-- dare picker js -->
    <script src="js/date-picker.js"></script>

    <!-- Bootstrap js-->
    <script src="js/bootstrap.js"></script>

    <!-- Sidebar jquery-->
    <script src="js/sidebar-menu.js"></script>

    <!-- Bootstrap Notification js-->
    <script src="js/bootstrap-notify.min.js"></script>

    <!-- Theme js-->
    <script src="js/script.js"></script>

    <script>
        function openSearch() {
            document.getElementById("search-overlay").style.display = "block";
        }

        function closeSearch() {
            document.getElementById("search-overlay").style.display = "none";
        }
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });
        $('#datepicker1').datepicker({
            uiLibrary: 'bootstrap4'
        });

    </script>

</body>

</html>