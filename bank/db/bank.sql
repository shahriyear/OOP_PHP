-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 18, 2014 at 03:40 PM
-- Server version: 5.5.16
-- PHP Version: 5.4.0beta2-dev

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `ammountcl`
--

CREATE TABLE IF NOT EXISTS `ammountcl` (
  `tid` int(11) NOT NULL,
  `amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `brance`
--

CREATE TABLE IF NOT EXISTS `brance` (
  `bid` int(11) NOT NULL AUTO_INCREMENT,
  `bname` varchar(64) NOT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=100 ;

--
-- Dumping data for table `brance`
--

INSERT INTO `brance` (`bid`, `bname`) VALUES
(1, 'Naogaon'),
(2, 'Bogra'),
(3, 'Rajshahi'),
(4, 'Dhaka'),
(7, 'khulna'),
(55, 'Joypurhat'),
(97, 'Josohor'),
(98, 'Sylet'),
(99, 'Rangpur');

-- --------------------------------------------------------

--
-- Table structure for table `notifiction`
--

CREATE TABLE IF NOT EXISTS `notifiction` (
  `nid` int(11) NOT NULL AUTO_INCREMENT,
  `n_text` varchar(64) NOT NULL,
  `t_id` int(11) NOT NULL,
  `status` enum('Read','UnRead') NOT NULL,
  `uid` int(11) NOT NULL,
  PRIMARY KEY (`nid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `notifiction`
--

INSERT INTO `notifiction` (`nid`, `n_text`, `t_id`, `status`, `uid`) VALUES
(1, 'There is a money order pending, Sending from Dhaka', 19, 'UnRead', 0),
(2, 'There is a money order pending, Sending from Naogaon', 20, 'UnRead', 0),
(3, 'There is a money order pending, Sending from Dhaka', 21, 'UnRead', 0),
(4, 'There is a money order pending, Sending from Dhaka', 22, 'UnRead', 0),
(7, 'There is a money order pending. Sending from Joypurhat', 25, 'UnRead', 0),
(8, 'your transection id <a href="detail.php?cmd=tran&id=14">\r\n					1', 14, 'UnRead', 0),
(9, 'Complete your Transection!!', 14, 'UnRead', 0),
(10, 'your transection id <a href="detail.php?cmd=tran&id=14">\r\n					1', 14, 'UnRead', 0),
(11, 'Complete your Transection!!', 14, 'UnRead', 0),
(12, 'your transection id <a href="detail.php?cmd=tran&id=14">\r\n					1', 14, 'UnRead', 0),
(13, 'Complete your Transection!!', 14, 'UnRead', 0),
(14, 'your transection id <a href="detail.php?cmd=tran&id=14">\r\n					1', 14, 'UnRead', 0),
(15, 'Complete your Transection!!', 14, 'UnRead', 0),
(16, 'Complete your Transection!!', 12, 'UnRead', 0),
(17, 'There is a money order pending. Sending from  Branch', 26, 'UnRead', 0),
(18, 'There is a money order pending. Sending from Rajshahi Branch', 27, 'UnRead', 0),
(19, 'Complete your Transection!!', 27, 'UnRead', 0),
(20, 'your transection id <a href="detail.php?cmd=tran&id=26">\r\n					2', 26, 'UnRead', 0),
(21, 'your transection id <a href="detail.php?cmd=tran&id=27">\r\n					2', 27, 'UnRead', 0),
(22, 'Complete your Transection!!', 27, 'UnRead', 0),
(23, 'Complete your Transection!!', 26, 'UnRead', 0),
(24, 'Complete your Transection!!', 25, 'UnRead', 0),
(25, 'There is a money order pending. Sending from Naogaon Branch', 28, 'Read', 7),
(26, 'your transection id 28 is Completed!!', 28, 'Read', 1),
(27, 'There is a money order pending. Sending from Naogaon Branch', 29, 'Read', 1),
(28, 'There is a money order pending. Sending from Dhaka Branch', 30, 'Read', 1),
(29, 'There is a money order pending. Sending from Naogaon Branch', 31, 'Read', 7),
(30, 'There is a money order pending. Sending from Dhaka Branch', 32, 'Read', 1),
(31, 'your transection id 32 is Completed!!', 32, 'Read', 7),
(32, 'your transection id 31 is Reject!!', 31, 'Read', 1),
(33, 'There is a money order pending. Sending from Naogaon Branch', 33, 'Read', 7),
(34, 'There is a money order pending. Sending from Naogaon Branch', 34, 'Read', 7),
(35, 'your transection id 34 is Completed!!', 34, 'Read', 1),
(36, 'your transection id 33 is Reject!!', 33, 'Read', 1),
(37, 'There is a money order pending. Sending from Naogaon Branch', 35, 'Read', 6),
(38, 'your transection id 30 is Completed!!', 30, 'Read', 7),
(39, 'your transection id 20 is Completed!!', 20, 'Read', 1),
(40, 'your transection id 17 is Completed!!', 17, 'Read', 1),
(41, 'your transection id 33 is Completed!!', 33, 'Read', 1),
(42, 'your transection id 31 is Completed!!', 31, 'Read', 1),
(43, 'There is a money order pending. Sending from Dhaka Branch', 36, 'Read', 1),
(44, 'There is a money order pending. Sending from Rajshahi Branch', 37, 'Read', 1),
(45, 'There is a money order pending. Sending from Rajshahi Branch', 38, 'Read', 1),
(46, 'There is a money order pending. Sending from Joypurhat Branch', 39, 'Read', 1),
(47, 'There is a money order pending. Sending from Joypurhat Branch', 40, 'Read', 1),
(48, 'your transection id 40 is Completed!!', 40, 'Read', 8),
(49, 'your transection id 39 is Completed!!', 39, 'Read', 8),
(50, 'your transection id 38 is Completed!!', 38, 'Read', 6),
(51, 'your transection id 37 is Completed!!', 37, 'Read', 6),
(52, 'your transection id 36 is Completed!!', 36, 'Read', 7),
(53, 'There is a money order pending. Sending from Dhaka Branch', 41, 'Read', 1),
(54, 'your transection id 41 is Completed!!', 41, 'Read', 7),
(55, 'There is a money order pending. Sending from Rajshahi Branch', 42, 'Read', 8),
(56, 'your transection id 42 is Completed!!', 42, 'Read', 6);

-- --------------------------------------------------------

--
-- Table structure for table `transction`
--

CREATE TABLE IF NOT EXISTS `transction` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `sname` varchar(64) NOT NULL,
  `sphone` int(13) NOT NULL,
  `rname` varchar(64) NOT NULL,
  `rphone` int(13) NOT NULL,
  `trtime` time NOT NULL,
  `trdate` date NOT NULL,
  `sbr_id` int(11) NOT NULL,
  `rbr_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `ammount` double NOT NULL,
  `clearance` enum('YES','NO','Reject') NOT NULL,
  `comments` varchar(256) NOT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `transction`
--

INSERT INTO `transction` (`tid`, `sname`, `sphone`, `rname`, `rphone`, `trtime`, `trdate`, `sbr_id`, `rbr_id`, `uid`, `ammount`, `clearance`, `comments`) VALUES
(1, 'siam', 1749798295, 'shahriyear', 1913858767, '21:32:17', '2013-12-19', 7, 1, 1, 5000, 'YES', ''),
(2, 'siam', 1749798295, 'shahriyear', 1913858767, '21:35:18', '2013-12-19', 3, 1, 1, 5000, 'YES', ''),
(3, '', 0, '', 0, '21:51:38', '2013-12-19', 99, 1, 1, 5000, 'YES', ''),
(4, '', 0, '', 0, '21:51:45', '2013-12-19', 98, 1, 1, 5000, 'YES', ''),
(5, '', 0, '', 0, '21:52:15', '2013-12-19', 99, 1, 6, 5000, 'YES', ''),
(6, '', 0, '', 0, '21:53:35', '2013-12-19', 2, 1, 6, 5000, 'YES', ''),
(7, '', 0, '', 0, '23:03:56', '2013-12-19', 3, 1, 5, 5000, 'YES', ''),
(8, '', 0, '', 0, '23:17:51', '2013-12-19', 3, 1, 6, 5000, 'YES', ''),
(9, '', 0, '', 0, '23:25:53', '2013-12-19', 7, 1, 6, 5000, 'YES', ''),
(10, '', 0, '', 0, '23:26:21', '2013-12-19', 2, 1, 6, 5000, 'YES', ''),
(11, '', 0, '', 0, '01:00:21', '2013-12-20', 99, 1, 5, 5000, 'YES', ''),
(12, '', 0, '', 0, '12:38:38', '2013-12-20', 3, 1, 5, 5000, 'YES', ''),
(13, '', 0, '', 0, '14:54:36', '2013-12-20', 7, 1, 5, 5000, 'YES', ''),
(14, '', 0, '', 0, '14:56:41', '2013-12-20', 7, 1, 1, 5000, 'YES', ''),
(15, 'd', 2147483647, 'f', 2147483647, '15:39:24', '2013-12-21', 1, 2, 6, 5000, 'YES', ''),
(16, 'abc', 2147483647, 'cba', 2147483647, '15:57:47', '2013-12-21', 4, 97, 7, 5000, 'YES', ''),
(17, 'Asad', 123456789, 'Hafij', 123456789, '16:10:13', '2013-12-21', 1, 4, 1, 5000, 'YES', ''),
(18, 'ass', 2147483647, 'hh', 2147483647, '17:31:22', '2013-12-21', 4, 98, 7, 5000, 'YES', ''),
(19, 'ass', 2147483647, 'hh', 2147483647, '17:32:11', '2013-12-21', 4, 98, 7, 5000, 'YES', ''),
(20, 'asjd aksd', 2345678, 'askljd s d', 2378, '18:07:19', '2013-12-21', 1, 4, 1, 5000, 'YES', ''),
(21, '', 0, '', 0, '20:05:19', '2013-12-21', 7, 1, 7, 5000, 'YES', ''),
(22, '', 0, '', 0, '20:05:32', '2013-12-21', 4, 7, 7, 5000, 'YES', ''),
(23, 'QQQ', 123, 'WWW', 321, '23:44:00', '2013-12-21', 1, 55, 1, 5000, 'YES', ''),
(24, '', 0, '', 0, '23:46:13', '2013-12-21', 1, 55, 1, 5000, 'YES', ''),
(25, 'z', 0, 'z', 0, '00:27:47', '2013-12-22', 7, 1, 8, 5000, 'YES', ''),
(26, 'gggggg', 2147483647, 'vvvvvvvvvvvvvvvvvvv555', 2147483647, '17:30:36', '2014-01-04', 1, 3, 12, 5000, 'YES', 'sffsfsf'),
(27, 'gggggg', 2222222, 'FFFFFFFFFFFF', 2147483647, '17:32:12', '2014-01-04', 3, 1, 6, 5000, 'YES', ''),
(28, 'gggggggggggg', 2147483647, 'ttttttttttttt', 2147483647, '16:51:39', '2014-01-05', 1, 4, 1, 5000, 'YES', ''),
(29, 'qqqqqqqqqq', 2147483647, 'rrrrrrr', 2147483647, '17:12:12', '2014-01-05', 7, 1, 1, 5000, 'YES', ''),
(30, 'llllllll', 88888888, 'oooooo', 9999999, '17:35:20', '2014-01-05', 7, 1, 7, 5000, 'YES', ''),
(31, 'aaaaaaa', 2222222, 'dddddddd', 444444444, '17:38:54', '2014-01-05', 1, 4, 1, 5000, 'YES', ''),
(32, 'anisur', 17, 'rahman', 19, '13:46:30', '2014-01-06', 7, 1, 7, 5000, 'YES', 'its ok!'),
(33, 'kkkkkk', 5555, 'pppp', 6666, '13:53:29', '2014-01-06', 1, 4, 1, 5000, 'YES', ''),
(34, 'kkkkkk', 5555, 'pppp', 6666, '13:55:18', '2014-01-06', 1, 4, 1, 5000, 'YES', 'okkkkkkkkkkk! done!\r\n'),
(35, 'asdfa', 0, 'jhnb', 0, '14:06:33', '2014-01-06', 1, 3, 1, 5000, 'YES', ''),
(36, 'asd', 123, 'www', 1111, '17:46:54', '2014-01-06', 4, 1, 7, 4000, 'YES', ''),
(37, 'ii', 0, 'kk', 0, '17:47:47', '2014-01-06', 3, 1, 6, 2000, 'YES', ''),
(38, 'jj', 88, 'jjj', 99, '17:48:01', '2014-01-06', 3, 1, 6, 100000, 'YES', ''),
(39, 'tyty', 8787878, 'gygyy', 98989, '17:48:33', '2014-01-06', 55, 1, 8, 6000, 'YES', ''),
(40, 'susu', 4848488, 'ururur', 9393939, '17:48:53', '2014-01-06', 55, 1, 8, 70000, 'YES', ''),
(41, 'Anisur', 2147483647, 'Melon', 199999999, '16:11:45', '2014-01-11', 4, 1, 7, 1000, 'YES', ''),
(42, 'ss', 22, 'rr', 55, '16:30:17', '2014-01-11', 3, 55, 6, 66666, 'YES', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `uname` varchar(64) NOT NULL,
  `pass` varchar(64) NOT NULL,
  `bid` int(11) NOT NULL,
  `utype` int(11) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `name`, `uname`, `pass`, `bid`, `utype`) VALUES
(1, 'Siam', 'siam', '1234', 1, NULL),
(6, 'a', 'a', 'a', 3, NULL),
(7, 'kamal hasan', 'hasan', '12345', 4, NULL),
(8, 'Joy', 'Joy', '1234', 55, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
