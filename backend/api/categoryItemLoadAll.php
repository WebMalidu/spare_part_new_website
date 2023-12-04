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

//get data base model
$db = new database_driver();
$searchQueryAll = "SELECT * FROM `category_item` INNER JOIN `category` ON `category`.`category_id` = `category_item`.`category_category_id`";
$resultSets = $db->query($searchQueryAll);

//check row data
if ($resultSets->num_rows < 1) {
       $responseObject->error = "no row data";
       response_sender::sendJson($responseObject);
}
$responseArr = [];
while ($row = $resultSets->fetch_assoc()) {
       array_push($responseArr, $row);
}

$responseObject->status = "success";
$responseObject->result = $responseArr;
response_sender::sendJson($responseObject);
