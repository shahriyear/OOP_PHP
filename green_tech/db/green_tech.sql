-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 13, 2014 at 03:20 PM
-- Server version: 5.5.16
-- PHP Version: 5.4.0beta2-dev

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `green_tech`
--

-- --------------------------------------------------------

--
-- Table structure for table `buy`
--

CREATE TABLE IF NOT EXISTS `buy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Date` date NOT NULL,
  `Detils` varchar(256) NOT NULL,
  `Money` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `buy`
--

INSERT INTO `buy` (`id`, `Date`, `Detils`, `Money`) VALUES
(6, '2014-06-02', 'F Rahman Press', 5000),
(7, '2014-06-02', 'F Rahman Press (Make Book)', 33),
(8, '2014-06-02', 'Health Safety ', 10),
(9, '2014-06-02', 'Water and waste water treatment', 25000),
(10, '2014-06-02', 'Environment Microbiology', 23000),
(12, '2014-06-02', 'F. Rahman Press', 6000),
(13, '2014-06-02', 'F. Rahman Press', 20000),
(15, '2014-06-02', 'Sonia Watch House', 210),
(16, '2014-06-02', 'Model Paper and Stationery', 415),
(17, '2014-06-02', 'F Rahman Press (Make book)', 21000),
(18, '2014-06-02', 'Surdarban Express Transporation System Ltd. (SETS)', 80),
(19, '2014-06-02', 'Surdarban Express Transporation System Ltd. (SETS) Student Laibery', 80),
(20, '2014-06-02', 'Surdarban Express Transporation System Ltd. (SETS)- Beplop Kumar Das', 80),
(22, '2014-06-02', 'Surdarban Express Transporation System Ltd. (SETS) - Karigory Boi Betan', 80),
(23, '2014-06-02', 'Surdarban Express Transporation System Ltd. (SETS) - Anup Kumar Nag', 10),
(24, '2014-06-02', 'Kartoa Courier - Salauddin', 100),
(25, '2014-06-02', 'Environmental Hydrology and Water Resource Engeneearing ', 19885),
(26, '2014-06-02', 'Karatoa Courier - Marjiya Aktar', 80),
(27, '2014-06-02', 'Karatoa Courier - Salauddin', 80),
(28, '2014-06-02', 'Surdarban Express Transporation System Ltd. (SETS) - Saiful ', 10),
(29, '2014-06-02', 'Surdarban Express Transporation System Ltd. (SETS) - Taifur', 10),
(30, '2014-06-02', 'Surdarban Express Transporation System Ltd. (SETS)- Student laibery', 80),
(31, '2014-06-02', 'Surdarban Express Transporation System Ltd. (SETS)- Mahbubul hak', 80),
(32, '2014-06-02', 'Surdarban Express Transporation System Ltd. (SETS)- Samsujjohan', 80),
(33, '2014-06-02', 'Karigory Boi betan', 60),
(34, '2014-06-02', 'Surdarban Express Transporation System Ltd. (SETS)- Beplop Kumar', 80),
(35, '2014-06-02', 'Surdarban Express Transporation System Ltd. (SETS)- Nurzahan laibery', 80),
(36, '2014-06-02', 'Surdarban Express Transporation System Ltd. (SETS)- Vai Vai laibery', 80),
(37, '2014-06-02', 'Mondol tradars', 195),
(38, '2014-06-02', 'S.A Paribahan', 30),
(39, '2014-06-02', 'Something+ F Rahman Press', 11410),
(40, '2014-06-02', 'EIA', 21000),
(42, '2014-06-02', 'Surdarban Express Transporation and Other Transporation ', 4280);

-- --------------------------------------------------------

--
-- Table structure for table `con_det`
--

CREATE TABLE IF NOT EXISTS `con_det` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `con_det`
--

INSERT INTO `con_det` (`id`, `name`) VALUES
(1, 'laibery'),
(4, 'Publiser'),
(5, 'Laiberyean'),
(6, 'Writer');

-- --------------------------------------------------------

--
-- Table structure for table `con_info`
--

CREATE TABLE IF NOT EXISTS `con_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `adress` varchar(256) NOT NULL,
  `option` varchar(256) NOT NULL,
  `other1` varchar(256) NOT NULL,
  `other2` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `con_info`
--

INSERT INTO `con_info` (`id`, `sub_id`, `name`, `phone`, `adress`, `option`, `other1`, `other2`) VALUES
(1, 1, 'aaaa', '112', 'fff', '', '', ''),
(5, 4, 'ww', 'w', 'w', '', '', ''),
(6, 6, 'Siam', '01749798295', 'Naogaon', '', '', ''),
(7, 4, 'Niamul', '01784122333', 'Joypurhat', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `detils`
--

CREATE TABLE IF NOT EXISTS `detils` (
  `d_Id` int(11) NOT NULL AUTO_INCREMENT,
  `d_info` varchar(520) NOT NULL,
  PRIMARY KEY (`d_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `detils`
