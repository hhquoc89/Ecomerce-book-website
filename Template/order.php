<?php

include('mysqli_connect.php');
include ('helper.php')
?>

<?php
    session_start();
    $is_user_logged_in = isset($_SESSION['userID']) ? true: false;
    if( !$is_user_logged_in ){
        header("Location: login.php");
    }
    $userID = $_SESSION['userID'];
    $user_info = get_user_info($con, $_SESSION['userID']);
    if(isset($_POST['submit_order'])) {
        $cart = $product->getData('cart'); // cho nay sai sai cho nay a moi code ma dung k
        if($user_info != null){
            $user_id = $user_info['userID'];
            $firstName = $user_info['firstName'];
            $lastName = $user_info['lastName'];
        }else{
            echo 'User must login to make order.';
            exit(0);
        }
        if (empty($cart)) {
            echo 'Cart is empty !';
            exit(0);
        }

        //create order
        $total = 0;
        foreach($cart as $item){
            //get qty from cart
            $qty = $item['quantity'];
            $_product = $product->getProduct($item['item_id']);
            $price = $_product[0]['item_price'];
            $subTotal = (int)$qty * (float)$price;
            $total += $subTotal;
        }

        $customer_name= $firstName . ' ' . $lastName;

        $status = 'pending';
        $created_date = date("Y-m-d h:i:s");

        $insert_order_query = "
        INSERT INTO `order` (`userID`,`customer_name`, `total`, `status`, `created_date`) VALUES
        ('$user_id','$customer_name', '$total', '$status', '$created_date')
        ";

        // Execute
        $insert_order_result = $con->query($insert_order_query);
        if($insert_order_result === TRUE){
            $order_id = $con->insert_id;
            //insert order item
            foreach ($cart as $item){
                $qty = $item['quantity'];;
                $_product = $product->getProduct($item['item_id']);
                $price = $_product[0]['item_price'];
                $product_id = $_product[0]['item_id'];
                $product_name = $_product[0]['item_name'];
                $subTotal = (int)$qty * (float)$price;
                $created_date = date("Y-m-d h:i:s");
                $insert_order_item_query = "
                INSERT INTO `order_item` (`order_id`, `product_id`, `name`, `price`, `qty`, `total`, `created_date`)
                VALUES
                ('$order_id', '$product_id', '$product_name', '$price', '$qty', '$subTotal', '$created_date')
                ";
                $insert_order_item_result = $con->query($insert_order_item_query);
            }
            // True and Order saved
            //todo: clear cart
            $clear_cart_query = "DELETE FROM `cart` WHERE `user_id` = $userID";
            $clear_cart_exec = $con->query($clear_cart_query);

            echo "<script>alert('Book Order Successfully')</script>";

            header('Location: index.php');
        }else{
            // Fail
            echo "<script>alert('Failed to Order Book')</script>";
            header('Location: order.php');
        }

    }

?>
<section id="order" class="py-3 mb-5">
        <!--  shopping cart items   -->
    <form action="" method="POST">
        <div class="row">
            <div class="col-sm-9">
                <?php
                foreach ($product->getData('cart') as $cart_row) :
                    $cart = $product->getProduct($cart_row['item_id']);
                    $subTotal[] = array_map(function ($item, $cart_row){
                        ?>
                        <!-- cart item -->
                        <div class="row border-top py-3 mt-3">

                            <div class="col-sm-2">
                                <img src="<?php echo $item['item_image'] ?? "./assets/products/1.png" ?>" style="height: 120px;" alt="cart1" class="img-fluid">
                            </div>
                            <div class="col-sm-8">
                                <h5 class="font-baloo font-size-20"><?php echo $item['item_name'] ?? "Unknown"; ?></h5>
                                <input type="hidden" name="book" value="<?php echo $item['item_name']; ?>">
                                <small>by <?php echo $item['item_brand'] ?? "Brand"; ?></small>
                                <!-- product rating -->
                                <div class="d-flex">
                                    <div class="rating text-warning font-size-12">
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="far fa-star"></i></span>
                                    </div>
                                    <a href="#" class="px-2 font-rale font-size-14">20,534 ratings</a>
                                </div>
                                <!--  !product rating-->

                                <!-- product qty -->
                                <div class="qty d-flex pt-2">
                                    <div class="d-flex font-rale w-25">

                                        <input type="text" name="qty" data-id="<?php echo $item['item_id'] ?? '0'; ?>" class="qty_input border px-2 w-100 bg-light" disabled value="<?php echo $cart_row['quantity'] ?>" placeholder="1">

                                    </div>

                                    <form method="post">
                                        <input type="hidden" value="<?php echo $item['item_id'] ?? 0; ?>" name="item_id">
                                        <button type="submit" name="delete-cart-submit" class="btn font-baloo text-danger px-3 " style="border-right: 1px solid gray;">Delete</button>
                                    </form>

                                    <form method="post">
                                        <input type="hidden" value="<?php echo $item['item_id'] ?? 0; ?>" name="item_id">
                                        <button type="submit" name="wishlist-submit" class="btn font-baloo text-danger">Save for Later</button>
                                    </form>
                                </div>
                                <!-- !product qty -->

                            </div>

                            <div class="col-sm-2 text-right">
                                <div class="font-size-20 text-danger font-baloo">
                                    $<span class="product_price" data-id="<?php echo $item['item_id'] ?? '0'; ?>"><?php echo $item['item_price'] * $cart_row['quantity'] ?? 0; ?></span>
                                    <input type="hidden" name="price" class="float-price" data-id="<?php echo $item['item_id'] ?? '0'; ?>" value="<?php echo $item['item_price']* $cart_row['quantity'] ?>">
                                </div>
                            </div>
                        </div>
                        <!-- !cart item -->
                        <?php
                        return $item['item_price'] * $cart_row['quantity'];
                    }, $cart, ['cart_row' => $cart_row]); // closing array_map function
                endforeach;
                ?>
            </div>

            <!-- subtotal section-->
            <div class="col-sm-3">
                <div class="sub-total border text-center mt-2">
                    <h6 class="font-size-12 font-rale text-success py-3"><i class="fas fa-check"></i> Your order is eligible for FREE Delivery.</h6>
                    <div class="border-top py-4">
                        <h5 class="font-baloo font-size-20">Subtotal ( <?php echo isset($subTotal) ? count($subTotal) : 0; ?> item):&nbsp; <span class="text-danger">$<span class="text-danger" id="deal-price"><?php echo isset($subTotal) ? $Cart->getSum($subTotal) : 0; ?></span> </span> </h5>
                        <input type="submit" name="submit_order" value="Confirm Order" class="btn btn-warning mt3">
                    </div>
                </div>
            </div>

        </div>
    </form>
</section>
