<?php
include('includes/connect.php');
include('functions/common_functions.php');
session_start();
$quant = 0;
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-commerce website - Cart Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        ul.navbar-nav {
            padding-left: 5px;
        }

        div.row {
            display: flex;
            justify-content: center;
        }

        .cart-img-top {
            width: 80px;
            height: 80px;
            object-fit: contain;
        }

        .button {
            background-color: #3F69AA;
            color: white;
        }

        .button1 {
            background-color: grey;
        }

        .a:hover {
            background-color: none;
        }

        .overflow {
            overflow-x: hidden;
        }
    </style>
</head>

<body>

    <!-- navbar -->
    <?php include('navbar.php'); ?>
    <!-- Calling cart function -->

    <!-- third child -->
    <div class="bg-light">
        <!-- <h3 class="text-center">Store</h3> -->
        <p class="text-center">Welcome to our store</p>
    </div>
    <!-- fourth child   table -->
    <div class="container">
        <div class="row">
            <?php
            cart();
            ?>
        </div>
        <form action="" method="post">
            <table class="table table-bordered text-center">

                <tbody>
                    <!-- php code  to display dynamic data-->
                    <?php
                    global $con;
                    $get_ip_address = getIPAddress();
                    $total_price = 0;
                    $cart_query = "select * from cart_details where ip_address = '$get_ip_address'";
                    $result = mysqli_query($con, $cart_query);
                    $result_count = mysqli_num_rows($result);
                    if ($result_count > 0) {
                        echo "<thead>
                                <tr>
                                    <th>Product Title</th>
                                    <th>Product Image</th>
                                    <th>Quantity</th>
                
                                    <th>Total Price</th>
                                    <th>Remove</th>
                                    <th colspan='2'>Operations</th>
            
                                </tr>
                            </thead>";
                        while ($row = mysqli_fetch_array($result)) {
                            $product_id = $row['product_id'];
                            $select_products = "select * from products where product_id='$product_id'";
                            $result_products = mysqli_query($con, $select_products);

                            while ($row_product_price = mysqli_fetch_assoc($result_products)) {
                                $product_price = array($row_product_price['product_price']);
                                $price_table = $row_product_price['product_price'];
                                $product_title = $row_product_price['product_title'];
                                $product_image1 = $row_product_price['product_image1'];
                                $product_values = array_sum($product_price);
                                $total_price += $product_values;
                                // $row_product_price = mysqli_fetch_assoc($result_products);
                                // $total_price += $row_product_price['product_price'];

                    ?>

                                <tr>
                                    <td><?php echo $product_title ?></td>
                                    <td><img src="./admin_area/product_images/<?php echo $product_image1 ?>" alt="" class="cart-img-top"></td>
                                    <td><input type="text" name="qty" class="form-input w-50">
                                    </td>
                                    <?php
                                    $get_ip_address = getIPAddress();
                                    // $quant = $_POST['qty'];
                                    if (isset($_POST['update_cart'])) {
                                        global $quant;
                                        $quant = $_POST['qty'];
                                        $quantities = $_POST['qty'];
                                        $quant = $quantities;
                                        // echo $quantities;
                                        $update_cart = "update `cart_details` set quantity=$quantities where ip_address='$get_ip_address' and product_id=$product_id";
                                        $result_products_quantity = mysqli_query($con, $update_cart);
                                        $total_price = $total_price * $quantities;
                                    }
                                    ?>

                                    <td><?php echo $price_table . "/-"; ?></td>
                                    <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id; ?>"></td>
                                    <td>
                                        <input type="submit" name="update_cart" value="Update Cart" class="button px-3 py-2 border-0 mx-3">
                                        <!-- <button class="bg-info px-3 py-2 border-0 mx-3">Remove</button> -->
                                        <input type="submit" name="remove_cart" value="Remove Cart" class="button px-3 py-2 border-0 mx-3">
                                    </td>
                                </tr>
                    <?php
                            }
                        }
                    } else {
                        echo "<h2 class='text-center text-danger'> Cart is Empty</h2>";
                    }
                    ?>
                </tbody>
            </table>
            <!-- subtotal -->
            <div class="d-flex mb-5">
                <?php
                $get_ip_address = getIPAddress();
                $cart_query = "select * from cart_details where ip_address = '$get_ip_address'";
                $result = mysqli_query($con, $cart_query);
                $result_count = mysqli_num_rows($result);
                if ($result_count > 0) {
                    echo "<h4 class='px-3'> Subtotal: <strong class='text-info'>$total_price/-</strong></h4>
                <input type='submit' value='Continue Shopping' class='button px-3 py-2 border-0 mx-3' name='continue_shopping'>
                <button class='button1 px-3 py-2 border-0 mx-3'><a class='text-light text-decoration-none' href='./users_area/checkout.php'>Checkout</a></button>";
                } else {
                    echo "<input type='submit' value='Continue Shopping' class='button px-3 py-2 border-0 mx-3' name='continue_shopping'>";
                }
                if (isset($_POST['continue_shopping'])) {
                    echo "<script>window.open('index.php','_self')</script>";
                }
                ?>
            </div>

    </div>
    </form>
    <!-- function to remove item -->
    <?php
    function remove_cart_item()
    {
        global $con;
        if (isset($_POST['remove_cart'])) {
            foreach ($_POST['removeitem'] as $remove_id) {
                echo $remove_id;
                $delete_query = "Delete from cart_details where product_id=$remove_id";
                $run_delete = mysqli_query($con, $delete_query);
                if ($run_delete) {
                    echo "<script>window.open('cart.php','_self')</script>";
                }
            }
        }
    }
    echo $remove_item = remove_cart_item();
    ?>
    <!-- Footer -->
    <?php
    include("includes/footer.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>

</html>