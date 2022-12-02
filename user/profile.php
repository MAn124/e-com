<?php
   include '../config/connect.php';
   include '../function/common_function.php';
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
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
         <a class="navbar-brand" href="#">Navbar</a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
               <li class="nav-item active">
                  <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="../display-all.php">Product</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="user_register.php">Register</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="#">Total Prices: <?php total_price(); ?></a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="#">Contact</a>
               </li>
            </ul>
            <form method="get" action="../search-product.php" class="form-inline my-2 my-lg-0">
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
         <h3 class="text-center">Hidden Store</h3>
         <p class="text-center">Lemmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm</p>
      </nav>
            <div class="row">
                <div class="col-md-2">
                    <ul class="navbar-nav bg-secondary text-center " style="height: 100vh;">
                        <li class="nav-item bg-info">
                            <a class="nav-link text-light" href=""><h4>PROFILE</h4></a>
                        </li>
                        <?php 
                            $username = $_SESSION['username'];
                            $user_image = "SELECT * FROM user WHERE user_name = '$username'";
                            $result_image = mysqli_query($mysqli, $user_image);
                            $row_image = mysqli_fetch_array($result_image);
                            $user_image = $row_image['user_image'];
                            echo "<li class='nav-item '>
                            <a class='nav-link text-light' href='./user/user_images/$user_image'><img src='' alt=''></a>
                            </li>";
                            ?>
                        
                        <li class="nav-item ">
                            <a class="nav-link text-light" href="profile.php">Pending orders</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link text-light" href="profile.php?edit_account">Edit account</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link text-light" href="profile.php?my_order">My order</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link text-light" href="profile.php?delete_account">Delete Account</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link text-light" href="user_logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-10"
               <?php get_user_cart_item();
                  if(isset($_GET['edit_account'])) {
                     include 'edit_account.php';
                  }
                  if(isset($_GET['my_order'])) {
                     include 'user_order.php';
                  }
                  if(isset($_GET['delete_account'])) {
                     include 'delete_account.php';
                  }
               ?></div>
            </div>
   </body>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</html>