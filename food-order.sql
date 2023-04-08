-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2022 at 06:28 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food-order`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(27, 'Aman GIRI', 'username', '5f4dcc3b5aa765d61d8327deb882cf99'),
(29, 'sagar', 'sachan', 'ba8017b241b367dd4494d4c61ed92c6b');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `food_name` varchar(100) NOT NULL,
  `food_price` varchar(100) NOT NULL,
  `food_des` varchar(250) NOT NULL,
  `image_name` varchar(250) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`id`, `food_id`, `food_name`, `food_price`, `food_des`, `image_name`, `phone`, `password`) VALUES
(5, 58, 'Dassa', '139.00', 'Specialy For you', 'Food-name-565.jpeg', '7070099770', '5f4dcc3b5aa765d61d8327deb882cf99'),
(6, 58, 'Dassa', '139.00', 'Specialy For you', 'Food-name-565.jpeg', '7070099770', '5f4dcc3b5aa765d61d8327deb882cf99'),
(7, 58, 'Dassa', '139.00', 'Specialy For you', 'Food-name-565.jpeg', '', ''),
(8, 58, 'Dassa', '139.00', 'Specialy For you', 'Food-name-565.jpeg', '7070099770', '81dc9bdb52d04dc20036dbd8313ed055'),
(9, 61, 'Finger', '29.00', 'Test is Best', 'Food-name-412.jpeg', '7070099770', '81dc9bdb52d04dc20036dbd8313ed055'),
(10, 59, 'Special Tea', '50.00', '10 % OFF', 'Food-name-801.jpeg', '7070099770', ' 81dc9bdb52d04dc20036dbd8313ed055'),
(11, 58, 'Dassa', '139.00', 'Specialy For you', 'Food-name-565.jpeg', '', '59c95189ac895fcc1c6e1c38d067e244');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `veg` varchar(10) NOT NULL,
  `restaurant` varchar(50) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL,
  `Special_food` varchar(10) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `veg`, `restaurant`, `featured`, `active`, `Special_food`, `description`) VALUES
(24, 'Dossa', 'Food_Category_853.jpeg', 'Yes', 'South-indian', 'Yes', 'Yes', 'Yes', '70% off'),
(27, 'Pizza', 'Food_Category_814.jpg', 'Yes', 'Amzood', 'Yes', 'Yes', 'No', '50% off'),
(28, 'Finger', 'Food_Category_788.jpeg', 'Yes', 'South-indian', 'Yes', 'Yes', 'No', ''),
(29, 'Tea', 'Food_Category_412.jpeg', 'Yes', 'Amzood', 'Yes', 'Yes', 'Yes', '50% off'),
(36, ' Chicken Fry ', 'Food_Category_888.jpeg', 'No', 'Amzood', 'Yes', 'Yes', 'Yes', 'EXTRA DISCOUNT'),
(40, 'Samosa', 'Food_Category_750.jpeg', 'Yes', 'Amzood', 'Yes', 'Yes', 'Yes', 'BAY ONE GET ONE FREE'),
(45, 'Burgar', 'Food_Category_920.jpg', 'Yes', 'amozood', 'Yes', 'Yes', 'Yes', '50% off'),
(46, 'Momo', 'Food_Category_97.jpg', 'Yes', 'South-indian', 'Yes', 'Yes', 'Yes', 'EXTRA DISCOUNT');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `restaurant` varchar(100) NOT NULL,
  `veg` varchar(10) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL,
  `popular` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `restaurant`, `veg`, `featured`, `active`, `popular`) VALUES
(58, 'Dassa', 'Specialy For you', '139.00', 'Food-name-565.jpeg', 24, 'Amzood', 'Yes', 'Yes', 'Yes', 'Yes'),
(61, 'Finger', 'Test is Best', '29.00', 'Food-name-412.jpeg', 28, 'Amzood', 'Yes', 'Yes', 'Yes', 'Yes'),
(62, 'pizaa', '', '122.00', 'Food-name-104.jpeg', 27, 'Amzood', 'Yes', 'Yes', 'Yes', 'Yes'),
(63, 'Momo', 'Extra discount', '99.00', 'Food-name-280.jpg', 46, 'South-indian', 'Yes', 'Yes', 'Yes', 'Yes'),
(64, 'Burgar', '10%OFF', '69.00', 'Food-name-198.jpg', 24, 'South-indian', 'Yes', 'Yes', 'Yes', 'Yes'),
(65, 'Specail Momo ', 'Test is Best', '129.00', 'Food-name-631.jpg', 46, 'South-indian', 'Yes', 'Yes', 'Yes', 'No'),
(66, 'pizza', 'So testy', '199.00', 'Food-name-229.jpg', 24, 'South-indian', 'Yes', 'Yes', 'Yes', 'Yes'),
(67, ' Special Tea', 'Extra Suger', '29.00', 'Food-name-95.jpeg', 29, 'South-indian', 'Yes', 'Yes', 'Yes', 'Yes'),
(68, 'Chicken lolipop', 'Extra Spicy', '219.00', 'Food-name-555.jpeg', 36, 'South-indian', 'No', 'Yes', 'Yes', 'Yes'),
(69, 'Chicken Burger', 'Testy', '99.00', 'Food-name-516.jpg', 45, 'South-indian', 'No', 'Yes', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `p_number` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`id`, `name`, `p_number`, `email`, `password`) VALUES
(2, 'AMAM', '5565656', 'amangiri381@gmail.com', '1d9f7549960e87d05cdc00f6e7c639d9'),
(3, 'Aman GIRI', '7070099770', 'amangiri381@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99'),
(4, 'kaushlelendra', '7887032552', 'anoopkumar78870@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99'),
(5, 'Nikhil', '7408135644', 'dashkushwaha87@gmail.com', '27dfdf5db31d889da92f124fd7492606');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `password` varchar(150) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `password`, `customer_email`, `customer_address`) VALUES
(31, 'Dassa', '139.00', 1, '695.00', '2022-02-19 10:08:59', 'Ordered', 'Aman GIRI', '7070099770', '5f4dcc3b5aa765d61d8327deb882cf99', 'ag4982324@gmail.com', 'lucknow'),
(32, 'Dassa', '139.00', 1, '139.00', '2022-03-04 02:23:27', 'Ordered', 'Aman GIRI', '7070099770', '81dc9bdb52d04dc20036dbd8313ed055', 'ag4982324@gmail.com', 'lucknow'),
(33, 'Dassa', '139.00', 1, '139.00', '2022-03-04 02:24:35', 'Ordered', 'Aman GIRI', '7070099770', '81dc9bdb52d04dc20036dbd8313ed055', 'ag4982324@gmail.com', 'lucknow'),
(34, 'Dassa', '139.00', 1, '139.00', '2022-03-04 02:32:36', 'Ordered', 'Aman GIRI', '7070099770', '81dc9bdb52d04dc20036dbd8313ed055', 'ag4982324@gmail.com', 'lucknow'),
(35, 'Dassa', '139.00', 1, '139.00', '2022-03-04 02:33:17', 'Ordered', 'Aman GIRI', '7070099770', '81dc9bdb52d04dc20036dbd8313ed055', 'ag4982324@gmail.com', 'lucknow'),
(36, 'Special Tea', '50.00', 0, '50.00', '2022-03-09 12:56:58', 'Ordered', 'Aman GIRI', '7070099770', '81dc9bdb52d04dc20036dbd8313ed055', 'ag4982324@gmail.com', 'lucknow'),
(37, 'Special Tea', '50.00', 0, '50.00', '2022-03-09 12:57:03', 'Ordered', 'Aman GIRI', '7070099770', '81dc9bdb52d04dc20036dbd8313ed055', 'ag4982324@gmail.com', 'lucknow'),
(38, 'Special Tea', '50.00', 0, '50.00', '2022-03-09 12:57:23', 'Ordered', 'Aman GIRI', '7070099770', '81dc9bdb52d04dc20036dbd8313ed055', 'ag4982324@gmail.com', 'lucknow'),
(39, 'Special Tea', '50.00', 0, '0.00', '2022-03-09 01:01:32', 'Ordered', 'Aman GIRI', '7070099770', '81dc9bdb52d04dc20036dbd8313ed055', 'ag4982324@gmail.com', 'lucknow'),
(41, 'Special Tea', '50.00', 0, '0.00', '2022-03-09 01:02:26', 'Ordered', 'Nikhil', '7070099770', '81dc9bdb52d04dc20036dbd8313ed055', 'dashkushwaha87@gmail.com', 'lucknow'),
(42, 'Special Tea', '50.00', 0, '0.00', '2022-03-09 01:02:46', 'Ordered', 'Aman GIRI', '7070099770', '81dc9bdb52d04dc20036dbd8313ed055', 'sagarsachan115@gmail.com', 'aimt maurawan'),
(43, 'Special Tea', '50.00', 0, '0.00', '2022-03-09 01:06:31', 'Ordered', 'Aman GIRI', '7070099770', '81dc9bdb52d04dc20036dbd8313ed055', 'sagarsachan115@gmail.com', 'aimt maurawan'),
(44, 'Special Tea', '50.00', 0, '0.00', '2022-03-09 01:06:49', 'Ordered', 'Aman GIRI', '7070099770', '81dc9bdb52d04dc20036dbd8313ed055', 'ag4982324@gmail.com', 'lucknow'),
(45, 'Special Tea', '50.00', 0, '0.00', '2022-03-09 01:06:57', 'Ordered', 'Aman GIRI', '7070099770', '81dc9bdb52d04dc20036dbd8313ed055', 'ag4982324@gmail.com', 'lucknow'),
(46, 'Special Tea', '50.00', 0, '0.00', '2022-03-09 01:07:04', 'Ordered', 'Aman GIRI', '7070099770', '81dc9bdb52d04dc20036dbd8313ed055', 'ag4982324@gmail.com', 'lucknow'),
(47, 'Special Tea', '50.00', 1, '50.00', '2022-03-09 01:21:17', 'Ordered', 'Aman GIRI', '7070099770', '81dc9bdb52d04dc20036dbd8313ed055', 'ag4982324@gmail.com', 'lucknow'),
(48, 'Special Tea', '50.00', 1, '50.00', '2022-03-09 01:22:46', 'Ordered', 'Aman GIRI', '7070099770', '81dc9bdb52d04dc20036dbd8313ed055', 'ag4982324@gmail.com', 'lucknow'),
(49, 'Special Tea', '50.00', 1, '50.00', '2022-03-09 01:28:19', 'Ordered', 'Aman GIRI', '7070099770', '81dc9bdb52d04dc20036dbd8313ed055', 'ag4982324@gmail.com', 'lucknow'),
(50, 'Special Tea', '50.00', 1, '50.00', '2022-03-09 01:29:26', 'Ordered', 'Aman GIRI', '7070099770', '81dc9bdb52d04dc20036dbd8313ed055', 'ag4982324@gmail.com', 'lucknow'),
(51, 'Special Tea', '50.00', 1, '50.00', '2022-03-09 01:31:11', 'Ordered', 'Aman GIRI', '7070099770', '81dc9bdb52d04dc20036dbd8313ed055', 'ag4982324@gmail.com', 'lucknow'),
(52, 'Special Tea', '50.00', 0, '0.00', '2022-03-09 01:35:43', 'Ordered', 'Aman GIRI', '7070099770', '81dc9bdb52d04dc20036dbd8313ed055', 'sagarsachan115@gmail.com', 'aimt maurawan'),
(53, 'Special Tea', '50.00', 0, '0.00', '2022-03-09 01:35:49', 'Ordered', 'sagar', '7070099770', '81dc9bdb52d04dc20036dbd8313ed055', 'sagarsachan115@gmail.com', 'aimt maurawan'),
(54, 'Special Tea', '50.00', 0, '0.00', '2022-03-09 01:35:54', 'Ordered', 'Aman GIRI', '7070099770', '81dc9bdb52d04dc20036dbd8313ed055', 'ag4982324@gmail.com', 'lucknow'),
(55, 'Special Tea', '50.00', 0, '0.00', '2022-03-09 01:40:03', 'Ordered', 'Aman GIRI', '7070099770', '81dc9bdb52d04dc20036dbd8313ed055', 'ag4982324@gmail.com', 'lucknow'),
(56, 'Special Tea', '50.00', 0, '0.00', '2022-03-09 01:45:53', 'Ordered', 'sagar', '7070099770', '81dc9bdb52d04dc20036dbd8313ed055', 'sagarsachan115@gmail.com', 'aimt maurawan'),
(57, 'Special Tea', '50.00', 0, '0.00', '2022-03-09 01:50:25', 'Ordered', 'Nikhil', '7070099770', '81dc9bdb52d04dc20036dbd8313ed055', 'dashkushwaha87@gmail.com', 'lucknow'),
(58, 'Special Tea', '50.00', 0, '0.00', '2022-03-09 01:50:33', 'Ordered', 'Aman GIRI', '7070099770', '81dc9bdb52d04dc20036dbd8313ed055', 'ag4982324@gmail.com', 'lucknow'),
(59, 'Special Tea', '50.00', 0, '0.00', '2022-03-09 01:50:57', 'Ordered', 'Aman GIRI', '7070099770', '81dc9bdb52d04dc20036dbd8313ed055', 'ag4982324@gmail.com', 'lucknow'),
(60, 'Special Tea', '50.00', 1, '50.00', '2022-03-09 01:59:14', 'Ordered', 'Aman GIRI', '7070099770', '81dc9bdb52d04dc20036dbd8313ed055', 'sagarsachan115@gmail.com', 'aimt maurawan'),
(61, 'Special Tea', '50.00', 0, '0.00', '2022-03-09 02:22:58', 'Ordered', 'Aman GIRI', '7070099770', '81dc9bdb52d04dc20036dbd8313ed055', 'ag4982324@gmail.com', 'lucknow'),
(62, 'Special Tea', '50.00', 0, '0.00', '2022-03-09 02:23:46', 'Ordered', 'Aman GIRI', '7070099770', '81dc9bdb52d04dc20036dbd8313ed055', 'ag4982324@gmail.com', 'lucknow'),
(63, 'Special Tea', '50.00', 1, '50.00', '2022-03-09 02:39:16', 'Ordered', 'Aman GIRI', '7070099770', '81dc9bdb52d04dc20036dbd8313ed055', 'ag4982324@gmail.com', 'lucknow'),
(64, 'Special Tea', '50.00', 0, '0.00', '2022-03-09 03:08:08', 'Ordered', 'Aman GIRI', '7070099770', '81dc9bdb52d04dc20036dbd8313ed055', 'ag4982324@gmail.com', 'lucknow'),
(65, 'Special Tea', '50.00', 0, '0.00', '2022-03-09 03:08:26', 'Ordered', 'sagar', '7070099770', '81dc9bdb52d04dc20036dbd8313ed055', 'sagarsachan115@gmail.com', 'aimt maurawan'),
(66, 'Special Tea', '50.00', 1, '50.00', '2022-03-09 03:08:47', 'Ordered', 'Aman GIRI', '7070099770', '81dc9bdb52d04dc20036dbd8313ed055', 'sagarsachan115@gmail.com', 'aimt maurawan'),
(67, 'Special Tea', '50.00', 1, '50.00', '2022-03-09 03:21:12', 'Ordered', 'Aman GIRI', '7070099770', '81dc9bdb52d04dc20036dbd8313ed055', 'sagarsachan115@gmail.com', 'aimt maurawan'),
(68, 'Finger', '29.00', 1, '29.00', '2022-03-09 04:17:41', 'Ordered', 'Aman ', '7070099770', ' 81dc9bdb52d04dc20036dbd8313ed055', 'ag4982324@gmail.com', 'lucknow'),
(69, 'Finger', '29.00', 1, '29.00', '2022-03-09 04:29:31', 'Ordered', 'Aman ', '7070099770', ' 81dc9bdb52d04dc20036dbd8313ed055', 'ag4982324@gmail.com', 'lucknow'),
(70, 'Finger', '29.00', 1, '29.00', '2022-03-09 04:29:48', 'Ordered', 'Aman ', '7070099770', ' 81dc9bdb52d04dc20036dbd8313ed055', 'ag4982324@gmail.com', 'lucknow'),
(71, 'Dassa', '139.00', 1, '139.00', '2022-03-09 09:55:10', 'Ordered', 'sagar', '7897564969', '81dc9bdb52d04dc20036dbd8313ed055', 'sagarsachan115@gmail.com', 'aimt maurawan'),
(72, 'Chicken lolipop', '219.00', 1, '219.00', '2022-07-27 04:51:34', 'Delivered', 'vihal', '7355081643', '', 'vishaldixit0404@gmail.com', 'lucknow');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `orderid` varchar(50) NOT NULL,
  `custid` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `payment_mode` varchar(50) NOT NULL,
  `payment_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`orderid`, `custid`, `amount`, `date`, `payment_mode`, `payment_status`) VALUES
