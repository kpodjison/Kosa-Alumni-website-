 <?php 

session_start();

if(empty($_SESSION['admin_id'])){
	
	  header('location: ..\adminlogin.php');
	
}

//connection
require_once('..\connection.php');

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <!--bootstrap  css-->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    
    <!-- local stylesheet-->
    <link href="stylesheet/style.css" rel="stylesheet">
      <!-- fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
            
            <!-- start of internal css -->
  <style>
        body {
          margin: 0;
          font-family: "Lato", sans-serif;
        }

        .sidebar {
          margin: 0px 0px 40px 0px;
          padding: 0;
          width: 190px;
          background-color: #9d0004;

          position: fixed;
          height: 100%;
          overflow: auto;
        }

        .sidebar a {
          display: block;
          color: #ffffe6;
          padding: 18px;
          border:1px solid black;
          text-decoration: none;
        }

        .sidebar a:hover{
          background-color: #000;
          color: #ffffe6;
        }
        .data_sec a{
          color:#fff;
          font-size:18px;

        }
        div.content {
          margin-left: 190px;
          height: 1000px;
        }
        .content_side{
          padding: 1px 16px;
        }

        footer{
            background: #9d0000;
            color:#ffffe6;
            font-size: 28px;
            height: 40px;
            width:100%;
            text-align: center;
            
        }

        table button{
          background:#9d0000;
          padding:5px;
          border:none;
          border-radius:13px;
        }
        /* registration form */
        .regform{
          position: absolute;
          top:15%;
          left:20%;
          display:none;
          padding: 20px;
          width:600px;
          background:#9d0000;

          
          }
          .rg lable{
              color:#fff;

          }

                  /* media queries */

                  /* start of query for alumni registration form */
        @media screen and (max-width: 990px)
        {

                .regform
                {
                    position: absolute;
                    top:30%;
                    left:28%;
                    display:none;
                    padding: 20px;
                    width:560px;
                    background:#9d0000;

                }


        }
        @media screen and (max-width: 810px)
        {

                .regform
                {
                    position: absolute;
                    top:30%;
                    left:31%;
                    display:none;
                    padding: 15px;
                    width:500px;
                    background:#9d0000;

                }


        }
        @media screen and (max-width: 760px)
        {

                .regform
                {
                    position: absolute;
                    top:30%;
                    left:28%;
                    display:none;
                    padding: 15px;
                    width:470px;
                    background:#9d0000;

                }


        }
        @media screen and (max-width: 700px)
        {

                .regform
                {
                    position: absolute;
                    top:56%;
                    left:10%;
                    display:none;
                    padding: 15px;
                    width:470px;
                    background:#9d0000;

                }


        }
        @media screen and (max-width: 560px)
        {

                .regform
                {
                    position: absolute;
                    top:56%;
                    left:6%;
                    display:none;
                    padding: 15px;
                    width:440px;
                    background:#9d0000;

                }


        }
        @media screen and (max-width: 500px)
        {

                .regform
                {
                    position: absolute;
                    top:96%;
                    left:4%;
                    display:none;
                    padding: 12px;
                    width:410px;
                    background:#9d0000;

                }


        }
        /* end of query for alumni registration form */

        @media screen and (max-width: 700px)
        {
          .sidebar {
            width: 100%;
            height: auto;
            position: relative;
            /* display:grid; */
            /* grid-template-columns: repeat(7, 1fr); */
          }
          .sidebar a {
            float: left;
          }
          div.content {
            margin-left: 0;}
            .kosa_footer{
              width:100%;
            }
        }



        @media screen and (max-width: 500px)
        {
          .sidebar {
            width: 100%;
            margin:0px;
          
          }
          .sidebar a {
            text-align: center;
            float: none;
          }
        }
  </style>
           <!-- end of internal css -->   

