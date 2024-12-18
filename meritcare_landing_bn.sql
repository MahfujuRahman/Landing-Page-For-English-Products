-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 18, 2024 at 07:15 AM
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
-- Database: `meritcare_landing_bn`
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
(1, 1, 1, 'আমাদের বিশিষ্ট সমূহ', '\n            <p>\n                <strong>\n                    ক্যালভিন ক্লেইনের প্রিমিয়াম পাফার জ্যাকেট, যা স্টাইল এবং কার্যকারিতার সমন্বয়ে ডিজাইন করা হয়েছে। এই জ্যাকেটগুলো বিভিন্ন রঙে পাওয়া যায়, যেমন কালো, হলুদ, লাল, হালকা সবুজ, নীল এবং ধূসর। গ্রাহকদের ব্যক্তিগত স্টাইল অনুযায়ী রঙ বেছে নেওয়ার অনেক অপশন রয়েছে।\n                </strong>\n            </p>\n            <h3><strong>ডিজাইন এবং বৈশিষ্ট্য:</strong></h3>\n            <p>\n                এই পাফার জ্যাকেটগুলো <strong>কুইল্টেড ডিজাইন</strong>-এ তৈরি করা হয়েছে যা উষ্ণতা এবং আধুনিক লুক যোগ করে। প্রতিটি জ্যাকেটে রয়েছে <strong>ফুল-লেংথ চেইন</strong>, সুবিধাজনক সাইড পকেট এবং বুকের ওপর সূক্ষ্মভাবে <strong>ক্যালভিন ক্লেইন লোগো</strong> এমব্রয়ডারি করা আছে, যা জ্যাকেটটিকে আরও আকর্ষণীয় করে তোলে। জ্যাকেটগুলো হালকা কিন্তু উষ্ণ, যা ঠান্ডা আবহাওয়ার জন্য আদর্শ এবং আরামের সাথে কোনো আপোষ করে না।\n            </p>\n            <h3><strong>সাইজ মাপ:</strong></h3>\n            <p>\n                গ্রাহকদের সঠিক সাইজ বাছাই করতে একটি <strong>বিস্তারিত সাইজ চার্ট</strong> দেওয়া হয়েছে। চার্টে <strong>বুক, বডি লেংথ এবং হাতার দৈর্ঘ্য</strong> ইনচে উল্লেখ করা হয়েছে:\n            </p>\n            <figure class=\"table\">\n            <table>\n                <thead>\n                <tr>\n                    <th><strong>সাইজ</strong></th>\n                    <th><strong>বুক (ইঞ্চি)</strong></th>\n                    <th><strong>লম্বা (ইঞ্চি)</strong></th>\n                    <th><strong>হাতার দৈর্ঘ্য (ইঞ্চি)</strong></th>\n                </tr>\n                </thead>\n                <tbody>\n                <tr>\n                    <td>S</td>\n                    <td>৩৮</td>\n                    <td>২৬.৫</td>\n                    <td>২৩.৫</td>\n                </tr>\n                <tr>\n                    <td>M</td>\n                    <td>৪০</td>\n                    <td>২৭.৫</td>\n                    <td>২৪.৫</td>\n                </tr>\n                <tr>\n                    <td>L</td>\n                    <td>৪২</td>\n                    <td>২৮.৫</td>\n                    <td>২৫.৫</td>\n                </tr>\n                <tr>\n                    <td>XL</td>\n                    <td>৪৪</td>\n                    <td>২৯.৫</td>\n                    <td>২৬.৫</td>\n                </tr>\n                <tr>\n                    <td>2XL</td>\n                    <td>৪৬</td>\n                    <td>৩০.৫</td>\n                    <td>২৭.৫</td>\n                </tr>\n                </tbody>\n            </table>\n            </figure>\n            <p>\n                <strong>সাইজ গাইড</strong>-এ পরামর্শ দেওয়া হয়েছে যে বুকের সবচেয়ে বড় অংশের নিচে টেপ রেখে সঠিকভাবে পরিমাপ করুন এবং টেপটি পিছনে সমানভাবে রাখুন। একটি <strong>বিশেষ নোট</strong> গ্রাহকদের মনে করিয়ে দেয় যে সমস্ত মাপ ইনচে দেওয়া হয়েছে, যাতে সঠিক সাইজ নিশ্চিত করা যায়।\n            </p>\n            <h3><strong>কেনার নির্দেশনা:</strong></h3>\n            <p>\n                নিচের বাম দিকে একটি <strong>QR কোড</strong> দেওয়া হয়েছে দ্রুত অনলাইন শপিংয়ের জন্য, পাশাপাশি <strong>superb.com.bd</strong> ওয়েবসাইটে ভিজিট করার পরামর্শ দেওয়া হয়েছে যাতে সহজে কেনাকাটা করা যায়। ডানদিকে সোশ্যাল মিডিয়া আইকন রয়েছে, যেখানে গ্রাহকদের <strong>Superb Lifestyle</strong> পেজটি ফলো করার অনুরোধ করা হয়েছে, যাতে সর্বশেষ আপডেট এবং অফার সম্পর্কে জানা যায়।\n            </p>\n            <p>\n                এই উপস্থাপনায় <strong>বিলাসিতা, উষ্ণতা এবং আধুনিক ডিজাইন</strong>-এর সমন্বয় তুলে ধরা হয়েছে, যা ক্যালভিন ক্লেইনের পাফার জ্যাকেটকে শীত মৌসুমের জন্য অবশ্যই কেনার একটি পণ্য হিসেবে উপস্থাপন করে।\n            </p>\n        ', '\n            <p>অভিজ্ঞতা জোন এবং আউটলেট:</p>\n            <p>\n            <img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t2d/1/16/1f4cd.png\" alt=\"?\">\n                স্যুট ৩০৫, দ্বিতীয় তলা, বাড়ি ১০, রোড ৮, গুলশান-১, ঢাকা-১২১২, বাংলাদেশ</p>\n            <p><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tbe/1/16/1f4e7.png\" alt=\"?\"> ইমেইল: superb2u@hotmail.com</p>\n            <p><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t4d/1/16/1f4de.png\" alt=\"?\"> কল সেন্টার: +৮৮০৯৬০৬৯৯০১৭৭</p>\n            <p>হোয়াটসঅ্যাপ: +৮৮০১৮২০০০০৯৬৪</p>\n            <p>প্রতিদিন খোলা</p>\n            <p><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t2f/1/16/1f557.png\" alt=\"?\"> সময়: সকাল ৭:০০ টা থেকে রাত ১১:৫৯ টা পর্যন্ত</p>\n            <p><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/te0/1/16/1f31f.png\" alt=\"?\"> আমাদের সাথে সংযুক্ত থাকতে আমাদের ফেসবুক পেজে লাইক এবং শেয়ার করুন!</p>\n            <p>আমরা খুব শীঘ্রই আরও বিলাসবহুল এবং প্রিমিয়াম পণ্য আপনাদের জন্য নিয়ে আসব।</p>\n            <p><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t80/1/16/1f64f.png\" alt=\"?\"> আপনাদের সহযোগিতার জন্য ধন্যবাদ!</p>\n        ', 'এখানে ক্লিক করুন', 'http://127.0.0.1:8000/#order', NULL, NULL, 1, '2024-12-18 00:53:35', '2024-12-18 00:53:35');

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
(1, 1, 1, 'স্টাইলিশ হুডি কালেকশন', 'আপনার স্বাচ্ছন্দ্য আর ফ্যাশনের সেরা সমন্বয়', 'অর্ডার করুন', 'ভিডিও দেখুন', 'http://127.0.0.1:8000/#order', 'https://www.youtube.com/watch?v=eno--4Iviiw', NULL, NULL, 1, '2024-12-18 00:53:35', '2024-12-18 00:53:35');

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
(1, NULL, NULL, 1, 'dummy_image/product-1.jpg', 1, NULL, NULL, NULL, 1, '2024-12-18 00:53:35', '2024-12-18 00:53:35'),
(2, NULL, NULL, 1, 'dummy_image/product-2.jpg', 2, NULL, NULL, NULL, 1, '2024-12-18 00:53:35', '2024-12-18 00:53:35'),
(3, NULL, NULL, 1, 'dummy_image/product-3.jpg', 3, NULL, NULL, NULL, 1, '2024-12-18 00:53:35', '2024-12-18 00:53:35');

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
(1, 1, 1, 'অফার-১০', 10, 1, NULL, NULL, 1, '2024-12-18 00:53:35', '2024-12-18 00:53:35'),
(2, 1, 1, 'অফার-২০', 20, 0, NULL, NULL, 1, '2024-12-18 00:53:35', '2024-12-18 00:53:35');

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
(1, 1, 1, 'শীতের ডিসকাউন্ট - ৫০%', 50, '2024-12-18 06:53:35', '2025-01-17 06:53:35', NULL, NULL, 1, '2024-12-18 00:53:35', '2024-12-18 00:53:35');

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
(1, 1, 1, 'প্রোডাক্ট গ্যালারি', 'সব ধরনের শীতের প্রোডাক্ট এখানে পাওয়া যাবে', 'অর্ডার করুন', 'http://127.0.0.1:8000/#order', NULL, NULL, 1, '2024-12-18 00:53:35', '2024-12-18 00:53:35');

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
(1, NULL, NULL, 1, 'dummy_image/product-4.jpg', 1, NULL, NULL, 1, '2024-12-18 00:53:35', '2024-12-18 00:53:35'),
(2, NULL, NULL, 1, 'dummy_image/product-5.jpg', 2, NULL, NULL, 1, '2024-12-18 00:53:35', '2024-12-18 00:53:35'),
(3, NULL, NULL, 1, 'dummy_image/product-6.jpg', 3, NULL, NULL, 1, '2024-12-18 00:53:35', '2024-12-18 00:53:35');

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
(19, '2024_12_17_061706_create_user_website_actives_table', 1),
(20, '2024_12_18_040707_create_product_groups_table', 1);

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
  `product_group_id` bigint UNSIGNED DEFAULT NULL,
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

