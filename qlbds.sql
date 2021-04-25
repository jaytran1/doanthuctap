-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 25, 2021 at 02:16 PM
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
  `tinhtrang` tinyint(1) NOT NULL,
  `dientich` float NOT NULL,
  `dongia` float NOT NULL,
  `chieudai` float NOT NULL,
  `chieurong` float NOT NULL,
  `masoqsdd` varchar(50) DEFAULT NULL,
  `hinhanh` varchar(255) DEFAULT NULL,
  `mota` longtext,
  `huehong` float NOT NULL,
  `tenduong` varchar(50) NOT NULL,
  `sonha` varchar(50) NOT NULL,
  `phuong` varchar(50) NOT NULL,
  `quan` varchar(50) NOT NULL,
  `thanhpho` varchar(50) NOT NULL,
  `loaiid` int(8) NOT NULL,
  `khid` int(8) NOT NULL,
  PRIMARY KEY (`bdsid`),
  KEY `loaiid` (`loaiid`),
  KEY `khid` (`khid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bat_dong_san`
--

INSERT INTO `bat_dong_san` (`bdsid`, `tinhtrang`, `dientich`, `dongia`, `chieudai`, `chieurong`, `masoqsdd`, `hinhanh`, `mota`, `huehong`, `tenduong`, `sonha`, `phuong`, `quan`, `thanhpho`, `loaiid`, `khid`) VALUES
(3, 1, 45, 45, 45, 45, NULL, 'hJx_dia-oc-ali.jpg', 'Alibaba Central Park di chuyển đến siêu dự án sân bay quốc tế Long Thành chỉ 10 phút, khi công bố ra mắt dự án các nhà đầu tư đều thực sự khó tin khi có thể sở hữu một vị trí đắc địa như thế ở vùng ven đô.', 445, 'bvbgg', '56/5', '4', '12', 'hcm', 4, 2),
(4, 1, 7868, 67868, 678, 67868, NULL, 'VMt_31531392.jpg', 'Như một quy luật tự nhiên, tất cả các thủ đô lớn, các thành phố phát triển trên thế giới đều có những dòng sông chảy qua. New York, Tokyo, Seoul hay Moscow… không nơi nào thiếu một dòng nước xuyên qua giữa lòng thành phố.', 678, 'gfdgdf', 'dfsdf', 'sdfsf', 'dfs', 'fdsfs', 1, 2),
(5, 1, 6456460, 5645650, 45646, 456, NULL, 'tmZ_images1542933_a1.jpg', 'Alibaba Central Park di chuyển đến siêu dự án sân bay quốc tế Long Thành chỉ 10 phút, khi công bố ra mắt dự án các nhà đầu tư đều thực sự khó tin khi có thể sở hữu một vị trí đắc địa như thế ở vùng ven đô.', 54646, '456', '456', '456', '456', '45345', 1, 2),
(6, 1, 7675, 56757, 56757, 5675, NULL, 'gcL_tin-bat-dong-san-4.jpg', 'Khu đô thị Sala Đại Quang Minh nằm trong khu Đô thị tài chính quốc tế Thủ Thiêm được đầu tư và phát triển bởi Công ty Đại Quang Minh, cùng với Phú Mỹ Hưng, Sala Thủ Thiêm sẽ là một trong 2 khu đô thị kiểu mẫu hiện đại bậc nhất Việt Nam và Đông Nam Á, hứa hẹn sẽ mang đến giá trị tương lai lớn cho cư dân Sala Thủ Thiêm nơi đây.', 7675, '7567', '567', '5675', '567', '5675', 1, 2),
(7, 1, 6456, 45656, 4564, 456456, NULL, 'cWa_Ton-kho-bat-dong-san.jpg', 'Lakeview City - Khu đô thị hoàn chỉnh và đồng bộ tại Quận 2 được phát triển bởi tập đoàn Novaland. Dự án tọa lạc tại Phường An Phú, Quận 2, ngay mặt tiền đường Song hành Cao tốc Long Thành – Dầu Giây, liền kề trung tâm hành chính Thủ Thiêm, kết nối nhanh chóng với Quận 1 qua tuyến đường huyết mạch Mai Chí Thọ, kết nối với Quận 7 dễ dàng thông qua đường Vành Đai 2.', 45646, '4564', '546', '456', '45654', 'hcm', 3, 2);

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
  `cmnd` varchar(12) NOT NULL,
  `ngaysinh` date NOT NULL,
  `sodienthoai` varchar(20) NOT NULL,
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
(2, 'tommy', '454', '454', '667857685758', '2021-04-12', '65656786897', 0, 'tom@toona.com', 0, NULL, 1, 3, '2021-04-22 00:00:08', '2021-04-22 00:20:35'),
(5, 'teoomybruh', '560hcm', '567', '090986758475', '2021-04-28', '0909669966', 0, 'chiu@bietchetlien.com', 0, NULL, 1, 1, '2021-04-25 02:22:56', '2021-04-25 02:22:56');

-- --------------------------------------------------------

--
-- Table structure for table `loai_bds`
--

DROP TABLE IF EXISTS `loai_bds`;
CREATE TABLE IF NOT EXISTS `loai_bds` (
  `loaiid` int(8) NOT NULL AUTO_INCREMENT,
  `tenloai` varchar(50) NOT NULL,
  PRIMARY KEY (`loaiid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loai_bds`
--

INSERT INTO `loai_bds` (`loaiid`, `tenloai`) VALUES
(1, 'Căn hộ chung cư'),
(2, 'Đất nghĩa trang'),
(3, 'Khu nghỉ dưỡng'),
(4, 'Đất trống');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `sdt`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'long@gmail.com', '$2y$10$8D2tOCNk1VG0vrZCKW.VEeVjTBjwsDx3ZTh6pPtIAkk9AF2F3U9w2', 777777777, NULL, NULL, NULL),
(2, 'Kha', 'khach@gmail.com', '$2y$10$2rx5PkQbqGKsMibA3JmsseS22sisdBrpkfa6unH0L7c9tzlA24EDS', 888888888, NULL, NULL, '2021-04-17 07:47:11'),
(3, 'admin', 'admin@gmail.com', '$2y$10$DFMeA0f3hyZtEUbRHLgGz.WzNlOmjnmHdamfUWwH74lVB07e4A4rm', 999999999, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `yeu_cau_kh`
--

DROP TABLE IF EXISTS `yeu_cau_kh`;
CREATE TABLE IF NOT EXISTS `yeu_cau_kh` (
  `ycid` int(8) NOT NULL AUTO_INCREMENT,
  `vitri` varchar(50) NOT NULL,
  `mota` varchar(50) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `yeu_cau_kh`
--

INSERT INTO `yeu_cau_kh` (`ycid`, `vitri`, `mota`, `giat`, `giaf`, `dait`, `daif`, `rongt`, `rongf`, `loaiid`, `khid`) VALUES
(1, 'yu7', '5000000000', 5000000000, 6000000000, 45, 56, 45, 67, 1, 2);

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
