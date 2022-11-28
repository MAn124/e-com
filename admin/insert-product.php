<?php
    include '../config/connect.php';
    if(isset($_POST['insert_product'])) {
        $product_title = $_POST['product_title'];
        $product_description = $_POST['description'];
        $product_keyword = $_POST['product_keyword'];
        $product_category = $_POST['product_category'];
        $product_brand = $_POST['product_brand'];
        $product_image1 = $_FILES['product_images1']['name'];
        $product_image2 = $_FILES['product_images2']['name'];
        $product_image3 = $_FILES['product_images3']['name'];
        $product_prices = $_POST['product_prices'];
        $product_status = 'true';
        // tmp name
        $temp_image1 = $_FILES['product_images1']['tmp_name'];
        $temp_image2 = $_FILES['product_images2']['tmp_name'];
        $temp_image3 = $_FILES['product_images3']['tmp_name'];

        if($product_title == '' || $product_description == '' || $product_keyword == ''
        || $product_category == '' || $product_brand == '' || $product_image1 == '' || $product_image2 == '' 
        || $product_image3 == '' || $product_prices == '') {
            echo "<script>alert('Please fill full information')</script>";
            exit();
        } else {
            move_uploaded_file($temp_image1, "./product_images/$product_image1");
            move_uploaded_file($temp_image2, "./product_images/$product_image2");
            move_uploaded_file($temp_image3, "./product_images/$product_image3");
            // insert product
            $insert_product = "INSERT INTO products (product_title, product_description,
             product_keyword,category_id, brand_id, product_images1, product_images2, product_images3, product_prices,date, status)
             VALUES ('$product_title', '$product_description', '$product_keyword','$product_category','$product_brand', '$product_image1',
             '$product_image2','$product_image3', '$product_prices',NOW(),'$product_status')";
             $result_insert = mysqli_query($mysqli, $insert_product) or die(mysqli_error($mysqli));
             if($result_insert) {
            echo "<script>alert('Successfully')</script>";

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
    <title>Document</title>
    <script src="https://kit.fontawesome.com/78455fa1a9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../styles.css">
</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Product</h1>
        <!-- form -->
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline mb-4 w-50 m-auto">
                <label class="form-label" for="product_title">Product Title</label>
                <input required="required" autocomplete="off" placeholder="Enter product title" class="form-control" type="text" name="product_title" id="product_title" >
            </div>
            <!-- desc -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label class="form-label" for="product_title">Product Description</label>
                <input required="required" autocomplete="off" 
                placeholder="Enter product description" 
                class="form-control" type="text" 
                name="description" id="description" >
            </div>
            <!-- keyword -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label class="form-label" for="product_title">Product Keyword</label>
                <input required="required" autocomplete="off" 
                placeholder="Enter product title" 
                class="form-control" type="text" 
                name="product_keyword" id="product_keyword" >
            </div>
            <!-- cate -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select class="form-control mb-12" name="product_category" id="product_category">
                    <option value="">Select Category</option>
                    <?php 
                        $select_query = "SELECT * FROM categories";
                        $result_query = mysqli_query($mysqli, $select_query) or die(mysqli_error($mysqli));
                        while($row = mysqli_fetch_array($result_query)) {
                            $category_title = $row['category_title'];
                            $category_id = $row['category_id'];
                            echo "<option value=' $category_id'>$category_title</option>";
                        }
                    ?>
                    
                </select>
            </div>
            <!-- brand -->
            <div class="form-outline mb-10 w-50 m-auto">
                <select class="form-control mb-12" name="product_brand" id="product_brand">
                    <option value="">Select brand</option>
                    <?php 
                        $select_query = "SELECT * FROM brand";
                        $result_query = mysqli_query($mysqli, $select_query) or die(mysqli_error($mysqli));
                        while($row = mysqli_fetch_array($result_query)) {
                            $brand_title = $row['brand_title'];
                            $brand_id = $row['brand_id'];
                            echo "<option value=' $brand_id'>$brand_title</option>";
                        }
                    ?>
                   
                </select>
            </div>
            <!-- image 1 -->
            <div class="form-outline mb-4 w-50 m-auto">
            <label class="form-label" for="product_images1">Product images</label>
                <input required="required" autocomplete="off" class="form-control"
                 type="file" name="product_images1" id="product_images1" >
            </div>
            <!-- images 2 -->
            <div class="form-outline mb-4 w-50 m-auto">
            <label class="form-label" for="product_images2">Product images</label>
                <input required="required" autocomplete="off" class="form-control"
                 type="file" name="product_images2" id="product_images2" >
            </div>
            <!-- imgaes 3 -->
            <div class="form-outline mb-4 w-50 m-auto">
            <label class="form-label" for="product_images3">Product images</label>
                <input required="required" autocomplete="off" class="form-control"
                 type="file" name="product_images3" id="product_images3" >
            </div>
            <!-- price -->
            <div class="form-outline mb-4 w-50 m-auto">
            <label class="form-label" for="product_prices">Product Prices</label>
                <input required="required" autocomplete="off" class="form-control"
                 type="text" name="product_prices" id="product_prices" >
            </div>
            <!--  -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="insert Product">
            </div>
        </form>
    </div>
</body>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</html>