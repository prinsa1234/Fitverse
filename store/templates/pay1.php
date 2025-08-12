<?php 
error_reporting(0);
session_start();
echo $_SESSION['eml'];
if($_SESSION['eml']){
$f = $_SESSION['fname'];
$l=$_SESSION['lname'];
$em = $_SESSION['eml'];

}
else{
    header("Location: login.php");
    exit();
}
include("connect.php");

$q = "SELECT * FROM duplicart WHERE email=''";
$dat = mysqli_query($conn, $q);

if (!$dat) {
    echo "Error: " . mysqli_error($conn);
} else {
    echo "Query executed successfully";
}

$reg = "SELECT * FROM register WHERE emll = '$em'";
$regdata = mysqli_query($conn, $reg);
$regassoc = mysqli_fetch_assoc($regdata);
$fn = $regassoc['first'];
$ln = $regassoc['last'];


if($_POST['save']){
    header("location:placed.php");
}
?>


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
                        <h2>Contact Us</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->
    <div class="col-lg-9">
       <div class="dashboard-right">
         <div class="dashboard">
           <div class="row">
             <div class="col-12">
               <div class="card mt-0">
                  <div class="card-body">
                      <div class="dashboard-box">
                       <div class="dashboard-title">
                          <h4>Check out</h4>
                            </div>
                              <div data-brackets-id="15599" class="tab-pane fade active show" id="account" role="tabpanel" aria-labelledby="account-tab">
                            <form class="needs-validation user-add" novalidate="" method = "POST">
                                    <div class="form-group row">
                                        <label for="validationCustom0" class="col-xl-3 col-md-4">Name</label>
                                        <input class="form-control col-xl-8 col-md-7" id="validationCustom0" type="text" name="name" required="" placeholder="Your Name" value="<?php echo $fn;echo  $ln ?>" >
                                    </div>
                                    <div class="form-group row">
                                        <label for="validationCustom1" class="col-xl-3 col-md-4">Email</label>
                                        <input class="form-control col-xl-8 col-md-7" id="validationCustom1" type="email" name="email" required="" placeholder="Your Email" value="<?php echo $em; ?>">
                                    </div>
                                    <div class="form-group row">
                                        <label for="validationCustom2" class="col-xl-3 col-md-4">Phone</label>
                                        <input class="form-control col-xl-8 col-md-7" id="validationCustom2" type="tel" name="phone" required="" placeholder="Your Phone Number">
                                    </div>
                                    <div class="form-group row">
                                        <label for="validationCustom3" class="col-xl-3 col-md-4">Country</label>
                                        <input class="form-control col-xl-8 col-md-7" id="validationCustom3" type="text" name="country" required="" placeholder="country">
                                    </div>
                                    <div class="form-group row">
                                        <label for="validationCustom3" class="col-xl-3 col-md-4">State</label>
                                        <input class="form-control col-xl-8 col-md-7" id="validationCustom3" type="text" name="state" required="" placeholder="State">
                                    </div>
                                    <div class="form-group row">
                                        <label for="validationCustom3" class="col-xl-3 col-md-4">Address</label>
                                        <input class="form-control col-xl-8 col-md-7" id="validationCustom3" type="text" name="address" required="" placeholder="Address">
                                    </div>
                                    <section class="cart-section section-b-space">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table class="table cart-table table-responsive-xs">
                                                    <thead>
                                                        <tr class="table-head">
                                                            <th scope="col">image</th>
                                                            <th scope="col">product name</th>
                                                            <th scope="col">price</th>
                                                            <th scope="col">action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            while ($res2 = mysqli_fetch_assoc($dat)) {
                                                                echo '<tr data-id="' . $res2['ID'] . '">
                                                                    <td>
                                                                        <a href="#"><img src="' . $res2['image'] . '" alt=""></a>
                                                                    </td>
                                                                    <td><a href="#">' . $res2['title'] . '</a>
                                                                        <div class="mobile-cart-content row">
                                                                            <div class="col-xs-3">
                                                                                <div class="qty-box">
                                                                                    <div class="input-group">
                                                                                        <input type="text" name="quantity" class="form-control input-number" value="1">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xs-3">
                                                                                <h2 class="td-color">' . $res2['price'] . '</h2>
                                                                            </div>
                                                                            <div class="col-xs-3">
                                                                                <h2 class="td-color"><a href="deletecart.php?title=' . $res2['title'] . '&id=' . $res2['ID'] . '" class="icon"><i class="fa fa-close"></i></a></h2>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <h2>' . $res2['price'] . '</h2>
                                                                    </td>
                                                                    <td><a href="#" class="icon" onclick="removeItem(' . $res2['ID'] . ',' . $res2['price'] . ')">
                                                                            <i class="fa fa-close"></i>
                                                                        </a></td>
                                                                </tr>';
                                                                $totalprice += $res2['price'];
                                                                $titles[] = $res2['title'];
                                                            };
                                                            ?>
                                                            </tbody>
                                                            </table> <!-- Close the first table here -->
                                                            <table class="table cart-table table-responsive-md">
                                                                <tfoot>
                                                                    <tr>
                                                                        <td>total price :</td>
                                                                        <td>
                                                                            <h2 id="totalPrice"><?php echo '$' . $totalprice; ?></h2>
                                                                        </td>
                                                                    </tr>
                                                                </tfoot>
                                                            </table> <!-- Close the first table here -->
                                                
                                            </div>
                                    </div></div></section>
                                    <div class="form-group row">
                                        <div class="col-xl-3 col-md-4"></div>
                                        <div class="col-xl-8 col-md-7">
                                           <div id="btn-withdraw">
                                             <input type="submit"  name="save" class="btn btn-lg  btn-solid" id="mc-submit" value="Check Out"  onclick="location.href='placed.php' ;"></input>
                                                                            </div>
                                        </div>
                                    </div>
                                </form>

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
    </script>
    <script>
function removeItem(id, price) {
    var removedItems = [];
    var rowToRemove = document.querySelector('tr[data-id="' + id + '"]');
    var totalPriceElement = document.getElementById('totalPrice');

    if (rowToRemove) {
        rowToRemove.remove(); // Remove the row from the DOM
        removedItems.push({ id: id }); // Store removed item details
        var currentTotalPrice = parseFloat(totalPriceElement.innerText.replace('$', ''));
        var updatedTotalPrice = currentTotalPrice - parseFloat(price);
        totalPriceElement.innerText = '$' + updatedTotalPrice.toFixed(2); // Update total price
    }
}
</script>


</body>

</html>
<?php 

$q = "SELECT * FROM duplicart WHERE email=''";
$dat = mysqli_query($conn, $q);
$asres = mysqli_fetch_assoc($dat);
$a = $asres['image'];
$b = $asres['title'];
$c = $asres['price'];
$e = $_SESSION['eml'];
if(isset($_POST['save'])) {
    $total = $totalprice;

    // Loop through the stored titles and insert each one into the database
    foreach ($titles as $title) {
        $query = "INSERT INTO orders(total, product) VALUES('$total', '$title')";
        $data = mysqli_query($conn, $query);
        if ($data) {
            echo "Success";


            $qu = "DELETE FROM duplicart Where Title='$title' && email = ''";
            $du = mysqli_query($conn,$qu);
            if($du){
                echo "success";
                header("location:placed.php");
            }
            else{
                echo "try";
            }

            
        } else {
            echo "Unsuccessful";
        }
    }
}
?>