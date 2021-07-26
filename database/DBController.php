<?php
    class DBController{
        protected $host = "localhost";
        protected $user = "root";
        protected $password = "";
        protected $db = "kosa";

        public $conn;
        public $mysqli = null;

//constructor function to connect to db
        public function __construct(){

            $this->mysqli = new mysqli($this->host,$this->user,$this->password,$this->db);
            $this->conn = mysqli_connect($this->host,$this->user,$this->password,$this->db);
            if($this->conn->connect_error)
            {
                echo "fail".$this->conn->connect_error;
            }
            // else
            // echo "connection successful";
            // echo "connection successful";

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

 
// -------------------------------------interface for all db operations ---------------------

 interface Operations{
        //method to get data from db tables. it takes a table name as argument
    public function getData($table = 'users');
    // method to get single data from db tables. its takes table name as argument
    // public function getSingleData($table ='users',$row_id = 1);

}
?>