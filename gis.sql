-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 25, 2023 lúc 08:02 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `gis`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chutro`
--

CREATE TABLE `chutro` (
  `idct` int(11) NOT NULL,
  `tenct` varchar(255) DEFAULT NULL,
  `gioitinh` int(11) DEFAULT NULL,
  `sdt` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoangcach`
--

CREATE TABLE `khoangcach` (
  `idkc` int(11) NOT NULL,
  `khoangcach` float NOT NULL,
  `idkt` int(11) NOT NULL,
  `idtr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khutro`
--

CREATE TABLE `khutro` (
  `idkt` int(11) NOT NULL,
  `tenkt` varchar(255) DEFAULT NULL,
  `diachi` varchar(255) DEFAULT NULL,
  `latitude` float DEFAULT NULL,
  `longitude` float DEFAULT NULL,
  `idct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaiphong`
--

CREATE TABLE `loaiphong` (
  `idlp` int(11) NOT NULL,
  `tenlp` varchar(255) DEFAULT NULL,
  `songuoi` int(11) DEFAULT NULL,
  `dientich` float DEFAULT NULL,
  `gia` double DEFAULT NULL,
  `idkt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phong`
--

CREATE TABLE `phong` (
  `idp` int(11) NOT NULL,
  `stt` int(11) DEFAULT NULL,
  `tinhtrang` int(11) DEFAULT NULL,
  `idkt` int(11) NOT NULL,
  `idlp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `truong`
--

CREATE TABLE `truong` (
  `idtr` int(11) NOT NULL,
  `tentr` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `latitude` float DEFAULT NULL,
  `longitude` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chutro`
--
ALTER TABLE `chutro`
  ADD PRIMARY KEY (`idct`);

--
-- Chỉ mục cho bảng `khoangcach`
--
ALTER TABLE `khoangcach`
  ADD PRIMARY KEY (`idkc`),
  ADD KEY `idkt` (`idkt`),
  ADD KEY `idtr` (`idtr`);

--
-- Chỉ mục cho bảng `khutro`
--
ALTER TABLE `khutro`
  ADD PRIMARY KEY (`idkt`),
  ADD KEY `idct` (`idct`);

--
-- Chỉ mục cho bảng `loaiphong`
--
ALTER TABLE `loaiphong`
  ADD PRIMARY KEY (`idlp`),
  ADD KEY `idkt` (`idkt`);

--
-- Chỉ mục cho bảng `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`idp`),
  ADD KEY `idkt` (`idkt`),
  ADD KEY `idlp` (`idlp`);

--
-- Chỉ mục cho bảng `truong`
--
ALTER TABLE `truong`
  ADD PRIMARY KEY (`idtr`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chutro`
--
ALTER TABLE `chutro`
  MODIFY `idct` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `khoangcach`
--
ALTER TABLE `khoangcach`
  MODIFY `idkc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `khutro`
--
ALTER TABLE `khutro`
  MODIFY `idkt` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `loaiphong`
--
ALTER TABLE `loaiphong`
  MODIFY `idlp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `phong`
--
ALTER TABLE `phong`
  MODIFY `idp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `truong`
--
ALTER TABLE `truong`
  MODIFY `idtr` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `khoangcach`
--
ALTER TABLE `khoangcach`
  ADD CONSTRAINT `khoangcach_ibfk_1` FOREIGN KEY (`idkt`) REFERENCES `khutro` (`idkt`),
  ADD CONSTRAINT `khoangcach_ibfk_2` FOREIGN KEY (`idtr`) REFERENCES `truong` (`idtr`);

--
-- Các ràng buộc cho bảng `khutro`
--
ALTER TABLE `khutro`
  ADD CONSTRAINT `khutro_ibfk_1` FOREIGN KEY (`idct`) REFERENCES `chutro` (`idct`);

--
-- Các ràng buộc cho bảng `loaiphong`
--
ALTER TABLE `loaiphong`
  ADD CONSTRAINT `loaiphong_ibfk_1` FOREIGN KEY (`idkt`) REFERENCES `khutro` (`idkt`);

--
-- Các ràng buộc cho bảng `phong`
--
ALTER TABLE `phong`
  ADD CONSTRAINT `phong_ibfk_1` FOREIGN KEY (`idlp`) REFERENCES `loaiphong` (`idlp`),
  ADD CONSTRAINT `phong_ibfk_2` FOREIGN KEY (`idkt`) REFERENCES `khutro` (`idkt`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
