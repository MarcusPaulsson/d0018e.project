-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 17, 2021 at 01:55 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db19990310`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `Customer_id` int(10) NOT NULL AUTO_INCREMENT,
  `Name` varchar(15) COLLATE utf8mb4_swedish_ci NOT NULL,
  `Surname` varchar(15) COLLATE utf8mb4_swedish_ci NOT NULL,
  `Phone` bigint(15) NOT NULL,
  `Address` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `Email` varchar(25) COLLATE utf8mb4_swedish_ci NOT NULL,
  `Password` varchar(25) COLLATE utf8mb4_swedish_ci NOT NULL,
  PRIMARY KEY (`Customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `Employee_id` int(10) NOT NULL AUTO_INCREMENT,
  `Name` varchar(15) COLLATE utf8mb4_swedish_ci NOT NULL,
  `Surname` varchar(15) COLLATE utf8mb4_swedish_ci NOT NULL,
  `Salary` bigint(15) NOT NULL,
  `Phone` bigint(15) NOT NULL,
  `Email` varchar(25) COLLATE utf8mb4_swedish_ci NOT NULL,
  `Password` varchar(25) COLLATE utf8mb4_swedish_ci NOT NULL,
  PRIMARY KEY (`Employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `Product_id` int(10) NOT NULL AUTO_INCREMENT,
  `Product_name` varchar(25) COLLATE utf8mb4_swedish_ci NOT NULL,
  `Stock_quantity` int(10) NOT NULL,
  `Percentage` int(2) NOT NULL,
  `Color` varchar(10) COLLATE utf8mb4_swedish_ci NOT NULL,
  PRIMARY KEY (`Product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchaseorders`
--

DROP TABLE IF EXISTS `purchaseorders`;
CREATE TABLE IF NOT EXISTS `purchaseorders` (
  `Order_id` int(10) NOT NULL AUTO_INCREMENT,
  `Customer_id` int(10) NOT NULL,
  `Shipment_address` varchar(25) COLLATE utf8mb4_swedish_ci NOT NULL,
  `Product_id` int(10) NOT NULL,
  `Quantity` int(10) NOT NULL,
  PRIMARY KEY (`Order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
CREATE TABLE IF NOT EXISTS `review` (
  `Product_id` int(11) NOT NULL,
  `Rating` tinyint(2) NOT NULL,
  `Review_text` text COLLATE utf8mb4_swedish_ci NOT NULL,
  PRIMARY KEY (`Product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart`
--

DROP TABLE IF EXISTS `shoppingcart`;
CREATE TABLE IF NOT EXISTS `shoppingcart` (
  `Customer_id` int(10) NOT NULL,
  `Product_id` int(10) NOT NULL,
  `Quantity` int(10) NOT NULL,
  PRIMARY KEY (`Customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
