
<?php

    if(isset($_GET['edit_brand']))
    {

        $edit_id=$_GET['edit_brand'];

        // $category_title = $_POST['category_title'];
        $get_brand = "Select * from brands where brand_id=$edit_id";
        $result = mysqli_query($con,$get_brand);
        $row = mysqli_fetch_assoc($result);

        $brand_title=$row['brand_title'];
        
    }

?>
<div class="container" mt-5>
        <h1 class="text-center"> Edit Brand</h1>
<form action="" method="post" class="text-center">
    <div class="input-group w-50 mb-3">
        <span class="input-group-text bg-info" id = "basic-addoni"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name = "brand_title" value="<?php echo $brand_title?>" aria-label="categories" aria-describedby="basic-addoni" required="required">

    </div>

    <div class="input-group w-10 mb-2 m-auto">
        
        <input type="submit" class="bg-info border-0 p-2 my-3" name = "edit_bnd" value="Update Brand">

        
    </div>
</form>

<?php
 if(isset($_POST['edit_bnd']))
 {

     $brand_title = $_POST['brand_title'];
     $update_query = "update brands set brand_title='$brand_title' where brand_id=$edit_id";
     $result_bnd = mysqli_query($con,$update_query);
    
    if($result_bnd)
    {
        echo "<script>alert('Brand is been updated successfully')</script>";
        echo "<script>window.open('./index.php?view_brands','_self')</script>";
    }
}
    
?>