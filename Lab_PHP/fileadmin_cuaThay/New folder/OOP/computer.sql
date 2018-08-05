-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 14, 2011 at 09:54 AM
-- Server version: 5.1.53
-- PHP Version: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `computer`
--

-- --------------------------------------------------------

--
-- Table structure for table `ct_hoadon`
--

CREATE TABLE IF NOT EXISTS `ct_hoadon` (
  `so_hoa_don` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `mamh` int(10) NOT NULL,
  `so_luong` int(10) NOT NULL,
  `gia` int(100) NOT NULL,
  `tenmh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `hinh` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`so_hoa_don`,`mamh`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ct_hoadon`
--

INSERT INTO `ct_hoadon` (`so_hoa_don`, `mamh`, `so_luong`, `gia`, `tenmh`, `hinh`) VALUES
('11', 3, 1, 7312000, 'SunPower SPH11', '3.jpg'),
('9', 3, 1, 7312000, 'SunPower SPH11', '3.jpg'),
('11', 10, 1, 8879000, 'Asus EEEPC 1015PEM (Đỏ / Trắng)', '10.jpg'),
('11', 13, 1, 14600000, 'MSI CX420 1453 Black/Gray', '13.jpg'),
('11', 6, 1, 34400000, 'Dell XPS L501X', '6.jpg'),
('12', 10, 1, 8879000, 'Asus EEEPC 1015PEM (Đỏ / Trắng)', '10.jpg'),
('13', 1, 1, 18654000, 'SunPower SPHP11', '1.jpg'),
('13', 7, 1, 19218000, 'Sony Vaio VPC Y216FX (Pink)', '7.jpg'),
('14', 12, 1, 13650000, 'Asus X42JE-VX179 (K42JE-3GVX) white', '12.jpg'),
('14', 14, 1, 10100000, 'MSI X340-1352 SU3500 Black/White', '14.jpg'),
('14', 15, 1, 7950000, 'NB MSI U160DX-N051 Black/ Gold', '15.jpg'),
('14', 9, 1, 29990000, 'Sony Vaio VPCF135FG', '9.jpg'),
('14', 5, 1, 16148000, 'Dell Inspiron 14R N4010 T561127VN Black ', '5.jpg'),
('14', 18, 1, 9890000, 'Acer Aspire AS5738PZG LX.PQZ01.002', '18.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE IF NOT EXISTS `hoadon` (
  `so_hoa_don` int(10) NOT NULL AUTO_INCREMENT,
  `ngay_HD` date NOT NULL,
  `ma_nguoi_dung` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `ho_ten` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dia_chi` text COLLATE utf8_unicode_ci NOT NULL,
  `so_dien_thoai` int(12) NOT NULL,
  PRIMARY KEY (`so_hoa_don`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`so_hoa_don`, `ngay_HD`, `ma_nguoi_dung`, `ho_ten`, `dia_chi`, `so_dien_thoai`) VALUES
(4, '2011-06-05', '1', 'quoc bao', 'sdsasdas', 0),
(3, '2011-06-05', '1', 'kim hien', 'aaaa', 0),
(5, '2011-06-05', '1', 'trang', 'as', 12121212),
(6, '2011-06-05', '1', 'thao', 'ASASa', 43223424),
(7, '2011-06-05', '1', 'hai', 'sa', 1234),
(8, '2011-06-05', '1', 'duy', 'tphcm', 4324234),
(9, '2011-06-05', '1', 'TUAN', 'ASDDASDAS', 42424),
(10, '2011-06-05', '1', 'QUAN', 'SADSA', 42424),
(11, '2011-06-05', '1', 'DOANH', 'CZX', 1238002042),
(12, '2011-06-05', '1', 'thai', 'CXZXXZC', 432432),
(13, '2011-06-05', '2', 'VY', 'XCXXCZ', 2147483647),
(14, '2011-06-05', '1', 'QUAN', 'sdasa', 1238002042);

-- --------------------------------------------------------

--
-- Table structure for table `mathang`
--

CREATE TABLE IF NOT EXISTS `mathang` (
  `mamh` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tenmh` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gioi_thieu` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `gia` int(100) NOT NULL,
  `thoi_gian_bao_hanh` int(11) NOT NULL,
  `hinh` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `khuyen_mai` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chi_tiet` text COLLATE utf8_unicode_ci NOT NULL,
  `masp` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ma_the_loai` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sanphamtieubieu` int(11) DEFAULT NULL,
  `ngaycapnhap` datetime NOT NULL,
  PRIMARY KEY (`mamh`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mathang`
--

INSERT INTO `mathang` (`mamh`, `tenmh`, `gioi_thieu`, `gia`, `thoi_gian_bao_hanh`, `hinh`, `khuyen_mai`, `chi_tiet`, `masp`, `ma_the_loai`, `sanphamtieubieu`, `ngaycapnhap`) VALUES
('1', 'SunPower SPHP11', 'SunPower SPHP11: Mainboard P55 E Chipset Intel / CPU Intel Core i7 870 2.93GHz chuẩn SK LGA 1156  8Mb Cache L3/ RAM 4GB DDR3 (2*2G) bus 1333/ HDD 1.5TB SATA II/ VGA rời Geforce GT220 -  1GB GDDR3/ DVD', 18654000, 36, '1.jpg', 'Tặng 200.000vnd tiền mặt', 'aaaaa', 'sp1', 'lt40', 1, '2011-02-20 00:00:00'),
('10', 'Asus EEEPC 1015PEM (Đỏ / Trắng)', 'Asus EEEPC 1015PEM WHI015W/RED010W: Intel Atom N550 (2x1.5G) (Duo core). 10.1" LED Backlight WSVGA Screen (1024x600). RAM 1GB . HDD 250GB . card màn hình Intel GMA 3150 integrated .802.11b/g/n Lan 10/', 8879000, 12, '10.jpg', 'Tặng ASUS DVD Ext USB 2.0 trị giá 1,100,000VNĐ+túi chống sốc', 'sdadas', 'sp2', 'tl3', 1, '0000-00-00 00:00:00'),
('11', 'A42JC-VX059 (K42JC-2CVX) Black', 'A42JC-VX059 (K42JC-2CVX) Black:Intel Core i3-370M (2.4Ghz/ 3Mb), ram 2Gb DDR3, ổ cứng 320Gb, ổ quang DVDRW, card màn hình NVIDIA GeForce GTX 310M with 1GB DDR3 VRAM, màn hình 14.0" HD (1366x768) LED b', 14575000, 24, '11.jpg', 'Tặng Bundle Optical Mouse+túi xách Asus', '', 'sp2', 'tl3', NULL, '0000-00-00 00:00:00'),
('12', 'Asus X42JE-VX179 (K42JE-3GVX) white', 'Asus X42JE-VX179 (K42JE-3GVX) màu trắng: Intel Core i3 370M - 2.4Ghz, màn hình 14.0" HD (1366x768) LED backlight (Gương siêu sáng)- Splendid, Ram 2GB DDR3/ 1066 2 x GB SO-DIMM, ổ cứng 320GB 5400 rpm S', 13650000, 24, '12.jpg', 'Tặng Bundle Optical Mouse+túi xách Asus', '', 'sp3', 'tl50', NULL, '0000-00-00 00:00:00'),
('13', 'MSI CX420 1453 Black/Gray', 'MSI CX420 1453 Black : Intel Core i5-450M. Chipsets Intel HM55. RAM  2GB DDR3. HDD 320Gb SATA.Graphic ATi Radeon HD5470 Park XT, 1GB  DDR3. 14" HD, Glare (1366*768) LED/Card reader/ D-sub/ USB 2.0  DV', 14600000, 12, '13.jpg', 'Tặng túi xách', '', 'sp3', 'tl35', 1, '0000-00-00 00:00:00'),
('14', 'MSI X340-1352 SU3500 Black/White', ' Intel Core 2 Solo SU3500 1.4G/3M L2  GS45 chipset. RAM 2GB DDR2. HDD 250Gb SATA . Graphic GMA 4500MHD Share system memory 13" WXGA,Glare (1366x768) HD/HDMI/ Card reader/ D-sub/ USB 2.0 .Camera 1.3M p', 10100000, 24, '14.jpg', 'Tặng túi Netbook MSI', '', 'sp4', 'tl24', NULL, '0000-00-00 00:00:00'),
('15', 'NB MSI U160DX-N051 Black/ Gold', 'Atom N455 1.66GGhz  NM10,  Intel chipset Slim Type Panel 1Gb DDR III .HDD 250Gb SATA .GMA 3150.  10" WSVGA (1024*600 ) LED/Card reader/ D-sub/ USB 2.0 .Camera 1.3M pixcel MS-6891(802.11b/g draft n 1*1', 7950000, 12, '15.jpg', 'Tặng túi Netbook MSI', '', 'sp4', 'tl36', NULL, '0000-00-00 00:00:00'),
('16', 'Acer eMachines eMD725-451G32Mikk LX.N440C.101', 'Acer eMachines eMD725-451G32Mikk Black: Intel Pentium processor T4500 (1 MB L2 cache, 2.30 GHz, 800MHz FSB, 35 W). RAM 1GB DDR3. HDD 320G 5400 rpm . DVDRw.  14.1" HD LED Backlight.  5 in 1 cardreader.', 7999000, 12, '16.jpg', 'Tặng túi xách+ thẻ xăng 160.000vnd + phần mềm diệt virus CMC bản quyền trị giá 100.000vnd (áp dụng từ 17.02 đến 24.02.2011) ', '', 'sp2', 'tl5', 1, '0000-00-00 00:00:00'),
('17', 'Acer Timeline X 4820TG-372G32Mn LX.PSG02.21', 'Acer Timeline X 4820TG-372G32Mn LX.PSG02.213:Intel Core i3-370M  (2*2.4GHz, 3M Smart Cache, 32nm, 35W). Mobile Intel® HM55 Express. RAM: 2GB DDR3. 320GB SATA . ATI Mobility Radeon HD 5470 * 8X DVD-Sup', 13000000, 12, '17.jpg', 'Tặng túi xách + HDD Acer 500GB cắm ngoài', '', 'sp2', 'tl5', NULL, '0000-00-00 00:00:00'),
('18', 'Acer Aspire AS5738PZG LX.PQZ01.002', 'Acer Aspire AS5738PZG LX.PQZ01.002:  Intel Pentium processor T4500 (1 MB L2 cache, 2.30 GHz, 800MHz FSB, 35 W). RAM2 GB DDR3. 320 GB sata 5400 rpm. DVD Super Multi Double Layer. 15.6 inch HD Touch scr', 9890000, 12, '18.jpg', 'Tặng túi xách', '', 'sp2', 'tl5', NULL, '0000-00-00 00:00:00'),
('2', 'SunPower SPH12', 'SunPower SPH12: Mainboard H55 Chipset Intel / CPU Intel Core i5 - 650 (3.2 GHz I chuẩn SK LGA 1156 I 4Mb Cache L3)/ RAM 2GB DDR3 bus 1333 / HDD 500GB SATA II/ DVDRW 22X/ Nguồn 400W (Real-Power)/ Case ', 9179000, 36, '2.jpg', 'Tặng 200.000vnd tiền mặt', '', 'sp1', 'lt15', NULL, '0000-00-00 00:00:00'),
('3', 'SunPower SPH11', 'SunPower SPH11: Mainboard H55 Chipset Intel / CPU Intel Core i3 – 540 (3.06GHz / SK LGA 1156/ 4MB Cache L3 / RAM 2GB DDR3 bus 1333 / HDD 500GB SATA II/ DVDRW 22X/ Nguồn 400W (Real-Power)/ Case SunPowe', 7312000, 36, '3.jpg', 'Tặng 200.000vnd tiền mặt', '', 'sp1', 'tl16', 1, '0000-00-00 00:00:00'),
('4', 'Dell Inspiron 15R - 480M(N5010)', 'Dell Inspiron 15R - 480M(N5010): Intel Core i5 - 480M  (2.66GHz, 3MB L2 cache). Chipset Mobile Intel PM55 Express . RAM 4GB(2x2GB) DDR3 bus 1333 MHz. HDD 500GB HDD Sata 5400 rpm .SuperMulti 8X DVD±R/R', 17635000, 12, '4.jpg', 'Tặng túi xách Dell+ thẻ mua hàng thời trang Ninomax trị giá 300.000 (the85) (SL có hạn, CT kết thúc khi hết quà)', '', 'sp2', 'tl1', NULL, '0000-00-00 00:00:00'),
('5', 'Dell Inspiron 14R N4010 T561127VN Black ', 'Dell Inspiron 14R N4010 T561127VN Black :Intel Core i5-480M (2* 2.66GHz / 4 Threads, Turbo Boost to 2.93GHz  3MB  Cache), HDD 320GB 7200 rpm SATA. RAM 2GB 1333MHz DDR3 (1 x 2GB). Intel(R) HD Graphics.', 16148000, 12, '5.jpg', 'Tặng túi xách Dell', '', 'sp2', 'tl1', NULL, '0000-00-00 00:00:00'),
('6', 'Dell XPS L501X', 'Dell XPS L501X: Intel Core i7-740QM (4*1.73GHz TurboBoost 2.93GHz, 8Threads, 6MB L3 cache) Intel PM55 Chipset. RAM 4GB DDR3. HDD 640GB 7200 rpm SATA. DVD±RW BLUERAY. 15.6''''Full HD 1920x1080 LED TrueLi', 34400000, 12, '6.jpg', 'Tặng thẻ mua hàng thời trang Ninomax trị giá 300.000 (the85) (SL có hạn, CT kết thúc khi hết quà). Tặng túi xách Dell', '', 'sp2', 'tl1', 1, '0000-00-00 00:00:00'),
('7', 'Sony Vaio VPC Y216FX (Pink)', 'Sony Vaio  VPC Y216FX (Pink): Intel Core i3 330UM  1.2GHz (3MB cache L3/ DMI 2.5GT/s). Mobile Intel HM55 Express Chipset. 4GB DDRAM3 800MHz. Intel GMA HD Graphics. 500 GB SATA, 5400 rpm . 13.3" HD LED', 19218000, 12, '7.jpg', 'Tặng túi xách', '', 'sp2', 'tl2', 1, '0000-00-00 00:00:00'),
('8', 'Sony Vaio VPC YA15FG/B', 'Sony Vaio VPC YA15FG/B:Intel Core i3-380UM 1.33 GHz*1,Chipset  Intel HM55 Express.HDD  320 GB*4 (Serial ATA, 5400 rpm).RAM  2 GB DDR3. 11.6 inch wide (WXGA: 1366x768) TFT (màn hình VAIO, đèn nền LED).', 15990000, 12, '8.jpg', 'Tặng túi xách Sony+ USB Sony 4GB (áp dụng từ 10.11.2010 đến 31.03.2011)', '', 'sp2', 'tl2', NULL, '0000-00-00 00:00:00'),
('9', 'Sony Vaio VPCF135FG', 'Intel Core i5-560M (2.66GHz) Turbo Boost upto 2.93GHZ/4GB Ram DDR3/ 500GB HDD/ 512MB NVIDIA GeForce 310M GPU with CUDA/DVDRW DL/ 16.4" Wide (WXGA++ 1600 x 900) VAIO display pre/ IEEE 1394/ Webcam/  Ca', 29990000, 12, '9.jpg', 'Tặng túi xách Sony+ USB Sony 4GB (áp dụng từ 10.11.2010 đến 31.03.2011)', '', 'sp2', 'tl2', NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE IF NOT EXISTS `sanpham` (
  `masp` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tensp` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`masp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`masp`, `tensp`) VALUES
('sp1', 'Máy Tính Sunpower'),
('sp10', 'Thiết bị mạng'),
('sp11', 'Thiết bị ngoại vi'),
('sp12', 'Phần mềm máy tính'),
('sp13', 'Bộ lưu điện'),
('sp14', 'Kỹ thuật số'),
('sp15', 'Linh kiện và phụ kiện laptop'),
('sp2', 'Máy Tính Xách Tay'),
('sp3', 'Máy Bộ'),
('sp4', 'Máy Chủ'),
('sp5', 'Linh Kiện máy tính'),
('sp6', 'Máy tính bảng Ipad'),
('sp7', 'Máy in và phụ kiện'),
('sp8', 'Máy văn phòng'),
('sp9', 'Thiết bị lưu trữ');

-- --------------------------------------------------------

--
-- Table structure for table `theloai`
--

CREATE TABLE IF NOT EXISTS `theloai` (
  `ma_the_loai` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ten_the_loai` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ma_the_loai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `theloai`
--

INSERT INTO `theloai` (`ma_the_loai`, `ten_the_loai`) VALUES
('tl1', 'Dell'),
('tl10', 'Lenovo'),
('tl11', 'Emachine'),
('tl12', 'Gateway'),
('tl13', 'gigabyte'),
('tl14', 'HP'),
('tl15', 'HP'),
('tl16', 'IBM'),
('tl17', 'Bo mạch chủ'),
('tl18', 'Bộ vi xữ lý'),
('tl19', 'Bộ nhớ trong'),
('tl2', 'Sony'),
('tl20', 'Ỗ đĩa cứng'),
('tl21', 'Card màn hình'),
('tl22', 'Vỏ máy tính'),
('tl23', 'Nguồn máy tính'),
('tl24', 'Bàn phím'),
('tl25', 'Chuột máy tính'),
('tl26', 'Chuột máy tính'),
('tl27', 'Màn hình máy tính'),
('tl28', 'Ổ đĩa quang'),
('tl29', 'Quạt CPU'),
('tl3', 'Asus'),
('tl30', 'tản nhiệt Ram'),
('tl31', 'tản nhiệt chipset'),
('tl32', 'Quạt tản nhiệt'),
('tl33', 'Card âm thanh'),
('tl34', 'Apple'),
('tl35', 'Máy in'),
('tl36', 'Mực máy in'),
('tl37', 'Print server'),
('tl38', 'Máy chiếu'),
('tl39', 'Máy photocopy'),
('tl4', 'Msi'),
('tl40', 'Máy fax'),
('tl41', 'Máy đọc mã vạch'),
('tl42', 'Máy quét ảnh'),
('tl43', 'Màn chiếu'),
('tl44', 'Máy hủy giấy'),
('tl45', 'Phụ kiện máy photocopy'),
('tl46', 'Thẻ nhớ'),
('tl47', 'Máy nghe nhạc'),
('tl48', 'Ổ cứng cắm ngoài'),
('tl49', 'USB Flash'),
('tl5', 'Acer'),
('tl50', 'Modem USB 3G'),
('tl51', 'Modem ADSL Router'),
('tl52', 'Thiết bị mạng không dây'),
('tl53', 'Thiết bị mạng có dây'),
('tl54', 'switch'),
('tl55', 'Tai nghe'),
('tl56', 'webcam'),
('tl57', 'TV Box'),
('tl58', 'Loa nghe nhạc'),
('tl59', 'Camera giám sát'),
('tl6', 'Apple'),
('tl60', 'Game Pad'),
('tl61', 'Phụ kiện'),
('tl62', 'Phần mềm diệt vius- Antivirus'),
('tl63', 'Phần mềm Mcrosoft'),
('tl64', 'Phần mềm offline'),
('tl65', 'Máy ảnh kỹ thuật số'),
('tl66', 'Phụ kiện máy ảnh'),
('tl67', 'Máy quay kỹ thuật số'),
('tl68', 'Thiết bị giải trí'),
('tl69', 'Phụ kiện laptop'),
('tl7', 'Samsung'),
('tl70', 'Bộ nhớ laptop'),
('tl71', 'Ổ cứng laptop'),
('tl72', 'Pin laptop'),
('tl73', 'Adapter laptop'),
('tl74', 'Túi đựng máy laptop'),
('tl75', 'Đế làm mát laptop'),
('tl8', 'Toshiba'),
('tl9', 'HP');
