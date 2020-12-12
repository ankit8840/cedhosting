<?php
class product extends Dbcon{
    public function category() {
        $sql="SELECT * FROM tbl_product ";
            $products = $this->conn->query($sql);
            if(mysqli_num_rows($products)){
                return $products;
            }
    }
    public function subcategory() {
        $sql="SELECT * FROM tbl_product WHERE `prod_parent_id`=1";
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
   public function updatecategory($prodid,$subcat,$link,$proava) {
    if($proava=="Yes"){
        $proava=1;
    }
    else
    $proava=0;
    $sql = "UPDATE `tbl_product` SET `prod_name`='$subcat' ,`link`='$link',`prod_available`='$proava'
    WHERE `id` = '$prodid' ";
     $products = $this->conn->query($sql);
     return $products;
   }
   public function deletecategory($id){
    $sql = "DELETE FROM tbl_product WHERE `id`= '$id' ";
    $result = $this->conn->query($sql);
     return $result;
   }
   public function Addproduct($categoryid, $productname,$URL,$description,$monthlyprice,$annualprice,$sku,$features){
    $sql="INSERT INTO tbl_product(`prod_parent_id`, `prod_name`)
     VALUES ('".$categoryid."', '".$productname."')";
     if ($this->conn->query($sql) === TRUE) {
        $last_id = $this->conn->insert_id;
        $sql="INSERT INTO tbl_product_description(`prod_id`, `description`, `mon_price`, `annual_price`, `sku`, `features`)
        VALUES ('".$last_id."','".$description."','".$monthlyprice."','".$annualprice."','".$sku."','".$features."')";
             if ($this->conn->query($sql) === TRUE) {
                 echo '<script>alert("ok")</script>';
             }
        }
        else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
          }
    }
    public function viewproduct(){
        $sql="SELECT tbl_product_description.id,prod_id,description,mon_price,annual_price,sku, 
        tbl_product.id,prod_parent_id,prod_name,link,prod_available,prod_launch_date,features FROM 
        tbl_product_description INNER JOIN tbl_product ON tbl_product_description.prod_id =tbl_product.id ";
        $products = $this->conn->query($sql);
        if(mysqli_num_rows($products)>0){
            return $products;
        }
    }
}
?>

