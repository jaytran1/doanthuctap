-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 17, 2021 at 03:55 PM
-- Server version: 5.7.28
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlbds`
--

-- --------------------------------------------------------

--
-- Table structure for table `bat_dong_san`
--

DROP TABLE IF EXISTS `bat_dong_san`;
CREATE TABLE IF NOT EXISTS `bat_dong_san` (
  `bdsid` int(8) NOT NULL AUTO_INCREMENT,
  `tinhtrang` int(11) NOT NULL,
  `dientich` float NOT NULL,
  `dongia` float NOT NULL,
  `chieudai` float NOT NULL,
  `chieurong` float NOT NULL,
  `masoqsdd` varchar(50) DEFAULT NULL,
  `hinhanh` varchar(255) NOT NULL,
  `mota` varchar(200) NOT NULL,
  `huehong` float NOT NULL,
  `tenduong` int(11) NOT NULL,
  `sonha` varchar(50) NOT NULL,
  `phuong` varchar(50) NOT NULL,
  `quan` varchar(50) NOT NULL,
  `thanhpho` varchar(50) NOT NULL,
  `loaiid` int(8) NOT NULL,
  `khid` int(8) NOT NULL,
  PRIMARY KEY (`bdsid`),
  KEY `loaiid` (`loaiid`),
  KEY `khid` (`khid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hop_dong_chuyen_nhuong`
--

DROP TABLE IF EXISTS `hop_dong_chuyen_nhuong`;
CREATE TABLE IF NOT EXISTS `hop_dong_chuyen_nhuong` (
  `cnid` int(8) NOT NULL AUTO_INCREMENT,
  `giatri` float NOT NULL,
  `ngaylap` date NOT NULL,
  `trangthai` bit(1) NOT NULL,
  `khid` int(8) NOT NULL,
  `bdsid` int(8) NOT NULL,
  `dcid` int(8) NOT NULL,
  PRIMARY KEY (`cnid`),
  KEY `khid` (`khid`),
  KEY `bdsid` (`bdsid`),
  KEY `dcid` (`dcid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hop_dong_dat_coc`
--

DROP TABLE IF EXISTS `hop_dong_dat_coc`;
CREATE TABLE IF NOT EXISTS `hop_dong_dat_coc` (
  `dcid` int(8) NOT NULL AUTO_INCREMENT,
  `ngaylaphd` int(11) NOT NULL,
  `giatri` int(11) NOT NULL,
  `tinhtrang` int(11) NOT NULL,
  `trangthai` int(11) NOT NULL,
  `ngayhethan` int(11) NOT NULL,
  `khid` int(8) NOT NULL,
  `bdsid` int(8) NOT NULL,
  PRIMARY KEY (`dcid`),
  KEY `khid` (`khid`),
  KEY `bdsid` (`bdsid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hop_dong_ki_gui`
--

DROP TABLE IF EXISTS `hop_dong_ki_gui`;
CREATE TABLE IF NOT EXISTS `hop_dong_ki_gui` (
  `kgid` int(8) NOT NULL,
  `giatri` float NOT NULL,
  `chiphidv` float NOT NULL,
  `ngaybatdau` date NOT NULL,
  `ngayketthuc` date NOT NULL,
  `trangthai` bit(1) NOT NULL,
  `khid` int(8) NOT NULL,
  `bdsid` int(8) NOT NULL,
  PRIMARY KEY (`kgid`),
  KEY `khid` (`khid`),
  KEY `bdsid` (`bdsid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `khach_hang`
--

DROP TABLE IF EXISTS `khach_hang`;
CREATE TABLE IF NOT EXISTS `khach_hang` (
  `khid` int(8) NOT NULL AUTO_INCREMENT,
  `hoten` varchar(50) NOT NULL,
  `diachi` varchar(50) NOT NULL,
  `diachitt` varchar(50) NOT NULL,
  `cmnd` int(9) NOT NULL,
  `ngaysinh` datetime NOT NULL,
  `sodienthoai` bigint(20) NOT NULL,
  `gioitinh` tinyint(1) NOT NULL,
  `email` varchar(50) NOT NULL,
  `loaikh` tinyint(1) NOT NULL,
  `mota` varchar(50) DEFAULT NULL,
  `trangthai` tinyint(1) NOT NULL,
  `id` int(8) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`khid`),
  KEY `fk_id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `khach_hang`
--

INSERT INTO `khach_hang` (`khid`, `hoten`, `diachi`, `diachitt`, `cmnd`, `ngaysinh`, `sodienthoai`, `gioitinh`, `email`, `loaikh`, `mota`, `trangthai`, `id`, `created_at`, `updated_at`) VALUES
(5, 'teoteo2', 'aibiet', 'teo567', 678596958, '2021-04-22 00:00:00', 687958695832, 0, 'teoteo@teo', 0, NULL, 1, 4, '2021-04-17 08:52:52', '2021-04-17 08:55:20');

-- --------------------------------------------------------

--
-- Table structure for table `loai_bds`
--

DROP TABLE IF EXISTS `loai_bds`;
CREATE TABLE IF NOT EXISTS `loai_bds` (
  `loaiid` int(8) NOT NULL AUTO_INCREMENT,
  `tenloai` varchar(50) NOT NULL,
  PRIMARY KEY (`loaiid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `sdt` bigint(20) NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `sdt`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'long@gmail.com', '$2y$10$8D2tOCNk1VG0vrZCKW.VEeVjTBjwsDx3ZTh6pPtIAkk9AF2F3U9w2', 777777777, NULL, NULL, NULL),
