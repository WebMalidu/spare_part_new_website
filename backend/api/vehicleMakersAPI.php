<?php
//dev by madusha
//21-10-2023

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

// Define the destination directory
$savePath = "../../frontend/resources/image/makersImages/";


// image manager
$directory = "../../frontend/resources/image/makersImages";
$fileExtensions = ['png', 'jpeg', 'jpg', 'svg'];

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
     if (isset($_POST['ad_makers_name'], $_FILES['ad_makers_images'])) {
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
          $searchMakers = "SELECT * FROM `makers` WHERE `name`=?";
          $resultSet = $db->execute_query($searchMakers, 's', array($adMakersName));

          if ($resultSet['result']->num_rows > 0) {
               $responseObject->error = 'already have this product';
               response_sender::sendJson($responseObject);
          }

          //generate vahicle makers Ids
          $makersId = '#Mk_' . str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);


          //makers image adding
          if ($_FILES['ad_makers_images']['error'] === 0) {
               $allowImageExtension = ['png', 'jpg', 'jpeg', 'svg'];
               $fileExtension = strtolower(pathinfo($_FILES['ad_makers_images']['name'], PATHINFO_EXTENSION));


               if (in_array($fileExtension, $allowImageExtension)) {

                    // new name
                    $newImageName = $makersId .  "." . $fileExtension;

                    //upload images makers image files
                    if (move_uploaded_file($_FILES['ad_makers_images']['tmp_name'], $savePath . $newImageName)) {
                         // insert data this table
                         $InsertQuery = "INSERT INTO `makers` (`makers_id`,`name`) VALUES (?,?)";
                         $db->execute_query($InsertQuery, 'ss', array($makersId, $adMakersName));


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
          $db->execute_query($updateQuery, 'ss', array($upMakersName,$upMakerId));

          //success
          $responseObject->status = 'success';
          response_sender::sendJson($responseObject);


          //only maker image update
     } else if (isset($_FILES['up_maker_img'], $_POST['up_makers_id'])) {

          //makers Request data
          $upMakersImg = $_FILES['up_maker_img'];
          $upMakerId = $_POST['up_makers_id'];



          //search image
          $fileSearch = new FileSearch($directory, $upMakerId, $fileExtensions); // Use categoryName as the search parameter
          $imagePath = $fileSearch->search();


          if (is_array($imagePath) && count($imagePath) > 0) {
               $imagePath = $imagePath[0]; // Select the first image in the array
          }


          if (is_string($imagePath) && file_exists($imagePath)) {
               if (unlink($imagePath)) {

                    //category image adding
                    if ($_FILES['up_maker_img']['error'] === 0) {
                         $fileExtension = strtolower(pathinfo($_FILES['up_maker_img']['name'], PATHINFO_EXTENSION));


                         if (in_array($fileExtension, $fileExtensions)) {

                              //new image name
                              $newImageName = $upMakerId .  "." . $fileExtension;


                              if (move_uploaded_file($_FILES['up_maker_img']['tmp_name'], $savePath . $newImageName)) {

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

if (RequestHandler::isGetMethod()) {

     //load makers table maker_id and makers_name
     $searchQuery = "SELECT * FROM `makers`";
     $resultSet = $db->query($searchQuery);

     //response array 
     $responseArray = [];

     if ($resultSet->num_rows > 0) {

          $groupedResults = []; // Create an array to group results

          while ($rowData = $resultSet->fetch_assoc()) {
               $makers_id = $rowData['makers_id']; // Use categoryName instead of category_type

               $fileSearch = new FileSearch($directory, $makers_id, $fileExtensions); // Use categoryName as the search parameter

               $searchResults = $fileSearch->search();

               $resRowDetailObject = new stdClass();

               $resRowDetailObject->maker_name = $rowData['name'];
               $resRowDetailObject->maker_id = $makers_id; // Use categoryName

               if (is_array($searchResults)) {
                    foreach ($searchResults as $searchResult) {
                         $resRowDetailObject->maker_image = $searchResult;
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
