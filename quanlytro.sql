-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2024 at 07:17 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlytro`
--

-- --------------------------------------------------------

--
-- Table structure for table `chutro`
--

CREATE TABLE `chutro` (
  `IDChuTro` int(11) NOT NULL,
  `HoTenCT` varchar(60) NOT NULL,
  `GioiTinh` int(11) NOT NULL,
  `SDT` int(11) NOT NULL,
  `CCCD` int(12) NOT NULL,
  `DiaChi` varchar(200) NOT NULL,
  `NamSinh` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chutro`
--

INSERT INTO `chutro` (`IDChuTro`, `HoTenCT`, `GioiTinh`, `SDT`, `CCCD`, `DiaChi`, `NamSinh`) VALUES
(451286707, 'Đinh Thành Trọng', 0, 873645280, 2147483647, 'ssssdsaaasda', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `IDKhach` int(11) NOT NULL,
  `TenKhachHang` varchar(60) NOT NULL,
  `SDT` int(11) NOT NULL,
  `GioiTinh` int(11) NOT NULL,
  `CCCD` int(11) NOT NULL,
  `QueQuan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `khoangcach`
--

CREATE TABLE `khoangcach` (
  `IDKhuTro` int(11) NOT NULL,
  `IDTruong` int(11) NOT NULL,
  `KhoangCach` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `khutro`
--

CREATE TABLE `khutro` (
  `IDKhuTro` int(11) NOT NULL,
  `TenKhuTro` varchar(60) NOT NULL,
  `DiaChi` varchar(200) NOT NULL,
  `SoPhong` int(11) NOT NULL,
  `KinhDo` decimal(10,8) NOT NULL,
  `ViDo` decimal(10,8) NOT NULL,
  `IDChuTro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `khutro`
--

INSERT INTO `khutro` (`IDKhuTro`, `TenKhuTro`, `DiaChi`, `SoPhong`, `KinhDo`, `ViDo`, `IDChuTro`) VALUES
(31005038, 'nhaf ma', 'can tho', 0, 14.00000000, 11.00000000, 451286707),
(785146244, 'nhaf ma 1', 'can tho', 0, 14.00000000, 11.00000000, 451286707);

-- --------------------------------------------------------

--
-- Table structure for table `loaiphong`
--

CREATE TABLE `loaiphong` (
  `IDLoaiPhong` int(11) NOT NULL,
  `TenLoaiPhong` varchar(60) NOT NULL,
  `SoNguoi` int(11) NOT NULL,
  `DienTich` int(11) NOT NULL,
  `GiaThue` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phong`
--

CREATE TABLE `phong` (
  `IDPhong` int(11) NOT NULL,
  `STT` int(11) NOT NULL,
  `TinhTrang` varchar(200) NOT NULL,
  `IDLoaiPhong` int(11) NOT NULL,
  `IDKhuTro` int(11) NOT NULL,
  `IDChuTro` int(11) NOT NULL,
  `IDKhach` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `truongdh_cd`
--

CREATE TABLE `truongdh_cd` (
  `IDTruong` int(11) NOT NULL,
  `TenTruong` varchar(60) NOT NULL,
  `Icon` varchar(200) NOT NULL,
  `KinhDo` int(11) NOT NULL,
  `ViDo` int(11) NOT NULL,
  `DiaChi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `IDUser` int(11) NOT NULL,
  `Username` varchar(60) NOT NULL,
  `Pass` varchar(60) NOT NULL,
  `Role` int(11) NOT NULL,
  `IDChuTro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`IDUser`, `Username`, `Pass`, `Role`, `IDChuTro`) VALUES
(724575241, 'admin', '123', 0, 451286707);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chutro`
--
ALTER TABLE `chutro`
  ADD PRIMARY KEY (`IDChuTro`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`IDKhach`);

--
-- Indexes for table `khoangcach`
--
ALTER TABLE `khoangcach`
  ADD KEY `IDKhuTro` (`IDKhuTro`),
  ADD KEY `IDTruong` (`IDTruong`);

--
-- Indexes for table `khutro`
--
ALTER TABLE `khutro`
  ADD PRIMARY KEY (`IDKhuTro`),
  ADD KEY `IDChuTro` (`IDChuTro`);

--
-- Indexes for table `loaiphong`
--
ALTER TABLE `loaiphong`
  ADD PRIMARY KEY (`IDLoaiPhong`);

--
-- Indexes for table `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`IDPhong`),
  ADD KEY `IDKhach` (`IDKhach`),
  ADD KEY `IDLoaiphong1` (`IDLoaiPhong`),
  ADD KEY `IDKhuTro2` (`IDKhuTro`),
  ADD KEY `IDChuTro2` (`IDChuTro`);

--
-- Indexes for table `truongdh_cd`
--
ALTER TABLE `truongdh_cd`
  ADD PRIMARY KEY (`IDTruong`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`IDUser`),
  ADD KEY `IDChuTro` (`IDChuTro`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chutro`
--
ALTER TABLE `chutro`
  MODIFY `IDChuTro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=889312685;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `IDKhach` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `khutro`
--
ALTER TABLE `khutro`
  MODIFY `IDKhuTro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=785146245;

--
-- AUTO_INCREMENT for table `loaiphong`
--
ALTER TABLE `loaiphong`
  MODIFY `IDLoaiPhong` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phong`
--
ALTER TABLE `phong`
  MODIFY `IDPhong` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `truongdh_cd`
--
ALTER TABLE `truongdh_cd`
  MODIFY `IDTruong` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `IDUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=885252135;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `khoangcach`
--
ALTER TABLE `khoangcach`
  ADD CONSTRAINT `IDKhuTro` FOREIGN KEY (`IDKhuTro`) REFERENCES `khutro` (`IDKhuTro`),
  ADD CONSTRAINT `IDTruong` FOREIGN KEY (`IDTruong`) REFERENCES `truongdh_cd` (`IDTruong`);

--
-- Constraints for table `khutro`
--
ALTER TABLE `khutro`
  ADD CONSTRAINT `IDChuTro` FOREIGN KEY (`IDChuTro`) REFERENCES `chutro` (`IDChuTro`);

--
-- Constraints for table `phong`
--
ALTER TABLE `phong`
  ADD CONSTRAINT `IDChuTro2` FOREIGN KEY (`IDChuTro`) REFERENCES `chutro` (`IDChuTro`),
  ADD CONSTRAINT `IDKhach` FOREIGN KEY (`IDKhach`) REFERENCES `khachhang` (`IDKhach`),
  ADD CONSTRAINT `IDKhuTro2` FOREIGN KEY (`IDKhuTro`) REFERENCES `khutro` (`IDKhuTro`),
  ADD CONSTRAINT `IDLoaiphong1` FOREIGN KEY (`IDLoaiPhong`) REFERENCES `loaiphong` (`IDLoaiPhong`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`IDChuTro`) REFERENCES `chutro` (`IDChuTro`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
