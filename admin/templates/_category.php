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
            <h1 class="text-white"><span><i class="fas fa-edit text-primary"></i></span> Manage Category</h1>
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
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="mb-4">
            <div class="card">
              <div class="card-header bg-secondary text-white">
                <h3>Add Post Category</h3>
              </div>
              <div class="card-body bg-dark text-white">
                <div class="form-group mb-2">
                  <label for="title" class="mb-1">Category Title</label>
                  <input type="text" id="title" name="title" class="form-control">
                </div>
                <div class="row">
                    <div class="col-lg-6  text-center text-white ">
                      <a href="index.php" class="btn btn-warning py-3" style="width:100%;height:60px;"> <span> <i class="fas fa-arrow-left"></i></span> Back To Dashboard</a>
                    </div>
                    <div class="col-lg-6 text-center text-white ">
                      <button class="btn btn-success"  type="submit" name="add_cat" style="width:100%;height:60px;"> <span> <i class="fas fa-check"></i></span> Pubish</button>
                    </div>
                </div> 

              </div>
            </div>
        </form>

          <!-- //start of category table  -->
         
            <div class="col-lg-12">
              <h3>Existing Categories</h3>
            </div>
            <table class="table table-striped table-bordered table-responsive table-hover">
              <thead class="table-dark">
                <tr>
                  <th>No.</th>
                  <th>Date&Time</th>
                  <th>Category Name</th>
                  <th>Creator Name</th>
                  <th>Action</th>
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
                  <td class="text-center"><a href="category.php?catid=<?php echo htmlentities($category['id']); ?>" class="btn btn-danger">Delete</a></td>
                 
                </tr>
                <?php  endforeach; ?>
              </tbody>
            </table>
         
  
          <!-- //end of category table  -->
      </div>
    </div>
  </div>


 