<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>E Shop - Bootstrap Ecommerce Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Bootstrap Ecommerce Template" name="keywords">
    <meta content="Bootstrap Ecommerce Template Free Download" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="lib/slick/slick.css" rel="stylesheet">
    <link href="lib/slick/slick-theme.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>
        /* img {
            width: 200px;
            height: 300px;
            object-fit: fit;
        } */
        .header {
            position: relative;
            color: #333333;
        }

        .abc:hover {
            color: white !important;
        }
    </style>
</head>

<body>
    <!-- Top Header Start -->
    <div class="top-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <div class="logo">
                        <a href="">
                            <img src="./logo/1.png" alt="Logo" />
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="search">
                        <form action="search_product.php" method="get">
                            <input type="text" placeholder="Search" name="search_data">
                            <button type="submit" name="search_data_product"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="user">
                        <div class="dropdown">
                            <?php
                            if (isset($_SESSION['username'])) {
                                echo "<a href='../Blinkster/users_area/profile.php'>My Account</a>";
                            }
                            ?>

                            <div class="dropdown-menu">
                                <a href="./users_area/user_login.php" class="dropdown-item">Login</a>
                                <a href="./users_area/user_registration.php" class="dropdown-item">Register</a>
                            </div>
                        </div>
                        <div class="cart">
                            <a href="cart.php"><i class="fa fa-cart-plus"></i></a>
                            <span>(<?php echo cart_item(); ?>)</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Top Header End -->


    <!-- Header Start -->
    <div class="header">
        <div class="container">
            <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                <a href="#" class="navbar-brand">MENU</a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav m-auto">
                        <a href="index.php" class="nav-item nav-link active abc" style="color:black;">Home</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle abc" data-toggle="dropdown" style="color:black;">Pages</a>
                            <div class="dropdown-menu">
                                <!-- <a href="product_details.php" class="dropdown-item">Product</a> -->
                                <a href="display_all.php" class="dropdown-item">Product</a>

                                <!-- <a href="product-detail.html" class="dropdown-item">Product Detail</a> -->
                                <a href="cart.php" class="dropdown-item">Cart</a>
                                <!-- <a href="wishlist.html" class="dropdown-item">Wishlist</a> -->
                                <a href="./users_area/checkout.php" class="dropdown-item">Checkout</a>
                                <a href="./users_area/user_login.php" class="dropdown-item">Login & Register</a>
                                <!-- <a href="./users_area/profile.php" class="dropdown-item">My Account</a> -->
                            </div>
                        </div>
                        <a href="contactus.php" class="nav-item nav-link abc" style="color:black;">Contact Us</a>
                        <!-- <a href=""></a> -->
                        <?php
                        if (!isset($_SESSION['username'])) { //session not active
                            echo "
                <li class='nav-item'>
                <a class='nav-link abc' href='#' style='color:black;'>Welcome Guest</a>
            </li>
                <li class='nav-item'>
                <a class='nav-link abc' href='./users_area/user_login.php' style='color:black;'>Login</a>
            </li>
                ";
                        } else {
                            echo "
                <li class='nav-item'>
                <a class='nav-link abc' href='#' style='color:black;'>Welcome " . $_SESSION['username'] . " </a>
            </li>

                <li class='nav-item'>
                <a class='nav-link abc' href='users_area/logout.php' style='color:black;'>Logout</a>
            </li>
                ";
                        }
                        ?>
                    </div>

                </div>
            </nav>
        </div>
    </div>
    <!-- Header End -->




</body>