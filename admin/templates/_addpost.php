<?php
    // $_SESSION['UrlTracker'] = $_SERVER['PHP_SELF'];
    // $admin->confirmLogin();
?>
<?php

    if(isset($_POST['add_post'])){
        if(!empty($_POST['postTitle']))
        {
            if(strlen($_POST['postTitle']) < 4)
            {
                $_SESSION['ErrorMsg'] = "Post title cannot be short!!"; 
            }
            else if(strlen($_POST['postTitle']) > 49)
            {
                $_SESSION['ErrorMsg'] = "Post title should be less than 50 characters!!"; 

            }
            else if(strlen($_POST['post_desc']) > 999)
            {
                $_SESSION['ErrorMsg'] = "Post description should be less than 1000 characters!!"; 

            }
            else{
                $post->addPost();  

            }
                     
           
        }
        else if(empty($_POST['postTitle'])){
            $_SESSION['ErrorMsg'] = "Please add a title!!";         
           
        }
       
    }

      // fetch all categories
  $allCategories = $post->getAllCategories();

?>
    <!-- start of main content  -->
    <section class="bg-dark text-white font-roboto py-3">
        <div class="container bg-dark text-white">
            <div class="row">
                <div class="col-md-12">
                    <h1><span><i class="fas fa-pen-square text-warning"></i></span> Add New Post</h1>
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
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST" enctype="multipart/form-data">
                <div class="card  bg-secondary text-light mb-3 font-roboto">
                   
                    <div class="card-body bg-dark "> 
                        <div class="form-group">
                            <label for="postTitle" class="my-1">Post Title</label>
                            <input type="text" name="postTitle" id="postTitle" class="form-control"> 
                        </div>
                        <div class="form-group">
                            <label for="category" class="my-2">Select Category</label>
                            <select name="category" id="category" class="form-select">
                                <?php
                                foreach($allCategories as $item):
                                ?>
                                <option value="<?php echo $item['title']?>"><?php echo $item['title']?></option>
                                
                                <?php
                                    endforeach;
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <!-- <label for="select_image" class="my-2">Upload Image</label> -->
                            <input type="file" name="image" id="image" class="form-control my-3"> 
                        </div>
                        <div class="form-group">
                            <label for="post_desc" class="my-1">Post</label>
                            <textarea name="post_desc" id="post_desc" cols="30" rows="10" class="form-control"></textarea>
                        </div>

                        <div class="row my-3">
                            <div class="col-lg-6 text-white mb-2">
                                <a href="index.php" class="btn btn-warning py-3" style="width:100%;height:65px;"> <span><i class="fas fa-arrow-left mr-1"></i></span> Back To Dashboard</a>
                              
                            </div>
                            <div class="col-lg-6 text-white mb-2"> 

                                <button class="btn btn-success" name="add_post" style="width:100%;height:65px;"> <span><i class="fas fa-check mr-1"></i></span> Publish</button>
                            </div>
                        </div>

                    </div>
                </div>

            </form>

        </div>
    </div>
</section>
   