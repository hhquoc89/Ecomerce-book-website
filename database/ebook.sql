-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 03, 2022 at 12:30 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ebook`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `full_name`, `username`, `password`) VALUES
(23, 'admin', 'admin1', 'e00cf25ad42683b3df678c61f42c6bda'),
(22, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cart_id`)
) ENGINE=MyISAM AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `customer_name` varchar(150) DEFAULT NULL,
  `customer_contact` varchar(20) DEFAULT NULL,
  `customer_email` varchar(150) DEFAULT NULL,
  `customer_address` varchar(255) DEFAULT NULL,
  `total` double DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `userID`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`, `total`, `status`, `created_date`) VALUES
(2, 0, 'Huy Quoc', '0964415645', '18521307@gm.uit.edu.vn', 'Vo Thi Sau District 3', 311, 'pending', '2021-11-23 12:24:59'),
(3, 0, 'Huy Quoc', '0964415645', '18521307@gm.uit.edu.vn', 'Vo Thi Sau District 3', 433, 'pending', '2021-11-23 01:06:12'),
(4, 0, 'Huy Quoc', '0964415645', '18521307@gm.uit.edu.vn', 'Vo Thi Sau District 3', 396, 'pending', '2021-11-23 01:18:05'),
(5, 12, 'Tran Huy', NULL, NULL, NULL, 488, 'pending', '2021-12-04 04:17:27'),
(6, 12, 'Tran Huy', NULL, NULL, NULL, 488, 'pending', '2021-12-04 04:19:21'),
(7, 12, 'Tran Huy', NULL, NULL, NULL, 488, 'pending', '2021-12-04 04:20:53'),
(8, 12, 'Tran Huy', NULL, NULL, NULL, 488, 'pending', '2021-12-04 04:21:41'),
(9, 12, 'Tran Huy', NULL, NULL, NULL, 123, 'pending', '2021-12-10 07:18:22'),
(10, 12, 'Tran Huy', NULL, NULL, NULL, 123, 'pending', '2021-12-10 11:56:03'),
(11, 13, 'Tram Nguyen', '', '', '', 492, 'On Delivery', '2021-12-13 00:04:00');

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

DROP TABLE IF EXISTS `order_item`;
CREATE TABLE IF NOT EXISTS `order_item` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`id`, `order_id`, `product_id`, `name`, `price`, `qty`, `total`, `created_date`) VALUES
(1, 2, 12, 'Book1 ', '189.00', 1, '189.00', '2021-11-23 12:24:59'),
(2, 2, 2, 'Book2', '122.00', 1, '122.00', '2021-11-23 12:24:59'),
(3, 3, 3, 'Book3', '122.00', 1, '122.00', '2021-11-23 01:06:12'),
(4, 3, 12, 'Book1 ', '189.00', 1, '189.00', '2021-11-23 01:06:12'),
(5, 3, 8, 'Book8', '122.00', 1, '122.00', '2021-11-23 01:06:12'),
(6, 4, 6, 'Book6', '122.00', 1, '122.00', '2021-11-23 01:18:05'),
(7, 4, 9, 'Book9', '152.00', 1, '152.00', '2021-11-23 01:18:05'),
(8, 4, 5, 'Book5', '122.00', 1, '122.00', '2021-11-23 01:18:05'),
(9, 5, 4, 'Book4', '122.00', 1, '122.00', '2021-12-04 04:17:27'),
(10, 5, 7, 'Book7', '122.00', 1, '122.00', '2021-12-04 04:17:27'),
(11, 6, 4, 'Book4', '122.00', 1, '122.00', '2021-12-04 04:19:21'),
(12, 6, 7, 'Book7', '122.00', 1, '122.00', '2021-12-04 04:19:21'),
(13, 7, 4, 'Book4', '122.00', 1, '122.00', '2021-12-04 04:20:53'),
(14, 7, 7, 'Book7', '122.00', 1, '122.00', '2021-12-04 04:20:53'),
(15, 8, 4, 'Book4', '122.00', 1, '122.00', '2021-12-04 04:21:41'),
(16, 8, 7, 'Book7', '122.00', 1, '122.00', '2021-12-04 04:21:41'),
(17, 9, 11, 'Book10', '123.00', 1, '123.00', '2021-12-10 07:18:22'),
(18, 10, 11, 'Book10', '123.00', 1, '123.00', '2021-12-10 11:56:03'),
(19, 11, 11, 'Book10', '123.00', 4, '492.00', '2021-12-12 03:41:07');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `item_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `item_brand` varchar(200) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_description` text NOT NULL,
  `item_price` double(10,2) NOT NULL,
  `item_image` varchar(255) NOT NULL,
  `item_register` datetime DEFAULT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`item_id`, `item_brand`, `item_name`, `item_description`, `item_price`, `item_image`, `item_register`) VALUES
(2, '1', 'Book2', 'a', 122.00, './assets/book-2.png', '2020-03-28 11:08:57'),
(3, '1', 'Book3', 'a', 122.00, './assets/book-3.png', '2020-03-28 11:08:57'),
(4, '2', 'Book4', 'a', 122.00, './assets/book-4.png', '2020-03-28 11:08:57'),
(5, '2', 'Book5', 'a', 122.00, './assets/book-5.png', '2020-03-28 11:08:57'),
(6, '2', 'Book6', 'a', 122.00, './assets/book-6.png', '2020-03-28 11:08:57'),
(7, '2', 'Book7', 'a', 122.00, './assets/book-7.png', '2020-03-28 11:08:57'),
(8, '3', 'Book8', 'a', 122.00, './assets/book-8.png', '2020-03-28 11:08:57'),
(9, '3', 'Book9', 'a', 152.00, './assets/book-9.png', '2020-03-28 11:08:57'),
(11, '3', 'Book10', 'dsadsa', 123.00, './assets/Book-1637636152.png', '2021-11-23 09:55:00'),
(12, '1', 'Book1 ', 'dasd', 189.00, './assets/Book-1637641199.png', '2021-11-23 11:19:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(100) DEFAULT NULL,
  `lastName` varchar(100) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(150) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `password` varchar(200) NOT NULL,
  `profileImage` varchar(255) DEFAULT NULL,
  `registerDate` datetime DEFAULT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `firstName`, `lastName`, `email`, `contact`, `address`, `password`, `profileImage`, `registerDate`) VALUES
(11, 'Quoc', 'Huy', '18521307@gm.uit.edu.vn', '0964415645', 'Vo Thi Sau District 3 ', '$2y$10$sLrq/hJmVFdenhrWaOyWSuWJ8vbhTlt1mZNCbJDBYZxM349DBLCMG', './assets/profile/beard.png', '2021-11-24 03:48:32'),
(12, 'Tran', 'Huy', 'steve_opencart@yahoo.com', '0964415645', 'Vo Thi Sau District 3 ', 'e10adc3949ba59abbe56e057f20f883e', './assets/profile/beard.png', '2021-12-04 03:13:43'),
(13, 'Tram', 'Nguyen', 'tramnguyen123@gmail.com', '123456789', 'Vo Thi Sau District 4 ', '89a1a868823abe7243fd340554055ce5', './assets/profile/pic-2.png', '2021-12-10 11:00:01');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE IF NOT EXISTS `wishlist` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
