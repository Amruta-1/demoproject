-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 11, 2019 at 07:34 PM
-- Server version: 5.7.27-0ubuntu0.16.04.1
-- PHP Version: 7.2.19-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demoproject_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `customername` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `countryID` int(5) NOT NULL,
  `stateID` int(5) NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` int(11) DEFAULT NULL,
  `mobno` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` int(10) NOT NULL,
  `address_type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `created_at`, `updated_at`, `customername`, `address1`, `address2`, `countryID`, `stateID`, `city`, `zipcode`, `mobno`, `customer_id`, `address_type`) VALUES
(5, '2019-08-29 07:36:54', '2019-08-29 07:36:54', 'Amruta Pasarakar', 'Pune', 'Pune', 2, 35, 'Pune', 411057, '1236547896', 0, ''),
(6, '2019-08-29 07:37:03', '2019-08-29 07:37:03', 'Amruta Pasarakar', 'Pune', 'Pune', 1, 1, 'Pune', 411057, '1236547896', 0, ''),
(7, '2019-08-29 22:34:01', '2019-08-29 22:34:01', 'Robert Plant', '123 55th Street', '123 55th Street', 1, 1, 'Chicago', 606, '1236547896', 0, ''),
(8, '2019-09-05 22:27:12', '2019-09-05 22:27:12', 'Admin', 'Pune', 'Pune', 1, 15, 'pune', 1234, '1234567890', 1, ''),
(9, '2019-09-05 23:35:08', '2019-09-05 23:35:08', 'Admin', 'Pune', 'Pune', 1, 12, 'Pune', 411057, '1236547896', 1, ''),
(10, '2019-09-09 01:12:35', '2019-09-09 01:12:35', 'Admin', 'Pune', 'Pune', 1, 1, 'Pune', 411057, '1236547896', 1, ''),
(14, '2019-09-09 07:56:20', '2019-09-09 07:56:20', 'Amruta Pasarakar', 'Pune', 'Pune', 1, 9, 'Pune', 411057, '1236547896', 1, 'billing'),
(15, '2019-09-09 07:56:41', '2019-09-09 07:56:41', 'Amruta Pasarakar', 'Pune', 'Pune', 1, 9, 'Pune', 411057, '1236547896', 1, 'billing'),
(17, '2019-09-10 03:12:31', '2019-09-10 03:12:31', 'Fn Ln', 'adre', 'tfhhn', 1, 13, 'pune', 1234, '1234567890', 1, 'billing'),
(18, '2019-09-10 03:13:06', '2019-09-10 03:13:06', 'Fn Ln', 'adre', 'tfhhn', 1, 13, 'pune', 1234, '1234567890', 1, 'billing'),
(24, '2019-09-10 03:19:55', '2019-09-10 03:19:55', 'Admin', 'Test', 'Test', 1, 4, 'Test', 655451, '7896541230', 1, 'billing');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `created_at`, `updated_at`, `name`, `banner`) VALUES
(3, '2019-08-12 00:58:17', '2019-08-14 03:21:10', 'Admin', 'uploads/W1pmePmd86cTatiIPTd7mVsi8wRohklHNaMgr9CR.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `parent_id`, `updated_at`, `created_at`, `deleted_at`) VALUES
(25, 'Shirts', 0, '2019-08-20 03:30:16', '2019-08-13 06:25:23', '2019-08-20 03:30:16'),
(26, 'T shirts', 25, '2019-08-20 03:41:25', '2019-08-13 06:25:31', '2019-08-20 03:41:25'),
(27, 'Mobile', 0, '2019-08-20 03:29:05', '2019-08-13 07:10:32', '2019-08-20 03:29:05'),
(28, 'oppo', 27, '2019-08-20 03:28:59', '2019-08-13 07:15:03', '2019-08-20 03:28:59'),
(30, 'Shoes', 0, '2019-08-20 03:37:23', '2019-08-20 03:33:07', '2019-08-20 03:37:23'),
(31, 'Western shoes', 30, '2019-08-30 01:34:40', '2019-08-20 03:33:21', '2019-08-30 01:34:40'),
(32, 'Indian', 30, '2019-08-20 03:38:20', '2019-08-20 03:33:34', '2019-08-20 03:38:20'),
(33, 'test', 32, '2019-08-20 03:38:52', '2019-08-20 03:38:17', '2019-08-20 03:38:52'),
(34, 'Shoes', 33, '2019-08-30 01:34:38', '2019-08-20 03:38:47', '2019-08-30 01:34:38'),
(35, 'Shirts', 26, '2019-08-20 03:49:36', '2019-08-20 03:41:19', '2019-08-20 03:49:36'),
(36, 'T shirts', 0, '2019-08-30 01:36:52', '2019-08-20 03:49:32', '2019-08-30 01:36:52'),
(37, 'Shirts', 47, '2019-08-20 04:59:11', '2019-08-20 04:59:11', NULL),
(38, 'red tshirt1', 37, '2019-08-30 01:34:59', '2019-08-21 02:57:54', '2019-08-30 01:34:59'),
(39, NULL, 0, '2019-08-22 00:48:07', '2019-08-22 00:47:47', '2019-08-22 00:48:07'),
(40, NULL, 0, '2019-08-22 03:29:10', '2019-08-22 03:25:10', '2019-08-22 03:29:10'),
(41, 'Mobile', 0, '2019-08-30 01:35:14', '2019-08-30 01:35:14', NULL),
(42, 'Galaxy', 41, '2019-08-30 01:35:25', '2019-08-30 01:35:25', NULL),
(43, 'Iphone', 41, '2019-08-30 01:35:39', '2019-08-30 01:35:39', NULL),
(44, 'Footwear', 0, '2019-08-30 01:36:11', '2019-08-30 01:36:11', NULL),
(45, 'shoes', 44, '2019-08-30 01:36:21', '2019-08-30 01:36:21', NULL),
(46, 'Sandals', 44, '2019-08-30 01:36:31', '2019-08-30 01:36:31', NULL),
(47, 'Cloths', 0, '2019-08-30 01:37:09', '2019-08-30 01:37:09', NULL),
(48, 'Galaxy Note 10', 42, '2019-08-30 06:50:33', '2019-08-30 06:50:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `configurations`
--

CREATE TABLE `configurations` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `configurations`
--

INSERT INTO `configurations` (`id`, `created_at`, `updated_at`, `name`, `value`) VALUES
(3, '2019-08-09 06:51:01', '2019-08-09 06:51:01', 'Admin', 'admin@gmail.com'),
(4, '2019-08-22 00:34:56', '2019-08-22 03:02:13', 'Amruta', 'amruta@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `country_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `country_name`) VALUES
(1, 'India'),
(2, 'USA');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `created_at`, `updated_at`, `title`, `code`, `type`, `discount`) VALUES
(1, '2019-08-20 23:57:59', '2019-08-20 23:57:59', '50%coupon', '50off', 'Percent', '50'),
(2, '2019-08-21 00:04:00', '2019-08-22 04:09:09', '100Rscoupon', '100off', 'Amount', '10');

