<?php
//data add update and delete
//dev maduwa
//version - 1.0.0
//18/10/2023

require_once("database_driver.php");

class dataManipulator
{
     private $database;

     public function __construct()
     {
          $this->database = new database_driver();
     }

     public function productAdder($ad_title, $ad_origin_id, $ad_qty, $ad_description,$ad_userId, $ad_price, $ad_brand_id, $ad_model_id, $ad_category_id)
     {
          //partsId Generator 
          $partsId = '#' . str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);

          //php date object
          date_default_timezone_set('Asia/Colombo');
          $currentDate = date('Y-m-d');

          //query
          $query = "INSERT INTO `vehicle_parts` 
          (`parts_id`,`title`,`parts_origin_origin_id`,`qty`,`description`,`addedd_date`,`user_user_id`,`price`,`parts_status_parts_status_id`,`brand_brand_id`,`vehicle_models_model_id`,`category_item_category_item_id`)
          VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";

          $this->database->execute_query($query, 'ssssssssssss', array($partsId,$ad_title,$ad_origin_id,$ad_qty,$ad_description,$currentDate,$ad_userId,$ad_price,'1',$ad_brand_id,$ad_model_id,$ad_category_id));
     }

     public function productUpdater()
     {
     }
}
