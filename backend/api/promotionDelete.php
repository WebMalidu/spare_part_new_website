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



// Get user data
$userData = $userCheckSession->getUserData();


// Decode the POST data to get the promotion ID
$promoData = json_decode($_POST['promoData']);
$promotion_id=$promoData->promotion_id;



$database_driver=new database_driver();

$deleteQuery="DELETE  FROM `product_promotion` WHERE promotion_id='" . $promotion_id . "'";
$result=$database_driver->query($deleteQuery);




$responseObject->status="success";
response_sender::sendJson($responseObject);