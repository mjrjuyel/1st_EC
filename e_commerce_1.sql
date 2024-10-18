-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 18, 2024 at 05:59 PM
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
(1, 'Addidas', 'Brand-6657945b52d2b.png', 'Brand-6657945b53156', 1, 1, NULL, '2024-05-29 20:47:23', NULL),
(2, 'Nike', 'Brand-6657946e36939.png', 'Brand-6657946e36d44', 1, 1, NULL, '2024-05-29 20:47:42', NULL),
(3, 'Gucci', 'Brand-6657947b58294.png', 'Brand-6657947b58591', 1, 1, NULL, '2024-05-29 20:47:55', NULL),
(4, 'Luis Vuitton', 'Brand-66a4dc9d4aa5d.jpg', 'Brand-66a4dc9d4b31a', 1, 1, NULL, '2024-07-27 11:40:13', NULL),
(5, 'Figma', 'Brand-66bf323e07250.png', 'Brand-66bf323e07914', 1, 1, NULL, '2024-08-16 11:04:30', NULL),
(6, 'Mbrealla', 'Brand-66bf351271de8.png', 'Brand-66bf3512723e2', 1, 1, NULL, '2024-08-16 11:16:34', NULL),
(31, 'zara', 'Brand-67113407db3db.png', 'Brand-67113407dbae5', 1, 1, NULL, '2024-10-17 15:57:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `cat_title` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cat_terms` int DEFAULT NULL,
  `cat_slug` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cat_pic` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cat_status` int NOT NULL DEFAULT '1',
  `cat_creator` int DEFAULT NULL,
  `cat_editor` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_title`, `cat_terms`, `cat_slug`, `cat_pic`, `cat_status`, `cat_creator`, `cat_editor`, `created_at`, `updated_at`) VALUES
(1, 'Men\'s', NULL, 'cat-66578d8ed4dd6', 'Cate-66578d8ed35ec.png', 1, 1, NULL, '2024-05-29 20:18:22', NULL),
(2, 'Women\'s', NULL, 'cat-66578daab0ca1', 'Cate-66578daab09a6.png', 1, 1, NULL, '2024-05-29 20:18:50', NULL),
(3, 'Children', NULL, 'cat-66578dbe3bbe2', 'Cate-66578dbe3b8d4.png', 1, 1, NULL, '2024-05-29 20:19:10', NULL),
(5, 'Watch', NULL, 'cat-67019f9ac6698', 'Cate-67019f9ac602e.jpg', 1, 2, NULL, '2024-10-05 20:20:42', NULL),
(6, 'Electronics', 1, 'cat-670b5f23ab58d', 'Cate-670b5f23ab0aa.png', 1, 1, NULL, '2024-10-13 05:48:19', NULL),
(8, 'Accessories', 1, 'cat-670b5ff270311', 'Cate-670b5ff26fcfb.jpg', 1, 1, NULL, '2024-10-13 05:51:46', NULL),
(11, 'Heloo', 1, 'cat-670b6151e8cdb', 'Cate-670b6151e88de.png', 1, 1, NULL, '2024-10-13 05:57:37', NULL),
(13, 'Samsung', 1, 'cat-670b6192cc951', 'Cate-670b6192cc56d.png', 1, 1, NULL, '2024-10-13 05:58:42', NULL),
(15, 'Lg', NULL, 'cat-670b61d0c612e', 'Cate-670b61d0c5c46.png', 1, 1, NULL, '2024-10-13 05:59:44', NULL),
(16, 'hair', 1, 'cat-670b620a74a9e', 'Cate-670b620a746aa.png', 1, 1, NULL, '2024-10-13 06:00:42', NULL),
(17, 'hgjhghg', 1, 'cat-670b629395357', 'Cate-670b629394e80.png', 1, 1, NULL, '2024-10-13 06:02:59', NULL),
(18, 'Redmi', 1, 'cat-670b635508c72', 'Cate-670b6355087a8.png', 1, 1, NULL, '2024-10-13 06:06:13', NULL),
(20, 'onePlus', 1, 'cat-670bf4ea4d203', 'Cate-670bf4ea4cbba.png', 1, 1, NULL, '2024-10-13 16:27:22', NULL);

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
(1, 'JUyel008', '30-7-2024', 1, 300, 'Coupon-66a39bdbe0bb5', 1, '2024-07-26 12:51:39', '2024-10-08 19:20:49'),
(2, 'jahan', '15-10-2024', 1, 500, 'Coupon-6705864a087fb', 1, '2024-10-08 19:21:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `slug`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 'Juyel', 'juyel@gmail.com', 'Juyel-671241a98d267', NULL, '$2y$12$khHBZ88GtCI71rCK8Ig4k.E6.MMFFmCftmTS1/V5G.N22ITnBfwcG', NULL, '2024-10-18 11:08:25', NULL);

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
(106, '2024_04_12_165112_create_products_table', 1),
(107, '2024_10_07_102128_create_customers_table', 2),
(108, '2024_10_07_212312_create_reviews_table', 3),
(109, '2024_10_07_214950_create_wish_lists_table', 3),
(110, '2024_10_07_225615_create_wish_lists_table', 4),
(111, '2024_10_08_141257_create_shoppingcart_table', 5),
(112, '2024_10_12_221159_create_orders_table', 6),
(113, '2024_10_13_001314_create_order_details_table', 6),
(114, '2024_10_14_003611_create_payment_gateway_bds_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `customer_id` int NOT NULL,
  `c_name` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_email` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_address` text COLLATE utf8mb4_unicode_ci,
  `c_zipcode` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_country` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_code` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_after_discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Shipping_charge` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtotal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `c_name`, `c_email`, `c_address`, `c_zipcode`, `c_country`, `c_phone`, `coupon_code`, `coupon_discount`, `coupon_after_discount`, `payment_type`, `Shipping_charge`, `tax`, `subtotal`, `total`, `order_id`, `date`, `month`, `year`, `status`, `created_at`, `updated_at`) VALUES