INSERT INTO `products` (`id`, `user_id`, `website_id`, `product_group_id`, `name`, `price`, `discount_price`, `image`, `creator`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'প্রিমিয়াম পাফার জ্যাকেট', 1200, 999, 'dummy_image/product-1.jpg', NULL, NULL, 1, '2024-12-18 00:53:35', '2024-12-18 00:53:35');

-- --------------------------------------------------------

--
-- Table structure for table `product_groups`
--

CREATE TABLE `product_groups` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `website_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creator` bigint UNSIGNED DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_groups`
--

INSERT INTO `product_groups` (`id`, `user_id`, `website_id`, `name`, `creator`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'প্রিমিয়াম জ্যাকেট', NULL, NULL, 1, '2024-12-18 00:53:35', '2024-12-18 00:53:35');

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
('Letjkrrb72a2j6Wf4gNSNcjsduLZMNtjf4TzBsFx', 1, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoibmliaEIxTXdGNXhScTBWTWZNNWJETWVveEJRSzFReFZ5dGloQW9ZWiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkbWluL3dlYnNpdGUiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkbWluL3Byb2R1Y3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1734505142);

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
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text',
  `creator` bigint UNSIGNED DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `user_id`, `website_id`, `title`, `value`, `type`, `creator`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'inside Dhaka', '50', 'text', NULL, NULL, 1, '2024-12-18 00:53:35', '2024-12-18 00:53:35'),
(2, 1, 1, 'outside Dhaka', '90', 'text', NULL, NULL, 1, '2024-12-18 00:53:35', '2024-12-18 00:53:35'),
(3, 1, 1, 'emergency contact', '01954335310', 'text', NULL, NULL, 1, '2024-12-18 00:53:35', '2024-12-18 00:53:35'),
(4, 1, 1, 'sales conact 1', '01954335310', 'text', NULL, NULL, 1, '2024-12-18 00:53:35', '2024-12-18 00:53:35'),
(5, 1, 1, 'sales conact 2', '01954335310', 'text', NULL, NULL, 1, '2024-12-18 00:53:35', '2024-12-18 00:53:35'),
(6, 1, 1, 'address', 'Mirpur 1', 'text', NULL, NULL, 1, '2024-12-18 00:53:35', '2024-12-18 00:53:35'),
(7, 1, 1, 'email', 'akash@gmail.com', 'text', NULL, NULL, 1, '2024-12-18 00:53:35', '2024-12-18 00:53:35'),
(8, 1, 1, 'google map', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.841664799973!2d90.40095357607973!3d23.788651987305247!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c70024ae89f5%3A0xf16f71464f51e199!2sETEK%20Computer%20And%20Software%20Development!5e0!3m2!1sen!2sbd!4v1733836018069!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'text', NULL, NULL, 1, '2024-12-18 00:53:35', '2024-12-18 00:53:35'),
(9, 1, 1, 'whatsapp', '01954335310', 'text', NULL, NULL, 1, '2024-12-18 00:53:35', '2024-12-18 00:53:35'),
(10, 1, 1, 'facebook page', 'www.facebook.com', 'text', NULL, NULL, 1, '2024-12-18 00:53:35', '2024-12-18 00:53:35'),
(11, 1, 1, 'header css', '\n                        <style>\n                            .custom_class{\n                                background-color: #f5f5f5;\n                            }\n                        </style>\n                ', 'text', NULL, NULL, 1, '2024-12-18 00:53:35', '2024-12-18 00:53:35'),
(12, 1, 1, 'header js', '\n                    <script>\n                        console.log(\'Custom Function\');\n                    </script>\n                ', 'text', NULL, NULL, 1, '2024-12-18 00:53:35', '2024-12-18 00:53:35'),
(13, 1, 1, 'logo', 'logo.png', 'text', NULL, NULL, 1, '2024-12-18 00:53:35', '2024-12-18 00:53:35'),
(14, 1, 1, 'copyright', 'copyright 2024', 'text', NULL, NULL, 1, '2024-12-18 00:53:35', '2024-12-18 00:53:35'),
(15, 1, 1, 'Telegram Bot Api', 'bot:dghfkjdhkitj=', 'text', NULL, NULL, 1, '2024-12-18 00:53:35', '2024-12-18 00:53:35');

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
(1, 'admin', 'admin@gmail.com', NULL, '$2y$12$K8vDZ2ZPy6u5EWfxntPx6.vZ1PzivGmImy59ET6WeEWHhR9.ooxJO', NULL, '2024-12-18 00:53:24', '2024-12-18 00:53:24');

-- --------------------------------------------------------

--
-- Table structure for table `user_website_actives`
--

CREATE TABLE `user_website_actives` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `user_website_active` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_website_actives`
--

