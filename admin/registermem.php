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
   
<script>

<!-- js to control menu on sidebar -->
      function hide_menu(a)
      {
        var key = a;
        var home = document.getElementById("home_content");
        var add_notice = document.getElementById("add_notice_content");

          <!-- check the value of key -->
          switch(key)
          {
              case 1:
                    home.style.display ="block";
                    add_notice.style.display = "none";

                    console.log("displaying home");
              break;              
              case 2:
                    home.style.display ="none";
                    add_notice.style.display = "block";

                    console.log("displaying add notice");


              break;


          }

      }








</script>

<title>Admin|Home</title>
</head>
<body>
<div class="sidewrapper">
      <div class="sidebar">
              <a class="active" href="#">Welcome
                <?php
                $username = $_SESSION['admin_name'];
                echo $username;
                ?>

              </a>
              <a href="index.php" >Home</a>
              <a href="addnotice.php" >Add Notice</a>
              <a href="#">Beneficiaries</a>
              <a href="#">Contributions</a>
              <a href="#">Register Member</a>
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

          <!-- div containing main content -->
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
                                              34
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
                                                <a href="http://">                              
                                                34
                                                </a>
                                            
                                              </div>
                                              <div class="row-sm-6">
                                                  <a href="http://">
                                      
                                                  <p>Beneficiaries</p>

                                                  </a>
                                              </div>
                                        </div>
                                                  
                                    </div>
                                    <div class="col-sm-4">
                                      <a href="http://">
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
                                                  <!-- selecting total number of registered students -->
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
                                                                  "</td><td>".$row['descrip']."</td><td>".$row['date'].
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

          <!-- end of home content -->
          
       

  </div>


</div>
      




  <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>