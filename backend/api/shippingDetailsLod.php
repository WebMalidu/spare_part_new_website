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






$database_driver=new database_driver();

$selectQuery = "SELECT *
               FROM `shipping_details` sd
               JOIN `district` dt ON sd.district_district_id=dt.district_id
               JOIN `province` pt ON sd.province_province_id=pt.province_id

              
               WHERE sd.`user_user_id` = ?";
$result=$database_driver->execute_query($selectQuery,'i',array($userData['user_id']));

$rows=[];
while ($row = $result['result']->fetch_assoc()) {
    $rows[]=$row;
}
$responseObject->status="success";
$responseObject->data=$rows;
response_sender::sendJson($responseObject);