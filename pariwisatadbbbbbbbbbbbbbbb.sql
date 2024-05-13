-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 13 Bulan Mei 2024 pada 16.27
-- Versi server: 8.0.30
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pariwisataica`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `destinasi_hotel`
--

CREATE TABLE `destinasi_hotel` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `destinasi_hotel`
--

INSERT INTO `destinasi_hotel` (`id`, `nama`, `alamat`, `gambar`, `created_at`, `updated_at`) VALUES
(2, 'penginapan sejahtera', 'soppeng', '[\"images\\/KwR0CWwj7eTXFvYsOygXy1D0ppZxPECf5wGjugju.jpg\"]', '2024-05-13 07:50:24', '2024-05-13 07:50:24'),
(3, 'penginapan bahagia', 'soppeng', '[\"images\\/h9b8AUFFzNoxnHqka9YtdshXNqeKrEcsVSTXnZgJ.jpg\"]', '2024-05-13 07:50:39', '2024-05-13 07:50:39'),
(4, 'wisma tulip', 'pallangga', '[\"images\\/CjtTls3DdRfHdkPmnsSVtOH4qUZd1QlhfkKWfUya.jpg\"]', '2024-05-13 07:51:18', '2024-05-13 07:51:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `destinasi_kuliner`
--

CREATE TABLE `destinasi_kuliner` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `destinasi_kuliner`
--

INSERT INTO `destinasi_kuliner` (`id`, `nama`, `alamat`, `gambar`, `created_at`, `updated_at`) VALUES
(2, 'ikan bakar', 'soppeng', '[\"images\\/BOq6Ff5iqQr2rusMCQdsTzxEleqrIcGxU0vf1M15.jpg\"]', '2024-05-13 07:49:40', '2024-05-13 07:49:40'),
(3, 'ikan goreng', 'soppeng', '[\"images\\/9OBOWbNI57eEVjhdjy7XoF4l4eyI3bCQkoFGtYc9.jpg\"]', '2024-05-13 07:49:54', '2024-05-13 07:49:54'),
(4, 'babi guling', 'soppeng', '[\"images\\/BvypM0ZuK8gq5r94eq5Zq8Ti0ZD5XGYeNy6vj3tw.jpg\"]', '2024-05-13 07:50:08', '2024-05-13 07:50:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `destinasi_wisata`
--

CREATE TABLE `destinasi_wisata` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `destinasi_wisata`
--

INSERT INTO `destinasi_wisata` (`id`, `nama`, `alamat`, `keterangan`, `gambar`, `created_at`, `updated_at`) VALUES
(3, 'Soaraja', 'Kabupaten Soppeng', 'Taman Nasional Gunung Bromo Tengger Semeru terletak di Jawa Timur, Indonesia. Destinasi ini terkenal karena keindahan alamnya yang menakjubkan, termasuk gunung berapi aktif seperti Gunung Bromo dan Gunung Semeru, serta lautan pasir yang luas.', '[\"images\\/y4u1kRJhXvTMgx6ZAAYSphFrj52WWjebUuVQIWhM.jpg\"]', '2024-05-13 07:48:25', '2024-05-13 07:48:25'),
(4, 'Bromo', 'mario riawa', 'Taman Nasional Gunung Bromo Tengger Semeru terletak di Jawa Timur, Indonesia. Destinasi ini terkenal karena keindahan alamnya yang menakjubkan, termasuk gunung berapi aktif seperti Gunung Bromo dan Gunung Semeru, serta lautan pasir yang luas.', '[\"images\\/SmLJ1QEBJAb0GtHrPBmlGXTUq31ET8YxWQNqE8cC.jpg\"]', '2024-05-13 07:48:56', '2024-05-13 07:48:56'),
(5, 'lembah lohe', 'Kabupaten Soppeng', 'Taman Nasional Gunung Bromo Tengger Semeru terletak di Jawa Timur, Indonesia. Destinasi ini terkenal karena keindahan alamnya yang menakjubkan, termasuk gunung berapi aktif seperti Gunung Bromo dan Gunung Semeru, serta lautan pasir yang luas.', '[\"images\\/L5OIimtjYMG9jEcEQcjpI64OL3tFUEk489jQwYpJ.jpg\"]', '2024-05-13 07:49:19', '2024-05-13 07:49:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `kebudayaan`
--

CREATE TABLE `kebudayaan` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kebudayaan`
--

