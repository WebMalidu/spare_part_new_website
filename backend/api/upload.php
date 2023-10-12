 
<?php

require("../model/response_sender.php");

$responseObject=new stdClass();


    $targetDirectory = "uploads/"; // Directory where you want to save the uploaded images
    $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if the file is an actual image or a fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check === false) {
            $responseObject->status="failed";
            response_sender::sendJson($responseObject);
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($targetFile)) {
        $responseObject->status="file already exists";
        response_sender::sendJson($responseObject);
        $uploadOk = 0;
    }

    // Check file size (adjust this as needed)
    if ($_FILES["image"]["size"] > 500000) {
        $responseObject->status="file to large";
        response_sender::sendJson($responseObject);
        $uploadOk = 0;
    }

    // Allow certain file formats (you can customize this)
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
            $responseObject->status="this file type is not allowd";
            response_sender::sendJson($responseObject);  
            $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $responseObject->status="upload failed";
        response_sender::sendJson($responseObject);    } 
        else {
        // If everything is ok, move the file to the specified directory
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            $responseObject->status="file uploaded";
        response_sender::sendJson($responseObject);
        } else {
            $responseObject->status="there was a error on uploading file";
        response_sender::sendJson($responseObject);
        }
    }

?>
