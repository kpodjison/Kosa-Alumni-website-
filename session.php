<?php
session_start();
     // success
     function SuccessMsg()
     {
            
             if(isset($_SESSION["SuccessMsg"]))
             {
                 $status = '<div class="alert alert-success">'
                             .htmlentities($_SESSION["SuccessMsg"]).
                             '</div>';
 
                 //make this session null after using it
                 $_SESSION["SuccessMsg"]  = null;
                 return $status;
             }
 
     }
 
     //error
     function ErrorMsg()
     {
         if(isset($_SESSION['ErrorMsg']))
         {
             $status = '<div class="alert alert-danger ">'
                         .htmlentities($_SESSION["ErrorMsg"]).
                         '</div>';
 
             //make this session null after using it
             $_SESSION["ErrorMsg"]  = null;
             return $status;
         }
     }
 
     //error
     function PostErrorMsg()
     {
         if(isset($_SESSION['PostErrorMsg']))
         {
             $status = '<div class="alert alert-danger ">'
             .htmlentities($_SESSION["PostErrorMsg"]).
             '</div>';
 
             //make this session null after using it
             $_SESSION["PostErrorMsg"]  = null;
             return $status;
         }
     } 

      // success message for unexisting approved comments
    function ApSuccessMsg()
    {
            if(isset($_SESSION["ApSuccessMsg"] ))
            {
                $status = '<div class="alert alert-success">'
                            .htmlentities($_SESSION["ApSuccessMsg"]).
                            '</div>';

                            //make this session null after using it
                            $_SESSION["ApSuccessMsg"]  = null;
                            return $status;
            }

    }
      // success message for directing admin to members page
    function BenSuccessMsg()
    {
            if(isset($_SESSION['BenSuccessMsg']))
            {
                $status = '<div class="alert alert-success">'
                            .htmlentities($_SESSION["BenSuccessMsg"]).
                            '<a href="members.php" >Here</a>'.
                            '</div>';

                            //make this session null after using it
                            $_SESSION["BenSuccessMsg"]  = null;
                            return $status;
            }

    }
?>