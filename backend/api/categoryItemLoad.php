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

//check method 
if (!isset($_GET['category_id']) && !isset($_GET['count'])) {
     $responseObject->error = 'Access denied';
     response_sender::sendJson($responseObject);
}

$categoryId = $_GET['category_id'];
$count = $_GET['count'];



//get data base model
$db = new database_driver();
$searchQueryAll = "SELECT * FROM `category_item` WHERE `category_category_id`=?";
$resultSets = $db->execute_query($searchQueryAll, 's', [$categoryId]);

echo "test";
// $num = $resultSets['result']->num_rows;
// $perPageCount = 12;
// $pageCount = 0;

// $pageCount = ceil($num / $perPageCount);
// $responseObject->countPage = $pageCount;

// $pageOffset = $perPageCount * $count;

// $searchQuery = "SELECT * FROM `category_item` WHERE `category_category_id`=? LIMIT " . $perPageCount . " OFFSET " . $pageOffset;
// $resultSet = $db->execute_query($searchQuery, 's', array($categoryId));

// //response array 
// $responseArray = [];

// // image manager
// $directory = "../../resources/image/categoryItemImages";
// $fileExtensions = ['png', 'jpeg', 'jpg', 'svg'];


// if ($resultSet['result']->num_rows > 0) {

//      $groupedResults = []; // Create an array to group results

//      while ($rowData = $resultSet['result']->fetch_assoc()) {
//           $categoryItemId = $rowData['category_item_id']; // Use categoryName instead of category_type

//           $fileSearch = new FileSearch($directory, $categoryItemId, $fileExtensions); // Use categoryName as the search parameter

//           $searchResults = $fileSearch->search();

//           $resRowDetailObject = new stdClass();

//           $resRowDetailObject->category_Item_type = $rowData['category_item_name'];
//           $resRowDetailObject->category_id = $rowData['category_category_id'];
//           $resRowDetailObject->category_Item_id = $categoryItemId; // Use categoryName

//           if (is_array($searchResults)) {
//                foreach ($searchResults as $searchResult) {
//                     $resRowDetailObject->category_image = $searchResult;
//                }
//           } else {
//                $responseObject->error = $searchResults;
//                response_sender::sendJson($responseObject);
//           }

//           array_push($responseArray, $resRowDetailObject);
//      }
//      $responseObject->status = 'success';
//      $responseObject->results = $responseArray;
//      response_sender::sendJson($responseObject);
// } else {
//      $responseObject->error = 'no row data';
//      response_sender::sendJson($responseObject);
// }
