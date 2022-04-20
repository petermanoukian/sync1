-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 20, 2022 at 01:51 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sync1`
--

-- --------------------------------------------------------

--
-- Table structure for table `branchcontacts`
--

DROP TABLE IF EXISTS `branchcontacts`;
CREATE TABLE IF NOT EXISTS `branchcontacts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `userid` bigint(20) UNSIGNED NOT NULL,
  `typebranchid` int(10) UNSIGNED NOT NULL,
  `compid` int(10) UNSIGNED NOT NULL,
  `subcompid` int(10) UNSIGNED NOT NULL,
  `branchid` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `branchcontacts_typebranchid_foreign` (`typebranchid`),
  KEY `branchcontacts_compid_foreign` (`compid`),
  KEY `branchcontacts_subcompid_foreign` (`subcompid`),
  KEY `branchcontacts_branchid_foreign` (`branchid`),
  KEY `branchcontacts_userid_foreign` (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branchcontacts`
--

INSERT INTO `branchcontacts` (`id`, `userid`, `typebranchid`, `compid`, `subcompid`, `branchid`, `name`, `mobile`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 7, 7, 2, 'branchcontact111', '033333', '09999', NULL, '2022-02-21 06:17:09', '2022-02-21 06:17:09');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

DROP TABLE IF EXISTS `branches`;
CREATE TABLE IF NOT EXISTS `branches` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `userid` bigint(20) UNSIGNED NOT NULL,
  `typebranchid` int(10) UNSIGNED NOT NULL,
  `compid` int(10) UNSIGNED NOT NULL,
  `subcompid` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `des` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dess` text CHARACTER SET utf32 DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `branches_typebranchid_foreign` (`typebranchid`),
  KEY `branches_compid_foreign` (`compid`),
  KEY `branches_subcompid_foreign` (`subcompid`),
  KEY `branches_userid_foreign` (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `userid`, `typebranchid`, `compid`, `subcompid`, `name`, `mobile`, `phone`, `des`, `dess`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 8, 4, 'branch11', '0999', '1111', 'hhtyuy\r\n\r\nuyyut\r\nuyuyty\r\nuyyttty', '<p><strong>ytryty ytrtyr tyytyt</strong></p>\r\n\r\n<p><strong>&nbsp; &nbsp; gffgd ytryt 667ydfgfdf</strong></p>', '2022-02-09 07:33:11', '2022-02-09 07:33:11'),
(2, 1, 5, 7, 7, 'dfgrtyyt upddd 123', '888', '678', 'ttert\r\n\r\nttrtr\r\ntrter\r\n456788 6556 78878778\r\n\r\ntttttr', '<p>tter rtrtty</p>\r\n\r\n<p><strong>ttrer ytytr uyyuyu tyyyytyuty</strong></p>\r\n\r\n<p><strong>ytytr&nbsp; y ty tr y&nbsp; ytytyttyyt yttyrt hfghfg</strong></p>', '2022-02-09 07:50:56', '2022-02-09 08:34:19');

-- --------------------------------------------------------

--
-- Table structure for table `cats`
--

DROP TABLE IF EXISTS `cats`;
CREATE TABLE IF NOT EXISTS `cats` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `userid` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cats_userid_foreign` (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cats`
--

INSERT INTO `cats` (`id`, `userid`, `name`, `logo`, `created_at`, `updated_at`) VALUES
(1, 1, 'Cat1 upddd', '1645616406.jpg', '2022-02-23 07:39:31', '2022-02-23 07:40:06'),
(2, 1, 'Casttt222', '1645701540.png', '2022-02-24 07:19:00', '2022-02-24 07:19:00');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
CREATE TABLE IF NOT EXISTS `companies` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `userid` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `companies_userid_foreign` (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `userid`, `name`, `logo`, `created_at`, `updated_at`) VALUES
(1, 1, 'twessst111', NULL, '2022-01-26 08:48:11', '2022-01-26 08:48:11'),
(2, 1, 'tesddf111 updr', '', '2022-01-26 08:55:26', '2022-01-28 09:11:39'),
(5, 1, 'company555 updddd', '1643375471.jpg', '2022-01-27 10:22:07', '2022-01-28 09:11:11'),
(7, 1, 'fdfdfds', '', '2022-01-28 09:12:44', '2022-01-28 09:12:44'),
(8, 1, 'iuyii', '', '2022-01-31 11:41:21', '2022-01-31 11:41:21'),
(9, 1, 'commppp', '', '2022-02-23 07:24:06', '2022-02-23 07:24:06'),
(10, 1, 'fdgf', '1645615472.jpg', '2022-02-23 07:24:33', '2022-02-23 07:24:33');

-- --------------------------------------------------------

--
-- Table structure for table `currencs`
--

DROP TABLE IF EXISTS `currencs`;
CREATE TABLE IF NOT EXISTS `currencs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencs`
--

INSERT INTO `currencs` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'US', NULL, '2022-04-04 09:57:20');

-- --------------------------------------------------------

--
-- Table structure for table `disccats`
--

