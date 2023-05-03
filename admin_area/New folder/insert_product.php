<?php
include('../includes/connect.php');

if (isset($_POST['insert_product'])) {
    $product_title = $_POST['product_title'];
    $product_description = $_POST['description'];
    $product_keywords = $_POST['product_keywords'];
    $product_category = $_POST['product_category'];
    $product_brands = $_POST['product_brand'];
    $product_price = $_POST['product_price'];
    $product_status = 'true';
    //accessing images
    $product_image1 =  $_FILES['product_image1']['name'];
    $product_image2 =  $_FILES['product_image2']['name'];
    $product_image3 =  $_FILES['product_image3']['name'];

    //accessing image temp name
    $temp_image1 =  $_FILES['product_image1']['tmp_name'];
    $temp_image2 =  $_FILES['product_image2']['tmp_name'];
    $temp_image3 =  $_FILES['product_image3']['tmp_name'];

    //checking empty condition

    if (
        empty($product_title) || empty($product_description) || empty($product_category) or empty($product_description)
        or empty($product_keywords) or empty($product_brands) or empty($product_image1) or empty($product_image2) or empty($product_image3)
    ) {
        echo "<script> alert('Please fill all the available fields') </script>";
        exit();
    } else {
        move_uploaded_file($temp_image1, "./product_images/$product_image1");
        move_uploaded_file($temp_image2, "./product_images/$product_image2");
        move_uploaded_file($temp_image3, "./product_images/$product_image3");

        //insert query

        $insert_products = "insert into `products` (product_title,product_description,product_keywords,category_id,
        brand_id,product_image1,product_image2,product_image3,product_price,date,status) 
        values ('$product_title','$product_description','$product_keywords','$product_category','$product_brands','$product_image1','$product_image2','$product_image3','$product_price',NOW(),'$product_status')";
        $result_query = mysqli_query($con, $insert_products);

        if ($result_query) {
            // echo "True";
            echo "<script> alert('Successfully inserted the products')</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products-Admin Dashboard</title>
    <!-- Bootstrap CSS Link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

    <!-- Font Awesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style.css">
    <script src="https://kit.fontawesome.com/577845f6a5.js" crossorigin="anonymous">
    </script>

    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js">
    </script>
</head>

<body class='bg-light'>
    <!-- Bootstrap JS link  -->
    <div class="container" mt-3>
        <h1 class="text-center"> Insert Products</h1>
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
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter Product Title" autocomplete="off" required="required">
            </div>
            <!-- description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label">
                    Product Description
                </label>
                <input type="text" name="description" id="description" class="form-control" placeholder="Enter Product Description" autocomplete="off" required="required">
            </div>

            <!-- keywords -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keywords" class="form-label">
                    Product Keywords
                </label>
                <input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="Enter Product keywords" autocomplete="off" required="required">
            </div>

            <!-- categories -->
            <div class="form-outline mb-4 w-50 m-auto">
                <br>
                <select name="product_category" id="" class="custom-select" style="width:300px;">
                    <option value="">Select a Category</option>
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
                <br>
                <select name="product_brand" id="" class="custom-select" style="width:300px;">
                    <option value="">Select a brand</option>
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
            <br>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">
                    Product Image 1
                </label>
                <input type="file" name="product_image1" id="product_image1" class="form-control" required="required">
            </div>
            <!-- Image 2  -->
            <br>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label">
                    Product Image 2
                </label>
                <input type="file" name="product_image2" id="product_image2" class="form-control" required="required">
            </div>
            <!-- Image 3  -->
            <br>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-label">
                    Product Image 3
                </label>
                <input type="file" name="product_image3" id="product_image3" class="form-control" required="required">
            </div>

            <!-- Product Price -->
            <br>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">
                    Product Price
                </label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter Product Price" autocomplete="off" required="required">
            </div>
            <br>
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert Product">
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

</body>

</html>
<?php

?>