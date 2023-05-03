
<?php

    if(isset($_GET['edit_category']))
    {

        $edit_id=$_GET['edit_category'];

        // $category_title = $_POST['category_title'];
        $get_category = "Select * from categories where category_id=$edit_id";
        $result = mysqli_query($con,$get_category);
        $row = mysqli_fetch_assoc($result);

        $category_title=$row['category_title'];
        
    }

?>
<div class="container" mt-5>
        <h1 class="text-center"> Edit Category</h1>
<form action="" method="post" class="text-center">
    <div class="input-group w-50 mb-3">
        <span class="input-group-text bg-info" id = "basic-addoni"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name = "category_title" value="<?php echo $category_title?>" aria-label="categories" aria-describedby="basic-addoni" required="required">

    </div>

    <div class="input-group w-10 mb-2 m-auto">
        
        <input type="submit" class="bg-info border-0 p-2 my-3" name = "edit_cat" value="Update Category">

        
    </div>
</form>

<?php
 if(isset($_POST['edit_cat']))
 {

     $category_title = $_POST['category_title'];
     $update_query = "update categories set category_title='$category_title' where category_id=$edit_id";
     $result_cat = mysqli_query($con,$update_query);
    
    if($result_cat)
    {
        echo "<script>alert('Category is been updated successfully')</script>";
        echo "<script>window.open('./index.php?view_categories','_self')</script>";
    }
}
    
?>