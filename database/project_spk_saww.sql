-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2023 at 04:32 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_spk_saww`
--

-- --------------------------------------------------------

--
-- Table structure for table `berkasmahasiswa`
--

CREATE TABLE `berkasmahasiswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nim` int(11) NOT NULL,
  `dokumenkhs` varchar(255) DEFAULT NULL,
  `dokumenpenghasilan` varchar(255) DEFAULT NULL,
  `dokumennilaiprestasi` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `berkasmahasiswa`
--

INSERT INTO `berkasmahasiswa` (`id`, `nim`, `dokumenkhs`, `dokumenpenghasilan`, `dokumennilaiprestasi`, `keterangan`, `status`, `created_at`, `updated_at`) VALUES
(2, 1815323056, '1815323056_dokumenkhs.pdf', '1815323056_dokumenpenghasilan.pdf', '1815323056_dokumennilaiprestasi.pdf', 'Menunggu proses', 'Disetujui', '2023-07-18 06:07:24', '2023-07-19 05:38:47'),
(3, 1815323099, '1815323099_dokumenkhs.pdf', '1815323099_dokumenpenghasilan.pdf', '1815323099_dokumennilaiprestasi.pdf', 'Pemeriksaan', 'Dalam Proses Pemeriksaan', '2023-08-26 06:50:22', '2023-08-26 06:52:40'),
(4, 1815323100, '1815323100_dokumenkhs.pdf', '1815323100_dokumenpenghasilan.pdf', '1815323100_dokumennilaiprestasi.pdf', NULL, NULL, '2023-08-26 16:44:16', '2023-08-26 16:44:16'),
(5, 1815323088, '1815323088_dokumenkhs.pdf', '1815323088_dokumenpenghasilan.pdf', '1815323088_dokumennilaiprestasi.pdf', 'Dalam Pemeriksaan mohon cek secara berkala', 'Dalam Proses Pemeriksaan', '2023-08-26 17:37:18', '2023-08-26 17:43:03'),
(7, 1815323054, '1815323054_dokumenkhs.pdf', '1815323054_dokumenpenghasilan.pdf', '1815323054_dokumennilaiprestasi.pdf', 'Dalam Proses Pemeriksaan', 'Dalam Proses Pemeriksaan', '2023-08-28 06:02:02', '2023-08-28 06:03:45'),
(8, 1815323055, '1815323055_dokumenkhs.pdf', '1815323055_dokumenpenghasilan.pdf', '1815323055_dokumennilaiprestasi.pdf', 'Berkas tidak sesuai', 'Ditolak', '2023-08-28 06:26:09', '2023-08-28 06:28:03'),
(9, 1815323012, '1815323012_dokumenkhs.pdf', '1815323012_dokumenpenghasilan.pdf', '1815323012_dokumennilaiprestasi.pdf', NULL, NULL, '2023-08-28 06:30:40', '2023-08-28 06:30:40');

-- --------------------------------------------------------

--
-- Table structure for table `bobotkriteria`
--

CREATE TABLE `bobotkriteria` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idtahunusulan` bigint(20) UNSIGNED NOT NULL,
  `idjenisbeasiswa` bigint(20) UNSIGNED NOT NULL,
  `bobotkriteriaipk` varchar(255) NOT NULL,
  `bobotkriteriaprestasi` varchar(255) NOT NULL,
  `bobotkriteriapenghasilan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bobotkriteria`
--

INSERT INTO `bobotkriteria` (`id`, `idtahunusulan`, `idjenisbeasiswa`, `bobotkriteriaipk`, `bobotkriteriaprestasi`, `bobotkriteriapenghasilan`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '40', '30', '30', '2023-07-15 04:08:40', '2023-07-15 04:08:40');

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
-- Table structure for table `ipk`
--

CREATE TABLE `ipk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nim` int(11) NOT NULL,
  `nilai_ipk` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ipk`
--

INSERT INTO `ipk` (`id`, `nim`, `nilai_ipk`, `created_at`, `updated_at`) VALUES
(1, 1815323055, 3.70, '2023-07-15 04:10:51', '2023-08-27 07:10:13'),
(2, 1815323056, 3.50, '2023-07-15 04:11:02', '2023-08-27 07:10:20'),
(3, 1815323057, 3.00, '2023-07-15 04:11:10', '2023-08-27 07:10:28'),
(4, 1815323053, 2.50, '2023-07-15 04:12:35', '2023-07-15 04:12:35'),
(5, 1815323058, 2.50, '2023-08-27 07:10:35', '2023-08-27 07:10:35'),
(6, 1815323059, 3.20, '2023-08-27 07:10:43', '2023-08-27 07:10:43'),
(7, 1815323060, 3.60, '2023-08-27 07:10:58', '2023-08-27 07:10:58');

-- --------------------------------------------------------

--
-- Table structure for table `jenisbeasiswa`
--

CREATE TABLE `jenisbeasiswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenisbeasiswa` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenisbeasiswa`
--

