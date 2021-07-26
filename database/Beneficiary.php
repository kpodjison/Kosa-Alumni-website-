<?php
class Beneficiary implements Operations
{
    public $db = null;


        public function __construct(DBController $db)
        {
            if(!isset($db->conn))
                return null;
            $this->db = $db;
        }


  //fetching all notices from beneficiary table in db
   public function getData($table='beneficiary')
    {
        $sql = "SELECT * FROM {$table}";
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