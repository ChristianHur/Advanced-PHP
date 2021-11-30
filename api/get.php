<?php
/**
 * HTTP GET - read one or all records from the Employee table
 * @param $employee
 * @return mixed
 */
function getEmployee($employee)
{
    // Get id from URL
    $id = isset($_GET["id"]) ? $_GET["id"] : "";

    // Search the Employee table
    $result = $employee->get($id);
    $num = $result->rowCount();

    if ($num > 0) {

        // The associative array list to be sent in JSON format
        $emp_list = array();
        $emp_list["employees"] = array();

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $temp = array(
                "eid" => $row['eid'],
                "first_name" => $row['first_name'],
                "last_name" => $row['last_name'],
                "email" => $row['email'],
                "position" => $row['position'],
                "company" => $row['company'],
                "country" => $row['country']
            );

            // Push each record to the list
            array_push($emp_list["employees"], $temp);
        }

        // Return the result
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = json_encode($emp_list);
        return $response;
    }

    // Default return - not found
    $response['status_code_header'] = 'HTTP/1.1 404 NOT FOUND';
    $response['body'] = json_encode(array("message" => "No records found."));
    return $response;
}