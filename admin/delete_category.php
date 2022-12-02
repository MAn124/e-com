<?php
if(isset($_GET['delete_category'])) {
    $delete_cate = $_GET['delete_category'];

    $delete_query = "DELETE FROM categories WHERE category_id = '$delete_cate'";
    $result = mysqli_query($mysqli, $delete_query);
    if($result) {
        echo "<script>alert('Delete success')</script>";
        echo "<script>window.open('./index.php?view_categories.php','_self')</script>";
    }
}
?>