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

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    $responseObject->error = "ivalid mehod";
    response_sender::sendJson($responseObject);
}
if (!isset($_POST['mData'])) {
    $responseObject->error = "empty json";
    response_sender::sendJson($responseObject);
}

$signUpData = json_decode($_POST['mData']);
$email = base64_encode($signUpData->email_address);
$name = base64_encode($signUpData->name);
$address = base64_encode($signUpData->address);
$business_name = base64_encode($signUpData->business_name);
$br_number = base64_encode($signUpData->br_number); // Encoding the br_number field
$business_address = base64_encode($signUpData->business_address);
$business_contact = base64_encode($signUpData->business_contact);
$private_contact = base64_encode($signUpData->private_contact);
$password = base64_encode($signUpData->password);

// Constructing the URL
$login_link =  $_SERVER['HTTP_HOST'] . "/backend/api/adminVerification.php?email={$email}&password={$password}&name={$name}&address={$address}&business_name={$business_name}
&br_number={$br_number}&business_address={$business_address}&business_contact={$business_contact}&private_contact={$private_contact}";

$body = '<p>Click below to verify </p> <br> http://' . $login_link;


// kaviska 
$mailSender = new MailSender($signUpData->email_address);
$mailSender->mailInitiate("Verification - batta.lk", "Click on the following link to verify", $body);
$mailStatus =  $mailSender->sendMail();


if ($mailStatus == "success") {
    $responseObject->status = "success";
} else {
    $responseObject->error = $mailStatus;
}

response_sender::sendJson($responseObject);
