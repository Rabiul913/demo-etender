-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2022 at 10:34 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo_etender`
--

-- --------------------------------------------------------

--
-- Table structure for table `buyers`
--

CREATE TABLE `buyers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `b_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_nid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buyers`
--

INSERT INTO `buyers` (`id`, `b_name`, `b_address`, `b_country`, `b_nid`, `b_phone`, `b_email`, `created_at`, `updated_at`) VALUES
(1, 'Mysoftheaven', 'Raisa & shikhder tower, pirerbag, dhaka', 'BD', '7621541414', '0963452352', 'mysoftheaven@gmail.com', '2022-02-15 03:46:13', '2022-02-15 04:03:09');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Manager', 1, '2022-02-27 04:50:07', '2022-02-27 05:07:04');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `leave_type` int(11) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `leave_status` int(11) NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_12_06_044727_create_permission_tables', 1),
(6, '2021_12_06_045144_create_products_table', 1),
(7, '2021_12_09_055511_create_leaves_table', 1),
(8, '2022_02_14_094543_create_tenders_table', 2),
(9, '2022_02_14_103408_create_tenders_table', 3),
(10, '2022_02_15_053609_create_vendors_table', 4),
(11, '2022_02_15_070410_create_buyers_table', 5),
(12, '2022_02_16_060844_create_proposals_table', 6),
(13, '2022_02_16_065513_create_proposals_table', 7),
(14, '2022_02_16_113424_create_proposals_table', 8),
(15, '2022_02_27_101929_create_designations_table', 9),
(16, '2022_02_27_180734_create_tender_types_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 5),
(4, 'App\\Models\\User', 4);

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
('robicmt566@gmail.com', '$2y$10$wdx6SOgv/O/s/FzKwggr2u3od/7x58CUHmnGWNVQHJuP8b0Bm1nHS', '2022-02-23 11:10:36');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', '2022-02-14 00:21:32', '2022-02-14 00:21:32'),
(2, 'role-create', 'web', '2022-02-14 00:21:32', '2022-02-14 00:21:32'),
(3, 'role-edit', 'web', '2022-02-14 00:21:32', '2022-02-14 00:21:32'),
(4, 'role-delete', 'web', '2022-02-14 00:21:33', '2022-02-14 00:21:33'),
(5, 'permission-list', 'web', '2022-02-14 00:21:33', '2022-02-14 00:21:33'),
(6, 'permission-create', 'web', '2022-02-14 00:21:33', '2022-02-14 00:21:33'),
(7, 'permission-edit', 'web', '2022-02-14 00:21:33', '2022-02-14 00:21:33'),
(8, 'permission-delete', 'web', '2022-02-14 00:21:33', '2022-02-14 00:21:33'),
(9, 'user-edit', 'web', '2022-02-14 00:24:36', '2022-02-14 00:24:36'),
(10, 'user-create', 'web', '2022-02-14 00:24:52', '2022-02-14 00:24:52'),
(11, 'user-delete', 'web', '2022-02-14 00:25:00', '2022-02-14 00:25:00'),
(12, 'user-list', 'web', '2022-02-14 00:25:07', '2022-02-14 00:25:07'),
(13, 'product-list', 'web', '2022-02-14 00:30:31', '2022-02-14 00:30:31'),
(14, 'product-create', 'web', '2022-02-14 02:58:49', '2022-02-14 02:58:49'),
(15, 'tender-list', 'web', '2022-02-14 22:39:36', '2022-02-14 22:39:36'),
(16, 'tender-edit', 'web', '2022-02-14 22:39:47', '2022-02-14 22:39:47'),
(17, 'tender-delete', 'web', '2022-02-14 22:39:57', '2022-02-14 22:39:57'),
(18, 'tender-create', 'web', '2022-02-14 22:40:09', '2022-02-14 22:40:09'),
(23, 'buyer-list', 'web', '2022-02-15 02:53:09', '2022-02-15 02:53:09'),
(24, 'buyer-create', 'web', '2022-02-15 02:53:18', '2022-02-15 02:53:18'),
(25, 'buyer-edit', 'web', '2022-02-15 02:53:27', '2022-02-15 02:53:27'),
(26, 'buyer-delete', 'web', '2022-02-15 02:53:36', '2022-02-15 02:53:36'),
(27, 'proposal-list', 'web', '2022-02-16 00:39:25', '2022-02-16 00:39:25'),
(28, 'proposal-create', 'web', '2022-02-16 01:21:46', '2022-02-16 01:21:46'),
(29, 'proposal-delete', 'web', '2022-02-16 05:20:06', '2022-02-16 05:28:23'),
(30, 'proposal-edit', 'web', '2022-02-20 05:45:16', '2022-02-20 05:45:16'),
(31, 'proposal-shortlist', 'web', '2022-02-20 09:23:44', '2022-02-20 09:23:44'),
(32, 'proposal-finallist', 'web', '2022-02-20 09:24:00', '2022-02-20 09:24:00'),
(33, 'designation-list', 'web', '2022-02-27 04:38:07', '2022-02-27 04:38:07'),
(34, 'designation-create', 'web', '2022-02-27 04:38:18', '2022-02-27 04:38:18'),
(35, 'designation-edit', 'web', '2022-02-27 04:38:30', '2022-02-27 04:38:30'),
(36, 'designation-delete', 'web', '2022-02-27 04:38:41', '2022-02-27 04:38:41'),
(37, 'user-edituser', 'web', '2022-02-27 05:26:09', '2022-02-27 05:26:09'),
(38, 'tender_type-create', 'web', '2022-02-28 03:45:46', '2022-02-28 03:45:46'),
(39, 'tender_type-edit', 'web', '2022-02-28 03:46:00', '2022-02-28 03:46:00'),
(40, 'tender_type-delete', 'web', '2022-02-28 03:46:10', '2022-02-28 03:46:10'),
(41, 'tender_type-list', 'web', '2022-02-28 03:46:24', '2022-02-28 03:46:24');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `detail`, `created_at`, `updated_at`) VALUES
(1, 'Laptop', 'fasdfg', '2022-02-14 03:41:10', '2022-02-14 03:41:10');

