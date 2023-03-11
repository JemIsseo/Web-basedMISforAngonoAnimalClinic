-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 11, 2023 at 01:20 PM
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
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tblappointments`
--

INSERT INTO `tblappointments` (`queueno`, `clientname`, `petname`, `services`, `dateandtime`) VALUES
(5, ' Vann Oliveros', 'Coco', 'Veterinary Emergency and Critical Care', '2023-02-13 10:42:00'),
(11, ' Divina Amio', 'Gekgek', 'Wellness Clinic', '2023-02-28 10:50:00');

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
(1, 'Pedigree', 'Medicine', 'Pagkain', 200, 200),
(14, 'Betadine', 'Medicine', 'HEHEHEHE', 0, 13);

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
-- Table structure for table `tblbreed`
--

DROP TABLE IF EXISTS `tblbreed`;
CREATE TABLE IF NOT EXISTS `tblbreed` (
  `bid` int NOT NULL AUTO_INCREMENT,
  `pettype` varchar(45) NOT NULL,
  `breed` varchar(45) NOT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tblbreed`
--

INSERT INTO `tblbreed` (`bid`, `pettype`, `breed`) VALUES
(1, 'Dog', 'German Shepherd'),
(2, 'Dog', 'Shih Tzu'),
(3, 'Dog', 'Aspin'),
(4, 'Dog', 'Japanese Spitz'),
(5, 'Dog', 'Chihuahua'),
(6, 'Dog', 'Rottweiler');

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
-- Table structure for table `tblownersprofile`
--

DROP TABLE IF EXISTS `tblownersprofile`;
CREATE TABLE IF NOT EXISTS `tblownersprofile` (
  `ownersname` varchar(45) NOT NULL,
  `contactno` varchar(45) NOT NULL,
  `address` varchar(255) NOT NULL,
  `emailaddress` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ownersname`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tblownersprofile`
--

INSERT INTO `tblownersprofile` (`ownersname`, `contactno`, `address`, `emailaddress`) VALUES
(' Romar Chris Belmonte', ' 09123889132', ' 81 Sta. Catarina St. Taytay, Rizal', 'BelmonteRC@gmail.com'),
(' Michelle Nervez', ' 09055459215', ' 38 Ynares St. Brgy. San Carlos Binangonan, Rizal', 'michelle.nervez@gmail.com'),
(' Ivy Sanchez', ' 09889345681', ' #112 Brgy. San Vicente Angono, Rizal', 'SanchezIvy@gmail.com'),
(' Jane Louise Pilapil', ' 09175546613', ' #218 Brgy. Poblacion ibaba Angono, Rizal', '01_JLouise@gmail.com'),
(' Vinah Ericka Oliveros', ' 09179654408', ' 223 E. Dela Paz St. Brgy. San Pedro Angono, Rizal', 'vinaholiveros1069@gmail.com'),
(' Kim Alexis Villaluz', ' 09963314522', ' 53 St. Clement Brgy. Bagumbayan Angono, Rizal', 'kim.alexis@gmail.com'),
(' Jeremy Liberty', ' 09099223039', ' 39 Interior Lanete St. Brgy. Sta. Ana Taytay, Rizal', 'libertyjeremy23@gmail.com'),
(' Divina Amio', ' 09178895502', ' 45 Molave St. Brgy. San Vicente Angono, Rizal', 'divinaamio01@gmail.com'),
(' Vann Oliveros', ' 09060668451', ' Ynares St. Brgy. San Carlos Binangonan, Rizal', 'vann.oliveros@gmail.com'),
(' Bim Salinga', ' 093850399584', ' Binangonan, Rizal', 'bim@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tblpet`
--

DROP TABLE IF EXISTS `tblpet`;
CREATE TABLE IF NOT EXISTS `tblpet` (
  `petid` int NOT NULL AUTO_INCREMENT,
  `ownersname` varchar(45) NOT NULL,
  `petname` varchar(45) NOT NULL,
  `pettype` varchar(45) NOT NULL,
  `age` int NOT NULL,
  `sex` varchar(45) NOT NULL,
  `breed` varchar(45) NOT NULL,
  `weight` varchar(45) NOT NULL,
  PRIMARY KEY (`petid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tblpet`
--

INSERT INTO `tblpet` (`petid`, `ownersname`, `petname`, `pettype`, `age`, `sex`, `breed`, `weight`) VALUES
(1, ' Jeremy Liberty', 'Gekgek', 'Dog', 11, 'Male', 'Aspin', '11kg'),
(5, ' Vann Oliveros', 'Coco', 'Dog', 5, 'Male', 'Shih Tzu', '5kg'),
(4, ' Jeremy Liberty', 'Gekgek', 'Dog', 11, 'Male', 'Aspin', '11kg'),
(6, ' Bim Salinga', 'Chichi', 'Dog', 3, 'Female', 'Shih Tzu', '10kg');

-- --------------------------------------------------------

--
-- Table structure for table `tblpettype`
--

DROP TABLE IF EXISTS `tblpettype`;
CREATE TABLE IF NOT EXISTS `tblpettype` (
  `petid` int NOT NULL AUTO_INCREMENT,
  `pettype` varchar(45) NOT NULL,
  PRIMARY KEY (`petid`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tblpettype`
--

INSERT INTO `tblpettype` (`petid`, `pettype`) VALUES
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
  PRIMARY KEY (`proid`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb3;

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
(22, 'Cosi pets milk (1Liter)', 'Food', 'Cosi is a formulated and highly delicious milk for pets of all ages. Cosi pets milk has broken down the lactose making it easier for your pet to digest.', 180, 30),
(25, 'Immunol', 'Medicine', 'Vitamins', 600, 40),
(26, 'Immunol', 'Medicine', 'Vitamins', 600, 42),
(27, 'Immunol', 'Medicine', 'Vitamins', 600, 40),
(28, 'Immunol', 'Medicine', 'Vitamins', 600, 40);

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
('assistant', 'asdf321', 'Assistant', 'animalassistant8@gmail.com', 0, 'IMG-6408089943edf8.03072227.jpg'),
('secretary', 'abcde', 'Secretary', 'secretary019@gmail.com', 0, 'IMG-640808a15e7321.07241435.jpg'),
('veterinarian', '1234', 'Veterinarian', 'veterinarian23@gmail.com', 0, 'IMG-640808a6e74131.29616600.jpg'),
('ime', '$2y$10$NnN5gpNJ4nzaFshZGRYgkuSS8RcYd9QSqnMB3dHUz5ABiB2aV7d5a', 'Secretary', 'imepogi23@gmail.com', 0, NULL),
('sample', '$2y$10$/HMloibO7bEE0gcpqL.Hg.5v5zFxSFSfj/uRgKHtmzN/R82ymTC9a', 'Assistant', 'jejliberty@gmail.com', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblusertype`
--

DROP TABLE IF EXISTS `tblusertype`;
CREATE TABLE IF NOT EXISTS `tblusertype` (
  `utid` int NOT NULL AUTO_INCREMENT,
  `usertype` varchar(45) NOT NULL,
  PRIMARY KEY (`utid`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3;

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
