<?php
ob_start();
require ('mysqli_connect.php');

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
                        <th>Total Bill</th>
                        <th>Created Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if($is_user_logged_in) // check cai nay chi check coi thu userid nao thi lay order id do, tao laiokieu . Cai function check user loggin in dau?
                    {
                     //cai view dau?
                        //la sao ta ,
                        //Order detail

                        //  Get all the orders from database
                        $sql= "SELECT id,userID, total, status, created_date FROM `order`  WHERE userID='$userID' ORDER BY id DESC"; // Latest Order
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
                                $userID=$row['userID'];
                                $total= $row['total']; //total
                                $status=$row['status'];
                                $created_date=$row['created_date'];
                                ?>

                                <tr>
                                    <td><?php echo $sn++?></td>
                                    <td><?php echo $total?></td>
                                    <td><?php echo $created_date?></td>

                                    <td>
                                        <?php
                                        if($status=="pending")
                                        {
                                            echo "<label>$status</label>";
                                        }
                                        elseif($status=="On Delivery")
                                        {
                                            echo "<label style='color:orange;'>$status</label>";
                                        }
                                        elseif($status=="Delivered")
                                        {
                                            echo "<label style='color:green;'>$status</label>";
                                        }
                                        elseif($status=="Be Cannel")
                                        {
                                            echo "<label style='color:red;'>$status</label>";
                                        }
                                        ?>
                                    </td>

                                    <td>
                                        <a href="<?php SITEURL ?>order-detail.php?id=<?php echo $id;?>" class="btn-primary" style="text-decoration: none;">View Detail </a>
                                    </td>
                                    <br>
                                </tr>

                                <?php
                            }
                        }
                        else
                        {
                            echo "<tr><td colspan='12' class ='error'>Order Item not Available</td></tr>";
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

