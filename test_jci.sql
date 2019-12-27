-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 27, 2019 at 02:59 PM
-- Server version: 5.7.28-0ubuntu0.16.04.2
-- PHP Version: 7.2.18-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_jci`
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
(2, 'Admin User1', 'm@gmail.com', '1', '$2y$10$YQKAcGlsX6Uf/okqKVkX.uIqNpje68vJys6xqkpHHJJvmAmRSAj52', '8stAmaiUPRIO6aZenAe5kgIcyy7jsVYqgNlRInRIqxYTXlQ2pxcIIyI9vMOc', '2018-11-26 23:05:46', '2019-12-23 22:01:31', NULL, 1, '1577157650.png');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position_id` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `link_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banner_positions`
--

CREATE TABLE `banner_positions` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banner_positions`
--

INSERT INTO `banner_positions` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Main', '1', NULL, NULL),
(2, 'Popup', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `identifier` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug_url` varchar(255) DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0' COMMENT 'for nested purpose',
  `details` text,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `priority` int(11) NOT NULL DEFAULT '0',
  `image` varchar(222) DEFAULT NULL,
  `seo_keywords` text,
  `seo_title` text,
  `url` varchar(255) NOT NULL,
  `seo_description` text,
  `position_id` int(11) NOT NULL COMMENT 'menu_position',
  `large_image` varchar(255) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `featured` enum('1','0') NOT NULL,
  `link_url` varchar(222) DEFAULT NULL,
  `section_url` varchar(222) DEFAULT NULL,
  `link_type` enum('C','S','E') NOT NULL DEFAULT 'C',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `allow_to_delete` enum('1','0') NOT NULL DEFAULT '1',
  `short_description` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `content_positions`
--

CREATE TABLE `content_positions` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `content_positions`
--

