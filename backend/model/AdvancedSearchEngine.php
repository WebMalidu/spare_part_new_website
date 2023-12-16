<?php
// Advanced Search Engine model
// by janith nirmal
// version - 1.0.3 (06-09-2023 - updated)
// developed - 03-09-2023


require_once("database_driver.php");
require_once("imageSearchEngine.php");
require_once("fileSearch.php");

class AdvancedSearchEngine
{
    private $database;

    public function __construct()
    {
        $this->database = new database_driver();
    }

    public function searchProducts($searchTerm)
    {

        // generate query
        $baseQuery = "SELECT * FROM `category_item` WHERE `category_item_name`  LIKE '" . $searchTerm . "%'";
        $resultSet = $this->database->query($baseQuery);

        //related images search
        //response array 
        $responseArray = [];

        // image manager
        $directory = "../../resources/image/categoryItemImages";
        $fileExtensions = ['png', 'jpeg', 'jpg', 'svg'];


        if ($resultSet->num_rows > 0) {

            while ($rowData = $resultSet->fetch_assoc()) {
                $categoryItemId = $rowData['category_item_id']; // Use categoryName instead of category_type

                $fileSearch = new FileSearch($directory, $categoryItemId, $fileExtensions); // Use categoryName as the search parameter

                $searchResults = $fileSearch->search();

                $resRowDetailObject = new stdClass();

                $resRowDetailObject->category_Item_type = $rowData['category_item_name'];
                $resRowDetailObject->category_id = $rowData['category_category_id'];
                $resRowDetailObject->category_Item_id = $categoryItemId; // Use categoryName

                if (is_array($searchResults)) {
                    foreach ($searchResults as $searchResult) {
                        $resRowDetailObject->category_image = $searchResult;
                    }
                } else {
                    return $searchResults;
                }

                array_push($responseArray, $resRowDetailObject);
            }

            return $responseArray;
        } else {
            return "no row data available";
        }
    }

    public function searchRelatedProductCatalog($vehiclePartsOriginId, $vehiclePartsStatusId, $vehicleModelId, $vehicleCategoryItemId)
    {

        $query = "SELECT `user`.`full_name`,`vehicle_parts`.*,`parts_status`.*,`brand`.*,`vehicle_models`.*,`category_item`.*,`category`.*,`vehicle_year`.*,`vehicle_type`.*,`generation`.*,`modification_line`.*,`makers`.*,`vehicle_names`.* 
        FROM `vehicle_parts` INNER JOIN `parts_origin` ON `vehicle_parts`.`parts_origin_origin_id`=`parts_origin`.`origin_id`
        INNER JOIN `parts_status` ON `vehicle_parts`.`parts_status_parts_status_id`=`parts_status`.`parts_status_id`
        INNER JOIN `brand` ON `vehicle_parts`.`brand_brand_id`=`brand`.`brand_id`
        INNER JOIN `vehicle_models_has_modification_line` ON `vehicle_parts`.`vehicle_models_has_modification_line_mdu_id`=`vehicle_models_has_modification_line`.`mdu_id`
        INNER JOIN `user` ON `vehicle_parts`.`user_user_id`=`user`.`user_id`
        INNER JOIN `vehicle_models` ON `vehicle_models_has_modification_line`.`vehicle_models_model_id`=`vehicle_models`.`model_id`
        INNER JOIN `category_item` ON `vehicle_parts`.`category_item_category_item_id`=`category_item`.`category_item_id`
        INNER JOIN `category` ON `category_item`.`category_category_id`=`category`.`category_id`
        INNER JOIN `vehicle_year` ON `vehicle_models`.`vehicle_year_vehicle_year_Id`=`vehicle_year`.`vehicle_year_Id`
        INNER JOIN `vehicle_type` ON `vehicle_models`.`vehicle_type_vehicle_type_id`=`vehicle_type`.`vehicle_type_id`
        INNER JOIN `generation` ON `vehicle_models`.`generation_generation_id`=`generation`.`generation_id`
        INNER JOIN `modification_line` ON `vehicle_models_has_modification_line`.`modification_line_mod_id`=`modification_line`.`mod_id`
        INNER JOIN `vehicle_names` ON `vehicle_models`.`vehicle_names_vh_name_id`=`vehicle_names`.`vh_name_id`
        INNER JOIN `makers` ON `vehicle_names`.`makers_makers_id`=`makers`.`makers_id`
        WHERE `parts_origin_origin_id`='" . $vehiclePartsOriginId . "' AND `parts_status_parts_status_id`='" . $vehiclePartsStatusId . "' AND `category_item_category_item_id`='" . $vehicleCategoryItemId . "' AND `vehicle_models_has_modification_line_mdu_id`='" . $vehicleModelId . "'";
        $resultSet = $this->database->query($query);



        $responseRowArray = [];
        // $resRowDetailObject = new stdClass();
        // generate output
        if ($resultSet->num_rows > 0) {

            while ($result = $resultSet->fetch_assoc()) {
                array_push($responseRowArray, $result);
            }

            return $responseRowArray;
        } else {

            return $responseRowArray;
        }
    }

