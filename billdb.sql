-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 12, 2018 at 07:40 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `billdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(128) NOT NULL AUTO_INCREMENT,
  `fname` varchar(128) NOT NULL,
  `lname` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `fname`, `lname`, `username`, `password`) VALUES
(32, 'Andama', 'Henry', 'henry', 'rt'),
(37, 'Armando', 'Langido', 'loading', '93'),
(38, 'Mubiru', 'Denis', 'MDD', 'denis');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE IF NOT EXISTS `bill` (
  `bill_id` int(128) NOT NULL AUTO_INCREMENT,
  `ttl_electric` int(11) NOT NULL,
  `ttl_rental` int(11) NOT NULL,
  `ttl_water` int(11) NOT NULL,
  `date_issued` date NOT NULL,
  `tenant_id` int(128) NOT NULL,
  `room_id` int(11) NOT NULL,
  `issued_by` varchar(28) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`bill_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`bill_id`, `ttl_electric`, `ttl_rental`, `ttl_water`, `date_issued`, `tenant_id`, `room_id`, `issued_by`, `status`) VALUES
(22, 50, 1000, 0, '2015-03-15', 28, 20, 'waqas yaqoob', 1),
(23, 50, 1000, 1, '2015-03-15', 27, 20, 'waqas yaqoob', 1);

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE IF NOT EXISTS `discount` (
  `dis_id` int(11) NOT NULL AUTO_INCREMENT,
  `dis_prc` text NOT NULL,
  `dis_val` text NOT NULL,
  PRIMARY KEY (`dis_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`dis_id`, `dis_prc`, `dis_val`) VALUES
(1, '0%', '0'),
(2, '10%', '0.10'),
(3, '20%', '0.20'),
(4, '30%', '0.30'),
(5, '40%', '0.40'),
(6, '50%', '0.50'),
(7, '60%', '0.60'),
(8, '70%', '0.70'),
(9, '80%', '0.80'),
(10, '90%', '0.90'),
(11, '100%', '0.100');

-- --------------------------------------------------------

--
-- Table structure for table `electricity`
--

CREATE TABLE IF NOT EXISTS `electricity` (
  `electric_id` int(128) NOT NULL AUTO_INCREMENT,
  `amount` varchar(128) NOT NULL,
  `room_id` int(128) NOT NULL,
  `date_st` date NOT NULL,
  `date_end` date NOT NULL,
  PRIMARY KEY (`electric_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `electricity`
--

INSERT INTO `electricity` (`electric_id`, `amount`, `room_id`, `date_st`, `date_end`) VALUES
(1, '100', 20, '2015-03-12', '2015-03-16'),
(2, '200', 15, '2015-03-12', '2015-03-16');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE IF NOT EXISTS `room` (
  `room_id` int(128) NOT NULL AUTO_INCREMENT,
  `room_name` varchar(128) NOT NULL,
  `rental` varchar(128) NOT NULL,
  PRIMARY KEY (`room_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room_name`, `rental`) VALUES
(7, 'Senior 2', '1850'),
(8, 'Senior 3', '1700'),
(9, 'Senior 4', '2100'),
(14, 'Senior 5', '2000'),
(15, 'Senior 6', '2000'),
(21, 'Senior 1', '260000');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `tenant_id` int(128) NOT NULL AUTO_INCREMENT,
  `room_name` varchar(50) NOT NULL,
  `stream` varchar(25) NOT NULL,
  `gender` varchar(128) NOT NULL,
  `sno` varchar(50) NOT NULL,
  `fname` varchar(128) NOT NULL,
  `lname` varchar(128) NOT NULL,
  `photo` varchar(128) NOT NULL,
  `nname` varchar(255) NOT NULL,
  `age` text NOT NULL,
  `bdate` date NOT NULL,
  `address` varchar(128) NOT NULL,
  `contact` text NOT NULL,
  `water` varchar(128) NOT NULL,
  `date_registered` date NOT NULL,
  `dis_id` int(11) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`tenant_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`tenant_id`, `room_name`, `stream`, `gender`, `sno`, `fname`, `lname`, `photo`, `nname`, `age`, `bdate`, `address`, `contact`, `water`, `date_registered`, `dis_id`, `time_stamp`) VALUES
(33, 'Senior 2', '', 'Female', '201801071716391', 'kjxgkchd', 'mjxzhdgcfbjh', 'churchlogo.jpg', 'jhbgjxdgf', '56', '2018-02-07', 'cjshgbf', '5468465', '', '2018-02-07', 0, '0000-00-00 00:00:00'),
(34, 'Senior 2', 'A', 'Female', '201801071716403', 'hjghgsd', 'tfgyhknj', 'church logo.jpg', 'hgdsfgjhgdf', '56', '2018-02-07', 'hgfdsds', '654151416', '', '2018-02-07', 0, '0000-00-00 00:00:00'),
(35, 'Senior 2', 'A', 'Female', '201801071716403', 'hjghgsd', 'tfgyhknj', 'church logo.jpg', 'hgdsfgjhgdf', '56', '2018-02-07', 'hgfdsds', '654151416', '', '2018-02-07', 0, '0000-00-00 00:00:00'),
(36, 'Senior 2', 'A', 'Female', '201801071716403', 'hjghgsd', 'tfgyhknj', 'church logo.jpg', 'hgdsfgjhgdf', '56', '2018-02-07', 'hgfdsds', '654151416', '', '2018-02-07', 0, '0000-00-00 00:00:00'),
(40, 'Senior 6', 'A', '', '201801111053195', 'today', 'Sunday', '', 'Morning', '23', '2018-02-11', 'Mutundwe', '011121213121', '', '2018-02-11', 0, '0000-00-00 00:00:00'),
(41, 'Senior 1', 'A', 'Male', '201801111115253', 'sddcfdsfc', 'jtvhfbhgf', '', 'hjbhf', '50', '2018-02-11', 'dasdsad', '87187543', '', '2018-02-11', 0, '2018-02-11 12:49:08'),
(42, 'Senior 1', 'A', 'Male', '201801111549838', 'kato', 'richard', '', 'sembatya', '15', '2009-03-04', 'Mengo', '01115558954', '', '2018-02-11', 0, '2018-02-11 12:50:21'),
(43, 'Senior 1', 'A', 'Female', '201801111551527', 'kato', 'richard', '', 'sembatya', '15', '2009-03-04', 'Mengo', '01115558954', '', '2018-02-11', 0, '2018-02-11 12:51:10'),
(44, 'Senior 1', 'A', 'Female', '201801111551527', 'kato', 'richard', '', 'sembatya', '15', '2009-03-04', 'Mengo', '01115558954', '', '2018-02-11', 0, '2018-02-11 12:54:38'),
(45, 'Senior 1', 'A', 'Female', '201801111551527', 'kato', 'richard', '', 'sembatya', '15', '2009-03-04', 'Mengo', '01115558954', '', '2018-02-11', 0, '2018-02-11 12:55:00'),
(46, 'Senior 1', 'A', 'Female', '201801111551527', 'kato', 'richard', '', 'sembatya', '15', '2009-03-04', 'Mengo', '01115558954', '', '2018-02-11', 0, '2018-02-11 12:55:12'),
(47, 'Senior 1', 'B', 'Male', '201801111559401', 'kato', 'richard', '', 'sembatya', '15', '2009-03-04', 'Mengo', '01115558954', '', '2018-02-11', 0, '2018-02-11 12:59:24'),
(48, 'Senior 1', 'B', '', '201801111601281', 'kato', 'richard', '', 'sembatya', '15', '2009-03-04', 'Mengo', '01115558954', '', '2018-02-11', 0, '2018-02-11 13:02:03'),
(49, 'Senior 3', 'C', 'Female', '201801111609352', 'kjgjsgdfj', 'hgfbkcjbgj', '', 'gkjgdhbsjdf', '56', '1973-01-14', 'fghjlkkjnhbg', '458351', '', '2018-02-11', 0, '2018-02-11 13:10:10'),
(50, 'Senior 3', 'C', 'Male', '201801111615472', 'kjgjsgdfj', 'hgfbkcjbgj', '', 'gkjgdhbsjdf', '56', '1973-01-14', 'fghjlkkjnhbg', '458351', '', '2018-02-11', 0, '2018-02-11 13:15:41'),
(51, 'Senior 3', 'C', '', '201801111615921', 'kjgjsgdfj', 'hgfbkcjbgj', '', 'gkjgdhbsjdf', '56', '1973-01-14', 'fghjlkkjnhbg', '458351', '', '2018-02-11', 0, '2018-02-11 13:15:59'),
(52, 'Senior 3', 'C', '', '201801111619257', 'kjgjsgdfj', 'hgfbkcjbgj', '', 'gkjgdhbsjdf', '56', '1973-01-14', 'fghjlkkjnhbg', '458351', '', '2018-02-11', 0, '2018-02-11 13:19:09'),
(53, 'Senior 2', 'D', 'Male', '201801111624889', 'kamya', 'Henry', 'uploads/201801111624889.jpg', 'Peoples', '22', '1975-02-01', 'Kampala', '0774649404', '', '2018-02-11', 0, '2018-02-11 13:25:56'),
(54, 'Senior 2', 'East', 'Female', '201801111628423', 'people', 'popler', '201801111628423.jpg', 'poeples', '16', '1984-02-01', 'jijijij', '4513211321', '', '2018-02-11', 0, '2018-02-11 13:30:00'),
(55, 'Senior 2', 'sds', 'Female', '201801111644676', 'sdsd', 'sdsd', '201801111644676.jpg', 'sdsd', '89', '2018-02-11', 'sdsd', '6532', '', '2018-02-11', 0, '2018-02-11 13:45:03');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
