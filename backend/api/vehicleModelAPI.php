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

// Define the destination directory
$savePath = "../../resources/image/vehicleModelImages/";


// image manager
$directory = "../../resources/image/vehicleModelImages";
$fileExtensions = ['png', 'jpeg', 'jpg', 'svg'];

// get database
$db = new database_driver();

if (RequestHandler::isGetMethod()) {

     if (isset($_GET['maker_id'])) {
          $makerId = $_GET['maker_id'];
          //load vehicle  model table 
          $searchQuery = "SELECT * FROM `vehicle_models` WHERE `makers_makers_id`=?";
          $resultSet = $db->execute_query($searchQuery, 's', array($makerId));
          $result = $resultSet['result'];
          //now select model names and parse the response
          if ($result->num_rows > 0) {
               $responseModelNamesArray = [];

               while ($rowData = $result->fetch_assoc()) {
                    $modelName = $rowData['name'];
                    array_push($responseModelNamesArray, $modelName);
               }

               $responseObject->status = 'success';
               $responseObject->result = $responseModelNamesArray;
               response_sender::sendJson($responseObject);
          } else {
               $responseObject->error = 'no row data';
               response_sender::sendJson($responseObject);
          }
     } else if (isset($_GET['model_name'])) {
          $model_name = $_GET['model_name'];
          //load vehicle  model table 
          $searchQuery = "SELECT * FROM `vehicle_models` WHERE `name`";
          $resultSet = $db->execute_query($searchQuery, 's', array($model_name));
          $result = $resultSet['result'];
          //now select model names and parse the response
          if ($result->num_rows > 0) {
               $responseModelYearsArray = [];

               while ($rowData = $result->fetch_assoc()) {
                    $modelYears = $rowData['vehicle_year_vehicle_year_Id'];
                    array_push($responseModeYearsArray, $modelYears);
               }

               $responseObject->status = 'success';
               $responseObject->result = $responseModelYearsArray;
               response_sender::sendJson($responseObject);
          } else {
               $responseObject->error = 'no row data';
               response_sender::sendJson($responseObject);
          }
     } else if (isset($_GET['model_year_id'])) {
          $model_year_id = $_GET['model_year_id'];
          //load vehicle  model table 
          $searchQuery = "SELECT * FROM `vehicle_models` WHERE `modification_line_mod_id`";
          $resultSet = $db->execute_query($searchQuery, 'i', array($model_year_id));
          $result = $resultSet['result'];
          //now select model names and parse the response
          if ($result->num_rows > 0) {
               $responseModelModification = [];

               while ($rowData = $result->fetch_assoc()) {
                    $modelModification = $rowData['modification_line_mod_id'];
                    array_push($responseModelModification, $modelModification);
               }

               $responseObject->status = 'success';
               $responseObject->result = $responseModelModification;
               response_sender::sendJson($responseObject);
          } else {
               $responseObject->error = 'no row data';
               response_sender::sendJson($responseObject);
          }
     } else if (isset($_GET['maker_id'], $_GET['model_name'], $_GET['model_year_id'], $_GET['mod_id'])) {

          $maker_id = $_GET['maker_id'];
          $model_name = $_GET['model_name'];
          $model_year_id = $_GET['model_year_id'];
          $mod_id = $_GET['mod_id'];
          //load vehicle  model table 
          $searchQuery = "SELECT * FROM `vehicle_models` WHERE `modification_line_mod_id`=? AND `makers_makers_id`=? AND `name`=? AND `vehicle_year_vehicle_year_Id`=? AND `modification_line_mod_id`=?";
          $resultSet = $db->execute_query($searchQuery, 'issii', array($model_year_id));
          $result = $resultSet['result'];
          //now select model names and parse the response
          if ($result->num_rows > 0) {
               $responseArray  = [];

               while ($rowData = $result->fetch_assoc()) {
                    $modelId = $rowData['model_id'];
                    array_push($responseArray, $modelId);
               }

               $responseObject->status = 'success';
               $responseObject->result = $responseArray;
               response_sender::sendJson($responseObject);
          } else {
               $responseObject->error = 'no row data';
               response_sender::sendJson($responseObject);
          }
     } else {
          //load vehicle  model table 
          $searchQuery = "SELECT * FROM `vehicle_models` 
          INNER JOIN `vehicle_type` ON `vehicle_type`.`vehicle_type_id`=`vehicle_models`.`vehicle_type_vehicle_type_id`
          INNER JOIN `vehicle_year` ON `vehicle_year`.`vehicle_year_Id`=`vehicle_models`.`vehicle_year_vehicle_year_Id`
          INNER JOIN `generation` ON `generation`.`generation_id`=`vehicle_models`.`generation_generation_id`
          INNER JOIN `vehicle_names` ON `vehicle_names`.`vh_name_id`=`vehicle_models`.`vehicle_names_vh_name_id`";
          $resultSet = $db->query($searchQuery);

          //response array 
          $responseArray = [];

          if ($resultSet->num_rows > 0) {

               $groupedResults = []; // Create an array to group results

               while ($rowData = $resultSet->fetch_assoc()) {
                    $model_id = $rowData['model_id']; // Use categoryName instead of category_type

                    $fileSearch = new FileSearch($directory, $model_id, $fileExtensions); // Use categoryName as the search parameter

                    $searchResults = $fileSearch->search();

                    $resRowDetailObject = new stdClass();

                    $resRowDetailObject->model_id = $model_id;
                    $resRowDetailObject->vehicle_names = $rowData['vh_name'];
                    $resRowDetailObject->model_type = $rowData['vehicale'];
                    $resRowDetailObject->model_year = $rowData['year'];
                    $resRowDetailObject->model_generation = $rowData['generation'];

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
               $responseObject->results = $responseArray;
               response_sender::sendJson($responseObject);
          } else {
               $responseObject->error = 'no row data';
               response_sender::sendJson($responseObject);
          }
     }
}

//vehicle model add , update
if (RequestHandler::isPostMethod()) {

     // chekcing is user logging
     // $userCheckSession = new SessionManager();
     // if (!$userCheckSession->isLoggedIn() || !$userCheckSession->getUserData()) {
     //      $responseObject->error = 'Please Login';
     //      response_sender::sendJson($responseObject);
     // }

     if (isset($_POST['ad_vehicle_type_id'], $_POST['ad_vehicle_year_Id'], $_POST['ad_generation_id'], $_POST['ad_vehicle_name_id'], $_POST['ad_model_img'])) {
          //get all data in a variables 
          $ad_model_name_id = $_POST['ad_vehicle_name_id'];
          $ad_vehicle_type_id = $_POST['ad_vehicle_type_id'];
          $ad_vehicle_year_id = $_POST['ad_vehicle_year_Id'];
          $ad_generation_id = $_POST['ad_generation_id'];
          $ad_model_img = $_POST['ad_model_img'];

          // data validation
          $dataToValidate = [
               'int_or_null' => [
                    (object)['datakey' => 'vehicle model name', 'value' => $ad_model_name_id],
                    (object)['datakey' => 'vehicle type', 'value' => $ad_vehicle_type_id],
                    (object)['datakey' => 'vehicle year', 'value' => $ad_vehicle_year_id],
                    (object)['datakey' => 'vehicle generation', 'value' => $ad_generation_id],

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

          //check already have this model
          $searchData = "SELECT * FROM `vehicle_models` WHERE 
          `vehicle_type_vehicle_type_id`='" . $ad_vehicle_type_id . "' AND `vehicle_year_vehicle_year_Id`='" . $ad_vehicle_year_id . "' 
          AND `generation_generation_id`='" . $ad_generation_id . "' AND `vehicle_names_vh_name_id`='" . $ad_model_name_id . "'";

          $result = $db->query($searchData);

          //get by result
          if ($result->num_rows > 0) {
               $responseObject->error = "this product already added ";
               response_sender::sendJson($responseObject);
          }

          //next  add data our database table
          //generate vahicle makers Ids
          $modelId = 'MOD_' . str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);

          $value = $ad_model_img[0];

          //image add and data insert
          if ($value) {
               // files manage 
               // Remove the "data:image/jpeg;base64," part to get the base64 data
               $base64Data = substr($value, strpos($value, ',') + 1);

               $binaryData = base64_decode($base64Data);
               $fileExtension = ".jpg";

               //file save path and file name create
               $newImageName = $modelId . $fileExtension;

               // Save the image to a file
               file_put_contents($savePath . $newImageName, $binaryData);
          } else {
               $responseObject->error = "upload one or more images";
               response_sender::sendJson($responseObject);
          }

          //insert data for database
          // insert data this table
          $InsertQuery = "INSERT INTO `vehicle_models` (`model_id`,`vehicle_type_vehicle_type_id`,`vehicle_year_vehicle_year_Id`,`generation_generation_id`,`vehicle_names_vh_name_id`) 
          VALUES ('" . $modelId . "','" . $ad_vehicle_type_id . "','" . $ad_vehicle_year_id . "','" . $ad_generation_id . "','" . $ad_model_name_id . "')";
          $db->query($InsertQuery);

          $responseObject->status = 'success';
          response_sender::sendJson($responseObject);


          
     } else if (isset($_POST['up_model_id'], $_POST['up_model_name'], $_POST['up_type_id'], $_POST['up_vehicle_year_Id'], $_POST['up_generation_id'], $_POST['up_modification_line_mod_id'], $_POST['up_makers_id'])) {

          //gets all request one by one variables
          $up_model_id = $_POST['up_model_id'];
          $up_model_name = $_POST['up_model_name'];
          $up_type_id = $_POST['up_type_id'];
          $up_vehicle_year_Id = $_POST['up_vehicle_year_Id'];
          $up_generation_id = $_POST['up_generation_id'];
          $up_modification_line_mod_id = $_POST['up_modification_line_mod_id'];
          $up_makers_id = $_POST['up_makers_id'];

          //validation our data
          // data validation
          $dataToValidate = [
               'string_or_null' => [
                    (object)['datakey' => 'vehicle model id', 'value' => $up_model_id],
                    (object)['datakey' => 'vehicle model name', 'value' => $up_model_name],
                    (object)['datakey' => 'vehicle maker', 'value' => $up_makers_id],
               ],
               'int_or_null' => [
                    (object)['datakey' => 'vehicle type', 'value' => $up_type_id],
                    (object)['datakey' => 'vehicle year', 'value' => $up_vehicle_year_Id],
                    (object)['datakey' => 'vehicle generation', 'value' => $up_generation_id],
                    (object)['datakey' => 'vehicle modification line', 'value' => $up_modification_line_mod_id],

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

          //update our data
          $updateModelTable = "UPDATE `vehicle_models` SET `name`=?,`vehicle_type_vehicle_type_id`=?,`vehicle_year_vehicle_year_Id`=?,`generation_generation_id`=?,`modification_line_mod_id`=?,`makers_makers_id`=? WHERE `model_id`=?";
          $db->execute_query($updateModelTable, 'siiiiss', array($up_model_name, $up_type_id, $up_vehicle_year_Id, $up_generation_id, $up_modification_line_mod_id, $up_makers_id, $up_model_id));
          //if success
          $responseObject->status = "success";
          response_sender::sendJson($responseObject);
     } else if (isset($_POST['up_model_id'], $_FILES['up_model_img'])) {
          //makers Request data
          $up_model_img = $_FILES['up_model_img'];
          $up_model_id = $_POST['up_model_id'];



          //search image
          $fileSearch = new FileSearch($directory, $up_model_id, $fileExtensions); // Use categoryName as the search parameter
          $imagePath = $fileSearch->search();


          if (is_array($imagePath) && count($imagePath) > 0) {
               $imagePath = $imagePath[0]; // Select the first image in the array
          }


          if (is_string($imagePath) && file_exists($imagePath)) {
               if (unlink($imagePath)) {

                    //category image adding
                    if ($_FILES['up_model_img']['error'] === 0) {
                         $fileExtension = strtolower(pathinfo($_FILES['up_model_img']['name'], PATHINFO_EXTENSION));


                         if (in_array($fileExtension, $fileExtensions)) {

                              //new image name
                              $newImageName = $up_model_id .  "." . $fileExtension;


                              if (move_uploaded_file($_FILES['up_model_img']['tmp_name'], $savePath . $newImageName)) {

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
               } else {
                    $responseObject->error = 'Failed to delete the image.';
                    response_sender::sendJson($responseObject);
               }
          } else {
               $responseObject->error = 'Image does not exist.';
               response_sender::sendJson($responseObject);
          }
     }
}
