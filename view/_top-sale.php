<!-- Top Sale -->
<?php

    $products= $product->getData();
    shuffle($products);

    $brand = array_map(function ($pro){ return $pro['item_brand']; }, $products);
    $unique = array_unique($brand);
    sort($unique);

    // request method post
    if($_SERVER['REQUEST_METHOD']== 'POST'){
        if (isset($_POST['cartBtn'])) {
            $cart->insertIntoCart($_POST['user_id'], $_POST['item_id']);
    
            unset($_POST);
            header("location: cart.php");
        }
    }
    
    
    $cartItems= $cart->getCartItems($product->getData("cart"));
?>
<section id="top-sale">
    <div class="container py-5">
        <h4 class="font-rubik font-size-20 text-center">Top Sale</h4>
        <hr class="bg-theme-color font-bodyText" style="width:100px;height:2px;border:none"/>
        <!-- owl carousel -->
        <div class="owl-carousel owl-theme">
        <?php
                foreach ($products as $item){
            ?>
                    <div>
                        <div class="product py-3 mb-3 mx-2 text-center outline">
                        <a href="<?php printf('%s?item_id=%s', 'product.php',  $item['item_id']); ?>"><img src="<?php echo $item['item_image'] ?? "./assets/products/13.png"; ?>" alt="product1" class="img-fluid"></a>

                            <div class="product-info text-center">
                                <h6><?php echo $item["item_name"] ?? "Unknown";?></h6>
                                <div class="rating text-warning font-size-12">
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="far fa-star"></i></span>
                                </div>
                                <div class="py-2">
                                    <span>$<?php echo $item["item_price"] ?? 0 ?></span>
                                </div>
                                <form action="" method="post">
                                    <input name="user_id" type="hidden" value="<?php echo $userId;?>">
                                    <input name="item_id" type="hidden" value="<?php echo $item["item_id"]?>">
                                    <?php
                                            //if(in_array($item["item_id"], $cartItems)){
                                            if(in_array($item["item_id"], $cartItems ?? [])){
                                    ?>
                                                <button disabled class="btn btn-success font-bodyText" style="font-size: 14px">Add To Cart</button>
                                    <?php
                                            }else{
                                    ?>
                                                <button name="cartBtn" class="btn btn-warning font-bodyText font-size-14" style="font-size: 14px">Add To Cart</button>
                                    <?php
                                            }
                                    ?>

                                </form>

                                <?php
                                if (isset($userId)){
                                    //check if the logged in user is the admin
                                    if ($userId === '1'){
                                ?>
                                    <!-- update product btn -->
                                    <a href="<?php printf('%s?item_id=%s', 'update_site.php',  $item['item_id'])?>" class="text-decoration-none text-white"><button class="btn btn-info py-0" style="font-size: 13px">update product</button></a>

                                <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
            <?php
                }
            ?>
        </div>
        <!-- !owl carousel -->
    </div>
</section>
<!-- !Top Sale -->