<?php
// include('./functions/common_functions.php');
// include('./includes/connect.php');
?>
<html>

<head>
    <link rel="stylesheet" href="style.css">
</head>
<div class="mynavbar">

    <nav class="navbar navbar-expand-lg bg-info">
        <div class="container-fluid">
            <!-- <p class="navbar-brand">Blinkster</p> -->
            <img src="./logo/logo-black-on-transparent-background.png" alt="" width="350px" height="53px">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="display_all.php">Product</a>
                    </li>
                    <?php
                    if (isset($_SESSION['username'])) {
                        echo "<li class='nav-item'>
                    <a class='nav-link' href='./users_area/profile.php'>My Account</a>
                </li>";
                    } else {
                        echo "<li class='nav-item'>
                    <a class='nav-link' href='./users_area/user_registration.php'>Register</a>
                </li>";
                    }
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php"><i class="fa-sharp fa-solid fa-cart-shopping"></i><sup><?php echo cart_item(); ?></sup></a>
                    </li>
                    <li class='nav-item'>
                        <a href="#" class="nav-link">Total Price: <?php total_cart_price(); ?>/- </a>
                    </li>
                    <form class="d-flex" role="search" action="search_product.php" method="get">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                        <input type="submit" value="Search" class="btn btn-outline-success my-2 my-sm-0" name="search_data_product">
                    </form>

            </div>
        </div>
    </nav>

</div>

</html>

<!-- form-control me-2 -->
<!-- btn btn-outline-light -->