INSERT INTO `user_website_actives` (`id`, `user_id`, `user_website_active`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2024-12-18 00:53:35', '2024-12-18 00:53:35');

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
(1, 1, 1, 'আমাদের ভিডিও দেখুন', 'আমাদের প্রোডাক্ট এবং সেবা সম্পর্কে বিস্তারিত জানুন', 'dummy_image/video_background.webp', 'এখানে ক্লিক করুন', 'https://www.youtube.com/watch?v=eno--4Iviiw', NULL, NULL, 1, '2024-12-18 00:53:35', '2024-12-18 00:53:35');

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
(1, 1, 'Winter Hoddie', 'winter-hoddie', 'etek.com.bd', 1, 'active', NULL, NULL, '2024-12-18 00:53:35', '2024-12-18 00:53:35');

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
-- Indexes for table `product_groups`
--
ALTER TABLE `product_groups`
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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banner_images`
--
ALTER TABLE `banner_images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `image_gallery_titles`
--
ALTER TABLE `image_gallery_titles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `image_gallery_values`
--
ALTER TABLE `image_gallery_values`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `order_sheets`
--
ALTER TABLE `order_sheets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_visitors`
--
ALTER TABLE `order_visitors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_groups`
--
ALTER TABLE `product_groups`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `websites`
--
ALTER TABLE `websites`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
