<?php

include "dbconnect.php";
include "employee.php";
$db = new Database();
$db_handle = $db->getConnection();
$employee = new Employee($db_handle,"Employee");

$query = file_get_contents("employee.sql");
$stmt = $db_handle->prepare($query);
if ($stmt->execute())
    echo "Success";
else
    echo "Fail";
