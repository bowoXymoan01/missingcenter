-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Nov 2023 pada 16.18
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

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `cekpoint` ()   BEGIN 
START TRANSACTION;
INSERT INTO trans_demo VALUES ("PostgreSQL");
SAVEPOINT point1;
INSERT INTO trans_demo VALUES("NoSQL");
ROLLBACK TO SAVEPOINT point1;
INSERT INTO trans_demo VALUES("Firebird");
COMMIT;
SELECT * FROM trans_demo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetBarang_temuan` ()   BEGIN
SELECT* FROM barang_temuan;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getJumlahBarangTemuan` (IN `p_lokasi` VARCHAR(20), OUT `v_jumlah` INT(10))   BEGIN
  SELECT COUNT(*) INTO v_jumlah
  FROM barang_temuan
  WHERE lokasi = p_lokasi;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `trans1` ()   BEGIN 
SET @@autocommit = 0;
INSERT INTO trans_demo VALUES("MongoDB");
SELECT * FROM trans_demo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `trans_barang` ()   BEGIN
update barang_temuan set status ="verivied" where id=3;
ROLLBACK;
select * from barang_temuan WHERE id=3;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `trans_rolback` ()   BEGIN
START TRANSACTION;
UPDATE barang_temuan set merek ="Samsung";
ROLLBACK;
select * from barang_temuan;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_hilang`
--

CREATE TABLE `barang_hilang` (
  `id` int(10) NOT NULL,
  `tipe` varchar(10) NOT NULL,
  `merek` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang_hilang`
--

INSERT INTO `barang_hilang` (`id`, `tipe`, `merek`) VALUES
(1, 'Laptop', 'HP'),
(2, 'Laptop', 'Asus'),
(3, 'HandPhone', 'Apple');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_temuan`
--

CREATE TABLE `barang_temuan` (
  `id` int(10) NOT NULL,
  `tipe` varchar(20) NOT NULL,
  `merek` varchar(10) NOT NULL,
  `warna` varchar(10) NOT NULL,
  `deskripsi` varchar(25) NOT NULL,
  `tanggal` date NOT NULL,
  `lokasi` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang_temuan`
--

INSERT INTO `barang_temuan` (`id`, `tipe`, `merek`, `warna`, `deskripsi`, `tanggal`, `lokasi`, `status`) VALUES
(1, 'Laptop', 'Acer', 'Hitam', 'dengan layar 15,6 inci.', '2023-11-04', 'LAB SOC', 'pending'),
(2, 'Handphone', 'Samsung', 'Putih', 'Galaxy S22 Ultra dengan .', '2023-11-04', 'Kantin kampus', 'verified'),
(3, 'Dompet', 'Eiger', 'Hitam', 'logo Eiger bagian depan.', '2023-11-04', 'Lt.2 Perpustakaan', 'verivied'),
(4, 'Kacamata', 'Ray-Ban', 'Hitam', 'Wayfarer lensa biru.', '2023-11-04', 'Pleno', 'pending'),
(5, 'Jam tangan', 'Rolex', 'Emas', 'dengan tali kulit.', '2023-11-04', 'parkiran GTI', 'verified'),
(6, 'Kunci motor', 'Honda', 'putih', 'dengan ganci Formadiksi', '2023-11-04', 'GSC lt.2', 'published'),
(7, 'Buku novel', '--', '--', 'the Sorcerer\'s Stone', '2023-11-04', 'KOPKAR lt.2', 'published');

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

--
-- Dumping data untuk tabel `data`
--

INSERT INTO `data` (`idbarang`, `penerima`, `penemu`, `tempatditemukan`, `jenis`, `nim`, `deskripsi`, `tglditemukan`, `tgldiambil`, `status`) VALUES
(0, '', 'rtyvublkn', 'tvhbkjnlm', 'fjbkln', 0, 'dgvhjbknk', '2023-11-15', '0000-00-00', ''),
(0, '', 'temon', 'saritem', 'dildo', 0, 'pandawa', '2023-11-15', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `iduser` int(5) NOT NULL,
  `username` char(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `level` enum('admin','user') NOT NULL,
  `nama` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`iduser`, `username`, `password`, `level`, `nama`) VALUES
(1, 'andre@mahmud', 'andre123', 'admin', 'Andre Wibowo'),
(2, 'naila@123', 'naila123', 'user', 'naila f');

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
(1, 'andre@jadu', 'andre123', 'andre wibowo', '2205063', '081214627146');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang_hilang`
--
ALTER TABLE `barang_hilang`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `iduser` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `usermhs`
--
ALTER TABLE `usermhs`
  MODIFY `iduser` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;