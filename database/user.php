<?php
class user
{
    public $db;

    function __construct($db)
    {
        $this->db = $db;
    }

    public function getDataById($itemId, $table= "user"){
        $query= "SELECT * FROM {$table} WHERE `user_id`= {$itemId}";
        $result= $this->db->conn->query($query);

        //$row = array();

        // fetch user data
       $row= $result->fetch_array(MYSQLI_ASSOC);
       return $row;
    }

    public function insertIntoUser($firstName, $lastName, $username, $email, $password, $registerDate){

        $query= "INSERT INTO `user`(`first_name`, `last_name`, `username`, `email`, `password`, `register_date`) VALUES ('{$firstName}', '{$lastName}', '{$username}', '{$email}', {$password}, '{$registerDate}')";

        if($this->db->conn->query($query)){
            return true;
        }else{
            return false;
        }
    }


    public function selectUser($email, $password){
        $query = "SELECT * FROM `user` WHERE `PASSWORD` = '{$password}' AND `EMAIL` = '{$email}'";
        return $result= $this->db->conn->query($query);

    }

    public function getUser($email, $password){
        $query = "SELECT * FROM `user` WHERE `PASSWORD` = '{$password}' AND `EMAIL` = '{$email}'";
        $result= $this->db->conn->query($query);

        $rows = array();

        // fetch product data one by one
        while ($user = $result->fetch_array(MYSQLI_ASSOC)) {
            $rows[] = $user;
        }

        return $rows;
    }

    public function _userExists($email, $password){
        $result= $this->selectUser($email, $password);
        if ($result->num_rows >= 1) {
            return true;
        } else {
            return false;
        }
    }
}