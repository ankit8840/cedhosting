<?php require 'header.php';?>
<?php
require 'class/User.php';
$con = new User();
$con->connect('localhost', 'root', '', 'cedhost');
$msg = 'If you have an account with us, please log in.';
$error = array();
if(isset($_GET['emailkey'])){
	$emailkey=$_GET['emailkey'];
	$getemail=$con->emailverify($emailkey);
}
if (isset($_POST["submit"])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $login=$con->login($email,$password);
    
      
    if($login!="Login Failed"){
        if($_SESSION['userdata']['is_admin']==1){
		echo'<script>window.location.href = "Admin/index.php";</script>';
        }
        else{
		echo'<script>window.location.href = "index.php";</script>';
        }
    }
    else{
        echo '<script>alert("Enter valid username or password")</script>';
		echo'<script>window.location.href = "login.php";</script>';
    }
}
?>
			<div class="content">
				<div class="main-1">
					<div class="container">
						<div class="login-page">
							<div class="account_grid">
								<div class="col-md-6 login-left">
									 <h3>new customers</h3>
									 <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
									 <a class="acount-btn" href="account.php">Create an Account</a>
								</div>
								<div class="col-md-6 login-right">
									<h3>registered</h3>
									<p><?php echo $msg ?></p>
									<form method="POST">
									  <div>
										<span>Email Address<label>*</label></span>
										<input type="text" name="email"> 
									  </div>
									  <div>
										<span>Password<label>*</label></span>
										<input type="password" name="password"> 
									  </div>
									  <a class="forgot" href="#">Forgot Your Password?</a>
									  <input type="submit" value="Login" name="submit">
									</form>
									<div>
										
									</div>
								</div>	
								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
				</div>
			</div>
<!-- login -->
<?php require 'footer.php';?>