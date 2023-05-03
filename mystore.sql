-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2023 at 06:43 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mystore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'admin', 'admin@gmail.com ', '$2y$10$tjsmk0nUZDYXlYuIDj44Oe4PJ3LZTB32qAHBnILK7d.Q.uHhZubNG');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Zomato'),
(2, 'Swiggy '),
(3, 'Adidas'),
(4, 'Sony'),
(18, 'Campus'),
(19, 'Zudio'),
(20, 'Yamaha');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_details`
--

INSERT INTO `cart_details` (`product_id`, `ip_address`, `quantity`) VALUES
(17, '::1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(1, 'Fruits'),
(2, 'Clothes'),
(3, 'Electronics'),
(14, 'Musical Instruments'),
(15, 'Shoes'),
(16, 'Beauty');

-- --------------------------------------------------------

--
-- Table structure for table `orders_pending`
--

CREATE TABLE `orders_pending` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_keywords` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keywords`, `category_id`, `brand_id`, `product_image1`, `product_image2`, `product_image3`, `product_price`, `date`, `status`) VALUES
(4, 'Mango', 'Mango ', 'Mango,Zomato,ABCCD', 1, 1, 'mango1.jpg', 'mango2.jpg', 'mango3.jpg', '200', '2023-04-19 06:12:52', 'true'),
(5, 'Television', 'TV', 'Television , watching , Sony', 3, 4, 'sonyTV1.jpg', 'sonyTV2.jpg', 'sonyTV3.jpg', '51900', '2023-04-19 06:12:56', 'true'),
(6, 'Headphones', 'Headphones', 'Bass,Sony,Headphones,HDQuality ', 3, 4, 'sonyHead1.jpg', 'sonyHead2.jpg', 'sonyHead3.jpg', '5999', '2023-04-19 06:12:59', 'true'),
(7, 'Bose Speaker', 'Speaker', 'Bose,Speaker,Bass,Sound', 3, 5, 'boseSpeaker1.jpg', 'boseSpeaker2.jpg', 'boseSpeaker3.jpg', '3000', '2023-04-19 06:13:12', 'true'),
(17, 'Musical Instruments', 'Musical Instruments', 'Musical Instruments, Guitar, Clapbox, keyboard, piano', 14, 20, 'music1.jpg', 'music2.jpg', 'music3.jpg', '5000', '2023-04-29 15:21:20', 'true'),
(23, 'Shoes', 'Running Shoes', 'Shoes, campus, running, ', 15, 18, 'shoes1.jpg', 'shoes2.jpg', 'shoes3.jpg', '2000', '2023-04-29 13:53:52', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `total_products` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`order_id`, `user_id`, `amount_due`, `invoice_number`, `total_products`, `order_date`, `order_status`) VALUES
(5, 1, 51900, 1073304113, 1, '2023-04-23 08:35:48', 'Complete'),
(6, 1, 51900, 605804813, 1, '2023-04-22 17:57:02', 'Complete'),
(7, 1, 51900, 1893762009, 1, '2023-04-22 17:19:53', 'Complete'),
(8, 1, 57899, 882437662, 2, '2023-04-24 15:54:21', 'Complete'),
(9, 1, 57899, 1831429739, 2, '2023-04-22 17:23:15', 'Complete'),
(10, 1, 60899, 664094929, 3, '2023-04-29 15:18:31', 'Complete'),
(11, 1, 60899, 1624089877, 3, '2023-04-29 22:07:00', 'Complete'),
(12, 1, 60899, 454358567, 3, '2023-04-29 22:24:06', 'Complete'),
(13, 1, 60899, 951440143, 3, '2023-04-23 06:42:55', 'pending'),
(14, 1, 200, 1308822551, 1, '2023-04-29 16:51:08', 'Complete'),
(15, 1, 200, 580316523, 1, '2023-04-23 10:54:47', 'pending'),
(16, 1, 200, 1764122772, 1, '2023-04-23 11:22:42', 'pending'),
(17, 1, 200, 412150471, 1, '2023-04-24 07:48:00', 'pending'),
(18, 1, 3000, 847584643, 1, '2023-04-25 15:58:34', 'Complete'),
(19, 1, 109800, 931895482, 2, '2023-04-26 07:18:20', 'Complete'),
(24, 1, 10000, 1066928181, 1, '2023-04-29 15:30:57', 'pending'),
(25, 1, 10000, 294359730, 1, '2023-04-29 16:41:37', 'Complete'),
(26, 1, 10000, 1493824242, 1, '2023-04-29 22:06:01', 'pending'),
(27, 1, 10000, 1422269602, 1, '2023-04-29 22:23:36', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `user_payments`
--

CREATE TABLE `user_payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_payments`
--

INSERT INTO `user_payments` (`payment_id`, `order_id`, `invoice_number`, `amount`, `payment_mode`, `date`) VALUES
(1, 7, 1893762009, 51900, 'UPI', '2023-04-22 17:19:53'),
(2, 9, 1831429739, 57899, 'Net banking', '2023-04-22 17:23:15'),
(3, 6, 605804813, 51900, 'Cash on Delivery', '2023-04-22 17:57:02'),
(4, 5, 1073304113, 51900, 'Cash on Delivery', '2023-04-29 15:19:38'),
(5, 8, 882437662, 57899, 'UPI', '2023-04-24 15:54:21'),
(7, 22, 815018574, 109800, 'UPI', '2023-04-26 07:17:06'),
(8, 19, 931895482, 109800, 'Cash on Delivery', '2023-04-26 07:18:20'),
(9, 10, 664094929, 60899, 'UPI', '2023-04-29 15:18:31'),
(10, 25, 294359730, 10000, 'Net banking', '2023-04-29 16:41:37'),
(11, 14, 1308822551, 200, 'Net banking', '2023-04-29 16:51:08'),
(12, 11, 1624089877, 60899, 'Cash on Delivery', '2023-04-29 22:07:00'),
(13, 12, 454358567, 60899, 'UPI', '2023-04-29 22:24:06');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_mobile` varchar(20) NOT NULL,
  `otp` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `username`, `user_email`, `user_password`, `user_image`, `user_ip`, `user_address`, `user_mobile`, `otp`) VALUES
(1, 'user1', 'valid_email1@gmail.com', '$2y$10$.jrgFo/UtyRPm4TL1NFX8OYSU2WUe0XC2oYfqkPlpqmEFSaYpF9VW', 'img1.jpg', '::1', 'Baroda', '1234567899', 198531),
(2, 'user2', 'valid_email2@gmail.com@gmail.com ', '$2y$10$t0zf8vXVvtHpro.ni06LQeahKuazmk3zWBHxRs0FvIN.G.5AAyGqK', 'img2.jpg', '::1', 'Baroda', '1234567890', 468292),
(3, 'user3', 'valid_email2@gmail.com@gmail.com ', '$2y$10$GP42rXb2vokUf9BS2toWm.sw/06TpTOcHTpCj7.LHwWT9PEQfneGa', 'img3.jpg', '::1', 'Baroda', '12345678910', 774152);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders_pending`
--
ALTER TABLE `orders_pending`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_payments`
--
ALTER TABLE `user_payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders_pending`
--
ALTER TABLE `orders_pending`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user_payments`
--
ALTER TABLE `user_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
