<div class="main-content">
    <div class="wrapper">
        <h1>Update Order</h1>
        <br><br>


        <?php
        //Check whether id set or not
        if(isset($_GET['id']))
        {
            //Order detail
            $id =$_GET['id'];
            // All other details based on this id
            // Sql
            $sql= "SELECT * FROM `order` WHERE id='$id'";
            // Execute
            $res= mysqli_query($conn,$sql);
            // Count
            $count = mysqli_num_rows($res);

            if($count ==1)
            {
                // available
                $row = mysqli_fetch_assoc($res);

                $customer_name=$row['customer_name'];
                $customer_contact=$row['customer_contact'];
                $customer_email=$row['customer_email'];
                $customer_address=$row['customer_address'];
                $total=$row['total'];
                $created_date=$row['created_date'];
                $status=$row['status'];

            }
            else
            {
                // Redirect Order Page
                header('Location:'.SITEURL.'admin/manage_order.php');
            }
        }
        else
        {
            // Redirect Order Page
            header('Location:'.SITEURL.'admin/manage_order.php');
        }
        ?>


        <form action="" method="POST">
            <table class="tbl-30">
                <tr>

                    <td>
                        <input type="hidden" name="customer_name" value="<?php echo $customer_name;?>">
                    </td>
                </tr>
                <tr>

                    <td>
                        <input type="hidden" name="customer_contact" value="<?php echo $customer_contact;?>">
                    </td>
                </tr>
                <tr>

                    <td>
                        <input type="hidden" name="customer_email" value="<?php echo $customer_email;?>">
                    </td>
                </tr>
                <tr>

                    <td>
                        <input type="hidden" name="customer_address" ><?php echo $customer_address;?></input>
                    </td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>
                        <select name="status">
                            <option <?php if($status=="pending"){echo "selected";} ?> value="pending">Pending</option>
                            <option <?php if($status=="On Delivery"){echo "selected";} ?>value="On Delivery">On Delivery</option>
                            <option <?php if($status=="Delivered"){echo "selected";} ?>value="Delivered">Delivered</option>
                            <option <?php if($status=="Be Cannel"){echo "selected";} ?>value="Be Cannel">Cannel</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Date:</td>
                    <td>
                        <input type="datetime-local"  name="created_date">
                    </td>
                </tr>
                <tr>
                    <td clospan="2">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="hidden" name="total" value="<?php echo $total;?>">
                        <input type="submit" name="submit"value="Update " class="btn-secondary">
                    </td>
                </tr>
            </table>

        </form>

        <?php

        if(isset($_POST['submit']))
        {
            $id=$_POST['id'];
            $total =$_POST['total'];
            $status=$_POST['status'];
            $customer_name=$_POST['customer_name'];
            $customer_contact=$_POST['customer_contact'];
            $customer_email=$_POST['customer_email'];
            $customer_address=$_POST['customer_address'];
            $created_date=$_POST['created_date'];
            // Update values
            $sql2= "UPDATE `order` SET
                    customer_name='$customer_name',
                    customer_contact='$customer_contact',
                    customer_email='$customer_email',
                    customer_address='$customer_address',
                    total= '$total',
                    status='$status',
                    created_date='$created_date'
                    WHERE id='$id';
                ";

            // Execute
            $res2=mysqli_query($conn,$sql2);
            //Check update or not
            if($res2==true)
            {
                // Done
                $_SESSION['update'] = "<div class='success'>Order Updated Successfully</div>";
                header('location:'.SITEURL.'admin/manage_order.php');
            }
            else
            {
                //Undone
                $_SESSION['update'] = "<div class='error'>Failed to Update Order</div>";
                header('location:'.SITEURL.'admin/manage_order.php');
            }
        }
        ?>


    </div>
</div>
