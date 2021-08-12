<?php
// all posts 
    $allPosts = $post->getAllPost("");
    $LatestNotice = $admin->getLatestNotice();
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