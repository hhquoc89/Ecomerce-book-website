<div class="main-content">
    <div class="wrapper">
        <h1> Add Book </h1>

        <br> <br>
        <?php
        if(isset($_SESSION['upload']))
        {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }


        ?>
        <form action=""method="POST" enctype="multipart/form-data">
            <table class='tbl-30'>
                <tr>
                    <td>Name:</td>
                    <td>
                        <input type="text"name="item_name" placeholder="Title of the Book">
                    </td>
                </tr>
                <tr>
                    <td>Category:</td>
                    <td>
                        <input type="text"name="item_brand" placeholder="Type of the Book">
                    </td>
                </tr>
                <tr>

                    <td>Description</td>
                    <td>
                        <textarea type="text"name="item_description" cols="30" rows="5" placeholder="Description of the Book"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Price:</td>
                    <td>
                        <input type="number"name="item_price">
                    </td>
                </tr>
                <tr>
                    <td>Select Image:</td>
                    <td>
                        <input type="file" name="image" accept="image/*">
                    </td>
                </tr>
                <tr>
                    <td>Date:</td>
                    <td>
                        <input type="datetime-local"  name="item_register">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Food"class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
        <?php
        // Check button clicked or not
        if(isset($_POST['submit']))
        {
            // 1.Get the data
            $item_name=$_POST['item_name'];
            $item_description=$_POST['item_description'];
            $item_price=$_POST['item_price'];
            $item_brand=$_POST['item_brand'];
            $item_register=$_POST['item_register'];
            // For radio input, we check featured or active is selected or not

            // 2.Upload Image
            if (isset($_FILES['image']['name']))
            {
                //Upload the image
                // To upload image we need image name,source path and destination path
                $image_name=$_FILES['image']['name'];

                if($image_name!="")
                {

                    // Auto Rename our Image
                    // Get the Extension of our image(jpg,png,gif,etc,..)
                    $temp=explode('.',$image_name);
                    $ext =end($temp);
                    // Rename the image
                    $image_name = "./assets/Book-".round(microtime(true)).".".$ext; // Food_Category_431.jpg

                    $source_path=$_FILES['image']['tmp_name'];

                    $destination_path=".".$image_name;

                    // Finally
                    $upload= move_uploaded_file($source_path,$destination_path);

                    // Check image is uploaded or not
                    // If not uploaded -> stop process and redirect with error message
                    if($upload==false)
                    {
                        $_SESSION['upload']="<div class='error'>Failed to Upload Book Image.</div>";
                        header("location:".SITEURL.'admin/add_book.php');
                        die();  //Stop process
                    }
                }
            }
            else
            {
                //Don't upload and set value as blank
                $image_name="";
            }

            // 3. Create SQL query to insert
            $sql2= "INSERT INTO product SET
                    item_brand='$item_brand',
                    item_name='$item_name',
                    item_description='$item_description',
                    item_price='$item_price',
                    item_image='$image_name',
                    item_register='$item_register'
                ";

            // 4. Execute the query

            $res2 = mysqli_query($conn,$sql2);

            // 5. Check the query executed or not and data add or not
            if ($res2==true)
            {
                //Done
                $_SESSION['add']="<div class='success'>Book Added Successfully.</div>";
                header("location:".SITEURL.'admin/manage_book.php');
            }
            else
            {
                //Fail
                $_SESSION['add']="<div class='error'>Failed to Add Book.</div>";
                header("location:".SITEURL.'admin/manage_book.php');

            }
        }

        ?>
    </div>
</div>
