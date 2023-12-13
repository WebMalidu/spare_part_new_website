<?php


require_once("../model/database_driver.php");
require_once("../model/response_sender.php");
require_once("../model/fileSearch.php");
require_once("../model/RequestHandler.php");
require_once("../model/AdvancedSearchEngine.php");
require_once("../model/data_validator.php");
require_once("../model/SessionManager.php");
require_once("../model/passwordEncryptor.php");



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

// Check if the user is logged in and user data is available
if (!$userCheckSession->isLoggedIn() || !$userCheckSession->getUserData()) {
    $responseObject->error = 'Please Login';
    response_sender::sendJson($responseObject);
}

// Get user data
$userData = $userCheckSession->getUserData();


// Decode the POST data to get the promotion ID
$checkOutData = json_decode($_POST['checkOutData']);
$total=$checkOutData->total;



$database_driver=new database_driver();

$selectQuery = "SELECT *
               FROM `user`              
               WHERE `user_id` = ?";
$resultMain=$database_driver->execute_query($selectQuery,'i',array($userData['user_id']));



$rowMain = $resultMain['result']->fetch_assoc();

$selectQuery = "SELECT *
               FROM `shipping_details`              
               WHERE `user_user_id` = ?";
$resultCore=$database_driver->execute_query($selectQuery,'i',array($userData['user_id']));

$rowCore = $resultCore['result']->fetch_assoc();


$fullName = isset($rowMain['full_name']) ? $rowMain['full_name'] : '';
$email = isset($rowMain['email']) ? $rowMain['email'] : '';
$contact = isset($rowCore['mobile']) ? $rowCore['mobile'] : '';
$studentId = isset($rowMain['user_id']) ? $rowMain['user_id'] : '';


$responseObject->status="success";
$responseObject->data=$studentId;
response_sender::sendJson($responseObject);