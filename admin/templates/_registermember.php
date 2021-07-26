      <div class="row text-white">
      
          <div class="container regform col-sm-12 col-lg-6 "  id="regform" >
                  <h4 style="color:#fff;text-align:center;font-size:29px;background:black;padding:2px;">Register An Alumni </h4>
                  
                        <form method="POST" class="rg" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" >
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
                            
                            <input type="submit" class="btn btn-primary form-control" name="reg_mem" value="REGISTER" style="padding:5px;font-size:25px;
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

          <div class="col-sm-12 col-lg-6" >
                  <h4 style="color:#fff;text-align:center;font-size:29px;background:black;padding:2px;">Currently Registered</h4>
          
          
          </div>
      
      </div>
      <!-- start of alumni registration form -->
      
      <!-- end of alumni registration form -->