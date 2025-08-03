-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 03, 2025 at 06:13 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kataloglelangjambi`
--

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
-- Table structure for table `contact_persons`
--

CREATE TABLE `contact_persons` (
  `id` bigint NOT NULL,
  `property_id` bigint UNSIGNED DEFAULT NULL,
  `nama` tinytext COLLATE utf8mb4_unicode_ci,
  `no_hp` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_persons`
--

INSERT INTO `contact_persons` (`id`, `property_id`, `nama`, `no_hp`) VALUES
(1, 1, 'Linda', 81275376518),
(2, 1, 'Yufi', 82214605857),
(3, 1, 'Wawan', 85366764251),
(4, 2, 'Linda', 81275376518),
(5, 2, 'Yufi', 82214605857),
(6, 2, 'Wawan', 85366764251),
(7, 3, 'Linda', 81275376518),
(8, 3, 'Yufi', 82214605857),
(9, 3, 'Wawan', 85366764251),
(10, 4, 'Linda', 81275376518),
(11, 4, 'Yufi', 82214605857),
(12, 4, 'Wawan', 85366764251),
(13, 5, 'Linda', 81275376518),
(14, 5, 'Yufi', 82214605857),
(15, 5, 'Wawan', 85366764251),
(16, 6, 'Linda', 81275376518),
(17, 6, 'Yufi', 82214605857),
(18, 6, 'Wawan', 85366764251),
(19, 7, 'Linda', 81275376518),
(20, 7, 'Yufi', 82214605857),
(21, 7, 'Wawan', 85366764251),
(22, 8, 'Linda', 81275376518),
(23, 8, 'Yufi', 82214605857),
(24, 8, 'Wawan', 85366764251),
(25, 9, 'Linda', 81275376518),
(26, 9, 'Yufi', 82214605857),
(27, 9, 'Wawan', 85366764251),
(28, 10, 'Linda', 81275376518),
(29, 10, 'Yufi', 82214605857),
(30, 10, 'Wawan', 85366764251),
(31, 11, 'Linda', 81275376518),
(32, 11, 'Yufi', 82214605857),
(33, 11, 'Wawan', 85366764251),
(34, 12, 'Linda', 81275376518),
(35, 12, 'Yufi', 82214605857),
(36, 12, 'Wawan', 85366764251),
(37, 13, 'Linda', 81275376518),
(38, 13, 'Yufi', 82214605857),
(39, 13, 'Wawan', 85366764251),
(40, 14, 'Linda', 81275376518),
(41, 14, 'Yufi', 82214605857),
(42, 14, 'Wawan', 85366764251),
(43, 15, 'Linda', 81275376518),
(44, 15, 'Yufi', 82214605857),
(45, 15, 'Wawan', 85366764251),
(46, 16, 'Linda', 81275376518),
(47, 16, 'Yufi', 82214605857),
(48, 16, 'Wawan', 85366764251),
(49, 17, 'Linda', 81275376518),
(50, 17, 'Yufi', 82214605857),
(51, 17, 'Wawan', 85366764251),
(52, 18, 'Linda', 81275376518),
(53, 18, 'Yufi', 82214605857),
(54, 18, 'Wawan', 85366764251),
(55, 19, 'Linda', 81275376518),
(56, 19, 'Yufi', 82214605857),
(57, 19, 'Wawan', 85366764251),
(58, 20, 'Linda', 81275376518),
(59, 20, 'Yufi', 82214605857),
(60, 20, 'Wawan', 85366764251),
(61, 21, 'Linda', 81275376518),
(62, 21, 'Yufi', 82214605857),
(63, 21, 'Wawan', 85366764251),
(64, 22, 'Linda', 81275376518),
(65, 22, 'Yufi', 82214605857),
(66, 22, 'Wawan', 85366764251),
(67, 23, 'Linda', 81275376518),
(68, 23, 'Yufi', 82214605857),
(69, 23, 'Wawan', 85366764251),
(70, 24, 'Linda', 81275376518),
(71, 24, 'Yufi', 82214605857),
(72, 24, 'Wawan', 85366764251),
(73, 25, 'Linda', 81275376518),
(74, 25, 'Yufi', 82214605857),
(75, 25, 'Wawan', 85366764251),
(76, 26, 'Linda', 81275376518),
(77, 26, 'Yufi', 82214605857),
(78, 26, 'Wawan', 85366764251),
(79, 27, 'Linda', 81275376518),
(80, 27, 'Yufi', 82214605857),
(81, 27, 'Wawan', 85366764251),
(82, 28, 'Linda', 81275376518),
(83, 28, 'Yufi', 82214605857),
(84, 28, 'Wawan', 85366764251),
(85, 29, 'Linda', 81275376518),
(86, 29, 'Yufi', 82214605857),
(87, 29, 'Wawan', 85366764251),
(88, 30, 'Linda', 81275376518),
(89, 30, 'Yufi', 82214605857),
(90, 30, 'Wawan', 85366764251),
(91, 31, 'Linda', 81275376518),
(92, 31, 'Yufi', 82214605857),
(93, 31, 'Wawan', 85366764251),
(94, 32, 'Linda', 81275376518),
(95, 32, 'Yufi', 82214605857),
(96, 32, 'Wawan', 85366764251),
(97, 33, 'Linda', 81275376518),
(98, 33, 'Yufi', 82214605857),
(99, 33, 'Wawan', 85366764251),
(100, 34, 'Linda', 81275376518),
(101, 34, 'Yufi', 82214605857),
(102, 34, 'Wawan', 85366764251),
(103, 35, 'Linda', 81275376518),
(104, 35, 'Yufi', 82214605857),
(105, 35, 'Wawan', 85366764251),
(106, 36, 'Linda', 81275376518),
(107, 36, 'Yufi', 82214605857),
(108, 36, 'Wawan', 85366764251),
(109, 37, 'Linda', 81275376518),
(110, 37, 'Yufi', 82214605857),
(111, 37, 'Wawan', 85366764251),
(112, 38, 'Linda', 81275376518),
(113, 38, 'Yufi', 82214605857),
(114, 38, 'Wawan', 85366764251),
(115, 39, 'Linda', 81275376518),
(116, 39, 'Yufi', 82214605857),
(117, 39, 'Wawan', 85366764251),
(118, 40, 'Linda', 81275376518),
(119, 40, 'Yufi', 82214605857),
(120, 40, 'Wawan', 85366764251),
(121, 41, 'Linda', 81275376518),
(122, 41, 'Yufi', 82214605857),
(123, 41, 'Wawan', 85366764251),
(124, 42, 'Linda', 81275376518),
(125, 42, 'Yufi', 82214605857),
(126, 42, 'Wawan', 85366764251),
(127, 43, 'Linda', 81275376518),
(128, 43, 'Yufi', 82214605857),
(129, 43, 'Wawan', 85366764251),
(130, 44, 'Linda', 81275376518),
(131, 44, 'Yufi', 82214605857),
(132, 44, 'Wawan', 85366764251),
(133, 45, 'Linda', 81275376518),
(134, 45, 'Yufi', 82214605857),
(135, 45, 'Wawan', 85366764251),
(136, 46, 'Linda', 81275376518),
(137, 46, 'Yufi', 82214605857),
(138, 46, 'Wawan', 85366764251),
(139, 47, 'Linda', 81275376518),
(140, 47, 'Yufi', 82214605857),
(141, 47, 'Wawan', 85366764251),
(142, 48, 'Linda', 81275376518),
(143, 48, 'Yufi', 82214605857),
(144, 48, 'Wawan', 85366764251),
(145, 49, 'Linda', 81275376518),
(146, 49, 'Yufi', 82214605857),
(147, 49, 'Wawan', 85366764251),
(148, 50, 'Linda', 81275376518),
(149, 50, 'Yufi', 82214605857),
(150, 50, 'Wawan', 85366764251),
(151, 51, 'Linda', 81275376518),
(152, 51, 'Yufi', 82214605857),
(153, 51, 'Wawan', 85366764251),
(154, 52, 'Linda', 81275376518),
(155, 52, 'Yufi', 82214605857),
(156, 52, 'Wawan', 85366764251),
(157, 53, 'Linda', 81275376518),
(158, 53, 'Yufi', 82214605857),
(159, 53, 'Wawan', 85366764251),
(160, 54, 'Linda', 81275376518),
(161, 54, 'Yufi', 82214605857),
(162, 54, 'Wawan', 85366764251),
(163, 55, 'Linda', 81275376518),
(164, 55, 'Yufi', 82214605857),
(165, 55, 'Wawan', 85366764251),
(166, 56, 'Linda', 81275376518),
(167, 56, 'Yufi', 82214605857),
(168, 56, 'Wawan', 85366764251),
(169, 57, 'Linda', 81275376518),
(170, 57, 'Yufi', 82214605857),
(171, 57, 'Wawan', 85366764251),
(172, 58, 'Linda', 81275376518),
(173, 58, 'Yufi', 82214605857),
(174, 58, 'Wawan', 85366764251),
(175, 59, 'Linda', 81275376518),
(176, 59, 'Yufi', 82214605857),
(177, 59, 'Wawan', 85366764251),
(178, 60, 'Linda', 81275376518),
(179, 60, 'Yufi', 82214605857),
(180, 60, 'Wawan', 85366764251),
(181, 61, 'Linda', 81275376518),
(182, 61, 'Yufi', 82214605857),
(183, 61, 'Wawan', 85366764251),
(184, 62, 'Linda', 81275376518),
(185, 62, 'Yufi', 82214605857),
(186, 62, 'Wawan', 85366764251),
(187, 63, 'Linda', 81275376518),
(188, 63, 'Yufi', 82214605857),
(189, 63, 'Wawan', 85366764251),
(190, 64, 'Linda', 81275376518),
(191, 64, 'Yufi', 82214605857),
(192, 64, 'Wawan', 85366764251),
(193, 65, 'Linda', 81275376518),
(194, 65, 'Yufi', 82214605857),
(195, 65, 'Wawan', 85366764251),
(196, 66, 'Linda', 81275376518),
(197, 66, 'Yufi', 82214605857),
(198, 66, 'Wawan', 85366764251),
(199, 67, 'Linda', 81275376518),
(200, 67, 'Yufi', 82214605857),
(201, 67, 'Wawan', 85366764251),
(202, 68, 'Linda', 81275376518),
(203, 68, 'Yufi', 82214605857),
(204, 68, 'Wawan', 85366764251),
(205, 69, 'Linda', 81275376518),
(206, 69, 'Yufi', 82214605857),
(207, 69, 'Wawan', 85366764251),
(208, 70, 'Linda', 81275376518),
(209, 70, 'Yufi', 82214605857),
(210, 70, 'Wawan', 85366764251),
(211, 71, 'Linda', 81275376518),
(212, 71, 'Yufi', 82214605857),
(213, 71, 'Wawan', 85366764251),
(214, 72, 'Linda', 81275376518),
(215, 72, 'Yufi', 82214605857),
(216, 72, 'Wawan', 85366764251);

