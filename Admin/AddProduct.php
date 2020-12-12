<?php require 'header.php'?>
<?php require '../class/Dbcon.php';?>
<?php require '../class/product.php';?>

<?php
$con = new product();
$con->connect('localhost', 'root', '', 'cedhost');
$products=$con->subcategory();
if(isset($_POST['submit'])){
  $categoryid=$_POST['categoryid'];
  $productname=$_POST['productname'];
  $URL=$_POST['URL'];
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
  $con->Addproduct($categoryid, $productname,$URL,$description,$monthlyprice,$annualprice,$sku,$features);
  //  =$con->insert($fields, $values, 'tbl_product');
  // if($con==true){
    
  //   $last_id = $con->insert_id;
  //   echo '<script>alert("'.$last_id.'")</script>';
  //   $fields = array('prod_id', 'description','mon_price','annual_price','sku','features');
  //   $values = Addproduct($last_id, $description,$monthlyprice,$annualprice,$sku,$features);
  //   $res = $con->insert($fields, $values, 'tbl_product_description');
  
}
?>
<div class="col-xl-8 order-xl-1 ml-9">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-12">
                  <h1 class="mb-0">Create New Product</h1>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form method="POST">
                <div class="pl-lg-4">
                  <div class="row">
                        <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label" for="input-username">Select Product Category</label>
                            <select class="form-control" id="sel1" style=" -webkit-appearance: none;" name="categoryid">
                              <option selected>Choose...</option>
                                <?php foreach ($products as $key): ?>
                                    <option value="<?php echo $key['id'] ?>"><?php echo $key['prod_name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label" for="input-username"> Enter Product Name * </label>
                            <input type="text" id="input-username" class="form-control" name="productname" placeholder="Enter Product Name" value="">
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label" for="input-username">Page URL</label>
                            <input type="text" id="input-username" class="form-control" name="URL" placeholder="Page URL" value="">
                        </div>
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label" for="input-username">Select Product Category</label>
                            <input type="text" id="input-username" class="form-control" placeholder="Username" value="lucky.jesse">
                        </div>
                        </div>
                    </div> -->
                </div>
                <hr class="my-4" />
                <!-- Address -->
                <div class="card-header">
              <div class="row align-items-center">
                <div class="col-12">
                  <h2 class="mb-0">Product Description</h2>
                </div>
              </div>
            </div>
            <div class="card-body">
                <div class="pl-lg-4">
                <div class="row">
                        <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label" for="input-username">Description * </label>
                            <input type="text" id="input-username" class="form-control" name="description" placeholder="Description" value="">
                        </div>
                        </div>
                    </div>
                  <div class="row">
                        <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label" for="input-username">Enter Monthly Price * </label>
                            <input type="text" id="input-username" class="form-control" name="monthlyprice" placeholder="Enter Monthly Price" value="">
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label" for="input-username"> Enter Annual Price * </label>
                            <input type="text" id="input-username" class="form-control" name="annualprice" placeholder="Enter Annual Price" value="">
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label" for="input-username">SKU</label>
                            <input type="text" id="input-username" class="form-control" name="sku" placeholder="SKU" value="">
                        </div>
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label" for="input-username">Select Product Category</label>
                            <input type="text" id="input-username" class="form-control" placeholder="Username" value="lucky.jesse">
                        </div>
                        </div>
                    </div> -->
                </div>
                <hr class="my-4" />
                <div class="card-header">
              <div class="row align-items-center">
                <div class="col-12">
                  <h2 class="mb-0">Features </h2>
                </div>
              </div>
            </div>
                <div class="pl-lg-4">
                  <div class="row">
                        <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label" for="input-username"> Web Space(in GB) * </label>
                            <input type="text" id="input-username" class="form-control" name="webspace" placeholder="Web Space(in GB)" value="">
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label" for="input-username">  Bandwidth (in GB) *  </label>
                            <input type="text" id="input-username" class="form-control" name="bandwidth" placeholder=" Bandwidth (in GB) " value="">
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label" for="input-username">  Free Domain *  </label>
                            <input type="text" id="input-username" class="form-control" name="domain" placeholder="Free Domain" value="">
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label" for="input-username"> Language / Technology Support * </label>
                            <input type="text" id="input-username" class="form-control" name="language" placeholder="Language" value="">
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label" for="input-username">Mailbox</label>
                            <input type="text" id="input-username" class="form-control" name="mailbox" placeholder="Mailbox" value="">
                        </div>
                        </div>
                    </div>
                    <div class="text-center">
                    <button type="sumbit" class="btn btn-primary my-4" name="submit">ADD</button>
                    </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
<?php require 'footer.php'?>