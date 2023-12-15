<?php

require_once('../backend/model/response_sender.php');
require_once('../backend/model/database_driver.php');
require_once('../backend/model/RequestHandler.php');
require_once('../backend/model/SessionManager.php');


$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, TRUE);
$transactionId = $input['transaction_id'];
$status = $input['status'];

if ($status == 1) {
   // Your existing code here...
   // Create an object to manage user sessions
   $userCheckSession = new SessionManager();



   // Get user data
   $userData = $userCheckSession->getUserData();

   $database_driver = new database_driver();

   $selectQuery = "SELECT * FROM `invoice` ORDER BY invoice_id DESC LIMIT 1";
   $resulInvoice = $database_driver->query($selectQuery);
   $rowInvoice = $resulInvoice->fetch_assoc();

   $updateQuery = "UPDATE `invoice` SET `invoice_status_invoice_status_id` = ? WHERE `user_user_id` = ? && `invoice_id`=?";
   $parms = [1, $userData['user_id'], $rowInvoice['invoice_id']];
   $result = $database_driver->execute_query($updateQuery, 'iii', $parms);

   if ($result['stmt']->affected_rows <= 0) {
      $message = 'Data Adding Failed';
      $messageClass = 'error'; // CSS class for error messages
   } else {
      $message = 'Order Success';
      $messageClass = 'success'; // CSS class for success messages
   }
} else {
   $message = 'Payment Unsuccessful. If you have any questions, please contact us.';
   $messageClass = 'error'; // CSS class for error messages
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <title>Transaction Response</title>
   <style>
      body {
         font-family: Arial, sans-serif;
         background-color: #f4f4f4;
         margin: 0;
         padding: 20px;
      }

      .message {
         padding: 10px;
         margin-bottom: 15px;
         border-radius: 5px;
      }

      .success {
         background-color: #d4edda;
         color: #155724;
      }

      .error {
         background-color: #f8d7da;
         color: #721c24;
      }
   </style>
</head>

<body>
   <div class="message <?php echo $messageClass; ?>">
      <p>Transaction ID: <?php echo $transactionId; ?></p>
      <p><?php echo $message; ?></p>
   </div>
</body>


</html>