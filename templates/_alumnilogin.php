<?php
    require_once("connection.php");

    // session_start();
    // if(isset())


?>
    

<!-- handling login -->
<?php

          // method to validate user input
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

        if(isset($_POST["login"])){

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
            
            
            //perform db operations
            $sql = "SELECT * FROM alumni WHERE email='$email'and psd='$password' ";
            $results = mysqli_query($conn,$sql);
            //for debuffing
            echo "<p> $email $password</p>";
            
            
            if (mysqli_num_rows($results) == 1) {

              // output data of each row
              header('location: admin\index.php');
            } else {
              echo "Incorrect email and password";
            }
            
        mysqli_close($conn);


        }


?>


<div class="wrapper">
<div class="greetings"><p>WELCOME TO KOSA 2008( The Disciples ) LOGIN PAGE</p></div>

       <!-- start of login form -->  
    <div class="container" >
       
            <div class="outercontainer"  >

                <div class="container innercontainer" >
                    <div class="sider" style="width:50%;">

                    <p>KOSA Alumni Login</p>
                    </div>
                    <div class="formdiv" style="width:50%;">


                        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                            <lable for="email">Email</lable>
                            <input type="text" name="email" placeholder="Enter your email" required><br><br>
                            <lable for="password"  >Password</lable>
                            <input type="password" name="password" placeholder="Enter password" required><br><br>
                            <input type="submit" value="LOGIN" name="login" style="background:#00b8e6;color:#000;padding:5px;font-size:25px;
                            border:none;border-radius:20px;width:150px">


                        </form>
                        <br>
                        <a href="register.php" >Register Now!</a> <br>
                        <a href="adminlogin.php" >Login as Admin</a>
                    </div>

                </div>

            </div>


    </div>
      <!-- end of login form -->  

</div>
        