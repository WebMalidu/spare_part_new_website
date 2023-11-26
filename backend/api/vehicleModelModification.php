<?php
//dev by madusha
//24-10-2023

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

if (RequestHandler::isGetMethod()) {
     //load vehicle  model table 
     $searchQuery = "SELECT * FROM `vehicle_models_has_modification_line` INNER JOIN `modification_line` ON `modification_line`.`mod_id`=`vehicle_models_has_modification_line`.`modification_line_mod_id`
     INNER JOIN `vehicle_models`ON `vehicle_models`.`model_id`=`vehicle_models_has_modification_line`.`vehicle_models_model_id` ";
     $resultSet = $db->query($searchQuery);

     //response array 
     $responseArray = [];

     if ($resultSet->num_rows > 0) {

          while ($rowData = $resultSet->fetch_assoc()) {

               $resRowDetailObject = new stdClass();

               $resRowDetailObject->vh_mdu_id = $rowData['mdu_id'];
               $resRowDetailObject->vh_model_id = $rowData['vehicle_models_model_id'];
               $resRowDetailObject->vh_modification_line = $rowData['mod'];

               array_push($responseArray, $resRowDetailObject);
          }

          $responseObject->status = 'success';
          $responseObject->results = $responseArray;
          response_sender::sendJson($responseObject);
     }
}
