<?php

if (isset($_GET['delete_users'])) {

    $delete_id = $_GET['delete_users'];

    $delete_user = "Delete from user_table where user_id='$delete_id'";

    $result = mysqli_query($con, $delete_user);

    if ($result) {

        echo "<script>alert('User deleted successfully')</script>";
        echo "<script>window.open('index.php?list_users','_self')</script>";
    }
}
