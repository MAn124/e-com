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
    <link rel="stylesheet" href="../style.css">
    <title>Admin dashboard</title>
    <style>
    #admin-img {
    width: 20%;
    height: 20%;
    object-fit: contain;
}
    #logo-img {
        object-fit: contain;
        width: 100px;
        height: 100px;
    }
    #product_images {
        width: 10%;
    }
    </style>
</head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img id="logo-img" src="../images/4e18999de38fc38fbff8eec3a250b317.jpg" alt="">
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="" class="nav-link">Welcome</a>
                </li>
            </ul>
        </nav>
            </div>
        </nav>
        <!-- second child -->
        <div class="bg-light">
            <h3 class="text-center p-2">Manage</h3>
        </div>
        <!-- third child -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="">
                    <a id="admin-img"class="admin-image" href="#"><img src="../images/4e18999de38fc38fbff8eec3a250b317.jpg" alt=""></a>
                    <p class="text-name text-center">Admin</p>
                </div>
                        <div class="button text-center">
                        <button> <a class="nav-link text-light bg-info my-1" href="insert-product.php"></a>Insert Product</button>
                        <button> <a class="nav-link text-light bg-info my-1" href="index.php?view_product"></a>View Product</button>
                        <button> <a class="nav-link text-light bg-info my-1" href="index.php?insert-category"></a>Insert Categories</button>
                        <button> <a class="nav-link text-light bg-info my-1" href="index.php?view_categories"></a>View Categories</button>
                        <button> <a class="nav-link text-light bg-info my-1" href="index.php?insert-brand"></a>Insert Brands</button>
                        <button> <a class="nav-link text-light bg-info my-1" href="index.php?view_brand"></a>View Brands</button>
                        <button> <a class="nav-link text-light bg-info my-1" href="index.php?list_user"></a>List User</button>
                        <button> <a class="nav-link text-light bg-info my-1" href="index.php?admin_register"></a>Register Admin</button>
                        <button> <a class="nav-link text-light bg-info my-1" href=""></a>logout</button>
                </div>
            </div>
        </div>
        <!-- fourth child -->
        <div class="container my-5">
            <?php if(isset($_GET['insert-category'])) {
                include 'insert-categories.php';
            }
                if(isset($_GET['insert-brand'])) {
                    include 'insert-brands.php';
                }
                if(isset($_GET['view_product'])) {
                    include 'view_product.php';
                }
                if(isset($_GET['edit_product'])) {
                    include 'edit_product.php';
                }
                if(isset($_GET['delete_product'])) {
                    include 'delete_product.php';
                }
                if(isset($_GET['view_categories'])) {
                    include 'view_categories.php';
                }
                if(isset($_GET['view_brand'])) {
                    include 'view_brand.php';
                }
                if(isset($_GET['edit_category'])) {
                    include 'edit_category.php';
                }
                if(isset($_GET['edit_brand'])) {
                    include 'edit_brand.php';
                }
                if(isset($_GET['delete_category'])) {
                    include 'delete_category.php';
                }
                if(isset($_GET['delete_brand'])) {
                    include 'delete_brand.php';
                }
                if(isset($_GET['list_user'])) {
                    include 'list_user.php';
                }
                if(isset($_GET['admin_register'])) {
                    include 'admin_register.php';
                }
             ?>
        </div>
    </div>
</body>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</html>