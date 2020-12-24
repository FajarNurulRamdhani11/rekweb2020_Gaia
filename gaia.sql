-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Des 2020 pada 09.30
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gaia`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `nama`, `kode`, `kategori`, `harga`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'sweater item titik', 'sweater-item-titik', 'sweater', 100003, 'baju.jpg', NULL, '2020-12-24 02:02:16'),
(2, 'kameja kotak kotak', '#2123', 'Kameja', 12312, 'baju1.jpg', NULL, NULL),
(6, 'wqe', 'wqe', 'qwert', 115, '1608791572_b73eccc20c1d6246d622.jpg', '2020-12-24 00:32:52', '2020-12-24 02:02:29'),
(8, 'asdas', 'asdas', 'wqeqw', 222222, '1608792080_eb9103f7dccd3bee9177.jpg', '2020-12-24 00:41:20', '2020-12-24 01:44:44'),
(10, 'werwe', 'werwe', 'werwe', 333, '1608793230_151f5c9eadf1adfc926e.jpg', '2020-12-24 01:00:30', '2020-12-24 01:00:30'),
(11, 'sdfsdf', 'sdfsdf', 'sdfsdf', 232, '1608793240_538a1cac7aeb7021e853.jpg', '2020-12-24 01:00:40', '2020-12-24 01:00:40'),
(12, 'rwer11', 'rwer11', 'werwe', 3223, '1608793257_5c2d7a5d5204e42dba06.jpg', '2020-12-24 01:00:57', '2020-12-24 01:33:24'),
(13, 'dsffsd', 'dsffsd', 'qweqss', 333344, '1608795233_a9e6ac1093180ba8fcfb.jpg', '2020-12-24 01:33:53', '2020-12-24 01:38:25');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
