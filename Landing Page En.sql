-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 17, 2024 at 06:36 AM
-- Server version: 8.0.40-0ubuntu0.24.04.1
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `meritcare_landing`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `website_id` bigint UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_first` text COLLATE utf8mb4_unicode_ci,
  `description_second` text COLLATE utf8mb4_unicode_ci,
  `button_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creator` bigint UNSIGNED DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `user_id`, `website_id`, `title`, `description_first`, `description_second`, `button_title`, `button_url`, `creator`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Your Title Here', '\n        <p>\n            <strong>\n                Premium Puffer Jackets by Calvin Klein, designed for both style and functionality. The jackets are available in a variety of colors, including black, yellow, red, light green, blue, and grey, giving customers multiple options to suit their personal style.\n            </strong>\n            </p>\n            <h3><strong>Design &amp; Features:</strong></h3>\n            <p>\n            These puffer jackets are crafted with a <strong>quilted design</strong> for enhanced warmth and a contemporary look. Each jacket features a <strong>full-length zipper</strong>, side pockets for convenience, and the <strong>Calvin Klein logo</strong> subtly embroidered on the chest, adding a touch of sophistication. The jackets are lightweight yet warm, making them ideal for cold-weather wear without compromising on comfort.\n            </p>\n            <h3><strong>Size Measurements:</strong></h3>\n            <p>\n            To help customers select the right size, a <strong>detailed size chart</strong> is provided. The chart includes measurements for <strong>chest, body length, and sleeve length</strong> in inches:\n            </p>\n            <figure class=\"table\">\n            <table>\n                <thead>\n                <tr>\n                    <th><strong>Size</strong></th>\n                    <th><strong>Chest (inches)</strong></th>\n                    <th><strong>Length (inches)</strong></th>\n                    <th><strong>Sleeve Length (inches)</strong></th>\n                </tr>\n                </thead>\n                <tbody>\n                <tr>\n                    <td>S</td>\n                    <td>38</td>\n                    <td>26.5</td>\n                    <td>23.5</td>\n                </tr>\n                <tr>\n                    <td>M</td>\n                    <td>40</td>\n                    <td>27.5</td>\n                    <td>24.5</td>\n                </tr>\n                <tr>\n                    <td>L</td>\n                    <td>42</td>\n                    <td>28.5</td>\n                    <td>25.5</td>\n                </tr>\n                <tr>\n                    <td>XL</td>\n                    <td>44</td>\n                    <td>29.5</td>\n                    <td>26.5</td>\n                </tr>\n                <tr>\n                    <td>2XL</td>\n                    <td>46</td>\n                    <td>30.5</td>\n                    <td>27.5</td>\n                </tr>\n                </tbody>\n            </table>\n            </figure>\n            <p>\n            The <strong>size guide</strong> advises measuring under the arms around the fullest part of the chest while keeping the tape level across the back. A <strong>special note</strong> reminds customers that all measurements are in inches, ensuring accurate sizing.\n            </p>\n            <h3><strong>Call to Action:</strong></h3>\n            <p>\n            At the bottom left, a <strong>QR code</strong> is provided for quick online shopping access, alongside a prompt to visit <strong>superb.com.bd</strong> for a seamless shopping experience. The bottom right corner features social media icons encouraging customers to follow <strong>Superb Lifestyle</strong> for the latest updates and promotions.\n            </p>\n            <p>\n            This presentation highlights the combination of <strong>luxury, warmth, and contemporary design</strong>, making these Calvin Klein puffer jackets a must-have for the colder seasons.\n            </p>\n        ', '\n        <p>Experience zone &amp; outlet:</p>\n        <p>\n        <img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t2d/1/16/1f4cd.png\" alt=\"?\">\n            Suite 305, 2nd Floor, House 10, Road 8, Gulshan-1, Dhaka-1212, Bangladesh</p>\n            <p><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tbe/1/16/1f4e7.png\" alt=\"?\"> Email: superb2u@hotmail.com</p>\n            <p><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t4d/1/16/1f4de.png\" alt=\"?\"> call Center: +8809606990177</p>\n            <p>WhatsApp: +8801820000964</p><p>Everyday open</p><p><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t2f/1/16/1f557.png\" alt=\"?\"> Open: 7:00 AM to 11:59 PM</p>\n            <p><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/te0/1/16/1f31f.png\" alt=\"?\"> Please do like and share our Facebook page to stay connected!</p>\n            <p>We will be introducing more luxury and premium products just for you.</p><p><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t80/1/16/1f64f.png\" alt=\"?\"> Thank you for your support!</p>\n        ', 'Button Title', 'http://127.0.0.1:8002', NULL, NULL, 1, '2024-12-17 00:20:22', '2024-12-17 00:20:22'),
(2, 1, 2, 'Your Title Here', '\n        <p>\n            <strong>\n                Premium Puffer Jackets by Calvin Klein, designed for both style and functionality. The jackets are available in a variety of colors, including black, yellow, red, light green, blue, and grey, giving customers multiple options to suit their personal style.\n            </strong>\n            </p>\n            <h3><strong>Design &amp; Features:</strong></h3>\n            <p>\n            These puffer jackets are crafted with a <strong>quilted design</strong> for enhanced warmth and a contemporary look. Each jacket features a <strong>full-length zipper</strong>, side pockets for convenience, and the <strong>Calvin Klein logo</strong> subtly embroidered on the chest, adding a touch of sophistication. The jackets are lightweight yet warm, making them ideal for cold-weather wear without compromising on comfort.\n            </p>\n            <h3><strong>Size Measurements:</strong></h3>\n            <p>\n            To help customers select the right size, a <strong>detailed size chart</strong> is provided. The chart includes measurements for <strong>chest, body length, and sleeve length</strong> in inches:\n            </p>\n            <figure class=\"table\">\n            <table>\n                <thead>\n                <tr>\n                    <th><strong>Size</strong></th>\n                    <th><strong>Chest (inches)</strong></th>\n                    <th><strong>Length (inches)</strong></th>\n                    <th><strong>Sleeve Length (inches)</strong></th>\n                </tr>\n                </thead>\n                <tbody>\n                <tr>\n                    <td>S</td>\n                    <td>38</td>\n                    <td>26.5</td>\n                    <td>23.5</td>\n                </tr>\n                <tr>\n                    <td>M</td>\n                    <td>40</td>\n                    <td>27.5</td>\n                    <td>24.5</td>\n                </tr>\n                <tr>\n                    <td>L</td>\n                    <td>42</td>\n                    <td>28.5</td>\n                    <td>25.5</td>\n                </tr>\n                <tr>\n                    <td>XL</td>\n                    <td>44</td>\n                    <td>29.5</td>\n                    <td>26.5</td>\n                </tr>\n                <tr>\n                    <td>2XL</td>\n                    <td>46</td>\n                    <td>30.5</td>\n                    <td>27.5</td>\n                </tr>\n                </tbody>\n            </table>\n            </figure>\n            <p>\n            The <strong>size guide</strong> advises measuring under the arms around the fullest part of the chest while keeping the tape level across the back. A <strong>special note</strong> reminds customers that all measurements are in inches, ensuring accurate sizing.\n            </p>\n            <h3><strong>Call to Action:</strong></h3>\n            <p>\n            At the bottom left, a <strong>QR code</strong> is provided for quick online shopping access, alongside a prompt to visit <strong>superb.com.bd</strong> for a seamless shopping experience. The bottom right corner features social media icons encouraging customers to follow <strong>Superb Lifestyle</strong> for the latest updates and promotions.\n            </p>\n            <p>\n            This presentation highlights the combination of <strong>luxury, warmth, and contemporary design</strong>, making these Calvin Klein puffer jackets a must-have for the colder seasons.\n            </p>\n        ', '\n        <p>Experience zone &amp; outlet:</p>\n        <p>\n        <img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t2d/1/16/1f4cd.png\" alt=\"?\">\n            Suite 305, 2nd Floor, House 10, Road 8, Gulshan-1, Dhaka-1212, Bangladesh</p>\n            <p><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tbe/1/16/1f4e7.png\" alt=\"?\"> Email: superb2u@hotmail.com</p>\n            <p><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t4d/1/16/1f4de.png\" alt=\"?\"> call Center: +8809606990177</p>\n            <p>WhatsApp: +8801820000964</p><p>Everyday open</p><p><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t2f/1/16/1f557.png\" alt=\"?\"> Open: 7:00 AM to 11:59 PM</p>\n            <p><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/te0/1/16/1f31f.png\" alt=\"?\"> Please do like and share our Facebook page to stay connected!</p>\n            <p>We will be introducing more luxury and premium products just for you.</p><p><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t80/1/16/1f64f.png\" alt=\"?\"> Thank you for your support!</p>\n        ', 'Button Title', 'http://127.0.0.1:8002', NULL, NULL, 1, '2024-12-17 00:26:06', '2024-12-17 00:26:06');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `website_id` bigint UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn_title_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn_title_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn_url_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn_url_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creator` bigint UNSIGNED DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `user_id`, `website_id`, `title`, `subtitle`, `btn_title_1`, `btn_title_2`, `btn_url_1`, `btn_url_2`, `creator`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Banner Title', 'Banner Subtitle', 'Button 1', 'Button 2', 'http://127.0.0.1:8002', 'http://127.0.0.1:8002', NULL, NULL, 1, '2024-12-17 00:20:22', '2024-12-17 00:20:22'),
(2, 1, 2, 'Banner Title', 'Banner Subtitle', 'Button 1', 'Button 2', 'http://127.0.0.1:8002', 'http://127.0.0.1:8002', NULL, NULL, 1, '2024-12-17 00:26:06', '2024-12-17 00:26:06');

