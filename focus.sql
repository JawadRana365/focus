-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 02, 2020 at 01:44 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `code`, `name`, `maximum_students`, `status`, `description`) VALUES
(1, 'SP-15-BCS', 'Jawad', 10, 0, 'PF-05'),
(2, 'SP15`', 'Shahid', 0, 1, 'ECA'),
(3, 'SP15-BCS-040', 'Jawad Rana', 10, 0, 'ECA'),
(4, 'SP-15-BCS', 'Jawad', 0, 0, 'PF'),
(5, 'CSC-123', 'Programming Fundalmentals', 10, 0, 'BS Computer Sciences Class Spring Semeter');

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
  PRIMARY KEY (`id`),
  KEY `class` (`class`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `first_name`, `last_name`, `class`, `date_of_birth`) VALUES
(1, 'Jawad', 'Rana', 2, '2020-09-30'),
(2, 'Hamza', 'Ali', 2, '2019-09-26'),
(3, 'Rana Muhammad', 'Jawad', 5, '2020-10-29');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

DROP TABLE IF EXISTS `videos`;
CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` text NOT NULL,
  `cover_url` text NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(10) NOT NULL,
  `upload_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `url`, `cover_url`, `title`, `description`, `status`, `upload_time`) VALUES
(1, 'uploads/videos/Recording4.mp4', 'uploads/videos/Recording4.mp4', 'SAMPLE VIDEO A', 'Sample A Description', 'AVALIABLE', '2020-11-01 20:10:08'),
(2, 'uploads/videos/Practical_Test.mp4', 'uploads/videos/Practical_Test.mp4', 'SAMPLE VIDEO B', 'Sample B Description', 'AVALIABLE', '2020-11-01 20:10:39'),
(3, 'uploads/videos/Rashen.mp4', 'uploads/videos/Rashen.mp4', 'SAMPLE VIDEO C', 'Sample C Description', 'AVALIABLE', '2020-11-02 05:16:25');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`class`) REFERENCES `class` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
