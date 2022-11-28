<?php
    include './config/connect.php';

    function getProduct() {
        global $mysqli;

        if(!isset($_GET['category'])) {
            if(!isset($_GET['brand'])) {
        $select_query = "SELECT * FROM products LIMIT 0, 4";
        $result_query = mysqli_query($mysqli,$select_query) or die(mysqli_error($mysqli));
        while($row_product = mysqli_fetch_array($result_query)) {
            $product_title = $row_product['product_title'];
            $product_description = $row_product['product_description'];
            $product_id = $row_product['product_id'];
            $product_images1 = $row_product['product_images1'];
            $product_prices = $row_product['product_prices'];
            $category_id = $row_product['category_id'];
            $brand_id = $row_product['brand_id'];
   
            echo "<div class='col-md-4 mb-2'>
            <div class='card'>
               <img class='card-img-top' src='./admin/product_images/$product_images1' alt='Card image cap'>
               <div class='card-body'>
                  <h5 class='card-title'>$product_title</h5>
                  <p class='card-text'>$product_description</p>
                  <a href='index.php?add-cart=$product_id'class='btn btn-primary'>Add to cart</a>
                  <a href='product-detail.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
               </div>
               </div>
            </div>";
        }
    }
    }
    }
    function get_all_product() {
        global $mysqli;

        if(!isset($_GET['category'])) {
            if(!isset($_GET['brand'])) {
        $select_query = "SELECT * FROM products ";
        $result_query = mysqli_query($mysqli,$select_query) or die(mysqli_error($mysqli));
        while($row_product = mysqli_fetch_array($result_query)) {
            $product_title = $row_product['product_title'];
            $product_description = $row_product['product_description'];
            $product_id = $row_product['product_id'];
            $product_images1 = $row_product['product_images1'];
            $product_prices = $row_product['product_prices'];
            $category_id = $row_product['category_id'];
            $brand_id = $row_product['brand_id'];
   
            echo "<div class='col-md-4 mb-2'>
            <div class='card'>
               <img class='card-img-top' src='./admin/product_images/$product_images1' alt='Card image cap'>
               <div class='card-body'>
                  <h5 class='card-title'>$product_title</h5>
                  <p class='card-text'>$product_description</p>
                  <a href='index.php?add-cart=$product_id' class='btn btn-primary'>Add to cart</a>
                  <a href='product-detail.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
               </div>
               </div>
            </div>";
        }
    }
    }
    }
    function get_unique_cate() {
        global $mysqli;

        if(isset($_GET['category'])) {
            $categories_id = $_GET['category'];
        $select_query = "SELECT * FROM products WHERE category_id = '$categories_id'";
        $result_query = mysqli_query($mysqli,$select_query) or die(mysqli_error($mysqli));
        $num = mysqli_num_rows($result_query);
        if($num == 0) {
            echo "<h2 class='text-center text-danger'>No stock for this category</h2>";
        }
        while($row_product = mysqli_fetch_array($result_query)) {
            $product_title = $row_product['product_title'];
            $product_description = $row_product['product_description'];
            $product_id = $row_product['product_id'];
            $product_images1 = $row_product['product_images1'];
            $product_prices = $row_product['product_prices'];
            $category_id = $row_product['category_id'];
            $brand_id = $row_product['brand_id'];
   
            echo "<div class='col-md-4 mb-2'>
            <div class='card'>
               <img class='card-img-top' src='./admin/product_images/$product_images1' alt='Card image cap'>
               <div class='card-body'>
                  <h5 class='card-title'>$product_title</h5>
                  <p class='card-text'>$product_description</p>
                  <a href='index.php?add-cart=$product_id' class='btn btn-primary'>Add to cart</a>
                  <a href='product-detail.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
               </div>
               </div>
            </div>";
        }
    }
    }   
    
   
    function getBrand() {
        global $mysqli;
        $select_brand = "SELECT * FROM brand";
        $result_select = mysqli_query($mysqli, $select_brand) or die (mysqli_error($mysqli));
        
        
        while($row = mysqli_fetch_array($result_select)) {
            $row_title = $row['brand_title'];
            $row_id = $row['brand_id'];
            echo " <li class='nav-item '>
            <a class='nav-link text-light' href='index.php?brand=$row_id'>$row_title</a>
            </li>";
        }
    }
    function get_unique_brand() {
        global $mysqli;

        if(isset($_GET['brand'])) {
            $brand_id = $_GET['brand'];
        $select_query = "SELECT * FROM products WHERE brand_id = '$brand_id'";
        $result_query = mysqli_query($mysqli,$select_query) or die(mysqli_error($mysqli));
        $num = mysqli_num_rows($result_query);
        if($num == 0) {
            echo "<h2 class='text-center text-danger'>No stock for this brand</h2>";
        }
        while($row_product = mysqli_fetch_array($result_query)) {
            $product_title = $row_product['product_title'];
            $product_description = $row_product['product_description'];
            $product_id = $row_product['product_id'];
            $product_images1 = $row_product['product_images1'];
            $product_prices = $row_product['product_prices'];
            $category_id = $row_product['category_id'];
            $brand_id = $row_product['brand_id'];
   
            echo "<div class='col-md-4 mb-2'>
            <div class='card'>
               <img class='card-img-top' src='./admin/product_images/$product_images1' alt='Card image cap'>
               <div class='card-body'>
                  <h5 class='card-title'>$product_title</h5>
                  <p class='card-text'>$product_description</p>
                  <a href='index.php?add-cart=$product_id' class='btn btn-primary'>Add to cart</a>
                  <a href='product-detail.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
               </div>
               </div>
            </div>";
        }
    }
    }   
    function getCategory() {
        global $mysqli;
        $select_categories = "SELECT * FROM categories";
        $categories_select = mysqli_query($mysqli, $select_categories) or die (mysqli_error($mysqli));
        
        
        while($row_category = mysqli_fetch_array($categories_select)) {
            $categories_title = $row_category['category_title'];
            $categories_id = $row_category['category_id'];
            echo " <li class='nav-item '>
            <a class='nav-link text-light' href='index.php?category=$categories_id'>$categories_title</a>
            </li>";
        }
    }

    function view_detail() {
        global $mysqli;
        if(isset($_GET['product_id'])){
        if(!isset($_GET['category'])) {
            if(!isset($_GET['brand'])) {
                $product_id = $_GET['product_id'];
        $select_query = "SELECT * FROM products WHERE product_id = $product_id";
        $result_query = mysqli_query($mysqli,$select_query) or die(mysqli_error($mysqli));
        while($row_product = mysqli_fetch_array($result_query)) {
            $product_title = $row_product['product_title'];
            $product_description = $row_product['product_description'];
            $product_id = $row_product['product_id'];
            $product_images1 = $row_product['product_images1'];
            $product_images2 = $row_product['product_images2'];
            $product_images3 = $row_product['product_images3'];
            $product_prices = $row_product['product_prices'];
            $category_id = $row_product['category_id'];
            $brand_id = $row_product['brand_id'];
   
            echo " <div class='col-md-4'>
            <div class='card'>
           <img class='card-img-top' src='./admin/product_images/$product_images1' alt='Card image cap'>
           <div class='card-body'>
              <h5 class='card-title'>$product_title</h5>
              <p class='card-text'>$product_description</p>
              <a href='index.php?add-cart=$product_id' class='btn btn-primary'>Add to cart</a>
              <a href='index.php' class='btn btn-secondary'>Return</a>
           </div>
           </div>
            </div>
            <div class='col-md-8'>
                <div class='row'>
                    <div class='col-md-12'>
                        <h4 class='text-center text-info mb-5'>product</h4>
                    </div>
                    <div class='col-md-6'>

                    </div>
                    <div class='col-md-6'>
                        
                        </div>
                </div>
            </div>";
        }
            
    }
    }
    }
    }
    function getIPAddress() {  
        //whether ip is from the share internet  
         if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                    $ip = $_SERVER['HTTP_CLIENT_IP'];  
            }  
        //whether ip is from the proxy  
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
         }  
    //whether ip is from the remote address  
        else{  
                 $ip = $_SERVER['REMOTE_ADDR'];  
         }  
         return $ip;  
        }
    function search_Product() {
        global $mysqli;
        if(isset($_GET['search_data'])) {
            $search_data_value = $_GET['search_data'];
        $search_query = "SELECT * FROM products WHERE product_keyword LIKE '%$search_data_value%'";
        $select_query = "SELECT * FROM products";
        $result_query = mysqli_query($mysqli,$search_query) or die(mysqli_error($mysqli));
        $num_row = mysqli_num_rows($result_query);
        if($num_row == 0) {
            echo "<h2 class='text-center text-danger'>Product not found</h2>";
            
        }
        while($row_product = mysqli_fetch_array($result_query)) {
            $product_title = $row_product['product_title'];
            $product_description = $row_product['product_description'];
            $product_id = $row_product['product_id'];
            $product_images1 = $row_product['product_images1'];
            $product_prices = $row_product['product_prices'];
            $category_id = $row_product['category_id'];
            $brand_id = $row_product['brand_id'];
   
            echo "<div class='col-md-4 mb-2'>
            <div class='card'>
               <img class='card-img-top' src='./admin/product_images/$product_images1' alt='Card image cap'>
               <div class='card-body'>
                  <h5 class='card-title'>$product_title</h5>
                  <p class='card-text'>$product_description</p>
                  <a href='index.php?add-cart=$product_id' class='btn btn-primary'>Add to cart</a>
                  <a href='product-detail.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
               </div>
               </div>
            </div>";
        }
    }
   
}
            function cart() {
                if(isset($_GET['add-cart'])) {
                    global $mysqli;
                    $ip = getIPAddress();
                    $get_product_id = $_GET['add-cart'];
                    $select_query = "SELECT * FROM cart_detail 
                    WHERE ip_address = '$ip' AND product_id = $get_product_id";
                    $result_query = mysqli_query($mysqli, $select_query) or die(mysqli_error($mysqli));
                    $num = mysqli_num_rows($result_query);
                    if($num > 0) {
                        echo "<script>alert('product already added')</script>";
                        echo "<script>window.open('index.php','_self')</script>";
                    } else {
                         $insert_query = "INSERT INTO cart_detail (product_id, ip_address, quantity)
                         VALUES ('$get_product_id', '$ip',0)";
                         $result_insert = mysqli_query($mysqli, $insert_query) or die(mysqli_error($mysqli));
                        echo "<script>window.open('index.php','_self')</script>";
                        
                    }
                }
            }
            function cart_item() {
                if(isset($_GET['add-cart'])) {
                    global $mysqli;
                    $ip = getIPAddress();
                    $select_query = "SELECT * FROM cart_detail 
                    WHERE ip_address = '$ip'";
                    $result_query = mysqli_query($mysqli, $select_query) or die(mysqli_error($mysqli));
                    $count_cart_item = mysqli_num_rows($result_query);
                }else {
                    global $mysqli;
                    $ip = getIPAddress();
                    $select_query = "SELECT * FROM cart_detail 
                    WHERE ip_address = '$ip'";
                     $result_query = mysqli_query($mysqli, $select_query) or die(mysqli_error($mysqli));
                     $count_cart_item = mysqli_num_rows($result_query);                    
                }
                   echo  $count_cart_item;
            }
            
?>