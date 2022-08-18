<?php
    $_SESSION['UrlTracker'] = $_SERVER['PHP_SELF'];
    $admin->confirmLogin();
?>
<?php

    if(isset($_POST['addkosagram_post'])){
        if(empty($_POST['post_desc']))
        { 
            $_SESSION['ErrorMsg'] = "Post description cannot be empty!!";  
        } 
        if(!empty($_POST['post_desc']) && strlen($_POST['post_desc']) > 70)
        { 
            $_SESSION['ErrorMsg'] = "Post description should be less than 80 characters!!";  
        } 
        else
            {
                $post->addPost();  
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
                    <h1><span><i class="fas fa-pen-square text-warning"></i></span> Add Kosagram Post</h1>
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
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']).'?type=kosagram' ?>" method="POST" enctype="multipart/form-data">
                <div class="card  bg-secondary text-light mb-3 font-roboto">
                   
                    <div class="card-body bg-dark ">                     
                        <div class="form-group">
                            <!-- <label for="select_image" class="my-2">Upload Image</label> -->
                            <input type="file" name="image" id="image" class="form-control my-3"> 
                        </div>
                        <div class="form-group">
                            <label for="post_desc" class="my-1">Post</label> <span class="text-warning">Please write short description(70 characters)</span>
                            <textarea name="post_desc" id="post_desc" cols="30" rows="5" class="form-control"></textarea>
                        </div>

                        <div class="row my-3">
                            <div class="col-lg-6 text-white mb-2">
                                <a href="index.php" class="btn btn-warning py-3" style="width:100%;height:65px;"> <span><i class="fas fa-arrow-left mr-1"></i></span> Back To Dashboard</a>
                              
                            </div>
                            <div class="col-lg-6 text-white mb-2"> 

                                <button class="btn btn-success" name="addkosagram_post" style="width:100%;height:65px;"> <span><i class="fas fa-check mr-1"></i></span> Publish</button>
                            </div>
                        </div>

                    </div>
                </div>

            </form>

        </div>
    </div>
</section>
   