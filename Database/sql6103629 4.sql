-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Host: sql6.freemysqlhosting.net
-- Generation Time: Mar 31, 2016 at 05:12 AM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.3.28

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sql6103629`
--

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE IF NOT EXISTS `area` (
  `area_id` int(11) NOT NULL,
  `area_name` varchar(45) NOT NULL,
  `area_delete_date` date DEFAULT NULL,
  PRIMARY KEY (`area_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`area_id`, `area_name`, `area_delete_date`) VALUES
(1, 'Trong nước', NULL),
(2, 'Nước ngoài', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `arrive_place`
--

CREATE TABLE IF NOT EXISTS `arrive_place` (
  `arrive_place_id` int(11) NOT NULL AUTO_INCREMENT,
  `arrive_place_name` varchar(100) NOT NULL,
  `arrive_place_area_id` int(11) NOT NULL,
  `arrive_place_delete_date` date DEFAULT NULL,
  PRIMARY KEY (`arrive_place_id`),
  KEY `FK_arrive_place_id_idx` (`arrive_place_area_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `arrive_place`
--

INSERT INTO `arrive_place` (`arrive_place_id`, `arrive_place_name`, `arrive_place_area_id`, `arrive_place_delete_date`) VALUES
(1, 'Nha Trang', 1, NULL),
(2, 'Hà Nội', 1, NULL),
(3, 'Đà Nẵng', 1, NULL),
(4, 'Hồ Chí Minh', 1, NULL),
(5, 'Chang Mai', 2, NULL),
(6, 'New York', 2, NULL),
(7, 'Pari', 2, NULL),
(9, 'Huế', 1, NULL),
(10, 'Đắc Lắk', 1, NULL),
(11, 'Bình Dương', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_code` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `customer_name` varchar(45) CHARACTER SET utf8mb4 DEFAULT NULL,
  `customer_birth` date DEFAULT NULL,
  `customer_sex` int(11) DEFAULT NULL,
  `customer_phone` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `customer_email` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `customer_address` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `customer_vietnam_id` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `customer_company_name` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `customer_address_company` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `customer_phone_company` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `customer_image` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `customer_delete_date` date DEFAULT NULL,
  `customer_user` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `customer_password` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `customer_type` int(11) DEFAULT NULL,
  `customer_lock` int(11) DEFAULT NULL,
  `customer_group` int(11) DEFAULT NULL,
  `customer_city` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_country` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_note` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`customer_id`),
  KEY `FK_group_user_idx` (`customer_group`),
  KEY `FK_group_user_idy` (`customer_group`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=69 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_code`, `customer_name`, `customer_birth`, `customer_sex`, `customer_phone`, `customer_email`, `customer_address`, `customer_vietnam_id`, `customer_company_name`, `customer_address_company`, `customer_phone_company`, `customer_image`, `customer_delete_date`, `customer_user`, `customer_password`, `customer_type`, `customer_lock`, `customer_group`, `customer_city`, `customer_country`, `customer_note`) VALUES
(21, 'MAKH21', 'Ph?m Thành Th?o', '2016-02-26', 0, '0975293398', 'letuankiet146@gmail.com', 'Binh Duong', '28881048', NULL, NULL, NULL, NULL, NULL, NULL, '111111', NULL, NULL, NULL, NULL, NULL, 'khách hàng khó'),
(34, 'MAKH34', 'LÃƒÂª Tu?n Ki?t', '2016-02-26', 0, '01687523654', 'letuankiet146@gmail.com', 'Binh Duong', '28881048', NULL, NULL, NULL, NULL, '2016-03-30', NULL, '111111', NULL, NULL, NULL, NULL, NULL, 'Khách hàng hay đòi hỏi'),
(37, 'MAKH37', 'TÃªn Ä‘Ã£ chá»‰nh sá»­a', '2016-02-26', 0, '0975293398', 'letuankiet146@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '2016-03-30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 'Random1', 'Pháº¡m ThÃ nh Tháº£o', '2016-02-26', 0, '0975293398', 'letuankiet146@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '2016-03-30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, 'Randomedit', 'Ph?m Thành Th?o', '2016-02-26', 0, '0975293398', 'letuankiet146@gmail.com', 'Binh Duong', '28881048', NULL, NULL, NULL, NULL, NULL, NULL, '111111', NULL, NULL, NULL, NULL, NULL, NULL),
(46, 'Random11', 'Khách hàng utf8', '2016-02-26', 0, '09991123', 'letuankiet146@gmail.com', 'Binh Duong', '28881048', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, 'Random111', 'Khách hàng utf8', '2016-02-26', 0, '09991123', 'letuankiet146@gmail.com', 'Binh Duong', '28881048', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, '1', 'Khách hàng utf8', '2016-02-26', 0, '09991123', 'letuankiet146@gmail.com', 'Binh Duong', '28881048', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, '111', 'Khách hàng utf8', '2016-02-26', 0, '09991123', 'letuankiet146@gmail.com', 'Binh Duong', '28881048', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(58, 'Random11111', 'Khách hàng', '2016-02-26', 0, '09991123', 'letuankiet146@gmail.com', 'Binh Duong', '28881048', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(62, 'Random', 'Khách hàng 2', '2016-02-26', 0, '09991123', 'letuankiet146@gmail.com', 'Binh Duong', '28881048', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(63, 'Random1111', 'Phạm Thành Thảo', '2016-02-26', 0, '0975293398', 'letuankiet146@gmail.com', 'Binh Duong', '28881048', NULL, NULL, NULL, NULL, NULL, NULL, '111111', NULL, NULL, NULL, NULL, NULL, NULL),
(64, '1111', 'Phạm Thành Thảo', '2016-02-26', 0, '0975293398', 'letuankiet146@gmail.com', 'Binh Duong', '28881048', NULL, NULL, NULL, NULL, NULL, NULL, '111111', NULL, NULL, NULL, NULL, NULL, NULL),
(65, 'Random1111111', 'Phạm Thành Thảo', '2016-02-26', 0, '0975293398', 'letuankiet146@gmail.com', 'Binh Duong', '28881048', NULL, NULL, NULL, NULL, NULL, NULL, '111111', NULL, NULL, NULL, NULL, NULL, NULL),
(66, 'Random1111', 'Phạm Thành Thảo', '2016-02-26', NULL, '0975293398', 'letuankiet146@gmail.com', 'Binh Duong', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '111111', NULL, NULL, NULL, NULL, NULL, NULL),
(67, 'Random', 'Khách hàng 2 Bình D??ng', '2016-02-26', 0, '09991123', 'letuankiet146@gmail.com', 'Binh Duong', '28881048', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(68, 'Random', 'Ph?m Thành Th?o', '2016-02-26', 0, '0975293398', 'letuankiet146@gmail.com', 'Binh Duong', '28881048', NULL, NULL, NULL, NULL, NULL, NULL, '111111', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_comment`
--

CREATE TABLE IF NOT EXISTS `customer_comment` (
  `id_customer` int(11) NOT NULL AUTO_INCREMENT,
  `comment_content` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id_customer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `form_order`
--

CREATE TABLE IF NOT EXISTS `form_order` (
  `form_order_id` int(11) NOT NULL AUTO_INCREMENT,
  `form_order_code` varchar(100) NOT NULL,
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
  KEY `FK_form_order_tour_isPay_idx` (`form_order_is_pay`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=73 ;

--
-- Dumping data for table `form_order`
--

INSERT INTO `form_order` (`form_order_id`, `form_order_code`, `form_order_customer_id`, `form_order_tour_id`, `form_order_date`, `form_order_delete_date`, `form_order_is_pay`, `form_order_other_require`, `form_order_quantity_adults`, `form_order_quantity_juvenile`, `form_order_quantity_child`, `form_order_money`) VALUES
(72, 'order1edit', 21, 9, '2016-03-30', NULL, 5, NULL, 12, 2, 3, 10000000);

-- --------------------------------------------------------

--
-- Table structure for table `from_place`
--

CREATE TABLE IF NOT EXISTS `from_place` (
  `from_place_id` int(11) NOT NULL,
  `from_place_name` varchar(45) NOT NULL,
  `from_place_date` date DEFAULT NULL,
  `from_place_delete_date` date DEFAULT NULL,
  PRIMARY KEY (`from_place_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `from_place`
--

INSERT INTO `from_place` (`from_place_id`, `from_place_name`, `from_place_date`, `from_place_delete_date`) VALUES
(1, 'HCM', '2016-03-13', NULL),
(2, 'Da  Nang', '2016-03-13', NULL),
(3, 'Đắc Lắc', '2016-03-13', NULL),
(4, 'Bình Dương', '2016-03-13', NULL),
(5, 'Hà Nội', '2016-03-13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `group_users`
--

CREATE TABLE IF NOT EXISTS `group_users` (
  `group_users_id` int(11) NOT NULL,
  `group_users_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`group_users_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `group_users`
--

INSERT INTO `group_users` (`group_users_id`, `group_users_name`) VALUES
(1, 'Quản Trị Viên'),
(2, 'Nhân viên'),
(7, 'Khách vãng lai'),
(8, 'Khách hàng tiềm năng'),
(9, 'Khách hàng thân thiết'),
(10, 'Khách VIP');

-- --------------------------------------------------------

--
-- Table structure for table `guider`
--

CREATE TABLE IF NOT EXISTS `guider` (
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

--
-- Dumping data for table `guider`
--

INSERT INTO `guider` (`guider_id`, `guider_name`, `guider_birth`, `guider_sex`, `guider_phone`, `guider_email`, `guider_address`, `guider_vietnam_id`, `customer_image`, `guider_delete_date`) VALUES
(1, 'Huong dan vien 1', '1992-03-13', 0, '0177722', 'aaa@gmail.com', 'HCM', '282901', NULL, NULL),
(2, 'Huong dan vien 2', '1992-03-13', 1, '019988', 'bb@gmail.com', 'HN', '291035', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE IF NOT EXISTS `history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) DEFAULT NULL,
  `action` varchar(30) DEFAULT NULL,
  `content` text,
  `create_date` date DEFAULT NULL,
  `delete_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_history_idx` (`user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=195 ;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `user`, `action`, `content`, `create_date`, `delete_date`) VALUES
(167, 2, 'Delete_Customer', 'Xoa khach hang co id =34', '2016-03-30', NULL),
(168, 2, 'Delete_Customer', 'Xoa tour co id =21', '2016-03-30', NULL),
(169, 2, 'Delete_Customer', 'Xoa tour co id =37', '2016-03-30', NULL),
(170, 2, 'Delete_Customer', 'Xoa tour co id =41', '2016-03-30', NULL),
(171, 2, 'Update_Customer', 'Update khach hang: Random', '2016-03-30', NULL),
(172, 2, 'Update_Customer', 'Update khach hang: Randomedit', '2016-03-30', NULL),
(173, 2, 'Update_Customer', 'Update khach hang: Randomedit', '2016-03-30', NULL),
(174, 2, 'Create_Customer', 'Random', '2016-03-30', NULL),
(175, NULL, 'Create_Tour', 'demo 1928d', '2016-03-30', NULL),
(176, NULL, 'Create_Tour', 'demo ffr2', '2016-03-30', NULL),
(177, 2, 'Create_Tour', 'demo ffer2', '2016-03-30', NULL),
(178, 2, 'Create_Tour', 'demo ffe432r2', '2016-03-30', NULL),
(179, 2, 'Create_Tour', 'demo azffe432r2', '2016-03-30', NULL),
(180, 2, 'Create_Tour', 'demo azfgffe432r2', '2016-03-30', NULL),
(181, 1, 'Create_Tour', 'MTDLDD844', '2016-03-30', NULL),
(182, 1, 'Delete_Tour', 'Xoa tour co id =844', '2016-03-30', NULL),
(183, 1, 'Delete_Tour', 'Xoa tour co id =843', '2016-03-30', NULL),
(184, 1, 'Delete_Tour', 'Xoa tour co id =842', '2016-03-30', NULL),
(185, 1, 'Delete_Tour', 'Xoa tour co id =841', '2016-03-30', NULL),
(186, 1, 'Delete_Tour', 'Xoa tour co id =840', '2016-03-30', NULL),
(187, 1, 'Delete_Tour', 'Xoa tour co id =839', '2016-03-30', NULL),
(188, 1, 'Delete_Tour', 'Xoa tour co id =837', '2016-03-30', NULL),
(189, 2, 'Update_Order', '72', '2016-03-30', NULL),
(190, NULL, 'Create_Tour', 'ID=demo 1928d568', '2016-03-31', NULL),
(191, NULL, 'Create_Tour', 'ID=demo 1zzs928d568', '2016-03-31', NULL),
(192, 1, 'Delete_Tour', 'Xoa tour co id =846', '2016-03-30', NULL),
(193, 1, 'Delete_Tour', 'Xoa tour co id =846', '2016-03-30', NULL),
(194, NULL, 'Create_Tour', 'ID=demo 1zzsze928d568', '2016-03-31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE IF NOT EXISTS `hotel` (
  `hotel_id` int(11) NOT NULL,
  `hotel_name` varchar(45) DEFAULT NULL,
  `hotel_info` varchar(100) DEFAULT NULL,
  `hotel_phone` varchar(45) DEFAULT NULL,
  `hotel_standard` varchar(45) DEFAULT NULL,
  `hotel_delete_date` date DEFAULT NULL,
  PRIMARY KEY (`hotel_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hotel_id`, `hotel_name`, `hotel_info`, `hotel_phone`, `hotel_standard`, `hotel_delete_date`) VALUES
(1, 'Vincom', 'Luxury', '+849992222', '5 sao', NULL),
(2, 'Mirror', 'Vip', '+849992222', '4 sao', NULL),
(3, 'Tân Sơn Nhất', 'Vip', '+8499201203', '3 sao', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) DEFAULT NULL,
  `content` text CHARACTER SET latin1,
  `create_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_notification_idx` (`user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `user`, `content`, `create_date`) VALUES
(1, 1, 'dfdsfdf', '2016-03-20'),
(2, 2, 'sdfdsfds', '2016-03-20'),
(3, 2, 'sfsdf', '2016-03-20');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `services_id` int(11) NOT NULL,
  `services_name` varchar(45) DEFAULT NULL,
  `services_vehicle_id` int(11) DEFAULT NULL,
  `services_hotel_id` int(11) DEFAULT NULL,
  `services_delete_date` date DEFAULT NULL,
  PRIMARY KEY (`services_id`),
  KEY `FK_services_hotel_id_idx` (`services_hotel_id`),
  KEY `FK_services_vehicle_id_idx` (`services_vehicle_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`services_id`, `services_name`, `services_vehicle_id`, `services_hotel_id`, `services_delete_date`) VALUES
(1, 'Dịch vụ hạng sang', 1, 1, NULL),
(2, 'Dịch vụ hạng thường', 2, 2, NULL),
(3, 'Dịch vụ giá rẻ', 3, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `staff_id` int(11) NOT NULL,
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
  KEY `FK_group_user_idx` (`staff_level`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_code`, `staff_name`, `staff_level`, `staff_delete_date`, `staff_user`, `staff_password`, `staff_type`, `staff_lock`, `staff_email`, `staff_phone`, `staff_date_start`, `staff_address`, `staff_note`, `staff_birthday`, `staff_sex`, `staff_vietnam_id`, `staff_image`) VALUES
(1, 'MANV1', 'Phạm Thành Thảo', 1, NULL, 'admin', 'admin', NULL, NULL, 'ptthao13@gmail.com', '0975293398', '2016-03-30', 'Nguyen thai son', 'Nhân viên chăm chỉ', '1994-10-13', 'Nam', '665656', NULL),
(2, 'MANV2', 'Lê Tuấn Kiệt', 2, NULL, 'nhanvien', 'nhanvien', NULL, NULL, 'ptthao13@gmail.com', '0975293398', '2016-03-30', 'Nguyen thai son', 'Nhân viên chăm chỉ', '1994-10-13', 'Nam', '665656', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status_name`) VALUES
(1, 'Đang thực hiện'),
(2, 'Chưa thực hiện'),
(3, 'Đã thực hiện'),
(4, 'Đơn đặt tour mới'),
(5, 'Đã thanh toán'),
(6, 'Chưa thanh toán');

-- --------------------------------------------------------

--
-- Table structure for table `tour`
--

CREATE TABLE IF NOT EXISTS `tour` (
  `tour_id` int(11) NOT NULL AUTO_INCREMENT,
  `tour_code` varchar(100) CHARACTER SET utf8 NOT NULL,
  `tour_name` varchar(200) CHARACTER SET utf8mb4 DEFAULT NULL,
  `tour_infor` varchar(10000) CHARACTER SET utf8 DEFAULT NULL,
  `tour_image` varchar(100) CHARACTER SET utf8 NOT NULL,
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
  PRIMARY KEY (`tour_id`),
  UNIQUE KEY `tour_id_UNIQUE` (`tour_id`),
  UNIQUE KEY `tour_code_UNIQUE` (`tour_code`),
  KEY `FK_tour_from_place_id_idx` (`tour_from_place_id`),
  KEY `FK_tour_arrive_place_id_idx` (`tour_arrive_place_id`),
  KEY `FK_tour_arrive_service_id_idx` (`tour_service_id`),
  KEY `FK_tour_guider_id_idx` (`tour_guider_id`),
  KEY `FK_tour_status_id_idx` (`tour_active`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci AUTO_INCREMENT=848 ;

--
-- Dumping data for table `tour`
--

INSERT INTO `tour` (`tour_id`, `tour_code`, `tour_name`, `tour_infor`, `tour_image`, `tour_seat_number`, `tour_charge`, `tour_sale_off`, `tour_day_start`, `tour_day_end`, `tour_from_place_id`, `tour_arrive_place_id`, `tour_service_id`, `tour_view`, `tour_active`, `tour_guider_id`, `tour_delete_date`) VALUES
(9, 'BINBIN', 'HCM Tour', 'L?ch trình tour', '/abc/aaa', 50, 2000000, 20, '2016-03-23', '2016-03-26', 1, 3, 1, NULL, 3, 1, NULL),
(746, 'MTDLDD745', 'thao demo', '<p>\n	sdfsdfdsf</p>\n<p>\n	<img alt="" src="/upload/images/b.jpg" style="width: 650px; height: 416px;" ', 'C:\\fakepath\\Co_HOA-KY.jpg', 1111111, 11111111, 111111111, '2016-03-26', '2016-03-31', 2, 6, 1, NULL, 1, 2, NULL),
(747, 'MTDLDD747', 'update test 1111111111', '', '', 234324234, 324234, 23213, '2016-03-23', '2016-03-30', 2, 4, 2, NULL, 3, 1, NULL),
(756, 'MTDLDD756', '23432', '234234dfsdf', '', 0, 324234, 4324, '2016-03-21', '2016-03-23', 1, 2, 1, NULL, 2, 1, NULL),
(757, 'MTDLDD757', 'sdfsdfsd', '<p>\n	&agrave;ddsfsdfsdf</p>\n', 'CO-THAI.jpg', 23432, 324234, 32423, '2016-03-21', '2016-03-23', 1, 6, 2, NULL, 2, 1, NULL),
(758, 'Demo 41', 'Demo Tour', '', '', 121212, 12122, 1212121, '2016-03-23', '2016-03-24', 1, 1, 1, NULL, 2, 1, NULL),
(761, 'Demo 41111', 'Demo Tour', '', '', 0, 0, NULL, '2016-03-13', '2016-03-16', 1, 1, 1, NULL, 1, 1, NULL),
(765, 'Demo 41111111', 'Demo Tour', '<p>\n	dsdfdfsdf</p>\n', '', 0, 234234, 234234, '2016-03-22', '2016-03-23', 1, 1, 1, NULL, 2, 1, NULL),
(766, 'Demo 411111111', 'Demo Tour', '', '', 0, 0, NULL, '2016-03-13', '2016-03-16', 1, 1, 1, NULL, 1, 1, NULL),
(767, 'Demo 4111111111', 'Demo Tour', '', '', 0, 0, NULL, '2016-03-13', '2016-03-16', 1, 1, 1, NULL, 1, 1, NULL),
(768, 'Demo 51111111111', 'Demo Tour', '', '', 0, 0, NULL, '2016-03-13', '2016-03-16', 1, 1, 1, NULL, 1, 1, NULL),
(771, 'Demo 51', 'Demo Tour', '', '', 0, 0, NULL, '2016-03-13', '2016-03-16', 1, 1, 1, NULL, 1, 1, NULL),
(778, 'Demo 51111111', 'Demo Tour', '', '', 0, 0, NULL, '2016-03-13', '2016-03-16', 1, 1, 1, NULL, 1, 1, NULL),
(779, 'Demo 5111111111', 'Demo Tour', '', '', 0, 0, NULL, '2016-03-13', '2016-03-16', 1, 1, 1, NULL, 1, 1, NULL),
(780, 'Demo6', 'Demo Tour', '', '', 0, 0, NULL, '2016-03-13', '2016-03-16', 1, 1, 1, NULL, 1, 1, NULL),
(781, 'Demo61', 'Demo Tour', '', '', 0, 0, NULL, '2016-03-13', '2016-03-16', 1, 1, 1, NULL, 1, 1, NULL),
(782, 'Demo611', 'Demo Tour', '', '', 0, 0, NULL, '2016-03-13', '2016-03-16', 1, 1, 1, NULL, 1, 1, NULL),
(783, 'Demo6111', 'Demo Tour', '', '', 0, 0, NULL, '2016-03-13', '2016-03-16', 1, 1, 1, NULL, 1, 1, NULL),
(784, 'Demo61111', 'Demo Tour', '', '', 0, 0, NULL, '2016-03-13', '2016-03-16', 1, 1, 1, NULL, 1, 1, NULL),
(785, 'Demo611111', 'Demo Tour', '', '', 0, 0, NULL, '2016-03-13', '2016-03-16', 1, 1, 1, NULL, 1, 1, NULL),
(786, 'Demo6111111', 'Demo Tour', '', '', 0, 0, NULL, '2016-03-13', '2016-03-16', 1, 1, 1, NULL, 1, 1, NULL),
(787, 'Demo61111111', 'Demo Tour', '', '', 0, 0, NULL, '2016-03-13', '2016-03-16', 1, 1, 1, NULL, 1, 1, NULL),
(788, 'Demo611111111', 'Demo Tour', '', '', 0, 0, NULL, '2016-03-13', '2016-03-16', 1, 1, 1, NULL, 1, 1, NULL),
(797, 'MTDLDD797', '32234asdsf', '<p>\n	cssdfdf</p>\n', 'CO-THAI.jpg', 4234, 324234234, 3243242, '2016-03-23', '2016-03-25', 2, 6, 2, NULL, 2, 2, NULL),
(798, 'MTDLDD798', 'ewer', '<p>\n	d&acirc;sdasdasdasdsad</p>\n', 'CO-THAI.jpg', 3242, 234234234, 234234, '2016-03-24', '2016-03-26', 2, 4, 2, NULL, 2, 2, NULL),
(799, 'MTDLDD799', '25345345', '<p>\n	fsdfsdfsdfsdf</p>\n', '', 435, 45345345, 34543543, '2016-03-24', '2016-03-25', 2, 6, 1, NULL, 2, 2, NULL),
(800, 'MTDLDD800', 'Thiên ???ng Xanh-Vietjet Air - ?ón n?m m?i t?i Phú Qu?c  ', '<h2 style="color: rgb(34, 34, 34); font-family: Arial,Verdana,sans-serif; font-style: normal; font-v', 'tf_150929_image_gallery.jpg', 30, 5890000, 3890000, '2016-03-25', '2016-03-30', 1, 10, 2, NULL, 2, 1, NULL),
(801, 'MTDLDD801', 'NEW YORK – PHILADELPHIA  WASHINGTON D.C – LAS VEGAS – LOS ANGELES – UNIVERSAL STUDIO   ', '', '', 30, 72880000, 70880000, '2016-03-31', '2016-04-05', 2, 5, 1, NULL, 1, 1, NULL),
(802, 'MTDLDD802', 'SEOUL – ??O NAMI – SNOWPARK – V??N THÚ SEOUL LOTTE WORLD – NANTA SHOW', '', 'CO-THAI.jpg', 40, 17980000, 17980000, '2016-03-29', '2016-04-01', 3, 6, 2, NULL, 1, 2, NULL),
(803, 'demo 26', 'ki?m tra utf', 'L?ch trình tour ?i ??c L?c', '', 40, 1500000, 45, '2016-03-13', '2016-03-16', 1, 1, 1, NULL, 1, 1, NULL),
(804, 'demo 27', 'ki?m tra utf', 'L?ch trình tour ?i ??c L?c', '', 40, 1500000, 45, '2016-03-13', '2016-03-16', 1, 1, 1, NULL, 1, 1, NULL),
(808, 'demo 28', 'ki?m tra utf', 'L?ch trình tour ?i ??c L?c', '', 40, 1500000, 45, '2016-03-13', '2016-03-16', 1, 1, 1, NULL, 1, 1, '2016-03-27'),
(810, 'demo 29', 'kiểm tra utf', 'Lịch trình tour đi Đắc Lắc', '', 40, 1500000, 45, '2016-03-13', '2016-03-16', 1, 1, 1, NULL, 1, 1, NULL),
(811, 'demo f29', 'kiểm tra utf', 'Lịch trình tour đi Đắc Lắc', '', 40, 1500000, 45, '2016-03-13', '2016-03-16', 1, 1, 1, NULL, 1, 1, NULL),
(813, 'demo 30', '22222222222222222222222', '<p>\n	Lịch tr&igrave;nh tour đi Đắc Lắc</p>\n', '', 40, 1500000, 45, '2016-03-29', '2016-03-30', 1, 1, 1, NULL, 2, 1, NULL),
(815, 'demo 31', 'Lê Tuấn Kiệt Kiểm tra Utf8', 'Lịch trình tour đi Đắc Lắc', '', 40, 1500000, 45, '2016-03-13', '2016-03-16', 1, 1, 1, NULL, 1, 1, '2016-03-28'),
(816, 'demo 32', 'Lê Tuấn Kiệt Kiểm tra Utf8', 'Lịch trình tour đi Đắc Lắc', '', 40, 1500000, 45, '2016-03-13', '2016-03-16', 1, 1, 1, NULL, 1, 1, '2016-03-28'),
(817, 'Demo 99', 'Kiểm tra thành công utf8r', '', '', 0, 0, NULL, '2016-03-13', '2016-03-16', 1, 1, 1, NULL, 1, 1, '2016-03-28'),
(818, 'MTDLDD818', 'Phú Quốc-Khách sạn tương đương 2*-Thiên Đường Xanh-Vietjet Air - Đón năm mới tại Phú Quốc  ', '<h2>\n	<span style="color: rgb(0, 0, 0); font-family: Arial;">Ng&agrave;y 1 : TP.HCM - PH&Uacute; QUỐC (Số bữa ăn: 2 bữa)</span></h2>\n<p>\n	&nbsp;</p>\n<p>\n	<img alt="" src="/upload/images/tfd_20150929_bai-sao.jpg" style="width: 800px; height: 490px;" /><br style="color: rgb(0, 0, 0); font-family: Arial; background-color: rgb(189, 5, 6);" />\n	&nbsp;</p>\n<p style="text-align: justify;">\n	<span style="color: rgb(0, 0, 0); font-family: Arial;">Qu&yacute; kh&aacute;ch tập trung tại S&acirc;n bay T&acirc;n Sơn Nhất, cột số 04 ga đi Trong Nước. Hướng dẫn vi&ecirc;n l&agrave;m thủ tục cho Qu&yacute; kh&aacute;ch đ&aacute;p chuyến bay đi Ph&uacute; Quốc. Xe đ&oacute;n đo&agrave;n tại s&acirc;n bay đưa Qu&yacute; kh&aacute;ch khởi h&agrave;nh viếng Ch&ugrave;a Sư Mu&ocirc;n (H&ugrave;ng Long Tự) - Để cầu nguyện sự an l&agrave;nh v&agrave; hạnh ph&uacute;c đến với gia đ&igrave;nh. Sau đ&oacute; đo&agrave;n khởi h&agrave;nh đi xuy&ecirc;n rừng nguy&ecirc;n sinh kh&aacute;m ph&aacute; Suối Tranh - Bắt đầu từ d&atilde;y H&agrave;m Ninh xanh thẳm, từ trong khe n&uacute;i nhiều d&ograve;ng suối nhỏ len lỏi chảy qua rừng c&acirc;y, khe đ&aacute; để c&ugrave;ng ho&agrave; m&igrave;nh v&agrave;o d&ograve;ng ch&iacute;nh tạo n&ecirc;n d&ograve;ng Suối Tranh hiền ho&agrave;. Tiếp tục, đo&agrave;n tham quan L&agrave;ng Ch&agrave;i H&agrave;m Ninh, Vườn Ti&ecirc;u, Nh&agrave; Th&ugrave;ng l&agrave;m nước mắm. Qu&yacute; kh&aacute;ch gh&eacute; thăm Dinh Cậu - Biểu tượng văn ho&aacute; v&agrave; t&iacute;n ngưỡng của đảo Ph&uacute; Quốc, l&agrave; nơi cầu may mắn, cầu an l&agrave;nh v&agrave; l&agrave; nơi ngư d&acirc;n địa phương gởi gắm niềm tin cho một chuyến ra khơi đ&aacute;nh bắt đầy ắp c&aacute; khi trở về. Sau đ&oacute; nhận ph&ograve;ng kh&aacute;ch sạn, Qu&yacute; kh&aacute;ch tự do nghỉ ngơi v&agrave; tắm biển. Buổi tối, Qu&yacute; kh&aacute;ch tự do dạo phố biển hoặc thưởng thức hải sản tại chợ Đ&ecirc;m Ph&uacute; Quốc (chi ph&iacute; tự t&uacute;c). Nghỉ đ&ecirc;m tại Ph&uacute; Quốc.</span></p>\n<p style="text-align: justify;">\n	&nbsp;</p>\n<h2>\n	<span style="color: rgb(0, 0, 0); font-family: Arial;">Ng&agrave;y 2 : M&Agrave;U XANH BẮC ĐẢO - B&Atilde;I &Ocirc;NG LANG MỘT NG&Agrave;Y C&Acirc;U C&Aacute; TR&Ecirc;N BIỂN (Số bữa ăn: 3 bữa)</span></h2>\n<p>\n	&nbsp;</p>\n<p>\n	<img alt="" src="/upload/images/tfd_20150929_cau-ca-tai-phu-quoc.jpg" style="width: 800px; height: 532px;" /><br style="color: rgb(0, 0, 0); font-family: Arial; background-color: rgb(189, 5, 6);" />\n	&nbsp;</p>\n<p style="text-align: justify;">\n	<span style="color: rgb(0, 0, 0); font-family: Arial;">Xe đưa Qu&yacute; kh&aacute;ch ra bến t&agrave;u Dương Đ&ocirc;ng, l&ecirc;n thuyền du ngoạn Bắc Đảo, c&acirc;u c&aacute; tại H&ograve;n M&oacute;ng Tay hoặc H&ograve;n Đồi Mồi - Đo&agrave;n sẽ được c&ugrave;ng nhau thử t&agrave;i c&acirc;u c&aacute;, thật l&agrave; th&uacute; vị khi tự tay Qu&yacute; kh&aacute;ch c&acirc;u được những ch&uacute; c&aacute; M&uacute; hay Tr&agrave;m... v&agrave; đ&acirc;y cũng l&agrave; dịp được trải nghiệm cuộc sống cần mẫn của người d&acirc;n nơi hải đảo. Sau đ&oacute; đo&agrave;n đi ngang B&atilde;i Biển G&agrave;nh Dầu, Qu&yacute; kh&aacute;ch sẽ c&oacute; dịp chi&ecirc;m ngưỡng cảnh đẹp thi&ecirc;n nhi&ecirc;n h&ugrave;ng vĩ của Vịnh Th&aacute;i Lan v&agrave; Hải giới Campuchia. T&agrave;u cập bến B&atilde;i &Ocirc;ng Lang - Một b&atilde;i biển dịu &ecirc;m, s&oacute;ng nhẹ, b&atilde;i c&aacute;t d&agrave;i tĩnh lặng v&agrave; nguy&ecirc;n sơ nơi đảo xanh. Tại đ&acirc;y Qu&yacute; kh&aacute;ch sẽ thật sự cảm thấy y&ecirc;n b&igrave;nh, thư th&aacute;i v&agrave; dường như cuộc sống chậm lại khi h&ograve;a m&igrave;nh c&ugrave;ng thi&ecirc;n nhi&ecirc;n. Về lại đất liền, xe đ&oacute;n Qu&yacute; kh&aacute;ch đưa về kh&aacute;ch sạn nghỉ ngơi, tr&ecirc;n đường về gh&eacute; tham quan Cơ Sở Nu&ocirc;i Cấy Ngọc Trai - Chi&ecirc;m ngưỡng v&agrave; tự do mua sắm trang sức bằng ngọc trai ch&iacute;nh hiệu được nu&ocirc;i cấy tại Ph&uacute; Quốc. Buổi tối, Qu&yacute; kh&aacute;ch tự do kh&aacute;m ph&aacute; Phố Đảo về đ&ecirc;m.</span><br style="color: rgb(0, 0, 0); font-family: Arial; background-color: rgb(189, 5, 6);" />\n	<br style="color: rgb(0, 0, 0); font-family: Arial; background-color: rgb(189, 5, 6);" />\n	<span style="color: rgb(0, 0, 0); font-family: Arial;">Lưu &yacute;: Trong trường hợp do thời tiết thay đổi theo m&ugrave;a chương tr&igrave;nh c&acirc;u c&aacute; sẽ được chuyển từ Bắc Đảo sang Nam Đảo ( B&Atilde;I SAO )</span></p>\n<p style="text-align: justify;">\n	&nbsp;</p>\n<h2>\n	<span style="color: rgb(0, 0, 0); font-family: Arial;">Ng&agrave;y 3 : PH&Uacute; QUỐC - TP.HCM (Số bữa ăn: 1 bữa)</span></h2>\n<p>\n	&nbsp;</p>\n<p>\n	<img alt="" src="/upload/images/tfd_20150929_Phu%20Quoc%20-%20Nguyen%20Xuan.jpg" style="width: 800px; height: 538px;" /></p>\n<p>\n	&nbsp;</p>\n<p style="text-align: justify;">\n	<span style="color: rgb(0, 0, 0); font-family: Arial;">Qu&yacute; kh&aacute;ch tự do tắm biển nghỉ ngơi tại kh&aacute;ch sạn cho đến giờ l&agrave;m thủ tục trả ph&ograve;ng. Sau đ&oacute;, xe đưa Qu&yacute; kh&aacute;ch ra s&acirc;n bay đ&aacute;p chuyến bay trở về Tp.HCM. Chia tay Qu&yacute; kh&aacute;ch v&agrave; kết th&uacute;c chương tr&igrave;nh du lịch tại s&acirc;n bay T&acirc;n Sơn Nhất.</span><br style="color: rgb(0, 0, 0); font-family: Arial; background-color: rgb(189, 5, 6);" />\n	&nbsp;</p>\n<p>\n	<br style="color: rgb(0, 0, 0); font-family: Arial; background-color: rgb(189, 5, 6);" />\n	&nbsp;</p>\n', '', 12, 121212, 2121212, '2016-03-27', '2016-03-31', 3, 3, 1, NULL, 1, 2, '2016-03-27'),
(820, 'Demo 33', 'Demo Tour', '', '', 0, 0, NULL, '2016-03-13', '2016-03-16', 1, 1, 1, NULL, 1, 1, '2016-03-28'),
(821, 'Demo 34', 'Demo Tour', '', 'D:\\Image\\hinh.jpg', 0, 0, NULL, '2016-03-13', '2016-03-16', 1, 1, 1, NULL, 1, 1, '2016-03-28'),
(822, 'Demo 35', 'Kiểm tra uft8', '', 'D:\\Image\\travel.jpg', 0, 0, NULL, '2016-03-13', '2016-03-16', 1, 1, 1, NULL, 1, 1, '2016-03-28'),
(834, 'MTDLDD823', '121212', '<p>\n	fsdfsdfsdf</p>\n', 'Co_HOA-KY.jpg', 1212, 121212, 121212, '2016-03-29', '2016-03-31', 3, 4, 2, NULL, 1, 1, NULL),
(835, 'demo 1928d', 'Demo Tour', '', 'D:\\Image\\travel.jpg', 0, 0, NULL, '2016-03-13', '2016-03-16', 1, 1, 1, NULL, 1, 1, NULL),
(837, 'demo ffr2', 'Demo Tour', '', 'D:\\Image\\travel.jpg', 0, 0, NULL, '2016-03-13', '2016-03-16', 1, 1, 1, NULL, 1, 1, '2016-03-30'),
(839, 'demo ffer2', 'Demo Tour', '', 'D:\\Image\\travel.jpg', 0, 0, NULL, '2016-03-13', '2016-03-16', 1, 1, 1, NULL, 1, 1, '2016-03-30'),
(840, 'demo ffe4r2', 'Demo Tour', '', 'D:\\Image\\travel.jpg', 0, 0, NULL, '2016-03-13', '2016-03-16', 1, 1, 1, NULL, 1, 1, '2016-03-30'),
(841, 'demo ffe432r2', 'Demo Tour', '', 'D:\\Image\\travel.jpg', 0, 0, NULL, '2016-03-13', '2016-03-16', 1, 1, 1, NULL, 1, 1, '2016-03-30'),
(842, 'demo azffe432r2', 'Demo Tour', '', 'D:\\Image\\travel.jpg', 0, 0, NULL, '2016-03-13', '2016-03-16', 1, 1, 1, NULL, 1, 1, '2016-03-30'),
(843, 'demo azfgffe432r2', 'Demo Tour', '', 'D:\\Image\\travel.jpg', 0, 0, NULL, '2016-03-13', '2016-03-16', 1, 1, 1, NULL, 1, 1, '2016-03-30'),
(844, 'MTDLDD844', '23423423', '<p>\n	&aacute;dasdasdasdasdasd</p>\n', 'CO-THAI.jpg', 3242, 324234, 234234, '2016-03-31', '2016-04-01', 2, 6, 2, NULL, 2, 2, '2016-03-30'),
(845, 'demo 1928d568', 'Demo Tour', '', 'D:\\Image\\travel.jpg', 0, 0, NULL, '2016-03-13', '2016-03-16', 1, 1, 1, NULL, 1, 1, NULL),
(846, 'demo 1zzs928d568', 'Demo Tour', '', 'D:\\Image\\travel.jpg', 0, 0, NULL, '2016-03-13', '2016-03-16', 1, 1, 1, NULL, 1, 1, '2016-03-30'),
(847, 'demo 1zzsze928d568', 'Demo Tour', '', 'D:\\Image\\travel.jpg', 0, 0, NULL, '2016-03-13', '2016-03-16', 1, 1, 1, NULL, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE IF NOT EXISTS `vehicle` (
  `vehicle_id` int(11) NOT NULL,
  `vehicle_name` varchar(45) NOT NULL,
  `vehicle_delete_date` date DEFAULT NULL,
  PRIMARY KEY (`vehicle_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`vehicle_id`, `vehicle_name`, `vehicle_delete_date`) VALUES
(1, 'Xe khách', NULL),
(2, 'Tàu hỏa', NULL),
(3, 'Máy bay', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `arrive_place`
--
ALTER TABLE `arrive_place`
  ADD CONSTRAINT `FK_arrive_place_id` FOREIGN KEY (`arrive_place_area_id`) REFERENCES `area` (`area_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `FK_1` FOREIGN KEY (`customer_group`) REFERENCES `group_users` (`group_users_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `customer_comment`
--
ALTER TABLE `customer_comment`
  ADD CONSTRAINT `FK_customer` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`customer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `form_order`
--
ALTER TABLE `form_order`
  ADD CONSTRAINT `FK_form_order_is_pay` FOREIGN KEY (`form_order_is_pay`) REFERENCES `status` (`status_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_form_order_customer_id` FOREIGN KEY (`form_order_customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_form_order_tour_id` FOREIGN KEY (`form_order_tour_id`) REFERENCES `tour` (`tour_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `fk_history` FOREIGN KEY (`user`) REFERENCES `staff` (`staff_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `fk_notification` FOREIGN KEY (`user`) REFERENCES `staff` (`staff_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `FK_services_hotel_id` FOREIGN KEY (`services_hotel_id`) REFERENCES `hotel` (`hotel_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_services_vehicle_id` FOREIGN KEY (`services_vehicle_id`) REFERENCES `vehicle` (`vehicle_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `FK_group_user` FOREIGN KEY (`staff_level`) REFERENCES `group_users` (`group_users_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tour`
--
ALTER TABLE `tour`
  ADD CONSTRAINT `FK_tour_arrive_place_id` FOREIGN KEY (`tour_arrive_place_id`) REFERENCES `arrive_place` (`arrive_place_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_tour_arrive_service_id` FOREIGN KEY (`tour_service_id`) REFERENCES `services` (`services_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_tour_from_place_id` FOREIGN KEY (`tour_from_place_id`) REFERENCES `from_place` (`from_place_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_tour_guider_id` FOREIGN KEY (`tour_guider_id`) REFERENCES `guider` (`guider_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_tour_status_id` FOREIGN KEY (`tour_active`) REFERENCES `status` (`status_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
