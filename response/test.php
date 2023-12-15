<?php


require_once('../backend/model/response_sender.php');
require_once('../backend/model/database_driver.php');
require_once('../backend/model/RequestHandler.php');
require_once('../backend/model/SessionManager.php');






// Create an object to manage user sessions
$userCheckSession = new SessionManager();



// Get user data
$userData = $userCheckSession->getUserData();

$database_driver=new database_driver();

$selectQuery = "SELECT * FROM `invoice` ORDER BY invoice_id DESC LIMIT 1";
$resulInvoice = $database_driver->query($selectQuery);
$rowInvoice = $resulInvoice->fetch_assoc();

$updateQuery = "UPDATE `invoice` SET `invoice_status_invoice_status_id` = ? WHERE `user_user_id` = ? && `invoice_id`=?";
$parms = [1, $userData['user_id'],$rowInvoice['invoice_id']];
$result = $database_driver->execute_query($updateQuery, 'iii', $parms);

if ($result['stmt']->affected_rows <= 0) {
   echo('data Adding Failed');
}