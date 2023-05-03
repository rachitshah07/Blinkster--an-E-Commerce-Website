<?php
include('../includes/connect.php');

if (isset($_POST['sub_otp'])) {
    $_otp = $_POST['otp'];
    $query = "select * from `user_table` where otp=$_otp";
    // $sql = mysqli_fetch_assoc($query);
    $result_query = mysqli_query($con, $query);
    $run = mysqli_fetch_assoc($result_query);
    $verify_otp = $run['otp'];
    // echo "TRUE";
    if ($_otp == $verify_otp) {
        // echo "TRUE";
        echo  "<script> alert('User Verified'); </script> ";
        echo "<script> window.open('../index.php','_self'); </script>";
    } else {
        echo  "<script> alert('OTP entered was incorret.'); </script> ";
        echo "<script> window.open('user_login.php','_self'); </script>";
    }
}
