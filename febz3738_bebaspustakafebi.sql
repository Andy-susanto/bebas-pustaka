-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 20, 2025 at 08:53 PM
-- Server version: 10.11.14-MariaDB-cll-lve
-- PHP Version: 8.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `febz3738_bebaspustakafebi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `username` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(65) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `level` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `username`, `password`, `level`) VALUES
(2, 'Pengguna', 'admin', '$2y$10$uhjqVbku5b4zxN6RJaNQlOehLhHPTm9FYO1WBCtx5EHkGn37sti3q', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `bebaspustaka`
--

CREATE TABLE `bebaspustaka` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahasiswa_id` int(11) DEFAULT NULL,
  `semester` varchar(20) DEFAULT NULL,
  `punyakartuperpus` enum('Ya','Tidak') DEFAULT 'Tidak',
  `nokartu` varchar(20) DEFAULT NULL,
  `tanggalsurat` date DEFAULT NULL,
  `statuspengajuan` enum('Diterima','Perbaikan','Diproses') DEFAULT 'Diproses',
  `cetaksurat` enum('Aktif','Non Aktif') DEFAULT 'Non Aktif',
  `namakabag` varchar(50) DEFAULT NULL,
  `nipkabag` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `bebaspustaka`
--

INSERT INTO `bebaspustaka` (`id`, `mahasiswa_id`, `semester`, `punyakartuperpus`, `nokartu`, `tanggalsurat`, `statuspengajuan`, `cetaksurat`, `namakabag`, `nipkabag`, `created_at`, `updated_at`) VALUES
(1, 1, 'IX', 'Ya', '2043', '2025-09-22', 'Diterima', 'Non Aktif', 'Dian Fidyati, S.Pd.I', '19830414 200501 2 00', '2025-10-18 06:42:20', '2025-10-19 09:56:18'),
(2, 2, 'IX', 'Ya', '3021', '2025-10-18', 'Diterima', 'Aktif', 'Dian Fidyati, S.Pd.I', '19830414 200501 2 00', '2025-10-18 06:49:59', '2025-10-18 06:50:21'),
(3, 3, 'VIII', 'Ya', '2034', '2025-09-23', 'Diterima', 'Aktif', 'Dian Fidyati, S.Pd.I', '19830414 200501 2 00', '2025-10-18 06:52:44', '2025-10-18 06:53:04'),
(4, 4, 'VIII', 'Ya', '2025', '2025-10-10', 'Diterima', 'Aktif', 'Dian Fidyati, S.Pd.I', '19830414 200501 2 00', '2025-10-18 07:07:31', '2025-10-18 07:14:52'),
(5, 5, 'IX', 'Ya', '2113', '2025-09-17', 'Diterima', 'Aktif', 'Dian Fidyati, S.Pd.I', '19830414 200501 2 00', '2025-10-18 07:14:19', '2025-10-18 07:14:55'),
(6, 6, 'VII', 'Ya', '2089', '2025-10-09', 'Diterima', 'Aktif', 'Dian Fidyati, S.Pd.I', '19830414 200501 2 00', '2025-10-18 07:18:21', '2025-10-18 07:18:44'),
(7, 7, 'VII', 'Ya', '3105', '2025-10-03', 'Diterima', 'Aktif', 'Dian Fidyati, S.Pd.I', '19830414 200501 2 00', '2025-10-18 07:25:11', '2025-10-18 10:56:07'),
(8, 8, 'VII', 'Ya', '2198', '2025-10-18', 'Diterima', 'Aktif', 'Dian Fidyati, S.Pd.I', '19830414 200501 2 00', '2025-10-18 10:46:21', '2025-10-18 10:56:13'),
(9, 9, 'VII', 'Ya', '2765', '2025-10-18', 'Diterima', 'Aktif', 'Dian Fidyati, S.Pd.I', '19830414 200501 2 00', '2025-10-18 10:49:25', '2025-10-18 10:56:19'),
(10, 10, 'VII', 'Ya', '3221', '2025-09-30', 'Diterima', 'Aktif', 'Dian Fidyati, S.Pd.I', '19830414 200501 2 00', '2025-10-18 10:51:16', '2025-10-18 10:56:25'),
(11, 11, 'VII', 'Ya', '2675', '2025-10-18', 'Diterima', 'Aktif', 'Dian Fidyati, S.Pd.I', '19830414 200501 2 00', '2025-10-18 10:52:54', '2025-10-18 10:54:34'),
(12, 12, 'VIII', 'Tidak', '3479', '2025-10-07', 'Diterima', 'Aktif', 'Dian Fidyati, S.Pd.I', '19830414 200501 2 00', '2025-10-19 06:12:37', '2025-10-19 08:25:29'),
(13, 13, 'X', 'Tidak', '3457', '2025-09-17', 'Diterima', 'Aktif', 'Dian Fidyati, S.Pd.I', '19830414 200501 2 00', '2025-10-19 06:16:41', '2025-10-19 08:25:32'),
(14, 14, 'IX', 'Tidak', '1944', '2025-10-13', 'Diterima', 'Aktif', 'Dian Fidyati, S.Pd.I', '19830414 200501 2 00', '2025-10-19 06:20:22', '2025-10-19 08:25:35'),
(15, 15, 'X', 'Tidak', '3521', '2025-09-30', 'Diterima', 'Aktif', 'Dian Fidyati, S.Pd.I', '19830414 200501 2 00', '2025-10-19 06:22:22', '2025-10-19 08:25:39'),
(16, 16, 'XII', 'Tidak', '2652', '2025-09-29', 'Diterima', 'Aktif', 'Dian Fidyati, S.Pd.I', '19830414 200501 2 00', '2025-10-19 06:24:02', '2025-10-19 08:25:42'),
(17, 17, 'IX', 'Tidak', '3522', '2025-09-29', 'Diterima', 'Aktif', 'Dian Fidyati, S.Pd.I', '19830414 200501 2 00', '2025-10-19 06:27:11', '2025-10-19 06:35:30'),
(18, 18, 'IX', 'Tidak', '2292', '2025-09-29', 'Diterima', 'Aktif', 'Dian Fidyati, S.Pd.I', '19830414 200501 2 00', '2025-10-19 06:43:40', '2025-10-19 08:25:47'),
(19, 19, 'X', 'Tidak', '3517', '2025-09-30', 'Diterima', 'Aktif', 'Dian Fidyati, S.Pd.I', '19830414 200501 2 00', '2025-10-19 06:45:47', '2025-10-19 08:25:50'),
(20, 20, 'X', 'Tidak', '3536', '2025-10-02', 'Diterima', 'Aktif', 'Dian Fidyati, S.Pd.I', '19830414 200501 2 00', '2025-10-19 06:48:57', '2025-10-19 08:25:54'),
(21, 21, 'XIV', 'Tidak', '3593', '2025-10-09', 'Diterima', 'Aktif', 'Dian Fidyati, S.Pd.I', '19830414 200501 2 00', '2025-10-19 06:50:23', '2025-10-19 08:25:58'),
(22, 22, 'IX', 'Tidak', '3548', '2025-10-07', 'Diterima', 'Aktif', 'Dian Fidyati, S.Pd.I', '19830414 200501 2 00', '2025-10-19 06:51:48', '2025-10-19 08:26:03'),
(23, 23, 'X', 'Tidak', '3464', '2025-09-18', 'Diterima', 'Aktif', 'Dian Fidyati, S.Pd.I', '19830414 200501 2 00', '2025-10-19 07:31:04', '2025-10-19 08:26:08'),
(24, 24, 'XIV', 'Tidak', '3627', '2025-10-13', 'Diterima', 'Aktif', 'Dian Fidyati, S.Pd.I', '19830414 200501 2 00', '2025-10-19 07:32:57', '2025-10-19 08:26:12'),
(25, 25, 'XIII', 'Tidak', '3591', '2025-10-09', 'Diterima', 'Aktif', 'Dian Fidyati, S.Pd.I', '19830414 200501 2 00', '2025-10-19 07:52:37', '2025-10-19 07:53:11'),
(26, 26, 'XII', 'Tidak', '2376', '2025-10-14', 'Diterima', 'Aktif', 'Dian Fidyati, S.Pd.I', '19830414 200501 2 00', '2025-10-19 07:55:47', '2025-10-19 08:26:15'),
(27, 27, 'IX', 'Tidak', '2340', '2025-10-14', 'Diterima', 'Aktif', 'Dian Fidyati, S.Pd.I', '19830414 200501 2 00', '2025-10-19 07:57:46', '2025-10-19 08:26:19'),
(28, 28, 'XI', 'Tidak', '3476', '2025-09-22', 'Diterima', 'Aktif', 'Dian Fidyati, S.Pd.I', '19830414 200501 2 00', '2025-10-19 07:59:32', '2025-10-19 08:26:23'),
(29, 29, 'VIII', 'Tidak', '3463', '2025-09-18', 'Diterima', 'Aktif', 'Dian Fidyati, S.Pd.I', '19830414 200501 2 00', '2025-10-19 08:01:41', '2025-10-19 08:26:26'),
(30, 30, 'VIII', 'Tidak', '3585', '2025-10-09', 'Diterima', 'Aktif', 'Dian Fidyati, S.Pd.I', '19830414 200501 2 00', '2025-10-19 08:04:31', '2025-10-19 08:26:29'),
(31, 31, 'XII', 'Tidak', '3581', '2025-10-09', 'Diterima', 'Aktif', 'Dian Fidyati, S.Pd.I', '19830414 200501 2 00', '2025-10-19 08:06:06', '2025-10-19 08:26:38'),
(32, 32, 'IX', 'Tidak', '2227', '2025-10-13', 'Diterima', 'Aktif', 'Dian Fidyati, S.Pd.I', '19830414 200501 2 00', '2025-10-19 08:07:40', '2025-10-19 08:26:43'),
(33, 33, 'IX', 'Tidak', '2514', '2025-10-15', 'Diterima', 'Aktif', 'Dian Fidyati, S.Pd.I', '19830414 200501 2 00', '2025-10-19 08:09:13', '2025-10-19 08:26:47'),
(34, 34, 'VIII', 'Tidak', '3574', '2025-10-08', 'Diterima', 'Aktif', 'Dian Fidyati, S.Pd.I', '19830414 200501 2 00', '2025-10-19 08:10:56', '2025-10-19 08:26:51'),
(35, 35, 'XIV', 'Tidak', '3588', '2025-10-09', 'Diterima', 'Non Aktif', 'Dian Fidyati, S.Pd.I', '19830414 200501 2 00', '2025-10-19 08:12:22', '2025-10-19 09:56:37'),
(36, 36, 'VIII', 'Tidak', '3467', '2025-09-18', 'Diterima', 'Non Aktif', 'Dian Fidyati, S.Pd.I', '19830414 200501 2 00', '2025-10-19 08:14:00', '2025-10-19 09:56:31'),
(37, 37, 'XIII', 'Tidak', '3592', '2025-10-09', 'Diterima', 'Non Aktif', 'Dian Fidyati, S.Pd.I', '19830414 200501 2 00', '2025-10-19 08:16:14', '2025-10-19 09:56:26'),
(38, 38, 'VIII', 'Tidak', '3578', '2025-10-08', 'Diproses', 'Non Aktif', 'Dian Fidyati, S.Pd.I', '19830414 200501 2 00', '2025-10-19 08:18:13', '2025-10-19 09:53:55'),
(39, 39, 'XIV', 'Tidak', '2484', '2025-10-16', 'Diproses', 'Non Aktif', 'Dian Fidyati, S.Pd.I', '19830414 200501 2 00', '2025-10-19 08:20:12', '2025-10-19 09:53:50'),
(40, 40, 'VII', 'Tidak', '3600', '2025-10-09', 'Diproses', 'Non Aktif', 'Dian Fidyati, S.Pd.I', '19830414 200501 2 00', '2025-10-19 08:21:34', '2025-10-19 09:53:44'),
(41, 41, 'X', 'Tidak', '2406', '2025-10-15', 'Diterima', 'Non Aktif', 'Dian Fidyati, S.Pd.I', '19830414 200501 2 00', '2025-10-19 08:23:47', '2025-10-19 09:55:09'),
(42, 42, 'IX', 'Ya', '3118', '2025-09-24', 'Diproses', 'Non Aktif', NULL, NULL, '2025-10-19 10:02:25', '2025-10-19 10:02:25');

