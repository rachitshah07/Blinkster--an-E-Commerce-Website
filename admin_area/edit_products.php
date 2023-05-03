<?php
if (isset($_GET['edit_products'])) {
    $edit_id = $_GET['edit_products'];
    //echo $edit_id;

    $get_data = "Select * from products where product_id=$edit_id";
    $result = mysqli_query($con, $get_data);
    $row = mysqli_fetch_assoc($result);

    $product_title = $row['product_title'];
    // echo $product_title;
    $product_description = $row['product_description'];
    $product_keywords = $row['product_keywords'];
    $category_id = $row['category_id'];
    $brand_id = $row['brand_id'];
    $product_image1 = $row['product_image1'];
    $product_image2 = $row['product_image2'];
    $product_image3 = $row['product_image3'];
    $product_price = $row['product_price'];
    // echo $brand_id;
    // echo "<br>";
    // echo $category_id;
    //fetching category name

    $select_cat = "Select * from categories where category_id=$category_id";
    $result_cat = mysqli_query($con, $select_cat);
    $row_cat = mysqli_fetch_assoc($result_cat);
    // echo $row_cat['category_title'];

    // $category_title = $row_cat['category_title'];
    // echo $category_title;
    //fetching brand name

    $select_brand = "Select * from brands where brand_id=$brand_id";

    $result_brand = mysqli_query($con, $select_brand);
    $row_brand = mysqli_fetch_assoc($result_brand);
    // $brand_id = $row_brand['brand_id'];
    // echo $brand_id;
    // echo $row_brand['brand_id'];
    // echo $row_cat['brand_title'];

    $brand_title = $row_brand['brand_title'];
    // echo $brand_title;
}
?>


<div class="container" mt-5>
    <h1 class="text-center"> Edit Product</h1>
    <!-- Form -->
    <!-- Sensitive data so POST -->
    <!-- enctype to insert IMAGES    -->
    <!-- We are going to enter the data which is not related to text -->
    <!-- autocomplete "off" not to give suggestions -->
    <form action="" method="post" enctype="multipart/form-data">
        <!-- Title -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_title" class="form-label">
                Product title
            </label>
            <input type="text" name="product_title" id="product_title" class="form-control" value="<?php echo $product_title; ?>" required="required">
        </div>
        <!-- description -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_description" class="form-label">
                Product Description
            </label>
            <input type="text" name="product_description" id="product_description" class="form-control" value="<?php echo $product_description; ?>" required="required">
        </div>

        <!-- keywords -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_keywords" class="form-label">
                Product Keywords
            </label>
            <input type="text" name="product_keywords" id="product_keywords" class="form-control" value="<?php echo $product_keywords; ?>" required="required">
        </div>

        <!-- categories -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_category" class="form-label">Product Categories</label>
            <select name="product_category" id="" class="form-select">
                <option value="<?php echo $category_title; ?>"><?php echo $category_title; ?></option>
                <?php
                $select_query = "Select * from `categories`";
                $result_query = mysqli_query($con, $select_query);
                while ($row = mysqli_fetch_assoc($result_query)) {
                    $category_title = $row['category_title'];
                    $category_id = $row['category_id'];
                    echo "<option value='$category_id'>$category_title</option>";
                }

                ?>
            </select>
        </div>
        <!-- Brands -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_brand" class="form-label">Product Brands</label>
            <select name="product_brand" id="" class="form-select">
                <option value="<?php echo $brand_title; ?>"><?php echo $brand_title; ?></option>
                <?php
                $select_query = "Select * from `brands`";
                $result_query = mysqli_query($con, $select_query);
                while ($row = mysqli_fetch_assoc($result_query)) {
                    $brand_title = $row['brand_title'];
                    $brand_id = $row['brand_id'];
                    echo "<option value='$brand_id'>$brand_title</option>";
                }

                ?>
            </select>
        </div>

        <!-- Image 1  -->

        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_image1" class="form-label">
                Product Image 1
            </label>
            <div class="d-flex">
                <input type="file" name="product_image1" id="product_image1" class="form-control w-90 m-auto" required="required">
                <img src="./product_images/<?php echo $product_image1; ?>" alt="" class="cart_img">
            </div>
        </div>
        <!-- Image 2  -->

        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_image2" class="form-label">
                Product Image 2
            </label>
            <div class="d-flex">
                <input type="file" name="product_image2" id="product_image2" class="form-control w-90 m-auto" required="required">
                <img src="./product_images/<?php echo $product_image2; ?>" alt="" class="cart_img">
            </div>
        </div>
        <!-- Image 3  -->

        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_image3" class="form-label">
                Product Image 3
            </label>
            <div class="d-flex">
                <input type="file" name="product_image3" id="product_image3" class="form-control w-90 m-auto" required="required">
                <img src="./product_images/<?php echo $product_image3; ?>" alt="" class="cart_img">
            </div>
        </div>

        <!-- Product Price -->

        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_price" class="form-label">
                Product Price
            </label>
            <input type="text" name="product_price" id="product_price" class="form-control" value="<?php echo $product_price; ?>/-" required="required">
        </div>

        <div class="form-outline mb-4 w-50 m-auto">
            <input type="submit" name="edit_product" class="btn btn-info mb-3 px-3" value="Update Product">
        </div>
    </form>
</div>


<!-- editing  products -->

<?php

if (isset($_POST['edit_product'])) {


    $product_title = $_POST['product_title'];
    $product_description = $_POST['product_description'];
    $product_keywords = $_POST['product_keywords'];
    $product_category = $_POST['product_category'];
    $product_brand = $_POST['product_brand'];
    $product_price = $_POST['product_price'];

    //original
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];

    //temp
    $temp_image2 = $_FILES['product_image2']['temp_name'];
    $temp_image3 = $_FILES['product_image3']['temp_name'];
    $temp_image1 = $_FILES['product_image1']['temp_name'];

    //checking for field empty or not
    if (empty($product_title) || empty($product_description) || empty($product_keywords) || empty($product_category) || empty($product_brand) || empty($product_price) || empty($product_image1) || empty($product_image2) || empty($product_image3)) {
        //aa alert print nathi thatu
        //left to solve this
        echo "<script>alert('Please fill all the fields and continue the process')</script>";
        exit();
    } else {
        move_uploaded_file($temp_image1, "../admin_area/product_images/$product_image1");
        move_uploaded_file($temp_image2, "../admin_area/product_images/$product_image2");
        move_uploaded_file($temp_image3, "../admin_area/product_images/$product_image3");


        //query to update product

        $update_product = "update products set product_title='$product_title', product_description='$product_description',product_keywords='$product_keywords',category_id='$product_category',brand_id='$product_brand',product_image1='$product_image1',product_image2='$product_image2',product_image3='$product_image3',product_price='$product_price', date=NOW() where product_id=$edit_id";


        $result_update = mysqli_query($con, $update_product);


        if ($result_update) {
            echo "<script>alert('Product updated successfully')</script>";
            echo "<script>window.open('./insert_product.php','_self')</script>";
        }
    }
}
?>