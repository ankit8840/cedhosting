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
              <form method="POST" id="demoForm">
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
                            <span id="eb1" class="error"></span>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label" for="input-username"> Enter Product Name * </label>
                            <input type="text" id="input1" class="form-control" name="productname" placeholder="Enter Product Name" value="">
                            <span id="eb2" class="error"></span>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- //<div class="col-lg-12"> -->
                        <!-- <div class="form-group">
                            <label class="form-control-label" for="input-username">Page URL</label>
                            <input type="text" id="input-username" class="form-control" name="URL" placeholder="Page URL" value="">
                            <span id="eb3" class="error"></span>
                        </div> -->
                            <div class="row justify-content-md-center">
                              <div class="col-md-12 col-lg-12">
                                <h1 class="h2 mb-4">Submit issue</h1>
                                <label>Describe the issue in detail</label>
                                <div class="form-group">
                                  <textarea id="editor"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                              </div>
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
                            <input type="text" id="input-username" class="form-control" name="description" placeholder="Description" value="" required>
                        </div>
                        </div>
                    </div>
                  <div class="row">
                        <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label" for="input-username">Enter Monthly Price * </label>
                            <input type="text" id="input3" class="form-control inputVal" name="monthlyprice" placeholder="Enter Monthly Price" maxlength="15" value="" required>
                            <span id="eb4" class="error"></span>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label" for="input-username"> Enter Annual Price * </label>
                            <input type="text" id="input4" class="form-control inputVal" name="annualprice" placeholder="Enter Annual Price" maxlength="15" value="" required>
                            <span id="eb5" class="error"></span>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label" for="input-username">SKU</label>
                            <input type="text" id="input5" class="form-control" name="sku" placeholder="SKU" value="" required>
                            <span id="eb6" class="error"></span>
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
                            <input type="text" id="input6" class="form-control inputVal" name="webspace" placeholder="Web Space(in GB)" value="" required>
                            <span id="eb7" class="error"></span>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label" for="input-username">  Bandwidth (in GB) *  </label>
                            <input type="text" id="input7" class="form-control inputVal" name="bandwidth" placeholder=" Bandwidth (in GB) " value="" required>
                            <span id="eb8" class="error"></span>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label" for="input-username">  Free Domain *  </label>
                            <input type="text" id="input8" class="form-control" name="domain" placeholder="Free Domain" value="" required>
                            <span id="eb9" class="error"></span>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label" for="input-username"> Language / Technology Support * </label>
                            <input type="text" id="input9" class="form-control" name="language" placeholder="Language" value="" required>
                            <span id="eb10" class="error"></span>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label" for="input-username">Mailbox</label>
                            <input type="text" id="input10" class="form-control" name="mailbox" placeholder="Mailbox" value="" required>
                            <span id="eb11" class="error"></span>
                        </div>
                        </div>
                    </div>
                    <div class="text-center">
                    <button type="sumbit" class="btn btn-primary my-4" id="submit" name="submit">ADD</button>
                    </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/es6-shim/0.35.3/es6-shim.min.js"></script>    
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script>
  tinymce.init({
    selector: 'textarea#editor',
    menubar: false
  });
</script>
<script>
  tinymce.init({
    selector: 'textarea#editor',
    skin: 'bootstrap',
    plugins: 'lists, link, image, media',
    toolbar: 'h1 h2 bold italic strikethrough blockquote bullist numlist backcolor | link image media | removeformat help',
    menubar: false
  });
