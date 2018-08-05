-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 11, 2011 at 11:00 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `chungkhoan`
--

-- --------------------------------------------------------

--
-- Table structure for table `ck`
--

CREATE TABLE IF NOT EXISTS `ck` (
  `mack` varchar(3) NOT NULL,
  `gia` float NOT NULL,
  PRIMARY KEY (`mack`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ck`
--

INSERT INTO `ck` (`mack`, `gia`) VALUES
('ACB', 18),
('SCB', 11.2),
('SSI', 19.5),
('REE', 12.1),
('ITA', 11.1),
('GTT', 6.2);
