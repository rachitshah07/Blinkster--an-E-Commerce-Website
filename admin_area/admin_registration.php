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
    <title>Admin Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body{
            overflow:hidden;
        }
        .image_size{
            width:90%;
            height:90%;

        }
        </style>
</head>

<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">New Admin Registration</h2>
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
                    <!-- Email -->
                    <div class="form-outline mb-4">
                        <label for="admin_email" class="form-label">Email</label>
                        <input type="email" id="admin_email" class="form-control" placeholder="Enter Your Email" autocomplete="off" required="required" name="admin_email">
                    </div>


                    <!-- Password -->
                    <div class="form-outline mb-4">
                        <label for="admin_password" class="form-label">Password</label>
                        <input type="password" id="admin_password" class="form-control" placeholder="Enter Your Password" autocomplete="off" required="required" name="admin_password">
                    </div>


                    <!-- Confirm Password -->
                    <div class="form-outline mb-4">
                        <label for="conf_admin_password" class="form-label">Confirm Password</label>
                        <input type="password" id="conf_admin_password" class="form-control" placeholder="Confirm Password" autocomplete="off" required="required" name="conf_admin_password">
                    </div>


                    <div class="mt-4 pd-2">
                        <input type="submit" value="Register" class="bg-info py-2 px-3 border-0" name="admin_register">
                        <p class="small fw-bold mt-2 pt-1 mb-0"> Already Have an account ? <a href="admin_login.php" class="text-danger"> Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>


<?php

if (isset($_POST['admin_register'])) {
    $admin_username = $_POST['admin_username'];
    $admin_email = $_POST['admin_email'];
    $admin_password = $_POST['admin_password'];
    //password Hashing
    $hash_password = password_hash($admin_password, PASSWORD_DEFAULT);
    $conf_admin_password = $_POST['conf_admin_password'];




    if(!preg_match("/[a-zA-Z0-9 ]$",$admin_username)){

    }

    // select query
    $select_query = "Select * from `admin_table` where admin_name= '$admin_username' or admin_email='$admin_email'";
    $result = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($result);
    if ($rows_count > 0) {
        echo "<script>
        alert('Username or Email  already exists.');
        </script>";
    } else if ($admin_password != $conf_admin_password) {
        echo "<script>
        alert('Password and Confirm Password must be same.');
        </script>";
    } else {
        //insert query
        $insert_query = "insert into `admin_table` (admin_name,admin_email,admin_password) 
    values ('$admin_username','$admin_email ','$hash_password')";

        $sql_execute = mysqli_query($con, $insert_query);
        if ($sql_execute) {
            // echo "123";
            echo "<script>
        alert('Data inserted successfully');
        </script>";
        echo "<script> window.open('admin_login.php','_self') </script>";
        } else {
            die(mysqli_error($con));
        }
    }


   
}
?>