</script>
<script>
$(document).ready(function() {
  var x=0;
  alert(x);

  $("#submit").prop('disabled', true);
  $('.inputVal').keyup(function(){
    var val = $(this).val();
    if(isNaN(val)){
    val = val.replace(/[^0-9\.]/g,'');
    if(val.split('.').length>2)
    val = val.replace(/\.+$/,"");
    }
    $(this).val(val);
    });
  $('#input1').blur(function(){
  var val = $(this).val();
  if(val==""){
    $('#eb2').html("*Required");
    $(this).focus();
    $(this).css("border", "2px solid red");
  }
  if(val){
    var pat = /^\d*?[a-zA-Z][a-zA-Z0-9\-]{1,}\d*$/i.test($("#input1").val());
    if(!pat){
      $('#eb2').html("*Required");
      $(this).focus();
      $(this).css("border", "2px solid red");
    }
    else {
      x=x+1;//1
      $(this).css("border", "2px solid green");
      $('#eb2').html("");
      if(x>=9){
 
      $("#submit").prop('disabled', false); 
      }
    }
  }
  });
$('#input3').blur(function(){
  var val = $(this).val();
  if(val==""){
    $('#eb4').html("*Required");
    $(this).focus();
    $(this).css("border", "2px solid red");
  }
  else {
    x=x+1;//2
    $(this).css("border", "2px solid green");
    $('#eb4').html("");
    if(x>=9){
 
    $("#submit").prop('disabled', false); 
    }
  }
});
$('#input4').blur(function(){
var val = $(this).val();
if(val==""){
$('#eb5').html("*Required");
$(this).focus();
$(this).css("border", "2px solid red");
}
else {
  x=x+1;//3
$(this).css("border", "2px solid green");
$('#eb5').html("");
if(x>=9){
 
 $("#submit").prop('disabled', false); 
 }
}
});

$('#input5').blur(function(){
var val = $(this).val();
if(val==""){
$('#eb6').html("*Required");
$(this).focus();
$(this).css("border", "2px solid red");
}
if(val){
var pat = /^\d?[a-zA-Z0-9#-]+?[a-zA-Z0-9][a-zA-Z0-9\-#]{1,}\d*$/i.test($("#input5").val());
if(!pat){
$('#eb6').html("Only #,- allowed. Must contain 2 non-special characters !!");
$(this).focus();
$(this).css("border", "2px solid red");
}
else {
  x=x+1;//4
$(this).css("border", "2px solid green");
$('#eb6').html("");
if(x>=9){
 
 $("#submit").prop('disabled', false); 
 }
}
}
});

$('#input6').blur(function(){
var val = $(this).val();
if(val==""){
$('#eb7').html("*Required");
$(this).focus();
$(this).css("border", "2px solid red");
}
else {
  x=x+1;//5
$(this).css("border", "2px solid green");
$('#eb7').html("");
if(x>=9){
 
 $("#submit").prop('disabled', false); 
 }
}
});

$('#input7').blur(function(){
var val = $(this).val();
if(val==""){
$('#eb8').html("*Required");
$(this).focus();
$(this).css("border", "2px solid red");
}
else {
  x=x+1;//6
$(this).css("border", "2px solid green");
$('#eb8').html("");
if(x>=9){
 
 $("#submit").prop('disabled', false); 
 }
}
});

$('#input8').blur(function(){
var val = $(this).val();
if(val==""){
$('#eb9').html("*Required");
$(this).focus();
$(this).css("border", "2px solid red");
}
if(val){
var pat = /(^[0-9]*$)|(^[A-Za-z]+$)/i.test($("#input8").val());
if(!pat){
$('#eb9').html("Only alphabetic/numeric values allowed.");
$(this).focus();
$(this).css("border", "2px solid red");
}
else {
  x=x+1;//7
$(this).css("border", "2px solid green");
$('#eb9').html("");
if(x>=9){
 alert(x);
 $("#submit").prop('disabled', false); 
 }
}
}
});

$('#input9').blur(function(){
var val = $(this).val();
if(val==""){
$('#eb10').html("*Required");
$(this).focus();
$(this).css("border", "2px solid red");
}
if(val){
var pat = /^[a-zA-Z0-9]*[a-zA-Z]+[0-9]*(,?([a-zA-Z0-9]*[a-zA-Z]+[0-9]*)+)*$/i.test($("#input9").val());
if(!pat){
$('#eb10').html("Only alphabetic/numeric values allowed.");
$(this).focus();
$(this).css("border", "2px solid red");
}
else {
  x=x+1;//8
$(this).css("border", "2px solid green");
$('#eb10').html("");
if(x>=9){
 
 $("#submit").prop('disabled', false); 
 }
}
}
});

$('#input10').blur(function(){
var val = $(this).val();
if(val==""){
$('#eb11').html("*Required");
$(this).focus();
$(this).css("border", "2px solid red");
}
if(val){
var pat = /(^[0-9]*$)|(^[A-Za-z]+$)/i.test($("#input10").val());
if(!pat){
$('#eb11').html("Only alphabetic/numeric values allowed.");
$(this).focus();
$(this).css("border", "2px solid red");
}
else {
  x=x+1;//9
$(this).css("border", "2px solid green");
$('#eb11').html("");
if(x>=9){
 
 $("#submit").prop('disabled', false); 
 }
}
}
});

});
</script>
<?php require 'footer.php'?>