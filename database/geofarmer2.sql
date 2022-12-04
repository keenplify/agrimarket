-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2022 at 07:25 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `geofarmer2`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `accountID` int(11) NOT NULL,
  `name` varchar(110) NOT NULL,
  `user` varchar(110) NOT NULL,
  `pass` varchar(110) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `birthday` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `mobilenumber` varchar(100) NOT NULL,
  `datecreated` varchar(100) NOT NULL,
  `region` varchar(100) DEFAULT NULL,
  `addresshead` varchar(100) NOT NULL,
  `status` varchar(10) DEFAULT NULL,
  `lat` varchar(1000) DEFAULT NULL,
  `longi` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`accountID`, `name`, `user`, `pass`, `image`, `birthday`, `gender`, `mobilenumber`, `datecreated`, `region`, `addresshead`, `status`, `lat`, `longi`) VALUES
(2, 'Sample Sample', 'sample', 'sample', '1662903987.png', '2021-03-04', 'Female', '09299607356', '03/28/2022 09:36:30 pm', '', '001, Mabini Ext. (Pob.), DINALUPIHAN, BATAAN, Philippines', 'blocked', '16.004565782746422', '120.32363891601562'),
(3, 'Danilo M. Dulce', 'Danilo', 'Danilo', 'null.png', '2021-03-13', 'Female', '09155882430', '03/28/2022 09:36:30 pm', NULL, 'Nagulayan, Binmaley, Pangasinan', 'active', NULL, NULL),
(4, 'Rodel C. Fernandez', 'Rodel', 'Rodel', 'null.png', '2021-03-10', 'Female', '09155882430', '03/28/2021 09:59:11 pm', NULL, 'Sabagan, Lingayen, Pangasinan', 'active', NULL, NULL),
(7, 'Nicasio S. De Leon', 'nic', 'nic', 'null.png', '2021-03-04', 'Female', '09299607356', '04/05/2021 10:47:56 pm', NULL, 'Malempuec, Lingayen, Pangasinan', 'active', NULL, NULL),
(8, 'Randy F. Gil', 'ran', 'ran', 'null.png', '2021-04-03', 'Male', '09299607356', '04/09/2021 11:32:17 pm', NULL, 'Casulming, Lingayen, Pangasinan', 'active', NULL, NULL),
(9, 'Jovelyn Joaquin', 'jovs', 'jovs', 'null.png', '2021-03-04', 'Male', '09299607356', '03/28/2022 09:36:30 pm', NULL, 'Nagulayan, Binmaley, Pangasinan', 'blocked', NULL, NULL),
(10, 'ewewe', 'ewew', 'ewewe', NULL, 'wewew', 'wew', 'wew', 'ewew', NULL, 'wewew', 'active', NULL, NULL),
(11, 'Clara Agustine', 'clara01', 'clara01', '.png', '', '', '09000000001', '', NULL, '', NULL, NULL, NULL),
(12, 'Romeo Cruz', 'romeo01', 'romeo01', 'null.png', '', '', '09000000002', '', NULL, '', NULL, NULL, NULL),
(13, 'Recardo Mamaril', 'recardo1', 'recardo1', '1665434860.jpg', '', '', '09000000003', '', NULL, '', NULL, NULL, NULL),
(14, 'Shen Cruz', 'shen01', 'shen01', '1665545553.ico', '', '', '09000000005', '', NULL, '001, San Jose, LIBJO (ALBOR), DINAGAT ISLANDS, Philippines', NULL, '14.597793782185706', '120.97161049685477');

-- --------------------------------------------------------

--
-- Table structure for table `activitylog`
--

