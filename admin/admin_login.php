<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            overflow: hidden;
        }
    </style>
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">

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
                        <label for="userpassword" class="form-label">User Password</label>
                        <input class="form-control" type="text" id="user_password" name="userpassword" placeholder="Enter password" required="required">
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
</html>