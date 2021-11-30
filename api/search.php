<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include "dbconnect.php";
include "employee.php";
$db = new Database();
$db_handle = $db->getConnection();
$employee = new Employee($db_handle,"Employee");

// Get keywords from URL string (ANY or EMPTY STRING)
$keywords = isset($_GET["keywords"]) ? $_GET["keywords"] : "";

// Search the Employee table
$result = $employee->search($keywords);
$num = $result->rowCount();

if($num > 0){

    // The associative array list to be sent in JSON format
    $emp_list=array();
    $emp_list["employees"]=array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $emp =  array(
            "eid"=>$eid,
            "first_name"=>$first_name,
            "last_name"=>$last_name,
            "email"=>$email,
            "position"=>$position,
            "company"=>$company,
            "country"=>$country
        );
        array_push($emp_list["employees"],$emp);
    }
    // Set response code to default 200 - OK
    http_response_code(200);

    // Send the result in JSON format
    echo json_encode($emp_list);
}

else{
    // Set response code to default 404 - Not found
    http_response_code(404);

    // Respond with a no records found
    echo json_encode(
        array("message" => "No records found.")
    );
}