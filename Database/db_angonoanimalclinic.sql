-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 08, 2023 at 02:20 PM
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
-- Table structure for table `tblappointments`
--

DROP TABLE IF EXISTS `tblappointments`;
CREATE TABLE IF NOT EXISTS `tblappointments` (
  `queueno` int NOT NULL AUTO_INCREMENT,
  `clientname` varchar(45) NOT NULL,
  `petname` varchar(45) NOT NULL,
  `services` varchar(100) NOT NULL,
  `dateandtime` datetime NOT NULL,
  PRIMARY KEY (`queueno`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tblappointments`
--

INSERT INTO `tblappointments` (`queueno`, `clientname`, `petname`, `services`, `dateandtime`) VALUES
(5, ' Vann Oliveros', 'Coco', 'Veterinary Emergency and Critical Care', '2023-02-13 10:42:00'),
(11, ' Divina Amio', 'Gekgek', 'Wellness Clinic', '2023-02-28 10:50:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblarcownersprofile`
--

DROP TABLE IF EXISTS `tblarcownersprofile`;
CREATE TABLE IF NOT EXISTS `tblarcownersprofile` (
  `cusid` int NOT NULL,
  `ownersname` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `contactno` int NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `emailaddress` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`cusid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblarcpet`
--

DROP TABLE IF EXISTS `tblarcpet`;
CREATE TABLE IF NOT EXISTS `tblarcpet` (
  `petid` int NOT NULL,
  `cusid` int NOT NULL,
  `ownersname` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `petname` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `pettype` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `age` int NOT NULL,
  `sex` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `breed` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `weight` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`petid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblarcstock`
--

DROP TABLE IF EXISTS `tblarcstock`;
CREATE TABLE IF NOT EXISTS `tblarcstock` (
  `proid` int NOT NULL,
  `prodname` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `category` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `price` int NOT NULL,
  `quantity` int NOT NULL,
  `minstocklevel` int NOT NULL,
  `maxstocklevel` int NOT NULL,
  PRIMARY KEY (`proid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblarcstock`
--

INSERT INTO `tblarcstock` (`proid`, `prodname`, `category`, `description`, `price`, `quantity`, `minstocklevel`, `maxstocklevel`) VALUES
(19, 'Pet Harness', 'Medicine', 'Equipment consisting of straps of webbing that loop nearly around that fasten together using side release buckles.', 300, 50, 10, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `tblarcuseraccount`
--

DROP TABLE IF EXISTS `tblarcuseraccount`;
CREATE TABLE IF NOT EXISTS `tblarcuseraccount` (
  `username` varchar(45) NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `usertype` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tblarcuseraccount`
--

INSERT INTO `tblarcuseraccount` (`username`, `password`, `usertype`, `email`, `image`) VALUES
('Jeremy', '123', 'Veterinarian', 'sample@qwojewe', NULL),
('wqewqewq', 'we', 'Assistant', 'qwew@wew', NULL),
('hello', '123', 'Secretary', 'jeje23@awew', NULL),
('bimsecretary', '$2y$10$v7yrQkr232EM1DTnQ.GOkuEg6', 'Secretary', 'salingakristina@gmail.com', NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

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
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblorder`
--

INSERT INTO `tblorder` (`orderid`, `transactionid`, `prodname`, `category`, `quantity`, `price`, `cart`) VALUES
(12, 1, 'Dextrose Monohydrate', 'Medicine', 34, 1768, 'Checkout'),
(11, 1, 'Dextrose Monohydrate', 'Medicine', 34, 1768, 'Checkout'),
(10, 1, 'Dextrose Monohydrate', 'Medicine', 34, 1768, 'Checkout');

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
  PRIMARY KEY (`cusid`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tblownersprofile`
--

INSERT INTO `tblownersprofile` (`cusid`, `ownersname`, `contactno`, `address`, `emailaddress`) VALUES
(1, 'Anderson Smith', ' 09123889132', ' 81 Sta. Catarina St. Taytay, Rizal', 'BelmonteRC@gmail.com'),
(2, 'Carl Wright', ' 09055459215', ' 38 Ynares St. Brgy. San Carlos Binangonan, Rizal', 'michelle.nervez@gmail.com'),
(3, 'Samantha Priz', ' 09889345681', ' #112 Brgy. San Vicente Angono, Rizal', 'SanchezIvy@gmail.com'),
(4, 'Robert Hills', ' 09175546613', ' #218 Brgy. Poblacion ibaba Angono, Rizal', '01_JLouise@gmail.com'),
(5, 'White Lee', ' 09179654408', ' 223 E. Dela Paz St. Brgy. San Pedro Angono, Rizal', 'vinaholiveros1069@gmail.com'),
(6, 'Jessica Young', ' 09963314522', ' 53 St. Clement Brgy. Bagumbayan Angono, Rizal', 'kim.alexis@gmail.com'),
(15, 'Jeremy Liberty', ' 09099223039', ' 39 int. Lanete St. Brgy. Sta. Ana Taytay, Rizal', 'libertyjeremy23@gmail.com'),
(8, 'Catherine Jacobs', ' 09178895502', ' 45 Molave St. Brgy. San Vicente Angono, Rizal', 'divinaamio01@gmail.com'),
(9, 'Vann Oliveros', ' 09060668451', ' Ynares St. Brgy. San Carlos Binangonan, Rizal', 'vann.oliveros@gmail.com'),
(10, 'Bim Salinga', ' 093850399584', ' Binangonan, Rizal', 'bim@gmail.com'),
(16, 'Jessica Sotto', ' 09567657657', ' 123 STREET BRGY ', 'kapusomo@wewjeo.com');

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
  PRIMARY KEY (`petid`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tblpet`
--

INSERT INTO `tblpet` (`petid`, `cusid`, `ownersname`, `petname`, `pettype`, `age`, `sex`, `breed`, `weight`) VALUES
(19, 15, 'Jeremy Liberty', 'Hannah', 'Dog', 3, 'Female', 'Japanese Spitz', '12kg'),
(5, 9, ' Vann Oliveros', 'Coco', 'Dog', 5, 'Male', 'Shih Tzu', '5kg'),
(17, 10, 'Bim Salinga', 'awawawawawa', 'Dog', 4, 'Male', 'German Shepherd', '10kg'),
(6, 10, ' Bim Salinga', 'Chichi', 'Dog', 3, 'Female', 'Shih Tzu', '10kg'),
(21, 15, 'Jeremy Liberty', 'qwewqewqe', '1', 12, 'Male', '1', '12kh'),
(20, 15, 'Jeremy Liberty', 'Tsaris', 'Dog', 2, 'Female', 'Aspin', '15kg'),
(18, 15, 'Jeremy Liberty', 'Gekgek', 'Dog', 11, 'Male', 'Aspin', '15kg');

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
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tblservices`
--

INSERT INTO `tblservices` (`sid`, `services`) VALUES
(1, 'Wellness Clinic'),
(2, 'Disease Diagnostics and Treatment'),
(3, 'Veterinary Emergency and Critical Care'),
(4, 'Elective, Corrective, and, Curative Surgical Services'),
(5, 'Hospitalization');

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
  PRIMARY KEY (`proid`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tblstock`
--

INSERT INTO `tblstock` (`proid`, `prodname`, `category`, `description`, `price`, `quantity`, `minstocklevel`, `maxstocklevel`) VALUES
(13, 'Dextrose Monohydrate', 'Medicine', 'is a carbohydrate and valuable source of energy rapidly and easily absorb.', 52, 23, 10, 5000),
(15, 'BRONCure', 'Medicine', 'For acute treatment of colds and respiratory infections in pets. to reduce symptoms of sneezing, coughing, watery eyes and nose.', 220, 79, 10, 5000),
(16, 'D-Glucose Monohydrate', 'Medicine', 'is useful in rebuilding stamina and vigor after every activity.', 95, 20, 10, 5000),
(17, 'Pet Collar', 'Accessories', 'use for restrain, identification and protection.', 40, 80, 10, 5000),
(18, 'Pet Bowl (for eating purpose)', 'Accessories', 'Food containers use for feeding pets made up of different types of materials.', 50, 50, 10, 5000),
(20, 'NutriChunks (beef)20kg', 'Food', 'An optimum blend of proteins, fats and carbohydrates that support a puppies high energy needs.', 1500, 10, 10, 5000),
(21, 'VitaPet (for adult cat) 1.5kg', 'Food', 'It has tuna flavor, to support the immune system for a healthy cat with calcium and phosporus to help maintain healthy bones and teeth.', 360, 10, 10, 5000),
(22, 'Cosi pets milk (1Liter)', 'Medicine', 'Cosi is a formulated and highly delicious milk for pets of all ages. Cosi pets milk has broken down the lactose making it easier for your pet to digest.', 250, 30, 10, 5000);

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbltransaction`
--

INSERT INTO `tbltransaction` (`transactionid`, `username`, `ownersname`, `totalprice`, `date`) VALUES
(1, 'Veterinarian', 'Jeremy Liberty', 5304, '2023-04-08 01:27:12');

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
  PRIMARY KEY (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbluseraccount`
--

INSERT INTO `tbluseraccount` (`username`, `password`, `usertype`, `email`, `status`, `image`) VALUES
('Veterinarian', '$2y$10$j9C8tNEwjT7IAFkYy1BYXu69vBS9C3t23am9qGjLqcNv5vHJc0Ti6', 'Veterinarian', 'imepogi23@gmail.com', 1, 'IMG-64298c35933fd3.55023577.png'),
('notverified', '$2y$10$62ZcfD91MixWDWRG1qwdHuY/Nvb5H6NxkP9hfg53vynPzjEipvIeC', 'Assistant', 'libertypogi@gmail.com', 0, 'IMG-64298c3eb86f47.88841820.png'),
('Jemlibs', '$2y$10$iFvnSJNYDfjFc1JLq2SvNeIVF7039/YsJSlDy0vsqrGlsBdDzW1ie', 'Assistant', 'ruelitopogi04@gmail.com', 1, 'IMG-642fd3ee5b61a0.75681301.png'),
('Secretary', '$2y$10$OBoQWVpwNXlS0qMaPJ18e.9xp10KjtrBjH6Z6MBRDo9tJ1k3Q32Du', 'Secretary', 'libertyjeremy23@gmail.com', 1, 'IMG-642d24fc7a1604.22452684.png'),
('awaw', '$2y$10$/ONs56SO.ADSBo0Qh1ZBZ.T/gxEjVh2U4YqPcspTwswSlxVlMI6NC', 'Secretary', '23123@321321', 0, 'IMG-6431777e32d662.84830623.png');

-- --------------------------------------------------------

--
-- Table structure for table `tblusertype`
--

DROP TABLE IF EXISTS `tblusertype`;
CREATE TABLE IF NOT EXISTS `tblusertype` (
  `utid` int NOT NULL AUTO_INCREMENT,
  `usertype` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`utid`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb3;

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
