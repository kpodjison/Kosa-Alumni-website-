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
          /* notification table style */
          .notice_tbl td{
            padding:15px;
          }
          table button{
            background:#9d0000;
            padding:5px;
            border:none;
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
              <a href="addnotice.php">Add Notice</a>
              <a href="beneficiary.php">Add Beneficiary</a>
              <a href="#">Contributions</a>
              <a href="#" onclick="show_reg_form()">Register Member</a>
              <a href="logout.php">Logout</a>
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

    
          <!-- start of Add notification-->
          <div class="container" id="add_notice_content" style="margin-top:15px;">

          
                   <form method="POST" id="kosa_notice" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                            <lable for="type">Choose notice type</lable>
                            <select id="type" name="type" style="width:20%;padding:8px;border-radius:5px;">
                                <option value="Wedding">Wedding</option>
                                <option value="Outdooring">Outdooring</option>
                                <option value="Birthday">Birthday</option>
                                <option value="Funeral">Funeral</option>                         
                                <option value="Others">Others</option>
                            
                            </select>   
                            <br><br>                         
                            <lable for="descrp">Description</lable><br><br>
                            <textarea name="descrp"  cols="40" rows="10" required></textarea>
                            <br><br>
                            <input type="submit" value="CREATE NOTICE" name="create_notice" style="background:#9d0000 ;color:#FFF;padding:5px;font-size:25px;
                            border:none;border-radius:20px;width:230px">


                    </form>

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

                    //vars to hold email and password
                    $notice_type = $description = $creator ="";

                    if(isset($_POST['create_notice']))
                    {
                      $notice_type = test_input($_POST["type"]);
                      $description = mysqli_real_escape_string($conn,$_POST["descrp"]) ;
                      $creator = $_SESSION['admin_name'];
                      
                      $sql = "INSERT INTO notice(notice_type,descrip,creator) VALUES('$notice_type','$description','$creator')";
                      if(mysqli_query($conn,$sql)){

                       echo "<script>alert(\"Notice created successfully!\");</script>";
                      }
                      else{
                        echo "<script>alert(\"Insertion not successful!\");</script>";
                      }
                    }




                    ?>
          
          
          </div> 
          <!-- end of add notification  -->

                     <!-- display all notifications -->
                    <div class="container"> 
                      <div class="col">
                        <div class="row-sm-4 " style=" background: rgba(138, 14, 14);">
                          <h3 style="text-align:center;color:#fff;">NOTIFICAIONS</h3>  
                          <hr>
                        </div>
                        <div class="row-sm-8">

                          <!-- notification table -->

                          <div class="table-responsive">
                                            <table class="table table-striped notice_tbl">                                          
                                                    <thead>
                                                        <tr>
                                                            <th>id</th>
                                                            <th>Type</th>
                                                            <th>Description</th>
                                                            <th>Date and Time</th>
                                                            <th>Creator</th>
                                                            <th>Update</th> 
                                                            <th>Delete</th>                                      
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
                                                                  echo  "<tr>";
                                                                  echo  "<td>".$row['id']."</td>";
                                                                  echo  "<td>".$row['notice_type']."</td>";
                                                                  echo  "<td>".$row['descrip']."</td>";
                                                                  echo  "<td>".$row['date_time']."</td>";
                                                                  echo  "<td>".$row['creator']."</td>";
                                                                  echo  '<td><a  id="update_btn" href="addnotice.php?notice_id='.$row["id"].' " >Update</a></td>';
                                                                  echo  '<td><a  id="delete_btn" href="addnotice.php?notice_delete_id='.$row["id"].' " onclick="return confirm(\'Are you sure you want to delete?\');">Delete</button></td>';
                                                                  echo  "</tr>";
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

          <!-- start of footer -->  
          <footer style="margin-left:0px;"> &copy;KOSA <?php echo date("Y");?></footer>
        

  </div>


</div>
                   


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
<!-- end of form control script -->
  <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>