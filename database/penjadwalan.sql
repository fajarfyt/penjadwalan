-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Jun 2020 pada 14.05
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjadwalan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_crane`
--

CREATE TABLE `m_crane` (
  `id_crane` varchar(20) NOT NULL,
  `desc_crane` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `m_crane`
--

INSERT INTO `m_crane` (`id_crane`, `desc_crane`) VALUES
('CR01', 'CRANE NO#01'),
('CR03', 'CRANE NO#03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_user`
--

CREATE TABLE `m_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `m_user`
--

INSERT INTO `m_user` (`id_user`, `nama_user`, `username`, `password`) VALUES
(1, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `scheduler`
--

CREATE TABLE `scheduler` (
  `id_sch` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_crane` int(11) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  `sparepart_name` varchar(255) NOT NULL,
  `durasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `training`
--

CREATE TABLE `training` (
  `id_training` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `hour_meter` int(11) NOT NULL,
  `breakdown` int(11) NOT NULL,
  `shutdown` int(11) NOT NULL,
  `sparepart` int(11) NOT NULL,
  `label` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `training`
--

INSERT INTO `training` (`id_training`, `tanggal`, `hour_meter`, `breakdown`, `shutdown`, `sparepart`, `label`) VALUES
(1, '2020-01-06', 2, 2, 2, 3, 'Berat'),
(2, '2020-01-06', 1, 2, 2, 2, 'Berat'),
(3, '2020-01-06', 2, 1, 2, 3, 'Berat'),
(4, '2020-01-06', 1, 2, 1, 4, 'Ringan'),
(5, '2020-01-06', 2, 1, 1, 4, 'Ringan'),
(6, '2020-01-06', 2, 1, 1, 3, 'Ringan');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `m_crane`
--
ALTER TABLE `m_crane`
  ADD PRIMARY KEY (`id_crane`);

--
-- Indeks untuk tabel `m_user`
--
ALTER TABLE `m_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `scheduler`
--
ALTER TABLE `scheduler`
  ADD PRIMARY KEY (`id_sch`);

--
-- Indeks untuk tabel `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`id_training`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `m_user`
--
ALTER TABLE `m_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `scheduler`
--
ALTER TABLE `scheduler`
  MODIFY `id_sch` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `training`
--
ALTER TABLE `training`
  MODIFY `id_training` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
