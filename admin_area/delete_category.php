<?php

if(isset($_GET['delete_category'])){

    $delete_id=$_GET['delete_category'];

    $delete_category="Delete from categories where category_id=$delete_id";

    $result=mysqli_query($con,$delete_category);

    if($result){

        echo "<script>alert('Category deleted successfully')</script>";
                echo "<script>window.open('./index.php?view_categories','_self')</script>";
    }
}

?>