-- --------------------------------------------------------

--
-- Table structure for table `proposals`
--

CREATE TABLE `proposals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `tender_id` int(11) NOT NULL,
  `tender_subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_date` datetime NOT NULL,
  `total_amount` double(15,2) NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_solvency` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `audit_report` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `proposals`
--

INSERT INTO `proposals` (`id`, `user_id`, `tender_id`, `tender_subject`, `delivery_date`, `total_amount`, `file`, `bank_solvency`, `audit_report`, `status`, `created_at`, `updated_at`) VALUES
(19, 5, 11, '1000 pics Bag', '2022-03-04 00:00:00', 345667.00, '20220228153911.pdf', '20220228153911.pdf', '20220228153911.pdf', 0, '2022-02-28 09:39:11', '2022-02-28 09:39:11');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'web', '2022-02-14 00:21:55', '2022-02-14 00:21:55'),
(3, 'Vendor', 'web', '2022-02-20 05:27:48', '2022-02-20 05:27:48'),
(4, 'Admin', 'web', '2022-03-22 09:33:02', '2022-03-22 09:33:02');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(5, 4),
(6, 1),
(6, 4),
(7, 1),
(7, 4),
(8, 1),
(8, 4),
(9, 1),
(9, 4),
(10, 1),
(10, 4),
(11, 1),
(11, 4),
(12, 1),
(12, 4),
(15, 1),
(15, 3),
(15, 4),
(16, 1),
(16, 4),
(17, 1),
(17, 4),
(18, 1),
(18, 4),
(23, 1),
(23, 4),
(24, 1),
(24, 4),
(25, 1),
(25, 4),
(26, 1),
(26, 4),
(27, 1),
(27, 3),
(27, 4),
(28, 3),
(29, 1),
(31, 1),
(31, 4),
(32, 1),
(32, 4),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 3),
(38, 1),
(38, 4),
(39, 1),
(39, 4),
(40, 1),
(40, 4),
(41, 1),
(41, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tenders`
--

CREATE TABLE `tenders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tender_type_id` int(30) NOT NULL,
  `detail` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_date` date NOT NULL,
  `publish_date` date DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tenders`
--

INSERT INTO `tenders` (`id`, `subject`, `tender_type_id`, `detail`, `create_date`, `publish_date`, `deadline`, `file`, `created_at`, `updated_at`) VALUES
(6, 'Tender for Laptop', 0, 'Laptop qwff', '2022-02-17', '2022-02-18', '2022-02-28', '20220217112602.pdf', '2022-02-17 11:26:02', '2022-02-17 11:26:02'),
(7, 'Tender for Hard disk', 2, 'fgfgdsasvbnnnnnnnnnnnnnnnterrrrrrrrrrrrrrrr', '2022-02-17', '2022-02-18', '2022-03-11', '20220217112644.pdf', '2022-02-17 11:26:44', '2022-02-28 11:42:16'),
(8, 'asfkhjkjhgjsdb guyehjbjk', 5, 'fdfdsafeeeeeeeeeeerrrrrrrrrrrrrrr', '2022-03-03', '2022-03-04', '2022-03-10', '20220217120620.pdf', '2022-02-17 12:06:20', '2022-02-28 11:53:13'),
(10, '1000 pics Bag', 3, 'Bag........................', '2022-02-19', '2022-02-20', '2022-02-25', '20220219112623.pdf', '2022-02-19 06:58:03', '2022-02-28 11:48:53'),
(11, '1000 pics Bag', 3, 'fasfasfa', '2022-02-20', '2022-02-20', '2022-03-03', '20220220042934.pdf', '2022-02-20 04:29:34', '2022-02-28 12:40:45'),
(12, '1000 pieces  chair', 3, 'Special Chair............................................................. Digital Chair............................................................... Local Chair.................................................................', '2022-02-22', NULL, NULL, '20220222120210.pdf', '2022-02-22 12:02:10', '2022-02-28 11:02:44');

-- --------------------------------------------------------

--
-- Table structure for table `tender_types`
--

CREATE TABLE `tender_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tender_types`
--

INSERT INTO `tender_types` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Hardware', 1, '2022-02-28 04:19:11', '2022-02-28 04:19:11'),
(3, 'Accessories', 1, '2022-02-28 04:19:21', '2022-02-28 04:19:21'),
(4, 'Furniture', 0, '2022-02-28 04:19:29', '2022-02-28 04:20:47'),
(5, 'Electronics', 1, '2022-02-28 04:19:39', '2022-02-28 04:19:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_id` int(30) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_person_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trade_licence` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tin_certificate` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vat_certificate` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ci` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `type_id`, `email`, `phone`, `address`, `contact_person_name`, `designation`, `trade_licence`, `tin_certificate`, `vat_certificate`, `ci`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Super-admin', NULL, 'seperadmin@gmail.com', '01816475887', 'raisa & shikhdar tower', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$tCCA6W8xw69TH00HvTHxD.sVc8.b2KxjVTZUfzJ7erX3Leu2UQWL.', NULL, '2022-02-14 00:31:17', '2022-02-22 09:54:32'),
(4, 'Mysoft Heaven BD Ltd.', 3, 'admin@gmail.com', '01816475843', 'Raisa & shikdar tower, Pirerbag, 60 feet, Mirpur, Dhaka', 'Riyed', 'Manager', '20220301121322.pdf', '20220301121322.pdf', '20220301121322.pdf', '20220301121322.pdf', NULL, '$2y$10$aipWFchCMN3tE1kgGmcSj.I7m0JNhcsiRbtjaUwKfZpE6csj4l5mi', NULL, '2022-02-22 04:58:27', '2022-03-01 06:13:22'),
(5, 'Vendor', 3, 'vendor@gmail.com', '01816475887', 'raisa & shikdar tower', 'Rabiul', 'Manager', '20220227175008.pdf', '20220227175008.pdf', '20220227175008.pdf', '20220227175008.pdf', NULL, '$2y$10$bt628y8ghgR3yrJAhXmUCuyoXCpogyvmmUOkPGGWyJa.B.Vdo6JsO', NULL, '2022-02-27 09:14:12', '2022-02-28 04:51:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buyers`
--
ALTER TABLE `buyers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proposals`
--
ALTER TABLE `proposals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `tenders`
--
ALTER TABLE `tenders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tender_types`
--
ALTER TABLE `tender_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buyers`
--
ALTER TABLE `buyers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `proposals`
--
ALTER TABLE `proposals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tenders`
--
ALTER TABLE `tenders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tender_types`
--
ALTER TABLE `tender_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
