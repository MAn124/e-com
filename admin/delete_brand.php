<?php
if(isset($_GET['delete_brand'])) {
    $delete_cate = $_GET['delete_brand'];

    $delete_query = "DELETE FROM brand WHERE brand_id = '$delete_cate'";
    $result = mysqli_query($mysqli, $delete_query);
    if($result) {
        echo "<script>alert('Delete success')</script>";
        echo "<script>window.open('./index.php?view_categories.php','_self')</script>";
    }
}
?>