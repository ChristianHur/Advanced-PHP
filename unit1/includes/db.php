<?php
//DB Constants
define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB','guestbook');
define('TABLE_GUEST','guests');

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
    $name = $data['name'];
    $email = $data['email'];
    $comment = $data['comment'];

    $query = "INSERT INTO $table VALUES(NULL,'$name','$email','$comment')";
    return makeQuery($handle,$query);
}












