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
 /* table style */
 .table td{
   padding:15px;
 }
 #cont_btn{
  background:#FF8C00;
  padding:8px;
  text-decoration:none;
  color:#fff;
  font-size:20px;
  border-radius:13px;
  
}
#update_btn{
  background:green;
  padding:8px;
  text-decoration:none;
  color:#fff;
  font-size:20px;
  border-radius:13px;
  
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


/* registration form */
.regform {
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
   
<title>Admin|members</title>
</head>
<body>
<div class="sidewrapper">
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
              <a href="#" onclick="show_reg_form()">Register Member</a>
              <a href="logout.php">Logout</a>
      </div>

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
         
           <!-- start of admin instrutional guide -->
           <div class="container" id="add_notice_content" style="margin-top:20px;">
            <div class="container note_adm">              
              <h2><b>NOTE:</b></h2><hr>
              <p>This page displays the list of all registered KOSA members.</p>
              <ul>
                    <li>Admin can perform operations such as input <b>member contributions</b>, <b>update member info </b> 
                        and <b>delete </b> member accounts.
                      </li>
                    <li>In order to ensure contributions are recorded correctly in the system,
                        admin must first <a href="beneficiary.php">Create Beneficiary </a>
                      </li>
                    <li>Please ensure you input  <b>exact firstname</b>, <b>lastname</b> and <b>Type of Benefit</b> 
                        (this can be selected from a list of types) of beneficiary when you are inserting contributions 
                        from a registered member by clicking  <b>Contribute</b>. 
                      </li>
                    <li>The above instruction will ensure that the system keeps record of the 
                        contributor and the beneficiary.Please take notes when entering beneficiary information.
                      </li>
                     <li>Contributors information will be provided in their respective text input fields. This means there will be no need to 
                          enter them.
                        </li>



              </ul>
                       

            </div>
          
          <!-- end of admin instrutional guide -->
          <!-- start of registered member -->
                  <div class="container"> 
                    <div class="col">
                        <div class="row-sm-4">
                          <h3 style="text-align:center;">LIST OF REGISTERED MEMBERS</h3>  
                          <hr>
                        </div>
                        <div class="row-sm-8">

                          <!-- notification table -->

                          <div class="table-responsive">
                                            <table class="table table-striped">                                          
                                                    <thead>
                                                        <tr>
                                                            <th>First Name</th>
                                                            <th>Last Name</th>
                                                            <th>Phone Number</th>
                                                            <th>Email</th>
                                                            <!-- <th>Join Date</th> -->
                                                            <th>Creator</th>
                                                            <th>Contribute</th> 
                                                            <th>Update info</th>  
                                                            <th>Delete</th>                                     
                                                        </tr>                                    
                                                    </thead>

                                                    <tbody>
                                                  
                                  <!-- fetching notifications from db -->
                                       <!-- php codes controlling contribute, update and delete
                                      operations are in php snippet in main division containing contribution
                                    form. this can be found further below.-->
                                                  <?php
                                                          $sql = "SELECT * FROM alumni";
                                                          $results = mysqli_query($conn,$sql);

                                                          if(mysqli_num_rows($results) > 0)
                                                          {
                                                            while($row = mysqli_fetch_assoc($results))
                                                                {
                                                                  echo "<tr>";
                                                                  echo "<td>".$row['firstname']."</td>";
                                                                  echo "<td>".$row['lastname']."</td>";                                                                  
                                                                  echo "<td>".$row['phone_num']."</td>";
                                                                  echo "<td>".$row['email']."</td>";
                                                                  // echo "<td>".$row['date_time']."</td>";
                                                                  echo "<td>".$row['creator']."</td>";
                                                                  echo '<td><a id="cont_btn"  href="members.php?alumni_id='.$row['id'].' " >Contribute</a></td>';
                                                                  echo '<td><a href="#" id="update_btn" >Update</a></td>';
                                                                  echo '<td><a id="delete_btn"  href="members.php?alumni_delete_id='.$row['id'].' " onclick="return confirm(\'Are you sure you want to delete?\');">Delete</a></td>';
                                                                  
                                                                 

                                                                  
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



          <!-- end of registered members -->

           <!-- start of footer -->          
         <footer style="margin-left:0px;"> &copy;KOSA <?php echo date("Y");?></footer>

  </div>


</div>
   <!-- *************************** start of default hidden content *************************** -->
   

<!-- beginning of alumni registration form -->
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
                            window.location='members.php'</script>";
                          }

                          }else{
                            echo "<script>alert(\"Inconsistent password input!\");
                            window.location='members.php'</script>";
                          }
                                    
                      }
                      
              ?>
 
   

</div>
<!-- end of alumni registration form -->

