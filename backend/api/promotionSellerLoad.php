<?php

// Include necessary files
require_once("../model/database_driver.php");
require_once("../model/response_sender.php");
require_once("../model/fileSearch.php");
require_once("../model/RequestHandler.php");
require_once("../model/AdvancedSearchEngine.php");
require_once("../model/data_validator.php");
require_once("../model/SessionManager.php");
require_once("../model/passwordEncryptor.php");



// Create a response object
$responseObject = new stdClass();
$responseObject->status = 'failed';

// Check if the request is a POST method
if (!RequestHandler::isPostMethod()) {
     $responseObject->error = "Invalid request";
     response_sender::sendJson($responseObject);
}

// Check if the user is logged in
$userCheckSession = new SessionManager();

// Get user data
$userData = $userCheckSession->getUserData();


$database_driver = new database_driver();

$selectQuery = "SELECT *
               FROM `product_promotion` pp
               JOIN `vehicle_parts` vp ON pp.vehicle_parts_parts_id = vp.parts_id
               JOIN `parts_origin` po ON vp.parts_origin_origin_id=po.origin_id
               JOIN `category_item` ci ON vp.category_item_category_item_id=ci.category_item_id
               JOIN `parts_status` ps ON vp.parts_status_parts_status_id=ps.parts_status_id
               JOIN `brand` br ON vp.brand_brand_id=br.brand_id
               WHERE pp.user_user_id = '" . $userData['user_id'] . "'";


// Execute the SQL query and bind user ID as a parameter
$searchResult = $database_driver->query($selectQuery);



// Include the FileSearch class (assuming it's in the same directory as this PHP file)

// Directory to search in
$directory = '../../resources/image/promotionImages/';

// Name of the file you're looking for

// File extensions to search for (you can specify multiple extensions in an array)
$fileExtensions = ['png', 'jpeg', 'jpg', 'svg'];

// Create an instance of the FileSearch class

// Perform the search



// Initialize an array to store all rows and image URLs
$rows = [];
$imageUrls = [];

// Fetch all rows from the result and store them in the 'rows' array
while ($row = $searchResult->fetch_assoc()) {
    array_push($rows, $row);

    $fileName = strval($row['promotion_id']);
    // Create an instance of the FileSearch class
    $fileSearch = new FileSearch($directory, $fileName, $fileExtensions);

    // Perform the search
    $results = $fileSearch->search();

    if (is_array($results)) {
        foreach ($results as $file) {
            $imageUrls[] = $file; // Append the image URL to the $imageUrls array
        }
    }
}

// Set the 'status' property of the response object to the 'rows' array
$responseObject->status = "success";
$responseObject->data = $rows;
$responseObject->imageUrls = $imageUrls;

// Send the JSON response using the 'response_sender' class
response_sender::sendJson($responseObject);
