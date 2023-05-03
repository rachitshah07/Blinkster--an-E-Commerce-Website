<?php

session_start();
session_unset();
session_destroy();

//redirected to Homepage
echo "<script>window.open('index.php','_self'); </script>";