    public function searchAllProduct()
    {
        $query = "SELECT `user`.`full_name`,`vehicle_parts`.*,`parts_status`.*,`brand`.*,`vehicle_models`.*,`category_item`.*,`category`.*,`vehicle_year`.*,`vehicle_type`.*,`generation`.*,`modification_line`.*,`makers`.*,`vehicle_names`.* 
        FROM `vehicle_parts` INNER JOIN `parts_origin` ON `vehicle_parts`.`parts_origin_origin_id`=`parts_origin`.`origin_id`
        INNER JOIN `parts_status` ON `vehicle_parts`.`parts_status_parts_status_id`=`parts_status`.`parts_status_id`
        INNER JOIN `brand` ON `vehicle_parts`.`brand_brand_id`=`brand`.`brand_id`
        INNER JOIN `vehicle_models_has_modification_line` ON `vehicle_parts`.`vehicle_models_has_modification_line_mdu_id`=`vehicle_models_has_modification_line`.`mdu_id`
        INNER JOIN `user` ON `vehicle_parts`.`user_user_id`=`user`.`user_id`
        INNER JOIN `vehicle_models` ON `vehicle_models_has_modification_line`.`vehicle_models_model_id`=`vehicle_models`.`model_id`
        INNER JOIN `category_item` ON `vehicle_parts`.`category_item_category_item_id`=`category_item`.`category_item_id`
        INNER JOIN `category` ON `category_item`.`category_category_id`=`category`.`category_id`
        INNER JOIN `vehicle_year` ON `vehicle_models`.`vehicle_year_vehicle_year_Id`=`vehicle_year`.`vehicle_year_Id`
        INNER JOIN `vehicle_type` ON `vehicle_models`.`vehicle_type_vehicle_type_id`=`vehicle_type`.`vehicle_type_id`
        INNER JOIN `generation` ON `vehicle_models`.`generation_generation_id`=`generation`.`generation_id`
        INNER JOIN `modification_line` ON `vehicle_models_has_modification_line`.`modification_line_mod_id`=`modification_line`.`mod_id`
        INNER JOIN `vehicle_names` ON `vehicle_models`.`vehicle_names_vh_name_id`=`vehicle_names`.`vh_name_id`
        INNER JOIN `makers` ON `vehicle_names`.`makers_makers_id`=`makers`.`makers_id`";

        $resultResponse = $this->database->query($query);
        $responseRowArray = [];

        $savePath = "../../resources/image/partsImages";
        $fileExtensions = ['png', 'jpeg', 'jpg'];

        for ($i = 0; $i < $resultResponse->num_rows; $i++) {
            // generate output
            $result = $resultResponse->fetch_assoc();
            $parts_id = $result['parts_id'];
            $category_item_id = $result['category_item_category_item_id'];

            $resRowDetailObject = new stdClass();
            $resRowDetailObject->result = $result;

            $fileSearch = new ImageSearch();
            $searchResults = $fileSearch->searchImage("../../resources/image/partsImages/", $parts_id, $category_item_id);

            $imageArray = array();
            // Add images to the new object if available
            if (is_array($searchResults)) {
                foreach ($searchResults as $index => $searchResult) {
                    array_push($imageArray, $searchResult);
                }
            }
            $resRowDetailObject->images = $imageArray;

            // Check if there's an existing object with the same productId and weightId
            $key = "{$parts_id}_{$category_item_id}";
            if (!isset($groupedResults[$key])) {
                $groupedResults[$key] = $resRowDetailObject;
            } else {
                // Merge images into the existing object
                $existingObject = $groupedResults[$key];
                foreach ($resRowDetailObject as $property => $value) {
                    // Skip merging productId and weightId properties
                    if ($property !== 'parts_id' && $property !== 'category_item_category_item_id') {
                        $existingObject->$property = $value;
                    }
                }
            }

            array_push($responseRowArray, $resRowDetailObject);
        }

        // output
        return $responseRowArray;
    }