-- --------------------------------------------------------

--
-- Table structure for table `coupon_record`
--

CREATE TABLE `coupon_record` (
  `id` int(10) NOT NULL,
  `coupon_code` varchar(50) NOT NULL,
  `coupon_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_02_052804_create_users_detail_table', 2),
(5, '2019_08_02_053234_create_roles_table', 3),
(6, '2019_08_06_125005_create_permission_tables', 4),
(7, '2014_10_12_000000_create_users_table', 5),
(8, '2019_08_08_072148_add_paid_to_users', 6),
(10, '2019_08_09_094327_create_configurations_table', 7),
(11, '2019_08_09_140452_create_banners_table', 8),
(12, '2019_08_12_091651_create_categories_table', 9),
(13, '2019_08_13_112446_create_parent_table', 10),
(14, '2019_08_13_114350_alter_category_ids_to_parent', 11),
(15, '2019_08_14_054925_create_products_table', 12),
(16, '2019_08_14_062440_create_product_table', 13),
(17, '2019_08_14_063616_create_product_img_table', 14),
(18, '2019_08_14_063906_create_product_category_table', 15),
(19, '2019_08_14_064302_create_product_attribute_assoc_table', 16),
(20, '2019_08_19_064809_create_product_category_table', 17),
(21, '2019_08_20_082725_alter_product_table', 18),
(22, '2019_08_20_085755_alter_categories_table', 19),
(23, '2019_08_20_140256_create_coupons_table', 20),
(24, '2019_08_26_102102_add_google_i_d_column', 21),
(25, '2019_08_29_051733_create_addresses_table', 22),
(26, '2019_09_03_111140_create_shoppingcart_table', 23),
(27, '2019_09_10_095520_create_order_details_table', 24),
(28, '2019_09_11_133145_add_whishlist_table', 25);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(2, 'App\\User', 1),
(3, 'App\\User', 1),
(4, 'App\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL DEFAULT '5',
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\User', 1),
(5, 'App\\User', 13),
(4, 'App\\User', 14),
(5, 'App\\User', 15),
(1, 'App\\User', 16),
(1, 'App\\User', 17),
(3, 'App\\User', 18),
(5, 'App\\User', 22),
(5, 'App\\User', 27);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cart` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_address_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cart_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_charge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grand_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `created_at`, `updated_at`, `cart`, `shipping_address_id`, `billing_address_id`, `cart_total`, `shipping_charge`, `grand_total`, `transaction_id`, `status`, `customer_id`) VALUES
(3, '2019-09-10 07:14:25', '2019-09-10 07:14:25', '{"7a3c092221db92cecd283c876d7269c6":{"rowId":"7a3c092221db92cecd283c876d7269c6","id":"43","name":"redme","qty":3,"price":445,"options":{"img":"1566304172-product.jpeg"},"tax":93.45,"subtotal":1335}}', '10', '9', '1335', '0', '1335', NULL, NULL, '1'),
(4, '2019-09-10 07:39:48', '2019-09-10 07:39:48', '{"7a3c092221db92cecd283c876d7269c6":{"rowId":"7a3c092221db92cecd283c876d7269c6","id":"43","name":"redme","qty":3,"price":445,"options":{"img":"1566304172-product.jpeg"},"tax":93.45,"subtotal":1335}}', '9', '8', '1,335.00', '0', '1335', NULL, NULL, '1'),
(5, '2019-09-10 07:40:16', '2019-09-10 07:40:16', '{"7a3c092221db92cecd283c876d7269c6":{"rowId":"7a3c092221db92cecd283c876d7269c6","id":"43","name":"redme","qty":3,"price":445,"options":{"img":"1566304172-product.jpeg"},"tax":93.45,"subtotal":1335}}', '9', '8', '1,335.00', '0', '1335', NULL, NULL, '1'),
(6, '2019-09-10 07:42:46', '2019-09-10 07:42:46', '{"7a3c092221db92cecd283c876d7269c6":{"rowId":"7a3c092221db92cecd283c876d7269c6","id":"43","name":"redme","qty":3,"price":445,"options":{"img":"1566304172-product.jpeg"},"tax":93.45,"subtotal":1335}}', '8', '8', '1,335.00', '0', '1335', NULL, NULL, '1'),
(7, '2019-09-10 07:44:24', '2019-09-10 07:44:24', '{"7a3c092221db92cecd283c876d7269c6":{"rowId":"7a3c092221db92cecd283c876d7269c6","id":"43","name":"redme","qty":3,"price":445,"options":{"img":"1566304172-product.jpeg"},"tax":93.45,"subtotal":1335}}', '10', '8', '1,335.00', '0', '1335', NULL, NULL, '1'),
(8, '2019-09-10 07:44:59', '2019-09-10 07:44:59', '{"7a3c092221db92cecd283c876d7269c6":{"rowId":"7a3c092221db92cecd283c876d7269c6","id":"43","name":"redme","qty":3,"price":445,"options":{"img":"1566304172-product.jpeg"},"tax":93.45,"subtotal":1335}}', '10', '8', '1,335.00', '0', '1335', NULL, NULL, '1'),
(9, '2019-09-10 07:49:42', '2019-09-10 07:49:42', '{"7a3c092221db92cecd283c876d7269c6":{"rowId":"7a3c092221db92cecd283c876d7269c6","id":"43","name":"redme","qty":3,"price":445,"options":{"img":"1566304172-product.jpeg"},"tax":93.45,"subtotal":1335}}', '15', '14', '1,335.00', '0', '1335', NULL, NULL, '1'),
(46, '2019-09-11 06:01:32', '2019-09-11 06:01:32', '{"7a3c092221db92cecd283c876d7269c6":{"rowId":"7a3c092221db92cecd283c876d7269c6","id":"43","name":"redme","qty":2,"price":445,"options":{"img":"1566304172-product.jpeg"},"tax":93.45,"subtotal":890}}', '10', '9', '890.00', '0', '890', 'PAYIDklbe8XtIYqa8CXn', 'pending', '1');

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`id`, `parent_id`, `created_at`, `updated_at`, `category_id`) VALUES
(4, 25, '2019-08-13 06:25:31', '2019-08-13 06:25:31', 26),
(5, 0, '2019-08-13 07:10:32', '2019-08-13 07:10:32', 27);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('amruta@gmail.com', '$2y$10$fLZ82cmEq2AAijMkf2yIN.DRV8gBglWMfjAjE.z2N8TUe26RD8gSC', '2019-09-10 05:06:32'),
('admin@gmail.com', '$2y$10$3NnWsKLO3MzaOUGPtbQ1xejvwo6wyShbK8h9InPWeRg53piXpX8A.', '2019-09-10 05:25:43');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', '2019-08-06 07:32:44', '2019-08-06 07:32:44'),
(2, 'role-create', 'web', '2019-08-06 07:32:44', '2019-08-06 07:32:44'),
(3, 'role-edit', 'web', '2019-08-06 07:32:44', '2019-08-06 07:32:44'),
(4, 'role-delete', 'web', '2019-08-06 07:32:44', '2019-08-06 07:32:44'),
(5, 'product-list', 'web', '2019-08-06 07:32:44', '2019-08-06 07:32:44'),
(6, 'product-create', 'web', '2019-08-06 07:32:44', '2019-08-06 07:32:44'),
(7, 'product-edit', 'web', '2019-08-06 07:32:44', '2019-08-06 07:32:44'),
(8, 'product-delete', 'web', '2019-08-06 07:32:44', '2019-08-06 07:32:44'),
(10, 'user-list', 'web', '2019-08-09 00:09:10', '2019-08-09 00:09:10'),
(11, 'user-create', 'web', '2019-08-09 00:09:11', '2019-08-09 00:09:11'),
(12, 'user-edit', 'web', '2019-08-09 00:09:11', '2019-08-09 00:09:11'),
(13, 'user-delete', 'web', '2019-08-09 00:09:11', '2019-08-09 00:09:11'),
(14, 'config-list', 'web', '2019-08-09 08:07:44', '2019-08-09 08:07:44'),
(15, 'config-create', 'web', '2019-08-09 08:07:44', '2019-08-09 08:07:44'),
(16, 'config-edit', 'web', '2019-08-09 08:07:44', '2019-08-09 08:07:44'),
(17, 'config-delete', 'web', '2019-08-09 08:07:44', '2019-08-09 08:07:44'),
(18, 'banner-list', 'web', '2019-08-09 08:07:44', '2019-08-09 08:07:44'),
(19, 'banner-create', 'web', '2019-08-09 08:07:44', '2019-08-09 08:07:44'),
(20, 'banner-edit', 'web', '2019-08-09 08:07:44', '2019-08-09 08:07:44'),
(21, 'banner-delete', 'web', '2019-08-09 08:07:44', '2019-08-09 08:07:44'),
(22, 'category-list', 'web', '2019-08-20 07:41:22', '2019-08-20 07:41:22'),
(23, 'category-create', 'web', '2019-08-20 07:41:22', '2019-08-20 07:41:22'),
(24, 'category-edit', 'web', '2019-08-20 07:41:22', '2019-08-20 07:41:22'),
(25, 'category-delete', 'web', '2019-08-20 07:41:22', '2019-08-20 07:41:22'),
(26, 'coupon-list', 'web', '2019-08-21 00:12:32', '2019-08-21 00:12:32'),
(27, 'coupon-create', 'web', '2019-08-21 00:12:32', '2019-08-21 00:12:32'),
(28, 'coupon-edit', 'web', '2019-08-21 00:12:32', '2019-08-21 00:12:32'),
(29, 'coupon-delete', 'web', '2019-08-21 00:12:32', '2019-08-21 00:12:32');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` mediumint(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(43, 'redme', 445, '2019-08-20 06:59:32', '2019-08-20 06:59:32', NULL),
(44, 'redme', 13213, '2019-08-20 23:05:36', '2019-08-20 23:05:36', NULL),
(45, 'Realme', 45210, '2019-09-03 03:11:21', '2019-09-03 03:11:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_attribute_assoc`
--