CREATE TABLE `activitylog` (
  `activitylogID` int(100) NOT NULL,
  `activitylogUSERID` varchar(100) DEFAULT NULL,
  `activitylogUSERTYPE` varchar(100) DEFAULT NULL,
  `activitylogDESCRIPTION` varchar(1000) DEFAULT NULL,
  `activitylogDATE` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activitylog`
--

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
(117, '2', 'buyer', 'You Have Successfully Updated Your Address!', 'October 12, 2022 12:02:14pm');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(100) NOT NULL,
  `adminNAME` varchar(100) DEFAULT NULL,
  `adminUSERNAME` varchar(100) DEFAULT NULL,
  `adminPASSWORD` varchar(100) DEFAULT NULL,
  `adminSTATUS` varchar(100) DEFAULT NULL,
  `adminimage` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `adminNAME`, `adminUSERNAME`, `adminPASSWORD`, `adminSTATUS`, `adminimage`) VALUES
(1, 'Sample Admin', 'sample', 'sample', 'admin', '1660420407.png');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartID` int(100) NOT NULL,
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
  `cartRECIEVED` varchar(10000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartID`, `accountID`, `orderSELLER`, `itemID`, `cartCOUNT`, `orderID`, `cartDATE`, `cartSTATUS`, `cartPAYMENTTYPE`, `cartPENDING`, `cartACCEPTED`, `cartDELIVERY`, `cartRECIEVED`) VALUES
(22, 2, ' 1', 2, '1', 'Agri-Market091820220318-2- 1', 'September 18, 2022 03:18:40am', '5', '1', 'September 18, 2022 03:18:40am', 'September 18, 2022 03:18:58am', 'September 18, 2022 04:59:32am', 'October 11, 2022 09:28:33pm'),
(23, 2, ' 1', 2, '2', 'Agri-Market091820220329-2- 1', 'September 18, 2022 03:28:47am', '5', '1', 'September 18, 2022 03:28:47am', 'September 18, 2022 03:30:03am', 'September 18, 2022 03:32:33am', 'September 18, 2022 03:33:15am'),
(24, 2, ' 1', 11, '1', 'Agri-Market091820220329-2- 1', 'September 18, 2022 03:28:56am', '5', '1', 'September 18, 2022 03:28:56am', 'September 18, 2022 03:29:59am', 'September 18, 2022 03:32:33am', 'September 18, 2022 03:33:15am'),
(25, 2, ' 2', 5, '1', 'Agri-Market091820220329', 'September 18, 2022 03:29:37am', '2', '1', 'September 18, 2022 03:29:37am', NULL, NULL, NULL),
(26, 2, ' 1', 2, '2', 'Agri-Market091820220335-2- 1', 'September 18, 2022 03:35:11am', '7', '2', 'September 18, 2022 03:35:11am', 'September 18, 2022 03:35:32am', NULL, 'September 18, 2022 03:39:49am'),
(28, 2, ' 2', 5, '8', 'Agri-Market101120220931', 'October 10, 2022 12:11:27am', '6', '1', 'October 10, 2022 12:11:27am', NULL, NULL, 'October 12, 2022 11:57:51am'),
(29, 2, ' 1', 2, '4', 'Agri-Market101120220931-2- 1', 'October 11, 2022 09:31:14pm', '5', '1', 'October 11, 2022 09:31:14pm', 'October 12, 2022 10:24:07am', 'October 12, 2022 10:24:23am', 'October 12, 2022 10:30:06am'),
(30, 2, ' 1', 2, '1', 'Agri-Market101220221023-2- 1', 'October 12, 2022 10:23:21am', '4', '1', 'October 12, 2022 10:23:21am', 'October 12, 2022 11:51:32am', 'October 12, 2022 11:51:43am', NULL),
(31, 14, ' 2', 5, '2', '1', 'October 12, 2022 11:34:57am', '2', NULL, 'October 12, 2022 11:34:57am', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryID` int(100) NOT NULL,
  `categoryNAME` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryID`, `categoryNAME`) VALUES
(1, 'cereals'),
(2, 'rice'),
(3, 'wheat'),
(4, 'maize'),
(5, 'sorghum'),
(6, 'ragi'),
(7, 'pulses'),
(8, 'fruits'),
(9, 'vegetables'),
(10, 'nuts'),
(11, 'Tools'),
(12, 'Fertilizer'),
(13, 'Flower'),
(14, 'Plants');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `itemID` int(100) NOT NULL,
  `itemNAME` varchar(1000) DEFAULT NULL,
  `itemQUANTITY` varchar(100) DEFAULT NULL,
  `itemPRICE` varchar(100) DEFAULT NULL,
  `itemTOTALSELL` varchar(100) DEFAULT NULL,
  `itemLONGITUTE` varchar(1000) DEFAULT NULL,
  `itemLATITUDE` varchar(1000) DEFAULT NULL,
  `itemCATEGORY` varchar(100) DEFAULT NULL,
  `itemDESCRIPTION` varchar(10000) DEFAULT NULL,
  `itemSELLER` varchar(100) DEFAULT NULL,
  `itemIMG` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`itemID`, `itemNAME`, `itemQUANTITY`, `itemPRICE`, `itemTOTALSELL`, `itemLONGITUTE`, `itemLATITUDE`, `itemCATEGORY`, `itemDESCRIPTION`, `itemSELLER`, `itemIMG`) VALUES
(1, 'Brown Rice', '12', '5217', '1', '121.02983167113823', '14.46022644142816', 'rice', '<p>dada</p>', '1', '1665594156.jpg'),
(2, 'Fertilizer', '7', '1200', '5', NULL, NULL, 'Fertilizer', 'Fertilizer', '1', 'types-of-fertilizer.jpg'),
(5, 'Suamei (XL2)', '1', '1500', '5', NULL, NULL, 'Plants', 'Plant Name: \r\nWrightia religiosa<br>\r\n<br>\r\nSuamei, also known as Water Jasmine Tree and Shui Mei, is an ornamental tree with twiggy branches that grows thin leaves. It produces small, pendulous white flowers that have a fragrance similar to true jasmine.<br>\r\n<br>\r\nIt\'s easy to maintain and requires minimum supervision. Place it in a bright spot indoors or outdoors shaded to full sun to thrive.\r\n<br>\r\nPlant Size<br>\r\nAround 5 ft.<br>\r\n<br>\r\nThe plant in the photo is the actual plant you will receive.', '2', 'image_b8153948-32a9-4d8a-b9ab-be8361bf98b9_540x.jpg'),
(11, 'Asiatic Jasmine Snow-N-Summer (S)', '12', '99', '0', '16.0022035', '120.3086293', 'Plants', '<div><b>Plant Name;</b> Asiatic Jasmine Snow-N-Summer&nbsp;</div><div><i>Trachelospermum asiaticum SnowNSummer</i></div><div><b>Plant Size:&nbsp;&nbsp;</b>Around 8</div><div><br></div><div><i>Snow-N-Summer </i>is a great plant to add color to your space. New leaves start out in pretty and bright pink then fades to speckled green, and eventually turns to a vibrant emerald green.&nbsp;</div><div><br></div><div>We recommend cutting the tips occasionally to encourage colorful new growth. This plant can also be trained to vine or cascade trail. This plant is not suitable for low-light spaces. It thrives in bright indirect light to full-sun spots and can be drought-tolerant once fully established.</div><div><br></div><div>Every plant is unique and can therefore differ from the plant shown on the photo.</div>', '1', '1662278257.jpg'),
(12, 'Tomato, Big Pink Hybrid Seed ', '12', '240', '0', '14.441205135764736', '120.95681726932526', 'Crops', '<p><b><u>40 pcs seed</u></b></p><p><b>Delectable, flavor-packed tomato with rosy smooth skin.</b></p><p>For a sandwich, burger or salad to achieve the status of masterpiece, this flavor-packed tomato is a must. However you slice it, this medium-sized (8-10 oz.) tomato, with rosy smooth skin, is a standout.</p><p><b>From Seed Indoors:&nbsp;</b>Start: Feb 23 - Mar 09</p><p><b>Transplant:</b> May 04 - May 18</p><p><b>From Plant Start:</b> May 04 - May 18</p>', '1', '1665567994.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notificationID` int(100) NOT NULL,
  `notificationCLIENTID` varchar(100) DEFAULT NULL,
  `notificationMESSAGE` varchar(1000) DEFAULT NULL,
  `notificationDATE` varchar(100) DEFAULT NULL,
  `notificationCLIENTTYPE` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

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

-- --------------------------------------------------------

--
-- Table structure for table `orderstatus`
--

CREATE TABLE `orderstatus` (
  `orderstatusID` int(100) NOT NULL,
  `orderstatusDES` varchar(100) NOT NULL,
  `orderCODE` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderstatus`
--

INSERT INTO `orderstatus` (`orderstatusID`, `orderstatusDES`, `orderCODE`) VALUES
(1, 'Ordered', '<div class=\"steps\" style=\"width: 1000px;\">                             <ul class=\"list-unstyled multi-steps\">                                 <li style=\"color: black;\" class=\"is-active \">Ordered<br><span>January 30, 2022</span></li>                                 <li style=\"color: black; \">Pending<br><span>January 30, 2022</span></li>                                 <li style=\"color: black; \">Accepted<br><span>February 3, 2022</span></li>                                 <li style=\"color: black;\" >Delivery</li>                                 <li style=\"color: black;\"  >Received</li>                             </ul>                         </div> '),
(2, 'Pending', ''),
(3, 'Accepted', ''),
(4, 'Shipped', ''),
(5, 'Delivered', ''),
(6, 'Cancelled', ''),
(7, 'Pick-Up', '');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentID` int(100) NOT NULL,
  `paymentTYPE` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentID`, `paymentTYPE`) VALUES
(1, 'COD'),
(2, 'Pick-Up');

-- --------------------------------------------------------

--
-- Table structure for table `paymenttype`
--

CREATE TABLE `paymenttype` (
  `paymenttypeID` int(100) NOT NULL,
  `paymenttypeNAME` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paymenttype`
--

INSERT INTO `paymenttype` (`paymenttypeID`, `paymenttypeNAME`) VALUES
(1, 'COD'),
(2, 'PICK-UP');

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `sellerID` int(11) NOT NULL,
  `sellername` varchar(110) NOT NULL,
  `selleruser` varchar(110) NOT NULL,
  `sellerpass` varchar(110) NOT NULL,
  `sellerimage` varchar(100) DEFAULT NULL,
  `sellerlatitude` varchar(100) NOT NULL,
  `sellerlongitude` varchar(100) NOT NULL,
  `sellermobilenumber` varchar(100) NOT NULL,
  `sellerdatecreated` varchar(100) DEFAULT NULL,
  `selleremail` varchar(100) DEFAULT NULL,
  `sellerSTATUS` varchar(100) DEFAULT NULL,
  `selleraddress` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`sellerID`, `sellername`, `selleruser`, `sellerpass`, `sellerimage`, `sellerlatitude`, `sellerlongitude`, `sellermobilenumber`, `sellerdatecreated`, `selleremail`, `sellerSTATUS`, `selleraddress`) VALUES
(1, 'Sample Buyer', 'sample', 'sample', 'null.png', '14.441205135764736', '120.95681726932526', '+6399276868791', 'August 1, 2022', 'issiehyodo110@gmail.com', 'active', NULL),
(2, 'Pedro Perez', '0000000000', '0000000000', 'null.png', '14.54647483183923', '121.02036333084106', '0915588430', 'September 18, 2022 02:58:04am', 'owhatsapp01o@gmail.com', 'active', NULL),
(3, 'SHENNA ANN PUZON PASTOR', 'xxxx', 'xxxx', 'null.png', '14.543068553465336', '121.0164794921875', '09155882430', 'October 11, 2022 04:30:33am', 'issiehyodo110@gmail.com', 'active', NULL),
(4, 'Jonas Crops', 'JonasCrops', 'JonasCrops', '1665435433.ico', '14.543068553465336', '121.0164794921875', '09155882438', 'October 11, 2022 04:57:13am', 'example@gmail.com', 'new', NULL),
(5, 'VINCE PEREZ', 'aWAS', 'SSASASA', '1665437691.ico', '14.543068553465336', '121.0164794921875', '19155882438', 'October 11, 2022 05:34:51am', 'issiehyodo110@gmail.com', 'new', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`accountID`);

--
-- Indexes for table `activitylog`
--
ALTER TABLE `activitylog`
  ADD PRIMARY KEY (`activitylogID`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`itemID`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notificationID`);

--
-- Indexes for table `orderstatus`
--
ALTER TABLE `orderstatus`
  ADD PRIMARY KEY (`orderstatusID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentID`);

--
-- Indexes for table `paymenttype`
--
ALTER TABLE `paymenttype`
  ADD PRIMARY KEY (`paymenttypeID`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`sellerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `accountID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `activitylog`
--
ALTER TABLE `activitylog`
  MODIFY `activitylogID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `itemID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notificationID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `orderstatus`
--
ALTER TABLE `orderstatus`
  MODIFY `orderstatusID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `paymenttype`
--
ALTER TABLE `paymenttype`
  MODIFY `paymenttypeID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `sellerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
