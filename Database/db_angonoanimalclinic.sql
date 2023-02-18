-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 19, 2023 at 05:44 AM
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
-- Table structure for table `tblarcstock`
--

DROP TABLE IF EXISTS `tblarcstock`;
CREATE TABLE IF NOT EXISTS `tblarcstock` (
  `proid` int NOT NULL,
  `prodname` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int NOT NULL,
  `quantity` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tblarcstock`
--

INSERT INTO `tblarcstock` (`proid`, `prodname`, `category`, `description`, `price`, `quantity`) VALUES
(14, 'Betadine', 'Select Category', 'HEHEHEHE', 0, 13),
(1, 'Pedigree', 'Select Category', 'Pagkain', 200, 200);

-- --------------------------------------------------------

--
-- Table structure for table `tblarcuseraccount`
--

DROP TABLE IF EXISTS `tblarcuseraccount`;
CREATE TABLE IF NOT EXISTS `tblarcuseraccount` (
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
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
('hello', '123', 'Secretary', 'jeje23@awew', NULL);

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
  PRIMARY KEY (`proid`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tblstock`
--

INSERT INTO `tblstock` (`proid`, `prodname`, `category`, `description`, `price`, `quantity`) VALUES
(13, 'Dextrose Monohydrate', 'Medicine', 'is a carbohydrate and valuable source of energy rapidly and easily absorb.', 52, 20),
(15, 'BRONCure', 'Medicine', 'For acute treatment of colds and respiratory infections in pets. to reduce symptoms of sneezing, coughing, watery eyes and nose.', 220, 20),
(16, 'D-Glucose Monohydrate', 'Medicine', 'is useful in rebuilding stamina and vigor after every activity.', 95, 20),
(17, 'Pet Collar', 'Accessories', 'use for restrain, identification and protection.', 40, 15),
(18, 'Pet Bowl (for eating purpose)', 'Accessories', 'Food containers use for feeding pets made up of different types of materials.', 50, 15),
(19, 'Pet Harness', 'Accessories', 'Equipment consisting of straps of webbing that loop nearly around that fasten together using side release buckles.', 300, 15),
(20, 'NutriChunks (beef)20kg', 'Food', 'An optimum blend of proteins, fats and carbohydrates that support a puppies high energy needs.', 1500, 10),
(21, 'VitaPet (for adult cat) 1.5kg', 'Food', 'It has tuna flavor, to support the immune system for a healthy cat with calcium and phosporus to help maintain healthy bones and teeth.', 360, 10),
(22, 'Cosi pets milk (1Liter)', 'Food', 'Cosi is a formulated and highly delicious milk for pets of all ages. Cosi pets milk has broken down the lactose making it easier for your pet to digest.', 180, 12),
(23, 'Cosi pets milk (1Liter)', 'Food', 'Cosi is a formulated and highly delicious milk for pets of all ages. Cosi pets milk has broken down the lactose making it easier for your pet to digest.', 180, 12),
(24, 'Cosi pets milk (1Liter)', 'Food', 'Cosi is a formulated and highly delicious milk for pets of all ages. Cosi pets milk has broken down the lactose making it easier for your pet to digest.', 180, 12);

-- --------------------------------------------------------

--
-- Table structure for table `tbluseraccount`
--

DROP TABLE IF EXISTS `tbluseraccount`;
CREATE TABLE IF NOT EXISTS `tbluseraccount` (
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `usertype` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbluseraccount`
--

INSERT INTO `tbluseraccount` (`username`, `password`, `usertype`, `email`, `image`) VALUES
('sample', '123', 'Assistant', 'brill@gmail.com', 'IMG-63eebcca3c8fa3.36397894.jpg'),
('jemleaves', 'jeremypogi', 'Assistant', 'libertyjeremy22@gmail.com', 'IMG-63e7bb0979f800.36669914.jpeg'),
('jem', '123', 'Veterinarian', 'eeeeee@gmail.com', 'IMG-63e8f421bbaf09.77489481.png'),
('aw', 'aw', 'Assistant', 'aw@aw', 'IMG-63eebc61a64978.62228640.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblusertype`
--

DROP TABLE IF EXISTS `tblusertype`;
CREATE TABLE IF NOT EXISTS `tblusertype` (
  `utid` int NOT NULL AUTO_INCREMENT,
  `usertype` varchar(45) NOT NULL,
  PRIMARY KEY (`utid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tblusertype`
--

INSERT INTO `tblusertype` (`utid`, `usertype`) VALUES
(2, 'Veterinarian'),
(3, 'Secretary'),
(5, 'Assistant');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
