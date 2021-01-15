-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2017 at 08:41 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `visit_trim`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_list`
--

CREATE TABLE `detail_list` (
  `firstName` varchar(30) NOT NULL,
  `surName` varchar(35) NOT NULL,
  `address` varchar(40) NOT NULL,
  `mobileNumber` varchar(20) NOT NULL,
  `emailAddress` varchar(50) NOT NULL,
  `county` varchar(10) NOT NULL,
  `numAdults` int(2) NOT NULL,
  `NumKids` int(3) NOT NULL,
  `anyMeal` varchar(5) NOT NULL,
  `cardNumber` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_list`
--

INSERT INTO `detail_list` (`firstName`, `surName`, `address`, `mobileNumber`, `emailAddress`, `county`, `numAdults`, `NumKids`, `anyMeal`, `cardNumber`) VALUES
('john', 'smith', '27 avondale trim', '0857123359', 'johnsmith@gmail.com', 'Meath', 1, 2, 'yes', 2147483647);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
