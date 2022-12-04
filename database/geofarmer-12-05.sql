-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.6.7-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for geofarmer
CREATE DATABASE IF NOT EXISTS `geofarmer` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `geofarmer`;

-- Dumping structure for table geofarmer.account
CREATE TABLE IF NOT EXISTS `account` (
  `accountID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(110) NOT NULL,
  `user` varchar(110) NOT NULL,
  `pass` varchar(110) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `birthday` varchar(100) DEFAULT NULL,
  `gender` varchar(10) NOT NULL,
  `mobilenumber` varchar(100) NOT NULL,
  `datecreated` varchar(100) DEFAULT curdate(),
  `region` varchar(100) DEFAULT NULL,
  `addresshead` varchar(100) NOT NULL,
  `status` varchar(10) DEFAULT NULL,
  `lat` varchar(1000) DEFAULT NULL,
  `longi` varchar(1000) DEFAULT NULL,
  `securityquestion` varchar(512) DEFAULT NULL,
  `securityanswer` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`accountID`),
  UNIQUE KEY `user` (`user`),
  UNIQUE KEY `mobilenumber` (`mobilenumber`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

-- Dumping data for table geofarmer.account: ~1 rows (approximately)
DELETE FROM `account`;
/*!40000 ALTER TABLE `account` DISABLE KEYS */;
INSERT INTO `account` (`accountID`, `name`, `user`, `pass`, `image`, `birthday`, `gender`, `mobilenumber`, `datecreated`, `region`, `addresshead`, `status`, `lat`, `longi`, `securityquestion`, `securityanswer`) VALUES
	(24, 'Test User', 'testuser', 'testuser', '1668841047.jpeg', NULL, 'Male', '09062281049', '2022-11-19', NULL, 'testuser, testuser, Alaminos (LA), Laguna, Philippines', NULL, '14.859850400601037', '121.93721428767262', 'In what city were you born?', 'Quezon City'),
	(26, 'Tester User', 'testeruser', 'testeruser', '1670173003.png', NULL, 'Male', '09123456789', '2022-12-05', NULL, 'Test User, Test User, Alaminos (LA), Laguna, Philippines', NULL, '14.5961', '121.0255', 'In what city were you born?', 'Test User'),
	(29, 'johndoe', 'johndoe', 'johndoe', '1670173443.png', NULL, 'Male', '09123456782', '2022-12-05', NULL, 'johndoe, johndoe, Alaminos (LA), Laguna, Philippines', NULL, '14.5961', '121.0255', 'What is your mothers maiden name?', 'johndoe'),
	(30, 'Jane Doe', 'janedoe', 'janedoe', '1670174709.jpg', NULL, 'Male', '09061123446', '2022-12-05', NULL, 'janedoe, janedoe, Alaminos (LA), Laguna, Philippines', NULL, '14.5961', '121.0255', 'In what city were you born?', 'janedoe');
/*!40000 ALTER TABLE `account` ENABLE KEYS */;

-- Dumping structure for table geofarmer.activitylog
CREATE TABLE IF NOT EXISTS `activitylog` (
  `activitylogID` int(100) NOT NULL AUTO_INCREMENT,
  `activitylogUSERID` varchar(100) DEFAULT NULL,
  `activitylogUSERTYPE` varchar(100) DEFAULT NULL,
  `activitylogDESCRIPTION` varchar(1000) DEFAULT NULL,
  `activitylogDATE` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`activitylogID`)
) ENGINE=InnoDB AUTO_INCREMENT=191 DEFAULT CHARSET=latin1;

-- Dumping data for table geofarmer.activitylog: ~14 rows (approximately)
DELETE FROM `activitylog`;
/*!40000 ALTER TABLE `activitylog` DISABLE KEYS */;
INSERT INTO `activitylog` (`activitylogID`, `activitylogUSERID`, `activitylogUSERTYPE`, `activitylogDESCRIPTION`, `activitylogDATE`) VALUES
	(155, '24', 'buyer', 'Shabu is added to your cart.', 'December 02, 2022 08:09:17pm'),
	(156, '24', 'buyer', 'Order ID No.Agri-Market120220220809 is successfully placed.', '120220220809'),
	(157, '24', 'buyer', 'Shabu is added to your cart.', 'December 02, 2022 08:10:48pm'),
	(158, '24', 'buyer', 'Order ID No.Agri-Market120220220810 is successfully placed.', '120220220810'),
	(159, ' 8', 'seller', 'You Have Successfully Accepted the Order with ID#: Agri-Market120220220810-24- 8', 'December 02, 2022 08:13:18pm'),
	(160, '8', 'seller', 'The status of order with ID#: Agri-Market120220220810-24- 8-24-8 has been successfully updated.', 'December 02, 2022 08:26:30pm'),
	(161, ' 8', 'seller', 'You Have Successfully Accepted the Order with ID#: Agri-Market120220220810-24- 8-24- 8', 'December 02, 2022 08:30:10pm'),
	(162, '8', 'seller', 'The status of order with ID#: Agri-Market120220220810-24- 8-24- 8 has been successfully updated.', 'December 02, 2022 08:30:28pm'),
	(163, '8', 'seller', 'The status of order with ID#: Agri-Market120220220810-24- 8-24- 8 has been successfully updated.', 'December 02, 2022 09:21:56pm'),
	(164, '24', 'buyer', 'Shabu is added to your cart.', 'December 02, 2022 10:58:29pm'),
	(165, '24', 'buyer', 'Order ID No.Agri-Market120220221058 is successfully placed.', '120220221058'),
	(166, '24', 'buyer', 'Shabu is added to your cart.', 'December 02, 2022 11:05:09pm'),
	(167, '24', 'buyer', 'Order ID No.Agri-Market120220221105 is successfully placed.', '120220221105'),
	(168, ' 8', 'seller', 'You Have Successfully Accepted the Order with ID#: Agri-Market120220221105-24- 8', 'December 02, 2022 11:05:33pm'),
	(169, '24', 'buyer', 'Saiko Sunflower is added to your cart.', 'December 05, 2022 12:45:41am'),
	(170, '24', 'buyer', 'Saiko Sunflower is added to your cart.', 'December 05, 2022 12:46:02am'),
	(171, '24', 'buyer', 'Saiko Sunflower is added to your cart.', 'December 05, 2022 12:47:45am'),
	(172, '24', 'buyer', 'Saiko Sunflower is added to your cart.', 'December 05, 2022 12:47:56am'),
	(173, '24', 'buyer', 'Saiko Sunflower is added to your cart.', 'December 05, 2022 12:48:50am'),
	(174, '24', 'buyer', 'Saiko Sunflower is added to your cart.', 'December 05, 2022 12:49:25am'),
	(175, '24', 'buyer', 'Saiko Sunflower is added to your cart.', 'December 05, 2022 12:50:51am'),
	(176, '28', 'buyer', 'Saiko Sunflower is added to your cart.', 'December 05, 2022 12:59:24am'),
	(177, '28', 'buyer', 'Order ID No.Agri-Market120520221259 is successfully placed.', '120520221259'),
	(178, '8', 'seller', 'You Have Successfully Accepted the Order with ID#: Agri-Market120520221259-28-8', 'December 05, 2022 01:00:09am'),
	(179, '29', 'buyer', 'Saiko Sunflower is added to your cart.', 'December 05, 2022 01:04:24am'),
	(180, '29', 'buyer', 'Order ID No.Agri-Market120520220104 is successfully placed.', '120520220104'),
	(181, '8', 'seller', 'You Have Successfully Accepted the Order with ID#: Agri-Market120520220104-29-8', 'December 05, 2022 01:05:10am'),
	(182, '8', 'seller', 'The status of order with ID#: Agri-Market120520220104-29-8 has been successfully updated.', 'December 05, 2022 01:13:42am'),
	(183, '30', 'buyer', 'Saiko Sunflower is added to your cart.', 'December 05, 2022 01:26:00am'),
	(184, '30', 'buyer', 'Order ID No.Agri-Market120520220126 is successfully placed.', '120520220126'),
	(185, '8', 'seller', 'You Have Successfully Accepted the Order with ID#: Agri-Market120520220126-30-8', 'December 05, 2022 01:26:37am'),
	(186, '8', 'seller', 'The status of order with ID#: Agri-Market120520220126-30-8 has been successfully updated.', 'December 05, 2022 01:26:56am'),
	(187, '24', 'buyer', 'Saikou Dahon is added to your cart.', 'December 05, 2022 01:32:23am'),
	(188, '24', 'buyer', 'Order ID No.Agri-Market120520220132 is successfully placed.', '120520220132'),
	(189, '20', 'seller', 'You Have Successfully Accepted the Order with ID#: Agri-Market120520220132-24-20', 'December 05, 2022 01:32:40am'),
	(190, '20', 'seller', 'The status of order with ID#: Agri-Market120520220132-24-20 has been successfully updated.', 'December 05, 2022 01:32:50am');
/*!40000 ALTER TABLE `activitylog` ENABLE KEYS */;

-- Dumping structure for table geofarmer.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `adminID` int(100) NOT NULL AUTO_INCREMENT,
  `adminNAME` varchar(100) DEFAULT NULL,
  `adminUSERNAME` varchar(100) DEFAULT NULL,
  `adminPASSWORD` varchar(100) DEFAULT NULL,
  `adminSTATUS` varchar(100) DEFAULT NULL,
  `adminimage` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`adminID`),
  UNIQUE KEY `adminUSERNAME` (`adminUSERNAME`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table geofarmer.admin: ~1 rows (approximately)
DELETE FROM `admin`;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`adminID`, `adminNAME`, `adminUSERNAME`, `adminPASSWORD`, `adminSTATUS`, `adminimage`) VALUES
	(1, 'Sample Admin', 'sample', 'sample', 'admin', '1660420407.png');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Dumping structure for table geofarmer.cart
CREATE TABLE IF NOT EXISTS `cart` (
  `cartID` int(100) NOT NULL AUTO_INCREMENT,
  `accountID` int(100) NOT NULL,
  `orderSELLER` varchar(100) DEFAULT NULL,
  `itemID` int(100) NOT NULL,
  `cartCOUNT` varchar(100) NOT NULL,
  `orderID` varchar(255) DEFAULT NULL,
  `cartDATE` varchar(100) NOT NULL,
  `cartTYPE` varchar(100) DEFAULT NULL,
  `cartSTATUS` varchar(100) DEFAULT NULL,
  `cartPENDING` varchar(100) DEFAULT NULL,
  `cartACCEPTED` varchar(100) DEFAULT NULL,
  `cartDELIVERY` varchar(100) DEFAULT NULL,
  `cartDELIVERYIMAGE` varchar(512) DEFAULT NULL,
  `cartRECIEVED` varchar(10000) DEFAULT NULL,
  `cartRECEIVEDIMAGE` varchar(512) DEFAULT NULL,
  `cartREVIEW` varchar(1000) DEFAULT NULL,
  `cartREVIEWRATING` int(11) DEFAULT NULL,
  `cartCREATEDAT` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`cartID`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

-- Dumping data for table geofarmer.cart: ~3 rows (approximately)
DELETE FROM `cart`;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
INSERT INTO `cart` (`cartID`, `accountID`, `orderSELLER`, `itemID`, `cartCOUNT`, `orderID`, `cartDATE`, `cartTYPE`, `cartSTATUS`, `cartPENDING`, `cartACCEPTED`, `cartDELIVERY`, `cartDELIVERYIMAGE`, `cartRECIEVED`, `cartRECEIVEDIMAGE`, `cartREVIEW`, `cartREVIEWRATING`, `cartCREATEDAT`) VALUES
	(59, 29, '8', 3, '5', 'Agri-Market120520220104-29-8', 'December 05, 2022 01:04:24am', 'Pick-Up', '5', 'December 05, 2022 01:04:24am', 'December 05, 2022 01:05:10am', 'December 05, 2022 01:13:42am', '1670174022.png', 'December 05, 2022 01:23:59am', '1670174639.jpg', NULL, NULL, '2022-12-05 01:04:24'),
	(60, 30, '8', 3, '5', 'Agri-Market120520220126-30-8', 'December 05, 2022 01:26:00am', 'Pick-Up', '5', 'December 05, 2022 01:26:00am', 'December 05, 2022 01:26:37am', 'December 05, 2022 01:26:56am', '1670174816.png', 'December 05, 2022 01:27:31am', '1670174851.jpg', 'good po', 5, '2022-12-05 01:26:00'),
	(61, 24, '20', 4, '5', 'Agri-Market120520220132-24-20', 'December 05, 2022 01:32:23am', 'Delivery', '4', 'December 05, 2022 01:32:23am', 'December 05, 2022 01:32:40am', 'December 05, 2022 01:32:50am', '1670175170.png', NULL, NULL, NULL, NULL, '2022-12-05 01:32:23');
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;

-- Dumping structure for table geofarmer.category
CREATE TABLE IF NOT EXISTS `category` (
  `categoryID` int(100) NOT NULL AUTO_INCREMENT,
  `categoryNAME` varchar(100) DEFAULT NULL,
  `categoryIMAGE` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`categoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Dumping data for table geofarmer.category: ~12 rows (approximately)
DELETE FROM `category`;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`categoryID`, `categoryNAME`, `categoryIMAGE`) VALUES
	(1, 'Plants', 'https://hgtvhome.sndimg.com/content/dam/images/grdn/fullset/2014/6/25/0/CI_04-fbfd01d70004.jpg.rend.hgtvcom.966.725.suffix/1452664590074.jpeg'),
	(2, 'rice', 'https://www.greenqueen.com.hk/wp-content/uploads/2020/03/rice-shutterstock.jpg'),
	(3, 'wheat', 'https://www.worldatlas.com/r/w2560-q80/upload/d8/f0/68/shutterstock-116527159.jpg'),
	(4, 'maize', 'https://cdn.britannica.com/36/167236-050-BF90337E/Ears-corn.jpg'),
	(5, 'sorghum', 'https://cdn.britannica.com/21/136021-050-FA97E7C7/Sorghum.jpg'),
	(6, 'ragi', 'https://upload.wikimedia.org/wikipedia/commons/6/6c/Finger_millet_3_11-21-02.jpg'),
	(8, 'fruits', 'https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/assortment-of-colorful-ripe-tropical-fruits-top-royalty-free-image-995518546-1564092355.jpg'),
	(9, 'vegetables', 'https://cdn.britannica.com/17/196817-050-6A15DAC3/vegetables.jpg'),
	(10, 'nuts', 'https://i0.wp.com/post.healthline.com/wp-content/uploads/2019/11/chestnut-nut-nuts-peanuts-pistachio-cashew-1296x728-header-1296x728.jpg?w=1155&h=1528'),
	(11, 'Tools', 'https://myknowledgebase.in/farming-tools-implements-and-equipment/spade-phawra/'),
	(12, 'Fertilizer', 'https://www.fertilizer-machine.net/wp-content/uploads/2018/06/types-of-fertilizer.jpg'),
	(13, 'Flower', 'https://cdn.britannica.com/45/5645-050-B9EC0205/head-treasure-flower-disk-flowers-inflorescence-ray.jpg');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;

