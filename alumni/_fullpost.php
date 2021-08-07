<?php
    $post_id = "";
    $searchQueryParam = "";
   
    if(isset($_GET['search_btn']))
    {
        $allPosts = $post->getAllPost(htmlentities($_GET['Search']));
    }
    else if(isset($_GET['id']))
    {
        $searchQueryParam = $_GET['id'];
             //all comments corresponding 
        $allPostComments = $post->getPostComments($searchQueryParam);
        // print_r($allPostComments);
        $singlePost = $post->getSinglePost( $searchQueryParam);
        if(empty($singlePost))
        {
            $_SESSION['PostErrorMsg'] = "Opps Page Not Found! Browse existing post."; 
             redirect_to('index.php'); 
        }
    }    
    else if(!isset($_GET['id']) || empty($_GET['id']))
    {
        $_SESSION['PostErrorMsg'] = "Opps Page Not Found! Browse existing post."; 
        redirect_to('index.php'); 
    }




?>

<?php


 //handling comments
 if(isset($_POST['add_comment']))
 {      
     if(empty($_POST['commenter_name']) ||  empty($_POST['commenter_email']) || empty($_POST['commenter_comments']))
     {
         // $post_id = $_GET['id'];
         $_SESSION['ErrorMsg'] = "All fields must be filled!!";  

     }
     else if(strlen($_POST['commenter_comments']) > 500)
     {
         $_SESSION['ErrorMsg'] = "Comment length should be less than 500 characters!!";
    
     }        
     else{
         $post->addComment();
     }        
 }



?>


<div class="container my-4" style="min-height:560px;">
    <div class="row">
        <div class="col-lg-9">          
            <h2><span><i class="fas fa-blog me-1 text-primary"></i></span> Kosa Blog</h2>
            <?php
                    echo SuccessMsg();
                    echo ErrorMsg();

                ?>
            <?php
                foreach($singlePost as $single):
            ?>
            <div class="card p-3 mb-4">
                <img src="assets/uploads/<?php echo htmlentities($single['post_img']); ?>" alt="post-img" class="card-img img-fluid mb-1" style="max-height:450px;">
                <card-body>
                    <h3><?php echo htmlentities($single['title']); ?></h3>
                    <small class="lead">Written By: <?php echo htmlentities($single['author']); ?> on <?php echo htmlentities($single['date_time']); ?></small>
                    <hr>
                    <p class="card-text"><?php echo htmlentities($single['post_desc']); ?></p>                    
                </card-body>
            </div>
            <?php endforeach;?>
            <!-- start of comments  -->
            <?php  foreach($allPostComments as $comment): ?>
                <div class="media d-flex flex-row mb-2 p-1 border bg-secondary">
                    <img src="assets/admins/user2.png" alt="commenter-image" class="img-fluid me-2 align-self-start col-md-2" width="64px" height="64px">
                    <div class="media-body col-md-10 ">
                        <h6 class="lead mb-0" ><?php echo htmlentities($comment['commenter_name']); ?></h6> 
                        <small><?php echo substr(htmlentities($comment['date_time']),0,10); ?></small>
                        <p><?php echo htmlentities($comment['comment']); ?></p>
                    </div>
                </div>
            <?php   endforeach;?>
            <!-- end of comments  -->
        
            <hr>
            <div class="card">
                <div class="card-header">
                    <h4 class="">Share your comments</h4>
                </div>
                <div class="card-body">
                    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
                        <div class="input-group mb-2">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" name="commenter_name" id="commenter_name" class="form-control">
                            <input type="hidden" name="post_id" value="<?php echo$_GET['id'] ?>" id="post_id" class="form-control">
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text"><i class="fas fa-at"></i></span>
                            <input type="email" name="commenter_email" id="commenter_email" class="form-control">
                        </div>
                        <textarea name="commenter_comments" id="" cols="30" rows="8" class="form-control mb-2"></textarea>
                        <input type="submit" value="Comment" class="btn btn-primary float-end" name="add_comment">                            
                    </form>
                </div>
            </div>

        </div>
        <!-- start of left side bar  -->
        <div class="col-lg-3 " style="">
            <!-- admins pick  -->
            <div class="card mb-3">
                <img src="assets/uploads/bg-06.jpg" alt="AdminsPick" class="card-img img-fluid" style="max-height:400px;">
                <div class="card-body">
                    <p clas="card-text">Looking gorgeous and stunning on your wedding day.</p>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header bg-success text-white">
                    <h3>Latest Notices</h3>
                </div>
                <div class="card-body">
                    <p class="card-text">Ahenkan George Berieved</p>
                    <hr>
                    <p class="card-text">Namina Kassum's Upcommming wedding</p>
                    <hr>
                    <p class="card-text">Prosper Anane's wedding</p>
                    <hr>
                    <p class="card-text">Job Vaccancies</p>
                </div>
            </div>
            <card class="card mb-3">
                <div class="card-header bg-primary text-white">
                    <h3>Post Categories</h3>
                </div>
                <div class="card-body">
                    <?php foreach($allCategories as $categories): 
                        
                        echo '<a href="#" class="card-text d-block">'.ucfirst($categories["title"]).'</a>'; ?>

                     <?php  endforeach; ?>
                </div>
            </card>

        </div>
        <!-- end of left side bar  -->

    </div>
</div>