CREATE TABLE `product_attribute_assoc` (
  `id` int(10) UNSIGNED NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_attribute_assoc`
--

INSERT INTO `product_attribute_assoc` (`id`, `color`, `quantity`, `product_id`, `created_at`, `updated_at`) VALUES
(1, '#4a5859', 5, 39, '2019-08-19 07:22:39', '2019-08-19 07:22:39'),
(2, '#00aabb', 2, 40, '2019-08-20 00:13:54', '2019-08-20 00:13:54'),
(3, '#62a2a8', 3, 41, '2019-08-20 06:57:15', '2019-08-20 06:57:15'),
(4, '#62a2a8', 3, 42, '2019-08-20 06:58:34', '2019-08-20 06:58:34'),
(5, '#62a2a8', 7, 43, '2019-08-20 06:59:32', '2019-08-20 06:59:32'),
(6, '#a13737', 2, 44, '2019-08-20 23:05:36', '2019-08-20 23:05:36'),
(7, '#62a2a8', 2, 45, '2019-09-03 03:11:21', '2019-09-03 03:11:21');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `product_id`, `category_id`, `created_at`, `updated_at`) VALUES
(16, 40, 28, '2019-08-20 00:13:54', '2019-08-20 00:13:54'),
(17, 41, 37, '2019-08-20 06:57:15', '2019-08-20 06:57:15'),
(18, 42, 36, '2019-08-20 06:58:34', '2019-08-20 06:58:34'),
(19, 43, 42, '2019-08-20 06:59:32', '2019-08-20 06:59:32'),
(20, 44, 37, '2019-08-20 23:05:36', '2019-08-20 23:05:36'),
(21, 45, 42, '2019-09-03 03:11:21', '2019-09-03 03:11:21');

-- --------------------------------------------------------

--
-- Table structure for table `product_img`
--

CREATE TABLE `product_img` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_img`
--

INSERT INTO `product_img` (`id`, `product_img`, `product_id`, `created_at`, `updated_at`) VALUES
(7, '1566210496-product.jpeg', 38, '2019-08-19 04:58:16', '2019-08-19 04:58:16'),
(8, '1566219159-product.jpeg', 39, '2019-08-19 07:22:39', '2019-08-19 07:22:39'),
(9, '1566279834-product.jpeg', 40, '2019-08-20 00:13:54', '2019-08-20 00:13:54'),
(10, '1566304035-product.jpeg', 41, '2019-08-20 06:57:15', '2019-08-20 06:57:15'),
(11, '1566304114-product.jpeg', 42, '2019-08-20 06:58:34', '2019-08-20 06:58:34'),
(12, '1566304172-product.jpeg', 43, '2019-08-20 06:59:32', '2019-08-20 06:59:32'),
(13, '1566362136-product.jpeg', 44, '2019-08-20 23:05:36', '2019-08-20 23:05:36'),
(14, '1567500081-product.jpeg', 45, '2019-09-03 03:11:21', '2019-09-03 03:11:21');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'web',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'web', '2019-08-06 07:28:48', '2019-08-06 07:28:48'),
(2, 'admin', 'web', '2019-08-06 07:28:48', '2019-08-06 07:28:48'),
(3, 'inventory manager', 'web', '2019-08-06 07:28:48', '2019-08-06 07:28:48'),
(4, 'order manager', 'web', '2019-08-06 07:28:49', '2019-08-06 07:28:49'),
(5, 'customer', 'web', '2019-08-06 07:28:49', '2019-08-06 07:28:49');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(18, 1),
(1, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(10, 2),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(17, 2),
(18, 2),
(19, 2),
(20, 2),
(21, 2),
(22, 2),
(26, 2),
(27, 2),
(28, 2),
(29, 2),
(1, 4),
(5, 4),
(10, 4),
(1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `identifier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shoppingcart`
--

INSERT INTO `shoppingcart` (`identifier`, `instance`, `content`, `created_at`, `updated_at`) VALUES
('1', 'default', 'O:29:"Illuminate\\Support\\Collection":1:{s:8:"\0*\0items";a:1:{s:32:"7a3c092221db92cecd283c876d7269c6";O:32:"Gloudemans\\Shoppingcart\\CartItem":8:{s:5:"rowId";s:32:"7a3c092221db92cecd283c876d7269c6";s:2:"id";s:2:"43";s:3:"qty";i:3;s:4:"name";s:5:"redme";s:5:"price";d:445;s:7:"options";O:39:"Gloudemans\\Shoppingcart\\CartItemOptions":1:{s:8:"\0*\0items";a:1:{s:3:"img";s:23:"1566304172-product.jpeg";}}s:49:"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel";N;s:41:"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate";i:21;}}}', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `state_name` varchar(255) NOT NULL,
  `countryID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `state_name`, `countryID`) VALUES
(1, 'Andhra Pradesh', 1),
(2, 'Assam', 1),
(3, 'Arunachal Pradesh', 1),
(4, 'Bihar', 1),
(5, 'Gujrat', 1),
(6, 'Haryana', 1),
(7, 'Himachal Pradesh', 1),
(8, 'Jammu & Kashmir', 1),
(9, 'Karnataka', 1),
(10, 'Kerla', 1),
(11, 'Madhya Pradesh', 1),
(12, 'Maharashtra', 1),
(13, 'Manipur', 1),
(14, 'Meghalaya', 1),
(15, 'Mizoram', 1),
(16, 'Nagaland', 1),
(17, 'Orissa', 1),
(18, 'Punjab', 1),
(19, 'Rajastan', 1),
(20, 'Sikkim', 1),
(21, 'Tamil Nadu', 1),
(22, 'Tripura', 1),
(23, 'Uttar Pradesh', 1),
(24, 'West Bengal', 1),
(25, 'Delhi', 1),
(26, 'Goa', 1),
(27, 'Pondichery', 1),
(28, 'Lakshadweep', 1),
(29, 'Daman & Diu', 1),
(30, 'Dadra & Nagar', 1),
(31, 'Chandigadh', 1),
(32, 'Andaman & Nikobar', 1),
(33, 'Jharkhand', 1),
(34, 'Chattisgarh', 1),
(35, 'Alabama', 2),
(36, 'Alaska', 2),
(37, 'Arizona', 2),
(38, 'Arkansas', 2),
(39, 'California', 2),
(40, 'Colorado', 2),
(41, 'Connecticut', 2),
(42, 'Delaware', 2),
(43, 'Florida', 2),
(44, 'Georgia', 2),
(45, 'Hawaii', 2),
(46, 'Idaho', 2),
(47, 'Illinois', 2),
(48, 'Indiana', 2),
(49, 'Iowa', 2),
(50, 'Kansas', 2),
(51, 'Kentucky', 2),
(52, 'Louisiana', 2),
(53, 'Maine', 2),
(54, 'Maryland', 2),
(55, 'Massachusetts', 2),
(56, 'Michigan', 2),
(57, 'Minnesota', 2),
(58, 'Mississipi', 2),
(59, 'Missouri', 2),
(60, 'Montana', 2),
(61, 'Nebraska', 2),
(62, 'Nevada', 2),
(63, 'New Hampshire', 2),
(64, 'New Jersey', 2),
(65, 'New Mexico', 2),
(66, 'New York', 2),
(67, 'North Carolina', 2),
(68, 'North Dakota', 2),
(69, 'Ohio', 2),
(70, 'Oklahoma', 2),
(71, 'Oregon', 2),
(72, 'Pennsylvania', 2),
(73, 'Rhode Island', 2),
(74, 'South Carolina', 2),
(75, 'Tennessee', 2),
(76, 'Texas', 2),
(77, 'Utah', 2),
(78, 'Vermont', 2),
(79, 'Virginia', 2),
(80, 'Washington', 2),
(81, 'West Virginia', 2),
(82, 'Wisconsin', 2),
(83, 'Wyoming', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `status`, `google_id`) VALUES
(1, 'Admin', 'admin', 'admin@gmail.com', NULL, '$2y$10$CQMA9WpFgzZXzRZ/mx8NAOWiF/Y9i40DZ8kdPApATGcN05zN.W64m', 'EB81sbyGzhaKoKw4j1GcyqHzVg2CO8xz0hodKKMavAxaBS8ASa0AXdwYIRbT', '2019-08-07 00:50:27', '2019-08-26 00:21:18', 0, NULL),
(13, 'Amruta', 'Pasarkar', 'amruta@gmail.com', NULL, '$2y$10$0rl1OyGOHsCQ0M2DVHUtpuCDGD8SgqgxqB.x4feZqhRkIlR9.ul1m', 'zj6R8Gbnmr8DWjLQdQouIFgLiD5AEd4kWS33utWFn5Avp7MQVDEnRgfP1uCf', '2019-08-08 04:08:40', '2019-08-08 04:08:40', 1, NULL),
(14, 'Demo user', 'user', 'demo@gmail.com', NULL, '$2y$10$x5hVW/8E91pQJLEc6Imtfuj/h1vCBDot9nnrFdAL0VyGQKA9ziDou', 'ZoQpjdk4UHgJkSKi4lltWROs1V7JHO0Su1rYlGULfPgOXS5Ftn84nsZ0Cggj', '2019-08-08 08:10:50', '2019-08-08 08:10:50', 1, NULL),
(15, 'Robert', 'Plant', 'RobertplantIllinois@mailinator.com', NULL, '$2y$10$j3yQU8lJTsVtYOMlfUuTp.dwSeZ68wYXFa9mofqKXFXxczxLra2my', 'VrWiIxdPKBvusEh5CtgxpyOx7rNQKG2ONe1yw1WJ1PhC9Kk8WfgTKIUP3ano', '2019-08-12 00:27:31', '2019-08-12 00:27:31', 1, NULL),
(16, 'Robert', 'Plant', 'RobertplantIllinois+1@mailinator.com', NULL, '$2y$10$CZyVJJLDejzuiwrfmjCi2up6cXe7ioteaQN3Aq2HbFn3UK88mn50K', 'fsJBixxBImQoQcic37qci8fa5KWbe7WZWfVePFokyqpkR97lwwMb93ThWrdW', '2019-08-12 00:28:04', '2019-08-12 00:28:04', 1, NULL),
(17, 'Robert', 'Plant', 'RobertplantIllinois+2@mailinator.com', NULL, '$2y$10$NannzURSuwRsHXVElZxy4eTePk7S3ZGKrbIUzWL3U74h6W90isG0q', NULL, '2019-08-12 00:30:53', '2019-08-12 00:30:53', 1, NULL),
(18, 'Steven', 'Hodgson', 'steven@gmail.com', NULL, '$2y$10$L0AcKxfRN6wqYHeQ4Dgcn.DYFdPIcaZBnKR4TnjmzCEjZ1C3hMblS', NULL, '2019-08-22 04:18:09', '2019-08-22 04:18:09', 1, NULL),
(22, 'Robert', 'Plant', 'robert.plant+5@gmail.com', NULL, '$2y$10$kZ53015QF.1Si/hRQWFCjuIxj0cCW0thggIGvrEQwd/LRhexgn4w6', NULL, '2019-08-22 04:56:58', '2019-08-22 04:56:58', 1, NULL),
(23, 'Amruta', 'Pasarkar', 'amrurta_1@gmail.com', NULL, 'amruta123', NULL, '2019-08-23 00:47:45', '2019-08-23 00:47:45', 1, NULL),
(25, 'Amruta', 'Pasarkar', 'amruta_2@gmail.com', NULL, 'amruta123', NULL, '2019-08-23 00:54:31', '2019-08-23 00:54:31', 1, NULL),
(26, 'Amruta Pasarkar', NULL, 'amrutapasarkar125@gmail.com', NULL, NULL, 'sh1uhoGB2lGM54O4d1cQiKxjSp9vZFzjJSGLj7DN3wD8RyZaGeHMnosJcrd0', '2019-08-27 01:08:41', '2019-08-27 01:08:41', 1, '100554393196186750394'),
(27, 'Robert', 'plant', 'robert+10@gmail.com', NULL, 'admin123', NULL, '2019-08-27 08:11:42', '2019-08-27 08:11:42', 1, NULL),
(28, 'Amruta Pasarkar', NULL, 'amrutapasarkar@gmail.com', NULL, NULL, 'kRoWcNiyI4pkw1wQTeBYSeXaAZtyCSn6tHKmLm3qoFkIThKK44c2iVMNHNwp', '2019-08-28 08:04:03', '2019-08-28 08:04:03', 1, '114977864181721364965');

-- --------------------------------------------------------

--
-- Table structure for table `user_order`
--

CREATE TABLE `user_order` (
  `id` int(5) NOT NULL,
  `customer_id` int(5) NOT NULL,
  `order_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_wish_list`
--

CREATE TABLE `user_wish_list` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_wish_list`
--

INSERT INTO `user_wish_list` (`id`, `created_at`, `updated_at`, `customer_id`, `product_id`) VALUES
(1, '2019-09-11 08:22:53', '2019-09-11 08:22:53', 1, 43);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configurations`
--
ALTER TABLE `configurations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon_record`
--
ALTER TABLE `coupon_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_attribute_assoc`
--
ALTER TABLE `product_attribute_assoc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_category_product_id_foreign` (`product_id`),
  ADD KEY `product_category_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_img`
--
ALTER TABLE `product_img`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`identifier`,`instance`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_order`
--
ALTER TABLE `user_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_wish_list`
--
ALTER TABLE `user_wish_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `configurations`
--
ALTER TABLE `configurations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `coupon_record`
--
ALTER TABLE `coupon_record`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `product_attribute_assoc`
--
ALTER TABLE `product_attribute_assoc`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `product_img`
--
ALTER TABLE `product_img`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `user_order`
--
ALTER TABLE `user_order`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_wish_list`
--
ALTER TABLE `user_wish_list`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_category`
--
ALTER TABLE `product_category`
  ADD CONSTRAINT `product_category_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `product_category_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
