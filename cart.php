<?php
   include 'config/connect.php';
   include 'function/common_function.php';
   session_start();

   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="https://kit.fontawesome.com/78455fa1a9.js" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="style.css">
      <title>Document</title>
      <style>
        .img{
            width: 50px;
            height: 50px;
        }
      </style>
   </head>
   <body>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
         
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
               <li class="nav-item active">
                  <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="display-all.php">Product</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="./user/user_register.php">Register</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="#">Contact</a>
               </li>
            </ul>
            <form method="get" action="search-product.php" class="form-inline my-2 my-lg-0">
               <input name="search-data" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
               <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
               <input name="search_data_product" type="submit" value="search" class="btn btn-outline-light">
            </form>
         </div>
      </nav>
      <?php
         cart();
         ?>
      <!--  -->
      <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
         <ul class="navbar-nav me-auto">
            <li class="nav-item">
               <a href="#" class="nav-link">Welcome</a>
            </li>
            <li class="nav-item">
               <a href="#" class="nav-link">Login</a>
            </li>
         </ul>
      </nav>
      <!--  -->
      <div class="bg-light">
      <h3 class="text-center">Clothing Shop</h3>
         <p class="text-center">All in one</p>
      </div>
      <!--  -->
      <div class="container">
         <div class="row">
            <form action="" method="post">
                <table class="table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Product Title</th>
                            <th>Product images</th>
                            <th>Quantity</th>
                            <th>Total Prices</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                         global $mysqli;
                         $ip = getIPAddress();
                         $total = 0;
                         $cart_query = "SELECT * FROM cart_detail WHERE ip_address = '$ip'";
                         $result = mysqli_query($mysqli, $cart_query) or die(mysqli_error($mysqli));
                         while($row = mysqli_fetch_array($result)){
                             $product_id = $row['product_id'];
                             $select_product = "SELECT * FROM products WHERE product_id = '$product_id'";
                             $result_select = mysqli_query($mysqli, $select_product) or die(mysqli_error($mysqli));
                             
                             while($row_prices = mysqli_fetch_array($result_select)){
                                 $product_price = array($row_prices['product_prices']);
                                 $product_table = $row_prices['product_prices'];
                                 $product_title = $row_prices['product_title'];
                                 $product_image1 = $row_prices['product_images1'];
                                 $product_value = array_sum($product_price);
                                 $total+=$product_value;
                         
                        ?>
                        <tr>
                            <td><?php echo $product_title ?></td>
                            <td><img class="img" src="./admin/product_images/<?php echo $product_image1 ?>" alt=""></td>
                            <td><input class="form-input" type="number" name="qty"></td>
                            <?php
                            $ip = getIPAddress();
                            if(isset($_POST['update_cart'])) {
                                $qty = $_POST['qty'];
                                $update_cart = "UPDATE cart_detail SET quantity = '$qty' WHERE ip_address = '$ip'";
                                $result_update = mysqli_query($mysqli,$update_cart) or die(mysqli_error($mysqli));
                                $total = $total * (int)$qty;
                            }
                            ?>
                            <td><?php echo $product_table ?></td>
                     
                            <td>
                             
                                 <!-- <button class="bg-info px-3 py-2 mx-3 border-0">Update</button>  -->
                                 <input name="update_cart" class="bg-info px-3 py-2 mx-3 border-0" type="submit" value="Update Cart">
                                
                                  <!-- <button class="bg-info px-3 py-2 mx-3 border-0">Remove</button  -->

                            </td>
                            <td> <input name="remove_cart" class="bg-info px-3 py-2 mx-3 border-0" type="submit" value="Remove Cart"></td>
                        </tr>
                        <?php     }
                         }
                         ?>
                          <?php 
                                 $ip = getIPAddress();
                                 if(isset($_POST['remove_cart'])){
                                    $remove_query = "DELETE FROM cart_detail WHERE ip_address = '$ip' LIMIT 1";
                                    $result_remove = mysqli_query($mysqli, $remove_query) or die(mysqli_error($mysqli));

                                 }
                              ?>
                    </tbody>
                </table>
                <div class="d-flex">
                <h4 class="px-3">Subtotal:<strong class="text-info"><?php total_price(); ?></strong></h4>
                <a href="index.php"><button class="bg-info px-3 border-0">Continue Shopping</button></a>
                <a href="index.php"><button class="btn-secondary px-3 border-0">Check out</button></a>
                </div>            
         </div>
      </div>
      </form>
      <!--  -->
    
   </body>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</html>