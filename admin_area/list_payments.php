<h3 class="text-center text-success">All Payments</h3>

<table class="table table-bordered mt-5">
    <thead class="bg-info text-center">

        <?php
        $select_payments = "Select * from user_payments";
        $result_payments = mysqli_query($con, $select_payments);
        $row_count = mysqli_num_rows($result_payments);
        echo "<tr>
        <th>Sr No</th>
        <th>Invoice Number</th>
        <th>Amount</th>
        <th>Payment Mode</th>
        <th>Order Date</th>
        <th>Delete</th>
    </tr>
</thead>
<tbody class='bg-secondary text-light text-center'>";
        if ($row_count == 0) {
            echo "<h2 class='text-danger text-center mt-5'>No Payments Yet</h2>";
        } else {
            $number = 0;
            while ($row = mysqli_fetch_assoc($result_payments)) {
                $payment_id = ($row['payment_id']);
                $order_id = ($row['order_id']);
                $invoice_number = $row['invoice_number'];
                $payment_mode = $row['payment_mode'];
                $date = $row['date'];
                $amount = $row['amount'];
                $number++;
        ?>
                <tr class='text-center'>
                    <td><?php echo $number; ?></td>
                    <td><?php echo $invoice_number; ?></td>
                    <td><?php echo $amount; ?></td>
                    <td><?php echo $payment_mode; ?></td>
                    <td><?php echo $date; ?></td>

                    <td><a href='index.php?delete_payments=<?php echo $payment_id; ?>' class='text-light' data-toggle="modal" data-target="#exampleModal" type="button"><i class='fa-solid fa-trash'></i></a></td>

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
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><a class="text-light text-decoration-none" href="./index.php?list_payments">NO</a></button>

                <button type="button" class="btn btn-primary"><a href='index.php?delete_payments=<?php echo $payment_id ?>' class="text-light text-decoration-none">YES</a></button>
            </div>
        </div>
    </div>
</div>