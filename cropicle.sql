-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 15, 2020 at 10:59 PM
-- Server version: 5.7.30-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `democsco_cropicle_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories_master`
--

CREATE TABLE `categories_master` (
  `id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories_master`
--

INSERT INTO `categories_master` (`id`, `category_name`, `created`, `modified`) VALUES
(1, 'Fruits & vegetables', '2020-06-30 09:55:48', '2020-06-30 09:55:48');

-- --------------------------------------------------------

--
-- Table structure for table `demand_lists`
--

CREATE TABLE `demand_lists` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1',
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(50) NOT NULL,
  `modified_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `demand_lists`
--

INSERT INTO `demand_lists` (`id`, `user_id`, `name`, `is_active`, `is_deleted`, `created`, `modified`, `created_by`, `modified_by`) VALUES
(26, 6, 'List 1', 1, 0, '2020-07-13 08:05:10', '2020-07-13 08:05:10', '', ''),
(27, 7, 'Regular list', 1, 0, '2020-07-13 08:11:03', '2020-07-13 08:11:03', '', ''),
(28, 8, 'List 3', 1, 0, '2020-07-13 08:14:05', '2020-07-13 08:14:05', '', ''),
(29, 9, 'Latest', 1, 0, '2020-07-13 08:38:29', '2020-07-13 08:38:29', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `demand_lists_details`
--

CREATE TABLE `demand_lists_details` (
  `id` int(11) NOT NULL,
  `demand_list_id` int(11) NOT NULL,
  `item_id` varchar(50) NOT NULL,
  `qty` float NOT NULL,
  `unit_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1',
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(50) NOT NULL,
  `modified_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `demand_lists_details`
--

INSERT INTO `demand_lists_details` (`id`, `demand_list_id`, `item_id`, `qty`, `unit_id`, `is_active`, `is_deleted`, `created`, `modified`, `created_by`, `modified_by`) VALUES
(63, 26, '12', 1, 1, 1, 0, '2020-07-13 08:05:10', '2020-07-13 08:05:10', '', ''),
(64, 26, '11', 1, 1, 1, 0, '2020-07-13 08:05:10', '2020-07-13 08:05:10', '', ''),
(65, 26, '2', 4, 1, 1, 0, '2020-07-13 08:05:10', '2020-07-13 08:05:10', '', ''),
(66, 26, '3', 4, 1, 1, 0, '2020-07-13 08:05:10', '2020-07-13 08:05:10', '', ''),
(67, 26, '4', 2, 1, 1, 0, '2020-07-13 08:05:10', '2020-07-13 08:05:10', '', ''),
(68, 27, '12', 0.5, 1, 1, 0, '2020-07-13 08:11:03', '2020-07-13 08:11:03', '', ''),
(69, 27, '1', 3, 1, 1, 0, '2020-07-13 08:11:03', '2020-07-13 08:11:03', '', ''),
(70, 27, '2', 5, 1, 1, 0, '2020-07-13 08:11:03', '2020-07-13 08:11:03', '', ''),
(71, 27, '5', 1, 1, 1, 0, '2020-07-13 08:11:03', '2020-07-13 08:11:03', '', ''),
(72, 27, '9', 2, 1, 1, 0, '2020-07-13 08:11:03', '2020-07-13 08:11:03', '', ''),
(73, 28, '1', 5, 1, 1, 0, '2020-07-13 08:14:05', '2020-07-13 08:14:05', '', ''),
(74, 28, '6', 4, 1, 1, 0, '2020-07-13 08:14:05', '2020-07-13 08:14:05', '', ''),
(75, 28, '10', 10, 1, 1, 0, '2020-07-13 08:14:05', '2020-07-13 08:14:05', '', ''),
(76, 29, '3', 3, 1, 1, 0, '2020-07-13 08:38:29', '2020-07-13 08:38:29', '', ''),
(77, 29, '1', 2, 1, 1, 0, '2020-07-13 08:38:29', '2020-07-13 08:38:29', '', ''),
(78, 29, '2', 5, 1, 1, 0, '2020-07-13 08:38:29', '2020-07-13 08:38:29', '', ''),
(79, 29, '5', 1, 1, 1, 0, '2020-07-13 08:38:29', '2020-07-13 08:38:29', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `items_master`
--

CREATE TABLE `items_master` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL DEFAULT '1',
  `max_order_qty` varchar(100) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_img` varchar(500) NOT NULL,
  `unit_id` int(11) NOT NULL DEFAULT '1',
  `item_price_kart` varchar(100) NOT NULL,
  `item_price_customer` varchar(100) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items_master`
--

INSERT INTO `items_master` (`id`, `category_id`, `max_order_qty`, `item_name`, `item_img`, `unit_id`, `item_price_kart`, `item_price_customer`, `is_active`, `created`, `modified`) VALUES
(1, 1, '8', 'Apple', 'defaultItem.jpg', 1, '140', '145', 1, '2020-06-30 07:41:52', '2020-07-06 08:31:20'),
(2, 1, '8', 'Potato', 'defaultItem.jpg', 1, '20', '30', 1, '2020-06-30 07:41:52', '2020-06-30 07:41:52'),
(3, 1, '8', 'Tomato', 'defaultItem.jpg', 1, '25', '40', 1, '2020-06-30 07:42:30', '2020-06-30 07:42:30'),
(4, 1, '8', 'Pumpkin', 'defaultItem.jpg', 1, '10', '15', 1, '2020-06-30 07:42:30', '2020-06-30 07:42:30'),
(5, 1, '2', 'Coriander', 'defaultItem.jpg', 1, '140', '160', 1, '2020-06-30 07:43:07', '2020-06-30 07:43:07'),
(6, 1, '5', 'Carrot', 'defaultItem.jpg', 1, '40', '45', 1, '2020-06-30 07:43:07', '2020-06-30 07:43:07'),
(7, 1, '4', 'Grapes', 'defaultItem.jpg', 1, '80', '90', 1, '2020-06-30 07:43:59', '2020-06-30 07:43:59'),
(8, 1, '5', 'Banana', 'defaultItem.jpg', 1, '30', '40', 1, '2020-06-30 07:43:59', '2020-06-30 07:43:59'),
(9, 1, '8', 'Onion', 'defaultItem.jpg', 1, '60', '80', 1, '2020-06-30 07:44:51', '2020-06-30 07:44:51'),
(10, 1, '5', 'Watermelon', 'watermelon.jpg', 1, '40', '45', 1, '2020-06-30 07:44:51', '2020-06-30 07:44:51'),
(11, 1, '3', 'Ginger', 'defaultItem.jpg', 1, '90', '120', 1, '2020-06-30 07:45:29', '2020-06-30 07:45:29'),
(12, 1, '3', 'Garlic', 'defaultItem.jpg', 1, '50', '80', 1, '2020-06-30 07:45:29', '2020-06-30 07:45:29');

-- --------------------------------------------------------

--
-- Table structure for table `locations_master`
--

CREATE TABLE `locations_master` (
  `id` int(11) NOT NULL,
  `area` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `pin_code` varchar(15) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `locations_master`
--

INSERT INTO `locations_master` (`id`, `area`, `city`, `state`, `pin_code`, `is_active`, `created`, `modified`) VALUES
(1, 'Budhapara', 'Raipur', 'CG', '492001', 1, '2020-07-08 07:29:24', '2020-07-08 06:14:46'),
(2, 'Shankar nagar', 'Raipur', 'CG', '492007', 1, '2020-07-08 07:29:24', '2020-07-08 07:29:24'),
(4, 'Avanti', 'Raipur', 'CG', '492003', 1, '2020-07-08 09:41:14', '2020-07-08 06:14:37'),
(5, 'VIP Road', 'Raipur', 'CG', '492000', 1, '2020-07-08 09:42:23', '2020-07-08 09:42:23');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_qty` varchar(100) NOT NULL,
  `total_amt` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `payment_type` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `updated_by_hawker` int(11) NOT NULL DEFAULT '0',
  `is_deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_qty`, `total_amt`, `date`, `payment_type`, `status`, `updated_by_hawker`, `is_deleted`) VALUES