-- --------------------------------------------------------

--
-- Table structure for table `daftar_users`
--

CREATE TABLE `daftar_users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `lelang_schedules`
--

CREATE TABLE `lelang_schedules` (
  `id` bigint UNSIGNED NOT NULL,
  `property_id` bigint UNSIGNED NOT NULL,
  `tanggal` date DEFAULT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `limit_lelang` bigint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lelang_schedules`
--

INSERT INTO `lelang_schedules` (`id`, `property_id`, `tanggal`, `lokasi`, `limit_lelang`) VALUES
(1, 1, '2025-02-21', 'KPKNL JAMBI', 117800000),
(2, 2, '2025-01-22', 'KPKNL JAMBI', 188520000),
(3, 3, '2025-02-06', 'KPKNL JAMBI', 202720000),
(4, 4, '2025-02-17', 'KPKNL JAMBI', 88400000),
(5, 5, '2025-01-16', 'KPKNL JAMBI', 396800000),
(6, 6, '2025-01-16', 'KPKNL JAMBI', 202200000),
(7, 7, '2025-01-07', 'KPKNL JAMBI', 355700000),
(8, 8, '2025-01-16', 'KPKNL JAMBI', 188700000),
(9, 9, '2025-06-03', 'KPKNL JAMBI', 524000000),
(10, 10, '2025-06-03', 'KPKNL JAMBI', 358300000),
(11, 11, '2025-02-21', 'KPKNL JAMBI', 193300000),
(12, 12, '2025-01-24', 'KPKNL JAMBI', 328100000),
(13, 13, '2025-01-24', 'KPKNL JAMBI', 81950000),
(14, 14, '2025-01-24', 'KPKNL JAMBI', 367780000),
(15, 15, '2025-01-24', 'KPKNL JAMBI', 110200000),
(16, 16, '2025-01-17', 'KPKNL JAMBI', 246900000),
(17, 17, '2025-01-16', 'KPKNL JAMBI', 357900000),
(18, 18, '2025-01-17', 'KPKNL JAMBI', 409300000),
(19, 19, '2025-01-17', 'KPKNL JAMBI', 1232400000),
(20, 20, '2025-01-17', 'KPKNL JAMBI', 453900000),
(21, 21, '2025-02-17', 'KPKNL JAMBI', 123100000),
(22, 22, '2025-02-17', 'KPKNL JAMBI', 187200000),
(23, 23, '2025-01-16', 'KPKNL JAMBI', 217330000),
(24, 24, '2025-02-17', 'KPKNL JAMBI', 449600000),
(25, 25, '2025-01-22', 'KPKNL JAMBI', 284140000),
(26, 26, '2025-01-16', 'KPKNL JAMBI', 60200000),
(27, 27, '2025-01-22', 'KPKNL JAMBI', 250200000),
(28, 28, '2025-01-22', 'KPKNL JAMBI', 648300000),
(29, 29, '2025-06-26', 'KPKNL JAMBI', 334310000),
(30, 30, '2025-02-21', 'KPKNL JAMBI', 231000000),
(31, 31, '2025-03-13', 'KPKNL JAMBI', 1229960000),
(32, 32, '2025-06-25', 'KPKNL JAMBI', 206930000),
(33, 33, '2025-06-25', 'KPKNL JAMBI', 140400000),
(34, 34, '2025-03-21', 'KPKNL JAMBI', 370900000),
(35, 35, NULL, 'KPKNL JAMBI', 165640000),
(36, 36, '2025-03-19', 'KPKNL JAMBI', 350000000),
(37, 37, '2025-03-21', 'KPKNL JAMBI', 158400000),
(38, 38, NULL, 'KPKNL JAMBI', 38350000),
(39, 39, NULL, 'KPKNL JAMBI', 94400000),
(40, 40, NULL, 'KPKNL JAMBI', 176100000),
(41, 41, NULL, 'KPKNL JAMBI', 165300000),
(42, 42, '2025-03-21', 'KPKNL JAMBI', 147130000),
(43, 43, '2025-05-28', 'KPKNL JAMBI', 214000000),
(44, 44, '2025-07-23', 'KPKNL JAMBI', 610300000),
(45, 45, '2025-07-23', 'KPKNL JAMBI', 762800000),
(46, 46, '2025-05-21', 'KPKNL JAMBI', 567500000),
(47, 47, '2025-05-21', 'KPKNL JAMBI', 508500000),
(48, 48, '2025-05-27', 'KPKNL JAMBI', 163320000),
(49, 49, '2025-05-20', 'KPKNL JAMBI', 573450000),
(50, 50, '2025-05-20', 'KPKNL JAMBI', 695700000),
(51, 51, '2025-05-20', 'KPKNL JAMBI', 215100000),
(52, 52, '2025-06-03', 'KPKNL JAMBI', 804000000),
(53, 53, '2025-06-18', 'KPKNL JAMBI', 334600000),
(54, 54, '2025-06-18', 'KPKNL JAMBI', 111700000),
(55, 55, '2025-06-18', 'KPKNL JAMBI', 89920000),
(56, 56, '2025-06-18', 'KPKNL JAMBI', 161730000),
(57, 57, '2025-06-25', 'KPKNL JAMBI', 169010000),
(58, 58, '2025-06-25', 'KPKNL JAMBI', 197700000),
(59, 59, '2025-06-25', 'KPKNL JAMBI', 356210000),
(60, 60, '2025-06-25', 'KPKNL JAMBI', 183400000),
(61, 61, '2025-06-26', 'KPKNL JAMBI', 150000000),
(62, 62, '2025-07-10', 'KPKNL JAMBI', 170100000),
(63, 63, '2025-07-10', 'KPKNL JAMBI', 323500000),
(64, 64, '2025-07-10', 'KPKNL JAMBI', 226800000),
(65, 65, '2025-07-10', 'KPKNL JAMBI', 246000000),
(66, 66, '2025-06-26', 'KPKNL JAMBI', 449000000),
(67, 67, '2025-07-23', 'KPKNL JAMBI', 449340000),
(68, 68, NULL, 'KPKNL JAMBI', 119130000),
(69, 69, NULL, 'KPKNL JAMBI', 533800000),
(70, 70, NULL, 'KPKNL JAMBI', 160120000),
(71, 71, NULL, 'KPKNL JAMBI', 231800000),
(72, 72, NULL, 'KPKNL JAMBI', 97560000);

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
(4, '2025_07_02_070636_create_properties_table', 1),
(5, '2025_07_02_070645_create_property_images_table', 1),
(6, '2025_07_02_070704_create_lelang_schedules_table', 1),
(7, '2025_07_02_070711_create_point_of_interests_table', 1),
(8, '2025_07_02_070716_create_contact_people_table', 1),
(9, '2025_07_02_072639_add_role_to_users_table', 1),
(10, '2025_07_14_054459_create_daftar_users_table', 1);

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
-- Table structure for table `points_of_interest`
--