<title>Admin|Home</title>
</head>
<body>
<div class="sidewrapper">
                    <!-- start of sidebar -->
      <div class="sidebar">
              <a class="active" href="index.php">Welcome
                <?php
                $username = $_SESSION['admin_name'];
                echo $username;
                ?>
              </a>
              <a href="index.php" >Home</a>
              <a href="addnotice.php" >Add Notice</a>
              <a href="beneficiary.php">Add Beneficiary</a>
              <a href="#">Contributions</a>
              <a href="#" onclick="show_form()">Register Member</a>
              <a href="logout.php">Logout</a>
        </div>
      </div>
                  <!-- end of sidebar -->

    <div class="content">

              <!-- start of navbar -->          
              <div class="navside">
                        <nav class="navbar navbar-expand-lg ">
                                    <div class="container-fluid nav_div">
                                          <a class="navbar-brand kosa" href="../index.php" target="_blank">KOSA</a>
                                          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                            <span class="navbar-toggler-icon"></span>
                                          </button>
                                        <div class="collapse navbar-collapse knav" id="navbarSupportedContent">
                                        
                                            <form class="d-flex">
                                              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                              <button class="btn search_btn" type="submit">Search</button>
                                            </form>
                                        </div>
                                    </div>
                          </nav>
                        

              </div>
              <!-- end of navbar -->

              <!-- start of div containing main content -->
              <div class="container " id="home_content">        
              
                      
                    <div class="content_side ">

                      <div class="container data_sec">
                          <div class="row">

                            <div class="col-sm-4 top_data_dis dis_1">

                                  <div class="row">

                                      <div class="col-sm-8">
                                          <div class="col">

                                                <div class="row-sm-6">
                                                  <a href="http://">   
                                                  
                                                <!-- selecting total number of contributions -->
                                                <?php
                                                        $sql = "SELECT * FROM contribution";
                                                        $results = mysqli_query($conn,$sql);
                                                        if(($rows = mysqli_num_rows($results)) > 0)
                                                        {
                                                          echo $rows;
                                                        }else
                                                        {
                                                          echo "NO!";
                                                        }

                                                      ?>
                                                  </a>
                                              
                                                </div>
                                                <div class="row-sm-6">
                                                    <a href="http://">
                                        
                                                        <p>Contributions</p>

                                                    </a>
                                                </div>
                                          </div>
                                                    
                                      </div>
                                      <div class="col-sm-4">
                                        <a href="http://">
                                          <i class="fas fa-hand-holding-usd fa-3x"></i>
                                        </a>
                                        
                                      </div>


                                  </div>                                   


                            </div>
                            <div class="col-sm-4 top_data_dis dis_2">
                            <div class="row">

                                        <div class="col-sm-8">
                                            <div class="col">

                                                  <div class="row-sm-6">
                                                    <a href="beneficiary.php">                              
                                                    <!-- selecting total number of beneficiaries -->
                                                    <?php
                                                        $sql = "SELECT * FROM beneficiary";
                                                        $results = mysqli_query($conn,$sql);
                                                        if(($rows = mysqli_num_rows($results)) > 0)
                                                        {
                                                          echo $rows;
                                                        }else
                                                        {
                                                          echo "NO!";
                                                        }

                                                      ?>
                                                    </a>
                                                
                                                  </div>
                                                  <div class="row-sm-6">
                                                      <a href="beneficiary.php">                                                                                       
                                                      <p>Beneficiaries</p>

                                                      </a>
                                                  </div>
                                            </div>
                                                      
                                        </div>
                                        <div class="col-sm-4">
                                          <a href="beneficiary.php">
                                              <i class="far fa-money-bill-alt fa-3x"></i>
                                          </a>
                                          
                                        </div>
                                        </div>   
                            
                            </div>
                            <div class="col-sm-4 top_data_dis dis_3">

                                <div class="row">

                                          <div class="col-sm-8">
                                              <div class="col">

                                                    <div class="row-sm-6">
                                                      <a href="members.php"> 
                                                      <!-- selecting total number of registered members -->
                                                      <?php
                                                        $sql = "SELECT * FROM alumni";
                                                        $results = mysqli_query($conn,$sql);
                                                        if(($rows = mysqli_num_rows($results)) > 0)
                                                        {
                                                          echo $rows;
                                                        }else
                                                        {
                                                          echo "NO!";
                                                        }

                                                      ?>
                                                    
                                                      </a>
                                                  
                                                    </div>
                                                    <div class="row-sm-6">
                                                        <a href="members.php">
                                            
                                                        <p>Registered Members</p>

                                                        </a>
                                                    </div>
                                              </div>
                                                        
                                          </div>
                                          <div class="col-sm-4">
                                            <a href="members.php">
                                                <i class="fas fa-users fa-3x"></i>
                                            </a>
                                            
                                          </div>


                                          </div>  

                            </div>



                          </div>

                      </div>

                          
                                      

                    </div>
                

                    <!-- notifications -->

                    <div class="container"> 
                        <div class="col">
                            <div class="row-sm-4">
                              <h3>NOTIFICAIONS</h3>  
                              <hr>
                            </div>
                            <div class="row-sm-8">

                              <!-- notification table -->

                              <div class="table-responsive">
                                                <table class="table table-striped">                                          
                                                        <thead>
                                                            <tr>
                                                                <th>id</th>
                                                                <th>Type</th>
                                                                <th>Description</th>
                                                                <th>Date and Time</th>
                                                                <th>Creator</th>                                      
                                                            </tr>                                    
                                                        </thead>

                                                        <tbody>
                                                      
                                      <!-- fetching notifications from db -->
                                                      <?php
                                                              $sql = "SELECT * FROM notice";
                                                              $results = mysqli_query($conn,$sql);

                                                              if(mysqli_num_rows($results) > 0)
                                                              {
                                                                while($row = mysqli_fetch_assoc($results))
                                                                    {
                                                                      echo "<tr> <td>".$row['id']."</td><td>".$row['notice_type'].
                                                                      "</td><td>".$row['descrip']."</td><td>".$row['date_time'].
                                                                      "</td><td>".$row['creator']."</td></tr>";
                                                                    }  
                                                                  
                                                              }else{
                                                                echo "There are no notifications!";
                                                              }
                                                        
                                                        ?>                                      
                                                        </tbody>                                     
                                                
                                                </table>                      
                                      
                                            </div>
                              

                            </div>

                        </div>
                        


                    </div>

                    

              </div> 
              <!-- end of div containing main content -->

              <!-- start of footer -->          
            <footer style="margin-left:0px;"> &copy;KOSA <?php echo date("Y");?></footer>         
              <!-- end of home content -->
      
    </div>


 <!-- ***************************** start of default hidden contents**************************  -->

          <!-- start of alumni registration form -->
    <div class="container regform "  id="regform">
              
            

        <p style="color:#fff;text-align:center;font-size:29px;background:black;">Register An Alumni </p>
            
                  <form method="POST" class="rg" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                  <button style="float:right; margin-bottom:20px;border-radius: 90%" onclick="hide_form()" ><i class="far fa-times-circle fa-3x" style="color:black;"></i></button><br>
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
                        function test_input($data)
                        {
                          $data = trim($data);
                          $data = stripslashes($data);
                          $data = htmlspecialchars($data);
                          
                          return $data;

                        }

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
                          window.location='index.php'</script>";
                        }

                        }else{
                          echo "<script>alert(\"Inconsistent password input!\");
                          window.location='index.php'</script>";
                        }
                                  
                    }

            ?>








      
      </div>    
      
        
    

    </div>
          <!-- end of alumni registration form -->

 <!-- ****************************  end of default hidden contents****************************  -->

               <!-- start of form control script -->
    <script>

        <!-- hide registration form-->
          function hide_form()
          {
            
            var registration_form = document.getElementById("regform");
            registration_form.style.display="none";
          
          }
          function show_form()
          {
            var registration_form = document.getElementById("regform");
            registration_form.style.display="block";

          }
    </script>
              <!-- end of form control script -->
  <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>