(17, 6, '12', '340', '2020-07-13', 'CASH', 'DELIVERED', 0, 0),
(18, 7, '11.5', '805', '2020-07-13', 'CASH', 'DELIVERED', 0, 0),
(19, 8, '17', '1180', '2020-07-13', 'CASH', 'DELIVERED', 0, 0),
(20, 9, '11', '595', '2020-07-13', 'CASH', 'DELIVERED', 1, 0),
(21, 9, '11', '595', '2020-07-13', 'CASH', 'DELIVERED', 1, 0),
(22, 9, '11', '595', '2020-07-13', 'CASH', 'DELIVERED', 1, 0),
(23, 9, '11', '595', '2020-07-13', 'CASH', 'DELIVERED', 1, 0),
(24, 9, '11', '595', '2020-07-13', 'CASH', 'DELIVERED', 1, 0),
(25, 9, '11', '595', '2020-07-13', 'CASH', 'DELIVERED', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL DEFAULT '1',
  `qty` varchar(100) NOT NULL,
  `remaining_qty` varchar(100) NOT NULL,
  `item_price_kart` varchar(100) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `item_id`, `unit_id`, `qty`, `remaining_qty`, `item_price_kart`, `created`, `updated`) VALUES
(76, 17, 4, 1, '2.00', '', '10', '2020-07-13 08:05:35', '2020-07-13 04:36:28'),
(77, 17, 3, 1, '4.00', '', '25', '2020-07-13 08:05:35', '2020-07-13 04:36:28'),
(78, 17, 2, 1, '4.00', '', '20', '2020-07-13 08:05:35', '2020-07-13 04:36:28'),
(79, 17, 11, 1, '1.00', '', '90', '2020-07-13 08:05:35', '2020-07-13 04:36:28'),
(80, 17, 12, 1, '1.00', '', '50', '2020-07-13 08:05:35', '2020-07-13 04:36:28'),
(81, 18, 9, 1, '2.00', '', '60', '2020-07-13 08:11:39', '2020-07-13 04:41:56'),
(82, 18, 5, 1, '1.00', '', '140', '2020-07-13 08:11:39', '2020-07-13 04:41:56'),
(83, 18, 2, 1, '5.00', '', '20', '2020-07-13 08:11:39', '2020-07-13 04:41:56'),
(84, 18, 1, 1, '3.00', '', '140', '2020-07-13 08:11:39', '2020-07-13 04:41:56'),
(85, 18, 12, 1, '0.50', '', '50', '2020-07-13 08:11:39', '2020-07-13 04:41:56'),
(86, 19, 10, 1, '8.00', '', '40', '2020-07-13 08:14:10', '2020-07-13 04:44:39'),
(87, 19, 6, 1, '4.00', '', '40', '2020-07-13 08:14:10', '2020-07-13 04:44:39'),
(88, 19, 1, 1, '5.00', '', '140', '2020-07-13 08:14:10', '2020-07-13 04:44:39'),
(89, 20, 5, 1, '1.00', '0', '140', '2020-07-13 08:38:33', '2020-07-13 05:08:47'),
(90, 20, 2, 1, '5.00', '1', '20', '2020-07-13 08:38:33', '2020-07-13 05:08:47'),
(91, 20, 1, 1, '2.00', '1', '140', '2020-07-13 08:38:33', '2020-07-13 05:08:47'),
(92, 20, 3, 1, '3.00', '0', '25', '2020-07-13 08:38:33', '2020-07-13 05:08:47'),
(93, 21, 5, 1, '1', '1.00', '140', '2020-07-13 08:38:54', '2020-07-13 05:09:07'),
(94, 21, 2, 1, '5', '1.00', '20', '2020-07-13 08:38:54', '2020-07-13 05:09:07'),
(95, 21, 1, 1, '2', '1.00', '140', '2020-07-13 08:38:54', '2020-07-13 05:09:07'),
(96, 21, 3, 1, '3', '1.00', '25', '2020-07-13 08:38:54', '2020-07-13 05:09:07'),
(97, 22, 5, 1, '2', '0.00', '140', '2020-07-13 10:08:25', '2020-07-13 06:38:35'),
(98, 22, 2, 1, '6', '0.00', '20', '2020-07-13 10:08:25', '2020-07-13 06:38:35'),
(99, 22, 1, 1, '3', '0.00', '140', '2020-07-13 10:08:25', '2020-07-13 06:38:35'),
(100, 22, 3, 1, '4', '0.00', '25', '2020-07-13 10:08:25', '2020-07-13 06:38:35'),
(101, 23, 5, 1, '1', '0.00', '140', '2020-07-13 10:16:47', '2020-07-13 06:47:06'),
(102, 23, 2, 1, '5', '0.00', '20', '2020-07-13 10:16:47', '2020-07-13 06:47:06'),
(103, 23, 1, 1, '2', '0.00', '140', '2020-07-13 10:16:47', '2020-07-13 06:47:06'),
(104, 23, 3, 1, '3', '0.00', '25', '2020-07-13 10:16:47', '2020-07-13 06:47:06'),
(105, 24, 5, 1, '1', '1.00', '140', '2020-07-13 10:22:02', '2020-07-13 06:52:23'),
(106, 24, 2, 1, '5', '0.00', '20', '2020-07-13 10:22:02', '2020-07-13 06:52:23'),
(107, 24, 1, 1, '2', '0.00', '140', '2020-07-13 10:22:02', '2020-07-13 06:52:23'),
(108, 24, 3, 1, '3', '0.00', '25', '2020-07-13 10:22:02', '2020-07-13 06:52:23'),
(109, 25, 5, 1, '2', '1.00', '140', '2020-07-13 10:23:50', '2020-07-13 06:54:12'),
(110, 25, 2, 1, '5', '0.00', '20', '2020-07-13 10:23:50', '2020-07-13 06:54:12'),
(111, 25, 1, 1, '2', '0.00', '140', '2020-07-13 10:23:50', '2020-07-13 06:54:12'),
(112, 25, 3, 1, '3', '0.00', '25', '2020-07-13 10:23:50', '2020-07-13 06:54:12');

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `api_payment_id` varchar(1000) NOT NULL,
  `api_order_id` varchar(1000) NOT NULL,
  `api_signature` varchar(1000) NOT NULL,
  `status` varchar(100) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) DEFAULT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'KART ADMIN'),
