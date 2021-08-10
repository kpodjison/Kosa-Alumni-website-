<?php
    $_SESSION['UrlTracker'] = $_SERVER['PHP_SELF'];
    $admin->confirmLogin();
?>
<?php  

    // all notices
    $allNotice = $admin->getNotice();
    $totalNotice = count($admin->getNotice());
    // print_r($allNotice);
    $allPosts = $post->getLatestPost(5);
    $totalPost = $post->getPostTotal();
    $totalAlumni =count($admin->getAllAlumni()); 
    // echo $totalAlumni;

    $totalContributions = count($admin->getAllContributors());
    $totalBeneficiaries= count($admin->getBeneficiary(""));

    
   
?>

<div class="container-fluid px-0">  
  <div class="container-fluid bg-dark mb-2 py-2">
       <div class="row">
         <div class="col-md-12">
            <h1 class="text-white">Dashboard</h1>
         </div>
       </div>         
        <div class="row mb-2">
              <div class="col-md-2 col-sm-12 mb-1">
                <a href="addpost.php" class="btn bg-primary text-white"><span><i class="fas fa-plus me-1"></i> </span> Add Post</a>
              </div>
              <div class="col-md-2 col-sm-12 mb-1">
                <a href="category.php" class="btn btn-primary"><span><i class="fab fa-buffer me-1"></i> </span> Add Category</a>
              </div>
              <div class="col-md-2 col-sm-12 mb-1">
                <a href="members.php" class="btn btn-primary"><span><i class="fas fa-user me-1"></i> </span> Add User</a>
              </div>
              <div class="col-md-2 col-sm-12 mb-1">
                <a href="beneficiary.php" class="btn btn-primary"><span> <i class="fas fa-hand-holding-usd me-1"></i> </span> Add Beneficiary</a>
              </div>
              <div class="col-md-2 col-sm-12 mb-1">
                <a href="notice.php" class="btn btn-primary"><span><i class="fas fa-bullhorn me-1"></i> </span> Add Notice</a>
              </div>
              <div class="col-md-2 col-sm-12 mb-1">
                <a href="contribution.php" class="btn btn-primary"><span><i class="fas fa-money-bill-alt me-1"></i> </span> Add Contribution</a>
              </div>           
         </div>

      </div>                
  </div> 
  <div class="container">
    <div class="row">
      <div class="col-lg-3">
        <div class="card bg-dark text-white text-center mb-3">
          <div class="card-header">
            <h3>Posts</h3>
            <p><span><i class="fas fa-readme"></i> </span> <?php echo $totalPost??0;?></p>
          </div>
          
        </div>
        <div class="card bg-dark text-white text-center mb-3">
          <div class="card-header">
            <h3>Notice</h3>
            <p><span><i class="fas fa-readme"></i> </span><?php echo $totalNotice??0;?></p>
          </div>
          
        </div>
        <div class="card bg-dark text-white text-center mb-3">
          <div class="card-header">
            <h3>Members</h3>
            <p><span><i class="fas fa-readme"></i> </span> <?php echo $totalAlumni??0;?></p>
          </div>
          
        </div>
        <div class="card bg-dark text-white text-center mb-3">
          <div class="card-header">
            <h3>Beneficiaries</h3>
            <p><span><i class="fas fa-readme"></i> </span><?php echo $totalBeneficiaries??0;?> </p>
          </div>
          
        </div>
        <div class="card bg-dark text-white text-center mb-3">
          <div class="card-header">
            <h3>Contributions</h3>
            <p><span><i class="fas fa-readme"></i> </span> <?php echo $totalContributions??0;?> </p>
          </div>
          
        </div>

      </div>
      <div class="col-lg-9">

          <!-- current notices  -->
           <h3>Current Notices</h3>
             <div class="table-responsive mb-4">
                <table class="table table-striped table-bordered table-responsive table-hover">
                  <thead class="table-dark">
                    <tr>
                      <th>No.</th>
                      <th>Date&Time</th>
                      <th>Notice Type</th>
                      <th>Description</th>
                      <th>Due Date</th>                      
                      <th>Creator</th>                      
                      <th>Preview</th>                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $counter = 0;
                      foreach($allNotice as $notice):
                        $counter++;
                    ?>
                    <tr>
                      <td><?php echo $counter; ?></td>
                      <td><?php echo htmlentities($notice['date_time']) ?></td>
                      <td><?php echo htmlentities($notice['notice_type']) ?></td>
                      <td><?php echo htmlentities($notice['descrip']) ?></td>
                      <td>
                          <span class="badge btn-warning text-dark">
                            
                                  <?php 
                                if(empty($notice['due_date']))
                                {
                                  echo 'N/A';
                                }else{
                                  echo htmlentities($notice['due_date'] ?? 'N/A');
                                }
                              ?>
                          </span>  
                      <td><?php echo htmlentities($notice['creator']) ?></td>
                      <td><a href="" class="btn btn-primary" target="_blank">Preview</a></td>
                    </tr>
                    <?php  endforeach; ?>
                  </tbody>
                </table>
             </div>


             <!-- current Posts -->
          
                      <div class="table-responsive my-3">
                          <h3>Current Posts</h3>
                          <table class="table table-striped table-bordered table-hover">
                              <thead class="table-dark">
                                  <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Date&Time</th>
                                    <th>Author</th>
                                    <th>Comment</th>                                    
                                    <th>Live Preview</th>

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
                                    <td>comment</td>                    
                                    <td>
                                    <a href="../fullpost.php?id=<?php echo htmlentities($post['id']) ?>" class="btn btn-primary me-2" target="_blank">Preview</a>
                                    </td>
                                    
                                  </tr>
                                  <?php endforeach; ?>
                              </tbody>
                          </table>
                      </div>
               
  

      </div>
    </div>


   