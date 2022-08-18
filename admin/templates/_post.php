<?php
 $_SESSION['UrlTracker'] = $_SERVER['PHP_SELF'];
 $admin->confirmLogin();
    $allPosts = $post->getAllPost("");
?>

<div class="container-fluid px-0 ">  
  <div class="container-fluid bg-dark mb-2 py-2">
       <div class="row ">
         <div class="col-md-12 ">
            <h1 class="text-white">Manage Posts</h1>
         </div>
       </div>         
        <div class="row mb-2">
              <div class="col-md-2 col-sm-12 mb-1">
                <a href="addpost.php" class="btn btn-sm bg-primary text-white"><span><i class="fas fa-plus me-1"></i> </span> Add Post</a>
              </div>
              <div class="col-md-2 col-sm-12 mb-1">
                <a href="addpost.php?type=kosagram" class="btn btn-sm bg-primary text-white"><span><i class="fas fa-plus me-1"></i> </span> Add Kosagram Post</a>
              </div>
              <div class="col-md-2 col-sm-12 mb-1">
                <a href="category.php" class="btn btn-sm btn-primary"><span><i class="fab fa-buffer me-1"></i> </span> Add Category</a>
              </div>                      
         </div>

      </div>                
  </div> 
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-8" style="min-height:410px;">
      <?php  
          echo SuccessMsg();
          echo ErrorMsg();
          
      ?>
          <div class="table-responsive my-3">
              <table class="table table-striped table-bordered table-hover">
                  <thead class="table-dark">
                      <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Date&Time</th>
                        <th>Author</th>
                        <th>Banner</th>
                        <th>Comment</th>
                        <th>Action</th>

                      </tr>
                  </thead>
                  <tbody>
                    <?php
                        $counter = 0;
                        foreach($allPosts as $post):
                          $counter++;  
                    ?>
                      <tr>
                        <td><?php  echo $counter;?></td>
                        <td><?php  echo htmlentities($post['title'])?></td>
                        <td><?php  echo htmlentities($post['category'])?></td>
                        <td><?php  echo htmlentities($post['date_time'])?></td>
                        <td><?php  echo htmlentities($post['author'])?></td>
                        <td><img src="../assets/uploads/<?php echo htmlentities($post['post_img'])?> " alt="banner" width="120px;" height="70px;"></td>
                        <td>comment</td>
                        <td>
                          <div class="btn-group">
                              <a href="editpost.php?id=<?php echo htmlentities($post['id']) ?>" class="btn btn-sm btn-success me-2"> Edit</a>
                              <a href="deletepost.php?id=<?php echo htmlentities($post['id']) ?>" class="btn btn-sm  btn-danger me-2" > Delete</a>
                              <a href="../fullpost.php?id=<?php echo htmlentities($post['id']) ?>" class="btn btn-sm btn-primary me-2" target="_blank">Preview</a>
                          </div>
                        </td>                        
                      </tr>
                      <?php endforeach; ?>
                  </tbody>
              </table>
          </div>
      </div>
    <div class="col-lg-4">
      <div class="table-responsive my-3">
      <table class="table table-striped table-bordered table-hover">
                  <thead class="bg-kosa-3">
                      <tr>
                        <th>#</th>
                        <th>Date&Time</th>
                        <th>Author</th>
                        <th>Banner</th>
                        <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php
                        $counter = 0;
                        foreach($allPosts as $post):
                          $counter++;  
                    ?>
                      <tr>
                        <td><?php  echo $counter;?></td>
                        <td><?php  echo htmlentities($post['date_time'])?></td>
                        <td><?php  echo htmlentities($post['author'])?></td>
                        <td><img src="../assets/uploads/<?php echo htmlentities($post['post_img'])?> " alt="banner" width="120px;" height="70px;"></td>
                        <td>
                          <div class="btn-group">
                              <a href="editpost.php?id=<?php echo htmlentities($post['id']) ?>" class="btn btn-sm btn-success me-2"> Edit</a>
                              <a href="deletepost.php?id=<?php echo htmlentities($post['id']) ?>" class="btn btn-sm  btn-danger me-2" > Delete</a>
                              <a href="../fullpost.php?id=<?php echo htmlentities($post['id']) ?>" class="btn btn-sm btn-primary me-2" target="_blank">Preview</a>
                          </div>
                        </td>                        
                      </tr>
                      <?php endforeach; ?>
                  </tbody>
              </table>
      </div>
    </div>
    </div>
  </div>