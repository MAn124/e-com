
    <h3 class="text-dnager mb-4">Delete Account</h3>
    <form class="mt-5" action="" method="post">
        <div class="form-outline">
            <input type="submit" class="form-control w-50 m-auto" name="delete" value="Delete Account">
        </div>
       
    </form>
<?php 
    $username_session = $_SESSION['username'];
    if(isset($_POST['delete'])) {
        $delete_query = "DELETE FROM user WHERE username = '$username_session'";
        $result = mysqli_query($mysqli, $delete_query);
        if($result) {
            session_destroy();
            echo"<script>alert('Delete Success')</script>";
            echo"<script>window.open('index.php','_self')</script>";
        }
    }
?>