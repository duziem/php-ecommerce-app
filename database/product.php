<?php
//require "database.php";

class product{
    public $db;

    function __construct($db)
    {
        $this->db= $db;
    }

    public function getData($table= "product"){
        $query= "SELECT * FROM {$table}";
        $result= $this->db->conn->query($query);

        $rows = array();

        // fetch product data one by one
        while ($item= $result->fetch_array(MYSQLI_ASSOC)){
            $rows[] = $item;
        }

        return $rows;
    }

    public function getDataById($itemId, $table= "product"){
        $query= "SELECT * FROM {$table} WHERE `item_id`= {$itemId}";
        $result= $this->db->conn->query($query);

        $row = array();

        // fetch product data one by one
        /*
        while ($item= $result->fetch_array(MYSQLI_ASSOC)){
            $rows[] = $item;
        }

        return $rows;
        */
        $row[]= $result->fetch_array(MYSQLI_ASSOC);
        return $row;
    }

    public function updateProduct($name, $brand, $price, $image, $id)
    {

        $query = "UPDATE `product` SET `item_name`= '{$name}', `item_brand`= '{$brand}', `item_price`= {$price}, `item_image`= '{$image}' WHERE `item_id`= {$id}";

        if($this->db->conn->query($query)){
            return true;
        }else{return false;}

    }

    public function getProductByCategory($category, $params, $table= "product"){
        $column= "item_{$category}";
        if(count($params) == 1){
        $query= "SELECT * FROM {$table} WHERE `$column` LIKE  '{$params[0]}' ";
            $result= $this->db->conn->query($query);
    
            $rows = array();
    
            // fetch product data one by one
            while ($item= $result->fetch_array(MYSQLI_ASSOC)){
                $rows[] = $item;
            }
    
            return $rows;  
        }
        /*
        elseif(count($params) > 1){

        }*/
        
    }
}