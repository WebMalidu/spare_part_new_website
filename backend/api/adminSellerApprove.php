<?php
require_once("../../backend/model/database_driver.php");
require_once("../../backend/model/response_sender.php");
require_once("../../backend/model/fileSearch.php");
require_once("../../backend/model/RequestHandler.php");
require_once("../../backend/model/SessionManager.php");
require_once("../model/mail/MailSender.php");
require_once("../model/mail/Exception.php");
require_once("../model/mail/OAuth.php");
require_once("../model/mail/PHPMailer.php");
require_once("../model/mail/POP3.php");
require_once("../model/mail/SMTP.php");

// Create an object to store the response data
$responseObject = new stdClass();
$responseObject->status = 'failed';

// Check if the request method is POST
if (!RequestHandler::isPostMethod()) {
    $responseObject->error = "Invalid request";
    response_sender::sendJson($responseObject);
}

// Create an object to manage user sessions
$userCheckSession = new SessionManager();



// Get user data

$adminData=json_decode($_POST['adminData']);
$userId=$adminData->userId;


$database_driver=new database_driver();

// Directory to search in
$directory = '../../resources/image/userImages/';

// Name of the file you're looking for

// File extensions to search for (you can specify multiple extensions in an array)
$fileExtensions = ['png', 'jpeg', 'jpg', 'svg'];

$updateQuery = "UPDATE `user` SET `user_type_user_type_id` = 3 WHERE `user_id` = '" . $userId . "'";
$parms = [3, $userId];
$result = $database_driver->query($updateQuery);

// Initialize an array to store all rows and image URLs
$rows = [];
$imageUrls = [];



// Set the 'status' property of the response object to the 'rows' array
$login_link =  $_SERVER['HTTP_HOST'] . "/admin/index.php";
$body = '<p>This is your Login Link Please use your email and password to login </p> <br> http://' . $login_link;

$userData = $userCheckSession->getUserData();


// kaviska 
$mailSender = new MailSender($userData['email']);
$mailSender->mailInitiate("Sign UP Link - batta.lk", "Click on the following link to verify", $body);
$mailStatus =  $mailSender->sendMail();


if ($mailStatus == "success") {
    $responseObject->status = "success";
} else {
    $responseObject->error = $mailStatus;
}

// Send the JSON response using the 'response_sender' class
response_sender::sendJson($responseObject);