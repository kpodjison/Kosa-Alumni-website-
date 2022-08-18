<?php
 $_SESSION['UrlTracker'] = $_SERVER['PHP_SELF'];
 $admin->confirmLogin();
    $allPosts = $post->getAllPost("");
?>

<?php
 
//    handling edition of post 
    if(isset($_POST['delete_post'])){
                      
             $post->deletePost();          
             
    }

?>
<?php
     $searchQueryParam = null;
    
    if(isset($_GET['id']))
    {
        $searchQueryParam = $_GET['id'];     
        $_POST['e_id'] = $searchQueryParam;   
        $singlePost = $post->getSinglePost( $searchQueryParam);
        if(empty($singlePost))
        {
            $_SESSION['PostErrorMsg'] = "Opps Page Not Found! Browse existing post."; 
            echo ' <script>window.location="/../index.php";</script>';
            
        }
    }      

?>

    <!-- start of main content  -->
    <section class="bg-dark text-white font-roboto py-3">
        <div class="container bg-dark text-white">
            <div class="row">
                <div class="col-md-12">
                    <h1><span><i class="fas fa-trash-alt text-warning"></i></span> Delete Post</h1>
                </div>                
            </div>           
        </div>

    </section>

<section class="container py-2 mb-4 " style="min-height:622px;">
    <div class="row">
        <div class="offset-lg-1 col-lg-10" >
            <?php
                echo SuccessMsg();
                echo ErrorMsg();
            ?>
            
            <?php  
                foreach($singlePost as $post_item):

            ?>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST" enctype="multipart/form-data">
                <div class="card  bg-secondary text-light mb-3 font-roboto">
                    <input type="hidden" name="delete_post_id" value="<?php echo $post_item['id']  ?>">
                    <input type="hidden" name="delete_post_img" value="<?php echo $post_item['post_img']  ?>">
                   
                    <div class="card-body bg-dark "> 
                        <div class="form-group mb-2">
                            <label for="postTitle" class="my-1">Post Title</label>
                            <input type="text" disabled name="postTitle" id="postTitle" class="form-control" value="<?php echo $post_item['title']  ?>"> 
                        </div>
                        <div class="form-group">
                            <span class="FieldInfo">Existing Category: 
                                <span class="text-warning"><?php echo $post_item['category']?></span>
                            </span>
                            <br>
                        </div>
                        <div class="form-group">
                            <!-- <label for="select_image" class="my-2">Upload Image</label> -->
                            <span class="FieldInfo">Existing Image: </span>
                            <img class="my-2" src="../assets/uploads/<?php echo $post_item['post_img']; ?>" alt="existing image" width="170px" height="60px">
                        </div>
                        <div class="form-group">
                            <label for="post_desc" class="my-1">Post</label>
                            <textarea name="post_desc" disabled id="post_desc" cols="30" rows="10" class="form-control"><?php echo $post_item['post_desc'];?></textarea>
                        </div>

                        <div class="row my-3">
                            <div class="col-lg-6 text-white mb-2">
                                <a href="index.php" class="btn btn-warning py-3" style="width:100%;height:65px;"> <span><i class="fas fa-arrow-left mr-1"></i></span> Back To Dashboard</a>
                              
                            </div>
                            <div class="col-lg-6 text-white mb-2"> 

                                <button class="btn btn-danger" name="delete_post" style="width:100%;height:65px;" onclick="return confirm('Are you sure you want to delete?'); "> <span><i class="fas fa-trash-alt"></i></span> Delete</button>
                            </div>
                        </div>

                    </div>
                </div>

            </form>

            <?php
                endforeach;
            ?>

        </div>
    </div>
</section>
   