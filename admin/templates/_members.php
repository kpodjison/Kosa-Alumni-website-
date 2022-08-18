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

          //fetching all post from pagination link
          if(isset($_GET['page']))
          {   
              if(is_numeric($_GET['page']))
              {
                $allAlumni = $admin->getPaginationMemb();
              }else
              {
                  $_GET['page'] = 1;
                  $allAlumni = $admin->getPaginationMemb();
              }
              
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
                <div class="row">
                  <div class="form-group mb-2 col-md-6">
                    <label for="fname" class="mb-1">First Name</label>
                    <input type="text" id="fname" name="fname" class="form-control form-control-sm">
                  </div>
                  <div class="form-group mb-2 col-md-6">
                    <label for="lname" class="mb-1">Last Name</label>
                    <input type="text" id="lname" name="lname" class="form-control form-control-sm">
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
                  </div>
                  <div class="form-group mb-2 col-md-6">
                    <label for="phnum" class="mb-1">Phone Number</label>
                    <input type="tel" id="phnum" name="phnum" class="form-control form-control-sm">
                  </div>
                </div>
                <div class="row">
                  <div class="form-group mb-2 col-md-6">
                    <label for="email" class="mb-1">Email</label>
                    <input type="email" id="email" name="email" class="form-control form-control-sm">
                  </div>                  
                  <div class="form-group mb-2 col-md-6">
                    <label for="occupation" class="mb-1">Occupation</label>
                    <input type="text" id="occupation" name="occupation" class="form-control form-control-sm">
                  </div>
                </div>
                <div class="form-group mb-2">
                  <label for="alumni_bio" class="mb-1">Biography</label>
                  <textarea type="text" id="alumni_bio" name="alumni_bio" class="form-control form-control-sm" cols="30" rows="5"></textarea>
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
              <h3 id="alumni_table">Existing Alumni</h3>
            </div>
            <div class="table-responsive" id="alumni_table">
               <table class="table table-striped table-bordered table-responsive table-hover table-sm">
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
                      <a href="beneficiary.php?benid=<?php echo htmlentities($alumnis['id']); ?>" class="btn btn-sm btn-secondary me-2">Benefit</a>
                      <a href="contribution.php?memid=<?php echo htmlentities($alumnis['id']); ?>" class="btn btn-sm btn-success me-2">Contribute</a>
                      <a href="editalumni.php?memid=<?php echo htmlentities($alumnis['id']); ?>" class="btn btn-sm btn-warning me-2">Edit</a>
                      <a href="members.php?memid=<?php echo htmlentities($alumnis['id']); ?>" class="btn btn-sm btn-danger ms-1">Delete</a>
                    </div>
                  </td>
                  <!-- <td class="text-center"><a href=members.php?memid=<?php echo htmlentities($alumnis['id']); ?>" class="btn btn-sm btn-primary">Details</a></td> -->
                  <td class="text-center"><button type="button" class="btn btn-primary details_btn btn-sm" value="<?php echo htmlentities($alumnis['id']); ?>">Details</button>                 
                </tr>
                <?php  endforeach; ?>
              </tbody>
            </table>            
            </div>  
              <!-- start of pagination  -->
   <ul class="pagination pagination-lg justify-content-center">

      <?php  
              $TotalAlumni = count($admin->getAllAlumni());
          // echo $TotalAlumni;
              $pagination = ceil($TotalAlumni/10);
              // echo $pagination;
              //variable to hold current page id  
              $currentPage = null;

              /*set page to 1 by default if it's empty or if its greater 
              than the total number of posts 
              */
              if(empty($_GET['page'])){
              $_GET['page'] = 1;
          }
          
      ?>

    <!-- start of backward button  -->
    <?php
            if(isset($_GET['page']))
            {   
                $currentPage = $_GET['page'];  
                $PrevPage = $_GET['page'] - 1;
                if($currentPage > 1 && $currentPage <=$pagination){
                        echo '<li class="page-item">
                        <a href="members.php?page='.$PrevPage.'"class="page-link">&laquo;</a>
                            </li> ';
                }                                   
            }

        ?>
        <!-- end of backward button  -->
      <?php              
          for($i = 1; $i <= $pagination; $i++)
          {    
          $currentPage = $_GET['page'];
          if( $i == $currentPage )
          {
              echo '<li class="page-item active" ><a href="members.php?page='.$i.'" class="page-link">'.$i.'</a></li>';
          }
          else
          echo '<li class="page-item" ><a href="members.php?page='.$i.'" class="page-link">'.$i.'</a></li>';
          }
      ?>

          <!-- //start of forward button  -->
      <?php
          $NextPage = $_GET['page'] + 1;

          if(isset($_GET['page']))
          {
          if($NextPage <= $pagination)
          {
          echo '<li class="page-item" ><a href="index.php?page='.$NextPage.'" class="page-link">&raquo;</a></li>';
          }

          }
      ?>
          <!-- //end of forward button  -->
   </ul>
          <!-- end of pagination  -->
            
  
          <!-- //end of members table  -->

          <!-- start of member modal  -->
          <div class="alumni_modal">
                <div class="modal_content">
                  <button class="btn btn-primary rounded-circle close_btn">&times;</button>
                      <div class="table-responsive" id="alumni_table">
                        <table class="table table-responsive table-hover table-sm">
                            <thead class="bg-dark text-white">
                            <tr class="">
                              <th>First&nbsp;Name</th>
                              <th>Last&nbsp;Name</th>
                              <th>Gender</th>
                              <th>Phone&nbsp;No.</th>
                              <th>Email</th>
                              <th>Occupation</th>
                              <th style="width: 40%;">Bio</th>
                            </tr>
                            </thead>
                            <tbody class="bg-kosa-3">
                              <tr>
                                <td class="alumni_fname"></td>
                                <td class="alumni_lname"></td>
                                <td class="alumni_gender"></td>                               
                                <td class="alumni_phn"></td>                               
                                <td class="alumni_email"></td>                               
                                <td class="alumni_occupation"></td>                               
                                <td class="alumni_bio"></td>                               
                              </tr>
                            </tbody>
                        </table>
                    </div>  
                </div>
          </div>
          <!-- end of member modal -->
      </div>
    </div>
  </div>


 