(2, 'KART'),
(3, 'USER');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(11) NOT NULL,
  `unit_name` varchar(50) NOT NULL,
  `unit_short_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unit_name`, `unit_short_name`) VALUES
(1, 'kilogram', 'kg'),
(2, 'ton', 'ton'),
(3, 'dozen', 'dzn'),
(4, 'grams', 'gm'),
(5, 'litre', 'L'),
(6, 'millilitre', 'mL'),
(7, 'quintal', 'qui');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mobile_no` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(500) NOT NULL,
  `is_verified` int(11) NOT NULL,
  `otp` varchar(10) NOT NULL,
  `otp_verified` int(11) NOT NULL,
  `pwd_reset_token` varchar(100) NOT NULL,
  `token_expire_at` date NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `mobile_no`, `email`, `password`, `is_verified`, `otp`, `otp_verified`, `pwd_reset_token`, `token_expire_at`, `is_active`, `created`, `modified`, `created_by`, `modified_by`) VALUES
(1, 1, 'Admin', '8888888888', 'admin@cropicle.com', '$2y$10$IenBYZcELmjIdfY1i8cuv.AOOqHDi713h51w0hL.JvcFji4FdHBVi', 1, '', 1, '', '0000-00-00', 1, '2020-07-06 05:22:59', '2020-07-06 05:22:59', 0, 0),
(6, 2, 'Kart budhapara', '7894561230', '', '$2y$10$h/NvBL1UbgO9lL/Vyk9Q5exdX.F9DItmSHAhdJ8.OvQq0G2hwunlC', 0, '', 0, '', '0000-00-00', 1, '2020-07-13 08:02:06', '2020-07-13 04:33:37', 0, 0),
(7, 2, 'Kart shankar', '7894561231', '', '$2y$10$p4ZnGS8OGei2B9GMzy/lNujJDu/PnxH2.JFpvFhn64F5/WUehDY2G', 0, '', 0, '', '0000-00-00', 1, '2020-07-13 08:08:42', '2020-07-13 04:39:10', 0, 0),
(8, 2, 'Kart2 Shankar', '7894561232', '', '$2y$10$hfeGg7TXF0QsR6pq4.hGm.PMUWfImxXnmFrfyN/FSsSgiGCWjS7wS', 0, '', 0, '', '0000-00-00', 1, '2020-07-13 08:12:56', '2020-07-13 04:43:19', 0, 0),
(9, 2, 'Kart3 shankar', '7894561233', '', '$2y$10$KhcYGCbwQ0JjfBqMprNU5.qQMjYf34LhwEy7aIIGyPyJYW/G0RPOO', 0, '', 0, '', '0000-00-00', 1, '2020-07-13 08:25:41', '2020-07-13 04:55:54', 0, 0),
(11, 3, 'Vishnu', '7894561234', '', '$2y$10$A9A6f7vhoscC0l1MwBVTRu.uuHKXJNg9tdurFWGDaA9.GLGTKSTkO', 1, '', 1, '', '0000-00-00', 1, '2020-07-15 11:07:44', '2020-07-15 09:49:59', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `aadhaar_license` varchar(100) NOT NULL,
  `capacity_kart` int(11) NOT NULL,
  `sales_qty_daily` float NOT NULL,
  `source_purchase` varchar(500) NOT NULL,
  `bank_name` varchar(500) NOT NULL,
  `holder_name` varchar(100) NOT NULL,
  `acc_no` varchar(100) NOT NULL,
  `ifsc_code` varchar(50) NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL,
  `profile_img` varchar(500) NOT NULL,
  `location_id` int(11) NOT NULL,
  `address` varchar(500) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(20) NOT NULL,
  `modified_by` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `user_id`, `email`, `aadhaar_license`, `capacity_kart`, `sales_qty_daily`, `source_purchase`, `bank_name`, `holder_name`, `acc_no`, `ifsc_code`, `latitude`, `longitude`, `profile_img`, `location_id`, `address`, `created`, `modified`, `created_by`, `modified_by`) VALUES
(3, 6, '', '', 200, 0, '', '', '', '', '', '', '', '', 1, '', '2020-07-13 08:02:06', '2020-07-13 04:34:21', '', ''),
(4, 7, '', '', 30, 0, '', '', '', '', '', '', '', '', 2, '', '2020-07-13 08:08:42', '2020-07-13 04:40:27', '', ''),
(5, 8, '', '', 40, 0, '', '', '', '', '', '', '', '', 2, '', '2020-07-13 08:12:56', '2020-07-13 04:43:42', '', ''),
(6, 9, '', '', 30, 0, '', '', '', '', '', '', '', '', 2, '', '2020-07-13 08:25:41', '2020-07-13 04:56:15', '', ''),
(7, 11, 'ss@ss.cpm', '', 0, 0, '', '', '', '', '', '', '', 'agri_grass1.png', 5, 'ss', '2020-07-15 11:07:49', '2020-07-15 09:49:59', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_sessions`
--

