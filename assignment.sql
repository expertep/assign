-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2017 at 01:32 PM
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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `views` int(7) DEFAULT '1',
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`views`, `date`) VALUES
(52, '2017-05-12'),
(100, '2017-04-12'),
(75, '2017-03-12'),
(34, '2017-02-12'),
(2, '2016-12-12'),
(23, '2017-01-12');

-- --------------------------------------------------------

--
-- Table structure for table `table_bill`
--

CREATE TABLE `table_bill` (
  `bill_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `amount` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `table_bill`
--

INSERT INTO `table_bill` (`bill_id`, `order_id`, `product_id`, `amount`) VALUES
(1, 3, 16, 1),
(2, 3, 19, 1),
(3, 5, 16, 1),
(4, 5, 17, 1),
(5, 7, 16, 1),
(6, 7, 17, 1),
(7, 8, 16, 2),
(8, 10, 17, 1),
(9, 11, 17, 1),
(10, 13, 24, 1),
(11, 15, 24, 1),
(12, 17, 23, 1),
(13, 17, 24, 1),
(14, 18, 19, 1),
(15, 18, 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `table_member`
--

CREATE TABLE `table_member` (
  `member_id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `password` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `firstname` varchar(30) DEFAULT NULL,
  `lastname` varchar(30) DEFAULT NULL,
  `date_register` varchar(50) NOT NULL,
  `status` int(10) NOT NULL,
  `picture` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_member`
--

INSERT INTO `table_member` (`member_id`, `username`, `password`, `email`, `firstname`, `lastname`, `date_register`, `status`, `picture`, `address`) VALUES
(4, 'admin', '12345', 'admin@hotmail.com', NULL, NULL, '2017-04-09 19:48:36', 1, '', NULL),
(5, 'test', '1234', 'ccgs1513@hotmail.com', NULL, NULL, '2017-04-09 20:48:09', 0, '', NULL),
(6, 'ccgs', '1234', 'ccgs@gmail.com', NULL, NULL, '2017-04-23 16:21:27', 0, '', NULL),
(7, 'expertep', '1234', 'esred@hotmail.com', 'กวิน', 'เรืองรักษ์ลิขิต', '2017-05-06 00:18:18', 0, '', ' มหาลัยเทคโนโลยี พระจอมเกล้าพระนครเหนือ');

-- --------------------------------------------------------

--
-- Table structure for table `table_order`
--

CREATE TABLE `table_order` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `member_id` int(10) NOT NULL,
  `date` date NOT NULL,
  `pay` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'w',
  `payslip` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `table_order`
--

INSERT INTO `table_order` (`order_id`, `member_id`, `date`, `pay`, `payslip`) VALUES
(3, 7, '2017-05-08', 's', 'order/slip/772102.PNG'),
(4, 7, '2017-05-08', 'w', ''),
(5, 7, '2017-05-08', 's', ''),
(6, 7, '2017-05-08', 'w', ''),
(7, 7, '2017-05-08', 's', ''),
(8, 7, '2017-05-09', 'f', ''),
(9, 7, '2017-05-09', 'w', ''),
(10, 7, '2017-05-09', 's', ''),
(11, 7, '2017-05-09', 's', ''),
(12, 7, '2017-05-09', 'w', ''),
(13, 7, '2017-05-09', 'w', ''),
(14, 7, '2017-05-09', 'w', ''),
(15, 7, '2017-05-09', 'w', ''),
(16, 7, '2017-05-09', 'w', ''),
(17, 7, '2017-05-09', 'w', ''),
(18, 4, '2017-05-15', 'w', 'order/slip/8922424.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `table_product`
--

CREATE TABLE `table_product` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `product_price` int(50) NOT NULL,
  `product_category` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `product_type` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `product_picture` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `unit_product` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `product_number` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_product`
--

INSERT INTO `table_product` (`product_id`, `product_name`, `product_price`, `product_category`, `product_type`, `product_picture`, `unit_product`, `product_number`) VALUES
(6, '30', 30, 'หมวดหมู่1', 'หมวดหมู่1', 'product/image/1.jpg', '', 0),
(7, 'หลอดไฟ', 65, 'หมวดหมู่2', 'หมวดหมู่2', 'product/image/2.jpg', '', 20),
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
(27, 'ตะปู', 30, 'หมวดหมู่2', 'หมวดหมู่2', 'product/image/4.jpg', '', 0),
(28, 'สว่าน', 65, 'หมวดหมู่3', 'หมวดหมู่3', 'product/image/5.jpg', '', 0),
(29, 'สายไฟ', 95, 'หมวดหมู่4', 'หมวดหมู่4', 'product/image/6.jpg', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_bill`
--
ALTER TABLE `table_bill`
  ADD PRIMARY KEY (`bill_id`);

--
-- Indexes for table `table_member`
--
ALTER TABLE `table_member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `table_order`
--
ALTER TABLE `table_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `table_product`
--
ALTER TABLE `table_product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_bill`
--
ALTER TABLE `table_bill`
  MODIFY `bill_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `table_member`
--
ALTER TABLE `table_member`
  MODIFY `member_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `table_order`
--
ALTER TABLE `table_order`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `table_product`
--
ALTER TABLE `table_product`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