(1, 6, 'Juyel', 'mjrjuyel8@gmail.com', 'Modadevpur ,Naogaon', '6534', 'Bangladesh', '01752765762', NULL, NULL, NULL, 'COD', '0', '0.00', '800.00', '800.00', '947', '18', '10', '24', '0', '2024-10-18 13:26:53', '2024-10-18 13:26:53'),
(2, 6, 'Juyel', 'mjrjuyel8@gmail.com', NULL, NULL, NULL, '+01752765762', NULL, NULL, NULL, NULL, '0', '0.00', '700.00', '700.00', '382', '18', '10', '24', '1', '2024-10-18 13:29:44', '2024-10-18 13:29:44');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `product_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_color` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_size` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_qty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_subtotal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `product_name`, `product_color`, `product_size`, `product_qty`, `product_price`, `product_subtotal`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'madowolot', 'white', '30', '1', '800', '800', '2024-10-18 13:27:01', '2024-10-18 13:27:01'),
(2, 2, 2, 'mecukysy', 'black', '32', '1', '700', '700', '2024-10-18 13:29:49', '2024-10-18 13:29:49');

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
-- Table structure for table `payment_gateway_bds`
--

CREATE TABLE `payment_gateway_bds` (
  `id` bigint UNSIGNED NOT NULL,
  `payment_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `signature_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_gateway_bds`
--

INSERT INTO `payment_gateway_bds` (`id`, `payment_name`, `store_id`, `signature_key`, `status`, `created_at`, `updated_at`) VALUES
(1, 'AmarPay', 'aamarpaytest', 'dbb74894e82415a2f7ff0ec3a97e4183', NULL, '2024-10-14 13:13:37', '2024-10-14 19:00:16'),
(2, 'SSLCommerze', NULL, NULL, 0, NULL, NULL);

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
  `pro_views` int DEFAULT '0',
  `pro_trendy` int DEFAULT '0',
  `pro_slug` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_creator` int DEFAULT NULL,
  `pro_editor` int DEFAULT NULL,
  `pro_status` int DEFAULT '1',
  `category_id` bigint UNSIGNED NOT NULL,
  `sub_category_id` bigint UNSIGNED NOT NULL,
  `child_cat_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `pro_title`, `pro_code`, `pro_unit`, `pro_tags`, `pro_description`, `pro_video`, `pro_color`, `pro_size`, `pro_purchase_price`, `pro_selling_price`, `pro_discount_price`, `pro_stock_quantity`, `pro_thumbnail`, `pro_pic2`, `pro_pic3`, `pro_pic4`, `pro_pic5`, `pro_featured`, `pro_slider`, `pro_today_deal`, `flash_deal_id`, `cash_on_delevery`, `brand_id`, `pro_views`, `pro_trendy`, `pro_slug`, `pro_creator`, `pro_editor`, `pro_status`, `category_id`, `sub_category_id`, `child_cat_id`, `created_at`, `updated_at`) VALUES
