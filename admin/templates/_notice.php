 <?php
 $_SESSION['UrlTracker'] = $_SERVER['PHP_SELF'];
 $admin->confirmLogin();
 //add notice category 
  if(isset($_POST['notice_cat']))
  {
    if(empty($_POST['title'])){
      $_SESSION['ErrorMsg'] = "Sorry Title Cannot Be Empty!!";
    }
    else{
      $admin->noticeCategory();
    }
    
  }
 //add notice 
  if(isset($_POST['add_not']))
  {
    if(empty($_POST['heading'])){
      $_SESSION['ErrorMsg'] = "Sorry Please Give A Descriptive Heading!!";
    }
     else if(empty($_POST['noticeDesc'])){
      $_SESSION['ErrorMsg'] = "Sorry Notice Description Cannot Be Empty!!";
    }
    else if(empty($_POST['notice_type'])){
      $_SESSION['ErrorMsg'] = "Sorry Select Notice Type!!";
    }    
    else if(strlen($_POST['heading']) > 30){
      $_SESSION['ErrorMsg'] = "Sorry Heading Cannot Be More Than 30 Characters!!";
    }    
    else{
      $admin->addNotice();
    }
    
  }

  //delete notice
  if(isset($_GET['ntdid']))
  {
    if(empty($_GET['ntdid'])){
      $_SESSION['ErrorMsg'] = "Sorry Inavid Id!!";
    }
    else{
      $admin->DeleteNotice();
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
  $allNoticeCategories = $admin->getnoticeCategory();
  $allNotice = $admin->getNotice("");
?>
<div class="container-fluid px-0">  
  <div class="container-fluid bg-dark mb-2 py-2">
       <div class="row">
         <div class="col-md-12">
            <h1 class="text-white"><span><i class="fas fa-edit text-primary"></i></span> Manage Notice</h1>
         </div>
       </div>                  
 </div> 
<div class="container-fluid">
    <div class="row">
      <div class="col-lg-8">
             <?php
                echo SuccessMsg();
                echo ErrorMsg()
            ?>
           <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="mb-4">
                  <div class="card">
                      <div class="card-header bg-secondary text-white">
                          <h3>Add Notice</h3>
                      </div>
                      <div class="card-body bg-dark text-white">
                            <div class="form-group mb-2">
                                <label for="heading" class="mb-1">Heading</label>
                                <input type="text" id="heading" name="heading" class="form-control">
                                <small class="lead text-danger float-end" style="font-size:13px;">Please give a short descriptive heading (eg. abc's wedding or outdooring)</small>
                            </div>
                            <div class="form-group mb-2">
                              <label for="noticeDesc" class="mb-1">Description</label>
                              <textarea class="form-control" name="noticeDesc" id="noticeDesc" cols="30" rows="5"></textarea>
                            </div>
                            <div class="row">
                                  <div class="col-lg-6">
                                    <div class="form-group mb-2">
                                          <label for="notice_type" class="mb-1">Notice Type</label>
                                          <select name="notice_type" id="notice_type" class="form-control">
                                            <option value="" >--select notice type--</option>
                                            <?php foreach($allNoticeCategories as $cat): ?>
                                            <option value="<?php echo htmlentities($cat['title']); ?>" ><?php echo htmlentities($cat['title']); ?></option>
                                            <?php  endforeach; ?>
                                          </select>
                                    </div>
                                  </div>
                                  <div class="col-lg-6 mb-2">
                                       <label for="dueDate" class="mb-1">Due Date</label>
                                          <input type="date" name="dueDate" id="dueDate" class="form-control" value="2021/1/1" min="2021/1/1" max="2031/1/1">
                                          <small class="lead text-danger float-end" style="font-size:13px;">This can be empty if notice has no due date</small>
                                  </div>

                            </div>  
                            <div class="row">
                                <div class="col-lg-6  text-center text-white mb-2">
                                  <a href="index.php" class="btn btn-warning py-3" style="width:100%;height:60px;"> <span> <i class="fas fa-arrow-left"></i></span> Back To Dashboard</a>
                                </div>
                                <div class="col-lg-6 text-center text-white mb-2">
                                  <button class="btn btn-success"  type="submit" name="add_not" style="width:100%;height:60px;"> <span> <i class="fas fa-check"></i></span> Add Notice</button>
                                </div>
                            </div> 

                      </div>
                  </div>
             </form>
             <!-- existing notice  -->
             <div class="col-lg-12">
              <h3>Existing Notices</h3>
            </div>
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
                  <th>Action</th>
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
                  </td>
                  <td><?php echo htmlentities($notice['creator']) ?></td>
                  <td class="text-center">
                      <div class="btn-group" role="group">                    
                        <a href="editnotice.php?nteid=<?php echo htmlentities($notice['id']); ?>" class="btn btn-success me-2">Edit</a>
                        <a href="notice.php?ntdid=<?php echo htmlentities($notice['id']); ?>" class="btn btn-danger ms-1" onclick="return confirm('Are You Sure You Want To Delete This Notice?'); ">Delete</a>
                      </div>
                  </td>
                 
                </tr>
                <?php  endforeach; ?>
              </tbody>
            </table>
             </div>

      </div>

      <div class="col-lg-4">
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="mb-4">
                <div class="card">
                  <div class="card-header bg-secondary text-white">
                    <h3>Add Notice Category</h3>
                  </div>
                  <div class="card-body bg-dark text-white">
                    <div class="form-group mb-2">
                      <label for="title" class="mb-1">Category Title</label>
                      <input type="text" id="title" name="title" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-lg-6  text-center text-white mb-2">
                          <a href="index.php" class="btn btn-warning py-2" style="width:100%;height:60px;"> <span> <i class="fas fa-arrow-left"></i></span> Back To Dashboard</a>
                        </div>
                        <div class="col-lg-6 text-center text-white mb-2">
                          <button class="btn btn-success"  type="submit" name="notice_cat" style="width:100%;height:60px;"> <span> <i class="fas fa-check"></i></span> Pubish</button>
                        </div>
                    </div> 

                  </div>
                </div>
            </form>

      </div>
    </div>
</div>
