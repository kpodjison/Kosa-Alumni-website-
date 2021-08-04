<?php
//database class file
require('session.php');
require('database/DBController.php');
require('database/Alumni.php');
require('database/admin.php');
require('database/post.php');


//DBController object
$db = new DBController();

//admin object created
$admin = new Admin($db);

// alumni object created 
$alumni = new Alumni($db);
$all_alumni = $alumni->getData();

//post object created
$post = new Post($db);

// function redirect_to($page)
// {
//     header("Location:".$page);
//     exit;
// }

?>