<?php 

// session_start();

// if(empty($_SESSION['admin_id'])){
	
// 	  header('location: ..\adminlogin.php');
	
// }

//connection
require_once('..\connection.php');

?>
      <!-- start of add notice content  -->
  <div class="content">

      <!-- *******************************start of default hidden contents*******************************  -->

      <!-- start of alumni registration form -->
      <div class="container regform "  id="regform">
                
              

              <p style="color:#fff;text-align:center;font-size:29px;background:black;">Register An Alumni </p>
              
                    <form method="POST" class="rg" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                    <button style="float:right; margin-bottom:20px;border-radius: 90%" onclick="hide_reg_form()" ><i class="far fa-times-circle fa-3x" style="color:black;"></i></button><br>
                        <lable for="firstname">Firstname</lable>
                        <input type="text" class="form-control" name="firstname" placeholder="Enter firstname" required><br>
                        <lable >Lastname</lable>
                        <input type="text" class="form-control" name="lastname" placeholder="Enter Lastname" required><br>
                        <lable>PhoneNumber</lable>
                        <input type="text" class="form-control" name="phonenum" placeholder="Enter phonenumber" required><br>
                        <lable for="email">Email</lable>
                        <input type="text" class="form-control" name="email" placeholder="Enter your email" required><br>
                        <lable for="password" placeholder="Enter password" >Password</lable>
                        <input type="password" class="form-control" name="password" placeholder="Enter password" required><br>
                        <lable>Comfirm Password</lable>
                        <input type="text" class="form-control" name="comfirm_password" placeholder="Comfirm password" required><br>
                        
                        <input type="submit" class="btn btn-primary form-control" name="reg_mem" value="REGISTER" style="background:#000;color:#fff;padding:5px;font-size:25px;
                        border:none;border-radius:20px;width:150px;margin-left:14px;">


                    </form>

                <!-- handling member registration -->
                <?php


                            //function to validate user input
                            // function test_input($data)
                            // {
                            //   $data = trim($data);
                            //   $data = stripslashes($data);
                            //   $data = htmlspecialchars($data);
                              
                            //   return $data;

                            // }

                        //vars to hold email and password
                        $firstname = $lastname = $phone_num = $email = $password = $comfirm_pass = $creator = "";
                        // vars to hold error messages
                        $firstname_err = $lastname_err = $phone_num_err = $email_err = $password_err = "";


                        // if($_SERVER["REQUEST_METHOD"] == "POST")
                        if(isset($_POST["reg_mem"]))
                        {
                            if(empty($_POST["email"]))
                            {
                              $email_err = "Email field is empty";
                            }else{
                              $email = test_input($_POST["email"]);
                            }
                            if(empty($_POST["password"]))
                            {
                              $password_err = "Password field is empty";
                            }else{
                              $password = test_input($_POST["password"]);
                            }
                            if(empty($_POST["firstname"]))
                            {
                              $firstname_err = "Firstname field is empty";
                            }else{
                              $firstname = test_input($_POST["firstname"]);
                            }
                            if(empty($_POST["lastname"]))
                            {
                              $lastname_err = "Lastname field is empty";
                            }else{
                              $lastname = test_input($_POST["lastname"]);
                            }
                            if(empty($_POST["phonenum"]))
                            {
                              $phone_num_err = "PhoneNum field is empty";
                            }else{
                              $phone_num = test_input($_POST["email"]);
                            }
                            
                            $comfirm_pass = test_input($_POST["comfirm_password"]);
                            $creator = $_SESSION['admin_name'];
                            //perform database operations 
                            $sql = "INSERT INTO alumni(firstname,lastname,phone_num,email,password,creator) VALUES('$firstname','$lastname','$phone_num','$email','$password','$creator')";
                            if($password == $comfirm_pass)
                            {

                              if(mysqli_query($conn,$sql)){

                                
                              echo "<script>alert(\"Member registered successfully!\");
                              window.location='members.php'</script>";
                            
                            }
                            else{
                              echo "<script>alert(\"Member registration unsuccessful!\");
                              window.location='addnotice.php'</script>";
                            }

                            }else{
                              echo "<script>alert(\"Inconsistent password input!\");
                              window.location='addnotice.php'</script>";
                            }
                                      
                        }
                        
                ?>

      
        </div>    
      </div>
      <!-- end of alumni registration form -->



      <!-- start of notification update form -->
      <div class="container regform"  id="not_upd" >


              <!-- handling notification update and delete-->
              <?php


                            //if user clicks delete to delete notice
                            if(isset($_GET['notice_delete_id']))
                            {
                              
                              $notice_del_id = $_GET['notice_delete_id'];
                              $sql = "DELETE FROM notice WHERE id = '$notice_del_id ' ";
                              if(mysqli_query($conn,$sql))
                              {
                                
                                echo "<script>alert(\"Notice deleted successfully!\");</script>";
                                echo "<script> window.location='addnotice.php'</script>";
                              }

                            }
                            
                            
                            //vars to notification details
                            $notice_type = $notice_desc = $notice_id =  "";
                            
                  
                          //if user clicks update to update notification
                            if(isset($_GET['notice_id']))
                            {

                              // search for notification corresponding to id
                              $notice_id = $_GET['notice_id'];
                              $get_notice = "SELECT * FROM notice WHERE id= '$notice_id' ";
                              $results = mysqli_query($conn,$get_notice);
                              if(mysqli_num_rows($results) > 0){
                                
                                if($row = mysqli_fetch_assoc($results))
                                  $notice_type = $row['notice_type'];
                                  $notice_desc = $row['descrip'];
                                  $notice_id   = $row['id'];


                              }
                              echo "<script>

                              document.getElementById(\"not_upd\").style.display=\"block\";
                              </script>";
                              
                                      
                            }

                //handling update to notification selected          
                if(isset($_POST['not_upd'])){

                      $notice_type    =  test_input($_POST['not_type']);                
                      $notice_desc    =   test_input($_POST['n_msg']);
                      $updator        =   $_SESSION['admin_name'];
                      $update_date    =   date("Y-m-d");
                      $notice_id      = $_POST['update_id'];

                      

                      //perform database update operations 
                      $sql = "UPDATE notice SET notice_type = '$notice_type',descrip = '$notice_desc ',
                      updator = '$updator ' ,update_date = '$update_date' WHERE id='$notice_id' ";
                    if(mysqli_query($conn,$sql)){

                          
                        echo "<script>alert(\"Notice update successfully!\");
                        window.location='addnotice.php'</script>";
                      
                      }
                      else{
                        
                        echo "<script>alert(\"Notice update unsuccessful!\");
                        window.location='addnotice.php'</script>";
                      }



                }



              ?>

                      
                  

                    <p style="color:#fff;text-align:center;font-size:29px;background:black;">Update Nofication </p>
                  
                          <form method="POST" class="rg" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                          <button style="float:right; margin-bottom:20px;border-radius: 90%" onclick="hide_notice_update_form()" ><i class="far fa-times-circle fa-3x" style="color:black;"></i></button><br>                      
                                                    
                              <lable for="type" style="font-size:20px;">Update Previous Notice Type</lable>
                                      <select id="not_type" name="not_type" style="width:40%;padding:8px;border-radius:5px;">
                                          <option value="<?php echo $notice_type;?>" selected><?php echo $notice_type;?></option>
                                          <option value=""></option>
                                          <option value="Wedding">Wedding</option>
                                          <option value="Outdooring">Outdooring</option>
                                          <option value="Birthday">Birthday</option>
                                          <option value="Funeral">Funeral</option>                         
                                          <option value="Others">Others</option>
                                        </select><br><br>                                                       
                              <lable for="n_msg" style="font-size:20px;">Update Previous Notification Message</lable><br>
                              <textarea name="n_msg" id="n_msg" class="form-control" cols="30" rows="10" ><?php echo $notice_desc;?>  </textarea><br>       
                              <input type="hidden"  name="update_id" value="<?php echo $notice_id;?> ">
                              <input type="submit" class="btn btn-primary form-control" name="not_upd" value="UPDATE" style="background:#000;color:#fff;padding:5px;font-size:25px;
                              border:none;border-radius:20px;width:180px;margin-left:14px;">


                          </form>

              

      
      </div>
      <!-- end of notification update form -->
      <!-- ****************************************** end of default hidden content *********************************** -->

</div>
      <!-- start of add notice content  -->
<!-- start of form control script -->
<script>

<!-- hide and show registration form-->
   

      
      <!-- hide and show contribution form-->
      function hide_notice_update_form()
      {
        
        var notice_update_form = document.getElementById("not_upd");
        notice_update_form.style.display="none";       
      }

      function show_notice_update_form()
      {
        
        var registration_form = document.getElementById("regform");
        var notice_update_form = document.getElementById("not_upd");
        if(registration_form.style.display="block"){
          registration_form.style.display="none";
          notice_update_form.style.display="block";
        }else
         registration_form.style.display="block"; 

      }

      <!-- hide and show reg form-->
      function hide_reg_form()
      {
        var registration_form = document.getElementById("regform");        
        registration_form.style.display="none";
        
             
      }
      function show_reg_form()
      {
        
        var registration_form = document.getElementById("regform");
        var notice_update_form = document.getElementById("not_upd");
        if(notice_update_form.style.display="block"){
          notice_update_form.style.display="none";
          registration_form.style.display="block";
        }else
         registration_form.style.display="block";
       
      }

</script>
