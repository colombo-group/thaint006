-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2016 at 03:49 AM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `trainee6`
--
CREATE DATABASE IF NOT EXISTS `trainee6` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `trainee6`;

-- --------------------------------------------------------

--
-- Table structure for table `privilege`
--

CREATE TABLE IF NOT EXISTS `privilege` (
  `ID_QUYEN` int(10) NOT NULL,
  `TEN_QUYEN` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID_QUYEN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `privilege`
--

INSERT INTO `privilege` (`ID_QUYEN`, `TEN_QUYEN`) VALUES
(1, 'administrator'),
(2, 'admod'),
(3, 'user'),
(4, 'guest');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `TEN` varchar(50) DEFAULT NULL,
  `TEN_DN` varchar(50) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `PHONE` varchar(11) DEFAULT NULL,
  `ANH` varchar(255) DEFAULT NULL,
  `MO_TA` varchar(255) DEFAULT NULL,
  `MAT_KHAU` varchar(255) DEFAULT NULL,
  `ID_QUYEN` int(10) DEFAULT NULL,
  `nguoi_gt` varchar(50) NOT NULL,
  `ngay` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`ID`, `TEN`, `TEN_DN`, `EMAIL`, `PHONE`, `ANH`, `MO_TA`, `MAT_KHAU`, `ID_QUYEN`, `nguoi_gt`, `ngay`) VALUES
(1, 'Nguyễn Trọng Thái', 'CONANDOYLE', 'thaint@gmail.com', '0963237246', '535053_1075060022516626_2361572824582674345_n.jpg', 'dsvđsvdsds', '100695', 1, '', '2016-06-15 09:20:07'),
(20, 'Nguyễn Thị Linh', 'linhht', 'linhht@gmai.com', '01672297611', 'avatar.jpg', 'fdsfdf', '123456', 3, '', '2016-06-15 09:20:07'),
(21, 'Nguyễn Thị Hương', 'huongnt', '', '01672297612', 'download.jpg', 'fdsvdsvdsfds', '123456', 3, '', '2016-06-15 09:20:07'),
(22, 'Nguyễn Văn Sinh', 'sinhnv', 'sinhnv@gmail.com', '01672297613', '', NULL, '123456', 3, '', '2016-06-15 09:20:07'),
(23, 'Lê Văn Sơn', 'sonlv', 'sonlv@gmail.com', '01672297614', '', NULL, '123456', 3, '', '2016-06-15 09:20:07'),
(24, 'Nguyễn Tiến San', 'sannt', 'sannt@gmail.com', '01672297615', 'download (1).jpg', NULL, '123456', 3, '', '2016-06-15 09:20:07'),
(25, 'Nguyễn Đức Trung', 'trungnd', 'trungnd@gmail.com', '01672297616', '', 'fdbkhsdbvkhds', '123123', 3, '', '2016-06-15 09:20:07'),
(26, 'Nguyễn Trọng Sơn', 'sonnt', 'sonnt@gmail.com', '01672297617', '', NULL, '123456', 2, '', '2016-06-15 09:20:07'),
(27, 'Nguyễn Đức Cường', 'cuongnd', 'cuongnd@gmail.com', '0975305721', NULL, NULL, '123456', 3, '', '2016-06-15 09:20:07'),
(28, 'Nguyễn Thúy Quỳnh', 'quynhnt', 'quynhnt@gmail.com', '0975305722', NULL, NULL, '123456', 3, '', '2016-06-15 09:20:07'),
(31, 'Nguyễn Thị Hạnh', 'hanhnt', 'hanhnt@gmail.com', '0975305723', NULL, NULL, '123456', 3, '', '2016-06-15 09:20:07'),
(32, 'Nguyễn Khắc Vinh', 'vinhnk', 'vinhnk@gmail.com', '0975305724', NULL, NULL, '123456', 3, '', '2016-06-15 09:20:07'),
(35, 'Trần Văn Tùng', 'tungtv', 'tungtv@gmail.com', '0989305721', '', NULL, '123456', 3, '', '2016-06-15 11:27:39'),
(36, 'Trần Văn Tâm', 'tamtv', 'tamtv@gmail.com', '0963305721', '', NULL, '123456', 3, 'CONANDOYLE', '2016-06-15 11:29:40');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
