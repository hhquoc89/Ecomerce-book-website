<div class="main-content">
    <div class="wrapper">
        <h1>Manage Book</h1>
        <br/><br/>

        <!-- button to add admin -->
        <br>
        <br><br><br>

        <a href="<?php echo SITEURL;?>admin/add_book.php" class='btn-primary'>Add Book</a>

        <br/><br/><br/>
        <?php
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        if(isset($_SESSION['remove']))
        {
            echo $_SESSION['remove'];
            unset($_SESSION['remove']);
        }
        if(isset($_SESSION['delete']))
        {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }
        if(isset($_SESSION['no-food-found']))
        {
            echo $_SESSION['no-food-found'];
            unset($_SESSION['no-food-found']);
        }
        if(isset($_SESSION['upload']))
        {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }
        if(isset($_SESSION['failed-remove']))
        {
            echo $_SESSION['failed-remove'];
            unset($_SESSION['failed-remove']);
        }
        if(isset($_SESSION['update']))
        {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }
        ?>

        <table class="tbl-full">
            <tr>
                <th>S.N</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Image</th>
            </tr>
            <?php
            //Create SQL
            $sql= "SELECT * FROM product";
            //Execute
            $res= mysqli_query($conn,$sql);
            //Count rows to check whether we have food or not
            $count = mysqli_num_rows($res);
            // Crate serial number
            $sn=1;
            if($count>0)
            {
                while($row=mysqli_fetch_assoc($res))
                {
                    //get the value
                    $id= $row['item_id'];
                    $brand= $row['item_brand'];
                    $name= $row['item_name'];
                    $price= $row['item_price'];
                    $image_name= $row['item_image'];
                    $item_register= $row['item_register'];
                    ?>
                    <tr>
                        <td><?php echo $sn++;?></td>
                        <td><?php echo $name;?></td>
                        <td><?php echo $brand;?></td>
                        <td><?php echo $price;?></td>
                        <td>
                            <?php
                            if($image_name==NULL)
                            {
                                echo "<div class='error'>Image not Added</div>";
                            }
                            else
                            {
                                ?>
                                <img src="<?php echo SITEURL;?><?php echo $image_name;?>"width='100px'>
                                <?php
                            }
                            ?>
                        </td>

                        <td>
                            <a href="<?php echo SITEURL;?>admin/update_book.php?id=<?php echo $id;?>" class="btn-secondary">Update Book</a>
                            <a href="<?php echo SITEURL;?>admin/delete_book.php?id=<?php echo $id;?>&image_name=<?php echo $image_name;?>" class="btn-danger">Delete Book</a>
                        </td>
                    </tr>
                    <?php
                }
            }
            else
            {
                echo "<tr><td colspan='7' class='error'>Book not Added Yet</td></tr>";
            }
            ?>

        </table>

    </div>
