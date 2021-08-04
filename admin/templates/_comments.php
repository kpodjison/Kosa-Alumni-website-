<?php
   /* ---start of unapproved comment operations--- */
    //approve comment 
        if(isset($_GET['cid']))
        {
            $post->ApproveComment();
        }
    //delete un-approved comment (for both approved and unapproved comments)
        if(isset($_GET['dcid']))
        {
            $post->DeleteComment();
        }
     /* ---end of unapproved comment operations--- */

      /* ---start of approved comment operations--- */
        if(isset($_GET['ucid']))
        {
            $post->DisApproveComment();
        }
      /* ---end of approved comment operations--- */

    //array to hold all approved comments 
    $approved_cmts = $post->getApprovedComments("");
    //array to hold all unapproved comments 
    $un_approved_cmts = $post->getUnApprovedComments("");
    
    //message to show there is not existing un-approved comment
    if(empty($un_approved_cmts))
    {
        $_SESSION['SuccessMsg'] = "There Is No Existing Un-approved Comment!";
    }
    //message to show there is not existing approved comment
    if(empty($approved_cmts))
    {
        $_SESSION['ApSuccessMsg'] = "There Is No Existing approved Comment!";
    }
    // print_r($un_approved_cmts );   
?>

    <!-- start of main content  -->
    <section class="bg-dark text-white py-3">
        <div class="container bg-dark text-white">
            <div class="row">
                <div class="col-md-12">
                    <h1><span><i class="fas fa-comments text-warning"></i></span> Manage Comments</h1>
                </div>
            </div>           
        </div>    
    </section>
    <section class="container py-2 my-4">
        <div class="row" style="min-height:30px;">
            <div class="col-lg-12" style="min-height:300px;">
                <h2>Un-Approved Comments</h2>
                    <?php
                         echo SuccessMsg();               
                         echo ErrorMsg();               
                    ?>
                <table class="table table-striped table-hover table-responsive table-bordered">
                    <thead class="table-dark">
                         <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Date&Time</th>
                        <th>Comment</th>
                        <th>Action</th>
                        <th>Details</th>
                    </tr>
                    </thead>
                   
                    <tbody>
                        <?php
                            $counter = 0;
                            foreach($un_approved_cmts as $cmt_item):
                                $counter++;

                        ?>
                        <tr>
                            <td><?php echo $counter; ?></td>
                            <td><?php echo htmlentities($cmt_item['commenter_name']); ?></td>
                            <td><?php echo htmlentities($cmt_item['date_time']); ?></td>
                            <td><?php echo htmlentities($cmt_item['comment']); ?></td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="comments.php?cid=<?php echo $cmt_item['id'];?>" class="m-1"> <span class="btn btn-success">Approve</span> </a>
                                    <a href="comments.php?dcid=<?php echo $cmt_item['id'];?>" class="m-1"> <span class="btn btn-danger">Delete</span> </a>
                                </div>
                            </td>
                            <td style="min-width:130px;">
                                <a href="../fullpost.php?id=<?php echo $cmt_item['post_id'];?>" target=_blank> <span class="btn btn-primary">Live Preview</span>  </a>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
                
            </div>
            <div class="col-lg-12" style="min-height:300px;">
                <h2>Approved Comments</h2>
                    <?php
                        echo ApSuccessMsg();               
                         echo ErrorMsg();               
                    ?>
                <table class="table table-striped table-hover table-responsive table-bordered">
                    <thead class="table-dark">
                         <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Date&Time</th>
                        <th>Comment</th>
                        <th>Action</th>
                        <th>Details</th>
                    </tr>
                    </thead>
                   
                    <tbody>
                        <?php
                            $counter = 0;
                            foreach($approved_cmts as $cmt_item):
                                $counter++;

                        ?>
                        <tr>
                            <td><?php echo $counter; ?></td>
                            <td><?php echo htmlentities($cmt_item['commenter_name']); ?></td>
                            <td><?php echo htmlentities($cmt_item['date_time']); ?></td>
                            <td><?php echo htmlentities($cmt_item['comment']); ?></td>
                            <td >
                                <div class="btn-group" role="group" style="min-width:210px;">
                                    <a href="comments.php?ucid=<?php echo $cmt_item['id'];?>" class="m-1"> <span class="btn btn-warning">Dis-Approve</span> </a>
                                    <a href="comments.php?dcid=<?php echo $cmt_item['id'];?>" class="m-1"> <span class="btn btn-danger">Delete</span> </a>
                                </div>
                            </td>
                            <td style="min-width:130px;">
                                <a href="../fullpost.php?id=<?php echo $cmt_item['post_id'];?>" target=_blank> <span class="btn btn-primary">Live Preview</span>  </a>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
                
            </div>

        </div>

    </section>

   