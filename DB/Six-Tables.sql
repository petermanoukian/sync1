-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 28, 2022 at 08:46 AM
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
  `prix` double(8,2) DEFAULT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prods`
--

INSERT INTO `prods` (`id`, `userid`, `name`, `compid`, `subcompid`, `subsubcompid`, `catid`, `subcatid`, `subsubcatid`, `logo`, `prix`, `des`, `dess`, `created_at`, `updated_at`) VALUES
(1, 1, 'iiu', 5, 9, 0, 2, 2, 2, '', 88.00, '', '', '2022-02-26 02:48:19', '2022-02-26 02:48:19'),
(2, 1, 'UPDX1', 7, 1, 1, 1, 1, 1, '1646037031.jpg', 88.00, 'uyyt', '<p>uyyt</p>', '2022-02-26 02:48:42', '2022-02-28 04:30:31');

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
