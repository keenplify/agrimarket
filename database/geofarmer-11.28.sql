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
  PRIMARY KEY (`accountID`),
  UNIQUE KEY `user` (`user`),
  UNIQUE KEY `mobilenumber` (`mobilenumber`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- Dumping data for table geofarmer.account: ~1 rows (approximately)
DELETE FROM `account`;
/*!40000 ALTER TABLE `account` DISABLE KEYS */;
INSERT INTO `account` (`accountID`, `name`, `user`, `pass`, `image`, `birthday`, `gender`, `mobilenumber`, `datecreated`, `region`, `addresshead`, `status`, `lat`, `longi`) VALUES
	(24, 'Test User', 'testuser', 'testuser', '1668841047.jpeg', NULL, 'Male', '09062281049', '2022-11-19', NULL, 'testuser, testuser, Alaminos (LA), Laguna, Philippines', NULL, '14.859850400601037', '121.93721428767262');
/*!40000 ALTER TABLE `account` ENABLE KEYS */;

-- Dumping structure for table geofarmer.activitylog
CREATE TABLE IF NOT EXISTS `activitylog` (
  `activitylogID` int(100) NOT NULL AUTO_INCREMENT,
  `activitylogUSERID` varchar(100) DEFAULT NULL,
  `activitylogUSERTYPE` varchar(100) DEFAULT NULL,
  `activitylogDESCRIPTION` varchar(1000) DEFAULT NULL,
  `activitylogDATE` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`activitylogID`)
) ENGINE=InnoDB AUTO_INCREMENT=142 DEFAULT CHARSET=latin1;

