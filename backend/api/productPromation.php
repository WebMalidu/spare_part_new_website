<?php
require("../model/database_driver.php");
require("../model/data_validator.php");
require("../model/passwordEncryptor.php");
require("../model/response_sender.php");
require("../model/user_access_updater.php");
require("../model/mail/MailSender.php");

// Response object
$responseObject = new stdClass();
$responseObject->status = "failed";

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    $responseObject->error = "invalid access";
    response_sender::sendJson($responseObject);
}

// Database instance
$db = new database_driver();

// Load order data
$selectQuery = "SELECT * FROM `product_promotion` WHERE product_promotion_status_p_promotion_status_id = ?";
$result2 = $db->execute_query($selectQuery, 's', [1]);

// Initialize an array to store all rows
$rows = [];
 
// Fetch all rows from the result
while ($row = $result2['result']->fetch_assoc()) {
    $rows[] = $row;
}

$responseObject->data = $rows;
response_sender::sendJson($responseObject);
