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
                background-color: #9d0000;

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

              div.content {
                margin-left: 190px;
                height: 1000px;
              }
              .content_side{
                padding: 1px 16px;
              }
              table button{
                background:#9d0000;
                padding:5px;
                border:none;
                border-radius:13px;
              }
              .note_adm{
                background:#0004;
                margin-top:5px;
                padding:10px;
              }
              #delete_btn{
                background:#9d0000;
                padding:8px;
                text-decoration:none;
                color:#fff;
                font-size:20px;
                border-radius:13px;
                
              }

              footer{
                  background: #9d0000;
                  color:#ffffe6;
                  font-size: 28px;
                  height: 40px;
                  width:100%;
                  text-align: center;
                  
              }
              /* search alumni input field */
              #alumni_name{
                width:35%;
                box-sizing:border-box;
                border:2px solid black;
                padding:10px;
                border-radius: 5px ;
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
              @media screen and (max-width: 700px) {
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
                  footer{
                    width:100%;
                  }
              }

              @media screen and (max-width: 500px) {
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

<title>Admin|members</title>
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
              <a href="addnotice.php">Add Notice</a>
              <a href="beneficiary.php">Add Beneficiary</a>
              <a href="#">Contributions</a>
              <a href="#" onclick="show_form()">Register Member</a>
              <a href="logout.php">Logout</a>
        </div>
        <!-- end of sidebar -->

              <!-- start of beneficiary content -->
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

                  <!-- start of add beneficiafy -->
                <div class="container" id="add_notice_content" style="margin-top:20px;">
                          <div class="container note_adm">
                                  <h2><b>NOTE:</b></h2>
                                  <p>Please search <b>exact firstname</b> or <b>lastname</b> of members to add to beneficiaries</p>
                                  <p>Please visit <a href="members.php">MEMBERS</a> if you are in doubt 
                                  of beneficiary's firstname and lastname.
                                </p>

                          </div>

                  
                          <form method="POST" id="kosa_notice" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" style="margin-top:14px;">
                                                              
                                    <input type="text" name="alumni_name" id="alumni_name" placeholder="Enter first or last name">                            
                                    <input type="submit" value="SEARCH MEMBER" name="alumni_search" style="background:#9d0000 ;color:#FFF;padding:5px;font-size:25px;
                                    border:none;border-radius:20px;width:230px">

                            </form>

                            <div class="container"> 
                              <div class="col">
                                <div class="row-sm-4 dis_3">
                                  <h3 style="text-align:center">MEMBERS</h3>                              
                                </div>
                                <div class="row-sm-8">

                                  <!-- beneficiary table -->

                                  <div class="table-responsive">
                                                    <table class="table table-striped">                                          
                                                            <thead>
                                                                <tr>                                                            
                                                                    <th> FirstName</th>
                                                                    <th>LastName</th>
                                                                    <th>Benefit Type</th>
                                                                    <th>Add to Beneficiary</th>
                                                                                                        
                                                                </tr>                                    
                                                            </thead>

                                                            <tbody>
                                                          
                                          <!-- fetching beneficiaries from db -->


                                          
                            <!-- send notification to db -->                  
                        <?php

                                                            
                                        //function to validate user input
                                        function test_input($data)
                                        {
                                          $data = trim($data);
                                          $data = stripslashes($data);
                                          $data = htmlspecialchars($data);
                                          
                                          return $data;

                                        }

                                        //vars to hold user name and creator
                                        $name = $creator ="";

                                        if(isset($_POST['alumni_search']))
                                        {
                                        $name = test_input($_POST["alumni_name"]);                     
                                        $creator = $_SESSION['admin_name'];

                                        if(!empty($name))
                                        {
                                            $sql = "SELECT * FROM alumni WHERE firstname='$name' or lastname= '$name' ";
                                            $results = mysqli_query($conn,$sql);
                                          if(mysqli_num_rows($results) > 0){
                                            while($row = mysqli_fetch_assoc($results))
                                                  {
                                                      echo "<tr>";
                                                      echo "<td>".$row['firstname']."</td>";
                                                      echo "<td>".$row['lastname']."</td>";
                                                      echo '<td><form method="GET" class="rg" action="beneficiary.php">                                              
                                            <select id="bft_type" name="bft_type" >                                    
                                                <option value="Wedding">Wedding</option>
                                                <option value="Outdooring">Outdooring</option>
                                                <option value="Birthday">Birthday</option>
                                                <option value="Funeral">Funeral</option>                         
                                                <option value="Others">Others</option>
                                              </select></td>'.                                                    
                                    '<td><input  type="hidden" name="bft_id" value="'. $row["id"].' ">                                    
                                    <input type="submit"  name="add_beft" value="ADD" onclick="return confirm(\'Are you sure you want to add '. $row["firstname"].'  \');"></form></td>';

                                                      echo "<tr>";
                                                  }


                                            
                                          }
                                          else
                                          {
                                            echo '<script>alert("No alumni with this name!!");</script>';  
                                                                  
                                          }

                                        }else
                                        {
                                        echo '<script>alert("Please enter a name.");</script>';  
                                        }


                                        }

                        ?>
                                                            
                                                                                            
                                                            </tbody>                                     
                                                    
                                                    </table>                      
                                          
                                                </div>
                                  

                                </div>

                    </div>                  
                  
                 </div> 
              <!-- end of add beneficiary -->

              <!-- start of add beneficiary to db -->
              <?php
                    if(isset($_GET['add_beft']))
                    {
                      
                      $alumni_id = $_GET['bft_id'];
                      $ben_type = "";
                      $ben_type  =  $_GET['bft_type'];
                      $creator = $_SESSION['admin_name'];
                      // $ben_fname = $_GET['bft_fname'];;
                      // $ben_lname =  $_GET['bft_lname'];

                            $sql = "INSERT INTO beneficiary(ben_id,ben_type,creator) 
                            VALUES( '$alumni_id','$ben_type','$creator')";
                            $results =mysqli_query($conn,$sql);
                            if($results){
                                echo "<script>alert(\"Benefiary added successfully!\");</script>";
                                echo "<script> window.location='beneficiary.php'</script>";

                            }else{
                              echo "<script>alert(\"Sorry,Couldn't add beneficiary!\");</script>";
                                echo "<script> window.location='beneficiary.php'</script>";

                            }                   
              
                    }         

              ?>
              <!-- end of add beneficiary to db -->         

                <!-- start of display benficiaries -->
              <div class="container" style="margin-top:30px;"> 



                          <div class="col">
                            <div class="row-sm-4 dis_2">                        
                            
                              <h3 style="text-align:center">BENEFICIARIES</h3>  
                            
                            </div>
                            <div class="row-sm-4 ">                        
                            
                              
                              <p>Below are the list of all KOSA members who are beneficiaries.You can perform operations 
                                such as deletion of beneficiary information.
                              </p> 
                            
                            
                            </div>

                            <div class="row-sm-8">

                              <!-- beneficiary table -->

                              <div class="table-responsive">
                                                <table class="table table-striped">                                          
                                                        <thead>
                                                            <tr>
                                                                <th>Firstname</th>
                                                                <th>Lastname</th>
                                                                <th>Type</th>
                                                                <th>Amount</th>
                                                                <th>Date and Time</th>
                                                                <th>Creator</th>
                                                                <th>Delete</th>
                                                                                                      
                                                            </tr>                                    
                                                        </thead>

                                                        <tbody>
                                                      
                                      <!-- fetching notifications from db -->
                                                      <?php
                                                              
                                                              $sql = "SELECT * FROM beneficiary";
                                                              $results = mysqli_query($conn,$sql);

                                                              if(mysqli_num_rows($results) > 0)
                                                              {
                                                                while($row = mysqli_fetch_assoc($results))
                                                                    {
                                                                      // get beneficiary firstname and lastname from alumni table
                                                                      $current_beneficiary = $row['ben_id'];
                                                                       $sql = "SELECT * FROM alumni WHERE id='$current_beneficiary' ";
                                                                       $res = mysqli_query($conn,$sql);
                                                                       $alumni_row = mysqli_fetch_assoc($res);

                                                                      echo "<tr> ";
                                                                      echo "<td>".$alumni_row['firstname']."</td>";
                                                                      echo "<td>".$alumni_row['lastname']."</td>";
                                                                      echo "<td>".$row['ben_type']."</td>";
                                                                      echo "<td>".$row['amount']."</td>";
                                                                      echo "<td>".$row['time_date']."</td>";
                                                                      echo "<td>".$row['creator']."</td>";
                                                                      echo '<td><a href="beneficiary.php?ben_del='.$row["id"].' " id="delete_btn" onclick="return confirm(\'Are you sure you want to delete?\');">Delete</a> </td>';                                                                 
                                                                      echo "</tr>";
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
                <!-- end of display benficiaries -->

                 <!-- start of beneficiary delete operation  -->
              <?php
                  //if user clicks delete to delete beneficiary
                  if(isset($_GET['ben_del']))
                  {
                    
                    $ben_del_id = $_GET['ben_del'];
                    $sql = "DELETE FROM beneficiary WHERE id = '$ben_del_id' ";
                    if(mysqli_query($conn,$sql))
                    {
                      
                      echo "<script>alert(\"Benefiary deleted successfully!\");</script>";
                      echo "<script> window.location='beneficiary.php'</script>";
                    }

                  }


              ?>
                   <!-- end of beneficiary delete operation  -->  


                          <!-- start of footer -->          
            <footer style="margin:0px;"> &copy;KOSA <?php echo date("Y");?></footer>
                          <!-- start of footer -->              


         </div>
              <!-- end of beneficiary content    -->

 
  


  <!-- ****************************** start of default hidden contents ************************  -->

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
                            window.location='beneficiary.php'</script>";
                          }

                          }else{
                            echo "<script>alert(\"Inconsistent password input!\");
                            window.location='beneficiary.php'</script>";
                          }
                                    
                      }
                      
              ?>

        </div>
              <!-- end of alumni registration form -->

   <!-- ****************************** end of default hidden contents ************************  -->


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
</div>
</body>
</html>