<?php
//dev by madusha
//21-10-2023

//include models
require_once("../model/database_driver.php");
require_once("../model/response_sender.php");
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

//we can add makers , update , load  this api
//if you want load  makers you request GET method
//we can add and update this 
if (RequestHandler::isPostMethod()) {

     // chekcing is user logging
     // $userCheckSession = new SessionManager();
     // if (!$userCheckSession->isLoggedIn() || !$userCheckSession->getUserData()) {
     //      $responseObject->error = 'Please Login';
     //      response_sender::sendJson($responseObject);
     // }

     //add makers    
     if (isset($_POST['ad_makers_name'])) {
          //get all request method in by variables
          $adMakersName = $_POST['ad_makers_name'];

          //data validation sending object
          $dataToValidate = [
               'string_or_null' => [
                    (object)['datakey' => 'Maker', 'value' => $adMakersName],
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

          //already check have this product
          $searchMakers = "SELECT * FROM `makers` WHERE `name`='" . $adMakersName . "'";
          $resultSet = $db->query($searchMakers);

          if ($resultSet->num_rows > 0) {
               $responseObject->error = 'already have this product';
               response_sender::sendJson($responseObject);
          }

          //generate vahicle makers Ids
          $makersId = 'Mk_' . str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);

          // insert data this table
          $InsertQuery = "INSERT INTO `makers` (`makers_id`,`name`) VALUES ('" . $makersId . "','" . $adMakersName . "')";
          $db->query($InsertQuery);


          $responseObject->status = 'success';
          response_sender::sendJson($responseObject);

          // update makers data
     } else if (isset($_POST['up_makes_name'], $_POST['up_makers_id'])) {
          //get All request data in a variable
          $upMakersName = $_POST['up_makes_name'];
          $upMakerId = $_POST['up_makers_id'];

          // chekcing is user logging
          // $userCheckSession = new SessionManager();
          // if (!$userCheckSession->isLoggedIn() || !$userCheckSession->getUserData()) {
          //      $responseObject->error = 'Please Login';
          //      response_sender::sendJson($responseObject);
          // }

          //data validation sending object
          $dataToValidate = [
               'string_or_null' => [
                    (object)['datakey' => 'Maker', 'value' => $upMakersName],
                    (object)['datakey' => 'MakerId', 'value' => $upMakerId],
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

          //update makers
          $updateQuery = "UPDATE `makers` SET `name`=? WHERE `makers_id`=? ";
          $db->execute_query($updateQuery, 'ss', array($upMakersName, $upMakerId));

          //success
          $responseObject->status = 'success';
          response_sender::sendJson($responseObject);


          //only maker delete
     } else if (isset($_POST['del_maker_id'])) {

          $makerId = $_POST['del_maker_id'];

          try {
               //delete maker
               $delQuery = "DELETE FROM `makers` WHERE `makers_id` = '" . $makerId . "'";
               $db->query($delQuery);

               //success
               $responseObject->status = 'success';
               response_sender::sendJson($responseObject);

          } catch (mysqli_sql_exception $ex) {
               //success
               $responseObject->error = "Cannot delete this vehicle maker because it is still being used by a vehicle names";
               response_sender::sendJson($responseObject);
          }
     }
}

if (RequestHandler::isGetMethod()) {

     //load makers table maker_id and makers_name
     $searchQuery = "SELECT * FROM `makers`";
     $resultSet = $db->query($searchQuery);

     //response array 
     $responseArray = [];

     if ($resultSet->num_rows > 0) {

          while ($rowData = $resultSet->fetch_assoc()) {

               array_push($responseArray, $rowData);
          }

          $responseObject->status = 'success';
          $responseObject->results = $responseArray;
          response_sender::sendJson($responseObject);
     } else {
          $responseObject->error = 'no row data';
          response_sender::sendJson($responseObject);
     }
}
