-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 22, 2024 at 07:56 PM
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
(1, 'Samsung', 'Brand-6715497b52281.jpg', 'Brand-6657945b53156', 1, 1, 1, '2024-05-29 20:47:23', '2024-10-20 18:18:35'),
(2, 'OnePlus', 'Brand-6715495cc01be.jpg', 'Brand-6657946e36d44', 1, 1, 1, '2024-05-29 20:47:42', '2024-10-20 18:18:04'),
(3, 'Xiaomi', 'Brand-6715490ac5f92.jpg', 'Brand-6657947b58591', 1, 1, 1, '2024-05-29 20:47:55', '2024-10-20 18:16:42'),
(4, 'Apple', 'Brand-671548e507c01.jpg', 'Brand-66a4dc9d4b31a', 1, 1, 1, '2024-07-27 11:40:13', '2024-10-20 18:16:05'),
(5, 'Google', 'Brand-671548c7adaae.jpg', 'Brand-66bf323e07914', 1, 1, 1, '2024-08-16 11:04:30', '2024-10-20 18:15:35'),
(6, 'Sony', 'Brand-671548a9ab533.jpg', 'Brand-66bf3512723e2', 1, 1, 1, '2024-08-16 11:16:34', '2024-10-20 18:15:05'),
(31, 'Brothers', 'Brand-6715488ed618f.jpg', 'Brand-67113407dbae5', 1, 1, 1, '2024-10-17 15:57:59', '2024-10-20 18:14:38'),
(32, 'Addidas', 'Brand-67154b7cec74e.png', 'Brand-67154a96781f0', 1, 1, 1, '2024-10-20 18:23:18', '2024-10-20 18:27:08');

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
(1, 'Men\'s', NULL, 'cat-66578d8ed4dd6', 'Cate-67154ea33ea67.png', 1, 1, 1, '2024-10-20 18:40:35', '2024-10-20 18:40:35'),
(2, 'Women\'s', NULL, 'cat-66578daab0ca1', 'Cate-67154e92844df.webp', 1, 1, 1, '2024-10-20 18:40:18', '2024-10-20 18:40:18'),
(3, 'Children\'s', NULL, 'cat-66578dbe3bbe2', 'Cate-67154e7f86e1d.webp', 1, 1, 1, '2024-10-20 18:39:59', '2024-10-20 18:39:59'),
(21, 'Bike', 1, 'cat-67154ebe63b02', 'Cate-67154ebe636f0.jpg', 1, 1, NULL, '2024-10-20 18:41:02', NULL),
(22, 'Cars', 1, 'cat-67154ed8018f5', 'Cate-67154ed8014c0.jpg', 1, 1, NULL, '2024-10-20 18:41:28', NULL),
(23, 'Electronics', 1, 'cat-67154ef96a787', 'Cate-67154ef96a38e.jpg', 1, 1, NULL, '2024-10-20 18:42:01', NULL),
(24, 'Beauty', 1, 'cat-67154f12a3217', 'Cate-6715600433f2b.jpg', 1, 1, 1, '2024-10-20 19:54:44', '2024-10-20 19:54:44'),
(25, 'Home Appliance', 1, 'cat-67155deed01a8', 'Cate-67155deecfbaa.jpg', 1, 1, NULL, '2024-10-20 19:45:50', NULL),
(26, 'Sports', 1, 'cat-67155fb81f88a', 'Cate-67155fb81f3b2.png', 1, 1, NULL, '2024-10-20 19:53:28', NULL);

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
(9, 'Jeans', 'subcat-665793030dbdb', 1, 2, 1, NULL, 1, '2024-05-29 20:41:39', NULL),
(10, 'Apple', 'subcat-6715ed7127b6c', 23, 19, 1, NULL, 1, '2024-10-21 05:58:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_information`
--

CREATE TABLE `contact_information` (
  `id` bigint UNSIGNED NOT NULL,
  `ci_phone1` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ci_phone2` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ci_email1` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ci_email2` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ci_add1` text COLLATE utf8mb4_unicode_ci,
  `ci_add2` text COLLATE utf8mb4_unicode_ci,
  `ci_creator` int DEFAULT NULL,
  `ci_status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_information`
--

INSERT INTO `contact_information` (`id`, `ci_phone1`, `ci_phone2`, `ci_email1`, `ci_email2`, `ci_add1`, `ci_add2`, `ci_creator`, `ci_status`, `created_at`, `updated_at`) VALUES
(1, '0175417223', NULL, 'xrotech@gmail.com', NULL, NULL, NULL, 1, 1, NULL, '2024-10-20 15:29:44');

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
(6, 'Juyel', 'juyel@gmail.com', 'Juyel-671241a98d267', NULL, '$2y$12$khHBZ88GtCI71rCK8Ig4k.E6.MMFFmCftmTS1/V5G.N22ITnBfwcG', NULL, '2024-10-18 11:08:25', NULL),
(7, 'Rahim', 'alaol6470@gmail.com', 'Rahim-67153ea8a2131', NULL, '$2y$12$FAENTH/O8NCBIVoo3BnUfOoix2lR/VP95rrh091ZOiADGNTDId3o6', NULL, '2024-10-20 17:32:24', NULL);

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
(114, '2024_10_14_003611_create_payment_gateway_bds_table', 7),
(115, '2024_10_20_202505_create_social_media_table', 8),
(116, '2024_10_20_203754_create_contact_information_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `customer_id` int NOT NULL,
  `c_name` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(1, 6, 'Juyel', 'mjrjuyel8@gmail.com', 'Modadevpur ,Naogaon', '6534', 'Bangladesh', '01752765762', NULL, NULL, NULL, 'COD', '0', '0.00', '800.00', '800.00', '947', '18', '10', '24', '1', '2024-10-18 13:26:53', '2024-10-20 11:12:56'),
(2, 6, 'Juyel', 'mjrjuyel8@gmail.com', NULL, NULL, NULL, '+01752765762', NULL, NULL, NULL, NULL, '0', '0.00', '700.00', '700.00', '382', '18', '10', '24', '0', '2024-10-18 13:29:44', '2024-10-20 13:46:48'),
(3, 6, 'Juyel', 'juyel@gmail.com', NULL, NULL, NULL, '+01752765762', 'jahan', '500', '1115', NULL, '0', '0.00', '1615.00', '1615.00', '531', '20', '10', '24', '1', '2024-10-20 15:47:07', '2024-10-20 15:47:07'),
(4, 6, 'Juyel', 'juyel@gmail.com', NULL, NULL, NULL, '+01752765762', 'jahan', '500', '1600', NULL, '0', '0.00', '2100.00', '2100.00', '523', '20', '10', '24', '1', '2024-10-20 15:57:26', '2024-10-20 15:57:26'),
(5, 6, 'Juyel', 'juyel@gmail.com', 'Modadevpur ,Naogaon', '6534', 'Bangladesh', '01752765762', NULL, NULL, NULL, 'COD', '0', '0.00', '392.00', '392.00', '416', '20', '10', '24', '0', '2024-10-20 16:25:24', '2024-10-20 16:25:24'),
(6, 6, 'Juyel', 'juyel@gmail.com', 'Modadevpur ,Naogaon', '6534', 'Bangladesh', '01752765762', NULL, NULL, NULL, 'COD', '0', '0.00', '392.00', '392.00', '989', '20', '10', '24', '0', '2024-10-20 16:25:50', '2024-10-20 16:25:50'),
(7, 7, 'Rahim', 'alaol6470@gmail.com', NULL, NULL, NULL, '01752765762', 'jahan', '500', '9300', NULL, '0', '0.00', '9800.00', '9800.00', '401', '20', '10', '24', '3', '2024-10-20 17:36:27', '2024-10-20 17:43:26');

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
(2, 2, 2, 'mecukysy', 'black', '32', '1', '700', '700', '2024-10-18 13:29:49', '2024-10-18 13:29:49'),
(3, 3, 5, 'lehijovyqo', 'yello', '32', '1', '15', '15', '2024-10-20 15:47:13', '2024-10-20 15:47:13'),
(4, 3, 3, 'madowolot', 'white', '30', '2', '800', '1600', '2024-10-20 15:47:13', '2024-10-20 15:47:13'),
(5, 4, 2, 'mecukysy', NULL, NULL, '3', '700', '2100', '2024-10-20 15:57:29', '2024-10-20 15:57:29'),
(6, 5, 7, 'tokaguva', 'red', '28', '4', '98', '392', '2024-10-20 16:25:28', '2024-10-20 16:25:28'),
(7, 6, 7, 'tokaguva', 'red', '28', '4', '98', '392', '2024-10-20 16:25:54', '2024-10-20 16:25:54'),
(8, 7, 7, 'tokaguva', NULL, NULL, '100', '98', '9800', '2024-10-20 17:36:33', '2024-10-20 17:36:33');

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
(1, 'AmarPay', 'aamarpaytest', 'dbb74894e82415a2f7ff0ec3a97e4183', 0, '2024-10-14 13:13:37', '2024-10-14 19:00:16'),
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
  `pro_video` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
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
(2, 'mecukysy', 'Asperiores recusanda', 'kg', 'Quis omnis modi labo', '<p>rggetgte&nbsp; yhthh vty tyhtyh</p>', NULL, 'black', '32', 500, 700, NULL, 486, 'Thumb-665b075a9e20f.png', 'pro2-665b075a9e6ce.png', 'pro2-665b075a9eab3.png', NULL, NULL, 0, 0, 0, 1, NULL, 1, 0, 1, 'pro-665b075aa0b8d', 1, NULL, 1, 1, 1, 8, '2024-06-01 11:34:50', NULL),
(3, 'madowolot', 'Quia occaecat quia q', '5', 'Tempora possimus op', '<p>rgtrytrtrtrbtvrtrt trhbbtbtyh tyhtyhbbtybty tyhtyhbtyb</p>', '46', 'white,green', '30', 500, 800, NULL, 220, 'Thumb-665b08ca4aff2.png', 'pro2-665b08ca4b4b2.png', 'pro2-665b08ca4b91c.png', NULL, NULL, 0, 0, NULL, NULL, NULL, 4, 0, 0, 'pro-665b08ca4cd06', 1, NULL, 1, 2, 4, 3, '2024-06-01 11:40:58', NULL),
(5, 'lehijovyqo', 'Enim a omnis ut offi', '791', 'Repudiandae tempor d', 'Quis quo incidunt, m.hyythh', '913', ' yello,blue', '32', 25, 53, 15, 153, 'Thumb-665b098caecfd.png', 'pro2-665b098caf1a9.png', 'pro2-665b098caf65b.png', NULL, NULL, 1, 0, 1, 1, 1, 1, 0, 0, 'pro-665b098cb08d9', 1, NULL, 1, 2, 4, 3, '2024-06-01 11:44:12', NULL),
(6, 'nyzuh', 'Incidunt nemo nulla', '288', 'Irure totam vero ali', 'Neque lorem suscipit.rtgrtgg', '87', 'black', '34', 76, 56, 53, 937, 'Thumb-665b0a128d20c.png', 'nyzuh1665b0a128dd3d.png', 'pro2-665b0a128e0df.png', NULL, NULL, 1, 0, 1, 1, 1, 1, 0, 0, 'pro-665b0a128f2e3', 1, 2, 1, 1, 1, 7, '2024-06-01 11:46:26', '2024-10-05 21:23:47'),
(7, 'tokaguva', 'Sequi recusandae Ci', '541', 'Deserunt repudiandae', 'TYhis nhj jhihsd', '625', 'red,blue', '28', 97, 76, 98, 90, 'Thumb-670170d30d430.png', 'tokaguva1-670170d30e9b8.png', 'tokaguva2-670170d30f3e3.png', NULL, NULL, 1, 0, NULL, 1, NULL, 3, 0, 0, 'pro-670170d312fc3', 1, 2, 1, 2, 5, 5, '2024-10-05 17:01:07', '2024-10-05 21:49:19'),
(9, 'wimutyc', 'Et aliquid facilis a', '717', 'Sint elit fuga Exp', '<p>hjgg guuii&nbsp; 8 t8gg t8uty8b&nbsp;</p>', '121', 'red,black,yellow', '28,32,30,31', 64, 100, 85, 322, 'Thumb-6701b51ae90c4.png', 'wimutyc1-6701b51ae9720.jpg', 'wimutyc2-6701b51ae9b8d.jpg', NULL, NULL, 1, 1, NULL, 1, NULL, 3, 1, NULL, 'pro-6701b51aeae84', 2, 1, 1, 2, 4, 4, '2024-10-05 21:52:26', '2024-10-10 19:16:52'),
(10, 'Apple Iphone', 'Magna enim tempor iu', '793', 'fdfdf , rf,gerg,726', '<p>For years now, the <a data-analytics-id=\"inline-link\" href=\"https://www.tomsguide.com/us/best-apple-iphone,review-6348.html\" data-before-rewrite-localise=\"https://www.tomsguide.com/us/best-apple-iphone,review-6348.html\">best iPhones</a>\r\n have featured a $200 spread between the standard and Pro models, so I’m\r\n always faced with trying to make an argument to go with the less \r\nexpensive model. That’s why I’m hyper-focused on inspecting every little\r\n detail with my iPhone 16 review, mainly because I want you to know what\r\n exactly you’re getting (or compromising) by choosing this less \r\nexpensive handset over the <a data-analytics-id=\"inline-link\" href=\"https://www.tomsguide.com/phones/iphones/apple-iphone-16-pro-review\" data-before-rewrite-redirect=\"https://www.tomsguide.com/news/iphone-16-pro\" data-before-rewrite-localise=\"https://www.tomsguide.com/phones/iphones/apple-iphone-16-pro-review\">iPhone 16 Pro</a>.</p><p>I know a lot of people are always torn over which iPhone to get, but the models making up this year’s <a data-analytics-id=\"inline-link\" href=\"https://www.tomsguide.com/phones/iphones/apple-iphone-16-review\" data-before-rewrite-redirect=\"https://www.tomsguide.com/news/iphone-16\" data-before-rewrite-localise=\"https://www.tomsguide.com/phones/iphones/apple-iphone-16-review\">iPhone 16</a> lineup have a lot more in common than years past. For example, the iPhone 16 gains the <a data-analytics-id=\"inline-link\" href=\"https://www.tomsguide.com/how-to/use-iphone-16-action-button-to-do-more-than-one-thing\" data-before-rewrite-localise=\"https://www.tomsguide.com/how-to/use-iphone-16-action-button-to-do-more-than-one-thing\">Action button</a> that was first exclusive to the <a data-analytics-id=\"inline-link\" href=\"https://www.tomsguide.com/news/iphone-15-pro-max\" data-before-rewrite-localise=\"https://www.tomsguide.com/news/iphone-15-pro-max\">iPhone 15 Pros</a> last year and the same <a data-analytics-id=\"inline-link\" href=\"https://www.tomsguide.com/phones/iphones/iphone-16-camera-control-heres-everything-it-can-do\" data-before-rewrite-localise=\"https://www.tomsguide.com/phones/iphones/iphone-16-camera-control-heres-everything-it-can-do\">Camera Control button</a> found in the iPhone 16 Pros. It even shares just about the same set of <a data-analytics-id=\"inline-link\" href=\"https://www.tomsguide.com/ai/apple-intelligence-unveiled-all-the-new-ai-features-coming-to-ios-18-ipados-18-and-macos-sequoia\" data-before-rewrite-localise=\"https://www.tomsguide.com/ai/apple-intelligence-unveiled-all-the-new-ai-features-coming-to-ios-18-ipados-18-and-macos-sequoia\">Apple Intelligence</a> features (which will come post release as a software update to <a data-analytics-id=\"inline-link\" href=\"https://www.tomsguide.com/news/ios-18\" data-before-rewrite-localise=\"https://www.tomsguide.com/news/ios-18\">iOS 18</a>).</p><p>One\r\n of the biggest questions I also want to answer in my iPhone 16 review \r\nis how this model\'s upgraded cameras compare to last year’s iPhones, \r\nalong with the pricier iPhone 16 Pro and its main competitors in the \r\nspace.&nbsp;</p><table tabindex=\"0\" class=\"table__wrapper table__wrapper--inbodyContent table__wrapper--sticky table__wrapper--divider\"><tbody class=\"table__body\"></tbody></table>', NULL, 'black,white\\,silver,873', '101', 664, 1000, 877, 152, 'Thumb-6715f06abb580.png', 'Apple Iphone1-6715f118727c4.webp', 'Apple Iphone2-6715f11874c16.jpg', NULL, NULL, NULL, 1, NULL, 1, NULL, 4, 3, NULL, 'pro-6715eed502d8f', 1, 1, 1, 23, 19, 10, '2024-10-21 06:04:05', '2024-10-21 06:13:44');

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
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `id` bigint UNSIGNED NOT NULL,
  `sm_facebook` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sm_x` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sm_linkedin` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sm_youtube` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sm_pinterest` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sm_vimeo` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sm_instagram` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sm_whatsapp` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sm_skype` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sm_flickr` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sm_creator` int DEFAULT NULL,
  `sm_status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`id`, `sm_facebook`, `sm_x`, `sm_linkedin`, `sm_youtube`, `sm_pinterest`, `sm_vimeo`, `sm_instagram`, `sm_whatsapp`, `sm_skype`, `sm_flickr`, `sm_creator`, `sm_status`, `created_at`, `updated_at`) VALUES
(1, 'facebook', NULL, NULL, NULL, 'ewrewrwer', NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, '2024-10-20 15:05:49');

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
(1, 'Accesories', 'subcat-66578df4d8d42', 1, 1, 1, 1, '2024-05-29 20:20:04', '2024-10-20 19:38:10'),
(2, 'Muslim Wear', 'subcat-66578e04a82a4', 1, 1, 1, 1, '2024-05-29 20:20:20', '2024-10-20 19:37:31'),
(3, 'Shoes', 'subcat-66578e4715ff1', 1, 1, 1, NULL, '2024-05-29 20:21:27', NULL),
(4, 'Shoes', 'subcat-66578e6c3e355', 2, 1, 1, NULL, '2024-05-29 20:22:04', NULL),
(5, 'Pant', 'subcat-66578e7e468d3', 2, 1, 1, NULL, '2024-05-29 20:22:22', NULL),
(6, 'Bags', 'subcat-66578ee0328de', 2, 1, 1, NULL, '2024-05-29 20:24:00', NULL),
(7, 'Inner Wear', 'subcat-66578ef12e0b9', 2, 1, 1, NULL, '2024-05-29 20:24:17', NULL),
(8, 'Shoes', 'subcat-66578f090dfae', 3, 1, 1, NULL, '2024-05-29 20:24:41', NULL),
(11, 'Footwear', 'subcat-67155a2326ac3', 2, 1, 1, NULL, '2024-10-20 19:29:39', NULL),
(12, 'Bags', 'subcat-67155ab73205c', 2, 1, 1, NULL, '2024-10-20 19:32:07', NULL),
(13, 'Watches', 'subcat-67155acc37e84', 2, 1, 1, NULL, '2024-10-20 19:32:28', NULL),
(14, 'Muslim Wear', 'subcat-67155adf5c0bf', 2, 1, 1, NULL, '2024-10-20 19:32:47', NULL),
(15, 'Inner Wear', 'subcat-67155af561d78', 2, 1, 1, NULL, '2024-10-20 19:33:09', NULL),
(16, 'Clothing', 'subcat-67155b3d0a268', 1, 1, 1, NULL, '2024-10-20 19:34:21', NULL),
(17, 'Desktop', 'subcat-67155c65097cf', 23, 1, 1, NULL, '2024-10-20 19:39:17', NULL),
(18, 'Laptops', 'subcat-67155c729f1ce', 23, 1, 1, NULL, '2024-10-20 19:39:30', NULL),
(19, 'Smartphone', 'subcat-67155c80ab81e', 23, 1, 1, NULL, '2024-10-20 19:39:44', NULL),
(20, 'Audio', 'subcat-67155ca94b8a8', 23, 1, 1, NULL, '2024-10-20 19:40:25', NULL),
(21, 'Camera', 'subcat-67155cbc4e7ce', 23, 1, 1, NULL, '2024-10-20 19:40:44', NULL),
(22, 'Projector', 'subcat-67155cd6b12e9', 23, 1, 1, NULL, '2024-10-20 19:41:10', NULL),
(23, 'Generator', 'subcat-67155e8d977c7', 25, 1, 1, NULL, '2024-10-20 19:48:29', NULL),
(24, 'Tv', 'subcat-67155e997ac43', 25, 1, 1, NULL, '2024-10-20 19:48:41', NULL),
(25, 'Small Appliance', 'subcat-67155ee13241c', 25, 1, 1, NULL, '2024-10-20 19:49:53', NULL),
(26, 'Refrigerator', 'subcat-67155f0991d9c', 25, 1, 1, NULL, '2024-10-20 19:50:33', NULL),
(27, 'Air Conditioner', 'subcat-67155f1a66a17', 25, 1, 1, NULL, '2024-10-20 19:50:50', NULL),
(28, 'Washing Machine', 'subcat-67155f34e72d5', 25, 1, 1, NULL, '2024-10-20 19:51:16', NULL),
(29, 'Cricket', 'subcat-6715601fd5596', 26, 1, 1, NULL, '2024-10-20 19:55:11', NULL),
(30, 'Football', 'subcat-67156030031d9', 26, 1, 1, NULL, '2024-10-20 19:55:28', NULL),
(31, 'Camping And Hiking', 'subcat-67156063b67aa', 26, 1, 1, NULL, '2024-10-20 19:56:19', NULL),
(32, 'Cycling', 'subcat-671560760f0d4', 26, 1, 1, NULL, '2024-10-20 19:56:38', NULL),
(33, 'Excercise And Fitness', 'subcat-671560a84f897', 26, 1, 1, NULL, '2024-10-20 19:57:28', NULL);

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
(1, 'Juyel', '01754183288', NULL, 'juyel@gmail.com', NULL, 1, '$2y$12$45oyDbcPijISS0Wq4AomB.dVVvZ6QXrdqFYkw.ak7KzjBBy3pfJQG', NULL, '2024-05-29 20:16:36', '2024-10-20 10:52:43'),
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
-- Indexes for table `contact_information`
--
ALTER TABLE `contact_information`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `child_categories`
--
ALTER TABLE `child_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contact_information`
--
ALTER TABLE `contact_information`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

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
