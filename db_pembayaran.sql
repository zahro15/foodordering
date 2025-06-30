-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jun 2025 pada 21.12
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pembayaran`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `nama_produk` varchar(100) DEFAULT NULL,
  `size` varchar(20) DEFAULT NULL,
  `topping` text DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `metode` varchar(20) DEFAULT NULL,
  `bank` varchar(20) DEFAULT NULL,
  `angka_tf` varchar(50) DEFAULT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `nama_produk`, `size`, `topping`, `qty`, `total`, `metode`, `bank`, `angka_tf`, `waktu`) VALUES
(6, 'Skin Cake', 'Medium', 'Choco', 1, 32000, 'Cash', '0', '', '2025-06-24 16:27:20'),
(7, 'Floating Cake', 'Small', 'Choco', 1, 27000, '', NULL, NULL, '2025-06-24 17:02:08'),
(8, 'Pound Cake', 'Medium', 'Cerry', 1, 22000, '', NULL, NULL, '2025-06-24 17:03:34'),
(9, 'Sponge Cake', 'Medium', 'Chip', 1, 32000, 'Cash', '0', '', '2025-06-24 17:52:49'),
(11, 'Oreo', 'Medium', 'Choco', 1, 32000, 'Transfer', '0', '12345', '2025-06-25 14:01:43'),
(12, 'Cake Love', 'Medium', 'Choco', 1, 27000, 'Cash', '0', '', '2025-06-25 17:48:05'),
(13, 'Floating Cake', 'Small', 'Choco', 1, 27000, 'Cash', '0', '', '2025-06-25 18:14:35'),
(14, 'Oreo', 'Medium', 'Cerry', 1, 32000, 'Cash', '0', '', '2025-06-25 18:26:09'),
(15, 'Pig Cake', 'Medium', 'Choco', 1, 22000, 'Cash', '0', '', '2025-06-25 18:39:57'),
(16, 'Cerry', 'Medium', 'Cerry', 1, 32000, 'Cash', '0', '', '2025-06-25 18:42:07'),
(17, 'Pound Cake', 'Medium', 'Choco', 1, 22000, 'Cash', '0', '', '2025-06-26 14:09:02'),
(18, 'Pig Cake', 'Medium', 'Choco', 1, 22000, 'Cash', '0', '', '2025-06-26 15:02:18'),
(19, 'Butter Cake', 'Medium', 'Chip', 1, 27000, 'Cash', '0', '', '2025-06-26 15:07:25'),
(20, 'Skin Cake', 'Medium', 'Choco', 1, 32000, 'Cash', '0', '', '2025-06-26 15:08:22'),
(21, 'Oreo', 'Medium', 'Choco', 1, 32000, 'Transfer', '0', '09876', '2025-06-26 15:10:21'),
(22, 'Cake Love', 'Medium', 'Choco', 2, 54000, 'Cash', '0', '', '2025-06-26 15:17:20'),
(23, 'Floating Cake', 'Medium', 'Choco', 1, 37000, 'Cash', '0', '', '2025-06-26 15:26:10'),
(24, 'Skin Cake', 'Medium', 'Choco', 1, 32000, 'Transfer', '0', '09876', '2025-06-26 15:28:10'),
(25, 'Pound Cake', 'Medium', 'Choco', 1, 22000, 'Cash', '0', '', '2025-06-26 15:40:56'),
(26, 'Pound Cake', 'Medium', 'Choco', 1, 22000, 'Transfer', '0', '09876', '2025-06-26 16:03:45'),
(27, 'Skin Cake', 'Medium', 'Choco', 1, 32000, 'Cash', '0', '', '2025-06-26 16:22:17'),
(28, 'Skin Cake', 'Medium', 'Oreo', 1, 32000, 'Cash', '0', '', '2025-06-26 16:23:29'),
(29, 'Skin Cake', 'Large', 'Cerry', 1, 37000, 'Transfer', '0', '12345', '2025-06-26 16:24:22'),
(30, 'Oreo', 'Medium', 'Choco', 1, 32000, 'Cash', '0', '', '2025-06-26 17:07:26'),
(31, 'Skin Cake', 'Large', 'Chip', 1, 37000, 'Transfer', '0', '09876', '2025-06-26 17:08:30'),
(32, 'Butter Cake', 'Medium', 'Choco', 1, 27000, 'Cash', '0', '', '2025-06-27 13:00:11'),
(33, 'Butter Cake', 'Medium', 'Choco', 1, 27000, 'Cash', '0', '', '2025-06-27 14:41:48'),
(34, 'Skin Cake', 'Medium', 'Choco', 1, 32000, 'Transfer', '0', '09876', '2025-06-27 15:29:30'),
(35, 'Skin Cake', 'Medium', 'Chip', 1, 32000, 'Cash', '0', '', '2025-06-28 13:40:40'),
(36, 'Pig Cake', 'Medium', 'Choco', 1, 22000, 'Cash', '0', '', '2025-06-28 13:43:21'),
(37, 'Pound Cake', 'Medium', 'Choco', 1, 22000, 'Cash', '0', '', '2025-06-28 13:44:49'),
(38, 'Rool Cake', 'Small', 'Choco', 2, 44000, 'Cash', '0', '', '2025-06-28 14:13:24'),
(39, 'Skin Cake', 'Medium', 'Choco', 1, 32000, 'Cash', '0', '', '2025-06-28 15:14:32'),
(40, 'Pound Cake', 'Small', 'Choco', 1, 12000, 'Cash', '0', '', '2025-06-28 15:51:23'),
(41, 'Rool Cake', 'Medium', 'Choco', 1, 32000, 'Cash', '0', '', '2025-06-28 16:52:43'),
(42, 'Skin Cake', 'Medium', 'Choco', 1, 32000, 'Transfer', '0', '12345', '2025-06-28 16:53:53'),
(43, 'Skin Cake', 'Medium', 'Choco', 1, 32000, 'Transfer', '0', '09876', '2025-06-28 17:12:02'),
(44, 'Oreo', 'Medium', 'Oreo', 1, 32000, 'Transfer', '0', '09876', '2025-06-28 17:12:02'),
(45, 'Pound Cake', 'Medium', 'Choco', 1, 22000, 'Cash', '0', '', '2025-06-29 07:20:08'),
(46, 'Floating Cake', 'Medium', 'Choco', 1, 37000, 'Cash', '0', '', '2025-06-29 07:28:37'),
(47, 'Pound Cake', 'Medium', 'Choco', 1, 22000, 'Transfer', '0', '09876', '2025-06-29 07:31:30'),
(48, 'Sponge Cake', 'Medium', 'Choco', 1, 32000, 'Cash', '0', '', '2025-06-29 07:47:07'),
(49, 'Oreo', 'Medium', 'Choco', 1, 32000, 'Cash', '0', '', '2025-06-29 08:09:12'),
(50, 'Skin Cake', 'Medium', 'Choco', 1, 32000, 'Transfer', '0', '12345', '2025-06-29 09:37:55'),
(51, 'Floating Cake', 'Medium', 'Choco', 1, 37000, 'Transfer', '0', '12345', '2025-06-29 09:37:55'),
(52, 'Rool Cake', 'Large', 'Chip', 1, 37000, 'Cash', '0', '', '2025-06-29 09:42:58'),
(53, 'Oreo', 'Medium', 'Choco', 1, 32000, 'Cash', '0', '', '2025-06-29 10:22:12'),
(54, 'Pound Cake', 'Medium', 'Choco', 1, 22000, 'Cash', '0', '', '2025-06-29 14:14:12'),
(55, 'Pound Cake', 'Medium', 'Choco', 1, 22000, 'Cash', '0', '', '2025-06-29 14:19:44'),
(56, 'Butter Cake (x1), Skin Cake (x2)', NULL, NULL, NULL, 86450, 'Cash', 'BCA', '', '2025-06-29 14:50:06'),
(57, 'Pig Cake (x1)', NULL, NULL, NULL, 20900, 'Cash', 'BCA', '', '2025-06-29 14:51:55'),
(58, 'Oreo (x1)', NULL, NULL, NULL, 30400, 'Cash', 'BCA', '', '2025-06-29 14:52:59'),
(59, 'Sponge Cake (x1), Pig Cake (x1)', NULL, NULL, NULL, 72200, 'Cash', 'BCA', '', '2025-06-29 15:02:43'),
(60, 'Butter Cake (x1)', NULL, NULL, NULL, 25650, 'Cash', 'BCA', '', '2025-06-29 15:15:56'),
(61, 'Skin Cake (x1)', NULL, NULL, NULL, 30400, 'Cash', 'BCA', '', '2025-06-29 15:17:37'),
(62, 'Skin Cake (x1), Cake Love (x1)', NULL, NULL, NULL, 56050, 'Cash', 'BCA', '', '2025-06-29 15:18:25'),
(63, 'Rool Cake (x1)', NULL, NULL, NULL, 30400, 'Cash', 'BCA', '', '2025-06-29 15:21:53'),
(64, 'Skin Cake (x1)', NULL, NULL, NULL, 30400, 'Cash', 'BCA', '', '2025-06-29 15:25:18'),
(65, 'Pig Cake (x1)', NULL, NULL, NULL, 20900, 'Cash', 'BCA', '', '2025-06-29 15:26:48'),
(66, 'Skin Cake (x1)', NULL, NULL, NULL, 35150, 'Transfer', 'BRI', '09876', '2025-06-29 15:27:59'),
(67, 'Skin Cake (x1), Skin Cake (x1), Skin Cake (x1), Skin Cake (x1), Skin Cake (x1)', NULL, NULL, NULL, 35150, 'Cash', 'BCA', '', '2025-06-29 16:50:51'),
(68, 'Pound Cake (x1)', NULL, NULL, NULL, 22000, 'Cash', 'BCA', '', '2025-06-29 17:36:32'),
(69, 'Pig Cake (x1)', NULL, NULL, NULL, 20900, 'Cash', 'BCA', '', '2025-06-29 18:13:01'),
(70, 'Skin Cake (x1)', NULL, NULL, NULL, 19800, 'Cash', 'BCA', '', '2025-06-29 18:16:54'),
(71, 'Pound Cake (x1)', NULL, NULL, NULL, 19800, 'Cash', 'BCA', '', '2025-06-29 18:19:39'),
(72, 'Butter Cake (x1)', NULL, NULL, NULL, 28800, 'Cash', 'BCA', '', '2025-06-29 18:20:03'),
(73, 'Skin Cake (x1)', NULL, NULL, NULL, 28800, 'Cash', 'BCA', '', '2025-06-29 18:21:24'),
(74, 'Pig Cake (x1)', NULL, NULL, NULL, 19800, 'Cash', 'BCA', '', '2025-06-29 18:21:49'),
(75, 'Pound Cake (x1)', NULL, NULL, NULL, 19800, 'Cash', 'BCA', '', '2025-06-29 18:22:18'),
(76, 'Cake Love (x1)', NULL, NULL, NULL, 24300, 'Cash', 'BCA', '', '2025-06-29 18:22:45'),
(77, 'Oreo (x1)', NULL, NULL, NULL, 28800, 'Cash', 'BCA', '', '2025-06-29 18:23:48'),
(78, 'Rool Cake (x1)', NULL, NULL, NULL, 28800, 'Cash', 'BCA', '', '2025-06-29 18:24:11'),
(79, 'Skin Cake (x1)', NULL, NULL, NULL, 28800, 'Cash', 'BCA', '', '2025-06-29 18:24:35'),
(80, 'Pig Cake (x1)', NULL, NULL, NULL, 21340, 'Cash', 'BCA', '', '2025-06-29 18:25:03'),
(81, 'Floating Cake (x1)', NULL, NULL, NULL, 35890, 'Cash', 'BCA', '', '2025-06-29 18:38:31'),
(82, 'Sponge Cake (x1)', NULL, NULL, NULL, 21340, 'Cash', 'BCA', '', '2025-06-29 18:39:03'),
(83, 'Rool Cake (x2)', NULL, NULL, NULL, 71780, 'Cash', 'BCA', '', '2025-06-29 18:40:15'),
(84, 'Pig Cake (x1)', NULL, NULL, NULL, 21340, 'Cash', 'BCA', '', '2025-06-29 18:50:35'),
(85, 'Skin Cake (x1)', NULL, NULL, NULL, 20900, 'Cash', 'BCA', '', '2025-06-29 18:51:27');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
