<?php
// Advanced Search Engine model
// by janith nirmal
// version - 1.0.3 (06-09-2023 - updated)
// developed - 03-09-2023


require_once("database_driver.php");
require_once("imageSearchEngine.php");

class AdvancedSearchEngine
{
    private $database;

    public function __construct()
    {
        $this->database = new database_driver();
    }

    public function searchProducts($searchTerm = "", $category = "", $orderBy = "", $orderDirection = "", $limit = 10)
    {
        // validate data
        $searchTermArray = explode(" ", $searchTerm);

        // generate query
        $baseQuery = "SELECT `product_id`, `product_name`, `product_description`, `category_id`, `add_date`, `category_type`, `type` as `product_status`, `qty`, `price` as `item_price`,  `weight`.`id` as `weight_id`, `weight` 
        FROM `product_item` 
        INNER JOIN `product` ON `product_item`.`product_product_id`=`product`.`product_id` 
        INNER JOIN `category` ON `product`.`category_id`=`category`.`id` 
        INNER JOIN `weight` ON `product_item`.`weight_id`=`weight`.`id` 
        INNER JOIN `product_status` ON `product_item`.`product_status_id` = `product_status`.`id`  
        WHERE `product_status`.`type` = 'In a Stock' ";


        // chech for search term
        $searchTermQuerySection = "";
        if (isset($searchTerm) && count($searchTermArray)) {
            $count = 0;
            foreach ($searchTermArray as $value) {
                // add term to query

                if ($count == 0) {
                    $searchTermQuerySection = " AND ";
                } else {
                    $searchTermQuerySection = " OR ";
                }


                $searchTermQuerySection .= " ( `product`.`product_name` LIKE '%" . $value . "%' "
                    . " OR `category`.`category_type` LIKE '%" . $value . "%' "
                    . " OR `product`.`product_description` LIKE '%" . $value . "%' "
                    . " OR `weight`.`weight` LIKE '%" . $value . "%' "
                    . " OR `product_item`.`price` LIKE '%" . $value . "%' ) ";
                $count++;
            }
        }

        // check for category
        $categoryQuerySection = " AND ";
        if (isset($category)) {
            // add category to query
            $categoryQuerySection .= "  ( `category`.`category_type` LIKE '%" . $category . "%' ) ";
        }



        // check for order
        $orderQuerySection = "";
        // add order to query
        if ($orderBy) {
            switch ($orderBy) {
                case 'price':
                    $orderQuerySection .= " ORDER BY `product_item`.`price` ";
                    break;
                default:
                    $orderQuerySection .= " ORDER BY `product`.`product_id` ";
                    break;
            }
        } else {
            $orderQuerySection .= " ORDER BY `product`.`product_id` ";
        }

        // check for direction
        $orderDirectionQuerySection = "";
        if ($orderDirection) {
            // add direction to query
            switch ($orderDirection) {
                case 'low to high':
                    $orderDirectionQuerySection .= " ASC ";
                    break;
                case 'high to low':
                    $orderDirectionQuerySection .= " DESC ";
                    break;
                default:
                    $orderDirectionQuerySection .= " ASC ";
                    break;
            }
        } else {
            $orderDirectionQuerySection .= " ASC ";
        }

        $limitQuerySection = " LIMIT " . $limit;
        $finalizedQuery = $baseQuery . $searchTermQuerySection . $categoryQuerySection  . $orderQuerySection . $orderDirectionQuerySection . $limitQuerySection;

        // get item from db
        $searchResultArray = [];
        $resultSet =  $this->database->query($finalizedQuery);
        for ($i = 0; $i < $resultSet->num_rows; $i++) {
            // generate output
            $result = $resultSet->fetch_assoc();
            array_push($searchResultArray, $result);
        }

        // output
        return $searchResultArray;
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
