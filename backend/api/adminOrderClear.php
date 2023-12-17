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



// Get user data

$adminData=json_decode($_POST['adminData']);
$invoiceId=$adminData->invoiceId;


$database_driver=new database_driver();



$updateQuery = "UPDATE `invoice` SET `invoice_status_invoice_status_id` = 3 WHERE invoice_id = '" . $invoiceId . "'";
$parms = [3, $invoiceId];
$result = $database_driver->query($updateQuery);

// Initialize an array to store all rows and image URLs
$rows = [];
$imageUrls = [];



// Set the 'status' property of the response object to the 'rows' array
$responseObject->status = "success";


// Send the JSON response using the 'response_sender' class
response_sender::sendJson($responseObject);