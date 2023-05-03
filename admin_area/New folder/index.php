<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
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
        }
    </style>
</head>

<body>

    <!-- navbar -->
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link">Welcome Guest</a>
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
        <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">

            <div class="vache">
                <div class="button text-center">

                    <button><a href="insert_product.php" class="nav-link bg-info p-1">Insert Products</a></button>
                    <button><a href="" class="nav-link bg-info p-1">View Products</a></button>
                    <button><a href="index.php?insert_category" class="nav-link bg-info p-1">Insert Categories</a></button>
                    <button><a href="" class="nav-link bg-info p-1">View Categories</a></button>
                    <button><a href="index.php?insert_brand" class="nav-link bg-info p-1">Insert Brands</a></button>
                    <button><a href="" class="nav-link bg-info p-1">View Brands</a></button>
                    <button><a href="" class="nav-link bg-info p-1">All Orders</a></button>
                    <button><a href="" class="nav-link bg-info p-1">All Payments</a></button>
                    <button><a href="" class="nav-link bg-info p-1">List Users</a></button>
                    <button><a href="" class="nav-link bg-info p-1">Logout</a></button>

                </div>
            </div>
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
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>