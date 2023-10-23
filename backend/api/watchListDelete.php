<?php
// Include necessary files for database connection and response handling
require_once("../../backend/model/database_driver.php");
require_once("../../backend/model/response_sender.php");
require_once("../../backend/model/fileSearch.php");
require_once("../../backend/model/RequestHandler.php");
require_once("../../backend/model/SessionManager.php");

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
$watchListData = json_decode($_POST['watchListData']);
$w_id=$watchListData->w_id;



$database_driver=new database_driver();

$deleteQuery="DELETE  FROM `watchlist` WHERE `w_id`=?";
$result=$database_driver->execute_query($deleteQuery,'i',array($w_id));

if (!$result['stmt']->affected_rows > 0) {
    $responseObject->error = "Data delet failed. " . $database->connection->error;
    response_sender::sendJson($responseObject);
}


$responseObject->status="sucess";
response_sender::sendJson($responseObject);