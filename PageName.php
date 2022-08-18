<?php
        class PageName{

            public function __construct(){
                
            }


            //function to set the title of the respective pages dynamically
            public function setPageName($page_name){
                $page_file_name = $page_name;
                $page_title;

                switch($page_file_name)
                {
                    case 'index.php':
                        $page_title = 'Kosa | Home';
                        break;
                    case 'about.php':
                        $page_title = 'Kosa | | About-Us';
                        break;
                    case 'contact.php':
                        $page_title = 'Kosa | | Contact-Us';
                        break;
                    case 'fullpost.php':
                        $page_title = 'Kosa | Fullpost';
                        break;
                    case 'notice.php':
                        $page_title = 'Kosa | Notice';
                        break;
                    case 'addpost.php':
                        $page_title = 'Kosa | Addpost';
                        break;
                    case 'adminlogin.php':
                        $page_title = 'Kosa | AdminLogin';
                        break;
                    case 'admins.php':
                        $page_title = 'Kosa | Admins';
                        break;
                    case 'beneficiary.php':
                        $page_title = 'Kosa | Beneficiary';
                        break;
                    case 'category.php':
                        $page_title = 'Kosa | Category';
                        break;
                    case 'comments.php':
                        $page_title = 'Kosa | Comments';
                        break;
                    case 'contribution.php':
                        $page_title = 'Kosa | Contribution';
                        break;
                    case 'deletepost.php':
                        $page_title = 'Kosa | Delete Post';
                        break;
                    case 'editpost.php':
                        $page_title = 'Kosa | Edit Post';
                        break;
                    case 'editcont.php':
                        $page_title = 'Kosa | Edit Contributions';
                        break;
                    case 'editnotice.php':
                        $page_title = 'Kosa | Edit Notice';
                        break;
                    case 'members.php':
                        $page_title = 'Kosa | Alumni';
                        break;
                    case 'profile.php':
                        $page_title = 'Kosa | Admin Profile';
                        break;                    
                    case 'registermember.php':
                        $page_title = 'Kosa | Alumin Registration';
                        break;                    
                    case 'post.php':
                        $page_title = 'Kosa | Post';
                        break;                    
                    default:
                      $page_title = 'Kosa |';
                }
                return $page_title;



            }



        }

?>