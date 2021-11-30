<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/javascript; charset=UTF-8");
header("Access-Control-Allow-Methods: GET,PUT,POST,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include "dbconnect.php";
include "employee.php";
$db = new Database();
$db_handle = $db->getConnection();
$employee = new Employee($db_handle,"Employee");

// HTTP REQUESTS
include "get.php";
include "post.php";
include "put.php";
include "delete.php";

//Get the HTTP REQUEST Type (GET,POST,PUT,DELETE)
$requestMethod = $_SERVER["REQUEST_METHOD"];

switch ($requestMethod) {
    case 'GET':
        $response = getEmployee($employee);
        break;
    case 'POST':
        //TODO - add a record to the list
        $response = addEmployee($employee);
        break;
    case 'PUT':
        //TODO - update an existing record
        $response = updateEmployee($employee);
        break;
    case 'DELETE':
        //TODO - delete one or all records (careful now)
        $response = deleteEmployee($employee);
        break;
    default:
        $response = NotFound();
        break;
}

//Return the response
header($response['status_code_header']);
if ($response['body']) {
    echo $response['body'];
}

function NotFound()
{
    $response['status_code_header'] = 'HTTP/1.1 404 NOT FOUND';
    $response['body'] = json_encode(array("message" => "No records found."));
    return $response;
}

