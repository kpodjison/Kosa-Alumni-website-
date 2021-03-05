<?php
//start session
session_start();

//add connection file
require_once('connection.php');

//check if admin has already logged in
if(isset($_SESSION['admin_id']) )
{
  header('location: admin\index.php');
  exit;
}
?>

 <!-- *********************************************** html main **************************************** -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--bootstrap  css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    
    <!-- local stylesheet-->
    <link href="stylesheet/style.css" rel="stylesheet">

          <!-- start of internal css -->
    <style>
  
        nav{
            background:#00b8e6 ;
            /* #9d0000; */

            /* #ffffe6; */
        }
        nav a{
            color:#000;
        }
        .knav a:hover{
            background:#000;
          color: #00b8e6;
          
        }
        .search_btn{
            background: #000;
            color: #00b8e6;
        }
        .search_btn:hover{
            background:#fff;
            color: #000;
        }
        footer{
            background: #000;
            color:#00b8e6;
            font-size: 28px;
            height: 40px;
            text-align: center;
        }

    </style>

    <!-- end of internal css -->

    <title>Login|Admin</title>
</head>
<body >
                        <!-- start of navbar -->
<nav class="navbar navbar-expand-lg ">
  <div class="container-fluid nav_div">
    <a class="navbar-brand" href="index.php">KOSA</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse knav" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Forum</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="alumnilogin.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="register.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact Admins</a>
        </li>
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li> -->
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn search_btn" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

                        <!-- end of navbar -->

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
                      



                    <!-- start of footer  -->
<footer> &copy;KOSA <?php echo date("Y");?></footer>
                    <!-- start of footer  -->




  <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

</body>
</html>