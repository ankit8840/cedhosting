<?php require 'header.php';
require 'class/User.php';
$con = new User();
$con->connect('localhost', 'root', '', 'cedhost');

if(isset($_POST['submit'])){
  echo'<script>alert("submitted")</script>';
  $otp=$_SESSION['session_otp'];
  $otpnum=$_POST['otpnum'];
  if($otp==$otpnum){
    echo'<script>alert("Otpmatch")</script>';
    $mobile=$_SESSION['verify']['mobile'];
    $mobileverify=$con->mobileverify($mobile);
    echo'<script>window.location.href = "login.php";</script>';
  }
}
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
    <h1><?php echo "verify" ?></h1>
    <div class="register-but">
    <div>
    <h2 style="margin-left:10px;"><?php echo $mail ?></h2><a href="email.php">Email</a>
    </div>
    <div>
    <h2 style="margin-left:10px;"><?php echo $mobile ?></h2><a href="mobile.php">Mobile</a>
    </div>
    <form method="POST"> 
    <div id="otp">
    <h2>Enter Your One Time Password</h2>
    <input type="number" name="otpnum"><input type="submit" value="submit" name="submit">
    </div>
    </form>	   
	</div>
   
</div>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>


<?php require 'footer.php';?>