CREATE TABLE `points_of_interest` (
  `id` bigint UNSIGNED NOT NULL,
  `property_id` bigint UNSIGNED NOT NULL,
  `poin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` bigint UNSIGNED NOT NULL,
  `kode_aset` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `luas_tanah` int DEFAULT NULL,
  `luas_bangunan` int DEFAULT NULL,
  `kamar_tidur` int DEFAULT NULL,
  `kamar_mandi` int DEFAULT NULL,
  `listrik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `air` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kondisi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategori_lot` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `kode_aset`, `alamat`, `luas_tanah`, `luas_bangunan`, `kamar_tidur`, `kamar_mandi`, `listrik`, `air`, `kondisi`, `kategori_lot`) VALUES
(1, 'RCG/11/III/004', 'JlSari Bakti No00 RT00 Kelurahan Bagan Pete Kecamatan Alam Barajo Kota Jambi', 429, 69, 3, NULL, NULL, NULL, 'L/K/TP/BR', 'Rumah Tinggal'),
(2, 'RCG/11/III/006', 'Perumahan Aura IV Blok B 11 Rt07 Kelurahan Sungai Putri Kecamatan Telanaipura Kota Jambi Provinsi Jambi', 112, 75, 2, 1, '1300 VA', NULL, 'L/AP/SH/TK', 'Rumah Tinggal'),
(3, 'RCG/11/III/010', 'JlKasang Pudak LrgSurya Perumahan Singgasana Blok A No35 Rt34 Kelurahan Kasang Pudak Kecamatan Kumpeh Ulu Muaro Jambi', 90, 60, 2, 1, '1300 VA', NULL, 'L/K/SH/TP', 'Rumah Tinggal'),
(4, 'RCG/11/III/011', 'JlSunan Gunung Jati Rt25 Kelurahan Kenali Asam Bawah Kecamatan Kota Baru Kota Jambi Provinsi Jambi', 141, 57, NULL, NULL, NULL, NULL, 'L/K/TP/BR', 'Rumah Tinggal'),
(5, 'RCG/11/III/019', 'JlKi Maja LrgKimaja 6 No96 Rt21 Kelurahan Simpang III Sipin Kecamatan Kota Baru Kota Jambi', 125, 119, 3, 2, '1200 VA', NULL, 'L/AP/SH/TK', 'Rumah Tinggal'),
(6, 'RCG/11/III/020', 'Perumahan Indoguna Asri Blok F7 Kelurahan Mendalo Darat kecamatan Jambi Luar Kota Muaro Jambi', 126, 76, 2, 1, '1300 VA', 'PDAM', 'L/SH/TK/TP', 'Rumah Tinggal'),
(7, 'RCG/11/III/022', 'JlRaden Fatah Kelurahan Kasang Kecamatan Jambi Timur Kota Jambi Provinsi Jambi', 2820, 0, NULL, NULL, NULL, NULL, 'L/K/TK/TP', 'Tanah Kosong'),
(8, 'RCG/11/III/023', 'JlKembang Paseban Rt12 Desa Kembang Paseban Kecamatan Mersam Kabupaten Batang Hari Jambi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Rumah Tinggal'),
(9, 'RCG/11/III/096', 'Jalan Lingkar Selatan 1 Kelurahan Lingkar Selatan , Kecamatan Paal Merah Kota Jambi Provinsi Jambi – 36126', 1456, 317, 2, 1, '1300 VA', 'PDAM', 'L/TK/TP/BR', 'Rumah Tinggal'),
(10, 'RCG/11/III/099', 'Perum Laksana Permai Blok A 15 & 16 Kelurahan Kebon IX , Kecamatan Sungai Gelam Kabupaten Muaro Jambi Provinsi Jambi – 36128', 288, 106, 3, 1, '1300 VA', 'PDAM', 'L/SH/TK/TP', 'Rumah Tinggal'),
(11, 'RCG/11/III/119', 'Jl. TPSriwijaya Rt15 Perumahan Melati No106 Kelurahan Rawasari Kecamatan Alam Barajo Kota Jambi', 137, 127, 3, 2, '1200 VA', 'PDAM', 'L/K/TP/BR', 'Rumah Tinggal'),
(12, 'RCG/11/III/120', 'Perumahan Atlanta Regency Blok A No. 10 RT 38 Kelurahan Bagan Pete Kecamatan Alam Barajo Kota Jambi Provisni Jambi', 91, 120, 4, 2, '2200 VA', NULL, 'L/AP/SH/TK', 'Rumah Tinggal'),
(13, 'RCG/11/III/121', 'Lrg Maju Jaya RT 26 Desa Tangkit Kecamatan Sungai Gelam Muaro Jambi Provinsi Jambi', 610, 83, 3, 2, '1300 VA', NULL, 'L/TK/TP/BR', 'Rumah Tinggal'),
(14, 'RCG/11/III/122', 'Jl. Sunan Giri Lrg Angkasa No. 105 RT 44 Kelurahan Simpang III Sipin Kecamatan Kota Baru Kota Jambi Provinsi Jambi', 200, 90, 3, 2, '2200 VA', 'PDAM', 'L/K/SH/TP', 'Rumah Tinggal'),
(15, 'RCG/11/III/123', 'Jl. Ir. H. Juanda Lrg Banyumas RT. 028 Kel. Simpang Tiga Sipin Kecamatan Kota Baru Kota Jambi Provinsi Jambi', 117, 58, 2, 1, NULL, NULL, 'L/K/TP/BR', 'Rumah Tinggal'),
(16, 'RCG/11/III/136', 'JlSersan Anwar Bay LrgPasundan Kelurahan Bagan Pete Kecamatan Alam Barajo Kota Jambi', 1341, NULL, NULL, NULL, NULL, NULL, 'L/K/TK/TP', 'Tanah Kosong'),
(17, 'RCG/11/III/140', 'Jl. Sunan Bonang No98 Rt18 Rw05 Kelurahan Simpang III Sipin Kecamatan Kota Baru Kota Jambi', 656, 220, 4, 2, '1200 VA', 'PDAM', 'L/SH/TK/TP', 'Rumah Tinggal'),
(18, 'RCG/11/III/144', 'Perumahan Tanjung Permata Blok B No. 18 RT. 24', 144, 222, 4, 1, '1200 VA', NULL, 'L/AP/SH/TK', 'Rumah Tinggal'),
(19, 'RCG/11/III/145', 'Kelurahan Sarolangun Kembang Kecamatan Sarolangun Kabupaten Sarolangun Provinsi Jambi', 272, 444, 2, 2, '2200 VA', 'PDAM', 'L/AP/SH/TK', 'Ruko'),
(20, 'RCG/11/III/147', 'Perumahan Sun Flower No. A.03A.04 Jl. Pahlawan 2', 176, 120, 4, 2, '1300 VA', 'PDAM', 'L/SH/TK/TP', 'Rumah Tinggal'),
(21, 'RCG/11/III/148', 'Perumahan Lotus Residence Rt69 Kelurahan Kenali Besar Kecamatan Alam Barajo Kota Jambi', 268, NULL, NULL, NULL, NULL, NULL, 'L/K/TK/TP', 'Tanah Kosong'),
(22, 'RCG/11/III/159', 'Perumahan Villa Sentosa Indah Blok 9 No. 07 RT. 056', 120, 87, 2, 1, '1300 VA', NULL, 'L/SH/TK/TP', 'Rumah Tinggal'),
(23, 'RCG/11/III/160', 'Jaya Setia Desa/Kelurahan Jaya Setia', 344, 140, 3, 1, '1200 VA', 'Sumur Bor & PAM', 'L/SH/TK/TP', 'Rumah Tinggal'),
(24, 'RCG/11/III/163', 'Perumahan Grand Kenali Blok D No. 08 Kelurahan Mayang Mangurai Kecamatan Alam Barajo', 1456, 317, 2, 1, '1300 VA', 'PDAM', 'L/AP/SH/TK', 'Rumah Tinggal'),
(25, 'RCG/11/III/164', 'JL. RB. Siagian Lrg Rahayu Kelurahan Pasir Putih', 360, 130, 3, 1, '1300 VA', NULL, 'L/AP/SH/TK', 'Rumah Tinggal'),
(26, 'RCG/11/III/166', 'Jl. Raya Kasang Pudak Lrg Wigo RT. 08 Desa Kasang Pudak Kota Karang', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Tanah Kosong'),
(27, 'RCG/11/III/169', 'Perumahan Mutiara Hijau RT. 12 Jl. Hutan Kota', 200, 173, 3, 2, '1300 VA', NULL, 'L/SH/TK/TP', 'Rumah Tinggal'),
(28, 'RCG/11/III/170', 'Jl. Sulawesi No. 32 RT. 15 RW. 03', 306, 287, 4, 1, '1300 VA', 'PDAM', 'L/SH/TK/TP', 'Rumah Tinggal'),
(29, 'RCG/11/III/181', 'Lrg. Maju Jaya RT. 26 Desa Tangkit Kecamatan Sungai Gelam Muaro Jambi Provinsi Jambi', 958, 163, 3, 2, '1300 VA', NULL, 'L/SH/TK/TP', 'Rumah Tinggal'),
(30, 'RCG/11/III/182', 'Perumahan Kebun Mas Blok B No. 07 RT. 06 Kelurahan Mayang Mangurai Kecamatan Alam Barajo Kota Jambi Provinsi Jambi', 141, 96, 3, 1, '1300 VA', 'PAM', 'L/TP/BR', 'Rumah Tinggal'),
(31, 'RCG/11/III/201', 'Jl. Lirik Kel. Kenali Asam Atas Kec. Kota Baru Kota Jambi Provinsi Jambi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Rumah Tinggal'),
(32, 'RCG/11/III/202', 'Jl. Panglima Ujung TR. 03', 219, 146, 2, 1, '900 VA', 'PDAM', 'L/K/SH/TP', 'Rumah Tinggal'),
(33, 'RCG/11/III/203', 'Perumahan Permata Hijau Blok C RT. 12', 320, 79, 2, 1, NULL, NULL, 'L/TK/TP/BR', 'Rumah Tinggal'),
(34, 'RCG/11/III/204', 'Desa Talang Babat', 996, 184, 3, 1, '1300 VA', NULL, 'L/K/SH/TP', 'Rumah Tinggal'),
(35, 'RCG/11/III/205', 'Perumahan Pesona Berlian Asri No. 07 RT. 20 Lrg Darusallam II ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Rumah Tinggal'),
(36, 'RCG/11/III/207', 'Kihajar Dewantara RT 19 / Parit 2 Ujung', 352, 140, NULL, NULL, NULL, NULL, 'L/K/TP/BR', 'Ruko'),
(37, 'RCG/11/III/209', 'Jl. Ki Hajar Dewantara RT 19', 352, NULL, NULL, NULL, NULL, NULL, 'L/K/TK/TP', 'Tanah Kosong'),
(38, 'RCG/11/III/210', 'Wirotho Agung', 349, 87, NULL, NULL, NULL, 'Sumur', 'L/K/TP/BR', 'Gudang'),
(39, 'RCG/11/III/213', 'Manggis', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Rumah Tinggal'),
(40, 'RCG/11/III/214', 'Sungai Pinang ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Rumah Tinggal'),
(41, 'RCG/11/III/215', 'Tanjung Raden ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Tanah Kebun '),
(42, 'RCG/11/III/216', 'Jl. Lingkar Selatan Lrg. Hidayat RT. 032 Kelurahan Paal Merah Kecamatan Jambi Selatan Kota Jambi Provinsi Jambi', 121, 45, 3, 1, '1300 VA', NULL, 'L/SH/TK/TP', 'Rumah Tinggal'),
(43, 'RCG/11/III/220', 'Perumahan Aston Villa Blok O No. 14 RT. 13, Desa Mendalo Darat, Kecamatan Jambi Luar Kota, Kabupaten Muaro Jambi, Provinsi Jambi,', 293, 70, 2, 1, '1300 VA', 'PDAM', 'L/SH/TK/TP', 'Rumah Tinggal'),
(44, 'RCG/11/III/221', 'PERUMAHAN PERMATA CITRA 4 BLOK A NO. 02 RT.18 Kelurahan Buluran Kenali Kecamatan Telanaipura Jambi Provinsi Jambi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Rumah Tinggal'),
(45, 'RCG/11/III/222', 'PERUMAHAN KENCANA INDAH BLOK D NO.03 RT.13 LRG.ISHLAH Kelurahan Kenali Besar Kecamatan Alam Barajo Jambi Provinsi Jambi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Rumah Tinggal'),
(46, 'RCG/11/III/224', 'Desa Mendalo (sebelah Perumahan Mendalo Berkah) Desa Mendalo Darat Kecamatan Jambi Luar Kota Muaro Jambi Provinsi Jambi', 2500, NULL, NULL, NULL, NULL, NULL, 'L/K/TK/TP', 'Tanah Kosong'),
(47, 'RCG/11/III/225', 'Lorong Perikanan Rt.20 Desa Mendalo Darat Kecamatan Jambi Luar Kota Muaro Jambi Provinsi Jambi', 2040, 77, 1, 1, '1300 VA', 'PAM', 'L/AP/SH/TP', 'Rumah Tinggal'),
(48, 'RCG/11/III/228', 'JL. ANANTAKUPA LRG. ANNGGUR NO.40 RT.43 Kelurahan Mayang Mangurai Kecamatan Alam Barajo Jambi Provinsi Jambi', 284, 83, 3, 1, '1300 VA', NULL, 'L/SH/TK/TP', 'Rumah Tinggal'),
(49, 'RCG/11/III/229', 'JL. BRIGJEN KATAMSO LRG. SUNDA PUTRA RT.01 Kelurahan Kasang Jaya Kecamatan Jambi Timur Jambi Provinsi Jambi', 339, 286, 3, 2, '1300 VA', 'PDAM', 'L/SH/TK/TP', 'Rumah Tinggal'),
(50, 'RCG/11/III/230', 'JL. BERSAMA Kelurahan Kenali Besar Kecamatan Alam Barajo Jambi Provinsi Jambi', 527, 278, 5, 3, '2200 VA', 'PDAM', 'L/TK/TP/BR', 'Rumah Tinggal'),
(51, 'RCG/11/III/232', 'PERUMAHAN NUSA GRAND ABADI BLOK D NO. 18 Kelurahan Simpang Rimbo Kecamatan Alam Barajo Jambi Provinsi Jambi', 97, 68, 2, 1, '1300 VA', 'PDAM', 'L/SH/TK/TP', 'Rumah Tinggal'),
(52, 'RCG/11/III/236', 'Komplek Toko Mendalo Mas,Desa Mendalo Darat, Kecamatan Jambi Luar Kota,Kabupaten Muaro Jambi, Provinsi Jambi 36657', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Tanah Kosong'),
(53, 'RCG/11/III/237', 'LORONG PURNAWIRA NO.02 RT.021 Kelurahan Sungai Putri Kecamatan Danau Sipin Jambi Provinsi Jambi', 396, 165, 4, 3, '1300 VA', 'PDAM', 'L/SH/TK/TP', 'Rumah Tinggal'),
(54, 'RCG/11/III/238', 'PERUMAHAN MUSTOPA RT.02 JL. KEBUN KULIM Desa Tangkit Kecamatan Sungai Gelam Muaro Jambi Provinsi Jambi', 130, 52, 2, 1, '1300 VA', NULL, 'L/TK/TP/BR', 'Rumah Tinggal'),
(55, 'RCG/11/III/239', 'PERUMAHAN HASANAH RESIDENCE JL. LIRIK II RT.15 Kelurahan Kenali Asam Bawah Kecamatan Kota Baru Jambi Provinsi Jambi', 198, 78, NULL, NULL, NULL, NULL, 'L/K/TP/BR', 'Rumah Tinggal'),
(56, 'RCG/11/III/240', 'PERUMAHAN MUSTIKA BLOK B NO.07 RT.23 Kelurahan Paal Merah Kecamatan Paal Merah Jambi Provinsi Jambi', 105, 76, 2, 1, '1300 VA', NULL, 'L/K/SH/TP', 'Rumah Tinggal'),
(57, 'RCG/11/III/242', 'Perumahan Barcelona Blok E. 5 Desa Mayang Mangurai Kecamatan Kota Baru Jambi Provinsi Jambi', 120, 45, 2, 1, '2200 VA', NULL, 'L/SH/TK/TP', 'Rumah Tinggal'),
(58, 'RCG/11/III/243', 'Lorong Mulyo 1 No. 240241 RT 27 Kelurahan Talang Bakung Kecamatan Jambi Selatan Jambi Provinsi Jambi', 192, 60, NULL, NULL, '1300 VA', NULL, 'L/SH/TK/TP', 'Rumah Tinggal'),
(59, 'RCG/11/III/244', 'JL SARI BAKTI LRG PURI CANTIK RT.37 Kelurahan Simpang Rimbo Kecamatan Alam Barajo Jambi Provinsi Jambi', 176, 114, 3, 1, '1300 VA', 'PDAM', 'L/SH/TK/TP', 'Rumah Tinggal'),
(60, 'RCG/11/III/245', 'PERUMAHAN BOTANI RESIDENCE 2 NO.10 RT.18 LRG SIRSAK Kelurahan Kenali Asam Atas Kecamatan Kota Baru Jambi Provinsi Jambi', 101, 67, 2, 1, '1300 VA', NULL, 'L/AP/SH/TK', 'Rumah Tinggal'),
(61, 'RCG/11/III/248', 'Perumahan Tanjung Permata Blok GG No. 01, Kelurahan Eka Jaya, Kecamatan Paal Merah, Kota Jambi, Provinsi Jambi', 124, 0, 3, 1, '1300 VA', 'PDAM', 'L/SH/TK/TP', 'Rumah Tinggal'),
(62, 'RCG/11/III/249', 'Sungai Ulak Desa/Kelurahan Sungai Ulak Kecamatan Nalo Tantan Merangin Provinsi Jambi', 95, 0, 2, 1, '1300 VA', 'PDAM', 'L/SH/TK/TP', 'Rumah Tinggal'),
(63, 'RCG/11/III/250', 'PERUMAHAN GREEN CENDANA BLOK A NO.3 RT.47 LRG SD 224 Kelurahan Lingkar Selatan Kecamatan Jambi Selatan Jambi Provinsi Jambi', 106, 114, 3, 2, '1300 VA', 'PAM', 'L/SH/TK/TP', 'Rumah Tinggal'),
(64, 'RCG/11/III/251', 'PERUMAHAN ASRI HARAHAP 2 RT.54 NO.20 Kelurahan Lingkar Selatan Kecamatan Jambi Selatan Jambi Provinsi Jambi', 110, 67, 3, 1, '1300 VA', 'PAM', 'L/SH/TK/TP', 'Rumah Tinggal'),
(65, 'RCG/11/III/253', 'PERUMAHAN INDAH PERSADA RT.35 JL. PINTU BESI Kelurahan Paal Lima Kecamatan Kota Baru Jambi Provinsi Jambi', 140, 48, 2, 1, '1300 VA', 'PDAM', 'L/K/TP/BR', 'Rumah Tinggal'),
(66, 'RCG/11/III/258', 'Perumahan Aura Bimantara Blok D No.03, Kelurahan Sungai Putri, Kecamatan Danau Sipin, Kota Jambi,Provinsi Jambi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Rumah Tinggal'),
(67, 'RCG/11/III/260', 'PERUMAHAN PURI XENA TANJUNG NANGKO BLOK A2 RT.17 Desa Kasang Pudak Kecamatan Kumpeh Ulu Muaro Jambi Provinsi Jambi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Rumah Tinggal'),
(68, 'RCG/11/III/262', 'Sungai Ulak Desa/Kelurahan Sungai Ulak Kecamatan Nalo Tantan Merangin Provinsi Jambi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Rumah Tinggal'),
(69, 'RCG/11/III/264', 'JL. LETKOL SAMAN IDRIS LRG. PERUM GURU 2 NO.31 RT.03 Kelurahan Sungai Putri Kecamatan Danau Sipin Jambi Provinsi Jambi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Rumah Tinggal'),
(70, 'RCG/11/III/265', 'Dusun Bangko Desa/Kelurahan Dusun Bangko Kecamatan Bangko Merangin Provinsi Jambi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Rumah Tinggal'),
(71, 'RCG/11/III/266', 'JL LINTAS TALANG BELIDO Lrg DUREN RT.10 Desa mekar jaya Kecamatan Sungai Gelam Muaro Jambi\nProvinsi Jambi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Rumah Tinggal'),
(72, 'RCG/11/III/267', 'PERUMAHAN GRIYA INEZ 1 NO. 34 RT.03 Kelurahan Kenali Asam Bawah Kecamatan Kota Baru Jambi Provinsi Jambi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Rumah Tinggal');

-- --------------------------------------------------------

--
-- Table structure for table `property_media`
--

CREATE TABLE `property_media` (
  `id` bigint UNSIGNED NOT NULL,
  `property_id` bigint UNSIGNED NOT NULL,
  `media_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `media_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'image',
  `duration` int DEFAULT NULL,
  `format` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resolution` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_main` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_media`
--

INSERT INTO `property_media` (`id`, `property_id`, `media_url`, `media_type`, `duration`, `format`, `resolution`, `is_main`, `created_at`, `updated_at`) VALUES
(1, 1, 'https://res.cloudinary.com/dkcgr4sel/image/upload/v1754027252/properti/gv6impxw2kqsjjghiohm.png', 'image', NULL, 'png', NULL, 1, '2025-07-17 21:12:31', '2025-07-31 22:47:33'),
(2, 2, 'https://res.cloudinary.com/dkcgr4sel/image/upload/v1754027257/properti/iu7oe5g68yagfe8bkx0p.png', 'image', NULL, 'png', NULL, 1, '2025-07-17 21:13:01', '2025-07-31 22:47:38'),
(3, 3, 'https://res.cloudinary.com/dkcgr4sel/image/upload/v1754027261/properti/ikxfmt2drtcgbwwkwhgr.png', 'image', NULL, 'png', NULL, 1, '2025-07-17 21:13:22', '2025-07-31 22:47:42'),
(4, 4, 'https://res.cloudinary.com/dkcgr4sel/image/upload/v1754027265/properti/mfckajashudszh9jnc80.png', 'image', NULL, 'png', NULL, 1, '2025-07-17 21:13:40', '2025-07-31 22:47:46'),
(5, 5, 'https://res.cloudinary.com/dkcgr4sel/image/upload/v1754027268/properti/ig49rcfwl3fpvbtismjw.png', 'image', NULL, 'png', NULL, 1, '2025-07-17 21:14:00', '2025-07-31 22:47:49'),
(6, 6, 'https://res.cloudinary.com/dkcgr4sel/image/upload/v1754027272/properti/pjmyxsrsefpdkljxeost.png', 'image', NULL, 'png', NULL, 1, '2025-07-17 21:14:22', '2025-07-31 22:47:52'),
(7, 7, 'https://res.cloudinary.com/dkcgr4sel/image/upload/v1754027275/properti/slzy7hov9bnpsnihkoa2.png', 'image', NULL, 'png', NULL, 1, '2025-07-17 21:14:46', '2025-07-31 22:47:56'),
(8, 9, 'https://res.cloudinary.com/dkcgr4sel/image/upload/v1754027280/properti/qcdr7zsjjgghb7qgv6up.png', 'image', NULL, 'png', NULL, 1, '2025-07-17 21:15:21', '2025-07-31 22:48:01'),
(9, 10, 'https://res.cloudinary.com/dkcgr4sel/image/upload/v1754027284/properti/r6umlpgobfuo09l9h0k6.png', 'image', NULL, 'png', NULL, 1, '2025-07-17 21:15:39', '2025-07-31 22:48:06'),
(10, 11, 'https://res.cloudinary.com/dkcgr4sel/image/upload/v1754027288/properti/r2hio6zh2ay45efdde70.png', 'image', NULL, 'png', NULL, 1, '2025-07-17 21:16:09', '2025-07-31 22:48:09'),
(11, 12, 'https://res.cloudinary.com/dkcgr4sel/image/upload/v1754027291/properti/glnvnhkyqkiccbhl7rfb.png', 'image', NULL, 'png', NULL, 1, '2025-07-17 21:16:28', '2025-07-31 22:48:12'),
(12, 13, 'https://res.cloudinary.com/dkcgr4sel/image/upload/v1754027295/properti/qkxvlhzt6bnkdzf39sb3.png', 'image', NULL, 'png', NULL, 1, '2025-07-17 21:16:48', '2025-07-31 22:48:16'),
(13, 14, 'https://res.cloudinary.com/dkcgr4sel/image/upload/v1754027298/properti/o89wxyfaxnx6vjkgurdi.png', 'image', NULL, 'png', NULL, 1, '2025-07-17 21:17:08', '2025-07-31 22:48:19'),
(14, 15, 'https://res.cloudinary.com/dkcgr4sel/image/upload/v1754027301/properti/y0qq4ecfunx7irskumu6.png', 'image', NULL, 'png', NULL, 1, '2025-07-17 21:17:24', '2025-07-31 22:48:22'),
(15, 16, 'https://res.cloudinary.com/dkcgr4sel/image/upload/v1754027305/properti/gzg3ass4gwgetyf1lkw5.png', 'image', NULL, 'png', NULL, 1, '2025-07-17 21:17:45', '2025-07-31 22:48:25'),
(16, 17, 'https://res.cloudinary.com/dkcgr4sel/image/upload/v1754027308/properti/csh2f06tvlofkiqv1zf6.png', 'image', NULL, 'png', NULL, 1, '2025-07-17 21:18:30', '2025-07-31 22:48:29'),
(17, 18, 'https://res.cloudinary.com/dkcgr4sel/image/upload/v1754027311/properti/ssiw6bfylusdj4ecws0s.png', 'image', NULL, 'png', NULL, 1, '2025-07-17 21:18:56', '2025-07-31 22:48:32'),
(18, 19, 'https://res.cloudinary.com/dkcgr4sel/image/upload/v1754027314/properti/wzxgvwqdvat8lo8ssmil.png', 'image', NULL, 'png', NULL, 1, '2025-07-17 21:19:25', '2025-07-31 22:48:35'),
(19, 20, 'https://res.cloudinary.com/dkcgr4sel/image/upload/v1754027317/properti/yeq7ww63pgo9p0jiqu5m.png', 'image', NULL, 'png', NULL, 1, '2025-07-17 21:19:45', '2025-07-31 22:48:38'),
(20, 21, 'https://res.cloudinary.com/dkcgr4sel/image/upload/v1754027321/properti/djkcv2iqkzotcyxqkbax.png', 'image', NULL, 'png', NULL, 1, '2025-07-17 21:20:08', '2025-07-31 22:48:42'),
(21, 22, 'https://res.cloudinary.com/dkcgr4sel/image/upload/v1754027324/properti/kh0cjs580evmrmcd4y3k.png', 'image', NULL, 'png', NULL, 1, '2025-07-17 21:20:27', '2025-07-31 22:48:45'),
(22, 23, 'https://res.cloudinary.com/dkcgr4sel/image/upload/v1754027327/properti/hhmbmjoeev7oykfgxmlt.png', 'image', NULL, 'png', NULL, 0, '2025-07-17 21:20:57', '2025-07-31 22:48:48'),
(23, 23, 'https://res.cloudinary.com/dkcgr4sel/image/upload/v1754027330/properti/hyey0eff3spf7saqnzr7.png', 'image', NULL, 'png', NULL, 0, '2025-07-17 21:20:57', '2025-07-31 22:48:51'),
(24, 24, 'https://res.cloudinary.com/dkcgr4sel/image/upload/v1754027333/properti/lzjebbxwic0fteyeb3ad.png', 'image', NULL, 'png', NULL, 1, '2025-07-17 21:22:08', '2025-07-31 22:48:54'),
(25, 25, 'https://res.cloudinary.com/dkcgr4sel/image/upload/v1754027336/properti/wnrqtnhe5ukk4zochma7.png', 'image', NULL, 'png', NULL, 1, '2025-07-17 21:22:24', '2025-07-31 22:48:57'),
(26, 27, 'https://res.cloudinary.com/dkcgr4sel/image/upload/v1754027340/properti/b1k8xooj3kzll97lampm.png', 'image', NULL, 'png', NULL, 1, '2025-07-17 21:23:21', '2025-07-31 22:49:01'),
(27, 28, 'https://res.cloudinary.com/dkcgr4sel/image/upload/v1754027343/properti/mppmmuflwn7p6y6ebqf0.png', 'image', NULL, 'png', NULL, 1, '2025-07-17 21:23:48', '2025-07-31 22:49:04'),
(28, 29, 'https://res.cloudinary.com/dkcgr4sel/image/upload/v1754027346/properti/mz30flrpe0ips7n7tkx1.png', 'image', NULL, 'png', NULL, 1, '2025-07-18 00:41:55', '2025-07-31 22:49:07'),
(29, 30, 'https://res.cloudinary.com/dkcgr4sel/image/upload/v1754027349/properti/ui8edtmxt3ky7ihoaxzl.png', 'image', NULL, 'png', NULL, 1, '2025-07-18 00:42:22', '2025-07-31 22:49:10'),
(30, 32, 'https://res.cloudinary.com/dkcgr4sel/image/upload/v1754027353/properti/byhiaxhcr0xy9gjdndlr.png', 'image', NULL, 'png', NULL, 1, '2025-07-20 19:56:42', '2025-07-31 22:49:14'),
(31, 33, 'https://res.cloudinary.com/dkcgr4sel/image/upload/v1754027357/properti/d9aadzjpquia7yayqxu1.png', 'image', NULL, 'png', NULL, 1, '2025-07-20 19:57:05', '2025-07-31 22:49:17'),
(32, 34, 'https://res.cloudinary.com/dkcgr4sel/image/upload/v1754027360/properti/hbothij5a3bdqvh8vuba.png', 'image', NULL, 'png', NULL, 1, '2025-07-20 19:57:23', '2025-07-31 22:49:21'),
(33, 36, 'https://res.cloudinary.com/dkcgr4sel/image/upload/v1754027362/properti/znijwnegxafxbqyakszp.png', 'image', NULL, 'png', NULL, 1, '2025-07-20 19:58:00', '2025-07-31 22:49:23'),
(34, 37, 'https://res.cloudinary.com/dkcgr4sel/image/upload/v1754027366/properti/smmk24grwpinoza8lgaj.png', 'image', NULL, 'png', NULL, 1, '2025-07-20 19:58:32', '2025-07-31 22:49:27'),
(35, 38, 'https://res.cloudinary.com/dkcgr4sel/image/upload/v1754027369/properti/z0b2goz93grs3jewg3ui.png', 'image', NULL, 'png', NULL, 1, '2025-07-20 19:59:37', '2025-07-31 22:49:30'),
(36, 42, 'https://res.cloudinary.com/dkcgr4sel/image/upload/v1754027372/properti/coxsjukdfqergsh31byh.png', 'image', NULL, 'png', NULL, 1, '2025-07-20 20:00:07', '2025-07-31 22:49:33'),
(37, 43, 'https://res.cloudinary.com/dkcgr4sel/image/upload/v1754027375/properti/noyj17tqqwwarhbsoj43.png', 'image', NULL, 'png', NULL, 1, '2025-07-20 20:00:29', '2025-07-31 22:49:36'),
(38, 46, 'https://res.cloudinary.com/dkcgr4sel/image/upload/v1754027378/properti/supu9w3ehg5fbypbh4wr.png', 'image', NULL, 'png', NULL, 1, '2025-07-20 20:01:06', '2025-07-31 22:49:39'),
(39, 47, 'https://res.cloudinary.com/dkcgr4sel/image/upload/v1754027382/properti/dyqoopeyvfsjdzbusdbv.png', 'image', NULL, 'png', NULL, 1, '2025-07-20 20:01:25', '2025-07-31 22:49:43'),
(40, 48, 'https://res.cloudinary.com/dkcgr4sel/image/upload/v1754027385/properti/ii5l6uladod0wis3vhjk.png', 'image', NULL, 'png', NULL, 1, '2025-07-20 20:01:51', '2025-07-31 22:49:46'),
(41, 49, 'https://res.cloudinary.com/dkcgr4sel/image/upload/v1754027388/properti/mgso5mhwjxlf8ut0jqbs.png', 'image', NULL, 'png', NULL, 1, '2025-07-20 20:02:16', '2025-07-31 22:49:49'),
(42, 50, 'https://res.cloudinary.com/dkcgr4sel/image/upload/v1754027391/properti/djluhqpe6bjoxfdkuzri.png', 'image', NULL, 'png', NULL, 1, '2025-07-20 20:02:42', '2025-07-31 22:49:52'),
(43, 51, 'https://res.cloudinary.com/dkcgr4sel/image/upload/v1754027394/properti/eldxfeqd0g4alepkczdd.png', 'image', NULL, 'png', NULL, 1, '2025-07-20 20:03:02', '2025-07-31 22:49:55'),
(44, 53, 'https://res.cloudinary.com/dkcgr4sel/image/upload/v1754027398/properti/e8pqnecagc9q4xel1atv.png', 'image', NULL, 'png', NULL, 1, '2025-07-20 20:03:22', '2025-07-31 22:49:59'),
(45, 54, 'https://res.cloudinary.com/dkcgr4sel/image/upload/v1754027404/properti/esv1312pd1ycfqmrlabv.png', 'image', NULL, 'png', NULL, 1, '2025-07-20 20:04:45', '2025-07-31 22:50:04'),
(46, 55, 'https://res.cloudinary.com/dkcgr4sel/image/upload/v1754027409/properti/dmsntlbjdms4di0zn8qp.png', 'image', NULL, 'png', NULL, 1, '2025-07-20 20:05:13', '2025-07-31 22:50:10'),
(47, 56, 'https://res.cloudinary.com/dkcgr4sel/image/upload/v1754027412/properti/icu1lw7ndeiwfbpvkdkc.png', 'image', NULL, 'png', NULL, 1, '2025-07-20 20:05:30', '2025-07-31 22:50:13'),
(48, 57, 'https://res.cloudinary.com/dkcgr4sel/image/upload/v1754027415/properti/oprv0rfppxxysyhwth9b.png', 'image', NULL, 'png', NULL, 1, '2025-07-20 20:06:04', '2025-07-31 22:50:16'),
(49, 58, 'https://res.cloudinary.com/dkcgr4sel/image/upload/v1754027419/properti/saowwhnqini4swzxvtew.png', 'image', NULL, 'png', NULL, 1, '2025-07-20 20:06:22', '2025-07-31 22:50:20'),
(52, 61, 'https://res.cloudinary.com/dkcgr4sel/image/upload/v1754027422/properti/wst0tandst3lz1dqg74i.png', 'image', NULL, 'png', NULL, 1, '2025-07-20 20:07:38', '2025-07-31 22:50:23'),
(53, 62, 'https://res.cloudinary.com/dkcgr4sel/image/upload/v1754027425/properti/hv00zxyaura4owq8gcnb.png', 'image', NULL, 'png', NULL, 1, '2025-07-20 20:08:46', '2025-07-31 22:50:26'),
(54, 63, 'https://res.cloudinary.com/dkcgr4sel/image/upload/v1754027428/properti/psqcwuyrpwhyhcuunbac.png', 'image', NULL, 'png', NULL, 1, '2025-07-20 20:09:05', '2025-07-31 22:50:29'),
(55, 64, 'https://res.cloudinary.com/dkcgr4sel/image/upload/v1754027431/properti/rnxibmfdjsckck20dfec.png', 'image', NULL, 'png', NULL, 1, '2025-07-20 20:09:24', '2025-07-31 22:50:33'),
(56, 65, 'https://res.cloudinary.com/dkcgr4sel/image/upload/v1754027435/properti/atvhmopoz0fvso1azgbs.png', 'image', NULL, 'png', NULL, 1, '2025-07-20 20:09:41', '2025-07-31 22:50:36'),
(57, 59, 'https://res.cloudinary.com/dkcgr4sel/image/upload/v1754024697/properti/nqxx9ewhrtbdpf782tmj.png', 'image', NULL, 'png', NULL, 0, '2025-07-31 22:04:59', '2025-07-31 22:04:59'),
(58, 60, 'https://res.cloudinary.com/dkcgr4sel/image/upload/v1754024908/properti/h6yzbxybeods6ojeeawu.png', 'image', NULL, 'png', NULL, 1, '2025-07-31 22:08:29', '2025-07-31 22:08:29');

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
('GE9BMO2yTsGQqdUCQJJrCscBKgrPAsai2GKNcBny', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUlhlSnc4M3dYbVk3T2N6UTJTRHVqNHBzYzNqYlJ3OWhMRUtHZVFLbSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1754039385),
('WmyaUPf1xTYzgHDV8rUaSJ7sezVeSSody1UfRaln', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRUNzajN4YnNQclZHWVE4aFRvaXIwR2tUNncyVEtIZW15dVZ3YklSUiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9wZXJ0aWVzLzYzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1754244595);

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
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_verified`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Test User', 'test@example.com', '2025-07-17 20:32:24', '$2y$12$6u7NyH57Zcj47CLEwtKnDOFTEgtxp6vmPcynb.ps6Q0MwBOCUaQce', 0, 'pNHz7KIeqW', '2025-07-17 20:32:25', '2025-07-17 20:32:25', 'user'),
(2, 'Admin User', 'admin@example.com', '2025-07-17 20:32:25', '$2y$12$xnEtRTvs9n7gKf/OpFEvFu4Ber1b5wAv30i/B5FvqFX9POdOaTyba', 1, 'SMWnLB8HIsIcPCdmkGjYNNhCPdVwE0mZXp22LxDoJl9hPS7w0YgKkBBDKsQL', '2025-07-17 20:32:25', '2025-07-17 20:32:25', 'admin');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `contact_persons`
--
ALTER TABLE `contact_persons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_persons_property_id_foreign` (`property_id`);

--
-- Indexes for table `daftar_users`
--
ALTER TABLE `daftar_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `lelang_schedules`
--
ALTER TABLE `lelang_schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lelang_schedules_property_id_foreign` (`property_id`);

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
-- Indexes for table `points_of_interest`
--
ALTER TABLE `points_of_interest`
  ADD PRIMARY KEY (`id`),
  ADD KEY `points_of_interest_property_id_foreign` (`property_id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_media`
--
ALTER TABLE `property_media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_media_property_id_foreign` (`property_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `daftar_users`
--
ALTER TABLE `daftar_users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lelang_schedules`
--
ALTER TABLE `lelang_schedules`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `points_of_interest`
--
ALTER TABLE `points_of_interest`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `property_media`
--
ALTER TABLE `property_media`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contact_persons`
--
ALTER TABLE `contact_persons`
  ADD CONSTRAINT `contact_persons_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lelang_schedules`
--
ALTER TABLE `lelang_schedules`
  ADD CONSTRAINT `lelang_schedules_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `points_of_interest`
--
ALTER TABLE `points_of_interest`
  ADD CONSTRAINT `points_of_interest_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `property_media`
--
ALTER TABLE `property_media`
  ADD CONSTRAINT `property_media_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
