<?php
//category Item adding API
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

if (!isset($_POST['category_item_name']) && !isset($_FILES['category_item_image']) && !isset($_POST['category_id'])) {
     $responseObject->error = 'Access denied';
     response_sender::sendJson($responseObject);
}
// input data
$category_item_name = $_POST['category_item_name'];
$categoryId = $_POST['category_id'];

//data validation sending object
$dataToValidate = [
     'string_or_null' => [
          (object)['datakey' => 'category', 'value' => $category_item_name],
          (object)['datakey' => 'category_id', 'value' => $categoryId],
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
$searchQuery = "SELECT * FROM `category_item` WHERE  `category_item_name`=? AND `category_category_id`=?";
$resultSet = $db->execute_query($searchQuery, 'ss', array($category_item_name, $categoryId));

//this category already have
if ($resultSet['result']->num_rows > 0) {
     $responseObject->error = 'This category already have';
     response_sender::sendJson($responseObject);
}

//category Id
$categoryItemId = 'CTI_' . str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);

//category image adding
if ($_FILES['category_item_image']['error'] === 0) {
     $allowImageExtension = ['png', 'jpg', 'jpeg', 'svg'];
     $fileExtension = strtolower(pathinfo($_FILES['category_item_image']['name'], PATHINFO_EXTENSION));


     if (in_array($fileExtension, $allowImageExtension)) {

          // Define the destination directory
          $savePath = "../../resources/image/categoryItemImages/";
          $newImageName = $categoryItemId .  "." . $fileExtension;


          if (move_uploaded_file($_FILES['category_item_image']['tmp_name'], $savePath . $newImageName)) {
               // data insert
               $insertCategory = "INSERT INTO `category_item` (`category_item_id`,`category_item_name`,`category_category_id`) VALUES (?,?,?)";
               $db->execute_query($insertCategory, 'sss', array($categoryItemId, $category_item_name, $categoryId));

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
