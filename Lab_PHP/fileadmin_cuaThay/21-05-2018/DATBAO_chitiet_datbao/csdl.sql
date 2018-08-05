-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 07, 2011 at 11:18 AM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `datbao`
--

-- --------------------------------------------------------

--
-- Table structure for table `ct_datbao`
--

CREATE TABLE IF NOT EXISTS `ct_datbao` (
  `madatbao` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mabao` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `soluong` int(11) NOT NULL,
  `gia` int(11) NOT NULL,
  PRIMARY KEY (`madatbao`,`mabao`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ct_datbao`
--


-- --------------------------------------------------------

--
-- Table structure for table `datbao`
--

CREATE TABLE IF NOT EXISTS `datbao` (
  `madatbao` varchar(100) NOT NULL,
  `ngaydat` date NOT NULL,
  `hoten` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sodt` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`madatbao`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datbao`
--


-- --------------------------------------------------------

--
-- Table structure for table `loaibao`
--

CREATE TABLE IF NOT EXISTS `loaibao` (
  `mabao` varchar(5) NOT NULL,
  `tenbao` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `gia` int(11) NOT NULL,
  PRIMARY KEY (`mabao`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loaibao`
--

INSERT INTO `loaibao` (`mabao`, `tenbao`, `gia`) VALUES
('00001', 'Thanh Niên', 1300),
('00002', 'Tuần San Thanh Niên', 2500),
('00003', 'Tuổi Trẻ', 1300),
('00004', 'Tuổi Trẻ Chủ Nhật', 2300),
('00005', 'Phụ Nữ', 4000);
