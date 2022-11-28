
    <?php
        include '../config/connect.php';
        if(isset($_POST['insert-brand'])) {
            $brand = $_POST['brand-title'];
            $select_query = "SELECT * FROM brand WHERE brand_title = '$brand'";
            $result_select = mysqli_query($mysqli, $select_query) or die (mysqli_error($mysqli));
            $num = mysqli_num_rows($result_select);
            if($num > 0) {
                echo "<script>alert('Brand already exist')</script>";

            } else {
            $insert_query = "INSERT INTO brand (brand_title) VALUES ('$brand')";
            $result = mysqli_query($mysqli, $insert_query) or die(mysqli_error($mysqli));

            if($result) {
                echo "<script>alert('Brand has been add')</script>";
            }
            }}
    ?>
    <h2 class="text-center" >Insert Brands</h2>

        <form class="mb-2" action="" method="POST">
                <div class="input-group w-90 mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
                </div>
                <input name="brand-title" type="text" class="form-control" placeholder="Insert Brand" aria-label="brands" aria-describedby="basic-addon1">
                </div>
                <div class="input-group w-10 mb-2 m-auto">
                
                <input value="Insert Categories" name="insert-brand" type="submit" class="border-0 p-2 my-3 bg-info" placeholder="Insert Brand" aria-label="Username" aria-describedby="basic-addon1">
                
                </div>
        </form>