INSERT INTO `jenisbeasiswa` (`id`, `jenisbeasiswa`, `created_at`, `updated_at`) VALUES
(1, 'Peningkatan Prestasi Akademik', '2023-07-15 04:08:05', '2023-07-15 04:08:05'),
(2, 'Bidikmisi', '2023-08-26 18:21:28', '2023-08-26 18:21:28');

-- --------------------------------------------------------

--
-- Table structure for table `jenisprestasi`
--

CREATE TABLE `jenisprestasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `peringkat` varchar(255) NOT NULL,
  `jenisprestasi` varchar(255) NOT NULL,
  `tingkat` varchar(255) NOT NULL,
  `nilai` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenisprestasi`
--

INSERT INTO `jenisprestasi` (`id`, `peringkat`, `jenisprestasi`, `tingkat`, `nilai`, `created_at`, `updated_at`) VALUES
(1, 'Juara 1', 'Akademik', 'Intern Kampus', '10', '2023-07-15 04:08:11', '2023-07-15 04:08:11'),
(2, 'Juara 2', 'Akademik', 'Intern Kampus', '7', '2023-08-26 18:21:43', '2023-08-27 06:58:52');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `namajurusan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id`, `namajurusan`, `created_at`, `updated_at`) VALUES
(1, 'Teknik Elektro', '2023-07-15 04:07:54', '2023-07-15 04:07:54'),
(3, 'Teknik Mesin', '2023-08-16 05:11:04', '2023-08-16 05:11:04'),
(4, 'Teknik Sipil', '2023-08-27 06:58:03', '2023-08-27 06:58:03'),
(5, 'Administrasi Niaga', '2023-08-27 06:58:12', '2023-08-27 06:58:12'),
(6, 'Akuntansi', '2023-08-27 06:58:18', '2023-08-27 06:58:18'),
(7, 'Pariwisata', '2023-08-27 06:58:25', '2023-08-27 06:58:25');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nim` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jk` varchar(255) NOT NULL,
  `idprodi` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `notelp` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `namaayah` varchar(255) NOT NULL,
  `pekerjaanayah` varchar(255) NOT NULL,
  `penghasilanayah` int(11) NOT NULL,
  `namaibu` varchar(255) NOT NULL,
  `pekerjaanibu` varchar(255) NOT NULL,
  `penghasilanibu` int(11) NOT NULL,
  `tanggungan` int(11) NOT NULL,
  `totalpenghasilan` int(11) NOT NULL,
  `namabank` varchar(255) NOT NULL,
  `norek` varchar(255) NOT NULL,
  `semester` int(11) NOT NULL,
  `idtahunusulan` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nim`, `nama`, `jk`, `idprodi`, `email`, `notelp`, `alamat`, `namaayah`, `pekerjaanayah`, `penghasilanayah`, `namaibu`, `pekerjaanibu`, `penghasilanibu`, `tanggungan`, `totalpenghasilan`, `namabank`, `norek`, `semester`, `idtahunusulan`, `created_at`, `updated_at`) VALUES
(7, 1815323055, 'NI PUTU VEGA NIRMALA KANTI', 'Female', 1, 'veganirmala11@gmail.com', '081339595950', 'Selat, Karangasem, Bali', 'I MADE MUNIARTA', 'Petani', 1500000, 'NI WAYAN RAYUNI', 'IRT', 0, 3, 1500000, 'BRI', '12345786555', 4, 1, '2023-08-27 07:01:51', '2023-08-27 07:07:25'),
(8, 1815323056, 'Desak Made', 'Female', 1, 'desak99@gmail.com', '081736543214', 'Jln. Bayusuta', 'I Wayan Danu', 'PEGAWAI', 2500000, 'Ni Luh AYu', 'IRT', 0, 3, 2500000, 'BRI', '12345786555', 7, 1, '2023-08-27 07:02:34', '2023-08-27 07:07:35'),
(9, 1815323057, 'Ayu Sendi', 'Female', 2, 'ayu11@gmail.com', '081736543214', 'Br. Dinas Yeh Biyu Kelod, Ds. Patas, Kec. Gerokgak, Kab. Buleleng', 'I Ketut Putra', 'PNS', 2000000, 'Ni Luh Dewiyani', 'IRT', 1000000, 3, 3000000, 'BRI', '12345786555', 4, 1, '2023-08-27 07:03:24', '2023-08-27 07:07:50'),
(10, 1815323058, 'I Wayan Artanadi', 'Male', 2, 'arta55@gmail.com', '081736543214', 'Jln. Bayusuta', 'I Ketut Subrata', 'Polri', 4000000, 'Ni Luh Yanti', 'IRT', 0, 3, 4000000, 'BRI', '12345786555', 5, 1, '2023-08-27 07:04:15', '2023-08-27 07:07:57'),
(11, 1815323059, 'Ni Luh Setriani', 'Female', 1, 'setriani88@gmail.com', '081736543214', 'Selat, Karangasem, Bali', 'I Wayan Danu', 'Petani', 1500000, 'Ni Putu Yunianti', 'PNS', 200000, 6, 1700000, 'BRI', '12345786555', 3, 1, '2023-08-27 07:05:49', '2023-08-27 07:08:09'),
(12, 1815323060, 'Ketut Sunia', 'Male', 1, 'sunia78@gmail.com', '081736543214', 'Selat, Karangasem, Bali', 'I Wayan Punia', 'Wiraswasta', 2000000, 'Ni Luh Tania', 'IRT', 0, 2, 2000000, 'BRI', '12345786555', 5, 1, '2023-08-27 07:06:44', '2023-08-27 07:08:23'),
(13, 1815323054, 'ariska', 'Male', 1, 'ariska99@gmail.com', '081339595950', 'Jln. Bayusuta', 'I Wayan Punia', 'Wiraswasta', 1000000, 'Ni Luh AYu', 'IRT', 0, 3, 1000000, 'BRI', '12345786555', 4, 1, '2023-08-28 06:03:27', '2023-08-28 06:03:27'),
(14, 1815323012, 'I Kadek Arta Kertajaya', 'Male', 1, 'arta89@gmail.com', '081736543214', 'Br. Dinas Yeh Biyu Kelod, Ds. Patas, Kec. Gerokgak, Kab. Buleleng', 'I Ketut Subrata', 'Wiraswasta', 2500000, 'Ni Luh Dewiyani', 'PNS', 2000000, 3, 4500000, 'BRI', '12345786555', 7, 1, '2023-08-28 06:31:31', '2023-08-28 06:31:31');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_06_27_115533_create_jurusans_table', 1),
(6, '2023_06_27_124022_create_prodis_table', 1),
(7, '2023_07_01_072250_create_jenisbeasiswas_table', 1),
(8, '2023_07_01_072429_create_jenisprestasis_table', 1),
(9, '2023_07_01_072737_create_tahunusulans_table', 1),
(10, '2023_07_01_073006_create_bobotkriterias_table', 1),
(11, '2023_07_01_123934_create_nilaiprestasis_table', 1),
(12, '2023_07_01_131109_create_ipks_table', 1),
(13, '2023_07_02_115211_create_mahasiswas_table', 1),
(14, '2023_07_07_231753_create_berkasmahasiswas_table', 1),
(15, '2023_07_08_003536_create_rekaps_table', 1),
(16, '2023_07_12_074356_create_permission_tables', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 4),
(2, 'App\\Models\\User', 5),
(2, 'App\\Models\\User', 6),
(2, 'App\\Models\\User', 7);

-- --------------------------------------------------------

--
-- Table structure for table `nilaiprestasi`
--

CREATE TABLE `nilaiprestasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nim` int(11) NOT NULL,
  `total` double(8,2) NOT NULL,
  `id_usulan` bigint(20) UNSIGNED NOT NULL,
  `id_jenis_beasiswa` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nilaiprestasi`
