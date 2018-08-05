-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 06, 2010 at 08:29 AM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `webtintuc`
--

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tieude` text NOT NULL,
  `mota` text NOT NULL,
  `url` text NOT NULL,
  `hinhnho` varchar(150) NOT NULL,
  `hinhlon` varchar(150) NOT NULL,
  `stt` int(11) NOT NULL DEFAULT '0',
  `anhien` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `tieude`, `mota`, `url`, `hinhnho`, `hinhlon`, `stt`, `anhien`) VALUES
(1, 'Cảnh sát chống bạo động khống chế kẻ dọa tự thiêu', 'Sau 4 tiếng cố thủ trong vòng vây của hơn 100 cảnh sát, kẻ tưới đẫm xăng dọa tự thiêu', 'chitiettin.php?idTin=15', 'image1-small.jpg', 'image1.jpg', 0, 0),
(2, 'Hot girl Sài Gòn nhập vai thiếu nữ H’Mông', 'Đan Cha và Bảo Ngọc, hai ứng viên sáng giá của Miss Teen 2010, chia sẻ những trải nghiệm lý thú', 'chitiettin.php?idTin=16', 'image2-small.jpg', 'image2.jpg', 0, 0),
(3, 'Lindsay Lohan đâm xe vào nôi em bé', 'Có nhân chứng khẳng định, hôm 1/9, Lindsay lơ đễnh đâm vào xe nôi chở em bé do một cô trông trẻ đẩy qua đường', 'chitiettin.php?itTin=17', 'image3-small.jpg', 'image3.jpg', 0, 0),
(4, 'Đàm Vĩnh Hưng trong vòng vây người đẹp ', 'Hàng loạt mỹ nhân showbiz Việt hội tụ tại khách sạn Daewoo, Hà Nội tối 1/9 để chúc mừng Mr. Đàm ', 'chitiettin.php?idTIn=18', 'image4-small.jpg', 'image4.jpg', 0, 0);
