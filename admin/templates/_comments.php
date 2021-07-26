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
            <h1 class="text-white"><span><i class="fas fa-edit text-primary"></i></span> Manage Comments</h1>
         </div>
       </div>                    
  </div> 
  <div class="container mb-2">
         
    <div class="row">
      <div class="offset-lg-1 col-lg-10">
         <?php
            echo SuccessMsg();
            echo ErrorMsg()
         ?>
                <!-- //start of  unapproved comments table  -->
         
            <div class="col-lg-12">
              <h3>Unapproved Comments</h3>
            </div>
            <table class="table table-striped table-bordered table-responsive table-hover">
              <thead class="table-dark">
                <tr>
                  <th>No.</th>
                  <th>Date&Time</th>
                  <th>Category Name</th>
                  <th>Creator Name</th>
                  <th>Action</th>
                  <th>Live Preview</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $counter = 0;
                  foreach($allCategories as $category):
                    $counter++;
                ?>
                <tr>
                  <td><?php echo $counter; ?></td>
                  <td><?php echo htmlentities($category['date_time']) ?></td>
                  <td><?php echo htmlentities($category['title']) ?></td>
                  <td><?php echo htmlentities($category['author']) ?></td>
                  <td class="text-center">
                    <div class="btn-group" role="group">                    
                      <a href="category.php?catid=<?php echo htmlentities($category['id']); ?>" class="btn btn-success me-2">Approve</a>
                      <a href="category.php?catid=<?php echo htmlentities($category['id']); ?>" class="btn btn-danger ms-1">Delete</a>
                    </div>
                  </td>
                  <td class="text-center"><a href="kosa.php?catid=<?php echo htmlentities($category['id']); ?>" class="btn btn-primary">Live Preview</a></td>
                 
                </tr>
                <?php  endforeach; ?>
              </tbody>
            </table>
            <div class="col-lg-12">
              <h3>Approved Comments</h3>
            </div>
            <table class="table table-striped table-bordered table-responsive table-hover">
              <thead class="table-dark">
                <tr>
                  <th>No.</th>
                  <th>Date&Time</th>
                  <th>Category Name</th>
                  <th>Creator Name</th>
                  <th>Action</th>
                  <th>Live Preview</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $counter = 0;
                  foreach($allCategories as $category):
                    $counter++;
                ?>
                <tr>
                  <td><?php echo $counter; ?></td>
                  <td><?php echo htmlentities($category['date_time']) ?></td>
                  <td><?php echo htmlentities($category['title']) ?></td>
                  <td><?php echo htmlentities($category['author']) ?></td>
                  <td class="text-center">
                    <div class="btn-group" role="group">                    
                      <a href="category.php?catid=<?php echo htmlentities($category['id']); ?>" class="btn btn-warning me-2">DisApprove</a>
                      <a href="category.php?catid=<?php echo htmlentities($category['id']); ?>" class="btn btn-danger ms-1">Delete</a>
                    </div>
                  </td>
                  <td class="text-center"><a href="category.php?catid=<?php echo htmlentities($category['id']); ?>" class="btn btn-primary">Live Preview</a></td>
                 
                </tr>
                <?php  endforeach; ?>
              </tbody>
            </table>
         
  
          <!-- //end of category table  -->
      </div>
    </div>
  </div>


 