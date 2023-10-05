-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2016 at 08:43 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE IF NOT EXISTS `brands` (
`brand_id` int(100) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'HP'),
(2, 'DELL'),
(3, 'Motorola'),
(4, 'Sony Ericsson'),
(5, 'LG'),
(6, 'Samsung'),
(7, 'Toshiba'),
(8, 'Apple');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`p_id`, `ip_add`, `qty`) VALUES
(8, '::1', 0),
(11, '::1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Laptops'),
(2, 'Computers'),
(3, 'Mobile'),
(4, 'Cameras'),
(5, 'iPads'),
(6, 'Tablet');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`product_id` int(100) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_brand` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_keywords` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`) VALUES
(2, 1, 1, 'Hp Laptop', 4560, '<p>best machine</p>', 'gallery-shot_desktops_auroraalx_01.jpg', 'hp, new'),
(3, 4, 6, 'Samsung Camera', 1200, '<p>Very <strong>powerful</strong> camera, 40MP. Can be used for video recording.</p>', 'camera.jpg', 'camera, samsung, new'),
(4, 2, 1, 'Hp desktop', 16000, '<p>Good gaming machine</p>', 'desktop.jpg', 'gaming, fast, powerful, new'),
(5, 1, 7, 'Toshiba satellite', 15000, '<p>very good laptop, core i3.</p>', 'images.jpeg', 'toshiba, new'),
(6, 5, 6, 'iPhone 6', 3600, '<p>good phone for all</p>', 'iphone.jpg', 'phone, new, ipads'),
(7, 6, 1, 'Hp Tablet', 3900, '<p>This is a powerful tablet. comes with and external keyboard</p>', 'tablet.jpeg', 'tablet, new'),
(8, 3, 8, 'iPhone 5', 1500, '<p><strong>This is the new phone</strong></p>\r\n<p>the following is a list of spec:</p>\r\n<ul>\r\n<li>Excellent graphics</li>\r\n<li>Mp3 ringtones</li>\r\n<li>1.2ghz processor</li>\r\n</ul>\r\n<p>&nbsp;</p>', 'iphone.jpg', 'new, iphone'),
(9, 2, 3, 'LENOVO', 10000, '<p><strong>ERTYUIOP[</strong></p>\r\n<p>RTRdfghjkl</p>\r\n<p><em>fghjk</em></p>\r\n<p>fghjkkl;</p>', 'printer.jpg', 'lenovo'),
(10, 2, 3, 'Asus', 12000, '<p>oiajsdisahuiashi ahfiaufhuian opsjvsvsdv</p>', 'hqdefault.jpg', 'asus, new'),
(11, 2, 1, 'PRINTER HP', 100, '<p><strong>GFHJKL;</strong></p>\r\n<ul>\r\n<li>\r\n<div style="text-align: center;"><strong>AHNDIAJHDOAJD</strong>ALKDAKLSNDMA</div>\r\n</li>\r\n<li>\r\n<div style="text-align: center;">SAKDKNA</div>\r\n</li>\r\n</ul>', 'printer.jpg', 'printer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
 ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
 ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
