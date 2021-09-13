-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Sep 2021 pada 14.25
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `posku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `barang_id` int(11) NOT NULL,
  `barcode` varchar(100) DEFAULT NULL,
  `barang_nama` varchar(100) DEFAULT NULL,
  `kategori_id` int(11) NOT NULL,
  `satuan_id` int(11) NOT NULL,
  `harga` int(11) DEFAULT NULL,
  `stok` int(11) NOT NULL DEFAULT 0,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`barang_id`, `barcode`, `barang_nama`, `kategori_id`, `satuan_id`, `harga`, `stok`, `created`, `updated`) VALUES
(1, 'A0001', 'Prenagen', 3, 3, 50000, 0, '2021-09-04 06:47:32', NULL),
(2, 'A0002', 'Bimoli', 4, 3, 30000, 0, '2021-09-05 02:10:05', NULL),
(3, 'A0003', 'Citoz', 2, 2, 65000, 0, '2021-09-06 13:31:55', NULL),
(5, 'A0005', 'Pepsodent', 4, 2, 7000, 0, '2021-09-06 21:35:12', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_nama`, `created`, `updated`) VALUES
(2, 'Makanan', '2021-09-02 01:42:39', '2021-09-05 02:00:43'),
(3, 'Minuman', '2021-09-02 10:48:33', NULL),
(4, 'Sembako', '2021-09-03 15:47:51', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `level_id` int(1) NOT NULL,
  `level` varchar(15) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`level_id`, `level`, `keterangan`) VALUES
(1, 'Admin', NULL),
(2, 'Kasir', NULL),
(3, 'Pemilik', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `pelanggan_id` int(11) NOT NULL,
  `pelanggan_nama` varchar(100) NOT NULL,
  `jenis_kel` enum('L','P') NOT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `telepon` varchar(15) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`pelanggan_id`, `pelanggan_nama`, `jenis_kel`, `alamat`, `telepon`, `created`, `updated`) VALUES
(4, 'Supri', 'L', 'Subang', '08211433545', '2021-09-01 22:05:56', NULL),
(6, 'Nina', 'P', 'Jakarta', '082114339165', '2021-09-01 22:21:44', '2021-09-01 20:06:58'),
(7, 'Cecep', 'L', 'Groove street', '12412414343', '2021-09-02 01:06:46', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan`
--

CREATE TABLE `satuan` (
  `satuan_id` int(11) NOT NULL,
  `satuan_nama` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `satuan`
--

INSERT INTO `satuan` (`satuan_id`, `satuan_nama`, `created`, `updated`) VALUES
(2, 'Dus', '2021-09-02 01:42:39', '2021-09-02 06:00:38'),
(3, 'Box', '2021-09-02 10:48:33', '2021-09-02 06:00:49'),
(4, 'Pouch', '2021-09-05 02:10:22', '2021-09-04 21:10:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `supplier_nama` varchar(100) NOT NULL,
  `kontak_person` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_nama`, `kontak_person`, `alamat`, `telepon`, `keterangan`, `created`, `updated`) VALUES
(1, 'PT. Indofud', 'Josuke', 'Jl. Morioh 33 Ciledug', '082114339153', NULL, '2021-08-31 10:18:14', NULL),
(2, 'PT. Dapur Ngebul', 'Ridzi', 'Jl. Raup 12 Ciripang', '085204334955', 'Supplier ini gg gaming semua isinya', '2021-08-31 10:18:14', '2021-09-03 23:00:58'),
(8, 'asdasd', 'gsfd', 'dadad', '12412414', NULL, '2021-09-02 00:59:57', NULL),
(9, 'asdasd', 'sfs', 'csa', '12412414', NULL, '2021-09-02 01:00:30', NULL),
(10, 'ashhh', 'zfdzf', 'fet', '1241234', NULL, '2021-09-02 01:05:17', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `level_id` int(1) NOT NULL COMMENT '1=admin;2=kasir;3=pemilik'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `nama`, `alamat`, `level_id`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Bhakti', 'Tangerang', 1),
(3, 'Taba123', '8cb2237d0679ca88db6464eac60da96345513964', 'Taba', 'Jakarta', 3),
(5, 'Tia123', '7b21848ac9af35be0ddb2d6b9fc3851934db8420', 'Tia', NULL, 2),
(6, 'asep123', '360f155d705504807e86211e298c97a29cb6e52e', 'Asep Euy', 'Bogor', 2),
(13, 'angelchan', '8cb2237d0679ca88db6464eac60da96345513964', 'Angel', 'Jakarta', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`barang_id`),
  ADD KEY `kategori_id` (`kategori_id`),
  ADD KEY `satuan_id` (`satuan_id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`level_id`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`pelanggan_id`);

--
-- Indeks untuk tabel `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`satuan_id`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `fklevel` (`level_id`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `barang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `pelanggan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `satuan`
--
ALTER TABLE `satuan`
  MODIFY `satuan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`kategori_id`),
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`satuan_id`) REFERENCES `satuan` (`satuan_id`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`level_id`) REFERENCES `level` (`level_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
