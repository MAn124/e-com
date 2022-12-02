
<body>
    <h3 class="text-center text-success">All product</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr>
            <th>Product ID</th>
            <th>Product Title</th>
            <th>Product Image</th>
            <th>Product Price</th>
            <th>Total Sold</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php 
            $get_product = "SELECT * FROM products";
            $result = mysqli_query($mysqli, $get_product) or die(mysqli_error($mysqli));
            $number = 0;
            while($row = mysqli_fetch_array($result)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_image = $row['product_images1'];
            $product_price = $row['product_prices'];
            $product_status = $row['status'];
            $number++;
            echo " <tr class='text-center'>
            <td>$number</td>
            <td>$product_title</td>
            <td><img id='product_images' src='./product_images/$product_image'</td>
            <td> $product_price </td>
            <td>0</td>
            <td> $product_status</td>
            <td><a href='index.php?edit_product=<?php echo $product_id ?>'><i class='fa-solid fa-pen-to-square'></i></a></td>
            <td><a href='index.php?delete_product=<?php echo $product_id ?>'><i class='fa-solid fa-trash'></i></a></td>
        </tr>";
            };
        ?>
       
    </tbody>
</table>
