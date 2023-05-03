<?php

if (isset($_GET['delete_orders'])) {

    $delete_id = $_GET['delete_orders'];

    $delete_order = "Delete from user_orders where order_id='$delete_id'";

    $result = mysqli_query($con, $delete_order);

    if ($result) {

        echo "<script>alert('Order deleted successfully')</script>";
        echo "<script>window.open('index.php?list_orders','_self')</script>";
    }
}
