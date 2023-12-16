<?php
//category Item adding API
//by madusha pravinda
//version - 1.0.0
//15-12-2023

//include models
require_once("../../backend/model/database_driver.php");
require_once("../../backend/model/response_sender.php");
require_once("../../backend/model/fileSearch.php");
require_once("../../backend/model/RequestHandler.php");
require_once("../../backend/model/SessionManager.php");
require_once("../../backend/model/data_validator.php");


// headers
header("Content-Type: application/json; charset=UTF-8");

//response object
$responseObject = new stdClass();
$responseObject->status = 'failed';


//handle the request
if (!RequestHandler::isPostMethod()) {
       $responseObject->error = "invalid request";
       response_sender::sendJson($responseObject);
}

// chekcing is user logging
// $userCheckSession = new SessionManager();
// if (!$userCheckSession->isLoggedIn() || !$userCheckSession->getUserData()) {
//        $responseObject->error = 'Please Login';
//        response_sender::sendJson($responseObject);
// }

if (!isset($_POST['category_item_id'])) {
       $responseObject->error = 'Access denied';
       response_sender::sendJson($responseObject);
}

$categoryItemId = $_POST['category_item_id'];
$directory = "../../resources/image/categoryItemImages/";
$fileExtensions = ['png', 'jpeg', 'jpg', 'svg'];

//database object
$db = new database_driver();

try {
       $deleteQuery = "DELETE FROM `category_item` WHERE `category_item_id`='" . $categoryItemId . "'";
       $db->query($deleteQuery);

       //search image
       $fileSearch = new FileSearch($directory, $categoryItemId, $fileExtensions); // Use model image parameters
       $imagePath = $fileSearch->search();

       $relatedImage = $imagePath[0];
       if (!$relatedImage) {
              $responseObject->error = "cant find image";
              response_sender::sendJson($responseObject);
       }

       unlink($relatedImage);

       $responseObject->status = "success";
       response_sender::sendJson($responseObject);
} catch (mysqli_sql_exception $ex) {
       $responseObject->error = "Cannot delete this product catalog because it is still being used by a vehicle parts";
       response_sender::sendJson($responseObject);
}
