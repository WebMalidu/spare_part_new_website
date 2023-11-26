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
     $searchQuery = "SELECT * FROM `vehicle_names` INNER JOIN `makers` ON `vehicle_names`.`makers_makers_id`=`makers`.`makers_id`";
     $resultSet = $db->query($searchQuery);

     //response array 
     $responseArray = [];

     if ($resultSet->num_rows > 0) {

          while ($rowData = $resultSet->fetch_assoc()) {

               $resRowDetailObject = new stdClass();

               $resRowDetailObject->vh_name_id = $rowData['vh_name_id'];
               $resRowDetailObject->makers_name = $rowData['name'];
               $resRowDetailObject->vh_name = $rowData['vh_name'];

               array_push($responseArray, $resRowDetailObject);
          }

          $responseObject->status = 'success';
          $responseObject->results = $responseArray;
          response_sender::sendJson($responseObject);
     }
}
