<h3 class="text-center text-success">
    All Categories
</h3>
<table class="table-bordered mt-5">
    <thead class="bg-info">
        <tr class="text-center">
            <th>No</th>
            <th>Category title</th>
            <th>Edit</th>
            <th>Delete</th>
            
        </tr>
    </thead>
    <tbody class="bg-secondary tex-light">
        <?php
            $select_cate = "SELECT * FROM categories";
            $result = mysqli_query($mysqli, $select_cate) or die(mysqli_error($mysqli));
            $num = 0;
            while($row = mysqli_fetch_array($result)){
                $category_id = $row['category_id'];
                $category_title = $row['category_title'];
                $num++;
            
        ?>
            <tr class="text-center"> 
                <td><?php echo $num ?></td>
                <td><?php echo $category_title ?></td>
                <td><a href='index.php?edit_category=<?php $category_id ?>'><i class='fa-solid fa-pen-to-square'></i></a></td>
                <td><a href='index.php?delete_category=<?php $category_id ?>'><i class='fa-solid fa-trash'></i></a></td>
            </tr>
            <?php } ?>
    </tbody>
</table>