<?php

// admin signIn Process
// by Madusha Pravinda
// version - 1.0.0
// 22-11-2023

//include models
require_once("../../backend/model/database_driver.php");
require_once("../../backend/model/response_sender.php");
require_once("../../backend/model/SessionManager.php");
require_once("../../backend/model/passwordEncryptor.php");


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

$email = $_POST["mobile"];
$password = $_POST["password"];



//gather data from database
$database_driver = new database_driver();
$query = "SELECT * FROM `user` WHERE email = '" . $email . "'";
$result = $database_driver->query($query);

if ($result->num_rows < 1) {
    // no row data
    $responseObject->error = "You are not admin please Sign Up";
    response_sender::sendJson($responseObject);
}
// Fetch the row from the result
$row = $result->fetch_assoc();


// Extract the data values
$userEmail = $row['email'];
$password_hash = $row['password_hash'];
$password_salt = $row['password_salt'];

//check acess by comparing
if (!PasswordHashVerifier::isValid($password, $password_salt, $password_hash)) {
    $responseObject->error = "incorrect password";
    response_sender::sendJson($responseObject);
};


if ($row['user_type_user_type_id'] != 2 && $row['user_type_user_type_id'] != 3) {
    // Code block
    $responseObject->status = 'failed';
    response_sender::sendJson($responseObject);
}

//create a session
$UseerAccess = new SessionManager("alg006_admin");
$UseerAccess->login($row);
$responseObject->status = "success";
response_sender::sendJson($responseObject);