(2, 'mecukysy', 'Asperiores recusanda', 'kg', 'Quis omnis modi labo', '<p>rggetgte&nbsp; yhthh vty tyhtyh</p>', NULL, 'black', '32', 500, 700, NULL, 486, 'Thumb-665b075a9e20f.png', 'pro2-665b075a9e6ce.png', 'pro2-665b075a9eab3.png', NULL, NULL, 0, 0, 0, 1, NULL, 1, 2, 1, 'pro-665b075aa0b8d', 1, NULL, 1, 1, 1, 8, '2024-06-01 11:34:50', NULL),
(3, 'madowolot', 'Quia occaecat quia q', '5', 'Tempora possimus op', '<p>rgtrytrtrtrbtvrtrt trhbbtbtyh tyhtyhbbtybty tyhtyhbtyb</p>', '46', 'white,green', '30', 500, 800, NULL, 220, 'Thumb-665b08ca4aff2.png', 'pro2-665b08ca4b4b2.png', 'pro2-665b08ca4b91c.png', NULL, NULL, 0, 0, NULL, NULL, NULL, 4, 2, 0, 'pro-665b08ca4cd06', 1, NULL, 1, 2, 4, 3, '2024-06-01 11:40:58', NULL),
(5, 'lehijovyqo', 'Enim a omnis ut offi', '791', 'Repudiandae tempor d', 'Quis quo incidunt, m.hyythh', '913', ' yello,blue', '32', 25, 53, 15, 153, 'Thumb-665b098caecfd.png', 'pro2-665b098caf1a9.png', 'pro2-665b098caf65b.png', NULL, NULL, 1, 0, 1, 1, 1, 1, 0, 0, 'pro-665b098cb08d9', 1, NULL, 1, 2, 4, 3, '2024-06-01 11:44:12', NULL),
(6, 'nyzuh', 'Incidunt nemo nulla', '288', 'Irure totam vero ali', 'Neque lorem suscipit.rtgrtgg', '87', 'black', '34', 76, 56, 53, 937, 'Thumb-665b0a128d20c.png', 'nyzuh1665b0a128dd3d.png', 'pro2-665b0a128e0df.png', NULL, NULL, 1, 0, 1, 1, 1, 1, 0, 0, 'pro-665b0a128f2e3', 1, 2, 1, 1, 1, 7, '2024-06-01 11:46:26', '2024-10-05 21:23:47'),
(7, 'tokaguva', 'Sequi recusandae Ci', '541', 'Deserunt repudiandae', 'TYhis nhj jhihsd', '625', 'red,blue', '28', 97, 76, 98, 94, 'Thumb-670170d30d430.png', 'tokaguva1-670170d30e9b8.png', 'tokaguva2-670170d30f3e3.png', NULL, NULL, 1, 0, NULL, 1, NULL, 3, 0, 0, 'pro-670170d312fc3', 1, 2, 1, 2, 5, 5, '2024-10-05 17:01:07', '2024-10-05 21:49:19'),
(9, 'wimutyc', 'Et aliquid facilis a', '717', 'Sint elit fuga Exp', '<p>hjgg guuii&nbsp; 8 t8gg t8uty8b&nbsp;</p>', '121', 'red,black,yellow', '28,32,30,31', 64, 100, 85, 322, 'Thumb-6701b51ae90c4.png', 'wimutyc1-6701b51ae9720.jpg', 'wimutyc2-6701b51ae9b8d.jpg', NULL, NULL, 1, 1, NULL, 1, NULL, 3, 3, NULL, 'pro-6701b51aeae84', 2, 1, 1, 2, 4, 4, '2024-10-05 21:52:26', '2024-10-10 19:16:52');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint UNSIGNED NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci,
  `star` int DEFAULT NULL,
  `rev_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rev_month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rev_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rev_image1` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rev_image2` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `identifier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-10-05 16:02:38', '2024-10-08 19:27:27'),
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
(8, 'Shoes', 'subcat-66578f090dfae', 3, 1, 1, NULL, '2024-05-29 20:24:41', NULL);

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
  `is_admin` int DEFAULT '1',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `pic`, `email`, `email_verified_at`, `is_admin`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Juyel', '01754183288', NULL, 'juyel@gmail.com', NULL, 1, '$2y$12$4ZTiwtqrqGhv4AH8uOuyN.FSLC.u2.4LzFKDUntTnVNv1ZPDnGAqC', NULL, '2024-05-29 20:16:36', NULL),
(2, 'Sohel', NULL, NULL, 'sohel@gmail.com', NULL, 1, '$2y$12$u1k4lrjUxS66W/lzGq04hOiOhFz/hflgfquKtiPfnyf72MFqWsm1y', NULL, '2024-10-05 18:48:54', '2024-10-05 18:48:54');

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
(1, 'jahan warehouse', 'Mirpur 11', '017544444444', 'dfggtrtghgh5g', 1, '2024-10-08 19:24:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wish_lists`
--

CREATE TABLE `wish_lists` (
  `id` bigint UNSIGNED NOT NULL,
  `customer_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payment_gateway_bds`
--
ALTER TABLE `payment_gateway_bds`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_customer_id_foreign` (`customer_id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`);

--
-- Indexes for table `seos`
--
ALTER TABLE `seos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`identifier`,`instance`);

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
-- Indexes for table `wish_lists`
--
ALTER TABLE `wish_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wish_lists_customer_id_foreign` (`customer_id`),
  ADD KEY `wish_lists_product_id_foreign` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `child_categories`
--
ALTER TABLE `child_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment_gateway_bds`
--
ALTER TABLE `payment_gateway_bds`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wish_lists`
--
ALTER TABLE `wish_lists`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wish_lists`
--
ALTER TABLE `wish_lists`
  ADD CONSTRAINT `wish_lists_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wish_lists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
