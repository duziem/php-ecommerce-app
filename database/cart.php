<?php

class cart
{
    public $db;

    function __construct($db)
    {
        $this->db = $db;
    }

    //get cart row based on the user id
    public function getDataByUserId($userId, $table = "cart")
    {
        $query = "SELECT * FROM {$table} WHERE `user_id`= {$userId}";
        $result = $this->db->conn->query($query);

        $rows = array();

        // fetch product data one by one
        while ($item = $result->fetch_array(MYSQLI_ASSOC)) {
            $rows[] = $item;
        }

        return $rows;
    }

        // get item_id of shopping cart list
        public function getCartId($cartArray = null, $key = "item_id"){
            if ($cartArray != null){
                $cart_id = array_map(function ($value) use($key){
                    return $value[$key];
                }, $cartArray);
                return $cart_id;
            }
        }

    public function insertIntoCart($user_id, $item_id){
        $query= "INSERT INTO `cart`(`item_id`, `user_id`) VALUES ({$item_id}, {$user_id} )";
        if($this->db->conn->query($query)){
            return true;
        }else{return false;}
    }

    // get item_id of shopping cart list
    function getCartItems($cartItems){

        $itemIdArray= [];
        if(is_array($cartItems)){
            foreach ($cartItems as $cart){
                $itemIdArray[]= $cart["item_id"];
            }
        }
        
        return $itemIdArray;
    }

    public function deleteFromCart($userId, $itemId){
        $query= "DELETE FROM `cart` WHERE `user_id`= {$userId} AND `item_id`= {$itemId}";
        $this->db->conn->query($query);

        header("Location:" . $_SERVER['PHP_SELF']);//reload the page after the product has been deleted from cart
    }

}