<?php

  class Notice implements Operations
  {

  public $db = null;

  public function __construct(DBController $db)
  {
      if(!isset($db->conn))
        return null;
      $this->db = $db;
  }

  //fetching all notices from notice  table in db
  public function getData($table='notice'){
    $sql = "SELECT * FROM {$table}";
    $results = $this->db->conn->query($sql);
    $resultsArray = array();
    while($row= mysqli_fetch_assoc($results)){
        $resultsArray[] = $row;
    }

    return $resultsArray;
}





//fetcing a single notice from  notice table in db
//  public function getSingleData($table ='notice',$row_id ='1')
//  {
//     $sql = "SELECT * FROM {table} WHERE id={row_id}";
//     $results = $this->db->conn->query($sql);

//     echo $results;
//     $resultsArray = array();

//     while($row=mysqli_fetch_assoc($results))
//     {
//       $resultsArray[] = $row;

//     }

//     return $resultsArray;
    
    

//  }

}
?>