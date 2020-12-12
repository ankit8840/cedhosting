<?php require 'header.php'?>
<?php require '../class/Dbcon.php';?>
<?php require '../class/product.php';?>
<?php
$con = new product();
$con->connect('localhost', 'root', '', 'cedhost');
$products=$con->category();
$category=$con->showcategory();
foreach($category as $key){
  $id=$key['prod_parent_id'];
}
$getcategoryname=$con->getname($id);
foreach($getcategoryname as $key){
  $name=$key['prod_name'];
}
if(isset($_POST['submit'])){
    $parentid=$_POST['id'];
    $subcat=$_POST['subcat'];
    $link=$_POST['link'];
    $fields = array('prod_parent_id', 'prod_name','link');
    $values = array($parentid, $subcat,$link);

    $res = $con->insert($fields, $values, 'tbl_product');
}
if(isset($_POST['edit'])){
  //echo '<script>alert("edit")</script>';
  $prodid=$_POST['prod_id'];
  //echo '<script>alert("'.$prodid.'")</script>';
  $subcat=$_POST['subcat'];
    $link=$_POST['link'];
    $proava=$_POST['proava'];
    $con->updatecategory($prodid,$subcat,$link,$proava);
    echo '<script>alert("category Updated Sucessfully")</script>';
     echo "<script> window.location.href ='createCategory.php'</script>";
}
if(isset($_POST['delete'])){
  $con->deletecategory($prodid);
  echo '<script>alert("category Deleted Sucessfully")</script>';
  echo "<script> window.location.href ='createCategory.php'</script>";
}

?>
<div class="container mt--8 pb-5">
      <div class="row justify-content-center" style="margin-top:180px;">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary border-0 mb-0">
            <!-- <div class="card-header bg-transparent pb-5">
              <div class="text-muted text-center mt-2 mb-3"><small>Sign in with</small></div>
              <div class="btn-wrapper text-center">
                <a href="#" class="btn btn-neutral btn-icon">
                  <span class="btn-inner--icon"><img src="../assets/img/icons/common/github.svg"></span>
                  <span class="btn-inner--text">Github</span>
                </a>
                <a href="#" class="btn btn-neutral btn-icon">
                  <span class="btn-inner--icon"><img src="../assets/img/icons/common/google.svg"></span>
                  <span class="btn-inner--text">Google</span>
                </a>
              </div>
            </div> -->
            <div class="card-body px-lg-5 py-lg-5">
              <!-- <div class="text-center text-muted mb-4">
                <small>Or sign in with credentials</small>
              </div> -->
              <form method="POST">
                  <h1 class="text-center mb-3">Create Category</h1>
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <!-- <div class="input-group-prepend">
                      <span class="input-group-text"></i></span>
                    </div> -->
                    
                            <div class="input-group input-group-merge input-group-alternative">
                                    <select class="form-control" id="sel1" style=" -webkit-appearance: none;" name="id">
                                    <option selected>Choose...</option>
                                    <?php foreach ($products as $key): ?>
                                       
                                        <option value="<?php echo $key['id'] ?>"><?php echo $key['prod_name'] ?></option>
                                    <?php endforeach; ?>
                                    </select>
                               
                            </div>
                    
                    <!-- <input class="form-control" placeholder="Category Name" type="email"> -->
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"></span>
                    </div>
                    <input class="form-control" placeholder="Sub Category" type="text" name="subcat">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"></span>
                    </div>
                    <input class="form-control" placeholder="Link" type="text" name="link">
                  </div>
                </div>
                <!-- <div class="custom-control custom-control-alternative custom-checkbox">
                  <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
                  <label class="custom-control-label" for=" customCheckLogin">
                    <span class="text-muted">Remember me</span>
                  </label>
                </div> -->
                <div class="text-center">
                  <button type="sumbit" class="btn btn-primary my-4" name="submit">Create</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <h2 class='mb-3 text-center'>All Category</h2>
    <button type="sumbit" class="btn btn-primary my-4 float-right edit" name="submit">Edit</button>

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
      <th class="th-sm inputb">Action
      </th>
      <th class="th-sm inputb">Action
      </th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($category as $key):?>
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
      <td><input type="submit"  class="btn btn-primary inputb" name="edit" value="Edit"/></td>
      <td><input type="submit" onClick="javascript: return confirm('Please confirm deletion');" class="btn btn-primary inputb" name="delete" value="Delete"/></td>
      </form>
    </tr>
    
  <?php endforeach; ?> 
  </tbody>
</table>

<script>

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





