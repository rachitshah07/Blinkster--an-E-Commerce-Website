<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
@session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <style>
        body {
            overflow-x: hidden;
        }
    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">User Login</h2>
        <div class="row d-flex align-items-center justify-content-center mt-5">
            <div class="lg-12 col-xl-6">
                <form method="post">

                    <!-- Username field -->
                    <div class="form-outline mb-4 ">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Enter Your Username" autocomplete="off" required="required" name="user_username">
                    </div>
                    <!-- Email -->
                    <div class="form-outline mb-4">
                        <label for="user_email" class="form-label">Email</label>
                        <input type="email" id="user_email" class="form-control" placeholder="Enter Your Email" autocomplete="off" required="required" name="user_email">
                    </div>
                    <!-- Password -->
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter Your Password" autocomplete="off" required="required" name="user_password">
                    </div>


                    <div class="mt-4 pd-2">
                        <input type="submit" value="Send OTP" class="bg-info py-2 px-3 border-0" name="user_login">
                        <p class="small fw-bold mt-2 pt-1 mb-0"> Don't Have an account ? <a href="user_registration.php" class="text-danger"> Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php
if (isset($_POST['user_login'])) {
    $user_username = $_POST['user_username'];
    $user_password = $_POST['user_password'];
    // echo $user_password;
    $select_query = "Select * from `user_table` where 
    username='$user_username' ";
    $result = mysqli_query($con, $select_query);
    $row_count = mysqli_num_rows($result); //1
    $row_data = mysqli_fetch_assoc($result);
    $user_ip = getIPAddress();
    //cart item
    $select_query_cart = "Select * from `cart_details` where 
    ip_address='$user_ip'";
    $select_cart = mysqli_query($con, $select_query_cart);
    $row_count_cart = mysqli_num_rows($select_cart);
    if ($row_count > 0) {
        $_SESSION['username']  = $user_username;
        if (password_verify($user_password, $row_data['user_password'])) {
            include('send_otp.php');
        } else {
            echo "<script> alert('Invalid Credentials') </script>";
        }
    } else {
        echo "<script> alert('User Does not Exists ') </script>";
    }
}
?>