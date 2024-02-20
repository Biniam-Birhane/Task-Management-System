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
-- Database: `estudent`
--
CREATE DATABASE IF NOT EXISTS `estudent` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `estudent`;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `sex` char(5) NOT NULL,
  `age` int(3) NOT NULL,
  `birthday` date NOT NULL,
  `phone` int(20) NOT NULL,
  `academic_year` int(10) NOT NULL,
  `department` char(6) NOT NULL,
  `grade12` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `fname`, `lname`, `sex`, `age`, `birthday`, `phone`, `academic_year`, `department`, `grade12`) VALUES
(1027, 'biniam', 'bini', '', '', '', 0, '0000-00-00', 0, 0, '', 0),
(1001, 'abadi', 'abe', '', '', '', 0, '0000-00-00', 0, 0, '', 0),
(0, '', '', '', '', 'male', 0, '0000-00-00', 0, 0, '', 0),
(0, '', '', '', '', 'femal', 0, '0000-00-00', 0, 0, '', 0),
(0, '', '', '', '', '', 0, '0000-00-00', 0, 0, '', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
