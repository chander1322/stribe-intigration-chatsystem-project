-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2023 at 07:05 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chatsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat_conversion`
--

CREATE TABLE `chat_conversion` (
  `chatid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `reciver_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat_conversion`
--

INSERT INTO `chat_conversion` (`chatid`, `pid`, `sender_id`, `reciver_id`, `message`, `time`) VALUES
(4, 34, 2, 1, 'hhffh', '2023-04-11 10:36:08'),
(5, 34, 2, 1, 'tttt', '2023-04-11 10:36:33'),
(6, 5, 1, 2, 'TESTE', '2023-04-11 10:38:11'),
(7, 34, 2, 1, 'terer', '2023-04-11 10:50:39'),
(8, 34, 2, 1, 'yes i am', '2023-04-11 10:52:12'),
(9, 5, 1, 2, 'now i am join', '2023-04-11 10:52:46'),
(10, 34, 2, 1, ' hello2', '2023-04-11 10:54:01'),
(11, 34, 2, 1, ' tttteee', '2023-04-11 10:54:21'),
(12, 34, 2, 1, ' trtrddd', '2023-04-11 10:54:39'),
(13, 5, 1, 2, 'hello', '2023-04-11 10:59:17'),
(14, 34, 2, 1, 'how are you\n', '2023-04-11 11:03:46'),
(15, 34, 2, 1, 'yes\n', '2023-04-11 11:04:15'),
(16, 34, 2, 1, 'yes', '2023-04-11 11:04:51'),
(17, 34, 2, 1, 'hello', '2023-04-11 11:05:33'),
(18, 34, 2, 1, ' gfgfg', '2023-04-11 11:05:43'),
(19, 5, 1, 2, 'hleelo\n', '2023-04-11 11:05:58'),
(20, 5, 1, 2, 'yes', '2023-04-11 11:23:02'),
(21, 5, 1, 2, ' where are you standing', '2023-04-11 11:23:20'),
(22, 34, 2, 1, 'I am expert', '2023-04-11 11:29:20'),
(23, 5, 1, 2, 'ddd', '2023-04-11 01:31:59'),
(24, 5, 1, 2, 'hello testing', '2023-04-14 10:13:55'),
(25, 34, 2, 1, 'yes what can i test for you', '2023-04-14 10:14:20'),
(26, 5, 1, 2, 'hiii', '2023-04-14 10:14:55'),
(27, 5, 1, 2, ' tester', '2023-04-14 10:15:15'),
(28, 5, 1, 2, ' ki hall ne jnaav', '2023-04-14 10:15:43'),
(29, 34, 2, 1, 'vdia g\n', '2023-04-14 10:15:56'),
(30, 5, 1, 2, 'test123', '2023-04-17 11:03:33'),
(31, 5, 1, 2, 'ter', '2023-04-17 11:04:29'),
(32, 5, 1, 2, 'rere', '2023-04-17 11:24:50'),
(33, 5, 1, 2, 'ddd', '2023-04-17 11:28:28'),
(34, 5, 1, 2, 'www', '2023-04-17 11:31:00'),
(35, 5, 1, 2, 'rrere', '2023-04-17 11:31:35'),
(36, 39, 2, 1, 'tessrs', '2023-04-17 11:33:33'),
(37, 39, 2, 1, 'rererer', '2023-04-17 11:40:26'),
(38, 39, 2, 1, ' yrd', '2023-04-17 11:40:44'),
(39, 5, 1, 2, 'eeeee', '2023-04-17 11:46:30'),
(40, 39, 2, 1, 'hrllo', '2023-04-17 12:00:04'),
(41, 39, 2, 1, ' test\n', '2023-04-17 12:00:26'),
(42, 39, 2, 1, ' yrddy', '2023-04-17 12:00:41'),
(43, 39, 2, 1, 'hello', '2023-04-17 12:01:22'),
(44, 39, 2, 1, ' hello how are you', '2023-04-17 12:02:31'),
(45, 5, 1, 2, 'yes i am fine what about you', '2023-04-17 12:02:51'),
(46, 39, 2, 1, ' oh yes', '2023-04-17 12:03:00'),
(47, 5, 1, 2, ' you are a chander', '2023-04-17 12:03:13'),
(48, 39, 2, 1, ' yes bro i am chander can you help me', '2023-04-17 12:03:31'),
(49, 5, 1, 2, ' yes sure i can help you', '2023-04-17 12:03:52'),
(50, 39, 2, 1, ' okay thanks', '2023-04-17 12:04:02'),
(51, 38, 2, 7, 'hello there seven number user', '2023-04-17 12:06:53'),
(52, 5, 7, 2, 'yes user 2 what can i help you', '2023-04-17 12:08:07'),
(53, 38, 2, 7, ' sorry R you know me?', '2023-04-17 12:08:25'),
(54, 5, 7, 2, ' yes I Already Know you', '2023-04-17 12:08:40'),
(55, 5, 7, 2, ' helllos', '2023-04-17 12:12:22'),
(56, 38, 2, 7, ' yes rorosfjsdfsd', '2023-04-17 12:12:31'),
(57, 38, 2, 7, 'hello i am sumit', '2023-04-17 12:24:07'),
(58, 5, 7, 2, 'yes i know', '2023-04-17 12:24:19'),
(59, 38, 2, 7, ' Thanks', '2023-04-17 12:24:32'),
(60, 5, 7, 2, 'yes hello', '2023-04-17 12:25:35'),
(61, 38, 7, 7, 'yes i am', '2023-04-17 12:27:32'),
(62, 5, 7, 2, ' hello', '2023-04-17 12:28:09'),
(63, 38, 2, 7, 'isdffs ee', '2023-04-17 12:28:29'),
(64, 5, 7, 2, 'dcccc', '2023-04-17 12:39:30'),
(65, 5, 7, 2, ' dddd', '2023-04-17 12:39:36'),
(66, 5, 7, 2, 'tester456', '2023-04-17 12:40:06'),
(67, 38, 2, 7, 'ytyty', '2023-04-17 12:40:51'),
(68, 38, 2, 7, 'ffff', '2023-04-17 12:43:27'),
(69, 39, 7, 1, 'yes hello chander ', '2023-04-17 01:15:11'),
(70, 38, 1, 7, 'yes user3 how can i help you\n', '2023-04-17 01:15:51'),
(71, 38, 1, 7, 'ysett', '2023-04-17 01:28:50'),
(72, 39, 7, 1, 'testerf', '2023-04-17 01:29:15'),
(73, 38, 1, 7, ' okay thanks', '2023-04-17 01:30:48'),
(74, 39, 7, 1, 'yes', '2023-04-17 02:57:25'),
(75, 38, 1, 7, 'ghghg', '2023-04-19 10:58:43');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `user_id` int(155) NOT NULL,
  `category` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `user_id`, `category`, `title`, `image`, `price`, `description`) VALUES
