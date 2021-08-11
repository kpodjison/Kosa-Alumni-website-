<?php
 $_SESSION['UrlTracker'] = $_SERVER['PHP_SELF'];
 $admin->confirmLogin();
    $allPosts = $post->getAllPost("");
?>

<?php
 
//    handling edition of contribution 
    if(isset($_POST['ed_cont'])){
                      
                $admin-> editCont();  
        
    }

?>
<?php

        $cont_id =""; 
        $alumni_id = "";
        $ben_alumni_id = "";
        $cont_details = "";
      if(isset($_GET['eid']))
      {
          //corresponding contributor id from search query parameter
        $cont_id = $_GET['eid'];

        if(!empty($cont_id))
        {    
            //fetch details about specific contribution from contribution table
            $cont_details = $admin->getSingleContributor($cont_id);
            foreach($cont_details  as $item):
                {   
                    // id of contributer 
                    $alumni_id =$item['contrb_id'];
                    // id of beneficiary
                    $ben_alumni_id =$item['benf_id'];
                }
            endforeach;             

                //use alumni id to search alumni table for corresponding user info
                $contributor = $admin->getSingleAlumni($alumni_id);
                

                //get the beneficiary from its corresponding id in contribution table
                $benf = $admin-> getBeneficiary($ben_alumni_id);
                //var to hold beneficiary id corresponding to real alumni id
                $ben_details = "";
                foreach($benf as $item):
                  { 
                    $ben_details = $item['ben_id'];

                  }
                endforeach;

                //get alumni info based on id
                $benefactor = $admin->getSingleAlumni($ben_details);             

        }
        
      }
//    al beneficiaries 
      $allBenefeciaries = $admin->getBeneficiary("p");
?>

    <!-- start of main content  -->
    <section class="bg-dark text-white font-roboto py-3">
        <div class="container bg-dark text-white">
            <div class="row">
                <div class="col-md-12">
                    <h1><span><i class="fas fa-edit text-warning"></i></span> Edit Contribution</h1>
                </div>                
            </div>           
        </div>

    </section>
    <section class="container my-3">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 ">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="mb-4">
                        <div class="card">                        
                        <div class="card-body bg-dark text-white">
                            <?php  foreach($contributor as $cont): 
                                    foreach($cont_details as $cont_d):  ?>    
                                    <div class="form-group mb-2">
                                        <label for="c_fullname" class="mb-1">Contributor</label>
                                        <input type="text" id="c_fullname" disabled name="c_fullname" class="form-control" value="<?php echo $cont['firstname']." ".$cont['lastname']??"" ?>">
                                        <input type="hidden" name="c_name" class="form-control" value="<?php echo $cont['firstname']." ".$cont['lastname']??"" ?>">
                                        <input type="hidden" name="contr_id"  value="<?php echo $cont_d['id']??"" ?>">
                                    </div>
                            <?php endforeach;
                                    endforeach;  ?>               
                            <?php  foreach($benefactor as $benf):
                                        foreach($cont_details as $cont): ?>
                                <div class="form-group mb-2">
                                        <label for="c_fullname" class="mb-1 text-warning">Current Benefactor</label>
                                        <input type="text" id="c_fullname" disabled name="c_fullname" class="form-control" value="<?php echo $benf['firstname']." ".$benf['lastname']." -- ".$cont['benf_type']??"" ?>">
                                </div>
                            <?php endforeach;
                                  endforeach;  ?>               
                            <div class="form-group mb-2">
                                    <label for="benef_details" class="mb-1">Beneficiary</label>
                                    <select name="benef_details" id="benef_details" class="form-control">
                                            <option value="" >--select beneficiary--</option>
                                            <?php  foreach($allBenefeciaries as $beneficiary): 
                                                
                                                $id = $beneficiary['ben_id'];
                                                $alumni = $admin->getSingleAlumni($id);
                                                foreach($alumni as $user):
                                                    echo '<option value="'.$beneficiary['id'].'">'.$user['lastname']." ".$user['firstname']." -- ".$beneficiary['ben_type'].'</option>';
                                                endforeach;
                                            ?>
                                            <?php 
                                            endforeach; ?>
                                    </select>
                            </div>
                            <?php   foreach($cont_details as $cont):  ?> 
                                    <div class="form-group mb-2">
                                            <label for="c_amount" class="mb-1 text-warning">Current Amount</label>
                                            <input type="text" id="c_amount" disabled name="c_amount" class="form-control" value="<?php echo $cont['amount']?>" >   
                                    </div>
                            <?php endforeach;  ?> 
                            <div class="form-group mb-2">
                            <label for="amount" class="mb-1">Amount</label>
                            <input type="text"  name="amount" id="amount" class="form-control" value="">
                            </div>
                            <div class="row">
                                <div class="col-lg-6  text-center text-white ">
                                <a href="contribution.php" class="btn btn-warning py-3" style="width:100%;height:60px;"> <span> <i class="fas fa-arrow-left"></i></span> Back To Contributions</a>
                                </div>
                                <div class="col-lg-6 text-center text-white ">
                                <button class="btn btn-success"  type="submit" name="ed_cont" style="width:100%;height:60px;"> <span> <i class="fas fa-check"></i></span> Update</button>
                                </div>
                            </div> 

                        </div>
                        </div>
                    </form>   
            </div>
        </div>
                
    </section>

