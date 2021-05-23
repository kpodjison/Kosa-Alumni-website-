<?php
    class DBController{
        protected $host = "localhost";
        protected $user = "root";
        protected $password = "";
        protected $db = "kosa";

        public $conn;

//constructor function to connect to db
        public function __construct(){
            $this->conn = mysqli_connect($this->host,$this->user,$this->password,$this->db);
            if($this->conn->connect_error)
            {
                echo "fail".$this->conn->connect_error;
            }
            else
            echo "connection successful";

        }
//destructor function to disconnect to db
            public function __destruct(){
                $this->closeConnection();
                

            }

            //function to close connection 
            public function closeConnection(){
                if($this->conn != null){
                    $this->conn->close();
                    $this->conn=null;
                }
            }



    }




?>