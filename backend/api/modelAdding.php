<?php

// Include necessary files
require_once("../../backend/model/database_driver.php");
require_once("../../backend/model/response_sender.php");
require_once("../../backend/model/fileSearch.php");
require_once("../../backend/model/RequestHandler.php");
require_once("../../backend/model/SessionManager.php");

// Create a response object
$responseObject = new stdClass();
$responseObject->status = 'failed';

// Check if the request is a POST method
if (!RequestHandler::isPostMethod()) {
     $responseObject->error = "Invalid request";
     response_sender::sendJson($responseObject);
}

// Check if the user is logged in
$userCheckSession = new SessionManager();
if (!$userCheckSession->isLoggedIn() || !$userCheckSession->getUserData()) {
     $responseObject->error = 'Please Login';
     response_sender::sendJson($responseObject);
}

// Get user data
$userData = $userCheckSession->getUserData();


$database_driver = new database_driver();

// Check if 'modelAddingData' is set in the POST request
if (!isset($_POST['modelAddingData'])) {
    $responseObject->error = "Empty JSON data";
    response_sender::sendJson($responseObject);
}

$modelAddingData=json_decode($_POST['modelAddingData']);

