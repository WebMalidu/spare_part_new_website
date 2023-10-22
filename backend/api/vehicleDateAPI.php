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

     if (isset($_POST['ad_year'])) {
          //get data all method varibles
          $ad_vehicleYear = $_POST['ad_year'];

          //data validation sending object
          $dataToValidate = [
               'date' => [
                    (object)['datakey' => 'Year', 'value' => $ad_vehicleYear],
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
          $searchData = "SELECT * FROM `vehicle_year` WHERE `year`=?";
          $resultSet = $db->execute_query($searchData, 's', array($ad_vehicleYear));

          //if addedd program end
          if ($resultSet['result']->num_rows > 0) {
               $responseObject->error = "this date already added";
               response_sender::sendJson($responseObject);
          }

          //add date 
          $addDate = "INSERT INTO `vehicle_year` (`year`) VALUES (?)";
          $db->execute_query($addDate, 's', array($addDate));

          $responseObject->status = "success";
          response_sender::sendJson($responseObject);
     }


     if (isset($_POST['up_year'], $_POST['up_year_id'])) {
          //get data all method varibles
          $up_vehicleYear = $_POST['up_year'];
          $up_vehicleYearId = $_POST['up_year_id'];

          //data validation sending object
          $dataToValidate = [
               'date' => [
                    (object)['datakey' => 'Year', 'value' => $up_vehicleYear],
               ],
               'int_or_null' => [
                    (object)['datakey' => 'Year_id', 'value' => $up_vehicleYearId],
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
          $updateDate = "UPDATE `vehicle_year` SET `year`=? WHERE `vehicle_year_Id`=? ";
          $db->execute_query($updateDate, 'ss', array($up_vehicleYear,$up_vehicleYearId));

          $responseObject->status = "success";
          response_sender::sendJson($responseObject);
     }
}

//get reqest data load
if (RequestHandler::isGetMethod()) {
     // load all data in a data table
     $searchDataBase = "SELECT * FROM `vehicle_year`";
     $result = $db->query($searchDataBase);

     $resultArray = [];
     //search data form table
     if ($result->num_rows > 0) {
          foreach ($result->fetch_assoc() as $value) {
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
