-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 30, 2017 at 05:00 PM
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
-- Table structure for table `table_detail_discount`
--

CREATE TABLE `table_detail_discount` (
  `Detail_ID_Discount` int(10) NOT NULL,
  `ID_Discount` int(3) NOT NULL,
  `member_id` int(10) NOT NULL,
  `Code_Discount` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_detail_discount`
--

INSERT INTO `table_detail_discount` (`Detail_ID_Discount`, `ID_Discount`, `member_id`, `Code_Discount`, `Date`) VALUES
(2, 1, 4, '10YEAR', '2017-05-29');

-- --------------------------------------------------------

--
-- Table structure for table `table_discount`
--

CREATE TABLE `table_discount` (
  `ID_Discount` int(3) NOT NULL,
  `Code_Discount` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `Percent_Discount` int(5) NOT NULL,
  `Start_Discount` date NOT NULL,
  `End_Discount` date NOT NULL,
  `Status_Discount` varchar(2) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_discount`
--

INSERT INTO `table_discount` (`ID_Discount`, `Code_Discount`, `Percent_Discount`, `Start_Discount`, `End_Discount`, `Status_Discount`) VALUES
(1, '10YEAR', 5, '2017-05-29', '1995-02-17', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_detail_discount`
--
ALTER TABLE `table_detail_discount`
  ADD PRIMARY KEY (`Detail_ID_Discount`);

--
-- Indexes for table `table_discount`
--
ALTER TABLE `table_discount`
  ADD PRIMARY KEY (`ID_Discount`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_detail_discount`
--
ALTER TABLE `table_detail_discount`
  MODIFY `Detail_ID_Discount` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `table_discount`
--
ALTER TABLE `table_discount`
  MODIFY `ID_Discount` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
