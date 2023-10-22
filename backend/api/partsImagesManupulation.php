<?php
// dev madusha
//2023/10/21
//add a new images already have product
//delete images one by one
//if delete product then delete all images then parts Id

//import statement
require_once("../model/response_sender.php");
require_once("../model/fileSearch.php");
require_once("../model/RequestHandler.php");
require_once("../model/imageSearchEngine.php");

// headers
header("Content-Type: application/json; charset=UTF-8");

//response object
$responseObject = new stdClass();
$responseObject->status = 'failed';

//all data requird post method
if (!RequestHandler::isPostMethod()) {
     $responseObject->error = "Access denied ";
     response_sender::sendJson($responseObject);
}

//one by one images delete
//we get images local Path
if (isset($_POST['images_local_path'])) {
     $imageLocalPath = $_POST['images_local_path'];
     //delete image its find at local path
     if (file_exists($imageLocalPath)) {
          if (unlink($imageLocalPath)) {
               $responseObject->status = 'success';
               response_sender::sendJson($responseObject);
          } else {
               $responseObject->error = 'Failed to delete the image.';
               response_sender::sendJson($responseObject);
          }
     } else {
          $responseObject->error = 'Image does not exist.';
          response_sender::sendJson($responseObject);
     }
}

//if we delete product items then delete all images related product items
if (isset($_POST['parts_id'], $_POST['category_item_id'])) {
     // get a variables 
     $parts_id = $_POST['parts_id'];
     $category_item_id = $_POST['category_item_id'];

     //get all images in a array 
     $savePath = "../../frontend/resources/image/partsImages";
     $fileExtensions = ['png', 'jpeg', 'jpg'];

     // search single product images
     $fileSearch = new ImageSearch($savePath, $parts_id, $category_item_id, $fileExtensions);
     $searchResults = $fileSearch->search();


     // Add images to the new object if available
     if (is_array($searchResults)) {
          foreach ($searchResults as $index => $searchResult) {
               unlink($searchResult);
          }

          $responseObject->status = 'success';
          response_sender::sendJson($responseObject);
     }
}

//we want upload new images in already have product 
//use this method
if (isset($_FILES['ad_new_image'], $_POST['parts_id'], $_POST['category_item_id'])) {

     // gets all variables
     $parts_id = $_POST['parts_id'];
     $category_item_id = $_POST['category_item_id'];

     //get all images in a array 
     $savePath = "../../frontend/resources/image/partsImages";
     $fileExtensions = ['png', 'jpeg', 'jpg'];

     // search single product images
     $fileSearch = new ImageSearch($savePath, $parts_id, $category_item_id, $fileExtensions);
     $searchResults = $fileSearch->search();

     //count array values
     $alreadyHaveProductCount = sizeof($searchResult);

     // parts images Upload
     $imageArray = json_decode($_POST['ad_new_image']);
     $imageUrls = [];

     // Loop through each uploaded file
     $countIndex = $alreadyHaveProductCount + 1;
     foreach ($imageArray as  $value) {
          if ($value) {
               // files manage 
               // Remove the "data:image/jpeg;base64," part to get the base64 data
               $base64Data = substr($value, strpos($value, ',') + 1);

               $binaryData = base64_decode($base64Data);
               $fileExtension = ".jpg";

               // //file save path and file name create
               $newImageName = "partsId=" . $parts_id . "_" . "categoryItemId=" . $category_item_id .  "_"  . "image=" . $countIndex  . $fileExtension;
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
}
