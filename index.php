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
               <?php
                if(isset($_SESSION['username'])) {
                  echo " <li class='nav-item'>
                  <a class='nav-link' href='./user/profile.php'>My account</a>
               </li>";
                } else {
                  echo " <li class='nav-item'>
                  <a class='nav-link' href='./user/user_register.php'>Register</a>
               </li>";
                }
               ?>
              
               <li class="nav-item">
                  <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="#">Total Prices: <?php total_price(); ?></a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="#">Contact</a>
               </li>
            </ul>
            <form method="get" action="search-product.php" class="form-inline my-2 my-lg-0">
               <input name="search-data" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
               <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
               <input name="search_data_product" type="submit" value="search" class="btn ">
            </form>
         </div>
      </nav>
      <?php
         cart();
      ?>
      <!--  -->
      <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
         <ul class="navbar-nav me-auto">
           
            <?php 
             if(!isset($_SESSION['username'])) {
               echo "<li class='nav-item'>
               <a href='./user/user_login.php' class='nav-link'>Login</a>
               </li>";
            } else {
               echo "<li class='nav-item'>
               <a href='./user/user_logout.php' class='nav-link'>Logout</a>
               </li>";
            }
               
           
            if(!isset($_SESSION['username'])) {
               echo "<li class='nav-item'>
               <a href='#' class='nav-link'>Welcome Guest</a>
               </li>";
            } else {
               echo "<li class='nav-item'>
               <a href='#' class='nav-link'>Welcome, ".$_SESSION['username']."</a>
               </li>";
            }
               
            ?>
         </ul>
      </nav>
      <!--  -->
      <nav class="bg-light">
      <h3 class="text-center">Clothing Shop</h3>
         <p class="text-center">All in one</p>
      </nav>
      <!-- product -->
      <div class="row px-3">
         <div class="col-md-10">
            <div class="row">
                <?php 
                   getProduct();
                   get_unique_cate();
                get_unique_brand();
               //  $ip = getIPAddress();  
               //  echo 'User Real IP Address - '.$ip;  
                ?>            
            </div>
         </div>
         <div class="col-md-2 bg-secondary p-0">
            <!-- brand -->
            <ul class="navbar-nav me-auto text-center">
               <li class="nav-item bg-info ">
                  <a class="nav-link text-light" href="">
                     <h4>Delivery</h4>
                  </a>
               </li>
               <?php 
                getBrand();
                  ?>
            </ul>
            <!--  -->
            <ul class="navbar-nav me-auto text-center">
               <li class="nav-item bg-info ">
                  <a class="nav-link text-light" href="">
                     <h4>Categories</h4>
                  </a>
               </li>
               <?php 
                getCategory();           
                  ?>
            </ul>
         </div>
      </div>
   </body>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</html>