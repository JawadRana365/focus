-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 27, 2020 at 09:55 PM
-- Server version: 5.7.24
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `focus`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

DROP TABLE IF EXISTS `class`;
CREATE TABLE IF NOT EXISTS `class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `maximum_students` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0:Open , 1:Closed',
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `code`, `name`, `maximum_students`, `status`, `description`) VALUES
(1, 'SP-15-BCS', 'Jawad', 10, 0, 'PF-05'),
(2, 'SP15`', 'Shahid', 0, 1, 'ECA'),
(3, 'SP15-BCS-040', 'Jawad Rana', 10, 0, 'ECA'),
(4, 'SP-15-BCS', 'Jawad', 0, 0, 'PF');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `class` int(11) NOT NULL,
  `date_of_birth` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `first_name`, `last_name`, `class`, `date_of_birth`) VALUES
(1, 'Jawad', 'Rana', 2, '2020-09-30'),
(2, 'Hamza', 'Ali', 2, '2019-09-26');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
