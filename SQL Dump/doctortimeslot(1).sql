-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 16, 2014 at 01:19 PM
-- Server version: 5.5.34-0ubuntu0.13.04.1
-- PHP Version: 5.4.9-4ubuntu2.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `markydtt_bookdocfast`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctortimeslot`
--

CREATE TABLE IF NOT EXISTS `doctortimeslot` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doctor_id` int(11) NOT NULL,
  `dayofweek` int(11) NOT NULL,
  `dayofweek_text` text COLLATE utf8_unicode_ci NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `doctortimeslot`
--

INSERT INTO `doctortimeslot` (`id`, `doctor_id`, `dayofweek`, `dayofweek_text`, `time`) VALUES
(1, 1, 1, 'Monday', '09:00:00'),
(2, 1, 2, 'Tuesday', '12:00:00'),
(3, 1, 3, 'Wednesday', '01:00:00'),
(4, 1, 4, 'Thursday', '02:00:00'),
(5, 1, 5, 'Friday', '03:00:00'),
(6, 1, 1, 'Monday', '04:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
