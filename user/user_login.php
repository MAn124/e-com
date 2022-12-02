<?php
    include '../config/connect.php';
     include '../function/common_function.php';
     @session_start();
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
    <div class="container-fluid">
        <h2 class="text-center">
            New User Register
        </h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- username -->
                    <div class="form-outline mb-4">
                        <label for="user_name" class="form-label">User Name</label>
                        <input name="user_name" required="required" placeholder="Enter username" type="text"  id="user_name" class="form-control">
                    </div>
                   
                      <!-- password -->
                      <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">User Password</label>
                        <input name="user_password" required="required" placeholder="Enter user Password" type="password" id="user_password" class="form-control">
                    </div>
                      
                    <div class=" mt-4 pt-2">
                        <input name="user_login" value="Login" type="submit" class="bg-info py-2 px-3 border-0">
                        <p class="small fw-bold">Not create accoutn yet? <a href="user_register.php">Register</a></p>
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

<?php 
    if(isset($_POST['user_login'])) {
        $username = $_POST['user_name'];
        $user_password = $_POST['user_password'];

        $select_query="SELECT * FROM user WHERE user_name = '$username' ";
        $result = mysqli_query($mysqli, $select_query) or die(mysqli_error($mysqli));
        $row = mysqli_num_rows($result) ;
        $row_data = mysqli_fetch_array($result) ;
        $ip = getIPAddress();

        $cart_query = "SELECT * FROM cart_detail WHERE ip_address = '$ip'";
        $resul_cart = mysqli_query($mysqli, $cart_query) or die(mysqli_error($mysqli));
        $row_count = mysqli_num_rows($resul_cart);
        if($row > 0) {
            $_SESSION['username'] = $username;
            if($row == 1 and $row_count == 0) {
            $_SESSION['username'] = $username;
                echo "<script>alert('Login success')</script>";
                echo "<script>window.open('profile.php', '_self')</script>";

            } else {
            $_SESSION['username'] = $username;
                echo "<script>alert('Login success')</script>";
                echo "<script>window.open('payment.php', '_self')</script>";
            }
            if(password_verify($user_password, $row_data['user_password'])) {
            $_SESSION['username'] = $username;
                echo "<script>alert('Login success')</script>";
            } else {
                echo "<script>alert('Invalid information')</script>";
            }
        }else {
            echo "<script>alert('Invalid information')</script>";
        }
    }
?>