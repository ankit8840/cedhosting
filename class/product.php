<?php
class product extends Dbcon{
    public function category() {
        $sql="SELECT * FROM tbl_product ";
            $products = $this->conn->query($sql);
            if(mysqli_num_rows($products)){
                return $products;
            }
    }
    public function hosting() {
        $sql="SELECT * FROM tbl_product WHERE `prod_parent_id`=0";
            $products = $this->conn->query($sql);
            if(mysqli_num_rows($products)){
                return $products;
            }
    }
    public function hostingcategory() {
        $sql="SELECT * FROM tbl_product WHERE `prod_parent_id`=1";
            $products = $this->conn->query($sql);
            if(mysqli_num_rows($products)){
                return $products;
            }
    }
    public function showcategory(){
        $sql="SELECT * FROM tbl_product WHERE `prod_parent_id`=(SELECT `id` from tbl_product
                                                                WHERE `prod_parent_id`=0)";
            $products = $this->conn->query($sql);
            if(mysqli_num_rows($products)>0){
                return $products;
            }
    }
    public function getname($id) {
        $sql="SELECT `prod_name` FROM tbl_product WHERE `id`=$id";
            $products = $this->conn->query($sql);
            if(mysqli_num_rows($products)){
                return $products;
            }
    }
}
?>