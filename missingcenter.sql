-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Des 2023 pada 11.53
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
  `nama` char(255) NOT NULL,
  `telepon` char(20) NOT NULL,
  `namabarang` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `tempatkehilangan` varchar(255) NOT NULL,
  `nim` int(10) NOT NULL,
  `tglhilang` date NOT NULL,
  `wkthilang` time NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang_hilang`
--

INSERT INTO `barang_hilang` (`idbarang`, `nama`, `telepon`, `namabarang`, `deskripsi`, `tempatkehilangan`, `nim`, `tglhilang`, `wkthilang`, `gambar`, `status`) VALUES
(24, 'Andre Wibowo', '083833123123', 'Gitar ', 'Yamaha tipe C330A warna kuning', 'GSC', 2205063, '2023-12-16', '16:30:00', '657d6e2aaa0fb.jpeg', 'belum ditemukan'),
(25, 'Andre Wibowo', '083833123123', 'Kunci Motor', 'Honda', 'GSC', 2205063, '2023-12-16', '16:30:00', '657d6e47280d2.jpg', 'belum ditemukan'),
(26, 'Andre Wibowo', '083833123123', 'laptop', 'hp', 'GSC', 2205063, '2023-12-16', '16:31:00', '657d6e66a224c.jpeg', 'belum ditemukan'),
(27, 'Andre Wibowo', '083833123123', 'charger laptop hp', 'warna hitam', 'GSC', 2205063, '2023-12-16', '16:31:00', '657d6e9735765.jpeg', 'belum ditemukan'),
(28, 'hamba allah', '08109999', 'pacar orang', 'ganteng putih mulus semok ', 'hati gue', 234234, '2023-12-16', '16:33:00', '657d6ef883002.jpg', 'belum ditemukan');

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
-- Struktur dari tabel `data`
--

CREATE TABLE `data` (
  `idbarang` int(20) NOT NULL,
  `penerima` text NOT NULL,
  `penemu` varchar(100) NOT NULL,
  `tempatditemukan` varchar(100) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `nim` int(10) NOT NULL,
  `deskripsi` mediumtext NOT NULL,
  `tglditemukan` date NOT NULL,
  `tgldiambil` date NOT NULL,
  `status` enum('sudah diambil','belum diambil') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kehilangan`
--

CREATE TABLE `kehilangan` (
  `iddata` int(20) NOT NULL,
  `nama` char(100) NOT NULL,
  `telpon` char(20) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `tempatditemukan` varchar(100) NOT NULL,
  `nim` int(10) NOT NULL,
  `tglditemukan` date NOT NULL,
  `waktuditemukan` time NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `tgl` date NOT NULL,
  `tglproses` date NOT NULL,
  `status` enum('Terproses','Belum diproses') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `iduser` int(5) NOT NULL,
  `username` char(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('admin','user') NOT NULL,
  `nama` char(100) NOT NULL,
  `nim` int(7) NOT NULL,
  `nowa` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`iduser`, `username`, `password`, `level`, `nama`, `nim`, `nowa`) VALUES
(12, 'admin@123', '$2y$10$BPHiu//yaN7RlTGzq8pWTu..T7Sgd6s4JMfktCUvOmfNyCYhLqfTS', 'admin', 'andre wibowo', 2205063, 2147483647);

-- --------------------------------------------------------

--
-- Struktur dari tabel `trans_demo`
--

CREATE TABLE `trans_demo` (
  `nama` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `trans_demo`
--

INSERT INTO `trans_demo` (`nama`) VALUES
('Firebird'),
('MongoDB'),
('MySQL'),
('Oracle'),
('PostgreSQL');

-- --------------------------------------------------------

--
-- Struktur dari tabel `usermhs`
--

CREATE TABLE `usermhs` (
  `iduser` int(7) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `nim` varchar(7) DEFAULT NULL,
  `no_wa` char(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `usermhs`
--

INSERT INTO `usermhs` (`iduser`, `username`, `password`, `nama_lengkap`, `nim`, `no_wa`) VALUES
(10, 'user@123', '$2y$10$TX6arnix7WjCVWLCaoLQiuSUNWG3s9wM.OtF4RfAyUuib/KwjUxBy', 'andre wibowo', '2205063', '081214627146');

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
-- Indeks untuk tabel `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`idbarang`);

--
-- Indeks untuk tabel `kehilangan`
--
ALTER TABLE `kehilangan`
  ADD PRIMARY KEY (`iddata`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`iduser`);

--
-- Indeks untuk tabel `trans_demo`
--
ALTER TABLE `trans_demo`
  ADD PRIMARY KEY (`nama`);

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
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `barang_temuan`
--
ALTER TABLE `barang_temuan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `data`
--
ALTER TABLE `data`
  MODIFY `idbarang` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kehilangan`
--
ALTER TABLE `kehilangan`
  MODIFY `iddata` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `iduser` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `usermhs`
--
ALTER TABLE `usermhs`
  MODIFY `iduser` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
