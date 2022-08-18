<?php

  include('../admin/header.php');

?>
<!-- ----------------------------end of header.php------------------------------  -->

   <!-- ----------------------------start of addposttemplate--------------------------  -->
<?php

  if(isset($_GET['type']) && $_GET['type'] == "kosagram")
  {
    include('../admin/templates/_addkosagram.php');
  }
  else{
    include('../admin/templates/_addpost.php');    
  }

?>
<!-- --------------------------end of template ----------------------------------  -->
 <!-- ----------------------------start of footer.php--------------------------  -->
<?php

include('../admin/footer.php');

?>
<!-- --------------------------end of footer.php----------------------------------  -->
 