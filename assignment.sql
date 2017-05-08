-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 02, 2017 at 05:58 AM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

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
-- Table structure for table `table_member`
--

CREATE TABLE `table_member` (
  `member_id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `password` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `date_register` varchar(50) NOT NULL,
  `status` int(10) NOT NULL,
  `picture` varchar(200) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_member`
--

INSERT INTO `table_member` (`member_id`, `username`, `password`, `email`, `date_register`, `status`, `picture`) VALUES
(4, 'admin', '1234', 'admin@hotmail.com', '2017-04-09 19:48:36', 1, ''),
(5, 'test', '1234', 'ccgs1513@hotmail.com', '2017-04-09 20:48:09', 0, ''),
(6, 'ccgs', '1234', 'ccgs@gmail.com', '2017-04-23 16:21:27', 0, '');

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
(3, 'ตะปู', 150, 'หมวดหมู่1', 'หมวดหมู่1', 'product/image/6319881.jpg', 'หมวดหมู่1', 3),
(4, 'ตะไบ', 100, 'หมวดหมู่1', 'หมวดหมู่1', 'product/image/55047662b103e945fd1e074103a3c755a555fc-1200-80.jpg', 'หมวดหมู่1', 5),
(5, 'ตะกร้อ', 250, 'หมวดหมู่1', 'หมวดหมู่1', 'product/image/81036362b103e945fd1e074103a3c755a555fc-1200-80.jpg', 'หมวดหมู่1', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_member`
--
ALTER TABLE `table_member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `table_product`
--
ALTER TABLE `table_product`
  ADD PRIMARY KEY (`id_product`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_member`
--
ALTER TABLE `table_member`
  MODIFY `member_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `table_product`
--
ALTER TABLE `table_product`
  MODIFY `id_product` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
