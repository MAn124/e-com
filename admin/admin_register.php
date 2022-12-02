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
    <title>Document</title>
    <style>
        body {
            overflow: hidden;
        }
    </style>
</head>
<body>
    <?php
        if(isset($_POST['admin_register'])) {
            $user_name = $_POST['username'];
            $user_password = $_POST['userpassword'];
            $user_email = $_POST['useremail'];

            $sql = "INSERT INTO admin (admin_name, admin_password, admin_email)
            VALUES '$user_name','$user_password', '$user_email'";
            $result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
            if($result) {
                echo "<script>alert('Register success')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            }
        }
    ?>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">
            Admin register
        </h2>
        <div class="row d-flex justify-content-center ">
            <div class="col-lg-6 col-xl-5">
                <img src="../images/" alt="">
            </div>
            <div class="col-lg-6 col-xl-5">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">User Name</label>
                        <input class="form-control" type="text" id="user_name" name="username" placeholder="Enter user name" required="required">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="useremail" class="form-label">User Email</label>
                        <input class="form-control" type="text" id="user_email" name="useremail" placeholder="Enter useremail" required="required">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="userpassword" class="form-label">User Password</label>
                        <input class="form-control" type="text" id="user_password" name="userpassword" placeholder="Enter password" required="required">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="confirmpassword" class="form-label">Confirm Password</label>
                        <input class="form-control" type="text" id="confirm_password" name="confirmpassword" placeholder="Enter user confirm password" required="required">
                    </div>
                    <div class="">
                        <input name="admin_register" class="bg-info py-2 px-3 border-0" type="submit" value="Register"  id="">
                        <p class="small">Have any account? <a href="admin_login.php">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</html>