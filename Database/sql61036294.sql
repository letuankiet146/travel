-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: sql61036294
-- ------------------------------------------------------
-- Server version	5.7.10-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `area`
--

DROP TABLE IF EXISTS `area`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `area` (
  `area_id` int(11) NOT NULL,
  `area_name` varchar(45) NOT NULL,
  `area_delete_date` date DEFAULT NULL,
  PRIMARY KEY (`area_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `area`
--

LOCK TABLES `area` WRITE;
/*!40000 ALTER TABLE `area` DISABLE KEYS */;
INSERT INTO `area` VALUES (1,'Trong nước',NULL),(2,'Nước ngoài',NULL);
/*!40000 ALTER TABLE `area` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `arrive_place`
--

DROP TABLE IF EXISTS `arrive_place`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `arrive_place` (
  `arrive_place_id` int(11) NOT NULL AUTO_INCREMENT,
  `arrive_place_name` varchar(100) NOT NULL,
  `arrive_place_area_id` int(11) NOT NULL,
  `arrive_place_delete_date` date DEFAULT NULL,
  PRIMARY KEY (`arrive_place_id`),
  KEY `FK_arrive_place_id_idx` (`arrive_place_area_id`),
  CONSTRAINT `FK_arrive_place_id` FOREIGN KEY (`arrive_place_area_id`) REFERENCES `area` (`area_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arrive_place`
--

LOCK TABLES `arrive_place` WRITE;
/*!40000 ALTER TABLE `arrive_place` DISABLE KEYS */;
INSERT INTO `arrive_place` VALUES (1,'Nha Trang',1,NULL),(2,'Hà Nội',1,NULL),(3,'Đà Nẵng',1,NULL),(4,'Hồ Chí Minh',1,NULL),(5,'Chang Mai',2,NULL),(6,'New York',2,NULL),(7,'Pari',2,NULL),(9,'Huế',1,NULL),(10,'Đắc Lắk',1,NULL),(11,'Bình Dương',1,NULL);
/*!40000 ALTER TABLE `arrive_place` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_code` varchar(45) DEFAULT NULL,
  `customer_name` varchar(45) DEFAULT NULL,
  `customer_birth` date DEFAULT NULL,
  `customer_sex` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_phone` varchar(45) DEFAULT NULL,
  `customer_email` varchar(45) DEFAULT NULL,
  `customer_address` varchar(45) DEFAULT NULL,
  `customer_vietnam_id` varchar(45) DEFAULT NULL,
  `customer_company_name` varchar(200) DEFAULT NULL,
  `customer_address_company` varchar(200) DEFAULT NULL,
  `customer_phone_company` varchar(45) DEFAULT NULL,
  `customer_image` varchar(45) DEFAULT NULL,
  `customer_delete_date` date DEFAULT NULL,
  `customer_user` varchar(45) DEFAULT NULL,
  `customer_password` varchar(45) DEFAULT NULL,
  `customer_type` int(11) DEFAULT NULL,
  `customer_lock` int(11) DEFAULT NULL,
  `customer_group` int(11) DEFAULT NULL,
  `customer_city` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_country` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_note` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`customer_id`),
  UNIQUE KEY `customer_code_UNIQUE` (`customer_code`),
  KEY `FK_group_user_idx` (`customer_group`),
  KEY `FK_group_user_idy` (`customer_group`),
  CONSTRAINT `FK_1` FOREIGN KEY (`customer_group`) REFERENCES `group_users` (`group_users_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (80,'Bình Dương 2','Lê Tuấn Kiêt','2016-02-26','Nam','0975293398','letuankiet146@gmail.com','Bình Dương','28881048',NULL,NULL,NULL,NULL,NULL,NULL,'f9ba283e97d30878cace24bfa62d7997',NULL,NULL,9,NULL,NULL,'khách hàng khó'),(81,'MKH01','Phạm Thành Thảo Bình Dương','2016-02-26','0','0975293398','letuankiet146@gmail.com','Bình Dương','28881048',NULL,NULL,NULL,NULL,NULL,NULL,'111111',NULL,NULL,9,NULL,NULL,'khách hàng khó'),(85,'KH1','Lê Văn A','2016-02-26','Nam','0975293398','letuankiet146@gmail.com','Bình Dương','28881048',NULL,NULL,NULL,NULL,NULL,NULL,'ae0cd5872bd22d0788be78e08b9c1c5a',NULL,NULL,9,NULL,NULL,'khách hàng khó'),(86,'KH3','Phạm thành thảo','2016-02-26','Nam','0975293398','ptthao13@gmail.com','Hồ chí minh','28881048',NULL,NULL,NULL,NULL,NULL,NULL,'69dfb9a1078a072654022cb6a30ac773',NULL,NULL,9,NULL,NULL,'khách hàng khó');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_comment`
--

DROP TABLE IF EXISTS `customer_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer_comment` (
  `id_customer` int(11) NOT NULL AUTO_INCREMENT,
  `comment_content` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id_customer`),
  CONSTRAINT `FK_customer` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`customer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_comment`
--

LOCK TABLES `customer_comment` WRITE;
/*!40000 ALTER TABLE `customer_comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `customer_comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `form_order`
--

DROP TABLE IF EXISTS `form_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `form_order` (
  `form_order_id` int(11) NOT NULL AUTO_INCREMENT,
  `form_order_code` varchar(100) DEFAULT NULL,
  `form_order_customer_id` int(11) DEFAULT NULL,
  `form_order_tour_id` int(11) DEFAULT NULL,
  `form_order_date` date DEFAULT NULL,
  `form_order_delete_date` date DEFAULT NULL,
  `form_order_is_pay` int(11) DEFAULT NULL,
  `form_order_other_require` text,
  `form_order_quantity_adults` int(11) DEFAULT NULL,
  `form_order_quantity_juvenile` int(11) DEFAULT NULL,
  `form_order_quantity_child` int(11) DEFAULT NULL,
  `form_order_money` int(11) DEFAULT NULL,
  PRIMARY KEY (`form_order_id`),
  KEY `FK_form_order_customer_id_idx` (`form_order_customer_id`),
  KEY `FK_form_order_tour_id_idx` (`form_order_tour_id`),
  KEY `FK_form_order_tour_isPay_idx` (`form_order_is_pay`),
  CONSTRAINT `FK_form_order_customer_id` FOREIGN KEY (`form_order_customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_form_order_is_pay` FOREIGN KEY (`form_order_is_pay`) REFERENCES `status` (`status_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_form_order_tour_id` FOREIGN KEY (`form_order_tour_id`) REFERENCES `tour` (`tour_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `form_order`
--

LOCK TABLES `form_order` WRITE;
/*!40000 ALTER TABLE `form_order` DISABLE KEYS */;
INSERT INTO `form_order` VALUES (1,'DDH1',80,891,'2016-04-12',NULL,4,'Đây là yêu cầu khác',2,1,1,12000000),(3,'DDH2',80,891,'2016-04-12',NULL,4,'Đây là yêu cầu khác',2,1,1,0),(4,'DDH3',85,891,'2016-04-12',NULL,4,'Đây là yêu cầu khác',2,1,1,0),(5,'DDH4',86,891,'2016-04-12',NULL,4,'Đây là yêu cầu khác',2,1,1,0);
/*!40000 ALTER TABLE `form_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `from_place`
--

DROP TABLE IF EXISTS `from_place`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `from_place` (
  `from_place_id` int(11) NOT NULL,
  `from_place_name` varchar(45) NOT NULL,
  `from_place_date` date DEFAULT NULL,
  `from_place_delete_date` date DEFAULT NULL,
  PRIMARY KEY (`from_place_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `from_place`
--

LOCK TABLES `from_place` WRITE;
/*!40000 ALTER TABLE `from_place` DISABLE KEYS */;
INSERT INTO `from_place` VALUES (1,'HCM','2016-03-13',NULL),(2,'Da  Nang','2016-03-13',NULL),(3,'Đắc Lắc','2016-03-13',NULL),(4,'Bình Dương','2016-03-13',NULL),(5,'Hà Nội','2016-03-13',NULL);
/*!40000 ALTER TABLE `from_place` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `group_users`
--

DROP TABLE IF EXISTS `group_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `group_users` (
  `group_users_id` int(11) NOT NULL,
  `group_users_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`group_users_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `group_users`
--

LOCK TABLES `group_users` WRITE;
/*!40000 ALTER TABLE `group_users` DISABLE KEYS */;
INSERT INTO `group_users` VALUES (1,'Quản Trị Viên'),(2,'Nhân viên'),(7,'Khách vãng lai'),(8,'Khách hàng tiềm năng'),(9,'Khách hàng thân thiết'),(10,'Khách VIP');
/*!40000 ALTER TABLE `group_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `guider`
--

DROP TABLE IF EXISTS `guider`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `guider` (
  `guider_id` int(11) NOT NULL,
  `guider_name` varchar(45) NOT NULL,
  `guider_birth` date DEFAULT NULL,
  `guider_sex` int(11) DEFAULT NULL,
  `guider_phone` varchar(45) DEFAULT NULL,
  `guider_email` varchar(45) DEFAULT NULL,
  `guider_address` varchar(45) DEFAULT NULL,
  `guider_vietnam_id` varchar(45) DEFAULT NULL,
  `customer_image` varchar(45) DEFAULT NULL,
  `guider_delete_date` date DEFAULT NULL,
  PRIMARY KEY (`guider_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guider`
--

LOCK TABLES `guider` WRITE;
/*!40000 ALTER TABLE `guider` DISABLE KEYS */;
INSERT INTO `guider` VALUES (1,'Huong dan vien 1','1992-03-13',0,'0177722','aaa@gmail.com','HCM','282901',NULL,NULL),(2,'Huong dan vien 2','1992-03-13',1,'019988','bb@gmail.com','HN','291035',NULL,NULL);
/*!40000 ALTER TABLE `guider` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hand_book`
--

DROP TABLE IF EXISTS `hand_book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hand_book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `date_create` date DEFAULT NULL,
  `area` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `info` text,
  `image` text,
  PRIMARY KEY (`id`),
  KEY `fk_area_idx` (`area`),
  KEY `fk_status_idx` (`status`),
  CONSTRAINT `fk_area` FOREIGN KEY (`area`) REFERENCES `area` (`area_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_status` FOREIGN KEY (`status`) REFERENCES `status` (`status_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hand_book`
--

LOCK TABLES `hand_book` WRITE;
/*!40000 ALTER TABLE `hand_book` DISABLE KEYS */;
INSERT INTO `hand_book` VALUES (2,'handbook1','Cẩm nang du lịch Bình Dương chỉnh sửa','2016-04-15',1,1,'a',NULL),(3,'handbook 2','Cẩm nang du lịch Bình Dương chỉnh sửa','2016-04-11',1,1,'a',NULL);
/*!40000 ALTER TABLE `hand_book` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `history`
--

DROP TABLE IF EXISTS `history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) DEFAULT NULL,
  `action` varchar(30) DEFAULT NULL,
  `content` text,
  `create_date` date DEFAULT NULL,
  `delete_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_with_staff_idx` (`user`),
  CONSTRAINT `fk_with_staff` FOREIGN KEY (`user`) REFERENCES `staff` (`staff_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=271 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `history`
--

LOCK TABLES `history` WRITE;
/*!40000 ALTER TABLE `history` DISABLE KEYS */;
INSERT INTO `history` VALUES (238,NULL,'Create_Staff','ID=2','2016-04-04',NULL),(239,NULL,'Create_Staff','ID=3','2016-04-04',NULL),(240,NULL,'Create_Staff','ID=4','2016-04-04',NULL),(241,2,'Create_Staff','ID=5','2016-04-05',NULL),(242,4,'Delete_Staff','ID=2','2016-04-05',NULL),(243,2,'Update_Staff','ID=5','2016-04-05',NULL),(244,2,'Create_Tour','ID=Pham thanh thao 2','2016-04-05',NULL),(245,2,'Create_Tour','ID=Tour1','2016-04-05',NULL),(246,2,'Create_Tour','ID=Tour3','2016-04-05',NULL),(247,2,'Create_Tour','ID=Xin chào','2016-04-05',NULL),(248,2,'Create_Customer','ID=MAKH23','2016-04-05',NULL),(249,2,'Create_Customer','ID=MAKH24','2016-04-05',NULL),(250,NULL,'Update_Customer','Update khach hang: MAKH21','2016-04-05',NULL),(251,NULL,'Update_Customer','Update khach hang: MAKH21','2016-04-05',NULL),(252,NULL,'Update_Customer','Update khach hang: MAKH21','2016-04-05',NULL),(253,2,'Create_Customer','ID=MAKH25','2016-04-05',NULL),(254,2,'Create_Customer','ID=MKH01','2016-04-05',NULL),(255,2,'Create_HandBook','ID=2','2016-04-05',NULL),(256,2,'Update_HandBook','ID=1','2016-04-05',NULL),(257,2,'Update_HandBook','ID=2','2016-04-05',NULL),(258,2,'Delete_HandBook','ID=1','2016-04-05',NULL),(259,2,'Create_Tour','ID=Tour34','2016-04-05',NULL),(260,5,'Update_Tour','ID=Tour34','2016-04-05',NULL),(261,2,'Create_Staff','ID=6','2016-04-06',NULL),(262,2,'Create_HandBook','ID=3','2016-04-11',NULL),(264,2,'Update_HandBook','ID=2','2016-04-11',NULL),(265,2,'Update_HandBook','ID=2','2016-04-11',NULL),(266,2,'Update_HandBook','ID=2','2016-04-11',NULL),(268,NULL,'Create_Order','ID=3','2016-04-12',NULL),(269,NULL,'Create_Order','ID=4','2016-04-12',NULL),(270,NULL,'Create_Order','ID=5','2016-04-12',NULL);
/*!40000 ALTER TABLE `history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hotel`
--

DROP TABLE IF EXISTS `hotel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hotel` (
  `hotel_id` int(11) NOT NULL,
  `hotel_name` varchar(45) DEFAULT NULL,
  `hotel_info` varchar(100) DEFAULT NULL,
  `hotel_phone` varchar(45) DEFAULT NULL,
  `hotel_standard` varchar(45) DEFAULT NULL,
  `hotel_delete_date` date DEFAULT NULL,
  PRIMARY KEY (`hotel_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hotel`
--

LOCK TABLES `hotel` WRITE;
/*!40000 ALTER TABLE `hotel` DISABLE KEYS */;
INSERT INTO `hotel` VALUES (1,'Vincom','Luxury','+849992222','5 sao',NULL),(2,'Mirror','Vip','+849992222','4 sao',NULL),(3,'Tân Sơn Nhất','Vip','+8499201203','3 sao',NULL);
/*!40000 ALTER TABLE `hotel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) DEFAULT NULL,
  `content` text CHARACTER SET latin1,
  `create_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_with_staff_idx` (`user`),
  CONSTRAINT `f` FOREIGN KEY (`user`) REFERENCES `staff` (`staff_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notification`
--

LOCK TABLES `notification` WRITE;
/*!40000 ALTER TABLE `notification` DISABLE KEYS */;
/*!40000 ALTER TABLE `notification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `services` (
  `services_id` int(11) NOT NULL,
  `services_name` varchar(45) DEFAULT NULL,
  `services_vehicle_id` int(11) DEFAULT NULL,
  `services_hotel_id` int(11) DEFAULT NULL,
  `services_delete_date` date DEFAULT NULL,
  PRIMARY KEY (`services_id`),
  KEY `FK_services_hotel_id_idx` (`services_hotel_id`),
  KEY `FK_services_vehicle_id_idx` (`services_vehicle_id`),
  CONSTRAINT `FK_services_hotel_id` FOREIGN KEY (`services_hotel_id`) REFERENCES `hotel` (`hotel_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_services_vehicle_id` FOREIGN KEY (`services_vehicle_id`) REFERENCES `vehicle` (`vehicle_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (1,'Dịch vụ hạng sang',1,1,NULL),(2,'Dịch vụ hạng thường',2,2,NULL),(3,'Dịch vụ giá rẻ',3,3,NULL);
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_code` varchar(45) NOT NULL,
  `staff_name` varchar(45) NOT NULL,
  `staff_level` int(11) DEFAULT NULL,
  `staff_delete_date` date DEFAULT NULL,
  `staff_user` varchar(45) DEFAULT NULL,
  `staff_password` varchar(45) DEFAULT NULL,
  `staff_type` int(11) DEFAULT NULL,
  `staff_lock` int(11) DEFAULT NULL,
  `staff_email` varchar(100) DEFAULT NULL,
  `staff_phone` varchar(20) DEFAULT NULL,
  `staff_date_start` date DEFAULT NULL,
  `staff_address` varchar(100) DEFAULT NULL,
  `staff_note` varchar(200) DEFAULT NULL,
  `staff_birthday` date DEFAULT NULL,
  `staff_sex` varchar(45) DEFAULT NULL,
  `staff_vietnam_id` varchar(100) DEFAULT NULL,
  `staff_image` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`staff_id`),
  KEY `FK_group_user_idx` (`staff_level`),
  CONSTRAINT `FK_group_user` FOREIGN KEY (`staff_level`) REFERENCES `group_users` (`group_users_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff`
--

LOCK TABLES `staff` WRITE;
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;
INSERT INTO `staff` VALUES (2,'MANV2','Lê Tuấn Kiệt',2,'2016-04-05','nhanvien','nhanvien',NULL,NULL,'ptthao13@gmail.com','0975293398','2016-03-30','Nguyen thai son','Nhân viên chăm chỉ','1994-10-13','Nam','665656',NULL),(4,'MANV3','Phạm Thành Thảo',2,NULL,'nhanvien','nhanvien',NULL,NULL,'ptthao13@gmail.com','0975293398','2016-03-30','Nguyen thai son','Nhân viên chăm chỉ','1994-10-13','Nam','665656',NULL),(5,'MANV3','Lê Văn A',1,NULL,'admin','admin',NULL,NULL,'ptthao13@gmail.com','0975293398','2016-03-30','Nguyen thai son','Nhân viên chăm chỉ','1994-10-13','Nam','665656',NULL),(6,'MANV6','Lê Văn 1',2,NULL,'nhanvien','nhanvien',NULL,NULL,'ptthao13@gmail.com','0975293398','2013-02-14','Nguyen thai son','Nhân viên chăm chỉ','1994-03-08','Nam','665656',NULL);
/*!40000 ALTER TABLE `staff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES (1,'Đang thực hiện'),(2,'Chưa thực hiện'),(3,'Đã thực hiện'),(4,'Đơn đặt tour mới'),(5,'Đã thanh toán'),(6,'Chưa thanh toán');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tour`
--

DROP TABLE IF EXISTS `tour`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tour` (
  `tour_id` int(11) NOT NULL AUTO_INCREMENT,
  `tour_code` varchar(100) NOT NULL,
  `tour_name` varchar(1000) NOT NULL,
  `tour_infor` text CHARACTER SET utf8mb4,
  `tour_image` varchar(100) NOT NULL,
  `tour_seat_number` int(11) NOT NULL,
  `tour_charge` int(11) NOT NULL,
  `tour_sale_off` int(11) DEFAULT NULL,
  `tour_day_start` date NOT NULL,
  `tour_day_end` date NOT NULL,
  `tour_from_place_id` int(11) NOT NULL,
  `tour_arrive_place_id` int(11) NOT NULL,
  `tour_service_id` int(11) DEFAULT NULL,
  `tour_view` int(11) DEFAULT NULL,
  `tour_active` int(11) NOT NULL,
  `tour_guider_id` int(11) NOT NULL,
  `tour_delete_date` date DEFAULT NULL,
  `tour_image_data` text CHARACTER SET utf8mb4,
  PRIMARY KEY (`tour_id`),
  UNIQUE KEY `tour_id_UNIQUE` (`tour_id`),
  UNIQUE KEY `tour_code_UNIQUE` (`tour_code`),
  KEY `FK_tour_from_place_id_idx` (`tour_from_place_id`),
  KEY `FK_tour_arrive_place_id_idx` (`tour_arrive_place_id`),
  KEY `FK_tour_arrive_service_id_idx` (`tour_service_id`),
  KEY `FK_tour_guider_id_idx` (`tour_guider_id`),
  KEY `FK_tour_status_id_idx` (`tour_active`),
  CONSTRAINT `FK_tour_arrive_place_id` FOREIGN KEY (`tour_arrive_place_id`) REFERENCES `arrive_place` (`arrive_place_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_tour_arrive_service_id` FOREIGN KEY (`tour_service_id`) REFERENCES `services` (`services_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_tour_from_place_id` FOREIGN KEY (`tour_from_place_id`) REFERENCES `from_place` (`from_place_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_tour_guider_id` FOREIGN KEY (`tour_guider_id`) REFERENCES `guider` (`guider_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_tour_status_id` FOREIGN KEY (`tour_active`) REFERENCES `status` (`status_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=902 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tour`
--

LOCK TABLES `tour` WRITE;
/*!40000 ALTER TABLE `tour` DISABLE KEYS */;
INSERT INTO `tour` VALUES (891,'Bình Dương Lê Tuấn Kiệt','Demo Tour','','D:\\Image\\travel.jpg',0,0,NULL,'2016-03-13','2016-03-16',1,1,1,NULL,1,1,NULL,NULL),(892,'Phạm thành thảo','Demo Tour','','D:\\Image\\travel.jpg',0,0,NULL,'2016-03-13','2016-03-16',1,1,1,NULL,1,1,NULL,NULL),(894,'Pham thanh thao 2','Demo Tour','','D:\\Image\\travel.jpg',0,0,NULL,'2016-03-13','2016-03-16',1,1,1,NULL,1,1,NULL,NULL),(895,'Lê Tuấn Kiệt','Demo Tour','','D:\\Image\\travel.jpg',0,0,NULL,'2016-03-13','2016-03-16',1,1,1,NULL,1,1,NULL,NULL),(896,'Tour1','Bình Dương','','D:\\Image\\travel.jpg',0,0,NULL,'2016-03-13','2016-03-16',1,1,1,NULL,1,1,NULL,NULL),(897,'Tour3','Lê Tuấn Kiệt Phạm Thành Thảo Bình Dương ĐẮc Lắc','','D:\\Image\\travel.jpg',0,0,NULL,'2016-03-13','2016-03-16',1,1,1,NULL,1,1,NULL,NULL),(898,'Xin chào','Lê Tuấn Kiệt Phạm Thành Thảo Bình Dương ĐẮc Lắc','Đây là nội dung thông tin tour du lịch Bình Dương','D:\\Image\\travel.jpg',0,0,NULL,'2016-03-13','2016-03-16',1,1,1,NULL,1,1,NULL,NULL),(899,'Xin chào Bình Dương','Lê Tuấn Kiệt Phạm Thành Thảo Bình Dương ĐẮc Lắc','Đây là nội dung thông tin tour du lịch Bình Dương','D:\\Image\\travel.jpg',0,0,NULL,'2016-03-13','2016-03-16',1,1,1,NULL,1,1,NULL,NULL),(900,'BìnhDương','Lê Tuấn Kiệt Phạm Thành Thảo Bình Dương ĐẮc Lắc','Đây là nội dung thông tin tour du lịch Bình Dương','D:\\Image\\travel.jpg',0,0,NULL,'2016-03-13','2016-03-16',1,1,1,NULL,1,1,NULL,NULL),(901,'Tour34','Bây giờ là chiều rồi Bình Dương','<p>\n	Đ&acirc;y l&agrave; nội dung th&ocirc;ng tin tour du lịch B&igrave;nh Dương Th&agrave;nh thảo</p>\n','D:\\Image\\travel.jpg',2,0,1322312,'2016-04-06','2016-04-16',1,1,1,NULL,1,1,NULL,NULL);
/*!40000 ALTER TABLE `tour` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicle`
--

DROP TABLE IF EXISTS `vehicle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehicle` (
  `vehicle_id` int(11) NOT NULL,
  `vehicle_name` varchar(45) NOT NULL,
  `vehicle_delete_date` date DEFAULT NULL,
  PRIMARY KEY (`vehicle_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicle`
--

LOCK TABLES `vehicle` WRITE;
/*!40000 ALTER TABLE `vehicle` DISABLE KEYS */;
INSERT INTO `vehicle` VALUES (1,'Xe khách',NULL),(2,'Tàu hỏa',NULL),(3,'Máy bay',NULL);
/*!40000 ALTER TABLE `vehicle` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-04-13  0:40:08
