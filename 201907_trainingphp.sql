-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jun 2020 pada 10.40
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `201907_trainingphp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_barang`
--

CREATE TABLE `m_barang` (
  `brg_id` int(11) NOT NULL,
  `brg_nama` varchar(50) NOT NULL,
  `brg_harga` float NOT NULL,
  `brg_stok` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_barang`
--

INSERT INTO `m_barang` (`brg_id`, `brg_nama`, `brg_harga`, `brg_stok`) VALUES
(3, 'Vit', 800, 142),
(4, 'pensil', 3455, 9),
(5, 'mizone', 5000, 41),
(6, 'aqua', 4000, 55),
(7, 'Le Minerale', 3500, 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_user`
--

CREATE TABLE `m_user` (
  `user_id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `user_password` varchar(25) NOT NULL,
  `user_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_user`
--

INSERT INTO `m_user` (`user_id`, `nama`, `user_name`, `email`, `user_password`, `user_active`) VALUES
(1, 'Kunsarifan', 'Kunsarifan', 'kunsarifan@gmail.com', 'admin', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tr_penjualan`
--

CREATE TABLE `tr_penjualan` (
  `jual_id` int(11) NOT NULL,
  `jual_tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `jual_kode` varchar(25) NOT NULL,
  `jual_total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tr_penjualan`
--

INSERT INTO `tr_penjualan` (`jual_id`, `jual_tanggal`, `jual_kode`, `jual_total`) VALUES
(15, '2020-05-05 12:51:49', 'TR202005001', 20000),
(16, '2020-05-16 09:11:04', 'TR202005002', 15000),
(17, '2020-05-16 12:28:09', 'TR202005003', 6910);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tr_penjualandetail`
--

CREATE TABLE `tr_penjualandetail` (
  `det_id` int(11) NOT NULL,
  `jual_kode` varchar(25) NOT NULL,
  `det_jumlah` int(5) NOT NULL,
  `brg_id` int(11) NOT NULL,
  `det_subtotal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tr_penjualandetail`
--

INSERT INTO `tr_penjualandetail` (`det_id`, `jual_kode`, `det_jumlah`, `brg_id`, `det_subtotal`) VALUES
(85, 'TR202005001', 4, 5, 20000),
(86, 'TR202005002', 3, 5, 15000),
(87, 'TR202005003', 2, 4, 6910),
(88, 'TR202005004', 2, 4, 6910),
(89, 'TR202005004', 2, 5, 10000);

--
-- Trigger `tr_penjualandetail`
--
DELIMITER $$
CREATE TRIGGER `batal_beli` AFTER DELETE ON `tr_penjualandetail` FOR EACH ROW BEGIN
UPDATE m_barang SET brg_stok = brg_stok + old.det_jumlah
WHERE
brg_id = old.brg_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updatestok_afterinsert` AFTER INSERT ON `tr_penjualandetail` FOR EACH ROW BEGIN
	UPDATE m_barang set brg_stok=brg_stok-new.det_jumlah
    WHERE brg_id=new.brg_id;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `m_barang`
--
ALTER TABLE `m_barang`
  ADD PRIMARY KEY (`brg_id`);

--
-- Indeks untuk tabel `m_user`
--
ALTER TABLE `m_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indeks untuk tabel `tr_penjualan`
--
ALTER TABLE `tr_penjualan`
  ADD PRIMARY KEY (`jual_id`);

--
-- Indeks untuk tabel `tr_penjualandetail`
--
ALTER TABLE `tr_penjualandetail`
  ADD PRIMARY KEY (`det_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `m_barang`
--
ALTER TABLE `m_barang`
  MODIFY `brg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `m_user`
--
ALTER TABLE `m_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tr_penjualan`
--
ALTER TABLE `tr_penjualan`
  MODIFY `jual_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tr_penjualandetail`
--
ALTER TABLE `tr_penjualandetail`
  MODIFY `det_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
