<div class="main-content">
    <div class="wrapper">
        <h1>Update Book</h1>
        <br><br>
        <?php
        $id = $_GET['id'];
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];
                $sql2="select * from product where item_id=$id";
                $res2 =mysqli_query($conn,$sql2);
                $count2=mysqli_num_rows($res2);
                if($count2==1)
                {
                    $row2 = mysqli_fetch_assoc($res2);
                    $id= $row2['item_id'];
                    $category= $row2['item_brand'];
                    $name= $row2['item_name'];
                    $description=$row2['item_description'];
                    $price= $row2['item_price'];
                    $current_image = $row2['item_image'];
                    $item_register= $row2['item_register'];
                }
                else{
                    $_SESSION['no-book-found']="<div class='error'>Book not found</div>";
                     header('Location:'.SITEURL.'admin/manage_book.php');
                }
            }
            else{
                header('Location:'.SITEURL.'admin/manage_book.php');
            }
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Name:</td>
                    <td>
                        <input type="text" name="item_name" value="<?php echo $name; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Category:</td>
                    <td>
                        <input type="text" name="item_brand" value="<?php echo $category; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Description::</td>
                    <td>
                        <textarea name="item_description" cols="30" rows="5" > <?php echo $description; ?></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Price:</td>
                    <td>
                        <input type="number" name="item_price" value="<?php echo $price; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Current image:</td>
                    <td>
                        <?php
                        if($current_image!=""){
                            ?>
                            <img src="<?php echo SITEURL; ?><?php echo $current_image; ?>" width="100px" alt="">
                            <?php
                        }
                        else{
                            echo "<div class='error'>Image Not Added</div>";
                        }
                        ?>
                    </td>
                </tr>

                <tr>
                    <td>New Image:</td>
                    <td>
                        <input type="file" name="image" id="">
                    </td>

                </tr>
                <tr>
                    <td>Date:</td>
                    <td>
                        <input type="datetime-local"  name="item_register">
                    </td>
                </tr>


                <tr>
                    <td>
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Book" class="btn-secondary">

                    </td>
                </tr>

            </table>
        </form>

            <?php
            if(isset($_POST['submit']))
            {
                // 1.Get the data
                $item_name=$_POST['item_name'];
                $item_brand=$_POST['item_brand'];
                $item_description=$_POST['item_description'];
                $item_price=$_POST['item_price'];
                $item_brand=$_POST['item_brand'];
                $item_register=$_POST['item_register'];
                if(isset($_FILES['image']['name']))
                {
                    $image_name=$_FILES['image']['name'];
                    if($image_name !="")
                    {
                        //.A upload new image
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
                        if($upload=false)
                        {
                            $_SESSION['upload']="<div class='error'>Failed to Upload Image.</div>";
                            header("location:".SITEURL.'admin/manage-food.php');
                            die();  //Stop process
                        }
                        //B.Remove image

                        if($current_image!="")
                        {
                            $remove_path=".".$current_image;
                            $remove=unlink($remove_path);
                            if($remove==false)
                            {
                                $_SESSION['failed-remove']="<div class='error'>Failed to Remove Current Image</div>";
                                header('location:'.SITEURL.'admin/manage_book.php');
                                die();
                            }
                        }

                    }
                    else{
                        $image_name=$current_image;
                    }
                }
                else{
                    $image_name=$current_image;
                }
                $sql3="update product set 
                            item_name='$item_name',
                            item_brand='$item_brand',
                            item_description='$item_description',                        
                            item_price=$item_price,
                            item_image='$image_name', 
                            item_register='$item_register'
                            WHERE item_id=$id;";


                $res3=mysqli_query($conn,$sql3);

                    if($res3==true)
                    {
                        $_SESSION['update']="<div class='success'>Update Successfully</div>";
                        header('location:'.SITEURL.'admin/manage_book.php');
                    }
                    else
                    {
                        $_SESSION['update']="<div class='error'>Failed to Update Food</div>";
                        header('location:'.SITEURL.'admin/manage_book.php');
                    }
                }

            ?>
    </div>
    </div>