<!-- beginning of alumni contribution form -->
  <div class="container regform"  id="cont_form">


   <!-- handling member contribution -->
   <?php


                  //if user clicks delete 
                  if(isset($_GET['alumni_delete_id']))
                  {
                    
                    $alumni_id = $_GET['alumni_delete_id'];
                    $sql = "DELETE FROM alumni WHERE id = '$alumni_id' ";
                    if(mysqli_query($conn,$sql))
                    {
                      
                      echo "<script>alert(\"Alumni account deleted successfully!\");</script>";
                      echo "<script> window.location='members.php'</script>";
                    }
                    echo '<script>alert("Alumni account can\'t be deleted");</script>';
                    echo "<script>window.location='members.php'</script>";

                  }
                  
                  
                  //vars to hold email and password
                  $cont_firstname = $cont_lastname =  $ben_firstname = $ben_lastname = $ben_type = $amount_con = $creator = "";
                  // vars to hold error messages
                  $firstname_err = $lastname_err = $phone_num_err = $email_err = $password_err = "";


                //if user clicks contribute 
                  if(isset($_GET['alumni_id']))
                  {

                    // search for details of alumni from db
                    $alumni_id = $_GET['alumni_id'];
                    $get_alumni = "SELECT * FROM alumni WHERE id= '$alumni_id' ";
                    $results = mysqli_query($conn,$get_alumni);
                    if(mysqli_num_rows($results) > 0){
                      
                      if($row = mysqli_fetch_assoc($results))
                       $cont_firstname = $row['firstname'];
                      $cont_lastname = $row['lastname'];


                    }
                    echo "<script>

                    document.getElementById(\"cont_form\").style.display=\"block\";
                    </script>";
                    
                            
                  }

      //handling submission of member contribution            
      if(isset($_POST['mem_cont'])){


            $cont_firstname =  test_input($_POST['c_fname']);
            $cont_lastname  =  test_input($_POST['c_lname']);
            $ben_firstname  =  test_input($_POST['b_fname']);            
            $ben_lastname   =  test_input($_POST['b_lname']);
            $amount_con     =  test_input($_POST['c_amount']);
            $ben_type       =  test_input($_POST['ben_type']);
            $creator        =  $_SESSION['admin_name'];

            //perform database operations 
            $sql = "INSERT INTO contribution(cont_fname,cont_lname,ben_fname,ben_lname,ben_type,amount,creator) VALUES('$cont_firstname','$cont_lastname','$ben_firstname','$ben_lastname','$ben_type','$amount_con','$creator')";
          if(mysqli_query($conn,$sql)){

                
              echo "<script>alert(\"Member contribution successfully!\");
              window.location='members.php'</script>";
            
            }
            else{
              echo "<script>alert(\"Member contribution unsuccessful!\");
              window.location='members.php'</script>";
            }



      }
  


?>

           
        

         <p style="color:#fff;text-align:center;font-size:29px;background:black;">Contribution form </p>
        
               <form method="POST" class="rg" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
               <button style="float:right; margin-bottom:20px;border-radius: 90%" onclick="hide_cont_form()" ><i class="far fa-times-circle fa-3x" style="color:black;"></i></button><br>
                   
                   <lable style="font-size:24px;" >Beneficiary's Details</lable><br>
                   <lable for="b_fname">Firstname</lable>
                   <input type="text" class="form-control" name="b_fname" placeholder="Beneficiary firstname" required><br>
                   <lable for="b_lname">Lastname</lable>
                   <input type="text" class="form-control" name="b_lname" placeholder="Beneficiary lastname" required><br>
                   <lable for="type">Contribution type</lable>
                            <select id="ben_type" name="ben_type" style="width:40%;padding:8px;border-radius:5px;">
                                <option value="Wedding">Wedding</option>
                                <option value="Outdooring">Outdooring</option>
                                <option value="Birthday">Birthday</option>
                                <option value="Funeral">Funeral</option>                         
                                <option value="Others">Others</option>
                             </select><br><br>
                   <lable style="font-size:24px;" >Contributor's Details</lable><br>
                   <lable for="c_fname">Firstname</lable>
                   <input type="text" class="form-control" name="c_fname"  value="<?php echo $cont_firstname; ?>" ><br>
                   <lable for="c_lname">Lastname</lable>
                   <input type="text" class="form-control" name="c_lname" value="<?php echo $cont_lastname; ?>" ><br>
                   <lable for="c_amount">Amount Contributed</lable>
                   <input type="text" class="form-control" name="c_amount" placeholder="Enter amount" required><br>                   
                               
                   <input type="submit" class="btn btn-primary form-control" name="mem_cont" value="CONTRIBUTE" style="background:#000;color:#fff;padding:5px;font-size:25px;
                   border:none;border-radius:20px;width:180px;margin-left:14px;">


               </form>

    
  
    
  </div>
<!-- end of alumni contribution form -->

<!-- ********************************** end of default hidden content ******************** -->


<!-- start of form control script -->
<script>

<!-- hide and show registration form-->
   

      
      <!-- hide and show contribution form-->
      function hide_cont_form()
      {
        
        var contribution_form = document.getElementById("cont_form");
         contribution_form.style.display="none";       
      }

      function show_cont_form()
      {
        
        var contribution_form = document.getElementById("cont_form");
      
         contribution_form.style.display="block";

      }


      function hide_reg_form()
      {
        var registration_form = document.getElementById("regform");
        
        registration_form.style.display="none";
        
             
      }
      function show_reg_form()
      {
        
        var registration_form = document.getElementById("regform");
        var contribution_form = document.getElementById("cont_form");
        if(contribution_form.style.display="block"){
          contribution_form.style.display="none";
          registration_form.style.display="block";
        }else
         registration_form.style.display="block";
       
      }





</script>
<!-- end of form control script -->
  <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>