-- --------------------------------------------------------

--
-- Table structure for table `banner_images`
--

CREATE TABLE `banner_images` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `website_id` bigint UNSIGNED DEFAULT NULL,
  `banner_id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int NOT NULL DEFAULT '0',
  `size` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creator` bigint UNSIGNED DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banner_images`
--

INSERT INTO `banner_images` (`id`, `user_id`, `website_id`, `banner_id`, `image`, `order`, `size`, `creator`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 1, 'dummy_image/product-1.jpg', 1, NULL, NULL, NULL, 1, '2024-12-17 00:20:22', '2024-12-17 00:20:22'),
(2, NULL, NULL, 1, 'dummy_image/product-2.jpg', 2, NULL, NULL, NULL, 1, '2024-12-17 00:20:22', '2024-12-17 00:20:22'),
(3, NULL, NULL, 1, 'dummy_image/product-3.jpg', 3, NULL, NULL, NULL, 1, '2024-12-17 00:20:22', '2024-12-17 00:20:22'),
(4, NULL, NULL, 2, 'dummy_image/product-1.jpg', 1, NULL, NULL, NULL, 1, '2024-12-17 00:26:06', '2024-12-17 00:26:06'),
(5, NULL, NULL, 2, 'dummy_image/product-2.jpg', 2, NULL, NULL, NULL, 1, '2024-12-17 00:26:06', '2024-12-17 00:26:06'),
(6, NULL, NULL, 2, 'dummy_image/product-3.jpg', 3, NULL, NULL, NULL, 1, '2024-12-17 00:26:06', '2024-12-17 00:26:06');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `website_id` bigint UNSIGNED DEFAULT NULL,
  `coupon_code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` double NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `creator` bigint UNSIGNED DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `user_id`, `website_id`, `coupon_code`, `discount`, `is_active`, `creator`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Discount10', 10, 1, NULL, NULL, 1, '2024-12-17 00:20:22', '2024-12-17 00:20:22'),
(2, 1, 1, 'Discount20', 20, 0, NULL, NULL, 1, '2024-12-17 00:20:22', '2024-12-17 00:20:22'),
(3, 1, 2, 'Discount10', 10, 1, NULL, NULL, 1, '2024-12-17 00:26:06', '2024-12-17 00:26:06'),
(4, 1, 2, 'Discount20', 20, 0, NULL, NULL, 1, '2024-12-17 00:26:06', '2024-12-17 00:26:06');

-- --------------------------------------------------------

--
-- Table structure for table `courier_infos`
--

CREATE TABLE `courier_infos` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `website_id` bigint UNSIGNED DEFAULT NULL,
  `courier_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_secret` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creator` bigint UNSIGNED DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `global_discounts`
