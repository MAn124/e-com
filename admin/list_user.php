<h3 class="text-center text-success">
    All users
</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <?php
            $get_user  = "SELECT * FROM user";
            $result = mysqli_query($mysqli, $get_user);
            $row = mysqli_num_rows($result);
            if($row == 0) {  
                 echo "<h2 class='text-danger text-center pt5'>No users</h2>";
            } else {
                echo " <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody class='bg-secondary text-light'></tbody>";
            $num = 0;
            while($row_data = mysqli_fetch_array($result)) {
                $user_id = $row_data['user_id'];
                $user_name = $row_data['user_name'];
                $user_email = $row_data['user_email'];
                $user_password = $row_data['user_password'];
                $user_address = $row_data['user_address'];
                $user_phone = $row_data['user_phone'];
                $num++;
                echo "   <tr>
                <td>$num</td>
                <td>$user_name</td>
                <td>$user_email</td>
                <td>$user_address</td>
                <td>$user_phone</td>
                
               </tr>";
            }
            }
        ?>
    
    
</table>