-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 16, 2023 at 03:43 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_angonoanimalclinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladdedstock`
--

DROP TABLE IF EXISTS `tbladdedstock`;
CREATE TABLE IF NOT EXISTS `tbladdedstock` (
  `stockid` int NOT NULL AUTO_INCREMENT,
  `prodname` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `category` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `quantityadded` int NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`stockid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbladdedstock`
--

INSERT INTO `tbladdedstock` (`stockid`, `prodname`, `category`, `quantityadded`, `date`) VALUES
(1, 'BRONCure', 'Medicine', 5, '2023-04-11 14:48:44'),
(2, 'VitaPet (for adult cat) 1.5kg', 'Food', 6, '2023-04-12 14:32:21'),
(3, 'NutriChunks (beef)20kg', 'Food', 5, '2023-04-12 14:40:07'),
(4, 'Cosi pets milk (1Liter)', 'Medicine', 5, '2023-04-13 15:23:14'),
(5, 'Amoxcicillin', 'Medicine', 5, '2023-04-16 07:09:43'),
(6, 'Amoxcicillin', 'Medicine', 10, '2023-04-16 07:09:54');

-- --------------------------------------------------------

--
-- Table structure for table `tblappointments`
--

DROP TABLE IF EXISTS `tblappointments`;
CREATE TABLE IF NOT EXISTS `tblappointments` (
  `queueno` int NOT NULL AUTO_INCREMENT,
  `clientname` varchar(45) NOT NULL,
  `petname` varchar(45) NOT NULL,
  `services` varchar(100) NOT NULL,
  `price` int NOT NULL,
  `dateandtime` datetime NOT NULL,
  PRIMARY KEY (`queueno`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tblappointments`
--

