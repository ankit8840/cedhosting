<?php require 'header.php';?>
<?php
$con = new product();
$con->connect('localhost', 'root', '', 'cedhost');
if(isset($_GET['pid'])){
    $pid=$_GET['pid'];
    $products=$con->Addcart($pid);
    foreach($products as $key1){
        $id=$key1['prod_id'];
        $name=$key1['prod_name'];
        
    }
	//echo '<script>alert('.$pid.')</script>';
}
?>
<?php require 'footer.php';?>