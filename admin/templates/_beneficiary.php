<?php
    
    // Handling creation of alumni
    if(isset($_POST['add_memb'])){
        
        if(!empty($_POST['fname']))
        {
            if(strlen($_POST['fname']) < 3)
            {
                $_SESSION['ErrorMsg'] = "Alumni firstname cannot be short!!"; 
            }            
            else if(strlen($_POST['fname']) > 15)
            {
                $_SESSION['ErrorMsg'] = "Alumni firstname should be less than 15 characters!!"; 

            }
            else{
                $admin->addAlumni();                           
            }                   
           
        }
        else if(empty($_POST['fname'])){
            $_SESSION['ErrorMsg'] = "Please add a firstname!!";         
           
        }       
    }

    //delete admin
    if(isset($_GET['admid']))
    {
        $admin->DeleteAdmin();
    }

    //get all alumni
    $allAlumni = $admin->getAllAlumni();    
    //print_r($allAlumni);

?>
<div class="container-fluid px-0">  
  <div class="container-fluid bg-dark mb-2 py-2">
       <div class="row">
         <div class="col-md-12">
            <h1 class="text-white"><span><i class="fas fa-users text-primary"></i></span> Manage Alumni</h1>
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
                <h3>Add New Alumni</h3>
              </div>
              <div class="card-body bg-dark text-white">
                <div class="form-group mb-2">
                  <label for="fname" class="mb-1">First Name</label>
                  <input type="text" id="fname" name="fname" class="form-control">
                </div>
                <div class="form-group mb-2">
                  <label for="lname" class="mb-1">Last Name</label>
                  <input type="text" id="lname" name="lname" class="form-control">
                </div>
                <div class="form-group mb-2">
                  <label for="gender" class="mb-1">Gender</label>
                  <select name="gender" id="gender" class="form-control">
                    <option value="" >--select gender--</option>
                    <option value="male" >Male</option>
                    <option value="female" >Female</option>
                  </select>
                </div>
                <div class="form-group mb-2">
                  <label for="phnum" class="mb-1">Phone Number</label>
                  <input type="tel" id="phnum" name="phnum" class="form-control">
                </div>
                <div class="form-group mb-2">
                  <label for="email" class="mb-1">Email</label>
                  <input type="email" id="email" name="email" class="form-control">
                </div>
                <div class="form-group mb-2">
                  <label for="occupation" class="mb-1">Occupation</label>
                  <input type="text" id="occupation" name="occupation" class="form-control">
                </div>
                <div class="form-group mb-2">
                  <label for="alumni_bio" class="mb-1">Bio</label>
                  <input type="text" id="alumni_bio" name="alumni_bio" class="form-control">
                </div>
                <div class="row">
                    <div class="col-lg-6  text-center text-white ">
                      <a href="index.php" class="btn btn-warning py-3" style="width:100%;height:60px;"> <span> <i class="fas fa-arrow-left"></i></span> Back To Dashboard</a>
                    </div>
                    <div class="col-lg-6 text-center text-white ">
                      <button class="btn btn-success"  type="submit" name="add_memb" style="width:100%;height:60px;"> <span> <i class="fas fa-check"></i></span> Add Alumni</button>
                    </div>
                </div> 

              </div>
            </div>
        </form>

          <!-- //start of member table  -->
         
            <div class="col-lg-12">
              <h3>Existing Alumni</h3>
            </div>
            <div class="table-responsive">
               <table class="table table-striped table-bordered table-responsive table-hover">
              <thead class="table-dark">
                <tr>
                  <th>No.</th>
                  <th>Date&Time</th>
                  <th>User Name</th>
                  <th>Email</th>
                  <th>PhoneNum</th>
                  <th>Added By</th>
                  <th>Action</th>
                  <th>Preview</th>
                  
                </tr>
              </thead>
              <tbody>
                <?php
                  $counter = 0;
                  foreach($allAlumni as $alumnis):
                    $counter++;
                ?>
                <tr>
                  <td><?php echo $counter; ?></td>
                  <td><?php echo htmlentities($alumnis['date_time']) ?></td>
                  <td><?php echo htmlentities($alumnis['firstname'])." ".htmlentities($alumnis['lastname']) ?></td>
                  <td><?php echo htmlentities($alumnis['email'] ) ?></td>
                  <td><?php echo htmlentities($alumnis['phone_num'] ) ?></td>
                  <td><?php echo htmlentities($alumnis['creator'] ) ?></td>
                  <td class="text-center">
                  <div class="btn-group" role="group">                    
                      <a href="contribute.php?memid=<?php echo htmlentities($alumnis['id']); ?>" class="btn btn-success me-2">Contribute</a>
                      <a href="members.php?memid=<?php echo htmlentities($alumnis['id']); ?>" class="btn btn-warning me-2">Edit</a>
                      <a href="members.php?memid=<?php echo htmlentities($alumnis['id']); ?>" class="btn btn-danger ms-1">Delete</a>
                    </div>
                  </td>
                  <td class="text-center"><a href=members.php?memid=<?php echo htmlentities($alumnis['id']); ?>" class="btn btn-primary">Details</a></td>
                 
                </tr>
                <?php  endforeach; ?>
              </tbody>
            </table>
            </div>  
  
          <!-- //end of members table  -->
      </div>
    </div>
  </div>


 