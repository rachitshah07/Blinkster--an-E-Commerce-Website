<?php
//include('../functions/common_functions.php');
include('../includes/connect.php');
include('../functions/common_functions.php');
session_start();
if (!isset($_SESSION['admin_name'])) {
    echo "<script> window.open('admin_login.php','_self') </script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../style.css">

    <style>
        div.vache {
            display: flex;
            justify-content: center;
            margin-right: auto;

        }

        .button {
            background-color: #3F69AA;
            color: white;
        }

        .top-header .logo {
            text-align: left;
            overflow: hidden;
        }

        .top-header .logo a img {
            max-height: 50px;
        }
    </style>
</head>

<body>

    <!-- navbar -->
    <div class="top-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <div class="logo">
                        <a href="">
                            <!-- <img src="../logo/1.png" alt="Logo" /> -->
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <?php
                            if (!isset($_SESSION['admin_name'])) { //session not active
                                echo "
                <li class='nav-item'>
                <a class='nav-link' href='#'>Welcome Guest</a>
            </li>
                <li class='nav-item'>
                <a class='nav-link' href='admin_login.php'>Login</a>
            </li>
                ";
                            } else {
                                echo "
                <li class='nav-item'>
                <a class='nav-link' href='#'>Welcome " . $_SESSION['admin_name'] . " </a>
            </li>

                <li class='nav-item'>
                <a class='nav-link' href='logout.php'>Logout</a>
            </li>
                ";
                            }
                            ?>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
    </div>

    <!-- second child -->
    <div class="bg-light">
        <h3 class="text-center p-2">Manage Details</h3>
    </div>

    <div class="row p-5">
        <div class="col-md-12 bg-secondary p-2 d-flex">
            <center>
                <div class="vache">
                    <div class="button text-center">

                        <button><a href="insert_product.php" class="button nav-link p-1 ">Insert Products</a></button>
                        <button><a href="index.php?view_products" class="button nav-link p-1">View Products</a></button>
                        <button><a href="index.php?insert_category" class="button nav-link  p-1">Insert Categories</a></button>
                        <button><a href="index.php?view_categories" class="button nav-link  p-1">View Categories</a></button>
                        <button><a href="index.php?insert_brand" class="nav-link button p-1">Insert Brands</a></button>
                        <button><a href="index.php?view_brands" class="nav-link button p-1">View Brands</a></button>
                        <button><a href="index.php?list_orders" class="nav-link button p-1">All Orders</a></button>
                        <button><a href="index.php?list_payments" class="nav-link button p-1">All Payments</a></button>
                        <button><a href="index.php?list_users" class="nav-link button p-1">List Users</a></button>


                    </div>
                </div>
            </center>
        </div>
    </div>


    <div class="container my-5">
        <?php

        if (isset($_GET['insert_category'])) {
            include('insert_categories.php');
        }

        if (isset($_GET['insert_brand'])) {
            include('insert_brands.php');
        }

        if (isset($_GET['view_products'])) {
            include('view_products.php');
        }

        if (isset($_GET['edit_products'])) {
            include('edit_products.php');
        }
        if (isset($_GET['delete_product'])) {
            include('delete_product.php');
        }
        if (isset($_GET['view_categories'])) {
            include('view_categories.php');
        }

        if (isset($_GET['view_brands'])) {
            include('view_brands.php');
        }

        if (isset($_GET['edit_category'])) {
            include('edit_category.php');
        }

        if (isset($_GET['edit_brand'])) {
            include('edit_brand.php');
        }
        if (isset($_GET['delete_category'])) {
            include('delete_category.php');
        }
        if (isset($_GET['delete_brand'])) {
            include('delete_brand.php');
        }

        if (isset($_GET['list_orders'])) {
            include('list_orders.php');
        }


        if (isset($_GET['list_payments'])) {
            include('list_payments.php');
        }

        if (isset($_GET['list_users'])) {
            include('list_users.php');
        }
        if (isset($_GET['delete_orders'])) {
            include('delete_orders.php');
        }
        if (isset($_GET['delete_payments'])) {
            include('delete_payments.php');
        }
        if (isset($_GET['delete_users'])) {
            include('delete_users.php');
        }
        ?>
    </div>
    <!-- Footer -->

    <!-- bootstrap links -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>