CREATE TABLE `user_sessions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `login_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `logout_time` timestamp NULL DEFAULT NULL,
  `is_logged_in` int(11) NOT NULL,
  `ip_address` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sessions`
--

INSERT INTO `user_sessions` (`id`, `user_id`, `role_id`, `login_time`, `logout_time`, `is_logged_in`, `ip_address`, `is_active`, `created`, `modified`, `created_by`, `modified_by`) VALUES
(4, 1, 2, '2020-06-29 04:45:52', '2020-06-29 05:00:25', 0, 0, 0, 0, 0, 0, 0),
(5, 1, 2, '2020-06-29 05:00:44', '2020-06-29 05:00:58', 0, 0, 0, 0, 0, 0, 0),
(6, 1, 2, '2020-06-29 06:00:16', '2020-06-29 06:20:33', 0, 0, 0, 0, 0, 0, 0),
(7, 25, 2, '2020-06-29 06:25:28', '2020-06-29 06:34:44', 0, 0, 0, 0, 0, 0, 0),
(8, 25, 2, '2020-06-29 06:34:49', '2020-06-29 06:46:02', 0, 0, 0, 0, 0, 0, 0),
(9, 25, 2, '2020-06-29 06:48:09', '2020-06-29 06:49:45', 0, 0, 0, 0, 0, 0, 0),
(10, 25, 2, '2020-06-29 07:19:01', NULL, 1, 0, 0, 0, 0, 0, 0),
(11, 25, 2, '2020-06-30 01:32:09', '2020-06-30 01:50:23', 0, 0, 0, 0, 0, 0, 0),
(12, 25, 2, '2020-06-30 01:50:29', '2020-06-30 01:51:37', 0, 0, 0, 0, 0, 0, 0),
(13, 25, 2, '2020-06-30 01:51:41', '2020-06-30 01:52:07', 0, 0, 0, 0, 0, 0, 0),
(14, 25, 2, '2020-06-30 01:52:20', '2020-06-30 03:31:52', 0, 0, 0, 0, 0, 0, 0),
(15, 25, 2, '2020-06-30 03:31:59', '2020-06-30 03:34:04', 0, 0, 0, 0, 0, 0, 0),
(16, 25, 2, '2020-06-30 03:34:08', NULL, 1, 0, 0, 0, 0, 0, 0),
(17, 25, 2, '2020-06-30 08:44:46', NULL, 1, 0, 0, 0, 0, 0, 0),
(18, 25, 2, '2020-07-02 02:04:12', NULL, 1, 0, 0, 0, 0, 0, 0),
(19, 25, 2, '2020-07-03 01:44:31', NULL, 1, 0, 0, 0, 0, 0, 0),
(20, 25, 2, '2020-07-04 01:51:33', NULL, 1, 0, 0, 0, 0, 0, 0),
(21, 25, 2, '2020-07-04 06:24:59', NULL, 1, 0, 0, 0, 0, 0, 0),
(22, 1, 1, '2020-07-06 01:53:29', NULL, 1, 0, 0, 0, 0, 0, 0),
(23, 25, 2, '2020-07-06 01:54:46', '2020-07-06 06:18:34', 0, 0, 0, 0, 0, 0, 0),
(24, 1, 1, '2020-07-06 06:18:46', NULL, 1, 0, 0, 0, 0, 0, 0),
(25, 25, 2, '2020-07-06 07:10:39', '2020-07-06 07:10:42', 0, 0, 0, 0, 0, 0, 0),
(26, 25, 2, '2020-07-06 07:11:27', '2020-07-06 07:11:30', 0, 0, 0, 0, 0, 0, 0),
(27, 1, 1, '2020-07-06 07:11:48', NULL, 1, 0, 0, 0, 0, 0, 0),
(28, 25, 2, '2020-07-06 07:39:06', '2020-07-06 07:39:27', 0, 0, 0, 0, 0, 0, 0),
(29, 1, 1, '2020-07-06 07:40:05', NULL, 1, 0, 0, 0, 0, 0, 0),
(30, 25, 2, '2020-07-06 07:50:50', '2020-07-06 07:51:41', 0, 0, 0, 0, 0, 0, 0),
(31, 1, 1, '2020-07-06 07:51:55', NULL, 1, 0, 0, 0, 0, 0, 0),
(32, 32, 2, '2020-07-06 08:05:06', '2020-07-06 08:05:10', 0, 0, 0, 0, 0, 0, 0),
(33, 1, 1, '2020-07-06 08:05:20', '2020-07-06 08:39:20', 0, 0, 0, 0, 0, 0, 0),
(34, 25, 2, '2020-07-06 08:39:38', '2020-07-06 09:40:03', 0, 0, 0, 0, 0, 0, 0),
(35, 25, 2, '2020-07-06 09:40:13', NULL, 1, 0, 0, 0, 0, 0, 0),
(36, 25, 2, '2020-07-07 01:32:10', '2020-07-07 04:14:16', 0, 0, 0, 0, 0, 0, 0),
(37, 1, 1, '2020-07-07 04:14:26', NULL, 1, 0, 0, 0, 0, 0, 0),
(38, 25, 2, '2020-07-07 06:50:01', '2020-07-07 07:32:12', 0, 0, 0, 0, 0, 0, 0),
(39, 1, 1, '2020-07-07 07:32:26', NULL, 1, 0, 0, 0, 0, 0, 0),
(40, 25, 2, '2020-07-07 07:38:08', NULL, 1, 0, 0, 0, 0, 0, 0),
(41, 1, 1, '2020-07-08 01:50:24', NULL, 1, 0, 0, 0, 0, 0, 0),
(42, 25, 2, '2020-07-08 01:51:02', '2020-07-08 03:06:17', 0, 0, 0, 0, 0, 0, 0),
(43, 1, 1, '2020-07-08 03:06:38', '2020-07-08 06:41:44', 0, 0, 0, 0, 0, 0, 0),
(44, 25, 2, '2020-07-08 04:01:27', NULL, 1, 0, 0, 0, 0, 0, 0),
(45, 25, 2, '2020-07-08 06:41:56', NULL, 1, 0, 0, 0, 0, 0, 0),
(46, 1, 1, '2020-07-08 07:00:27', '2020-07-08 07:04:07', 0, 0, 0, 0, 0, 0, 0),
(47, 25, 2, '2020-07-08 07:04:13', NULL, 1, 0, 0, 0, 0, 0, 0),
(48, 1, 1, '2020-07-08 07:12:31', '2020-07-08 07:12:50', 0, 0, 0, 0, 0, 0, 0),
(49, 25, 2, '2020-07-08 07:12:56', NULL, 1, 0, 0, 0, 0, 0, 0),
(50, 25, 2, '2020-07-08 07:48:53', NULL, 1, 0, 0, 0, 0, 0, 0),
(51, 25, 2, '2020-07-08 08:07:01', NULL, 1, 0, 0, 0, 0, 0, 0),
(52, 1, 1, '2020-07-08 08:18:59', NULL, 1, 0, 0, 0, 0, 0, 0),
(53, 25, 2, '2020-07-09 02:26:04', '2020-07-09 03:32:54', 0, 0, 0, 0, 0, 0, 0),
(54, 25, 2, '2020-07-09 03:32:58', NULL, 1, 0, 0, 0, 0, 0, 0),
(55, 25, 2, '2020-07-09 04:00:56', NULL, 1, 0, 0, 0, 0, 0, 0),
(56, 1, 1, '2020-07-13 04:33:22', NULL, 1, 0, 0, 0, 0, 0, 0),
(57, 6, 2, '2020-07-13 04:33:48', '2020-07-13 04:36:59', 0, 0, 0, 0, 0, 0, 0),
(58, 1, 1, '2020-07-13 04:39:04', NULL, 1, 0, 0, 0, 0, 0, 0),
(59, 7, 2, '2020-07-13 04:39:16', '2020-07-13 04:42:25', 0, 0, 0, 0, 0, 0, 0),
(60, 1, 1, '2020-07-13 04:43:15', NULL, 1, 0, 0, 0, 0, 0, 0),
(61, 8, 2, '2020-07-13 04:43:29', '2020-07-13 04:55:15', 0, 0, 0, 0, 0, 0, 0),
(62, 1, 1, '2020-07-13 04:55:51', '2020-07-13 07:00:11', 0, 0, 0, 0, 0, 0, 0),
(63, 9, 2, '2020-07-13 04:56:06', NULL, 1, 0, 0, 0, 0, 0, 0),
(64, 9, 2, '2020-07-14 04:16:46', NULL, 1, 0, 0, 0, 0, 0, 0),
(65, 9, 2, '2020-07-15 17:22:01', NULL, 1, 4730, 0, 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories_master`
--
ALTER TABLE `categories_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `demand_lists`
--
ALTER TABLE `demand_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `demand_lists_details`
--
ALTER TABLE `demand_lists_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items_master`
--
ALTER TABLE `items_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations_master`
--
ALTER TABLE `locations_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sessions`
--
ALTER TABLE `user_sessions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories_master`
--
ALTER TABLE `categories_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `demand_lists`
--
ALTER TABLE `demand_lists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `demand_lists_details`
--
ALTER TABLE `demand_lists_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `items_master`
--
ALTER TABLE `items_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `locations_master`
--
ALTER TABLE `locations_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_sessions`
--
ALTER TABLE `user_sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
