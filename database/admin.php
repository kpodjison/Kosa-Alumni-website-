<?php

    class Admin{
        public $db;

        public function __construct(DBController $db)
        {
            if(!isset($db->conn))
            {
                return null;
            }else
            $this->db = $db;
        }

        public function addAdmin(){
            
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
        public function EditAdminProfile(){
            
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
                            echo '<script>window.location="{$_SESSION[\'UrlTracker\']}";</script>';
                         
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
           //delete comment 
           public function DeleteAdmin(){
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

          // function to add notice category
        public function noticeCategory(){
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
                    $desc = $this->db->mysqli->real_escape_string($_POST['noticeDesc']);
                    $category = $this->db->mysqli->real_escape_string($_POST['notice_type']);
                    $dueDate = $this->db->mysqli->real_escape_string($_POST['dueDate']);
                    $creator = "jeevista";

                    $sql = "INSERT INTO notice (notice_type,descrip,creator,due_date) VALUES ('$category','$desc','$creator','$dueDate')";

                            if($this->db->conn->query($sql) === TRUE){
                                $_SESSION['SuccessMsg'] = "Notice Created Successfully!";
                            }
                            else {
                                $_SESSION['ErrorMsg'] = "Failed to Create Notice!!";
                            }
                }
            }
        }

         //get all notice 
         public function getNotice()
         {                     
         
                  $sql = "SELECT * FROM notice";
                  $results = $this->db->conn->query($sql);
                  $resultsArray = array();
            
                 while($item = mysqli_fetch_assoc($results))
                 {
                     $resultsArray[] = $item;
                 }            
            
                 //final results returned
             return $resultsArray;
         }


        
 

        
    }

?>