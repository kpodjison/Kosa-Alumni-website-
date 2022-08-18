<?php

class Alumni implements Operations{

    public $db = null;

        public function __construct(DBController $db)
        {
            if(!isset($db->conn))
                return null;
            $this->db = $db;
        }

        //fetching all notices from alumni table in db
        public function getData($table='alumni')
        {
            $sql = "SELECT * FROM {$table}";
            $results = $this->db->conn->query($sql);
            $resultsArray = array();

            while($row= mysqli_fetch_assoc($results))
            {
                $resultsArray[] = $row;

            }
            return $resultsArray;
        }

        //funtion to get a single alumni info from db
        public function getSingleData($id = '')
        {
            $sql = "SELECT * FROM alumni WHERE id='$id'";
            $results = $this->db->conn->query($sql);
            $resultsArray = array();

            while($row = mysqli_fetch_assoc($results))
            {
                $resultsArray[]= $row;

            }
            return $resultsArray;
        }

        //function to edit alumni info
        public function editAlumni()
        {
            $alumni_id = $fname = $lname = $gender = $phnum = $email = $occupation = $bio = $updated_by = "";
            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                if(isset($_POST['edit_memb']))
                {
                    $alumni_id= $this->db->mysqli->real_escape_string($_POST['alumni_id']);
                    $fname = $this->db->mysqli->real_escape_string($_POST['fname']);
                    $lname = $this->db->mysqli->real_escape_string($_POST['lname']);
                    $gender = $this->db->mysqli->real_escape_string($_POST['gender']);
                    $phnum = $this->db->mysqli->real_escape_string($_POST['phnum']);
                    $email = $this->db->mysqli->real_escape_string($_POST['email']);
                    $occupation = $this->db->mysqli->real_escape_string($_POST['occupation']);
                    $bio = $this->db->mysqli->real_escape_string($_POST['alumni_bio']);
                    $updated_by= "jeevista";
                    //check if drivers email exist
                    if(!empty($email))
                    {
                        $chk_sql = "SELECT * FROM alumni WHERE email = '$email'";                                
                        $chk_res = $this->db->conn->query($chk_sql);
                        if(mysqli_num_rows($chk_res) > 0)
                        {
                            $_SESSION['ErrorMsg'] = "Failed To Edit Alumni info. Email Already Exist!!";
                        }
                        else
                        {
                            $sql = "UPDATE alumni SET ";
                            if(!empty($fname))
                            {
                                $sql .= "fname = '$fname',";
                            }
                            if(!empty($lname))
                            {
                                $sql .= "lname = '$lname',";
                            }
                            if(!empty($gender))
                            {
                                $sql .= "gender = '$gender',";
                            }
                            if(!empty($phnum))
                            {
                                $sql .= "phone_num = '$phnum',";
                            }
                            if(!empty($email))
                            {
                                $sql .= "email = '$email',";
                            }
                            if(!empty($occupation))
                            {
                                $sql .= "occupation = '$occupation',";
                            }
                            if(!empty($bio))
                            {
                                $sql .= "bio = '$bio',";
                            }

                            $sql.="updated_by = '$updated_by' WHERE id='$alumni_id' ";
                            $results = $this->db->conn->query($sql);
                            if($results === true)
                            {
                                $_SESSION['SuccessMsg'] = "Alumni Info Updated Successfully";
                            }
                            else
                            {
                                $_SESSION['ErrorMsg'] = "Failed To Edit Alumni info!!";
                            }    
                        
                        }
                    }
                    else
                    {
                        $sql = "UPDATE alumni SET ";
                        if(!empty($fname))
                        {
                            $sql .= "firstname = '$fname',";
                        }
                        if(!empty($lname))
                        {
                            $sql .= "lastname = '$lname',";
                        }
                        if(!empty($gender))
                        {
                            $sql .= "gender = '$gender',";
                        }
                        if(!empty($phnum))
                        {
                            $sql .= "phone_num = '$phnum',";
                        }
                        if(!empty($occupation))
                        {
                            $sql .= "occupation = '$occupation',";
                        }
                        if(!empty($bio))
                        {
                            $sql .= "bio = '$bio',";
                        }

                        $sql.="updated_by = '$updated_by' WHERE id='$alumni_id' ";
                        $results = $this->db->conn->query($sql);
                        if($results === true)
                        {
                            $_SESSION['SuccessMsg'] = "Alumni Info Updated Successfully";
                        }
                        else
                        {
                            $_SESSION['ErrorMsg'] = "Failed To Edit Alumni info!!";
                        }
                    }
                }
            }
        }

        






}

?>