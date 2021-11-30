<?php
/**
 * HTTP PUT - Update an existing record in the Employee table
 * @param $employee
 * @return mixed
 */
function updateEmployee($employee)
{
    // Get id from URL
    $id = isset($_GET["id"]) ? $_GET["id"] : "";

    // Get the data
    $data = json_decode(file_get_contents('php://input'), TRUE);

    // Search the Employee table
    $result = $employee->post($data, $id);

    if($result){
        // Return the result
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = json_encode($data);
        return $response;
    }else{
        // Default return - not found
        $response['status_code_header'] = 'HTTP/1.1 404 NOT FOUND';
        $response['body'] = json_encode(array("message" => "No records found."));
    }

    return $response;
}