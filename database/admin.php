<?php

    class Admin
    {
        public $db;

        public function __construct(DBController $db)
        {
            if(!isset($db->conn))
            {
                return null;
            }else
            $this->db = $db;
        }

        public function addAdmin()
        {
            
            if($_SERVER['REQUEST_METHOD'] === 'POST')
            {
                if(isset($_POST['add_admin'])){

                    $user_name = $this->db->mysqli->real_escape_string($_POST['Username']);
                    $name = $this->db->mysqli->real_escape_string($_POST['Name']);
                    $password = $this->db->mysqli->real_escape_string($_POST['Password']);
                    $admin = "Jeevista";

                    $sql = "INSERT INTO admins(username,a_name,password,added_by) VALUES ('$user_name','$name','$password','$admin')";
                    
                    // query to check if db has an existing admin username similar to the new username
                    $user_name_check_sql = "SELECT username FROM admins WHERE username = '$user_name'";
                    $name_check_results = $this->db->conn->query($user_name_check_sql);
                                        
                    if($name_check_results->num_rows > 0 ){
                        $_SESSION['ErrorMsg'] = "Sorry Admin username exists. Try a new name!!";
                    }
                    else if($this->db->conn->query($sql) === TRUE){
                        $_SESSION['SuccessMsg'] = "Admin {$user_name} Created Successfully!";
                    }                    
                }else
                {
                    $_SESSION['ErrorMsg'] = "Failed to Create Admin!!";
                }
            }
        }

        //function to edit admin profile
        public function EditAdminProfile()
        {
            
            if($_SERVER['REQUEST_METHOD'] === 'POST')
            {
                if(isset($_POST['edit_admin'])){

                    $admin_name = $this->db->mysqli->real_escape_string($_POST['admin_name']);
                    $headline = $this->db->mysqli->real_escape_string($_POST['headline']);
                    $bio = $this->db->mysqli->real_escape_string($_POST['admin_bio']);
                    $img= $this->db->mysqli->real_escape_string($_FILES['image']['name']);
                    $ImgTargetDir  = "../assets/admins/".basename($_FILES['image']['name']);
                    $admin_id =  $_SESSION['UserId'];

                     /*if post image is not changed use default image else use new image selected */
                     if(empty($img)){
                        $sql = "UPDATE admins SET a_name='$admin_name',headline='$headline',admin_bio='$bio' WHERE id='$admin_id' ";
                    }
                    else
                    {
                        $sql = "UPDATE admins SET a_name='$admin_name',headline='$headline',admin_img='$img',admin_bio='$bio' WHERE id='$admin_id' ";
                    }
                     
                   if($this->db->conn->query($sql) === TRUE){
                        $_SESSION['SuccessMsg'] = "Admin {$admin_name}'s Profile Updated Successfully!";
                        move_uploaded_file($_FILES['image']['tmp_name'],$ImgTargetDir);
                    }                    
                }else
                {
                    $_SESSION['ErrorMsg'] = "Failed to Update Admin Profile!!";
                }
            }
        }

        public function confirmLogin()
        {
            if(isset($_SESSION['UserId']))
            {
                return TRUE;
            }
            else{
                $_SESSION['ErrorMsg'] = "Login Required!!";
                echo '<script>window.location="adminlogin.php";</script>';
                // header('Location:adminlogin.php');
            }
        }

        public function adminLogin()
        {
            if($_SERVER['REQUEST_METHOD'] === 'POST')
            { 
                
                if(isset($_POST['admin_login']))
                {
                    $user_name = $this->db->mysqli->real_escape_string($_POST['Username']);
                    $password = $this->db->mysqli->real_escape_string($_POST['Password']);

                    $sql = "SELECT * FROM admins WHERE username='$user_name' AND password='$password' ";
                    $results = $this->db->conn->query($sql);
                    if($item = mysqli_fetch_assoc($results))
                    {

                        $_SESSION['UserId']  = $item['id'];
                        $_SESSION['UserName']  = $item['username'];
                        $_SESSION['AdminName']  = $item['a_name'];
                        $_SESSION['SuccessMsg']  = "Welcome ".$_SESSION['UserName']."!";
                        if(isset($_SESSION['UrlTracker'])){
                            // header('Location:'.$_SESSION['UrlTracker']);
                            echo '<script>window.location="'.$_SESSION['UrlTracker'].'";</script>';
                         
                        }else
                        {
                        //    header('Location:../admin/index.php'); 
                        echo '<script>window.location="../admin/index.php";</script>';
                           
                           
                           
                        }                       
                        
                    }
                    else
                    {
                        $_SESSION['ErrorMsg']  = "Incorrect Username or Password!!";
                    }
                }
            }
        }


         //get all admins function
         public function getAllAdmins()
         {                     
         
                  $sql = "SELECT * FROM admins";
                  $results = $this->db->conn->query($sql);
                  $resultsArray = array();
            
                 while($item = mysqli_fetch_assoc($results))
                 {
                     $resultsArray[] = $item;
                 }            
            
                 //final results returned
             return $resultsArray;
         }
         //get single admin function
         public function getSingleAdmin($id)
         {  
             $resultsArray = array();                   
            if(is_numeric($id))
            {
                 $sql = "SELECT * FROM admins WHERE id='$id' ";
                  $results = $this->db->conn->query($sql);                 
            
                 while($item = mysqli_fetch_assoc($results))
                 {
                     $resultsArray[] = $item;
                 } 
            }
            else
            { 
                $sql = "SELECT * FROM admins WHERE username='$id' ";
                $results = $this->db->conn->query($sql);                 
          
               while($item = mysqli_fetch_assoc($results))
               {
                   $resultsArray[] = $item;
               } 

            }
                            
            
                 //final results returned
             return $resultsArray;
         }

         //delete admin function  
           public function DeleteAdmin()
        {
            if($_SERVER['REQUEST_METHOD'] === 'GET')
            {
                if(isset($_GET['admid']))
                {
                    $adm_id = $_GET['admid'];
                    $sql = "DELETE FROM admins WHERE id='$adm_id' ";
                    $results = $this->db->conn->query($sql);
                    if($results == TRUE)
                    {
                        $_SESSION["SuccessMsg"] = "Admin Deleted successfully!";
                        
                    }
                    else
                    {
                        $_SESSION["ErrorMsg"] = "Something Went Wrong. Please Try Again!!";
                    }
                
                }
            }              
        }
         //delete notice function  
           public function DeleteNotice()
        {
            if($_SERVER['REQUEST_METHOD'] === 'GET')
            {
                if(isset($_GET['ntdid']))
                {
                    $notice_id = $_GET['ntdid'];
                    $sql = "DELETE FROM notice WHERE id='$notice_id' ";
                    $results = $this->db->conn->query($sql);
                    if($results == TRUE)
                    {
                        $_SESSION["SuccessMsg"] = "Notice Deleted successfully!";
                        
                    }
                    else
                    {
                        $_SESSION["ErrorMsg"] = "Something Went Wrong. Please Try Again!!";
                    }
                
                }
            }              
        }

        // function to add alumni 
        public function addAlumni(){
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                if(isset($_POST['add_memb'])){
                    $fname = $this->db->mysqli->real_escape_string($_POST['fname']);
                    $lname = $this->db->mysqli->real_escape_string($_POST['lname']);
                    $gender = $this->db->mysqli->real_escape_string($_POST['gender']);
                    $phnum = $this->db->mysqli->real_escape_string($_POST['phnum']);
                    $email = $this->db->mysqli->real_escape_string($_POST['email']);
                    $occupation = $this->db->mysqli->real_escape_string($_POST['occupation']);
                    $bio = $this->db->mysqli->real_escape_string($_POST['alumni_bio']);
                    $creator = "jeevista";

                    $sql = "INSERT INTO alumni(firstname,lastname,gender,phone_num,email,creator,occupation,bio) VALUES 
                            ('$fname','$lname','$gender','$phnum','$email','$creator','$occupation','$bio')";

                            if($this->db->conn->query($sql) === TRUE){
                                $_SESSION['SuccessMsg'] = "Alumni {$fname} Created Successfully!";
                            }
                            else {
                                $_SESSION['ErrorMsg'] = "Failed to Create Alumni!!";
                            }
                }
            }
        }

         //get all alumni function
         public function getAllAlumni()
         {                     
         
                  $sql = "SELECT * FROM alumni";
                  $results = $this->db->conn->query($sql);
                  $resultsArray = array();
            
                 while($item = mysqli_fetch_assoc($results))
                 {
                     $resultsArray[] = $item;
                 }            
            
                 //final results returned
             return $resultsArray;
         }

          //get single alumni function
          public function getSingleAlumni($id)
          {  
              $resultsArray = array();                   
             if(is_numeric($id))
             {
                  $sql = "SELECT * FROM alumni WHERE id='$id' ";
                   $results = $this->db->conn->query($sql);                 
             
                  while($item = mysqli_fetch_assoc($results))
                  {
                      $resultsArray[] = $item;
                  } 
             }
             else
             { 
                 $sql = "SELECT * FROM admins WHERE username='$id' ";
                 $results = $this->db->conn->query($sql);                 
           
                while($item = mysqli_fetch_assoc($results))
                {
                    $resultsArray[] = $item;
                } 
 
             }
                             
             
                  //final results returned
              return $resultsArray;
          }

          // function to add notice category
        public function noticeCategory()
        {
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                if(isset($_POST['notice_cat'])){
                    $title = $this->db->mysqli->real_escape_string($_POST['title']);
                    $creator = "jeevista";

                    $sql = "INSERT INTO notice_category(title,author) VALUES ('$title','$creator')";

                            if($this->db->conn->query($sql) === TRUE){
                                $_SESSION['SuccessMsg'] = "Notice Category Created Successfully!";
                            }
                            else {
                                $_SESSION['ErrorMsg'] = "Failed to Create Notice Category!!";
                            }
                }
            }
        }

             //get all notice categories
             public function getnoticeCategory()
             {                     
             
                      $sql = "SELECT * FROM notice_category";
                      $results = $this->db->conn->query($sql);
                      $resultsArray = array();
                
                     while($item = mysqli_fetch_assoc($results))
                     {
                         $resultsArray[] = $item;
                     }            
                
                     //final results returned
                 return $resultsArray;
             }
    
               // function to add notice
            public function addNotice(){
                if($_SERVER['REQUEST_METHOD'] === 'POST'){
                    if(isset($_POST['add_not'])){
                        $heading = $this->db->mysqli->real_escape_string($_POST['heading']);
                        $desc = $this->db->mysqli->real_escape_string($_POST['noticeDesc']);
                        $category = $this->db->mysqli->real_escape_string($_POST['notice_type']);
                        $dueDate = $this->db->mysqli->real_escape_string($_POST['dueDate']);
                        $creator = "jeevista";
    
                        $sql = "INSERT INTO notice (notice_type,heading,descrip,creator,due_date) VALUES ('$category','$heading','$desc','$creator','$dueDate')";
    
                                if($this->db->conn->query($sql) === TRUE){
                                    $_SESSION['SuccessMsg'] = "Notice Created Successfully!";
                                }
                                else {
                                    $_SESSION['ErrorMsg'] = "Failed to Create Notice!!";
                                }
                    }
                }
            }
    
             //get all or single notice 
             public function getNotice($id)
             { 
                $sql ="";                
                         if(!empty($id)){
                             $sql = "SELECT * FROM notice WHERE id='$id' ";
                         }else
                         {
                            $sql = "SELECT * FROM notice";
                         }
                      
                      $results = $this->db->conn->query($sql);
                      $resultsArray = array();
                
                     while($item = mysqli_fetch_assoc($results))
                     {
                         $resultsArray[] = $item;
                     }            
                
                     //final results returned
                 return $resultsArray;
             }
    
             //get all or single notice 
             public function getLatestNotice()
             { 
               
                    $sql = "SELECT * FROM notice ORDER BY id DESC LIMIT 0,5";
                        
                      
                      $results = $this->db->conn->query($sql);
                      $resultsArray = array();
                
                     while($item = mysqli_fetch_assoc($results))
                     {
                         $resultsArray[] = $item;
                     }            
                
                     //final results returned
                 return $resultsArray;
             }
    
          // function to add notice category
        public function addBenefitCategory()
        {
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                if(isset($_POST['benefit_cat'])){
                    $title = $this->db->mysqli->real_escape_string($_POST['title']);
                    $creator = "jeevista";

                    $sql = "INSERT INTO benefit_category(title,author) VALUES ('$title','$creator')";

                            if($this->db->conn->query($sql) === TRUE){
                                $_SESSION['SuccessMsg'] = "Notice Category Created Successfully!";
                            }
                            else {
                                $_SESSION['ErrorMsg'] = "Failed to Create Notice Category!!";
                            }
                }
            }
        }

         //get all benefit categories
         public function getBenefitCategory()
         {                     
         
                  $sql = "SELECT * FROM benefit_category";
                  $results = $this->db->conn->query($sql);
                  $resultsArray = array();
            
                 while($item = mysqli_fetch_assoc($results))
                 {
                     $resultsArray[] = $item;
                 }            
            
                 //final results returned
             return $resultsArray;
         }
                        // function to add beneficiary
         public function addBeneficiary()
         {
                            if($_SERVER['REQUEST_METHOD'] === 'POST')
                            {
                                if(isset($_POST['add_benef']))
                                {
                                    $ben_id = $this->db->mysqli->real_escape_string($_POST['id']);
                                    $ben_type = $this->db->mysqli->real_escape_string($_POST['benef_type']);
                                    $creator = "jeevista";
                
                                    $sql = "INSERT INTO beneficiary (ben_id,ben_type,creator) VALUES ('$ben_id','$ben_type','$creator')";
                
                                            if($this->db->conn->query($sql) === TRUE){
                                                $_SESSION['SuccessMsg'] = "Beneficiary Created Successfully!";
                                            }
                                            else {
                                                $_SESSION['ErrorMsg'] = "Failed to Create Beneficiary!!";
                                            }
                                }
                            }
        }

        //get all beneficiaries
        public function getBeneficiary($flag)
        {                     
                    if($flag == "p"){
                        $sql = "SELECT * FROM beneficiary WHERE status='in-progress'";
                    }
                    else if($flag == "d")
                    {
                        $sql = "SELECT * FROM beneficiary WHERE status='done'";

                    }
                    else if(is_numeric($flag))
                    {
                        $sql = "SELECT * FROM beneficiary WHERE id ='$flag' "; 
                    }
                    else if($flag == ""){
                        $sql = "SELECT * FROM beneficiary"; 
                    }
                 
                 $results = $this->db->conn->query($sql);
                 $resultsArray = array();
           
                while($item = mysqli_fetch_assoc($results))
                {
                    $resultsArray[] = $item;
                }            
           
                //final results returned
            return $resultsArray;
        }

                        // function to add beneficiary
         public function addContribution()
        {
             if($_SERVER['REQUEST_METHOD'] === 'POST')
                {
                    if(isset($_POST['add_cont']))
                    {
                                $contr_id = $this->db->mysqli->real_escape_string($_POST['contr_id']);
                                $ben_details = $this->db->mysqli->real_escape_string($_POST['benef_details']);
                                $amount = $this->db->mysqli->real_escape_string($_POST['amount']);
                                $sql_1 = "SELECT * FROM beneficiary WHERE id='$ben_details' ";
                                $results = $this->db->conn->query($sql_1);
                                $ben_id = $ben_type = "";
                                $resultsArray = array();
                                while($item = mysqli_fetch_assoc($results) )
                                {
                                    $resultsArray = $item;
                                }
                                $ben_id = $resultsArray['id'];
                                $ben_type = $resultsArray['ben_type'];
                                $ben_amount = $resultsArray['amount'];
                                $new_amount = $ben_amount + $amount;
                                $sql_2 ="UPDATE beneficiary SET amount= '$new_amount' WHERE id='$ben_id' ";
                                $creator = "jeevista";                                    
                                $sql = "INSERT INTO contribution (contrb_id,benf_id,benf_type,amount,creator) VALUES ('$contr_id','$ben_id','$ben_type','$amount','$creator')";
                                
                                    
                                if($this->db->conn->query($sql) === TRUE && $this->db->conn->query($sql_2) === TRUE)
                                {
                                    // if($this->db->conn->query($sql_2) === TRUE){
                                   
                                     $_SESSION['SuccessMsg'] = "Contribution Made Successfully!".$new_amount;
                                        
                                }
                                else {
                                         $_SESSION['ErrorMsg'] = "Failed To Make Contribution!!";
                                    }
                    }
                }
        }

              //get single contributors
        public function getSingleContributor($id)
        {                     
                   
                $sql = "SELECT * FROM contribution WHERE id='$id' ";
                 
                 $results = $this->db->conn->query($sql);
                 $resultsArray = array();
           
                while($item = mysqli_fetch_assoc($results))
                {
                    $resultsArray[] = $item;
                }            
           
                //final results returned
            return $resultsArray;
        }
              //get all contributors
        public function getAllContributors()
        {                     
                   
                $sql = "SELECT * FROM contribution";
                 
                 $results = $this->db->conn->query($sql);
                 $resultsArray = array();
           
                while($item = mysqli_fetch_assoc($results))
                {
                    $resultsArray[] = $item;
                }            
           
                //final results returned
            return $resultsArray;
        }



            //delete admin function 
           //delete comment 
           public function deleteContribution()
        {
            if($_SERVER['REQUEST_METHOD'] === 'GET')
            {
                if(isset($_GET['did']))
                {
                    $con_id = $_GET['did'];
                    $sql = "DELETE FROM contribution WHERE id='$con_id' ";
                    $results = $this->db->conn->query($sql);
                    if($results == TRUE)
                    {
                        $_SESSION["SuccessMsg"] = "Contribution Deleted successfully!";
                        
                    }
                    else
                    {
                        $_SESSION["ErrorMsg"] = "Something Went Wrong. Please Try Again!!";
                    }
                
                }
            }              
        }


         //edit post function 
         public function editCont()
         {
            if($_SERVER['REQUEST_METHOD'] === 'POST')
            {
                 if(isset($_POST['ed_cont']))
                {   
                    if(!empty($_POST['contr_id']) || !empty($_POST['benef_details'])) 
                    {
                    
                        $cont_id = $this->db->mysqli->real_escape_string($_POST['contr_id']);
                        $cont_name= $this->db->mysqli->real_escape_string($_POST['c_name']);
                        $ben_details = $this->db->mysqli->real_escape_string($_POST['benef_details']);
                        $amount = $this->db->mysqli->real_escape_string($_POST['amount']);
                        $author = $_SESSION['UserName']; 
                        
                        // fetch information coresponding to beneficiary
                        $ben_id = $ben_type = "";
                        $resultsArray = array();
                        $sql_1 = "SELECT * FROM beneficiary WHERE id='$ben_details' ";
                        $results = $this->db->conn->query($sql_1);
                        while($item = mysqli_fetch_assoc($results) )
                        {
                            $resultsArray = $item;
                        }
                        $ben_id = $resultsArray['id'];
                        $ben_type = $resultsArray['ben_type'];
                        //variable to hold update query
                        $sql = "";
    
                        /*if beneficiary type is not changed */
                        if(empty($ben_details) && !empty($amount)){
                            $sql = "UPDATE contribution SET amount='$amount' WHERE id='$cont_id' ";
                        }
                        else if(empty($amount) && !empty($ben_details))
                        {
                            $sql = "UPDATE contribution SET benf_id='$ben_id',benf_type='$ben_type' WHERE id='$cont_id' ";
                        }
                        else if(!empty($amount) && !empty($ben_details) )
                        {
                            $sql = "UPDATE contribution SET benf_id='$ben_id',benf_type='$ben_type',amount='$amount' WHERE id='$cont_id' ";
                        }
    
                        //check if  update was successfull
                        if($this->db->conn->query($sql) === TRUE)
                        {                        
                            $_SESSION['SuccessMsg'] = "Contribution by {$cont_name}: Updated Successfully!";
                            echo ' <script>window.location="../admin/contribution.php";</script>';
                            // header('location:..\admin\post.php');      
    
                        }else
                        {
                            $_SESSION['ErrorMsg'] = "Sorry Unsuccessfully Update !";
                            echo ' <script>window.location="../admin/contribution.php";</script>';
                        }
                          
                        
                    }
                    else
                    {
                        $_SESSION['ErrorMsg'] = "Sorry There's Nothing To Update!!";
                        echo ' <script>window.location="../admin/contribution.php";</script>';
                    }
 
                }
            }
             
         }
         //edit notice function
         public function editNotice()
         {
            if($_SERVER['REQUEST_METHOD'] === 'POST')
            {
                 if(isset($_POST['edit_not']))
                {  
                
                        $notice_id = $this->db->mysqli->real_escape_string($_POST['id']);
                        $heading= $this->db->mysqli->real_escape_string($_POST['heading']);
                        $desc = $this->db->mysqli->real_escape_string($_POST['noticeDesc']);
                        $type= $this->db->mysqli->real_escape_string($_POST['notice_type']);
                        $dueDate= $this->db->mysqli->real_escape_string($_POST['dueDate']);
                        $updator = $_SESSION['UserName']; 
                        $sql = "";
    
                        /*if heading is not changed */
                        if(empty($dueDate)){
                            $sql = "UPDATE notice SET notice_type='$type',heading='$heading',descrip='$desc',updator='$updator' WHERE id='$notice_id' ";
                        }
                        else
                        {
                            $sql = $sql = "UPDATE notice SET notice_type='$type',heading='$heading',descrip='$desc',due_date='$dueDate',updator='$updator' WHERE id='$notice_id' ";
                        }                        
    
                        //check if  update was successfull
                        if($this->db->conn->query($sql) === TRUE)
                        {                        
                            $_SESSION['SuccessMsg'] = "Notice Updated Successfully!";
                            echo ' <script>window.location="../admin/notice.php";</script>';
                            // header('location:..\admin\notice.php');      
    
                        }else
                        {
                            $_SESSION['ErrorMsg'] = "Sorry Unsuccessfully Update !";
                            // echo ' <script>window.location="../admin/notice.php";</script>';
                        }                          
                        
                                       
 
                }
            }
             
         }


                //get the sum of all contributions
        public function getTotalContribution()
        {                     
                   
                $sql = "SELECT * FROM contribution";
                 
                 $results = $this->db->conn->query($sql);
                 $totalContrb = 0;
           
                while($item = mysqli_fetch_assoc($results))
                {
                    $totalContrb += $item['amount'];
                }            
           
                //final results returned
            return $totalContrb;
        }

  }

        

?>