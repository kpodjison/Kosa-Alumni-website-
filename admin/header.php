<?php require('../functions.php'); ?>
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
        <!-- start of header  -->
        <nav class="navbar navbar-light navbar-dark bg-dark navbar-expand-lg">
          <div class="container-fluid">
            <a href="index.php" class="navbar-brand">KOSA</a>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#kosa-navbar-collapse" aria-controls="kosa-navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            <div class="collapse navbar-collapse" id="kosa-navbar-collapse">
                  <ul class="navbar-nav me-auto mb-2">
                    <li class="nav-item">
                      <a href="profile.php" class="nav-link">My Profile</a>
                    </li>
                    <li class="nav-item">
                      <a href="index.php" class="nav-link">Dashboard</a>
                    </li>
                    <li class="nav-item">
                      <a href="category.php" class="nav-link">Category</a>
                    </li>
                    <li class="nav-item">
                      <a href="post.php" class="nav-link">Post</a>
                    </li>
                    <li class="nav-item">
                      <a href="admins.php" class="nav-link">Manage Admins</a>
                    </li>
                    <li class="nav-item">
                      <a href="notice.php" class="nav-link">Manage Notice</a>
                    </li>
                    <li class="nav-item">
                      <a href="comments.php" class="nav-link">Comments</a>
                    </li>
                    <li class="nav-item">
                      <a href="../index.php" target="_blank" class="nav-link">KOSA LIVE</a>
                    </li>
                    <li class="nav-item">
                      <a href="logout.php" class="nav-link">Logout</a>
                    </li>
                  </ul>
                  <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                  </form>


            </div>         
          </div>
        </nav>  
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12 bg-primary" style="min-height:10px;"></div>
          </div>
        </div>     
        <!-- end of header  -->
<main>
   
