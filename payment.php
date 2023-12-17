<?php

require_once('./backend/model/response_sender.php');
require_once('./backend/model/database_driver.php');
require_once('./backend/model/RequestHandler.php');
require_once('./backend/model/SessionManager.php');



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
//$checkOutData = json_decode($_POST['checkOutData']);
//$total=$checkOutData->total;



$database_driver=new database_driver();

$selectQuery = "SELECT *
               FROM `user`              
               WHERE user_id = '" . $userData['user_id'] . "'";
$resultMain=$database_driver->query($selectQuery);

if (!$resultMain->num_rows > 0) {
    $responseObject->error="Please Complete Your User data";
    response_sender::sendJson($responseObject);

}
$checkOutData=json_decode($_POST['checkOutData']);
$pay=$checkOutData->total;


$rowMain = $resultMain->fetch_assoc();

$selectQuery = "SELECT *
               FROM `shipping_details`              
               WHERE user_user_id = '" . $userData['user_id'] . "'";
$resultCore=$database_driver->query($selectQuery);

if (!$resultCore->num_rows > 0) {
    $responseObject->error="Please Complete Shipping Details";
    response_sender::sendJson($responseObject);

}


$rowCore = $resultCore->fetch_assoc();

$firstname = $rowMain['full_name'];
$lastname = $rowMain['last_name'];
$email = $rowMain['email'];
$contact = $rowCore['mobile']; // Ensure phone number format includes country code
$studentId = $rowMain['user_id'];
$uniqueId = uniqid();

$requiredLength = rand(10, 20);

$finalUniqueId = substr(str_replace('.', '', $uniqueId), 0, $requiredLength);

$reference = $finalUniqueId;

$app_id = "63LQ118C361760596F3B4";
$hash_salt = "JLSQ118C361760596F3DA";
$app_token = "d99952811c081c3710db9c917105f991396f9400b654c3c77a5216b9fc7277b2f6711e2064ed46b8.UB3E118C361760596F407";

$onepay_args = array(

    "amount" => $pay, //only upto 2 decimal points
    "currency" => "LKR", //LKR OR USD
    "app_id" => $app_id,
    "reference" => "{$reference}", //must have 10 or more digits , spaces are not allowed
    "customer_first_name" => $firstname, // spaces are not allowed
    "customer_last_name" => $lastname, // spaces are not allowed
    "customer_phone_number" => $contact, //must start with +94, spaces are not allowed
    "customer_email" => $email, // spaces are not allowed
    "transaction_redirect_url" => "http://" . $_SERVER["HTTP_HOST"] . '/response/response.php',
    "additional_data" => "sample" //only support string, spaces are not allowed, this will return in response also
);

$data = json_encode($onepay_args, JSON_UNESCAPED_SLASHES);

$data_json = $data . "" . $hash_salt;

$hash_result = hash('sha256', $data_json);

$curl = curl_init();

$url = 'https://merchant-api-live-v2.onepay.lk/api/ipg/gateway/request-payment-link/?hash=';
$url .= $hash_result;

curl_setopt_array($curl, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => $data,
    CURLOPT_HTTPHEADER => array(
        'Authorization:' . "" . $app_token,
        'Content-Type:application/json'
    ),
));

$response = curl_exec($curl);

curl_close($curl);

$result = json_decode($response, true);

if (isset($result['data']['gateway']['redirect_url'])) {

    $re_url = $result['data']['gateway']['redirect_url'];
    $responseObject->status="success";
    $responseObject->data=$re_url;
    response_sender::sendJson($responseObject);


  //  header('Location: ' . $re_url, true, $permanent ? 301 : 302);

} else {

    echo $result['message'];
    echo var_dump($result);
}


