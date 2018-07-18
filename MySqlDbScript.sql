-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 18, 2018 at 04:03 AM
-- Server version: 5.7.22-log
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `code-test`
--
CREATE DATABASE IF NOT EXISTS `code-test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `code-test`;

-- --------------------------------------------------------

--
-- Table structure for table `quiz_qa`
--

DROP TABLE IF EXISTS `quiz_qa`;
CREATE TABLE IF NOT EXISTS `quiz_qa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `questionText` varchar(250) DEFAULT NULL,
  `questionAnswer` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_qa`
--

INSERT INTO `quiz_qa` (`id`, `questionText`, `questionAnswer`) VALUES
(1, '2+2=?', '4'),
(2, '4+4=?', '8');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
