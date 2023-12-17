<?php
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




$database_driver=new database_driver();




$selectQuery = "SELECT *
               FROM `invoice` ie
               JOIN `invoice_item` it ON ie.invoice_id = it.invoice_invoice_id
               JOIN `vehicle_parts` vp ON it.vh_parts_id=vp.parts_id
               JOIN `user` ur ON vp.user_user_id=ur.user_id
               JOIN `shipping_details` sd ON ie.user_user_id=sd.user_user_id
               
               WHERE ie.`invoice_status_invoice_status_id`=1";
$result=$database_driver->query($selectQuery);

// Initialize an array to store all rows and image URLs
$rows = [];

// Fetch all rows from the result and store them in the 'rows' array
while ($row = $result->fetch_assoc()) {
    $rows[] = $row;

  

  
}

// Set the 'status' property of the response object to the 'rows' array
$responseObject->status = "success";
$responseObject->data = $rows;

// Send the JSON response using the 'response_sender' class
response_sender::sendJson($responseObject);