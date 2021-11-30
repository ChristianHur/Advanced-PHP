<?php
class Database{

    private $host = "localhost";
    private $db = "testuser1_php2db";
    private $user = "";   // Username
    private $pass = "!";  // Password
    public $conn;

    /**
     * Get DB connection
     * @return PDO|the connection
     */
    public function getConnection(){

        $this->conn = null;

        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db, $this->user, $this->pass);
            $this->conn->exec("Connecting");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
