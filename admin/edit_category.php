<?php 
    if(isset($_POST['edit_category'])) {
        $edit_category = $_GET['edit_category'];
        $get_cate = "SELECT * FROM categories WHERE category_id = '$edit_category'";
        $result = mysqli_query($mysqli, $get_cate);
        $row = mysqli_fetch_array($result);
        $category_title = $row['category_title'];
    }
    if(isset($_POST['edit_cate'])) {
        $cate_title = $_POST['category_title'];

        $update_query = "UPDATE categories SET category_title ='$cate_title' WHERE category_id = '$edit_category'";
        $result_update = mysqli_query($mysqli, $update_query);
        if($result_update) {
            echo "<script>alert('Update success')</script>";
            echo "<script>window.open('./index.php?view_categories.php','_self')</script>";
        } 

    }
?>

<div class="container mt-3">
    <h1 class="text-center">Edit Category</h1>
    <form action="" method="post">
        <div class="form-outline mb-4">
            <label class="form-label" for="category_title">Category</label>
            <input value="<?php echo $category_title ?>" type="text" name="category_title" id="category_title" required="required" class="form-control">
        </div>
        <input class="btn btn-success py-2 px-3" type="submit" value="Update Category" name="edit_cate" id="">
    </form>
</div>
