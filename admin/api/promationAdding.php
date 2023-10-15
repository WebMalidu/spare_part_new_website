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
$searchResult = $database_driver->execute_query($selectQuery, 'i', array($productId));

// Check if the promotion already exists
if ($row = $searchResult['result']->fetch_assoc()) {
     $responseObject->error = "Promotion already added";
     response_sender::sendJson($responseObject);
}

// Insert the new promotion data
$insertQuery = "INSERT INTO `product_promotion`(`start_date`, `end_date`, `product_promotion_status_p_promotion_status_id`, `vehicle_parts_parts_id`, `discount`, `user_user_id`) VALUES (?,?,?,?,?,?)";
$parms = [$start_date, $end_date, 1, $productId, $discount, $userId];

$result = $database_driver->execute_query($insertQuery, 'ssiiss', $parms);

// Check if data insertion failed
if (!$result['stmt']->affected_rows > 0) {
     $responseObject->error = "Data adding failed. " . $database->connection->error;
     response_sender::sendJson($responseObject);
}

// Select query to check if the promotion already exists
$selectQuery = "SELECT * FROM `product_promotion` WHERE `vehicle_parts_parts_id` = ?";
$searchResult = $database_driver->execute_query($selectQuery, 'i', array($productId));
$row = $searchResult['result']->fetch_assoc();

// Check if an image file was uploaded
if ($_FILES['category_image']['error'] === 0) {
     $allowImageExtension = ['png', 'jpg', 'jpeg', 'svg'];
     $fileExtension = strtolower(pathinfo($_FILES['category_image']['name'], PATHINFO_EXTENSION));

     // Check if the file extension is valid
     if (in_array($fileExtension, $allowImageExtension)) {

          // Define the destination directory for image
          $savePath = "../../frontend/resources/image/promotionImages/";
          $newImageName = $row['promotion_id'] . "." . $fileExtension;

          // Move the uploaded image to the destination directory
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
