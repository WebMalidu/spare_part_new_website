<?php
require("../model/database_driver.php");
require("../model/data_validator.php");
require("../model/passwordEncryptor.php");
require("../model/response_sender.php");
require("../model/user_access_updater.php");
require("../model/mail/MailSender.php");


$responseObject = new stdClass();
$responseObject->status = "failed";


if($_SERVER['REQUEST_METHOD']!='POST'){
    $responseObject->error="invalid aucess";
    response_sender::sendJson($responseObject);
}

if(!isset($_POST['signInData'])){
    $responseObject->error="empty json";
    response_sender::sendJson($responseObject);
}
//gather inputs
$signInData=json_decode($_POST['signInData']);

$email = trim($signInData->email);
$password = trim($signInData->password);


//validate inputs
if (empty($email) || empty($password)) {
    $responseObject->error = "empty input values";
    response_sender::sendJson($responseObject);
}
$validateReadyObject = new stdClass();
$emailObject = new stdClass();
$emailObject->datakey = 'email1';
$emailObject->value = $email;


$validateReadyObject->email = array($emailObject);

$data_validator = new data_validator($validateReadyObject);
//echo(json_encode($data_validator->validate()));

$emailvalidate = $data_validator->validate();
if (!$emailvalidate->email1 == null) {
    $responseObject->error = "email ias not correct format";
    response_sender::sendJson($responseObject);
};


//gather data from database
$database_driver = new database_driver();
$query = "SELECT * FROM `user` WHERE email = ?";
$result = $database_driver->execute_query($query, 's', [$email]);


// Fetch the row from the result
$row = $result['result']->fetch_assoc();

// Extract the data values
$userEmail = $row['email'];
$password_hash = $row['password_hash'];
$password_salt = $row['password_salt'];

//check acess by comparing
if (!PasswordHashVerifier::isValid($password, $password_salt, $password_hash)) {
    $responseObject->error = "incorrect password";
    response_sender::sendJson($responseObject);
};



//create a session
$UseerAccess = new UserAccess();
$UseerAccess->login($row);


//send response
$responseObject->status = "success";
response_sender::sendJson($responseObject);
