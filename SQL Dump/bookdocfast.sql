-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2014 at 11:29 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bookdocfast`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE IF NOT EXISTS `appointment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `appointmentstatus_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `appointmentstatus`
--

CREATE TABLE IF NOT EXISTS `appointmentstatus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE IF NOT EXISTS `doctor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `address` varchar(256) NOT NULL,
  `city` text NOT NULL,
  `province` text NOT NULL,
  `postal` varchar(6) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `website` varchar(256) NOT NULL,
  `photourl` varchar(256) NOT NULL,
  `moreinfourl` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `first_name`, `last_name`, `address`, `city`, `province`, `postal`, `phone`, `website`, `photourl`, `moreinfourl`) VALUES
(1, 'Spence', 'Pentland', '3523 Main St', 'Vancouver', 'BC', 'V5V3N4', '604-873-9355', 'http://yinstill.com/', 'http://www.ratemds.com/uploads/3348856.jpg', 'http://www.ratemds.com/doctor-ratings/3348856/Spence-Pentland-Vancouver-BC.html'),
(2, 'Ryan\r\n', 'Funk\r\n', 'Suite 250, 828 West 8th Avenue', 'Vancouver\r\n', 'BC\r\n', 'V5Z1E2', '604-678-8600', 'http://www.acubalance.ca/', 'http://www.acubalance.ca/sites/default/files/styles/staff_member_med/public/staff/Mail%20Attachment%203.jpeg?itok=uZPLiPoH', 'www.ratemds.com/doctor-ratings/3391154/Ryan-Funk-Vancouver-BC.html'),
(3, 'Lorne\r\n', 'Brown\r\n', 'Suite 250, 828 West 8th Avenue', 'Vancouver\r\n', 'BC\r\n', 'V5Z1E3', '604-678-8600', 'http://www.acubalance.ca/', 'http://www.ratemds.com/uploads/3203125.jpg', 'http://www.ratemds.com/doctor-ratings/3203125/Lorne-Brown-Vancouver-BC.html'),
(4, 'Harreson\r\n', 'Caldwell\r\n', '801-1200 Burrard Street', 'Vancouver\r\n', 'BC\r\n', 'V6Z2CW', '604-618-3111', 'http://caldwellclinic.com/', 'http://www.ratemds.com/uploads/1214401.jpg', 'http://www.ratemds.com/doctor-ratings/1214401/Harreson-Caldwell-Vancouver-BC.html'),
(5, 'Sophya\r\n', 'Itskovich\r\n', '202-7460 Edmonds Street', 'Vancouver\r\n', 'BC\r\n', 'V3N1B2', '604-525-8425', 'http://www.path2wellness.ca/contactus.html', '', 'http://www.ratemds.com/doctor-ratings/3488106/Sophya-Itskovich-Burnaby-BC.html'),
(6, 'Gabrielle\r\n', 'Steinberg\r\n', '678 Leg In Boot Square', 'Vancouver\r\n', 'BC\r\n', 'V5Z4B4', '604-737-7721', 'http://www.harmonywellness.ca', 'http://www.harmonywellness.ca/wp-content/themes/harmony/i/pics/team/gabrielle.jpg', 'http://www.ratemds.com/doctor-ratings/1215098/Gabrielle-Steinberg-Vancouver-BC.html'),
(7, 'Peter\r\n', 'Zhou\r\n', '116-828 West 8th Ave', 'Vancouver\r\n', 'BC\r\n', 'V5Z1E2', '604-876-8618', 'http://acuhealer.ca/', 'http://acuhealer.net/images/zhou.jpg', 'http://www.ratemds.com/doctor-ratings/3342297/Peter-Zhou-Vancouver-BC.html'),
(8, 'Jeda\r\n', 'Boughton\r\n', '1245 West Broadway #302', 'Vancouver\r\n', 'BC\r\n', 'V6H1G7', '604-733-2632', 'http://bodahealth.ca/', 'http://bodahealth.ca/wp-content/uploads/2011/04/Jeda1-174x164.jpg', 'http://www.ratemds.com/doctor-ratings/150485/Jeda-Boughton-Vancouver-BC.html'),
(9, 'John\r\n', 'Blazevic\r\n', '4857 Main St', 'Vancouver\r\n', 'BC\r\n', 'V5V3R9', '604-224-6692', 'http://www.johnsacupuncture.com/', '', 'http://www.ratemds.com/doctor-ratings/3665762/John-Blazevic-Vancouver-BC.html'),
(10, 'Jen\r\n', 'Cherewaty\r\n', '507 West Broadway', 'Vancouver\r\n', 'BC\r\n', 'V5Z1E6', '778-877-9460', 'http://crossroadsnaturopathic.com/', 'http://crossroadsnaturopathic.com/img/profile/profile_jen.jpg', 'http://www.ratemds.com/doctor-ratings/3746813/Jen-Cherewaty-North+Vancouver-BC.html');

-- --------------------------------------------------------

--
-- Table structure for table `doctorlocation`
--

CREATE TABLE IF NOT EXISTS `doctorlocation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `doctorspecialty`
--

CREATE TABLE IF NOT EXISTS `doctorspecialty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `specialty_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `doctorspecialty`
--

