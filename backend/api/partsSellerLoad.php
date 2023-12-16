<?php

// Include necessary files
require_once("../model/database_driver.php");
require_once("../model/response_sender.php");
require_once("../model/fileSearch.php");
require_once("../model/RequestHandler.php");
require_once("../model/SessionManager.php");

// Create a response object
$responseObject = new stdClass();
$responseObject->status = 'failed';

// Check if the request is a POST method
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




$database_driver = new database_driver();

$selectQuery = "SELECT *
               FROM `vehicle_parts` pp
              
               WHERE pp.`user_user_id`=" . $userData['user_id'];


// Execute the SQL query and bind user ID as a parameter
$searchResult = $database_driver->query($selectQuery);






// Initialize an array to store all rows and image URLs
$rows = [];
$imageUrls = [];

// Fetch all rows from the result and store them in the 'rows' array
while ($row = $searchResult->fetch_assoc()) {
    $rows[] = $row;

   

    
}

// Set the 'status' property of the response object to the 'rows' array
$responseObject->status = "success";
$responseObject->data = $rows;

// Send the JSON response using the 'response_sender' class
response_sender::sendJson($responseObject);
