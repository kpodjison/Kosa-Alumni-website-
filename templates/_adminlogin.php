<?php
//start session
// session_start();
// 
//add connection file
require_once('connection.php');

//check if admin has already logged in
// if(isset($_SESSION['admin_id']) )
// {
//   header('location: admin\index.php');
//   exit;
// }
 ?>


<!-- handling login -->
<?php


    //function to validate user input
    function test_input($data)
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      
      return $data;

    }

      //vars to hold email and password
      $email = $password = "";

      //var to hold email and password error messages
      //email and password error can be used in the future to prompt user
      $email_err = $password_err ="";


      // if($_SERVER["REQUEST_METHOD"] == "POST")
      if(isset($_POST["login"]))
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

          //perform database operations 
          $sql = "SELECT * FROM admin WHERE email = '$email' and admin_password = '$password' ";
          $results = mysqli_query($conn,$sql);
      
              if(mysqli_num_rows($results) == 1)
              {
                $admin = mysqli_fetch_assoc($results);

                //set session variables
                $_SESSION['admin_id'] = $admin['id'];
                //get admin name from alumni table using admin_details
                $alumni_id = $admin['admin_details'];
                $sql = "SELECT * FROM alumni WHERE EXISTS(SELECT * FROM admin WHERE admin.admin_details=alumni.id)";
                $results = mysqli_query($conn,$sql);
                if(mysqli_num_rows($results) == 1)
                {
                  $admin_details = mysqli_fetch_assoc($results);
                  /*use firstname of alumni to set $_SESSION['admin_name']
                  This helps to keep track of admin logged in at a particular time and the
                  modification they make in the system
                  */
                  $_SESSION['admin_name'] = $admin_details['firstname'];

                }          
                header('location: admin\index.php');
              }else{
                    echo "<p style='text-align:center; color:rgb(255, 0,20);'>Wrong Email or Password</p>";            
          
              }


        
      }
?>

                    
<div class="wrapper">
      <div class="greetings"><p>WELCOME TO KOSA 2008( The Disciples ) LOGIN PAGE</p></div>
    
           <!-- start of login form -->
           <div class="outercontainer">

                  <div class="container innercontainer" >
                            <div class="sider" style="width:40%;"><p>KOSA Admin Login</p>  </div>                          
                        
                            <div class="formdiv" style="width:60%;">
                          

                                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);  ?>">
                                        <lable for="email">Email</lable>
                                        <input type="email" name="email" placeholder="Enter your email" value="<?php echo $email; ?>" required><br><br>
                                        <lable for="password"  >Password</lable>
                                        <input type="password" name="password" placeholder="Enter password" required><br><br>            
                                        <input type="submit" name="login" value="LOGIN" style="background:#00b8e6;color:#000;padding:5px;font-size:25px;
                                        border:none;border-radius:20px;width:150px;">


                                        </form>
                                        <br>
                                        <a href="alumnilogin.php" >Login as Alumni</a>
                            </div>
                  </div>
                 

          </div>
            <!-- end of login form -->  
    

     

</div>
                      
