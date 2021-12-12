<?php
ob_start();
require ('mysqli_connect.php');
session_start();
include ('header.php');

include ('helper.php');

$user = array();

//check user login & get user id
$is_user_logged_in = isset($_SESSION['userID']) ? true: false; // day ne
if( !$is_user_logged_in ){
    header("Location: login.php");
}
$userID = $_SESSION['userID'];
$user = get_user_info($con, $userID);
//end check user login & get user id
// cai nay de o tren chu, de dau thi de

?>

<section id="main-site">
    <div class="container py-5">
        <div class="row">
            <div class="col-4 offset-4 shadow py-4">
                <div class="upload-profile-image d-flex justify-content-center pb-5">
                    <div class="text-center">
                        <img class="img rounded-circle" style="width: 200px; height: 200px;" src="<?php echo isset($user['profileImage']) ? $user['profileImage'] : './assets/profile/beard.png'; ?>" alt="">
                        <h4 class="py-3">
                            <?php
                            if(isset($user['firstName'])){
                                printf('%s %s', $user['firstName'], $user['lastName'] );
                            }
                            ?>
                        </h4>
                    </div>
                </div>

                <div class="user-info px-3">
                    <ul class="font-ubuntu navbar-nav">
                        <li class="nav-link" style="color: black"><b>First Name: </b><span><?php echo isset($user['firstName']) ? $user['firstName'] : ''; ?></span></li>
                        <li class="nav-link" style="color: black"><b>Last Name: </b><span><?php echo isset($user['lastName']) ? $user['lastName'] : ''; ?></span></li>
                        <li class="nav-link" style="color: black"><b>Email: </b><span><?php echo isset($user['email']) ? $user['email'] : ''; ?></span></li>
                    </ul>
                </div>

            </div>
        </div>
        <br>
        <h2 class="font-rubik font-size-20">Order Information</h2>
        <div class="table-wrapper">
            <table class="fl-table">
                <thead>
                <tr>
                    <th>S.N</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Created Date</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if($is_user_logged_in) // check cai nay chi check coi thu userid nao thi lay order id do, tao laiokieu . Cai function check user loggin in dau?
                {
                    //cai view dau?
                    //la sao ta ,
                    //Order detail

                    $orderID = isset($_GET['id']) ? $_GET['id'] : false;
                    if(!$orderID){
                        exit(header('Location:'.SITEURL.'user.php'));
                    }
                    //  Get all the orders from database
                    $sql= "SELECT * FROM `order_item`  WHERE order_id='$orderID' ";
                    // Exec
                    $res= mysqli_query($con,$sql);

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
                        echo "<tr><td colspan='12' class ='error'>Order Item not found!</td></tr>";
                    }
                }
                ?>

                <tbody>
            </table>
        </div>

    </div>
</section>

<?php
include ('footer.php');
ob_end_flush();
?>

