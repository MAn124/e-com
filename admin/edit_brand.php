<?php 
    if(isset($_POST['edit_brand'])) {
        $edit_brand = $_GET['edit_brand'];
        $get_cate = "SELECT * FROM categories WHERE brand_id = '$edit_brand'";
        $result = mysqli_query($mysqli, $get_cate);
        $row = mysqli_fetch_array($result);
        $brand_title = $row['brand_title'];
    }
    if(isset($_POST['edit_cate'])) {
        $cate_title = $_POST['brand_title'];

        $update_query = "UPDATE brand SET brand_title ='$cate_title' WHERE brand_id = '$edit_brand'";
        $result_update = mysqli_query($mysqli, $update_query);
        if($result_update) {
            echo "<script>alert('Update success')</script>";
            echo "<script>window.open('./index.php?view_categories.php','_self')</script>";
        } 

    }
?>

<div class="container mt-3">
    <h1 class="text-center">Edit Brand</h1>
    <form action="" method="post">
        <div class="form-outline mb-4">
            <label class="form-label" for="brand_title">Brand</label>
            <input value="<?php echo $brand_title ?>" type="text" name="brand_title" id="brand_title" required="required" class="form-control">
        </div>
        <input class="btn btn-success py-2 px-3" type="submit" value="Update brand" name="edit_cate" id="">
    </form>
</div>
