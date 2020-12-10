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
?>