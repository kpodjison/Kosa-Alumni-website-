<?php
    if(isset($_POST['admin_login']))
    {

        if(empty($_POST['Username']) ||  empty($_POST['Password']) )
        {
            $_SESSION['ErrorMsg'] = "All fields must be filled!!";
        }
        else if(strlen($_POST['Username']) < 4)
        {
            $_SESSION['ErrorMsg'] = "Invalid Username!!";
            
        }        
        else{
            $admin->adminLogin();
        }        
    }    

?>
   <!-- start of login form -->                   
<div class="wrapper " style="min-height:520px">
      <div class="bg-dark text-white p-2 text-center"><h2>WELCOME TO KOSA 2008( The 12 Disciples ) ADMIN LOGIN PAGE</h2></div>
        <div class="container my-5 px-4">
          <div class="row ">
            <div class="col-lg-8 offset-lg-2 ">
              <?php
                  echo SuccessMsg();
                  echo ErrorMsg();
              ?>
              <div class="row">
                <div class="col-lg-3 bg-kosa-blue p-3">
                    <p class="text-white text-center py-4">KOSA Admin Login</p>                  
                </div>
                <div class="col-lg-9 bg-dark p-3">
                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);  ?>">
                        <div class="form-group mb-2 text-white">
                             <lable for="Username">Username</lable>
                             <input type="text" name="Username" id="Username" class="form-control" placeholder="Enter your username" value="" >
                        </div>
                        <div class="form-group text-white">
                             <lable for="Password">Password</lable>
                             <input type="password" class="form-control" id="Password"  name="Password" placeholder="Enter password" ><br><br> 
                        </div>                                          
                        <input type="submit" name="admin_login" value="LOGIN" class="btn bg-kosa-blue float-end">
                    </form>

                </div>
              </div>
            </div>
          </div>
        </div>
            <!-- end of login form --> 
</div>
                      