(2, 'Kha', 'khach@gmail.com', '$2y$10$2rx5PkQbqGKsMibA3JmsseS22sisdBrpkfa6unH0L7c9tzlA24EDS', 888888888, NULL, NULL, '2021-04-17 07:47:11'),
(3, 'admin', 'admin@gmail.com', '$2y$10$DFMeA0f3hyZtEUbRHLgGz.WzNlOmjnmHdamfUWwH74lVB07e4A4rm', 999999999, NULL, NULL, NULL),
(4, 'Teonew', 'teo@123.com', '$2y$10$DrjxUPmqp76uh9dCxQtGtOl7XxMgQumre7VGt/IdMD24WkhvmOT5O', 7685768576, NULL, '2021-04-15 02:47:37', '2021-04-15 03:02:42');

-- --------------------------------------------------------

--
-- Table structure for table `yeu_cau_kh`
--

DROP TABLE IF EXISTS `yeu_cau_kh`;
CREATE TABLE IF NOT EXISTS `yeu_cau_kh` (
  `ycid` int(8) NOT NULL AUTO_INCREMENT,
  `vitri` varchar(50) NOT NULL,
  `mota` varchar(50) NOT NULL,
  `giat` float NOT NULL,
  `giaf` float NOT NULL,
  `dait` float NOT NULL,
  `daif` float NOT NULL,
  `rongt` float NOT NULL,
  `rongf` float NOT NULL,
  `loaiid` int(8) NOT NULL,
  `khid` int(8) NOT NULL,
  PRIMARY KEY (`ycid`),
  KEY `loaiid` (`loaiid`),
  KEY `khid` (`khid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bat_dong_san`
--
ALTER TABLE `bat_dong_san`
  ADD CONSTRAINT `bat_dong_san_ibfk_1` FOREIGN KEY (`loaiid`) REFERENCES `loai_bds` (`loaiid`),
  ADD CONSTRAINT `bat_dong_san_ibfk_2` FOREIGN KEY (`khid`) REFERENCES `khach_hang` (`khid`);

--
-- Constraints for table `hop_dong_chuyen_nhuong`
--
ALTER TABLE `hop_dong_chuyen_nhuong`
  ADD CONSTRAINT `hop_dong_chuyen_nhuong_ibfk_1` FOREIGN KEY (`khid`) REFERENCES `khach_hang` (`khid`),
  ADD CONSTRAINT `hop_dong_chuyen_nhuong_ibfk_2` FOREIGN KEY (`bdsid`) REFERENCES `bat_dong_san` (`bdsid`),
  ADD CONSTRAINT `hop_dong_chuyen_nhuong_ibfk_3` FOREIGN KEY (`dcid`) REFERENCES `hop_dong_dat_coc` (`dcid`);

--
-- Constraints for table `hop_dong_dat_coc`
--
ALTER TABLE `hop_dong_dat_coc`
  ADD CONSTRAINT `hop_dong_dat_coc_ibfk_1` FOREIGN KEY (`khid`) REFERENCES `khach_hang` (`khid`),
  ADD CONSTRAINT `hop_dong_dat_coc_ibfk_2` FOREIGN KEY (`bdsid`) REFERENCES `bat_dong_san` (`bdsid`);

--
-- Constraints for table `hop_dong_ki_gui`
--
ALTER TABLE `hop_dong_ki_gui`
  ADD CONSTRAINT `hop_dong_ki_gui_ibfk_1` FOREIGN KEY (`khid`) REFERENCES `khach_hang` (`khid`),
  ADD CONSTRAINT `hop_dong_ki_gui_ibfk_2` FOREIGN KEY (`bdsid`) REFERENCES `bat_dong_san` (`bdsid`);

--
-- Constraints for table `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD CONSTRAINT `khach_hang_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `yeu_cau_kh`
--
ALTER TABLE `yeu_cau_kh`
  ADD CONSTRAINT `yeu_cau_kh_ibfk_1` FOREIGN KEY (`khid`) REFERENCES `khach_hang` (`khid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `yeu_cau_kh_ibfk_2` FOREIGN KEY (`loaiid`) REFERENCES `loai_bds` (`loaiid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