--

INSERT INTO `nilaiprestasi` (`id`, `nim`, `total`, `id_usulan`, `id_jenis_beasiswa`, `created_at`, `updated_at`) VALUES
(1, 1815323055, 50.00, 1, 1, '2023-07-15 04:10:27', '2023-08-27 07:08:33'),
(2, 1815323056, 30.00, 1, 1, '2023-07-15 04:10:36', '2023-08-27 07:09:32'),
(4, 1815323053, 52.00, 1, 1, '2023-07-15 04:12:27', '2023-07-15 04:12:27'),
(5, 1815323057, 25.00, 1, 1, '2023-08-27 07:09:41', '2023-08-27 07:09:41'),
(6, 1815323058, 32.00, 1, 1, '2023-08-27 07:09:49', '2023-08-27 07:09:49'),
(7, 1815323059, 6.00, 1, 1, '2023-08-27 07:09:55', '2023-08-27 07:09:55'),
(8, 1815323060, 15.00, 1, 1, '2023-08-27 07:10:03', '2023-08-27 07:10:03');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `namaprodi` varchar(255) NOT NULL,
  `jenjang` varchar(255) NOT NULL,
  `idjurusan` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id`, `namaprodi`, `jenjang`, `idjurusan`, `created_at`, `updated_at`) VALUES
(1, 'Manajemen Informatika', 'D3', 1, '2023-07-15 04:07:59', '2023-08-27 06:58:41'),
(2, 'Teknik Listrik', 'D3', 1, '2023-08-26 18:21:13', '2023-08-26 18:21:13');

-- --------------------------------------------------------

--
-- Table structure for table `rekap`
--

CREATE TABLE `rekap` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nim` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `skor_ipk` double(8,2) NOT NULL,
  `skor_prestasi` double(8,2) NOT NULL,
  `skor_ekonomi` double(8,2) NOT NULL,
  `total` double(8,2) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rekap`
--

INSERT INTO `rekap` (`id`, `nim`, `tahun`, `skor_ipk`, `skor_prestasi`, `skor_ekonomi`, `total`, `status`, `created_at`, `updated_at`) VALUES
(1, 1815323055, 2020, 1.00, 1.00, 0.60, 100.00, 'Sangat Layak', '2023-08-27 07:11:04', '2023-08-27 07:11:04'),
(2, 1815323056, 2020, 0.80, 1.00, 0.40, 92.00, 'Sangat Layak', '2023-08-27 07:11:04', '2023-08-27 07:11:04'),
(3, 1815323057, 2020, 0.20, 1.00, 0.40, 68.00, 'Tidak Layak', '2023-08-27 07:11:04', '2023-08-27 07:11:04'),
(4, 1815323058, 2020, 0.20, 1.00, 0.20, 68.00, 'Tidak Layak', '2023-08-27 07:11:04', '2023-08-27 07:11:04'),
(5, 1815323059, 2020, 0.40, 0.40, 0.60, 38.00, 'Tidak Layak', '2023-08-27 07:11:04', '2023-08-27 07:11:04'),
(6, 1815323060, 2020, 0.80, 0.60, 0.60, 60.00, 'Tidak Layak', '2023-08-27 07:11:04', '2023-08-27 07:11:04');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', NULL, NULL),
(2, 'mahasiswa', 'web', NULL, NULL),
(3, 'Aris', 'web', '2023-08-26 16:38:52', '2023-08-26 16:38:52'),
(4, 'Putu', 'web', '2023-08-26 17:35:23', '2023-08-26 17:35:23'),
(5, 'Vega Nirmala', 'web', '2023-08-27 07:16:50', '2023-08-27 07:16:50'),
(6, 'Ariska', 'web', '2023-08-28 06:01:19', '2023-08-28 06:01:19');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tahunusulan`
--

