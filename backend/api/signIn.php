<?php
require_once("../model/database_driver.php");
require_once("../model/response_sender.php");
require_once("../model/fileSearch.php");
require_once("../model/RequestHandler.php");
require_once("../model/AdvancedSearchEngine.php");
require_once("../model/data_validator.php");
require_once("../model/SessionManager.php");
require_once("../model/passwordEncryptor.php");



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



//gather data from database
$database_driver = new database_driver();
$query = "SELECT * FROM `user` WHERE email = '" . $email . "'";
$result = $database_driver->query($query);


// Fetch the row from the result
$row = $result->fetch_assoc();

if ($result->num_rows > 0) {
   
} else {

    // no row data
    $responseObject->error = "You are not user please Sign Up";
    response_sender::sendJson($responseObject);
}
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
$UseerAccess = new SessionManager();
$UseerAccess->login($row);


//send response
$responseObject->status = "success";
response_sender::sendJson($responseObject);
