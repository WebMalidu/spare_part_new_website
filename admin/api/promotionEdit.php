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

if(!isset($_POST['promotionEdit'])){
    $responseObject->error="empty json";
    response_sender::sendJson($responseObject);
}

// Decode the 'productData' JSON
$productData = json_decode($_POST['promotionEdit']);
$productId = $productData->parts_id;
$start_date = $productData->start_date;
$end_date = $productData->end_date;
$discount = $productData->discount;
$userId = $userData['user_id'];
$promotionId=$productData->promotionId;

$database_driver=new database_driver();





$updateQuery="UPDATE `product_promotion` SET `start_date`=?, `end_date`=?, `product_promotion_status_p_promotion_status_id`=?, `vehicle_parts_parts_id`=?, `discount`=?, `user_user_id`=? WHERE `promotion_id`=?";
$parms=[$start_date, $end_date, 1, $productId, $discount, $userId,$promotionId];
$result=$database_driver->execute_query($updateQuery,'ssiissi',$parms);

if (!$result['stmt']->affected_rows > 0) {
    $responseObject->error="data adding failed";
    response_sender::sendJson($responseObject);
} 
$responseObject->status="sucess";
response_sender::sendJson($responseObject);