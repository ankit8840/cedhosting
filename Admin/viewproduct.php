<?php require 'header.php'?>
<?php require '../class/Dbcon.php';?>
<?php require '../class/product.php';
$con = new product();
$con->connect('localhost', 'root', '', 'cedhost');
$products=$con->viewproduct();
if(isset($_POST['edit'])){
  $categoryid=$_POST['prod_id'];
  $productname=$_POST['prodname'];
  $URL=$_POST['link'];
  $proava=$_POST['proava'];
  $description=$_POST['description'];
  $monthlyprice=$_POST['monthlyprice'];
  $annualprice=$_POST['annualprice'];
  $sku=$_POST['sku'];
  $webspace=$_POST['webspace'];
  $bandwidth=$_POST['bandwidth'];
  $domain=$_POST['domain'];
  $language=$_POST['language'];
  $mailbox=$_POST['mailbox'];
  $features = array("webspace"=>$webspace, "bandwidth"=>$bandwidth, "domain"=>$domain,"language"=>$language,"mailbox"=>$mailbox);
  $features= json_encode($features);
  // $fields = array('prod_parent_id', 'prod_name','link');
  $con->updateproduct($categoryid, $productname,$URL,$proava,$description,$monthlyprice,$annualprice,$sku,$features);
  echo '<script>alert("Product Updated Sucessfully")</script>';
  echo "<script> window.location.href ='viewproduct.php'</script>";
}
if(isset($_POST['delete'])){
  $categoryid=$_POST['prod_id'];
  $con->deleteproduct($categoryid);
  echo '<script>alert("Product Updated Sucessfully")</script>';
  echo "<script> window.location.href ='viewproduct.php'</script>";
}
?>

<div class="row">
        <div class="col">
          <div class="card bg-white shadow">
            <div class="card-header bg-transparent border-0">
              <h3 class="text-white mb-0">All Products</h3>
            </div>
            <div class="table-responsive">
            <table id="dtBasicExample" class="table p-4" width="100%">
  <thead>
  <button type="sumbit" class="btn btn-primary my-4 float-right edit" name="submit">Edit</button>
    <tr>
      <th class="th-sm proid">Catid
      </th>
      <th class="th-sm">Category
      </th>
      <th class="th-sm">Sub Category
      </th>
      <th class="th-sm">Link
      </th>
      <th class="th-sm">prod_available
      </th>
      <th class="th-sm">Launch Date
      </th>
      <th class="th-sm">Description
      </th>
      <th class="th-sm">Monthly price
      </th>
      <th class="th-sm">Annual price
      </th>
      <th class="th-sm">Sku
      </th>
      <th class="th-sm">Web space
      </th>
      <th class="th-sm">Bandwidth
      </th>
      <th class="th-sm">Free Domian
      </th>
      <th class="th-sm">Language
      </th>
      <th class="th-sm">Mail Box
      </th>
      <th class="th-sm inputb">Action
      </th>
      <th class="th-sm inputb">Action
      </th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($products as $key):?>
    <tr>
    <form method="POST">
      <td class="proid"><input type=text class="input" value="<?php echo $key['id'] ?>" name="prod_id" hidden></td>
      <td>Hosting</td>
      <td><input type=text class="input" value="<?php echo $key['prod_name'] ?>" name="prodname"><span class="editinput"><?php echo $key['prod_name'] ?></span></td>
      <td><input type=text class="input" value="<?php echo $key['html'] ?>" name="link"><span class="editinput"><?php echo $key['html'] ?></span></td>

      <?php if($key['prod_available']==1){
                $avalb="Yes";
            }
                else{
                $avalb="No";
                }
                ?>
            <td><select id="cars" class="input" name="proava" value="<?php echo $avalb ?>">
                <option><?php echo $avalb ?></option>
                <option value="Yes">Yes</option>
                <option value="No">No</option></select><span class="editinput"><?php echo $avalb ?></span></td>
      <td><?php echo $key['prod_launch_date'] ?></td>
      <td><input type=text class="input" value="<?php echo $key['description'] ?>" name="description"><span class="editinput"><?php echo $key['description'] ?></span></td>
      <td><input type=text class="input" value="<?php echo $key['mon_price'] ?>" name="monthlyprice"><span class="editinput"><?php echo "₹". $key['mon_price'] ?></span></td>
      <td><input type=text class="input" value="<?php echo $key['annual_price'] ?>" name="annualprice"><span class="editinput"><?php echo "₹". $key['annual_price'] ?></span></td>
      <td><input type=text class="input" value="<?php echo $key['sku'] ?>" name="sku"><span class="editinput"><?php echo $key['sku'] ?></span></td>
      <?php 
        $coded=json_decode($key['features']);
        $webspace=$coded->webspace;
        $bandwidth=$coded->bandwidth;
        $domain=$coded->domain;
        $language=$coded->language;
        $mailbox=$coded->mailbox;
      ?>
      <td><input type=text class="input" value="<?php echo $webspace ?>" name="webspace"><span class="editinput"><?php echo $webspace ?></span></td>
      <td><input type=text class="input" value="<?php echo $bandwidth ?>" name="bandwidth"><span class="editinput"><?php echo $bandwidth ?></span></td>
      <td><input type=text class="input" value="<?php echo $domain ?>" name="domain"><span class="editinput"><?php echo $domain ?></span></td>
      <td><input type=text class="input" value="<?php echo $language ?>" name="language"><span class="editinput"><?php echo $language ?></span></td>
      <td><input type=text class="input" value="<?php echo $mailbox ?>" name="mailbox"><span class="editinput"><?php echo $mailbox ?></span></td>
      <td><input type="submit"  class="btn btn-primary inputb" name="edit" value="Edit"/></td>
      <td><input type="submit" onClick="javascript: return confirm('Please confirm deletion');" class="btn btn-primary inputb" name="delete" value="Delete"/></td>
      </form>
    </tr>
    
  <?php endforeach; ?> 
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