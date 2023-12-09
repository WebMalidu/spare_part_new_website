-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: localhost    Database: alg006_battalk
-- ------------------------------------------------------
-- Server version	8.0.33

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `adresss` varchar(150) DEFAULT NULL,
  `buisness_name` varchar(45) DEFAULT NULL,
  `br_number` varchar(45) DEFAULT NULL,
  `buisness_address` varchar(45) DEFAULT NULL,
  `private_contact` varchar(45) DEFAULT NULL,
  `busineess_conatact` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`admin_id`),
  UNIQUE KEY `admin_id_UNIQUE` (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,NULL,NULL,NULL,NULL,NULL,NULL),(23,'220.4 Megahawaratat','battaa','kapuwatta','5678','1234567890','kapuwatta'),(26,'utyuuu','ujjfjfj','gfhhfh','5678','1234567890','kapuwatta'),(27,'utyuuu','ujjfjfj','gfhhfh','5678','d5656354342','fgfgdf'),(28,'123/4 Gonawala Road Kelaniya','Magan.Lk','344As12','No Adress','0913380234','0712345678');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

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
INSERT INTO `brand` VALUES (1,'Aftermarket'),(2,'Koyo'),(3,'AAA');
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
INSERT INTO `category` VALUES ('CT_174228','Belts Chains and Rollers '),('CT_604812','Body'),('CT_795659','Air Conditioning  '),('CT_916337','Maintenance Service Parts ');
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
  `category_item_name` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
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
INSERT INTO `category_item` VALUES ('CTI_029685','AC compressor Clutch','CT_795659'),('CTI_037070','Belt Pulley','CT_174228'),('CTI_058074','AC compressor','CT_795659'),('CTI_241679','AC compressor Valve','CT_795659'),('CTI_259049','Belt','CT_916337'),('CTI_289000','Beam Axie','CT_604812'),('CTI_363112','Crankshaft Pulley','CT_174228'),('CTI_393963','Alternator Pulley','CT_174228'),('CTI_405059','Automotive Tape','CT_604812'),('CTI_424893','Catalogue Service Manual','CT_916337'),('CTI_524894','Bonnet','CT_604812'),('CTI_644447','Clutch','CT_916337'),('CTI_711056','Brake','CT_916337'),('CTI_991271','AC compressor Oil','CT_795659');
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `generation`
--

LOCK TABLES `generation` WRITE;
/*!40000 ALTER TABLE `generation` DISABLE KEYS */;
INSERT INTO `generation` VALUES (1,'1 Gen'),(2,'2 Gen'),(3,'3 Gen'),(4,'4 Gen'),(5,'5 Gen'),(6,'6 Gen'),(7,'7 Gen'),(8,'8 Gen'),(9,'9 Gen'),(10,'10 Gen');
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
  `invoice_status_invoice_status_id` int NOT NULL,
  `user_user_id` int NOT NULL,
  `delivery_date` date NOT NULL,
  PRIMARY KEY (`invoice_id`),
  KEY `fk_invoice_user1_idx` (`user_user_id`),
  KEY `fk_invoice_invoice_status_id1_idx` (`invoice_status_invoice_status_id`) USING BTREE,
  CONSTRAINT `fk_invoice_invoice_status_id1` FOREIGN KEY (`invoice_status_invoice_status_id`) REFERENCES `invoice_status` (`invoice_status_id`),
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
-- Table structure for table `invoice_status`
--

DROP TABLE IF EXISTS `invoice_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `invoice_status` (
  `invoice_status_id` int NOT NULL AUTO_INCREMENT,
  `invoice_status` varchar(45) NOT NULL,
  PRIMARY KEY (`invoice_status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice_status`
--

LOCK TABLES `invoice_status` WRITE;
/*!40000 ALTER TABLE `invoice_status` DISABLE KEYS */;
/*!40000 ALTER TABLE `invoice_status` ENABLE KEYS */;
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
INSERT INTO `makers` VALUES ('Mk_345841','BMW'),('Mk_452681','Toyota'),('Mk_743868','Honda'),('Mk_942865','Benz');
/*!40000 ALTER TABLE `makers` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modification_line`
--

