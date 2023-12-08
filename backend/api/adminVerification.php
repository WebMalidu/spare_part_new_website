<?php
require("../model/database_driver.php");
require("../model/data_validator.php");
require("../model/passwordEncryptor.php");
require("../model/response_sender.php");
require("../model/SessionManager.php");
require("../model/mail/MailSender.php");

$responseObject = new stdClass();
$responseObject->status = "failed";

if (!isset($_GET['email'])) {
    $responseObject->error = "wrong request";
    response_sender::sendJson($responseObject);
}
$email = isset($_GET['email']) ? base64_decode($_GET['email']) : '';
$password = isset($_GET['password']) ? base64_decode($_GET['password']) : '';
$name = isset($_GET['name']) ? base64_decode($_GET['name']) : '';
$address = isset($_GET['address']) ? base64_decode($_GET['address']) : '';
$business_name = isset($_GET['business_name']) ? base64_decode($_GET['business_name']) : '';
$br_number = isset($_GET['br_number']) ? base64_decode($_GET['br_number']) : '';
$business_address = isset($_GET['business_address']) ? base64_decode($_GET['business_address']) : '';
$business_contact = isset($_GET['business_contact']) ? base64_decode($_GET['business_contact']) : '';
$private_contact = isset($_GET['private_contact']) ? base64_decode($_GET['private_contact']) : '';
$sqlDateFormat = date('Y-m-d');

$db = new database_driver();

// Check if the email already exists in the database
$searchQuery = "SELECT email FROM `user` WHERE email = ?";
$queryResult = $db->execute_query($searchQuery, 's', array($email));

// Extract the statement and the result from the queryResult array
$stmt = $queryResult['stmt'];
$result = $queryResult['result'];

// Fetch the row from the result
if ($result->num_rows > 0) {
    // The email already exists in the database, show error
?>
    <h1 style="text-align: center; color: red;">Email already exists in the database if You Register As a user You have to use Another Email</h1>
<?php
    exit;
}

$insertQuery = "INSERT INTO `admin`(`adresss`,`private_contact`,`busineess_conatact`,`buisness_address`,`br_number`,`buisness_name`) VALUES (?,?,?,?,?,?) ";
$parms = array($address,$private_contact,$business_contact,$business_address,$br_number,$business_name);
$result1 = $db->execute_query($insertQuery, 'ssssss', $parms);



$selectQuery = "SELECT * FROM `admin` ORDER BY admin_id DESC LIMIT 1";
$result = $db->query($selectQuery);

$row = $result->fetch_assoc();







$passwordEncryptor = StrongPasswordEncryptor::encryptPassword(trim($password));
$hash = $passwordEncryptor['hash'];
$salt = $passwordEncryptor['salt'];


$insertQuery = "INSERT INTO `user`(`user_type_user_type_id`,`full_name`,`email`,`password_hash`,`password_salt`,`register_date`,`user_status_u_status_id`,`admin_admin_id`) VALUES (?,?,?,?,?,?,?,?) ";
$parms = array(4, $name, $email, $hash, $salt, $sqlDateFormat, 1, $row['admin_id']);
$result1 = $db->execute_query($insertQuery, 'isssssii', $parms);




$selectQuery = "SELECT * FROM `user` WHERE email = ?";
$result2 = $db->execute_query($selectQuery, 's', [$email]);


// Fetch the row from the result
$row = $result2['result']->fetch_assoc();


//create a session
$UseerAccess = new SessionManager();
$UseerAccess->login($row);

?>
<h1 style="text-align: center; color: green;">Successfully Registerd We Inform You after Analysing Your Form </h1>
<a href="http://<?php echo $_SERVER["HTTP_HOST"] . '/../../index.php'; ?>">GO TO Home</a>