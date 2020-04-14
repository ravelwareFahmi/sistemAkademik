-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2020 at 04:56 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravelakademik`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `nama`, `telepon`, `alamat`, `created_at`, `update_at`) VALUES
(1, 'Sopiyudin', '085568723', 'Bandung', '2020-01-01 11:40:50', '0000-00-00 00:00:00'),
(2, 'Uyat Rohmatullah', '08766231', 'Karawang', '2020-01-01 11:40:50', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id` int(11) NOT NULL,
  `kode` varchar(191) NOT NULL,
  `nama` varchar(191) NOT NULL,
  `semester` varchar(191) NOT NULL,
  `guru_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id`, `kode`, `nama`, `semester`, `guru_id`, `created_at`, `update_at`) VALUES
(1, 'M01', 'Matematika', 'ganjil', 1, '2019-12-31 11:59:02', '0000-00-00 00:00:00'),
(2, 'B01', 'B indonesia', 'ganjil', 2, '2019-12-31 11:59:02', '0000-00-00 00:00:00'),
(3, 'A001', 'Agama Islam', 'ganjil', 1, '2020-01-01 05:28:34', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `mapel_siswa`
--

CREATE TABLE `mapel_siswa` (
  `id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `mapel_id` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapel_siswa`
--

INSERT INTO `mapel_siswa` (`id`, `siswa_id`, `mapel_id`, `nilai`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 96, '2019-12-31 12:01:16', '0000-00-00 00:00:00'),
(17, 1, 2, 85, '2019-12-31 20:24:58', '2020-01-01 03:24:58'),
(18, 1, 3, 70, '2020-01-01 05:41:03', '0000-00-00 00:00:00'),
(19, 3, 1, 89, '2019-12-31 22:51:15', '2020-01-01 05:51:15'),
(20, 2, 1, 90, '2020-01-01 08:45:53', '2020-01-01 15:45:53'),
(21, 2, 2, 53, '2020-01-01 08:46:02', '2020-01-01 15:46:02'),
(22, 2, 3, 55, '2020-01-01 08:46:11', '2020-01-01 15:46:11'),
(23, 3, 2, 80, '2020-01-01 08:46:59', '2020-01-01 15:46:59'),
(24, 3, 3, 89, '2020-01-01 08:47:08', '2020-01-01 15:47:08'),
(25, 4, 1, 89, '2020-01-01 08:50:25', '2020-01-01 15:50:25'),
(26, 4, 2, 80, '2020-01-01 08:51:12', '2020-01-01 15:51:12'),
(27, 4, 3, 53, '2020-01-01 08:51:20', '2020-01-01 15:51:20'),
(28, 13, 1, 90, '2020-01-04 19:03:09', '2020-01-05 02:03:09'),
(29, 14, 1, 23, '2020-01-04 20:53:26', '2020-01-05 03:53:26'),
(30, 14, 2, 90, '2020-01-04 20:53:57', '2020-01-05 03:53:57'),
(31, 14, 3, 89, '2020-01-04 20:54:03', '2020-01-05 03:54:03'),
(32, 20, 1, 89, '2020-01-04 20:54:18', '2020-01-05 03:54:18'),
(33, 20, 2, 89, '2020-01-04 20:54:26', '2020-01-05 03:54:26'),
(34, 20, 3, 89, '2020-01-04 20:54:34', '2020-01-05 03:54:34'),
(35, 24, 3, 90, '2020-01-04 20:54:48', '2020-01-05 03:54:48'),
(36, 24, 1, 89, '2020-01-04 20:54:55', '2020-01-05 03:54:55');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_12_28_130452_create_table_siswa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama_depan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_belakang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `user_id`, `nama_depan`, `nama_belakang`, `jenis_kelamin`, `agama`, `alamat`, `avatar`, `created_at`, `updated_at`) VALUES
(1, 0, 'Fahmi', 'yuda', 'L', 'Islam', 'karawang', '3x4.jpg', NULL, '2020-01-01 08:11:05'),
(2, 0, 'Herwindu', 'Adha', 'L', 'Islam', 'Karawang', 'vega.JPG', NULL, '2019-12-31 08:22:38'),
(3, 0, 'Yogi', 'Ginanjar', 'L', 'Islam', 'Karawang', NULL, NULL, NULL),
(4, 0, 'Siti', 'Dewi', 'P', 'islam', 'Bekasi', NULL, NULL, NULL),
(13, 0, 'Heni', 'Permani', 'P', 'Islam', 'Karawang', NULL, '2019-12-28 19:41:37', '2019-12-28 22:07:42'),
(14, 0, 'Rika', 'Wulandari', 'P', 'Islam', 'Karawang', NULL, '2019-12-29 13:54:42', '2019-12-29 14:20:24'),
(20, 2, 'Dea', 'Aprilia', 'L', 'islam', 'karawang', NULL, '2019-12-31 00:37:22', '2019-12-31 00:37:22'),
(24, 6, 'Hery', 'Kurniawan', 'L', 'Islam', 'Karawang', 'vega.JPG', '2019-12-31 11:32:43', '2020-01-04 20:55:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'fahmi', 'fahmiyuda31@gmail.com', NULL, '$2y$10$YAWPGmna4slkJ0GU.6pCPu6J/xC.fLyNgGgPrjCq2qFnTrinKPPnC', 'p3iMUDdrdyheZRVke8sw6SqqxcUV3djyO1PGWLAe2AbDuIo084StfKhvFfqN', '2019-12-29 16:14:16', '2019-12-29 16:14:16'),
(2, 'siswa', 'Dea', 'dea@gmail.com', NULL, '$2y$10$ffXX1stzw/wDibbPTiVoeu.WIUO9zHww40vz2RGg5nqKirEzDxPCy', 'xyDRJq2nyJoHZQ3wDdCRxEvt1JocCTAWdfCm3GAHyua19GgTZv3ZmcSNTpZq', '2019-12-31 00:37:22', '2019-12-31 00:37:22'),
(3, 'siswa', 'asdasddt', 'tkjyaspif@gmail.com', NULL, '$2y$10$MRuCHkWMjWPfuY693b0Ng.s4QWvCshgxtEIMn0oZercn4m0.CGZpu', '20QRtlP8EYI0nV7fPnu5I1aDHfJwRVhqn3KaLlJtqDxZ7k1iyDr72FrFq8e1', '2019-12-31 11:27:44', '2019-12-31 11:27:44'),
(4, 'siswa', 'sdsdsd', 'auliya@gmail.com', NULL, '$2y$10$KA6ydRnShiv6z1/88XgriOYe35K.SWtLC.2WL49RGXE8VZbsDnMFu', 'z3Ncf2KFfI4RxQjDOYKq6qv5Bs1xpIlvZYJj2lrZTzAqpLk4GSYG5rXGYUHL', '2019-12-31 11:29:56', '2019-12-31 11:29:56'),
(5, 'siswa', 'asdasdasd', 'asd@gmail.com', NULL, '$2y$10$nwLq4216wuaVCQxrDGwMwOAzNrM.Wm./mlJKbYk0rdrArkskRVN5W', '3TO4EeZ910U9cLUnptWSGeOK5Z0nSxbhNs9oHOyDeutwbr7TxMcW9z8wH8zt', '2019-12-31 11:32:16', '2019-12-31 11:32:16'),
(6, 'siswa', 'asdasdasd', 'asdda@gmail.com', NULL, '$2y$10$evHMCSVqk1gDRDzk9EmdUeIQA2WZ2YDXPwVtQfTmUn5ytihmM3CHS', 'ttUd004j4Z4grSblmfpf4PtfcCr2YnyjwkvncuthFjL07m05blqn25xmj4Fz', '2019-12-31 11:32:43', '2019-12-31 11:32:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mapel_siswa`
--
ALTER TABLE `mapel_siswa`
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
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
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
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mapel_siswa`
--
ALTER TABLE `mapel_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
