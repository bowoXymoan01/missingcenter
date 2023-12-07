-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Des 2023 pada 15.16
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
SET @@autocommit = 1;
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
  `idbarang` int(11) NOT NULL,
  `nama` char(255) NOT NULL,
  `telepon` char(20) NOT NULL,
  `namabarang` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `tempatkehilangan` varchar(255) NOT NULL,
  `nim` int(10) NOT NULL,
  `tglhilang` date NOT NULL,
  `wkthilang` time NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang_hilang`
--

INSERT INTO `barang_hilang` (`idbarang`, `nama`, `telepon`, `namabarang`, `deskripsi`, `tempatkehilangan`, `nim`, `tglhilang`, `wkthilang`, `gambar`) VALUES
(5, 'Jamaludin', '0813456778', 'Laptop Acer', 'Berwarna Silver', 'Lab SOC Gedung Student Center', 2205098, '2023-11-29', '08:00:00', 'acer.jpeg'),
(6, 'Nafa', '0987654346', 'Laptop', 'Warna Warni', 'GSC lt 2', 2205079, '2023-12-03', '15:01:00', 'OIP.jpeg'),
(8, 'Andre Wibowo', '081214627146', 'Rokok filter', 'Djisamsoe', 'kantin Acong', 2205063, '2023-12-07', '11:49:00', 'djisamsoe.jpg');

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
  `status` varchar(10) NOT NULL,
  `waktu` time DEFAULT NULL,
  `gambar` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang_temuan`
--

INSERT INTO `barang_temuan` (`id`, `tipe`, `merek`, `nama`, `deskripsi`, `tanggal`, `lokasi`, `status`, `waktu`, `gambar`) VALUES
(21, 'Hantu', 'Honda', 'joko anwar', 'warna warni merah', '2023-12-07', 'kuburan', 'belum dite', '20:19:00', 0x6b756e74692e6a7067);

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
(1, '', 'rtyvublkn', 'tvhbkjnlm', 'fjbkln', 0, 'dgvhjbknk', '2023-11-15', '0000-00-00', ''),
(2, '', 'temon', 'saritem', 'dildo', 0, 'pandawa', '2023-11-15', '0000-00-00', ''),
(3, '', 'Jamal', 'Lab Basis Data GTI', 'Handphone Samsung', 0, 'berwarna hitam', '2023-11-15', '0000-00-00', ''),
(4, '', 'JEKI UDIL', 'LAB SOC', 'Handphone REALME', 0, 'WARNA BIRU', '2023-11-29', '0000-00-00', ''),
(5, '', 'JEKI UDIL', 'LAB SOC', 'Handphone REALME', 0, 'BIRU', '2023-11-28', '0000-00-00', '');

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

--
-- Dumping data untuk tabel `kehilangan`
--

INSERT INTO `kehilangan` (`iddata`, `nama`, `telpon`, `jenis`, `deskripsi`, `tempatditemukan`, `nim`, `tglditemukan`, `waktuditemukan`, `gambar`, `tgl`, `tglproses`, `status`) VALUES
(1, 'Joko Anwar', '0897776543', 'Charger Laptop', 'Charger Laptop Warna hitam merek asus', 'Gedung Student Center Lt.2', 2205098, '2023-11-09', '12:30:00', '', '2023-11-19', '0000-00-00', 'Belum diproses');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `iduser` int(5) NOT NULL,
  `username` char(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `level` enum('admin','user') NOT NULL,
  `nama` char(100) NOT NULL,
  `nim` int(7) NOT NULL,
  `nowa` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`iduser`, `username`, `password`, `level`, `nama`, `nim`, `nowa`) VALUES
(1, 'andre@mahmud', 'andre123', 'admin', 'Andre Wibowo', 0, 0),
(2, 'naila@123', 'naila123', 'user', 'naila f', 0, 0),
(6, 'gamma@js', '12345', 'admin', 'aprila aditia', 0, 0),
(7, 'java@css', '123', 'user', 'java', 0, 0);

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
(1, 'andre@jadu', 'andre123', 'andre wibowo', '2205063', '081214627146'),
(5, 'gamma@py', '12345', 'gamma', '003', '300'),
(6, 'hp@js', '12345', 'nakano aditia', '2205088', '089677783434');

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
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `barang_temuan`
--
ALTER TABLE `barang_temuan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
  MODIFY `iduser` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `usermhs`
--
ALTER TABLE `usermhs`
  MODIFY `iduser` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
