<?php
//category update API
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
$userCheckSession = new SessionManager();
if (!$userCheckSession->isLoggedIn() || !$userCheckSession->getUserId()) {
     $responseObject->error = 'Please Login';
     response_sender::sendJson($responseObject);
}

if (!isset($_POST['category_item_id']) && !isset($_POST['category_id']) && !isset($_POST['new_category_item_name']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
     $responseObject->error = 'Access denied';
     response_sender::sendJson($responseObject);
}

// input data
$category_Item_type = $_POST['new_category_item_name'];
$category_id = $_POST['category_id'];
$category_item_id = $_POST['category_item_id'];

//data validation sending object
$dataToValidate = [
     'string_or_null' => [
          (object)['datakey' => 'category', 'value' => $category_Item_type],
          (object)['datakey' => 'category_id', 'value' => $category_id],
          (object)['datakey' => 'category_item_id', 'value' => $category_item_id],
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
$searchQuery = "SELECT * FROM `category_item` WHERE `category_category_id`=? AND `category`=?";
$resultSet = $db->execute_query($searchQuery, 'ss', array($category_id, $category_Item_type));

//this category already have
if ($resultSet['result']->num_rows > 0) {
     $responseObject->error = 'This category already have';
     response_sender::sendJson($responseObject);
}

//category Update
$categoryUpdate = "UPDATE `category_item` SET `category`=?,`category_category_id`=? WHERE `category_item_id`=?";
$db->execute_query($categoryUpdate, 'sss', array($category_Item_type, $category_id, $category_item_id));
$responseObject->status = 'success';
response_sender::sendJson($responseObject);
