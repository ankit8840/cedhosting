<?php
class User extends Dbcon{
    public function login($email,$password) 
    {
        $active=1;
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
    public function emailverify($key)
    {
        $sql = "UPDATE tbl_user SET `email_approved`=1 ,`active`=1
        WHERE `emailkey` = '$key' ";
        $rides = $this->conn->query($sql);
        return $rides;
    }
}
?>