<div class="main-content">
    <div class="wrapper">
        <h1>Manage Order</h1>
        <!-- button to add admin -->

        <br><br><br>
        <?php
        if(isset($_SESSION['update']))
        {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }
        ?>
        <br><br>
        <table class="tbl-full">
            <tr>
                <th>S.N</th>
                <th>Customer name</th>
                <th>Total Bill</th>
                <th>Created Date</th>
                <th>Status</th>

            </tr>

            <?php
            //  Get all the orders from database
            $sql= "SELECT id,userID,customer_name, total, status, created_date FROM `order` ORDER BY id DESC"; // Latest Order
            // Exec
            $res= mysqli_query($conn,$sql);
            // Count
            $count= mysqli_num_rows($res);

            $sn=1;//Default
            if($count>0)
            {
                // Available
                while($row = mysqli_fetch_assoc($res))
                {
                    $id=$row['id'];
                    $userID=$row['userID'];
                    $customer_name=$row['customer_name'];
                    $total= $row['total']; //total
                    $status=$row['status'];
                    $created_date=$row['created_date'];
                    ?>

                    <tr>
                        <td><?php echo $sn++?></td>
                        <td><?php echo $customer_name?></td>
                        <td><?php echo $total?></td>
                        <td><?php echo $created_date?></td>

                        <td>
                            <?php
                            if($status=="pending")
                            {
                                echo "<label>$status</label>";
                            }
                            elseif($status=="On Delivery")
                            {
                                echo "<label style='color:orange;'>$status</label>";
                            }
                            elseif($status=="Delivered")
                            {
                                echo "<label style='color:green;'>$status</label>";
                            }
                            elseif($status=="Be Cannel")
                            {
                                echo "<label style='color:red;'>$status</label>";
                            }
                            ?>
                        </td>

                        <td>
                            <a href="<?php echo SITEURL;?>admin/order_item.php?id=<?php echo $id;?>" class="btn-primary">View </a>
                        </td>
                        <br>
                        <td>
                            <a href="<?php echo SITEURL;?>admin/update_order.php?id=<?php echo $id;?>" class="btn-secondary">Update </a>
                        </td>
                    </tr>

                    <?php
                }
            }
            else
            {
                echo "<tr><td colspan='12' class ='error'>Order not Available</td></tr>";
            }
            ?>
        </table>

    </div>
</div>