DROP TABLE IF EXISTS `disccats`;
CREATE TABLE IF NOT EXISTS `disccats` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(500) CHARACTER SET utf32 NOT NULL,
  `discid` int(10) UNSIGNED NOT NULL,
  `catid` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `disccats_discid_foreign` (`discid`),
  KEY `disccats_catid_foreign` (`catid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `discountts`
--

DROP TABLE IF EXISTS `discountts`;
CREATE TABLE IF NOT EXISTS `discountts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perc` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discountts`
--

INSERT INTO `discountts` (`id`, `name`, `perc`, `created_at`, `updated_at`) VALUES
(2, 'gffgfd', 456.00, '2022-02-22 06:38:53', '2022-02-22 06:38:53'),
(3, 'ftrtt', 56.00, '2022-02-22 06:40:12', '2022-02-22 06:40:12'),
(5, 'ytytyy upd', 789444.00, '2022-02-22 06:41:12', '2022-02-22 06:47:43');

-- --------------------------------------------------------

--
-- Table structure for table `divvs`
--

DROP TABLE IF EXISTS `divvs`;
CREATE TABLE IF NOT EXISTS `divvs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divvs`
--

INSERT INTO `divvs` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'div111 updddd', '2022-04-02 04:29:28', '2022-04-02 04:29:37');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_01_26_071651_create_companies_table', 2),
(6, '2022_01_26_075749_add_foreign_compuser', 3),
(8, '2022_01_29_085253_create_subcompanies_table', 4),
(9, '2022_02_01_102151_create_subsubcompanies_table', 5),
(10, '2022_02_03_092125_create_typebranches_table', 6),
(15, '2022_02_03_131000_create_branches_table', 8),
(16, '2022_02_10_080406_create_branchcontacts_table', 9),
(17, '2022_02_22_092415_create_discountts_table', 10),
(19, '2022_02_23_084007_create_cats_table', 11),
(20, '2022_02_23_114417_create_subats_table', 12),
(21, '2022_02_23_120433_create_subcats_table', 13),
(22, '2022_02_24_065344_create_subsubcats_table', 14),
(23, '2022_02_23_100037_add_cat_prod', 15),
(24, '2022_02_04_073527_create_prods_table', 16),
(26, '2022_03_01_064135_create_disc_cats_table', 17),
(27, '2022_04_02_064310_create_divvs_table', 18),
(28, '2022_04_04_124408_create_currencs_table', 19),
(29, '2022_04_05_080117_create_rolers_table', 20),
(31, '2022_04_13_073647_create_rolercats_table', 22),
(32, '2022_04_13_075108_add_foreign_rolertocat', 23),
(33, '2022_04_13_131747_create_rolerperms_table', 24),
(34, '2022_04_08_084024_create_rolerusers_table', 25);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 2, 'Shoppershop 411 acess token', 'cba04766746c2a4581add72635443a266e18458677ff60717072c3264a856a60', '[\"*\"]', NULL, '2022-03-22 09:12:07', '2022-03-22 09:12:07'),
(2, 'App\\Models\\User', 2, 'Shoppershop 411 acess token', 'fb8a2116d2017e49051f373916820de7cb3b761a0ef01c933eb468b6142a39a4', '[\"*\"]', NULL, '2022-03-22 09:18:01', '2022-03-22 09:18:01'),
(3, 'App\\Models\\User', 1, 'Shoppershop 411 acess token', 'c4a6c8d0f59c3a1fb0f84a61e57500395a97447169035bd8274c620e230821bb', '[\"*\"]', NULL, '2022-03-22 09:18:13', '2022-03-22 09:18:13'),
(4, 'App\\Models\\User', 1, 'Shoppershop 411 acess token', '1af324766dde93f892f5a6041aec2271488c520d41ed54b03afabf5b2af1f038', '[\"*\"]', NULL, '2022-03-23 12:23:29', '2022-03-23 12:23:29'),
(5, 'App\\Models\\User', 1, 'Shoppershop 411 acess token', '024f7134deeedab5c0eeb4599f0d992b2c720e04051f1bf027f1fd836fb9d78d', '[\"*\"]', NULL, '2022-03-24 03:14:03', '2022-03-24 03:14:03'),
(6, 'App\\Models\\User', 2, 'Shoppershop 411 acess token', 'b8eac1655c763d6af3c48e3f2ea9782d77c56bb163e30ca36261bef2ce7753e3', '[\"*\"]', NULL, '2022-03-31 04:09:02', '2022-03-31 04:09:02'),
(7, 'App\\Models\\User', 2, 'Shoppershop 411 acess token', 'ac361a0482b5a27df5fee320e87c548d52548405f3cf3935859972e7bd8fa194', '[\"*\"]', NULL, '2022-04-01 08:00:25', '2022-04-01 08:00:25'),
(8, 'App\\Models\\User', 1, 'Shoppershop 411 acess token', 'ac691bbbb9fe66f1bf084abe2d2dda31ab2c4f38483459054114a5e001ec0f70', '[\"*\"]', NULL, '2022-04-01 08:09:17', '2022-04-01 08:09:17'),
(9, 'App\\Models\\User', 2, 'Shoppershop 411 acess token', '860207842ba224e081ef00cf7711b1b45b8f6c67580633f6369217e99ca6e8c9', '[\"*\"]', NULL, '2022-04-01 10:00:27', '2022-04-01 10:00:27'),
(10, 'App\\Models\\User', 2, 'Shoppershop 411 acess token', 'e6e0fb181553299b42463a407b6e5b180181bd91d734674cfd9ef74de838595d', '[\"*\"]', NULL, '2022-04-02 03:50:30', '2022-04-02 03:50:30'),
(11, 'App\\Models\\User', 2, 'Shoppershop 411 acess token', '8fe2772bcb36964656afdd18b01dea628d55dfd3aae53d79ff52b11fe2dc88eb', '[\"*\"]', NULL, '2022-04-04 08:27:21', '2022-04-04 08:27:21'),
(12, 'App\\Models\\User', 2, 'Shoppershop 411 acess token', '91b65d77dad9133cdc9da947ef60a30ccda8a64dfb6b2d1bdc141f3f6e1e0962', '[\"*\"]', NULL, '2022-04-05 05:25:14', '2022-04-05 05:25:14'),
(13, 'App\\Models\\User', 2, 'Shoppershop 411 acess token', 'da0d01ec371e57ad537fabef1aff2f4aba6b24e6b9c1bc7972042918297ca812', '[\"*\"]', NULL, '2022-04-05 11:22:03', '2022-04-05 11:22:03'),
(14, 'App\\Models\\User', 2, 'Shoppershop 411 acess token', '600812917f85d7d0860a5a861f3fbf016c89efeeac57144644a5ef065d2fe22f', '[\"*\"]', NULL, '2022-04-06 02:43:38', '2022-04-06 02:43:38'),
(15, 'App\\Models\\User', 2, 'Shoppershop 411 acess token', 'ebf93818576459372a85296847cea682ade6755410677b94fe4dfb56437a6e9c', '[\"*\"]', NULL, '2022-04-07 02:00:05', '2022-04-07 02:00:05'),
(16, 'App\\Models\\User', 1, 'Shoppershop 411 acess token', 'deb7998807c5a0acae51a9f658ee5ab7b741089d3eb653c6a69429e9a945a2fd', '[\"*\"]', NULL, '2022-04-07 02:11:33', '2022-04-07 02:11:33'),
(17, 'App\\Models\\User', 2, 'Shoppershop 411 acess token', 'f9581803b8649cbd46e0ee10d6f9f6d5bcbbb95d232341742c8db8f557db9e3f', '[\"*\"]', NULL, '2022-04-07 02:12:24', '2022-04-07 02:12:24'),
(18, 'App\\Models\\User', 2, 'Shoppershop 411 acess token', '2dbdc194b6c2f7db250baf996ef010a4089e5d90036481f3d115b14b71189a04', '[\"*\"]', NULL, '2022-04-08 02:34:19', '2022-04-08 02:34:19'),
(19, 'App\\Models\\User', 2, 'Shoppershop 411 acess token', 'c6e9c6087be0f11fa9c08bd1a9ea8aa41abe9348c9254cf90a9ca2e7dcb2e1f8', '[\"*\"]', NULL, '2022-04-09 01:51:22', '2022-04-09 01:51:22'),
(20, 'App\\Models\\User', 2, 'Shoppershop 411 acess token', '08b90752738fc49d7985af2d6cf76e54cdc5b2c11cb5af1eeca879ecb33468bf', '[\"*\"]', NULL, '2022-04-11 03:16:18', '2022-04-11 03:16:18'),
(21, 'App\\Models\\User', 2, 'Shoppershop 411 acess token', '4c6d20bb6790af2c2c9f05adeef506a816f95c66d9f6323b156c2ac125d96cd1', '[\"*\"]', NULL, '2022-04-11 14:12:55', '2022-04-11 14:12:55'),
(22, 'App\\Models\\User', 2, 'Shoppershop 411 acess token', 'ba6755849e94d0abb7e9d35caf07bdc478e51d65122992f60e4e2764acde1b96', '[\"*\"]', NULL, '2022-04-12 02:18:16', '2022-04-12 02:18:16'),
(23, 'App\\Models\\User', 2, 'Shoppershop 411 acess token', '00dd379eacafb850edbce2638ad7816961d03aed24d9d6892413280230cc14d3', '[\"*\"]', NULL, '2022-04-12 03:00:17', '2022-04-12 03:00:17'),
(24, 'App\\Models\\User', 2, 'Shoppershop 411 acess token', '833727746ff72dc5649c419b2ef4afca09c38815a8b00f29a55dc3959dcbbe7c', '[\"*\"]', NULL, '2022-04-13 02:33:50', '2022-04-13 02:33:50'),
(25, 'App\\Models\\User', 2, 'Shoppershop 411 acess token', '61c1c377dacfc88e2784d3b894411c02f8ad07f4e1ccb516de614af86d94afc6', '[\"*\"]', NULL, '2022-04-13 12:36:53', '2022-04-13 12:36:53'),
(26, 'App\\Models\\User', 2, 'Shoppershop 411 acess token', '7735962ac4b9ecddfa460f8c06b237bb6524d84362bb84568e3343f1b21166cb', '[\"*\"]', NULL, '2022-04-14 00:23:14', '2022-04-14 00:23:14'),
(27, 'App\\Models\\User', 2, 'Shoppershop 411 acess token', '61c9c39408a70e25e3d33b7eab0b455053f7e3d04f7883eeabba326fa31141d1', '[\"*\"]', NULL, '2022-04-14 04:11:01', '2022-04-14 04:11:01'),
(28, 'App\\Models\\User', 1, 'Shoppershop 411 acess token', 'a7cc668e7779751beb5e9a3619e75ef73104be754b90f3f1b1775ecfae22cfa7', '[\"*\"]', NULL, '2022-04-14 04:12:33', '2022-04-14 04:12:33'),
(29, 'App\\Models\\User', 1, 'Shoppershop 411 acess token', '14c8571bb05f7340ddf68e66a556358d3ea37253b3afd8633713968462320939', '[\"*\"]', NULL, '2022-04-14 04:38:12', '2022-04-14 04:38:12'),
(30, 'App\\Models\\User', 1, 'Shoppershop 411 acess token', '3c15ccf406d75f00f6cc7d126d108d8f1308643f62b7ef4de721e3edfd9f7a2c', '[\"*\"]', NULL, '2022-04-14 04:42:20', '2022-04-14 04:42:20'),
(31, 'App\\Models\\User', 1, 'Shoppershop 411 acess token', '381f697a72da53b1c2237cbe06c53b4308ccf0fd1a865250576f0dd5881caf2d', '[\"*\"]', NULL, '2022-04-14 04:42:45', '2022-04-14 04:42:45'),
(32, 'App\\Models\\User', 1, 'Shoppershop 411 acess token', '3892611bea98c231cb42a7b51e4067e2c15ab2cb377e27662887814dab49aa15', '[\"*\"]', NULL, '2022-04-14 04:43:06', '2022-04-14 04:43:06'),
(33, 'App\\Models\\User', 1, 'Shoppershop 411 acess token', '3c4df644b4b822918ff3cd786f53be85a43756d3a53b9da5416131793e94c381', '[\"*\"]', NULL, '2022-04-14 04:44:05', '2022-04-14 04:44:05');