('', 'CUST_1001', 0, '0000-00-00 00:00:00', '', ''),
('ORDS1602988', 'CUST_1001', 0, '0000-00-00 00:00:00', '', ''),
('ORDS16340434', 'CUST_1001', 0, '0000-00-00 00:00:00', '', ''),
('ORDS16625780', 'CUST_1001', 219, '2022-07-27 20:22:49', 'NB', 'TXN_SUCCESS'),
('ORDS22365446', 'CUST_1001', 139, '2022-03-10 02:26:52', 'NB', 'TXN_SUCCESS'),
('ORDS22821332', 'CUST_1001', 29, '2022-03-09 22:15:05', 'NB', 'TXN_SUCCESS'),
('ORDS24968400', 'CUST_1001', 139, '2022-02-19 14:29:59', 'NB', 'TXN_SUCCESS'),
('ORDS26292995', 'CUST_1001', 50, '0000-00-00 00:00:00', '', ''),
('ORDS27733862', 'CUST_1001', 0, '0000-00-00 00:00:00', '', ''),
('ORDS3386577', 'CUST_1001', 0, '0000-00-00 00:00:00', '', ''),
('ORDS36399066', 'CUST_1001', 0, '0000-00-00 00:00:00', '', ''),
('ORDS41482793', 'CUST_1001', 50, '2022-03-09 19:21:06', 'NB', 'TXN_SUCCESS'),
('ORDS44615669', 'CUST_1001', 0, '0000-00-00 00:00:00', '', ''),
('ORDS45392640', 'CUST_1001', 139, '2022-02-18 20:28:25', 'NB', 'TXN_SUCCESS'),
('ORDS45399368', 'CUST_1001', 50, '2022-02-18 22:52:28', 'NB', 'TXN_SUCCESS'),
('ORDS49894103', 'CUST_1001', 139, '0000-00-00 00:00:00', '', ''),
('ORDS53452985', 'CUST_1001', 50, '2022-03-09 20:07:49', 'NB', 'TXN_SUCCESS'),
('ORDS54539519', 'CUST_1001', 0, '0000-00-00 00:00:00', '', ''),
('ORDS55153808', 'CUST_1001', 246, '2022-02-17 16:44:51', 'NB', 'TXN_SUCCESS'),
('ORDS56562523', 'CUST_1001', 139, '0000-00-00 00:00:00', '', ''),
('ORDS57201052', 'CUST_1001', 0, '0000-00-00 00:00:00', '', ''),
('ORDS58382281', 'CUST_1001', 139, '2022-02-19 00:06:21', 'NB', 'TXN_SUCCESS'),
('ORDS66361391', 'CUST_1001', 200, '0000-00-00 00:00:00', '', ''),
('ORDS68012060', 'CUST_1001', 29, '0000-00-00 00:00:00', '', ''),
('ORDS71288841', 'CUST_1001', 0, '0000-00-00 00:00:00', '', ''),
('ORDS71801099', 'CUST_1001', 29, '0000-00-00 00:00:00', '', ''),
('ORDS73374141', 'CUST_1001', 139, '0000-00-00 00:00:00', '', ''),
('ORDS78538210', 'CUST_1001', 10, '0000-00-00 00:00:00', '', ''),
('ORDS8088304', 'CUST_1001', 0, '0000-00-00 00:00:00', '', ''),
('ORDS81151915', 'CUST_1001', 0, '0000-00-00 00:00:00', '', ''),
('ORDS81934406', 'CUST_1001', 876, '2022-02-17 19:45:42', 'NB', 'TXN_SUCCESS'),
('ORDS83190943', 'CUST_1001', 0, '0000-00-00 00:00:00', '', ''),
('ORDS86061221', 'CUST_1001', 0, '0000-00-00 00:00:00', '', ''),
('ORDS86368016', 'CUST_1001', 139, '2022-02-18 23:26:22', 'NB', 'TXN_SUCCESS'),
('ORDS86458695', 'CUST_1001', 200, '2022-02-18 22:55:56', 'NB', 'TXN_SUCCESS'),
('ORDS87786283', 'CUST_1001', 29, '0000-00-00 00:00:00', '', ''),
('ORDS88024085', 'CUST_1001', 10, '2022-03-09 18:29:25', 'NB', 'TXN_SUCCESS'),
('ORDS95048158', 'CUST_1001', 0, '0000-00-00 00:00:00', '', ''),
('ORDS98322520', 'CUST_1001', 0, '0000-00-00 00:00:00', '', ''),
('ORDS98416198', 'CUST_1001', 139, '0000-00-00 00:00:00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reg`
--

CREATE TABLE `tbl_reg` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_reg`
--

INSERT INTO `tbl_reg` (`id`, `username`, `email`, `mobile`, `password`, `token`, `status`) VALUES
(33, 'amit', 'ag4982324@gmail.com', '7070099770', ' 81dc9bdb52d04dc20036dbd8313ed055', '9109', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurants`
--

CREATE TABLE `tbl_restaurants` (
  `id` int(11) NOT NULL,
  `r_name` varchar(200) NOT NULL,
  `r_email` varchar(200) NOT NULL,
  `r_contact` varchar(50) NOT NULL,
  `active` varchar(10) NOT NULL,
  `r_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_restaurants`
--

INSERT INTO `tbl_restaurants` (`id`, `r_name`, `r_email`, `r_contact`, `active`, `r_address`) VALUES
(5, 'amozood', 'ag4982324@gmail.com', '7070099770', 'Yes', 'lucknow'),
(6, 'South-indian', 'ag4982324@gmail.com', '7070099770', 'Yes', 'lucknow');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `tbl_reg`
--
ALTER TABLE `tbl_reg`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpassword` (`token`);

--
-- Indexes for table `tbl_restaurants`
--
ALTER TABLE `tbl_restaurants`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `tbl_reg`
--
ALTER TABLE `tbl_reg`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_restaurants`
--
ALTER TABLE `tbl_restaurants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
