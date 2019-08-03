-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 03, 2019 at 11:05 AM
-- Server version: 10.1.40-MariaDB-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proq7992_resu`
--

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
(3, '2019_03_19_203905_create_work_orders_table', 1),
(4, '2019_04_10_095143_add_surveyed_at_in_work_orders_table', 1),
(5, '2019_04_10_124122_add_admin_information_in_users_table', 1),
(6, '2019_04_10_142559_add_technician_information_in_users_table', 1),
(7, '2019_04_10_144743_add_role_in_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_locations` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `position`, `uid`, `phone_number`, `work_locations`, `role`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '$2y$10$CA8LxwpzKQUtoMXVIxsLk.M/d2k7v77XlxdcaU3jcT4hp1vY898E2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin'),
(2, 'Technician', 'technician@technician.com', NULL, '$2y$10$9E1Axhjur0PzNc4qnn843OFwk7USCMxFWw4HOV9GdTseGwG7VL2eG', NULL, NULL, '2019-07-13 04:00:52', 'Technician', '1234568790', '08123456790', 'TUN, SDA, KRN', 'technician');

-- --------------------------------------------------------

--
-- Table structure for table `work_orders`
--

CREATE TABLE `work_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_date` date NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ref_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `surveyor` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `surveyed_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `work_orders`
--

INSERT INTO `work_orders` (`id`, `order_date`, `customer_name`, `customer_address`, `phone_number`, `sto`, `source`, `ref_id`, `status`, `description`, `surveyor`, `created_by`, `created_at`, `updated_at`, `surveyed_at`) VALUES
(1, '2019-07-13', 'Musfirati Khasanah', 'Gg. Pisang Candi 2 No. 8b RT. 4 RW. 5, Kendalpayak, Pakisaji', '82213021513', 'KRN', 'STARCLICK', '0940952094', NULL, NULL, NULL, 1, '2019-07-13 03:25:30', '2019-07-13 03:25:30', NULL),
(2, '2019-07-14', 'Halim Tuhu Prasetyo', 'Gg. Pisang Candi 2 No. 8b RT. 4 RW. 5, Kendalpayak, Pakisaji', '82245072651', 'SDA', 'LME', '23492349234', 'ST1', 'ST1', 2, 1, '2019-07-13 23:29:12', '2019-07-14 00:14:15', '2019-07-14 00:14:15'),
(3, '2019-07-14', 'Wahdini Amalian Khasanah', 'Gg. Pisang Candi 2 No. 8b RT. 4 RW. 5, Kendalpayak, Pakisaji', '82213021513', 'TUN', 'STARCLICK', '3423479237', NULL, NULL, NULL, 1, '2019-07-13 23:30:04', '2019-07-13 23:30:04', NULL),
(4, '2019-07-14', 'Halim Teguh Prasetyo', 'Gg. Pisang Candi 2 No. 8b RT. 4 RW. 5, Kendalpayak, Pakisaji', '82245072651', 'SDA', 'BGES', '9479379243', 'ST1', 'ST1', 2, 1, '2019-07-13 23:33:49', '2019-07-14 01:24:17', '2019-07-14 01:24:17'),
(5, '2019-07-14', 'Halim Tegar Prasetyo', 'Gg. Pisang Candi 2 No. 8b RT. 4 RW. 5, Kendalpayak, Pakisaji', '82245072651', 'SPJ', 'BGES', '237942342', NULL, NULL, NULL, 1, '2019-07-14 00:11:08', '2019-07-14 00:11:08', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_orders`
--
ALTER TABLE `work_orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `work_orders`
--
ALTER TABLE `work_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
