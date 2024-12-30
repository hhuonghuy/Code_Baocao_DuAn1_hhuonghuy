-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2022 at 07:34 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `figcom`
--

-- --------------------------------------------------------

--
-- Table structure for table `ctđh`
--

CREATE TABLE `ctđh` (
  `ID` int(11) NOT NULL,
  `ID_user` int(11) NOT NULL,
  `Tongdonhang` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ctđh`
--

INSERT INTO `ctđh` (`ID`, `ID_user`, `Tongdonhang`) VALUES
(1, 1, '300.000vnđ');

-- --------------------------------------------------------

--
-- Table structure for table `danhmucs`
--

CREATE TABLE `danhmucs` (
  `ID` int(11) NOT NULL,
  `Tendm` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `danhmucs`
--

INSERT INTO `danhmucs` (`ID`, `Tendm`, `updated_at`, `created_at`) VALUES
(1, 'DragonBalls', NULL, NULL),
(3, 'Lego', 2022, 2022),
(4, 'number1', 2022, 2022);

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `ID` int(11) NOT NULL,
  `ID_ctđh` int(11) NOT NULL,
  `ID_sp` int(11) NOT NULL,
  `Tensp` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Soluong` int(11) NOT NULL,
  `Gia` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`ID`, `ID_ctđh`, `ID_sp`, `Tensp`, `Soluong`, `Gia`) VALUES
(1, 1, 1, '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sanphams`
--

CREATE TABLE `sanphams` (
  `ID` int(11) NOT NULL,
  `Tensp` varchar(80) NOT NULL,
  `Gia` varchar(80) NOT NULL,
  `Soluong` int(11) NOT NULL,
  `Hinhanh` varchar(80) NOT NULL,
  `Mausac` varchar(80) NOT NULL,
  `Mota` varchar(80) NOT NULL,
  `ID_dm` int(11) NOT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sanphams`
--

INSERT INTO `sanphams` (`ID`, `Tensp`, `Gia`, `Soluong`, `Hinhanh`, `Mausac`, `Mota`, `ID_dm`, `updated_at`, `created_at`) VALUES
(1, 'Figure dragonballs', '100.000vnd', 10, '???', 'Vang', 'Mô hình đồ chơi 7 viên ngọc rồng', 1, NULL, NULL),
(2, '1', '', 0, '', '', '', 0, '2022-11-09', '2022-11-08'),
(3, 'a', 'a', 0, 'a', 'â', 'ass', 0, '2022-11-08', '2022-11-08'),
(4, 'b', 'ab', 0, 'ab', 'âb', 'assb', 0, '2022-11-08', '2022-11-08'),
(9, 'h12hádhashkjad', 's2', 2, '', 's', 's', 0, '2022-11-09', '2022-11-09');

-- --------------------------------------------------------

--
-- Table structure for table `thanhtoan`
--

CREATE TABLE `thanhtoan` (
  `ID` int(11) NOT NULL,
  `ID_ctđh` int(11) NOT NULL,
  `Soluong` int(11) NOT NULL,
  `Tinhtrang` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thanhtoan`
--

INSERT INTO `thanhtoan` (`ID`, `ID_ctđh`, `Soluong`, `Tinhtrang`) VALUES
(1, 1, 3, 'Hoạt động');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Tentk` varchar(80) NOT NULL,
  `Matkhau` varchar(80) NOT NULL,
  `Diachi` varchar(80) NOT NULL,
  `Email` varchar(80) NOT NULL,
  `SĐT` int(11) NOT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Tentk`, `Matkhau`, `Diachi`, `Email`, `SĐT`, `updated_at`, `created_at`) VALUES
(1, 'khoa', 'admin', '123 Hùng Vương', 'nguyenkhoa@gmail.com', 12345678, NULL, NULL),
(3, 'admin', 'admin', 'ad', 'nguyenkhoalk01@gmail.com', 123123, 2022, 2022);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ctđh`
--
ALTER TABLE `ctđh`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_ctđh` (`ID_user`);

--
-- Indexes for table `danhmucs`
--
ALTER TABLE `danhmucs`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_donhang` (`ID_sp`),
  ADD KEY `fk_donhang2` (`ID_ctđh`);

--
-- Indexes for table `sanphams`
--
ALTER TABLE `sanphams`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_sanpham` (`ID_dm`);

--
-- Indexes for table `thanhtoan`
--
ALTER TABLE `thanhtoan`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_thanhtoan` (`ID_ctđh`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ctđh`
--
ALTER TABLE `ctđh`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `danhmucs`
--
ALTER TABLE `danhmucs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sanphams`
--
ALTER TABLE `sanphams`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `thanhtoan`
--
ALTER TABLE `thanhtoan`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ctđh`
--
ALTER TABLE `ctđh`
  ADD CONSTRAINT `fk_ctđh` FOREIGN KEY (`ID_user`) REFERENCES `users` (`ID`);

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `fk_donhang` FOREIGN KEY (`ID_sp`) REFERENCES `sanphams` (`ID`),
  ADD CONSTRAINT `fk_donhang2` FOREIGN KEY (`ID_ctđh`) REFERENCES `ctđh` (`ID`);

--
-- Constraints for table `thanhtoan`
--
ALTER TABLE `thanhtoan`
  ADD CONSTRAINT `fk_thanhtoan` FOREIGN KEY (`ID_ctđh`) REFERENCES `ctđh` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