    public function loadSingleProduct($parts_id)
    {
        $query = "SELECT `user`.`full_name`,`vehicle_parts`.*,`parts_status`.*,`brand`.*,`vehicle_models`.*,`category_item`.*,`category`.*,`vehicle_year`.*,`vehicle_type`.*,`generation`.*,`modification_line`.*,`makers`.*,`vehicle_names`.* 
        FROM `vehicle_parts` INNER JOIN `parts_origin` ON `vehicle_parts`.`parts_origin_origin_id`=`parts_origin`.`origin_id`
        INNER JOIN `parts_status` ON `vehicle_parts`.`parts_status_parts_status_id`=`parts_status`.`parts_status_id`
        INNER JOIN `brand` ON `vehicle_parts`.`brand_brand_id`=`brand`.`brand_id`
        INNER JOIN `vehicle_models_has_modification_line` ON `vehicle_parts`.`vehicle_models_has_modification_line_mdu_id`=`vehicle_models_has_modification_line`.`mdu_id`
        INNER JOIN `user` ON `vehicle_parts`.`user_user_id`=`user`.`user_id`
        INNER JOIN `vehicle_models` ON `vehicle_models_has_modification_line`.`vehicle_models_model_id`=`vehicle_models`.`model_id`
        INNER JOIN `category_item` ON `vehicle_parts`.`category_item_category_item_id`=`category_item`.`category_item_id`
        INNER JOIN `category` ON `category_item`.`category_category_id`=`category`.`category_id`
        INNER JOIN `vehicle_year` ON `vehicle_models`.`vehicle_year_vehicle_year_Id`=`vehicle_year`.`vehicle_year_Id`
        INNER JOIN `vehicle_type` ON `vehicle_models`.`vehicle_type_vehicle_type_id`=`vehicle_type`.`vehicle_type_id`
        INNER JOIN `generation` ON `vehicle_models`.`generation_generation_id`=`generation`.`generation_id`
        INNER JOIN `modification_line` ON `vehicle_models_has_modification_line`.`modification_line_mod_id`=`modification_line`.`mod_id`
        INNER JOIN `vehicle_names` ON `vehicle_models`.`vehicle_names_vh_name_id`=`vehicle_names`.`vh_name_id`
        INNER JOIN `makers` ON `vehicle_names`.`makers_makers_id`=`makers`.`makers_id`
        WHERE `parts_id`='" . $parts_id . "' ";

        //get result
        $resultSet = $this->database->query($query);

        $responseRowArray = [];

        for ($i = 0; $i < $resultSet->num_rows; $i++) {
            // generate output
            $result = $resultSet->fetch_assoc();
            $parts_id = $result['parts_id'];
            $category_item_id = $result['category_item_category_item_id'];

            $resRowDetailObject = new stdClass();
            $resRowDetailObject->result = $result;

            $fileSearch = new ImageSearch();
            $searchResults = $fileSearch->searchImage("../../resources/image/partsImages/", $parts_id, $category_item_id);


            $imageArray = array();
            // Add images to the new object if available
            if (is_array($searchResults)) {
                foreach ($searchResults as  $searchResult) {
                    array_push($imageArray, $searchResult);
                }
            }
            $resRowDetailObject->images = $imageArray;

            // Check if there's an existing object with the same productId and weightId
            $key = "{$parts_id}_{$category_item_id}";
            if (!isset($groupedResults[$key])) {
                $groupedResults[$key] = $resRowDetailObject;
            } else {
                // Merge images into the existing object
                $existingObject = $groupedResults[$key];
                foreach ($resRowDetailObject as $property => $value) {
                    // Skip merging productId and weightId properties
                    if ($property !== 'parts_id' && $property !== 'category_item_category_item_id') {
                        $existingObject->$property = $value;
                    }
                }
            }

            array_push($responseRowArray, $resRowDetailObject);
        }

        return $responseRowArray;
    }
}
