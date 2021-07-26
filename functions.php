<?php
//database class file
require('database/DBController.php');
require('database/Notice.php');
require('database/Alumni.php');
require('database/Beneficiary.php');
require('database/admin.php');
require('database/post.php');
require('session.php');

//DBController object
$db = new DBController();


//notice object created
$notice= new Notice($db);
$all_notice = $notice->getData();

// alumni object created 
$alumni = new Alumni($db);
$all_alumni = $alumni->getData();


//beneficiary object created
$beneficiary = new Beneficiary($db);
$all_beneficiary = $beneficiary->getData();


//admin object created
$admin = new Admin($db);

//post object created
$post = new Post($db);
?>