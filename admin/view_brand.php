<h3 class="text-center text-success">
    All Brand
</h3>
<table class="table-bordered mt-5">
    <thead class="bg-info">
        <tr class="text-center">
            <th>No</th>
            <th>Brand title</th>
            <th>Edit</th>
            <th>Delete</th>
            
        </tr>
    </thead>
    <tbody class="bg-secondary tex-light">
        <?php
            $select_cate = "SELECT * FROM brand";
            $result = mysqli_query($mysqli, $select_cate);
            $num = 0;
            while($row = mysqli_fetch_array($result)){
                $brand_id = $row['brand_id'];
                $brand_title = $row['brand_title'];
                $num++;
            
        ?>
            <tr class="text-center"> 
                <td><?php echo $num ?></td>
                <td><?php echo $brand_title ?></td>
                <td><a href='index.php?edit_brand=<?php $brand_id ?>'><i class='fa-solid fa-pen-to-square'></i></a></td>
                <td><a href='index.php?delete_brand=<?php $brand_id ?>'><i class='fa-solid fa-trash'></i></a></td>
            </tr>
            <?php } ?>
    </tbody>
</table>