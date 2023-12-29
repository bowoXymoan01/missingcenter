-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Des 2023 pada 23.32
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `missingcenter`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_hilang`
--

CREATE TABLE `barang_hilang` (
  `idbarang` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `telepon` char(12) NOT NULL,
  `nim` int(11) DEFAULT NULL,
  `namabarang` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `tempatkehilangan` varchar(255) NOT NULL,
  `tglhilang` date NOT NULL,
  `wkthilang` time DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_temuan`
--

CREATE TABLE `barang_temuan` (
  `id` int(10) NOT NULL,
  `tipe` varchar(20) NOT NULL,
  `merek` varchar(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` varchar(25) NOT NULL,
  `tanggal` date NOT NULL,
  `lokasi` varchar(20) NOT NULL,
  `status` varchar(50) NOT NULL,
  `waktu` time DEFAULT NULL,
  `gambar` varchar(50) DEFAULT NULL,
  `telepon` char(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontak_kami`
--

CREATE TABLE `kontak_kami` (
  `id` int(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nim` int(10) NOT NULL,
  `telepon` char(13) NOT NULL,
  `pesan` varchar(255) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_barang`
--

CREATE TABLE `log_barang` (
  `id` int(255) NOT NULL,
  `telepon` char(13) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `waktu` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_usermhs`
--

CREATE TABLE `log_usermhs` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `waktu` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `iduser` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('admin','user') NOT NULL,
  `nama` char(100) NOT NULL,
  `nim` varchar(7) NOT NULL,
  `nowa` char(13) NOT NULL,
  `gambar` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `usermhs`
--

CREATE TABLE `usermhs` (
  `iduser` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `nim` varchar(7) NOT NULL,
  `no_wa` char(12) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang_hilang`
--
ALTER TABLE `barang_hilang`
  ADD PRIMARY KEY (`idbarang`);

--
-- Indeks untuk tabel `barang_temuan`
--
ALTER TABLE `barang_temuan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kontak_kami`
--
ALTER TABLE `kontak_kami`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `log_barang`
--
ALTER TABLE `log_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `log_usermhs`
--
ALTER TABLE `log_usermhs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`iduser`);

--
-- Indeks untuk tabel `usermhs`
--
ALTER TABLE `usermhs`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang_hilang`
--
ALTER TABLE `barang_hilang`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `barang_temuan`
--
ALTER TABLE `barang_temuan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kontak_kami`
--
ALTER TABLE `kontak_kami`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `log_barang`
--
ALTER TABLE `log_barang`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `log_usermhs`
--
ALTER TABLE `log_usermhs`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `iduser` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `usermhs`
--
ALTER TABLE `usermhs`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
