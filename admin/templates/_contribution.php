<?php
    $_SESSION['UrlTracker'] = $_SERVER['PHP_SELF'];
    $admin->confirmLogin();
?>
<?php  

    $contributor= array();
       // get contributor information 
   if(isset($_GET['memid']))
   {
     $contributor_id = $_GET['memid'];
     if(!empty($contributor_id)){
      $contributor = $admin->getSingleAlumni($contributor_id);
     }
     
   }

 //add contribution
  if(isset($_POST['add_cont']))
  {
      if(empty($_POST['contr_id']))
      {
          $_SESSION['ErrorMsg'] = "Sorry Follow The Link Below To Add A Member!!";
      }              
      else if(empty($_POST['amount']))
      {
        $_SESSION['ErrorMsg'] = "Sorry Amount Cannot Be Empty!!";  
      }
      else if(!is_numeric($_POST['amount']))
        {
          $_SESSION['ErrorMsg'] = "Sorry Amount Can Only Be A Number!!";
        }
        else{
          $admin->addContribution();
        }
            
  

    
  }

      // fetch all categories
      $allBenefitCategories = $admin->getBenefitCategory();
      $allBenefeciaries = $admin->getBeneficiary("p");
      $allContributors = $admin->getAllContributors();
      
      

    
   
?>

<div class="container-fluid px-0">  
      <div class="container-fluid bg-dark mb-2 py-2">
            <div class="row">
              <div class="col-md-12">
                  <h1 class="text-white"><span><i class="fas fa-money-bill-alt me-1"></i></span> Manage Contributions</h1>
              </div>
            </div>                  
      </div> 
  <div class="container">
    <div class="row">
      <div class="col-lg-3">
        <div class="card bg-dark text-white text-center mb-3">
          <div class="card-header">
            <h3>Amount Donated</h3>
            <p><span><i class="fas fa-readme"></i> </span><?php echo $totalNotice??0;?></p>
          </div>
          
        </div>
        <div class="card bg-dark text-white text-center mb-3">
          <div class="card-header">
            <h3>Beneficiaries</h3>
            <p><span><i class="fas fa-readme"></i> </span> 5</p>
          </div>
          
        </div>
        <div class="card bg-dark text-white text-center mb-3">
          <div class="card-header">
            <h3>Contributions</h3>
            <p><span><i class="fas fa-readme"></i> </span> 5</p>
          </div>
          
        </div>

      </div>
      <div class="col-lg-9">

      <?php
                echo SuccessMsg();
                echo ErrorMsg();
            ?>
            <div class="alert alert-success">Please Select Contributor From 
              <a href="members.php#alumni_table">Here</a>
            </div>
          <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="mb-4">
            <div class="card">
              <div class="card-header bg-secondary text-white">
                <h3>Add Contribution</h3>
              </div>
              <div class="card-body bg-dark text-white">
                <?php   
                  foreach($contributor as $cont):                  
                   ?>
                <div class="form-group mb-2">
                  <label for="c_fullname" class="mb-1">Contributor</label>
                  <input type="text" id="c_fullname" disabled name="c_fullname" class="form-control" value="<?php echo $cont['firstname']." ".$cont['lastname']??"" ?>">
                  <input type="hidden" name="contr_id"  value="<?php echo $cont['id']??"" ?>">
                </div>
                 <?php endforeach;  ?>               
                <div class="form-group mb-2">
                  <label for="benef_details" class="mb-1">Beneficiary</label>
                  <select name="benef_details" id="benef_details" class="form-control">
                  <option value="" >--select beneficiary--</option>
                  <?php  foreach($allBenefeciaries as $beneficiary): 
                     
                      $id = $beneficiary['ben_id'];
                      $alumni = $admin->getSingleAlumni($id);
                      foreach($alumni as $user):
                          echo '<option value="'.$beneficiary['id'].'">'.$user['lastname']." ".$user['firstname']." -- ".$beneficiary['ben_type'].'</option>';
                      endforeach;
                  ?>
                  <?php 
                 endforeach; ?>
                  </select>
                </div>
                <div class="form-group mb-2">
                  <label for="amount" class="mb-1">Amount</label>
                  <input type="text" required name="amount" id="amount" class="form-control" value="">
                </div>
                <div class="row">
                    <div class="col-lg-6  text-center text-white ">
                      <a href="index.php" class="btn btn-warning py-3" style="width:100%;height:60px;"> <span> <i class="fas fa-arrow-left"></i></span> Back To Dashboard</a>
                    </div>
                    <div class="col-lg-6 text-center text-white ">
                      <button class="btn btn-success"  type="submit" name="add_cont" style="width:100%;height:60px;"> <span> <i class="fas fa-check"></i></span> Contribute</button>
                    </div>
                </div> 

              </div>
            </div>
        </form>

          <!-- current notices  -->
           <h3>List of Contributors</h3>

           <div class="table-responsive">
               <table class="table table-striped table-bordered table-responsive table-hover">
              <thead class="table-dark">
                <tr>
                  <th>No.</th>
                  <th>Contributor</th>
                  <th>Benefactor</th>
                  <th>Benefit Type</th>
                  <th>Amount</th>
                  <th>DateTime</th>
                  <th>Action</th>
                  <th>Added By</th>
                </tr>
              </thead>
              <tbody>
                <?php   
                   $counter = 0;
                  foreach($allContributors as $contributor): 
                  $counter++; ?>
                <tr>
                  <td><?php echo $counter; ?></td> 
                  <?php 
                    $con_details = $admin-> getSingleAlumni($contributor['contrb_id']);
                    foreach($con_details as $detail):
                  ?>
                  <td>
                    <?php echo htmlentities($detail['firstname'])." ".htmlentities($detail['lastname']) ?>
                  </td>
                  <?php  endforeach; ?>
                  <?php 
                    $ben_details = $admin-> getSingleAlumni($contributor['benf_id']);
                    foreach($ben_details as $detail):
                  ?>
                  <td><?php echo htmlentities($detail['firstname'])." ".htmlentities($detail['lastname']) ?></td>
                  <?php  endforeach; ?>

                  <td><?php echo htmlentities($contributor['benf_type'] ) ?></td>
                  <td><?php echo htmlentities($contributor['amount'] ) ?></td>
                  <td><?php echo htmlentities($contributor['date_time'] ) ?></td>
                  <td>
                  <div class="btn-group" role="group">                    
                      <a href="contribution.php?eid=<?php echo htmlentities($contributor['contrb_id']); ?>" class="btn btn-warning me-2">Edit</a>
                      <a href="contribution.php?did=<?php echo htmlentities($contributor['contrb_id']); ?>" class="btn btn-danger ms-1">Delete</a>
                    </div>
                  </td>
                  <td><?php echo htmlentities($contributor['creator'] ) ?></td>
                 
    
                </tr>
                <?php  endforeach; ?>
              </tbody>
            </table>
            </div> 
            
      </div>
    </div>


   