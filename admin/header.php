<?php 

// session_start();

// if(empty($_SESSION['admin_id'])){
	
// 	  header('location: ..\adminlogin.php');
	
// }

//connection
// require_once('..\connection.php');
require('../functions.php');

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <!--bootstrap  css-->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    
    <!--bootstrap  css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        
    <!-- font awesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
            <!-- local stylesheet-->
            <link href="../style.css" rel="stylesheet">
        
            <!-- OwlCarousel2  -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            

<title>Admin|Home</title>
</head>
<body>
 <input type="checkbox" id="check">
  <main>
        <!-- start of header  -->
      <header> 
        <nav class="navbar navbar-light bg-danger  d-flex justify-content-between">
          <div class="container-fluid">
            <a class="navbar-brand">Navbar</a>
            <label for="check">
              <i class="fas fa-bars" id="sidebar_btn"></i>
            </label>
            <div>
            <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>


            </div>

         
          </div>
        </nav>    
          
        
      </header>
        <!-- end of header  -->
        
 <div class="sidebar">
            <center>
              <img src="./assets/images/1.png" alt="profile-pic" id="profile_pic">
              <p>Jeevista</p>
            </center>
              <!-- <a class="active" href="index.php">Welcome
                <?php
                $username = $_SESSION['admin_name'];
                echo $username;
                ?>
              </a> -->
              <a href="index.php" ><i class="fas fa-home"></i> <span>Home</span> </a>
              <a href="beneficiary.php" ><i class="fas fa-hand-holding-heart"></i><span>Add Beneficiary</span> </a>
              <a href="addnotice.php" ><i class="fas fa-bullhorn"></i> <span>Add Notice</span> </a>
              <a href="addnotice.php" ><i class="fas fa-edit"></i><span>Register Member</span> </a>
              <a href="logout.php" ><i class="fas fa-sign-out-alt"></i> <span>Logout</span> </a>
 </div>
 <div class="content">

   <p>this is a content Lorem ipsum dolor sit amet consectetur adipisicing elit.
    Aliquid, animi iste voluptatem mollitia ex ea sequi nisi? Unde exercitationem c
    onsequatur quis perferendis assumenda, consequuntur doloremque sapiente laborum totam
     esse ipsum dolor aperiam ex nemo minus aspernatur, quas cumque accusamus dolore! 
     Voluptas, quos!
    Tempora inventore commodi maiores laborum nulla, quam nostrum. </p>
 </div>