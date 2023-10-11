-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: alg006_battalk
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `brand`
--

DROP TABLE IF EXISTS `brand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `brand` (
  `brand_id` int NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(45) NOT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brand`
--

LOCK TABLES `brand` WRITE;
/*!40000 ALTER TABLE `brand` DISABLE KEYS */;
INSERT INTO `brand` VALUES (1,'Aftermarket'),(2,'Koyo'),(3,'AA');
/*!40000 ALTER TABLE `brand` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cart` (
  `cart_id` int NOT NULL AUTO_INCREMENT,
  `qty` int NOT NULL,
  `user_user_id` int NOT NULL,
  `vehicle_parts_parts_id` varchar(12) NOT NULL,
  PRIMARY KEY (`cart_id`),
  KEY `fk_cart_user1_idx` (`user_user_id`),
  KEY `fk_cart_vehicle_parts1_idx` (`vehicle_parts_parts_id`),
  CONSTRAINT `fk_cart_user1` FOREIGN KEY (`user_user_id`) REFERENCES `user` (`user_id`),
  CONSTRAINT `fk_cart_vehicle_parts1` FOREIGN KEY (`vehicle_parts_parts_id`) REFERENCES `vehicle_parts` (`parts_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
INSERT INTO `cart` VALUES (1,2,2,'1');
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category` (
  `category_id` varchar(12) NOT NULL,
  `category` varchar(45) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES ('#184751','Air Conditioner'),('#915051','Cables');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category_item`
--

DROP TABLE IF EXISTS `category_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category_item` (
  `category_item_id` varchar(12) NOT NULL,
  `category` varchar(45) NOT NULL,
  `category_category_id` varchar(12) NOT NULL,
  PRIMARY KEY (`category_item_id`),
  KEY `fk_category_item_category1_idx` (`category_category_id`),
  CONSTRAINT `fk_category_item_category1` FOREIGN KEY (`category_category_id`) REFERENCES `category` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_item`
--

LOCK TABLES `category_item` WRITE;
/*!40000 ALTER TABLE `category_item` DISABLE KEYS */;
INSERT INTO `category_item` VALUES ('#375859','Glow Plug','#915051'),('#409507','Bar Lite','#915051'),('#869902','Belt','#184751'),('1','Brake Cable','#915051'),('2','Asselator Cable','#915051'),('3','DWS','#915051');
/*!40000 ALTER TABLE `category_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `district`
--

DROP TABLE IF EXISTS `district`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `district` (
  `district_id` int NOT NULL AUTO_INCREMENT,
  `district` varchar(45) NOT NULL,
  PRIMARY KEY (`district_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `district`
--

LOCK TABLES `district` WRITE;
/*!40000 ALTER TABLE `district` DISABLE KEYS */;
/*!40000 ALTER TABLE `district` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `generation`
--

DROP TABLE IF EXISTS `generation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `generation` (
  `generation_id` int NOT NULL AUTO_INCREMENT,
  `generation` varchar(45) NOT NULL,
  PRIMARY KEY (`generation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `generation`
--

LOCK TABLES `generation` WRITE;
/*!40000 ALTER TABLE `generation` DISABLE KEYS */;
INSERT INTO `generation` VALUES (1,'3 Gen');
/*!40000 ALTER TABLE `generation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `invoice` (
  `invoice_id` varchar(15) NOT NULL,
  `order_date` date NOT NULL,
  `pay_total_amout` double NOT NULL,
  `shipping_price` double NOT NULL,
  `order_id` varchar(12) NOT NULL,
  `invoice_status_id_invoice_status_id` int NOT NULL,
  `user_user_id` int NOT NULL,
  `delivery_date` date NOT NULL,
  PRIMARY KEY (`invoice_id`),
  KEY `fk_invoice_invoice_status_id1_idx` (`invoice_status_id_invoice_status_id`),
  KEY `fk_invoice_user1_idx` (`user_user_id`),
  CONSTRAINT `fk_invoice_invoice_status_id1` FOREIGN KEY (`invoice_status_id_invoice_status_id`) REFERENCES `invoice_status_id` (`invoice_status_id`),
  CONSTRAINT `fk_invoice_user1` FOREIGN KEY (`user_user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice`
--

LOCK TABLES `invoice` WRITE;
/*!40000 ALTER TABLE `invoice` DISABLE KEYS */;
/*!40000 ALTER TABLE `invoice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice_item`
--

DROP TABLE IF EXISTS `invoice_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `invoice_item` (
  `invoice_item_id` int NOT NULL AUTO_INCREMENT,
  `order_id` varchar(12) NOT NULL,
  `vehicle_parts_parts_id` varchar(12) NOT NULL,
  `qty` int NOT NULL,
  `total_item_price` double NOT NULL,
  PRIMARY KEY (`invoice_item_id`),
  KEY `fk_invoice_item_vehicle_parts1_idx` (`vehicle_parts_parts_id`),
  CONSTRAINT `fk_invoice_item_vehicle_parts1` FOREIGN KEY (`vehicle_parts_parts_id`) REFERENCES `vehicle_parts` (`parts_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice_item`
--

LOCK TABLES `invoice_item` WRITE;
/*!40000 ALTER TABLE `invoice_item` DISABLE KEYS */;
/*!40000 ALTER TABLE `invoice_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice_status_id`
--

DROP TABLE IF EXISTS `invoice_status_id`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `invoice_status_id` (
  `invoice_status_id` int NOT NULL AUTO_INCREMENT,
  `invoice_status` varchar(45) NOT NULL,
  PRIMARY KEY (`invoice_status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice_status_id`
--

LOCK TABLES `invoice_status_id` WRITE;
/*!40000 ALTER TABLE `invoice_status_id` DISABLE KEYS */;
/*!40000 ALTER TABLE `invoice_status_id` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `makers`
--

DROP TABLE IF EXISTS `makers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `makers` (
  `makers_id` varchar(12) NOT NULL,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`makers_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `makers`
--

LOCK TABLES `makers` WRITE;
/*!40000 ALTER TABLE `makers` DISABLE KEYS */;
INSERT INTO `makers` VALUES ('1','Toyota'),('2','Honda');
/*!40000 ALTER TABLE `makers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_imges`
--

DROP TABLE IF EXISTS `model_imges`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_imges` (
  `id` int NOT NULL AUTO_INCREMENT,
  `model_img_url` text NOT NULL,
  `vehicle_models_model_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_model_imges_vehicle_models1_idx` (`vehicle_models_model_id`),
  CONSTRAINT `fk_model_imges_vehicle_models1` FOREIGN KEY (`vehicle_models_model_id`) REFERENCES `vehicle_models` (`model_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_imges`
--

LOCK TABLES `model_imges` WRITE;
/*!40000 ALTER TABLE `model_imges` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_imges` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modification_line`
--

DROP TABLE IF EXISTS `modification_line`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `modification_line` (
  `mod_id` int NOT NULL AUTO_INCREMENT,
  `mod` varchar(45) NOT NULL,
  PRIMARY KEY (`mod_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modification_line`
--

LOCK TABLES `modification_line` WRITE;
/*!40000 ALTER TABLE `modification_line` DISABLE KEYS */;
INSERT INTO `modification_line` VALUES (1,'Desel'),(2,'Eloctronic');
/*!40000 ALTER TABLE `modification_line` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `my_garaj`
--

DROP TABLE IF EXISTS `my_garaj`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `my_garaj` (
  `mg_id` int NOT NULL AUTO_INCREMENT,
  `vehicle_models_model_id` int NOT NULL,
  `user_user_id` int NOT NULL,
  PRIMARY KEY (`mg_id`),
  KEY `fk_my_garaj_vehicle_models1_idx` (`vehicle_models_model_id`),
  KEY `fk_my_garaj_user1_idx` (`user_user_id`),
  CONSTRAINT `fk_my_garaj_user1` FOREIGN KEY (`user_user_id`) REFERENCES `user` (`user_id`),
  CONSTRAINT `fk_my_garaj_vehicle_models1` FOREIGN KEY (`vehicle_models_model_id`) REFERENCES `vehicle_models` (`model_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `my_garaj`
--

LOCK TABLES `my_garaj` WRITE;
/*!40000 ALTER TABLE `my_garaj` DISABLE KEYS */;
/*!40000 ALTER TABLE `my_garaj` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parts_origin`
--

DROP TABLE IF EXISTS `parts_origin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `parts_origin` (
  `origin_id` int NOT NULL AUTO_INCREMENT,
  `origin` varchar(45) NOT NULL,
  PRIMARY KEY (`origin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parts_origin`
--

LOCK TABLES `parts_origin` WRITE;
/*!40000 ALTER TABLE `parts_origin` DISABLE KEYS */;
INSERT INTO `parts_origin` VALUES (1,'Brand new'),(2,'Used');
/*!40000 ALTER TABLE `parts_origin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parts_status`
--

DROP TABLE IF EXISTS `parts_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `parts_status` (
  `parts_status_id` int NOT NULL AUTO_INCREMENT,
  `status` varchar(45) NOT NULL,
  PRIMARY KEY (`parts_status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parts_status`
--

LOCK TABLES `parts_status` WRITE;
/*!40000 ALTER TABLE `parts_status` DISABLE KEYS */;
INSERT INTO `parts_status` VALUES (1,'In a Stock'),(2,'No Stock');
/*!40000 ALTER TABLE `parts_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_promotion`
--

DROP TABLE IF EXISTS `product_promotion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_promotion` (
  `promotion_id` int NOT NULL AUTO_INCREMENT,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `product_promotion_status_p_promotion_status_id` int NOT NULL,
  `user_user_id` int NOT NULL,
  `discount` varchar(50) NOT NULL,
  `vehicle_parts_parts_id` varchar(12) NOT NULL,
  PRIMARY KEY (`promotion_id`),
  KEY `fk_product_promotion_product_promotion_status1_idx` (`product_promotion_status_p_promotion_status_id`),
  KEY `fk_product_promotion_user1_idx` (`user_user_id`),
  KEY `fk_product_promotion_vehicle_parts1_idx` (`vehicle_parts_parts_id`),
  CONSTRAINT `fk_product_promotion_product_promotion_status1` FOREIGN KEY (`product_promotion_status_p_promotion_status_id`) REFERENCES `product_promotion_status` (`p_promotion_status_id`),
  CONSTRAINT `fk_product_promotion_user1` FOREIGN KEY (`user_user_id`) REFERENCES `user` (`user_id`),
  CONSTRAINT `fk_product_promotion_vehicle_parts1` FOREIGN KEY (`vehicle_parts_parts_id`) REFERENCES `vehicle_parts` (`parts_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_promotion`
--

LOCK TABLES `product_promotion` WRITE;
/*!40000 ALTER TABLE `product_promotion` DISABLE KEYS */;
INSERT INTO `product_promotion` VALUES (1,'2023-10-04','2023-10-20',1,1,'20%','1'),(2,'2023-10-04','2023-10-20',1,2,'30%','1');
/*!40000 ALTER TABLE `product_promotion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_promotion_status`
--

DROP TABLE IF EXISTS `product_promotion_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_promotion_status` (
  `p_promotion_status_id` int NOT NULL AUTO_INCREMENT,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`p_promotion_status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_promotion_status`
--

LOCK TABLES `product_promotion_status` WRITE;
/*!40000 ALTER TABLE `product_promotion_status` DISABLE KEYS */;
INSERT INTO `product_promotion_status` VALUES (1,'Active'),(2,'Deactive');
/*!40000 ALTER TABLE `product_promotion_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `province`
--

DROP TABLE IF EXISTS `province`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `province` (
  `province_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`province_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `province`
--

LOCK TABLES `province` WRITE;
/*!40000 ALTER TABLE `province` DISABLE KEYS */;
/*!40000 ALTER TABLE `province` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shipping_details`
--

DROP TABLE IF EXISTS `shipping_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shipping_details` (
  `shipping_details_id` int NOT NULL AUTO_INCREMENT,
  `address_line_1` varchar(250) NOT NULL,
  `address_line_2` varchar(250) NOT NULL DEFAULT '0',
  `mobile` varchar(12) NOT NULL,
  `postal_code` int NOT NULL,
  `province_province_id` int NOT NULL,
  `user_user_id` int NOT NULL,
  `district_district_id` int NOT NULL,
  `city` varchar(45) NOT NULL,
  PRIMARY KEY (`shipping_details_id`),
  KEY `fk_shipping_details_province1_idx` (`province_province_id`),
  KEY `fk_shipping_details_user1_idx` (`user_user_id`),
  KEY `fk_shipping_details_district1_idx` (`district_district_id`),
  CONSTRAINT `fk_shipping_details_district1` FOREIGN KEY (`district_district_id`) REFERENCES `district` (`district_id`),
  CONSTRAINT `fk_shipping_details_province1` FOREIGN KEY (`province_province_id`) REFERENCES `province` (`province_id`),
  CONSTRAINT `fk_shipping_details_user1` FOREIGN KEY (`user_user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shipping_details`
--

LOCK TABLES `shipping_details` WRITE;
/*!40000 ALTER TABLE `shipping_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `shipping_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_type_user_type_id` int NOT NULL,
  `full_name` varchar(45) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password_hash` varchar(240) NOT NULL,
  `password_salt` varchar(240) NOT NULL,
  `register_date` date NOT NULL,
  `confomation_code` int NOT NULL DEFAULT '0',
  `user_status_u_status_id` int NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `fk_user_user_type_idx` (`user_type_user_type_id`),
  KEY `fk_user_user_status1_idx` (`user_status_u_status_id`),
  CONSTRAINT `fk_user_user_status1` FOREIGN KEY (`user_status_u_status_id`) REFERENCES `user_status` (`u_status_id`),
  CONSTRAINT `fk_user_user_type` FOREIGN KEY (`user_type_user_type_id`) REFERENCES `user_type` (`user_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,2,'Kamal Silva','kamal@gmail.com','Qwer123$%','Qwer123$%','2023-09-10',0,1),(2,1,'Sunil Ayya','sunil@gmail.com','Qwer123$%','Qwer123$%','2023-09-10',0,1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_status`
--

DROP TABLE IF EXISTS `user_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_status` (
  `u_status_id` int NOT NULL AUTO_INCREMENT,
  `status` varchar(45) NOT NULL,
  PRIMARY KEY (`u_status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_status`
--

LOCK TABLES `user_status` WRITE;
/*!40000 ALTER TABLE `user_status` DISABLE KEYS */;
INSERT INTO `user_status` VALUES (1,'Active'),(2,'Deactive');
/*!40000 ALTER TABLE `user_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_type`
--

DROP TABLE IF EXISTS `user_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_type` (
  `user_type_id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(45) NOT NULL,
  PRIMARY KEY (`user_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_type`
--

LOCK TABLES `user_type` WRITE;
/*!40000 ALTER TABLE `user_type` DISABLE KEYS */;
INSERT INTO `user_type` VALUES (1,'user'),(2,'seller');
/*!40000 ALTER TABLE `user_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_images`
--

DROP TABLE IF EXISTS `users_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users_images` (
  `u_img_id` int NOT NULL AUTO_INCREMENT,
  `img_url` text NOT NULL,
  `user_user_id` int NOT NULL,
  PRIMARY KEY (`u_img_id`),
  KEY `fk_users_images_user1_idx` (`user_user_id`),
  CONSTRAINT `fk_users_images_user1` FOREIGN KEY (`user_user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_images`
--

LOCK TABLES `users_images` WRITE;
/*!40000 ALTER TABLE `users_images` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicle_models`
--

DROP TABLE IF EXISTS `vehicle_models`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vehicle_models` (
  `model_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `vehicle_type_vehicle_type_id` int NOT NULL,
  `vehicle_year_vehicle_year_Id` int NOT NULL,
  `generation_generation_id` int NOT NULL,
  `modification_line_mod_id` int NOT NULL,
  `makers_makers_id` varchar(12) NOT NULL,
  PRIMARY KEY (`model_id`),
  KEY `fk_models_vehicle_type1_idx` (`vehicle_type_vehicle_type_id`),
  KEY `fk_models_vehicle_year1_idx` (`vehicle_year_vehicle_year_Id`),
  KEY `fk_models_generation1_idx` (`generation_generation_id`),
  KEY `fk_vehicle_models_modification_line1_idx` (`modification_line_mod_id`),
  KEY `fk_vehicle_models_makers1_idx` (`makers_makers_id`),
  CONSTRAINT `fk_models_generation1` FOREIGN KEY (`generation_generation_id`) REFERENCES `generation` (`generation_id`),
  CONSTRAINT `fk_models_vehicle_type1` FOREIGN KEY (`vehicle_type_vehicle_type_id`) REFERENCES `vehicle_type` (`vehicle_type_id`),
  CONSTRAINT `fk_models_vehicle_year1` FOREIGN KEY (`vehicle_year_vehicle_year_Id`) REFERENCES `vehicle_year` (`vehicle_year_Id`),
  CONSTRAINT `fk_vehicle_models_makers1` FOREIGN KEY (`makers_makers_id`) REFERENCES `makers` (`makers_id`),
  CONSTRAINT `fk_vehicle_models_modification_line1` FOREIGN KEY (`modification_line_mod_id`) REFERENCES `modification_line` (`mod_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicle_models`
--

LOCK TABLES `vehicle_models` WRITE;
/*!40000 ALTER TABLE `vehicle_models` DISABLE KEYS */;
INSERT INTO `vehicle_models` VALUES (1,'Honda Vezel',1,1,1,2,'2');
/*!40000 ALTER TABLE `vehicle_models` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicle_parts`
--

DROP TABLE IF EXISTS `vehicle_parts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vehicle_parts` (
  `parts_id` varchar(12) NOT NULL,
  `title` varchar(45) NOT NULL,
  `parts_origin_origin_id` int NOT NULL,
  `qty` int NOT NULL,
  `description` text NOT NULL,
  `addedd_date` date NOT NULL,
  `user_user_id` int NOT NULL,
  `price` double NOT NULL,
  `parts_status_parts_status_id` int NOT NULL,
  `brand_brand_id` int NOT NULL,
  `vehicle_models_model_id` int NOT NULL,
  `category_item_category_item_id` varchar(12) NOT NULL,
  PRIMARY KEY (`parts_id`),
  KEY `fk_vehicle_parts_parts_origin1_idx` (`parts_origin_origin_id`),
  KEY `fk_vehicle_parts_user1_idx` (`user_user_id`),
  KEY `fk_vehicle_parts_parts_status1_idx` (`parts_status_parts_status_id`),
  KEY `fk_vehicle_parts_brand1_idx` (`brand_brand_id`),
  KEY `fk_vehicle_parts_vehicle_models1_idx` (`vehicle_models_model_id`),
  KEY `fk_vehicle_parts_category_item1_idx` (`category_item_category_item_id`),
  CONSTRAINT `fk_vehicle_parts_brand1` FOREIGN KEY (`brand_brand_id`) REFERENCES `brand` (`brand_id`),
  CONSTRAINT `fk_vehicle_parts_category_item1` FOREIGN KEY (`category_item_category_item_id`) REFERENCES `category_item` (`category_item_id`),
  CONSTRAINT `fk_vehicle_parts_parts_origin1` FOREIGN KEY (`parts_origin_origin_id`) REFERENCES `parts_origin` (`origin_id`),
  CONSTRAINT `fk_vehicle_parts_parts_status1` FOREIGN KEY (`parts_status_parts_status_id`) REFERENCES `parts_status` (`parts_status_id`),
  CONSTRAINT `fk_vehicle_parts_user1` FOREIGN KEY (`user_user_id`) REFERENCES `user` (`user_id`),
  CONSTRAINT `fk_vehicle_parts_vehicle_models1` FOREIGN KEY (`vehicle_models_model_id`) REFERENCES `vehicle_models` (`model_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicle_parts`
--

LOCK TABLES `vehicle_parts` WRITE;
/*!40000 ALTER TABLE `vehicle_parts` DISABLE KEYS */;
INSERT INTO `vehicle_parts` VALUES ('1','Brak cable Honda',1,2,'good product','2023-09-10',1,222222,1,1,1,'1');
/*!40000 ALTER TABLE `vehicle_parts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicle_parts_images`
--

DROP TABLE IF EXISTS `vehicle_parts_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vehicle_parts_images` (
  `img_id` int NOT NULL AUTO_INCREMENT,
  `img_url` text NOT NULL,
  `vehicle_parts_parts_id` varchar(12) NOT NULL,
  PRIMARY KEY (`img_id`),
  KEY `fk_vehicle_parts_images_vehicle_parts1_idx` (`vehicle_parts_parts_id`),
  CONSTRAINT `fk_vehicle_parts_images_vehicle_parts1` FOREIGN KEY (`vehicle_parts_parts_id`) REFERENCES `vehicle_parts` (`parts_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicle_parts_images`
--

LOCK TABLES `vehicle_parts_images` WRITE;
/*!40000 ALTER TABLE `vehicle_parts_images` DISABLE KEYS */;
/*!40000 ALTER TABLE `vehicle_parts_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicle_type`
--

DROP TABLE IF EXISTS `vehicle_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vehicle_type` (
  `vehicle_type_id` int NOT NULL AUTO_INCREMENT,
  `vehicale` varchar(45) NOT NULL,
  PRIMARY KEY (`vehicle_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicle_type`
--

LOCK TABLES `vehicle_type` WRITE;
/*!40000 ALTER TABLE `vehicle_type` DISABLE KEYS */;
INSERT INTO `vehicle_type` VALUES (1,'car'),(2,'van');
/*!40000 ALTER TABLE `vehicle_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicle_year`
--

DROP TABLE IF EXISTS `vehicle_year`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vehicle_year` (
  `vehicle_year_Id` int NOT NULL AUTO_INCREMENT,
  `year` varchar(45) NOT NULL,
  PRIMARY KEY (`vehicle_year_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicle_year`
--

LOCK TABLES `vehicle_year` WRITE;
/*!40000 ALTER TABLE `vehicle_year` DISABLE KEYS */;
INSERT INTO `vehicle_year` VALUES (1,'2001'),(2,'2003');
/*!40000 ALTER TABLE `vehicle_year` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `watchlist`
--

DROP TABLE IF EXISTS `watchlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `watchlist` (
  `w_id` int NOT NULL AUTO_INCREMENT,
  `user_user_id` int NOT NULL,
  `vehicle_parts_parts_id` varchar(12) NOT NULL,
  PRIMARY KEY (`w_id`),
  KEY `fk_watchlist_user1_idx` (`user_user_id`),
  KEY `fk_watchlist_vehicle_parts1_idx` (`vehicle_parts_parts_id`),
  CONSTRAINT `fk_watchlist_user1` FOREIGN KEY (`user_user_id`) REFERENCES `user` (`user_id`),
  CONSTRAINT `fk_watchlist_vehicle_parts1` FOREIGN KEY (`vehicle_parts_parts_id`) REFERENCES `vehicle_parts` (`parts_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `watchlist`
--

LOCK TABLES `watchlist` WRITE;
/*!40000 ALTER TABLE `watchlist` DISABLE KEYS */;
INSERT INTO `watchlist` VALUES (1,1,'1');
/*!40000 ALTER TABLE `watchlist` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-10-12  1:15:16
