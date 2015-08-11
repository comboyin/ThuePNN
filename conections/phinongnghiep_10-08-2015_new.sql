-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 10, 2015 at 09:10 PM
-- Server version: 5.5.44-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `phinongnghiep`
--

-- --------------------------------------------------------

--
-- Table structure for table `danhba`
--

CREATE TABLE IF NOT EXISTS `danhba` (
  `iddanhba` int(11) NOT NULL AUTO_INCREMENT,
  `masothue` varchar(14) DEFAULT NULL,
  `tengoi` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `sonha` varchar(50) DEFAULT NULL,
  `tenduong` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `todp` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`iddanhba`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `danhba`
--

INSERT INTO `danhba` (`iddanhba`, `masothue`, `tengoi`, `sonha`, `tenduong`, `todp`) VALUES
(1, '0301542045', 'Nguyễn Thị Nhàn', '618', 'Trần Hưng Đạo', '39'),
(2, '0301047121', 'Vương Thị Kiều Mỹ Lan', '602', 'Trần Hưng Đạo B', '39'),
(3, '0301306859', 'Ngô Cúc Minh', '594', 'Trần Hưng Đạo', '39'),
(4, '0301519617', 'Vương Thị Minh Phượng', '610', 'Trần Hưng Đạo', '39'),
(5, '0302071536', 'Từ Di Tô', '598 L1', 'Trần Hưng Đạo', '39'),
(6, '0302461173', 'Trần Cháy Phát', '598', 'Trần Hưng Đạo', '39'),
(7, '0302670120', 'Lý Vĩnh An', '612', 'Trần Hưng Đạo', '39'),
(8, '0303213751', 'Châu Kim (Trần A Nữ)', '600/8', 'Trần Hưng Đạo', '39'),
(9, '0303460687', 'Vương Thị Kiều Mỹ Hương', '604', 'Trần Hưng Đạo', '39'),
(10, '0304057470', 'Võ Quang Diệp', '600/16', 'Trần Hưng Đạo', '39'),
(11, '0304233768', 'Nguyễn Thị Kim Lan', '600/9', 'Trần Hưng Đạo', '39'),
(12, '0305973973', 'Trần Hán', '600/18A (L1+Gác l?ng)', 'Trần Hưng Đạo', '39'),
(13, '0307552868', 'Nguyễn Tuấn Hiệp', '594 L1', 'Trần Hưng Đạo', '39'),
(14, '0309842026', 'Vũ Hoàng Kim Phụng', '600/12A', 'Trần Hưng Đạo', '39'),
(15, '8005946733', 'Vũ Thị Kim Ngân (đ/d)', '614', 'Trần Hưng Đạo', '39'),
(16, '8014445684', 'Quan Chí Vinh', '600/16A', 'Trần Hưng Đạo', '39'),
(17, '8022201219', 'Châu Mỹ Hiền', '600/12', 'Trần Hưng Đạo', '39'),
(18, '8062251382', 'La Thị Minh Thu', '600/4', 'Trần Hưng Đạo', '39'),
(19, '8093696695', 'Võ Thị Ngọc Bích', '602 L1', 'Trần Hưng Đạo', '39'),
(20, '8139759157', 'Trầm Hảo', '600/5A', 'Trần Hưng Đạo', '39'),
(21, 'asdasaas ad a', 'dasd', 'asd', 'asdasd', 'asdas');

-- --------------------------------------------------------

--
-- Table structure for table `hoso`
--

CREATE TABLE IF NOT EXISTS `hoso` (
  `idhoso` int(11) NOT NULL AUTO_INCREMENT,
  `iddanhba` int(11) DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  `idloai` varchar(10) DEFAULT NULL,
  `ghichu` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idhoso`),
  KEY `iddanhba` (`iddanhba`),
  KEY `idloai` (`idloai`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `hoso`
--

INSERT INTO `hoso` (`idhoso`, `iddanhba`, `img`, `idloai`, `ghichu`) VALUES
(13, 1, 'hoso/le-phi-truoc-ba55c7bea130b3555c7beaa0812d.jpg', '1', 'tran minh nhut'),
(15, 1, 'hoso/img_0491_0255c7be3894c11.jpg', '1', 'Tran minh nhut'),
(16, 1, 'hoso/img_0491_0255c7be8bb8614.jpg', '3', 'a as as sa as as sa'),
(17, 1, 'hoso/img_04960255c7be987ae43.jpg', '3', 'a as as sa as as sa'),
(19, 1, 'hoso/le-phi-truoc-ba55c7bea130b35.jpg', '3', 'a as as sa as as sa'),
(20, 1, 'hoso/database_thuepnn55c79c3d8b206.png', '3', 'a as as sa as as sa'),
(21, 1, 'hoso/database_thuepnn55c79c4145c15.png', '3', 'a as as sa as as sa'),
(22, 1, 'hoso/database_thuepnn55c79c44b77ef.png', '3', 'a as as sa as as sa'),
(23, 1, 'hoso/database_thuepnn55c79c46dd4db.png', '3', 'a as as sa as as sa'),
(24, 1, 'hoso/database_thuepnn55c79c49095c7.png', '3', 'a as as sa as as sa'),
(25, 1, 'hoso/database_thuepnn55c7a3c02f59b.png', '3', 'a as as sa as as sa'),
(26, 5, 'hoso/img_04960255c7be987ae4355c869bfbfd30.jpg', '2', 'sd asdasda'),
(27, 5, 'hoso/img_0491_0255c869d098c8c.jpg', '3', 'sd asdasda'),
(28, 5, 'hoso/img_04960255c869d73da0c.jpg', '3', 'sd asdasda'),
(29, 5, 'hoso/giay chung nhan quyen su dung dat55c869deb02ec.jpg', '3', 'sd asdasda'),
(30, 5, 'hoso/le-phi-truoc-ba55c7bea130b3555c7beaa0812d55c869e6a857b.jpg', '3', 'sd asdasda'),
(31, 5, 'hoso/img_0491_0255c869d098c8c55c869f082235.jpg', '3', 'sd asdasda');

-- --------------------------------------------------------

--
-- Table structure for table `loaihoso`
--

CREATE TABLE IF NOT EXISTS `loaihoso` (
  `idloai` varchar(10) NOT NULL,
  `tenloaihs` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idloai`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loaihoso`
--

INSERT INTO `loaihoso` (`idloai`, `tenloaihs`) VALUES
('1', 'so hong'),
('2', 'to khai'),
('3', 'phieu khao sat');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `idMenu` int(11) NOT NULL AUTO_INCREMENT,
  `nameMenu` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `linkMenu` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `iclass` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `titleMenu` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `newPageMenu` int(11) NOT NULL,
  `isParent` int(11) DEFAULT NULL,
  `id_parent` int(11) DEFAULT NULL,
  `thutu` int(11) DEFAULT NULL,
  `isPublished` int(11) DEFAULT NULL,
  PRIMARY KEY (`idMenu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`idMenu`, `nameMenu`, `linkMenu`, `iclass`, `titleMenu`, `newPageMenu`, `isParent`, `id_parent`, `thutu`, `isPublished`) VALUES
(1, 'hethong', 'index.php', 'home', 'TRANG CHỦ', 0, 1, 0, 1, 1),
(27, 'inhoso', '?rt=HoSo', NULL, 'QUẢN LÝ HỒ SƠ', 0, 1, 0, 1, 1),
(28, 'innhatky', '?rt=NhatKy', NULL, 'QUẢN LÝ NHẬT KÝ', 0, 1, 0, 1, 1),
(29, 'indanhba', '?rt=DanhBa', NULL, 'QUẢN LÝ DANH BẠ', 0, 1, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nhatky`
--

CREATE TABLE IF NOT EXISTS `nhatky` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iddanhba` int(11) DEFAULT NULL,
  `ngay` datetime DEFAULT NULL,
  `noidung` text,
  `trangthai` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `iddanhba` (`iddanhba`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `nhatky`
--

INSERT INTO `nhatky` (`id`, `iddanhba`, `ngay`, `noidung`, `trangthai`) VALUES
(31, 18, '2015-08-03 00:00:00', 'a d s sd ad ad ad ad', 1),
(32, 15, '2015-08-01 00:00:00', 'a d s sd ad ad ad ad', 1),
(33, 2, '2015-08-04 00:00:00', 'a d s sd ad ad ad ad', 1),
(34, 14, '2015-08-07 00:00:00', 'a d s sd ad ad ad ad', 1),
(35, 13, '2015-08-08 00:00:00', 'a d s sd ad ad ad ad', 1),
(36, 18, '2015-08-08 00:00:00', 'a d s sd ad ad ad ad', 1),
(37, 2, '2015-08-08 00:00:00', 'a d s sd ad ad ad ad', 1),
(38, 18, '2015-09-08 00:00:00', 'a a  d f fd df fd fd', 1),
(39, 1, '2015-08-18 00:00:00', 'sdf sdf sadf sda fsad', 1);

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE IF NOT EXISTS `slide` (
  `id_slide` int(11) NOT NULL AUTO_INCREMENT,
  `tenslide` varchar(255) NOT NULL,
  `link` text NOT NULL,
  PRIMARY KEY (`id_slide`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id_slide`, `tenslide`, `link`) VALUES
(1, '1.jpg', ''),
(2, '2.jpg', ''),
(3, '3.jpg', ''),
(4, '4.jpg', ''),
(5, '6.jpg', '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hoso`
--
ALTER TABLE `hoso`
  ADD CONSTRAINT `hoso_ibfk_1` FOREIGN KEY (`iddanhba`) REFERENCES `danhba` (`iddanhba`) ON UPDATE CASCADE,
  ADD CONSTRAINT `hoso_ibfk_2` FOREIGN KEY (`idloai`) REFERENCES `loaihoso` (`idloai`) ON UPDATE CASCADE;

--
-- Constraints for table `nhatky`
--
ALTER TABLE `nhatky`
  ADD CONSTRAINT `nhatky_ibfk_1` FOREIGN KEY (`iddanhba`) REFERENCES `danhba` (`iddanhba`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