-- --------------------------------------------------------

--
-- Table structure for table `bebaspustakafile`
--

CREATE TABLE `bebaspustakafile` (
  `id` int(10) UNSIGNED NOT NULL,
  `bebaspustaka_id` int(11) DEFAULT NULL,
  `mahasiswa_id` int(11) DEFAULT NULL,
  `kartuanggota` text DEFAULT NULL,
  `ketkartuanggota` text DEFAULT NULL,
  `fileskripsi` text DEFAULT NULL,
  `ketfileskripsi` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `bebaspustakafile`
--

INSERT INTO `bebaspustakafile` (`id`, `bebaspustaka_id`, `mahasiswa_id`, `kartuanggota`, `ketkartuanggota`, `fileskripsi`, `ketfileskripsi`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'kartuanggota/1760769740_504220185_Aprilla_Jumiyati.png', NULL, 'fileskripsi/1760769741_504220185_Aprilla_Jumiyati.pdf', NULL, '2025-10-18 06:42:21', '2025-10-18 06:42:21'),
(2, 2, 2, 'kartuanggota/1760770199_501210145_Azzahra.jpeg', NULL, 'fileskripsi/1760770199_501210145_Azzahra.pdf', NULL, '2025-10-18 06:49:59', '2025-10-18 06:49:59'),
(3, 3, 3, 'kartuanggota/1760770364_503210105_Dinda_Wahdini.jpeg', NULL, 'fileskripsi/1760770364_503210105_Dinda_Wahdini.pdf', NULL, '2025-10-18 06:52:44', '2025-10-18 06:52:44'),
(4, 4, 4, 'kartuanggota/1760771251_501200518_Hariyati_Putri.png', NULL, 'fileskripsi/1760771251_501200518_Hariyati_Putri.pdf', NULL, '2025-10-18 07:07:31', '2025-10-18 07:07:31'),
(5, 5, 5, 'kartuanggota/1760771659_5042101003_Mailin_Permata_Sari.png', NULL, 'fileskripsi/1760771659_5042101003_Mailin_Permata_Sari.pdf', NULL, '2025-10-18 07:14:19', '2025-10-18 07:14:19'),
(6, 6, 6, 'kartuanggota/1760771901_502210064_Erni_Puspitasari.jpg', NULL, 'fileskripsi/1760771901_502210064_Erni_Puspitasari.pdf', NULL, '2025-10-18 07:18:21', '2025-10-18 07:18:21'),
(7, 7, 7, 'kartuanggota/1760772311_503210140_Mutiara_Fajar_Septia.jpeg', NULL, 'fileskripsi/1760772311_503210140_Mutiara_Fajar_Septia.pdf', NULL, '2025-10-18 07:25:11', '2025-10-18 07:30:44'),
(8, 8, 8, 'kartuanggota/1760784381_503210082_Paizah_Rahmayeni.jpeg', NULL, 'fileskripsi/1760784381_503210082_Paizah_Rahmayeni.pdf', NULL, '2025-10-18 10:46:21', '2025-10-18 10:46:21'),
(9, 9, 9, 'kartuanggota/1760784565_501210285_Putri_Krisdayana.jpg', NULL, 'fileskripsi/1760784565_501210285_Putri_Krisdayana.pdf', NULL, '2025-10-18 10:49:25', '2025-10-18 10:49:25'),
(10, 10, 10, 'kartuanggota/1760784676_503210089_Riska_Eviolina.jpeg', NULL, 'fileskripsi/1760784676_503210089_Riska_Eviolina.pdf', NULL, '2025-10-18 10:51:16', '2025-10-18 10:51:16'),
(11, 11, 11, 'kartuanggota/1760784774_503210108_Saydatun_Nisya.jpeg', NULL, 'fileskripsi/1760784774_503210108_Saydatun_Nisya.pdf', NULL, '2025-10-18 10:52:54', '2025-10-18 10:52:54'),
(12, 12, 12, 'kartuanggota/1760854357_502210061_Aditya_Warman.jpeg', NULL, 'fileskripsi/1760854357_502210061_Aditya_Warman.pdf', NULL, '2025-10-19 06:12:37', '2025-10-19 06:12:37'),
(13, 13, 13, 'kartuanggota/1760854601_503200078_Afifah_Izza.jpeg', NULL, 'fileskripsi/1760854601_503200078_Afifah_Izza.pdf', NULL, '2025-10-19 06:16:41', '2025-10-19 06:16:41'),
(14, 14, 14, 'kartuanggota/1760854822_502210052_Rizza_Desnita.jpeg', NULL, 'fileskripsi/1760854822_502210052_Rizza_Desnita.pdf', NULL, '2025-10-19 06:20:22', '2025-10-19 06:20:22'),
(15, 15, 15, 'kartuanggota/1760854942_502200032_Dea_Handayani.jpeg', NULL, 'fileskripsi/1760854942_502200032_Dea_Handayani.pdf', NULL, '2025-10-19 06:22:22', '2025-10-19 06:22:22'),
(16, 16, 16, 'kartuanggota/1760855042_501190306_M._Farhan_Haqiqi.jpeg', NULL, 'fileskripsi/1760855042_501190306_M._Farhan_Haqiqi.pdf', NULL, '2025-10-19 06:24:02', '2025-10-19 06:24:02'),
(17, 17, 17, 'kartuanggota/1760855231_501210077_Rio_Saputra.jpeg', NULL, 'fileskripsi/1760855231_501210077_Rio_Saputra.pdf', NULL, '2025-10-19 06:27:11', '2025-10-19 06:35:15'),
(18, 18, 18, 'kartuanggota/1760856220_502210093_Mirta_Yulinar.jpeg', NULL, 'fileskripsi/1760856220_502210093_Mirta_Yulinar.pdf', NULL, '2025-10-19 06:43:40', '2025-10-19 06:43:40'),
(19, 19, 19, 'kartuanggota/1760856347_504200087_Muhammad_Iqbal_Hakim.jpeg', NULL, 'fileskripsi/1760856347_504200087_Muhammad_Iqbal_Hakim.pdf', NULL, '2025-10-19 06:45:47', '2025-10-19 06:45:47'),
(20, 20, 20, 'kartuanggota/1760856537_501200431_Riki_Saputra.jpeg', NULL, 'fileskripsi/1760856537_501200431_Riki_Saputra.pdf', NULL, '2025-10-19 06:48:57', '2025-10-19 06:48:57'),
(21, 21, 21, 'kartuanggota/1760856623_501180130_Rocky_Bastian.jpeg', NULL, 'fileskripsi/1760856623_501180130_Rocky_Bastian.pdf', NULL, '2025-10-19 06:50:23', '2025-10-19 06:50:23'),
(22, 22, 22, 'kartuanggota/1760856708_502210017_Safna_Ardianti.jpeg', NULL, 'fileskripsi/1760856708_502210017_Safna_Ardianti.pdf', NULL, '2025-10-19 06:51:48', '2025-10-19 06:51:48'),
(23, 23, 23, 'kartuanggota/1760859064_501200040_Santi_Dwi_Haryani.jpeg', NULL, 'fileskripsi/1760859064_501200040_Santi_Dwi_Haryani.pdf', NULL, '2025-10-19 07:31:04', '2025-10-19 07:31:04'),
(24, 24, 24, 'kartuanggota/1760859177_501190364_Winy_Meldani.jpeg', NULL, 'fileskripsi/1760859177_501190364_Winy_Meldani.pdf', NULL, '2025-10-19 07:32:57', '2025-10-19 07:32:57'),
(25, 25, 25, 'kartuanggota/1760860357_501190293_Agung_Nur_Arobi.jpeg', NULL, 'fileskripsi/1760860357_501190293_Agung_Nur_Arobi.pdf', NULL, '2025-10-19 07:52:37', '2025-10-19 07:52:37'),
(26, 26, 26, 'kartuanggota/1760860547_501190322_Dandi_Kurnia.jpg', NULL, 'fileskripsi/1760860547_501190322_Dandi_Kurnia.pdf', NULL, '2025-10-19 07:55:47', '2025-10-19 07:55:47'),
(27, 27, 27, 'kartuanggota/1760860666_501210148_Deva_Fitriani.jpeg', NULL, 'fileskripsi/1760860666_501210148_Deva_Fitriani.pdf', NULL, '2025-10-19 07:57:46', '2025-10-19 07:57:46'),
(28, 28, 28, 'kartuanggota/1760860772_501200626_Ferlinda_Agustina.jpg', NULL, 'fileskripsi/1760860772_501200626_Ferlinda_Agustina.pdf', NULL, '2025-10-19 07:59:32', '2025-10-19 07:59:32'),
(29, 29, 29, 'kartuanggota/1760860901_502210055_Harma_Nika.jpg', NULL, 'fileskripsi/1760860901_502210055_Harma_Nika.pdf', NULL, '2025-10-19 08:01:41', '2025-10-19 08:01:41'),
(30, 30, 30, 'kartuanggota/1760861071_501210264_Khoiriyah.jpg', NULL, 'fileskripsi/1760861071_501210264_Khoiriyah.pdf', NULL, '2025-10-19 08:04:31', '2025-10-19 08:04:31'),
(31, 31, 31, 'kartuanggota/1760861166_503190150_Kisan_Desvalingga.jpg', NULL, 'fileskripsi/1760861166_503190150_Kisan_Desvalingga.pdf', NULL, '2025-10-19 08:06:06', '2025-10-19 08:06:06'),
(32, 32, 32, 'kartuanggota/1760861260_503210069_Maryani.jpg', NULL, 'fileskripsi/1760861260_503210069_Maryani.pdf', NULL, '2025-10-19 08:07:40', '2025-10-19 08:07:40'),
(33, 33, 33, 'kartuanggota/1760861353_503210014_Meli_Nispiarli.jpeg', NULL, 'fileskripsi/1760861353_503210014_Meli_Nispiarli.pdf', NULL, '2025-10-19 08:09:13', '2025-10-19 08:09:13'),
(34, 34, 34, 'kartuanggota/1760861456_503210071_Meisi_Suprihatin.jpeg', NULL, 'fileskripsi/1760861456_503210071_Meisi_Suprihatin.pdf', NULL, '2025-10-19 08:10:56', '2025-10-19 08:10:56'),
(35, 35, 35, 'kartuanggota/1760861542_501180105_Muhammad.jpeg', NULL, 'fileskripsi/1760861542_501180105_Muhammad.pdf', NULL, '2025-10-19 08:12:22', '2025-10-19 08:12:22'),
(36, 36, 36, 'kartuanggota/1760861640_501210096_Netty_Purnama_Sari.jpg', NULL, 'fileskripsi/1760861640_501210096_Netty_Purnama_Sari.pdf', NULL, '2025-10-19 08:14:00', '2025-10-19 08:14:00'),
(37, 37, 37, 'kartuanggota/1760861774_503190006_Raihan_Saputra.jpg', NULL, 'fileskripsi/1760861774_503190006_Raihan_Saputra.pdf', NULL, '2025-10-19 08:16:14', '2025-10-19 08:16:14'),
(38, 38, 38, 'kartuanggota/1760861893_501210208_RTS._Bella_Shelomita.jpg', NULL, 'fileskripsi/1760861893_501210208_RTS._Bella_Shelomita.pdf', NULL, '2025-10-19 08:18:13', '2025-10-19 08:18:13'),
(39, 39, 39, 'kartuanggota/1760862012_504180099_Tania_Savitri.jpeg', NULL, 'fileskripsi/1760862012_504180099_Tania_Savitri.pdf', NULL, '2025-10-19 08:20:12', '2025-10-19 08:20:12'),
(40, 40, 40, 'kartuanggota/1760862094_501210291_Vera_Astuti.jpg', NULL, 'fileskripsi/1760862094_501210291_Vera_Astuti.pdf', NULL, '2025-10-19 08:21:34', '2025-10-19 08:21:34'),
(41, 41, 41, 'kartuanggota/1760862227_501210274_Vitrotun_Nadhea.jpg', NULL, 'fileskripsi/1760862227_501210274_Vitrotun_Nadhea.pdf', NULL, '2025-10-19 08:23:47', '2025-10-19 08:23:47'),
(42, 42, 42, 'kartuanggota/1760868145_504200027_Rizky_Alliyah_Syafitri.jpg', NULL, 'fileskripsi/1760868145_504200027_Rizky_Alliyah_Syafitri.pdf', NULL, '2025-10-19 10:02:25', '2025-10-19 10:02:25');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `notelp` varchar(15) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `nim` varchar(20) DEFAULT NULL,
  `password` varchar(65) DEFAULT NULL,
  `prodi_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `notelp`, `alamat`, `nim`, `password`, `prodi_id`, `created_at`, `updated_at`) VALUES
(1, 'Aprilla Jumiyati', '0823565432123', 'Jambi', '504220185', '$2y$10$8aEzwjcmGVlY2hdhCfhrwOxrGLdsNCpaBwvrCovQW/emGz.506mX.', 3, '2025-10-18 06:39:54', '2025-10-18 06:39:54'),
(2, 'Azzahra', NULL, NULL, '501210145', '$2y$10$SkYYmgn/BIvOk4RY86/LMeXpgZQmx8bVPj1NU5/ceTAhnqgsYvMUy', 1, '2025-10-18 06:48:05', '2025-10-18 06:48:05'),
(3, 'Dinda Wahdini', '081932134532', 'Jambi', '503210105', '$2y$10$Nx5MvWqdDa3mWclDPe97LetL5ewJ7SBXySyxX1Gd/NgN4K78kIOPe', 2, '2025-10-18 06:51:53', '2025-10-18 06:51:53'),
(4, 'Hariyati Putri', NULL, NULL, '501200518', '$2y$10$9TS2px7NvcMbUGHgH8mPCORfQ7SYfrKTgLRyG321UiBk/C883F41O', 1, '2025-10-18 06:54:24', '2025-10-18 06:54:24'),
(5, 'Mailin Permata Sari', NULL, NULL, '5042101003', '$2y$10$usliuI2O548r.OKwR8AIO.clJwV.h4tNQXc8uespOUv9rIj5Q8lzq', 3, '2025-10-18 07:08:31', '2025-10-18 07:08:31'),
(6, 'Erni Puspitasari', NULL, NULL, '502210064', '$2y$10$U/aFxwrJz049nt97wuwvHe1K4yPvjQv8NL2FjNqRtNCz/OUgixZ8u', 4, '2025-10-18 07:17:27', '2025-10-18 07:17:27'),
(7, 'Mutiara Fajar Septia', NULL, NULL, '503210140', '$2y$10$9CkkuAijdLEzk3L0l.095u7vYj8z3Pjw7WZqAi7SQRfMwTs.dtbz2', 2, '2025-10-18 07:24:30', '2025-10-18 07:24:30'),
(8, 'Paizah Rahmayeni', NULL, NULL, '503210082', '$2y$10$H.zNJ1U5vsP1YQO2qEaGiuVuRqjhbQuXHe4iZDgsgHumddTE6iMP2', 2, '2025-10-18 10:44:54', '2025-10-18 10:44:54'),
(9, 'Putri Krisdayana', NULL, NULL, '501210285', '$2y$10$txLz1aUn/67VpDcQ4dktfe7bvoApsO7bZW7evGekIdoesqhXkzpZ6', 1, '2025-10-18 10:47:34', '2025-10-18 10:47:34'),
(10, 'Riska Eviolina', NULL, NULL, '503210089', '$2y$10$Sdo2XngpSz502Ra8pX1VLu/llwfybhoIQnpFOskO4vfqMe8mJY6PC', 2, '2025-10-18 10:50:19', '2025-10-18 10:50:19'),
(11, 'Saydatun Nisya', NULL, NULL, '503210108', '$2y$10$tT/uRabmChQ26/iMnNHjuObq5s7YZ7RrjhKvTKpDqo7qPHncATzem', 2, '2025-10-18 10:52:01', '2025-10-18 10:52:01'),
(12, 'Aditya Warman', NULL, NULL, '502210061', '$2y$10$XeKMNPPh9iFmX3tOOmpmhOFvaLzqARfPBmnAMfjxikTQ94m3JRCLq', 4, '2025-10-19 06:10:55', '2025-10-19 06:10:55'),
(13, 'Afifah Izza', NULL, NULL, '503200078', '$2y$10$XvLQzRj.Ng1TTb0wSTduOeFJQBXJW3qZKs/DQAfqGVIcrEsvsJlvi', 2, '2025-10-19 06:15:13', '2025-10-19 06:15:13'),
(14, 'Rizza Desnita', NULL, NULL, '502210052', '$2y$10$2/nreVgX72GVRPY7dJ.7vu70CwxYYlTPxMRX6mx5ArDPjvdxvzu4G', 4, '2025-10-19 06:17:33', '2025-10-19 06:17:33'),
(15, 'Dea Handayani', NULL, NULL, '502200032', '$2y$10$JTax3sExB8fpDHz/e9kmEu9Xs2QqP203GjXFkvWBFrR9Uf3NRNwR2', 4, '2025-10-19 06:21:06', '2025-10-19 06:21:06'),
(16, 'M. Farhan Haqiqi', NULL, NULL, '501190306', '$2y$10$exIXkTbAbYqKuGcHNPQvjeu66QfEe6.EFbTvypPebeyakH/R0DRQm', 1, '2025-10-19 06:23:05', '2025-10-19 06:23:05'),
(17, 'Rio Saputra', NULL, NULL, '501210077', '$2y$10$kcl/ii4vzXEOCKJ17EI61u2s84FHaukWyhNi9cyPpMPx9jkdpJlZW', 1, '2025-10-19 06:25:50', '2025-10-19 06:25:50'),
(18, 'Mirta Yulinar', NULL, NULL, '502210093', '$2y$10$SisrGOSrC4offGtLzSHSxO6qfqeYPIB5GBQ/l1vxo51wzaAByGABW', 4, '2025-10-19 06:43:10', '2025-10-19 06:43:10'),
(19, 'Muhammad Iqbal Hakim', NULL, NULL, '504200087', '$2y$10$IdNiGtJfj39d7eN9MiFPDOB1ASdWgtZA5g.kN/Bp3mPu6lRcnt34G', 3, '2025-10-19 06:45:12', '2025-10-19 06:45:12'),
(20, 'Riki Saputra', NULL, NULL, '501200431', '$2y$10$aP66EQZPZjRzZsFNyqbiBuzFwdGTIfXW4ajyme2xe34cJG2jeeDoC', 1, '2025-10-19 06:48:16', '2025-10-19 06:48:16'),
(21, 'Rocky Bastian', NULL, NULL, '501180130', '$2y$10$TE43bp33KNrs0quU6605UukMqQjGlXHWYwEOFXe.SYMqnlKfb9YbS', 1, '2025-10-19 06:49:50', '2025-10-19 06:49:50'),
(22, 'Safna Ardianti', NULL, NULL, '502210017', '$2y$10$FWcmXQdDBvECzysIUxzLNeRBpPcmmipE8aZKa.Z5fjL6BngU9c2l.', 4, '2025-10-19 06:51:05', '2025-10-19 06:51:05'),
(23, 'Santi Dwi Haryani', NULL, NULL, '501200040', '$2y$10$Ru0W9oe9H3GjGuUk1Du/zuufruSV84.MLDo.3BQla4JFlSfs.1TFq', 1, '2025-10-19 07:30:15', '2025-10-19 07:30:15'),
(24, 'Winy Meldani', NULL, NULL, '501190364', '$2y$10$xUIKziT0twJVen4uSDVP8efC6DhC/XtMN4SeFszaoEtJ5761M3K5y', 1, '2025-10-19 07:31:59', '2025-10-19 07:31:59'),
(25, 'Agung Nur Arobi', '082281830502', 'Desa pinang gading kec. merlung kab. Tanjung Jabung Barat', '501190293', '$2y$10$TPjUCKLOnPtd4kKcWUi5/u9b3oiDDDIMnZxBpszysHTBt1WK11hKe', 1, '2025-10-19 07:51:48', '2025-10-19 07:51:48'),
(26, 'Dandi Kurnia', '082311008150', 'Desa tuo ilir', '501190322', '$2y$10$sOHvrfkVtz7Os3VK4tQPqOK4wdHSiH2fzDzyTB3wpZdK7fH9GRXG6', 1, '2025-10-19 07:54:02', '2025-10-19 07:54:02'),
(27, 'Deva Fitriani', '088267075859', 'Jl. Suak Kandis Km 06. Pudak Kumpeh Ulu, Muaro Jambi', '501210148', '$2y$10$z0OS9naWctTS7xCIqJjKeuILMrUreE20gAlVoPrmjLHfcQ0aUT5ea', 1, '2025-10-19 07:57:03', '2025-10-19 07:57:03'),
(28, 'Ferlinda Agustina', '083121460557', 'Perum Edelweis Blok E No. 12 RT 12', '501200626', '$2y$10$Q64BmgHBePUdLxerM5OC9eF1DHSfpT8Y9QFrAx2Cqg3F030UEcUGK', 1, '2025-10-19 07:58:49', '2025-10-19 07:58:49'),
(29, 'Harma Nika', '081293060175', 'Simpang Narso Rt 12 Rw 05 Batang Asai', '502210055', '$2y$10$ALTLQFHDoDe3AZtbIlYpFewlc1me39tBsMRt8bWsyNOvrSsshzJUK', 4, '2025-10-19 08:00:58', '2025-10-19 08:00:58'),
(30, 'Khoiriyah', '083898509086', 'Jl. Danau Siping Rt 24 Kec Danau Sipin Kel. Legok Kota Jambi', '501210264', '$2y$10$b6T5Su/E/eRr3liPjzzgOufiCjoOwfLtxB3zm4AMCEvV3Ur1rU3pa', 1, '2025-10-19 08:03:34', '2025-10-19 08:03:34'),
(31, 'Kisan Desvalingga', '082373441810', 'Trans Pangkalan Kec Rawas Ulu, Kab Musi Rawas Utara', '503190150', '$2y$10$JwmgJjUKG22FIwX/Bv.dJOi7Zr21CNoJVDtWhAYqnw7fbkXuxTuF2', 2, '2025-10-19 08:05:30', '2025-10-19 08:05:30'),
(32, 'Maryani', '081532783033', 'Teluk RT 01. Kec Pemayung, Kab Batang Hari Jambi', '503210069', '$2y$10$drFmZTntyUyZj31iR.6LIui8NmGa4HW8AMrju5FH8BYZg6FT3NZWe', 2, '2025-10-19 08:06:56', '2025-10-19 08:06:56'),
(33, 'Meli Nispiarli', '082110805591', 'Teluk Rendah', '503210014', '$2y$10$ZKzEXsSuaNpHj4pw29o89unFhYoAhXkMWXfKlWv4onltF0QO5A9zO', 2, '2025-10-19 08:08:30', '2025-10-19 08:08:30'),
(34, 'Meisi Suprihatin', '082264946955', 'Talang Bukit Rt 06 Sungai Bahar', '503210071', '$2y$10$HsJmzKONC1qOnkqAbQSx.OVft3zpd8MafFCz8w0KTUPPjNVkHDIy6', 2, '2025-10-19 08:10:09', '2025-10-19 08:10:09'),
(35, 'Muhammad', '089667933706', 'Jl. Kh. Abdul Aziz No. 86 Kel Tahtul Yaman', '501180105', '$2y$10$7h4ao8GRB.laAP4TOAtX/OxbWKm74yhnQWPPrTz9l12iuAYvh2r1i', 1, '2025-10-19 08:11:41', '2025-10-19 08:11:41'),
(36, 'Netty Purnama Sari', '082371990743', 'Jl. Sungai Bayur, Rt. 26 Kab. Sarolangun', '501210096', '$2y$10$/S/Qr52xL.5...ECf2aXduH3RBLBovENZbsQzQLu16JAz2.pawcua', 1, '2025-10-19 08:13:10', '2025-10-19 08:13:10'),
(37, 'Raihan Saputra', '082248614214', 'Sitombol, Padang Gelur Kec. Padang Gelugur, Kab. Pasaman', '503190006', '$2y$10$NXd7SHIWMIeSAxlix1D81ejAkIn/dbI/HUQAIpjou7pOEDYurrbKK', 2, '2025-10-19 08:15:05', '2025-10-19 08:15:05'),
(38, 'RTS. Bella Shelomita', '0895619937134', 'Perum Kota Baru Indah, Kec. Alam Barajo, Kenali Besar', '501210208', '$2y$10$jVUPssEgC4pEE2fzn5VJAOyW/6bopIhX3hbM6/th.MrubQUjcqQIG', 1, '2025-10-19 08:17:14', '2025-10-19 08:17:14'),
(39, 'Tania Savitri', '082210250084', 'Jl. Lintas Timur Km 113, Desa Tanjung Paku, Kec. Merlung', '504180099', '$2y$10$4SX2QN9gcv9uh8IiPS10yuHCu4ZHmOKP8txF3jA4ypb9lgjpMDhGi', 3, '2025-10-19 08:19:27', '2025-10-19 08:19:27'),
(40, 'Vera Astuti', '081379350753', 'Pulau Pinang Sarolangun Kembang Sarolangun', '501210291', '$2y$10$oMPdoAtAZ5ncFXxKFlT7tuhrraWdbQVqbdet1VYY7Rog2cILSxNf.', 1, '2025-10-19 08:20:54', '2025-10-19 08:20:54'),
(41, 'Vitrotun Nadhea', '081224211529', 'Lubuk Kepayang', '501210274', '$2y$10$FP7pWLEg9F/w2iDs0qhU1eThxmtqv5F98oRXaoIJbp6.IdvkxgURu', 1, '2025-10-19 08:23:00', '2025-10-19 08:23:00'),
(42, 'Rizky Alliyah Syafitri', '081376567721', 'Jambi', '504200027', '$2y$10$XBr7Y/IWzCH24OkevXPBJutK.c96HQka/8MevSvYOnKFj/NrwtfUq', 3, '2025-10-19 10:01:25', '2025-10-19 10:01:25');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswafoto`
--

CREATE TABLE `mahasiswafoto` (
  `id` int(11) NOT NULL,
  `mahasiswa_id` int(11) DEFAULT NULL,
  `foto` longblob DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan`
--

CREATE TABLE `pengaturan` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jenis` enum('info','viewweb') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pengaturan`
--

INSERT INTO `pengaturan` (`id`, `nama`, `deskripsi`, `jenis`, `created_at`, `updated_at`) VALUES
(1, 'Nama', '<p>PERPUSTAKAAN FEBI</p>', 'info', '2025-09-05 07:53:27', '2025-10-09 01:29:46'),
(2, 'Alamat', '<p>Jl. Lintas Jambi-Muara Bulian KM. 16, Simpang Sungai Duren, Kabupaten Muaro Jambi, Jambi 36361</p>', 'info', '2025-09-05 07:53:27', '2025-09-05 07:53:27'),
(3, 'No Telp', '<p>-</p>', 'info', '2025-09-05 07:53:40', '2025-09-05 07:53:40'),
(4, 'Nama Kabag', '<p>Dian Fidyati, S.Pd.I</p>', 'info', '2025-10-10 06:53:30', '2025-10-10 06:53:30'),
(5, 'NIP Kabag', '<p>19830414 200501 2 007</p>', 'info', '2025-10-10 06:53:46', '2025-10-10 06:53:46'),
(6, 'Petunjuk Pengisian', '<ol>\r\n<li>Isi data semester sesuai dengan semester terakhir anda</li>\r\n<li>Pilih <strong>Ya</strong> apabila anda telah memiliki kartu perpustakaan Fakultas Ekonomi dan Bisnis Islam, Pilih <strong>Tidak</strong> apabila anda tidak memiliki kartu Perpustakaan FEBI anda di wajibkan untuk melakukan upload foto untuk pendataan data Anggota Perpustakaan</li>\r\n<li>Inputkan nomor kartu anggota apabila anda memiliki kartu anggota perpustakaan FEBI</li>\r\n<li>Upload Foto Kartu Anggota Perpustakaan FEBI</li>\r\n<li>Upload Skripsi yang telah di sahkan dan di beri watermark dengan logo UIN STS Jambi</li>\r\n<li>Isi tanggal surat sesuai tanggal data di inputkan, jangan di kosongkan</li>\r\n<li>Apabila berkas telah selesai di verifikasi dan status <strong>Diterima</strong> maka anda tidak boleh lagi melakukan perubahan. Download dan cetak bukti upload untuk di bawak pada saat penyerahan bebas pustaka</li>\r\n<li>Setelah semua berkas di terima maka selanjutnya anda dapat mencetak surat Bebas Pustaka</li>\r\n</ol>', 'viewweb', NULL, '2025-10-14 12:49:55'),
(7, 'Alur Bebas Pustaka', '<ul>\r\n<li>Daftar dan login Aplikasi</li>\r\n</ul>', 'viewweb', NULL, '2025-10-14 13:10:46');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Ekonomi Syariah', '2025-09-05 07:34:10', '2025-09-05 07:34:10'),
(2, 'Akuntansi Syariah', '2025-09-05 07:34:31', '2025-09-05 07:34:31'),
(3, 'Manajemen Keuangan Syariah', '2025-09-05 07:34:42', '2025-09-05 07:34:42'),
(4, 'Perbankan Syariah', '2025-09-05 07:34:47', '2025-09-05 07:34:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bebaspustaka`
--
ALTER TABLE `bebaspustaka`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_MAHASISWA` (`mahasiswa_id`),
  ADD KEY `IDX_STATUSPENGAJUAN` (`statuspengajuan`),
  ADD KEY `IDX_CETAKSURAT` (`cetaksurat`);

--
-- Indexes for table `bebaspustakafile`
--
ALTER TABLE `bebaspustakafile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_MAHASISWA` (`mahasiswa_id`),
  ADD KEY `IDX_BEBASPUSTAKA` (`bebaspustaka_id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_NIM` (`nim`);

--
-- Indexes for table `mahasiswafoto`
--
ALTER TABLE `mahasiswafoto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bebaspustaka`
--
ALTER TABLE `bebaspustaka`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `bebaspustakafile`
--
ALTER TABLE `bebaspustakafile`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `mahasiswafoto`
--
ALTER TABLE `mahasiswafoto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
