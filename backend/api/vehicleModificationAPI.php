<?php
//dev by madusha
//22-10-2023

//include models
require_once("../model/database_driver.php");
require_once("../model/response_sender.php");
require_once("../model/fileSearch.php");
require_once("../model/RequestHandler.php");
require_once("../model/data_validator.php");
require_once("../model/SessionManager.php");

// headers
header("Content-Type: application/json; charset=UTF-8");

//response object
$responseObject = new stdClass();
$responseObject->status = 'failed';

// get database
$db = new database_driver();

// check data method
//data Add , Update ,
if (RequestHandler::isPostMethod()) {

     // chekcing is user logging
     // $userCheckSession = new SessionManager();
     // if (!$userCheckSession->isLoggedIn() || !$userCheckSession->getUserData()) {
     //      $responseObject->error = 'Please Login';
     //      response_sender::sendJson($responseObject);
     // }

     if (isset($_POST['ad_modification'])) {
          //get data all method varibles
          $ad_modification = $_POST['ad_modification'];

          //data validation sending object
          $dataToValidate = [
               'string_or_null' => [
                    (object)['datakey' => 'vehicle modification', 'value' => $ad_modification],
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

          //search data base 1 date if added
          $searchData = "SELECT * FROM `modification_line` WHERE `mod`=?";
          $resultSet = $db->execute_query($searchData, 's', array($ad_modification));

          //if addedd program end
          if ($resultSet['result']->num_rows > 0) {
               $responseObject->error = "this modification line already added";
               response_sender::sendJson($responseObject);
          }

          //add date 
          $addModificationLine = "INSERT INTO `modification_line` (`mod`) VALUES (?)";
          $db->execute_query($addModificationLine, 's', array($ad_modification));

          $responseObject->status = "success";
          response_sender::sendJson($responseObject);
     }


     if (isset($_POST['up_vehicle_modification_line'], $_POST['up_vehicle_modification_line_id'])) {
          //get data all method varibles
          $up_vehicle_modification = $_POST['up_vehicle_modification_line'];
          $up_vehicle_modification_line_id = $_POST['up_vehicle_modification_line_id'];

          //data validation sending object
          $dataToValidate = [
               'string_or_null' => [
                    (object)['datakey' => 'vehicle type', 'value' => $up_vehicle_modification],
               ],
               'int_or_null' => [
                    (object)['datakey' => 'Year_id', 'value' => $up_vehicle_modification_line_id],
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

          //update date 
          $updateQuery = "UPDATE `modification_line` SET `mod`=? WHERE `mod_id`=? ";
          $db->execute_query($updateQuery, 'si', array($up_vehicle_modification, $up_vehicle_modification_line_id));

          $responseObject->status = "success";
          response_sender::sendJson($responseObject);
     }
}

//get reqest data load
if (RequestHandler::isGetMethod()) {
     // load all data in a data table
     $searchDataBase = "SELECT * FROM `modification_line`";
     $result = $db->query($searchDataBase);

     $resultArray = [];
     //search data form table
     if ($result->num_rows > 0) {
          while ($value = $result->fetch_assoc()) {
               array_push($resultArray, $value);
          }

          //if send a response result
          $responseObject->status = "success";
          $responseObject->result = $resultArray;
          response_sender::sendJson($responseObject);
     } else {

          // no row data
          $responseObject->error = "no row data";
          response_sender::sendJson($responseObject);
     }
}
