<?php require 'header.php';?>
<?php require 'class/User.php';?>
<?php
$con = new Dbcon();
$con->connect('localhost', 'root', '', 'cedhost');
$msg = '';
$error = array();
if (isset($_POST["submit"])) {
	$name = $_POST['name'];
    $mobile = $_POST['mobile'];
	$email = $_POST['email'];
	
	$password = $_POST['password'];
	$repassword = $_POST['confirmpass'];
	$question=$_POST['question'];
	$answer=$_POST['answer'];
	$emailkey=bin2hex(random_bytes(15));
	if($password!=$repassword){
		echo'<script>alert("password not matched")</script>';
		echo'<script>window.location.href = "account.php";</script>';
		return;
	}
    $ride=$con->select();
    if(isset($ride)){
         foreach ($ride as $row) {

                    if($row['email']==$email){
						echo'<script>alert("Email Already Exist")</script>';
						echo'<script>window.location.href = "account.php";</script>';
						return;
                    }
                    
				}
			}
      
    // if(!empty($mobile)){
    //     if(preg_match('/^[0-9]{10}+$/', $mobile) && preg_match('/[a-z\s]/i',$name)){
    //         $mobile=$mobile;
    //         $name=$name;
    //     }
    //     else{
    //     echo'<script>alert("please enter valid Data")</script>';
    //     header("Refresh:0; url=singup.php");
    //     return;
    //     }
   

       
    if (sizeof($error) == 0) 
    {
        $fields = array('name', 'mobile','email','emailkey','security_question', 'security_answer','password');
        $values = array($name, $mobile, $email,$emailkey, $question,$answer,$password);

        $res = $con->insert($fields, $values, 'tbl_user');

        if ($res) 
        {
			// include 'email.php';
			$_SESSION["verify"]=array('mail' => $email,'emailkey'=>$emailkey,'mobile'=>$mobile);
			echo'<script>window.location.href = "verify.php";</script>';
        }
    }
}
?>
<!---login--->
<div class="content">
	<!-- registration -->
	<div class="main-1">
		<div class="container">
			<div class="register">
		  	  <form method="POST"> 
				 <div class="register-top-grid">
					<h3>personal information</h3>
					 <div>
						<span>Name<label>*</label></span>
						<input type="text" name="name" id="name" pattern="^([A-Za-z]+ )+[A-Za-z]+$|^[A-Za-z]+$"  required> 
					 </div>
					 <div>
						<span>Mobile<label>*</label></span>
						<input type="text"  name="mobile" pattern=^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[789]\d{9}$ required> 
					 </div>
					 <div>
						 <span>Email Address<label>*</label></span>
						 <input type="email"  name="email"  pattern="^(?!.*\.{2})[a-zA-Z0-9.]+@[a-zA-Z]+(?:\.[a-zA-Z]+)*$" required> 
					 </div>
					 <div>
						 <span>Security Question<label>*</label></span>
						 <select id="que" name="question" required>
							 <option>What was your childhood nickname?</option>
							 <option>What is the name of your favourite childhood friend?</option>
							 <option>What was your favourite place to visit as a child?</option>
							 <option>What is your favourite teacher's nickname?</option>
						 </select>
						 <span>Security Answers<label>*</label></span>
						 <input type="text"  name="answer" pattern="^([A-Za-z0-9]+ )+[A-Za-z0-9]+$|^[A-Za-z0-9]+$" required> 
					 </div>
					 <div class="clearfix"> </div>
					   <a class="news-letter" href="#">
						 <!-- <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>Sign Up for Newsletter</label> -->
					   </a>
					 </div>
				     <div class="register-bottom-grid">
						    <h3>login information</h3>
							 <div>
								<span>Password<label>*</label></span>
								<input type="password" class="password"  name="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,10}$"  required>
							 </div>
							 <div>
								<span>Confirm Password<label>*</label></span>
								<input type="password"  name="confirmpass" required>
							 </div>
					 </div>
				<div class="clearfix"> </div>
				<div class="register-but">
					   <input type="submit" value="submit" name="submit">
					   <div class="clearfix"> </div>
				   </form>
				</div>
		   </div>
		 </div>
	</div>
<!-- registration -->

			</div>
<!-- login -->
<script>

// $(".password").keyup(function() {
//         $(this).val($(this).val().replace(/\s/g, ""));
//     });
</script>
<?php require 'footer.php';?>

"[a-zA-Z-]+[a-zA-Z0-9\s]*"


