<?php
//dev by madusha
//18-10-2023

//include models
require_once("../model/database_driver.php");
require_once("../model/response_sender.php");
require_once("../model/fileSearch.php");
require_once("../model/RequestHandler.php");
require_once("../model/AdvancedSearchEngine.php");
require_once("../model/data_validator.php");
require_once("../model/SessionManager.php");

// headers
header("Content-Type: application/json; charset=UTF-8");

//response object
$responseObject = new stdClass();
$responseObject->status = 'failed';

//engine require
$searchEngine = new AdvancedSearchEngine();

$db = new database_driver();

// pagenation
// $num = $resultSets->num_rows;
// $perPageCount = 12;
// $pageCount = 0;

// $pageCount = ceil($num / $perPageCount);
// $responseObject->countPage = $pageCount;

// $pageOffset = $perPageCount * $count;

//handle the request
//single product load and all product load 
//you want to parse GET method
//if you load single product required vh_model_id or vh_category_item_id a other 2 are optional
if (RequestHandler::isGetMethod()) {

     //load single product
     //check our parameters

     if (isset($_GET['vh_model_has_id']) && isset($_GET['vh_category_item_id'])) {
          $vehicleModelId = $_GET['vh_model_has_id'];
          $vehicleCategoryItemId = $_GET['vh_category_item_id'];
          $vehiclePartsOriginId = $_GET['vh_origin_id'];
          $vehiclePartsStatusId = $_GET['vh_status_id'];
          // $count = $_GET['count'];

          //advance sigle product load 
          $responseDataArray = $searchEngine->searchRelatedProductCatalog($vehiclePartsOriginId, $vehiclePartsStatusId, $vehicleModelId, $vehicleCategoryItemId);
          //validation
          if (count($responseDataArray) === 0) {

               $responseObject->error = "no row data";
               response_sender::sendJson($responseObject);
          }
          //row data
          $responseObject->status = "success";
          $responseObject->result = $responseDataArray;
          response_sender::sendJson($responseObject);

          //single product load
     } else if (isset($_GET['product_id'])) {

          //click product id
          $product_id = $_GET['product_id'];

          //advance search engin single product load
          $responseDataArray = $searchEngine->loadSingleProduct($product_id);

          if (count($responseDataArray) === 0) {
               $responseObject->error = "no row data";
               response_sender::sendJson($responseObject);
          }

          //row data
          $responseObject->status = "success";
          $responseObject->result = $responseDataArray;
          response_sender::sendJson($responseObject);
     } else {
          // we can load all product in this
          $result = $searchEngine->searchAllProduct();
          //rows data
          $responseObject->status = "success";
          $responseObject->result = $result;
          response_sender::sendJson($responseObject);
     }
} else if (RequestHandler::isPostMethod()) {


     //get user into the session
     $userCheckSession = new SessionManager("alg006_admin");
     if (!$userCheckSession->isLoggedIn() || !$userCheckSession->getUserData()) {
          $responseObject->error = 'Please Login';
          response_sender::sendJson($responseObject);
     }
     $userData = $userCheckSession->getUserData();
     $userId = $userData['user_id'];

     //data insert Update Delete
     //data insert parameters
     //$ad_title,$ad_origin_id,$ad_qty,$ad_description,$ad_price,$ad_brand_id,$ad_model_id,$ad_category_id 
     if (isset($_POST['insertData'],)) {

          $insertData = json_decode($_POST['insertData']);


          $ad_title = $insertData->ad_title;
          $ad_origin_id = $insertData->ad_origin_id;
          $ad_qty = $insertData->ad_qty;
          $ad_description = $insertData->ad_description;
          $ad_price = $insertData->ad_price;
          $ad_brand_id = $insertData->ad_brand_id;
          $ad_model_id = $insertData->ad_model_id;
          $ad_category_id = $insertData->ad_category_id;
          $shipping_price = $insertData->shipping_price;

          //data validation
          $validateReadyObject = (object) [
               "string_or_null" => [
                    (object) ["datakey" => "title", "value" => $ad_title],
                    (object) ["datakey" => "category", "value" => $ad_category_id]
               ],
               "int_or_null" => [
                    (object) ["datakey" => "origin", "value" => $ad_origin_id],
                    (object) ["datakey" => "quantity", "value" => $ad_qty],
                    (object) ["datakey" => "brand", "value" => $ad_brand_id],
                    (object) ["datakey" => "model", "value" => $ad_model_id],
               ],
               "price" => [
                    (object) ["datakey" => "price", "value" => $ad_price],
                    (object) ["datakey" => "shipping price", "value" => $shipping_price],
               ],
               "text_255" => [
                    (object) ["datakey" => "description", "value" => $ad_description]
               ],
          ];

          //validation
          $validator = new data_validator($validateReadyObject);
          $errors = $validator->validate();
          foreach ($errors as $key => $value) {
               if ($value) {
                    $responseObject->error = "Invalid Input for : " . $key;
                    response_sender::sendJson($responseObject);
               }
          }


          //get data in by variables
          //partsId Generator 
          $partsId = 'pp_' . str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);

          // search first the product already have this product
          $searchProduct = "SELECT * FROM `vehicle_parts` WHERE  `title`='" . $ad_title . "' AND `user_user_id`='" . $userId . "' AND `brand_brand_id`='" . $ad_brand_id . "' AND `vehicle_models_has_modification_line_mdu_id`='" . $ad_model_id . "' AND `category_item_category_item_id`='" . $ad_category_id . "'";
          $result = $db->query($searchProduct);

          //if 1 result code exit
          if ($result->num_rows > 0) {
               $responseObject->error = "oops! this product already added";
               response_sender::sendJson($responseObject);
          }

          //php date object
          date_default_timezone_set('Asia/Colombo');
          $currentDate = date('Y-m-d');

          //query
          $query = "INSERT INTO `vehicle_parts` 
          (`parts_id`,`title`,`parts_origin_origin_id`,`qty`,`description`,`addedd_date`,`user_user_id`,`price`,`parts_status_parts_status_id`,`brand_brand_id`,`category_item_category_item_id`,`vehicle_models_has_modification_line_mdu_id`,`shipping_price`)
          VALUES ('" . $partsId . "','" . $ad_title . "','" . $ad_origin_id . "','" . $ad_qty . "','" . $ad_description . "','" . $currentDate . "','" . $userId . "','" . $ad_price . "','1','" . $ad_brand_id . "','" . $ad_category_id . "','" . $ad_model_id . "','" . $shipping_price . "')";
          //insert data
          $db->query($query);

          // // parts images Upload
          $imageArray = $insertData->ad_parts_img;
          $imageUrls = [];


          // Loop through each uploaded file
          $countIndex = 1;
          foreach ($imageArray as  $value) {
               if ($value) {
                    // files manage 
                    // Remove the "data:image/jpeg;base64," part to get the base64 data
                    $base64Data = substr($value, strpos($value, ',') + 1);

                    $binaryData = base64_decode($base64Data);
                    $fileExtension = ".jpg";



                    // //file save path and file name create
                    $savePath = "../../resources/image/partsImages/";
                    $newImageName = "partsId=" . $partsId . "_" . "categoryItemId=" . $ad_category_id .  "_"  . "image=" . $countIndex  . $fileExtension;
                    $countIndex++;

                    // Save the image to a file
                    file_put_contents($savePath . $newImageName, $binaryData);
               } else {
                    $responseObject->error = "upload one or more images";
                    response_sender::sendJson($responseObject);
               }
          }


          $responseObject->status = "success";
          response_sender::sendJson($responseObject);


          //data update
     } else if (isset($_POST['up_parts_id'], $_POST['up_title'], $_POST['up_origin_id'], $_POST['up_qty'], $_POST['up_description'], $_POST['up_price'], $_POST['up_brand_id'], $_POST['up_category_id'], $_POST['up_status_id'], $_POST['model_has_id'])) {

          //data varibles
          $up_parts_id = $_POST['up_parts_id'];
          $up_title = $_POST['up_title'];
          $up_origin_id = $_POST['up_origin_id'];
          $up_qty = $_POST['up_qty'];
          $up_description = $_POST['up_description'];
          $up_price = $_POST['up_price'];
          $up_brand_id = $_POST['up_brand_id'];
          $up_model_id = $_POST['model_has_id'];
          $up_category_id = $_POST['up_category_id'];
          $up_status_id = $_POST['up_status_id'];




          //data validation
          $validateReadyObject = (object) [
               "string_or_null" => [
                    (object) ["datakey" => "parts id id", "value" => $up_parts_id],
                    (object) ["datakey" => "title", "value" => $up_title],
                    (object) ["datakey" => "category", "value" => $up_category_id],
               ],
               "int_or_null" => [
                    (object) ["datakey" => "origin", "value" => $up_origin_id],
                    (object) ["datakey" => "quantity", "value" => $up_qty],
                    (object) ["datakey" => "brand", "value" => $up_brand_id],
                    (object) ["datakey" => "model", "value" => $up_model_id],
                    (object) ["datakey" => "status", "value" => $up_status_id]
               ],
               "price" => [
                    (object) ["datakey" => "price", "value" => $up_price]
               ],

               "text_255" => [
                    (object) ["datakey" => "description", "value" => $up_description]
               ]
          ];

          //validation
          $validator = new data_validator($validateReadyObject);
          $errors = $validator->validate();
          foreach ($errors as $key => $value) {
               if ($value) {
                    $responseObject->error = "Invalid Input for : " . $key;
                    response_sender::sendJson($responseObject);
               }
          }


          $updateQuery = "UPDATE `vehicle_parts` SET `title`=?,`parts_origin_origin_id`=?,`qty`=?,`description`=?,`price`=?,`parts_status_parts_status_id`=?,`brand_brand_id`=?,`category_item_category_item_id`=?,vehicle_models_has_modification_line_mdu_id=? WHERE `parts_id`=?";
          $db->execute_query($updateQuery, 'siissiiiii', array($up_title, $up_origin_id, $up_qty, $up_description, $up_price, $up_status_id, $up_brand_id, $up_category_id, $up_model_id, $up_parts_id));
          $responseObject->status = "success";
          response_sender::sendJson($responseObject);

          //data delete
     } else if (isset($_POST['del_parts_id'])) {

          //get variables
          $partsDelId = $_POST['del_parts_id'];

          //delete from cart
          $deleteRelatedProductCart = "SELECT * FROM `cart` WHERE `vehicle_parts_parts_id`='" . $partsDelId . "'";
          $resultCart = $db->query($deleteRelatedProductCart);

          if ($resultCart->num_rows > 0) {
               while ($row = $resultCart->fetch_assoc()) {
                    $deleteProductFromCart = "DELETE FROM `cart` WHERE `cart_id`='" . $row['cart_id'] . "'";
                    $db->query($deleteProductFromCart);
               }
          }

          //delete from watchlist
          $deleteRelatedProductWatchlist = "SELECT * FROM `watchlist` WHERE `vehicle_parts_parts_id`='" . $partsDelId . "'";
          $resultWatchlist = $db->query($deleteRelatedProductWatchlist);

          if ($resultWatchlist->num_rows > 0) {
               while ($row = $resultWatchlist->fetch_assoc()) {
                    $deleteProductFromWatchlist = "DELETE FROM `watchlist` WHERE `w_id`='" . $row['w_id'] . "'";
                    $db->query($deleteProductFromWatchlist);
               }
          }


          //delete from promotion
          $deleteRelatedProductPromotion = "SELECT * FROM `product_promotion` WHERE `vehicle_parts_parts_id`='" . $partsDelId . "'";
          $resultPromotion = $db->query($deleteRelatedProductPromotion);

          if ($resultPromotion->num_rows > 0) {
               while ($row = $resultPromotion->fetch_assoc()) {
                    $deleteProductFromPromotion = "DELETE FROM `product_promotion` WHERE `promotion_id`='" . $row['promotion_id'] . "'";
                    $db->query($deleteProductFromPromotion);
               }
          }

          //search this product first
          $searchQuery = "SELECT * FROM `vehicle_parts` WHERE `parts_id`='" . $partsDelId . "' AND `user_user_id`='" . $userId . "'";
          $result = $db->query($searchQuery);

          if ($result->num_rows === 0) {
               $responseObject->error = "no product";
               response_sender::sendJson($responseObject);
          }

          $resultSet = $result->fetch_assoc();
          $categoryItemId = $resultSet['category_item_category_item_id'];

          //get all images in a array 
          $directory = "../../resources/image/partsImages/";
          $fileExtensions = ['png', 'jpeg', 'jpg'];

          // search single product images
          //search image
          $imageSearch = new ImageSearch();
          $resultImages = $imageSearch->searchImage($directory, $partsDelId, $categoryItemId);


          // Add images to the new object if available
          if (is_array($resultImages)) {

               foreach ($resultImages as $index => $searchResult) {
                    unlink($directory . $searchResult);
               }

               //delete parts
               $deleteQuery = "DELETE FROM `vehicle_parts` WHERE `parts_id`='" . $partsDelId . "'";
               $db->query($deleteQuery);
               $responseObject->status = "success";
               response_sender::sendJson($responseObject);
          }
     } else {
          $responseObject->status = "Access denied";
          response_sender::sendJson($responseObject);
     }
}
