<?php

class Alumni implements Operations{

public $db = null;

public function __construct(DBController $db)
{
    if(!isset($db->conn))
        return null;
    $this->db = $db;
}

  //fetching all notices from alumni table in db
public function getData($table='alumni')
{
    $sql = "SELECT * FROM {$table}";
    $results = $this->db->conn->query($sql);
    $resultsArray = array();

    while($row= mysqli_fetch_assoc($results))
    {
        $resultsArray[] = $row;

    }
    return $resultsArray;
}

//funtion to get a single alumni info from db
public function getSingleData($id = '')
{
    $sql = "SELECT * FROM alumni WHERE id='{$id}'";
    $results = $this->db->conn->query($sql);
    $resultsArray = array();

    while($row = mysqli_fetch_assoc($results))
    {
        $resultsArray[]= $row;

    }
    return $resultsArray;
}






}


?>