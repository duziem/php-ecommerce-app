<?php

$userId= $_SESSION["user_id"];//get the user id
$products= $product->getData();
shuffle($products);

$brand = array_map(function ($pro){ return $pro['item_brand']; }, $products);
$unique = array_unique($brand);
sort($unique);

$isCategorySet= false;

if($_SERVER['REQUEST_METHOD']== 'POST'){
    if (isset($_POST['cartBtn'])) {
        $cart->insertIntoCart($_POST['user_id'], $_POST['item_id']);

        unset($_POST);
        header("location: cart.php");
    }


    if (isset($_POST['categoryBrandSubmit'])) {

       $params= []; //create an array named params that will hold the values of the category section

        foreach($_POST as $name => $category){
            if($name != 'categoryBrandSubmit' && $name != 'categoryHiddenInput'){
                if($category != "" || $category != 0){
                    $params[]= $category;
                }
    
            }
        }
        /*
        $filledParams= array_map(function($data){
           if($data != "" || $data != 0){
                return $data;
           }
        }, $params);
        */
       $productList= $product->getProductByCategory($_POST['categoryHiddenInput'], $params);

       $isCategorySet= true;
        unset($_POST);
    }

    if (isset($_POST['categoryPriceSubmit'])){
        //echo $_POST['priceRange'];
    }

}

//get a list of item_id from the cart table
$cartItemIdArray= $cart->getCartItems($product->getData("cart"));
?>
    <div id="banner_area">
        <img src="./assets/images/Banner1.png" alt="" width="100%" height="100%">
    </div>
<section id="products" class="py-5">
    <div class="container">
        <div class="header font-subheading d-flex justify-content-between mb-2">
            <h3>Products</h3>
            
            <div class="form-inline">
                <label for="category">category:&nbsp;</label>
                <select class= "form-control" name="category" id="category">
                    <option value="name">name</option>
                    <option value="brand">brand</option>
                    <option value="price">price</option>
                    <option value="rating">rating</option>
                </select>
            </div>   
        </div>

        <!-- select a category -->
        <div class="border-top p-3" id="category-form">
        
            <form action="" method= "post" id="categoryBrand" >
                <div class="row px-5">
                    <input type="hidden" value="name" name="categoryHiddenInput" id="category-hidden-input">
                    <?php
                        foreach($unique as $brand){
                    ?>
                    <div class="col-1">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="<?php echo $brand;?>" value="<?php echo $brand;?>">
                            <?php echo $brand;?>
                        </label>
                    </div>
                    <?php
                        }
                    ?>
                    <input type="submit" class="form-control btn btn-info my-3" value="submit" name="categoryBrandSubmit">
                </div>                
            </form>
            
            <form action="" method= "post" id="categoryPrice" >
                <div class="row px-5">
                    <input type="hidden" value="name" name="categoryHiddenInput" id="category-hidden-input">
                    
                        <div class="col-12">
                            <h4 style="font-weight:normal">Select By Price:</h4>
                        </div>
                        
                   
                    <div class="col-6 d-flex flex-column">
                        <!--place a text and range input field-->
                        <div class="d-flex">
                            <span id="minPriceRange">0</span>
                            &nbsp;
                            <div style="width:80%">
                                <input type="range" min="0" max="500" value="0" name="priceRange" id="priceRange" class="w-100">
                            </div>
                            &nbsp;
                            <span id="maxPriceRange">0</span>
                        </div>
                        
                        <div style="width:80%">
                            <!--<label for="priceTextInput">Price: </label>-->
                            <input type="text" name="priceTextInput" class="form-control m-3">
                        </div>
                    </div>
                    
                    <input type="submit" class="form-control btn btn-info my-3" value="submit" name="categoryPriceSubmit">
                </div>                
            </form>
            
        </div>
        <!-- !select a category -->


        <!-- if no category is selected display all the products in the db -->   
        <?php
            if (!$isCategorySet){
        ?>
        <div class="row">
            <?php
                foreach ($products as $item){
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
                                <i class="far fa-star star" id="one"></i>
                                <i class="far fa-star star" id="two"></i>
                                <i class="far fa-star star" id="three"></i>
                                <i class="far fa-star star" id="four"></i>
                                <i class="far fa-star star" id="five"></i>
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
                                 <!--
                                <form action="update_site.php" method="post" enctype="application/x-www-form-urlencoded">
                                    <input name="item_name" type="hidden" value="<?php //echo $item["item_name"];?>">
                                    <input name="item_id" type="hidden" value="<?php //echo $item["item_id"];?>">
                                    <input name="item_brand" type="hidden" value="<?php //echo $item["item_brand"];?>">
                                    <input name="item_price" type="hidden" value="<?php //echo $item["item_price"];?>">
                                    <input name="item_image" type="hidden" value="<?php //echo $item["item_image"];?>">
                                    <button type="submit" class="btn btn-info py-0" name="updateBtn">update product</button>

                                </form>
                                -->
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
        <?php
            }               
        ?>