-- Dumping data for table geofarmer.activitylog: ~134 rows (approximately)
DELETE FROM `activitylog`;
/*!40000 ALTER TABLE `activitylog` DISABLE KEYS */;
INSERT INTO `activitylog` (`activitylogID`, `activitylogUSERID`, `activitylogUSERTYPE`, `activitylogDESCRIPTION`, `activitylogDATE`) VALUES
	(8, '1', 'seller', 'Updating profile info failed, Some Info is Missing!', 'August 31, 2022 11:38:34pm'),
	(9, '1', 'seller', 'You Have Successfully Updated Your Profile Info!', 'August 31, 2022 11:39:40pm'),
	(10, '1', 'seller', 'Unsuccessfully Changing Your Avatar!', 'September 01, 2022 12:05:58am'),
	(11, '1', 'seller', 'Unsuccessfully Changing Your Avatar!', 'September 01, 2022 12:08:16am'),
	(12, '1', 'seller', 'Successfully Changing Your Avatar!', 'September 01, 2022 12:08:26am'),
	(13, '1', 'seller', 'Updating your security failed, You entered same old password!', 'September 01, 2022 12:20:06am'),
	(14, '1', 'seller', 'You Have Successfully Updated Your Security!', 'September 01, 2022 12:20:54am'),
	(15, '1', 'seller', 'Updating your security failed, Some info is missing!', 'September 01, 2022 12:21:44am'),
	(16, '1', 'seller', 'Updating your security failed, Some info is missing!', 'September 01, 2022 12:27:23am'),
	(17, '1', 'seller', 'Unsuccessfully Changing Your Avatar!', 'September 01, 2022 12:28:43am'),
	(18, '1', 'seller', 'Unsuccessfully Changing Your Avatar!', 'September 01, 2022 12:29:40am'),
	(19, '1', 'seller', 'Successfully Changing Your Avatar!', 'September 01, 2022 12:29:54am'),
	(20, '1', 'seller', 'Updating profile info failed, Some Info is Missing!', 'September 01, 2022 12:32:05am'),
	(21, '1', 'seller', 'You Have Successfully Updated Your Profile Info!', 'September 01, 2022 12:32:37am'),
	(22, '2', 'buyer', 'Suamei (XL2) is added to your cart.', ''),
	(23, '2', 'buyer', 'Suamei (XL2) is added to your cart.', 'September 07, 2022 01:01:49am'),
	(24, '', 'buyer', 'Order ID No.Agri-Market090720220106 is successfully place order.!', '090720220106'),
	(25, '2', 'buyer', 'Suamei (XL2) is added to your cart.', 'September 07, 2022 01:20:53am'),
	(26, '2', 'buyer', 'Suamei (XL2) is added to your cart.', 'September 10, 2022 02:09:50pm'),
	(27, '2', 'buyer', 'Asiatic Jasmine Snow-N-Summer (S) is added to your cart.', 'September 10, 2022 02:11:43pm'),
	(28, '2', 'buyer', 'Suamei (XL2) is added to your cart.', 'September 10, 2022 02:18:11pm'),
	(29, '2', 'buyer', 'Fertilizer is added to your cart.', 'September 10, 2022 02:18:31pm'),
	(30, '2', 'buyer', 'Suamei (XL2) is added to your cart.', 'September 10, 2022 02:26:09pm'),
	(31, '', 'buyer', 'Order ID No.Agri-Market091020220226 is successfully place order.!', '091020220226'),
	(32, '2', 'seller', 'You Have Successfully Accepted the Order with ID#: Agri-Market091020220226-2-2', 'September 10, 2022 04:15:42pm'),
	(33, '2', 'seller', 'You Have Successfully Accepted the Order with ID#: Agri-Market091020220226-2-2', 'September 10, 2022 04:36:58pm'),
	(34, '2', 'seller', 'You Have Successfully Accepted the Order with ID#: Agri-Market091020220226-2-2', 'September 10, 2022 04:37:03pm'),
	(35, '2', 'buyer', 'Suamei (XL2) is added to your cart.', 'September 10, 2022 05:06:37pm'),
	(36, '', 'buyer', 'Order ID No.Agri-Market091020220506 is successfully place order.!', '091020220506'),
	(37, '2', 'seller', 'You Have Successfully Accepted the Order with ID#: Agri-Market091020220506-2-2', 'September 10, 2022 05:07:35pm'),
	(38, '2', 'seller', 'Pick-Up order failed, Some info is missing!', 'September 10, 2022 07:59:12pm'),
	(39, '2', 'seller', 'You Have Successfully pick-up the Order with ID#: Agri-Market091020220226-2-2-2-2', 'September 10, 2022 07:59:52pm'),
	(40, '2', 'seller', 'You Have Successfully pick-up the Order with ID#: Agri-Market091020220226-2-2-2-2', 'September 10, 2022 08:00:28pm'),
	(41, '2', 'seller', 'You Have Successfully pick-up the Order with ID#: Agri-Market091020220226-2-2-2-2', 'September 10, 2022 08:01:00pm'),
	(42, '2', 'seller', 'You Have Successfully pick-up the Order with ID#: Agri-Market091020220226-2-2-2-2', 'September 10, 2022 08:02:57pm'),
	(43, '2', 'seller', 'You Have Successfully change status from Accepted to Delivery the Order with ID#: Agri-Market091020220506-2-2-2-2', 'September 10, 2022 08:26:22pm'),
	(44, '2', 'seller', 'You Have Successfully change status from Delivery to Delivered the Order with ID#: Agri-Market091020220506-2-2-2-2', 'September 10, 2022 08:32:12pm'),
	(45, '2', 'seller', 'Successfully Changing Your Avatar!', 'September 10, 2022 09:53:54pm'),
	(46, '2', 'seller', 'Unsuccessfully Changing Your Avatar!', 'September 10, 2022 09:54:09pm'),
	(47, '2', 'seller', 'You Have Successfully Updated Your Profile Info!', 'September 10, 2022 09:56:15pm'),
	(48, '', 'seller', 'Updating your address failed, Some info is missing!', 'September 10, 2022 10:48:12pm'),
	(49, '2', 'seller', 'You Have Successfully Updated Your Address!', 'September 10, 2022 10:49:03pm'),
	(50, '2', 'seller', 'You Have Successfully Updated Your Address!', 'September 10, 2022 10:50:32pm'),
	(51, '2', 'seller', 'You Have Successfully Updated Your Address!', 'September 10, 2022 10:56:17pm'),
	(52, '1', 'seller', 'You Have Successfully Updated Your Address!', 'September 11, 2022 05:35:43pm'),
	(53, '1', 'seller', 'You Have Successfully Updated Your Address!', 'September 11, 2022 05:36:28pm'),
	(54, '2', 'buyer', 'Successfully Changing Your Avatar!', 'September 11, 2022 09:46:27pm'),
	(55, '2', 'buyer', 'You Have Successfully Updated Your Profile Info!', 'September 11, 2022 11:02:30pm'),
	(56, '2', 'buyer', 'You Have Successfully Updated Your Profile Info!', 'September 11, 2022 11:18:14pm'),
	(57, '2', 'buyer', 'You Have Successfully Updated Your Profile Info!', 'September 11, 2022 11:19:40pm'),
	(58, '', 'seller', 'Updating your address failed, Some info is missing!', 'September 14, 2022 10:02:05pm'),
	(59, '', 'seller', 'Updating your address failed, Some info is missing!', 'September 14, 2022 10:02:11pm'),
	(60, '', 'seller', 'Updating your address failed, Some info is missing!', 'September 14, 2022 10:03:32pm'),
	(61, '', 'seller', 'Updating your address failed, Some info is missing!', 'September 14, 2022 10:03:40pm'),
	(62, '', 'seller', 'Updating your address failed, Some info is missing!', 'September 14, 2022 10:04:13pm'),
	(63, '', 'seller', 'Updating your address failed, Some info is missing!', 'September 14, 2022 10:04:30pm'),
	(64, '', 'seller', 'Updating your address failed, Some info is missing!', 'September 14, 2022 10:14:17pm'),
	(65, '2', 'buyer', 'You Have Successfully Updated Your Address!', 'September 14, 2022 10:16:53pm'),
	(66, '2', 'buyer', 'You Have Successfully Updated Your Address!', 'September 14, 2022 10:17:42pm'),
	(67, '2', 'buyer', 'Fertilizer is added to your cart.', 'September 14, 2022 10:49:21pm'),
	(68, '', 'buyer', 'Order ID No.Agri-Market091420221049 is successfully place order.!', '091420221049'),
	(69, '2', 'buyer', 'Rice is added to your cart.', 'September 14, 2022 10:51:34pm'),
	(70, '', 'buyer', 'Order ID No.Agri-Market091420221051 is successfully place order.!', '091420221051'),
	(71, '2', 'buyer', 'Fertilizer is added to your cart.', 'September 14, 2022 11:28:18pm'),
	(72, '2', 'buyer', 'Suamei (XL2) is added to your cart.', 'September 14, 2022 11:28:34pm'),
	(73, '2', 'buyer', 'Order ID No.Agri-Market091420221128 is successfully place order.!', '091420221128'),
	(74, ' 1', 'seller', 'You Have Successfully Accepted the Order with ID#: Agri-Market091020220226-2- 1', 'September 18, 2022 03:11:01am'),
	(75, '2', 'buyer', 'Fertilizer is added to your cart.', 'September 18, 2022 03:15:01am'),
	(76, '2', 'buyer', 'Order ID No.Agri-Market091820220315 is successfully place order.!', '091820220315'),
	(77, '2', 'buyer', 'Fertilizer is added to your cart.', 'September 18, 2022 03:18:40am'),
	(78, '2', 'buyer', 'Order ID No.Agri-Market091820220318 is successfully place order.!', '091820220318'),
	(79, ' 1', 'seller', 'You Have Successfully Accepted the Order with ID#: Agri-Market091820220318-2- 1', 'September 18, 2022 03:18:58am'),
	(80, '2', 'buyer', 'Fertilizer is added to your cart.', 'September 18, 2022 03:28:47am'),
	(81, '2', 'buyer', 'Asiatic Jasmine Snow-N-Summer (S) is added to your cart.', 'September 18, 2022 03:28:56am'),
	(82, '2', 'buyer', 'Suamei (XL2) is added to your cart.', 'September 18, 2022 03:29:37am'),
	(83, '2', 'buyer', 'Order ID No.Agri-Market091820220329 is successfully place order.!', '091820220329'),
	(84, ' 1', 'seller', 'You Have Successfully Accepted the Order with ID#: Agri-Market091820220329-2- 1', 'September 18, 2022 03:29:59am'),
	(85, ' 1', 'seller', 'You Have Successfully Accepted the Order with ID#: Agri-Market091820220329-2- 1', 'September 18, 2022 03:30:03am'),
	(86, '1', 'seller', 'You Have Successfully change status from Accepted to Delivery the Order with ID#: Agri-Market091820220329-2- 1-2-1', 'September 18, 2022 03:32:33am'),
	(87, '1', 'seller', 'You Have Successfully change status from Delivery to Delivered the Order with ID#: Agri-Market091820220329-2- 1-2-1', 'September 18, 2022 03:33:15am'),
	(88, '2', 'buyer', 'Fertilizer is added to your cart.', 'September 18, 2022 03:35:11am'),
	(89, '2', 'buyer', 'Order ID No.Agri-Market091820220335 is successfully place order.!', '091820220335'),
	(90, ' 1', 'seller', 'You Have Successfully Accepted the Order with ID#: Agri-Market091820220335-2- 1', 'September 18, 2022 03:35:32am'),
	(91, '1', 'seller', 'You Have Successfully pick-up the Order with ID#: Agri-Market091820220335-2- 1-2-1', 'September 18, 2022 03:39:49am'),
	(92, '2', 'buyer', 'Suamei (XL2) is added to your cart.', 'September 18, 2022 03:46:38am'),
	(93, '2', 'buyer', 'Suamei (XL2) is added to your cart.', 'September 18, 2022 03:50:47am'),
	(94, '2', 'buyer', 'Suamei (XL2) is added to your cart.', 'September 18, 2022 03:51:01am'),
	(95, '1', 'seller', 'You Have Successfully Updated Your Address!', 'September 18, 2022 03:54:18am'),
	(96, '1', 'seller', 'You Have Successfully change status from Accepted to Delivery the Order with ID#: Agri-Market091820220318-2- 1-2-1', 'September 18, 2022 04:59:32am'),
	(97, '1', 'seller', 'You Have Successfully Updated Your Address!', 'October 06, 2022 09:27:06pm'),
	(98, '2', 'buyer', 'Suamei (XL2) is added to your cart.', 'October 09, 2022 11:58:44pm'),
	(99, '2', 'buyer', 'Suamei (XL2) is added to your cart.', 'October 10, 2022 12:11:27am'),
	(100, '2', 'buyer', 'You Have Successfully Updated Your Address!', 'October 10, 2022 12:49:01am'),
	(101, '', 'seller', 'Updating your address failed, Some info is missing!', 'October 10, 2022 01:09:10am'),
	(102, '1', 'seller', 'You Have Successfully Updated Your Address!', 'October 10, 2022 01:09:48am'),
	(103, '1', 'seller', 'You Have Successfully Updated Your Address!', 'October 10, 2022 01:11:00am'),
	(104, '1', 'seller', 'You Have Successfully change status from Delivery to Delivered the Order with ID#: Agri-Market091820220318-2- 1-2-1', 'October 11, 2022 09:28:33pm'),
	(105, '2', 'buyer', 'Fertilizer is added to your cart.', 'October 11, 2022 09:31:14pm'),
	(106, '2', 'buyer', 'Order ID No.Agri-Market101120220931 is successfully place order.!', '101120220931'),
	(107, '2', 'buyer', 'Fertilizer is added to your cart.', 'October 12, 2022 10:23:21am'),
	(108, '2', 'buyer', 'Order ID No.Agri-Market101220221023 is successfully place order.!', '101220221023'),
	(109, ' 1', 'seller', 'You Have Successfully Accepted the Order with ID#: Agri-Market101120220931-2- 1', 'October 12, 2022 10:24:07am'),
	(110, '1', 'seller', 'You Have Successfully change status from Accepted to Delivery the Order with ID#: Agri-Market101120220931-2- 1-2-1', 'October 12, 2022 10:24:23am'),
	(111, '2', 'buyer', 'You Have Successfully Updated Your Profile Info!', 'October 12, 2022 10:38:30am'),
	(112, '2', 'buyer', 'You Have Successfully Updated Your Profile Info!', 'October 12, 2022 10:39:46am'),
	(113, '2', 'buyer', 'You Have Successfully Updated Your Profile Info!', 'October 12, 2022 10:40:36am'),
	(114, '14', 'buyer', 'Suamei (XL2) is added to your cart.', 'October 12, 2022 11:34:57am'),
	(115, ' 1', 'seller', 'You Have Successfully Accepted the Order with ID#: Agri-Market101220221023-2- 1', 'October 12, 2022 11:51:32am'),
	(116, '1', 'seller', 'You Have Successfully change status from Accepted to Delivery the Order with ID#: Agri-Market101220221023-2- 1-2-1', 'October 12, 2022 11:51:43am'),
	(117, '2', 'buyer', 'You Have Successfully Updated Your Address!', 'October 12, 2022 12:02:14pm'),
	(118, '16', 'buyer', 'You Have Successfully Updated Your Address!', 'October 19, 2022 11:12:39pm'),
	(119, '16', 'buyer', 'Updating your address failed, Some info is missing!', 'October 19, 2022 11:14:25pm'),
	(120, '16', 'buyer', 'You Have Successfully Updated Your Address!', 'October 19, 2022 11:15:21pm'),
	(121, '16', 'buyer', 'You Have Successfully Updated Your Address!', 'October 19, 2022 11:16:00pm'),
	(122, '16', 'buyer', 'You Have Successfully Updated Your Address!', 'October 19, 2022 11:16:30pm'),
	(123, '16', 'buyer', 'You Have Successfully Updated Your Address!', 'October 19, 2022 11:21:19pm'),
	(124, '16', 'buyer', 'You Have Successfully Updated Your Address!', 'October 19, 2022 11:24:00pm'),
	(125, '16', 'buyer', 'You Have Successfully Updated Your Address!', 'October 19, 2022 11:24:39pm'),
	(126, '16', 'buyer', 'Updating your security failed, Some info is missing!', 'October 19, 2022 11:37:13pm'),
	(127, '16', 'buyer', 'You Have Successfully Updated Your Security!', 'October 19, 2022 11:37:27pm'),
	(128, '16', 'buyer', 'You Have Successfully Updated Your Security!', 'October 19, 2022 11:37:45pm'),
	(129, '16', 'buyer', 'You Have Successfully Updated Your Security!', 'October 19, 2022 11:39:04pm'),
	(130, '6', 'seller', 'You Have Successfully Updated Your Address!', 'October 23, 2022 12:20:13am'),
	(131, '16', 'buyer', 'Brown Rice is added to your cart.', 'October 23, 2022 12:30:03am'),
	(132, '16', 'buyer', 'Fertilizer is added to your cart.', 'October 23, 2022 12:45:04am'),
	(133, '16', 'buyer', 'You Have Successfully Updated Your Address!', 'October 23, 2022 12:45:24am'),
	(134, '17', 'buyer', 'Shabu is added to your cart.', 'November 12, 2022 10:11:34pm'),
	(135, '17', 'buyer', 'Shabu is added to your cart.', 'November 12, 2022 10:11:47pm'),
	(136, '17', 'buyer', 'Order ID No.Agri-Market111220221012 is successfully place order.!', '111220221012'),
	(137, '24', 'buyer', 'Shabu is added to your cart.', 'November 23, 2022 01:21:56am'),
	(138, '24', 'buyer', 'Shabu is added to your cart.', 'November 28, 2022 06:59:36am'),
	(139, '24', 'buyer', 'Shabu is added to your cart.', 'November 28, 2022 07:08:15am'),
	(140, '24', 'buyer', 'Order ID No.Agri-Market112820220711 is successfully place order.!', '112820220711'),
	(141, '24', 'buyer', 'Shabu is added to your cart.', 'November 28, 2022 07:11:28am');
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
  `cartSTATUS` varchar(100) DEFAULT NULL,
  `cartPAYMENTTYPE` varchar(100) DEFAULT NULL,
  `cartPENDING` varchar(100) DEFAULT NULL,
  `cartACCEPTED` varchar(100) DEFAULT NULL,
  `cartDELIVERY` varchar(100) DEFAULT NULL,
  `cartRECIEVED` varchar(10000) DEFAULT NULL,
  `cartREVIEW` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`cartID`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

