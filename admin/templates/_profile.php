<?php
    $_SESSION['UrlTracker'] = $_SERVER['PHP_SELF'];
    $admin->confirmLogin();
?>

<?php

 //add category 
  if(isset($_POST['add_cat']))
  {
    if(empty($_POST['title'])){
      $_SESSION['ErrorMsg'] = "Sorry Title Cannot Be Empty!!";
    }
    else{
      $post->addCategory();
    }
    
  }
  //delete category 
  if(isset($_GET['catid']))
  {
    if(empty($_GET['catid'])){
      $_SESSION['ErrorMsg'] = "Sorry Inavid Id!!";
    }
    else{
      $post->DeleteCategory();
    }
    
  }

    // fetch all categories
  $allCategories = $post->getAllCategories();
?>
<div class="container-fluid px-0">  
  <div class="container-fluid bg-dark mb-2 py-2">
       <div class="row">
         <div class="col-md-12">
            <h1 class="text-white"><span><i class="fas fa-edit text-primary"></i></span> My Profile</h1>
         </div>
       </div>                    
  </div> 


  <div class="container-fluid p-0">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="text-center">Admin Profile Page Is Under Construction</h1>
      <img src="../assets/daniel-mccullough--FPFq_trr2Y-unsplash.jpg" alt="" class="img-fluid" width="100%">
      </div>
    </div>
  </div>
