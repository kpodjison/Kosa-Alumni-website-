<!-- This file is responsible for establishing database connection  -->

<?php
//connection parameters
$servername = "localhost";
$username = "root";
$password ="";
$database_name = "kosa";


//create connection
$conn = mysqli_connect($servername,$username,$password,$database_name);
if($conn)
{
    echo "Database connection created successfully";
}
else
{
    echo "connection error".mysqli_connect_error()."<br>";
}


?>