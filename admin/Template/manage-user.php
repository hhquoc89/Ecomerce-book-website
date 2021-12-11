<div class="main-content">
    <div class="wrapper">
        <h1>Manage User</h1>
        <?php
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }

        if(isset($_SESSION['delete']))
        {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }

        if(isset($_SESSION['update']))
        {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }
        if(isset($_SESSION['user-not-found']))
        {
            echo $_SESSION['user-not-found'];
            unset($_SESSION['user-not-found']);
        }
        if(isset($_SESSION['pwd-not-match']))
        {
            echo $_SESSION['pwd-not-match'];
            unset($_SESSION['pwd-not-match']);
        }
        if(isset($_SESSION['change-pwd']))
        {
            echo $_SESSION['change-pwd'];
            unset($_SESSION['change-pwd']);
        }


        ?>
        <br><br>
        <table class="tbl-full">
            <tr>
                <th>S.N</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Register Date</th>
                <th>Action</th>
            </tr>
            <?php
            $sql = "SELECT *  FROM user";
            $res = mysqli_query($conn,$sql);
            if ($res ==true)
            {
                $count=mysqli_num_rows($res);
                $sn=1;
                if($count>0)
                {
                    while($rows = mysqli_fetch_array($res))
                    {
                        $id=$rows['userID'];
                        $firstName=$rows['firstName'];
                        $lastName=$rows['lastName'];
                        $email=$rows['email'];
                        $phone=$rows['contact'];
                        $address=$rows['address'];
                        $registerDate=$rows['registerDate'];



                        // display admin information
                        ?>

                        <tr>
                            <td><?php echo $sn++; ?>.</td>
                            <td> <?php echo $firstName; ?> </td>
                            <td> <?php echo $lastName; ?> </td>
                            <td> <?php echo $email; ?> </td>
                            <td> <?php echo $phone; ?> </td>
                            <td> <?php echo $address; ?> </td>
                            <td> <?php echo $registerDate; ?> </td>
                            <td>
                                <a href="<?php echo SITEURL; ?>admin/update_password_user.php?id=<?php echo $id;?>" class="btn-primary">Change Passwords</a>
                                <a href="<?php echo SITEURL; ?>admin/update_user.php?id=<?php echo $id;?>" class="btn-secondary">Update</a>
                                <a href="<?php echo SITEURL; ?>admin/delete_user.php?id=<?php echo $id;?>" class="btn-danger">Delete</a>
                            </td>
                        </tr>
                        <?php

                    }
                }
                else{

                }
            }
            ?>



        </table>

    </div>
</div>
