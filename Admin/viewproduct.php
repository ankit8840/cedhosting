<?php require 'header.php'?>
<?php require '../class/Dbcon.php';?>
<?php require '../class/product.php';
$con = new product();
$con->connect('localhost', 'root', '', 'cedhost');
$products=$con->viewproduct();
foreach($products as $key){
  $features=$key['features'];
  $features=json_decode($features);
  foreach($features as $key1)
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
      <td><?php echo $name ?></td>
      <td><input type=text class="input" value="<?php echo $key['prod_name'] ?>" name="subcat"><span class="editinput"><?php echo $key['prod_name'] ?></span></td>
      <td><input type=text class="input" value="<?php echo $key['link'] ?>" name="link"><span class="editinput"><?php echo $key['link'] ?></span></td>

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
      <td><input type=text class="input" value="<?php echo $key['link'] ?>" name="link"><span class="editinput">Description</span></td>
      <td><input type=text class="input" value="<?php echo $key['link'] ?>" name="link"><span class="editinput">Monthly price</span></td>
      <td><input type=text class="input" value="<?php echo $key['link'] ?>" name="link"><span class="editinput">Annual price</span></td>
      <td><input type=text class="input" value="<?php echo $key['link'] ?>" name="link"><span class="editinput">Web space</span></td>
      <td><input type=text class="input" value="<?php echo $key['link'] ?>" name="link"><span class="editinput">Bandwidth</span></td>
      <td><input type=text class="input" value="<?php echo $key['link'] ?>" name="link"><span class="editinput">Free Domian</span></td>
      <td><input type=text class="input" value="<?php echo $key['link'] ?>" name="link"><span class="editinput">Language</span></td>
      <td><input type=text class="input" value="<?php echo $key['link'] ?>" name="link"><span class="editinput">Mail Box</span></td>
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