-- Dumping structure for table geofarmer.farmers_masterlist
CREATE TABLE IF NOT EXISTS `farmers_masterlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(50) NOT NULL DEFAULT '0',
  `lastName` varchar(50) NOT NULL DEFAULT '0',
  `municipality` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `sellerId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sellerId` (`sellerId`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table geofarmer.farmers_masterlist: ~1 rows (approximately)
DELETE FROM `farmers_masterlist`;
/*!40000 ALTER TABLE `farmers_masterlist` DISABLE KEYS */;
INSERT INTO `farmers_masterlist` (`id`, `firstName`, `lastName`, `municipality`, `gender`, `categoryId`, `sellerId`) VALUES
	(6, 'Juan', 'Dela Cruz', 'Alaminos (LA)', 'Male', 8, 17),
	(7, 'John', 'Doe', 'Alaminos (LA)', 'Male', 1, 20);
/*!40000 ALTER TABLE `farmers_masterlist` ENABLE KEYS */;

-- Dumping structure for table geofarmer.item
CREATE TABLE IF NOT EXISTS `item` (
  `itemID` int(100) NOT NULL AUTO_INCREMENT,
  `itemNAME` varchar(1000) NOT NULL,
  `itemQUANTITY` varchar(100) NOT NULL,
  `itemPRICE` varchar(100) NOT NULL,
  `itemTOTALSELL` varchar(100) DEFAULT NULL,
  `itemLONGITUTE` varchar(1000) NOT NULL,
  `itemLATITUDE` varchar(1000) NOT NULL,
  `itemCATEGORY` varchar(100) NOT NULL,
  `itemDESCRIPTION` varchar(10000) DEFAULT NULL,
  `itemSELLER` varchar(100) NOT NULL,
  `itemIMG` varchar(100) DEFAULT NULL,
  `itemMOQ` int(11) DEFAULT NULL,
  `itemMAXOQ` int(11) DEFAULT NULL,
  `itemPRODUCTTYPE` int(11) DEFAULT NULL,
  PRIMARY KEY (`itemID`),
  KEY `FKProductSuggestions` (`itemPRODUCTTYPE`),
  CONSTRAINT `FKProductSuggestions` FOREIGN KEY (`itemPRODUCTTYPE`) REFERENCES `product_suggestions` (`product_suggestion_id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table geofarmer.item: ~0 rows (approximately)