(5, 2, 'shirts', 'shirt 2', 'download.jpg', 133, 'Buy Fashion Field Women Printed Formal White Shirt For Only Rs. 999 Online in India. Shop Online For Apparels. Huge Collection of Branded ..'),
(38, 7, 'pent', 'user3', 'Dylan_2-scaled.jpg', 233, 'yes this is'),
(39, 1, 'shirts', 'style', 'rer.jpeg', 433, 'Testing test');

-- --------------------------------------------------------

--
-- Table structure for table `service_category`
--

CREATE TABLE `service_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_category`
--

INSERT INTO `service_category` (`category_id`, `category_name`) VALUES
(1, 'shoes'),
(2, 'shirts'),
(3, 'pent'),
(4, 'fan');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `user_name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `profile_img` varchar(128) NOT NULL,
  `user_role` varchar(156) NOT NULL,
  `last_seen` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `user_name`, `email`, `password`, `profile_img`, `user_role`, `last_seen`) VALUES
(1, 'chander parkash', 'chander', 'swt.test2018@gmail.com', '202cb962ac59075b964b07152d234b70', '', 'Seller', '0000-00-00 00:00:00'),
(2, 'Mr. Summit', 'sumit', 'sumit@gmail.com', '202cb962ac59075b964b07152d234b70', 'Dylan_2-scaled.jpg', 'Seller', '0000-00-00 00:00:00'),
(7, 'user3', 'user3', 'swt.test2018@gmail.com', '202cb962ac59075b964b07152d234b70', 'model6.jpg', 'Seller', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users_conversation`
--

CREATE TABLE `users_conversation` (
  `conversation_id` int(11) NOT NULL,
  `user_1` int(11) NOT NULL,
  `user_2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `id` int(11) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`id`, `count`) VALUES
(1, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat_conversion`
--
ALTER TABLE `chat_conversion`
  ADD PRIMARY KEY (`chatid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `service_category`
--
ALTER TABLE `service_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_conversation`
--
ALTER TABLE `users_conversation`
  ADD PRIMARY KEY (`conversation_id`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat_conversion`
--
ALTER TABLE `chat_conversion`
  MODIFY `chatid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `service_category`
--
ALTER TABLE `service_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users_conversation`
--
ALTER TABLE `users_conversation`
  MODIFY `conversation_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
