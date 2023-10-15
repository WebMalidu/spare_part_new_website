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

// Check if the user is an admin
if ($userData['user_type_user_type_id'] != 2) {
     $responseObject->error = "You are not an admin";
     response_sender::sendJson($responseObject);
}

$database_driver = new database_driver();

$selectQuery = "SELECT pp.*, vp.* 
               FROM `product_promotion` pp
               JOIN `vehicle_parts` vp ON pp.vehicle_parts_parts_id = vp.parts_id
               WHERE pp.`user_user_id` = ?";

// Execute the SQL query and bind user ID as a parameter
$searchResult = $database_driver->execute_query($selectQuery, 'i', array($userData['user_id']));

// Initialize an array to store all rows
$rows = [];

// Fetch all rows from the result and store them in the 'rows' array
while ($row = $searchResult['result']->fetch_assoc()) {
    $rows[] = $row;
}

// Set the 'status' property of the response object to the 'rows' array
$responseObject->data = $rows;

// Send the JSON response using the 'response_sender' class
response_sender::sendJson($responseObject);
