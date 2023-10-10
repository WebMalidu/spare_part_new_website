<?php
require("../model/database_driver.php");
require("../model/data_validator.php");
require("../model/passwordEncryptor.php");
require("../model/response_sender.php");
require("../model/user_access_updater.php");
require("../model/mail/MailSender.php");




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


$login_link =  $_SERVER['HTTP_HOST'] . "/Algowrite/spare_part_new_website/backend/api/userVerification.php?email={$email}&password={$password}&first_name={$first_name}";
$body = '<p>Click below to verify </p> <br> http://' . $login_link;


// kaviska 
$mailSender = new MailSender($decrypt_email);
$mailSender->mailInitiate("Sign UP Link - Design Lab", "Click on the following link to verify", $body);
$mailStatus =  $mailSender->sendMail();


if ($mailStatus == "success") {
    $responseObject->status = "success";
} else {
    $responseObject->error = $mailStatus;
}

response_sender::sendJson($responseObject);
