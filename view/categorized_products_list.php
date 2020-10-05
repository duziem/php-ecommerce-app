<!-- if a category is selected display all the products belonging to that category -->   
<?php
    if ($isCategorySet){
        //print_r($productList);
?>

        <div class="row">
            <?php
               if($productList != null){ 
                foreach ($productList as $item){
                    
            ?>
                    <div class="col-xs-3 col-sm-4 col-md-3" style="width: 240px">
                        <div class="product py-3 mb-3 text-center outline">
                            <?php
                                printf( '<a href="%s?item_id=%s"><img src= "%s" alt="" class="img-fluid" width="200px" height="200px"></a>', "product.php", $item["item_id"], $item["item_image"])
                            ?>
                            <!--<a href="product.php?item_id=<?php //echo $item["item_id"]?>"><img src= "<?php //echo $item["item_image"]?>" alt="" class="img-fluid"></a>-->
                            <!--product-info-->
                            <div class="product-info text-center">
                                <h6><?php echo $item["item_name"]?></h6>
                                <div class="rating text-warning font-size-12">
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="far fa-star"></i></span>
                                </div>
                                <div class="py-2">
                                    <span><?php echo $item["item_price"]?></span>
                                </div>
                                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="application/x-www-form-urlencoded">
                                    <input name="user_id" type="hidden" value="<?php echo $userId;?>">
                                    <input name="item_id" type="hidden" value="<?php echo $item["item_id"]?>">
                                    <?php

                                            if(in_array($item["item_id"], $cartItemIdArray)){
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
            }
            ?>

        </div>  
    </div>
</section>

<?php
    }
?>