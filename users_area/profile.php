<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome <?php echo $_SESSION['username'];  ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../style.css">
    <style>
        ul.navbar-nav {
            padding-left: 5px;
        }

        div.row {
            display: flex;
            justify-content: center;
        }

        .card-img-top {
            width: 100%;
            height: 200px;
            object-fit: contain;
        }

        .profile_img {
            width: 90%;
            margin: auto;
            display: block;
            /* height: 100%; */
            object-fit: contain;
        }

        .mynavbar {
            background-image: url('../images/navbar.jpg');
            height: 70px;
        }

        .navbar {
            background-color: transparent !important;
        }

        .navbar-brand {
            color: #FFF;
            font-weight: bolder;
            font-size: 1.3em;
        }

        .navbar.navbar-nav {
            margin: 0 auto;

        }

        .navbar.nav-item a {
            color: #FFF !important;
        }

        .nav-item {
            background-color: #3F69AA;
        }

        h4 {
            background-color: white;
            color: #3F69AA;
            border-radius: 400px;
            width: 80%;
            /*
            align-items: center;
            justify-content: center;
            display: flex; */
        }

        .a123 {
            color: #3F69AA;
        }
    </style>
</head>

<body>
    <!-- navbar -->
    <div class="mynavbar">
        <?php include('navbar.php'); ?>
    </div>
    <!-- Calling cart function -->
    <?php
    cart();
    ?>


    <br><br><br>

    <!-- Main code for PROFILE -->
    <div class="row">
        <div class="col-md-2 p-0">
            <ul class="navbar-nav bg-secondary text-center">
                <li class="nav-item a123"> acax</li>
                <li class="nav-item ">

                    <!-- <a href="#" class="nav-link text-light"> -->
                    <center>
                        <h4>Your Profile</h4>
                    </center>

                    <!-- </a>/ -->
                </li>
                <?php
                $username = $_SESSION['username'];
                $user_image = "select * from `user_table` where username ='$username'";
                $user_image = mysqli_query($con, $user_image);
                $row_image = mysqli_fetch_array($user_image);
                $user_image = $row_image['user_image'];
                echo "<li class='nav-item'>
                <img src='./user_images/$user_image' class='profile_img my-4'>
                </a>
            </li>";
                ?>
                <li class="nav-item">
                    <a href="profile.php" class="nav-link text-light">
                        Pending Orders
                    </a>
                </li>
                <li class="nav-item">
                    <a href="profile.php?edit_account" class="nav-link text-light">
                        Edit Account
                    </a>
                </li>
                <li class="nav-item">
                    <a href="profile.php?my_orders" class="nav-link text-light">
                        My orders
                    </a>
                </li>

                <li class="nav-item">
                    <a href="profile.php?delete_account" class="nav-link text-light">
                        Delete Account
                    </a>
                </li>

                <li class="nav-item">
                    <a href="logout.php" class="nav-link text-light">
                        Logout
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-md-10">
            <?php
            get_user_order_details();
            if (isset($_GET['edit_account'])) {
                include('edit_account.php');
            }
            if (isset($_GET['my_orders'])) {
                include('user_orders.php');
            }
            if (isset($_GET['delete_account'])) {
                include('delete_account.php');
            }
            ?>
        </div>
    </div>

    <!-- Footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>