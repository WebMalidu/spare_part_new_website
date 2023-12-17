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
               $resRowDetailObject->makers_makers_id = $rowData['makers_id'];
               // $resRowDetailObject->vehicle_names_id = $rowData['vh_name_id'];

               array_push($responseArray, $resRowDetailObject);
          }

          $responseObject->status = 'success';
          $responseObject->results = $responseArray;
          response_sender::sendJson($responseObject);
     }
}

if (RequestHandler::isPostMethod()) {

     if (isset($_POST['ad_vhName'], $_POST['ad_vh_maker_id'])) {

          if (empty($_POST['ad_vhName'])) {
               $responseObject->error = 'Please enter vehicle name';
               response_sender::sendJson($responseObject);
          }

          if ($_POST['ad_vh_maker_id'] === 0 || $_POST['ad_vh_maker_id'] === null) {
               $responseObject->error = 'Please select vehicle maker';
               response_sender::sendJson($responseObject);
          }

          //search already exists
          $searchQuery = "SELECT * FROM `vehicle_names` WHERE `vh_name`='" . $_POST['ad_vhName'] . "' AND `makers_makers_id`='" . $_POST['ad_vh_maker_id'] . "'";
          $result = $db->query($searchQuery);

          if ($result->num_rows > 0) {
               $responseObject->error = 'this vehicle name is already have';
               response_sender::sendJson($responseObject);
          }

          //add vhNames
          $insertQuery = "INSERT INTO `vehicle_names` (`vh_name`,`makers_makers_id`) VALUES ('" . $_POST['ad_vhName'] . "','" . $_POST['ad_vh_maker_id'] . "')";
          $db->query($insertQuery);

          $responseObject->status = 'success';
          response_sender::sendJson($responseObject);
     }

     if (isset($_POST['del_name_id'])) {

          $vhNameId = $_POST['del_name_id'];


          try {

               $deleteQuery = "DELETE FROM `vehicle_names` WHERE `vh_name_id` = '" . $vhNameId . "'";
               $db->query($deleteQuery);
               $responseObject->status = 'success';
               response_sender::sendJson($responseObject);
          } catch (mysqli_sql_exception $ex) {
               $responseObject->error = "Cannot delete this vehicle maker because it is still being used by a vehicle model";
               response_sender::sendJson($responseObject);
          }
     }
}
