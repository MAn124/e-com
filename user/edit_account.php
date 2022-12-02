<?php 
    if(isset($_GET['edit_account'])) {
        $user_session_name = $_SESSION['username'];
        $select_query  = "SELECT * FROM user WHERE user_name = '$user_session_name'";
        $result_query = mysqli_query($mysqli, $select_query) or die(mysqli_error($mysqli));
        $row_fetch  = mysqli_fetch_array($result_query);
        $user_name = $row_fetch['user_name'];
        $user_id = $row_fetch['user_id'];
        $user_email = $row_fetch['user_email'];
        $user_address = $row_fetch['user_address'];
        $user_phone = $row_fetch['user_phone'];

        if(isset($_POST['user_update'])) {
            $update_id = $user_id;
            $user_name = $_POST['user_name'];
            $user_email = $_POST['user_email'];
            $user_address = $_POST['user_address'];
            $user_phone = $_POST['user_phone'];
            $user_image = $_FILES['user_image']['name'];
            $user_image_tmp = $_FILES['user_image']['tmp_name'];
            move_uploaded_file($user_image_tmp,"./user/user_images/$user_image");

            $update_data = "UPDATE user SET user_name = '$user_name', 
            user_email = '$user_email',user_image = '$user_image',
            user_address = '$user_address', user_phone = '$user_phone', user_id = '$update_id'";
            $result_query_data = mysqli_query($mysqli,$update_data) or die(mysqli_error($mysqli));
            if($result_query_data) {
                echo "<script>alert('Update Success')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            } else {
                echo "<script>alert('Update Failed')</script>";

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
</head>
<body>
    <h3 class="text-center text-success">
        Edit Account
    </h3>
    <form action="" method="post" enctype="multipart/form-data" class="text-center">
        <div class="form-outline mb-4">
            <input value="<?php echo $user_name ?>" class="form-control w-50 m-auto " name="user_name" type="text">
        </div>
        <div class="form-outline mb-4">
            <input value="<?php echo $user_email ?>" class="form-control w-50 m-auto " name="user_email" type="text">
        </div>
        <div class="form-outline mb-4">
            <input class="form-control w-50 m-auto " name="user_image" type="file">
            <img src="./user_images/<?php echo $user_image ?>" alt="">
        </div>
        <div class="form-outline mb-4">
            <input value="<?php echo $user_address ?>" class="form-control w-50 m-auto " name="user_address" type="text">
        </div>
        <div class="form-outline mb-4">
            <input value="<?php echo $user_phone ?>" class="form-control w-50 m-auto " name="user_phone" type="text">
        </div>
        <input value="Update" class="bg-info py-2 px-3 border-0 " name="user_update" type="submit">

    </form>
</body>
</html>