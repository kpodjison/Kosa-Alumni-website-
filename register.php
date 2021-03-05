<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--bootstrap  css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    
           <!-- local stylesheet-->    
    <link href="stylesheet/regstyle.css" rel="stylesheet">

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
    <title>Register|</title>
</head>
<body>
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

      <div class="wrapper">


          <div class="greetings"><p>WELCOME TO KOSA 2008( The Disciples ) LOGIN PAGE</p></div>
                
                    <!-- start of registration form -->                          
                                <div class="container innercontainer" >
                                          <p>Register For An Alumni Account</p>
                                          <div class="container formdiv" >


                                              <form action="POST">
                                                  
                                                  <lable for="firstname">Firstname</lable>
                                                      <input type="text" class="form-control"  style="width:50%" name="firstname" placeholder="Enter firstname" required><br>
                                                  <lable >Lastname</lable>
                                                      <input type="text" class="form-control" style="width:50%"  name="lastname" placeholder="Enter Lastname" required><br>
                                                  <lable>PhoneNumber</lable>
                                                      <input type="text" class="form-control" style="width:50%"  name="phonenum" placeholder="Enter phonenumber" required><br>
                                                  <lable for="email">Email</lable>
                                                      <input type="email" class="form-control" style="width:50%"  name="email" placeholder="Enter your email" required><br>
                                                  <lable for="reg_code">Registration code</lable>
                                                      <input type="text" class="form-control" style="width:50%"  name="reg_code" placeholder="Enter registration code" required><br>
                                                  <lable for="password" placeholder="Enter password" >Password</lable>
                                                      <input type="password" class="form-control" style="width:50%"  name="password" placeholder="Enter password" required><br>
                                                  <lable>Comfirm Password</lable>
                                                      <input type="text" class="form-control" style="width:50%"  name="comfirm_password" placeholder="Comfirm password" required><br>                   
                                                      <input type="submit" class="form-control" value="REGISTER" style="background:#00b8e6;color:#000;padding:5px;font-size:25px;
                                                  border:none;border-radius:20px;width:150px">


                                              </form>
                                              <br>

                                              <span>Already have an account?<a href="alumnilogin.php" >Login Now!</a></span> 
                                          
                                          </div>       
              
                                </div>
                  <!-- end of registration form -->  

      </div>

            <!-- start of footer  -->
<footer> &copy;KOSA <?php echo date("Y");?></footer>
             <!-- end of footer  -->


  <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

</body>
</html>