LOCK TABLES `modification_line` WRITE;
/*!40000 ALTER TABLE `modification_line` DISABLE KEYS */;
INSERT INTO `modification_line` VALUES (1,'Desel'),(2,'Eloctric'),(3,'Petrol'),(4,'Hibride'),(5,'PHV'),(6,'Non Hibride');
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
  `user_user_id` int NOT NULL,
  `vehicle_models_has_modification_line_mdu_id` int NOT NULL,
  PRIMARY KEY (`mg_id`),
  KEY `fk_my_garaj_user1_idx` (`user_user_id`),
  KEY `fk_my_garaj_vehicle_models_has_modification_line1_idx` (`vehicle_models_has_modification_line_mdu_id`),
  CONSTRAINT `fk_my_garaj_user1` FOREIGN KEY (`user_user_id`) REFERENCES `user` (`user_id`),
  CONSTRAINT `fk_my_garaj_vehicle_models_has_modification_line1` FOREIGN KEY (`vehicle_models_has_modification_line_mdu_id`) REFERENCES `vehicle_models_has_modification_line` (`mdu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `my_garaj`
--

LOCK TABLES `my_garaj` WRITE;
/*!40000 ALTER TABLE `my_garaj` DISABLE KEYS */;
INSERT INTO `my_garaj` VALUES (15,2,5),(16,2,11),(17,2,5),(18,1,7);
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_promotion`
--

LOCK TABLES `product_promotion` WRITE;
/*!40000 ALTER TABLE `product_promotion` DISABLE KEYS */;
INSERT INTO `product_promotion` VALUES (13,'2023-12-27','2023-12-12',1,3,'56','pp_191241'),(14,'2024-01-05','2023-12-19',1,3,'34','pp_690426'),(15,'2023-12-07','2023-12-19',1,3,'34','pp_720435'),(16,'2023-12-14','2023-12-22',1,3,'66','pp_771035'),(17,'2023-11-30','2023-12-21',1,3,'23','pp_504419');
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
  KEY `fk_shipping_details_user1_idx` (`user_user_id`),
  KEY `fk_shipping_details_district1_idx` (`district_district_id`),
  CONSTRAINT `fk_shipping_details_district1` FOREIGN KEY (`district_district_id`) REFERENCES `district` (`district_id`),
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
  `admin_admin_id` int NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `fk_user_user_type_idx` (`user_type_user_type_id`),
  KEY `fk_user_user_status1_idx` (`user_status_u_status_id`),
  KEY `fk_user_admin1_idx` (`admin_admin_id`),
  CONSTRAINT `fk_user_admin1` FOREIGN KEY (`admin_admin_id`) REFERENCES `admin` (`admin_id`),
  CONSTRAINT `fk_user_user_status1` FOREIGN KEY (`user_status_u_status_id`) REFERENCES `user_status` (`u_status_id`),
  CONSTRAINT `fk_user_user_type` FOREIGN KEY (`user_type_user_type_id`) REFERENCES `user_type` (`user_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,2,'Kamal Silva','kamal@gmail.com','Qwer123$%','Qwer123$%','2023-09-10',0,1,0),(2,5,'Sunil Ayya','sunil@gmail.com','Qwer123$%','Qwer123$%','2023-09-10',0,1,27),(3,2,'kaviska','kaviska525@gmail.com','7c0230f93a00bb043168efa2a78d7f2e787bed999f86a8ef29cb227b49b55bb6','688c93af927f0b379b4b8371e7acdf68','2023-12-05',0,1,1),(8,2,'kaviska','testfor179@gmail.com','cae5293f43d47776ab974e7354141bd85044fa06ed202043dbe098331245297f','1260a0ef0a3339d4eafcabb31986e630','2023-12-07',0,1,1),(9,5,'kasun','kasun@gmmail.com','cae5293f43d47776ab974e7354141bd85044fa06ed202043dbe098331245297f','1260a0ef0a3339d4eafcabb31986e630','2023-12-07',0,1,26),(10,5,'Udara Madushan','udaramadushan525@gmail.com','bdfd45c2198ed0191f76e81fdffcca63ea14eebe4680c4296927931187a35087','5b0a74c1340567c4d5c87893db797f1d','2023-12-08',0,1,28);
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_type`
--

LOCK TABLES `user_type` WRITE;
/*!40000 ALTER TABLE `user_type` DISABLE KEYS */;
INSERT INTO `user_type` VALUES (1,'user'),(2,'admin'),(3,'seller'),(4,'pending_seller'),(5,'blocked_Seller');
/*!40000 ALTER TABLE `user_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicle_models`
--

DROP TABLE IF EXISTS `vehicle_models`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vehicle_models` (
  `model_id` varchar(12) NOT NULL,
  `vehicle_type_vehicle_type_id` int NOT NULL,
  `vehicle_year_vehicle_year_Id` int NOT NULL,
  `generation_generation_id` int NOT NULL,
  `vehicle_names_vh_name_id` int NOT NULL,
  PRIMARY KEY (`model_id`),
  KEY `fk_models_vehicle_type1_idx` (`vehicle_type_vehicle_type_id`),
  KEY `fk_models_vehicle_year1_idx` (`vehicle_year_vehicle_year_Id`),
  KEY `fk_models_generation1_idx` (`generation_generation_id`),
  KEY `fk_vehicle_models_vehicle_names1_idx` (`vehicle_names_vh_name_id`),
  CONSTRAINT `fk_models_generation1` FOREIGN KEY (`generation_generation_id`) REFERENCES `generation` (`generation_id`),
  CONSTRAINT `fk_models_vehicle_type1` FOREIGN KEY (`vehicle_type_vehicle_type_id`) REFERENCES `vehicle_type` (`vehicle_type_id`),
  CONSTRAINT `fk_models_vehicle_year1` FOREIGN KEY (`vehicle_year_vehicle_year_Id`) REFERENCES `vehicle_year` (`vehicle_year_Id`),
  CONSTRAINT `fk_vehicle_models_vehicle_names1` FOREIGN KEY (`vehicle_names_vh_name_id`) REFERENCES `vehicle_names` (`vh_name_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicle_models`
--

LOCK TABLES `vehicle_models` WRITE;
/*!40000 ALTER TABLE `vehicle_models` DISABLE KEYS */;
INSERT INTO `vehicle_models` VALUES ('MOD_123938',1,7,7,6),('MOD_128107',1,8,6,14),('MOD_195745',3,8,8,11),('MOD_501316',1,9,3,5),('MOD_776738',1,8,3,7);
/*!40000 ALTER TABLE `vehicle_models` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicle_models_has_modification_line`
--

DROP TABLE IF EXISTS `vehicle_models_has_modification_line`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vehicle_models_has_modification_line` (
  `vehicle_models_model_id` varchar(12) NOT NULL,
  `modification_line_mod_id` int NOT NULL,
  `mdu_id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`mdu_id`),
  KEY `fk_vehicle_models_has_modification_line_modification_line1_idx` (`modification_line_mod_id`),
  KEY `fk_vehicle_models_has_modification_line_vehicle_models1_idx` (`vehicle_models_model_id`),
  CONSTRAINT `fk_vehicle_models_has_modification_line_modification_line1` FOREIGN KEY (`modification_line_mod_id`) REFERENCES `modification_line` (`mod_id`),
  CONSTRAINT `fk_vehicle_models_has_modification_line_vehicle_models1` FOREIGN KEY (`vehicle_models_model_id`) REFERENCES `vehicle_models` (`model_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicle_models_has_modification_line`
--

LOCK TABLES `vehicle_models_has_modification_line` WRITE;
/*!40000 ALTER TABLE `vehicle_models_has_modification_line` DISABLE KEYS */;
INSERT INTO `vehicle_models_has_modification_line` VALUES ('MOD_123938',3,4),('MOD_501316',4,5),('MOD_128107',4,6),('MOD_128107',6,7),('MOD_195745',4,8),('MOD_195745',6,9),('MOD_123938',4,10),('MOD_123938',5,11);
/*!40000 ALTER TABLE `vehicle_models_has_modification_line` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicle_names`
--

DROP TABLE IF EXISTS `vehicle_names`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vehicle_names` (
  `vh_name_id` int NOT NULL AUTO_INCREMENT,
  `vh_name` varchar(45) NOT NULL,
  `makers_makers_id` varchar(12) NOT NULL,
  PRIMARY KEY (`vh_name_id`),
  KEY `fk_vehicle_names_makers1_idx` (`makers_makers_id`),
  CONSTRAINT `fk_vehicle_names_makers1` FOREIGN KEY (`makers_makers_id`) REFERENCES `makers` (`makers_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicle_names`
--

LOCK TABLES `vehicle_names` WRITE;
/*!40000 ALTER TABLE `vehicle_names` DISABLE KEYS */;
INSERT INTO `vehicle_names` VALUES (5,'Prius','Mk_452681'),(6,'Vitz','Mk_452681'),(7,'BMW i8','Mk_345841'),(8,'BMW x-200','Mk_345841'),(9,'Benz GLA 250 SUV','Mk_942865'),(10,'Benz GLB 250 SUV','Mk_942865'),(11,'Honda Vezel','Mk_743868'),(12,'Honda Grace','Mk_743868'),(13,'Honda Civic','Mk_743868'),(14,'Axio','Mk_452681');
/*!40000 ALTER TABLE `vehicle_names` ENABLE KEYS */;
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
  `category_item_category_item_id` varchar(12) NOT NULL,
  `vehicle_models_has_modification_line_mdu_id` int NOT NULL,
  `shipping_price` double NOT NULL,
  PRIMARY KEY (`parts_id`),
  KEY `fk_vehicle_parts_parts_origin1_idx` (`parts_origin_origin_id`),
  KEY `fk_vehicle_parts_user1_idx` (`user_user_id`),
  KEY `fk_vehicle_parts_parts_status1_idx` (`parts_status_parts_status_id`),
  KEY `fk_vehicle_parts_brand1_idx` (`brand_brand_id`),
  KEY `fk_vehicle_parts_category_item1_idx` (`category_item_category_item_id`),
  KEY `fk_vehicle_parts_vehicle_models_has_modification_line1_idx` (`vehicle_models_has_modification_line_mdu_id`),
  CONSTRAINT `fk_vehicle_parts_brand1` FOREIGN KEY (`brand_brand_id`) REFERENCES `brand` (`brand_id`),
  CONSTRAINT `fk_vehicle_parts_category_item1` FOREIGN KEY (`category_item_category_item_id`) REFERENCES `category_item` (`category_item_id`),
  CONSTRAINT `fk_vehicle_parts_parts_origin1` FOREIGN KEY (`parts_origin_origin_id`) REFERENCES `parts_origin` (`origin_id`),
  CONSTRAINT `fk_vehicle_parts_parts_status1` FOREIGN KEY (`parts_status_parts_status_id`) REFERENCES `parts_status` (`parts_status_id`),
  CONSTRAINT `fk_vehicle_parts_user1` FOREIGN KEY (`user_user_id`) REFERENCES `user` (`user_id`),
  CONSTRAINT `fk_vehicle_parts_vehicle_models_has_modification_line1` FOREIGN KEY (`vehicle_models_has_modification_line_mdu_id`) REFERENCES `vehicle_models_has_modification_line` (`mdu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicle_parts`
--

LOCK TABLES `vehicle_parts` WRITE;
/*!40000 ALTER TABLE `vehicle_parts` DISABLE KEYS */;
INSERT INTO `vehicle_parts` VALUES ('pp_045434','dadas',2,2,'dasdasd','2023-12-04',1,300,1,1,'CTI_644447',4,200),('pp_191241','belt cool',1,2,'best prodt','2023-12-04',1,2444,1,1,'CTI_259049',6,200),('pp_238401','Belt Pulley Crankshaft',1,3,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s','2023-11-15',1,3500,1,1,'CTI_037070',7,0),('pp_305615','Timing Belt',1,2,'This Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the  a sample vehicle part.','2023-10-27',1,12000,1,1,'CTI_259049',7,0),('pp_334576','dadas',1,3,'eqweqwacsdvxcv','2023-12-04',1,2000,1,1,'CTI_644447',10,2000),('pp_409876','Pully Water Pump',1,3,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s','2023-11-15',1,4500,1,1,'CTI_037070',7,0),('pp_436267','PULLEY',1,6,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s','2023-11-15',1,5540,1,1,'CTI_393963',7,0),('pp_476009','Pully Altenator',1,3,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s','2023-11-15',1,5088,1,1,'CTI_393963',7,0),('pp_504419','compressor',1,2,'good product assembling','2023-12-04',1,2006,1,1,'CTI_058074',11,200),('pp_572589','AXLE REAR',1,3,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s','2023-11-16',1,8070,1,1,'CTI_289000',7,0),('pp_614213','Compressor Assembly',2,10,'This Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the  a sample vehicle part.','2023-10-27',1,10000,1,3,'CTI_058074',6,0),('pp_634662','Tensioner Pulley, Timing Belt',1,3,'This Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the  a sample vehicle part.','2023-10-27',1,20000,1,2,'CTI_259049',7,0),('pp_640889','AXLE COMPREAR',2,2,'This Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the  a sample vehicle part.','2023-10-27',1,15000,2,1,'CTI_259049',7,0),('pp_646734','Rear Lip Spoiler',1,4,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s','2023-11-16',1,2103,1,1,'CTI_405059',7,0),('pp_675575','Belt',1,2,'dsdsadasdasd','2023-12-04',1,2888,1,1,'CTI_644447',10,4000),('pp_690426','CASE - DOCUMENTS',1,3,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s ','2023-11-16',1,783,1,1,'CTI_424893',7,0),('pp_695954','Front Brake Pad Set',1,5,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s ','2023-11-16',1,3200,1,1,'CTI_711056',7,0),('pp_720435','Belt Black',1,22,'dfghdfgfdg','2023-12-04',1,2000,1,1,'CTI_259049',6,200),('pp_750710','Control Valve',1,2,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s','2023-11-16',1,6255,1,1,'CTI_241679',7,0),('pp_771035','kkdasdsa',1,2332,'aasasdasd','2023-12-04',1,4433,1,1,'CTI_644447',10,3434),('pp_785550','dasd',1,33,'wdasdad','2023-12-04',1,399,1,1,'CTI_644447',4,66565),('pp_802569','dad',1,2,'sadsa','2023-12-04',1,4000,1,1,'CTI_644447',6,35454),('pp_850216','Magnetic Clutch, Compressor',1,3,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s','2023-11-16',1,1712,1,1,'CTI_029685',7,0),('pp_879921','Pulley Crankshaft',1,4,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s','2023-11-15',1,1755,1,1,'CTI_363112',7,0),('pp_888873','sdasd',1,300,'fsdfdsf','2023-12-04',1,54531,1,2,'CTI_644447',11,2000),('pp_890174','dasdsa',1,3,'dasdasd','2023-12-04',1,2000,1,1,'CTI_644447',10,3000),('pp_893601','HINGE A - HOOD RH',1,3,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s ','2023-11-16',1,1788,1,1,'CTI_524894',7,0),('pp_906712','Compressor Assembly',1,3,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s','2023-11-16',1,23000,1,1,'CTI_058074',7,0),('pp_907082','250 ML-OIL-AC COMPRESSOR',1,3,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s','2023-11-16',1,1850,1,1,'CTI_991271',7,0),('pp_972621','Clutch Disc',1,3,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s ','2023-11-16',1,4500,1,1,'CTI_644447',7,0),('pp_973221','Combination Pully',1,2,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s','2023-11-15',1,2565,1,1,'CTI_363112',7,0),('pp_978309','gdasgklldasd',1,3,'ggshjdhdfh','2023-12-04',1,2000,1,2,'CTI_363112',10,300),('pp_987271','dsdads',2,3,'ewqeqwd','2023-12-04',1,3000,1,1,'CTI_711056',10,2346);
/*!40000 ALTER TABLE `vehicle_parts` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicle_type`
--

LOCK TABLES `vehicle_type` WRITE;
/*!40000 ALTER TABLE `vehicle_type` DISABLE KEYS */;
INSERT INTO `vehicle_type` VALUES (1,'CAR'),(2,'VAN'),(3,'SUV'),(4,'LORRY'),(5,'BUS');
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicle_year`
--

LOCK TABLES `vehicle_year` WRITE;
/*!40000 ALTER TABLE `vehicle_year` DISABLE KEYS */;
INSERT INTO `vehicle_year` VALUES (1,'2000'),(2,'2001'),(3,'2002'),(4,'2003'),(5,'2004'),(6,'2008'),(7,'2010'),(8,'2018'),(9,'2020'),(10,'2022');
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

-- Dump completed on 2023-12-09  9:36:13
