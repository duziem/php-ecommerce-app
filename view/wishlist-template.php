<?php
 
 //get the user id
 $userId= $_SESSION['user_id'];
 $wishlistItems= $wishlist->getDataByUserId($userId); //get row(s) from the cart db using the user id

 if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST["cart-submit"])){
        //$userId= $_POST["user_id"];
        $itemId= $_POST["item_id"];

        if($cart->insertIntoCart($userId, $itemId)){
            $wishlist->deleteFromWishlist($userId, $itemId);
        }
    }

    if(isset($_POST["delete-wishlist-btn"])){
        $itemId= $_POST["item_id"];

        $wishlist->deleteFromWishlist($userId, $itemId);
    }
 }
?>

<section id="wishlist-items">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
            <?php
                $ratingClass= 1;//unique class added to the set of star ratings contained in each loop
                foreach ($wishlistItems as $wishlist){
                    echo $ratingClass;
                    $products= $product->getDataById($wishlist['item_id']);
                    array_map(function ($item)use($ratingClass){

            ?>
                   
                 <!-- cart item -->
                 <div class="row border-top py-3 mt-3">
                    <div class="col-sm-2">
                        <a href="<?php printf('%s?item_id=%s', 'product.php',  $item['item_id']); ?>"><img style="height: 120px;" src="<?php echo $item['item_image'] ?? "./assets/products/13.png"; ?>" alt="wishlist-item" class="img-fluid"></a>                        
                    </div>
                    <div class="col-sm-8">
                        <h5 class="font-baloo font-size-20"><?php echo $item['item_name'] ?? "Unknown"; ?></h5>
                        <small>by <?php echo $item['item_brand'] ?? "Brand"; ?></small>
                        <!-- product rating -->
                        <div class="d-flex">
                            <div class="rating text-warning font-size-12">
                                <i class='<?php printf('far fa-star %s',$ratingClass); ?>' id="1"></i>
                                <i class='<?php printf('far fa-star %s',$ratingClass); ?>' id="2"></i>
                                <i class='<?php printf('far fa-star %s',$ratingClass); ?>' id="3"></i>
                                <i class='<?php printf('far fa-star %s',$ratingClass); ?>' id="4"></i>
                                <i class='<?php printf('far fa-star %s',$ratingClass); ?>' id="5"></i>
                            <!--
                                <span><i class="far fa-star"></i></span>
                                <span><i class="far fa-star"></i></span>
                                <span><i class="far fa-star"></i></span>
                                <span><i class="far fa-star"></i></span>
                                <span><i class="far fa-star"></i></span>
                            -->
                            </div>
                            <a href="#" class="px-2 font-rale font-size-14">20,534 ratings</a>
                        </div>
                        <!--  !product rating-->

                        <!-- product qty -->
                        <div class="qty d-flex pt-2">

                            <form method="post">
                                <input type="hidden" value="<?php echo $item['item_id'] ?? 0; ?>" name="item_id">
                                <button type="submit" name="delete-wishlist-btn" class="btn font-baloo text-danger px-3 border-right">Delete</button>
                            </form>

                            <form method="post">
                                <input type="hidden" value="<?php echo $item['item_id'] ?? 0; ?>" name="item_id">
                                <button type="submit" name="cart-submit" class="btn font-baloo text-danger">Add to cart</button>
                            </form>

                        </div>
                        <!-- !product qty -->

                    </div>

                    <div class="col-sm-2 text-right">
                        <div class="font-size-20 text-danger font-baloo">
                            $<span class="product_price" data-id="<?php echo $item['item_id'] ?? '0'; ?>"><?php echo $item['item_price'] ?? 0; ?></span>
                        </div>
                    </div>
                </div>
            <?php
                    
                }, $products);
                $ratingClass +=1;
            }
            ?>
            </div>
             <!-- subtotal section-->
             <!--
            <div class="col-sm-3">
                <div class="sub-total border text-center mt-2">
                    <h6 class="font-size-12 font-rale text-success py-3"><i class="fas fa-check"></i> Your order is eligible for FREE Delivery.</h6>
                    <div class="border-top py-4">
                        <h5 class="font-baloo font-size-20">Subtotal ( <?php //echo isset($subTotal) ? count($subTotal) : 0; ?> item):&nbsp; <span class="text-danger">$<span class="text-danger" id="deal-price"><?php echo isset($subTotal) ? $Cart->getSum($subTotal) : 0; ?></span> </span> </h5>
                        <button type="submit" class="btn btn-warning mt-3">Proceed to Buy</button>
                    </div>
                </div>
            </div>
            -->
            <!-- !subtotal section-->
        </div>
    </div>
</section>