INSERT INTO `doctorspecialty` (`id`, `specialty_id`, `doctor_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 1, 9),
(10, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `postalcode` varchar(6) NOT NULL,
  `city` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `email` varchar(256) NOT NULL,
  `phone` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `specialty`
--

CREATE TABLE IF NOT EXISTS `specialty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `specialty`
--

INSERT INTO `specialty` (`id`, `name`) VALUES
(1, 'Acupuncturist\r\n'),
(8, 'Chiropractor\r\n'),
(10, 'Dentist\r\n'),
(15, 'Family / G.P.\r\n'),
(16, 'Gastroenterologist\r\n'),
(21, 'Naturopath\r\n'),
(27, 'Optometrist\r\n'),
(37, 'Psychologist\r\n'),
(45, 'Physical Therapy\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `specialtyreasons`
--

CREATE TABLE IF NOT EXISTS `specialtyreasons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `visitreason_id` int(11) NOT NULL,
  `specialty_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=78 ;

--
-- Dumping data for table `specialtyreasons`
--

INSERT INTO `specialtyreasons` (`id`, `visitreason_id`, `specialty_id`) VALUES
(1, 1, 1),
(2, 36, 1),
(3, 37, 1),
(4, 38, 1),
(5, 12, 1),
(6, 39, 1),
(7, 40, 1),
(8, 41, 1),
(9, 42, 1),
(10, 43, 1),
(11, 1, 15),
(12, 2, 15),
(13, 3, 15),
(14, 4, 15),
(15, 5, 15),
(16, 6, 15),
(17, 8, 15),
(18, 9, 15),
(19, 10, 15),
(20, 11, 15),
(21, 12, 15),
(22, 13, 10),
(23, 14, 10),
(24, 15, 10),
(25, 16, 10),
(26, 17, 10),
(27, 18, 10),
(28, 12, 10),
(29, 1, 21),
(30, 2, 21),
(31, 3, 21),
(32, 4, 21),
(33, 5, 21),
(34, 6, 21),
(35, 8, 21),
(36, 9, 21),
(37, 10, 21),
(38, 11, 21),
(39, 12, 21),
(40, 20, 21),
(41, 21, 21),
(42, 21, 21),
(43, 1, 37),
(44, 9, 37),
(45, 23, 37),
(46, 24, 37),
(47, 25, 37),
(48, 26, 37),
(49, 27, 37),
(50, 28, 37),
(51, 29, 37),
(52, 12, 37),
(53, 1, 8),
(54, 30, 8),
(55, 31, 8),
(56, 32, 8),
(57, 33, 8),
(58, 34, 8),
(59, 35, 8),
(60, 12, 8),
(61, 44, 27),
(62, 45, 27),
(63, 46, 27),
(64, 47, 27),
(65, 12, 27),
(66, 1, 45),
(67, 30, 45),
(68, 31, 45),
(69, 32, 45),
(70, 35, 45),
(71, 34, 45),
(72, 48, 45),
(73, 49, 45),
(74, 12, 45),
(75, 50, 45),
(76, 51, 45),
(77, 52, 45);

-- --------------------------------------------------------

--
-- Table structure for table `visitreason`
--

CREATE TABLE IF NOT EXISTS `visitreason` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `visitreason`
--

INSERT INTO `visitreason` (`id`, `name`) VALUES
(1, 'New patient\r\n'),
(2, 'Medical examination\r\n'),
(3, 'Flu\r\n'),
(4, 'Cold\r\n'),
(5, 'Fever\r\n'),
(6, 'Illness\r\n'),
(8, 'Pain\r\n'),
(9, 'Anxiety or Depression\r\n'),
(10, 'Prescription\r\n'),
(11, 'Allergies\r\n'),
(12, 'Other\r\n'),
(13, 'Dental Cleaning\r\n'),
(14, 'Bridge\r\n'),
(15, 'Crown\r\n'),
(16, 'Filling\r\n'),
(17, 'Wisdom teeth\r\n'),
(18, 'Root Canal\r\n'),
(19, 'New Patient exam\r\n'),
(20, 'Artrithis\r\n'),
(21, 'Asthma\r\n'),
(22, 'Nutrition\r\n'),
(23, 'Psychotherapy\r\n'),
(24, 'Divorce counselling\r\n'),
(25, 'Parenting counselling\r\n'),
(26, 'Child counselling\r\n'),
(27, 'Marriage and relationship counselling\r\n'),
(28, 'Behavioural therapy\r\n'),
(29, 'Psychoanalysis\r\n'),
(30, 'Back pain\r\n'),
(31, 'Shoulder pain\r\n'),
(32, 'Hip pain\r\n'),
(33, 'Adjustment\r\n'),
(34, 'Consultation\r\n'),
(35, 'Neck pain\r\n'),
(36, 'Acupuncture\r\n'),
(37, 'Acupressure\r\n'),
(38, 'Chinese medicine\r\n'),
(39, 'Moxibustion\r\n'),
(40, 'Tuina\r\n'),
(41, 'Pain relief\r\n'),
(42, 'Health maintenance\r\n'),
(43, 'Stress management\r\n'),
(44, 'Eye glasses\r\n'),
(45, 'Eye exam\r\n'),
(46, 'Contact Lenses\r\n'),
(47, 'Lasik surgery\r\n'),
(48, 'General\r\n'),
(49, 'Post operative\r\n'),
(50, 'Pain reduction\r\n'),
(51, 'Deep tissue massage\r\n'),
(52, 'Sports\r\n');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
