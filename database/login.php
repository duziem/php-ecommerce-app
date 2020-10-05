<?php

//require "database.php";

class login
{
    public $db;

    function __construct($db)
    {
        $this->db = $db;
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