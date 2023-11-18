<?php
//dev by madusha
//04-11-2023

//include models
require_once("../model/database_driver.php");
require_once("../model/response_sender.php");
require_once("../model/RequestHandler.php");

// headers
header("Content-Type: application/json; charset=UTF-8");

//response object
$responseObject = new stdClass();
$responseObject->status = 'failed';

// get database
$db = new database_driver();


//get reqest data load
if (RequestHandler::isGetMethod()) {
     // load all data in a data table
     $searchDataBase = "SELECT * FROM `parts_origin`";
     $result = $db->query($searchDataBase);

     $resultArray = [];
     //search data form table
     if ($result->num_rows > 0) {
          while ($value = $result->fetch_assoc()) {
               array_push($resultArray, $value);
          }

          //if send a response result
          $responseObject->status = "success";
          $responseObject->result = $resultArray;
          response_sender::sendJson($responseObject);
     } else {

          // no row data
          $responseObject->error = "no row data";
          response_sender::sendJson($responseObject);
     }
}
