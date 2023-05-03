<h3 class="text-center text-success">All Users</h3>

<table class="table table-bordered mt-5">
    <thead class="bg-info text-center">

        <?php


        $select_users = "Select * from user_table";
        $result_users = mysqli_query($con, $select_users);
        $row_count = mysqli_num_rows($result_users);

        echo "<tr>
        <th>Sr No</th>
        <th>UserName</th>
        <th>User Email</th>
        <th>User Image</th>
        <th>User Address</th>
        <th>User Mobile</th>
        <th>Delete</th>
    </tr>
</thead>
<tbody class='bg-secondary text-light text-center'>";
        if ($row_count == 0) {
            echo "<h2 class='text-danger text-center mt-5'>No Registrations Yet</h2>";
        } else {


            $number = 0;
            while ($row = mysqli_fetch_assoc($result_users)) {
                $user_id = ($row['user_id']);
                $username = ($row['username']);
                $user_email = $row['user_email'];
                $user_image = $row['user_image'];
                $user_address = $row['user_address'];
                $user_mobile = $row['user_mobile'];
                $number++;

        ?>
                <tr class='text-center'>
                    <td><?php echo $number; ?></td>
                    <td><?php echo $username; ?></td>
                    <td><?php echo $user_email; ?></td>
                    <td><img src='../users_area/user_images/<?php echo $user_image; ?>' alt='<?php echo $username; ?>' class='cart_img'></td>
                    <td><?php echo $user_address; ?></td>
                    <td><?php echo $user_mobile; ?></td>

                    <td><a href='index.php?delete_users=<?php echo $user_id; ?>' class='text-light' data-toggle="modal" data-target="#exampleModal" type="button"><i class='fa-solid fa-trash'></i></a></td>

                </tr>
        <?php


            }
        }

        ?>



        </tbody>

</table>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <h4>Are you sure you want to delete this?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><a class="text-light text-decoration-none" href="./index.php?list_users">NO</a></button>

                <button type="button" class="btn btn-primary"><a href='index.php?delete_users=<?php echo $user_id ?>' class="text-light text-decoration-none">YES</a></button>
            </div>
        </div>
    </div>
</div>