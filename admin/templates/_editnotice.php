 <?php
 $_SESSION['UrlTracker'] = $_SERVER['PHP_SELF'];
 $admin->confirmLogin();


  //delete notice
  if(isset($_GET['nteid']))
  {
    $singleNotice = $admin->getNotice($_GET['nteid']);    
  }
  //edit notice
  if(isset($_POST['edit_not']))
  {
   
      $admin->editNotice();
    
    
  }


    // fetch all categories
  $allNoticeCategories = $admin->getnoticeCategory();
?>
<div class="container-fluid px-0">  
  <div class="container-fluid bg-dark mb-2 py-2">
       <div class="row">
         <div class="col-md-12">
            <h1 class="text-white"><span><i class="fas fa-edit text-primary"></i></span> Edit Notice</h1>
         </div>
       </div>                  
 </div> 
<div class="container-fluid my-4" style="min-height:500px;">
    <div class="row">
      <div class="col-lg-8 offset-lg-2 mb-4">
             <?php
                echo SuccessMsg();
                echo ErrorMsg()
            ?>
           <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="mb-4">
                  <div class="card">
                    <?php  foreach($singleNotice as $notice):?>
                      <div class="card-body bg-dark text-white">
                            <div class="form-group mb-2">
                                <label for="heading" class="mb-1">Heading</label>
                                <input type="text" id="heading" required name="heading" class="form-control" value="<?php echo $notice['heading'] ?>">
                                <input type="hidden"  name="id" class="form-control" value="<?php echo $notice['id'] ?>">
                                <small class="lead text-danger float-end" style="font-size:13px;">Please give a short descriptive heading (eg. abc's wedding or outdooring)</small>
                            </div>
                            <div class="form-group mb-2">
                              <label for="noticeDesc" class="mb-1">Description</label>
                              <textarea class="form-control" required name="noticeDesc" id="noticeDesc" cols="30" rows="5"><?php echo $notice['descrip'] ?></textarea>
                            </div>
                            <div class="row">
                                  <div class="col-lg-6">
                                    <div class="form-group mb-2">
                                          <label for="c_notice_type" class="mb-1 text-warning">Current Notice Type</label>
                                          <input type="text" id="heading" disabled class="form-control" value="<?php echo $notice['notice_type'] ?>">
                                          <label for="notice_type" class="mb-1">Notice Type</label>
                                          <select name="notice_type" id="notice_type" required class="form-control">
                                            <option value="" >--select notice type--</option>
                                            <?php foreach($allNoticeCategories as $cat): ?>
                                            <option value="<?php echo htmlentities($cat['title']); ?>" ><?php echo htmlentities($cat['title']); ?></option>
                                            <?php  endforeach; ?>
                                          </select>
                                    </div>
                                  </div>
                                  <div class="col-lg-6 mb-2">
                                       <label for="c_dueDate" class="mb-1 text-warning">Current Due Date</label>
                                       <?php   
                                         if(empty($notice['due_date']))
                                         {
                                           echo '<input type="text" id="" name="date" disabled class="form-control" value="N/A">';
                                         }
                                         else{
                                          echo '<input type="text" id="" name="date" disabled class="form-control" value="'.$notice['due_date'].'">';
                                         }
                                        
                                       ?>
                                       <label for="dueDate" class="mb-1">Due Date</label>
                                          <input type="date" name="dueDate" id="dueDate" class="form-control" value="2021/1/1" min="2021/1/1" max="2031/1/1">
                                          <small class="lead text-danger float-end" style="font-size:13px;">This can be empty if notice has no due date</small>
                                  </div>

                            </div>  
                            <div class="row">
                                <div class="col-lg-6  text-center text-white mb-2">
                                  <a href="notice.php" class="btn btn-warning py-3" style="width:100%;height:60px;"> <span> <i class="fas fa-arrow-left"></i></span> Back To Notice</a>
                                </div>
                                <div class="col-lg-6 text-center text-white mb-2">
                                  <button class="btn btn-success"  type="submit" name="edit_not" style="width:100%;height:60px;"> <span> <i class="fas fa-check"></i></span> Update Notice</button>
                                </div>
                            </div> 

                      </div>
                    <?php endforeach;?>
                  </div>
             </form>

      </div>
    </div>
</div>
