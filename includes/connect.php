<?php

$con = mysqli_connect('localhost', 'root', '', 'mystore');
if (!$con) {
    // echo "Connected";
    die(mysqli_error($con));
}
