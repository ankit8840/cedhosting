<?php
class Dbcon
{
    public function connect($host, $user, $pass, $dtb) 
    {
        $this->serverame = $host;
        $this->username = $user;
        $this->password = $pass;
        $this->dbname   = $dtb;

        return $this->conn = mysqli_connect($host, $user, $pass, $dtb) or die('Could Not Connect.');
    }
    public function insert($fields, $data, $table) 
    {
        try {
            $queryFields = implode(",", $fields);

            $queryValues = implode('","', $data);
            
            $insert = 'INSERT INTO '.$table.'('.$queryFields.') VALUES ("'.$queryValues.'")';

            if (mysqli_query($this->conn, $insert)) {
                return true;
            } else {
                die(mysqli_error($this->conn));
            }
        } catch (Exception $ex) {
            echo "Some Exception Occured " . $ex;
        }
    }
    public function select() 
    {
        $result=mysqli_query($this->conn, "SELECT * FROM tbl_user");
        if(mysqli_num_rows($result)>0){
            return $result;
        }
    }
}
class User extends dbcon{
    public function login($email,$password) 
    {
        $active=0;
        $sql ='SELECT * FROM tbl_user WHERE 
        `email`="'.$email.'" AND 
        `password`="'.$password.'" AND `active`="'.$active.'"';
        $result = $this->conn->query($sql);
        if ($result->num_rows>0) {
            while ($row = $result->fetch_assoc()) {
                $_SESSION["userdata"]=array('name' => $row['name'],
                'userid'=>$row['id'],'logintime'=>time(),'is_admin'=>$row['is_admin']);
            }
            // header("Refresh:0; url=../index.html");
        } else {
            $rtn = "Login Failed";
            return $rtn;
        }
      
    }
}