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

// chekcing is user logging
$userCheckSession = new SessionManager();
if (!$userCheckSession->isLoggedIn() || !$userCheckSession->getUserData()) {
     $responseObject->error = 'Please Login';
     response_sender::sendJson($responseObject);
}

//get user
$userDataArray = $userCheckSession->getUserData();
$userId = $userDataArray['user_id'];

// get database
$db = new database_driver();

//data update delete
if (RequestHandler::isPostMethod()) {

     // data adding
     if (isset($_POST['modelHasId'])) {
          //get data variables
          $modelHasId = $_POST['modelHasId'];

          // // data validation
          $dataToValidate = [
               'int_or_null' => [
                    (object)['datakey' => 'model type', 'value' => $modelHasId],
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


          //add data for database
          $searchQuery = "SELECT * FROM `my_garaj` WHERE `user_user_id`='" . $userId . "' AND `vehicle_models_has_modification_line_mdu_id`='" . $modelHasId . "'";
          $result = $db->query($searchQuery);

          //check num rows
          if ($result->num_rows > 0) {
               $responseObject->error = "this vehicle you are already added";
               response_sender::sendJson($responseObject);
          }

          //insert data
          $insertQuery = "INSERT INTO `my_garaj` (`user_user_id`,`vehicle_models_has_modification_line_mdu_id`) VALUES ('" . $userId . "','" . $modelHasId . "')";
          $db->query($insertQuery);
          $responseObject->status = "success";
          response_sender::sendJson($responseObject);
     }

     //delete data
     if (isset($_POST['del_mg_id'])) {

          $mgId = $_POST['del_mg_id'];
          $deleteData = "DELETE FROM `my_garaj` WHERE `mg_id`='" . $mgId . "' AND `user_user_id`='" . $userId . "'";
          $db->query($deleteData);

          $responseObject->status = "success";
          response_sender::sendJson($responseObject);
     }
}

if (RequestHandler::isGetMethod()) {

     //get current user login id and load user related garage data
     $searchQuery = "SELECT * FROM `my_garaj` 
     INNER JOIN `vehicle_models_has_modification_line` ON `my_garaj`.`vehicle_models_has_modification_line_mdu_id`=`vehicle_models_has_modification_line`.`mdu_id`
     INNER JOIN `modification_line` ON `vehicle_models_has_modification_line`.`modification_line_mod_id`=`modification_line`.`mod_id`
     INNER JOIN `vehicle_models` ON `vehicle_models_has_modification_line`.`vehicle_models_model_id`=`vehicle_models`.`model_id`
     INNER JOIN `vehicle_names` ON `vehicle_names`.`vh_name_id`=`vehicle_models`.`vehicle_names_vh_name_id`
     INNER JOIN `vehicle_year` ON `vehicle_year`.`vehicle_year_Id`=`vehicle_models`.`vehicle_year_vehicle_year_Id`
     INNER JOIN `vehicle_type` ON `vehicle_type`.`vehicle_type_id`=`vehicle_models`.`vehicle_type_vehicle_type_id`
     INNER JOIN `generation` ON `generation`.`generation_id`=`vehicle_models`.`generation_generation_id`
     INNER JOIN `makers` ON `makers`.`makers_id`=`vehicle_names`.`makers_makers_id`
     WHERE `user_user_id`='" . $userId . "'";
     $result = $db->query($searchQuery);

     //response array
     $responseArray = [];

     // image manager
     $directory = "../../resources/image/vehicleModelImages";
     $fileExtensions = ['png', 'jpeg', 'jpg', 'svg'];

     //if check result
     if ($result->num_rows < 1) {
          $responseObject->error = 'no row data';
          response_sender::sendJson($responseObject);
     }

     while ($rowData = $result->fetch_assoc()) {

          $modelId = $rowData['model_id'];

          $fileSearch = new FileSearch($directory, $modelId, $fileExtensions); // Use categoryName as the search parameter

          $searchResults = $fileSearch->search();

          $resRowDetailObject = new stdClass();

          $resRowDetailObject->vehicle_models_model_id = $rowData['vehicle_models_model_id'];
          $resRowDetailObject->mg_id = $rowData['mg_id'];
          $resRowDetailObject->mod = $rowData['mod'];
          $resRowDetailObject->model_id = $rowData['mdu_id'];
          $resRowDetailObject->vehicle_type_id = $rowData['vehicle_type_id'];
          $resRowDetailObject->generation_id = $rowData['generation_id'];
          $resRowDetailObject->makers_makers_id = $rowData['makers_makers_id'];
          $resRowDetailObject->vh_name_id = $rowData['vh_name_id'];
          $resRowDetailObject->vehicle_year_Id = $rowData['vehicle_year_Id'];
          $resRowDetailObject->vh_name = $rowData['vh_name'];
          $resRowDetailObject->year = $rowData['year'];
          $resRowDetailObject->vehicale = $rowData['vehicale'];
          $resRowDetailObject->generation = $rowData['generation'];
          $resRowDetailObject->name = $rowData['name'];

          if (is_array($searchResults)) {
               foreach ($searchResults as $searchResult) {
                    $resRowDetailObject->model_image = $searchResult;
               }
          } else {
               $responseObject->error = $searchResults;
               response_sender::sendJson($responseObject);
          }

          array_push($responseArray, $resRowDetailObject);
     }

     $responseObject->status = 'success';
     $responseObject->result = $responseArray;
     response_sender::sendJson($responseObject);
}
