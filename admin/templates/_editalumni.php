<?php
    
    // Handling creation of alumni
    if(isset($_POST['edit_memb'])){
        
        if(empty($_POST['fname']) && empty($_POST['lname']) && empty($_POST['gender']) && empty($_POST['phnum']) &&
        empty($_POST['email']) &&  empty($_POST['occupation']) &&  empty($_POST['alumni_bio']))
        { $_SESSION['ErrorMsg'] = "Failed To Edit Alumni Info. No Info Modified!!"; 

        }
        else
        {
          $alumni-> editAlumni();  
        }       
    }

    //Get alumni info
    if(isset($_GET['memid']))
    {
      $alumni_id = $_GET['memid'];
      $sing_alumni = $alumni->getSingleData($alumni_id);
    }


?>
<div class="container-fluid px-0">  
  <div class="container-fluid bg-dark mb-2 py-2">
       <div class="row">
         <div class="col-md-12">
            <h1 class="text-white"><span><i class="fas fa-users text-primary"></i></span> Manage Alumni</h1>
         </div>
       </div>                    
  </div> 
  <div class="container mb-2 tp-container">
         
    <div class="row">
      <div class="offset-lg-1 col-lg-10">
         <?php
            echo SuccessMsg();
            echo ErrorMsg()
         ?>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])."?memid=".$alumni_id; ?>" method="POST" class="mb-4">
            <div class="card">
              <div class="card-header bg-secondary text-white">
                <h3>Edit Alumni Info</h3>
              </div>
              <?php if(!empty($sing_alumni)){
                foreach($sing_alumni as $memb):
                ?>
              <div class="card-body bg-dark text-white">
                <div class="row">
                   <div class="form-group mb-2 col-md-6">
                      <label for="fname" class="mb-1">First Name</label>
                      <input type="text" id="fname" name="fname" class="form-control form-control-sm">
                      <input type="hidden"  name="alumni_id" value="<?php echo $alumni_id;?>">
                      <p class="text-warning">Existing First Name:&nbsp;<?php echo $memb['firstname'];?></p>
                   </div>
                   <div class="form-group mb-2 col-md-6">
                      <label for="lname" class="mb-1">Last Name</label>
                      <input type="text" id="lname" name="lname" class="form-control form-control-sm">
                      <p class="text-warning">Existing Last Name:&nbsp;<?php echo $memb['lastname'];?></p>
                   </div>
                </div>
                <div class="row">
                   <div class="form-group mb-2 col-md-6">
                      <label for="gender" class="mb-1">Gender</label>
                      <select name="gender" id="gender" class="form-select form-select-sm">
                        <option value="" >--select gender--</option>
                        <option value="male" >Male</option>
                        <option value="female" >Female</option>
                      </select>
                      <p class="text-warning">Existing Gender:&nbsp;<?php echo $memb['gender'];?></p>
                  </div>
                  <div class="form-group mb-2 col-md-6">
                    <label for="phnum" class="mb-1">Phone Number</label>
                    <input type="tel" id="phnum" name="phnum" class="form-control form-control-sm">
                    <p class="text-warning">Existing Phone Number:&nbsp;<?php echo $memb['phone_num'];?></p>
                  </div>                  
                </div>
                <div class="row">
                  <div class="form-group mb-2 col-md-6">
                    <label for="email" class="mb-1">Email</label>
                    <input type="email" id="email" name="email" class="form-control form-control-sm">
                    <p class="text-warning">Existing Email:&nbsp;<?php echo $memb['email'];?></p>
                  </div>
                  <div class="form-group mb-2 col-md-6">
                    <label for="occupation" class="mb-1">Occupation</label>
                    <input type="text" id="occupation" name="occupation" class="form-control form-control-sm">
                    <p class="text-warning">Existing Occupation:&nbsp;<?php echo $memb['occupation'];?></p>
                  </div>
                </div>                
                <div class="form-group mb-2">
                  <label for="alumni_bio" class="mb-1">Biography</label>
                  <textarea type="text" col="30" row="10" id="alumni_bio" name="alumni_bio" class="form-control form-control-sm"></textarea>
                  <p class="text-warning">Existing biography: &nbsp;<?php echo $memb['bio'];?></p>
                </div>
                <div class="row">
                    <div class="col-lg-6  text-center text-white">
                      <a href="index.php" class="btn btn-warning py-3" style="width:100%;height:60px;"> <span> <i class="fas fa-arrow-left"></i></span> Back To Dashboard</a>
                    </div>
                    <div class="col-lg-6 text-center text-white ">
                      <button class="btn btn-success"  type="submit" name="edit_memb" style="width:100%;height:60px;"> <span> <i class="fas fa-check"></i></span> Add Alumni</button>
                    </div>
                </div> 

              </div>
              <?php 
              endforeach;
              }?>
            </div>
        </form>
      </div>
    </div>
  </div>


 