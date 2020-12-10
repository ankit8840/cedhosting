<?php require 'header.php';?>

<?php
require 'class/User.php';
$mess='Your Registration is sucessfull please verify your Account';
if(!empty($_SESSION['verify'])){
  $mail=$_SESSION['verify']['mail'];
  $mobile=$_SESSION['verify']['mobile'];
}
if(!empty($_SESSION['aftermail'])){
  $mail=$_SESSION['verify']['mail'];
  $mobile=$_SESSION['verify']['mobile'];
  $mess="Mail Has been Send in your Account ". $mail ." Please go and verify Your Account";
}
?>
<div class="container">
    <h1><?php echo $mess ?></h1>
    <div class="register-but">
    <div>
    <h2 style="margin-left:10px;"><?php echo $mail ?></h2><a href="email.php">Email</a>
    </div>
    <div>
    <h2 style="margin-left:10px;"><?php echo $mobile ?></h2><a href="#">Mobile</a>
    </div>	   
	</div>
   
</div>
<?php require 'footer.php';?>