CREATE TABLE `tahunusulan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idjenisbeasiswa` bigint(20) UNSIGNED NOT NULL,
  `tahun` varchar(255) NOT NULL,
  `kuota` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tahunusulan`
--

INSERT INTO `tahunusulan` (`id`, `idjenisbeasiswa`, `tahun`, `kuota`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '2020', '50', 'Aktif', '2023-07-15 04:08:19', '2023-07-15 04:08:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `nim` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jk` varchar(255) DEFAULT NULL,
  `notelp` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `level` enum('Admin','Mahasiswa','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `nim`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `jk`, `notelp`, `alamat`, `level`) VALUES
(1, 'Ibu Sri Andriati Asri', 0, 'admin@beasiswa.com', NULL, '$2y$10$WBFltDze3UUgShC4KTkoXO0RIH2zNvCQ4R5gQ0xYdUOlifZe6FZKS', NULL, '2023-08-16 04:49:49', '2023-08-28 05:58:37', 'Female', '081736543214', 'Denpasar, Bali', 'Admin'),
(6, 'Vega Nirmala', 1815323055, 'vega123@gmail.com', NULL, '$2y$10$GqCpgmSubabwuDL21p2houugMtOjHR3fEbsaekTeyec93VkOdS2XS', NULL, '2023-08-27 07:16:50', '2023-08-27 07:16:50', NULL, NULL, NULL, 'Mahasiswa'),
(7, 'Ariska', 1815323054, 'ariska99@gmail.com', NULL, '$2y$10$6HOhoVKSxXg54c3R1KboP.4Ctyp6c1qjDV2HvNTryofV1sk0ayb7q', NULL, '2023-08-28 06:01:19', '2023-08-28 06:01:19', NULL, NULL, NULL, 'Mahasiswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berkasmahasiswa`
--
ALTER TABLE `berkasmahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bobotkriteria`
--
ALTER TABLE `bobotkriteria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bobotkriteria_idtahunusulan_foreign` (`idtahunusulan`),
  ADD KEY `bobotkriteria_idjenisbeasiswa_foreign` (`idjenisbeasiswa`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `ipk`
--
ALTER TABLE `ipk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenisbeasiswa`
--
ALTER TABLE `jenisbeasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenisprestasi`
--
ALTER TABLE `jenisprestasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mahasiswa_idprodi_foreign` (`idprodi`),
  ADD KEY `mahasiswa_idtahunusulan_foreign` (`idtahunusulan`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `nilaiprestasi`
--
ALTER TABLE `nilaiprestasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nilaiprestasi_id_usulan_foreign` (`id_usulan`),
  ADD KEY `nilaiprestasi_id_jenis_beasiswa_foreign` (`id_jenis_beasiswa`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prodi_idjurusan_foreign` (`idjurusan`);

--
-- Indexes for table `rekap`
--
ALTER TABLE `rekap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `tahunusulan`
--
ALTER TABLE `tahunusulan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tahunusulan_idjenisbeasiswa_foreign` (`idjenisbeasiswa`);

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
-- AUTO_INCREMENT for table `berkasmahasiswa`
--
ALTER TABLE `berkasmahasiswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `bobotkriteria`
--
ALTER TABLE `bobotkriteria`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ipk`
--
ALTER TABLE `ipk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jenisbeasiswa`
--
ALTER TABLE `jenisbeasiswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jenisprestasi`
--
ALTER TABLE `jenisprestasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `nilaiprestasi`
--
ALTER TABLE `nilaiprestasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rekap`
--
ALTER TABLE `rekap`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tahunusulan`
--
ALTER TABLE `tahunusulan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bobotkriteria`
--
ALTER TABLE `bobotkriteria`
  ADD CONSTRAINT `bobotkriteria_idjenisbeasiswa_foreign` FOREIGN KEY (`idjenisbeasiswa`) REFERENCES `jenisbeasiswa` (`id`),
  ADD CONSTRAINT `bobotkriteria_idtahunusulan_foreign` FOREIGN KEY (`idtahunusulan`) REFERENCES `tahunusulan` (`id`);

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_idprodi_foreign` FOREIGN KEY (`idprodi`) REFERENCES `prodi` (`id`),
  ADD CONSTRAINT `mahasiswa_idtahunusulan_foreign` FOREIGN KEY (`idtahunusulan`) REFERENCES `tahunusulan` (`id`);

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nilaiprestasi`
--
ALTER TABLE `nilaiprestasi`
  ADD CONSTRAINT `nilaiprestasi_id_jenis_beasiswa_foreign` FOREIGN KEY (`id_jenis_beasiswa`) REFERENCES `jenisbeasiswa` (`id`),
  ADD CONSTRAINT `nilaiprestasi_id_usulan_foreign` FOREIGN KEY (`id_usulan`) REFERENCES `tahunusulan` (`id`);

--
-- Constraints for table `prodi`
--
ALTER TABLE `prodi`
  ADD CONSTRAINT `prodi_idjurusan_foreign` FOREIGN KEY (`idjurusan`) REFERENCES `jurusan` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tahunusulan`
--
ALTER TABLE `tahunusulan`
  ADD CONSTRAINT `tahunusulan_idjenisbeasiswa_foreign` FOREIGN KEY (`idjenisbeasiswa`) REFERENCES `jenisbeasiswa` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
