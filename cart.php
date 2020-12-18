<?php require 'header.php';?>
<?php
$con = new product();
$con->connect('localhost', 'root', '', 'cedhost');
if(isset($_GET['pid'])){
    $pid=$_GET['pid'];
    $page=$_GET['page'];
    $products=$con->Addcart($pid);
    foreach($products as $key1){
        $id=$key1['prod_id'];
        $name=$key1['prod_name'];
        $monprice=$key1['mon_price'];
        $annualprice=$key1['annual_price'];
        $coded=json_decode($key1['features']);
        $webspace=$coded->webspace;
        $bandwidth=$coded->bandwidth;
        $domain=$coded->domain;
        $language=$coded->language;
        $mailbox=$coded->mailbox;
    }
        $_SESSION["cart"][$id]=array('name' => $name,
        'monprice'=>$monprice,'annualprice'=>$annualprice,'webspace'=>$webspace,
        'bandwidth'=>$bandwidth,'domain'=>$domain,'language'=>$language,'mailbox'=>$mailbox);
        echo "<script> window.location.href ='catpage.php?id=$page'</script>";
        
    }
    //echo '<script>alert('.$pid.')</script>';
?>    
<div class="row">
<div class="col container">
  <div class="card bg-white shadow">
    <div class="card-header bg-transparent border-0">
      <h3 class="text-white mb-0 text-center">Cart Products</h3>
    </div>
    <div class="table-responsive container">
    <table id="dtBasicExample" class="table p-4" width="100%">
<thead>
        <tr>
        <th class="th-sm">Name
        </th>
        <th class="th-sm">Monthly price
        </th>
        <th class="th-sm">Annual price
        </th>
        <th class="th-sm">Webspace
        </th>
        <th class="th-sm">Bandwidth
        </th>
        <th class="th-sm">Domain
        </th>
        <th class="th-sm">Language
        </th>
        <th class="th-sm">Mailbox
        </th>
        <th class="th-sm">Action
        </th>
        </tr>
        </thead>
        <tbody>
        <?php if(!empty($_SESSION["cart"])):?>
        <?php foreach ($_SESSION["cart"] as $key1):?>
        <tr>
        <form method="POST">
        <td><?php echo $key1['name'] ?></td>
        <td><?php echo $key1['monprice'] ?></td>
        <td><?php echo $key1['annualprice'] ?></td>
        <td><?php echo $key1['webspace'] ?></td>
        <td><?php echo $key1['bandwidth'] ?></td>
        <td><?php echo $key1['domain'] ?></td>
        <td><?php echo $key1['language'] ?></td>
        <td><?php echo $key1['mailbox'] ?></td>
        <td><input type="submit" onClick="javascript: return confirm('Please confirm deletion');" class="btn btn-primary" name="delete" value="Delete"/></td>
        </form>
        </tr>

        <?php endforeach; ?> 
        <?php endif;?>
        </tbody>
        </table>

    </div>
  </div>
</div>
</div>
</script>

<?php require 'footer.php'?>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" media="all"/>
<script>
$(function(){
$("#dtBasicExample").dataTable();
$(".proid").hide();
$(".input,.inputb").hide();
$(".edit").click(function(){
$(".input,.inputb").show();
$(".editinput").hide();
});
});
</script>
<?php require 'footer.php';?>


