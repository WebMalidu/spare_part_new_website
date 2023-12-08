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
$userId=$adminData->userId;


$database_driver=new database_driver();

// Directory to search in
$directory = '../../resources/image/userImages/';

// Name of the file you're looking for

// File extensions to search for (you can specify multiple extensions in an array)
$fileExtensions = ['png', 'jpeg', 'jpg', 'svg'];

$updateQuery = "UPDATE `user` SET `user_type_user_type_id` = ? WHERE `user_id` = ?";
$parms = [3, $userId];
$result = $database_driver->execute_query($updateQuery, 'ii', $parms);

// Initialize an array to store all rows and image URLs
$rows = [];
$imageUrls = [];



// Set the 'status' property of the response object to the 'rows' array
$responseObject->status = "success";
$responseObject->data = $rows;
$responseObject->imageUrls = $imageUrls;

// Send the JSON response using the 'response_sender' class
response_sender::sendJson($responseObject);