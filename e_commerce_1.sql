-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 05, 2024 at 04:05 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_commerce_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint UNSIGNED NOT NULL,
  `brand_title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_pic` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_slug` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_status` int NOT NULL DEFAULT '1',
  `brand_creator` int NOT NULL,
  `brand_editor` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_title`, `brand_pic`, `brand_slug`, `brand_status`, `brand_creator`, `brand_editor`, `created_at`, `updated_at`) VALUES
(1, 'Sara', 'Brand-665793bac6a4a.png', 'Brand-665793bac6e3c', 1, 1, NULL, '2024-05-29 20:44:42', NULL),
(2, 'Addidas', 'Brand-6657945b52d2b.png', 'Brand-6657945b53156', 1, 1, NULL, '2024-05-29 20:47:23', NULL),
(3, 'Nike', 'Brand-6657946e36939.png', 'Brand-6657946e36d44', 1, 1, NULL, '2024-05-29 20:47:42', NULL),
(4, 'Gucci', 'Brand-6657947b58294.png', 'Brand-6657947b58591', 1, 1, NULL, '2024-05-29 20:47:55', NULL),
(5, 'Luis Vuitton', 'Brand-66a4dc9d4aa5d.jpg', 'Brand-66a4dc9d4b31a', 1, 1, NULL, '2024-07-27 11:40:13', NULL),
(22, 'Figma', 'Brand-66bf323e07250.png', 'Brand-66bf323e07914', 1, 1, NULL, '2024-08-16 11:04:30', NULL),
(28, 'Mbrealla', 'Brand-66bf351271de8.png', 'Brand-66bf3512723e2', 1, 1, NULL, '2024-08-16 11:16:34', NULL),
(30, 'Xara', 'Brand-66bf35ca0dd83.png', 'Brand-66bf35ca0e304', 1, 1, NULL, '2024-08-16 11:19:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `cat_title` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cat_slug` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cat_pic` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cat_terms` tinyint(1) NOT NULL DEFAULT '0',
  `cat_status` int NOT NULL DEFAULT '1',
  `cat_creator` int DEFAULT NULL,
  `cat_editor` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_title`, `cat_slug`, `cat_pic`, `cat_terms`, `cat_status`, `cat_creator`, `cat_editor`, `created_at`, `updated_at`) VALUES
(1, 'Men\'s', 'cat-66578d8ed4dd6', 'Cate-66578d8ed35ec.png', 1, 1, 1, NULL, '2024-05-29 20:18:22', NULL),
(2, 'Women\'s', 'cat-66578daab0ca1', 'Cate-66578daab09a6.png', 1, 1, 1, NULL, '2024-05-29 20:18:50', NULL),
(3, 'Children', 'cat-66578dbe3bbe2', 'Cate-66578dbe3b8d4.png', 1, 1, 1, NULL, '2024-05-29 20:19:10', NULL),
(4, 'Electronics', 'cat-66578dd74b21e', 'Cate-66578dd74ae94.png', 1, 1, 1, NULL, '2024-05-29 20:19:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `child_categories`
--

CREATE TABLE `child_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `child_cat_title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `child_cat_slug` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_id` bigint UNSIGNED NOT NULL,
  `subcat_id` bigint UNSIGNED NOT NULL,
  `child_cat_creator` int NOT NULL,
  `child_cat_editor` int DEFAULT NULL,
  `child_cat_status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `child_categories`
--

INSERT INTO `child_categories` (`id`, `child_cat_title`, `child_cat_slug`, `cat_id`, `subcat_id`, `child_cat_creator`, `child_cat_editor`, `child_cat_status`, `created_at`, `updated_at`) VALUES
(1, 'Xioami', 'subcat-66578fbc4b0cc', 4, 9, 1, NULL, 1, '2024-05-29 20:27:40', NULL),
(2, 'Tecno', 'subcat-66578fcd6b95a', 4, 9, 1, NULL, 1, '2024-05-29 20:27:57', NULL),
(3, 'Casual', 'subcat-66578fe7a8a7f', 2, 4, 1, NULL, 1, '2024-05-29 20:28:23', NULL),
(4, 'Formal', 'subcat-66578ff3e1a29', 2, 4, 1, NULL, 1, '2024-05-29 20:28:35', NULL),
(5, 'Jeans', 'subcat-665790050e081', 2, 5, 1, NULL, 1, '2024-05-29 20:28:53', NULL),
(6, 'Scandals', 'subcat-66579017783e1', 2, 4, 1, NULL, 1, '2024-05-29 20:29:11', NULL),
(7, 'Casual', 'subcat-665792c3363b0', 1, 1, 1, NULL, 1, '2024-05-29 20:40:35', NULL),
(8, 'Formal', 'subcat-665792e34c32f', 1, 1, 1, NULL, 1, '2024-05-29 20:41:07', NULL),
(9, 'Jeans', 'subcat-665793030dbdb', 1, 2, 1, NULL, 1, '2024-05-29 20:41:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint UNSIGNED NOT NULL,
  `coupon_code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valid_date` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_type` int NOT NULL,
  `coupon_amount` int NOT NULL,
  `coupon_slug` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_code`, `valid_date`, `coupon_type`, `coupon_amount`, `coupon_slug`, `coupon_status`, `created_at`, `updated_at`) VALUES
(1, 'JUyel008', '30-7-2024', 1, 200, 'Coupon-66a39bdbe0bb5', 1, '2024-07-26 12:51:39', NULL);

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
(94, '2014_10_12_000000_create_users_table', 1),
(95, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(96, '2019_08_19_000000_create_failed_jobs_table', 1),
(97, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(98, '2024_03_06_184700_create_categories_table', 1),
(99, '2024_03_12_012655_create_sub_categories_table', 1),
(100, '2024_03_13_160050_create_child_categories_table', 1),
(101, '2024_03_16_231957_create_brands_table', 1),
(102, '2024_03_19_222119_create_seos_table', 1),
(103, '2024_03_20_224440_create_smtps_table', 1),
(104, '2024_03_23_123013_create_warehouses_table', 1),
(105, '2024_03_28_210629_create_coupons_table', 1),
(106, '2024_04_12_165112_create_products_table', 1);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `pro_title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_tags` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_description` text COLLATE utf8mb4_unicode_ci,
  `pro_video` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_color` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_size` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_purchase_price` int DEFAULT NULL,
  `pro_selling_price` int DEFAULT NULL,
  `pro_discount_price` int DEFAULT NULL,
  `pro_stock_quantity` int DEFAULT NULL,
  `pro_thumbnail` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_pic2` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_pic3` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_pic4` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_pic5` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_featured` int DEFAULT NULL,
  `pro_slider` int DEFAULT '0',
  `pro_today_deal` int DEFAULT NULL,
  `flash_deal_id` int DEFAULT NULL,
  `cash_on_delevery` int DEFAULT NULL,
  `brand_id` int DEFAULT NULL,
  `pro_slug` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_creator` int DEFAULT NULL,
  `pro_editor` int DEFAULT NULL,
  `pro_status` int DEFAULT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `sub_category_id` bigint UNSIGNED NOT NULL,
  `child_cat_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `pro_title`, `pro_code`, `pro_unit`, `pro_tags`, `pro_description`, `pro_video`, `pro_color`, `pro_size`, `pro_purchase_price`, `pro_selling_price`, `pro_discount_price`, `pro_stock_quantity`, `pro_thumbnail`, `pro_pic2`, `pro_pic3`, `pro_pic4`, `pro_pic5`, `pro_featured`, `pro_slider`, `pro_today_deal`, `flash_deal_id`, `cash_on_delevery`, `brand_id`, `pro_slug`, `pro_creator`, `pro_editor`, `pro_status`, `category_id`, `sub_category_id`, `child_cat_id`, `created_at`, `updated_at`) VALUES
