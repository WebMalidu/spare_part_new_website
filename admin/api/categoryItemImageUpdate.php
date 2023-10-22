<?php
//category item image update API
//by madusha pravinda
//version - 1.0.0
//11-10-2023

//include models
require_once("../../backend/model/database_driver.php");
require_once("../../backend/model/response_sender.php");
require_once("../../backend/model/fileSearch.php");
require_once("../../backend/model/RequestHandler.php");
require_once("../../backend/model/SessionManager.php");


// headers
header("Content-Type: application/json; charset=UTF-8");

//response object
$responseObject = new stdClass();
$responseObject->status = 'failed';

//handle the request
if (!RequestHandler::isPostMethod()) {
     $responseObject->error = "invalid request";
     response_sender::sendJson($responseObject);
}

// chekcing is user logging
$userCheckSession = new SessionManager();
if (!$userCheckSession->isLoggedIn() || !$userCheckSession->getUserData()) {
     $responseObject->error = 'Please Login';
     response_sender::sendJson($responseObject);
}

if (!isset($_POST['category_item_id']) && !isset($_FILES['new_category_item_image']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
     $responseObject->error = 'Access denied';
     response_sender::sendJson($responseObject);
}

// input data
$newCategoryImage = $_FILES['new_category_item_image'];
$categoryItemId = $_POST['category_item_id'];

// image manager
$directory = "../../frontend/resources/image/categoryItemImages";
$fileExtensions = ['png', 'jpeg', 'jpg', 'svg'];

//search image
$fileSearch = new FileSearch($directory, $categoryItemId, $fileExtensions); // Use categoryName as the search parameter
$imagePath = $fileSearch->search();


if (is_array($imagePath) && count($imagePath) > 0) {
     $imagePath = $imagePath[0]; // Select the first image in the array
}


if (is_string($imagePath) && file_exists($imagePath)) {
     if (unlink($imagePath)) {

          //category image adding
          if ($_FILES['new_category_item_image']['error'] === 0) {
               $fileExtension = strtolower(pathinfo($_FILES['new_category_item_image']['name'], PATHINFO_EXTENSION));


               if (in_array($fileExtension, $fileExtensions)) {

                    // Define the destination directory
                    $savePath = "../../frontend/resources/image/categoryItemImages/";
                    $newImageName = $categoryItemId .  "." . $fileExtension;


                    if (move_uploaded_file($_FILES['new_category_item_image']['tmp_name'], $savePath . $newImageName)) {
                         $responseObject->status = 'success';
                         response_sender::sendJson($responseObject);
                    } else {
                         $responseObject->error = 'Failed to save the image';
                         response_sender::sendJson($responseObject);
                    }
               } else {
                    $responseObject->error = 'Invalid file type';
                    response_sender::sendJson($responseObject);
               }
          } else {
               $responseObject->error = 'No image upload';
               response_sender::sendJson($responseObject);
          }
     } else {
          $responseObject->error = 'Failed to delete the image.';
          response_sender::sendJson($responseObject);
     }
} else {
     $responseObject->error = 'Image does not exist.';
     response_sender::sendJson($responseObject);
}
