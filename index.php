<?php
ob_start();
// include header.php file
include ('header.php');
include ('helper.php');
if(isset($_SESSION['userID'])){
    require ('mysqli_connect.php');
    $user = get_user_info($con, $_SESSION['userID']);
}
?>

<?php

/*  include banner area  */
include ('Template/banner_area.php');
/*  include banner area  */

/*  include top sale section */
include ('Template/top_sale.php');
/*  include top sale section */

/*  include special price section  */
include ('Template/special_price.php');
/*  include special price section  */

/*  include banner ads  */
include ('Template/banner_ads.php');
/*  include banner ads  */

/*  include new phones section  */
include ('Template/new_books.php');
/*  include new phones section  */

/*  include blog area  */
include ('Template/blogs.php');
/*  include blog area  */

?>


<?php
// include footer.php file
include ('footer.php');
?>