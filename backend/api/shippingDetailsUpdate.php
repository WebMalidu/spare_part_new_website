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


// Decode the POST data to get the promotion ID
$shippingData = json_decode($_POST['shippingData']);
$username = $shippingData->username;
$phoneNumber = $shippingData->phoneNumber;
$postalCode = $shippingData->postalCode;
$addressLine1 = $shippingData->addressLine1;
$addressLine2 = $shippingData->addressLine2;
$city = $shippingData->city;
$district = $shippingData->district;
$province = $shippingData->province;







$database_driver=new database_driver();

// Assuming $addressLine1, $addressLine2, $phoneNumber, $postalCode, $username, $userData['user_id'], $district, $city, and $province contain the respective values needed for insertion.

// Check if the email already exists in the database
$searchQuery = "SELECT * FROM `shipping_details` WHERE user_user_id = '" . $userData['user_id'] . "'";
$queryResult = $database_driver->query($searchQuery);

// Extract the statement and the result from the queryResult array
//$stmt = $queryResult['stmt'];
$result = $queryResult;

// Fetch the row from the result
if ($result->num_rows < 0) {
    // The email already exists in the database, show error
$responseObject->error="Data not added yet Please Click save button to add";
response_sender::sendJson($responseObject);
}

$insertQuery = "UPDATE `shipping_details` SET 
`address_line_1` = '$addressLine1',
`address_line_2` = '$addressLine2',
`mobile` = '$phoneNumber',
`postal_code` = '$postalCode',
`user_name` = '$username',
`district_district_id` = '$district',
`city` = '$city',
`province_province_id` = '$province'
WHERE user_user_id = '" . $userData['user_id'] . "'";

$result = $database_driver->query($insertQuery);







$responseObject->status="success";
response_sender::sendJson($responseObject);
