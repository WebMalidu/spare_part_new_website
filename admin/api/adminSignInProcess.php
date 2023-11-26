<?php

// admin signIn Process
// by Madusha Pravinda
// version - 1.0.0
// 22-11-2023

//include models
require_once("../../backend/model/database_driver.php");
require_once("../../backend/model/response_sender.php");
require_once("../../backend/model/SessionManager.php");

// headers
header("Content-Type: application/json; charset=UTF-8");

//response object
$responseObject = new stdClass();
$responseObject->status = 'failed';

//handle the request
if (!isset($_POST['password']) || !isset($_POST['mobile'])) {
    $responseObject->status = "invalid request";
    response_sender::sendJson($responseObject);
}

$mobile = $_POST["mobile"];
$password = $_POST["password"];

// db connection
$db = new database_driver();

$search_quary = "SELECT * FROM `admin` WHERE `mobile`='" . $mobile . "' AND `password`='" . $password . "'";
$db_response = $db->query($search_quary);


if ($db_response->num_rows == 1) {
    $row = $db_response->fetch_assoc();

    $userAccess = new SessionManager("alg006_admin");
    $userAccess->login($row);

    $responseObject->status = "success";
    response_sender::sendJson($responseObject);
}

$responseObject->status = 'failed';
response_sender::sendJson($responseObject);
