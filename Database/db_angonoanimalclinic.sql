-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 12, 2023 at 03:19 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblarcuseraccount`
--

INSERT INTO `tblarcuseraccount` (`username`, `password`, `usertype`, `email`, `image`) VALUES
('Jeremy', '123', 'Secretary', 'jemlererj@qwojewe', NULL),
('wqewqewq', 'we', 'Assistant', 'qwew@wew', NULL),
('aw', 'aw', 'Assistant', 'aw@aw', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

DROP TABLE IF EXISTS `tblcategory`;
CREATE TABLE IF NOT EXISTS `tblcategory` (
  `catid` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(45) NOT NULL,
  PRIMARY KEY (`catid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`catid`, `category`) VALUES
(1, 'Select Category'),
(2, 'Medicine'),
(6, 'Accessories'),
(3, 'Food');

-- --------------------------------------------------------

--
-- Table structure for table `tblstock`
--

DROP TABLE IF EXISTS `tblstock`;
CREATE TABLE IF NOT EXISTS `tblstock` (
  `proid` int(11) NOT NULL AUTO_INCREMENT,
  `prodname` varchar(45) NOT NULL,
  `category` varchar(45) NOT NULL,
  `description` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`proid`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblstock`
--

INSERT INTO `tblstock` (`proid`, `prodname`, `category`, `description`, `quantity`) VALUES
(1, 'Pedigree', 'Food', 'Pagkain', 200),
(13, 'Pedigree', 'Food', 'Pagkain', 200);

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbluseraccount`
--

INSERT INTO `tbluseraccount` (`username`, `password`, `usertype`, `email`, `image`) VALUES
('sample', '123', 'Veterinarian', 'awewe@wewewe', 'IMG-63e7bb01d1db11.36616874.jpg'),
('jemleaves', 'jeremypogi', 'Assistant', 'libertyjeremy22@gmail.com', 'IMG-63e7bb0979f800.36669914.jpeg'),
('jem', '123', 'Veterinarian', 'eeeeee@gmail.com', 'IMG-63e8f421bbaf09.77489481.png'),
('hello', '123', 'Secretary', 'jeje23@awew', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblusertype`
--

DROP TABLE IF EXISTS `tblusertype`;
CREATE TABLE IF NOT EXISTS `tblusertype` (
  `utid` int(11) NOT NULL AUTO_INCREMENT,
  `usertype` varchar(45) NOT NULL,
  PRIMARY KEY (`utid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblusertype`
--

INSERT INTO `tblusertype` (`utid`, `usertype`) VALUES
(1, 'Choose'),
(2, 'Veterinarian'),
(3, 'Secretary'),
(5, 'Assistant');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
