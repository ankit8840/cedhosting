<?php
   session_start();
   
    //include "dbc.php";
    //include "Dbcon.php";
    $error= array();
    $msg="";
            // $_SESSION['mobile']=$_POST['number'];
            // $number= $_POST['number'];
            $number=$_SESSION['verify']['mobile'];
            $otp = rand(100000, 999999);
            $_SESSION['session_otp'] = $otp;
            $message = rawurlencode("Your One Time Password is ".$otp);
            $fields = array(
                "sender_id" => "FSTSMS",
                "message" => ".$message.",
                "language" => "english",
                "route" => "p",
                "numbers" => "$number",
                "flash" => "1"
            );

            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($fields),
            CURLOPT_HTTPHEADER => array(
                "authorization: NebE89AqQL4lyuHJDYsrXFxjnKSogtZ6aOBPTCMGphV0f2zcRv0qywxetYmILJ4ZSNozji32vusXKCfc",
                "accept: */*",
                "cache-control: no-cache",
                "content-type: application/json"
            ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
           
            } else {
                echo'<script>window.location.href = "verify.php";</script>';
            } 
            
    // if(isset($_POST['verify'])){
    //     $number= $_POST['otp'];
    //     if($_SESSION['session_otp']==$number){
           
    //         header('Location:signup.php');
    //     }
    //     else{
    //         echo "<script type='text/javascript'>alert('OTP Dosen't Match');</script>";
    //         unset( $_SESSION['mobile']);
    //     }
    // }
?>          