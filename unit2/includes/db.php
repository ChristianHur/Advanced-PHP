<?php
//DB Constants
define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB','hurc_guestbook');
define('TABLE_GUEST','guests2');
define('TABLE_USERS','users');

function connect(){
    try{
        $conn = mysqli_connect(HOST,USER,PASS,DB);
        if($conn){
            //echo "Connected!";
            return $conn;
        }else{
            throw new Exception("Cannot connect.");
        }
    }catch (Exception $e){
        echo "Something went wrong.  Couldn't connect.";
        echo "Error: " . $e->getMessage();
    }
    return null;
}

function makeQuery($handle,$query){
   return mysqli_query($handle,$query);
}

function getOneRecord($handle,$id,$table){
    $query = "SELECT * FROM $table WHERE id='$id'";
    return makeQuery($handle, $query);
}

function getAllRecords($handle,$table){
    $query = "SELECT * FROM $table";
    return makeQuery($handle,$query);
}

function deleteOneRecord($handle,$id,$table){
    $query = "DELETE FROM $table WHERE id='$id'";
    return makeQuery($handle,$query);
}

function updateOneRecord($handle,$data,$table){
    $id = $data['id'];
    $name = $data['name'];
    $email = $data['email'];
    $comment = $data['comment'];
    $query = "UPDATE $table SET name='$name', email='$email', comment='$comment'
               WHERE id='$id'";
    return makeQuery($handle,$query);
}

function insertOneRecord($handle,$table,$data){
//    $name = $data['name'];
//    $email = $data['email'];
//    $comment = $data['comment'];
    $str = "";
    foreach ($data as $value) {
        $str .= "'$value',";
    }

    $str = rtrim($str,',');  //Remove last character
    $query = "INSERT INTO $table VALUES(NULL,$str)";
    return makeQuery($handle,$query);
}

//Check to see if username is already taken
function verifyUser($handle,$username, $table){
    $query = "SELECT * FROM $table WHERE username='$username'";
    $result = makeQuery($handle,$query);
    if(mysqli_num_rows($result) > 0){
        //User exists
        return true;
    }
    return false;
}

function verifyPassword($handle,$username,$password,$table){
    $query = "SELECT password FROM $table WHERE username='$username'";
    $result = makeQuery($handle,$query);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
//        if($password == $row['password']){
//            return true;
//        }
        if(password_verify($password,$row['password'])){
            return true;
        }
    }
    return false;
}









