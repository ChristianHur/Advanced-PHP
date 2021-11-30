<?php

class Employee
{
    private $conn;
    private $table;
    private $eid;
    private $first_name;
    private $last_name;
    private $email;
    private $position;
    private $company;
    private $country;

    function __construct($db_handle, $table)
    {
        $this->conn = $db_handle;
        $this->table = $table;
    }

    /**
     * GET (Read) the Employee table
     * @param $id - if $id is provided then Read ONE else Read ALL
     * @return mixed
     */
    function get($id)
    {

        // Sanitize and clean up $id
        // Strip off any malicious tags
        // Remove leading and trailing white spaces
        $id = trim(htmlspecialchars(strip_tags($id)));
        $id = "{$id}";

        // Read ONE
        if (strlen($id) > 0) {
            $query = "SELECT * FROM $this->table
            WHERE eid = ?";

            // Prepare the query statement
            $result = $this->conn->prepare($query);

            // Bind to parameters
            $result->bindParam(1, $id);

            // Read ALL
        } else {
            $query = "SELECT * FROM $this->table
            ORDER BY eid ASC";
            // Prepare the query statement
            $result = $this->conn->prepare($query);
        }
        // Execute query
        $result->execute();
        return $result;
    }

    /**
     * POST (Insert) data into the Employee table
     * @return mixed
     */
    function post($data)
    {

        // Read ONE
        $query = "INSERT INTO $this->table
            VALUES(?,?,?,?,?,?,?)";

        // Prepare the query statement
        $result = $this->conn->prepare($query);

        // Bind to parameters
        $result->bindParam(1, $data['eid']);
        $result->bindParam(2, $data['first_name']);
        $result->bindParam(3, $data['last_name']);
        $result->bindParam(4, $data['email']);
        $result->bindParam(5, $data['position']);
        $result->bindParam(6, $data['company']);
        $result->bindParam(7, $data['country']);

        // Execute query
        $result->execute();
        return $result;
    }


    /**
     * PUT (Update) existing record in the Employee table
     * @param $data - the data to be updated
     * @param $id - $id of the record to be updated
     * @return mixed
     */
    function put($data, $id)
    {
        // Sanitize
        $id = trim(htmlspecialchars(strip_tags($id)));
        $id = "{$id}";

        // Read ONE
        $query = "UPDATE $this->table
            SET 
              first_name = ?,
              last_name = ?,
              email = ?,
              position = ?,
              company = ?,
              country = ?
            WHERE
              eid = ?";

        // Prepare the query statement
        $result = $this->conn->prepare($query);

        // Bind to parameters
        $result->bindParam(1, $data['first_name']);
        $result->bindParam(2, $data['last_name']);
        $result->bindParam(3, $data['email']);
        $result->bindParam(4, $data['position']);
        $result->bindParam(5, $data['company']);
        $result->bindParam(6, $data['country']);
        $result->bindParam(7, $id);

        // Execute query
        $result->execute();
        return $result;
    }

    /**
     * DELETE one or all records from the Employee table
     * @param $id - if $id is provided then Delete ONE else Delete ALL
     * @return mixed
     */
    function delete($id)
    {
        $id = trim(htmlspecialchars(strip_tags($id)));
        $id = "{$id}";

        // Delete ALL
        if (strlen($id) == 0) {
            $query = "DELETE FROM $this->table";

            // Prepare the query statement
            $result = $this->conn->prepare($query);
        } else {
            // Or Delete ONE
            $query = "DELETE FROM $this->table WHERE eid=?";

            // Prepare the query statement
            $result = $this->conn->prepare($query);

            // Bind to parameters
            $result->bindParam(1, $id);
        }
        // Execute query
        $result->execute();
        return $result;
    }

    /**
     * Search the Employee table for matching keywords on all fields
     * @param $keywords
     * @return mixed
     */
    function search($keywords){

        // select all query
        $query = "SELECT * FROM $this->table
            WHERE
                first_name LIKE ? OR 
                last_name LIKE ? OR 
                email LIKE ? OR 
                position LIKE ? OR 
                company LIKE ? OR 
                country LIKE ?
            ORDER BY
                eid ASC";

        // Prepare the query statement
        $result = $this->conn->prepare($query);

        // Sanitize and clean up keywords
        // Strip off any malicious tags
        // Remove leading and trailing white spaces
        $keywords=trim(htmlspecialchars(strip_tags($keywords)));
        $keywords = "%{$keywords}%";

        // Bind to parameters
        $result->bindParam(1, $keywords);
        $result->bindParam(2, $keywords);
        $result->bindParam(3, $keywords);
        $result->bindParam(4, $keywords);
        $result->bindParam(5, $keywords);
        $result->bindParam(6, $keywords);

        // Execute query
        $result->execute();

        return $result;
    }

    //======= GETTERS and SETTERS =============

    /**
     * @return mixed
     */
    public function getEid()
    {
        return $this->eid;
    }

    /**
     * @param mixed $eid
     */
    public function setEid($eid): void
    {
        $this->eid = $eid;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @param mixed $first_name
     */
    public function setFirstName($first_name): void
    {
        $this->first_name = $first_name;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param mixed $last_name
     */
    public function setLastName($last_name): void
    {
        $this->last_name = $last_name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param mixed $position
     */
    public function setPosition($position): void
    {
        $this->position = $position;
    }

    /**
     * @return mixed
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param mixed $company
     */
    public function setCompany($company): void
    {
        $this->company = $company;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country): void
    {
        $this->country = $country;
    }

}