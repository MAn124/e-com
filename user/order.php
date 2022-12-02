<?php
    include '../config/connect.php';
     include '../function/common_function.php';

     if(isset($_GET['user_id'])) {
        $user_id = $_GET['user_id'];
     }

     $ip = getIPAddress();
     $total_price = 0;
     $cart_query = "SELECT * FROM cart_detail WHERE ip_address = '$ip'";
     $invoice_number = mt_rand();
     $status = 'pending';
     $result_cart = mysqli_query($mysqli, $cart_query) or die(mysqli_error($mysqli));
     $count_product = mysqli_num_rows($result_cart);
     while($row_prices = mysqli_fetch_array($result_cart)){
        $product_id = $row_prices['product_id'];
        $select_product = "SELECT * FROM products WHERE product_id = '$$product_id'";
        $run_prices = mysqli_query($mysqli, $select_product) or die(mysqli_error($mysqli));
        while($row_product_price = mysqli_fetch_array($run_prices)) {
            $product_price =array($row_product_price['product_prices']);
            $product_price_sum =array_sum($product_price);
            $total_price += $product_price_sum;
        }
     }
    //  
    $get_cart = "SELECT * FROM cart_detail ";
    $run_query = mysqli_query($mysqli, $get_cart);
    $get_item_quantity = mysqli_fetch_array($run_query);
    $quantity = $get_item_quantity['quantity'];
    if($quantity == 0) {
        $quantity =1;
        $subtotal = $total_price;
    } else {
        $quantity = $quantity;
        $subtotal = $total_price*$quantity;
    }

    $insert_order = "INSERT INTO order (user_id, order_amount,
     order_invoice, total_product, order_date, order_status)
     VALUES ('$user_id','$subtotal', '$invoice_number',
      '$count_product',NOW(), '$status') " ;
      $result_query = mysqli_query($mysqli, $insert_order) or die(mysqli_error($mysqli));
      if($result_query) {
        echo "<script>alert('Order submit success')</script>";
        echo "<script>window.open('profile.php', '_self')</script>";
      }

    //   
    $insert_pending_order = "INSERT INTO order_pending (user_id, 
     order_number,product_id, quantity, order_status)
     VALUES ('$user_id', '$invoice_number',
      '$product_id',$quantity, '$status') " ;
      $result_pending_query = mysqli_query($mysqli, $insert_pending_order) or die(mysqli_error($mysqli));
    //   
    $empty_cart = "DELETE FROM cart_detail WHERE ip_address = '$ip'";
    $result_delete = mysqli_query($mysqli, $empty_cart) or die(mysqli_error($mysqli));
    
?>