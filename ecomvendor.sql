-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2024 at 07:42 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecomvendor`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  `cat_img` varchar(255) NOT NULL,
  `cat_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_img`, `cat_status`) VALUES
(4, 'Men', '0c1899db49709fb84767a7df14b2bf9c.png', 1),
(5, 'Women', 'FB_IMG_1668339521233.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `msg` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `fname`, `lname`, `email`, `msg`) VALUES
(1, 'asif', 'khan', 'asif@gmail.com', 'product is very good'),
(2, 'basit', 'khan', 'basit@gmail.com', 'product is very beatiful'),
(3, 'kashif', 'khan', 'kashif@gmail.com', 'this website is very useful');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pro_id` int(11) NOT NULL,
  `pro_name` varchar(50) NOT NULL,
  `pro_desc` text NOT NULL,
  `pro_category` int(11) NOT NULL,
  `pro_price` int(11) NOT NULL,
  `pro_qty` int(11) NOT NULL,
  `pro_img` varchar(255) NOT NULL,
  `pro_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pro_id`, `pro_name`, `pro_desc`, `pro_category`, `pro_price`, `pro_qty`, `pro_img`, `pro_status`) VALUES
(1, 'Shirts', 'this is shirt', 4, 2000, 10, 'FB_IMG_1697374503433.jpg', 0),
(2, 'skirts', 'this is skirts', 5, 3000, 10, 'FB_IMG_1668339521233.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `regester`
--

CREATE TABLE `regester` (
  `uid` int(11) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `uemail` varchar(50) NOT NULL,
  `upassword` varchar(50) NOT NULL,
  `uphone` varchar(15) NOT NULL,
  `uaddress` varchar(50) DEFAULT NULL,
  `profile_info` text NOT NULL,
  `uprofile_img` varchar(255) DEFAULT NULL,
  `created_date` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `regester`
--

INSERT INTO `regester` (`uid`, `uname`, `uemail`, `upassword`, `uphone`, `uaddress`, `profile_info`, `uprofile_img`, `created_date`, `status`, `role`) VALUES
(0, 'imran', 'imran@gmail.com', '1234', '0315273849', 'karachi', 'i am pathan', '042f1670-6bc1-4ff9-9d1e-ec38f789fdd9.jpg', '2024-02-24 18:51:38', 1, 1),
(1, 'Asif', 'asif@gmail.com', '1234', '03132634370', 'landhi', 'i am developer', '042f1670-6bc1-4ff9-9d1e-ec38f789fdd9.jpg', '2024-02-07 18:28:32', 0, 2),
(3, 'basit', 'basit@gmail.com', '1234', '03162836928', 'nagin chorangi', 'i am a gamer', 'FB_IMG_1600153242481.jpg', '2024-02-24 18:52:43', 1, 0),
(4, 'sohail', 'sohail@gmail.com', '1234', '031627142881', 'landhi', 'i am developer', 'IMG_20240112_233602.jpg', '2024-02-24 18:53:46', 0, 0),
(5, 'kashif', 'kashif@gmail.com', '1234', '039376518', 'lahoresxfg', 'i am a gamer', 'Snapchat-291277931.jpg', '2024-02-27 23:46:59', 1, 1),
(6, 'saleed', 'saleed@gmail.com', '1234', '03445678980', NULL, '', NULL, '2024-02-28 21:28:36', 1, 0),
(7, 'wahab', 'wahab@gmail.com', '1234', '0345676543', NULL, '', NULL, '2024-03-07 19:38:50', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `pro_category` (`pro_category`);

--
-- Indexes for table `regester`
--
ALTER TABLE `regester`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `regester`
--
ALTER TABLE `regester`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`pro_category`) REFERENCES `category` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