-- --------------------------------------------------------

--
-- Table structure for table `prods`
--

DROP TABLE IF EXISTS `prods`;
CREATE TABLE IF NOT EXISTS `prods` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `userid` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `compid` int(10) UNSIGNED NOT NULL,
  `subcompid` int(10) UNSIGNED NOT NULL,
  `subsubcompid` int(10) UNSIGNED DEFAULT NULL,
  `catid` int(10) UNSIGNED NOT NULL,
  `subcatid` int(10) UNSIGNED NOT NULL,
  `subsubcatid` int(10) UNSIGNED DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prix` float DEFAULT NULL,
  `des` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dess` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `prods_compid_foreign` (`compid`),
  KEY `prods_userid_foreign` (`userid`),
  KEY `prods_subcompid_foreign` (`subcompid`),
  KEY `prods_subsubcompid_foreign` (`subsubcompid`),
  KEY `prods_catid_foreign` (`catid`),
  KEY `prods_subcatid_foreign` (`subcatid`),
  KEY `prods_subsubcatid_foreign` (`subsubcatid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prods`
--

INSERT INTO `prods` (`id`, `userid`, `name`, `compid`, `subcompid`, `subsubcompid`, `catid`, `subcatid`, `subsubcatid`, `logo`, `prix`, `des`, `dess`, `created_at`, `updated_at`) VALUES
(1, 1, 'iiu', 5, 9, 0, 2, 2, 2, '', 88, '', '', '2022-02-26 02:48:19', '2022-02-26 02:48:19'),
(2, 1, 'UPDX1', 7, 1, 1, 1, 1, 1, '1646037031.jpg', 88, 'uyyt', '<p>uyyt</p>', '2022-02-26 02:48:42', '2022-02-28 04:30:31'),
(3, 1, 'fromwisiwiggg', 5, 9, 2, 2, 2, 2, '1648112350.jpg', 5788890, 'ytyty ytyy', '<p>ytytr trtt<img alt=\"\" src=\"http://127.0.0.1:8000/images/proder/1643201838_1648111901.jpg\" style=\"border-style:solid; border-width:1px; float:left; height:240px; width:360px\" /></p>', '2022-03-24 04:59:10', '2022-03-24 04:59:10'),
(4, 1, 'DFG45rt', 5, 9, 2, 2, 2, 2, '1648112415.jpg', 654556, 'ytyy', '<p>ytytytr<img alt=\"\" src=\"http://127.0.0.1:8000/images/proder/1643201726_1648112406.jpg\" style=\"height:365px; width:548px\" /></p>', '2022-03-24 05:00:15', '2022-03-24 05:00:15');

-- --------------------------------------------------------

--
-- Table structure for table `rolercats`
--

DROP TABLE IF EXISTS `rolercats`;
CREATE TABLE IF NOT EXISTS `rolercats` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rolercats`
--

INSERT INTO `rolercats` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Role11111', '2022-04-13 04:59:53', '2022-04-13 04:59:53'),
(2, 'Role 2222', '2022-04-13 05:18:33', '2022-04-13 05:18:33'),
(3, 'Full Role', '2022-04-14 01:35:39', '2022-04-20 03:12:25');

-- --------------------------------------------------------

--
-- Table structure for table `rolerperms`
--

DROP TABLE IF EXISTS `rolerperms`;
CREATE TABLE IF NOT EXISTS `rolerperms` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `rolercatid` int(10) UNSIGNED NOT NULL,
  `rolerid` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rolerperms_rolercatid_foreign` (`rolercatid`),
  KEY `rolerperms_rolerid_foreign` (`rolerid`)
) ENGINE=MyISAM AUTO_INCREMENT=124 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rolerperms`
--

INSERT INTO `rolerperms` (`id`, `rolercatid`, `rolerid`, `created_at`, `updated_at`) VALUES
(70, 3, 50, '2022-04-20 03:12:39', '2022-04-20 03:12:39'),
(71, 3, 53, '2022-04-20 03:12:39', '2022-04-20 03:12:39'),
(72, 3, 55, '2022-04-20 03:12:39', '2022-04-20 03:12:39'),
(73, 3, 56, '2022-04-20 03:12:39', '2022-04-20 03:12:39'),
(74, 3, 54, '2022-04-20 03:12:39', '2022-04-20 03:12:39'),
(75, 3, 52, '2022-04-20 03:12:39', '2022-04-20 03:12:39'),
(76, 3, 51, '2022-04-20 03:12:39', '2022-04-20 03:12:39'),
(77, 3, 1, '2022-04-20 03:12:39', '2022-04-20 03:12:39'),
(78, 3, 5, '2022-04-20 03:12:39', '2022-04-20 03:12:39'),
(57, 3, 43, '2022-04-19 05:14:57', '2022-04-19 05:14:57'),
(58, 3, 46, '2022-04-19 05:14:57', '2022-04-19 05:14:57'),
(59, 3, 48, '2022-04-19 05:14:57', '2022-04-19 05:14:57'),
(60, 3, 49, '2022-04-19 05:14:57', '2022-04-19 05:14:57'),
(61, 3, 47, '2022-04-19 05:14:57', '2022-04-19 05:14:57'),
(62, 3, 45, '2022-04-19 05:14:57', '2022-04-19 05:14:57'),
(63, 3, 44, '2022-04-19 05:14:57', '2022-04-19 05:14:57'),
(64, 3, 37, '2022-04-19 05:14:57', '2022-04-19 05:14:57'),
(65, 3, 41, '2022-04-19 05:14:57', '2022-04-19 05:14:57'),
(66, 3, 42, '2022-04-19 05:14:57', '2022-04-19 05:14:57'),
(67, 3, 40, '2022-04-19 05:14:57', '2022-04-19 05:14:57'),
(68, 3, 39, '2022-04-19 05:14:57', '2022-04-19 05:14:57'),
(69, 3, 38, '2022-04-19 05:14:57', '2022-04-19 05:14:57'),
(79, 3, 9, '2022-04-20 03:12:39', '2022-04-20 03:12:39'),
(80, 3, 7, '2022-04-20 03:12:39', '2022-04-20 03:12:39'),
(81, 3, 13, '2022-04-20 03:12:39', '2022-04-20 03:12:39'),
(82, 3, 4, '2022-04-20 03:12:39', '2022-04-20 03:12:39'),
(83, 3, 3, '2022-04-20 03:12:39', '2022-04-20 03:12:39'),
(84, 3, 28, '2022-04-20 03:12:39', '2022-04-20 03:12:39'),
(85, 3, 30, '2022-04-20 03:12:39', '2022-04-20 03:12:39'),
(86, 3, 31, '2022-04-20 03:12:39', '2022-04-20 03:12:39'),
(87, 3, 33, '2022-04-20 03:12:39', '2022-04-20 03:12:39'),
(88, 3, 34, '2022-04-20 03:12:39', '2022-04-20 03:12:39'),
(89, 3, 35, '2022-04-20 03:12:39', '2022-04-20 03:12:39'),
(90, 3, 36, '2022-04-20 03:12:39', '2022-04-20 03:12:39'),
(91, 3, 32, '2022-04-20 03:12:39', '2022-04-20 03:12:39'),
(92, 3, 29, '2022-04-20 03:12:39', '2022-04-20 03:12:39'),
(93, 3, 57, '2022-04-20 03:12:39', '2022-04-20 03:12:39'),
(94, 3, 59, '2022-04-20 03:12:39', '2022-04-20 03:12:39'),
(95, 3, 60, '2022-04-20 03:12:39', '2022-04-20 03:12:39'),
(96, 3, 61, '2022-04-20 03:12:39', '2022-04-20 03:12:39'),
(97, 3, 58, '2022-04-20 03:12:39', '2022-04-20 03:12:39'),
(98, 3, 14, '2022-04-20 03:12:39', '2022-04-20 03:12:39'),
(99, 3, 16, '2022-04-20 03:12:39', '2022-04-20 03:12:39'),
(100, 3, 62, '2022-04-20 03:12:39', '2022-04-20 03:12:39'),
(101, 3, 63, '2022-04-20 03:12:39', '2022-04-20 03:12:39'),
(102, 3, 17, '2022-04-20 03:12:39', '2022-04-20 03:12:39'),
(103, 3, 19, '2022-04-20 03:12:39', '2022-04-20 03:12:39'),
(104, 3, 20, '2022-04-20 03:12:39', '2022-04-20 03:12:39'),
(105, 3, 18, '2022-04-20 03:12:39', '2022-04-20 03:12:39'),
(106, 3, 15, '2022-04-20 03:12:39', '2022-04-20 03:12:39'),
(107, 3, 64, '2022-04-20 03:12:39', '2022-04-20 03:12:39'),
(108, 3, 66, '2022-04-20 03:12:39', '2022-04-20 03:12:39'),
(109, 3, 67, '2022-04-20 03:12:39', '2022-04-20 03:12:39'),
(110, 3, 69, '2022-04-20 03:12:39', '2022-04-20 03:12:39'),
(111, 3, 70, '2022-04-20 03:12:39', '2022-04-20 03:12:39'),
(112, 3, 68, '2022-04-20 03:12:39', '2022-04-20 03:12:39'),
(113, 3, 65, '2022-04-20 03:12:39', '2022-04-20 03:12:39'),
(114, 3, 21, '2022-04-20 03:12:39', '2022-04-20 03:12:39'),
(115, 3, 23, '2022-04-20 03:12:39', '2022-04-20 03:12:39'),
(116, 3, 24, '2022-04-20 03:12:39', '2022-04-20 03:12:39'),
(117, 3, 26, '2022-04-20 03:12:39', '2022-04-20 03:12:39'),
(118, 3, 27, '2022-04-20 03:12:39', '2022-04-20 03:12:39'),
(119, 3, 25, '2022-04-20 03:12:39', '2022-04-20 03:12:39'),
(120, 3, 22, '2022-04-20 03:12:39', '2022-04-20 03:12:39'),
(121, 3, 74, '2022-04-20 09:11:06', '2022-04-20 09:11:06'),
(122, 3, 76, '2022-04-20 09:11:06', '2022-04-20 09:11:06'),
(123, 3, 75, '2022-04-20 09:11:06', '2022-04-20 09:11:06');

-- --------------------------------------------------------

--
-- Table structure for table `rolers`
--

DROP TABLE IF EXISTS `rolers`;
CREATE TABLE IF NOT EXISTS `rolers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menuname` varchar(500) CHARACTER SET utf32 DEFAULT NULL,
  `menux` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `urlx` varchar(600) COLLATE utf8mb4_unicode_ci NOT NULL,
  `des` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sectionn` varchar(255) CHARACTER SET utf32 NOT NULL,
  `typ` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `method2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `method3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `classer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rolers`
