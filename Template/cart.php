<!-- Shopping cart -->

<section id="cart" class="py-3 mb-5">
    <div class="container-fluid w-75">
        <h5 class="font-baloo font-size-20">Shopping Cart</h5>

        <!-- shopping cart items -->
        <div class="row">
            <div class="col-sm-9">
                <!-- cart-item -->
                <div class="row border-top py-3 mt-3">
                    <div class="col-sm-2">
                        <img src="./assets/book-1.png" style="height: 120px;" alt="cart1" claas="img-fluid">
                    </div>
                    <div class="col-sm-8">
                        <h5 class="font-baloo font-size-20">Book 1</h5>
                        <small>Politics-law</small>
                        <!-- Product rating -->
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
                        <!-- Product qty -->
                        <div class="qty d-flex pt-2">
                            <div class="d-flex font-rale w-25">
                                <button data-id="pro1" class="qty-down border bg-light"><i class="fas fa-angle-down"></i></button>
                                <input type="text" data-id="pro1" class="qty-input border px-2 w-100 bg-light" disabled value="1" placeholder="1">
                                <button class="qty-up border bg-light" data-id="pro1"><i class="fas fa-angle-up"></i></button>
                            </div>
                            <button type="submit" name="delete-cart-submit" class="btn font-baloo text-danger px-3 "style="border-right: 1px solid gray;">Delete</button>
                            <button type="submit" name="wishlist-submit" class="btn font-baloo text-danger">Save for Later</button>
                        </div>
                    </div>
                    <div class="col-sm-2 text-right">
                        <div class="font-size-20 text-danger font-baloo">
                            $<span class="product_price">152</span>
                        </div>
                    </div>
                </div>
                <div class="row border-top py-3 mt-3">
                    <div class="col-sm-2">
                        <img src="./assets/book-7.png" style="height: 120px;" alt="cart1" claas="img-fluid">
                    </div>
                    <div class="col-sm-8">
                        <h5 class="font-baloo font-size-20">Book 7</h5>
                        <small>Science</small>
                        <!-- Product rating -->
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
                        <!-- Product qty -->
                        <div class="qty d-flex pt-2">
                            <div class="d-flex font-rale w-25">
                                <button data-id="pro2" class="qty-down border bg-light"><i class="fas fa-angle-down"></i></button>
                                <input type="text" data-id="pro2" class="qty-input border px-2 w-100 bg-light" disabled value="1" placeholder="1">
                                <button class="qty-up border bg-light" data-id="pro2"><i class="fas fa-angle-up"></i></button>
                            </div>
                            <button type="submit" name="delete-cart-submit" class="btn font-baloo text-danger px-3 "style="border-right: 1px solid gray;">Delete</button>
                            <button type="submit" name="wishlist-submit" class="btn font-baloo text-danger">Save for Later</button>
                        </div>
                    </div>
                    <div class="col-sm-2 text-right">
                        <div class="font-size-20 text-danger font-baloo">
                            $<span class="product_price">152</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end cart-item -->
            <!-- subtotal -->
            <div class="col-sm-3">
                <div class="sub-total text-center mt-2">
                    <h6 class="font-size-12 font-rale text-success py-3"><i class="fas fa-check"></i> Your order is confirm for FREE Delivery.</h6>
                    <div class="border-top py-4">
                        <h5 class="font-baloo font-size-20">Subtotal (2 item) :&nbsp; <span class="text-danger">$304<span class="text-danger" id="deal-price"></span></h5>
                        <button type="submit" class="btn btn-warning mt-3">Proceed to Buy</button>
                    </div>
                </div>
            </div>
            <!-- end subtotal -->
        </div>
        <!-- end shopping cart items -->
    </div>
</section>
<!-- End Shopping cart -->
