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



$database_driver = new database_driver();

$selectQuery = "SELECT *
               FROM watchlist wl
               JOIN vehicle_parts vp ON wl.vehicle_parts_parts_id = vp.parts_id
               JOIN parts_origin po ON vp.parts_origin_origin_id=po.origin_id
               JOIN category_item ci ON vp.category_item_category_item_id=ci.category_item_id
               JOIN parts_status ps ON vp.parts_status_parts_status_id=ps.parts_status_id
               JOIN brand br ON vp.brand_brand_id=br.brand_id
               JOIN user ur ON vp.user_user_id=ur.user_id
               WHERE wl.user_user_id = '" . $userData['user_id'] . "'";
$result = $database_driver->query($selectQuery);

$rows = [];
while ($row = $result->fetch_assoc()) {
    array_push($rows, $row);
}
$responseObject->status = "success";
$responseObject->data = $rows;
response_sender::sendJson($responseObject);
