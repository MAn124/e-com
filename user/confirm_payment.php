<?php
   include '../config/connect.php';
   include '../function/common_function.php';
   session_start();
   if(isset($_GET['order_id'])){
      $order_id = $_GET['order_id'];
      $select_data = "SELECT * FROM order WHERE order_id = '$order_id'";
      $result = mysqli_query($mysqli, $select_data);
      $row = mysqli_fetch_array($result);
      $invoice_number = $row['invoice_number'];
      $order_amount = $row['order_amount'];
   }
   if(isset($_POST['confirm_payment'])) {
      $invoice_number = $_POST['invoice_number'];
      $amount = $_POST['amount'];
      $payment_mode = $_POST['payment_mode'];
      $insert_query = "INSERT INTO user_payment (order_id,
      invoice_number, amount, payment_mode) VALUES ('$order_id','$invoice_number','$amount','$payment_mode')";
      $result_confirm = mysqli_query($mysqli, $insert_query);
      
   }
   ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <script src="https://kit.fontawesome.com/78455fa1a9.js" crossorigin="anonymous"></script>
   <title>Document</title>
</head>
<body class="bg-secondary">
   <div class="container my-5">
      <form action="" method="post">
         <div class="form-outline my-4 text-center w-50 m-auto">
            <input value="<?php echo $invoice_number ?>" name="invoice_number" type="text" class="form-control w-50 m-auto">
         </div>
         <div class="form-outline my-4 text-center w-50 m-auto">
            <label for="">Amount</label>
            <input value="<?php echo $order_amount ?> name="amount" type="text" class="form-control w-50 m-auto">
         </div>
         <div class="form-outline my-4 text-center w-50 m-auto">
            <select name="payment_mode" id="">
               <option value="">Select payment</option>
               <option value="">UPI</option>
               <option value="">Internet Banking</option>
               <option value="">Paypal</option>
               <option value="">payoffline</option>
            </select>
         </div>
         <div class="form-outline my-4 text-center w-50 m-auto">
           <input type="submit" value="Confirm" class="bg-info py-2 px-3 border-0">
         </div>
      </form>
   </div>
</body>
</html>