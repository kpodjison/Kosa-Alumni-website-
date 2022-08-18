<?php
// all posts 
    $allPosts = $post->getAllPost("");
    $LatestNotice = $admin->getLatestNotice();
       //fetching all post from pagination link
       if(isset($_GET['page']))
       {   
           if(is_numeric($_GET['page']))
           {
               $allPosts = $post-> getPaginationPost();
           }else
           {
               $_GET['page'] = 1;
               $allPosts = $post-> getPaginationPost();
           }
           
       }
?>

<div class="container my-4" style="min-height:560px;">
    <div class="row">
        <div class="col-lg-9">
        
            <h2><span><i class="fas fa-blog me-1 text-primary"></i></span> Kosa Blog</h2>
            <?php foreach($allPosts as $item):                 
                $allApprovedComments = count($post->getApprovedComments($item['id']));
                ?>
                <div class="card p-3 mb-4">
                <img src="assets/uploads/<?php echo htmlentities($item['post_img']); ?>" alt="post-img" class="card-img img-fluid" style="max-height:450px;">
                <card-body>
                    <h3><?php echo htmlentities($item['title']); ?></h3>
                    <div class="d-flex flex-row justify-content-between">
                       <small class="lead">Written By: <?php echo htmlentities($item['author']); ?> on <?php echo htmlentities($item['date_time']); ?></small>
                        <?php 
                                    if($allApprovedComments > 0)
                                    {
                                   
                                        if($allApprovedComments > 1)
                                        {
                                            echo '<small class="badge bg-secondary p-1"><span>Comments '.$allApprovedComments.'</span></small>';
                                
                                        } 
                                        if($allApprovedComments == 1)
                                        {
                                            echo '<small class="badge bg-secondary p-1"><span>Comment '.$allApprovedComments.'</span></small>';
                                        }
                                    }
                        ?>
                    </div>
                    
                    <hr>
                    <p class="card-text"><?php echo htmlentities($item['post_desc']); ?></p>
                    <a href="fullpost.php?id=<?php echo htmlentities($item['id']); ?>" class="btn btn-primary float-end"> <span>Read More >></span> </a>
                </card-body>
              
            </div>
            <?php endforeach; ?>
          
         <!-- start of pagination  -->
        <ul class="pagination pagination-lg justify-content-center">

                <?php  
                        $TotalPosts = $post->getPostTotal();
                    // echo $TotalPosts;
                        $pagination = ceil($TotalPosts/5);
                        // echo $pagination;
                        //variable to hold current page id  
                        $currentPage = null;

                        /*set page to 1 by default if it's empty or if its greater 
                        than the total number of posts 
                        */
                        if(empty($_GET['page'])){
                        $_GET['page'] = 1;
                    }
                    
                ?>



                    <!-- start of backward button  -->
                <?php
                            if(isset($_GET['page']))
                            {   
                                $currentPage = $_GET['page'];  
                                $PrevPage = $_GET['page'] - 1;
                                if($currentPage > 1 && $currentPage <=$pagination){
                                        echo '<li class="page-item">
                                        <a href="index.php?page='.$PrevPage.'"class="page-link">&laquo;</a>
                                            </li> ';
                                }                                   
                            }

                        ?>
                        <!-- end of backward button  -->
                <?php              
                    for($i = 1; $i <= $pagination; $i++)
                    {    
                    $currentPage = $_GET['page'];
                    if( $i == $currentPage )
                    {
                        echo '<li class="page-item active" ><a href="index.php?page='.$i.'" class="page-link">'.$i.'</a></li>';
                    }
                    else
                    echo '<li class="page-item" ><a href="index.php?page='.$i.'" class="page-link">'.$i.'</a></li>';
                    }
                ?>

                    <!-- //start of forward button  -->
                <?php
                    $NextPage = $_GET['page'] + 1;

                    if(isset($_GET['page']))
                    {
                    if($NextPage <= $pagination)
                    {
                    echo '<li class="page-item" ><a href="index.php?page='.$NextPage.'" class="page-link">&raquo;</a></li>';
                    }

                    }
                ?>
                    <!-- //end of forward button  -->
        </ul>

        <!-- end of pagination  -->
        </div>
        <!-- start of left side bar  -->
        <div class="col-lg-3 " style="">
            <!-- admins pick  -->
            <div class="card mb-3">
                <img src="assets/uploads/justice.jpg" alt="AdminsPick" class="card-img img-fluid" style="max-height:290px;">
                <div class="card-body">
                    <p clas="card-text">Looking gorgeous and stunning at the wedding day.#properAdmin</p>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header bg-success text-white">
                    <h3>Latest Notices</h3>
                </div>
                <div class="card-body">
                    <?php  foreach($LatestNotice as $notice): ?>
                        <p class="card-text"><?php  echo ucfirst(htmlentities($notice['heading'])) ?></p>
                        <hr>
                    <?php endforeach; ?>
                    
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