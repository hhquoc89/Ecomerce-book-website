<?php
ob_start();
// include header.php file
include ('header.php');
?>

<?php
/*  include cart items if it is not empty */
count($product->getData('cart')) ? include ('Template/order.php') :  include ('Template/notFound/cart_notFound.php');
/*  include cart items if it is not empty */
?>

<?php
// include footer.php file
include ('footer.php');
?>
