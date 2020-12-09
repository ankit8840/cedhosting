<?php require 'header.php';?>
<?php require 'config.php';?>
<?php
$mess='Your Registration is sucessfull please verify your Account';
if(!empty($_SESSION['aftermail'])){
  $mail=$_SESSION['verify']['mail'];
  $mess="Mail Has been Send in your Account ". $mail ." Please go and verify Your Account";
}
?>
<div class="container">
    <h1><?php echo $mess ?></h1>
    <div class="register-but">
    <a href="#">Mobile</a>
    <a href="email.php">Email</a>			   
	</div>
   
</div>
<?php require 'footer.php';?>