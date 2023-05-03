<?php
include('includes/connect.php');
include('functions/common_functions.php');
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-commerce website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
    </style>
</head>

<body>
    <!-- navbar -->
    <?php include('navbar.php'); ?>

    <div class="bg-light">
        <!-- <h3 class="text-center">Store</h3> -->
        <p class="text-center">Welcome to our store</p>
    </div>

    <div class="row">
        <div class="col-md-10">
            <div class="row">
                <!-- fetching products dynamically -->
                <?php
                search_product();
                get_unique_categories();
                get_unique_brands();
                ?>
            </div>
        </div>
        <?php include('repeat.php'); ?>
    </div>
    <?php include('./includes/footer.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>