--

INSERT INTO `rolers` (`id`, `name`, `menuname`, `menux`, `urlx`, `des`, `sectionn`, `typ`, `method1`, `method2`, `method3`, `classer`, `created_at`, `updated_at`) VALUES
(1, 'appmerchant.addcompany', 'Add Company', 'yes', '/appmerchant/addcompany', NULL, 'CompanyController', 'percontroller', 'get', NULL, NULL, 'create', '2022-04-05 11:47:20', '2022-04-20 04:34:14'),
(3, 'viewCompany.route', 'View Company', 'yes', '/appmerchant/viewcompany', NULL, 'CompanyController', 'perpath', 'get', NULL, NULL, 'indexadmin', '2022-04-06 02:51:59', '2022-04-20 04:33:54'),
(4, 'CompanyEdit.route', NULL, 'no', '/appmerchant/editcompany/', NULL, 'CompanyController', 'perpath', 'get', NULL, NULL, 'edit', '2022-04-06 04:21:23', '2022-04-06 05:14:01'),
(5, 'CompanyAdd.route', NULL, 'no', '/appmerchant/company/add', NULL, 'CompanyController', 'perpath', 'post', NULL, NULL, 'store', '2022-04-06 04:22:44', '2022-04-06 05:17:37'),
(14, 'appmerchant.addsubcompany', 'Add Sub Company', 'yes', '/appmerchant/addsubcompany/', NULL, 'SubcompanyController', 'perpath', 'get', NULL, NULL, 'create', '2022-04-07 03:12:28', '2022-04-20 04:33:24'),
(7, 'CompanyUpdate.route', NULL, 'no', '/appmerchant/companyupdate/update/', NULL, 'CompanyController', 'perpath', 'put', 'patch', 'post', 'update', '2022-04-06 04:26:17', '2022-04-06 05:27:22'),
(9, 'MyDelCompany.route', NULL, 'no', '/appmerchant/company/delete/', NULL, 'CompanyController', 'perpath', 'delete', 'post', 'get', 'destroy', '2022-04-06 04:36:02', '2022-04-06 05:28:32'),
(13, 'MyDelCompanyall.route', NULL, 'no', '/appmerchant/country/deleteall', NULL, 'CompanyController', 'perpath', 'delete', 'post', 'get', 'destroyall', '2022-04-07 03:00:16', '2022-04-07 03:01:29'),
(15, 'viewsubCompany.route', 'View Sub Company', 'yes', '/appmerchant/viewsubcompany/', NULL, 'SubcompanyController', 'perpath', 'get', NULL, NULL, 'indexadmin', '2022-04-07 03:35:17', '2022-04-20 04:30:47'),
(16, 'subCompanyEdit.route', NULL, 'no', '/appmerchant/editsubcompany/', NULL, 'SubcompanyController', 'perpath', 'get', NULL, NULL, 'edit', '2022-04-07 03:38:18', '2022-04-07 03:38:18'),
(17, 'subCompanyAdd.route', NULL, 'no', '/appmerchant/subcompany/add', NULL, 'SubcompanyController', 'perpath', 'post', NULL, NULL, 'store', '2022-04-07 03:48:29', '2022-04-07 03:48:29'),
(18, 'subCompanyUpdate.route', NULL, 'no', '/appmerchant/subcompanyupdate/update/', NULL, 'SubcompanyController', 'perpath', 'put', 'patch', 'post', 'update', '2022-04-07 03:52:37', '2022-04-07 03:52:37'),
(19, 'MyDelsubCompany.route', NULL, 'no', '/appmerchant/subcompany/delete/', NULL, 'SubcompanyController', 'perpath', 'delete', 'post', 'get', 'destroy', '2022-04-07 03:55:53', '2022-04-07 03:58:54'),
(20, 'MyDelsubCompanyall.route', NULL, 'no', '/appmerchant/subcompany/deleteall', NULL, 'SubcompanyController', 'perpath', 'delete', 'post', 'get', 'destroyall', '2022-04-07 03:58:09', '2022-04-07 03:58:09'),
(21, 'appmerchant.addsubsubcompany', 'Add Sub Sub Company', 'yes', '/appmerchant/addsubsubcompany/', NULL, 'SubsubcompanyController', 'perpath', 'get', NULL, NULL, 'create', '2022-04-07 04:03:07', '2022-04-20 04:23:18'),
(22, 'viewsubsubCompany.route', 'View Sub Sub Company', 'yes', '/appmerchant/viewsubsubcompany/', NULL, 'SubsubcompanyController', 'perpath', 'get', NULL, NULL, 'indexadmin', '2022-04-07 04:06:18', '2022-04-20 04:22:43'),
(23, 'subsubCompanyEdit.route', NULL, 'no', '/appmerchant/editsubsubcompany/', NULL, 'SubsubcompanyController', 'perpath', 'get', NULL, NULL, 'edit', '2022-04-07 04:08:10', '2022-04-07 04:08:10'),
(24, 'subsubCompanyAdd.route', NULL, 'no', '/appmerchant/subsubcompany/add', NULL, 'SubsubcompanyController', 'perpath', 'post', NULL, NULL, 'store', '2022-04-07 04:13:19', '2022-04-07 04:13:19'),
(25, 'subsubCompanyUpdate.route', NULL, 'no', '/appmerchant/subsubcompanyupdate/update/', NULL, 'SubsubcompanyController', 'perpath', 'put', 'patch', 'post', 'update', '2022-04-07 04:15:51', '2022-04-07 04:15:51'),
(26, 'MyDelsubsubCompany.route', NULL, 'no', '/appmerchant/subsubcompany/delete/', NULL, 'SubsubcompanyController', 'perpath', 'delete', 'post', 'get', 'destroy', '2022-04-07 04:19:32', '2022-04-07 04:19:32'),
(27, 'MyDelsubsubCompanyall.route', NULL, 'no', '/appmerchant/subsubcompany/deleteall', NULL, 'SubsubcompanyController', 'perpath', 'delete', 'post', 'get', 'destroyall', '2022-04-07 04:21:23', '2022-04-07 04:21:23'),
(28, 'appmerchant.addprod', 'Add Product', 'yes', '/appmerchant/addprod/', NULL, 'ProdController', 'perpath', 'get', NULL, NULL, 'create', '2022-04-07 04:29:15', '2022-04-20 04:22:03'),
(29, 'viewProd.route', 'View Products', 'yes', '/appmerchant/viewprod/', NULL, 'ProdController', 'perpath', 'get', NULL, NULL, 'indexadmin', '2022-04-07 04:32:22', '2022-04-20 04:21:26'),
(30, 'prodEdit.route', NULL, 'no', '/appmerchant/editprod/', NULL, 'ProdController', 'perpath', 'get', NULL, NULL, 'edit', '2022-04-07 04:33:45', '2022-04-07 04:33:45'),
(31, 'prodAdd.route', NULL, 'no', '/appmerchant/prod/add', NULL, 'ProdController', 'perpath', 'post', NULL, NULL, 'store', '2022-04-07 04:37:09', '2022-04-07 04:37:09'),
(32, 'prodUpdate.route', NULL, 'no', '/appmerchant/produpdate/update/', NULL, 'ProdController', 'perpath', 'put', 'patch', 'post', 'update', '2022-04-07 04:39:11', '2022-04-07 04:39:11'),
(33, 'MyDelProd.route', NULL, 'no', '/appmerchant/prod/delete/', NULL, 'ProdController', 'perpath', 'delete', 'post', 'get', 'destroy', '2022-04-07 04:42:19', '2022-04-07 04:42:19'),
(34, 'MyDelProdall.route', NULL, 'no', '/appmerchant/prod/deleteall', NULL, 'ProdController', 'perpath', 'delete', 'post', 'get', 'destroyall', '2022-04-07 04:44:50', '2022-04-07 04:44:50'),
(35, 'MyDelProdbycat.route', NULL, 'no', '/appmerchant/prodbycat/delete/', NULL, 'ProdController', 'perpath', 'delete', 'post', 'get', 'destroybycat', '2022-04-07 04:49:39', '2022-04-07 04:49:39'),
(36, 'MyDelProdallbycat.route', NULL, 'no', '/appmerchant/prodbycat/deleteall', NULL, 'ProdController', 'perpath', 'delete', 'post', 'get', 'destroyallbycat', '2022-04-07 04:51:44', '2022-04-07 04:51:44'),
(37, 'appmerchant.addbranch', 'Add Branch', 'yes', '/appmerchant/addbranch/', NULL, 'BranchController', 'perpath', 'get', NULL, NULL, 'create', '2022-04-07 04:59:19', '2022-04-20 04:20:30'),
(38, 'viewBranch.route', 'View Branch', 'yes', '/appmerchant/viewbranch/', NULL, 'BranchController', 'perpath', 'get', NULL, NULL, 'indexadmin', '2022-04-07 05:18:46', '2022-04-20 04:19:47'),
(39, 'branchEdit.route', NULL, 'no', '/appmerchant/editbranch/', NULL, 'BranchController', 'perpath', 'get', NULL, NULL, 'edit', '2022-04-07 05:22:01', '2022-04-07 05:22:01'),
(40, 'branchUpdate.route', NULL, 'no', '/appmerchant/branchupdate/update/', NULL, 'BranchController', 'perpath', 'put', 'patch', 'post', 'update', '2022-04-07 05:25:20', '2022-04-07 05:25:20'),
(41, 'MyDelBranch.route', NULL, 'no', '/appmerchant/branch/delete/', NULL, 'BranchController', 'perpath', 'delete', 'post', 'get', 'destroy', '2022-04-07 05:27:47', '2022-04-07 05:27:47'),
(42, 'MyDelBranchall.route', NULL, 'no', '/appmerchant/branch/deleteall', NULL, 'BranchController', 'perpath', 'delete', 'post', 'get', 'destroyall', '2022-04-08 02:46:28', '2022-04-08 02:46:28'),
(43, 'appmerchant.addbranchcontact', 'Add Branch Contact', 'yes', '/appmerchant/addbranchcontact/', NULL, 'BranchcontactController', 'perpath', 'get', NULL, NULL, 'create', '2022-04-08 02:54:18', '2022-04-20 04:16:36'),
(44, 'viewBranchcontact.route', 'View Branch Contact', 'yes', '/appmerchant/viewbranchcontact/', NULL, 'BranchcontactController', 'perpath', 'get', NULL, NULL, 'indexadmin', '2022-04-08 02:56:02', '2022-04-20 04:15:28'),
(45, 'branchcontactEdit.route', NULL, 'no', '/appmerchant/editbranchcontact/', NULL, 'BranchcontactController', 'perpath', 'get', NULL, NULL, 'edit', '2022-04-08 02:58:53', '2022-04-08 02:58:53'),
(46, 'branchcontactAdd.route', NULL, 'no', '/appmerchant/branchcontact/add', NULL, 'BranchcontactController', 'perpath', 'post', NULL, NULL, 'store', '2022-04-08 03:01:02', '2022-04-08 03:01:02'),
(47, 'branchcontactUpdate.route', NULL, 'no', '/appmerchant/branchcontactupdate/update/', NULL, 'BranchcontactController', 'perpath', 'put', 'patch', 'post', 'update', '2022-04-08 03:03:53', '2022-04-08 03:03:53'),
(48, 'MyDelBranchcontact.route', NULL, 'no', '/appmerchant/branchcontact/delete/', NULL, 'BranchcontactController', 'perpath', 'delete', 'post', 'get', 'destroy', '2022-04-08 03:16:55', '2022-04-08 03:16:55'),
(49, 'MyDelBranchcontactall.route', NULL, 'no', '/appmerchant/branchcontact/deleteall', NULL, 'BranchcontactController', 'perpath', 'delete', 'post', 'get', 'destroyall', '2022-04-08 03:18:49', '2022-04-08 03:18:49'),
(50, 'appmerchant.addcat', 'Add Category', 'yes', '/appmerchant/addcat', NULL, 'CatController', 'perpath', 'get', NULL, NULL, 'create', '2022-04-08 03:24:45', '2022-04-20 04:14:37'),
(51, 'viewCat.route', 'View Category', 'yes', '/appmerchant/viewcat', NULL, 'CatController', 'perpath', 'get', NULL, NULL, 'indexadmin', '2022-04-08 03:26:50', '2022-04-20 04:10:31'),
(52, 'CatEdit.route', NULL, 'no', '/appmerchant/editcat/', NULL, 'CatController', 'perpath', 'get', NULL, NULL, 'edit', '2022-04-08 03:34:45', '2022-04-08 03:34:45'),
(53, 'CatAdd.route', NULL, 'no', '/appmerchant/cat/add', NULL, 'CatController', 'perpath', 'post', NULL, NULL, 'store', '2022-04-08 03:40:39', '2022-04-08 03:40:39'),
(54, 'CatUpdate.route', NULL, 'no', '/appmerchant/catupdate/update/', NULL, 'CatController', 'perpath', 'put', 'patch', 'post', 'update', '2022-04-08 03:43:13', '2022-04-08 03:43:13'),
(55, 'MyDelCat.route', NULL, 'no', '/appmerchant/cat/delete/', NULL, 'CatController', 'perpath', 'delete', 'post', 'get', 'destroy', '2022-04-08 03:46:16', '2022-04-08 03:46:16'),
(56, 'MyDelCatall.route', NULL, 'no', '/appmerchant/cat/deleteall', NULL, 'CatController', 'perpath', 'delete', 'post', 'get', 'destroyall', '2022-04-08 03:48:26', '2022-04-08 03:48:26'),
(57, 'appmerchant.addsubcat', 'Add Sub Category', 'yes', '/appmerchant/addsubcat/', NULL, 'SubcatController', 'perpath', 'get', NULL, NULL, 'create', '2022-04-08 03:51:56', '2022-04-20 04:08:47'),
(58, 'viewsubCat.route', 'View Sub Category', 'yes', '/appmerchant/viewsubcat/', NULL, 'SubcatController', 'perpath', 'get', NULL, NULL, 'indexadmin', '2022-04-08 03:54:22', '2022-04-20 04:07:53'),
(59, 'subCatEdit.route', 'Edit Sub Company', 'no', '/appmerchant/editsubcat/', NULL, 'SubcatController', 'perpath', 'get', NULL, NULL, 'edit', '2022-04-08 03:55:57', '2022-04-20 04:07:28'),
(60, 'subCatAdd.route', NULL, 'no', '/appmerchant/subcat/add', NULL, 'SubcatController', 'perpath', 'post', NULL, NULL, 'store', '2022-04-08 03:57:25', '2022-04-08 03:57:25'),
(61, 'subCatUpdate.route', NULL, 'no', '/appmerchant/subcatupdate/update/', NULL, 'SubcatController', 'perpath', 'put', 'patch', 'post', 'update', '2022-04-08 04:00:23', '2022-04-08 04:00:23'),
(62, 'MyDelsubCompany.route', NULL, 'no', '/appmerchant/subcat/delete/', NULL, 'SubcompanyController', 'perpath', 'delete', 'post', 'get', 'destroy', '2022-04-08 04:02:58', '2022-04-08 04:02:58'),
(63, 'MyDelsubCompanyall.route', NULL, 'no', '/appmerchant/subcat/deleteall', NULL, 'SubcompanyController', 'perpath', 'delete', 'post', 'get', 'destroyall', '2022-04-08 04:04:47', '2022-04-08 04:04:47'),
(64, 'appmerchant.addsubsubcat', 'Add Sub Sub Category', 'yes', '/appmerchant/addsubsubcat/', NULL, 'SubsubcatController', 'perpath', 'get', NULL, NULL, 'create', '2022-04-08 04:13:01', '2022-04-20 04:04:37'),
(65, 'viewsubsubCat.route', 'View Sub Sub Categories', 'yes', '/appmerchant/viewsubsubcat/', NULL, 'SubsubcatController', 'perpath', 'get', NULL, NULL, 'indexadmin', '2022-04-08 04:15:01', '2022-04-20 04:02:00'),
(66, 'subsubCatEdit.route', 'Edit Sub Sub Categories', 'no', '/appmerchant/editsubsubcat/', NULL, 'SubsubcatController', 'perpath', 'get', NULL, NULL, 'edit', '2022-04-08 04:16:34', '2022-04-20 03:33:18'),
(67, 'subsubCatAdd.route', NULL, 'no', '/appmerchant/subsubcat/add', NULL, 'SubsubcatController', 'perpath', 'post', NULL, NULL, 'store', '2022-04-08 04:18:21', '2022-04-08 04:18:21'),
(68, 'subsubCatUpdate.route', NULL, 'no', '/appmerchant/subsubcatupdate/update/', NULL, 'SubsubcatController', 'perpath', 'put', 'patch', 'post', 'update', '2022-04-08 04:21:08', '2022-04-08 04:21:08'),
(69, 'MyDelsubsubCat.route', NULL, 'no', '/appmerchant/subsubcat/delete/', NULL, 'SubsubcatController', 'perpath', 'delete', 'post', 'get', 'destroy', '2022-04-08 04:33:19', '2022-04-08 04:33:19'),
(70, 'MyDelsubsubCatall.route', NULL, 'no', '/appmerchant/subsubcat/deleteall', NULL, 'SubsubcatController', 'perpath', 'delete', 'post', 'get', 'deleteall', '2022-04-08 04:35:01', '2022-04-13 09:03:21'),
(74, 'appmerchant.addprodbycat', 'Add Product By Category', 'yes', '/appmerchant/addprodbycat/', NULL, 'ProdController', 'perpath', 'get', NULL, NULL, 'createbycat', '2022-04-20 09:02:45', '2022-04-20 09:02:45'),
(75, 'viewProdbycat.route', 'View Product by category', 'yes', '/appmerchant/viewprodbycat/', NULL, 'ProdController', 'perpath', 'get', NULL, NULL, 'indexadminbycat', '2022-04-20 09:05:38', '2022-04-20 09:05:38'),
(76, 'prodEditbycat.route', NULL, 'no', '/appmerchant/editprodbycat/', NULL, 'ProdController', 'perpath', 'get', NULL, NULL, 'editbycat', '2022-04-20 09:07:29', '2022-04-20 09:08:35');

