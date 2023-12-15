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

$checkOutData = json_decode($_POST['checkOutData']);
$total=$checkOutData->total;
$shipping=$checkOutData->shipping;


// Generate a random letter (A-Z)
$randomLetter = chr(rand(65, 90)); // ASCII values for uppercase letters (A-Z)

// Generate a random four-digit number
$randomNumber = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);

// Construct the unique ID in the specified format
//$invoiceId = "invoiceId_" . $randomLetter . $randomNumber;
$orderId = "orderId_" . $randomLetter . $randomNumber;





$database_driver=new database_driver();

$selectQuery="SELECT * FROM `shipping_details` WHERE `user_user_id`=?" ;
$result=$database_driver->execute_query($selectQuery,'i',array($userData['user_id']));

if (!$result['result']->num_rows > 0) {
    $responseObject->error="Please Fill Shipping Details";
    response_sender::sendJson($responseObject);
}
$insertQuery="INSERT INTO `invoice`(`pay_total_amout`,`shipping_price`,`order_id`,`invoice_status_invoice_status_id`,`user_user_id`,`delivery_date`) VALUES (?,?,?,?,?,?)";
$result=$database_driver->execute_query($insertQuery,'sssiis',array($total,$shipping,$orderId,2,$userData['user_id'],'Not Set'));

$selectQuery = "SELECT * FROM `invoice` ORDER BY invoice_id DESC LIMIT 1";
$resulInvoice = $database_driver->query($selectQuery);
$rowInvoice = $resulInvoice->fetch_assoc();

$selectQuery = "SELECT *
               FROM `cart` ct
               JOIN `vehicle_parts` vp ON ct.vehicle_parts_parts_id = vp.parts_id
               JOIN `parts_origin` po ON vp.parts_origin_origin_id=po.origin_id
               JOIN `category_item` ci ON vp.category_item_category_item_id=ci.category_item_id
               JOIN `parts_status` ps ON vp.parts_status_parts_status_id=ps.parts_status_id
               JOIN `brand` br ON vp.brand_brand_id=br.brand_id
               LEFT JOIN `product_promotion` pp ON vp.parts_id = pp.vehicle_parts_parts_id
               WHERE ct.`user_user_id` = ?";

$result = $database_driver->execute_query($selectQuery, 'i', array($userData['user_id']));

// Check if the query returned any rows
if ($result['result']->num_rows > 0) {
    $rows = [];

    // Fetch all rows and store them in the $rows array
    while ($row = $result['result']->fetch_assoc()) {
        $rows[] = $row;

        // Insert each row into the `invoice_item` table
        $insertQuery = "INSERT INTO `invoice_item`(`qty`, `total_item_price`, `vh_parts_name`, `vh_parts_id`, `invoice_invoice_id`) VALUES (?,?,?,?,?)";
        $insertResult = $database_driver->execute_query($insertQuery, 'iissi', array(1, $row['price'], $row['title'], $row['parts_id'], $rowInvoice['invoice_id']));

        
    }

    // If everything goes well, set the success status and send response
    $responseObject->status = "success";
    $responseObject->data = $rows;
    response_sender::sendJson($responseObject);
} else {
    // If no rows were returned from the query
    $responseObject->error = "No data found in the query result.";
    response_sender::sendJson($responseObject);
}
