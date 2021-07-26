<?php 

    // session_start();

    // if(empty($_SESSION['admin_id'])){
      
    // 	  header('location: ..\adminlogin.php');
      
    // }

    //connection
    require_once('..\connection.php');

?>
 <!-- start of beneficiary content  -->
 <div class="content-ben">
                  <!-- start of add beneficiafy -->
                <div class="container" id="add_notice_content " >
                          <div class="container note_adm text-white">
                                  <h2><b>NOTE:</b></h2>
                                  <p>Please search <b>exact firstname</b> or <b>lastname</b> of members to add to beneficiaries</p>
                                  <p>Please visit <a href="members.php">MEMBERS</a> if you are in doubt 
                                  of beneficiary's firstname and lastname.
                                </p>

                          </div>
                            <div class="container"> 
                              <div class="col">
                                <div class="row-sm-4 dis_3">
                                  <h3 style="text-align:center">MEMBERS</h3>                              
                                </div>
                                <div class="row-sm-8">

                                  <!-- beneficiary table -->

                                  <div class="table-responsive">
                                                    <table class="table text-white">                                          
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
                                                <table class="table text-white">                                          
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

                                                        <tbody class="text-white">
                                                      
                                      <!-- fetching notifications from db -->
                                                      <?php
                                                          foreach($all_beneficiary as $ben):
                                                            $id= $ben['ben_id'];
                                                            $single_alumni = $alumni->getSingleData($id);
                                                            print_r($id);
                                                            foreach($single_alumni as $item):
                                                      ?>      
                                                          


                                                                    <tr>
                                                                       <td> <?php echo $item['firstname'] ?></td>
                                                                       <td> <?php echo $item['lastname'] ?></td>
                                                                       <td> <?php echo $ben['ben_type'] ?></td>
                                                                       <td> <?php echo $ben['amount'] ?></td>
                                                                       <td> <?php echo $ben['time_date'] ?></td>
                                                                       <td> <?php echo $ben['creator'] ?></td>
                                                                       <td> <button class="btn btn-danger">DELETE</button></td>
                                                                     </tr>

                                                       <?php 
                                                       endforeach;
                                                       endforeach; ?>
                                                                                                  
                                                        </tbody>                                     
                                                
                                                </table>                      
                                      
                                            </div>
                              

                            </div>

                </div>
                        
              </div>
                <!-- end of display benficiaries -->
             


         </div>
              <!-- end of beneficiary content    -->

 
  
