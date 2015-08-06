-- phpMyAdmin SQL Dump
-- version 3.5.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 03, 2015 at 01:02 PM
-- Server version: 5.5.28-log
-- PHP Version: 5.4.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`idMenu`, `nameMenu`, `linkMenu`, `iclass`, `titleMenu`, `newPageMenu`, `isParent`, `id_parent`, `thutu`, `isPublished`) VALUES
(1, 'hethong', 'index.php', 'home', 'HỆ THỐNG', 0, 1, 0, 1, 1),
(2, 'nhandulieu', 'index.php?action=nhandulieu', 'active hover', 'NHẬN DỮ LIỆU', 0, 1, 0, 2, 1),
(3, 'inbaocao', 'index.php', NULL, 'IN BÁO CÁO', 0, 1, 0, 3, 1),
(14, 'dsdoithue', 'index.php?action=hethong&menu=dsdt', NULL, 'Danh sách Đội thuế', 0, 2, 1, 1, 1),
(15, 'qltruycap', 'index.php?action=hethong&menu=qltc&m1=dkmoi', NULL, 'Quản lý truy cập', 0, 2, 1, 2, 1),
(17, 'chitiet', 'index.php?action=inbaocao&menu=chitiet&m1=dsdoithue', NULL, 'Chi tiết', 0, 2, 3, 1, 1),
(18, 'tonghop', 'index.php?action=inbaocao&menu=tonghop', NULL, 'Tổng hợp', 0, 2, 3, 2, 1),
(19, 'capnhatmoi', 'index.php?action=hethong&menu=qltc&m1=dkymoi', NULL, 'Cập nhật USER mới', 0, 3, 15, 1, 1),
(20, 'capnhattamngung', 'index.php?action=hethong&menu=qltc&m1=dkyngung', NULL, 'Cập nhật tạm ngưng truy cập', 0, 3, 15, 2, 1),
(21, 'indsdoithue', 'index.php?action=inbaocao&menu=chitiet&m1=dsdoithue', NULL, 'Danh sách Đội thuế', 0, 3, 17, 1, 1),
(22, 'indsnguoidung', 'index.php?action=inbaocao&menu=chitiet&m1=dsnhanvien', NULL, 'Danh sách Người dùng', 0, 3, 17, 2, 1),
(23, 'indstruycap', 'index.php?action=inbaocao&menu=tonghop&m1=dstruycap', NULL, 'Danh sách Truy cập VPĐT', 0, 3, 18, 1, 1),
(24, 'indskotruycap', 'index.php?action=inbaocao&menu=tonghop&m1=dskotruycap', NULL, 'Danh sách không truy cập VPĐT', 0, 3, 18, 2, 1),
(25, 'indstamdung', 'index.php?action=inbaocao&menu=chitiet&m1=dstamdung', NULL, 'Danh sách tạm dừng truy cập', 0, 3, 17, 5, 1),
(26, 'inthongke', 'index.php?action=inbaocao&menu=thongke', NULL, 'Thống kê truy cậo', 0, 2, 3, 3, 1);

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
