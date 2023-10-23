<?php
//dev by madusha
//22-10-2023

//include models
require_once("../model/database_driver.php");
require_once("../model/response_sender.php");
require_once("../model/RequestHandler.php");
require_once("../model/SessionManager.php");
require_once("../model/data_validator.php");

// headers
header("Content-Type: application/json; charset=UTF-8");

//response object
$responseObject = new stdClass();
$responseObject->status = 'failed';

// get database
$db = new database_driver();

//check data POST or GET method
if (RequestHandler::isPostMethod()) {
     if (isset($_POST['ad_generation'])) {

          $ad_generation = $_POST['ad_generation'];
          //data validation sending object
          $dataToValidate = [
               'string_or_null' => [
                    (object)['datakey' => 'vehicle generation', 'value' => $ad_generation],
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

          //add data for table
          $insertData = "INSERT INTO `generation` (`generation`) VALUES (?)";
          $db->execute_query($insertData, 's', array($ad_generation));
          $responseObject->status = "success";
          response_sender::sendJson($responseObject);
     } else if (isset($_POST['up_generation'], $_POST['up_generation_id'])) {

          $up_generation = $_POST['up_generation'];
          $up_generation_id = $_POST['up_generation_id'];
          //data validation sending object
          $dataToValidate = [
               'string_or_null' => [
                    (object)['datakey' => 'vehicle generation', 'value' => $up_generation],
               ],
               'int_or_null' => [
                    (object)['datakey' => 'vehicle generation', 'value' => $up_generation_id],
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

          //add data for table
          $updateTable = "UPDATE `generation` SET `generation`=? WHERE `generation_id`=?";
          $db->execute_query($updateTable, 'si', array($up_generation, $up_generation_id));

          //if success
          $responseObject->status = "success";
          response_sender::sendJson($responseObject);
     }
}

if (RequestHandler::isGetMethod()) {
     //all data search 
     $searchQuery = "SELECT * FROM `generation`";
     $result = $db->query($searchQuery);

     $responseArray = [];
     //one by one read
     while ($rowData = $result->fetch_assoc()) {
          array_push($responseArray, $rowData);
     }
     //if success
     $responseObject->status = "success";
     $responseObject->result = $responseArray;
     response_sender::sendJson($responseObject);
}
