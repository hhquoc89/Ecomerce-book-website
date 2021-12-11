

<div class= "main-content">
    <div class='wrapper'>
        <h1>Update User</h1>

        <br><br>

        <?php
        //1.Get the Id of Selected Admin
        $id=$_GET['id'];
        //2. Create SQL query
        $sql="SELECT * FROM user WHERE userID=$id";
        //3. Execute
        $res=mysqli_query($conn,$sql);
        // Check execute or not
        if($res==true)
        {
            // Check data is available or not
            $count = mysqli_num_rows($res);
            // Check admin data or not
            if($count==1)
            {
                //Get details
                // echo 'Admin Available';
                $rows=mysqli_fetch_assoc($res);
                $firstName=$rows['firstName'];
                $lastName=$rows['lastName'];
                $email=$rows['email'];
                $phone=$rows['contact'];
                $address=$rows['address'];
                $registerDate=$rows['registerDate'];
            }
            else
            {
                // Redirect to Manage Admin
                header('location:'.SITEURL.'admin/manage_user.php');
            }
        }
        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>First Name:</td>
                    <td>
                        <input type="text" name="firstName" value="<?php echo $firstName; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Last Name:</td>
                    <td>
                        <input type="text" name="lastName" value="<?php echo $lastName; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Email:</td>
                    <td>
                        <input type="text" name="email" value="<?php echo $email; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Phone:</td>
                    <td>
                        <input type="text" name="contact" value="<?php echo $phone; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td>
                        <input type="text" name="address" value="<?php echo $address; ?>">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update User"class="btn-secondary">
                    </td>
                </tr>


            </table>
        </form>
    </div>
</div>
<?php


//  Check whether the Submit Button is Clicked or not
if(isset($_POST['submit']))
{
    // echo "Button Clicked";
    // Get all values from form to update
    $id= $_POST['id'];
    $firstName= $_POST['firstName'];
    $lastName=$_POST['lastName'];
    $email=$_POST['email'];
    $phone=$_POST['contact'];
    $address=$_POST['address'];

    // Create a SQL Query to update User
    $sql ="UPDATE user SET
        firstName='$firstName',
        lastName ='$lastName',
        email='$email',
        contact='$phone',
        address='$address'
        WHERE userID = '$id'
        ";

    // Execute the Query
    $res = mysqli_query($conn,$sql);
    // Check successfully or not
    if ($res==true)
    {
        // Done
        $_SESSION['update'] = "<div class ='success'>User Updated Successfully</div>";
        // Redirect to Admin Page
        header("location:".SITEURL.'admin/manage_user.php');
    }
    else
    {
        // Fail
        $_SESSION['update'] = "<div class ='error'>Failed to Update User </div>";
        // Redirect to Admin Page
        header("location:".SITEURL.'admin/manage_user.php');
    }
}
?>