-- Dumping data for table geofarmer.cart: ~2 rows (approximately)
DELETE FROM `cart`;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
INSERT INTO `cart` (`cartID`, `accountID`, `orderSELLER`, `itemID`, `cartCOUNT`, `orderID`, `cartDATE`, `cartSTATUS`, `cartPAYMENTTYPE`, `cartPENDING`, `cartACCEPTED`, `cartDELIVERY`, `cartRECIEVED`, `cartREVIEW`) VALUES
	(38, 24, ' 8', 13, '5', 'Agri-Market112820220711', 'November 28, 2022 07:08:15am', '2', '1', 'November 28, 2022 07:08:15am', NULL, NULL, NULL, NULL),
	(39, 24, ' 8', 13, '5', '1', 'November 28, 2022 07:11:28am', '2', NULL, 'November 28, 2022 07:11:28am', NULL, NULL, NULL, NULL);
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
  `sellerId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sellerId` (`sellerId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table geofarmer.farmers_masterlist: ~2 rows (approximately)
DELETE FROM `farmers_masterlist`;
/*!40000 ALTER TABLE `farmers_masterlist` DISABLE KEYS */;
INSERT INTO `farmers_masterlist` (`id`, `firstName`, `lastName`, `municipality`, `sellerId`) VALUES
	(2, 'Johny', 'Doe', 'Siniloan', 16),
	(3, 'Test', 'Farmer', 'Siniloan', NULL);
/*!40000 ALTER TABLE `farmers_masterlist` ENABLE KEYS */;

-- Dumping structure for table geofarmer.item
CREATE TABLE IF NOT EXISTS `item` (
  `itemID` int(100) NOT NULL AUTO_INCREMENT,
  `itemNAME` varchar(1000) DEFAULT NULL,
  `itemQUANTITY` varchar(100) DEFAULT NULL,
  `itemPRICE` varchar(100) DEFAULT NULL,
  `itemTOTALSELL` varchar(100) DEFAULT NULL,
  `itemLONGITUTE` varchar(1000) DEFAULT NULL,
  `itemLATITUDE` varchar(1000) DEFAULT NULL,
  `itemCATEGORY` varchar(100) DEFAULT NULL,
  `itemDESCRIPTION` varchar(10000) DEFAULT NULL,
  `itemSELLER` varchar(100) DEFAULT NULL,
  `itemIMG` varchar(100) DEFAULT NULL,
  `itemMOQ` int(11) DEFAULT 1,
  PRIMARY KEY (`itemID`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Dumping data for table geofarmer.item: ~6 rows (approximately)
DELETE FROM `item`;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
INSERT INTO `item` (`itemID`, `itemNAME`, `itemQUANTITY`, `itemPRICE`, `itemTOTALSELL`, `itemLONGITUTE`, `itemLATITUDE`, `itemCATEGORY`, `itemDESCRIPTION`, `itemSELLER`, `itemIMG`, `itemMOQ`) VALUES
	(2, 'Fertilizer', '100', '1200', '6', '121.049128', '14.651118', 'Fertilizer', 'Fertilizer', '8', 'types-of-fertilizer.jpg', 1),
	(5, 'Suamei (XL2)', '100', '1500', '5', '121.034182', '14.634227', 'Plants', 'Plant Name:&nbsp;<br />\r\nWrightia religiosa&lt;br&gt;<br />\r\n&lt;br&gt;<br />\r\nSuamei, also known as Water Jasmine Tree and Shui Mei, is an ornamental tree with twiggy branches that grows thin leaves. It produces small, pendulous white flowers that have a fragrance similar to true jasmine.&lt;br&gt;<br />\r\n&lt;br&gt;<br />\r\nIt&#039;s easy to maintain and requires minimum supervision. Place it in a bright spot indoors or outdoors shaded to full sun to thrive.<br />\r\n&lt;br&gt;<br />\r\nPlant Size&lt;br&gt;<br />\r\nAround 5 ft.&lt;br&gt;<br />\r\n&lt;br&gt;<br />\r\nThe plant in the photo is the actual plant you will receive.', '8', 'image_b8153948-32a9-4d8a-b9ab-be8361bf98b9_540x.jpg', 1),
	(11, 'Asiatic Jasmine Snow-N-Summer (S)', '100', '99', '0', '120.3086293', '16.0022035', 'Plants', '&amp;lt;div&amp;gt;&amp;lt;b&amp;gt;Plant Name;&amp;lt;/b&amp;gt; Asiatic Jasmine Snow-N-Summer&amp;amp;nbsp;&amp;lt;/div&amp;gt;&amp;lt;div&amp;gt;&amp;lt;i&amp;gt;Trachelospermum asiaticum SnowNSummer&amp;lt;/i&amp;gt;&amp;lt;/div&amp;gt;&amp;lt;div&amp;gt;&amp;lt;b&amp;gt;Plant Size:&amp;amp;nbsp;&amp;amp;nbsp;&amp;lt;/b&amp;gt;Around 8&amp;lt;/div&amp;gt;&amp;lt;div&amp;gt;&amp;lt;br&amp;gt;&amp;lt;/div&amp;gt;&amp;lt;div&amp;gt;&amp;lt;i&amp;gt;Snow-N-Summer &amp;lt;/i&amp;gt;is a great plant to add color to your space. New leaves start out in pretty and bright pink then fades to speckled green, and eventually turns to a vibrant emerald green.&amp;amp;nbsp;&amp;lt;/div&amp;gt;&amp;lt;div&amp;gt;&amp;lt;br&amp;gt;&amp;lt;/div&amp;gt;&amp;lt;div&amp;gt;We recommend cutting the tips occasionally to encourage colorful new growth. This plant can also be trained to vine or cascade trail. This plant is not suitable for low-light spaces. It thrives in bright indirect light to full-sun spots and can be drought-tolerant once fully established.&amp;lt;/div&amp;gt;&amp;lt;div&amp;gt;&amp;lt;br&amp;gt;&amp;lt;/div&amp;gt;&amp;lt;div&amp;gt;Every plant is unique and can therefore differ from the plant shown on the photo.&amp;lt;/div&amp;gt;', '8', '1662278257.jpg', 1),
	(12, 'Tomato, Big Pink Hybrid Seed ', '100', '240', '0', '120.95681726932526', '14.441205135764736', 'Crops', '40 pcs seed', '8', '1665567994.jpeg', 1),
	(13, 'Shabu', '87', '100', '15', '121.095427', '14.735833', 'Plants', 'get na kayo', '8', '1668262256.jpg', 3),
	(14, 'Groot', '999', '500', '0', '121.0255', '14.5961', 'Plants', '<p>i am groot</p>', '8', '1669138110.jpg', 10);
/*!40000 ALTER TABLE `item` ENABLE KEYS */;

-- Dumping structure for table geofarmer.notification
CREATE TABLE IF NOT EXISTS `notification` (
  `notificationID` int(100) NOT NULL AUTO_INCREMENT,
  `notificationCLIENTID` varchar(100) DEFAULT NULL,
  `notificationMESSAGE` varchar(1000) DEFAULT NULL,
  `notificationDATE` varchar(100) DEFAULT NULL,
  `notificationCLIENTTYPE` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`notificationID`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- Dumping data for table geofarmer.notification: ~22 rows (approximately)
DELETE FROM `notification`;
/*!40000 ALTER TABLE `notification` DISABLE KEYS */;
INSERT INTO `notification` (`notificationID`, `notificationCLIENTID`, `notificationMESSAGE`, `notificationDATE`, `notificationCLIENTTYPE`) VALUES
	(5, '2', 'Your order IDAgri-Market091020220226-2-2is change the status by seller from accepted to pickup!', 'September 10, 2022 07:59:52pm', 'customer'),
	(6, '2', 'Your order IDAgri-Market091020220226-2-2is change the status by seller from accepted to pickup!', 'September 10, 2022 08:00:28pm', 'customer'),
	(7, '2', 'Your order IDAgri-Market091020220226-2-2is change the status by seller from accepted to pickup!', 'September 10, 2022 08:01:00pm', 'customer'),
	(8, '2', 'Your order IDAgri-Market091020220226-2-2is change the status by seller from accepted to pickup!', 'September 10, 2022 08:02:57pm', 'customer'),
	(9, '2', 'Your order IDAgri-Market091020220506-2-2is change the status by seller from accepted to Delivery!', 'September 10, 2022 08:26:22pm', 'customer'),
	(10, '2', 'Your order IDAgri-Market091020220506-2-2is change the status by seller from Delivery to Delivered!', 'September 10, 2022 08:32:12pm', 'customer'),
	(11, '2', 'Your order nameSuamei (XL2)is Accepted by the seller!', 'September 18, 2022 03:11:01am', 'customer'),
	(12, '2', 'Your order nameFertilizeris Accepted by the seller!', 'September 18, 2022 03:18:58am', 'customer'),
	(13, '2', 'Your order nameAsiatic Jasmine Snow-N-Summer (S)is Accepted by the seller!', 'September 18, 2022 03:29:59am', 'customer'),
	(14, '2', 'Your order nameFertilizeris Accepted by the seller!', 'September 18, 2022 03:30:03am', 'customer'),
	(15, '2', 'Your order IDAgri-Market091820220329-2- 1is change the status by seller from accepted to Delivery!', 'September 18, 2022 03:32:33am', 'customer'),
	(16, '2', 'Your order IDAgri-Market091820220329-2- 1is change the status by seller from Delivery to Delivered!', 'September 18, 2022 03:33:15am', 'customer'),
	(17, '2', 'Your order nameFertilizeris Accepted by the seller!', 'September 18, 2022 03:35:32am', 'customer'),
	(18, '2', 'Your order IDAgri-Market091820220335-2- 1is change the status by seller from accepted to already pickup!', 'September 18, 2022 03:39:49am', 'customer'),
	(19, '2', 'Your order IDAgri-Market091820220318-2- 1is change the status by seller from accepted to Delivery!', 'September 18, 2022 04:59:32am', 'customer'),
	(20, '2', 'Your order IDAgri-Market091820220318-2- 1is change the status by seller from Delivery to Delivered!', 'October 11, 2022 09:28:33pm', 'customer'),
	(21, '2', 'Your order nameFertilizeris Accepted by the seller!', 'October 12, 2022 10:24:07am', 'customer'),
	(22, '2', 'Your order IDAgri-Market101120220931-2- 1is change the status by seller from accepted to Delivery!', 'October 12, 2022 10:24:23am', 'customer'),
	(23, '2', 'Your order IDAgri-Market101120220931-2- 1is change the status by seller from Delivery to Delivered!', 'October 12, 2022 10:30:06am', 'customer'),
	(24, '2', 'Your order nameFertilizeris Accepted by the seller!', 'October 12, 2022 11:51:32am', 'customer'),
	(25, '2', 'Your order IDAgri-Market101220221023-2- 1is change the status by seller from accepted to Delivery!', 'October 12, 2022 11:51:43am', 'customer'),
	(26, '2', 'Your order IDAgri-Market101120220931is change the status by you to Order Cancelled!', 'October 12, 2022 11:57:51am', 'customer');
/*!40000 ALTER TABLE `notification` ENABLE KEYS */;

-- Dumping structure for table geofarmer.orderstatus
CREATE TABLE IF NOT EXISTS `orderstatus` (
  `orderstatusID` int(100) NOT NULL AUTO_INCREMENT,
  `orderstatusDES` varchar(100) NOT NULL,
  `orderCODE` varchar(10000) NOT NULL,
  PRIMARY KEY (`orderstatusID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table geofarmer.orderstatus: ~0 rows (approximately)
DELETE FROM `orderstatus`;
/*!40000 ALTER TABLE `orderstatus` DISABLE KEYS */;
/*!40000 ALTER TABLE `orderstatus` ENABLE KEYS */;

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

-- Dumping structure for table geofarmer.paymenttype
CREATE TABLE IF NOT EXISTS `paymenttype` (
  `paymenttypeID` int(100) NOT NULL AUTO_INCREMENT,
  `paymenttypeNAME` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`paymenttypeID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table geofarmer.paymenttype: ~2 rows (approximately)
DELETE FROM `paymenttype`;
/*!40000 ALTER TABLE `paymenttype` DISABLE KEYS */;
INSERT INTO `paymenttype` (`paymenttypeID`, `paymenttypeNAME`) VALUES
	(1, 'COD'),
	(2, 'PICK-UP');
/*!40000 ALTER TABLE `paymenttype` ENABLE KEYS */;

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
  PRIMARY KEY (`sellerID`),
  UNIQUE KEY `selleruser` (`selleruser`),
  UNIQUE KEY `sellermobilenumber` (`sellermobilenumber`),
  UNIQUE KEY `selleremail` (`selleremail`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Dumping data for table geofarmer.seller: ~1 rows (approximately)
DELETE FROM `seller`;
/*!40000 ALTER TABLE `seller` DISABLE KEYS */;
INSERT INTO `seller` (`sellerID`, `sellerfirstname`, `sellerlastname`, `selleruser`, `sellerpass`, `sellerimage`, `sellerlatitude`, `sellerlongitude`, `sellermobilenumber`, `sellerdatecreated`, `selleremail`, `sellerSTATUS`, `selleraddress`) VALUES
	(8, 'Test', 'User', 'testuser', 'testuser', '1668261407.jpg', '14.5941', '121.0255', '09022810469', 'November 12, 2022 09:56:47pm', 'testuser@gmail.com', 'active', 'testuser, , , , Philippines');
/*!40000 ALTER TABLE `seller` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
