-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 05, 2023 at 12:35 PM
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
  `expirydate` date DEFAULT NULL,
  PRIMARY KEY (`stockid`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbladdedstock`
--

INSERT INTO `tbladdedstock` (`stockid`, `prodname`, `category`, `quantityadded`, `date`, `expirydate`) VALUES
(1, 'BRONCure', 'Medicine', 5, '2023-04-11 14:48:44', '2025-06-23'),
(2, 'VitaPet (for adult cat) 1.5kg', 'Food', 6, '2023-04-12 14:32:21', '2025-06-23'),
(3, 'NutriChunks (beef)20kg', 'Food', 5, '2023-04-12 14:40:07', '2025-06-23'),
(4, 'Cosi pets milk (1Liter)', 'Medicine', 5, '2023-04-13 15:23:14', '2025-06-23'),
(25, 'Ketorolac Tromethamine', 'Medicine', 5, '2023-05-05 13:49:57', '2025-12-05'),
(26, 'Vanguard 5in1', 'Medicine', 10, '2023-05-06 00:47:45', '2026-08-01'),
(27, 'Vanguard 5in1', 'Medicine', 20, '2023-05-06 02:41:05', '2023-06-30'),
(28, 'Vanguard 5in1', 'Medicine', 5, '2023-05-11 05:20:24', '2023-05-20'),
(29, 'Ketorolac Tromethamine', 'Medicine', 2, '2023-06-21 09:02:52', '2026-06-21');

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
  `price` int DEFAULT NULL,
  `dateandtime` datetime NOT NULL,
  `scheduled` varchar(10) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `petid` int DEFAULT NULL,
  PRIMARY KEY (`queueno`)
) ENGINE=MyISAM AUTO_INCREMENT=95 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tblappointments`
--

INSERT INTO `tblappointments` (`queueno`, `clientname`, `petname`, `services`, `price`, `dateandtime`, `scheduled`, `status`, `petid`) VALUES
(5, ' Vann Oliveros', 'Coco', 'Veterinary Emergency and Critical Care', 0, '2023-02-13 10:42:00', 'Removed', 'In progress', 5),
(29, 'Jeremy Liberty', 'Tsaris', 'Pet Grooming', NULL, '2023-05-01 09:00:00', 'Yes', 'Completed', 20),
(40, ' Bim Salinga', 'Chichi', 'Elective, Corrective, and, Curative Surgical Services', NULL, '2023-04-29 00:00:00', 'Removed', 'In Progress', NULL),
(51, 'Jessica Young', 'Kris', 'Vaccination', NULL, '2023-05-01 19:10:00', 'Yes', 'Completed', NULL),
(48, 'Jeremy Liberty', 'Tsaris', 'Deworming', NULL, '2023-05-01 09:00:00', 'Removed', 'Completed', NULL),
(47, 'Catherine Jacobs', 'Mocha', 'Pet Grooming', NULL, '2023-05-01 09:00:00', 'Yes', 'Completed', NULL),
(54, 'John Pascual', 'Chachu', 'Pet Grooming', NULL, '2023-05-06 13:00:00', 'Removed', 'Completed', 29),
(79, 'Jeremy Liberty', 'Jake', 'Deworming', NULL, '2023-05-10 16:55:00', 'Removed', 'Completed', 31),
(71, ' Vann Oliveros', 'Coco', 'Disease Diagnostics and Treatment', NULL, '2023-05-10 16:06:00', 'Yes', 'Completed', 5),
(77, ' Vann Oliveros', 'Coco', 'Veterinary Emergency and Critical Care', NULL, '2023-05-10 16:31:00', 'Removed', 'Completed', NULL),
(81, 'Jeremy Liberty', 'Gekgek', 'Hospitalization', NULL, '2023-05-08 11:05:00', 'Removed', 'Completed', NULL),
(82, 'Jeremy Liberty', 'Gekgek', 'Veterinary Emergency and Critical Care', NULL, '2023-05-12 20:55:00', 'Removed', 'Completed', NULL),
(83, 'Catherine Jacobs', 'Mocha', 'Deworming', NULL, '2023-05-13 20:58:00', 'Removed', 'Completed', NULL),
(84, 'Jeremy Liberty', 'Jake', 'Vaccination', NULL, '2023-05-12 21:06:00', 'Removed', 'In progress', NULL),
(85, 'Jeremy Liberty', 'Jake', 'Veterinary Emergency and Critical Care', NULL, '2023-05-07 21:07:00', 'Removed', 'In progress', NULL),
(89, 'John Pascual', 'Chachu', 'Elective, Corrective, and, Curative Surgical Services', NULL, '2023-05-15 21:23:00', 'Yes', 'In Progress', NULL),
(92, ' Vann Oliveros', 'Coco', 'Deworming', NULL, '2023-05-12 07:47:00', 'Yes', 'In Progress', NULL),
(90, 'Catherine Jacobs', 'Mocha', 'Wellness Clinic', NULL, '2023-05-15 21:36:00', 'Yes', 'In Progress', NULL),
(91, 'Alexa Theatrix Melazques', 'Kisses', 'Pet Grooming', NULL, '2023-05-15 21:36:00', 'Yes', 'In Progress', NULL),
(93, 'John Pascual', 'Chachu', 'Vaccination', NULL, '2023-05-13 11:16:00', 'Yes', 'Completed', 29),
(94, 'Catherine Jacobs', 'Mocha', 'Disease Diagnostics and Treatment', NULL, '2023-05-12 11:29:00', 'Yes', 'In Progress', NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=543 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblaudittrail`
--

INSERT INTO `tblaudittrail` (`atid`, `username`, `datetime`, `ipaddress`, `actionmode`) VALUES
(531, 'Sampless', '2023-05-11 05:24:59', '110.54.176.138', 'Added new breed in settings'),
(530, 'Sampless', '2023-05-11 05:20:24', '110.54.176.138', 'Updated product in stocks module'),
(529, 'Sampless', '2023-05-11 05:18:51', '110.54.176.138', 'Successful Transaction of product in transaction module'),
(528, 'Sampless', '2023-05-11 05:07:12', '110.54.176.138', 'Added pet profile in customer module'),
(527, 'Sampless', '2023-05-11 05:05:54', '110.54.176.138', 'Added owners profile in customer module'),
(526, 'Sampless', '2023-05-11 05:02:55', '110.54.176.138', 'Logged In'),
(525, 'Sampless', '2023-05-11 05:02:11', '110.54.176.138', 'Logged Out'),
(524, 'Sampless', '2023-05-11 05:01:08', '110.54.176.138', 'Successful Transaction of product in transaction module'),
(523, 'Sampless', '2023-05-11 04:59:54', '110.54.176.138', 'Logged In'),
(522, 'Veterinarian', '2023-05-11 04:34:19', '110.54.176.138', 'Logged Out'),
(521, 'Veterinarian', '2023-05-11 04:33:52', '110.54.176.138', 'Edited pet profile in customers module'),
(520, 'Veterinarian', '2023-05-11 04:33:25', '110.54.176.138', 'Edited pet profile in customers module'),
(519, 'Veterinarian', '2023-05-11 04:32:27', '110.54.176.138', 'Logged In'),
(518, 'Onlyoneforme', '2023-05-11 04:31:44', '110.54.176.138', 'Logged Out'),
(517, 'Onlyoneforme', '2023-05-11 04:29:59', '110.54.176.138', 'Logged In'),
(516, 'Veterinarian', '2023-05-11 04:29:48', '110.54.176.138', 'Logged Out'),
(515, 'Veterinarian', '2023-05-11 04:25:16', '110.54.176.138', 'Logged In'),
(514, 'Secretary', '2023-05-11 04:25:08', '110.54.176.138', 'Logged Out'),
(513, 'Secretary', '2023-05-11 04:23:15', '110.54.176.138', 'Logged In'),
(512, 'Veterinarian', '2023-05-11 04:22:59', '110.54.176.138', 'Logged Out'),
(511, 'Veterinarian', '2023-05-11 04:18:32', '110.54.176.138', 'Successful Transaction of product in transaction module'),
(510, 'Veterinarian', '2023-05-11 04:14:14', '110.54.176.138', 'Successful Transaction of product in transaction module'),
(509, 'Veterinarian', '2023-05-11 04:07:44', '110.54.176.138', 'Successful Transaction of product in transaction module'),
(508, 'Veterinarian', '2023-05-11 04:04:51', '110.54.176.138', 'Logged In'),
(507, 'Veterinarian', '2023-05-11 03:52:40', '110.54.176.138', 'Logged Out'),
(506, 'Veterinarian', '2023-05-11 03:52:27', '110.54.176.138', 'Archived account in useraccount module'),
(505, 'Veterinarian', '2023-05-11 03:52:21', '110.54.176.138', 'Restored an account in useraccount module'),
(504, 'Veterinarian', '2023-05-11 03:52:07', '110.54.176.138', 'Archived account in useraccount module'),
(503, 'Veterinarian', '2023-05-11 03:51:52', '110.54.176.138', 'Edit account in useraccount module'),
(502, 'Veterinarian', '2023-05-11 03:45:15', '119.93.200.183', 'Logged In'),
(501, 'Veterinarian', '2023-05-11 03:31:03', '110.54.176.138', 'Logged Out'),
(500, 'Veterinarian', '2023-05-11 03:30:52', '110.54.176.138', 'Logged In'),
(499, 'Veterinarian', '2023-05-11 03:30:00', '110.54.176.138', 'Booked a service in appointments module'),
(498, 'Veterinarian', '2023-05-11 03:16:52', '110.54.176.138', 'Booked a service in appointments module'),
(497, 'Veterinarian', '2023-05-11 02:31:43', '119.93.200.183', 'Logged In'),
(496, 'Veterinarian', '2023-05-10 23:50:31', '152.32.99.82', 'Logged Out'),
(495, 'Veterinarian', '2023-05-10 23:46:47', '152.32.99.82', 'Booked a service in appointments module'),
(494, 'Veterinarian', '2023-05-10 23:45:46', '152.32.99.82', 'Archived petprofile in customer module'),
(493, 'Veterinarian', '2023-05-10 23:45:27', '152.32.99.82', 'Restored ownersprofile in customer module'),
(492, 'Veterinarian', '2023-05-10 23:36:18', '152.32.99.82', 'Archived account in useraccount module'),
(491, 'Veterinarian', '2023-05-10 23:32:52', '152.32.99.82', 'Restored an account in useraccount module'),
(490, 'Veterinarian', '2023-05-10 23:31:43', '152.32.99.82', 'Archived account in useraccount module'),
(489, 'Veterinarian', '2023-05-10 23:23:02', '152.32.99.82', 'Logged In'),
(488, 'Veterinarian', '2023-05-10 23:18:16', '152.32.99.82', 'Logged Out'),
(487, 'Veterinarian', '2023-05-10 23:18:10', '152.32.99.82', 'Logged In'),
(486, 'Onlyoneforme', '2023-05-10 18:20:06', '152.32.99.82', 'Logged Out'),
(485, 'Onlyoneforme', '2023-05-10 18:19:46', '152.32.99.82', 'Logged In'),
(484, 'Secretary', '2023-05-10 18:19:31', '152.32.99.82', 'Logged Out'),
(483, 'Secretary', '2023-05-10 18:19:26', '152.32.99.82', 'Logged In'),
(482, 'Veterinarian', '2023-05-10 18:18:59', '152.32.99.82', 'Logged Out'),
(481, 'Veterinarian', '2023-05-10 16:45:22', '152.32.99.82', 'Archived petprofile in customer module'),
(480, 'Veterinarian', '2023-05-10 16:45:05', '152.32.99.82', 'Restored ownersprofile in customer module'),
(479, 'Veterinarian', '2023-05-10 16:42:51', '152.32.99.82', 'Updated product in stocks module'),
(478, 'Veterinarian', '2023-05-10 16:42:32', '152.32.99.82', 'Edit account in useraccount module'),
(477, 'Veterinarian', '2023-05-10 16:42:27', '152.32.99.82', 'Edit account in useraccount module'),
(476, 'Veterinarian', '2023-05-10 16:40:14', '152.32.99.82', 'Edit account in useraccount module'),
(475, 'Veterinarian', '2023-05-10 16:40:07', '152.32.99.82', 'Edit account in useraccount module'),
(474, 'Veterinarian', '2023-05-10 16:39:53', '152.32.99.82', 'Edit account in useraccount module'),
(473, 'Veterinarian', '2023-05-10 16:39:38', '152.32.99.82', 'Edit account in useraccount module'),
(472, 'Veterinarian', '2023-05-10 16:38:26', '152.32.99.82', 'Edit account in useraccount module'),
(471, 'Veterinarian', '2023-05-10 16:35:49', '152.32.99.82', 'Edit account in useraccount module'),
(470, 'Veterinarian', '2023-05-10 16:35:36', '152.32.99.82', 'Edit account in useraccount module'),
(469, 'Veterinarian', '2023-05-10 16:33:14', '152.32.99.82', 'Edit account in useraccount module'),
(468, 'Veterinarian', '2023-05-10 16:32:41', '152.32.99.82', 'Edit account in useraccount module'),
(467, 'Veterinarian', '2023-05-10 16:32:28', '152.32.99.82', 'Edit account in useraccount module'),
(466, 'Veterinarian', '2023-05-10 16:31:58', '152.32.99.82', 'Archived product in stocks module'),
(465, 'Veterinarian', '2023-05-10 16:31:44', '152.32.99.82', 'Updated product in stocks module'),
(464, 'Veterinarian', '2023-05-10 16:30:19', '152.32.99.82', 'Edited pet profile in customers module'),
(463, 'Veterinarian', '2023-05-10 16:29:16', '152.32.99.82', 'Edited pet profile in customers module'),
(462, 'Veterinarian', '2023-05-10 16:28:57', '152.32.99.82', 'Edited pet profile in customers module'),
(461, 'Veterinarian', '2023-05-10 16:27:18', '152.32.99.82', 'Edited pet profile in customers module'),
(460, 'Veterinarian', '2023-05-10 16:27:03', '152.32.99.82', 'Edited pet profile in customers module'),
(459, 'Veterinarian', '2023-05-10 16:26:52', '152.32.99.82', 'Edited pet profile in customers module'),
(352, 'Veterinarian', '2023-05-10 12:15:51', '112.204.22.117', 'Logged Out'),
(458, 'Veterinarian', '2023-05-10 16:26:00', '152.32.99.82', 'Edited pet profile in customers module'),
(355, 'Onlyoneforme', '2023-05-10 12:20:10', '112.204.22.117', 'Logged In'),
(356, 'Onlyoneforme', '2023-05-10 12:21:41', '112.204.22.117', 'Restored ownersprofile in customer module'),
(357, 'Veterinarian', '2023-05-10 12:25:42', '112.204.22.117', 'Logged In'),
(358, 'Veterinarian', '2023-05-10 12:27:22', '112.204.22.117', 'Archived account in useraccount module'),
(359, 'Veterinarian', '2023-05-10 12:27:34', '112.204.22.117', 'Restored an account in useraccount module'),
(360, 'Veterinarian', '2023-05-10 12:33:08', '112.204.22.117', 'Logged In'),
(361, 'Veterinarian', '2023-05-10 12:44:24', '112.204.22.117', 'Logged In'),
(362, 'Veterinarian', '2023-05-10 12:48:09', '112.204.22.117', 'Added product in stocks module'),
(363, 'Veterinarian', '2023-05-10 12:52:12', '112.204.22.117', 'Logged In'),
(364, 'Veterinarian', '2023-05-10 12:55:21', '152.32.99.82', 'Booked a service in appointments module'),
(365, 'Bae', '2023-05-10 12:55:51', '112.204.22.117', 'Created account in useraccount module'),
(366, 'Veterinarian', '2023-05-10 12:56:06', '112.204.22.117', 'Logged Out'),
(367, 'Veterinarian', '2023-05-10 12:58:21', '152.32.99.82', 'Booked a service in appointments module'),
(368, 'Veterinarian', '2023-05-10 13:00:42', '112.204.22.117', 'Logged In'),
(369, 'Veterinarian', '2023-05-10 13:06:05', '152.32.99.82', 'Booked a service in appointments module'),
(457, 'Veterinarian', '2023-05-10 16:25:28', '152.32.99.82', 'Edited pet profile in customers module'),
(456, 'Veterinarian', '2023-05-10 16:25:09', '152.32.99.82', 'Edited pet profile in customers module'),
(455, 'Veterinarian', '2023-05-10 16:24:41', '152.32.99.82', 'Edit account in useraccount module'),
(454, 'Veterinarian', '2023-05-10 16:23:15', '152.32.99.82', 'Edit account in useraccount module'),
(453, 'Veterinarian', '2023-05-10 16:23:08', '152.32.99.82', 'Edit account in useraccount module'),
(452, 'Veterinarian', '2023-05-10 16:22:45', '152.32.99.82', 'Edit account in useraccount module'),
(451, 'Veterinarian', '2023-05-10 16:22:37', '152.32.99.82', 'Edit account in useraccount module'),
(450, 'Veterinarian', '2023-05-10 16:22:30', '152.32.99.82', 'Edit account in useraccount module'),
(449, 'Veterinarian', '2023-05-10 16:22:00', '152.32.99.82', 'Edit account in useraccount module'),
(448, 'Veterinarian', '2023-05-10 16:19:49', '152.32.99.82', 'Edit account in useraccount module'),
(447, 'Veterinarian', '2023-05-10 16:19:42', '152.32.99.82', 'Edit account in useraccount module'),
(446, 'Veterinarian', '2023-05-10 16:19:08', '152.32.99.82', 'Edit account in useraccount module'),
(445, 'Veterinarian', '2023-05-10 16:18:50', '152.32.99.82', 'Edited pet profile in customers module'),
(444, 'Veterinarian', '2023-05-10 16:18:33', '152.32.99.82', 'Edited pet profile in customers module'),
(443, 'Veterinarian', '2023-05-10 16:18:17', '152.32.99.82', 'Edited pet profile in customers module'),
(442, 'Veterinarian', '2023-05-10 16:18:06', '152.32.99.82', 'Edited pet profile in customers module'),
(441, 'Veterinarian', '2023-05-10 16:17:58', '152.32.99.82', 'Edited pet profile in customers module'),
(440, 'Veterinarian', '2023-05-10 16:15:43', '152.32.99.82', 'Edited pet profile in customers module'),
(439, 'Veterinarian', '2023-05-10 16:14:05', '152.32.99.82', 'Edited pet profile in customers module'),
(438, 'Veterinarian', '2023-05-10 16:12:48', '152.32.99.82', 'Edited pet profile in customers module'),
(437, 'Veterinarian', '2023-05-10 16:12:07', '152.32.99.82', 'Updated product in stocks module'),
(436, 'Veterinarian', '2023-05-10 16:10:32', '152.32.99.82', 'Edit account in useraccount module'),
(435, 'Veterinarian', '2023-05-10 16:10:19', '152.32.99.82', 'Edit account in useraccount module'),
(434, 'Veterinarian', '2023-05-10 16:09:21', '152.32.99.82', 'Archived account in useraccount module'),
(433, 'Veterinarian', '2023-05-10 16:08:58', '152.32.99.82', 'Edit account in useraccount module'),
(432, 'Veterinarian', '2023-05-10 16:08:40', '152.32.99.82', 'Edit account in useraccount module'),
(431, 'Veterinarian', '2023-05-10 16:08:28', '152.32.99.82', 'Edit account in useraccount module'),
(430, 'Veterinarian', '2023-05-10 16:07:20', '152.32.99.82', 'Edit account in useraccount module'),
(429, 'Veterinarian', '2023-05-10 16:07:02', '152.32.99.82', 'Edit account in useraccount module'),
(428, 'Veterinarian', '2023-05-10 16:06:33', '152.32.99.82', 'Edit account in useraccount module'),
(427, 'Veterinarian', '2023-05-10 16:02:23', '152.32.99.82', 'Edited pet profile in customers module'),
(426, 'Veterinarian', '2023-05-10 16:00:14', '152.32.99.82', 'Edited pet profile in customers module'),
(425, 'Veterinarian', '2023-05-10 15:59:08', '152.32.99.82', 'Edited pet profile in customers module'),
(424, 'Veterinarian', '2023-05-10 15:56:47', '152.32.99.82', 'Edited pet profile in customers module'),
(423, 'Veterinarian', '2023-05-10 15:52:52', '152.32.99.82', 'Archived petprofile in customer module'),
(422, 'Veterinarian', '2023-05-10 15:51:07', '152.32.99.82', 'Restored ownersprofile in customer module'),
(532, 'Veterinarian', '2023-05-16 01:30:59', '152.32.99.82', 'Logged In'),
(533, 'Veterinarian', '2023-05-16 01:31:50', '152.32.99.82', 'Logged Out'),
(534, 'Veterinarian', '2023-05-16 06:52:53', '180.190.74.253', 'Logged In'),
(535, 'Veterinarian', '2023-05-16 14:56:47', '158.62.9.211', 'Logged In'),
(536, 'Veterinarian', '2023-05-17 02:38:59', '158.62.9.211', 'Logged In'),
(537, 'Veterinarian', '2023-05-17 07:02:23', '158.62.9.211', 'Logged Out'),
(538, 'Veterinarian', '2023-05-27 15:02:32', '152.32.100.210', 'Logged In'),
(539, 'Veterinarian', '2023-06-01 14:22:31', '152.32.100.210', 'Logged In'),
(540, 'Veterinarian', '2023-06-06 12:44:47', '112.204.25.55', 'Logged In'),
(541, 'Veterinarian', '2023-06-21 08:58:55', '152.32.100.210', 'Logged In'),
(542, 'Veterinarian', '2023-06-21 09:02:52', '152.32.100.210', 'Updated product in stocks module');

-- --------------------------------------------------------

--
-- Table structure for table `tblbreed`
--

DROP TABLE IF EXISTS `tblbreed`;
CREATE TABLE IF NOT EXISTS `tblbreed` (
  `bid` int NOT NULL AUTO_INCREMENT,
  `pettypeid` int NOT NULL,
  `breed` varchar(45) NOT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tblbreed`
--

INSERT INTO `tblbreed` (`bid`, `pettypeid`, `breed`) VALUES
(1, 1, 'German Shepherd'),
(2, 1, 'Shih Tzu'),
(3, 1, 'Aspin'),
(4, 1, 'Japanese Spitz'),
(5, 1, 'Chihuahua'),
(13, 2, 'Persian'),
(11, 2, 'British Shorthair'),
(15, 1, 'Golden Retreiver');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

DROP TABLE IF EXISTS `tblcategory`;
CREATE TABLE IF NOT EXISTS `tblcategory` (
  `catid` int NOT NULL AUTO_INCREMENT,
  `category` varchar(45) NOT NULL,
  PRIMARY KEY (`catid`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;

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
) ENGINE=MyISAM AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblorder`
--

INSERT INTO `tblorder` (`orderid`, `transactionid`, `prodname`, `category`, `quantity`, `price`, `cart`) VALUES
(42, 15, 'Pet Bowl (for eating purpose)', 'Accessories', 3, 150, 'Checkout'),
(25, 1, 'NutriChunks (beef)20kg', 'Food', 10, 15000, 'Checkout'),
(26, 1, 'D-Glucose Monohydrate', 'Medicine', 34, 3230, 'Checkout'),
(23, 1, 'BRONCure', 'Medicine', 7, 1540, 'Checkout'),
(11, 1, 'Dextrose Monohydrate', 'Medicine', 34, 1768, 'Checkout'),
(41, 15, 'VitaPet (for adult cat) 1.5kg', 'Food', 10, 3600, 'Checkout'),
(28, 12, 'BRONCure', 'Medicine', 3, 660, 'Checkout'),
(40, 12, 'Cosi pets milk (1Liter)', 'Medicine', 5, 1250, 'Checkout'),
(39, 12, 'D-Glucose Monohydrate', 'Medicine', 3, 285, 'Checkout'),
(43, 15, 'Cosi pets milk (1Liter)', 'Medicine', 3, 750, 'Checkout'),
(44, 15, 'Immunol', 'Medicine', 7, 4550, 'Checkout'),
(45, 16, 'NutriChunks (beef)20kg', 'Food', 4, 6000, 'Checkout'),
(49, 17, 'Dextrose Monohydrate', 'Medicine', 3, 165, 'Checkout'),
(48, 17, 'Pet Collar', 'Accessories', 2, 80, 'Checkout'),
(50, 17, 'Vanguard 5in1', 'Medicine', 1, 500, 'Checkout'),
(51, 18, 'VitaPet (for adult cat) 1.5kg', 'Food', 1, 360, 'Checkout'),
(52, NULL, 'Vanguard 5in1', 'Medicine', 5, 2500, 'Removed'),
(53, 23, 'Vanguard 5in1', 'Medicine', 25, 12500, 'Checkout'),
(54, 19, 'Vanguard 5in1', 'Medicine', 3, 1500, 'Checkout'),
(55, 20, 'Vanguard 5in1', 'Medicine', 1, 500, 'Checkout'),
(56, 23, 'NutriChunks (beef)20kg', 'Food', 3, 4500, 'Checkout'),
(57, 20, 'Cosi pets milk (1Liter)', 'Food', 3, 750, 'Checkout'),
(58, 23, 'Cosi pets milk (1Liter)', 'Food', 3, 750, 'Checkout'),
(59, NULL, 'Ketorolac Tromethamine', 'Medicine', 3, 1800, 'Removed'),
(60, 20, 'Vanguard 5in1', 'Medicine', 3, 1500, 'Checkout'),
(61, NULL, 'Vanguard 5in1', 'Medicine', 4, 2000, 'Removed'),
(62, 21, 'Vanguard 5in1', 'Medicine', 3, 1500, 'Checkout'),
(63, 22, 'Ketorolac Tromethamine', 'Medicine', 4, 2400, 'Checkout'),
(64, NULL, 'Ketorolac Tromethamine', 'Medicine', 4, 2400, 'Removed'),
(65, 22, 'Vanguard 5in1', 'Medicine', 3, 1500, 'Checkout'),
(66, NULL, 'Vanguard 5in1', 'Medicine', 1, 500, 'Removed'),
(67, NULL, 'Vanguard 5in1', 'Medicine', 1, 500, 'Removed'),
(68, NULL, 'Vanguard 5in1', 'Medicine', 2, 1000, 'Removed'),
(69, NULL, 'Ketorolac Tromethamine', 'Medicine', 2, 1200, 'Removed'),
(70, NULL, 'Vanguard 5in1', 'Medicine', -3, -1500, 'Removed'),
(71, NULL, 'Nutrichunks', 'Food', -1, -500, 'Removed'),
(72, NULL, 'Vanguard 5in1', 'Medicine', 5, 2500, 'Removed'),
(73, 24, 'Vanguard 5in1', 'Medicine', 3, 1500, 'Checkout'),
(74, NULL, 'Cosi pets milk (1Liter)', 'Food', 4, 1000, 'Removed'),
(75, 24, 'Ketorolac Tromethamine', 'Medicine', 4, 2400, 'Checkout'),
(76, 26, 'Vanguard 5in1', 'Medicine', 3, 1500, 'Checkout'),
(77, 26, 'NutriChunks (beef)20kg', 'Food', 4, 6000, 'Checkout');

-- --------------------------------------------------------

--
-- Table structure for table `tblownersprofile`
--

DROP TABLE IF EXISTS `tblownersprofile`;
CREATE TABLE IF NOT EXISTS `tblownersprofile` (
  `cusid` int NOT NULL AUTO_INCREMENT,
  `ownersname` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `contactno` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `emailaddress` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `archive` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`cusid`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblownersprofile`
--

INSERT INTO `tblownersprofile` (`cusid`, `ownersname`, `contactno`, `address`, `emailaddress`, `archive`) VALUES
(1, 'Anderson Smith', ' 09123889132', ' 81 Sta. Catarina St. Taytay, Rizal', 'BelmonteRC@gmail.com', 'false'),
(2, 'Carl Wright', ' 09055459215', ' 38 Ynares St. Brgy. San Carlos Binangonan, Rizal', 'michelle.nervez@gmail.com', 'false'),
(3, 'Samantha Priz', ' 09889345681', ' #112 Brgy. San Vicente Angono, Rizal', 'SanchezIvy@gmail.com', 'false'),
(4, 'Robert Hills', ' 09175546613', ' #218 Brgy. Poblacion ibaba Angono, Rizal', '01_JLouise@gmail.com', 'true'),
(5, 'White Lee', ' 09179654408', ' 223 E. Dela Paz St. Brgy. San Pedro Angono, Rizal', 'vinaholiveros1069@gmail.com', 'false'),
(6, 'Jessica Young', ' 09963314522', ' 53 St. Clement Brgy. Bagumbayan Angono, Rizal', 'kim.alexis@gmail.com', 'false'),
(15, 'Jeremy Liberty', ' 09099223039', '#39 Interior Lanete St. Brgy Sta. Ana Taytay, Rizal', 'libertyjeremy23@gmail.com', 'false'),
(8, 'Catherine Jacobs', ' 09178895502', ' 45 Molave St. Brgy. San Vicente Angono, Rizal', 'divinaamio01@gmail.com', 'false'),
(9, 'Vann Oliveros', ' 09060668451', ' Ynares St. Brgy. San Carlos Binangonan, Rizal', 'vann.oliveros@gmail.com', 'false'),
(10, 'Bim Salinga', ' 093850399584', 'Brgy. Pantok Binangonan, Rizal', 'bim@gmail.com', 'false'),
(16, 'Jessica Sotto', ' 09567657657', ' 123 STREET BRGY ', 'kapusomo@wewjeo.com', 'true'),
(17, 'John Pascual', ' 09988414045', ' Binangonan Rizal', 'johnrudolfpascual1226@gmail.com', 'false'),
(18, 'Colexo James Hard', ' 09247283756', ' Brgy. Pantok Binangonan, Rizal', 'certag24@gmail.com', 'false'),
(19, 'Alexa Theatrix Melazques', ' 09564564655', ' Blk 20 San Isidro Taytay, Rizal', 'cutiepatootie@gmail.com', 'false'),
(20, 'Keen Benidictus', ' 93438562345', ' Scrapyard Angono, Rizal', 'keenisgreat2@gmail.com', 'false'),
(21, 'Biendo Delos Angeles', ' 09348358575', ' Morong, Rizal', 'sirbiendo@gmail.com', 'false');

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
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`petid`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tblpet`
--

INSERT INTO `tblpet` (`petid`, `cusid`, `ownersname`, `petname`, `pettype`, `age`, `sex`, `breed`, `weight`, `archive`, `image`) VALUES
(19, 15, 'Jeremy Liberty', 'Hannah', 'Dog', 3, 'Female', 'Japanese Spitz', '12kg', 'false', NULL),
(5, 9, ' Vann Oliveros', 'Coco', 'Dog', 6, 'Male', 'Shih Tzu', '5kg', 'false', NULL),
(26, 4, 'Robert Hills', 'Petty', 'Dog', 3, 'Female', 'Rottweiler', '17kg', 'false', NULL),
(6, 10, ' Bim Salinga', 'Chichi', 'Dog', 4, 'Male', 'Shih Tzu', '10kg', 'false', 'IMG-6457e2411d6af0.32742386.png'),
(20, 15, 'Jeremy Liberty', 'Tsaris', 'Dog', 2, 'Female', 'Aspin', '15kg', 'false', NULL),
(18, 15, 'Jeremy Liberty', 'Gekgek', 'Dog', 11, 'Male', 'Aspin', '15kg', 'false', NULL),
(25, 6, 'Jessica Young', 'Kris', 'Cat', 3, 'Male', 'Persian', '8kg', 'false', NULL),
(27, 8, 'Catherine Jacobs', 'Mocha', 'Dog', 6, 'Female', 'Shih Tzu', '8kg', 'false', NULL),
(28, 4, 'Robert Hills', 'Milky', 'Dog', 3, 'Male', 'Chihuahua', '6 kg', 'false', NULL),
(29, 17, 'John Pascual', 'Chachu', 'Dog', 7, 'Male', 'Shih Tzu', '20 kg', 'false', NULL),
(30, 1, 'Anderson Smith', 'Egualada', 'Dog', 2, 'Female', 'Aspin', '15 kg', 'true', NULL),
(31, 15, 'Jeremy Liberty', 'Jake', 'Dog', 3, 'Male', 'German Shepherd', '10 kg', 'false', NULL),
(32, 19, 'Alexa Theatrix Melazques', 'Kisses', 'Cat', 4, 'Male', 'British Shorthair', '8 kg', 'false', NULL),
(33, 21, 'Biendo Delos Angeles', 'Patutay', 'Dog', 2, 'Female', 'Japanese Spitz', '8 kg', 'false', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblpettype`
--

DROP TABLE IF EXISTS `tblpettype`;
CREATE TABLE IF NOT EXISTS `tblpettype` (
  `pettypeid` int NOT NULL AUTO_INCREMENT,
  `pettype` varchar(45) NOT NULL,
  PRIMARY KEY (`pettypeid`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tblpettype`
--

INSERT INTO `tblpettype` (`pettypeid`, `pettype`) VALUES
(1, 'Dog'),
(2, 'Cat'),
(3, 'Bird');

-- --------------------------------------------------------

--
-- Table structure for table `tblservices`
--

DROP TABLE IF EXISTS `tblservices`;
CREATE TABLE IF NOT EXISTS `tblservices` (
  `sid` int NOT NULL AUTO_INCREMENT,
  `services` varchar(60) NOT NULL,
  `price` int DEFAULT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tblservices`
--

INSERT INTO `tblservices` (`sid`, `services`, `price`) VALUES
(1, 'Wellness Clinic', 600),
(2, 'Disease Diagnostics and Treatment', 560),
(3, 'Veterinary Emergency and Critical Care', 500),
(4, 'Elective, Corrective, and, Curative Surgical Services', 600),
(5, 'Hospitalization', 500),
(6, 'Pet Grooming', 800),
(7, 'Deworming', 500),
(8, 'Vaccination', 500),
(11, 'Anti-Rabies', 500),
(12, ' 5 IN 1', 750);

-- --------------------------------------------------------

--
-- Table structure for table `tblstock`
--

DROP TABLE IF EXISTS `tblstock`;
CREATE TABLE IF NOT EXISTS `tblstock` (
  `proid` int NOT NULL AUTO_INCREMENT,
  `prodname` varchar(100) NOT NULL,
  `category` varchar(45) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int NOT NULL,
  `quantity` int NOT NULL,
  `minstocklevel` int DEFAULT NULL,
  `maxstocklevel` int DEFAULT NULL,
  `archive` varchar(10) NOT NULL,
  `expirydate` date NOT NULL,
  PRIMARY KEY (`proid`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tblstock`
--

INSERT INTO `tblstock` (`proid`, `prodname`, `category`, `description`, `price`, `quantity`, `minstocklevel`, `maxstocklevel`, `archive`, `expirydate`) VALUES
(13, 'Dextrose Monohydrate', 'Medicine', 'is a carbohydrate and valuable source of energy rapidly and easily absorb.', 55, 20, 10, 5000, 'false', '2024-11-19'),
(15, 'BRONCure', 'Medicine', 'For acute treatment of colds and respiratory infections in pets. to reduce symptoms of sneezing, coughing, watery eyes and nose.', 220, 80, 10, 5000, 'true', '2024-11-19'),
(16, 'D-Glucose Monohydrate', 'Medicine', 'is useful in rebuilding stamina and vigor after every activity.', 95, 29, 10, 5000, 'false', '2024-11-19'),
(17, 'Pet Collar', 'Accessories', 'use for restrain, identification and protection.', 40, 80, 10, 5000, 'false', '2024-11-19'),
(18, 'Pet Bowl (for eating purpose)', 'Medicine', 'Food containers use for feeding pets made up of different types of materials.', 50, 50, 10, 5000, 'false', '2024-11-19'),
(20, 'NutriChunks (beef)20kg', 'Food', 'An optimum blend of proteins, fats and carbohydrates that support a puppies high energy needs.', 1500, 18, 10, 5000, 'false', '2024-11-19'),
(21, 'VitaPet (for adult cat) 1.5kg', 'Food', 'It has tuna flavor, to support the immune system for a healthy cat with calcium and phosporus to help maintain healthy bones and teeth.', 360, 24, 10, 5000, 'false', '2024-11-19'),
(22, 'Cosi pets milk (1Liter)', 'Food', 'Cosi is a formulated and highly delicious milk for pets of all ages. Cosi pets milk has broken down the lactose making it easier for your pet to digest.', 250, 23, 10, 5000, 'false', '2024-11-19'),
(36, 'Pet Harness', 'Medicine', 'Equipment consisting of straps of webbing that loop nearly around that fasten together using side release buckles.', 300, 50, 10, 5000, 'true', '2024-11-19'),
(37, 'Immunol', 'Medicine', 'Immunol syrup is clinically proven an immunomodulator / immunostimulant and phagocytosis enhancer for dogs and cats to enhance immunity and fights pathogens.', 650, 28, 10, 5000, 'false', '2024-11-19'),
(38, 'Ketorolac Tromethamine', 'Medicine', 'Treats dog eye infection', 600, 75, 10, 5000, 'false', '2025-05-05'),
(39, 'Vanguard 5in1', 'Medicine', 'Vaccines', 500, 25, 10, 5000, 'false', '2025-08-01'),
(40, 'Nutrichunks', 'Food', 'Food for doggies', 500, 10, 10, 5000, 'true', '2025-01-20');

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
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbltransaction`
--

INSERT INTO `tbltransaction` (`transactionid`, `username`, `ownersname`, `totalprice`, `date`) VALUES
(1, 'Veterinarian', 'White Lee', 21538, '2023-04-09 12:40:06'),
(16, 'Veterinarian', 'Samantha Priz', 6000, '2023-05-01 21:04:57'),
(12, 'Veterinarian', 'Jeremy Liberty', 2195, '2023-04-25 17:49:50'),
(15, 'Jemlibs', 'Bim Salinga', 9050, '2023-05-01 21:01:01'),
(17, 'Veterinarian', 'Anderson Smith', 745, '2023-05-06 00:49:51'),
(18, 'Veterinarian', 'Bim Salinga', 360, '2023-05-06 00:53:31'),
(19, 'Veterinarian', 'Bim Salinga', 1500, '2023-05-06 02:42:46'),
(20, 'Veterinarian', 'Robert Hills', 2750, '2023-05-06 17:59:25'),
(21, 'Veterinarian', 'Anderson Smith', 1500, '2023-05-08 03:03:27'),
(22, 'Veterinarian', 'Anderson Smith', 3900, '2023-05-11 04:07:44'),
(23, 'Veterinarian', 'Carl Wright', 17750, '2023-05-11 04:14:14'),
(25, 'Sampless', 'Carl Wright', 2400, '2023-05-11 05:01:08'),
(26, 'Sampless', 'Biendo Delos Angeles', 7500, '2023-05-11 05:18:51');

-- --------------------------------------------------------

--
-- Table structure for table `tbluseraccount`
--

DROP TABLE IF EXISTS `tbluseraccount`;
CREATE TABLE IF NOT EXISTS `tbluseraccount` (
  `userid` int NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL,
  `usertype` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` int NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `archive` varchar(10) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbluseraccount`
--

INSERT INTO `tbluseraccount` (`userid`, `username`, `password`, `usertype`, `email`, `status`, `image`, `archive`) VALUES
(8, 'Veterinarian', '$2y$10$RbOwIh90jdAvsQJoKdikiOVkB2aqC50jg7uh22Nh2hSJL9O805K5q', 'Veterinarian', 'imepogi23@gmail.com', 1, 'IMG-6438186b526e22.70470279.png', 'false'),
(9, 'notverified', '$2y$10$eGgX2Gjwf8aMf0OC2S.tK.mstFL3YA8affK9YbhJ./hIJcwxCGqii', 'Assistant', 'libertypogi@gmail.com', 0, 'IMG-6455b75045be90.63547309.png', 'false'),
(11, 'Secretary', '$2y$10$OBoQWVpwNXlS0qMaPJ18e.9xp10KjtrBjH6Z6MBRDo9tJ1k3Q32Du', 'Secretary', 'libertyjeremy23@gmail.com', 1, 'IMG-643d827b091268.29902057.jpeg', 'false'),
(12, 'sample', '$2y$10$CReGriHfvl0SZjPIgEq8LOcTzXKV3/pOaqiWae0VlPGEVxs2VUmlu', 'Assistant', 'sample123@gmail.com', 0, 'IMG-643917f0b7ab53.21250259.png', 'true'),
(15, 'Onlyoneforme', '$2y$10$NdupUFjqOITbRdWjFji5EOqRcQeHC5pHXvQOaZuBn5sTVRR1HNcZq', 'Assistant', 'ruelitopogi04@gmail.com', 1, 'IMG-6455b82875dac3.63801412.png', 'false'),
(16, 'Angelo', '$2y$10$zjI6FkluQdWL8vkKffhfhu2COl1YnSfIcoX3VxQRPEC86Ka7ybZBW', 'Secretary', 'egualadaangelo@gmail.com', 1, 'IMG-645bab09bd3a26.26855923.png', 'true'),
(17, 'Secretary2', '$2y$10$INWgZkG2eooNBsocdrunaOg5AqAfqhFusz6ShgzcOCvCbGm1IId62', 'Secretary', 'vann.oliveros@gmail.com', 1, NULL, 'true'),
(18, '123', '$2y$10$e1CuaN7hTUCI0VtWvcCXvOmGdDQO7g1jvyAb3tTWc58OXmEXPcv0u', 'Assistant', '232322wewewe@weww', 0, 'IMG-645bb441a74a00.79488171.png', 'true'),
(19, '567', '$2y$10$XpcNs6eNpKEqF.goO9IgTOTag9iKU7N17B/QNJvZZDDHNO4j8qyce', 'Assistant', '123213@23232', 0, 'IMG-645c2950851722.49482948.png', 'true'),
(20, 'Testing', '$2y$10$JsB5LNEdxXKcgN90jxF1F.9HSwNdxAKWQbpOCHx4T2VmMipiRAly6', 'Secretary', 'sadhfdshfhdsf@gmail.com', 0, 'IMG-645c6638641939.15471820.jpg', 'true'),
(21, 'Sampless', '$2y$10$X//hcUDKspjlEnbsqQU3VuLP0HV6JoyR0LEf4xIMDV/BMSkqbA.8q', 'Veterinarian', 'salingakristina@gmail.com', 1, NULL, 'false');

-- --------------------------------------------------------

--
-- Table structure for table `tblusertype`
--

DROP TABLE IF EXISTS `tblusertype`;
CREATE TABLE IF NOT EXISTS `tblusertype` (
  `utid` int NOT NULL AUTO_INCREMENT,
  `usertype` varchar(45) NOT NULL,
  PRIMARY KEY (`utid`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb3;

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
