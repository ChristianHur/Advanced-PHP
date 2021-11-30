<?php
/**
 * HTTP DELETE - Delete one record or all records from the Employee table
 * @param $employee
 * @return mixed
 */
function deleteEmployee($employee)
{
    // Get id from URL
    $id = isset($_GET["id"]) ? $_GET["id"] : "";

    $result = $employee->get($id);

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $emp_list = array(
            "eid" => $row['eid'],
            "first_name" => $row['first_name'],
            "last_name" => $row['last_name'],
            "email" => $row['email'],
            "position" => $row['position'],
            "company" => $row['company'],
            "country" => $row['country']
        );
    }

    // Delete the employee with id
    $result = $employee->delete($id);

    if($result){
        // Return the result
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = json_encode($emp_list);
        return $response;
    }else{
        // Default return - not found
        $response['status_code_header'] = 'HTTP/1.1 404 NOT FOUND';
        $response['body'] = json_encode(array("message" => "No records found."));
    }

    return $response;
}