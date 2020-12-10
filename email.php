<?php
/**
 * Php version 7.2.10
 * 
 * @category Components
 * @package  Packagename
 * @author   Sumit kumar Pandey <pandeysumit399@gmail.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://localhost/training/php%20mysql%20task1/register/signup.php
 */
session_start();
$mail=$_SESSION['verify']['mail'];
$key=$_SESSION['verify']['emailkey'];
$mobile=$_SESSION['verify']['mobile'];
require "vendor/autoload.php";

$robo = 'ankitdixit11111996@gmail.com';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


$developmentMode = true;
$mailer = new PHPMailer($developmentMode);

try {
    $mailer->SMTPDebug = 2;
    $mailer->isSMTP();

    if ($developmentMode) {
        $mailer->SMTPOptions = [
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            ]
        ];
    }

    $mailer->Host = 'ssl://smtp.gmail.com';
    $mailer->SMTPAuth = true;
    $mailer->Username = 'ankitdixit11111996@gmail.com';
    $mailer->Password = '';
    $mailer->SMTPSecure = 'ssl';
    $mailer->Port = 465;

    $mailer->setfrom('ankitdixit11111996@gmail.com', 'Name of sender');
    $mailer->addAddress($mail, 'Name of recipient');

    $mailer->isHTML(true);
    $mailer->Subject = 'PHPMailer Test';
    $mailer->Body =  '<p>please verify<a href="http://localhost/cedhosting/login.php?emailkey='.$key.'">clickhere</a></p>';

    $mailer->send();
    $mailer->ClearAllRecipients();
    echo "MAIL HAS BEEN SENT SUCCESSFULLY";
} catch (Exception $e) {
    echo "EMAIL SENDING FAILED. INFO: " . $mailer->ErrorInfo;
}
$_SESSION["aftermail"]=array('mail' => $email,'emailkey'=>$emailkey,'mobile'=>$mobile);
echo'<script>window.location.href = "verify.php";</script>';