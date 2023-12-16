<?php

require_once("../model/database_driver.php");
require_once("../model/response_sender.php");
require_once("../model/fileSearch.php");
require_once("../model/RequestHandler.php");
require_once("../model/AdvancedSearchEngine.php");
require_once("../model/data_validator.php");
require_once("../model/SessionManager.php");
require_once("../model/passwordEncryptor.php");

// Create a response object
$responseObject = new stdClass();
$responseObject->status = 'failed';

// Set the response status to success


// Check if the request is a POST method
if (!RequestHandler::isPostMethod()) {
     $responseObject->error = "Invalid request";
     response_sender::sendJson($responseObject);
}

// Check if the user is logged in
$userCheckSession = new SessionManager();


// Get user data
$userData = $userCheckSession->getUserData();



// Check if 'productData' is set in the POST request
if (!isset($_POST['productData'])) {
     $responseObject->error = "Empty JSON data";
     response_sender::sendJson($responseObject);
}

// Decode the 'productData' JSON
$productData = json_decode($_POST['productData']);
$productId = $productData->parts_id;
$start_date = $productData->start_date;
$end_date = $productData->end_date;
$discount = $productData->discount;
$userId = $userData['user_id'];

$database_driver = new database_driver();

// Select query to check if the promotion already exists
$selectQuery = "SELECT * FROM `product_promotion` WHERE `vehicle_parts_parts_id` = ?";
$searchResult = $database_driver->execute_query($selectQuery, 's', array($productId));




// Check if the promotion already exists
if ($row = $searchResult['result']->fetch_assoc()) {
     $responseObject->error = "Promotion already added";
     response_sender::sendJson($responseObject);
}

// Assuming $start_date, $end_date, $productId, $discount, and $userId contain the respective values needed for insertion.

$insertQuery = "INSERT INTO `product_promotion`(`start_date`, `end_date`, `product_promotion_status_p_promotion_status_id`, `vehicle_parts_parts_id`, `discount`, `user_user_id`) VALUES ('$start_date', '$end_date', 1, '$productId', '$discount', '$userId')";

$result = $database_driver->query($insertQuery);



// Select query to check if the promotion already exists
$selectQuery = "SELECT * FROM `product_promotion` WHERE `vehicle_parts_parts_id` = '" . $productId . "'";
$searchResult = $database_driver->query($selectQuery);
$row = $searchResult->fetch_assoc();



// Check if an image file was uploaded
if (!empty($_FILES['category_image']['name'])) {
     $allowImageExtension = ['png', 'jpg', 'jpeg', 'svg'];
     $fileExtension = strtolower(pathinfo($_FILES['category_image']['name'], PATHINFO_EXTENSION));
 
     if (in_array($fileExtension, $allowImageExtension)) {
         $savePath = "../../resources/image/promotionImages/";
         $newImageName = $productId . "." . $fileExtension;
 
         if (!move_uploaded_file($_FILES['category_image']['tmp_name'], $savePath . $newImageName)) {
             $responseObject->error = 'Failed to save the image';
             response_sender::sendJson($responseObject);
         }
     } else {
         $responseObject->error = 'Invalid file type';
         response_sender::sendJson($responseObject);
     }
 } else {
     $responseObject->error = 'No image uploaded';
     response_sender::sendJson($responseObject);
 }

// Set the response status to success
$responseObject->status = "success";
response_sender::sendJson($responseObject);
