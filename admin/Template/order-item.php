<div class="main-content">
    <div class="wrapper">
        <h1>Order Item</h1>
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
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Created Date</th>

            </tr>

            <?php
            if(isset($_GET['id']))
            {
                //Order detail
                $order_id =$_GET['id'];
                //  Get all the orders from database
                $sql= "SELECT * FROM `order_item` WHERE order_id = '$order_id' "; // Latest Order
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
                        $name=$row['name'];
                        $price=$row['price'];
                        $qty=$row['qty'];
                        $total= $row['total']; //total
                        $created_date=$row['created_date'];
                        ?>

                        <tr>
                            <td><?php echo $sn++?></td>
                            <td><?php echo $name?></td>
                            <td><?php echo $price?></td>
                            <td><?php echo $qty?></td>
                            <td><?php echo $total?></td>
                            <td><?php echo $created_date?></td>

                        </tr>

                        <?php
                    }
                }
                else
                {
                    echo "<tr><td colspan='12' class ='error'>Order Item not Available</td></tr>";
                }
            }
            else
            {
                // Redirect Order Page
                header('Location:'.SITEURL.'admin/manage_order.php');
            }
            ?>
        </table>

    </div>
</div>

