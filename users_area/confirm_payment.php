<?php
include('../includes/connect.php');
session_start();

if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    echo $order_id;
    $select = "select * from user_orders where order_id=$order_id";
    $result = mysqli_query($con, $select);
    $row = mysqli_fetch_assoc($result);
    $invoice = $row['invoice_number'];
    $amount = $row['amount_due'];
}

if (isset($_POST['confirm_payment'])) {
    $invoice_number = $_POST['invoice_number'];
    $amount = $_POST['amount'];
    $payment_mode = $_POST['payment_mode'];
    $insert_query = "insert into user_payments (order_id,invoice_number,amount,payment_mode) values ($order_id,$invoice_number,$amount,'$payment_mode')";
    $result = mysqli_query($con, $insert_query);
    if ($result) {
        echo "<h3 class='text-xcenter text-light'>Payment Successful</h3>";
        echo "<script>window.open('profile.php?my_orders','_self')</script>";
    }
    $update_orders = "update user_orders set order_status='Complete' where order_id=$order_id";
    $result_orders = mysqli_query($con, $update_orders);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <title>Document</title>
</head>

<body class='bg-secondary'>
    <h1 class="text-center text-light">Confirm Payment</h1>
    <div class="container my-5">
        <form action="" method='post'>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="text" class="form-control w-50 m-auto" name="invoice_number" value="<?php echo $invoice ?>">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto text-light">
                Amount
                <input type="text" class="form-control w-50 m-auto" name="amount" value="<?php echo $amount ?>">
            </div>
            <div class=" form-outline my-4 text-center w-50 m-auto">
                <select name="payment_mode" class="form-select w-50 m-auto">
                    <option>Select payment Mode</option>
                    <option>UPI</option>
                    <option>Cash on Delivery</option>
                    <option>Net banking</option>
                    <option>Coupons</option>
                </select>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto text-light">
                <input type="submit" class="bg-info py-2 px-3 border-0" value='Confirm' name="confirm_payment">
            </div>
        </form>
    </div>

</body>

</html>