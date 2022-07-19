-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2022 at 09:56 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crime_report`
--

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
(1, 'user-list', 'web', '2022-02-23 23:43:18', '2022-02-23 23:43:18'),
(2, 'user-create', 'web', '2022-02-23 23:43:18', '2022-02-23 23:43:18'),
(3, 'user-edit', 'web', '2022-02-23 23:43:18', '2022-02-23 23:43:18'),
(4, 'user-delete', 'web', '2022-02-23 23:43:18', '2022-02-23 23:43:18'),
(5, 'role-list', 'web', '2022-02-23 23:43:18', '2022-02-23 23:43:18'),
(6, 'role-create', 'web', '2022-02-23 23:43:18', '2022-02-23 23:43:18'),
(7, 'role-edit', 'web', '2022-02-23 23:43:18', '2022-02-23 23:43:18'),
(8, 'role-delete', 'web', '2022-02-23 23:43:18', '2022-02-23 23:43:18'),
(9, 'permission-list', 'web', '2022-02-23 23:43:18', '2022-02-23 23:43:18'),
(10, 'permission-create', 'web', '2022-02-23 23:43:18', '2022-02-23 23:43:18'),
(11, 'permission-edit', 'web', '2022-02-23 23:43:18', '2022-02-23 23:43:18'),
(12, 'permission-delete', 'web', '2022-02-23 23:43:18', '2022-02-23 23:43:18'),
(13, 'complaint-create', 'web', '2022-04-16 03:43:38', '2022-07-18 21:31:49'),
(14, 'complaint-view', 'web', '2022-04-16 03:43:53', '2022-07-18 21:31:34'),
(15, 'complaint-edit', 'web', '2022-04-16 03:44:15', '2022-07-18 21:31:21'),
(16, 'complaint-delete', 'web', '2022-04-16 03:44:28', '2022-07-18 21:31:07'),
(17, 'complaint-type-create', 'web', '2022-07-18 21:09:31', '2022-07-18 21:30:52'),
(18, 'complaint-type-edit', 'web', '2022-07-18 21:09:45', '2022-07-18 21:30:39'),
(19, 'complaint-type-delete', 'web', '2022-07-18 21:11:09', '2022-07-18 21:30:27'),
(20, 'complaint-type-view', 'web', '2022-07-18 21:11:22', '2022-07-18 21:30:13'),
(21, 'investigation-create', 'web', '2022-07-18 21:12:25', '2022-07-18 21:29:59'),
(22, 'investigation-edit', 'web', '2022-07-18 21:12:36', '2022-07-18 21:29:44'),
(23, 'investigation-delete', 'web', '2022-07-18 21:12:46', '2022-07-18 21:29:31'),
(24, 'investigation-view', 'web', '2022-07-18 21:12:56', '2022-07-18 21:29:18'),
(25, 'attestor-create', 'web', '2022-07-18 21:14:26', '2022-07-18 21:29:04'),
(26, 'attestor-edit', 'web', '2022-07-18 21:15:12', '2022-07-18 21:28:51'),
(27, 'attestor-delete', 'web', '2022-07-18 21:15:21', '2022-07-18 21:28:38'),
(28, 'attestor-view', 'web', '2022-07-18 21:15:32', '2022-07-18 21:28:26'),
(29, 'district-create', 'web', '2022-07-18 21:18:43', '2022-07-18 21:28:15'),
(30, 'district-edit', 'web', '2022-07-18 21:18:54', '2022-07-18 21:28:04'),
(31, 'district-delete', 'web', '2022-07-18 21:19:08', '2022-07-18 21:27:52'),
(32, 'district-view', 'web', '2022-07-18 21:20:48', '2022-07-18 21:27:39'),
(33, 'police-station-create', 'web', '2022-07-18 21:22:33', '2022-07-18 21:27:25'),
(34, 'police-station-edit', 'web', '2022-07-18 21:22:42', '2022-07-18 21:27:14'),
(35, 'police-station-delete', 'web', '2022-07-18 21:22:51', '2022-07-18 21:27:03'),
(36, 'police-station-view', 'web', '2022-07-18 21:23:00', '2022-07-18 21:26:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
