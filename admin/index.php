<?php
ob_start();
// include header.php file
include ('header.php');

?>

    <div class="main-content">
        <div class="wrapper">
            <h1>Dashboard</h1>
            <br>


            <div class="col-4 text-center">

                <?php
                    $sql1="select * from product";
                    $res1=mysqli_query($conn,$sql1);
                    $count1=mysqli_num_rows($res1);
                    ?>
                    <h1><?php echo $count1; ?></h1>
                <br/>
                Books
            </div>

            <div class="col-4 text-center">

                <?php
                $sql2="select * from `order` where status='Delivered'";
                $res2=mysqli_query($conn,$sql2);
                $count2=mysqli_num_rows($res2);
                ?>
                <h1><?php echo $count2; ?></h1>
                <br/>
                Total Orders
            </div>

            <div class="col-4 text-center">


                <?php
                $sql4="select SUM(total) as Total from `order`";
                $res4=mysqli_query($conn,$sql4);
                $row4=mysqli_fetch_assoc($res4);
                $total_revenue=$row4['Total'];
                ?>
                <h1>$<?php echo $total_revenue; ?></h1>
                <br>
                Revenue Generated
            </div>

            <div class="clearfix"></div>

        </div>
    </div>

<?php
// include footer.php file
include ('footer.php');
?>