INSERT INTO `tblappointments` (`queueno`, `clientname`, `petname`, `services`, `price`, `dateandtime`) VALUES
(5, ' Vann Oliveros', 'Coco', 'Veterinary Emergency and Critical Care', 0, '2023-02-13 10:42:00'),
(11, ' Divina Amio', 'Gekgek', 'Wellness Clinic', 0, '2023-02-28 10:50:00'),
(37, 'Jeremy Liberty', 'Tsaris', 'Hospitalization', 0, '2023-04-16 05:28:00'),
(36, 'Jeremy Liberty', 'Hannah', 'Wellness Clinic', 0, '2023-04-12 08:11:00'),
(38, ' Vann Oliveros', 'Coco', 'Elective, Corrective, and, Curative Surgical Services', 0, '2023-04-16 05:40:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblaudittrail`
--

DROP TABLE IF EXISTS `tblaudittrail`;
CREATE TABLE IF NOT EXISTS `tblaudittrail` (
  `atid` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ipaddress` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `actionmode` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`atid`)
) ENGINE=MyISAM AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblaudittrail`
--

INSERT INTO `tblaudittrail` (`atid`, `username`, `datetime`, `ipaddress`, `actionmode`) VALUES
(1, 'Veterinarian', '2023-04-14 15:42:29', '::1', 'Logged In'),
(2, 'Veterinarian', '2023-04-14 15:42:54', '::1', 'Uploaded a photo in useraccount module'),
(3, 'Veterinarian', '2023-04-14 15:43:05', '::1', 'Restored an account in useraccount module'),
(4, 'Veterinarian', '2023-04-14 15:43:11', '::1', 'Archived account in useraccount module'),
(5, 'Veterinarian', '2023-04-14 15:45:06', '::1', 'Logged Out'),
(6, 'Secretary', '2023-04-14 15:49:24', '::1', 'Logged In'),
(7, 'Secretary', '2023-04-14 15:53:51', '::1', 'Logged Out'),
(8, 'Secretary', '2023-04-15 05:22:54', '::1', 'Logged In'),
(9, 'Secretary', '2023-04-15 08:51:55', '::1', 'Logged Out'),
(10, 'Jemlibs', '2023-04-15 09:01:41', '::1', 'Logged In'),
(11, 'Jemlibs', '2023-04-15 09:02:38', '::1', 'Logged Out'),
(12, 'Veterinarian', '2023-04-15 12:29:15', '::1', 'Logged In'),
(13, 'Veterinarian', '2023-04-15 12:36:57', '::1', 'Archived account in useraccount module'),
(14, 'Veterinarian', '2023-04-15 12:37:05', '::1', 'Restored an account in useraccount module'),
(15, 'Veterinarian', '2023-04-15 12:37:48', '::1', 'Logged Out'),
(16, 'notverified', '2023-04-15 12:37:59', '::1', 'Logged In'),
(17, 'notverified', '2023-04-15 12:38:24', '::1', 'Edit account in useraccount module'),
(18, 'notverified', '2023-04-15 12:38:36', '::1', 'Logged Out'),
(19, 'Veterinarian', '2023-04-15 12:42:50', '::1', 'Logged In'),
(20, 'Veterinarian', '2023-04-15 12:43:02', '::1', 'Logged Out'),
(21, 'Veterinarian', '2023-04-15 13:04:29', '::1', 'Logged In'),
(22, 'Veterinarian', '2023-04-15 15:15:41', '::1', 'Logged In'),
(23, 'Veterinarian', '2023-04-15 16:09:59', '::1', 'Logged In'),
(24, 'Veterinarian', '2023-04-15 16:56:46', '::1', 'Uploaded a photo in useraccount module'),
(25, 'Veterinarian', '2023-04-15 17:15:29', '::1', 'Logged Out'),
(26, 'Secretary', '2023-04-16 06:57:06', '::1', 'Logged In'),
(27, 'Secretary', '2023-04-16 07:06:08', '::1', 'Uploaded a photo in useraccount module'),
(28, 'Secretary', '2023-04-16 07:09:12', '::1', 'Added product in stocks module'),
(29, 'Secretary', '2023-04-16 07:09:43', '::1', 'Updated product in stocks module'),
(30, 'Secretary', '2023-04-16 07:09:54', '::1', 'Updated product in stocks module'),
(31, 'Secretary', '2023-04-16 07:14:51', '::1', 'Logged Out'),
(32, 'Jemlibs', '2023-04-16 07:16:56', '::1', 'Logged In'),
(33, 'Secretary', '2023-04-16 10:10:52', '::1', 'Logged In'),
(34, 'Veterinarian', '2023-04-16 12:18:09', '::1', 'Logged In'),
(35, 'Veterinarian', '2023-04-16 13:12:00', '::1', 'Updated price in settings'),
(36, '', '2023-04-16 14:32:43', '::1', 'Logged Out'),
(37, 'Veterinarian', '2023-04-16 14:35:44', '::1', 'Logged In'),
(38, 'Veterinarian', '2023-04-16 14:36:01', '::1', 'Logged Out'),
(39, 'Secretary', '2023-04-16 14:41:36', '::1', 'Logged In'),
(40, 'Secretary', '2023-04-16 15:02:11', '::1', 'Logged Out'),
(41, 'Secretary', '2023-04-16 15:02:18', '::1', 'Logged In'),
(42, 'Secretary', '2023-04-16 15:09:57', '::1', 'Logged Out'),
(43, 'Veterinarian', '2023-04-16 15:10:02', '::1', 'Logged In'),
(44, 'Veterinarian', '2023-04-16 15:10:09', '::1', 'Logged Out'),
(45, 'Secretary', '2023-04-16 15:10:18', '::1', 'Logged In'),
(46, 'Secretary', '2023-04-16 15:10:58', '::1', 'Logged Out'),
(47, 'Veterinarian', '2023-04-16 15:11:04', '::1', 'Logged In'),
(48, 'Veterinarian', '2023-04-16 15:11:43', '::1', 'Logged Out'),
(49, 'Veterinarian', '2023-04-16 15:11:48', '::1', 'Logged In'),
(50, 'Veterinarian', '2023-04-16 15:13:42', '::1', 'Logged Out'),
(51, 'Secretary', '2023-04-16 15:13:53', '::1', 'Logged In'),
(52, 'Secretary', '2023-04-16 15:23:14', '::1', 'Logged Out'),
(53, 'Jemlibs', '2023-04-16 15:23:20', '::1', 'Logged In'),
(54, 'Jemlibs', '2023-04-16 15:26:09', '::1', 'Logged Out'),
(55, 'Veterinarian', '2023-04-16 15:26:16', '::1', 'Logged In'),
(56, 'Veterinarian', '2023-04-16 15:26:25', '::1', 'Logged Out'),
(57, 'Secretary', '2023-04-16 15:26:31', '::1', 'Logged In'),
(58, 'Secretary', '2023-04-16 15:26:46', '::1', 'Logged Out'),
(59, 'Jemlibs', '2023-04-16 15:26:52', '::1', 'Logged In'),
(60, 'Jemlibs', '2023-04-16 15:27:27', '::1', 'Logged Out'),
(61, 'Jemlibs', '2023-04-16 15:28:04', '::1', 'Logged In'),
(62, 'Jemlibs', '2023-04-16 15:28:35', '::1', 'Logged Out'),
(63, 'Secretary', '2023-04-16 15:28:49', '::1', 'Logged In'),
(64, 'Secretary', '2023-04-16 15:29:00', '::1', 'Logged Out'),
(65, 'Jemlibs', '2023-04-16 15:29:59', '::1', 'Logged In'),
(66, 'Jemlibs', '2023-04-16 15:36:34', '::1', 'Logged Out'),
(67, 'Secretary', '2023-04-16 15:36:51', '::1', 'Logged In'),
(68, 'Secretary', '2023-04-16 15:40:06', '::1', 'Logged Out'),
(69, 'Jemlibs', '2023-04-16 15:40:12', '::1', 'Logged In'),
(70, 'Jemlibs', '2023-04-16 15:40:50', '::1', 'Logged Out'),
(71, 'Secretary', '2023-04-16 15:41:00', '::1', 'Logged In'),
(72, 'Secretary', '2023-04-16 15:41:36', '::1', 'Logged Out'),
(73, 'Veterinarian', '2023-04-16 15:41:46', '::1', 'Logged In'),
(74, 'Veterinarian', '2023-04-16 15:42:41', '::1', 'Logged Out');

-- --------------------------------------------------------

--
-- Table structure for table `tblbreed`
--

DROP TABLE IF EXISTS `tblbreed`;
CREATE TABLE IF NOT EXISTS `tblbreed` (
  `bid` int NOT NULL AUTO_INCREMENT,
  `pettypeid` int NOT NULL,
  `pettype` varchar(45) NOT NULL,
  `breed` varchar(45) NOT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tblbreed`
--

INSERT INTO `tblbreed` (`bid`, `pettypeid`, `pettype`, `breed`) VALUES
(1, 1, 'Dog', 'German Shepherd'),
(2, 1, 'Dog', 'Shih Tzu'),
(3, 1, 'Dog', 'Aspin'),
(4, 1, 'Dog', 'Japanese Spitz'),
(5, 1, 'Dog', 'Chihuahua'),
(6, 1, 'Dog', 'Rottweiler');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

DROP TABLE IF EXISTS `tblcategory`;
CREATE TABLE IF NOT EXISTS `tblcategory` (
  `catid` int NOT NULL AUTO_INCREMENT,
  `category` varchar(45) NOT NULL,
  PRIMARY KEY (`catid`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`catid`, `category`) VALUES
(2, 'Medicine'),
(6, 'Accessories'),
(3, 'Food');

-- --------------------------------------------------------

--
-- Table structure for table `tblorder`
--

DROP TABLE IF EXISTS `tblorder`;
CREATE TABLE IF NOT EXISTS `tblorder` (
  `orderid` int NOT NULL AUTO_INCREMENT,
  `transactionid` int DEFAULT NULL,
  `prodname` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `category` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `quantity` int NOT NULL,
  `price` int NOT NULL,
  `cart` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`orderid`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblorder`
--

INSERT INTO `tblorder` (`orderid`, `transactionid`, `prodname`, `category`, `quantity`, `price`, `cart`) VALUES
(25, 1, 'NutriChunks (beef)20kg', 'Food', 10, 15000, 'Checkout'),
(26, 1, 'D-Glucose Monohydrate', 'Medicine', 34, 3230, 'Checkout'),
(23, 1, 'BRONCure', 'Medicine', 7, 1540, 'Checkout'),
(11, 1, 'Dextrose Monohydrate', 'Medicine', 34, 1768, 'Checkout'),
(28, NULL, 'BRONCure', 'Medicine', 3, 660, 'Yes'),
(39, NULL, 'D-Glucose Monohydrate', 'Medicine', 3, 285, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tblownersprofile`
--

DROP TABLE IF EXISTS `tblownersprofile`;
CREATE TABLE IF NOT EXISTS `tblownersprofile` (
  `cusid` int NOT NULL AUTO_INCREMENT,
  `ownersname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `contactno` varchar(45) NOT NULL,
  `address` varchar(255) NOT NULL,
  `emailaddress` varchar(45) DEFAULT NULL,
  `archive` varchar(10) NOT NULL,
  PRIMARY KEY (`cusid`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tblownersprofile`
--

INSERT INTO `tblownersprofile` (`cusid`, `ownersname`, `contactno`, `address`, `emailaddress`, `archive`) VALUES
(1, 'Anderson Smith', ' 09123889132', ' 81 Sta. Catarina St. Taytay, Rizal', 'BelmonteRC@gmail.com', 'false'),
(2, 'Carl Wright', ' 09055459215', ' 38 Ynares St. Brgy. San Carlos Binangonan, Rizal', 'michelle.nervez@gmail.com', 'false'),
(3, 'Samantha Priz', ' 09889345681', ' #112 Brgy. San Vicente Angono, Rizal', 'SanchezIvy@gmail.com', 'false'),
(4, 'Robert Hills', ' 09175546613', ' #218 Brgy. Poblacion ibaba Angono, Rizal', '01_JLouise@gmail.com', 'false'),
(5, 'White Lee', ' 09179654408', ' 223 E. Dela Paz St. Brgy. San Pedro Angono, Rizal', 'vinaholiveros1069@gmail.com', 'false'),
(6, 'Jessica Young', ' 09963314522', ' 53 St. Clement Brgy. Bagumbayan Angono, Rizal', 'kim.alexis@gmail.com', 'false'),
(15, 'Jeremy Liberty', ' 09099223039', '#39 Interior Lanete St. Brgy Sta. Ana Taytay, Rizal', 'libertyjeremy23@gmail.com', 'false'),
(8, 'Catherine Jacobs', ' 09178895502', ' 45 Molave St. Brgy. San Vicente Angono, Rizal', 'divinaamio01@gmail.com', 'false'),
(9, 'Vann Oliveros', ' 09060668451', ' Ynares St. Brgy. San Carlos Binangonan, Rizal', 'vann.oliveros@gmail.com', 'false'),
(10, 'Bim Salinga', ' 093850399584', 'Brgy. Pantok Binangonan, Rizal', 'bim@gmail.com', 'false'),
(16, 'Jessica Sotto', ' 09567657657', ' 123 STREET BRGY ', 'kapusomo@wewjeo.com', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `tblpet`
--

DROP TABLE IF EXISTS `tblpet`;
CREATE TABLE IF NOT EXISTS `tblpet` (
  `petid` int NOT NULL AUTO_INCREMENT,
  `cusid` int NOT NULL,
  `ownersname` varchar(45) NOT NULL,
  `petname` varchar(45) NOT NULL,
  `pettype` varchar(45) NOT NULL,
  `age` int NOT NULL,
  `sex` varchar(45) NOT NULL,
  `breed` varchar(45) NOT NULL,
  `weight` varchar(45) NOT NULL,
  `archive` varchar(10) NOT NULL,
  PRIMARY KEY (`petid`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tblpet`
--

INSERT INTO `tblpet` (`petid`, `cusid`, `ownersname`, `petname`, `pettype`, `age`, `sex`, `breed`, `weight`, `archive`) VALUES
(19, 15, 'Jeremy Liberty', 'Hannah', 'Dog', 3, 'Female', 'Japanese Spitz', '12kg', 'false'),
(5, 9, ' Vann Oliveros', 'Coco', 'Dog', 5, 'Male', 'Shih Tzu', '5kg', 'false'),
(26, 4, 'Robert Hills', 'Petty', 'Dog', 3, 'Female', 'Rottweiler', '17kg', 'false'),
(6, 10, ' Bim Salinga', 'Chichi', 'Dog', 3, 'Female', 'Shih Tzu', '10kg', 'false'),
(20, 15, 'Jeremy Liberty', 'Tsaris', 'Dog', 2, 'Female', 'Aspin', '15kg', 'false'),
(18, 15, 'Jeremy Liberty', 'Gekgek', 'Dog', 11, 'Male', 'Aspin', '15kg', 'false'),
(25, 6, 'Jessica Young', 'Kris', 'Dog', 3, 'Female', 'Shih Tzu', '8kg', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `tblpettype`
--

DROP TABLE IF EXISTS `tblpettype`;
CREATE TABLE IF NOT EXISTS `tblpettype` (
  `pettypeid` int NOT NULL AUTO_INCREMENT,
  `pettype` varchar(45) NOT NULL,
  PRIMARY KEY (`pettypeid`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tblpettype`
--

INSERT INTO `tblpettype` (`pettypeid`, `pettype`) VALUES
(1, 'Dog'),
(2, 'Cat'),
(3, 'Bird'),
(4, 'Snake');

-- --------------------------------------------------------

--
-- Table structure for table `tblservices`
--

DROP TABLE IF EXISTS `tblservices`;
CREATE TABLE IF NOT EXISTS `tblservices` (
  `sid` int NOT NULL AUTO_INCREMENT,
  `services` varchar(100) NOT NULL,
  `price` int NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tblservices`
--

INSERT INTO `tblservices` (`sid`, `services`, `price`) VALUES
(1, 'Wellness Clinic', 600),
(2, 'Disease Diagnostics and Treatment', 500),
(3, 'Veterinary Emergency and Critical Care', 500),
(4, 'Elective, Corrective, and, Curative Surgical Services', 600),
(5, 'Hospitalization', 500);

-- --------------------------------------------------------

--
-- Table structure for table `tblstock`
--

DROP TABLE IF EXISTS `tblstock`;
CREATE TABLE IF NOT EXISTS `tblstock` (
  `proid` int NOT NULL AUTO_INCREMENT,
  `prodname` varchar(45) NOT NULL,
  `category` varchar(45) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int NOT NULL,
  `quantity` int NOT NULL,
  `minstocklevel` int DEFAULT NULL,
  `maxstocklevel` int DEFAULT NULL,
  `archive` varchar(10) NOT NULL,
  PRIMARY KEY (`proid`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tblstock`
--

INSERT INTO `tblstock` (`proid`, `prodname`, `category`, `description`, `price`, `quantity`, `minstocklevel`, `maxstocklevel`, `archive`) VALUES
(13, 'Dextrose Monohydrate', 'Medicine', 'is a carbohydrate and valuable source of energy rapidly and easily absorb.', 55, 23, 10, 5000, 'false'),
(15, 'BRONCure', 'Medicine', 'For acute treatment of colds and respiratory infections in pets. to reduce symptoms of sneezing, coughing, watery eyes and nose.', 220, 80, 10, 5000, 'true'),
(16, 'D-Glucose Monohydrate', 'Medicine', 'is useful in rebuilding stamina and vigor after every activity.', 95, 29, 10, 5000, 'false'),
(17, 'Pet Collar', 'Accessories', 'use for restrain, identification and protection.', 40, 80, 10, 5000, 'false'),
(18, 'Pet Bowl (for eating purpose)', 'Accessories', 'Food containers use for feeding pets made up of different types of materials.', 50, 50, 10, 5000, 'false'),
(20, 'NutriChunks (beef)20kg', 'Food', 'An optimum blend of proteins, fats and carbohydrates that support a puppies high energy needs.', 1500, 25, 10, 5000, 'false'),
(21, 'VitaPet (for adult cat) 1.5kg', 'Food', 'It has tuna flavor, to support the immune system for a healthy cat with calcium and phosporus to help maintain healthy bones and teeth.', 360, 26, 10, 5000, 'false'),
(22, 'Cosi pets milk (1Liter)', 'Medicine', 'Cosi is a formulated and highly delicious milk for pets of all ages. Cosi pets milk has broken down the lactose making it easier for your pet to digest.', 250, 30, 10, 5000, 'false'),
(36, 'Pet Harness', 'Medicine', 'Equipment consisting of straps of webbing that loop nearly around that fasten together using side release buckles.', 300, 50, 10, 5000, 'true'),
(37, 'Amoxcicillin', 'Medicine', 'Gamot', 250, 15, 10, 5000, 'false');

-- --------------------------------------------------------

--
-- Table structure for table `tbltransaction`
--

DROP TABLE IF EXISTS `tbltransaction`;
CREATE TABLE IF NOT EXISTS `tbltransaction` (
  `transactionid` int NOT NULL AUTO_INCREMENT,
  `username` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `ownersname` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `totalprice` int NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`transactionid`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbltransaction`
--

INSERT INTO `tbltransaction` (`transactionid`, `username`, `ownersname`, `totalprice`, `date`) VALUES
(1, 'Veterinarian', 'White Lee', 21538, '2023-04-09 12:40:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbluseraccount`
--

DROP TABLE IF EXISTS `tbluseraccount`;
CREATE TABLE IF NOT EXISTS `tbluseraccount` (
  `username` varchar(45) NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `usertype` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` int NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `archive` varchar(10) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbluseraccount`
--

INSERT INTO `tbluseraccount` (`username`, `password`, `usertype`, `email`, `status`, `image`, `archive`) VALUES
('Veterinarian', '$2y$10$j9C8tNEwjT7IAFkYy1BYXu69vBS9C3t23am9qGjLqcNv5vHJc0Ti6', 'Veterinarian', 'imepogi23@gmail.com', 1, 'IMG-6438186b526e22.70470279.png', 'false'),
('notverified', '$2y$10$eGgX2Gjwf8aMf0OC2S.tK.mstFL3YA8affK9YbhJ./hIJcwxCGqii', 'Assistant', 'libertypogi@gmail.com', 0, 'IMG-643b9e6085eb79.79030598.png', 'false'),
('Jemlibs', '$2y$10$iFvnSJNYDfjFc1JLq2SvNeIVF7039/YsJSlDy0vsqrGlsBdDzW1ie', 'Assistant', 'ruelitopogi04@gmail.com', 1, 'IMG-6437e118a9e020.19642347.jpg', 'false'),
('Secretary', '$2y$10$OBoQWVpwNXlS0qMaPJ18e.9xp10KjtrBjH6Z6MBRDo9tJ1k3Q32Du', 'Secretary', 'libertyjeremy23@gmail.com', 1, 'IMG-6437e1083ed6c1.23795384.jpeg', 'false'),
('sample', '$2y$10$CReGriHfvl0SZjPIgEq8LOcTzXKV3/pOaqiWae0VlPGEVxs2VUmlu', 'Assistant', 'sample123@gmail.com', 0, 'IMG-643917f0b7ab53.21250259.png', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `tblusertype`
--

DROP TABLE IF EXISTS `tblusertype`;
CREATE TABLE IF NOT EXISTS `tblusertype` (
  `utid` int NOT NULL AUTO_INCREMENT,
  `usertype` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`utid`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tblusertype`
--

INSERT INTO `tblusertype` (`utid`, `usertype`) VALUES
(2, 'Veterinarian'),
(3, 'Secretary'),
(39, 'Assistant');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
