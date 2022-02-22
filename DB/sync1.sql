-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 11, 2022 at 06:49 AM
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `userid`, `name`, `logo`, `created_at`, `updated_at`) VALUES
(1, 1, 'twessst111', NULL, '2022-01-26 08:48:11', '2022-01-26 08:48:11'),
(2, 1, 'tesddf111 updr', '', '2022-01-26 08:55:26', '2022-01-28 09:11:39'),
(5, 1, 'company555 updddd', '1643375471.jpg', '2022-01-27 10:22:07', '2022-01-28 09:11:11'),
(7, 1, 'fdfdfds', '', '2022-01-28 09:12:44', '2022-01-28 09:12:44'),
(8, 1, 'iuyii', '', '2022-01-31 11:41:21', '2022-01-31 11:41:21');

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(14, '2022_02_04_073527_create_prods_table', 7),
(15, '2022_02_03_131000_create_branches_table', 8),
(16, '2022_02_10_080406_create_branchcontacts_table', 9);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prix` double(8,2) DEFAULT NULL,
  `des` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dess` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `prods_compid_foreign` (`compid`),
  KEY `prods_userid_foreign` (`userid`),
  KEY `prods_subcompid_foreign` (`subcompid`),
  KEY `prods_subsubcompid_foreign` (`subsubcompid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, 1, 'i987988789', 7, 1, '', '2022-02-02 02:00:16', '2022-02-02 02:00:16'),
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `typebranches`
--

INSERT INTO `typebranches` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, 'Type111', '2022-02-09 07:12:07', '2022-02-09 07:12:07'),
(4, 'Type22222', '2022-02-09 07:12:17', '2022-02-09 07:12:17'),
(5, 'Typeee3333', '2022-02-09 07:12:28', '2022-02-09 07:12:28');

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
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `levell` int(11) NOT NULL DEFAULT 2,
  `conf1` int(11) NOT NULL DEFAULT 0,
  `conf2` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `levell`, `conf1`, `conf2`, `created_at`, `updated_at`) VALUES
(1, 'test111', 'test@test.com', NULL, '$2y$10$HtMKKOClab5bQ/J1UdtvIuvXqeoR8pNih7khl35n04VRwpKN59ONu', 'p3rjfvg5PBerBqqsRrIyrUiYh8YMUwzyLsv1Dp6EtvLn2cpRmNzFowyeyeoQ', 2, 1, 1, '2022-01-26 02:54:11', '2022-01-26 02:54:11'),
(2, 'admin', 'admin@admin.com', NULL, '$2y$10$HtMKKOClab5bQ/J1UdtvIuvXqeoR8pNih7khl35n04VRwpKN59ONu', 'KEg4roCuL1E2sef4lO0Xg2VfLolTGRZXVxsO6JAbWYuLzOsEtJOdfVUNiCbo', 1, 1, 1, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
