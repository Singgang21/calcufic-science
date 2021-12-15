-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Des 2021 pada 15.26
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbcrud`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(35) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `nama`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 'admin'),
(4, 'Rosi', 'c6f057b86584942e415435ffb1fa93d4', 'Rosi'),
(5, 'Bintang', '698d51a19d8a121ce581499d7b701668', 'Bintang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_user`
--

CREATE TABLE `data_user` (
  `id` int(5) NOT NULL,
  `nim` varchar(50) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `foto` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_user`
--

INSERT INTO `data_user` (`id`, `nim`, `nama`, `alamat`, `telp`, `foto`) VALUES
(9, '2041720010  ', 'Keke  Aileena  ', 'Bantul, Jawa Tengah', '081234671389', '2041720010 .png'),
(11, '2041720215  ', 'Aisyahzaara Bilqist Putri ', 'Kediri, Jawa Timur', '081209671389', ''),
(12, '2041720111 ', ' Andhara Blossom ', 'Malang, Jawa Timur', '082237713897', ''),
(13, '2041720301  ', 'Eleanor Faranisa  ', 'Kemayoran, Jakarta Pusat', '081259698385', '2041720301 .png'),
(14, '2041720119  ', 'Adira Fairuz  ', 'Bekasi, Jawa Barat', '081237713990', '2041720119 .png'),
(15, '2041720311  ', 'Adiwangsa Aji  ', 'Cirebon, Jawa Barat', '081236713899', '2041720311 .png'),
(17, '2041720020', 'Yuanita Amalia', 'Pare', '', '-'),
(18, '2041720217  ', 'Andri  ', 'Kediri', '082237713897', '2041720217 .png'),
(19, '2041720029 ', 'Ahmad ', 'Malang', '081236713800', '2041720029.png'),
(21, '2041720011 ', 'Amir  ', 'Pare', '081209671380', '2041720017.png'),
(26, '2041720110   ', 'Andini Permatasari ', 'Blitar', '', '2041720110 .png'),
(33, '2041720029 ', 'Salsabela ', 'Pare', '081234671389', '2041720029.png'),
(34, '2041720110 ', 'Latansa ', 'Kediri', '081259698385', '2041720110.png'),
(29, '2041720010', 'Salsabela', 'psdavj', '081236713800', '-'),
(32, '2041720301', 'Latansa', 'ewfaca', '082237713897', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `history`
--

CREATE TABLE `history` (
  `id` int(5) NOT NULL,
  `nilai_a` varchar(100) NOT NULL,
  `nilai_b` varchar(100) NOT NULL,
  `operator` varchar(200) NOT NULL,
  `hasil` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `history`
--

INSERT INTO `history` (`id`, `nilai_a`, `nilai_b`, `operator`, `hasil`) VALUES
(1, 'aan', 'pt putri', 'jogja', '100k'),
(7, 'Widodo', 'pt putri', 'yky', ''),
(8, 'Wintolo', 'p', 'k', ''),
(10, 'Anton', 'kkk', '', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `data_user`
--
ALTER TABLE `data_user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `history`
--
ALTER TABLE `history`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
