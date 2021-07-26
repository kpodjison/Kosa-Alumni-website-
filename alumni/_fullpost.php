<div class="container my-4" style="min-height:560px;">
    <div class="row">
        <div class="col-lg-9">
        
            <h2><span><i class="fas fa-blog me-1 text-primary"></i></span> Kosa Blog</h2>
            <div class="card p-3 mb-4">
                <img src="assets/uploads/bg-38.jpg" alt="post-img" class="card-img img-fluid mb-1" style="max-height:450px;">
                <card-body>
                    <h3>Raya the last dragon</h3>
                    <small class="lead">Written By: jee on date</small>
                    <hr>
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate quae aspernatur tempore adipisci soluta culpa!</p>
                    
                </card-body>
            </div>
            <!-- start of comments  -->
            <div class="media d-flex flex-row mb-2 p-1 border bg-secondary">
                <img src="assets/admins/user2.png" alt="commenter-image" class="img-fluid me-2 align-self-start col-md-2" width="64px" height="64px">
                <div class="media-body col-md-10 ">
                    <h6 class="lead mb-0" >Jeevista</h6> 
                    <small>Datehere</small>
                    <p>wow this is great</p>
                </div>
            </div>
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
                        </div>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-at"></i></span>
                            <input type="email" name="commenter_email" id="commenter_email" class="form-control">
                        </div>                            
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