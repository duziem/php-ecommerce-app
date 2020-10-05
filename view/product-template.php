<?php
//get the item id from the url
    $itemId= $_GET['item_id'] ?? null;
    if (isset($itemId)){
        $products= $product->getDataById($itemId);
    }

    $cartItemIdArray= $cart->getCartItems($product->getData("cart"));
?>
<section id="single-product">
    <div class="container">
        <?php
            array_map(function ($item) use($cartItemIdArray){

         ?>

        <div class="row">
            <div class="col col-md-6">
                <!--product img-->
                <img src="<?php echo $item["item_image"]?>" alt="" class="img-fluid">

                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="application/x-www-form-urlencoded">
                <!-- Buttons: proceed to buy & add to cart buttons -->
                <div class="text-center d-flex pt-4 w-100">
                    <button class="btn btn-danger w-50" style="border-radius: 20px 0 0 20px">Proceed to Buy</button>

                        <input name="user_id" type="hidden" value="1">
                        <input name="item_id" type="hidden" value="<?php echo $item["item_id"]?>">
                        <?php

                        if(in_array($item["item_id"], $cartItemIdArray)){
                            ?>
                            <button disabled class="btn btn-success font-bodyText w-50" style="border-radius: 0 20px 20px 0">Add To Cart</button>
                            <?php

                        }else{
                            ?>
                            <button name="cartBtn" class="btn btn-warning font-bodyText w-50" style="border-radius: 0 20px 20px 0">Add To Cart</button>
                            <?php
                        }

                        ?>

                </div>
                    <!--
                    <button class="btn btn-warning w-50" style="border-radius: 0 20px 20px 0">Add to Cart</button>
                    -->
                </form>

                <!-- !Buttons: proceed to buy & add to cart buttons -->
            </div>

            <div class="col-sm-6 py-5">
                <h5 class="font-bodyText font-size-20"><?php echo $item["item_name"]?></h5>
                <small>by <?php echo $item["item_brand"]?></small>
                <div class="d-flex">
                    <div class="rating text-warning font-size-12">
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="far fa-star"></i></span>
                    </div>
                    <a href="#" class="px-2 font-rale font-size-14">20,534 ratings | 1000+ answered questions</a>
                </div>
                <hr class="m-0">

                <!---    product price       -->
                <table class="my-3">
                    <tr class="font-rale font-size-14">
                        <td>M.R.P:</td>
                        <td><strike>$162.00</strike></td>
                    </tr>
                    <tr class="font-rale font-size-14">
                        <td>Deal Price:</td>
                        <td class="font-size-20 text-danger">$<span>152.00</span><small class="text-dark font-size-12">&nbsp;&nbsp;Inclusive of all taxes</small></td>
                    </tr>
                    <tr class="font-rale font-size-14">
                        <td>You Save:</td>
                        <td><span class="font-size-16 text-danger">$152.00</span></td>
                    </tr>
                </table>
                <!---    !product price       -->

                <!--    #policy -->
                <div id="policy">
                    <div class="d-flex">
                        <div class="return text-center mr-5">
                            <div class="my-2">
                                <span class="fas fa-retweet border p-3 rounded-pill bg-theme-color"></span>
                            </div>
                            <a href="#" class="font-bodyText">10 Days <br> Replacement</a>
                        </div>
                        <div class="return text-center mr-5">
                            <div class="my-2">
                                <span class="fas fa-truck  border p-3 rounded-pill bg-theme-color"></span>
                            </div>
                            <a href="#" class="font-bodyText">Daily Tuition <br>Delivered</a>
                        </div>
                        <div class="return text-center mr-5">
                            <div class="my-2">
                                <span class="fas fa-check-double border p-3 rounded-pill bg-theme-color"></span>
                            </div>
                            <a href="#" class="font-bodyText">1 Year <br>Warranty</a>
                        </div>
                    </div>
                </div>
                <!--    !policy -->
                <hr>

                <!-- order-details -->
                <div id="order-details" class="font-bodyText d-flex flex-column text-dark">
                    <small>Delivery by : Mar 29  - Apr 1</small>
                    <small>Sold by <a href="#">Daily Electronics </a>(4.5 out of 5 | 18,198 ratings)</small>
                    <small><i class="fas fa-map-marker-alt color-primary"></i>&nbsp;&nbsp;Deliver to Customer - 424201</small>
                </div>
                <!-- !order-details -->

                <div class="row">
                    <div class="col-6">
                        <!-- color -->
                        <div class="color my-3">
                            <div class="d-flex justify-content-between">
                                <h6 class="font-bodyText">Color:</h6>
                                <div class="p-2 bg-gold rounded-circle"><button class="btn font-size-14"></button></div>
                                <div class="p-2 bg-info rounded-circle"><button class="btn font-size-14"></button></div>
                                <div class="p-2 bg-danger rounded-circle"><button class="btn font-size-14"></button></div>
                            </div>
                        </div>
                        <!-- !color -->
                    </div>
                    <!--
                    <div class="col-6">-->
                        <!-- product qty section -->
                    <!--
                        <div class="qty d-flex">
                            <h6 class="font-bodyText">Qty</h6>
                            <div class="px-4 d-flex font-rale">
                                <button class="qty-up border bg-light" data-id="pro1"><i class="fas fa-angle-up"></i></button>
                                <input type="text" data-id="pro1" class="qty_input border px-2 w-50 bg-light" disabled value="1" placeholder="1">
                                <button data-id="pro1" class="qty-down border bg-light"><i class="fas fa-angle-down"></i></button>
                            </div>
                        </div> -->
                        <!-- !product qty section -->
                    <!-- </div> -->
               </div>

               <!-- size -->
                <div class="size my-3">
                    <h6 class="font-baloo">Size :</h6>
                    <div class="d-flex justify-content-between w-75">
                        <div class="font-rubik border p-2">
                            <button class="btn p-0 font-size-14">4GB RAM</button>
                        </div>
                        <div class="font-rubik border p-2">
                            <button class="btn p-0 font-size-14">6GB RAM</button>
                        </div>
                        <div class="font-rubik border p-2">
                            <button class="btn p-0 font-size-14">8GB RAM</button>
                        </div>
                    </div>
                </div>
                <!-- !size -->


            </div>
        <?php
            }, $products);
        ?>
        </div>
    </div>
</section>
