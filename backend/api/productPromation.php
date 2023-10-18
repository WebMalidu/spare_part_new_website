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
$selectQuery = "SELECT *
FROM `product_promotion` pp
JOIN `vehicle_parts` vp ON pp.vehicle_parts_parts_id = vp.parts_id
JOIN `parts_origin` po ON vp.parts_origin_origin_id=po.origin_id
JOIN `category_item` ci ON vp.category_item_category_item_id=ci.category_item_id
JOIN `parts_status` ps ON vp.parts_status_parts_status_id=ps.parts_status_id
JOIN `brand` br ON vp.brand_brand_id=br.brand_id
JOIN `vehicle_models` vm ON vp.vehicle_models_model_id=vm.model_id
WHERE pp.`product_promotion_status_p_promotion_status_id` = ?";


$result2 = $db->execute_query($selectQuery, 's', [1]);








// Initialize an array to store all rows
$rows = [];
 
// Fetch all rows from the result
while ($row = $result2['result']->fetch_assoc()) {
    $rows[] = $row;
}

$responseObject->data = $rows;
response_sender::sendJson($responseObject);