DELETE FROM `item`;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
INSERT INTO `item` (`itemID`, `itemNAME`, `itemQUANTITY`, `itemPRICE`, `itemTOTALSELL`, `itemLONGITUTE`, `itemLATITUDE`, `itemCATEGORY`, `itemDESCRIPTION`, `itemSELLER`, `itemIMG`, `itemMOQ`, `itemMAXOQ`, `itemPRODUCTTYPE`) VALUES
	(3, 'Saiko Sunflower', '14', '300', '16', '121.0255', '14.5941', 'Plants', '                                                                                                            <p>The best sunflower</p>                                                                                                ', '8', '1670169486.jpg', 1, 30, 3),
	(4, 'Saikou Dahon', '29995', '2', '5', '121.1840057373047', '14.580260816495427', 'Plants', '<p>Best dahon in the whole world</p>', '20', '1670175091.png', 1, 99999, 4);
/*!40000 ALTER TABLE `item` ENABLE KEYS */;

-- Dumping structure for table geofarmer.notification
CREATE TABLE IF NOT EXISTS `notification` (
  `notificationID` int(100) NOT NULL AUTO_INCREMENT,
  `notificationCLIENTID` varchar(100) DEFAULT NULL,
  `notificationMESSAGE` varchar(1000) DEFAULT NULL,
  `notificationDATE` varchar(100) DEFAULT NULL,
  `notificationCLIENTTYPE` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`notificationID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table geofarmer.notification: ~0 rows (approximately)
DELETE FROM `notification`;
/*!40000 ALTER TABLE `notification` DISABLE KEYS */;
INSERT INTO `notification` (`notificationID`, `notificationCLIENTID`, `notificationMESSAGE`, `notificationDATE`, `notificationCLIENTTYPE`) VALUES
	(1, '28', 'Your ordered item "Saiko Sunflower" is accepted by the seller!', 'December 05, 2022 01:00:09am', 'customer'),
	(2, '29', 'Your ordered item "Saiko Sunflower" is accepted by the seller!', 'December 05, 2022 01:05:10am', 'customer'),
	(3, '29', 'Your order IDAgri-Market120520220104-29-8is now ready to be picked up.', 'December 05, 2022 01:13:42am', 'customer'),
	(4, '29', 'Your order IDAgri-Market120520220104-29-8is change the status by seller from Delivery to Delivered!', 'December 05, 2022 01:14:09am', 'customer'),
	(5, '29', 'Your order IDAgri-Market120520220104-29-8is change the status by seller from Delivery to Delivered!', 'December 05, 2022 01:23:59am', 'customer'),
	(6, '30', 'Your ordered item "Saiko Sunflower" is accepted by the seller!', 'December 05, 2022 01:26:37am', 'customer'),
	(7, '30', 'Your order IDAgri-Market120520220126-30-8is now ready to be picked up.', 'December 05, 2022 01:26:56am', 'customer'),
	(8, '30', 'Your order IDAgri-Market120520220126-30-8is change the status by seller from Delivery to Delivered!', 'December 05, 2022 01:27:31am', 'customer'),
	(9, '24', 'Your ordered item "Saikou Dahon" is accepted by the seller!', 'December 05, 2022 01:32:40am', 'customer'),
	(10, '24', 'Your order IDAgri-Market120520220132-24-20is now delivering.', 'December 05, 2022 01:32:50am', 'customer');
/*!40000 ALTER TABLE `notification` ENABLE KEYS */;

-- Dumping structure for table geofarmer.notifications
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(5000) NOT NULL DEFAULT '0',
  `expire_at` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table geofarmer.notifications: ~2 rows (approximately)
DELETE FROM `notifications`;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;

-- Dumping structure for table geofarmer.payment
CREATE TABLE IF NOT EXISTS `payment` (
  `paymentID` int(100) NOT NULL AUTO_INCREMENT,
  `paymentTYPE` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`paymentID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table geofarmer.payment: ~2 rows (approximately)
DELETE FROM `payment`;
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
INSERT INTO `payment` (`paymentID`, `paymentTYPE`) VALUES
	(1, 'COD'),
	(2, 'Pick-Up');
/*!40000 ALTER TABLE `payment` ENABLE KEYS */;

-- Dumping structure for table geofarmer.product_suggestions
CREATE TABLE IF NOT EXISTS `product_suggestions` (
  `product_suggestion_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_suggestion_name` varchar(500) NOT NULL,
  `product_suggestion_price` float NOT NULL,
  `product_suggestion_category_id` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`product_suggestion_id`) USING BTREE,
  KEY `FKProductSuggestionCategoryId` (`product_suggestion_category_id`),
  CONSTRAINT `FKProductSuggestionCategoryId` FOREIGN KEY (`product_suggestion_category_id`) REFERENCES `category` (`categoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table geofarmer.product_suggestions: ~3 rows (approximately)
DELETE FROM `product_suggestions`;
/*!40000 ALTER TABLE `product_suggestions` DISABLE KEYS */;
INSERT INTO `product_suggestions` (`product_suggestion_id`, `product_suggestion_name`, `product_suggestion_price`, `product_suggestion_category_id`) VALUES
	(2, 'Wheat', 500, 3),
	(3, 'Sunflower', 300, 1),
	(4, 'Dahon', 1, 1);
/*!40000 ALTER TABLE `product_suggestions` ENABLE KEYS */;

-- Dumping structure for table geofarmer.seller
CREATE TABLE IF NOT EXISTS `seller` (
  `sellerID` int(11) NOT NULL AUTO_INCREMENT,
  `sellerfirstname` varchar(110) NOT NULL,
  `sellerlastname` varchar(110) NOT NULL,
  `selleruser` varchar(110) NOT NULL,
  `sellerpass` varchar(110) NOT NULL,
  `sellerimage` varchar(100) DEFAULT NULL,
  `sellerlatitude` varchar(100) NOT NULL,
  `sellerlongitude` varchar(100) NOT NULL,
  `sellermobilenumber` varchar(100) NOT NULL,
  `sellerdatecreated` varchar(100) DEFAULT NULL,
  `selleremail` varchar(100) DEFAULT NULL,
  `sellerSTATUS` varchar(100) DEFAULT NULL,
  `selleraddress` varchar(100) DEFAULT NULL,
  `sellergender` varchar(50) DEFAULT NULL,
  `sellercategoryid` int(11) DEFAULT NULL,
  `sellersecurityquestion` varchar(512) DEFAULT NULL,
  `sellersecurityanswer` varchar(512) DEFAULT NULL,
  `sellerisseasonal` tinyint(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`sellerID`),
  UNIQUE KEY `selleruser` (`selleruser`),
  UNIQUE KEY `sellermobilenumber` (`sellermobilenumber`),
  UNIQUE KEY `selleremail` (`selleremail`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- Dumping data for table geofarmer.seller: ~3 rows (approximately)
DELETE FROM `seller`;
/*!40000 ALTER TABLE `seller` DISABLE KEYS */;
INSERT INTO `seller` (`sellerID`, `sellerfirstname`, `sellerlastname`, `selleruser`, `sellerpass`, `sellerimage`, `sellerlatitude`, `sellerlongitude`, `sellermobilenumber`, `sellerdatecreated`, `selleremail`, `sellerSTATUS`, `selleraddress`, `sellergender`, `sellercategoryid`, `sellersecurityquestion`, `sellersecurityanswer`, `sellerisseasonal`) VALUES
	(8, 'Test', 'User', 'testuser', 'testuser', '1668261407.jpg', '14.5941', '121.0255', '09022810469', 'November 12, 2022 09:56:47pm', 'testuser@gmail.com', 'active', 'testuser, , , Bay, Philippines', NULL, NULL, 'In what city were you born?', 'Quezon City', 1),
	(17, 'Juan', 'Dela Cruz', 'juandelacruz', 'juandelacruz', '1669818369.png', '14.5961', '121.0255', '09062281049', 'November 30, 2022 10:26:09pm', 'jdc@gmail.com', 'active', 'asdasd, dasdas, Alaminos (LA), Laguna, Philippines', 'Male', 8, NULL, NULL, 1),
	(20, 'John', 'Doe', 'johndoe', 'johndoe', '1670175013.jpg', '14.580260816495427', '121.1840057373047', '09123456789', 'December 05, 2022 01:30:13am', 'johndoe@gmail.com', 'active', 'johndoe, johndoe, Alaminos (LA), Laguna, Philippines', 'Male', 1, 'In what city were you born?', 'John doe', 0);
/*!40000 ALTER TABLE `seller` ENABLE KEYS */;

-- Dumping structure for table geofarmer.visitors
CREATE TABLE IF NOT EXISTS `visitors` (
  `visitor_id` int(11) NOT NULL AUTO_INCREMENT,
  `visitor_seller_id` int(11) NOT NULL DEFAULT 0,
  `visitor_account_id` int(11) NOT NULL DEFAULT 0,
  `visitor_is_converted` tinyint(1) NOT NULL DEFAULT 0,
  `visitor_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`visitor_id`),
  KEY `VisitorAccountFK` (`visitor_account_id`),
  KEY `VisitorSellerFK` (`visitor_seller_id`),
  CONSTRAINT `VisitorAccountFK` FOREIGN KEY (`visitor_account_id`) REFERENCES `account` (`accountID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `VisitorSellerFK` FOREIGN KEY (`visitor_seller_id`) REFERENCES `seller` (`sellerID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Dumping data for table geofarmer.visitors: ~0 rows (approximately)
DELETE FROM `visitors`;
/*!40000 ALTER TABLE `visitors` DISABLE KEYS */;
INSERT INTO `visitors` (`visitor_id`, `visitor_seller_id`, `visitor_account_id`, `visitor_is_converted`, `visitor_created_at`) VALUES
	(1, 8, 24, 0, '2022-12-03 22:01:06'),
	(2, 8, 24, 0, '2022-12-05 00:41:25'),
	(3, 8, 24, 0, '2022-12-05 00:45:01'),
	(4, 8, 24, 0, '2022-12-05 00:46:00'),
	(5, 8, 24, 1, '2022-12-05 00:46:13'),
	(6, 8, 24, 0, '2022-12-05 00:47:53'),
	(7, 8, 24, 0, '2022-12-05 00:48:06'),
	(8, 8, 24, 0, '2022-12-05 00:48:29'),
	(9, 8, 24, 0, '2022-12-05 00:49:21'),
	(10, 8, 24, 1, '2022-12-05 00:50:23'),
	(12, 8, 29, 1, '2022-12-05 01:04:17'),
	(13, 8, 30, 1, '2022-12-05 01:25:52'),
	(14, 8, 30, 0, '2022-12-05 01:27:56'),
	(15, 20, 24, 1, '2022-12-05 01:32:15');
/*!40000 ALTER TABLE `visitors` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
