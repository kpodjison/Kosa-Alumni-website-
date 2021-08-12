<?php
//database class file
require('session.php');
require('database/DBController.php');
require('database/Alumni.php');
require('database/admin.php');
require('database/post.php');
//require pageName class file
require('PageName.php');


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

// fetch all categories
$allCategories = $post->getAllCategories();


// create pagename object
$pageName = new PageName();
$current_file_name = basename($_SERVER['PHP_SELF']);
$page_title = $pageName->setPageName($current_file_name);

?>