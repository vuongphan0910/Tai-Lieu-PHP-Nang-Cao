-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2015 at 06:03 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


-- --------------------------------------------------------

--
-- Table structure for table `quan`
--

CREATE TABLE IF NOT EXISTS `quan` (
  `maquan` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `tenquan` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `matp` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`maquan`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `quan`
--

INSERT INTO `quan` (`maquan`, `tenquan`, `matp`) VALUES
('01', 'Quận 1', '02'),
('02', 'Quận Bình Thạnh', '02'),
('03', 'Quận 3', '02'),
('04', 'Quận Hoàn Kiếm', '01'),
('05', 'Quận Cầu Giấy', '01'),
('06', 'Quận Đống Đa', '01');

-- --------------------------------------------------------

--
-- Table structure for table `thanhpho`
--

CREATE TABLE IF NOT EXISTS `thanhpho` (
  `matp` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `tentp` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `thanhpho`
--

INSERT INTO `thanhpho` (`matp`, `tentp`) VALUES
('01', 'Ha Noi'),
('02', 'Ho Chi Minh');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
