<?php

if (isset($_GET['delete_payments'])) {

    $delete_id = $_GET['delete_payments'];

    $delete_payment = "Delete from user_payments where payment_id='$delete_id'";

    $result = mysqli_query($con, $delete_payment);

    if ($result) {

        echo "<script>alert('Payment deleted successfully')</script>";
        echo "<script>window.open('index.php?list_payments','_self')</script>";
    }
}