INSERT INTO `content_positions` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'TOP MENU', '1', NULL, NULL),
(2, 'TOP SUB MENU', '1', NULL, NULL),
(3, 'MAIN MENU', '1', NULL, NULL),
(6, 'FOOTER MENU', '1', NULL, NULL),
(7, 'ABOUT JCI INDIA', '1', NULL, NULL),
(8, 'WHY JCI INDIA', '1', NULL, NULL),
(9, 'FOUNDER’S PERSPECTIVE', '1', NULL, NULL),
(10, 'JCI MISSION & VISION', '1', NULL, NULL),
(11, 'JCI VALUES', '1', NULL, NULL),
(12, 'CONTACT US', '1', NULL, NULL),
(13, 'NATCON 2018 PROMOTION', '1', NULL, NULL),
(14, 'SUSTAINABLE DEVELOPMENT', '1', NULL, NULL),
(15, 'ONLINE G&D AND MRF', '1', NULL, NULL),
(16, 'FOOD GRAIN DISTRIBUTION', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `content_position_relations`
--

CREATE TABLE `content_position_relations` (
  `id` int(10) UNSIGNED NOT NULL,
  `content_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `content_position_relations`
--

INSERT INTO `content_position_relations` (`id`, `content_id`, `position_id`, `created_at`, `updated_at`) VALUES
(4, 5, 1, '2019-09-08 10:29:39', '2019-09-08 10:29:39'),
(9, 1, 1, '2019-09-11 07:53:46', '2019-09-11 07:53:46'),
(11, 4, 2, '2019-09-11 16:00:59', '2019-09-11 16:00:59'),
(15, 10, 2, '2019-09-11 16:21:27', '2019-09-11 16:21:27'),
(16, 10, 3, '2019-09-11 16:21:27', '2019-09-11 16:21:27'),
(17, 11, 3, '2019-09-11 16:37:50', '2019-09-11 16:37:50'),
(20, 3, 1, '2019-09-12 20:34:50', '2019-09-12 20:34:50'),
(21, 3, 2, '2019-09-12 20:34:50', '2019-09-12 20:34:50'),
(23, 8, 1, '2019-09-12 20:41:59', '2019-09-12 20:41:59'),
(28, 42, 3, '2019-09-12 21:03:06', '2019-09-12 21:03:06');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `downloads`
--

CREATE TABLE `downloads` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` enum('1','0') NOT NULL,
  `priority` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `event_date` date DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL,
  `location` varchar(222) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `status` enum('1','0') NOT NULL,
  `details` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `featured` enum('1','0') NOT NULL DEFAULT '0',
  `zone_id` int(11) DEFAULT NULL,
  `image` varchar(222) DEFAULT NULL,
  `identifier` varchar(100) DEFAULT NULL,
  `slug_url` varchar(222) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `priority` int(11) DEFAULT NULL,
  `status` enum('1','0') NOT NULL,
  `created_at` datetime NOT NULL,
  `details` text NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `large_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `identifier` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT 'I',
  `video_url` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `fe_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quick_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `show_in_admin` enum('1','0') COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `show_in_fe` enum('1','0') COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `priority` int(11) NOT NULL DEFAULT '1',
  `query_string` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `need_sub_menu` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `category` enum('C','T','M','A','E') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'C'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `title`, `parent_id`, `status`, `fe_url`, `admin_url`, `icon`, `quick_icon`, `created_at`, `updated_at`, `show_in_admin`, `show_in_fe`, `priority`, `query_string`, `need_sub_menu`, `category`) VALUES
(1, 'Gallery Category', 0, '1', NULL, 'category', 'category.jpeg', NULL, '2018-11-26 23:05:46', '2018-11-26 23:05:46', '1', '0', 1, 'gallery', '0', 'M'),
(3, 'Downloads ', NULL, '1', NULL, 'downloads', 'downloads.png', NULL, NULL, NULL, '1', '0', 1, 'downloads', '0', 'C'),
(6, 'Banner', NULL, '1', NULL, 'banner', 'banner.png', NULL, NULL, NULL, '1', '0', 1, NULL, '0', 'C'),
(9, 'Content', NULL, '1', NULL, 'content', 'content.png', NULL, NULL, NULL, '1', '0', 1, NULL, '0', 'C'),
(10, 'News', NULL, '1', NULL, 'news', 'news.png', NULL, NULL, NULL, '1', '0', 1, NULL, '0', 'C'),
(11, 'Events', NULL, '1', NULL, 'event', 'event1.png', NULL, NULL, NULL, '1', '0', 1, 'event', '0', 'E'),
(12, 'Zone Events', NULL, '1', NULL, 'event', 'event2.png', NULL, NULL, NULL, '1', '0', 1, 'zoneevent', '0', 'E'),
(14, 'Gallery', NULL, '1', NULL, 'gallery', 'gallery.png', NULL, NULL, NULL, '1', '0', 1, 'gallery', '0', 'C'),
(15, 'Programe', NULL, '1', 'enquiry', 'programe', 'programme.png', NULL, NULL, NULL, '1', '0', 1, NULL, '0', 'C'),
(16, 'National Governing Board', 0, '1', NULL, 'team', 'team1.png', NULL, NULL, NULL, '0', '0', 1, 'national-governing-board', '1', 'T'),
(17, 'National Executive Committee', 16, '1', NULL, 'team', 'team2.png', NULL, NULL, NULL, '1', '0', 1, 'national-executive-committee', '0', 'T'),
(18, 'Natioan Directors', 16, '1', NULL, 'team', 'team3.png', NULL, NULL, NULL, '1', '0', 1, 'natioan-directors', '0', 'T'),
(19, 'Zone Presidents', 16, '1', NULL, 'team', 'team4.png', NULL, NULL, NULL, '1', '0', 1, 'zone-presidents', '0', 'T'),
(20, 'National Appointees', 0, '1', NULL, 'team', 'team5.png', NULL, NULL, NULL, '0', '0', 1, 'national-appointees', '0', 'T'),
(21, 'Committee', 20, '1', NULL, 'team', 'team6.png', NULL, NULL, NULL, '0', '0', 1, 'committee', '0', 'T'),
(22, 'NOM Co-ordinate', 20, '1', NULL, 'team', 'team7.png', NULL, NULL, NULL, '1', '0', 1, 'nom-co-ordinate', '0', 'T'),
(23, 'JCI India Foundation', 21, '1', NULL, 'team', 'team8.png', NULL, NULL, NULL, '1', '0', 1, 'jci-india-foundation', '0', 'T'),
(24, 'Administrative Committee', 21, '1', NULL, 'team', 'team9.png', NULL, NULL, NULL, '1', '0', 1, 'administrative-committee', '0', 'T'),
(25, 'Finance Committee', 21, '1', NULL, 'team', 'team10.png', NULL, NULL, NULL, '1', '0', 1, 'finance-committee', '0', 'T'),
(26, 'Challenge Editorial Board', 21, '1', NULL, 'team', 'team11.png', NULL, NULL, NULL, '1', '0', 1, 'challenge-editorial-board', '0', 'T'),
(27, 'National Head Quarter', 0, '1', NULL, 'team', 'team12.png', NULL, NULL, NULL, '1', '0', 1, 'national-head-quarter', '0', 'T'),
(28, 'Zone Governing Board', 0, '1', NULL, 'team', 'team13.png', NULL, NULL, NULL, '1', '0', 1, 'zone-governing-board', '0', 'T'),
(29, 'Past National Presidents', 0, '1', NULL, 'team', 'team14.png', NULL, NULL, NULL, '1', '0', 1, 'past-national-presidents', '0', 'T'),
(30, 'International Corner', 0, '1', NULL, 'team', 'team15.png', NULL, NULL, NULL, '1', '0', 1, 'international-corner', '0', 'T'),
(31, 'Admin User', 0, '1', NULL, 'adminuser', 'user.png', NULL, '2018-11-26 17:35:46', '2018-11-26 17:35:46', '1', '0', 1, NULL, '0', 'M'),
(32, 'Download Category', 0, '1', NULL, 'category', 'download_catecory.png', NULL, '2018-11-26 17:35:46', '2018-11-26 17:35:46', '1', '0', 1, 'downloads', '0', 'M'),
(33, 'National events', NULL, '1', NULL, 'event', 'event3.png', NULL, NULL, NULL, '1', '0', 1, 'national_events', '0', 'E'),
(34, 'International events', NULL, '1', NULL, 'event', 'event4.png', NULL, NULL, NULL, '1', '0', 1, 'international_events', '0', 'E'),
(35, 'Event Calendar', NULL, '1', NULL, 'event', 'event5.png', NULL, NULL, NULL, '1', '0', 1, 'event_calendar', '0', 'E'),
(36, 'Upcoming Events', NULL, '1', NULL, 'event', 'event6.png', NULL, NULL, NULL, '1', '0', 1, 'upcoming_events', '0', 'E'),
(37, 'Past Events', NULL, '1', NULL, 'event', 'event7.png', NULL, NULL, NULL, '1', '0', 1, 'past_events', '0', 'E'),
(38, 'President Corner', NULL, '1', NULL, 'presidentcorner', 'president.png', NULL, NULL, NULL, '1', '0', 1, NULL, '0', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_categories_table', 1),
(2, '2018_11_07_141037_create_gallery_table', 1),
(3, '2020_11_05_000000_create_menu_table', 1),
(4, '2020_11_05_000000_create_product_table', 1),
(5, '2020_11_05_000000_create_admin_table', 2),
(6, '2014_10_12_000000_create_brands_table', 3),
(7, '2018_11_05_000000_create_bannerPositions_table', 3),
(8, '2018_11_05_000000_create_banners_table', 3),
(9, '2018_11_05_000000_create_contentPositionRelation_table', 3),
(10, '2018_11_05_000000_create_contentPosition_table', 3),
(11, '2018_11_06_083232_create_enquiry_table', 3),
(12, '2020_11_05_000000_create_content_table', 3),
(13, '2014_10_12_000000_create_featuredProducts_table', 4),
(14, '2014_10_12_000000_create_offerProducts_table', 4),
(15, '2018_11_06_083232_create_productGallery_table', 5),
(16, '2014_10_12_000000_create_popularProducts_table', 6),
(17, '2014_10_12_000000_create_orderDetails_table', 7),
(18, '2014_10_12_000000_create_orders_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `priority` int(11) DEFAULT NULL,
  `status` enum('1','0') NOT NULL,
  `details` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `featured` enum('1','0') NOT NULL DEFAULT '0',
  `image` varchar(222) DEFAULT NULL,
  `identifier` varchar(100) DEFAULT NULL,
  `zone_id` int(11) DEFAULT NULL,
  `slug_url` varchar(222) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `president_corners`
--

CREATE TABLE `president_corners` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `sub_title` varchar(500) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `status` enum('1','0') NOT NULL,
  `details` text NOT NULL,
  `short_description` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `image` varchar(222) DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `president_corners`
--

INSERT INTO `president_corners` (`id`, `title`, `sub_title`, `priority`, `status`, `details`, `short_description`, `created_at`, `updated_at`, `image`, `logo`) VALUES
(1, 'test2', NULL, 0, '1', '<p>testing12222 rerere<br></p>', NULL, NULL, '2019-12-27 04:49:33', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `programes`
--

CREATE TABLE `programes` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `priority` int(11) DEFAULT NULL,
  `status` enum('1','0') NOT NULL,
  `details` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `featured` enum('1','0') NOT NULL DEFAULT '0',
  `zone_id` int(11) DEFAULT NULL,
  `slug_url` varchar(222) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `image` varchar(222) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `status` enum('1','0') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `identifier` varchar(50) DEFAULT NULL,
  `zone_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `priority` int(11) DEFAULT NULL,
  `status` enum('1','0') NOT NULL,
  `created_at` datetime NOT NULL,
  `details` text NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `firstname`, `lastname`, `password`, `status`, `created_at`, `updated_at`) VALUES
(1, 'manojvijayanaluva@gmail.com', 'manoj', 'vijayan', '$2y$10$mgBzY/PReH5d2wiT26BH8O8AxUvVfOgmp5Dkv.ORp6f5DZk1n2N6C', '1', '2019-03-03 06:18:40', '2019-03-03 06:18:40');

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE `user_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `level` enum('A','Z') COLLATE utf8mb4_unicode_ci DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`id`, `title`, `priority`, `status`, `created_at`, `updated_at`, `level`) VALUES
(1, 'Admin', NULL, '1', '2019-09-03 04:51:19', '2019-09-03 04:51:19', 'A'),
(2, 'User', NULL, '1', '2019-09-03 04:52:23', '2019-09-03 04:52:32', 'Z');

-- --------------------------------------------------------

--
-- Table structure for table `zones`
--

CREATE TABLE `zones` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner_positions`
--
ALTER TABLE `banner_positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content_positions`
--
ALTER TABLE `content_positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content_position_relations`
--
ALTER TABLE `content_position_relations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `downloads`
--
ALTER TABLE `downloads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `president_corners`
--
ALTER TABLE `president_corners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programes`
--
ALTER TABLE `programes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zones`
--
ALTER TABLE `zones`
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
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `banner_positions`
--
ALTER TABLE `banner_positions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `content_positions`
--
ALTER TABLE `content_positions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `content_position_relations`
--
ALTER TABLE `content_position_relations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `downloads`
--
ALTER TABLE `downloads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `president_corners`
--
ALTER TABLE `president_corners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `programes`
--
ALTER TABLE `programes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `zones`
--
ALTER TABLE `zones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
