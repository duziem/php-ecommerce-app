<?php

//require "database.php";

class register
{
    public $db;

    function __construct($db)
    {
        $this->db = $db;
    }

    public function insertIntoUser($firstName, $lastName, $username, $email, $password, $registerDate){

        $query= "INSERT INTO `user`(`first_name`, `last_name`, `username`, `email`, `password`, `register_date`) VALUES ('{$firstName}', '{$lastName}', '{$username}', '{$email}', {$password}, '{$registerDate}')";

        if($this->db->conn->query($query)){
            return true;
        }else{
            return false;
        }
    }
}