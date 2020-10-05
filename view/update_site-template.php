<?php

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST["updateBtn"])){

        $itemId= isset($_GET['item_id']) ? $_GET['item_id'] : 0;
        $item= $product-> getDataById($itemId);

        echo $itemName= !empty($_POST["itemName"]) ? $_POST["itemName"]:  $item['item_name'];
        echo $itemBrand= !empty($_POST["itemBrand"]) ? $_POST["itemBrand"]:  $item['item_brand'];
        echo $itemPrice= !empty($_POST["itemPrice"]) ? $_POST["itemPrice"]:  $item['item_price'];
        echo $image= !empty($_POST["itemImage"]) ? "./assets/images/products/{$_POST["itemImage"]}":  $item['item_image'];

        /*
        if($product->updateProduct($itemName, $itemBrand, $itemPrice, $image, $itemId)){
            echo "successful";
        }
        */
    }
}
?>
<section id="register_area">
    <div class="text-center container py-3 overflow-auto">


        <!-- brand name -->
        <div class="py-4 font-subheading" style="color: #00A5C4">
            <h2>Update Product</h2>
        </div>

        <form action="" method="post" enctype="application/x-www-form-urlencoded">

            <div class="row justify-content-center">
                <div class="col-8 col-md-4 font-bodyText">

                    <!-- item name -->
                    <div class="form-group row">
                        <label for="itemName">Product Name:&nbsp;&nbsp;</label>
                        <input autofocus pattern="^[A-Za-z]+$" class="form-control" type="text" name="itemName" id="itemName">
                    </div>

                    <!-- item brand -->
                    <div class="form-group row">
                        <label for="itemBrand">Product Brand:&nbsp;&nbsp;</label>
                        <input pattern="^[A-Za-z]+$" class="form-control" type="text" name="itemBrand" id="itemBrand">
                    </div>

                    <!-- item price -->
                    <div class="form-group row">
                        <label for="itemPrice">Price:&nbsp;&nbsp;</label>
                        <input pattern="^[A-Za-z0-9]+$" class="form-control" type="text" name="itemPrice" id="itemPrice">
                    </div>

                    <div class="row border" style="width: 200px;height: 200px">
                        <img id="image" src="" alt="" class="img-fluid">
                    </div>
                    <!-- item image -->
                    <div class="form-group row">
                        <label for="itemImage">select image:&nbsp;&nbsp;</label>
                        <input type="file" name="itemImage" id="imageFile" accept="image/jpg, image/png, image/jpeg">
                    </div>

                    <div class="row pt-4">
                        <button name="updateBtn" class="btn btn-primary w-100">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>