(1, 'QCY 40w GaN Charger', '67A (20W Max).', 'piece', 'asas,fgfgh,fggfh', '<p>dfdfb erg ergerg erg rtg retg rtgergserges 45rfgerfgw&nbsp;</p>', NULL, 'black,white', 'nax', 400, 600, 50, 100, 'Thumb-6657d472bd2f6.png', 'pro2-6657d472bd571.png', 'pro2-6657d472bd75f.png', NULL, NULL, 0, 0, 1, 1, NULL, 2, 'pro-6657d472be782', 1, NULL, 1, 4, 9, 2, NULL, NULL),
(2, 'mecukysy', 'Asperiores recusanda', 'kg', 'Quis omnis modi labo', '<p>rggetgte&nbsp; yhthh vty tyhtyh</p>', NULL, 'Anim eveniet ut dol', 'Architecto eius duis', 500, 700, NULL, 486, 'Thumb-665b075a9e20f.png', 'pro2-665b075a9e6ce.png', 'pro2-665b075a9eab3.png', NULL, NULL, 0, 0, 0, 1, NULL, 1, 'pro-665b075aa0b8d', 1, NULL, 1, 1, 1, 8, '2024-06-01 11:34:50', NULL),
(3, 'madowolot', 'Quia occaecat quia q', '5', 'Tempora possimus op', '<p>rgtrytrtrtrbtvrtrt trhbbtbtyh tyhtyhbbtybty tyhtyhbtyb</p>', '46', 'Non autem incididunt', 'Esse asperiores quia', 500, 800, NULL, 220, 'Thumb-665b08ca4aff2.png', 'pro2-665b08ca4b4b2.png', 'pro2-665b08ca4b91c.png', NULL, NULL, 0, 0, NULL, NULL, NULL, 4, 'pro-665b08ca4cd06', 1, NULL, 1, 2, 4, 3, '2024-06-01 11:40:58', NULL),
(4, 'zasadosa', 'Itaque culpa veniam', '576', 'Asperiores porro cor', 'Qui id, et odio dolo.jhvbug', '907', 'Pariatur Accusamus', 'Autem accusamus elit', 93, 45, 18, 46, 'Thumb-665b09402429d.png', 'pro2-665b094024744.png', 'pro2-665b094024b77.png', NULL, NULL, 0, 0, 1, NULL, NULL, 4, 'pro-665b094025ea3', 1, NULL, 1, 4, 9, 1, '2024-06-01 11:42:56', NULL),
(5, 'lehijovyqo', 'Enim a omnis ut offi', '791', 'Repudiandae tempor d', 'Quis quo incidunt, m.hyythh', '913', 'Excepteur possimus', 'Totam Nam laboriosam', 25, 53, 15, 153, 'Thumb-665b098caecfd.png', 'pro2-665b098caf1a9.png', 'pro2-665b098caf65b.png', NULL, NULL, 1, 0, 1, 1, 1, 1, 'pro-665b098cb08d9', 1, NULL, 1, 2, 4, 3, '2024-06-01 11:44:12', NULL),
(6, 'nyzuh', 'Incidunt nemo nulla', '288', 'Irure totam vero ali', 'Neque lorem suscipit.rtgrtgg', '87', 'Repudiandae et incid', 'Sunt illo omnis ips', 76, 56, 53, 937, 'Thumb-665b0a128d20c.png', 'nyzuh1665b0a128dd3d.png', 'pro2-665b0a128e0df.png', NULL, NULL, 1, 0, 1, 1, 1, 1, 'pro-665b0a128f2e3', 1, NULL, 1, 1, 1, 7, '2024-06-01 11:46:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `seos`
--

CREATE TABLE `seos` (
  `id` bigint UNSIGNED NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alexa_verification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_verification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_analytic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_adsense` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_editor` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seos`
--

INSERT INTO `seos` (`id`, `meta_title`, `meta_author`, `meta_tag`, `meta_description`, `meta_keywords`, `alexa_verification`, `google_verification`, `google_analytic`, `google_adsense`, `seo_editor`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Juyel raana', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-10-05 17:01:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `smtps`
--

CREATE TABLE `smtps` (
  `id` bigint UNSIGNED NOT NULL,
  `mailer` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `host` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `port` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `encription` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_email` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `editor` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smtps`
--

INSERT INTO `smtps` (`id`, `mailer`, `host`, `port`, `username`, `password`, `encription`, `from_email`, `editor`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, 'mjrjuyel@gmail.com', 1, '2024-10-05 16:02:38', NULL),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-10-05 16:02:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `subcat_title` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subcat_slug` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cat_id` bigint UNSIGNED DEFAULT NULL,
  `subcat_status` int NOT NULL DEFAULT '1',
  `subcat_creator` int DEFAULT NULL,
  `subcat_editor` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `subcat_title`, `subcat_slug`, `cat_id`, `subcat_status`, `subcat_creator`, `subcat_editor`, `created_at`, `updated_at`) VALUES
(1, 'Shirt', 'subcat-66578df4d8d42', 1, 1, 1, NULL, '2024-05-29 20:20:04', NULL),
(2, 'Pant', 'subcat-66578e04a82a4', 1, 1, 1, NULL, '2024-05-29 20:20:20', NULL),
(3, 'Shoes', 'subcat-66578e4715ff1', 1, 1, 1, NULL, '2024-05-29 20:21:27', NULL),
(4, 'Shoes', 'subcat-66578e6c3e355', 2, 1, 1, NULL, '2024-05-29 20:22:04', NULL),
(5, 'Pant', 'subcat-66578e7e468d3', 2, 1, 1, NULL, '2024-05-29 20:22:22', NULL),
(6, 'Bags', 'subcat-66578ee0328de', 2, 1, 1, NULL, '2024-05-29 20:24:00', NULL),
(7, 'Inner Wear', 'subcat-66578ef12e0b9', 2, 1, 1, NULL, '2024-05-29 20:24:17', NULL),
(8, 'Shoes', 'subcat-66578f090dfae', 3, 1, 1, NULL, '2024-05-29 20:24:41', NULL),
(9, 'Smartphones', 'subcat-66578f2b3206c', 4, 1, 1, NULL, '2024-05-29 20:25:15', NULL),
(10, 'Tablets', 'subcat-66578f40465b7', 4, 1, 1, NULL, '2024-05-29 20:25:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `is_admin` int DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `pic`, `email`, `email_verified_at`, `is_admin`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Juyel', '01754183288', NULL, 'juyel@gmail.com', NULL, 1, '$2y$12$4ZTiwtqrqGhv4AH8uOuyN.FSLC.u2.4LzFKDUntTnVNv1ZPDnGAqC', NULL, '2024-05-29 20:16:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `warehouses`
--

CREATE TABLE `warehouses` (
  `id` bigint UNSIGNED NOT NULL,
  `wh_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wh_address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wh_phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wh_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wh_status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warehouses`
--

INSERT INTO `warehouses` (`id`, `wh_name`, `wh_address`, `wh_phone`, `wh_slug`, `wh_status`, `created_at`, `updated_at`) VALUES
(1, 'dhaka', '', '', 'dfggtrtghgh5g', 1, '2024-10-05 16:03:35', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_brand_title_unique` (`brand_title`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_cat_title_unique` (`cat_title`);

--
-- Indexes for table `child_categories`
--
ALTER TABLE `child_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `child_categories_cat_id_foreign` (`cat_id`),
  ADD KEY `child_categories_subcat_id_foreign` (`subcat_id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_sub_category_id_foreign` (`sub_category_id`),
  ADD KEY `products_child_cat_id_foreign` (`child_cat_id`);

--
-- Indexes for table `seos`
--
ALTER TABLE `seos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smtps`
--
ALTER TABLE `smtps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categories_cat_id_foreign` (`cat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `child_categories`
--
ALTER TABLE `child_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `seos`
--
ALTER TABLE `seos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `smtps`
--
ALTER TABLE `smtps`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `child_categories`
--
ALTER TABLE `child_categories`
  ADD CONSTRAINT `child_categories_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `child_categories_subcat_id_foreign` FOREIGN KEY (`subcat_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_child_cat_id_foreign` FOREIGN KEY (`child_cat_id`) REFERENCES `child_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
