<?php

// Include necessary files
require_once("../../backend/model/database_driver.php");
require_once("../../backend/model/response_sender.php");
require_once("../../backend/model/fileSearch.php");
require_once("../../backend/model/RequestHandler.php");
require_once("../../backend/model/SessionManager.php");

// Create a response object
$responseObject = new stdClass();
$responseObject->status = 'failed';

// Check if the request is a POST method
if (!RequestHandler::isPostMethod()) {
     $responseObject->error = "Invalid request";
     response_sender::sendJson($responseObject);
}




$database_driver = new database_driver();

$selectQuery = "SELECT *
               FROM `product_promotion` pp
               JOIN `vehicle_parts` vp ON pp.vehicle_parts_parts_id = vp.parts_id
               JOIN `parts_origin` po ON vp.parts_origin_origin_id=po.origin_id
               JOIN `category_item` ci ON vp.category_item_category_item_id=ci.category_item_id
               JOIN `parts_status` ps ON vp.parts_status_parts_status_id=ps.parts_status_id
               JOIN `brand` br ON vp.brand_brand_id=br.brand_id
               WHERE pp.`product_promotion_status_p_promotion_status_id` = ?";


// Execute the SQL query and bind user ID as a parameter
$searchResult = $database_driver->execute_query($selectQuery, 'i', array(1));



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
while ($row = $searchResult['result']->fetch_assoc()) {
    $rows[] = $row;

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





