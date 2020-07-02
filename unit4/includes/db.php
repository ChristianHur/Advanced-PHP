<?php
// For security - place sensitive data outside of the root directory
// include_once "C:/xampp/private/private_data.php";

//DB Constants
define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB','hurc_guestbook');
define('TABLE_GUEST','guests2');
define('TABLE_USERS','users');

class DB
{
    private $conn = null;
    
    public function __construct()
    {
        $this->connect();
    }

    function connect()
    {
        try {
            $this->conn = new mysqli(HOST, USER, PASS, DB);
            if (!$this->conn) {
                throw new Exception("Cannot connect.");
            }
        } catch (Exception $e) {
            echo "Something went wrong.  Couldn't connect.";
            echo "Error: " . $e->getMessage();
        }
        return null;
    }

    function makeQuery($query)
    {
        return $this->conn->query($query);
    }

    function getOneRecord($id, $table)
    {
        $query = "SELECT * FROM $table WHERE id='$id'";
        return $this->makeQuery($query);
    }

    function getAllRecords($table)
    {
        $query = "SELECT * FROM $table";
        return $this->makeQuery($query);
    }

    function deleteOneRecord($id, $table)
    {
        $query = "DELETE FROM $table WHERE id='$id'";
        return $this->makeQuery($query);
    }

    function updateOneRecord($data, $table)
    {
        $id = $data['id'];
        $name = $data['name'];
        $email = $data['email'];
        $comment = $data['comment'];
        $query = "UPDATE $table SET name='$name', email='$email', comment='$comment'
               WHERE id='$id'";
        return $this->makeQuery($query);
    }

    function insertOneRecord($table, $data)
    {
//    $name = $data['name'];
//    $email = $data['email'];
//    $comment = $data['comment'];
        $str = "";
        foreach ($data as $value) {
            $str .= "'$value',";
        }

        $str = rtrim($str, ',');  //Remove last character
        $query = "INSERT INTO $table VALUES(NULL,$str)";
        return $this->makeQuery($query);
    }

//Check to see if username is already taken
    function verifyUser($username, $table)
    {
        $query = "SELECT * FROM $table WHERE username='$username'";
        $result = $this->makeQuery($query);
        if ($result->num_rows > 0) {
            //User exists
            return true;
        }
        return false;
    }

    function verifyPassword($username, $password, $table)
    {
        $query = "SELECT password FROM $table WHERE username='$username'";
        $result = $this->makeQuery($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_array();
//        if($password == $row['password']){
//            return true;
//        }
            if (password_verify($password, $row['password'])) {
                return true;
            }
        }
        return false;
    }


    // Getter and Setter Methods
    
    /**
     * @return null
     */
    public function getConn()
    {
        return $this->conn;
    }

    /**
     * @param null $conn
     */
    public function setConn($conn)
    {
        $this->conn = $conn;
    }

}







