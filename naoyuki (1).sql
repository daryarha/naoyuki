-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2020 at 06:55 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `naoyuki`
--

-- --------------------------------------------------------

--
-- Table structure for table `cashflow`
--

CREATE TABLE `cashflow` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `transaction` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_category` bigint(20) UNSIGNED NOT NULL,
  `nominal` int(11) NOT NULL,
  `d_k` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cashflow_category`
--

CREATE TABLE `cashflow_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cashflow_category`
--

INSERT INTO `cashflow_category` (`id`, `name`) VALUES
(1, 'Omzet'),
(2, 'HPP'),
(3, 'HR'),
(4, 'OPR'),
(5, 'MIS'),
(6, 'NP'),
(7, 'LA');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `class_materi`
--

CREATE TABLE `class_materi` (
  `id_materi` bigint(20) UNSIGNED NOT NULL,
  `id_class` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `funneling`
--

CREATE TABLE `funneling` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `total_people` bigint(20) UNSIGNED NOT NULL,
  `brand` int(11) NOT NULL,
  `market` int(11) NOT NULL,
  `selling` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hr`
--

CREATE TABLE `hr` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leverage_influencer`
--

CREATE TABLE `leverage_influencer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_viewer` int(11) NOT NULL,
  `coorporate` tinyint(1) NOT NULL,
  `date` date NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_status` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leverage_institute`
--

CREATE TABLE `leverage_institute` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `institute` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_student` int(11) NOT NULL,
  `visited` tinyint(1) NOT NULL,
  `date` date NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_status` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leverage_media`
--

CREATE TABLE `leverage_media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_viewer` int(11) NOT NULL,
  `coorporate` tinyint(1) NOT NULL,
  `date` date NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_status` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leverage_people`
--

CREATE TABLE `leverage_people` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jobdesc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_status` tinyint(3) UNSIGNED NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_upload` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `m_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL
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
(3, '2019_11_30_080007_create_target_table', 1),
(4, '2019_11_30_080037_create_potential_table', 1),
(5, '2019_11_30_080100_create_leverage_table', 1),
(6, '2019_11_30_080148_create_class_table', 1),
(7, '2019_11_30_080914_create_materi_table', 1),
(8, '2019_11_30_080924_create_class_materi_table', 1),
(9, '2019_11_30_080934_create_student_table', 1),
(10, '2019_11_30_081111_create_hr_table', 1),
(11, '2019_11_30_081133_create_cashflow_category_table', 1),
(12, '2019_11_30_081134_create_cashflow_table', 1),
(13, '2019_12_01_043650_update_potential_table', 2),
(14, '2019_12_01_045452_update_potential_table_2', 3),
(15, '2019_12_02_070631_update_cashflow_table', 4),
(16, '2019_12_02_072013_update_cashflow_table2', 5),
(17, '2019_12_03_094605_update_student_table', 6),
(18, '2019_12_03_102946_update_class_table', 7),
(19, '2019_12_07_062017_update_cashflow_table3', 8),
(20, '2019_12_08_113738_update_other_table2', 9),
(21, '2019_12_08_123631_update_other_table3', 10),
(22, '2019_12_10_075449_update_class_materi_table', 11),
(23, '2019_12_10_081716_create_class_materi_table2', 12),
(24, '2019_12_11_113410_update_user_table', 13),
(25, '2020_01_05_124717_rename_leverage', 13),
(26, '2020_01_06_115940_create_leverage_people_table', 14),
(27, '2020_01_06_120244_create_leverage_media_table', 14),
(28, '2020_01_06_120331_create_leverage_influencer_table', 14),
(29, '2020_01_11_092133_update_target_table2', 15),
(30, '2020_01_11_120837_update_target_table3', 16),
(31, '2020_01_12_044013_create_program_table', 17),
(32, '2020_01_12_073431_update_program_table', 18),
(33, '2020_01_12_182352_create_payment_table', 19),
(34, '2020_01_17_072534_create_payroll_table', 20),
(35, '2020_01_24_015207_create_payroll_extra_table', 21),
(36, '2020_01_24_020407_update_payroll_table', 21),
(37, '2020_01_24_023001_update_payroll_extra_table', 22),
(38, '2020_01_25_142722_create_notifications_table', 23),
(39, '2020_02_01_231325_add_id_users_to_target_table', 24),
(40, '2020_02_01_231809_add_id_users_to_student_program_table', 24),
(41, '2020_02_01_232507_add_id_users_to_student_table', 24),
(42, '2020_02_01_232929_add_id_users_to_program_table', 24),
(43, '2020_02_01_233004_add_id_users_to_potential_table', 24),
(44, '2020_02_01_233054_add_id_users_to_payroll_standar_table', 25),
(45, '2020_02_01_233117_add_id_users_to_payroll_table', 25),
(46, '2020_02_01_233139_add_id_users_to_payment_table', 25),
(47, '2020_02_01_233226_add_id_users_to_materi_table', 25),
(48, '2020_02_01_233303_add_id_users_to_leverage_people_table', 25),
(49, '2020_02_01_233339_add_id_users_to_leverage_media_table', 25),
(50, '2020_02_01_233415_add_id_users_to_leverage_institute_table', 25),
(51, '2020_02_01_233441_add_id_users_to_leverage_influencer_table', 25),
(52, '2020_02_01_233511_add_id_users_to_hr_table', 26),
(53, '2020_02_01_233602_add_id_users_to_class_materi_table', 26),
(54, '2020_02_01_233624_add_id_users_to_class_table', 26),
(55, '2020_02_01_233650_add_id_users_to_cashflow_table', 26),
(56, '2020_02_02_142417_create_role_table', 27),
(57, '2020_02_02_155958_add_role_to_user_table', 28),
(58, '2020_02_03_170650_create_funneling_table', 29),
(59, '2020_02_04_003243_add_id_user_to_funneling_table', 30),
(60, '2020_02_04_013815_add_gender_to_target_table', 31),
(61, '2020_02_04_071720_add_status_table', 32),
(62, '2020_02_04_071724_add_status_to_potential_table', 33),
(63, '2020_02_04_092746_add_status_to_leverage_people_table', 33),
(64, '2020_02_04_093208_add_status_to_leverage_media_table', 33),
(65, '2020_02_04_093243_add_status_to_leverage_influencer_table', 33),
(66, '2020_02_04_093306_add_status_to_leverage_institute_table', 33),
(67, '2020_02_04_175325_add_note_to_leverage_people_table', 34);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('56d9b764-c3f3-4c2a-a7bb-fa3a54341bdf', 'App\\Notifications\\CashflowUpdated', 'App\\User', 16, '{\"cashflow_id\":9,\"transaction\":\"kks\",\"nominal\":15,\"category\":\"HPP\"}', NULL, '2020-01-29 04:28:21', '2020-01-29 04:28:21'),
('980a8f0d-5015-45ab-892d-cec6441c4be2', 'App\\Notifications\\CashflowUpdated', 'App\\User', 15, '{\"cashflow_id\":9,\"transaction\":\"kks\",\"nominal\":100,\"category\":\"HPP\"}', NULL, '2020-01-29 04:28:02', '2020-01-29 04:28:02'),
('b74c0c2f-4a8f-4c1d-8a3b-965217ce99e3', 'App\\Notifications\\CashflowCreated', 'App\\User', 15, '{\"cashflow_id\":33,\"transaction\":\"baru\",\"nominal\":15000,\"category\":\"LA\"}', '2020-01-29 03:48:52', '2020-01-28 18:44:44', '2020-01-29 03:48:52'),
('b7e6abf0-171f-4c58-9547-5eca83d06256', 'App\\Notifications\\CashflowCreated', 'App\\User', 15, '{\"cashflow_id\":34,\"transaction\":\"dary\",\"nominal\":1500,\"category\":\"OPR\"}', '2020-01-29 03:48:46', '2020-01-28 19:24:53', '2020-01-29 03:48:46'),
('b8d03ae1-ceb6-4356-9ead-180339e0486f', 'App\\Notifications\\CashflowUpdated', 'App\\User', 15, '{\"cashflow_id\":9,\"transaction\":\"kks\",\"nominal\":15,\"category\":\"HPP\"}', NULL, '2020-01-29 04:28:21', '2020-01-29 04:28:21'),
('bd1c7568-77af-458c-bd3b-49696294e9e4', 'App\\Notifications\\TargetCreated', 'App\\User', 17, '{\"name\":\"budi santoso\",\"user\":\"widya\"}', NULL, '2020-02-04 20:57:20', '2020-02-04 20:57:20'),
('c442452f-a74f-439b-bbbe-810dc91dd13a', 'App\\Notifications\\CashflowCreated', 'App\\User', 15, '{\"cashflow_id\":35,\"transaction\":\"widya\",\"nominal\":1500,\"category\":\"OPR\"}', '2020-01-29 04:27:48', '2020-01-29 03:50:15', '2020-01-29 04:27:48'),
('daeb3ca1-6dce-4483-8a54-d591fc871b8c', 'App\\Notifications\\CashflowCreated', 'App\\User', 16, '{\"cashflow_id\":35,\"transaction\":\"widya\",\"nominal\":1500,\"category\":\"OPR\"}', NULL, '2020-01-29 03:50:17', '2020-01-29 03:50:17'),
('dfd59dd0-ca8d-45bd-b178-d839a11bf5d7', 'App\\Notifications\\CashflowCreated', 'App\\User', 16, '{\"cashflow_id\":34,\"transaction\":\"dary\",\"nominal\":1500,\"category\":\"OPR\"}', NULL, '2020-01-28 19:24:55', '2020-01-28 19:24:55'),
('eae5db08-991d-4527-bcfb-e21a00b72cfe', 'App\\Notifications\\CashflowUpdated', 'App\\User', 16, '{\"cashflow_id\":9,\"transaction\":\"kks\",\"nominal\":100,\"category\":\"HPP\"}', NULL, '2020-01-29 04:28:03', '2020-01-29 04:28:03');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sum_cost` int(11) NOT NULL,
  `date` date NOT NULL,
  `eta` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `id_student` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

CREATE TABLE `payroll` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `id_hr` bigint(20) UNSIGNED NOT NULL,
  `score` int(11) NOT NULL,
  `payroll` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payroll_extra`
--

CREATE TABLE `payroll_extra` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `total_work` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payroll_standar`
--

CREATE TABLE `payroll_standar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `potential`
--

CREATE TABLE `potential` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contacted` tinyint(1) NOT NULL,
  `result` tinyint(1) NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_status` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cost` int(11) NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Verified', '2020-02-04 17:00:00', '2020-02-04 17:00:00'),
(2, 'Approved', '2020-02-04 17:00:00', '2020-02-04 17:00:00'),
(3, 'Pending', '2020-02-04 17:00:00', '2020-02-04 17:00:00'),
(4, 'Rejected', '2020-02-04 17:00:00', '2020-02-04 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_class` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_program`
--

CREATE TABLE `student_program` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_student` bigint(20) UNSIGNED NOT NULL,
  `id_program` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `target`
--

CREATE TABLE `target` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nickname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `origin_city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `domicile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `education` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institution` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_line` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_instagram` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `religion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `gender` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `target`
--

INSERT INTO `target` (`id`, `created_at`, `updated_at`, `name`, `nickname`, `birth_date`, `origin_city`, `domicile`, `job`, `education`, `institution`, `phone`, `email`, `id_line`, `id_instagram`, `religion`, `id_user`, `gender`) VALUES
(1, '2020-02-04 20:57:17', '2020-02-04 20:57:17', 'budi santoso', 'budi', '2222-02-22', 'malaang', 'malang', 'student', 'SMA', 'SMAN 3 Malang', '08123456789', 'email@mail.com', 'budi_santoso', 'budisantoso', 'Malang', 18, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(17, 'daryarha', 'dary.ardhar@gmail.com', '2020-02-03 04:30:53', '$2y$10$0pRe2RAKYq3W1TqKApsEoei7sLuncXEGcgal01Z3g807e0dIDcUS6', NULL, '2020-02-03 03:44:15', '2020-02-03 06:54:34', 1),
(18, 'widya', 'widyasaptiani@gmail.com', '2020-02-03 04:30:53', '$2y$10$0pRe2RAKYq3W1TqKApsEoei7sLuncXEGcgal01Z3g807e0dIDcUS6', NULL, '2020-02-03 03:44:15', '2020-02-03 06:54:34', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cashflow`
--
ALTER TABLE `cashflow`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cashflow_id_category_foreign` (`id_category`),
  ADD KEY `cashflow_id_user_foreign` (`id_user`);

--
-- Indexes for table `cashflow_category`
--
ALTER TABLE `cashflow_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_id_user_foreign` (`id_user`);

--
-- Indexes for table `class_materi`
--
ALTER TABLE `class_materi`
  ADD PRIMARY KEY (`id_class`,`id_materi`),
  ADD KEY `class_materi_id_materi_foreign` (`id_materi`),
  ADD KEY `class_materi_id_user_foreign` (`id_user`);

--
-- Indexes for table `funneling`
--
ALTER TABLE `funneling`
  ADD PRIMARY KEY (`id`),
  ADD KEY `funneling_id_user_foreign` (`id_user`);

--
-- Indexes for table `hr`
--
ALTER TABLE `hr`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hr_id_user_foreign` (`id_user`);

--
-- Indexes for table `leverage_influencer`
--
ALTER TABLE `leverage_influencer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leverage_influencer_id_user_foreign` (`id_user`),
  ADD KEY `leverage_influencer_id_status_foreign` (`id_status`);

--
-- Indexes for table `leverage_institute`
--
ALTER TABLE `leverage_institute`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leverage_institute_id_user_foreign` (`id_user`),
  ADD KEY `leverage_institute_id_status_foreign` (`id_status`);

--
-- Indexes for table `leverage_media`
--
ALTER TABLE `leverage_media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leverage_media_id_user_foreign` (`id_user`),
  ADD KEY `leverage_media_id_status_foreign` (`id_status`);

--
-- Indexes for table `leverage_people`
--
ALTER TABLE `leverage_people`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leverage_people_id_user_foreign` (`id_user`),
  ADD KEY `leverage_people_id_status_foreign` (`id_status`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `materi_id_user_foreign` (`id_user`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_id_student_foreign` (`id_student`),
  ADD KEY `payment_id_user_foreign` (`id_user`);

--
-- Indexes for table `payroll`
--
ALTER TABLE `payroll`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payroll_id_hr_foreign` (`id_hr`),
  ADD KEY `payroll_id_user_foreign` (`id_user`);

--
-- Indexes for table `payroll_extra`
--
ALTER TABLE `payroll_extra`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payroll_standar`
--
ALTER TABLE `payroll_standar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `payroll_standar_id_user_foreign` (`id_user`);

--
-- Indexes for table `potential`
--
ALTER TABLE `potential`
  ADD PRIMARY KEY (`id`),
  ADD KEY `potential_id_user_foreign` (`id_user`),
  ADD KEY `potential_id_status_foreign` (`id_status`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`),
  ADD KEY `program_id_user_foreign` (`id_user`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id_class_foreign` (`id_class`),
  ADD KEY `student_id_user_foreign` (`id_user`);

--
-- Indexes for table `student_program`
--
ALTER TABLE `student_program`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_program_id_student_foreign` (`id_student`),
  ADD KEY `student_program_id_program_foreign` (`id_program`),
  ADD KEY `student_program_id_user_foreign` (`id_user`);

--
-- Indexes for table `target`
--
ALTER TABLE `target`
  ADD PRIMARY KEY (`id`),
  ADD KEY `target_id_user_foreign` (`id_user`);

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
-- AUTO_INCREMENT for table `cashflow`
--
ALTER TABLE `cashflow`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cashflow_category`
--
ALTER TABLE `cashflow_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `funneling`
--
ALTER TABLE `funneling`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hr`
--
ALTER TABLE `hr`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leverage_influencer`
--
ALTER TABLE `leverage_influencer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leverage_institute`
--
ALTER TABLE `leverage_institute`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leverage_media`
--
ALTER TABLE `leverage_media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leverage_people`
--
ALTER TABLE `leverage_people`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payroll`
--
ALTER TABLE `payroll`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payroll_standar`
--
ALTER TABLE `payroll_standar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `potential`
--
ALTER TABLE `potential`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_program`
--
ALTER TABLE `student_program`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `target`
--
ALTER TABLE `target`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cashflow`
--
ALTER TABLE `cashflow`
  ADD CONSTRAINT `cashflow_id_category_foreign` FOREIGN KEY (`id_category`) REFERENCES `cashflow_category` (`id`),
  ADD CONSTRAINT `cashflow_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `class_materi`
--
ALTER TABLE `class_materi`
  ADD CONSTRAINT `class_materi_id_class_foreign` FOREIGN KEY (`id_class`) REFERENCES `class` (`id`),
  ADD CONSTRAINT `class_materi_id_materi_foreign` FOREIGN KEY (`id_materi`) REFERENCES `materi` (`id`),
  ADD CONSTRAINT `class_materi_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `funneling`
--
ALTER TABLE `funneling`
  ADD CONSTRAINT `funneling_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `hr`
--
ALTER TABLE `hr`
  ADD CONSTRAINT `hr_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `leverage_influencer`
--
ALTER TABLE `leverage_influencer`
  ADD CONSTRAINT `leverage_influencer_id_status_foreign` FOREIGN KEY (`id_status`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `leverage_influencer_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `leverage_institute`
--
ALTER TABLE `leverage_institute`
  ADD CONSTRAINT `leverage_institute_id_status_foreign` FOREIGN KEY (`id_status`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `leverage_institute_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `leverage_media`
--
ALTER TABLE `leverage_media`
  ADD CONSTRAINT `leverage_media_id_status_foreign` FOREIGN KEY (`id_status`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `leverage_media_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `leverage_people`
--
ALTER TABLE `leverage_people`
  ADD CONSTRAINT `leverage_people_id_status_foreign` FOREIGN KEY (`id_status`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `leverage_people_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `materi`
--
ALTER TABLE `materi`
  ADD CONSTRAINT `materi_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_id_student_foreign` FOREIGN KEY (`id_student`) REFERENCES `student` (`id`),
  ADD CONSTRAINT `payment_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `payroll`
--
ALTER TABLE `payroll`
  ADD CONSTRAINT `payroll_id_hr_foreign` FOREIGN KEY (`id_hr`) REFERENCES `hr` (`id`),
  ADD CONSTRAINT `payroll_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `payroll_extra`
--
ALTER TABLE `payroll_extra`
  ADD CONSTRAINT `payroll_extra_id_foreign` FOREIGN KEY (`id`) REFERENCES `payroll` (`id`);

--
-- Constraints for table `payroll_standar`
--
ALTER TABLE `payroll_standar`
  ADD CONSTRAINT `payroll_standar_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `potential`
--
ALTER TABLE `potential`
  ADD CONSTRAINT `potential_id_status_foreign` FOREIGN KEY (`id_status`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `potential_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `program`
--
ALTER TABLE `program`
  ADD CONSTRAINT `program_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_id_class_foreign` FOREIGN KEY (`id_class`) REFERENCES `class` (`id`),
  ADD CONSTRAINT `student_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `student_program`
--
ALTER TABLE `student_program`
  ADD CONSTRAINT `student_program_id_program_foreign` FOREIGN KEY (`id_program`) REFERENCES `program` (`id`),
  ADD CONSTRAINT `student_program_id_student_foreign` FOREIGN KEY (`id_student`) REFERENCES `student` (`id`),
  ADD CONSTRAINT `student_program_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `target`
--
ALTER TABLE `target`
  ADD CONSTRAINT `target_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
