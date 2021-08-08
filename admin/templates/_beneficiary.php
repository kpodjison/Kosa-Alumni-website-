<?php
 $_SESSION['UrlTracker'] = $_SERVER['PHP_SELF'];
 $admin->confirmLogin();
 $beneficiary = array();
 //add benefit category 
  if(isset($_POST['benefit_cat']))
  {
    if(empty($_POST['title'])){
      $_SESSION['ErrorMsg'] = "Sorry Title Cannot Be Empty!!";
    }
    else{
      $admin->addBenefitCategory();
    }
    
  }
   // get beneficiary information 
   if(isset($_GET['benid']))
   {
     $beneficiary_id = $_GET['benid'];
     if(!empty($beneficiary_id)){
      $beneficiary = $admin->getSingleAlumni($beneficiary_id);
     }
     
   }

 //add beneficiary 
  if(isset($_POST['add_benef']))
  {
   if(empty($_POST['id'])){
      $_SESSION['ErrorMsg'] = "Sorry Follow The Link Below To Add A Member!!";
    }              
   else if(empty($_POST['benef_type'])){
      $_SESSION['ErrorMsg'] = "Sorry Select Benefit Type!!";
    }       
    else{
      $admin->addBeneficiary();
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
  $allBenefitCategories = $admin->getBenefitCategory();
  $allBenefeciaries = $admin->getBeneficiary();
?>
<div class="container-fluid px-0">  
  <div class="container-fluid bg-dark mb-2 py-2">
       <div class="row">
         <div class="col-md-12">
            <h1 class="text-white"><span><i class="fas fa-hand-holding-usd me-1 text-primary"></i></span> Manage Beneficiaries</h1>
         </div>
       </div>                  
 </div> 
<div class="container-fluid">
    <div class="row">
      <div class="col-lg-8">
             <?php
                echo SuccessMsg();
                echo ErrorMsg();
            ?>
            <div class="alert alert-success">Please Select Beneficiary From 
              <a href="members.php#alumni_table">Here</a>
            </div>
          <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="mb-4">
            <div class="card">
              <div class="card-header bg-secondary text-white">
                <h3>Add Beneficiary</h3>
              </div>
              <div class="card-body bg-dark text-white">
                <?php   
                  foreach($beneficiary as $benef):                  
                   ?>
                <div class="form-group mb-2">
                  <label for="fname" class="mb-1">First Name</label>
                  <input type="text" id="fname" disabled name="fname" class="form-control" value="<?php echo $benef['firstname']??"" ?>">
                  <input type="hidden" name="id"  value="<?php echo $benef['id']??"" ?>">
                </div>
                <div class="form-group mb-2">
                  <label for="lname" class="mb-1">Last Name</label>
                  <input type="text" id="lname" disabled name="lname" class="form-control" value="<?php echo $benef['lastname']??"" ?>">
                </div>
                <?php endforeach;  ?>
                <div class="form-group mb-2">
                  <label for="benef_type" class="mb-1">Benefit type</label>
                  <select name="benef_type" id="benef_type" class="form-control">
                  <option value="" >--select benefit type--</option>
                  <?php  foreach($allBenefitCategories as $category): 
                    echo '<option value="'.$category['title'].'">'.$category['title'].'</option>';
                  ?>
                  <?php  endforeach; ?>
                  </select>
                </div>
                <div class="row">
                    <div class="col-lg-6  text-center text-white ">
                      <a href="index.php" class="btn btn-warning py-3" style="width:100%;height:60px;"> <span> <i class="fas fa-arrow-left"></i></span> Back To Dashboard</a>
                    </div>
                    <div class="col-lg-6 text-center text-white ">
                      <button class="btn btn-success"  type="submit" name="add_benef" style="width:100%;height:60px;"> <span> <i class="fas fa-check"></i></span> Add Beneficiary</button>
                    </div>
                </div> 

              </div>
            </div>
        </form>
             <!-- existing beneficiaries  -->
             <div class="col-lg-12">
              <h3>Existing Beneficiaries</h3>
            </div>
            <div class="table-responsive">
               <table class="table table-striped table-bordered table-responsive table-hover">
              <thead class="table-dark">
                <tr>
                  <th>No.</th>
                  <th>User Name</th>
                  <th>Benefit Type</th>
                  <th>Amount</th>
                  <th>Status</th>
                  <th>Added By</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $counter = 0;
                  foreach($allBenefeciaries as $alumnis):
                    $counter++;
                ?>
                <tr>
                  <td><?php echo $counter; ?></td> 
                  <?php 
                    $ben_details = $admin-> getSingleAlumni($alumnis['ben_id']);
                    foreach($ben_details as $detail):
                  ?>
                  <td>
                    <?php echo htmlentities($detail['firstname'])." ".htmlentities($detail['lastname']) ?>
                  </td>
                  <?php  endforeach; ?>
                  <td><?php echo htmlentities($alumnis['ben_type']) ?></td>
                  <td><?php echo htmlentities($alumnis['amount'] ) ?></td>
                  <td>
                   <?php 
                    if($alumnis['status']=="in-progress")
                    {
                       echo  '<span class="badge bg-warning">In-progress</span> ';
                    }
                    else if ($alumnis['status']=="done")
                    {
                      echo  '<span class="badge bg-success">Done</span> ';
                    }
                   ?>
                  </td>
                  <td><?php echo htmlentities($alumnis['creator'] ) ?></td>
    
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
                    <h3>Add Benefit Category</h3>
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
                          <button class="btn btn-success"  type="submit" name="benefit_cat" style="width:100%;height:60px;"> <span> <i class="fas fa-check"></i></span> Pubish</button>
                        </div>
                    </div> 

                  </div>
                </div>
            </form>

      </div>
    </div>
</div>
