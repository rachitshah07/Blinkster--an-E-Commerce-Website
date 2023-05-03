<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
session_start();

if (isset($_SESSION['admin_name'])) {
    echo "<script> window.open('index.php','_self') </script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            overflow: hidden;
        }

        .image_size {
            width: 90%;
            height: 90%;

        }
    </style>
</head>

<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin Login</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-6 col-xl-5">
                <img src="../images/userimage1.jpg" class="image_size" alt="Admin Registration">
            </div>

            <div class="col-lg-6">
                <form action="" method="post" enctype="multipart/form-data">

                    <!-- Username field -->
                    <div class="form-outline mb-4 ">
                        <label for="admin_username" class="form-label">Username</label>
                        <input type="text" id="admin_username" class="form-control" placeholder="Enter Your Username" autocomplete="off" required="required" name="admin_username">
                    </div>

                    <!-- Password -->
                    <div class="form-outline mb-4">
                        <label for="admin_password" class="form-label">Password</label>
                        <input type="password" id="admin_password" class="form-control" placeholder="Enter Your Password" autocomplete="off" required="required" name="admin_password">
                    </div>





                    <div class="mt-4 pd-2">
                        <input type="submit" value="Login" class="bg-info py-2 px-3 border-0" name="admin_login">
                        <p class="small fw-bold mt-2 pt-1 mb-0"> Don't you have an account ? <a href="admin_registration.php" class="text-danger"> Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>


<?php

if (isset($_POST['admin_login'])) {
    $admin_username = $_POST['admin_username'];
    $admin_password = $_POST['admin_password'];
    // echo $user_password;
    $select_query = "Select * from `admin_table` where 
    admin_name='$admin_username' ";
    $result = mysqli_query($con, $select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);

    if ($row_count > 0) {
        $_SESSION['admin_name']  = $admin_username;
        if (password_verify($admin_password, $row_data['admin_password'])) {
            // echo "<script> alert('Login Successful') </script>";
            echo "<script> alert('Login Successful') </script>";
            echo "<script> window.open('index.php','_self') </script>";
        } else {
            echo "<script> alert('Invalid Credentials') </script>";
        }
    } else {
        echo "<script> alert('User Does not Exists ') </script>";
    }
}
?>