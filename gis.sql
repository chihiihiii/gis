-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 26, 2023 lúc 12:55 PM
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
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chutro`
--

CREATE TABLE `chutro` (
  `idct` int(11) NOT NULL,
  `tenct` varchar(255) DEFAULT NULL,
  `gioitinh` int(11) DEFAULT NULL,
  `sdt` varchar(10) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chutro`
--

INSERT INTO `chutro` (`idct`, `tenct`, `gioitinh`, `sdt`, `username`, `email`, `password`) VALUES
(1, 'chi', 0, '0123456789', 'chi', NULL, 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'chihihi', NULL, NULL, 'chihihi', NULL, '123456');

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

--
-- Đang đổ dữ liệu cho bảng `khutro`
--

INSERT INTO `khutro` (`idkt`, `tenkt`, `diachi`, `latitude`, `longitude`, `idct`) VALUES
(1, 'khu tro 1', 'quan cam', 123, 123, 1),
(2, 'khu tro 2', 'sai gon', 456, 345, 1),
(3, 'khu tro cua chihihi', NULL, NULL, NULL, 2);

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
  `idkt` int(11) NOT NULL,
  `idct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `loaiphong`
--

INSERT INTO `loaiphong` (`idlp`, `tenlp`, `songuoi`, `dientich`, `gia`, `idkt`, `idct`) VALUES
(1, 'loai phòng 2', 1, 123, 123, 2, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phong`
--

CREATE TABLE `phong` (
  `idp` int(11) NOT NULL,
  `stt` int(11) DEFAULT NULL,
  `tinhtrang` int(11) DEFAULT NULL,
  `idkt` int(11) NOT NULL,
  `idlp` int(11) NOT NULL,
  `idct` int(11) NOT NULL
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

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chutro`
--
ALTER TABLE `chutro`
  ADD PRIMARY KEY (`idct`),
  ADD UNIQUE KEY `username` (`username`);

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
  ADD KEY `idkt` (`idkt`),
  ADD KEY `idct` (`idct`);

--
-- Chỉ mục cho bảng `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`idp`),
  ADD KEY `idkt` (`idkt`),
  ADD KEY `idlp` (`idlp`),
  ADD KEY `idct` (`idct`);

--
-- Chỉ mục cho bảng `truong`
--
ALTER TABLE `truong`
  ADD PRIMARY KEY (`idtr`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `chutro`
--
ALTER TABLE `chutro`
  MODIFY `idct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `khoangcach`
--
ALTER TABLE `khoangcach`
  MODIFY `idkc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `khutro`
--
ALTER TABLE `khutro`
  MODIFY `idkt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `loaiphong`
--
ALTER TABLE `loaiphong`
  MODIFY `idlp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  ADD CONSTRAINT `loaiphong_ibfk_1` FOREIGN KEY (`idkt`) REFERENCES `khutro` (`idkt`),
  ADD CONSTRAINT `loaiphong_ibfk_2` FOREIGN KEY (`idct`) REFERENCES `chutro` (`idct`);

--
-- Các ràng buộc cho bảng `phong`
--
ALTER TABLE `phong`
  ADD CONSTRAINT `phong_ibfk_1` FOREIGN KEY (`idlp`) REFERENCES `loaiphong` (`idlp`),
  ADD CONSTRAINT `phong_ibfk_2` FOREIGN KEY (`idkt`) REFERENCES `khutro` (`idkt`),
  ADD CONSTRAINT `phong_ibfk_3` FOREIGN KEY (`idct`) REFERENCES `chutro` (`idct`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
