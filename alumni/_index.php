<?php

    // all posts 
    $allPosts = $post->getAllPost("");
?>

<div class="container my-4" style="min-height:560px;">
    <div class="row">
        <div class="col-lg-9">
        
            <h2><span><i class="fas fa-blog me-1 text-primary"></i></span> Kosa Blog</h2>
            <?php foreach($allPosts as $post): ?>
            <div class="card p-3 mb-4">
                <img src="assets/uploads/<?php echo htmlentities($post['post_img']); ?>" alt="post-img" class="card-img img-fluid" style="max-height:450px;">
                <card-body>
                    <h3><?php echo htmlentities($post['title']); ?></h3>
                    <small class="lead">Written By: <?php echo htmlentities($post['author']); ?> on <?php echo htmlentities($post['date_time']); ?></small>
                    <hr>
                    <p class="card-text"><?php echo htmlentities($post['post_desc']); ?></p>
                    <a href="fullpost.php?id=<?php echo htmlentities($post['id']); ?>" class="btn btn-primary float-end"> <span>Read More >></span> </a>
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
                    <a href="#" class="card-text d-block">Wedding</a>
                    <a href="#" class="card-text d-block">Birthday</a>
                    <a href="#" class="card-text d-block">Funeral</a>
                    <a href="#" class="card-text d-block">Oudooring</a>
                    <a href="#" class="card-text d-block">Health</a>
                    <a href="#" class="card-text d-block">Internet Security</a>
                </div>
            </card>

        </div>
        <!-- end of left side bar  -->

    </div>
</div>