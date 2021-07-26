<?php
    class Post
    {
       public $db = null;       

        // constructor 
        public function __construct(DBController $db)
        {
            if(!isset($db->conn)){
                return null;
            }else
            $this->db = $db;

        }

        //add post function 
        public function addPost()
        {
            if($_SERVER['REQUEST_METHOD'] === 'POST')
            {
                if(isset($_POST['add_post']))
                {
                    $post_title = $this->db->mysqli->real_escape_string($_POST['postTitle']);
                    $category = $this->db->mysqli->real_escape_string($_POST['category']);
                    $image = $_FILES['image']['name'];
                    $ImgTargetDir  = "../assets/uploads/".basename($_FILES['image']['name']);
                    $post_desc =  $this->db->mysqli->real_escape_string($_POST['post_desc']);
                    $author =$_SESSION['UserName'];

                    $sql = "INSERT INTO post(title,category,author,post_img,post_desc) VALUES ('$post_title', '$category','$author','$image','$post_desc')";

                    if($this->db->conn->query($sql) === TRUE)
                    {
                        
                        //move file into uploads folder
                        move_uploaded_file($_FILES['image']['tmp_name'], $ImgTargetDir);                        
                        $_SESSION["SuccessMsg"] = "Post added successfully!";

                    }

                }
            }
            
        }
        //edit post function 
        public function editPost()
        {
            if($_SERVER['REQUEST_METHOD'] === 'POST')
            {
                if(isset($_POST['edit_post']))
                {
                    $post_id = $this->db->mysqli->real_escape_string($_POST['edit_post_id']);
                    $post_title = $this->db->mysqli->real_escape_string($_POST['postTitle']);
                    $category = $this->db->mysqli->real_escape_string($_POST['category']);
                    $image = $_FILES['image']['name'];
                    $ImgTargetDir  = "../assets/uploads/".basename($_FILES['image']['name']);
                    $post_desc =  $this->db->mysqli->real_escape_string($_POST['post_desc']);
                    $author = $_SESSION['UserName']; 
                    
                    //variable to hold update query
                    $sql = "";

                    /*if post image is not changed use default image else use new image selected */
                    if(empty($image)){
                        $sql = "UPDATE post SET title='$post_title',category='$category',post_desc='$post_desc' WHERE id='$post_id' ";
                    }
                    else
                    {
                        $sql = "UPDATE post SET title='$post_title',category='$category',post_img='$image',post_desc='$post_desc' WHERE id='$post_id' ";
                    }

                    //check if  update was successfull
                    if($this->db->conn->query($sql) === TRUE)
                    {
                        
                        //move file into uploads folder
                        move_uploaded_file($_FILES['image']['tmp_name'], $ImgTargetDir);                        
                        $_SESSION['EditSuccessMsg'] = "Post {$post_id}: Updated Successfully!";
                        header("Location:post.php");
                          

                    }

                }
            }
            
        }

        // delete post function 
        public function deletePost()
        {
            if($_SERVER['REQUEST_METHOD'] === 'POST')
            {
            
                if(isset($_POST['delete_post']))
                {
                    $post_id = $_POST['delete_post_id'];
                    $image = $_POST['delete_post_img'];
                    $Target_Path_To_Delete_Img = "../assets/uploads/$image";
                    $sql = "DELETE FROM post WHERE id = '$post_id' ";

                    if($this->db->conn->query($sql) === TRUE)
                    {
                        // delete image corresponding to this addPost 
                        unlink($Target_Path_To_Delete_Img);
                        $_SESSION['DeleteSuccessMsg'] = "Post: {$post_id} Deleted Successfully!";
                        header("Location:post.php");
                    }

                }
            }
        }

        //get all post function
        /*This function gets all post: 
            1. by default it returns all post (thus when called with an empty string as argument)
            2.  It returns post based on search keywords( thus when called with a string parameter from 
                searched keyword.)
        */
        

        public function getAllPost($searched_key_word)
        {
            //Variable to hold all results 
            $resultsArray = array();

            if(!empty($searched_key_word))
            {
                if($_SERVER['REQUEST_METHOD'] === "GET")
                {
            
                    if(isset($_GET['search_btn']))
                    {
                        $search = $this->db->mysqli->real_escape_string($_GET['Search']);                    
                        
                        $sql = "SELECT * FROM post WHERE date_time LIKE '%$search%' 
                        OR title LIKE '%$search%' 
                        OR category LIKE '%$search%' 
                        OR  post_desc LIKE '%$search%' 
                        ";
                        $results = $this->db->conn->query($sql);
                
                        while($item = mysqli_fetch_assoc($results))
                        {
                            $resultsArray[] = $item;
                
                        }                        
                    }              
                    if(isset($_GET['category']))
                    {
                        $search = $this->db->mysqli->real_escape_string($_GET['category']);                    
                        
                        $sql = "SELECT * FROM post WHERE date_time LIKE '%$search%' 
                        OR title LIKE '%$search%' 
                        OR category LIKE '%$search%' 
                        OR  post_desc LIKE '%$search%' 
                        ";
                        $results = $this->db->conn->query($sql);
                
                        while($item = mysqli_fetch_assoc($results))
                        {
                            $resultsArray[] = $item;
                
                        }                        
                    }              

                }
            }
            else{
                    $sql = "SELECT * FROM post ORDER BY id DESC LIMIT 0,5";
                    $results = $this->db->conn->query($sql);

                    while($item = mysqli_fetch_assoc($results))
                    {
                        $resultsArray[] = $item;
                    
                    }
                }        
    
            return $resultsArray;
        }

        public function getPaginationPost()
        {
            //Variable to hold all results 
            $resultsArray = array();

           if(isset($_GET['page']))
            {
                $page = $_GET['page'];
                if($page == 0 || $page < 0){
                    $showPostFrom = 0;
                }
                else{
                    $showPostFrom = ($page*5)-5;
                }
                
                $sql = "SELECT * FROM post ORDER BY id DESC LIMIT $showPostFrom,5";
                $results = $this->db->conn->query($sql);
                while($item = mysqli_fetch_assoc($results))
                {
                    $resultsArray[] = $item;                
                 }
            }        
    
            return $resultsArray;
        }


        public function getPostTotal(){
            

                $sql = "SELECT * FROM post ORDER BY id DESC ";
                $results = $this->db->conn->query($sql);
                $resultsArray =array();

                while($item = mysqli_fetch_assoc($results))
                {
                    $resultsArray[] = $item;                
                }

                return count($resultsArray);
             
        }


        //function to get latest post taking a parameter corresponding to the number of posts to be fetched
        public function getLatestPost($limit)
        {
                    $resultsArray = array();
                    $sql = "SELECT * FROM post ORDER BY id DESC LIMIT 0,{$limit}";
                    $results = $this->db->conn->query($sql);

                    while($item = mysqli_fetch_assoc($results))
                    {
                        $resultsArray[] = $item;
                    
                    }

            return $resultsArray;
        }

        // function to get an single post 
        public function getSinglePost($id)
        {
            $sql = "SELECT * FROM post WHERE id='$id' ";
            $results = $this->db->conn->query($sql);

            $resultsArray = array();

            while($item = mysqli_fetch_assoc($results))
            {
                $resultsArray[] = $item;
            }
            
            return $resultsArray;
        }


        // add comment function 
        public function addComment(){
            if($_SERVER['REQUEST_METHOD'] === 'POST'){

                if(isset($_POST['add_comment']))
                {

                    $post_id = $this->db->mysqli->real_escape_string($_POST['post_id']);
                    $name = $this->db->mysqli->real_escape_string($_POST['commenter_name']);
                    $email = $this->db->mysqli->real_escape_string($_POST['commenter_email']);
                    $comment= $this->db->mysqli->real_escape_string($_POST['commenter_comments']);
                    $sql = "INSERT INTO comments (commenter_name,commenter_email,comment,approved_by,status,post_id) VALUES ('$name','$email','$comment','pending','OFF','$post_id')";

                    if($this->db->conn->query($sql) === TRUE)
                    {                       
                        $_SESSION["SuccessMsg"] = "Comment submitted successfully!";                    
                    }
                    else
                    $_SESSION["ErrorMsg"] = "Failed to submit comment!!";
                }
            }

        }
        
        // get comments corresponding to a post 
        public function getAllComments(){
            $sql = "SELECT * FROM comments";
            $results = $this->db->conn->query($sql);
            $resultsArray = array();

            while($item = mysqli_fetch_assoc($results))
            {
                $resultsArray[] = $item;
            }
            return $resultsArray;
        }
        // get comments corresponding to a post 
        public function getPostComments($id){
            $sql = "SELECT * FROM comments WHERE post_id='{$id}' AND status ='ON' ";
            $results = $this->db->conn->query($sql);
            $resultsArray = array();

            while($item = mysqli_fetch_assoc($results))
            {
                $resultsArray[] = $item;
            }
            return $resultsArray;
        }
        // get approveed comments 
        public function getApprovedComments($id){
            $resultsArray = array();

            if(empty($id))
            {
                $sql = "SELECT * FROM comments WHERE  status ='ON' ";
            }
            else
            {
                $sql = "SELECT * FROM comments WHERE  status ='ON' AND post_id= '$id' ";

            }            
            $results = $this->db->conn->query($sql);            

            while($item = mysqli_fetch_assoc($results))
            {
                $resultsArray[] = $item;
            }
            return $resultsArray;
        }
        // get un-approveed comments 
        public function getUnApprovedComments($id){

            $resultsArray = array();
            if(empty($id)){

                $sql = "SELECT * FROM comments WHERE  status ='OFF' ";
            }
            else
            {
                $sql = "SELECT * FROM comments WHERE  status ='OFF' AND  post_id='$id' ";

            }
            
            $results = $this->db->conn->query($sql);            

            while($item = mysqli_fetch_assoc($results))
            {
                $resultsArray[] = $item;
            }
            return $resultsArray;
        }
        // approve comments 
        public function ApproveComment(){
            if($_SERVER['REQUEST_METHOD'] === 'GET')
            {
                if(isset($_GET['cid']))
                {
                    $comment_id = $_GET['cid'];
                    $admin = $_SESSION['UserName'];
                    $sql = "UPDATE comments SET status = 'ON', approved_by= '$admin' WHERE id='$comment_id' ";
                    $results = $this->db->conn->query($sql);
                    if($results == TRUE)
                    {
                        $_SESSION["SuccessMsg"] = "Comment Approved successfully!";
                        
                    }
                    else
                    {
                        $_SESSION["ErrorMsg"] = "Something Went Wrong. Please Try Again!!";
                    }
                
                }
            }              
        }
        // un-approve comments 
        public function DisApproveComment(){
            if($_SERVER['REQUEST_METHOD'] === 'GET')
            {
                if(isset($_GET['ucid']))
                {
                    $comment_id = $_GET['ucid'];
                    $admin = $_SESSION['UserName'];
                    $sql = "UPDATE comments SET status = 'OFF', approved_by= '$admin' WHERE id='$comment_id' ";
                    $results = $this->db->conn->query($sql);
                    if($results == TRUE)
                    {
                        $_SESSION["SuccessMsg"] = "Comment Disapproved successfully!";
                        
                    }
                    else
                    {
                        $_SESSION["ErrorMsg"] = "Something Went Wrong. Please Try Again!!";
                    }
                
                }
            }              
        }
        //delete comment 
        public function DeleteComment(){
            if($_SERVER['REQUEST_METHOD'] === 'GET')
            {
                if(isset($_GET['dcid']))
                {
                    $comment_id = $_GET['dcid'];
                    $sql = "DELETE FROM comments WHERE id='$comment_id' ";
                    $results = $this->db->conn->query($sql);
                    if($results == TRUE)
                    {
                        $_SESSION["SuccessMsg"] = "Comment Deleted successfully!";
                        
                    }
                    else
                    {
                        $_SESSION["ErrorMsg"] = "Something Went Wrong. Please Try Again!!";
                    }
                
                }
            }              
        }

        // add category function 
        public function addCategory(){
            if($_SERVER['REQUEST_METHOD'] === 'POST'){

                if(isset($_POST['add_cat']))
                {

                    $title = $this->db->mysqli->real_escape_string($_POST['title']);
                    // $author = $_SESSION['UserName'];
                    $author = "jeevista";
                    $sql = "INSERT INTO category (title,author) VALUES ('$title','$author')";

                    if($this->db->conn->query($sql) === TRUE){
                        // $this->status= "Category added successfully!";
                        $_SESSION["SuccessMsg"] = "Category added successfully!";
                    }
                    else
                    $_SESSION["ErrorMsg"] = "Failed to add category!!";
                }
            }

        }

        //get category function
        public function getAllCategories()
        {                     
        
                 $sql = "SELECT * FROM category";
                 $results = $this->db->conn->query($sql);
                 $resultsArray = array();
           
                while($item = mysqli_fetch_assoc($results))
                {
                    $resultsArray[] = $item;
                }            
           
                //final results returned
            return $resultsArray;
        }


          //delete comment 
          public function DeleteCategory(){
            if($_SERVER['REQUEST_METHOD'] === 'GET')
            {
                if(isset($_GET['catid']))
                {
                    $cat_id = $_GET['catid'];
                    $sql = "DELETE FROM category WHERE id='$cat_id' ";
                    $results = $this->db->conn->query($sql);
                    if($results == TRUE)
                    {
                        $_SESSION["SuccessMsg"] = "Category Deleted successfully!";
                        
                    }
                    else
                    {
                        $_SESSION["ErrorMsg"] = "Something Went Wrong. Please Try Again!!";
                    }
                
                }
            }              
        }

    }




?>