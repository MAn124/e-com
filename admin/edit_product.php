<?php 
    if(isset($_GET['edit_product'])) {
        $edit_id = $_GET['edit_product'];
        $get_daya ="SELECT * FROM products  WHERE product_id = '$edit_id'";
        $result = mysqli_query($mysqli, $get_daya);
        $row = mysqli_fetch_array($result);
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_keyword = $row['product_keyword'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id'];
        $product_images1 = $row['product_images1'];
        $product_images2 = $row['product_images2'];
        $product_images3 = $row['product_images3'];
        $product_prices = $row['product_prices'];

        // 
        $select_category = "SELECT * FROM categories WHERE category_id ='$category_id'";
        $result_select = mysqli_query($mysqli, $select_category) or die(mysqli_error($mysqli));
        $row_category = mysqli_fetch_array($result_select);
        $category_title = $row_category['category_title'];
        // 
        $select_brand = "SELECT * FROM brand WHERE brand_id ='$brand_id'";
        $result_brand = mysqli_query($mysqli, $select_category) or die(mysqli_error($mysqli));
        $row_brand = mysqli_fetch_array($result_select);
        $brand_title = $row_brand['brand_title'];

    }
?>
<div class="container mt-5">
    <h1 class="text-center">Edit product</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto">
            <label for="product_title" class="form-label">Product Title</label>
            <input value="<?php echo $product_title ?>" type="text" id="product_title" 
            name="product_title" required="required" class="form-control">
        </div>
        <div class="form-outline w-50 m-auto">
            <label for="product_title" class="form-label">Product Description</label>
            <input value="<?php echo $product_description ?>" type="text" id="product_description" 
            name="product_description" required="required" class="form-control">
        </div>
        <div class="form-outline w-50 m-auto">
            <label for="product_title" class="form-label">Product Keywords</label>
            <input value="<?php echo $product_keyword ?>" type="text" id="product_keyword" 
            name="product_keyword" required="required" class="form-control">
        </div>
        <div class="form-outline w-50 m-auto">
        <label for="product_title" class="form-label">Product Categories</label>
           <select name="product_category" id="" class="form-select">
            <option value="<?php echo $category_title ?>"><?php echo $category_title ?></option>
            <?php
                 $select_category_all = "SELECT * FROM categories";
                 $result_select_all = mysqli_query($mysqli, $select_category) or die(mysqli_error($mysqli));
                 while($row_category_all = mysqli_fetch_array($result_select_all)) {
                        $category_title = $row_category_all['category_title'];
                        $category_id = $row_category_all['category_id'];
                        echo "<option value='$category_id'>'$category_title'</option>";
                 };                
            ?>
           </select>
        </div>
        <div class="form-outline w-50 m-auto">
        <label for="product_title" class="form-label">Product Brand</label>

           <select name="product_brand" id="" class="form-select">
            <option value="<?php echo $brand_title ?>"><?php echo $brand_title ?></option>
            <?php
                 $select_brand_all = "SELECT * FROM brand";
                 $result_select_all = mysqli_query($mysqli, $select_brand) or die(mysqli_error($mysqli));
                 while($row_brand_all = mysqli_fetch_array($result_select_all)) {
                        $brand_title = $row_brand_all['brand_title'];
                        $brand_id = $row_brand_all['brand_id'];
                        echo "<option value='$brand_id'>'$brand_title'</option>";
                 };                
            ?>
            
           </select>
        </div>
        <div class="form-outline w-50 m-auto">
            <label for="product_title" class="form-label">Product Images1</label>
            <div class="d-flex">
                <input type="file" id="product_images1" 
                name="product_images1" required="required" class="form-control w-90 m-auto">
                <img src="./product_images/<?php echo $product_images1 ?>" alt="">
            </div>
        </div>
        <div class="form-outline w-50 m-auto">
            <label for="product_title" class="form-label">Product Images2</label>
            <div class="d-flex">
                <input type="file" id="product_images2" 
                name="product_images2" required="required" class="form-control w-90 m-auto">
                <img src="./product_images/<?php echo $product_images2 ?>" alt="">
            </div>
        </div>
        <div class="form-outline w-50 m-auto">
            <label for="product_title" class="form-label">Product Images3</label>
            <div class="d-flex">
                <input type="file" id="product_images3" 
                name="product_images3" required="required" class="form-control w-90 m-auto">
                <img src="./product_images/<?php echo $product_images3 ?>" alt="">
            </div>
        </div>
        <div class="form-outline w-50 m-auto">
            <label for="product_price" class="form-label">Product Prices</label>
            <input type="text" id="product_prices" 
            name="product_prices" required="required" class="form-control">
        </div>
        <div class="text-center">
            <input class="btn btn-success px-3 mb-3" type="submit" name="edit_product" value="update product">
        </div>
    </form>
</div>

<!--  -->
<?php
    if(isset($_POST['edit_product'])) {
        $product_title = $_POST['product_title'];
        $product_description = $_POST['product_description'];
        $product_keyword = $_POST['product_keyword'];
        $product_category = $_POST['product_category'];
        $product_brand = $_POST['product_brand'];     
        $product_prices = $_POST['product_prices'];

        $product_images1 = $_POST['product_images1']['name'];
        $product_images2 = $_POST['product_images2']['name'];
        $product_images3 = $_POST['product_images3']['name'];

        $tmp_images1 = $_POST['product_images1']['tmp_name'];
        $tmp_images2 = $_POST['product_images2']['tmp_name'];
        $tmp_images3 = $_POST['product_images3']['tmp_name'];

        if($product_title == '' || $product_description == '' ||
        $product_keyword == '' || $product_category == '' ||
         $product_brand == '' || $product_images1 == '' || $product_images2 == '' ||
         $product_images3 == '' || $product_prices == '') {
                echo "<script>alert('Not allow empty')</script>";
              
         }else {
            move_uploaded_file($tmp_images1,"./product_images/$product_images1");
            move_uploaded_file($tmp_images2,"./product_images/$product_images2");
            move_uploaded_file($tmp_images3,"./product_images/$product_images3");
            // 
            $update_product = "UPDATE products SET category_id = '$product_category',
            brand_id = '$product_brand', product_images1 = '$product_images1',
             product_images2 = '$product_images2',
              product_images3 = '$product_images3', product_prices = '$product_prices,
              date = NOW() WHERE product_id = '$edit_id'";
              $result_update = mysqli_query($mysqli, $update_product) or die(mysqli_error($mysqli));

              if($result_update) {
                echo "<script>alert('Update success')</script>";
                echo "<script>window.open('./insert_product.php','_self')</script>";
              } else {

              }
         }
    }

?>