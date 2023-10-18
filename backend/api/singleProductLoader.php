<?php
//dev by madusha
//18-10-2023

//include models
require_once("../model/database_driver.php");
require_once("../model/response_sender.php");
require_once("../model/fileSearch.php");
require_once("../model/RequestHandler.php");
require_once("../model/AdvancedSearchEngine.php");
require_once("../model/data_validator.php");
require_once("../model/SessionManager.php");

// headers
header("Content-Type: application/json; charset=UTF-8");

//response object
$responseObject = new stdClass();
$responseObject->status = 'failed';

//engine require
$searchEngine = new AdvancedSearchEngine();

$db = new database_driver();

//handle the request
//single product load and all product load 
//you want to parse GET method
//if you load single product required vh_model_id or vh_category_item_id a other 2 are optional
if (RequestHandler::isGetMethod()) {

     //load single product
     //check our parameters

     if (isset($_GET['vh_model_id']) && isset($_GET['vh_category_item_id'])) {
          $vehicleModelId = $_GET['vh_model_id'];
          $vehicleCategoryItemId = $_GET['vh_category_item_id'];
          $vehiclePartsOriginId = isset($_GET['vh_origin_id']) ? $_GET['vh_origin_id'] : null;
          $vehiclePartsStatusId = isset($_GET['vh_status_id']) ? $_GET['vh_status_id'] : null;


          //if we not parse the value then get the default value
          if ($vehiclePartsOriginId === null || empty($vehiclePartsOriginId)) {
               $vehiclePartsOriginId = '1';
          }

          if ($vehiclePartsStatusId === null || empty($vehiclePartsStatusId)) {
               $vehiclePartsStatusId = '1';
          }

          //advance sigle product load 
          $responseDataArray = $searchEngine->searchSingleProduct($vehiclePartsOriginId, $vehiclePartsStatusId, $vehicleModelId, $vehicleCategoryItemId);

          //row data
          $responseObject->status = "success";
          $responseObject->result = $responseDataArray;
          response_sender::sendJson($responseObject);
     } else {
          // we can load all product in this
          $result = $searchEngine->searchAllProduct();
          //rows data
          $responseObject->status = "success";
          $responseObject->result = $result;
          response_sender::sendJson($responseObject);
     }
} else if (RequestHandler::isPostMethod()) {


     //get user into the session
     // $userCheckSession = new SessionManager();
     // if (!$userCheckSession->isLoggedIn() || !$userCheckSession->getUserData()) {
     //      $responseObject->error = 'Please Login';
     //      response_sender::sendJson($responseObject);
     // }

     // $userData = $userCheckSession->getUserData();
     // $userId = $userData['user_id'];

     $userId = 1;

     //data insert Update Delete
     //data insert parameters
     //$ad_title,$ad_origin_id,$ad_qty,$ad_description,$ad_price,$ad_brand_id,$ad_model_id,$ad_category_id 
     if (isset($_POST['ad_title'], $_POST['ad_origin_id'], $_POST['ad_qty'], $_POST['ad_description'], $_POST['ad_price'], $_POST['ad_brand_id'], $_POST['ad_model_id'], $_POST['ad_category_id'])) {

          $ad_title = $_POST['ad_title'];
          $ad_origin_id = $_POST['ad_origin_id'];
          $ad_qty = $_POST['ad_qty'];
          $ad_description = $_POST['ad_description'];
          $ad_price = $_POST['ad_price'];
          $ad_brand_id = $_POST['ad_brand_id'];
          $ad_model_id = $_POST['ad_model_id'];
          $ad_category_id = $_POST['ad_category_id'];


          //data validation
          $validateReadyObject = (object) [
               "string_or_null" => [
                    (object) ["datakey" => "title", "value" => $ad_title]
               ],
               "int_or_null" => [
                    (object) ["datakey" => "origin", "value" => $ad_origin_id]
               ],
               "int_or_null" => [
                    (object) ["datakey" => "quantity", "value" => $ad_qty]
               ],
               "price" => [
                    (object) ["datakey" => "price", "value" => $ad_price]
               ],
               "int_or_null" => [
                    (object) ["datakey" => "brand", "value" => $ad_brand_id]
               ],
               "int_or_null" => [
                    (object) ["datakey" => "model", "value" => $ad_model_id]
               ],
               "string_or_null" => [
                    (object) ["datakey" => "category", "value" => $ad_category_id]
               ],
               "text_255" => [
                    (object) ["datakey" => "description", "value" => $ad_description]
               ],
          ];

          //validation
          $validator = new data_validator($validateReadyObject);
          $errors = $validator->validate();
          foreach ($errors as $key => $value) {
               if ($value) {
                    $responseObject->error = "Invalid Input for : " . $key;
                    response_sender::sendJson($responseObject);
               }
          }

          //get data in by variables
          //partsId Generator 
          $partsId = '#' . str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);

          //php date object
          date_default_timezone_set('Asia/Colombo');
          $currentDate = date('Y-m-d');

          //query
          $query = "INSERT INTO `vehicle_parts` 
          (`parts_id`,`title`,`parts_origin_origin_id`,`qty`,`description`,`addedd_date`,`user_user_id`,`price`,`parts_status_parts_status_id`,`brand_brand_id`,`vehicle_models_model_id`,`category_item_category_item_id`)
          VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
          //insert data
          $db->execute_query($query, 'ssssssssssss', array($partsId, $ad_title, $ad_origin_id, $ad_qty, $ad_description, $currentDate, $userId, $ad_price, '1', $ad_brand_id, $ad_model_id, $ad_category_id));
          $responseObject->status = "success";
          response_sender::sendJson($responseObject);

     } else if (isset($_POST['up_parts_id'], $_POST['up_title'], $_POST['up_origin_id'], $_POST['up_qty'], $_POST['up_description'], $_POST['up_price'], $_POST['up_brand_id'], $_POST['up_model_id'], $_POST['up_category_id'], $_POST['up_status_id'])) {

          //data varibles
          $up_parts_id = $_POST['up_parts_id'];
          $up_title = $_POST['up_title'];
          $up_origin_id = $_POST['up_origin_id'];
          $up_qty = $_POST['up_qty'];
          $up_description = $_POST['up_description'];
          $up_price = $_POST['up_price'];
          $up_brand_id = $_POST['up_brand_id'];
          $up_model_id = $_POST['up_model_id'];
          $up_category_id = $_POST['up_category_id'];
          $up_status_id = $_POST['up_status_id'];


          //data validation
          $validateReadyObject = (object) [
               "string_or_null" => [
                    (object) ["datakey" => "parts id id", "value" => $up_parts_id]
               ],
               "string_or_null" => [
                    (object) ["datakey" => "title", "value" => $up_title]
               ],
               "int_or_null" => [
                    (object) ["datakey" => "origin", "value" => $up_origin_id]
               ],
               "int_or_null" => [
                    (object) ["datakey" => "quantity", "value" => $up_qty]
               ],
               "price" => [
                    (object) ["datakey" => "price", "value" => $up_price]
               ],
               "int_or_null" => [
                    (object) ["datakey" => "brand", "value" => $up_brand_id]
               ],
               "int_or_null" => [
                    (object) ["datakey" => "model", "value" => $up_model_id]
               ],
               "text_255" => [
                    (object) ["datakey" => "description", "value" => $up_description]
               ],
               "string_or_null" => [
                    (object) ["datakey" => "category", "value" => $up_category_id]
               ],
               "int_or_null" => [
                    (object) ["datakey" => "status", "value" => $up_status_id]
               ],
          ];

          //validation
          $validator = new data_validator($validateReadyObject);
          $errors = $validator->validate();
          foreach ($errors as $key => $value) {
               if ($value) {
                    $responseObject->error = "Invalid Input for : " . $key;
                    response_sender::sendJson($responseObject);
               }
          }


          $updateQuery = "UPDATE `vehicle_parts` SET `title`=?,`parts_origin_origin_id`=?,`qty`=?,`description`=?,`price`=?,`parts_status_parts_status_id`=?,`brand_brand_id`=?,`vehicle_models_model_id`=?,`category_item_category_item_id`=? WHERE `parts_id`=?";
          $db->execute_query($updateQuery, 'siissiiiis', array($up_title, $up_origin_id, $up_qty, $up_description, $up_price, $up_status_id, $up_brand_id, $up_model_id, $up_category_id, $up_parts_id));
          $responseObject->status = "success";
          response_sender::sendJson($responseObject);

     } else if (isset($_POST['del_parts_id'])) {

          //get variables
          $partsDelId = $_POST['del_parts_id'];

          //search this product first
          $searchQuery = "SELECT * FROM `vehicle_parts` WHERE `parts_id`=? AND `user_user_id`=?";
          $result = $db->execute_query($searchQuery, 'si', array($partsDelId, $userId));

          if ($result['result']->num_rows === 0) {
               $responseObject->error = "no product";
               response_sender::sendJson($responseObject);
          }

          //delete parts
          $deleteQuery = "DELETE FROM `vehicle_parts` WHERE `parts_id`=?";
          $db->execute_query($deleteQuery,'s',array($partsDelId));
          $responseObject->status = "success";
          response_sender::sendJson($responseObject);


     } else {
          $responseObject->status = "Access denied";
          response_sender::sendJson($responseObject);
     }
}
