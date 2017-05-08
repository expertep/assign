-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2017 at 12:47 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `table_product`
--

CREATE TABLE `table_product` (
  `id_product` int(10) UNSIGNED NOT NULL,
  `name_product` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `price_product` int(50) NOT NULL,
  `category_product` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `type_product` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `picture_product` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `unit_product` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `number_product` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_product`
--

INSERT INTO `table_product` (`id_product`, `name_product`, `price_product`, `category_product`, `type_product`, `picture_product`, `unit_product`, `number_product`) VALUES
(6, 'ตะปู', 30, 'หมวดหมู่1', 'หมวดหมู่1', 'product/image/1.jpg', '', 0),
(7, 'ตะไป', 65, 'หมวดหมู่2', 'หมวดหมู่2', 'product/image/2.jpg', '', 0),
(8, 'ตะกร้อม', 95, 'หมวดหมู่3', 'หมวดหมู่3', 'product/image/3.jpg', '', 0),
(9, 'ตะปู', 30, 'หมวดหมู่4', 'หมวดหมู่4', 'product/image/4.jpg', '', 0),
(10, 'ตะไป', 65, 'หมวดหมู่5', 'หมวดหมู่5', 'product/image/5.jpg', '', 0),
(11, 'ตะกร้อม', 95, 'หมวดหมู่1', 'หมวดหมู่1', 'product/image/6.jpg', '', 0),
(12, 'ตะปู', 30, 'หมวดหมู่2', 'หมวดหมู่2', 'product/image/1.jpg', '', 0),
(13, 'ตะไป', 65, 'หมวดหมู่3', 'หมวดหมู่3', 'product/image/2.jpg', '', 0),
(14, 'ตะกร้อม', 95, 'หมวดหมู่4', 'หมวดหมู่4', 'product/image/3.jpg', '', 0),
(15, 'ตะปู', 30, 'หมวดหมู่5', 'หมวดหมู่5', 'product/image/4.jpg', '', 0),
(16, 'ตะไป', 65, 'หมวดหมู่1', 'หมวดหมู่1', 'product/image/5.jpg', '', 0),
(17, 'ตะกร้อม', 95, 'หมวดหมู่2', 'หมวดหมู่2', 'product/image/6.jpg', '', 0),
(18, 'ตะปู', 30, 'หมวดหมู่3', 'หมวดหมู่3', 'product/image/1.jpg', '', 0),
(19, 'ตะไป', 65, 'หมวดหมู่4', 'หมวดหมู่4', 'product/image/2.jpg', '', 0),
(20, 'ตะกร้อม', 95, 'หมวดหมู่5', 'หมวดหมู่5', 'product/image/3.jpg', '', 0),
(21, 'ตะปู', 30, 'หมวดหมู่1', 'หมวดหมู่1', 'product/image/4.jpg', '', 0),
(22, 'ตะไป', 65, 'หมวดหมู่2', 'หมวดหมู่2', 'product/image/5.jpg', '', 0),
(23, 'ตะกร้อม', 95, 'หมวดหมู่3', 'หมวดหมู่3', 'product/image/6.jpg', '', 0),
(24, 'ตะปู', 30, 'หมวดหมู่4', 'หมวดหมู่4', 'product/image/1.jpg', '', 0),
(25, 'ตะไป', 65, 'หมวดหมู่5', 'หมวดหมู่5', 'product/image/2.jpg', '', 0),
(26, 'ตะกร้อม', 95, 'หมวดหมู่1', 'หมวดหมู่1', 'product/image/3.jpg', '', 0),
(27, 'ตะปู', 30, 'หมวดหมู่2', 'หมวดหมู่2', 'product/image/4.jpg', '', 0),
(28, 'ตะไป', 65, 'หมวดหมู่3', 'หมวดหมู่3', 'product/image/5.jpg', '', 0),
(29, 'ตะกร้อม', 95, 'หมวดหมู่4', 'หมวดหมู่4', 'product/image/6.jpg', '', 0),
(30, 'ตะปู', 30, 'หมวดหมู่5', 'หมวดหมู่5', 'product/image/1.jpg', '', 0),
(31, 'ตะไป', 65, 'หมวดหมู่1', 'หมวดหมู่1', 'product/image/2.jpg', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_product`
--
ALTER TABLE `table_product`
  ADD PRIMARY KEY (`id_product`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_product`
--
ALTER TABLE `table_product`
  MODIFY `id_product` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