-- --------------------------------------------------------

--
-- Table structure for table `rolerusers`
--

DROP TABLE IF EXISTS `rolerusers`;
CREATE TABLE IF NOT EXISTS `rolerusers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `userid` int(10) UNSIGNED NOT NULL,
  `rolerid` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userid` (`userid`,`rolerid`),
  UNIQUE KEY `userid_2` (`userid`),
  KEY `rolerusers_rolerid_foreign` (`rolerid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rolerusers`
--

INSERT INTO `rolerusers` (`id`, `userid`, `rolerid`, `created_at`, `updated_at`) VALUES
(1, 1, 3, '2022-04-19 03:20:51', '2022-04-19 04:14:14');

-- --------------------------------------------------------

--
-- Table structure for table `rolerusers-2`
--

DROP TABLE IF EXISTS `rolerusers-2`;
CREATE TABLE IF NOT EXISTS `rolerusers-2` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `userid` int(10) UNSIGNED NOT NULL,
  `rolerid` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userid` (`userid`,`rolerid`),
  KEY `rolerusers_rolerid_foreign` (`rolerid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subats`
--

DROP TABLE IF EXISTS `subats`;
CREATE TABLE IF NOT EXISTS `subats` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `userid` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catid` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subats_catid_foreign` (`catid`),
  KEY `subats_userid_foreign` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subcats`
--

DROP TABLE IF EXISTS `subcats`;
CREATE TABLE IF NOT EXISTS `subcats` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `userid` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catid` int(10) UNSIGNED NOT NULL,
  `logo` varchar(255) CHARACTER SET utf32 DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subcats_catid_foreign` (`catid`),
  KEY `subcats_userid_foreign` (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcats`
--

INSERT INTO `subcats` (`id`, `userid`, `name`, `catid`, `logo`, `created_at`, `updated_at`) VALUES
(1, 1, 'Subcattego', 1, '1645622759.png', '2022-02-23 09:25:59', '2022-02-23 09:51:26'),
(2, 1, 'gfdfdd', 2, '', '2022-02-24 07:19:09', '2022-02-24 07:19:09'),
(3, 1, 'gfgtyytr', 1, '', '2022-02-24 07:19:56', '2022-02-24 07:19:56'),
(4, 1, 'ytytytr', 1, '', '2022-02-24 07:20:36', '2022-02-24 07:20:36'),
(5, 1, 'SUB B111', 2, '', '2022-02-24 07:21:01', '2022-02-24 07:21:01');

-- --------------------------------------------------------

--
-- Table structure for table `subcompanies`
--

DROP TABLE IF EXISTS `subcompanies`;
CREATE TABLE IF NOT EXISTS `subcompanies` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `userid` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `compid` int(10) UNSIGNED NOT NULL,
  `typesubcompid` int(10) UNSIGNED NOT NULL,
  `logo` varchar(255) CHARACTER SET utf32 DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userid` (`userid`,`name`,`compid`,`typesubcompid`),
  KEY `subcompanies_compid_foreign` (`compid`),
  KEY `subcompanies_typesubcompid_foreign` (`typesubcompid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcompanies`
--

INSERT INTO `subcompanies` (`id`, `userid`, `name`, `compid`, `typesubcompid`, `logo`, `created_at`, `updated_at`) VALUES
(1, 1, 'gfhgf', 7, 3, '1643639287.jpg', '2022-01-31 10:28:07', '2022-01-31 10:28:07'),
(4, 1, 'jhjhjg', 8, 3, '', '2022-01-31 11:41:30', '2022-01-31 11:41:30'),
(6, 1, 'subbbb', 7, 3, '1643785689.jpg', '2022-02-02 03:08:09', '2022-02-02 03:08:09'),
(7, 1, 'jhjhg', 7, 4, '1643785711.jpg', '2022-02-02 03:08:31', '2022-02-02 03:08:31'),
(8, 1, 'uytuytu', 2, 3, '', '2022-02-02 03:10:29', '2022-02-02 03:10:29'),
(9, 1, 'lkjklklkl', 5, 4, '', '2022-02-02 03:10:57', '2022-02-02 03:10:57'),
(10, 1, 'jhgjghjgh', 1, 3, '', '2022-02-02 03:11:07', '2022-02-02 03:11:07');

-- --------------------------------------------------------

--
-- Table structure for table `subsubcats`
--

DROP TABLE IF EXISTS `subsubcats`;
CREATE TABLE IF NOT EXISTS `subsubcats` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `userid` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catid` int(10) UNSIGNED NOT NULL,
  `subcatid` int(10) UNSIGNED NOT NULL,
  `logo` varchar(500) CHARACTER SET utf32 DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subsubcats_catid_foreign` (`catid`),
  KEY `subsubcats_userid_foreign` (`userid`),
  KEY `subsubcats_subcatid_foreign` (`subcatid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subsubcats`
--

INSERT INTO `subsubcats` (`id`, `userid`, `name`, `catid`, `subcatid`, `logo`, `created_at`, `updated_at`) VALUES
(1, 1, 'ASdffgg', 1, 1, '1645702215.jpg', '2022-02-24 07:30:15', '2022-02-24 07:30:15'),
(2, 1, 'ASdffggght', 2, 2, '1645702746.jpg', '2022-02-24 07:39:06', '2022-02-24 07:39:06'),
(3, 1, 'trtrt upddd', 1, 1, '', '2022-02-24 07:40:46', '2022-02-24 07:48:56');

-- --------------------------------------------------------

--
-- Table structure for table `subsubcompanies`
--

DROP TABLE IF EXISTS `subsubcompanies`;
CREATE TABLE IF NOT EXISTS `subsubcompanies` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `userid` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `compid` int(10) UNSIGNED NOT NULL,
  `subcompid` int(10) UNSIGNED NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userid` (`userid`,`name`,`compid`,`subcompid`),
  KEY `subsubcompanies_compid_foreign` (`compid`),
  KEY `subsubcompanies_subcompid_foreign` (`subcompid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subsubcompanies`
--

INSERT INTO `subsubcompanies` (`id`, `userid`, `name`, `compid`, `subcompid`, `logo`, `created_at`, `updated_at`) VALUES
(1, 1, 'tgtytty', 7, 1, '1643781358.jpg', '2022-02-02 01:55:59', '2022-02-02 01:55:59'),
(2, 1, 'UPDATED2345rttttt', 5, 9, '', '2022-02-02 02:00:16', '2022-02-28 04:26:11'),
(5, 1, 'UPD 23', 2, 8, '1643801517.jpg', '2022-02-02 06:29:09', '2022-02-02 07:32:11'),
(7, 1, '8888', 7, 7, '', '2022-02-05 04:59:09', '2022-02-05 04:59:09');

-- --------------------------------------------------------

--
-- Table structure for table `typebranches`
--

DROP TABLE IF EXISTS `typebranches`;
CREATE TABLE IF NOT EXISTS `typebranches` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `typebranches`
--

INSERT INTO `typebranches` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, 'Type111', '2022-02-09 07:12:07', '2022-02-09 07:12:07'),
(4, 'Type22222', '2022-02-09 07:12:17', '2022-02-09 07:12:17'),
(5, 'Typeee3333', '2022-02-09 07:12:28', '2022-02-09 07:12:28'),
(6, 'ytyyt', '2022-02-18 04:42:51', '2022-02-18 04:42:51'),
(7, 'ytuyuyu', '2022-02-18 04:46:30', '2022-02-18 04:46:30');

-- --------------------------------------------------------

--
-- Table structure for table `typesubcompanies`
--

DROP TABLE IF EXISTS `typesubcompanies`;
CREATE TABLE IF NOT EXISTS `typesubcompanies` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `typesubcompanies`
--

INSERT INTO `typesubcompanies` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, 'type1', NULL, NULL),
(4, 'type2', NULL, NULL),
(5, 'Type1111', '2022-02-09 07:06:02', '2022-02-09 07:06:02'),
(6, 'Typeeee44444', '2022-02-09 07:06:16', '2022-02-09 07:06:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) CHARACTER SET utf32 DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `levell` int(11) NOT NULL DEFAULT 2,
  `conf1` int(11) NOT NULL DEFAULT 0,
  `conf2` int(11) NOT NULL DEFAULT 1,
  `statuss` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '2',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lname`, `email`, `email_verified_at`, `password`, `remember_token`, `levell`, `conf1`, `conf2`, `statuss`, `created_at`, `updated_at`) VALUES
(1, 'test1', 'lastname', 'test@test.com', NULL, '$2y$10$HtMKKOClab5bQ/J1UdtvIuvXqeoR8pNih7khl35n04VRwpKN59ONu', 'cmZRkVBiPREhWzt8ukTTW8NZWFWQKo5asQkNGvtv2LlfCWbu2ku4AVY7fm0S', 2, 1, 1, '2', '2022-01-26 02:54:11', '2022-04-20 09:47:06'),
(2, 'admin', NULL, 'admin@admin.com', NULL, '$2y$10$HtMKKOClab5bQ/J1UdtvIuvXqeoR8pNih7khl35n04VRwpKN59ONu', 'Rkb91VIhLI2oKbRYEghIXLRcWQsflGErq3hiPLnzyzpobULriuByw1RsgMV4', 1, 1, 1, '2', NULL, NULL),
(3, 'fdsfdsfs', NULL, 'admin2@admin.com', NULL, '$2y$10$q32lFS0/K.xi0BWxobO/cO65ClLFKk8zAHDq5WQHDH9BO1a5PN7Be', NULL, 2, 1, 1, '2', '2022-03-22 08:36:54', '2022-03-22 08:36:54'),
(4, 'test2', 'test2', 'test2@test.com', NULL, '$2y$10$sslh/YrPBAT3Bkty.7g/QOshRJPoYav.4RSVfdS6BZV7K/4if.0G2', NULL, 2, 1, 1, '2', '2022-03-22 08:37:36', '2022-04-20 09:46:50'),
(6, 'firstereee', NULL, 'rt1@doc.net', NULL, '$2y$10$OIemk8sA6Q5Y4tWRfg5Z3eQbkzP8.W31O6YtduX1Sl/GULmUf5DOS', NULL, 2, 1, 1, '2', '2022-03-31 06:16:43', '2022-03-31 06:16:43'),
(7, 'first 22', 'lat 222', 'rt2@doc.net', NULL, '$2y$10$oEfe/wv4AmA2jhKoo/adYu9B8j33hb5Sn4.E9yzRaClYYmkj0knDO', NULL, 2, 1, 1, '0', '2022-03-31 06:38:07', '2022-03-31 06:38:07'),
(8, 'first3333 upd', 'erer', 'rt3@doc.net', NULL, '$2y$10$KlqisnwP9e/0DRjhFez57OSz5eEcs5FP40gvFHFulbCWrqKtIHXdG', NULL, 2, 1, 1, '1', '2022-03-31 06:38:35', '2022-03-31 07:19:48'),
(9, 'upd-first444', 'reerwr upd', 'rt4@doc.net', NULL, '$2y$10$QqvVdRnor3Up5xGufZgzVuUW71JMHxqXg9sMeTKcpXltD0b4oj96m', NULL, 2, 1, 1, '1', '2022-03-31 06:38:58', '2022-03-31 07:21:42');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
