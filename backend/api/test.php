<?php


require_once("../model/database_driver.php");
require_once("../model/response_sender.php");
require_once("../model/fileSearch.php");
require_once("../model/RequestHandler.php");
require_once("../model/AdvancedSearchEngine.php");
require_once("../model/data_validator.php");
require_once("../model/SessionManager.php");
require_once("../model/passwordEncryptor.php");





$database_driver=new database_driver();

$provinces = [
    "Central Province",
    "Eastern Province",
    "North Central Province",
    "Northern Province",
    "North Western Province",
    "Sabaragamuwa Province",
    "Southern Province",
    "Uva Province",
    "Western Province"
];


// SQL query to insert districts into the 'district' table
$query = "INSERT INTO province (`name`) VALUES (?)";
// Loop through the districts and execute the query for each district
foreach ($provinces as $district) {
    $database_driver->execute_query($query, 's', [$district]);
}