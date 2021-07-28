<?php
    require('../functions.php');

    $_SESSION['UserId']  = null;
    $_SESSION['UserName']  = null;
    $_SESSION['AdminName']  = null;
    session_destroy();
    // redirect_to('../adminlogin.php');


?>