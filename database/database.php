<?php
class db{

    protected $server= 'localhost';
    protected $username= 'root';
    protected $password= '';
    protected $database= 'ecommerce_db';
    public $conn= null;

    function __construct()
    {
        $this->conn= new mysqli($this->server, $this->username, $this->password, $this->database);

        //check connection
        if($this->conn-> connect_errno) {
            exit("Failed to connect to Database: " . $this->conn-> connect_error);
        }

    }

    public function __destruct()
    {
        $this->closeConnection();
    }

    // for mysqli closing connection
    protected function closeConnection(){
        if ($this->conn != null ){
            $this->conn->close();
            $this->conn = null;
        }
    }
}