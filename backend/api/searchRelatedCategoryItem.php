<?php
require_once("../model/response_sender.php");
require_once("../model/AdvancedSearchEngine.php");
require_once("../model/RequestHandler.php");

// headers
header("Content-Type: application/json; charset=UTF-8");

//response object
$responseObject = new stdClass();
$responseObject->status = 'failed';

if (!RequestHandler::isPostMethod()) {
       $responseObject->error = 'Access denied';
       response_sender::sendJson($responseObject);
}

$searchTeams = $_POST['search_teams'];

$advanceSearch = new AdvancedSearchEngine();
$result = $advanceSearch->searchProducts($searchTeams);

if (is_array($result)) {
       $responseObject->status = 'success';
       $responseObject->result = $result;
       response_sender::sendJson($responseObject);
} else {
       $responseObject->error = 'No Product Available';
       response_sender::sendJson($responseObject);
}