--

INSERT INTO `detils` (`d_Id`, `d_info`) VALUES
(1, 'Kishore Library'),
(22, 'Nurjahan Library'),
(23, 'Karigori Boi Bitan'),
(24, 'Mst. Marzia Akter'),
(25, 'Mobile Plaza'),
(26, 'Student Library'),
(27, 'Biplob Kumar Das'),
(28, 'Mahbubul Haque'),
(29, 'Vai Vai Library'),
(30, 'Ideal Library'),
(31, 'Samsuzoha Sahin');

-- --------------------------------------------------------

--
-- Table structure for table `gt_book`
--

CREATE TABLE IF NOT EXISTS `gt_book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `sub_code` varchar(10) NOT NULL,
  `total_book` int(11) NOT NULL,
  `current_bok` int(11) NOT NULL,
  `extra` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `gt_book`
--

INSERT INTO `gt_book` (`id`, `name`, `sub_code`, `total_book`, `current_bok`, `extra`) VALUES
(1, 'Water and Wastewater Treatment', '9051', 800, 780, '20'),
(2, 'Heallth, Safety and Environment', '9052', 800, 780, '20'),
(3, 'Environmental Microbiology', '9053', 800, 780, '20'),
(4, 'Solid Waste Management', '9072', 800, 780, '20'),
(5, 'EIA', '9071', 800, 780, '20'),
(6, 'Environmental Hydrology and Water Resources Engineering', '9076', 800, 780, '20'),
(7, 'Disaster Management', '9075', 800, 780, '20'),
(8, 'Environmental Chemistry', '9042', 800, 780, '20');

-- --------------------------------------------------------

--
-- Table structure for table `stock_book`
--

CREATE TABLE IF NOT EXISTS `stock_book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NOT NULL,
  `total_book` int(11) NOT NULL,
  `current_book` int(11) NOT NULL,
  `free_copy` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tranction`
--

CREATE TABLE IF NOT EXISTS `tranction` (
  `T_id` int(11) NOT NULL AUTO_INCREMENT,
  `Date` date NOT NULL,
  `Detils` varchar(520) NOT NULL,
  `D_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `sub_name` varchar(256) NOT NULL,
  `sub_code` varchar(256) NOT NULL,
  `Item_amount` float NOT NULL,
  `Refund_amount` int(11) NOT NULL,
  `Total_I_amount` int(11) NOT NULL,
  `Item_rate` float NOT NULL,
  `Total_money` float NOT NULL,
  `Paid_money` float NOT NULL,
  `Due_money` float NOT NULL,
  PRIMARY KEY (`T_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=85 ;

--
-- Dumping data for table `tranction`
--

INSERT INTO `tranction` (`T_id`, `Date`, `Detils`, `D_id`, `sub_id`, `sub_name`, `sub_code`, `Item_amount`, `Refund_amount`, `Total_I_amount`, `Item_rate`, `Total_money`, `Paid_money`, `Due_money`) VALUES
(1, '2014-05-31', 'Kishore Library', 1, 1, 'Water and Wastewater Treatment', '9051', 5, 0, 5, 107, 535, 0, 535),
(2, '2014-06-01', 'Kishore Library', 1, 2, 'Heallth, Safety and Environment', '9052', 20, 0, 20, 84, 1680, 0, 1680),
(3, '2014-06-01', 'Kishore Library', 1, 3, 'Environmental Microbiology', '9053', 10, 0, 10, 97, 970, 0, 970),
(4, '2014-06-01', 'Nurjahan Library', 22, 1, 'Water and Wastewater Treatment', '9051', 5, 0, 5, 107, 535, 0, 535),
(5, '2014-06-01', 'Nurjahan Library', 22, 2, 'Heallth, Safety and Environment', '9052', 20, 0, 20, 84, 1680, 0, 1680),
(6, '2014-06-01', 'Nurjahan Library', 22, 3, 'Environmental Microbiology', '9053', 20, 0, 20, 97, 1940, 0, 1940),
(7, '2014-06-01', 'Karigori Boi Bitan', 23, 1, 'Water and Wastewater Treatment', '9051', 10, 0, 10, 107, 1070, 0, 1070),
(8, '2014-06-01', 'Karigori Boi Bitan', 23, 2, 'Heallth, Safety and Environment', '9052', 20, 0, 20, 84, 1680, 0, 1680),
(9, '2014-06-01', 'Karigori Boi Bitan', 23, 3, 'Environmental Microbiology', '9053', 20, 0, 20, 97, 1940, 0, 1940),
(10, '2014-06-01', 'Mst. Marzia Akter', 24, 2, 'Heallth, Safety and Environment', '9052', 4, 0, 4, 84, 336, 0, 336),
(11, '2014-06-01', 'Mst. Marzia Akter', 24, 1, 'Water and Wastewater Treatment', '9051', 50, 0, 50, 107, 5350, 0, 5350),
(12, '2014-06-01', 'Mst. Marzia Akter', 24, 3, 'Environmental Microbiology', '9053', 50, 0, 50, 97, 4850, 0, 4850),
(13, '2014-06-01', 'Mobile Plaza', 25, 3, 'Environmental Microbiology', '9053', 3, 0, 3, 97, 291, 0, 291),
(14, '2014-06-01', 'Mobile Plaza', 25, 2, 'Heallth, Safety and Environment', '9052', 20, 0, 20, 84, 1680, 0, 1680),
(15, '2014-06-01', 'Mobile Plaza', 25, 2, 'Heallth, Safety and Environment', '9052', 20, 0, 20, 84, 1680, 0, 1680),
(16, '2014-06-01', 'Mobile Plaza', 25, 2, 'Heallth, Safety and Environment', '9052', 50, 0, 50, 84, 4200, 0, 4200),
(17, '2014-06-01', 'Kishore Library', 1, 4, 'Solid Waste Management', '9072', 20, 0, 20, 117, 2340, 0, 2340),
(18, '2014-06-01', 'Mobile Plaza', 25, 4, 'Solid Waste Management', '9072', 50, 0, 50, 117, 5850, 0, 5850),
(19, '2014-06-01', 'Mst. Marzia Akter', 24, 4, 'Solid Waste Management', '9072', 60, 0, 60, 117, 7020, 0, 7020),
(20, '2014-06-01', 'Karigori Boi Bitan', 23, 4, 'Solid Waste Management', '9072', 70, 0, 70, 117, 8190, 0, 8190),
(21, '2014-06-01', 'Biplob Kumar Das', 27, 4, 'Solid Waste Management', '9072', 50, 0, 50, 117, 5850, 0, 5850),
(22, '2014-06-01', 'Mahbubul Haque', 28, 4, 'Solid Waste Management', '9072', 50, 0, 50, 117, 5850, 0, 5850),
(23, '2014-06-01', 'Student Library', 26, 4, 'Solid Waste Management', '9072', 50, 0, 50, 117, 5850, 0, 5850),
(24, '2014-06-01', 'Nurjahan Library', 22, 4, 'Solid Waste Management', '9072', 50, 0, 50, 117, 5850, 0, 5850),
(25, '2014-06-01', 'Vai Vai Library', 29, 4, 'Solid Waste Management', '9072', 20, 0, 20, 117, 2340, 0, 2340),
(26, '2014-06-01', 'Mahbubul Haque', 28, 3, 'Environmental Microbiology', '9053', 10, 0, 10, 97, 970, 0, 970),
(27, '2014-06-01', 'Mahbubul Haque', 28, 2, 'Heallth, Safety and Environment', '9052', 16, 0, 16, 84, 1344, 0, 1344),
(28, '2014-06-01', 'Ideal Library', 30, 4, 'Solid Waste Management', '9072', 20, 0, 20, 117, 2340, 0, 2340),
(29, '2014-06-01', 'Samsuzoha Sahin', 31, 4, 'Solid Waste Management', '9072', 50, 0, 50, 117, 5850, 0, 5850),
(30, '2014-06-01', 'Vai Vai Library', 29, 4, 'Solid Waste Management', '9072', 50, 0, 50, 117, 5850, 0, 5850),
(31, '2014-06-01', 'Kishore Library', 1, 4, 'Solid Waste Management', '9072', 40, 0, 40, 117, 4680, 0, 4680),
(32, '2014-06-01', 'Nurjahan Library', 22, 2, 'Heallth, Safety and Environment', '9052', 30, 0, 30, 84, 2520, 0, 2520),
(33, '2014-06-01', 'Karigori Boi Bitan', 23, 2, 'Heallth, Safety and Environment', '9052', 30, 0, 30, 84, 2520, 0, 2520),
(34, '2014-06-01', 'Ideal Library', 30, 2, 'Heallth, Safety and Environment', '9052', 30, 0, 30, 84, 2520, 0, 2520),
(35, '2014-06-01', 'Biplob Kumar Das', 27, 2, 'Heallth, Safety and Environment', '9052', 50, 0, 50, 84, 4200, 0, 4200),
(36, '2014-06-01', 'Mahbubul Haque', 28, 2, 'Heallth, Safety and Environment', '9052', 50, 0, 50, 84, 4200, 0, 4200),
(37, '2014-06-01', 'Vai Vai Library', 29, 2, 'Heallth, Safety and Environment', '9052', 50, 0, 50, 84, 4200, 0, 4200),
(38, '2014-06-01', 'Samsuzoha Sahin', 31, 2, 'Heallth, Safety and Environment', '9052', 50, 0, 50, 84, 4200, 0, 4200),
(39, '2014-06-01', 'Kishore Library', 1, 2, 'Heallth, Safety and Environment', '9052', 40, 0, 40, 84, 3360, 0, 3360),
(40, '2014-06-01', 'Nurjahan Library', 22, 1, 'Water and Wastewater Treatment', '9051', 50, 0, 50, 107, 5350, 0, 5350),
(41, '2014-06-01', 'Karigori Boi Bitan', 23, 1, 'Water and Wastewater Treatment', '9051', 40, 0, 40, 107, 4280, 0, 4280),
(42, '2014-06-01', 'Mst. Marzia Akter', 24, 1, 'Water and Wastewater Treatment', '9051', 60, 0, 60, 107, 6420, 0, 6420),
(43, '2014-06-01', 'Mobile Plaza', 25, 1, 'Water and Wastewater Treatment', '9051', 30, 0, 30, 107, 3210, 0, 3210),
(44, '2014-06-01', 'Biplob Kumar Das', 27, 1, 'Water and Wastewater Treatment', '9051', 50, 0, 50, 107, 5350, 0, 5350),
(45, '2014-06-01', 'Mahbubul Haque', 28, 1, 'Water and Wastewater Treatment', '9051', 50, 0, 50, 107, 5350, 0, 5350),
(46, '2014-06-01', 'Vai Vai Library', 29, 1, 'Water and Wastewater Treatment', '9051', 50, 0, 50, 107, 5350, 0, 5350),
(47, '2014-06-01', 'Samsuzoha Sahin', 31, 1, 'Water and Wastewater Treatment', '9051', 50, 0, 50, 107, 5350, 0, 5350),
(48, '2014-06-01', 'Nurjahan Library', 22, 3, 'Environmental Microbiology', '9053', 50, 0, 50, 117, 5850, 0, 5850),
(49, '2014-06-01', 'Karigori Boi Bitan', 23, 3, 'Environmental Microbiology', '9053', 40, 0, 40, 117, 4680, 0, 4680),
(50, '2014-06-01', 'Mst. Marzia Akter', 24, 3, 'Environmental Microbiology', '9053', 20, 0, 20, 117, 2340, 0, 2340),
(51, '2014-06-01', 'Mobile Plaza', 25, 3, 'Environmental Microbiology', '9053', 20, 0, 20, 117, 2340, 0, 2340),
(52, '2014-06-01', 'Student Library', 26, 3, 'Environmental Microbiology', '9053', 40, 0, 40, 117, 4680, 0, 4680),
(53, '2014-06-01', 'Biplob Kumar Das', 27, 3, 'Environmental Microbiology', '9053', 50, 0, 50, 117, 5850, 0, 5850),
(54, '2014-06-01', 'Mahbubul Haque', 28, 3, 'Environmental Microbiology', '9053', 40, 0, 40, 117, 4680, 0, 4680),
(55, '2014-06-01', 'Vai Vai Library', 29, 3, 'Environmental Microbiology', '9053', 60, 0, 60, 117, 7020, 0, 7020),
(56, '2014-06-01', 'Samsuzoha Sahin', 31, 3, 'Environmental Microbiology', '9053', 50, 0, 50, 117, 5850, 0, 5850),
(57, '2014-06-01', 'Ideal Library', 30, 3, 'Environmental Microbiology', '9053', 20, 0, 20, 117, 2340, 0, 2340),
(58, '2014-06-01', 'Kishore Library', 1, 1, 'Water and Wastewater Treatment', '9051', 40, 0, 40, 107, 4280, 0, 4280),
(59, '2014-06-01', 'Kishore Library', 1, 3, 'Environmental Microbiology', '9053', 40, 0, 40, 117, 4680, 0, 4680),
(60, '2014-06-01', 'Samsuzoha Sahin', 31, 5, 'EIA', '9071', 20, 0, 20, 110, 2200, 0, 2200),
(61, '2014-06-01', 'Vai Vai Library', 29, 5, 'EIA', '9071', 20, 0, 20, 110, 2200, 0, 2200),
(62, '2014-06-01', 'Student Library', 26, 5, 'EIA', '9071', 20, 0, 20, 110, 2200, 0, 2200),
(63, '2014-06-01', 'Mahbubul Haque', 28, 5, 'EIA', '9071', 20, 0, 20, 110, 2200, 0, 2200),
(64, '2014-06-01', 'Nurjahan Library', 22, 5, 'EIA', '9071', 20, 0, 20, 110, 2200, 0, 2200),
(65, '2014-06-01', 'Mst. Marzia Akter', 24, 5, 'EIA', '9071', 40, 0, 40, 110, 4400, 0, 4400),
(66, '2014-06-01', 'Mobile Plaza', 25, 5, 'EIA', '9071', 25, 0, 25, 110, 2750, 0, 2750),
(67, '2014-06-01', 'Biplob Kumar Das', 27, 5, 'EIA', '9071', 30, 0, 30, 110, 3300, 0, 3300),
(68, '2014-06-01', 'Karigori Boi Bitan', 23, 5, 'EIA', '9071', 20, 0, 20, 110, 2200, 0, 2200),
(69, '2014-06-01', 'Kishore Library', 1, 5, 'EIA', '9071', 30, 0, 30, 110, 3300, 0, 3300),
(70, '2014-06-01', 'Biplob Kumar Das', 27, 6, 'Environmental Hydrology and Water Resources Engineering', '9076', 40, 0, 40, 130, 5200, 0, 5200),
(71, '2014-06-01', 'Nurjahan Library', 22, 6, 'Environmental Hydrology and Water Resources Engineering', '9076', 30, 0, 30, 130, 3900, 0, 3900),
(72, '2014-06-01', 'Samsuzoha Sahin', 31, 6, 'Environmental Hydrology and Water Resources Engineering', '9076', 40, 0, 40, 130, 5200, 4000, 1200),
(73, '2014-06-01', 'Student Library', 26, 6, 'Environmental Hydrology and Water Resources Engineering', '9076', 30, 0, 30, 130, 3900, 0, 3900),
(74, '2014-06-01', 'Vai Vai Library', 29, 6, 'Environmental Hydrology and Water Resources Engineering', '9076', 40, 0, 40, 130, 5200, 0, 5200),
(75, '2014-06-01', 'Karigori Boi Bitan', 23, 6, 'Environmental Hydrology and Water Resources Engineering', '9076', 30, 0, 30, 130, 3900, 5000, -1100),
(76, '2014-06-01', 'Mst. Marzia Akter', 24, 6, 'Environmental Hydrology and Water Resources Engineering', '9076', 50, 0, 50, 130, 6500, 31000, -24500),
(77, '2014-06-01', 'Mahbubul Haque', 28, 6, 'Environmental Hydrology and Water Resources Engineering', '9076', 50, 0, 50, 130, 6500, 0, 6500),
(78, '2014-06-01', 'Mobile Plaza', 25, 6, 'Environmental Hydrology and Water Resources Engineering', '9076', 30, 0, 30, 130, 3900, 0, 3900),
(79, '2014-06-01', 'Kishore Library', 1, 6, 'Environmental Hydrology and Water Resources Engineering', '9076', 30, 0, 30, 130, 3900, 0, 3900),
(80, '2014-06-01', 'Mobile Plaza', 25, 6, 'Environmental Hydrology and Water Resources Engineering', '9076', 4, 0, 4, 130, 520, 10000, -9480),
(81, '2014-06-01', 'Nurjahan Library', 22, 6, 'Environmental Hydrology and Water Resources Engineering', '9076', 20, 0, 20, 130, 2600, 0, 2600),
(82, '2014-06-01', 'Student Library', 26, 6, 'Environmental Hydrology and Water Resources Engineering', '9076', 20, 0, 20, 130, 2600, 0, 2600),
(83, '2014-06-01', 'Biplob Kumar Das', 27, 6, 'Environmental Hydrology and Water Resources Engineering', '9076', 10, 0, 10, 130, 1300, 12300, -11000),
(84, '2014-06-01', 'Karigori Boi Bitan', 23, 6, 'Environmental Hydrology and Water Resources Engineering', '9076', 30, 0, 30, 130, 3900, 0, 3900);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `u_name` varchar(64) NOT NULL,
  `pass` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `u_name`, `pass`) VALUES
(6, 'Nazmul Hannan', 'GreenTech', 'greentech'),
(7, 'a', 'a', 'a');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
