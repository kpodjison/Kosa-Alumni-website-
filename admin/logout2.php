<?php
session_start();

//delete all session variables
session_unset();
//destroy session
session_destroy();

session_cache_expire();

//redirect to kosa homepage
header('location: ../index.php');
exit;



?>