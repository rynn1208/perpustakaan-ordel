-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2026 at 02:09 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db-perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `bukus`
--

CREATE TABLE `bukus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `pengarang` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `tahun_terbit` varchar(4) NOT NULL,
  `stok` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bukus`
--

INSERT INTO `bukus` (`id`, `judul`, `pengarang`, `penerbit`, `tahun_terbit`, `stok`, `created_at`, `updated_at`) VALUES
(1, 'Pemrograman Web dengan HTML, CSS & JS', 'Budi Raharjo', 'Informatika', '2023', 20, '2026-04-03 05:09:38', '2026-04-03 05:09:38'),
(2, 'Panduan Lengkap Reparasi & Flashing Smartphone', 'Joko Susilo', 'Elex Media', '2021', 15, '2026-04-03 05:09:38', '2026-04-03 05:09:38'),
(3, 'Mastering Audio Mixer & Teori Frekuensi Suara', 'Agus Setiawan', 'Andi Publisher', '2020', 12, '2026-04-03 05:09:38', '2026-04-03 05:09:38'),
(4, 'Kumpulan Rumus Cepat Matematika Terapan', 'Prof. Yohanes Surya', 'Kandel', '2018', 30, '2026-04-03 05:09:38', '2026-04-03 05:09:38'),
(5, 'Filosofi Teras', 'Henry Manampiring', 'Kompas', '2019', 45, '2026-04-03 05:09:38', '2026-04-03 05:09:38'),
(6, 'Atomic Habits (Edisi Terjemahan)', 'James Clear', 'Gramedia', '2020', 50, '2026-04-03 05:09:38', '2026-04-03 05:09:38'),
(7, 'Algoritma dan Struktur Data Tingkat Lanjut', 'Rinaldi Munir', 'Informatika', '2016', 25, '2026-04-03 05:09:38', '2026-04-03 05:09:38'),
(8, 'Dasar-Dasar Jaringan Komputer Modern', 'Iwan Sofana', 'Informatika', '2022', 18, '2026-04-03 05:09:38', '2026-04-03 05:09:38'),
(9, 'Pengantar Bisnis & Ekonomi reiciendis', 'Purwanto Kusumo', 'Fa Uwais', '2017', 24, '2026-04-03 05:09:38', '2026-04-03 05:09:38'),
(10, 'Pengantar Bisnis & Ekonomi minima', 'Farah Astuti', 'Fa Sudiati Maryati (Persero) Tbk', '2020', 28, '2026-04-03 05:09:38', '2026-04-03 05:09:38'),
(11, 'Pengantar Pengembangan Diri quibusdam', 'Marsudi Utama S.T.', 'CV Simanjuntak Mayasari', '2026', 39, '2026-04-03 05:09:38', '2026-04-03 05:09:38'),
(12, 'Pengantar Bisnis & Ekonomi tempore', 'Ulya Maryati', 'CV Nurdiyanti (Persero) Tbk', '2026', 21, '2026-04-03 05:09:38', '2026-04-03 05:09:38'),
(13, 'Pengantar Pengembangan Diri aut', 'Asmadi Wacana', 'Fa Aryani Halimah (Persero) Tbk', '2015', 24, '2026-04-03 05:09:38', '2026-04-03 05:09:38'),
(14, 'Pengantar Pengembangan Diri totam', 'Cemani Kusuma Hidayanto', 'Perum Sihotang Hutagalung', '2020', 32, '2026-04-03 05:09:38', '2026-04-03 05:09:38'),
(15, 'Pengantar Pengembangan Diri accusantium', 'Aurora Yuniar', 'UD Sihotang Mulyani', '2020', 26, '2026-04-03 05:09:38', '2026-04-03 05:09:38'),
(16, 'Pengantar Bisnis & Ekonomi ut', 'Cayadi Permadi', 'Yayasan Sudiati Yulianti', '2015', 15, '2026-04-03 05:09:38', '2026-04-03 05:09:38'),
(17, 'Pengantar Bisnis & Ekonomi vero', 'Ulya Zulaika', 'Yayasan Permata', '2024', 29, '2026-04-03 05:09:38', '2026-04-03 05:09:38'),
(18, 'Pengantar Pengembangan Diri esse', 'Dariati Iswahyudi S.Kom', 'PJ Manullang Padmasari Tbk', '2026', 10, '2026-04-03 05:09:38', '2026-04-03 05:09:38'),
(19, 'Pengantar Teknologi Informasi accusantium', 'Ana Zahra Hassanah S.H.', 'PT Maryati', '2018', 25, '2026-04-03 05:09:38', '2026-04-03 05:09:38'),
(20, 'Pengantar Sains Terapan quos', 'Vicky Lalita Lestari M.Farm', 'PT Rahimah Sitorus', '2026', 21, '2026-04-03 05:09:38', '2026-04-03 05:09:38'),
(21, 'Pengantar Matematika Dasar tempora', 'Nilam Mandasari', 'Fa Maulana Purnawati', '2019', 33, '2026-04-03 05:09:38', '2026-04-03 05:09:38'),
(22, 'Pengantar Bisnis & Ekonomi qui', 'Jaswadi Natsir S.Pd', 'PD Suartini (Persero) Tbk', '2026', 34, '2026-04-03 05:09:38', '2026-04-03 05:09:38'),
(23, 'Pengantar Sains Terapan voluptas', 'Gatra Thamrin M.Kom.', 'PT Lestari', '2019', 10, '2026-04-03 05:09:38', '2026-04-03 05:09:38'),
(24, 'Pengantar Matematika Dasar repellat', 'Daliman Wibisono', 'PD Setiawan Kuswandari', '2017', 19, '2026-04-03 05:09:38', '2026-04-03 05:09:38'),
(25, 'Pengantar Teknologi Informasi nihil', 'Rangga Saragih', 'UD Pratiwi (Persero) Tbk', '2022', 39, '2026-04-03 05:09:38', '2026-04-03 05:09:38'),
(26, 'Pengantar Pengembangan Diri voluptas', 'Zahra Kusmawati', 'PJ Pangestu Tbk', '2021', 24, '2026-04-03 05:09:38', '2026-04-03 05:09:38'),
(27, 'Pengantar Sains Terapan assumenda', 'Cinthia Rahmi Hassanah S.Psi', 'Perum Suartini Habibi', '2026', 24, '2026-04-03 05:09:38', '2026-04-03 05:09:38'),
(28, 'Pengantar Matematika Dasar quia', 'Endah Yance Nasyidah', 'UD Yuniar Budiman Tbk', '2023', 16, '2026-04-03 05:09:38', '2026-04-03 05:09:38');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_04_01_103217_create_buku_table', 1),
(5, '2026_04_01_103250_create_peminjaman_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peminjamans`
--

CREATE TABLE `peminjamans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `buku_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `status` enum('Dipinjam','Dikembalikan') NOT NULL DEFAULT 'Dipinjam',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `peminjamans`
--

INSERT INTO `peminjamans` (`id`, `user_id`, `buku_id`, `tanggal_pinjam`, `tanggal_kembali`, `status`, `created_at`, `updated_at`) VALUES
(1, 6, 28, '2026-03-27', NULL, 'Dipinjam', '2026-04-03 05:09:38', '2026-04-03 05:09:38'),
(2, 6, 1, '2026-03-14', NULL, 'Dipinjam', '2026-04-03 05:09:38', '2026-04-03 05:09:38'),
(3, 5, 8, '2026-03-26', '2026-03-28', 'Dikembalikan', '2026-04-03 05:09:38', '2026-04-03 05:09:38'),
(4, 2, 24, '2026-03-30', '2026-04-01', 'Dikembalikan', '2026-04-03 05:09:38', '2026-04-03 05:09:38'),
(5, 4, 21, '2026-03-24', '2026-03-30', 'Dikembalikan', '2026-04-03 05:09:38', '2026-04-03 05:09:38'),
(6, 4, 27, '2026-03-27', NULL, 'Dipinjam', '2026-04-03 05:09:38', '2026-04-03 05:09:38'),
(7, 2, 18, '2026-03-29', '2026-04-06', 'Dikembalikan', '2026-04-03 05:09:38', '2026-04-03 05:09:38'),
(8, 4, 12, '2026-03-17', '2026-03-18', 'Dikembalikan', '2026-04-03 05:09:38', '2026-04-03 05:09:38'),
(9, 6, 27, '2026-03-15', NULL, 'Dipinjam', '2026-04-03 05:09:38', '2026-04-03 05:09:38'),
(10, 5, 21, '2026-03-23', '2026-03-25', 'Dikembalikan', '2026-04-03 05:09:38', '2026-04-03 05:09:38'),
(11, 7, 2, '2026-03-22', '2026-03-23', 'Dikembalikan', '2026-04-03 05:09:38', '2026-04-03 05:09:38'),
(12, 6, 7, '2026-03-27', '2026-03-29', 'Dikembalikan', '2026-04-03 05:09:38', '2026-04-03 05:09:38'),
(13, 6, 23, '2026-03-14', '2026-03-18', 'Dikembalikan', '2026-04-03 05:09:38', '2026-04-03 05:09:38'),
(14, 3, 24, '2026-03-28', '2026-04-03', 'Dikembalikan', '2026-04-03 05:09:38', '2026-04-03 05:09:38'),
(15, 5, 5, '2026-03-19', NULL, 'Dipinjam', '2026-04-03 05:09:38', '2026-04-03 05:09:38'),
(16, 6, 22, '2026-03-31', '2026-04-02', 'Dikembalikan', '2026-04-03 05:09:38', '2026-04-03 05:09:38'),
(17, 4, 17, '2026-04-01', '2026-04-09', 'Dikembalikan', '2026-04-03 05:09:38', '2026-04-03 05:09:38'),
(18, 4, 24, '2026-03-24', '2026-03-29', 'Dikembalikan', '2026-04-03 05:09:38', '2026-04-03 05:09:38'),
(19, 5, 23, '2026-03-24', NULL, 'Dipinjam', '2026-04-03 05:09:38', '2026-04-03 05:09:38'),
(20, 3, 13, '2026-03-19', '2026-03-26', 'Dikembalikan', '2026-04-03 05:09:38', '2026-04-03 05:09:38'),
(21, 3, 9, '2026-03-22', '2026-03-31', 'Dikembalikan', '2026-04-03 05:09:38', '2026-04-03 05:09:38'),
(22, 2, 12, '2026-03-29', NULL, 'Dipinjam', '2026-04-03 05:09:38', '2026-04-03 05:09:38'),
(23, 4, 18, '2026-03-25', NULL, 'Dipinjam', '2026-04-03 05:09:38', '2026-04-03 05:09:38'),
(24, 7, 7, '2026-03-22', '2026-03-28', 'Dikembalikan', '2026-04-03 05:09:38', '2026-04-03 05:09:38'),
(25, 5, 9, '2026-03-24', '2026-04-01', 'Dikembalikan', '2026-04-03 05:09:38', '2026-04-03 05:09:38'),
(26, 3, 25, '2026-03-17', '2026-03-19', 'Dikembalikan', '2026-04-03 05:09:38', '2026-04-03 05:09:38'),
(27, 3, 21, '2026-03-14', NULL, 'Dipinjam', '2026-04-03 05:09:38', '2026-04-03 05:09:38'),
(28, 2, 19, '2026-03-25', '2026-03-31', 'Dikembalikan', '2026-04-03 05:09:38', '2026-04-03 05:09:38'),
(29, 7, 3, '2026-03-17', '2026-03-20', 'Dikembalikan', '2026-04-03 05:09:38', '2026-04-03 05:09:38'),
(30, 6, 21, '2026-04-01', '2026-04-04', 'Dikembalikan', '2026-04-03 05:09:38', '2026-04-03 05:09:38');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','siswa') NOT NULL DEFAULT 'siswa',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Sistem', 'admin', '$2y$12$VqAO2GkfH3sLLHTYkZA3iOeWrPGSqwU8mcPflNaqf2RGkop7tdqxe', 'admin', NULL, '2026-04-03 05:09:36', '2026-04-03 05:09:36'),
(2, 'Akun Demo', 'siswa', '$2y$12$z3YkRTl2ctY1gQ47u.AcKOLzKMOvicYJGZmV7U0ywh6PXD89C.Uv.', 'siswa', NULL, '2026-04-03 05:09:37', '2026-04-03 05:09:37'),
(3, 'Darsirah Zulkarnain', 'vhidayanto', '$2y$12$iao6oOqla3yZH2FXF6HhBOudrKgVsUWEiqO4QWW7rATY7586Tho6G', 'siswa', NULL, '2026-04-03 05:09:37', '2026-04-03 05:09:37'),
(4, 'Rama Kuswoyo', 'tania.wasita', '$2y$12$SkKlK3TbB0nqnyDcbUPpLeeuevm7WEJ0MNWiTt5h4qddhwkmR1fZm', 'siswa', NULL, '2026-04-03 05:09:37', '2026-04-03 05:09:37'),
(5, 'Ulya Handayani S.IP', 'titi90', '$2y$12$IiyFQ5Y7GKPGD.Xe1RzXy.hgAIU3pNQ9Xwxul3zuRYAAEINid3uau', 'siswa', NULL, '2026-04-03 05:09:37', '2026-04-03 05:09:37'),
(6, 'Heru Latupono', 'kamaria37', '$2y$12$RhxtNrAPFbgQRe2K2n/W0.2wZ8mHR6bqDnhs3JPqDFq76ipD5yfPa', 'siswa', NULL, '2026-04-03 05:09:38', '2026-04-03 05:09:38'),
(7, 'Nurul Mayasari S.T.', 'intan35', '$2y$12$1.5w9Kf4DbvWVYA6XhE00uKOyXSrW.eaq/8bmNVMDsNyXTTjIkG3G', 'siswa', NULL, '2026-04-03 05:09:38', '2026-04-03 05:09:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bukus`
--
ALTER TABLE `bukus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

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
-- Indexes for table `peminjamans`
--
ALTER TABLE `peminjamans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peminjamans_user_id_foreign` (`user_id`),
  ADD KEY `peminjamans_buku_id_foreign` (`buku_id`);

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
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bukus`
--
ALTER TABLE `bukus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `peminjamans`
--
ALTER TABLE `peminjamans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `peminjamans`
--
ALTER TABLE `peminjamans`
  ADD CONSTRAINT `peminjamans_buku_id_foreign` FOREIGN KEY (`buku_id`) REFERENCES `bukus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `peminjamans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
