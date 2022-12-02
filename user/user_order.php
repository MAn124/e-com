<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $username = $_SESSION['username'];
        $get_user = "SELECT * FROM user WHERE user_name = '$username'";
        $result = mysqli_query($mysqli, $get_user);
        $row = mysqli_fetch_array($result) or die(mysqli_error($mysqli));
        $user_id = $row['user_id']; 
    ?>
    <h3 class="text-success">All orders</h3>
    <table class="table tabel-bordered mt-5">
        <thead class="bg-info">
            <tr>
                <th>SL NO</th>
                <th>Amount</th>
                <th>Total product</th>
                <th>Invoice</th>
                <th>Date</th>
                <th>Complete</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody class="bg-secondary text-light">
            <?php 
                $get_order = "SELECT * FROM order WHERE user_id = '$user_id'";
                $result_get = mysqli_query($mysqli, $get_order) or die(mysqli_error($mysqli));
                while($row_result = mysqli_fetch_array($result_get)){
                    $order_id = $row_result['order_id'];
                    $order_amount = $row_result['order_amount'];
                    $total_product = $row_result['total_product'];
                    $order_invoice = $row_result['order_invoice'];
                    $order_status = $row_result['order_status'];
                    $order_date = $row_result['order_date'];
                    $number = 1;
                    echo " <tr>
                    <td>$number</td>
                    <td>$order_amount</td>
                    <td>  $total_product</td>
                    <td> $order_invoice </td>
                    <td>$order_date</td>
                    <td> $order_status</td>
                    <td><a class='text-light' href='confirm_payment.php?order_id=$order_id'>Cofirm</a></td>
                </tr>";
                }
            ?>
           
        </tbody>
    </table>
</body>
</html>