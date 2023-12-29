<?php
//category adding API
//by madusha pravinda
//version - 1.0.0
//11-10-2023

//include models
require_once("../../backend/model/database_driver.php");
require_once("../../backend/model/response_sender.php");
require_once("../../backend/model/fileSearch.php");
require_once("../../backend/model/RequestHandler.php");
require_once("../../backend/model/SessionManager.php");
require_once("../../backend/model/data_validator.php");


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
// $userCheckSession = new SessionManager();
// if (!$userCheckSession->isLoggedIn() || !$userCheckSession->getUserData()) {
//      $responseObject->error = 'Please Login';
//      response_sender::sendJson($responseObject);
// }

if (!isset($_POST['category']) && !isset($_FILES['category_image']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
     $responseObject->error = 'Access denied';
     response_sender::sendJson($responseObject);
}
// input data
$category_type = $_POST['category'];

//data validation sending object
$dataToValidate = [
     'string_or_null' => [
          (object)['datakey' => 'category', 'value' => $category_type],
     ],
];

// validation
$validator = new data_validator($dataToValidate);
$errors = $validator->validate();
foreach ($errors as $key => $value) {
     if ($value) {
          $responseObject->error = "Invalid Input for : " . $key;
          response_sender::sendJson($responseObject);
     }
}

//database object
$db = new database_driver();
$searchQuery = "SELECT * FROM `category` WHERE `category`='" . $category_type . "'";
$resultSet = $db->query($searchQuery);

//this category already have
if ($resultSet->num_rows > 0) {
     $responseObject->error = 'This category already have';
     response_sender::sendJson($responseObject);
}

//category Id
$categoryId = 'CT_' . str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);

//category image adding
if ($_FILES['category_image']['error'] === 0) {
     $allowImageExtension = ['png', 'jpg', 'jpeg', 'svg'];
     $fileExtension = strtolower(pathinfo($_FILES['category_image']['name'], PATHINFO_EXTENSION));


     if (in_array($fileExtension, $allowImageExtension)) {

          // Define the destination directory
          $savePath = "../../resources/image/categoryImages/";
          $newImageName = $categoryId .  "." . $fileExtension;


          if (move_uploaded_file($_FILES['category_image']['tmp_name'], $savePath . $newImageName)) {
               // data insert
               $insertCategory = "INSERT INTO `category` (`category_id`,`category`) VALUES ('" . $categoryId . "','" . $category_type . "')";
               $db->query($insertCategory);

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
