<?php
require("../model/database_driver.php");
require("../model/data_validator.php");
require("../model/passwordEncryptor.php");
require("../model/response_sender.php");
require("../model/SessionManager.php");
require("../model/mail/MailSender.php");

$responseObject=new stdClass();
$responseObject->status="failed";

if (!isset($_GET['email'])) {
    $responseObject->error="wrong request";
    response_sender::sendJson($responseObject);
}
    $encrpt_password = $_GET['password'];
    $encrpt_email = $_GET['email'];
    $first_name=$_GET['first_name'];
    $password = base64_decode($encrpt_password);
    $email = base64_decode($encrpt_email);
    $first_name = base64_decode($first_name);
    $sqlDateFormat = date('Y-m-d');

    $db=new database_driver();

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
        <h1 style="text-align: center; color: red;">Email already exists in the database</h1>
    <?php
        exit;
    }

    $passwordEncryptor = StrongPasswordEncryptor::encryptPassword(trim($password));
$hash = $passwordEncryptor['hash'];
$salt = $passwordEncryptor['salt'];


    $insertQuery="INSERT INTO `user`(`user_type_user_type_id`,`full_name`,`email`,`password_hash`,`password_salt`,`register_date`,`user_status_u_status_id`,`admin_admin_id`) VALUES (?,?,?,?,?,?,?,?) ";
    $parms=array(1,$first_name,$email,$hash,$salt,$sqlDateFormat,1,1);
    $result1=$db->execute_query($insertQuery,'isssssii',$parms);

   


    $selectQuery = "SELECT * FROM `user` WHERE email = ?";
    $result2 = $db->execute_query($selectQuery, 's', [$email]);


    // Fetch the row from the result
    $row = $result2['result']->fetch_assoc();


    //create a session
    $UseerAccess = new SessionManager();
    $UseerAccess->login($row);

    ?>
    <h1 style="text-align: center; color: green;">Successfully Signed Up <?php echo $_SERVER["HTTP_HOST"]  ?></h1>
    <a href="http://<?php echo $_SERVER["HTTP_HOST"] . '/../../index.php'; ?>">GO TO Home</a>
