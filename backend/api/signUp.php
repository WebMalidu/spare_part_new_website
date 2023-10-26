<?php
require_once("../model/database_driver.php");
require_once("../model/response_sender.php");
require_once("../model/fileSearch.php");
require_once("../model/RequestHandler.php");
require_once("../model/data_validator.php");
require_once("../model/SessionManager.php");
require_once("../model/passwordEncryptor.php");
require_once("../model/mail/MailSender.php");
require_once("../model/mail/Exception.php");
require_once("../model/mail/OAuth.php");
require_once("../model/mail/PHPMailer.php");
require_once("../model/mail/POP3.php");
require_once("../model/mail/SMTP.php");











// Initialize the response object
$responseObject = new stdClass();
$responseObject->status = "faild";

if($_SERVER['REQUEST_METHOD']!='POST'){
    $responseObject->error="ivalid mehod";
    response_sender::sendJson($responseObject);
    

}
if(!isset($_POST['signUpData'])){
    $responseObject->error="empty json";
    response_sender::sendJson($responseObject);

}

$signUpData=json_decode($_POST['signUpData']);
$decrypt_email=$signUpData->email;
$decrypt_password=$signUpData->password;
$conform_password=$signUpData->cpassword;
$first_name=$signUpData->firstName;





$email = base64_encode($decrypt_email);
$password = base64_encode($decrypt_password);
$first_name = base64_encode($first_name);


$login_link =  $_SERVER['HTTP_HOST'] . "/backend/api/userVerification.php?email={$email}&password={$password}&first_name={$first_name}";
$body = '<p>Click below to verify </p> <br> http://' . $login_link;


// kaviska 
$mailSender = new MailSender($decrypt_email);
$mailSender->mailInitiate("Sign UP Link - batta.lk", "Click on the following link to verify", $body);
$mailStatus =  $mailSender->sendMail();


if ($mailStatus == "success") {
    $responseObject->status = "success";
} else {
    $responseObject->error = $mailStatus;
}

response_sender::sendJson($responseObject);
