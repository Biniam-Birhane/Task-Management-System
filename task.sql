-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 18, 2019 at 03:26 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `task`
--
CREATE DATABASE IF NOT EXISTS `task` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `task`;

-- --------------------------------------------------------

--
-- Table structure for table `groupe`
--

CREATE TABLE IF NOT EXISTS `groupe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `groupname` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `groupe`
--

INSERT INTO `groupe` (`id`, `groupname`) VALUES
(7, 'alpha'),
(8, 'bbb');

-- --------------------------------------------------------

--
-- Table structure for table `leaderfile`
--

CREATE TABLE IF NOT EXISTS `leaderfile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pname` varchar(30) NOT NULL,
  `cdate` date NOT NULL,
  `pinformation` text NOT NULL,
  `nsender` varchar(30) NOT NULL,
  `groupname` varchar(30) NOT NULL,
  `path` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `leadertask`
--

CREATE TABLE IF NOT EXISTS `leadertask` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `leadername` varchar(30) NOT NULL,
  `groupname` varchar(30) NOT NULL,
  `submit_date` date NOT NULL,
  `taskdiscription` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `leadertask`
--

INSERT INTO `leadertask` (`id`, `leadername`, `groupname`, `submit_date`, `taskdiscription`) VALUES
(1, 'vvv', 'alpha', '2019-05-16', '	hhhhhhh							\r\n							');

-- --------------------------------------------------------

--
-- Table structure for table `memberfile`
--

CREATE TABLE IF NOT EXISTS `memberfile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pname` varchar(30) NOT NULL,
  `cdate` date NOT NULL,
  `pinformation` text NOT NULL,
  `nsender` varchar(60) NOT NULL,
  `groupname` varchar(60) NOT NULL,
  `path` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `membertask`
--

CREATE TABLE IF NOT EXISTS `membertask` (
  `id` int(11) NOT NULL,
  `membername` varchar(30) NOT NULL,
  `taskdiscription` text NOT NULL,
  `submit_date` date NOT NULL,
  `gname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tname` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `groupn` varchar(30) NOT NULL,
  `position` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `tname`, `username`, `password`, `groupn`, `position`) VALUES
(1, 'biniam', 'biniam', 'bini', '', 'admin'),
(4, 'vvv', 'vvv', 'vvv', 'alpha', 'leader');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
