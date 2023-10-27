<?php
// Include necessary files for database connection and response handling
require_once("../../backend/model/database_driver.php");
require_once("../../backend/model/response_sender.php");
require_once("../../backend/model/fileSearch.php");
require_once("../../backend/model/RequestHandler.php");
require_once("../../backend/model/SessionManager.php");

// Create an object to store the response data
$responseObject = new stdClass();
$responseObject->status = 'failed';

// Check if the request method is POST
if (!RequestHandler::isPostMethod()) {
    $responseObject->error = "Invalid request";
    response_sender::sendJson($responseObject);
}

// Create an object to manage user sessions
$userCheckSession = new SessionManager();

// Check if the user is logged in and user data is available
if (!$userCheckSession->isLoggedIn() || !$userCheckSession->getUserData()) {
    $responseObject->error = 'Please Login';
    response_sender::sendJson($responseObject);
}

// Get user data
$userData = $userCheckSession->getUserData();




$database_driver=new database_driver();

// Directory to search in
$directory = '../../resources/image/userImages/';

// Name of the file you're looking for

// File extensions to search for (you can specify multiple extensions in an array)
$fileExtensions = ['png', 'jpeg', 'jpg', 'svg'];


$selectQuery = "SELECT *
               FROM `user` ur
               JOIN `user_type` ut ON ur.user_type_user_type_id = ut.user_type_id
               JOIN `user_status` us ON ur.user_status_u_status_id=us.u_status_id
               WHERE ur.`user_id` = ?";
$result=$database_driver->execute_query($selectQuery,'i',array($userData['user_id']));

$rows=[];
$imageUrls=[];
while ($row = $result['result']->fetch_assoc()) {
    $rows=$row;
    $fileName=strval($userData['user_id']);

    $fileSearch = new FileSearch($directory, $fileName, $fileExtensions);


    // Perform the search if there is a profile image
    $results = $fileSearch->search(); 
    if(!$results){
        foreach($results as $file){
            $imageUrls=$file;
       }

    }
    
    
}
$responseObject->status="sucess";
$responseObject->data=$rows;
$responseObject->imageUrls=$imageUrls;

response_sender::sendJson($responseObject);