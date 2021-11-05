<!-- Start product -->
<?php
    $item_id = $_GET['item_id'] ?? 1;
    foreach ($product->getData() as $item):
        if($item['item_id']==$item_id):
?>
<section id="product" class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <img src="<?php echo $item['item_image'] ?? "./assets/1.png"?>" alt="product" class="img-fluid">
                <div class="form-row pt-4 font-size-16 font-baloo">
                    <div class="col">
                        <button type="submit" class="btn btn-danger form-control">Proceed to Buy</button>
                    </div>
                    <div class="col">
                        <?php
                        if (in_array($item['item_id'], $Cart->getCartId($product->getData('cart')) ?? [])){
                            echo '<button type="submit" disabled class="btn btn-success font-size-16 form-control">In the Cart</button>';
                        }else{
                            echo '<button type="submit" name="top_sale_submit" class="btn btn-warning font-size-16 form-control">Add to Cart</button>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 py-5">
                <h5 class="font-baloo font-size-20"><?php echo $item['item_name']?? "Unknown";?></h5>
                <Small><?php echo $item['item_brand']?? "Brand";?></Small>
                <div class="d-flex">
                    <div class="rating text-warning font-size-12">
                        <span class="fas fa-star "></i></span>
                        <span class="fas fa-star "></i></span>
                        <span class="fas fa-star "></i></span>
                        <span class="fas fa-star "></i></span>
                        <span class="far fa-star "></i></span>
                    </div>
                    <a href="#" class="px-2 font-rale font-size-14 text-decoration-none">2053 ratings | 100+ answer question</a>
                </div>
                <hr class="m-0">
                <!-- product price -->
                <table>
                    <tr class="font-rale font-size-14">
                        <strike class="text-muted">$162.00</strike>
                        <td>Deal Price : </td>
                        <td class="font-size-20 text-danger"> $ <span><?php echo $item['item_price']?? 0;?></span><small class="text-dark font-size-12">&nbsp;&nbsp;Inclusive of all taxes</small></td>
                    </tr>
                    <tr class="font-rale font-size-14">
                        <td>Save : </td>
                        <td class="font-size-20 text-success"> $ <span>10</span></td>
                    </tr>
                </table>
                <!-- Start Policy -->
                <div id="policy">
                    <div class="d-flex justify-content-around">
                        <div class="return text-center mr-5">
                            <div class="font-size-20 my-2 color-second ">
                                <span class="fas fa-retweet border p-3 rounded-pill"></span>
                            </div>
                            <a href="#" class="font-rale font-size-12 text-decoration-none">10 Days <br> Replacement</a>
                        </div>
                        <div class="return text-center mr-5">
                            <div class="font-size-20 my-2 color-second">
                                <span class="fas fa-truck  border p-3 rounded-pill"></span>
                            </div>
                            <a href="#" class="font-rale font-size-12 text-decoration-none">EBook <br>Delivered</a>
                        </div>
                        <div class="return text-center mr-5">
                            <div class="font-size-20 my-2 color-second">
                                <span class="fas fa-check-double border p-3 rounded-pill"></span>
                            </div>
                            <a href="#" class="font-rale font-size-12 text-decoration-none">1 Year <br>Warranty</a>
                        </div>
                    </div>
                </div>
                <!-- End Policy -->
                <hr>

                <!-- order detail -->
                <div id="order-details" class="font-rale d-flex flex-column text-dark">
                    <small>Delivery by : Mar 29  - Apr 1</small>
                    <small>Sold by <a href="#">Name Store </a>(4.5 out of 5 | 18,198 ratings)</small>
                    <small><i class="fas fa-map-marker-alt color-primary"></i>&nbsp;&nbsp;Deliver to Customer - 424201</small>
                </div>
                <!-- end order detail -->
                <br>
                <div class="col-6">
                    <!-- product qty section -->
                    <div class="qty d-flex">
                        <h6 class="font-baloo">Qty</h6>
                        <div class="px-4 d-flex font-rale">
                            <button data-id="pro1" class="qty-down border bg-light"><i class="fas fa-angle-down"></i></button>
                            <input type="text" data-id="pro1" class="qty-input border px-2 w-50 bg-light" disabled value="1" placeholder="1">
                            <button class="qty-up border bg-light" data-id="pro1"><i class="fas fa-angle-up"></i></button>
                        </div>
                    </div>
                    <!-- !product qty section -->
                    <br>
                    <!-- review -->
                    <section id="top-sale">

                        <div class="container">
                            <h4 class="font-rubik font-size-14">Review</h4>
                            <hr>
                            <!-- Start Owl-carousel -->
                            <div class="owl-carousel owl-theme">
                                <div class="item py-2 bg-light">
                                    <div class="product font-rale">
                                        <a href="#"><img src="./assets/book-1.png" alt="product1" class='img-fluid'></a>
                                    </div>
                                </div>
                                <!-- End Owl-carousel -->
                    </section>
                    <!-- end review -->
                </div>
            </div>
            <div class="col-12">
                <br>
                <h6 class="font-rubik">Product Description</h6>
                <hr>
                <p class="font-rale font-size-14">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellat inventore vero numquam error est ipsa, consequuntur temporibus debitis nobis sit, delectus officia ducimus dolorum sed corrupti. Sapiente optio sunt provident, accusantium eligendi eius reiciendis animi? Laboriosam, optio qui? Numquam, quo fuga. Maiores minus, accusantium velit numquam a aliquam vitae vel?</p>
                <p class="font-rale font-size-14">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellat inventore vero numquam error est ipsa, consequuntur temporibus debitis nobis sit, delectus officia ducimus dolorum sed corrupti. Sapiente optio sunt provident, accusantium eligendi eius reiciendis animi? Laboriosam, optio qui? Numquam, quo fuga. Maiores minus, accusantium velit numquam a aliquam vitae vel?</p>
            </div>
        </div>
</section>
<!-- End product -->
<?php
        endif;
        endforeach;
        ?>