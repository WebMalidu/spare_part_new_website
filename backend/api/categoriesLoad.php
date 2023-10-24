<?php
//category load API
//by madusha pravinda
//version - 1.0.0
//11-10-2023

//include models
require_once("../model/database_driver.php");
require_once("../model/response_sender.php");
require_once("../model/fileSearch.php");
require_once("../model/RequestHandler.php");

// headers
header("Content-Type: application/json; charset=UTF-8");

//response object
$responseObject = new stdClass();
$responseObject->status = 'failed';
     
//handle the request
if (!RequestHandler::isGetMethod()) {
     $responseObject->error = "invalid request";
     response_sender::sendJson($responseObject);
}

// validate request
if (RequestHandler::getMethodHasError("categoryCount")) {
    $responseObject->error = "Invalid Request";
    response_sender::sendJson($responseObject);
}

// catch inputs
$categoryCount = (isset($_GET['categoryCount']) ? $_GET['categoryCount'] : null);

//get data base model
$db = new database_driver();
$searchQuery = "SELECT * FROM `category` LIMIT $categoryCount";
$resultSet = $db->query($searchQuery);



//response array 
$responseArray = [];

// image manager
$directory = "../../frontend/resources/image/categoryImages";
$fileExtensions = ['png', 'jpeg', 'jpg', 'svg'];


if ($resultSet->num_rows > 0) {

     $groupedResults = []; // Create an array to group results

     while ($rowData = $resultSet->fetch_assoc()) {
          $categoryId = $rowData['category_id']; // Use categoryName instead of category_type

          $fileSearch = new FileSearch($directory, $categoryId, $fileExtensions); // Use categoryName as the search parameter

          $searchResults = $fileSearch->search();

          $resRowDetailObject = new stdClass();

          $resRowDetailObject->category_type = $rowData['category'];
          $resRowDetailObject->category_id = $categoryId; // Use categoryName

          if (is_array($searchResults)) {
               foreach ($searchResults as $searchResult) {
                    $resRowDetailObject->category_image = $searchResult;
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