--

CREATE TABLE `global_discounts` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `website_id` bigint UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` double NOT NULL DEFAULT '0',
  `start_datetime` datetime DEFAULT NULL,
  `end_datetime` datetime DEFAULT NULL,
  `creator` bigint UNSIGNED DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `global_discounts`
--

INSERT INTO `global_discounts` (`id`, `user_id`, `website_id`, `title`, `discount`, `start_datetime`, `end_datetime`, `creator`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Global50', 50, '2024-12-17 06:20:22', '2025-01-16 06:20:22', NULL, NULL, 1, '2024-12-17 00:20:22', '2024-12-17 00:20:22'),
(2, 1, 2, 'Global50', 50, '2024-12-17 06:26:06', '2025-01-16 06:26:06', NULL, NULL, 1, '2024-12-17 00:26:06', '2024-12-17 00:26:06');

-- --------------------------------------------------------

--
-- Table structure for table `image_gallery_titles`
--

CREATE TABLE `image_gallery_titles` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `website_id` bigint UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creator` bigint UNSIGNED DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `image_gallery_titles`
--

INSERT INTO `image_gallery_titles` (`id`, `user_id`, `website_id`, `title`, `subtitle`, `btn_title`, `btn_url`, `creator`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Your Gellary Title Here', 'Your Gellary Subtitle Here', 'Your Button Title Here', 'http://127.0.0.1:8002', NULL, NULL, 1, '2024-12-17 00:20:22', '2024-12-17 00:20:22'),
(2, 1, 2, 'Your Gellary Title Here', 'Your Gellary Subtitle Here', 'Your Button Title Here', 'http://127.0.0.1:8002', NULL, NULL, 1, '2024-12-17 00:26:06', '2024-12-17 00:26:06');

-- --------------------------------------------------------

--
-- Table structure for table `image_gallery_values`
--

CREATE TABLE `image_gallery_values` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `website_id` bigint UNSIGNED DEFAULT NULL,
  `image_gallery_title_id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int NOT NULL DEFAULT '0',
  `creator` bigint UNSIGNED DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `image_gallery_values`
--

INSERT INTO `image_gallery_values` (`id`, `user_id`, `website_id`, `image_gallery_title_id`, `image`, `order`, `creator`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 1, 'dummy_image/product-4.jpg', 1, NULL, NULL, 1, '2024-12-17 00:20:22', '2024-12-17 00:20:22'),
(2, NULL, NULL, 1, 'dummy_image/product-5.jpg', 2, NULL, NULL, 1, '2024-12-17 00:20:22', '2024-12-17 00:20:22'),
(3, NULL, NULL, 1, 'dummy_image/product-6.jpg', 3, NULL, NULL, 1, '2024-12-17 00:20:22', '2024-12-17 00:20:22'),
(4, NULL, NULL, 2, 'dummy_image/product-4.jpg', 1, NULL, NULL, 1, '2024-12-17 00:26:06', '2024-12-17 00:26:06'),
(5, NULL, NULL, 2, 'dummy_image/product-5.jpg', 2, NULL, NULL, 1, '2024-12-17 00:26:06', '2024-12-17 00:26:06'),
(6, NULL, NULL, 2, 'dummy_image/product-6.jpg', 3, NULL, NULL, 1, '2024-12-17 00:26:06', '2024-12-17 00:26:06');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_12_07_045636_create_banners_table', 1),
(5, '2024_12_07_050021_create_banner_images_table', 1),
(6, '2024_12_07_090839_create_image_gallery_titles_table', 1),
(7, '2024_12_07_090848_create_image_gallery_values_table', 1),
(8, '2024_12_07_110539_create_products_table', 1),
(9, '2024_12_08_034209_create_abouts_table', 1),
(10, '2024_12_08_051545_create_order_sheets_table', 1),
(11, '2024_12_08_064247_create_global_discounts_table', 1),
(12, '2024_12_08_064303_create_coupons_table', 1),
(13, '2024_12_08_094613_create_settings_table', 1),
(14, '2024_12_09_061310_create_videos_table', 1),
(15, '2024_12_09_123545_create_courier_infos_table', 1),
(16, '2024_12_09_123801_create_sms_gateway_infos_table', 1),
(17, '2024_12_10_131052_create_websites_table', 1),
(18, '2024_12_12_085108_create_order_visitors_table', 1),
(19, '2024_12_17_061706_create_user_website_actives_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_sheets`
--

CREATE TABLE `order_sheets` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `website_id` bigint UNSIGNED DEFAULT NULL,
  `full_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `order_total` double DEFAULT NULL,
  `global_discount_amount` double DEFAULT NULL,
  `global_discount` double DEFAULT NULL,
  `coupon` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_discount_amount` double DEFAULT NULL,
  `coupon_discount` double DEFAULT NULL,
  `shipping_area` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_charge` bigint DEFAULT NULL,
  `grand_total` double DEFAULT NULL,
  `product_details` longtext COLLATE utf8mb4_unicode_ci,
  `delivery_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `creator` bigint UNSIGNED DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_sheets`
--

INSERT INTO `order_sheets` (`id`, `user_id`, `website_id`, `full_name`, `phone_number`, `address`, `order_total`, `global_discount_amount`, `global_discount`, `coupon`, `coupon_discount_amount`, `coupon_discount`, `shipping_area`, `shipping_charge`, `grand_total`, `product_details`, `delivery_status`, `creator`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'dgdfg', 'fgfdg', 'gfgf, আলফাডাঙ্গা, ফরিদপুর', 1200, 50, 600, NULL, 0, 0, 'outside', 110, 710, '[{\"id\":1,\"name\":\"Product Name\",\"price\":1200,\"qty\":\"1\"}]', 'processing', NULL, 'mc-1712240624501', 1, '2024-12-17 00:24:50', '2024-12-17 00:27:40');

-- --------------------------------------------------------

--
-- Table structure for table `order_visitors`
--

CREATE TABLE `order_visitors` (
  `id` bigint UNSIGNED NOT NULL,
  `ip` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime DEFAULT NULL,
  `count` bigint NOT NULL DEFAULT '1',
  `buy` bigint NOT NULL DEFAULT '0',
  `lat` double UNSIGNED DEFAULT NULL,
  `lon` double UNSIGNED DEFAULT NULL,
  `url` text COLLATE utf8mb4_unicode_ci,
  `city` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_location` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `org` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timezone` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_visitors`
--

INSERT INTO `order_visitors` (`id`, `ip`, `date`, `count`, `buy`, `lat`, `lon`, `url`, `city`, `region`, `country`, `ip_location`, `org`, `postal`, `timezone`, `created_at`, `updated_at`) VALUES
(1, '127.0.0.1', NULL, 1, 0, NULL, NULL, 'http://127.0.0.1:8002/', 'Dhaka', 'Dhaka Division', 'BD', '23.7104,90.4074', 'AS134201 Metaphor Digital Media', '1000', 'Asia/Dhaka', NULL, NULL),
(2, '127.0.0.1', NULL, 1, 0, NULL, NULL, 'http://127.0.0.1:8002/', 'Dhaka', 'Dhaka Division', 'BD', '23.7104,90.4074', 'AS134201 Metaphor Digital Media', '1000', 'Asia/Dhaka', NULL, NULL),
(3, '127.0.0.1', NULL, 1, 0, NULL, NULL, 'http://127.0.0.1:8002/', 'Dhaka', 'Dhaka Division', 'BD', '23.7104,90.4074', 'AS134201 Metaphor Digital Media', '1000', 'Asia/Dhaka', NULL, NULL),
(4, '127.0.0.1', NULL, 1, 0, NULL, NULL, 'http://127.0.0.1:8002/', 'Dhaka', 'Dhaka Division', 'BD', '23.7104,90.4074', 'AS134201 Metaphor Digital Media', '1000', 'Asia/Dhaka', NULL, NULL),
(5, '127.0.0.1', NULL, 1, 0, NULL, NULL, 'http://127.0.0.1:8002/', 'Dhaka', 'Dhaka Division', 'BD', '23.7104,90.4074', 'AS134201 Metaphor Digital Media', '1000', 'Asia/Dhaka', NULL, NULL),
(6, '127.0.0.1', NULL, 1, 0, NULL, NULL, 'http://127.0.0.1:8002/', 'Dhaka', 'Dhaka Division', 'BD', '23.7104,90.4074', 'AS134201 Metaphor Digital Media', '1000', 'Asia/Dhaka', NULL, NULL),
(7, '127.0.0.1', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, '127.0.0.1', NULL, 1, 0, NULL, NULL, 'http://127.0.0.1:8002/invoice/mc-1712240624501', 'Dhaka', 'Dhaka Division', 'BD', '23.7104,90.4074', 'AS134201 Metaphor Digital Media', '1000', 'Asia/Dhaka', NULL, NULL),
(9, '127.0.0.1', NULL, 1, 0, NULL, NULL, 'http://127.0.0.1:8002/invoice/mc-1712240624501', 'Dhaka', 'Dhaka Division', 'BD', '23.7104,90.4074', 'AS134201 Metaphor Digital Media', '1000', 'Asia/Dhaka', NULL, NULL),
(10, '127.0.0.1', NULL, 1, 0, NULL, NULL, 'http://127.0.0.1:8002/invoice/mc-1712240624501', 'Dhaka', 'Dhaka Division', 'BD', '23.7104,90.4074', 'AS134201 Metaphor Digital Media', '1000', 'Asia/Dhaka', NULL, NULL),
(11, '127.0.0.1', NULL, 1, 0, NULL, NULL, 'http://127.0.0.1:8002/', 'Dhaka', 'Dhaka Division', 'BD', '23.7104,90.4074', 'AS134201 Metaphor Digital Media', '1000', 'Asia/Dhaka', NULL, NULL),
(12, '127.0.0.1', NULL, 1, 0, NULL, NULL, 'http://127.0.0.1:8002/', 'Dhaka', 'Dhaka Division', 'BD', '23.7104,90.4074', 'AS134201 Metaphor Digital Media', '1000', 'Asia/Dhaka', NULL, NULL),
(13, '127.0.0.1', NULL, 1, 0, NULL, NULL, 'http://127.0.0.1:8002/', 'Dhaka', 'Dhaka Division', 'BD', '23.7104,90.4074', 'AS134201 Metaphor Digital Media', '1000', 'Asia/Dhaka', NULL, NULL),
(14, '127.0.0.1', NULL, 1, 0, NULL, NULL, 'http://127.0.0.1:8002/', 'Dhaka', 'Dhaka Division', 'BD', '23.7104,90.4074', 'AS134201 Metaphor Digital Media', '1000', 'Asia/Dhaka', NULL, NULL),
(15, '127.0.0.1', NULL, 1, 0, NULL, NULL, 'http://127.0.0.1:8002/', 'Dhaka', 'Dhaka Division', 'BD', '23.7104,90.4074', 'AS134201 Metaphor Digital Media', '1000', 'Asia/Dhaka', NULL, NULL),
(16, '127.0.0.1', NULL, 1, 0, NULL, NULL, 'http://127.0.0.1:8002/', 'Dhaka', 'Dhaka Division', 'BD', '23.7104,90.4074', 'AS134201 Metaphor Digital Media', '1000', 'Asia/Dhaka', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `website_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double DEFAULT NULL,
  `discount_price` double DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creator` bigint UNSIGNED DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `website_id`, `name`, `price`, `discount_price`, `image`, `creator`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Product Name', 1200, 999, 'dummy_image/product-1.jpg', NULL, NULL, 1, '2024-12-17 00:20:22', '2024-12-17 00:20:22'),
(2, 1, 2, 'Product Name', 1200, 999, 'dummy_image/product-1.jpg', NULL, NULL, 1, '2024-12-17 00:26:06', '2024-12-17 00:26:06');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('7qxu3DekNHtZyVtdmnyEapmWIrsEpqqGMx8KV3fD', 1, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiZ0lwYjc1eU8wbUFqZ0xJTXZuRXgxUVhXSllINEU0NnE4Q1FiNVdwNCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNzoiaHR0cDovLzEyNy4wLjAuMTo4MDAyL2FkbWluIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMi9hZG1pbi93ZWJzaXRlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjU6Im9yZGVyIjtPOjg6InN0ZENsYXNzIjoxNzp7czo3OiJ1c2VyX2lkIjtpOjE7czoxMDoid2Vic2l0ZV9pZCI7TjtzOjk6ImZ1bGxfbmFtZSI7czo1OiJkZ2RmZyI7czoxMjoicGhvbmVfbnVtYmVyIjtzOjU6ImZnZmRnIjtzOjc6ImFkZHJlc3MiO3M6NTk6ImdmZ2YsIOCmhuCmsuCmq+CmvuCmoeCmvuCmmeCnjeCml+Cmviwg4Kar4Kaw4Ka/4Kam4Kaq4KeB4KawIjtzOjExOiJvcmRlcl90b3RhbCI7ZDoxMjAwO3M6MjI6Imdsb2JhbF9kaXNjb3VudF9hbW91bnQiO2Q6NTA7czoxNToiZ2xvYmFsX2Rpc2NvdW50IjtkOjYwMDtzOjY6ImNvdXBvbiI7TjtzOjIyOiJjb3Vwb25fZGlzY291bnRfYW1vdW50IjtpOjA7czoxNToiY291cG9uX2Rpc2NvdW50IjtpOjA7czoxMzoic2hpcHBpbmdfYXJlYSI7czo3OiJvdXRzaWRlIjtzOjE1OiJzaGlwcGluZ19jaGFyZ2UiO2k6MTEwO3M6MTE6ImdyYW5kX3RvdGFsIjtkOjcxMDtzOjE1OiJwcm9kdWN0X2RldGFpbHMiO3M6NTU6Ilt7ImlkIjoxLCJuYW1lIjoiUHJvZHVjdCBOYW1lIiwicHJpY2UiOjEyMDAsInF0eSI6IjEifV0iO3M6NDoic2x1ZyI7czoxNToibWMtMTcxMjI0MDYyNDUwIjtzOjEwOiJjcmVhdGVkX2F0IjtzOjE5OiIyMDI0LTEyLTE3IDA2OjI0OjUwIjt9fQ==', 1734417391);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `website_id` bigint UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `creator` bigint UNSIGNED DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `user_id`, `website_id`, `title`, `value`, `creator`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'inside Dhaka', '50', NULL, NULL, 1, '2024-12-17 00:20:22', '2024-12-17 00:20:22'),
(2, 1, 1, 'outside Dhaka', '90', NULL, NULL, 1, '2024-12-17 00:20:22', '2024-12-17 00:20:22'),
(3, 1, 1, 'emergency contact', '01954335310', NULL, NULL, 1, '2024-12-17 00:20:22', '2024-12-17 00:20:22'),
(4, 1, 1, 'sales conact 1', '01954335310', NULL, NULL, 1, '2024-12-17 00:20:22', '2024-12-17 00:20:22'),
(5, 1, 1, 'sales conact 2', '01954335310', NULL, NULL, 1, '2024-12-17 00:20:22', '2024-12-17 00:20:22'),
(6, 1, 1, 'address', 'Mirpur 1', NULL, NULL, 1, '2024-12-17 00:20:22', '2024-12-17 00:20:22'),
(7, 1, 1, 'email', 'akash@gmail.com', NULL, NULL, 1, '2024-12-17 00:20:22', '2024-12-17 00:20:22'),
(8, 1, 1, 'google map', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.841664799973!2d90.40095357607973!3d23.788651987305247!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c70024ae89f5%3A0xf16f71464f51e199!2sETEK%20Computer%20And%20Software%20Development!5e0!3m2!1sen!2sbd!4v1733836018069!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', NULL, NULL, 1, '2024-12-17 00:20:22', '2024-12-17 00:20:22'),
(9, 1, 1, 'whatsapp', '01954335310', NULL, NULL, 1, '2024-12-17 00:20:22', '2024-12-17 00:20:22'),
(10, 1, 1, 'facebook page', 'www.facebook.com', NULL, NULL, 1, '2024-12-17 00:20:22', '2024-12-17 00:20:22'),
(11, 1, 1, 'header css', '\n                        <style>\n                            .custom_class{\n                                background-color: #f5f5f5;\n                            }\n                        </style>\n                ', NULL, NULL, 1, '2024-12-17 00:20:22', '2024-12-17 00:20:22'),
(12, 1, 1, 'header js', '\n                    <script>\n                        console.log(\'Custom Function\');\n                    </script>\n                ', NULL, NULL, 1, '2024-12-17 00:20:22', '2024-12-17 00:20:22'),
(13, 1, 1, 'logo', 'logo.png', NULL, NULL, 1, '2024-12-17 00:20:22', '2024-12-17 00:20:22'),
(14, 1, 1, 'copyright', 'copyright 2024', NULL, NULL, 1, '2024-12-17 00:20:22', '2024-12-17 00:20:22'),
(15, 1, 1, 'Telegram Bot Api', 'bot:dghfkjdhkitj=', NULL, NULL, 1, '2024-12-17 00:20:22', '2024-12-17 00:20:22'),
(16, 1, 2, 'inside Dhaka', '50', NULL, NULL, 1, '2024-12-17 00:26:06', '2024-12-17 00:26:06'),
(17, 1, 2, 'outside Dhaka', '90', NULL, NULL, 1, '2024-12-17 00:26:06', '2024-12-17 00:26:06'),
(18, 1, 2, 'emergency contact', '01954335310', NULL, NULL, 1, '2024-12-17 00:26:06', '2024-12-17 00:26:06'),
(19, 1, 2, 'sales conact 1', '01954335310', NULL, NULL, 1, '2024-12-17 00:26:06', '2024-12-17 00:26:06'),
(20, 1, 2, 'sales conact 2', '01954335310', NULL, NULL, 1, '2024-12-17 00:26:06', '2024-12-17 00:26:06'),
(21, 1, 2, 'address', 'Mirpur 1', NULL, NULL, 1, '2024-12-17 00:26:06', '2024-12-17 00:26:06'),
(22, 1, 2, 'email', 'akash@gmail.com', NULL, NULL, 1, '2024-12-17 00:26:06', '2024-12-17 00:26:06'),
(23, 1, 2, 'google map', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.841664799973!2d90.40095357607973!3d23.788651987305247!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c70024ae89f5%3A0xf16f71464f51e199!2sETEK%20Computer%20And%20Software%20Development!5e0!3m2!1sen!2sbd!4v1733836018069!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', NULL, NULL, 1, '2024-12-17 00:26:06', '2024-12-17 00:26:06'),
(24, 1, 2, 'whatsapp', '01954335310', NULL, NULL, 1, '2024-12-17 00:26:06', '2024-12-17 00:26:06'),
(25, 1, 2, 'facebook page', 'www.facebook.com', NULL, NULL, 1, '2024-12-17 00:26:06', '2024-12-17 00:26:06'),
(26, 1, 2, 'header css', '\n                        <style>\n                            .custom_class{\n                                background-color: #f5f5f5;\n                            }\n                        </style>\n                ', NULL, NULL, 1, '2024-12-17 00:26:06', '2024-12-17 00:26:06'),
(27, 1, 2, 'header js', '\n                    <script>\n                        console.log(\'Custom Function\');\n                    </script>\n                ', NULL, NULL, 1, '2024-12-17 00:26:06', '2024-12-17 00:26:06'),
(28, 1, 2, 'logo', 'logo.png', NULL, NULL, 1, '2024-12-17 00:26:06', '2024-12-17 00:26:06'),
(29, 1, 2, 'copyright', 'copyright 2024', NULL, NULL, 1, '2024-12-17 00:26:06', '2024-12-17 00:26:06'),
(30, 1, 2, 'Telegram Bot Api', 'bot:dghfkjdhkitj=', NULL, NULL, 1, '2024-12-17 00:26:06', '2024-12-17 00:26:06');

-- --------------------------------------------------------

--
-- Table structure for table `sms_gateway_infos`
--

CREATE TABLE `sms_gateway_infos` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `website_id` bigint UNSIGNED DEFAULT NULL,
  `gateway_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_secret` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creator` bigint UNSIGNED DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$12$Dr9Dx6qJbvpsZ3pz1wn4c.7seaj1JudzVwC97wN7x76odVio4ImwG', NULL, '2024-12-17 00:19:47', '2024-12-17 00:19:47');

-- --------------------------------------------------------

--
-- Table structure for table `user_website_actives`
--

CREATE TABLE `user_website_actives` (
  `id` bigint UNSIGNED NOT NULL,
  `website_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `user_website_active` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_website_actives`
--

INSERT INTO `user_website_actives` (`id`, `website_id`, `user_id`, `user_website_active`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 1, '2024-12-17 00:25:55', '2024-12-17 00:28:08');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `website_id` bigint UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creator` bigint UNSIGNED DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `user_id`, `website_id`, `title`, `sub_title`, `image`, `button_title`, `button_url`, `creator`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Your Title Here', 'Your Subtitle Here', 'dummy_image/video_background.webp', 'Button Title', 'http://127.0.0.1:8002', NULL, NULL, 1, '2024-12-17 00:20:22', '2024-12-17 00:20:22'),
(2, 1, 2, 'Your Title Here', 'Your Subtitle Here', 'dummy_image/video_background.webp', 'Button Title', 'http://127.0.0.1:8002', NULL, NULL, 1, '2024-12-17 00:26:06', '2024-12-17 00:26:06');

-- --------------------------------------------------------

--
-- Table structure for table `websites`
--

CREATE TABLE `websites` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `site_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_url` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domain_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_default` tinyint NOT NULL DEFAULT '0',
  `status` enum('active','inactive','deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `creator` bigint UNSIGNED DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `websites`
--

INSERT INTO `websites` (`id`, `user_id`, `site_name`, `site_url`, `domain_name`, `is_default`, `status`, `creator`, `slug`, `created_at`, `updated_at`) VALUES
(1, 1, 'Winter Hoddie', 'winter-hoddie', 'etek.com.bd', 1, 'active', NULL, NULL, '2024-12-17 00:20:22', '2024-12-17 00:22:20'),
(2, 1, 'test', 'test', 'superb.com.bd', 0, 'active', NULL, NULL, '2024-12-17 00:26:06', '2024-12-17 00:26:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner_images`
--
ALTER TABLE `banner_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `banner_images_banner_id_foreign` (`banner_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courier_infos`
--
ALTER TABLE `courier_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `global_discounts`
--
ALTER TABLE `global_discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_gallery_titles`
--
ALTER TABLE `image_gallery_titles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_gallery_values`
--
ALTER TABLE `image_gallery_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `image_gallery_values_image_gallery_title_id_foreign` (`image_gallery_title_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_sheets`
--
ALTER TABLE `order_sheets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_visitors`
--
ALTER TABLE `order_visitors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_gateway_infos`
--
ALTER TABLE `sms_gateway_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_website_actives`
--
ALTER TABLE `user_website_actives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `websites`
--
ALTER TABLE `websites`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `banner_images`
--
ALTER TABLE `banner_images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `courier_infos`
--
ALTER TABLE `courier_infos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `global_discounts`
--
ALTER TABLE `global_discounts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `image_gallery_titles`
--
ALTER TABLE `image_gallery_titles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `image_gallery_values`
--
ALTER TABLE `image_gallery_values`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `order_sheets`
--
ALTER TABLE `order_sheets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_visitors`
--
ALTER TABLE `order_visitors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `sms_gateway_infos`
--
ALTER TABLE `sms_gateway_infos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_website_actives`
--
ALTER TABLE `user_website_actives`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `websites`
--
ALTER TABLE `websites`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `banner_images`
--
ALTER TABLE `banner_images`
  ADD CONSTRAINT `banner_images_banner_id_foreign` FOREIGN KEY (`banner_id`) REFERENCES `banners` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `image_gallery_values`
--
ALTER TABLE `image_gallery_values`
  ADD CONSTRAINT `image_gallery_values_image_gallery_title_id_foreign` FOREIGN KEY (`image_gallery_title_id`) REFERENCES `image_gallery_titles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
