-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 11, 2019 at 04:05 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `comt`
--
CREATE DATABASE IF NOT EXISTS `comt` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `comt`;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `path` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `cat`, `name`, `path`) VALUES
(1, 'personal', '20190301_161520.jpg', 'upload/20190301_161520.jpg'),
(2, 'personal', 'Capture.PNG', 'upload/Capture.PNG'),
(3, 'group', '20190303_050059.jpg', 'upload/20190303_050059.jpg'),
(4, 'group', '20190306_061609.jpg', 'upload/20190306_061609.jpg'),
(5, 'group', '20190107_104008.jpg', 'upload/20190107_104008.jpg'),
(6, 'personal', 'geezelesson.pdf', 'upload/geezelesson.pdf'),
(7, 'personal', 'nice.jpg', 'upload/nice.jpg'),
(8, 'customer', 'images.png', 'upload/images.png');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `name`) VALUES
(1, 'personal'),
(2, 'group');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
