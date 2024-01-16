-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2024 at 07:11 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kewirausahaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` char(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regency_id` char(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `excels`
--

CREATE TABLE `excels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `formulas`
--

CREATE TABLE `formulas` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_formula` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `uppper` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lower` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_by` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `formulas`
--

INSERT INTO `formulas` (`id`, `nama_formula`, `uppper`, `lower`, `created_by`, `updated_by`, `deleted_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
('018f0557-52d1-4202-b986-62851cd4cede', 'Prof. Tata sambada', '[\"617891f9-2443-4968-ac37-eb5144dd236e\",\"+\",\"64807ddf-3ff3-4688-87c5-fdeab66a38e5\",\"-\",\"6f6b92ba-2fc6-4f0c-8cba-d3aada546a86\",\"+\",\"85ba0265-0354-4097-ad38-0f3d703a65da\"]', '[\"617891f9-2443-4968-ac37-eb5144dd236e\"]', NULL, NULL, NULL, NULL, '2023-09-27 01:51:44', '2023-09-27 01:51:44'),
('054e5e55-012b-4cb5-949a-450815932622', 'Perpres', '[\"617891f9-2443-4968-ac37-eb5144dd236e\",\"+\",\"64807ddf-3ff3-4688-87c5-fdeab66a38e5\",\"+\",\"6f6b92ba-2fc6-4f0c-8cba-d3aada546a86\"]', '[\"85ba0265-0354-4097-ad38-0f3d703a65da\"]', NULL, NULL, NULL, NULL, '2023-09-27 01:49:38', '2023-09-27 01:49:38'),
('2e5d4e33-03df-496e-b5f5-e4054340aeca', 'rumus rasio berdasarkan ahli', '[\"617891f9-2443-4968-ac37-eb5144dd236e\",\"+\",\"64807ddf-3ff3-4688-87c5-fdeab66a38e5\",\"+\",\"6f6b92ba-2fc6-4f0c-8cba-d3aada546a86\",\"\\/\"]', '[\"15320978-b0fb-4536-9a51-4030e7b50d3d\"]', NULL, NULL, NULL, '2023-11-07 20:09:41', '2023-11-07 20:09:20', '2023-11-07 20:09:41'),
('98fa055d-e320-4921-b0b1-e81ba5ee17b2', 'RPJMN', '[\"617891f9-2443-4968-ac37-eb5144dd236e\",\"+\",\"64807ddf-3ff3-4688-87c5-fdeab66a38e5\",\"-\",\"6f6b92ba-2fc6-4f0c-8cba-d3aada546a86\"]', '[\"85ba0265-0354-4097-ad38-0f3d703a65da\"]', NULL, NULL, NULL, NULL, '2023-09-27 01:50:47', '2023-09-27 01:50:47'),
('d8a8e81d-be7f-41be-8fcb-240d23733841', 'rumus rasio berdasarkan ahli', '[\"617891f9-2443-4968-ac37-eb5144dd236e\",\"+\",\"64807ddf-3ff3-4688-87c5-fdeab66a38e5\",\"+\",\"7854013a-f63e-47ee-bbea-2ea8aa86cc90\"]', '[]', NULL, NULL, NULL, NULL, '2023-11-07 20:10:04', '2023-11-07 20:10:04');

-- --------------------------------------------------------

--
-- Table structure for table `indikators`
--

CREATE TABLE `indikators` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `indikator` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_by` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `indikators`
--

INSERT INTO `indikators` (`id`, `indikator`, `created_by`, `updated_by`, `deleted_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
('15320978-b0fb-4536-9a51-4030e7b50d3d', 'e', 'c7652c40-5a8b-4d3b-97bf-4ecac3ea1209', NULL, NULL, NULL, '2023-10-16 05:49:20', '2023-10-16 05:49:20'),
('617891f9-2443-4968-ac37-eb5144dd236e', 'a', 'c2d6e8f6-67f4-46aa-a561-62e5d441e709', NULL, NULL, NULL, '2023-09-27 01:46:38', '2023-09-27 01:46:38'),
('64807ddf-3ff3-4688-87c5-fdeab66a38e5', 'b', 'c2d6e8f6-67f4-46aa-a561-62e5d441e709', NULL, NULL, NULL, '2023-09-27 01:46:48', '2023-09-27 01:46:48'),
('6f6b92ba-2fc6-4f0c-8cba-d3aada546a86', 'c', 'c2d6e8f6-67f4-46aa-a561-62e5d441e709', NULL, NULL, NULL, '2023-09-27 01:46:56', '2023-09-27 01:46:56'),
('7854013a-f63e-47ee-bbea-2ea8aa86cc90', 'f', 'c2d6e8f6-67f4-46aa-a561-62e5d441e709', NULL, NULL, NULL, '2023-11-07 20:08:18', '2023-11-07 20:08:18'),
('85ba0265-0354-4097-ad38-0f3d703a65da', 'd', 'c2d6e8f6-67f4-46aa-a561-62e5d441e709', NULL, NULL, NULL, '2023-09-27 01:47:05', '2023-09-27 01:47:05');

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
(3, '2017_05_02_140432_create_provinces_tables', 1),
(4, '2017_05_02_140444_create_regencies_tables', 1),
(5, '2017_05_02_142019_create_districts_tables', 1),
(6, '2017_05_02_143454_create_villages_tables', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(9, '2023_06_20_081328_create_excels_table', 1),
(10, '2023_06_21_133057_create_pengenalans_table', 1),
(11, '2023_09_15_073638_create_indikators_table', 1),
(12, '2023_09_17_021747_create_sumbers_table', 1),
(13, '2023_09_17_024420_create_formulas_table', 1),
(14, '2023_09_17_065034_create_rasios_table', 1),
(15, '2023_09_18_030824_add_foto_to_users_table', 1);

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
-- Table structure for table `pengenalans`
--

CREATE TABLE `pengenalans` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` bigint(20) UNSIGNED DEFAULT NULL,
  `kabupaten` bigint(20) UNSIGNED DEFAULT NULL,
  `kecamatan` bigint(20) UNSIGNED DEFAULT NULL,
  `kelurahan` bigint(20) UNSIGNED DEFAULT NULL,
  `sls` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_urut_usaha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_usaha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_usaha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` date NOT NULL,
  `created_by` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_by` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rasios`
--

CREATE TABLE `rasios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_rasio` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_sumber` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sumber` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_formula` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `upper` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lower` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rasio` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cut_off_data` date NOT NULL,
  `created_by` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_by` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rasios`
--

INSERT INTO `rasios` (`id`, `nama_rasio`, `id_sumber`, `sumber`, `id_formula`, `upper`, `lower`, `rasio`, `cut_off_data`, `created_by`, `updated_by`, `deleted_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'rasio kewirausahaan - perpres', '315d5c49-93e8-486c-9321-f40d88630312', 'Buku BOBO', '054e5e55-012b-4cb5-949a-450815932622', '[\"100\",\"+\",\"200\",\"+\",\"300\"]', '[\"300\"]', '2', '2023-08-27', NULL, NULL, NULL, NULL, '2023-09-27 01:52:48', '2023-09-27 01:52:48'),
(2, 'rasio rpjmn', '315d5c49-93e8-486c-9321-f40d88630312', 'buku', '98fa055d-e320-4921-b0b1-e81ba5ee17b2', '[\"100\",\"+\",\"100\",\"-\",\"20\"]', '[\"5\"]', '36', '2023-10-26', NULL, NULL, NULL, NULL, '2023-10-04 01:50:12', '2023-10-04 01:50:12'),
(3, 'rasio kewirausahaan', '315d5c49-93e8-486c-9321-f40d88630312', 'dfdfsdf', '054e5e55-012b-4cb5-949a-450815932622', '[\"100\",\"+\",\"200\",\"+\",\"200\"]', '[\"50.32\"]', '9.9364069952305', '2025-10-08', NULL, NULL, NULL, NULL, '2023-10-08 04:56:47', '2023-10-08 05:20:37'),
(4, 'rasio kewirausahaan - perpres', '315d5c49-93e8-486c-9321-f40d88630312', 'buku bacaan', '054e5e55-012b-4cb5-949a-450815932622', '[\"10\",\"+\",\"10\",\"+\",\"10\"]', '[\"2\"]', '15', '2023-11-08', NULL, NULL, NULL, NULL, '2023-11-07 20:10:55', '2023-11-07 20:10:55');

-- --------------------------------------------------------

--
-- Table structure for table `regencies`
--

CREATE TABLE `regencies` (
  `id` char(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province_id` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sumbers`
--

CREATE TABLE `sumbers` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sumber` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_by` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sumbers`
--

INSERT INTO `sumbers` (`id`, `sumber`, `created_by`, `updated_by`, `deleted_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
('315d5c49-93e8-486c-9321-f40d88630312', 'Buku', 'c2d6e8f6-67f4-46aa-a561-62e5d441e709', NULL, NULL, NULL, '2023-09-27 01:47:20', '2023-09-27 01:47:20'),
('466b1ed5-15f2-4f29-b1ec-0efcc4f85be8', 'Jurnal', 'c2d6e8f6-67f4-46aa-a561-62e5d441e709', NULL, NULL, NULL, '2023-09-27 01:47:27', '2023-09-27 01:47:27'),
('85605f8c-7c35-43a8-8de2-638df1685fc8', 'Website', 'c2d6e8f6-67f4-46aa-a561-62e5d441e709', NULL, NULL, NULL, '2023-09-27 01:47:32', '2023-09-27 01:47:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `status_user` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_by` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'assets/img/avatar/avatar.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `role`, `status_user`, `created_by`, `updated_by`, `deleted_by`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `foto`) VALUES
('c2d6e8f6-67f4-46aa-a561-62e5d441e709', 'Super Admin', 'superadmin', 'superadmin@gmail.com', NULL, '$2y$10$E05zsq8TeGVGO2iJytwv5uDnybSzZZDdxML9PGFU8E3sfA.QTGnYq', 1, 1, NULL, NULL, NULL, NULL, NULL, '2023-09-27 01:46:16', NULL, 'img/user\\foto-1695804376.jpg'),
('c7652c40-5a8b-4d3b-97bf-4ecac3ea1209', 'reza', 'ferdian', 'ferdian@gmail.com', NULL, '$2y$10$4qtyeKRwR0IwDKOm9aAnpeEU8dXS1TEJ59iiSaZR4dxVGFyQTV6LO', 0, 1, NULL, NULL, NULL, NULL, '2023-10-08 05:12:19', '2023-10-16 05:49:53', NULL, 'img/user\\foto-1697460593.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `villages`
--

CREATE TABLE `villages` (
  `id` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district_id` char(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD KEY `districts_regency_id_foreign` (`regency_id`),
  ADD KEY `districts_id_index` (`id`);

--
-- Indexes for table `excels`
--
ALTER TABLE `excels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `formulas`
--
ALTER TABLE `formulas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `indikators`
--
ALTER TABLE `indikators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pengenalans`
--
ALTER TABLE `pengenalans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD KEY `provinces_id_index` (`id`);

--
-- Indexes for table `rasios`
--
ALTER TABLE `rasios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rasios_id_sumber_foreign` (`id_sumber`),
  ADD KEY `rasios_id_formula_foreign` (`id_formula`);

--
-- Indexes for table `regencies`
--
ALTER TABLE `regencies`
  ADD KEY `regencies_province_id_foreign` (`province_id`),
  ADD KEY `regencies_id_index` (`id`);

--
-- Indexes for table `sumbers`
--
ALTER TABLE `sumbers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `villages`
--
ALTER TABLE `villages`
  ADD KEY `villages_district_id_foreign` (`district_id`),
  ADD KEY `villages_id_index` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `excels`
--
ALTER TABLE `excels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rasios`
--
ALTER TABLE `rasios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_regency_id_foreign` FOREIGN KEY (`regency_id`) REFERENCES `regencies` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `rasios`
--
ALTER TABLE `rasios`
  ADD CONSTRAINT `rasios_id_formula_foreign` FOREIGN KEY (`id_formula`) REFERENCES `formulas` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `rasios_id_sumber_foreign` FOREIGN KEY (`id_sumber`) REFERENCES `sumbers` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `regencies`
--
ALTER TABLE `regencies`
  ADD CONSTRAINT `regencies_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `villages`
--
ALTER TABLE `villages`
  ADD CONSTRAINT `villages_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
