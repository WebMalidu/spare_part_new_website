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






// Decode the POST data to get the promotion ID
$singlePromtionLoad = json_decode($_POST['singlePromotionLoad']);
$promotionId = $singlePromtionLoad->promotionId;

// Create a database driver instance for database operations
$database_driver = new database_driver();

// SQL query to fetch promotion details and related data
$selectQuery = "SELECT *
               FROM `product_promotion` pp
               JOIN `vehicle_parts` vp ON pp.vehicle_parts_parts_id = vp.parts_id
               JOIN `parts_origin` po ON vp.parts_origin_origin_id=po.origin_id
               JOIN `category_item` ci ON vp.category_item_category_item_id=ci.category_item_id
               JOIN `parts_status` ps ON vp.parts_status_parts_status_id=ps.parts_status_id
               JOIN `brand` br ON vp.brand_brand_id=br.brand_id
               WHERE pp.`promotion_id` = ?";

// Execute the query to retrieve data
$searchResult = $database_driver->execute_query($selectQuery, 'i', array($promotionId));

// Define directory and file extensions for promotion images
$directory = '../../resources/image/promotionImages';
$fileExtensions = ['png', 'jpeg', 'jpg', 'svg'];

// Arrays to store query results and image URLs
$rows = [];
$imageUrls = [];

// Loop through the query results and retrieve image URLs
while ($row = $searchResult['result']->fetch_assoc()) {
    $rows[] = $row;
    $fileName = strval($row['promotion_id']);
    $fileSearch = new FileSearch($directory, $fileName, $fileExtensions);
    $results = $fileSearch->search();

    // Store the image URL in the array
    foreach ($results as $file) {
        $imageUrls = $file;
    }
}

// Update the response object with success status and data
$responseObject->status = "success";
$responseObject->data = $rows;
$responseObject->imageUrls = $imageUrls;

// Send the JSON response
response_sender::sendJson($responseObject);
