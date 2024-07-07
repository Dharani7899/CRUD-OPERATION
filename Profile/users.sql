-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 16, 2024 at 05:04 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud_op`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `NAME` varchar(50) NOT NULL,
  `COLLEGE` varchar(100) NOT NULL,
  `CONTACT_NO` int NOT NULL,
  `EMAIL` varchar(20) NOT NULL,
  `ADDRESS` varchar(100) NOT NULL,
  `DEPARTMENT` varchar(191) NOT NULL,
  `IMAGE` varchar(191) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=223 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `NAME`, `COLLEGE`, `CONTACT_NO`, `EMAIL`, `ADDRESS`, `DEPARTMENT`, `IMAGE`) VALUES
(123, 'dharani', '{ vcew}', 2147483647, '{ dharani@gmail.com}', '{ efnmgnfm,g gnrkgjrkg gnrgrg}', 'CSE', ''),
(222, 'dcdvd', '{ cdcd}', 434343434, '{ scdcsv@gmail.com}', '{ vvvmcv.,vfmlf}', 'CST', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
