-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 07, 2014 at 12:11 PM
-- Server version: 5.5.16
-- PHP Version: 5.4.0beta2-dev

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `our_music`
--

-- --------------------------------------------------------

--
-- Table structure for table `music_catagory`
--

CREATE TABLE IF NOT EXISTS `music_catagory` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(32) NOT NULL,
  `c_sub` int(11) DEFAULT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `music_catagory`
--

INSERT INTO `music_catagory` (`cid`, `c_name`, `c_sub`) VALUES
(1, 'Bangla', 0),
(2, 'English', 0);

-- --------------------------------------------------------

--
-- Table structure for table `music_gener`
--

CREATE TABLE IF NOT EXISTS `music_gener` (
  `g_id` int(11) NOT NULL AUTO_INCREMENT,
  `g_name` varchar(64) NOT NULL,
  PRIMARY KEY (`g_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `music_gener`
--

INSERT INTO `music_gener` (`g_id`, `g_name`) VALUES
(1, 'Pop'),
(2, 'Rock');

-- --------------------------------------------------------

--
-- Table structure for table `music_login`
--

CREATE TABLE IF NOT EXISTS `music_login` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(64) NOT NULL,
  `Email` varchar(64) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `usertype` int(11) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `music_login`
--

INSERT INTO `music_login` (`uid`, `Name`, `Email`, `username`, `password`, `usertype`) VALUES
(12, 'a', 'a', 'a', 'a', NULL),
(14, 'v', 'v', 'v', 'v', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `music_table`
--

CREATE TABLE IF NOT EXISTS `music_table` (
  `mid` int(11) NOT NULL AUTO_INCREMENT,
  `m_title` varchar(32) NOT NULL,
  `cat_id` int(32) NOT NULL,
  `artist` varchar(64) NOT NULL,
  `path` varchar(256) NOT NULL,
  `album` varchar(64) NOT NULL,
  `year` year(4) NOT NULL,
  `gener_id` int(11) NOT NULL,
  `length` time NOT NULL,
  `bitrate` varchar(64) NOT NULL,
  `image` varchar(256) NOT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
