<?php

include('../includes/connect.php');

if (isset($_POST['insert_brand'])) {
    $brand_title = $_POST['brand_title'];
    $select_query = "select * from brands where brand_title='$brand_title'";
    $result_select = mysqli_query($con, $select_query);
    $number = mysqli_num_rows($result_select);
    if ($number > 0) {
        echo "<script>alert('This brand is already present')</script>";
    } else {
        $insert_query = "insert into brands (brand_title) values ('$brand_title')";
        $result = mysqli_query($con, $insert_query);
        if ($result) {
            echo "<script>alert('Brand has been added successfully')</script>";
        }
    }
}

?>

<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-3">
        <span class="input-group-text bg-info" id="basic-addoni"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="brand_title" placeholder="Insert Brands" aria-label="brands" aria-describedby="basic-addoni">

    </div>

    <div class="input-group w-10 mb-2 m-auto">

        <input type="submit" class="bg-info border-0 p-2 my-3" name="insert_brand" value="Insert Brands">

    </div>
</form>