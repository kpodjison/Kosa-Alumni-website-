<?php 
    require('../functions.php');

    if($_SERVER["REQUEST_METHOD"] == "GET")
    {
        global $db;
        $resultsArray = array();
        if(isset($_GET['userID']))
        {
            $id = $_GET['userID'];
            $sql = "SELECT firstname, lastname, gender, phone_num,
            email, alumni_psw, occupation,bio FROM alumni WHERE id='$id'";
            $results = $db->conn->query($sql);
            $resultsArray = array();

            while($row = mysqli_fetch_assoc($results))
            {
                $resultsArray[]= $row;
            }
            //Setting Up return value
            if(!empty($resultsArray))
            {
                $resultsJSON = json_encode($resultsArray);
            }
            else
            {
                $resultsJSON = json_encode("Failed");
            }

            //Return value
            echo $resultsJSON;
        }
        else if(isset($_GET['benstatus']))
        {
            // $colInfo = "";
            $id = $_GET['benstatus'];
            $sql = "SELECT * FROM beneficiary WHERE id='$id'";
            $results = $db->conn->query($sql);
            $resultsArray = array();

            while($row = mysqli_fetch_assoc($results))
            {
                $resultsArray[]= $row;
            }
            //Setting Up return value
            if(!empty($resultsArray))
            {
                $resultsJSON = json_encode($resultsArray);
            }
            else
            {
                $resultsJSON = json_encode("Failed");
            }
            
            //Return value
            echo $resultsJSON;
        }

    }










?>