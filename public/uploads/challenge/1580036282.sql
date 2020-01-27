-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 26, 2020 at 03:53 AM
-- Server version: 5.7.28-0ubuntu0.18.04.4
-- PHP Version: 7.3.13-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dhanya_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `zone_id` int(11) DEFAULT NULL,
  `user_group_id` int(11) DEFAULT NULL,
  `image` varchar(222) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `status`, `password`, `remember_token`, `created_at`, `updated_at`, `zone_id`, `user_group_id`, `image`) VALUES
(2, 'Admin User1', 'admin@gmail.com', '1', '$2y$10$YQKAcGlsX6Uf/okqKVkX.uIqNpje68vJys6xqkpHHJJvmAmRSAj52', 'XdZwp5iS3UdUJjc9OZR9AfDAoMRaJkFFAHw4r8cXpCPFRaA7ugQlNfUUOr2P', '2018-11-26 23:05:46', '2019-12-23 22:01:31', NULL, 1, '1577157650.png');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `status` enum('1','0') NOT NULL,
  `author` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `image`, `priority`, `created_at`, `updated_at`, `status`, `author`) VALUES
(23, '1', NULL, 1, '2020-01-26', '2020-01-26', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `status` enum('1','0') NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `title`, `image`, `priority`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Karishmas', NULL, 2, '1', '2020-01-23', '2020-01-24');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `status` enum('1','0') NOT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `image`, `priority`, `created_at`, `updated_at`, `status`, `parent_id`) VALUES
(1, 'Electronics1', '', 1, '2020-01-07', '2020-01-24', '0', NULL),
(2, 'Plastic', '', 0, '2020-01-01', '2020-01-15', '1', NULL),
(3, '85', NULL, NULL, '2020-01-22', '2020-01-22', '1', NULL),
(4, '2', NULL, 3, '2020-01-22', '2020-01-23', '1', NULL),
(5, '3', NULL, 2, '2020-01-22', '2020-01-23', '1', NULL),
(6, 'vineetha', NULL, NULL, '2020-01-22', '2020-01-22', '1', NULL),
(7, 'Ethnicware', NULL, NULL, '2020-01-22', '2020-01-22', '1', NULL),
(8, 'test', NULL, NULL, '2020-01-22', '2020-01-22', '1', NULL),
(9, 'vineetha', NULL, NULL, '2020-01-22', '2020-01-22', '1', NULL),
(10, 'xvcx', NULL, NULL, '2020-01-22', '2020-01-22', '1', NULL),
(11, '1', NULL, NULL, '2020-01-22', '2020-01-22', '1', NULL),
(12, '1', NULL, NULL, '2020-01-22', '2020-01-22', '1', NULL),
(13, 'test1', '1579713053.jpg', NULL, '2020-01-22', '2020-01-22', '1', NULL),
(17, 'rrr', '1579752530.jpeg', NULL, '2020-01-23', '2020-01-24', '0', 18),
(18, 'Casual Wears', '1579757953.jpg', 1, '2020-01-23', '2020-01-23', '1', 0),
(19, 'Kurti', '1579758239.jpg', NULL, '2020-01-23', '2020-01-23', '1', 22),
(22, 'fsdfds', '1579775835.jpg', 2, '2020-01-23', '2020-01-23', '0', 0),
(23, '1', NULL, NULL, '2020-01-26', '2020-01-26', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `status` enum('1','0') NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `title`, `image`, `priority`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Pink', NULL, 2, '1', '2020-01-23', '2020-01-24');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `color_id` int(11) DEFAULT NULL,
  `size_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `details` text,
  `priority` int(11) DEFAULT NULL,
  `status` enum('1','0') DEFAULT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `show_in_main_banner` enum('1','0') DEFAULT '0',
  `main_banner_title1` varchar(255) DEFAULT NULL,
  `main_banner_title2` varchar(255) DEFAULT NULL,
  `main_banner_title3` varchar(255) DEFAULT NULL,
  `show_in_best_seller` enum('1','0') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `price`, `category_id`, `sub_category_id`, `brand_id`, `color_id`, `size_id`, `image`, `quantity`, `details`, `priority`, `status`, `created_at`, `updated_at`, `show_in_main_banner`, `main_banner_title1`, `main_banner_title2`, `main_banner_title3`, `show_in_best_seller`) VALUES
(4, NULL, 1, 18, NULL, 2, 2, 2, NULL, 2, 'yyy', NULL, NULL, '2020-01-26', '2020-01-26', '0', '4', '4', '5', '0');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `priority` int(11) DEFAULT NULL,
  `status` enum('1','0') NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `title`, `priority`, `status`, `created_at`, `updated_at`) VALUES
(2, 'New1q', 2, '1', '2020-01-23', '2020-01-26');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `priority` int(11) DEFAULT NULL,
  `status` enum('1','0') NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `title`, `priority`, `status`, `created_at`, `updated_at`) VALUES
(3, '123', NULL, '1', '2020-01-26', '2020-01-26');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `status` enum('1','0') NOT NULL,
  `designation` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
