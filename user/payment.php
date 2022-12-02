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
    <!--  -->
    <?php
        $user_ip = getIPAddress();
        $get_user = "SELECT * FROM user WHERE user_ip = '$user_ip'";
        $result = mysqli_query($mysqli, $get_user) or die(mysqli_error($mysqli));
        $run_query = mysqli_fetch_array($result);
        $user_id = $run_query['user_id'];
    ?>
        <div class="container">
            <h2 class="text-center text-info">Payment options</h2>
            <div class="row d-flex justify-content align-items-center my-5">
                <div class="col-md-6">
                    <a href="" target="_blank"><img src="" alt=""></a>
                </div>
                <div class="col-md-6">
                    <a href="order.php?user_id=<?php echo $user_id ?>">Offline payment</a>
                </div>
            </div>
        </div>
</body>
</html>