<?php 
    include '../config/connect.php';
    include '../function/common_function.php';
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
                    <div class="form-outline mb-4">
                        <label for="user_name" class="form-label">User Name</label>
                        <input name="user_name" required="required" placeholder="Enter username" type="text"  id="user_name" class="form-control">
                    </div>
                    <!-- email -->
                    <div class="form-outline mb-4">
                        <label for="user_email" class="form-label">User Email</label>
                        <input name="user_email" required="required" placeholder="Enter user email" type="text" id="user_email" class="form-control">
                    </div>
                    <!-- image -->
                     
                      <div class="form-outline mb-4">
                        <label for="user_image" class="form-label">User image</label>
                        <input name="user_image" required="required" placeholder="Enter userimage" type="file" id="user_image" class="form-control">
                    </div>
                      <!-- password -->
                      <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">User Password</label>
                        <input name="user_password" required="required" placeholder="Enter user Password" type="password" id="user_password" class="form-control">
                    </div>
                      <!-- confirm -->
                      <div class="form-outline mb-4">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input name="confirm_password" required="required" placeholder="Confirm your password" type="password" id="confirm_password" class="form-control">
                    </div>
                      <!-- address -->
                      <div class="form-outline mb-4">
                        <label for="user_address" class="form-label">User Address</label>
                        <input name="user_address" required="required" placeholder="Enter user address" type="text"  id="user_address" class="form-control">
                    </div>
                      <!-- phone -->
                      <div class="form-outline mb-4">
                        <label for="user_phone" class="form-label">User Phone</label>
                        <input name="user_phone" required="required" placeholder="Enter user phone" type="text" name="" id="user_phone" class="form-control">
                    </div>
                    <div class=" mt-4 pt-2">
                        <input name="user_register" value="Register" type="submit" class="bg-info py-2 px-3 border-0">
                        <p class="small fw-bold">Already have account? <a href="user_login.php">Login</a></p>
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
    if(isset($_POST['user_register'])) {
        $username = $_POST['user_name'];
        $useremail = $_POST['user_email'];
        $userpassword = $_POST['user_password'];
        $confirm = $_POST['confirm_password'];
        $useraddress = $_POST['user_address'];
        $userphone = $_POST['user_phone'];
        $userimage = $_FILES['user_image']['name'];
        $userimage_tmp = $_FILES['user_image']['tmp_name'];
        $user_ip = getIPAddress();

        // select
        $select_query = "SELECT * FROM user WHERE user_name = '$username' AND user_email = '$useremail'";
        $result_select = mysqli_query($mysqli, $select_query) or die(mysqli_error($mysqli));
        $row_select = mysqli_num_rows($result_select);
        if($row_select > 0) {
            echo "<script>alert('email or username already exist')</script>";
        } elseif($userpassword != $confirm) {
            echo "<script>alert('confirm password doesnt matched password')</script>";

        }
        else {
            move_uploaded_file($userimage_tmp, "./user_images/$userimage");
            $insert_query = "INSERT INTO user (user_name, user_email,
            user_password, user_image,user_ip, user_address, user_phone)
            VALUES ('$username','$useremail','$userpassword','$userimage','$user_ip','$useraddress', '$userphone')";
            $result_insert = mysqli_query($mysqli, $insert_query) or mysqli_error($mysqli);
        }

        $select_cart_items = "SELECT * FROM cart_detail WHERE ip_address = '$user_ip'";
        $excute_select = mysqli_query($mysqli, $select_cart_items) or die(mysqli_error($mysqli));
        $row_cart_items = mysqli_num_rows($excute_select);
        if($row_cart_items > 0) {
            $_SESSION['username'] = $username;
            echo "<script>alert('You have items in your cart')</script>";
            echo "<script>window.open('checkout.php', _self)</script>";
        }
    }
?>