-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 05, 2021 at 09:51 AM
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
-- Database: `ebook`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `item_id`) VALUES
(14, 1, 4),
(15, 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
      `item_id` int(11) UNSIGNED  NOT NULL,
      `item_brand` varchar(200) NOT NULL,
      `item_name` varchar(255) NOT NULL,
    `item_description` text NOT NULL,
      `item_price` double(10,2) NOT NULL,
      `item_image` varchar(255) NOT NULL,
      `item_register` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `product` CHANGE `item_id` `item_id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT, add PRIMARY KEY (`item_id`);

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`item_id`, `item_brand`, `item_name`,`item_description`, `item_price`, `item_image`, `item_register`) VALUES
(1, '1', 'Book1','a', 152.00, './assets/book-1.png', '2020-03-28 11:08:57'),
(2, '1', 'Book2','a', 122.00, './assets/book-2.png', '2020-03-28 11:08:57'),
(3, '1', 'Book3','a', 122.00, './assets/book-3.png', '2020-03-28 11:08:57'),
(4, '2', 'Book4','a', 122.00, './assets/book-4.png', '2020-03-28 11:08:57'),
(5, '2', 'Book5','a', 122.00, './assets/book-5.png', '2020-03-28 11:08:57'),
(6, '2', 'Book6','a', 122.00, './assets/book-6.png', '2020-03-28 11:08:57'),
(7, '2', 'Book7','a', 122.00, './assets/book-7.png', '2020-03-28 11:08:57'),
(8, '3', 'Book8','a', 122.00, './assets/book-8.png', '2020-03-28 11:08:57'),
(9, '3', 'Book9','a', 152.00, './assets/book-9.png', '2020-03-28 11:08:57'),
(10, '3', 'Book10','a', 152.00, './assets/book-10.png', '2020-03-28 11:08:57');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `register_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE IF NOT EXISTS `wishlist` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
                                           `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
                                           `full_name` varchar(100) NOT NULL,
    `username` varchar(100) NOT NULL,
    `password` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