INSERT INTO `kebudayaan` (`id`, `nama`, `keterangan`, `gambar`, `created_at`, `updated_at`) VALUES
(5, 'tari kecak', 'Taman Nasional Gunung Bromo Tengger Semeru terletak di Jawa Timur, Indonesia. Destinasi ini terkenal karena keindahan alamnya yang menakjubkan, termasuk gunung berapi aktif seperti Gunung Bromo dan Gunung Semeru, serta lautan pasir yang luas.', '[\"images\\/TYLsXIZ5gaf0fOZZFdrO4s0hV52KZX2GyJpCrIl3.jpg\"]', '2024-05-13 07:51:32', '2024-05-13 07:51:32'),
(6, 'tari kacang', 'Taman Nasional Gunung Bromo Tengger Semeru terletak di Jawa Timur, Indonesia. Destinasi ini terkenal karena keindahan alamnya yang menakjubkan, termasuk gunung berapi aktif seperti Gunung Bromo dan Gunung Semeru, serta lautan pasir yang luas.', '[\"images\\/DZt1Xz8NA0IdBrJGqGj0Y9H7BLDLTTKLtyOXAxVA.jpg\"]', '2024-05-13 07:51:41', '2024-05-13 07:51:41'),
(7, 'tari bumbulo', 'Taman Nasional Gunung Bromo Tengger Semeru terletak di Jawa Timur, Indonesia. Destinasi ini terkenal karena keindahan alamnya yang menakjubkan, termasuk gunung berapi aktif seperti Gunung Bromo dan Gunung Semeru, serta lautan pasir yang luas.', '[\"images\\/6abBOOHCtOwHgl9RjZQrb9YyXoA7PswIp1YKo3Kg.jpg\"]', '2024-05-13 07:51:54', '2024-05-13 07:51:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentars`
--

CREATE TABLE `komentars` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi_komentar` text COLLATE utf8mb4_unicode_ci,
  `destinasi_wisata_id` bigint UNSIGNED DEFAULT NULL,
  `destinasi_kuliner_id` bigint UNSIGNED DEFAULT NULL,
  `rating` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `komentars`
--

INSERT INTO `komentars` (`id`, `nama`, `isi_komentar`, `destinasi_wisata_id`, `destinasi_kuliner_id`, `rating`, `created_at`, `updated_at`, `email`) VALUES
(3, 'Annisa', 'mantap', 3, NULL, NULL, '2024-05-13 08:03:08', '2024-05-13 08:03:08', 'zlhm378@gmail.com'),
(4, 'Arfah', 'oksih', NULL, 2, NULL, '2024-05-13 08:08:28', '2024-05-13 08:08:28', 'arfah@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_07_28_103045_create_destinasi_wisata_table', 1),
(6, '2023_07_30_033959_create_destinasi_kuliner_table', 1),
(7, '2023_07_30_091928_create_destinasi_hotel_table', 1),
(8, '2023_07_30_135827_create_kebudayaan_table', 1),
(9, '2023_07_30_161633_create_komentars_table', 1),
(10, '2024_05_13_081301_add_email_to_komentars_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nohp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `alamat`, `nohp`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'soppeng', 'gowa sarana indah', '0895801138822', 'soppeng@gmail.com', NULL, '$2y$10$TKFkrRFVmBAIxLU7KyT6UeuIVAEokxY3m6mGM6Y9kjs73S9CdMTLK', NULL, '2024-05-13 06:57:59', '2024-05-13 06:57:59');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `destinasi_hotel`
--
ALTER TABLE `destinasi_hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `destinasi_kuliner`
--
ALTER TABLE `destinasi_kuliner`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `destinasi_wisata`
--
ALTER TABLE `destinasi_wisata`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kebudayaan`
--
ALTER TABLE `kebudayaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `komentars`
--
ALTER TABLE `komentars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `komentars_destinasi_wisata_id_foreign` (`destinasi_wisata_id`),
  ADD KEY `komentars_destinasi_kuliner_id_foreign` (`destinasi_kuliner_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `destinasi_hotel`
--
ALTER TABLE `destinasi_hotel`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `destinasi_kuliner`
--
ALTER TABLE `destinasi_kuliner`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `destinasi_wisata`
--
ALTER TABLE `destinasi_wisata`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kebudayaan`
--
ALTER TABLE `kebudayaan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `komentars`
--
ALTER TABLE `komentars`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `komentars`
--
ALTER TABLE `komentars`
  ADD CONSTRAINT `komentars_destinasi_kuliner_id_foreign` FOREIGN KEY (`destinasi_kuliner_id`) REFERENCES `destinasi_kuliner` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `komentars_destinasi_wisata_id_foreign` FOREIGN KEY (`destinasi_wisata_id`) REFERENCES `destinasi_wisata` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
