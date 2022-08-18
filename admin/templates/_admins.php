<?php
    $_SESSION['UrlTracker'] = $_SERVER['PHP_SELF'];
    $admin->confirmLogin();
?>
<?php
    
    // Handling creation of Admin 
    if(isset($_POST['add_admin'])){
        $password = $_POST['Password'];
        $confirm_password = $_POST['ConfirmPassword'];
        if(!empty($_POST['Username']))
        {
            if(strlen($_POST['Username']) < 4)
            {
                $_SESSION['ErrorMsg'] = "Admin username cannot be short!!"; 
            }
            else if(strlen($_POST['Password']) < 4)
            {
                $_SESSION['ErrorMsg'] = "Password cannot be short!!"; 
            }
            else if(strlen($_POST['Username']) > 49)
            {
                $_SESSION['ErrorMsg'] = "Admin username should be less than 50 characters!!"; 

            }
            else if($password != $confirm_password){

                $_SESSION['ErrorMsg'] = "Password and ConfirmPassword not matching!!"; 
            }
            else{
                $admin->addAdmin();                           
            }                   
           
        }
        else if(empty($_POST['Username'])){
            $_SESSION['ErrorMsg'] = "Please add a username!!";         
           
        }       
    }

    //delete admin
    if(isset($_GET['admid']))
    {
        $admin->DeleteAdmin();
    }

    //get all admins
    $allAdmins = $admin->getAllAdmins();    
    // print_r($allAdmins);

?>
<div class="container-fluid px-0">  
  <div class="container-fluid bg-dark mb-2 py-2">
       <div class="row">
         <div class="col-md-12">
            <h1 class="text-white"><span><i class="fas fa-users text-primary"></i></span> Manage Admin</h1>
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
                <h3>Add New Admin</h3>
              </div>
              <div class="card-body bg-dark text-white">
                <div class="form-group mb-2">
                  <label for="Username" class="mb-1">User Name</label>
                  <input type="text" id="Username" name="Username" class="form-control form-control-sm ">
                </div>
                <div class="form-group mb-2">
                  <label for="Name" class="mb-1">Name</label>
                  <input type="text" id="Name" name="Name" class="form-control form-control-sm ">
                </div>
                <div class="form-group mb-2">
                  <label for="Password" class="mb-1">Password</label>
                  <input type="password" id="Password" name="Password" class="form-control form-control-sm ">
                </div>
                <div class="form-group mb-2">
                  <label for="ConfirmPassword" class="mb-1">Confirm Password</label>
                  <input type="ConfirmPassword" id="" name="ConfirmPassword" class="form-control form-control-sm">
                </div>
                <div class="row">
                    <div class="col-lg-6  text-center text-white ">
                      <a href="index.php" class="btn btn-warning py-3" style="width:100%;height:60px;"> <span> <i class="fas fa-arrow-left"></i></span> Back To Dashboard</a>
                    </div>
                    <div class="col-lg-6 text-center text-white ">
                      <button class="btn btn-success"  type="submit" name="add_admin" style="width:100%;height:60px;"> <span> <i class="fas fa-check"></i></span> Create Admin</button>
                    </div>
                </div> 

              </div>
            </div>
        </form>

          <!-- //start of category table  -->
         
          <div class="col-lg-12"><h3>Existing Amins</h3></div>
              
            
            <div class="table-responsive">
                  <table class="table table-striped table-bordered table-responsive table-hover">
                    <thead class="table-dark">
                      <tr>
                        <th>No.</th>
                        <th>Date&Time</th>
                        <th>User Name</th>
                        <th>Admin Name</th>
                        <th>Added By</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $counter = 0;
                        foreach($allAdmins as $admin):
                          $counter++;
                      ?>
                      <tr>
                        <td><?php echo $counter; ?></td>
                        <td><?php echo htmlentities($admin['date_time']) ?></td>
                        <td><?php echo htmlentities($admin['username']) ?></td>
                        <td><?php echo htmlentities($admin['a_name']) ?></td>
                        <td><?php echo htmlentities($admin['added_by']) ?></td>
                        <td class="text-center"><a href="admins.php?admid=<?php echo htmlentities($admin['id']); ?>" class="btn btn-sm btn-danger">Delete</a></td>
                      
                      </tr>
                      <?php  endforeach; ?>
                    </tbody>
                </table>
            </div>
            
         
  
          <!-- //end of category table  -->
      </div>
    </div>
  </div>


 