<?php
      // all notices
    $allNotice = $admin->getNotice("");
    $currentDate = date("Y-m-d");
?>
    <div class="wrapper " style="min-height:520px">
      <div class="bg-dark text-white p-2 text-center"><h2>WELCOME TO KOSA 2008( The 12 Disciples ) NOTICE BOARD</h2></div>
        <div class="container my-5 px-4">
          <div class="row ">
            <div class="col-lg-10 offset-lg-1 ">
              <div class="row">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-responsive table-hover">
                      <thead class="table-dark">
                            <tr>
                                      <th>No.</th>
                                      <th>Notice Type</th>
                                      <th>Description</th>
                                      <th>Publish Date</th>
                                      <th>Due Date</th>
                                      <th>Status</th>
                            </tr>
                      </thead>
                      <tbody>
                        <?php
                          $counter = 0;
                          foreach($allNotice as $notice):
                            $counter++;
                        ?>
                        <tr>
                          <td><?php echo $counter; ?></td>
                          <td><?php echo htmlentities($notice['notice_type']) ?></td>
                          <td><?php echo htmlentities($notice['descrip']) ?></td>
                          <td style="min-width:120px;">
                            <span class="badge bg-success p-2"><?php echo substr(htmlentities($notice['date_time']),0,10); ?></span></td>                  
                          <td>
                            <span class="badge btn-danger text-white p-2">
                              <?php 
                                if(empty($notice['due_date']))
                                {
                                  echo 'N/A';
                                }else{
                                  echo htmlentities($notice['due_date'] ?? 'N/A');
                                }
                              ?>
                          </span>                    
                              </td>
                          <td class="text-center">
                          
                                  <?php 
                                  
                                    if($currentDate < $notice['due_date'])
                                    {
                                      echo '<span class="badge btn-warning text-white p-2">Pending</span>';
                                    }
                                    else if($currentDate > $notice['due_date'])
                                    {
                                      echo '<span class="badge btn-primary text-white p-2"><del>Expired</del></span>';
                                    }
                                  ?>
                              
                          </td>
                        
                        </tr>
                        <?php  endforeach; ?>
                      </tbody>
                    </table>
                </div>
                
              </div>
            </div>
          </div>
        </div>
          
    

     

</div>
                      
