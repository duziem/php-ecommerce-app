<!-- Special Price -->
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
<section id="special-price">
    <div class="container">
        <h4 class="font-bodyText text-center">Special Price</h4>
        <hr class="bg-theme-color font-bodyText" style="width:100px;height:2px;border:none"/>

        <div id="filters" class="button-group text-right">
            <button class="btn is-checked" data-filter="*">All Brand</button>
            <?php
                array_map(function ($brand){
                    printf('<button class="btn" data-filter=".%s">%s</button>', $brand, $brand);
                }, $unique);
            ?>
        </div>

        <div class="grid">
            <?php array_map(function ($item) use($cartItems){ ?>

            <div class="grid-item border m-2 <?php echo $item['item_brand'] ?? "Brand" ; ?>">
                <div class="item py-2" style="width: 200px;">
                    <div class="product">
                        <a href="<?php printf('%s?item_id=%s', 'product.php',  $item['item_id']); ?>"><img src="<?php echo $item['item_image'] ?? "./assets/products/13.png"; ?>" alt="product1" class="img-fluid"></a>
                        
                        <div class="text-center">
                            <h6><?php echo $item['item_name'] ?? "Unknown"; ?></h6>
                            <div class="rating text-warning font-size-12">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="far fa-star"></i></span>
                            </div>
                            <div class="price py-2">
                                <span>$<?php echo $item['item_price'] ?? 0 ?></span>
                            </div>
                            <form action="" method="post" enctype="application/x-www-form-urlencoded">
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
                        </div>
                    </div>
                </div>
            </div>
            <?php }, $products) ?>
        </div>
    </div>
</section>
<!-- !Special Price -->
