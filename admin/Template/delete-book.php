<?php
include('../config/constants.php');

if(isset($_GET['id']) and isset($_GET['image_name']))
{
    $id = $_GET['id'];;
    $image_name = $_GET['image_name'];

    if($image_name !="")
    {
        $path=".".$image_name;
        $remove =unlink($path);

        if($remove==false)
        {
            $_SESSION['remove']="<div class='error'>Failed to remove Book Image</div>";
            header('location:'.SITEURL.'admin/manage_book.php');
            die();
        }
    }

    $sql="DELETE FROM `product` WHERE `product`.`item_id` = $id";
    $res =mysqli_query($conn,$sql);
    if($res==true)
    {
        $_SESSION['delete']="<div class='success'>Book deleted successfully.</div>";
        header('Location:'.SITEURL.'admin./manage_book.php');

    }
    else{
        $_SESSION['delete']="<div class='error'>Failed to delete Book</div>";
        header('Location:'.SITEURL.'admin/manage_book.php');
    }
}
else
{
    $_SESSION['remove']="<div class='error'>Failed to remove Food Image</div>";
    header('Location:'.SITEURL.'admin/manage_book.php');
}
?>